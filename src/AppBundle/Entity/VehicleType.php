<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehicleType
 *
 * @ORM\Table(name="vehicle_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehicleTypeRepository")
 */
class VehicleType
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
     * @var string
     *
     * @ORM\Column(name="vehicle_type", type="string", length=255, unique=true)
     */
    private $vehicleType;


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
     * Set vehicleType
     *
     * @param string $vehicleType
     * @return VehicleType
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;

        return $this;
    }

    /**
     * Get vehicleType
     *
     * @return string 
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }
}
