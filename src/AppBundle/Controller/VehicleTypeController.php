<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehicleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehicletype controller.
 *
 * @Route("vehicletype")
 */
class VehicleTypeController extends Controller
{
    /**
     * Lists all vehicleType entities.
     *
     * @Route("/", name="vehicletype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehicleTypes = $em->getRepository('AppBundle:VehicleType')->findAll();

        return $this->render('vehicletype/index.html.twig', array(
            'vehicleTypes' => $vehicleTypes,
        ));
    }

    /**
     * Creates a new vehicleType entity.
     *
     * @Route("/new", name="vehicletype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehicleType = new Vehicletype();
        $form = $this->createForm('AppBundle\Form\VehicleTypeType', $vehicleType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicleType);
            $em->flush();

            return $this->redirectToRoute('vehicletype_show', array('id' => $vehicleType->getId()));
        }

        return $this->render('vehicletype/new.html.twig', array(
            'vehicleType' => $vehicleType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehicleType entity.
     *
     * @Route("/{id}", name="vehicletype_show")
     * @Method("GET")
     */
    public function showAction(VehicleType $vehicleType)
    {
        $deleteForm = $this->createDeleteForm($vehicleType);

        return $this->render('vehicletype/show.html.twig', array(
            'vehicleType' => $vehicleType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehicleType entity.
     *
     * @Route("/{id}/edit", name="vehicletype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehicleType $vehicleType)
    {
        $deleteForm = $this->createDeleteForm($vehicleType);
        $editForm = $this->createForm('AppBundle\Form\VehicleTypeType', $vehicleType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehicletype_edit', array('id' => $vehicleType->getId()));
        }

        return $this->render('vehicletype/edit.html.twig', array(
            'vehicleType' => $vehicleType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehicleType entity.
     *
     * @Route("/{id}", name="vehicletype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehicleType $vehicleType)
    {
        $form = $this->createDeleteForm($vehicleType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehicleType);
            $em->flush();
        }

        return $this->redirectToRoute('vehicletype_index');
    }

    /**
     * Creates a form to delete a vehicleType entity.
     *
     * @param VehicleType $vehicleType The vehicleType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehicleType $vehicleType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehicletype_delete', array('id' => $vehicleType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
