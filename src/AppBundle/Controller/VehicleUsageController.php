<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehicleUsage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehicleusage controller.
 *
 * @Route("vehicleusage")
 */
class VehicleUsageController extends Controller
{
    /**
     * Lists all vehicleUsage entities.
     *
     * @Route("/", name="vehicleusage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehicleUsages = $em->getRepository('AppBundle:VehicleUsage')->findAll();

        return $this->render('vehicleusage/index.html.twig', array(
            'vehicleUsages' => $vehicleUsages,
        ));
    }

    /**
     * Creates a new vehicleUsage entity.
     *
     * @Route("/new", name="vehicleusage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehicleUsage = new Vehicleusage();
        $form = $this->createForm('AppBundle\Form\VehicleUsageType', $vehicleUsage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicleUsage);
            $em->flush();

            return $this->redirectToRoute('vehicleusage_show', array('id' => $vehicleUsage->getId()));
        }

        return $this->render('vehicleusage/new.html.twig', array(
            'vehicleUsage' => $vehicleUsage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehicleUsage entity.
     *
     * @Route("/{id}", name="vehicleusage_show")
     * @Method("GET")
     */
    public function showAction(VehicleUsage $vehicleUsage)
    {
        $deleteForm = $this->createDeleteForm($vehicleUsage);

        return $this->render('vehicleusage/show.html.twig', array(
            'vehicleUsage' => $vehicleUsage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehicleUsage entity.
     *
     * @Route("/{id}/edit", name="vehicleusage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehicleUsage $vehicleUsage)
    {
        $deleteForm = $this->createDeleteForm($vehicleUsage);
        $editForm = $this->createForm('AppBundle\Form\VehicleUsageType', $vehicleUsage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehicleusage_edit', array('id' => $vehicleUsage->getId()));
        }

        return $this->render('vehicleusage/edit.html.twig', array(
            'vehicleUsage' => $vehicleUsage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehicleUsage entity.
     *
     * @Route("/{id}", name="vehicleusage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehicleUsage $vehicleUsage)
    {
        $form = $this->createDeleteForm($vehicleUsage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehicleUsage);
            $em->flush();
        }

        return $this->redirectToRoute('vehicleusage_index');
    }

    /**
     * Creates a form to delete a vehicleUsage entity.
     *
     * @param VehicleUsage $vehicleUsage The vehicleUsage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehicleUsage $vehicleUsage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehicleusage_delete', array('id' => $vehicleUsage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
