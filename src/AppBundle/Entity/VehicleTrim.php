<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehicleTrim
 *
 * @ORM\Table(name="vehicle_trim")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehicleTrimRepository")
 */
class VehicleTrim
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
     * @ORM\Column(name="vehicle_model_id", type="integer")
     */
    private $vehicleModelId;

    /**
     * @var int
     *
     * @ORM\Column(name="vehicle_type", type="integer")
     */
    private $vehicleType;

    /**
     * @var string
     *
     * @ORM\Column(name="vehicle_transmission", type="string", length=255)
     */
    private $vehicleTransmission;

    /**
     * @var string
     *
     * @ORM\Column(name="weight_category", type="string", length=255)
     */
    private $weightCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="total_seats", type="string", length=2)
     */
    private $totalSeats;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_boot", type="boolean")
     */
    private $hasBoot;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_hgv", type="boolean")
     */
    private $isHgv;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_sunroof", type="boolean")
     */
    private $hasSunroof;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_gps", type="boolean")
     */
    private $hasGps;

    /**
     * @var string
     *
     * @ORM\Column(name="total_wheels", type="string", length=2)
     */
    private $totalWheels;

    /**
     * @var int
     *
     * @ORM\Column(name="engine_capacity", type="integer")
     */
    private $engineCapacity;

    /**
     * @var int
     *
     * @ORM\Column(name="total_doors", type="integer")
     */
    private $totalDoors;


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
     * Set vehicleModelId
     *
     * @param integer $vehicleModelId
     * @return VehicleTrim
     */
    public function setVehicleModelId($vehicleModelId)
    {
        $this->vehicleModelId = $vehicleModelId;

        return $this;
    }

    /**
     * Get vehicleModelId
     *
     * @return integer 
     */
    public function getVehicleModelId()
    {
        return $this->vehicleModelId;
    }

    /**
     * Set vehicleType
     *
     * @param integer $vehicleType
     * @return VehicleTrim
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;

        return $this;
    }

    /**
     * Get vehicleType
     *
     * @return integer 
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }

    /**
     * Set vehicleTransmission
     *
     * @param string $vehicleTransmission
     * @return VehicleTrim
     */
    public function setVehicleTransmission($vehicleTransmission)
    {
        $this->vehicleTransmission = $vehicleTransmission;

        return $this;
    }

    /**
     * Get vehicleTransmission
     *
     * @return string 
     */
    public function getVehicleTransmission()
    {
        return $this->vehicleTransmission;
    }

    /**
     * Set weightCategory
     *
     * @param string $weightCategory
     * @return VehicleTrim
     */
    public function setWeightCategory($weightCategory)
    {
        $this->weightCategory = $weightCategory;

        return $this;
    }

    /**
     * Get weightCategory
     *
     * @return string 
     */
    public function getWeightCategory()
    {
        return $this->weightCategory;
    }

    /**
     * Set totalSeats
     *
     * @param string $totalSeats
     * @return VehicleTrim
     */
    public function setTotalSeats($totalSeats)
    {
        $this->totalSeats = $totalSeats;

        return $this;
    }

    /**
     * Get totalSeats
     *
     * @return string 
     */
    public function getTotalSeats()
    {
        return $this->totalSeats;
    }

    /**
     * Set hasBoot
     *
     * @param boolean $hasBoot
     * @return VehicleTrim
     */
    public function setHasBoot($hasBoot)
    {
        $this->hasBoot = $hasBoot;

        return $this;
    }

    /**
     * Get hasBoot
     *
     * @return boolean 
     */
    public function getHasBoot()
    {
        return $this->hasBoot;
    }

    /**
     * Set isHgv
     *
     * @param boolean $isHgv
     * @return VehicleTrim
     */
    public function setIsHgv($isHgv)
    {
        $this->isHgv = $isHgv;

        return $this;
    }

    /**
     * Get isHgv
     *
     * @return boolean 
     */
    public function getIsHgv()
    {
        return $this->isHgv;
    }

    /**
     * Set hasSunroof
     *
     * @param boolean $hasSunroof
     * @return VehicleTrim
     */
    public function setHasSunroof($hasSunroof)
    {
        $this->hasSunroof = $hasSunroof;

        return $this;
    }

    /**
     * Get hasSunroof
     *
     * @return boolean 
     */
    public function getHasSunroof()
    {
        return $this->hasSunroof;
    }

    /**
     * Set hasGps
     *
     * @param boolean $hasGps
     * @return VehicleTrim
     */
    public function setHasGps($hasGps)
    {
        $this->hasGps = $hasGps;

        return $this;
    }

    /**
     * Get hasGps
     *
     * @return boolean 
     */
    public function getHasGps()
    {
        return $this->hasGps;
    }

    /**
     * Set totalWheels
     *
     * @param string $totalWheels
     * @return VehicleTrim
     */
    public function setTotalWheels($totalWheels)
    {
        $this->totalWheels = $totalWheels;

        return $this;
    }

    /**
     * Get totalWheels
     *
     * @return string 
     */
    public function getTotalWheels()
    {
        return $this->totalWheels;
    }

    /**
     * Set engineCapacity
     *
     * @param integer $engineCapacity
     * @return VehicleTrim
     */
    public function setEngineCapacity($engineCapacity)
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }

    /**
     * Get engineCapacity
     *
     * @return integer 
     */
    public function getEngineCapacity()
    {
        return $this->engineCapacity;
    }

    /**
     * Set totalDoors
     *
     * @param integer $totalDoors
     * @return VehicleTrim
     */
    public function setTotalDoors($totalDoors)
    {
        $this->totalDoors = $totalDoors;

        return $this;
    }

    /**
     * Get totalDoors
     *
     * @return integer 
     */
    public function getTotalDoors()
    {
        return $this->totalDoors;
    }
}
