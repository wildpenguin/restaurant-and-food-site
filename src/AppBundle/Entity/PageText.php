<?php 

// src/AppBundle/Entity/PageText.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="page_text")
* @ORM\HasLifecycleCallbacks()
*/

class PageText
{
	/**
	* @ORM\Column(type="string", length=50)
	* @ORM\Id
	* 
	*/
	private $text_id;

	/**
	* @ORM\Column(type="blob")
	*/
	private $text_content;


    

    /**
     * Set textId
     *
     * @param string $textId
     *
     * @return PageText
     */
    public function setTextId($textId)
    {
        $this->text_id = $textId;

        return $this;
    }

    /**
     * Get textId
     *
     * @return string
     */
    public function getTextId()
    {
        return $this->text_id;
    }

    /**
     * Set textContent
     *
     * @param string $textContent
     *
     * @return PageText
     */
    public function setTextContent($textContent)
    {
        $this->text_content = $textContent;

        return $this;
    }

    /**
     * Get textContent
     *
     * @return string
     */
    public function getTextContent()
    {
        return $this->text_content;
    }
}
