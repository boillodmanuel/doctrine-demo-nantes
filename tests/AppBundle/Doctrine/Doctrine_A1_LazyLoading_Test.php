<?php

namespace Tests\AppBundle\Doctrine;

use AppBundle\Entity\Layer;

class Doctrine_A1_LazyLoading_Test extends AbstractDoctrineTestCase
{

    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));
    }

    public function test_lazyloading()
    {
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