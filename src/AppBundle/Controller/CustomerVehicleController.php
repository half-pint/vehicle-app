<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CustomerVehicle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Customervehicle controller.
 *
 * @Route("customervehicle")
 */
class CustomerVehicleController extends Controller
{
    /**
     * Lists all customerVehicle entities.
     *
     * @Route("/", name="customervehicle_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $customerVehicles = $em->getRepository('AppBundle:CustomerVehicle')->findAll();

        return $this->render('customervehicle/index.html.twig', array(
            'customerVehicles' => $customerVehicles,
        ));
    }

    /**
     * Creates a new customerVehicle entity.
     *
     * @Route("/new", name="customervehicle_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $customerVehicle = new Customervehicle();
        $form = $this->createForm('AppBundle\Form\CustomerVehicleType', $customerVehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customerVehicle);
            $em->flush();

            return $this->redirectToRoute('customervehicle_show', array('id' => $customerVehicle->getId()));
        }

        return $this->render('customervehicle/new.html.twig', array(
            'customerVehicle' => $customerVehicle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a customerVehicle entity.
     *
     * @Route("/{id}", name="customervehicle_show")
     * @Method("GET")
     */
    public function showAction(CustomerVehicle $customerVehicle)
    {
        $deleteForm = $this->createDeleteForm($customerVehicle);

        return $this->render('customervehicle/show.html.twig', array(
            'customerVehicle' => $customerVehicle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing customerVehicle entity.
     *
     * @Route("/{id}/edit", name="customervehicle_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CustomerVehicle $customerVehicle)
    {
        $deleteForm = $this->createDeleteForm($customerVehicle);
        $editForm = $this->createForm('AppBundle\Form\CustomerVehicleType', $customerVehicle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('customervehicle_edit', array('id' => $customerVehicle->getId()));
        }

        return $this->render('customervehicle/edit.html.twig', array(
            'customerVehicle' => $customerVehicle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a customerVehicle entity.
     *
     * @Route("/{id}", name="customervehicle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CustomerVehicle $customerVehicle)
    {
        $form = $this->createDeleteForm($customerVehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($customerVehicle);
            $em->flush();
        }

        return $this->redirectToRoute('customervehicle_index');
    }

    /**
     * Creates a form to delete a customerVehicle entity.
     *
     * @param CustomerVehicle $customerVehicle The customerVehicle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CustomerVehicle $customerVehicle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('customervehicle_delete', array('id' => $customerVehicle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
