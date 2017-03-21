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
        return $this->render('default/index.html.twig');
    }


    /**
    * @Route("/api/content/{id}", name="postchunk")
    * @Method("POST")
    */
    public function saveTextAction(Request $request, $id) 
    {
        $pageText = $this->getDoctrine()
            ->getRepository('AppBundle:PageText')->find($id);
        
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

            return $this->json(
                array('status'=>'success'
            ));
        }

    }

}
