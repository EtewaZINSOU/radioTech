<?php

namespace RTech\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, array('label' => false))
            ->add('lastname', TextType::class, array('label' => false))
            ->add('firstname', TextType::class, array('label' => false))
            
           /**->add('birthday', DateType::class, array(
                'input'  => 'timestamp',
                'widget' => 'choice',
            ))**/
            ->add('birthday', BirthdayType::class, array('label' => false))
            ->remove('username')

    ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(array(
            'data_class' => 'RTech\UserBundle\Entity\User',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
        ));
    }

}
