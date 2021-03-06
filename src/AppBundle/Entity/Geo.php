<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Geo
 *
 * @ORM\Entity
 * @ORM\Table(name="geo")
 */
class Geo
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
     * @Groups({"api"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="geometry", type="string")
     * @Groups({"api"})
     */
    private $geometry;

    /**
     * @var Layer
     *
     * @ORM\ManyToOne(targetEntity="Layer", inversedBy="geos")
     * @ORM\JoinColumn(name="layer_id", referencedColumnName="id", nullable=false)
     */
    private $layer;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="GeoAttribute", mappedBy="geo")
     * @Groups({"api"})
     */
    private $geoAttributes;

    /**
     *
     */
    public function __construct()
    {
        $this->geoAttributes = new ArrayCollection();
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

    public function setGeometry(string $geometry)
    {
        $this->geometry = $geometry;

        return $this;
    }

    public function getGeometry() : string
    {
        return $this->geometry;
    }

    public function setLayer(Layer $layer)
    {
        $this->layer = $layer;

        return $this;
    }

    public function getLayer()
    {
        return $this->layer;
    }

    public function addGeoAttribute(GeoAttribute $geoAttribute)
    {
        $geoAttribute->setGeo($this);
        $this->geoAttributes[] = $geoAttribute;

        return $this;
    }

    public function removeGeoAttribute(GeoAttribute $geoAttribute)
    {
        $this->geoAttributes->removeElement($geoAttribute);
    }

    public function getGeoAttributes()
    {
        return $this->geoAttributes;
    }

    public function __toString()
    {
        return "Geo [id: $this->id, name: $this->name, geometry: $this->geometry]";
    }

}
