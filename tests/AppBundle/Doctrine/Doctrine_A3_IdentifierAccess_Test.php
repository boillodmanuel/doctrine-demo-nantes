<?php

namespace Tests\AppBundle\Doctrine;

use AppBundle\Entity\Geo;

class Doctrine_A3_IdentifierAccess_Test extends AbstractDoctrineTestCase
{

    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));
    }

    public function test_identifier_access()
    {

        /* @var $geo Geo */
        $geo = $this->em
            ->getRepository(Geo::class)
            ->findOneByName('UFR de Droit');

        $geo->getLayer();
        $this->logger->debug('layer id: ' . $geo->getLayer()->getId());
        $this->logger->debug('layer name: ' . $geo->getLayer()->getName());

        $this->assertNotNull($geo);

    }
}