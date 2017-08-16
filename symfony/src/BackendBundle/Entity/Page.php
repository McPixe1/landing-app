<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BackendBundle\Entity\Theme;

/**
 * Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\PageRepository")
 */
class Page {

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Asociación many to one unidiraccional
     * Muchas paginas tienen un tema
     * @ORM\ManyToOne(targetEntity="Theme")
     * @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
     */
    private $theme;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Block
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }


    /**
     * Set theme
     *
     * @param \BackendBundle\Entity\Theme $theme
     *
     * @return Page
     */
    public function setTheme(\BackendBundle\Entity\Theme $theme = null)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return \BackendBundle\Entity\Theme
     */
    public function getTheme()
    {
        return $this->theme;
    }
}
