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
	* @Route("/api/content/{textId}", name="postchunk")
	* @Method("POST")
	*/
	/*public function saveTextAction(Request $request, $textId) 
	{
		$pageText = $this->getDoctrine()
			->getRepository('AppBundle:PageText')->find($textId);
		
		if (!$pageText) {
			$pageText = new PageText();
			$pageText->setTextId($id);
		}
		$content = $request->request->get('value');
		if ($content) {
			$pageText->setTextContent($content);

			$em = $this->getDoctrine()->getManager();
			$em->persist($pageText);
			$em->flush();

			return $this->json(array(
				'status'=>'success', 
				$status=200
			));
		}
	   
		return $this->json(array(
			'status' => 'error', 
			$status=500
		));
	}
	*/
	/**
	* @Route("/forms/topmenu", name="topmenu")
	* @Method({"GET", "POST"})
	*/
   /* public function siteMenuFormAction(Request $request)
	{
		$siteMenu = new SiteMenu();
		$form = $this->createForm(TopmenuType::class, $siteMenu, array(
			'action' => $this->generateUrl("topmenu"),
			'method' => 'POST',
		));

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
			'form'=>$form->createView()));
	} */

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
	* @Route("/article/new", name="newarticle")
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
