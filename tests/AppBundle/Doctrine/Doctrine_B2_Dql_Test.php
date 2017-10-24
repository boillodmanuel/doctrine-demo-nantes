<?php

namespace Tests\AppBundle\Doctrine;

use AppBundle\Entity\Layer;

// TODO test instruction: don't forget to undo mapping of previous test (when modified manually during the demo)
class Doctrine_B2_Dql_Test extends AbstractDoctrineTestCase
{

    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));
    }

    public function test_lazyloading_dql()
    {

        $dql = 'select l
                from AppBundle:Layer l
                where l.name = :name
        ';

        /* @var $layer Layer */
        $layer = $this->em->createQuery($dql)->setParameters([ 'name' => 'Ecole'])->getSingleResult();

        $this->assertNotNull($layer);
        $this->assertEquals('Ecole', $layer->getName());

        $geos = $layer->getGeos();

        $this->assertCount(20, $geos);
        $this->assertCount(5, $geos[0]->getGeoAttributes());
        $this->assertCount(5, $geos[1]->getGeoAttributes());

        print('Layer: ' . $layer);
    }




    public function test_lazyloading_dql_with_fetch_join()
    {

        $dql = 'select l, g, ga
                from AppBundle:Layer l
                join l.geos g
                join g.geoAttributes ga
                where l.name = :name
        ';

        /* @var $layer Layer */
        $layer = $this->em->createQuery($dql)
            ->setParameters([ 'name' => 'Ecole'])
            ->getSingleResult();

        $this->assertNotNull($layer);
        $this->assertEquals('Ecole', $layer->getName());

        $geos = $layer->getGeos();

        $this->assertCount(20, $geos);
        $this->assertCount(5, $geos[0]->getGeoAttributes());
        $this->assertCount(5, $geos[1]->getGeoAttributes());

        print('Layer: ' . $layer);
    }

    public function test_lazyloading_dql_with_fetch_join_as_array()
    {

        $dql = 'select l, g, ga
                from AppBundle:Layer l
                join l.geos g
                join g.geoAttributes ga
                where l.name = :name
        ';

        $result = $this->em->createQuery($dql)
            ->setParameters([ 'name' => 'Ecole'])
            ->getArrayResult();

        $this->assertCount(1, $result);

        print('First 5 rows:\n');
        print_r(array_slice($result, 0, 5));
    }

    public function test_lazyloading_dql_with_fetch_join_as_scalar()
    {

        $dql = 'select l, g, ga
                from AppBundle:Layer l
                join l.geos g
                join g.geoAttributes ga
                where l.name = :name
        ';

        $result = $this->em->createQuery($dql)
            ->setParameters([ 'name' => 'Ecole'])
            ->getScalarResult();

        $this->assertCount(100, $result);

        print('First 5 rows:\n');
        print_r(array_slice($result, 0, 5));
    }

    public function test_lazyloading_as_mixed()
    {
        $dql = 'select l.name as layer_name, g.name as geo_name, ga.name as att_name, ga.value as att_value
                from AppBundle:Layer l
                join l.geos g
                join g.geoAttributes ga
                where l.name = :name
        ';

        $result = $this->em->createQuery($dql)
            ->setParameters([ 'name' => 'Ecole'])
            ->getResult();

        $this->assertNotNull($result);
        $this->assertCount(100, $result);

        print('First 5 rows:\n');
        print_r(array_slice($result, 0, 5));
    }



}