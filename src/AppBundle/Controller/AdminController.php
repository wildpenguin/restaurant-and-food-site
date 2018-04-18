<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use AppBundle\Entity\SiteMenu;
use AppBundle\Entity\Article;
use AppBundle\Form\TopmenuType;
use AppBundle\Form\ArticleType;
use AppBundle\Repository\MenuRepository;


/**
* @Route("/admin")
*/
class AdminController extends Controller
{
	
	/**
	* @Route("/topmenu/new", name="newmenu")
	* @Method({"GET", "POST"})
	*/
	public function newMenuAction(Request $request)
	{
		$siteMenu = new SiteMenu();
		$form = $this->createForm(TopmenuType::class, $siteMenu);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$siteMenu = $form->getData();
			$nextPosition = $this->getDoctrine()->getRepository(SiteMenu::class)
				->findNextAvailablePosition($siteMenu->getName());
				
			$siteMenu->setPosition($nextPosition);
			$em = $this->getDoctrine()->getManager();
			$em->persist($siteMenu);
			$em->flush();

			return $this->redirectToRoute('homepage');
		}

		return $this->render('forms/topmenu.html.twig', array(
			'menuForm'=>$form->createView()));
	}


	/**
	* @Route("/topmenu/{id}/edit", name="editmenu")
	* @Method({"GET", "POST"})
	*/
	public function editMenuAction(Request $request, SiteMenu $siteMenu)
	{
		$formUrl = $this->generateUrl('editmenu', array('id'=>$siteMenu->getId()));
		
		$form = $this->createForm(TopmenuType::class, $siteMenu, array(
			'action' => $formUrl,
			'method' => 'POST'
		));

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$siteMenu = $form->getData();

			$em = $this->getDoctrine()->getManager();
			$em->persist($siteMenu);
			$em->flush();

			return $this->redirectToRoute('homepage');
		}

		return $this->render('forms/topmenu.html.twig', array(
			'menuForm'=>$form->createView()));
	}

	/**
	* @Route("/article/new", name="createarticle")
	* @Method({"GET", "POST"})
	*/
	public function newArticleAction(Request $request)
	{
		$article = new Article();
		$form = $this->createForm(ArticleType::class, $article);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$article = $form->getData();
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($article);
			$em->flush();

			return $this->redirectToRoute('homepage');
		}

		return $this->render('forms/article.html.twig', array(
			'articleForm'=>$form->createView()));
	}

	
}
