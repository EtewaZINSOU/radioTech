<?php

namespace RTech\AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="RTech\AppBundle\Repository\MediaRepository")
 */
class Media
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
     * @ORM\Column(name="soundTitle", type="string", length=255)
     */
    private $soundTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="basePath", type="string", length=255)
     */
    private $basePath;

    /**
     * @var string
     *
     * @ORM\Column(name="descrption", type="string", length=255)
     */
    private $descrption;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255, nullable=true, unique=true)
     */
    private $extension;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set soundTitle
     *
     * @param string $soundTitle
     *
     * @return Media
     */
    public function setSoundTitle($soundTitle)
    {
        $this->soundTitle = $soundTitle;

        return $this;
    }

    /**
     * Get soundTitle
     *
     * @return string
     */
    public function getSoundTitle()
    {
        return $this->soundTitle;
    }

    /**
     * Set basePath
     *
     * @param string $basePath
     *
     * @return Media
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;

        return $this;
    }

    /**
     * Get basePath
     *
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * Set descrption
     *
     * @param string $descrption
     *
     * @return Media
     */
    public function setDescrption($descrption)
    {
        $this->descrption = $descrption;

        return $this;
    }

    /**
     * Get descrption
     *
     * @return string
     */
    public function getDescrption()
    {
        return $this->descrption;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return Media
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }
}
