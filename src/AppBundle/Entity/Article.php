<?php
// src/AppBundle/Entity/Article.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
* @ORM\Table(name="website_article")
* @ORM\HasLifecycleCallbacks()
*/

class Article 
{
	/**
	* @ORM\Column(name="id", type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $id;

	/**
	* @ORM\Column(name="title", type="string", length=100)
	*/
	private $title;

	/**
	* @ORM\Column(name="body", type="text")
	*/
	private $body;

	/**
	* @ORM\Column(name="author", type="integer")
	*/
	private $author;

	/**
	* @ORM\Column(name="status", type="string", length=100)
	*/
	private $status;

	/**
	* @ORM\Column(name="rootpage", type="string", length=100)
	*/
	private $rootpage;

	/**
	* @ORM\Column(name="expiresOn", type="datetime", length=100)
	*/
	private $expiresOn;



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
     * Set title
     *
     * @param string $title
     *
     * @return Article
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
     * Set body
     *
     * @param string $body
     *
     * @return Article
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set author
     *
     * @param integer $author
     *
     * @return Article
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Article
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set onpage
     *
     * @param string $rootpage
     *
     * @return Article
     */
    public function setRootpage($onpage)
    {
        $this->rootpage = $onpage;

        return $this;
    }

    /**
     * Get onpage
     *
     * @return string
     */
    public function getRootpage()
    {
        return $this->rootpage;
    }

    /**
     * Set expiresOn
     *
     * @param \DateTime $expiresOn
     *
     * @return Article
     */
    public function setExpiresOn($expiresOn)
    {
        $this->expiresOn = $expiresOn;

        return $this;
    }

    /**
     * Get expiresOn
     *
     * @return \DateTime
     */
    public function getExpiresOn()
    {
        return $this->expiresOn;
    }
}
