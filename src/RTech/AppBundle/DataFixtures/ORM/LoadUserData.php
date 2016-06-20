<?php

namespace RTech\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use RTech\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class LoadUserData extends  AbstractFixture implements OrderedFixtureInterface
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

        for ($i = 1; $i <= self::MAX_NB; $i++) {
            $user = new User();
            $user
                ->setLastname($faker->lastName)
                ->setFirstname($faker->firstName)
                ->setBirthday($faker->dateTimeThisYear)
                
                ->setUsername('user'.$i.'@radioTech')
                ->setEmail($i === 1 ? 'user@radioTech': $faker->email)
                ->setEnabled($i === 1 ? true : $faker->boolean())
                ->setPassword($faker->password)
                ->setRoles([User::ROLE_USER]);

            $this->setReference('user'.$i, $user);


            $manager->persist($user);
        }

        /**
         * User admin for back office
         * login: admin@pylos
         * password: admin
         */
        $admin = new User;
        $admin
            ->setUsername('admin@radioTech')
            ->setEmail('admin@radioTech')
            ->setEnabled(true)
            ->setPassword($faker->password)
            ->setRoles([User::ROLE_ADMIN])
            ->setFirstname('Admin')
            ->setLastname('User');

        $this->setReference('user'.$i, $admin);


        $manager->persist($admin);

    }


    /**
     * Encrypt password for a user
     *
     * @param $password
     * @param User $user
     * @return mixed
     */
    private function encryptPassword($password, User $user)
    {
        /** @var EncoderFactory $factory */
        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);

        return $encoder->encodePassword($password, $user->getSalt());
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
        return 1;
    }
}