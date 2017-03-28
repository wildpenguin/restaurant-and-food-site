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
	* @ORM\Column(name="text_id", type="string", length=50)
	* @ORM\Id
	* 
	*/
	private $textId;

	/**
	* @ORM\Column(name="text_content", type="blob")
	*/
	private $textContent;


    

    /**
     * Set textId
     *
     * @param string $textId
     *
     * @return PageText
     */
    public function setTextId($textId)
    {
        $this->textId = $textId;

        return $this;
    }

    /**
     * Get textId
     *
     * @return string
     */
    public function getTextId()
    {
        return $this->textId;
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
        $this->textContent = $textContent;

        return $this;
    }

    /**
     * Get textContent
     *
     * @return string
     */
    public function getTextContent()
    {
        return $this->textContent;
    }
}
