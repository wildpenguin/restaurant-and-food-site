<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SiteMenu;
use AppBundle\Form\TopmenuType;
use AppBundle\Repository\MenuRepository;


class PageController extends Controller
{
	/**
	* @Route("/login", name="login")
	* 
	*/
	public function loginAction(Request $request)
	{   
		 // get the login error if there is one
		$authUtils = $this->get('security.authentication_utils');
		$error = $authUtils->getLastAuthenticationError();

		// last username entered by the user
		$lastUsername = $authUtils->getLastUsername();

		return $this->render('page/login.html.twig', array(
			'last_username' => $lastUsername,
			'error'         => $error,
		));
	}


	/**
	 * @Route("/", name="homepage")
	 * @Route("/home", name="homepage2")
	 */
	public function indexAction(Request $request)
	{
		$menuItems = $this->getDoctrine()
			->getRepository(SiteMenu::class)
			->findByName('topmenu');

		return $this->render('page/index.html.twig', array(
			"menuItems"=>$menuItems,
			"articles" =>""
		));
	}


	/**
	 * @Route("/about", name="about")
	 * 
	 */
	public function aboutAction(Request $request)
	{
		$menuItems = $this->getDoctrine()
			->getRepository(SiteMenu::class)
			->findByName('topmenu');

		return $this->render('page/about.html.twig', array(
			"menuItems"=>$menuItems,
		));
	}
	

	/**
	 * @Route("/program", name="program")
	 * 
	 */
	public function programAction(Request $request)
	{
		$menuItems = $this->getDoctrine()
			->getRepository(SiteMenu::class)
			->findByName('topmenu');

		return $this->render('page/program.html.twig', array(
			"menuItems"=>$menuItems,
		));
	}


	/**
	 * @Route("/contact", name="contact")
	 * 
	 */
	public function contactAction(Request $request)
	{
		$menuItems = $this->getDoctrine()
			->getRepository(SiteMenu::class)
			->findByName('topmenu');

		return $this->render('page/contact.html.twig', array(
			"menuItems"=>$menuItems,
		));
	}

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


	

	
}
