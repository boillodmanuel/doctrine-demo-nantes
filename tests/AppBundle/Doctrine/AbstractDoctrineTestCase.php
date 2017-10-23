<?php

namespace Tests\AppBundle\Doctrine;

use Doctrine\ORM\EntityManager;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AbstractDoctrineTestCase extends KernelTestCase
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var Logger
     */
    protected $logger;

    protected function setUp()
    {
        self::bootKernel();

        $this->logger = new Logger('test');
        $this->logger = static::$kernel->getContainer()->get('logger');

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->cleanDatabase();
    }


    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }

    protected function cleanDatabase()
    {
        $this->em->getConnection()->exec('TRUNCATE geo_attribute, geo, layer');

    }
}