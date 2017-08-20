<?php

namespace BackendBundle\Entity;
use BackendBundle\Entity\Block;

use Doctrine\ORM\Mapping as ORM;

/**
 * Block
 *
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\BlockRepository")
 */
class HeaderBlock extends Block
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
     * @ORM\Column(name="subtitle", type="string", length=100, nullable=true)
     */
    protected $subtitle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imgurl", type="string", length=255, nullable=true)
     */
    protected $imgUrl;
    
    /**
     * @var string
     *
     * @ORM\Column(name="bgurl", type="string", length=255, nullable=true)
     */
    protected $bgUrl;
    
    /**
     * @var string
     *
     * @ORM\Column(name="btnurl", type="string", length=255, nullable=true)
     */
    protected $btnUrl;
    
  

    /**
     * Set title
     *
     * @param string $title
     *
     * @return HeaderBlock
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
     * Set subtitle
     *
     * @param string $subtitle
     *
     * @return HeaderBlock
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set imgUrl
     *
     * @param string $imgUrl
     *
     * @return HeaderBlock
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
     * Set bgUrl
     *
     * @param string $bgUrl
     *
     * @return HeaderBlock
     */
    public function setBgUrl($bgUrl)
    {
        $this->bgUrl = $bgUrl;

        return $this;
    }

    /**
     * Get bgUrl
     *
     * @return string
     */
    public function getBgUrl()
    {
        return $this->bgUrl;
    }

    /**
     * Set btnUrl
     *
     * @param string $btnUrl
     *
     * @return HeaderBlock
     */
    public function setBtnUrl($btnUrl)
    {
        $this->btnUrl = $btnUrl;

        return $this;
    }

    /**
     * Get btnUrl
     *
     * @return string
     */
    public function getBtnUrl()
    {
        return $this->btnUrl;
    }
}
