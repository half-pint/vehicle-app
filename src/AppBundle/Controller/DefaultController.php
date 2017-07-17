<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Customer;

class DefaultController extends Controller
{
    /**
     * @Route("/api/customers", name="apicustomers")
     * @Method("POST")
     */
    public function customersAction(Request $request)
    {
        // replace this example code with whatever you need
        $em = $this->getDoctrine()->getManager();

        $customers = $em->getRepository('AppBundle:Customer')->findAll();
        $allData = [];
        foreach ($customers as $customer) {
            $data = [];
            $data["name"] = $customer->getName();
            $data["company"] = $customer->getCompany();
            $data["profession"] = $customer->getProfession();
            array_push($allData,$data);
        }
        $response = new Response();
        $response->setContent(json_encode($allData));

        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/customers/{id}", name="apicustomers")
     * @Method("POST")
     */
    public function singleCustomerAction($id)
    {
        // replace this example code with whatever you need
        $em = $this->getDoctrine()->getManager();

        $customer = $em->getRepository('AppBundle:Customer')->findOneBy(array('id' => $id));
        $data = [];
        $data["name"] = $customer->getName();
        $data["company"] = $customer->getCompany();
        $data["profession"] = $customer->getProfession();
        $response = new Response();
        $response->setContent(json_encode($data));

        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/vehicletrims", name="apivehicletrims")
     * @Method("POST")
     */
    public function vehicleTrimAction(Request $request)
    {
        // replace this example code with whatever you need
        $em = $this->getDoctrine()->getManager();

        $trims = $em->getRepository('AppBundle:VehicleTrim')->findAll();
        $allData = [];
        foreach ($trims as $trim) {
            $data = [];
            $data["vehicle_model_id"] = $trim->getVehicleModelId();
            $data["vehicle_type"] = $trim->getVehicleType();
            $data["vehicle_transmission"] = $trim->getVehicleTransmission();
            $data["weight_category"] = $trim->getWeightCategory();
            array_push($allData,$data);
        }
        $response = new Response();
        $response->setContent(json_encode($allData));

        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}
