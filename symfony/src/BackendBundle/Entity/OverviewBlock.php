<?php

namespace BackendBundle\Entity;
use BackendBundle\Entity\Block;

use Doctrine\ORM\Mapping as ORM;

/**
 * Block
 *
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\BlockRepository")
 */
class OverviewBlock extends Block
{
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
    protected $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imgurl", type="string", length=255, nullable=true)
     */
    protected $imgUrl;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return OverviewBlock
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set imgUrl
     *
     * @param string $imgUrl
     *
     * @return OverviewBlock
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * Get imgUrl
     *
     * @return string
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return OverviewBlock
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
