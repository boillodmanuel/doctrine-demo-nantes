<?php

namespace Tests\AppBundle\Doctrine;

use Doctrine\ORM\Query\ResultSetMapping;

class Doctrine_B5_QueryBuilder extends AbstractDoctrineTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));
    }

    public function test_nativeBuilder()
    {

        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('layer_name', 'layerName');
        $rsm->addScalarResult('geo_name', 'geoName');
        $rsm->addScalarResult('att_name', 'attName');
        $rsm->addScalarResult('att_value', 'attValue');

        $sql = 'select l.name as layer_name, g.name as geo_name, ga.name as att_name, ga.value as att_value
                from layer l
                join geo g on l.id = g.layer_id
                join geo_attribute ga on g.id = ga.geo_id
                where l.name = :name
        ';

        $result = $this->em->createNativeQuery($sql, $rsm)
            ->setParameters([ 'name' => 'Ecole'])
            ->getResult();

        $this->assertNotNull($result);
        $this->assertCount(100, $result);

        print_r($result);
    }
}
