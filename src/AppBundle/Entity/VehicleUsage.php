<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehicleUsage
 *
 * @ORM\Table(name="vehicle_usage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehicleUsageRepository")
 */
class VehicleUsage
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
     * @ORM\Column(name="vehicle_usage", type="string", length=255, unique=true)
     */
    private $vehicleUsage;


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
     * Set vehicleUsage
     *
     * @param string $vehicleUsage
     * @return VehicleUsage
     */
    public function setVehicleUsage($vehicleUsage)
    {
        $this->vehicleUsage = $vehicleUsage;

        return $this;
    }

    /**
     * Get vehicleUsage
     *
     * @return string 
     */
    public function getVehicleUsage()
    {
        return $this->vehicleUsage;
    }
}
