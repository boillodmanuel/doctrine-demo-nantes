<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Geo's attribute
 *
 * @ORM\Entity
 * @ORM\Table(name="geo_attribute")
 */
class GeoAttribute
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"api"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Groups({"api"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Groups({"api"})
     */
    private $value;

    /**
     * @var Geo
     *
     * @ORM\ManyToOne(targetEntity="Geo", inversedBy="geoAttributes")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false)
     */
    private $geo;


    public function __construct()
    {
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

    public function setValue(string $value)
    {
        $this->value = $value;

        return $this;
    }

    public function getValue() : string
    {
        return $this->value;
    }

    public function setGeo(Geo $geo)
    {
        $this->geo = $geo;

        return $this;
    }

    public function getGeo() : Geo
    {
        return $this->geo;
    }

    public function __toString()
    {
        return "GeoAttribute [id: $this->id, name: $this->name, value: $this->value]";
    }

}
