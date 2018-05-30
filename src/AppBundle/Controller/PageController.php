<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\TopmenuType;
use AppBundle\Entity\SiteMenu;
use AppBundle\Repository\MenuRepository;
use AppBundle\Entity\Article;
use AppBundle\Repository\ArticleRepository;

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
	 * @Route("/{pagename}", name="generalpage")
	 * 
	 */
	public function mainAction(Request $request, $pagename='home')
	{
		$menuItems = $this->getDoctrine()
			->getRepository(SiteMenu::class)
			->findByName('topmenu');
		
		$articles = $this->getDoctrine()
			->getRepository(Article::class)->findByRootpage($pagename);
		
		return $this->render('page/generic.html.twig', array(
			'menuItems'=>$menuItems,
			'articles'=>$articles,
			'rootpage'=>$pagename,
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
