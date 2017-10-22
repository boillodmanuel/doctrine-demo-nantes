<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Layer
 *
 * @ORM\Entity
 * @ORM\Table(name="layer")
 */
class Layer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="rank", type="integer")
     */
    private $rank;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Geo", mappedBy="layer")
     */
    private $geos;


    public function __construct()
    {
        $this->geos =  new ArrayCollection();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setRank(int $rank)
    {
        $this->rank = $rank;

        return $this;
    }

    public function getRank() : int
    {
        return $this->rank;
    }


    public function addGeo(Geo $geo)
    {
        $geo->setLayer($this);
        $this->geos[] = $geo;

        return $this;
    }

    public function removeGeo(Geo $geo)
    {
        $this->geos->removeElement($geo);
    }

    public function getGeos()
    {
        return $this->geos;
    }

}
