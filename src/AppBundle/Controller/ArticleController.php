<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use AppBundle\Entity\SiteMenu;
use AppBundle\Form\TopmenuType;
use AppBundle\Repository\MenuRepository;


/**
* @Route("/article")
*/
class ArticleController extends Controller
{

    /**
    * @Route("/new", name="newarticle")
    * @Method({"GET", "POST"})
    */
    public function newAction(Request $request)
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
}