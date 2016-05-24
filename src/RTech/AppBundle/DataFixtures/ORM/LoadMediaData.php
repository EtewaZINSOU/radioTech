<?php

namespace RTech\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use RTech\AppBundle\Entity\Media;
use RTech\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadMediaData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    const MAX_NB = 10;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // use the factory to create a Faker\Generator instance
        $faker = Factory::create();
        
        $user = new User();
        for ($i = 1; $i <= LoadUserData::MAX_NB; $i++) {
            $media = new Media();
            
            $media
                ->setTitle($faker->title)
                ->setDescrption($faker->text(100))
                ->setEmplacement('298f008a30b2ab405dfc0740b165bbe4.mpga')
                ->setUser($user);
            ;

            $manager->persist($media);
        }
    
    }

    
    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}