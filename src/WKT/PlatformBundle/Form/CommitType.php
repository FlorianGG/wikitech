<?php

namespace WKT\PlatformBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WKT\PlatformBundle\Repository\TypeOfModificationRepository;

class CommitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content')
            ->add('typeOfModification', EntityType::class, array(
                'class' => 'WKTPlatformBundle:TypeOfModification',
                'choice_label' => 'type',
                'multiple' => false,
                'expanded' => true,
                'query_builder' => function(TypeOfModificationRepository $repository){
                    return $repository->qbTypeOfModificationWithoutCreatePage();
                }));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WKT\PlatformBundle\Entity\Commit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wkt_platformbundle_commit';
    }


}
