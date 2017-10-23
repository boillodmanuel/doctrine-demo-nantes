<?php

namespace Tests\AppBundle\Doctrine;

use Doctrine\ORM\Internal\Hydration\AbstractHydrator;
use PDO;

class Doctrine_B4_CustomHydrator extends AbstractDoctrineTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));
    }


    public function test_query_custom_hydrator()
    {

        $this->em->getConfiguration()->addCustomHydrationMode('DoctrineB4DtoHydrator', DoctrineB4DtoHydrator::class);

        $dql = 'select l.name as layer_name, g.name as geo_name, ga.name as att_name, ga.value as att_value
                from AppBundle:Layer l INDEX BY l.name
                join l.geos g INDEX BY g.name
                join g.geoAttributes ga INDEX BY ga.name
                where l.name = :name
        ';

        $geoDtos = $this->em->createQuery($dql)
            ->setParameters([ 'name' => 'Ecole'])
            ->getResult('DoctrineB4DtoHydrator');

        print_r($geoDtos);

        $this->assertNotNull($geoDtos);
        $this->assertCount(20, $geoDtos);

    }
}

class DoctrineB4DtoHydrator extends AbstractHydrator
{
    /**
     * @return array of DoctrineB4GeoDto
     */
    protected function hydrateAllData(): array
    {
        $result = array();

        while ($row = $this->_stmt->fetch(PDO::FETCH_ASSOC)) {

            $geoName = $row['name_1'];

            if (array_key_exists($geoName, $result))
            {
                $dto = $result[$geoName];
            } else {
                $layerName = $row['name_0'];
                $dto = new DoctrineB4GeoDto($geoName, $layerName);
                $result[$geoName] = $dto;
            }

            $dto->addAttribute(new DoctrineB4GeoAttributeDto(
                $row['name_2'],
                $row['value_3']
            ));
        }


        print_r($result);

        return $result;
    }
}

class DoctrineB4GeoDto
{
    /**
     * @var string
     */
    private $layerName;
    /**
     * @var string
     */
    private $geoName;
    /**
     * @var array
     */
    private $attributes;

    public function __construct(string $layerName, string $geoName)
    {
        $this->layerName = $layerName;
        $this->geoName = $geoName;
    }

    public function addAttribute(DoctrineB4GeoAttributeDto $attribute)
    {
        $this->attributes[] = $attribute;
    }

    public function __toString()
    {
        return "DoctrineB4GeoDto [layerName: $this->layerName, geoName: $this->geoName, attributes: " . print_r($this->attributes, true) . "]";
    }

}

class DoctrineB4GeoAttributeDto
{

    /**
     * @var string
     */
    private $attributeName;
    /**
     * @var string
     */
    private $attributeValue;

    public function __construct(string $attributeName, string $attributeValue)
    {
        $this->attributeName = $attributeName;
        $this->attributeValue = $attributeValue;
    }

    public function __toString()
    {
        return "DoctrineB4GeoAttributeDto [attributeName: $this->attributeName, attributeValue: $this->attributeValue]";
    }
}