<?php

namespace WKT\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array(
            'label' => 'Prénom'))
            ->add('lastname', TextType::class, array(
            'label' => 'Nom'))
            ->add('username', HiddenType::class, array(
                'attr' => array('value' => '')));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
    
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }


}
