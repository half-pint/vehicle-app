<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehicleManifacturer
 *
 * @ORM\Table(name="vehicle_manifacturer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehicleManifacturerRepository")
 */
class VehicleManifacturer
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
     * @ORM\Column(name="manifacturer", type="string", length=255)
     */
    private $manifacturer;

    /**
     * @var string
     *
     * @ORM\Column(name="vehicle_model", type="string", length=255)
     */
    private $vehicleModel;


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
     * Set manifacturer
     *
     * @param string $manifacturer
     * @return VehicleManifacturer
     */
    public function setManifacturer($manifacturer)
    {
        $this->manifacturer = $manifacturer;

        return $this;
    }

    /**
     * Get manifacturer
     *
     * @return string 
     */
    public function getManifacturer()
    {
        return $this->manifacturer;
    }

    /**
     * Set vehicleModel
     *
     * @param string $vehicleModel
     * @return VehicleManifacturer
     */
    public function setVehicleModel($vehicleModel)
    {
        $this->vehicleModel = $vehicleModel;

        return $this;
    }

    /**
     * Get vehicleModel
     *
     * @return string 
     */
    public function getVehicleModel()
    {
        return $this->vehicleModel;
    }
}
