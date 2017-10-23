<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
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
     * @Groups({"api"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     * @Assert\NotBlank()
     * @Groups({"api"})
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="rank", type="integer")
     * @Groups({"api"})
     */
    private $rank;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Geo", mappedBy="layer")
     * @Groups({"api"})
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

    public function __toString()
    {
        return "Layer [id: $this->id, name: $this->name, rank: $this->rank]";
    }

}
