<?php

namespace AppBundle\Service;

use AppBundle\Entity\Customer;
use AppBundle\Entity\CustomerVehicle;
use AppBundle\Entity\VehicleManifacturer;
use AppBundle\Entity\VehicleTrim;
use AppBundle\Entity\VehicleType;
use AppBundle\Entity\VehicleUsage;

class DBPopulater
{

    private function readXml($path)
    {
        if(file_exists($path)){
            $contents = file_get_contents($path);
            $contents = str_replace('-','', $contents);
            return json_decode($contents);          
        }
        return false; 
    }

    public function populateDatabase($em, $path){
        $arr = $this->readXml($path);
        //$em = $doctrine->getManager();
        if($arr){
            //top level is xml tag
            foreach ($arr->xml->Vehicle as $data) {
                print_r($data);
                $customer = $this->addCustomerEntry($data);
                $em->persist($customer);
                $em->flush();
                $manufacturer = $this->addVehiclemanufacturerEntry($data);
                $em->persist($manufacturer);
                $em->flush();
                $type = $this->addVehicleType($data, $em);
                $em->persist($type);
                $em->flush();
                $usage = $this->addVehicleUsage($data, $em);
                $em->persist($usage);
                $em->flush();
                $trim = $this->addVehicleTrim($data, $manufacturer->getId(), $type->getId());
                $em->persist($trim);
                $em->flush();
                $customerVehicle = $this->addCustomerVehicle($data, $customer->getId(), $trim->getID(), $type->getId(), $usage->getId());
                $em->persist($customerVehicle);
                $em->flush();
            }
        }   
    }

    private function addCustomerEntry($data){
        $customer = new Customer();
        $customer->setName($data->owner_name);
        $customer->setCompany($data->owner_company);
        $customer->setProfession($data->owner_profession);
        return $customer;
    }

    private function addVehiclemanufacturerEntry($data){
        $manufacturer = new VehicleManifacturer();
        $manufacturer->setmanifacturer($data->manufacturer);
        $manufacturer->setVehicleModel($data->model);
        return $manufacturer;
    }

    private function addVehicleType($data, $doctrine){
        $existingType = $doctrine->getRepository('AppBundle:VehicleType')->findOneBy(array('vehicleType'=>$data->type));
        if(empty($existingType)){
            $type = new VehicleType();
            $type->setVehicleType($data->type);
            return $type;
        }
        return $existingType;
    }

    private function addVehicleUsage($data, $doctrine){
        $existingUsage = $doctrine->getRepository('AppBundle:VehicleUsage')->findOneBy(array('vehicleUsage'=>$data->usage));
        if(empty($existingUsage)){
            $usage = new VehicleUsage();
            $usage->setVehicleUsage($data->usage);
            return $usage;
        }
        return $existingUsage;
    }

    private function addVehicleTrim($data, $manufacturerId, $vehicleType){
        $trim = new VehicleTrim();
        $trim->setVehicleModelId($manufacturerId);
        $trim->setVehicleType($vehicleType);
        $trim->setVehicleTransmission($data->transmission);
        $trim->setWeightCategory($data->weight_category);
        $trim->setTotalSeats($data->no_seats);
        if(isset($data->has_boot)){
           $trim->setHasBoot($data->has_boot); 
        }else{
            $trim->setHasBoot(false);
        }
        if($data->is_hgv == "true"){
            $trim->setIsHgv(true);
        }else{
            $trim->setIsHgv(false);
        }
        
        $trim->setHasSunroof($data->sunroof);

        if($data->has_gps == "true"){
            $trim->setHasGps(true);
        }else{
            $trim->setHasGps(false);
        }
        $trim->setTotalWheels($data->no_wheels);
        $trim->setEngineCapacity($data->engine_cc);
        $trim->setTotalDoors($data->no_doors);

        return $trim;
    }

    private function addCustomerVehicle($data, $customerId, $vehicleTrimId, $vehicleTypeId, $vehicleUsageId){
        $customerVehicle = new CustomerVehicle();
        $customerVehicle->setCustomerId($customerId);
        $customerVehicle->setVehicleTrim($vehicleTrimId);
        $customerVehicle->setVehicleUsage($vehicleUsageId);
        $customerVehicle->setLicensePlate($data->license_plate);
        $customerVehicle->setHasTrailer($data->has_trailer);
        $customerVehicle->setVehicleColour($data->colour);

        return $customerVehicle;
    }
}