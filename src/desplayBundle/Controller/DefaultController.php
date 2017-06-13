<?php

namespace desplayBundle\Controller;

use desplayBundle\Entity\cost;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use desplayBundle\Entity\people;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
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

        //$dpl = "SELECT bp FROM desplayBundle:people bp";

        $querybulder = $peopleRepository->getRepository('desplayBundle:people')
            ->createQueryBuilder('bp');
        if ($request->query->getAlnum('filter')) {
            $querybulder->where('bp.arrival LIKE :arrival')
                ->setParameter('arrival', '%' . $request->query->getAlnum('filter') . '%');
        }
        $query = $querybulder->getQuery();

        //$form = $this->createFormBuilder()->setMethod('GET')->add('search',TextType::class)->getForm();
        //$form->handleRequest($request);


        $paginator  = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)


        );


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
        $getDoctrine = $this->getDoctrine()->getManager();


        $tent = $getDoctrine->getRepository('desplayBundle:cost')->find('tent');
        $tentRent = $getDoctrine->getRepository('desplayBundle:cost')->find('tentRent');
        $caravanRent = $getDoctrine->getRepository('desplayBundle:cost')->find('caravanTent');
        $caravan = $getDoctrine->getRepository('desplayBundle:cost')->find('caravan');
        $people = $getDoctrine->getRepository('desplayBundle:cost')->find('people');

        //$cost = $this->getDoctrine()->getManager();


        //$em = $this->getDoctrine()->getManager();
        $days = $getDoctrine->getRepository('desplayBundle:people')->find($id);



        return $this->render('desplayBundle:Default:cost.html.twig',
            [
                'days' => $days,
                'tent'=> $tent,
                'tentRent'=> $tentRent,
                'caravan'=> $caravan,
                'caravanRent'=> $caravanRent,
                'people' => $people,


            ]
        );
    }
    /**
     * @Route("/email/{id}", name="email")
    **/

    public function emailSend(FormBuilderInterface $builder, array $options ,$id)
    {
        $builder->add('msn', 'textarea',array(
            'attr' => array('cols' => '5', 'rows' => '5'),
        ));

        $getDoctrine = $this->getDoctrine()->getManager();

        $user = $getDoctrine->getRepository('desplayBundle:people')->find($id);
        $email = $user->getEmail();
        echo $email;


        return $this->render('desplayBundle:email:email.html.twig', array(

        ));
    }





}
