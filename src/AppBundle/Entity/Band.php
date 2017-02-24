<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Band.
 *
 * @ORM\Table(name="band")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BandRepository")
 */
class Band
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
     * @ORM\ManyToOne(targetEntity="Style", inversedBy="band")
     * @ORM\JoinColumn(name="style_id", referencedColumnName="id")
     */
    private $style;

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
     * @return Band
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
     * Set style.
     *
     * @param \AppBundle\Entity\Style $style
     *
     * @return Band
     */
    public function setStyle(\AppBundle\Entity\Style $style = null)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style.
     *
     * @return \AppBundle\Entity\Style
     */
    public function getStyle()
    {
        return $this->style;
    }
}
