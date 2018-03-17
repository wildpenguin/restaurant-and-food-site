<?php
// src/AppBundle/Form/TopmenuType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Entity\SiteMenu;

class TopmenuType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name', HiddenType::class, array(
				'data' => 'topmenu'))
			->add('title', TextType::class)
			//->add('url', TextType::class, array(
			//'attr' => array(
		//		'placeholder' => 'support.contact.titleplaceholder'
		//	)))
			->add('url', TextType::class, array('attr'=> 
				array('placeholder' => 'Ex: /home')))
			->add('icon', TextType::class)
			->add('parent', ChoiceType::class, array(
				'choices'  => array(
					'Home' => null,
					'Contacts' => true,
					'Aboutus' => false,
				),
			))
		;
	}

	// ...
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => SiteMenu::class,
		));
	}
}