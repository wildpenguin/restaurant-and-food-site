<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\PageText;


class PageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * 
     */
    public function indexAction(Request $request)
    {
        $menuItems = $this->getDoctrine()
            ->getRepository('AppBundle:WebsiteData')
            ->findByElementFunction('topmenu');

        return $this->render('default/index.html.twig', array(
            "menuItems"=>$menuItems,
        ));
    }


    /**
    * @Route("/api/content/{textId}", name="postchunk")
    * @Method("POST")
    */
    public function saveTextAction(Request $request, $textId) 
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

    /**
    * @Route("/api/forms/topmenu")
    * @Method("GET")
    */
    public function getTopMenuCreateForm(Request $request)
    {
        return $this->render('forms/topmenu.html.twig');
    }

    /**
    * @Route("/api/forms/topmenu")
    * @Method("POST")
    */
    
}
