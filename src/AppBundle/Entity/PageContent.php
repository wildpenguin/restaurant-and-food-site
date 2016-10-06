<?php 

// src/AppBundle/Entity/PageContent.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="site_content")
*/

class SiteContent 
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $id;

	/**
	* @ORM\Column(type="string", length=256)
	*/
	private $title;

	/**
	* @ORM\Column(type="blob")
	*/
	private $body;

	/**
	* @ORM\Column(type="datetime", name="created_at")
	*/
	private $createdAt;

	/**
	* @ORM\Column(type="integer", name="author_id")
	*/
	private $author;

	/**
	* @ORM\Column(type="string", length=50, name="page_name")
	*/
	private $pageName;
}