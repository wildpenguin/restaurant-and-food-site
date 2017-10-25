<?php
// src/AppBundle/Entity/SiteMenu.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="website_menu")
* @ORM\HasLifecycleCallbacks()
*/

class SiteMenu  {
	
	/**
	* @ORM\Column(name="id", type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $id;

	/**
	* @ORM\Column(name="name", type="string", length=50)
	*/
	private $name;

	/**
	* @ORM\Column(name="title", type="string", length=50)
	*/
	private $title;

	/**
	* @ORM\Column(name="url", type="string", length=100)
	*/
	private $url;

    /**
    * @ORM\Column(name="position", type="integer")
    */
    private $position;

	/**
	* @ORM\Column(name="icon", type="string", length=100)
	*/
	private $icon;

    /**
    * @ORM\Column(name="parent", type="integer")
    */
    private $parent;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SiteMenu
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return SiteMenu
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
     * Set url
     *
     * @param string $url
     *
     * @return SiteMenu
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return SiteMenu
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return SiteMenu
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set parent
     *
     * @param integer $parent
     *
     * @return SiteMenu
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return integer
     */
    public function getParent()
    {
        return $this->parent;
    }
}
