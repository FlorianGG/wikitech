<?php
// src/WKT/CoreBundle/Form/Type/ContactType.php

namespace WKT\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Votre nom'))
            ->add('email', EmailType::class, array(
                'label' => 'Votre email'))
            ->add('subject', TextType::class, array(
                'label' => 'Titre de votre email'))
            ->add('body', TextareaType::class, array(
                'label' => 'Contenu de l\'email'))
            ->add('Envoyer', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-success')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WKT\CoreBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wkt_corebundle_contact';
    }
}
