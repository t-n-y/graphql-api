<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Style.
 *
 * @ORM\Table(name="style")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StyleRepository")
 */
class Style
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Band", mappedBy="style")
     */
    private $band;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Style
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->band = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add band.
     *
     * @param \AppBundle\Entity\Band $band
     *
     * @return Style
     */
    public function addBand(\AppBundle\Entity\Band $band)
    {
        $this->band[] = $band;

        return $this;
    }

    /**
     * Remove band.
     *
     * @param \AppBundle\Entity\Band $band
     */
    public function removeBand(\AppBundle\Entity\Band $band)
    {
        $this->band->removeElement($band);
    }

    /**
     * Get band.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBand()
    {
        return $this->band;
    }
}
