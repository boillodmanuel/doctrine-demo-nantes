<?php

namespace Tests\AppBundle\Doctrine;

use AppBundle\Entity\Layer;

class Doctrine_B3_Dto_Test extends AbstractDoctrineTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));
    }


    public function test_lazyloading_dto()
    {
        $dql = 'select new Tests\AppBundle\Doctrine\DoctrineB3Dto(l.name, g.name, ga.name, ga.value)
                from AppBundle:Layer l
                join l.geos g
                join g.geoAttributes ga
                where l.name = :name
        ';

        /* @var $layer Layer */
        $result = $this->em->createQuery($dql)
            ->setParameters([ 'name' => 'Ecole'])
            ->getResult();

        $this->assertNotNull($result);
        $this->assertCount(100, $result);

        foreach ($result as $row)
        {
            $this->assertInstanceOf(DoctrineB3Dto::class, $row);
            $this->logger->debug('row: ' . $row);

        }
    }
}

class DoctrineB3Dto
{
    /**
     * @var string
     */
    private $layerName;
    /**
     * @var array
     */
    private $geoName;
    /**
     * @var string
     */
    private $attributeName;
    /**
     * @var string
     */
    private $attributeValue;

    public function __construct(string $layerName, string $geoName, string $attributeName, string $attributeValue)
    {
        $this->layerName = $layerName;
        $this->geoName = $geoName;
        $this->attributeName = $attributeName;
        $this->attributeValue = $attributeValue;
    }

    public function __toString()
    {
        return "DoctrineB3Dto [layerName: $this->layerName, geoName: $this->geoName, attributeName: $this->attributeName, attributeValue: $this->attributeValue]";
    }

}