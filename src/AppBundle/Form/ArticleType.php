<?php
// src/AppBundle/Form/ArticleType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Entity\Article;

class TopmenuType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('status', ChoiseType::class, ['choises'=> [
				'Enabled'=>'ENABLED', 'Disabled'=>'DISABLED']])
			->add('expiresOn')
			->add('title')
			->add('body');
	}
}