<?php

namespace RTech\AppBundle\Entity;
use RTech\UserBundle\Entity\User;
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
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $Title;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    protected $Emplacement;

    /**
     * @var string
     *
     * @ORM\Column(name="descrption", type="string", length=255)
     */
    protected $descrption;


    /**
     * @ORM\ManyToOne(targetEntity="RTech\UserBundle\Entity\User", cascade={"persist"}, inversedBy="medias")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    protected $user;



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
     * Set title
     *
     * @param string $title
     *
     * @return Media
     */
    public function setTitle($title)
    {
        $this->Title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set emplacement
     *
     * @param string $emplacement
     *
     * @return Media
     */
    public function setEmplacement($emplacement)
    {
        $this->Emplacement = $emplacement;

        return $this;
    }

    /**
     * Get emplacement
     *
     * @return string
     */
    public function getEmplacement()
    {
        return $this->Emplacement;
    }

    

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }
}
