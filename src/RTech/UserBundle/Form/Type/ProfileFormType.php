<?php

namespace RTech\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->remove('username')
            ->remove('current_password')
            ->add('lastname', TextType::class, array('label' => 'form.nom', 'translation_domain' => 'FOSUserBundle'))
            ->add('firstname', TextType::class, array('label' => 'form.prenom', 'translation_domain' => 'FOSUserBundle'))
            ->add('birthday', TextType::class, array('label' => 'form.prenom', 'translation_domain' => 'FOSUserBundle'))
            ->add('birthday',DateType::class, array(
                'input'  => 'datetime',
                'widget' => 'single_text',
            ))
        ;
            
    }


    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RTech\UserBundle\Entity\User',
            'csrf_token_id' => 'profile',
        ));
    }
}
