<?php

namespace WKT\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array(
            'label' => 'Prénom'))
            ->remove('username')
            ->remove('current_password')
            ->add('lastname', TextType::class, array(
            'label' => 'Nom'))
            ->add('additionalName', TextType::class, array(
            'label' => 'Nom complémentaire'))
            ->add('biography', TextareaType::class, array(
            'label' => 'Biographie'))
            ->add('company', TextType::class, array(
            'label' => 'Nom de votre entreprise'))
            ->add('url', TextType::class, array(
            'label' => 'Url de votre site'))
            ->add('twitter', TextType::class, array(
            'attr' => array('placeholder' => 'Url de votre compte Twitter')))
            ->add('github', TextType::class, array(
            'attr' => array('placeholder' => 'Url de votre compte Github')));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }
    
    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }


}
