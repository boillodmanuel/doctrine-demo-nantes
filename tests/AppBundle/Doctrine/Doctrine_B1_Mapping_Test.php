<?php

namespace Tests\AppBundle\Doctrine;

use AppBundle\Entity\Layer;

class Doctrine_B1_Mapping_Test extends AbstractDoctrineTestCase
{

    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));
    }

    public function test_lazyloading_fetch_mapping()
    {
        // TODO update mapping (first Layer only, then Layer + Geo)

        /* @var $layer Layer */
        $layer = $this->em
            ->getRepository(Layer::class)
            ->findOneByName('Ecole');

        $this->assertNotNull($layer);
        $this->assertEquals('Ecole', $layer->getName());

        $geos = $layer->getGeos();

        $this->assertCount(20, $geos);

    }
}