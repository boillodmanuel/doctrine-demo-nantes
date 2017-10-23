<?php

namespace Tests\AppBundle\Doctrine;

use Doctrine\ORM\Internal\Hydration\AbstractHydrator;
use PDO;

class Doctrine_B5_QueryBuilder extends AbstractDoctrineTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));
    }

    public function test_queryBuilder()
    {
        /* @var $layer Layer */
        $layer = $this->em->createQueryBuilder()
            ->select('l')
            ->from('AppBundle:Layer ', 'l')
            ->where('l.name = :name')
            ->setParameters([ 'name' => 'Ecole'])
            ->getQuery()
            ->getSingleResult();

        $this->assertNotNull($layer);
        $this->assertEquals('Ecole', $layer->getName());

        $geos = $layer->getGeos();

        $this->assertCount(20, $geos);
        $this->assertCount(5, $geos[0]->getGeoAttributes());
        $this->assertCount(5, $geos[1]->getGeoAttributes());

        $this->logger->debug('layer: ' . $layer);
    }




    public function test_lazyloading_dql_with_fetch_join()
    {
        $layer = $this->em->createQueryBuilder()
            ->select(['l', 'g', 'ga'])
            ->from('AppBundle:Layer ', 'l')
            ->join('l.geos', 'g')
            ->join('g.geoAttributes', 'ga')
            ->where('l.name = :name')
            ->setParameters([ 'name' => 'Ecole'])
            ->getQuery()
            ->getSingleResult();

        $this->assertNotNull($layer);
        $this->assertEquals('Ecole', $layer->getName());

        $geos = $layer->getGeos();

        $this->assertCount(20, $geos);
        $this->assertCount(5, $geos[0]->getGeoAttributes());
        $this->assertCount(5, $geos[1]->getGeoAttributes());

        $this->logger->debug('layer: ' . $layer);
    }

}