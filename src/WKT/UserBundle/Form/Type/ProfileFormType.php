<?php

namespace WKT\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use WKT\UserBundle\Form\Type\ImageType;

class ProfileFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array(
            'label' => 'Prénom',
            'required' => true))
            ->remove('username')
            ->remove('current_password')
            ->add('image', ImageType::class, array(
                'required' => false,))
            ->add('lastname', TextType::class, array(
            'label' => 'Nom',
            'required' => true))
            ->add('additionalName', TextType::class, array(
            'label' => 'Nom complémentaire',
            'required' => false))
            ->add('biography', TextareaType::class, array(
            'label' => 'Biographie',
            'required' => false))
            ->add('company', TextType::class, array(
            'label' => 'Nom de votre entreprise',
            'required' => false))
            ->add('locality', TextType::class, array(
            'label' => 'Ville de résidence',
            'attr' => array('readonly' => true),
            'required' => false))
            ->add('country', TextType::class, array(
            'label' => 'Pays de résidence',
            'attr' => array('readonly' => true),
            'required' => false));
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
