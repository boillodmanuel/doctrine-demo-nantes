<?php

namespace Tests\AppBundle\Doctrine;

use AppBundle\Entity\Layer;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

// TODO Test instruction add fetch="EAGER" attribute in OneToMany mapping (first, to Layer only, then to Layer + Geo)
class Doctrine_B1_Mapping_Test extends AbstractDoctrineTestCase
{

    /**
     * @var Serializer
     */
    private $serializer;

    protected function setUp()
    {
        parent::setUp();
        $this->em->getConnection()->exec(file_get_contents(__DIR__ . '/dataset.sql'));

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizers = array(new ObjectNormalizer($classMetadataFactory));
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function test_lazyloading_fetch_mapping()
    {
        /* @var $layer Layer */
        $layer = $this->em
            ->getRepository(Layer::class)
            ->findOneByName('Ecole');

        $this->assertNotNull($layer);
        $this->assertEquals('Ecole', $layer->getName());

        print("layer as json: \n" .
            $this->serializer->serialize($layer, 'json', ['groups' => ['api']]));
    }
}