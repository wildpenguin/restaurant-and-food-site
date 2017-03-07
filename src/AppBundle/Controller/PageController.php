<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * 
     */
    public function indexAction(Request $request)
    {
        $this->registerTwigParachute();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
    * Return sample text for undefined text ids
    */
    public function returnSampleText()
    {
        return 'Sample text sample text sample text';
    }

    /**
    * @Route("/webpage/text/{id}", name="postchunk")
    * @Method("POST")
    */
    public function saveTextAction(Request $request) 
    {

    }


    /**
    * Defines a custom Twig function that 
    * loads the text for given id
    */
    public function registerTwigParachute() 
    {
        $twig = new \Twig_Environment($loader);
        $function = new \Twig_Function('parachute', function($id) {
            $text = $this->getDoctrine()
                ->getRepository('AppBundle:PageText')->find($id);
            if (!$text) 
                return $this->returnSampleText();
            return $text->getTextContent();
        });
        $twig->addFunction($function);
    }
}
