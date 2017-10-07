<?php 
// src/AppBundle/Twig/AppExtention.php

namespace AppBundle\Twig;

use Symfony\Bridge\Doctrine\RegistryInterface;


class AppExtension extends \Twig_Extension
{
	/*protected $doctrine;

	public function __construct(RegistryInterface $doctrine) 
	{
		$this->doctrine = $doctrine;
	}

	public function parachute($id)
	{
		$text = $this->doctrine->getRepository('AppBundle:PageText')->findOneByTextId($id);

        if (!$text) {
        	return 'click on the edit button to modify this text';
        }
        return stream_get_contents($text->getTextContent());
	}

	public function getFunctions()
	{
		return array(
			'parachute' => new \Twig_Function_Method($this, 'parachute'),
		);
	}*/
	
}