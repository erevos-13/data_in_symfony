<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $getDoctrine = $this->getDoctrine()->getManager();
        $prices = $getDoctrine->getRepository("desplayBundle:cost")->findAll();

        return $this->render('default/index.html.twig',
            [
                'prices' => $prices
            ]);

    }


    /**
     * @Route("/error" , name="denied")
    */
    public function showAction(){
        return $this->render('default/error.html.twig');
    }
}
