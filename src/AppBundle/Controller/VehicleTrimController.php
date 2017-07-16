<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehicleTrim;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehicletrim controller.
 *
 * @Route("vehicletrim")
 */
class VehicleTrimController extends Controller
{
    /**
     * Lists all vehicleTrim entities.
     *
     * @Route("/", name="vehicletrim_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehicleTrims = $em->getRepository('AppBundle:VehicleTrim')->findAll();

        return $this->render('vehicletrim/index.html.twig', array(
            'vehicleTrims' => $vehicleTrims,
        ));
    }

    /**
     * Creates a new vehicleTrim entity.
     *
     * @Route("/new", name="vehicletrim_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehicleTrim = new Vehicletrim();
        $form = $this->createForm('AppBundle\Form\VehicleTrimType', $vehicleTrim);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicleTrim);
            $em->flush();

            return $this->redirectToRoute('vehicletrim_show', array('id' => $vehicleTrim->getId()));
        }

        return $this->render('vehicletrim/new.html.twig', array(
            'vehicleTrim' => $vehicleTrim,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehicleTrim entity.
     *
     * @Route("/{id}", name="vehicletrim_show")
     * @Method("GET")
     */
    public function showAction(VehicleTrim $vehicleTrim)
    {
        $deleteForm = $this->createDeleteForm($vehicleTrim);

        return $this->render('vehicletrim/show.html.twig', array(
            'vehicleTrim' => $vehicleTrim,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehicleTrim entity.
     *
     * @Route("/{id}/edit", name="vehicletrim_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehicleTrim $vehicleTrim)
    {
        $deleteForm = $this->createDeleteForm($vehicleTrim);
        $editForm = $this->createForm('AppBundle\Form\VehicleTrimType', $vehicleTrim);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehicletrim_edit', array('id' => $vehicleTrim->getId()));
        }

        return $this->render('vehicletrim/edit.html.twig', array(
            'vehicleTrim' => $vehicleTrim,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehicleTrim entity.
     *
     * @Route("/{id}", name="vehicletrim_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehicleTrim $vehicleTrim)
    {
        $form = $this->createDeleteForm($vehicleTrim);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehicleTrim);
            $em->flush();
        }

        return $this->redirectToRoute('vehicletrim_index');
    }

    /**
     * Creates a form to delete a vehicleTrim entity.
     *
     * @param VehicleTrim $vehicleTrim The vehicleTrim entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehicleTrim $vehicleTrim)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehicletrim_delete', array('id' => $vehicleTrim->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
