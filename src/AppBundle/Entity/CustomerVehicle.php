<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerVehicle
 *
 * @ORM\Table(name="customer_vehicle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerVehicleRepository")
 */
class CustomerVehicle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="customer_id", type="integer")
     */
    private $customerId;

    /**
     * @var int
     *
     * @ORM\Column(name="vehicle_trim", type="integer")
     */
    private $vehicleTrim;

    /**
     * @var int
     *
     * @ORM\Column(name="vehicle_usage", type="integer")
     */
    private $vehicleUsage;

    /**
     * @var string
     *
     * @ORM\Column(name="license_plate", type="string", length=10, unique=true)
     */
    private $licensePlate;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_trailer", type="boolean")
     */
    private $hasTrailer;

    /**
     * @var string
     *
     * @ORM\Column(name="vehicle_colour", type="string", length=255)
     */
    private $vehicleColour;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return CustomerVehicle
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set vehicleTrim
     *
     * @param integer $vehicleTrim
     * @return CustomerVehicle
     */
    public function setVehicleTrim($vehicleTrim)
    {
        $this->vehicleTrim = $vehicleTrim;

        return $this;
    }

    /**
     * Get vehicleTrim
     *
     * @return integer 
     */
    public function getVehicleTrim()
    {
        return $this->vehicleTrim;
    }

    /**
     * Set vehicleUsage
     *
     * @param integer $vehicleUsage
     * @return CustomerVehicle
     */
    public function setVehicleUsage($vehicleUsage)
    {
        $this->vehicleUsage = $vehicleUsage;

        return $this;
    }

    /**
     * Get vehicleUsage
     *
     * @return integer 
     */
    public function getVehicleUsage()
    {
        return $this->vehicleUsage;
    }

    /**
     * Set licensePlate
     *
     * @param string $licensePlate
     * @return CustomerVehicle
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }

    /**
     * Get licensePlate
     *
     * @return string 
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * Set hasTrailer
     *
     * @param boolean $hasTrailer
     * @return CustomerVehicle
     */
    public function setHasTrailer($hasTrailer)
    {
        $this->hasTrailer = $hasTrailer;

        return $this;
    }

    /**
     * Get hasTrailer
     *
     * @return boolean 
     */
    public function getHasTrailer()
    {
        return $this->hasTrailer;
    }

    /**
     * Set vehicleColour
     *
     * @param string $vehicleColour
     * @return CustomerVehicle
     */
    public function setVehicleColour($vehicleColour)
    {
        $this->vehicleColour = $vehicleColour;

        return $this;
    }

    /**
     * Get vehicleColour
     *
     * @return string 
     */
    public function getVehicleColour()
    {
        return $this->vehicleColour;
    }
}
