<?php 

// src/AppBundle/Entity/WebPage.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="webpage")
*/

class WebPage
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $id;

	/**
	* @ORM\Column(type="string", length=50)
	*/
	private $name;

	/**
	* @ORM\Column(type="integer", name="author_id")
	*/
	private $author;
	
	/**
	* @ORM\Column(type="datetime", name="created_at")
	*/
	private $createdAt;

	/**
	* @ORM\Column(type="string", length=256)
	*/
	private $title;

	/**
	* @ORM\Column(type="blob")
	*/
	private $body;

	
}