<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehicleManifacturer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehiclemanifacturer controller.
 *
 * @Route("vehiclemanifacturer")
 */
class VehicleManifacturerController extends Controller
{
    /**
     * Lists all vehicleManifacturer entities.
     *
     * @Route("/", name="vehiclemanifacturer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehicleManifacturers = $em->getRepository('AppBundle:VehicleManifacturer')->findAll();

        return $this->render('vehiclemanifacturer/index.html.twig', array(
            'vehicleManifacturers' => $vehicleManifacturers,
        ));
    }

    /**
     * Creates a new vehicleManifacturer entity.
     *
     * @Route("/new", name="vehiclemanifacturer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehicleManifacturer = new Vehiclemanifacturer();
        $form = $this->createForm('AppBundle\Form\VehicleManifacturerType', $vehicleManifacturer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicleManifacturer);
            $em->flush();

            return $this->redirectToRoute('vehiclemanifacturer_show', array('id' => $vehicleManifacturer->getId()));
        }

        return $this->render('vehiclemanifacturer/new.html.twig', array(
            'vehicleManifacturer' => $vehicleManifacturer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehicleManifacturer entity.
     *
     * @Route("/{id}", name="vehiclemanifacturer_show")
     * @Method("GET")
     */
    public function showAction(VehicleManifacturer $vehicleManifacturer)
    {
        $deleteForm = $this->createDeleteForm($vehicleManifacturer);

        return $this->render('vehiclemanifacturer/show.html.twig', array(
            'vehicleManifacturer' => $vehicleManifacturer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehicleManifacturer entity.
     *
     * @Route("/{id}/edit", name="vehiclemanifacturer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehicleManifacturer $vehicleManifacturer)
    {
        $deleteForm = $this->createDeleteForm($vehicleManifacturer);
        $editForm = $this->createForm('AppBundle\Form\VehicleManifacturerType', $vehicleManifacturer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehiclemanifacturer_edit', array('id' => $vehicleManifacturer->getId()));
        }

        return $this->render('vehiclemanifacturer/edit.html.twig', array(
            'vehicleManifacturer' => $vehicleManifacturer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehicleManifacturer entity.
     *
     * @Route("/{id}", name="vehiclemanifacturer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehicleManifacturer $vehicleManifacturer)
    {
        $form = $this->createDeleteForm($vehicleManifacturer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehicleManifacturer);
            $em->flush();
        }

        return $this->redirectToRoute('vehiclemanifacturer_index');
    }

    /**
     * Creates a form to delete a vehicleManifacturer entity.
     *
     * @param VehicleManifacturer $vehicleManifacturer The vehicleManifacturer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehicleManifacturer $vehicleManifacturer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehiclemanifacturer_delete', array('id' => $vehicleManifacturer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
