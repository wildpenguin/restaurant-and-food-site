<?php 
// src/AppBundle/Twig/AppExtention.php

namespace AppBundle\Twig;

use Symfony\Bridge\Doctrine\RegistryInterface;


class AppExtension extends \Twig_Extension
{
	protected $doctrine;

	public function __construct(RegistryInterface $doctrine) 
	{
		$this->doctrine = $doctrine;
	}

	public function parachute($id)
	{
		$text = $this->doctrine->getRepository('AppBundle:PageText')->find($id);
        if (!$text) 
        	return 'click on the edit button to modify this text';

        return $text->getTextContent();	
	}

	public function getFuntions()
	{
		return array(
			'parachute' => new \Twig_Function_Method($this, 'parachute'),
		);
	}
	
}