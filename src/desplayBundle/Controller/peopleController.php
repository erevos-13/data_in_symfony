<?php

namespace desplayBundle\Controller;

use desplayBundle\Entity\people;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Person controller.
 *
 * @Route("admin/people")
 */
class peopleController extends Controller
{
    /**
     * Lists all person entities.
     *
     * @Route("/", name="people_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $people = $em->getRepository('desplayBundle:people')->findAll();

        return array(
            'people' => $people,
        );
    }

    /**
     * Creates a new person entity.
     *
     * @Route("/new", name="people_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $person = new people();
        $form = $this->createForm('desplayBundle\Form\peopleType', $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();

            return $this->redirectToRoute('people_show', array('id' => $person->getId()));
        }

        return  array(
            'person' => $person,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a person entity.
     *
     * @Route("/{id}", name="people_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(people $person)
    {
        $deleteForm = $this->createDeleteForm($person);

        return  array(
            'person' => $person,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing person entity.
     *
     * @Route("/{id}/edit", name="people_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, people $person)
    {
        $deleteForm = $this->createDeleteForm($person);
        $editForm = $this->createForm('desplayBundle\Form\peopleType', $person);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('people_edit', array('id' => $person->getId()));
        }

        return array(
            'person' => $person,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a person entity.
     *
     * @Route("/{id}", name="people_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, people $person)
    {
        $form = $this->createDeleteForm($person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($person);
            $em->flush();
        }

        return $this->redirectToRoute('people_index');
    }

    /**
     * Creates a form to delete a person entity.
     *
     * @param people $person The person entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(people $person)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('people_delete', array('id' => $person->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
