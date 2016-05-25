<?php

namespace RTech\AppBundle\Entity;
use RTech\AppBundle\Entity\Category;
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
     * @ORM\ManyToOne(targetEntity="RTech\UserBundle\Entity\User", cascade={"persist"}, inversedBy="medias")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="RTech\AppBundle\Entity\Category", cascade={"persist"}, inversedBy="medias")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    protected $category;

    /**
     * @ORM\Column(name="publishedDate", type="datetime")
     */
    protected $publishedDate;
    

    public function __construct()
    {
        $this->publishedDate = new \Datetime();
    }


    /**
     * Set publishedDate
     *
     * @param \DateTime $publishedDate
     *
     * @return Media
     */
    public function setPublishedDate($publishedDate)
    {
        $this->publishedDate = $publishedDate;

        return $this;
    }

    /**
     * Get publishedDate
     *
     * @return \DateTime
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

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

    /**
     * Set category
     *
     * @param Category $category
     *
     * @return Media
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    
}
