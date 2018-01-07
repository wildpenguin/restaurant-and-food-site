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
     * @Route("/", name="homepage")
     * 
     */
    public function indexAction(Request $request)
    {
        $menuItems = $this->getDoctrine()
            ->getRepository(SiteMenu::class)
            ->findByName('topmenu');

        return $this->render('default/index.html.twig', array(
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
    /**
    * @Route("/forms/topmenu", name="topmenu")
    * @Method({"GET", "POST"})
    */
    public function siteMenuFormAction(Request $request)
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
    }

    
}
