<?php

namespace desplayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use desplayBundle\Entity\people;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Doctrine\ORM\Tools\Pagination\Paginator;
class DefaultController extends Controller
{
    /**
     * @Route("/desplay" ,name="desplay")
     * @Template()
     */
    public function indexAction(Request $request)
    {	
    	$peopleRepository =  $this->getDoctrine()->getManager();
        //$people=$peopleRepository->findAll();

        $dpl = "SELECT bp FROM desplayBundle:people bp";
        $query = $peopleRepository->createQuery($dpl);

        //$form = $this->createFormBuilder()->setMethod('GET')->add('search',TextType::class)->getForm();
        //$form->handleRequest($request);


        $paginator  = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)


        );

        /*if ($form->isSubmitted() && $form->isValid()  ) {
            die('Form submitted');
        }*/
        return array(

            //'form' => $form->createView(),
            'pagination' => $result,
            );
    }


    /**
     *
    * @param $id
    * @Route("/person/{id}" ,name="person")
    * @return \Symfony\Component\HttpFoundation\Response
    */
    

    public function showAction($id){
        $peopleRepository =  $this->getDoctrine()->getRepository('desplayBundle:people');
        $person_info = $peopleRepository->find($id);

        return $this->render('desplayBundle:Default:show.html.twig',['person_info' => $person_info ]
            );


    }

    /**
     * This to see the cost of stay in camping
     * @param $id
     * @Route("/cost/{id}", name="cost")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function numberAction($id){
        $tent = 5.5;
        $tentRent = 10;
        $caravanRent = 15;
        $caravan = 10;
        $people = 6;

        $em = $this->getDoctrine()->getManager();
        $days = $em->getRepository('desplayBundle:people')->find($id);



        return $this->render('desplayBundle:Default:cost.html.twig',
            [
                'days' => $days,
                'tent'=> $tent,
                'tentRent'=> $tentRent,
                'caravan'=> $caravan,
                'caravanRent'=> $caravanRent,
                'people' => $people

            ]
        );
    }



}
