<?php

namespace Tests\AppBundle\Doctrine;

use AppBundle\Entity\Geo;
use AppBundle\Entity\Layer;

class Doctrine_C1_CacheLevel1_Test extends AbstractDoctrineTestCase
{

    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));
    }

    public function test_cache_level1()
    {
        /* @var $layer Layer */
        $layer = $this->em
            ->getRepository(Layer::class)
            ->findOneByName('Ecole');

        $this->assertNotNull($layer);

        /* @var $geo Geo */
        $geo = $this->em
            ->getRepository(Geo::class)
            ->findOneByName('Primaire Françoise Dolto');

        $this->assertNotNull($geo);

        $this->assertEquals('Ecole', $geo->getLayer()->getName());
    }
}