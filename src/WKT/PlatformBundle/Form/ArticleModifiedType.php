<?php

namespace WKT\PlatformBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WKT\PlatformBundle\Repository\TypeOfModificationRepository;

class ArticleModifiedType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('introduction')
            ->add('content')
            ->add('video', VideoType::class, array(
                'required' => false))
            ->add('commit', TextareaType::class, array(
                'attr' => array('rows' => 6),
                'required' => false))
            ->add('typeOfModification', EntityType::class, array(
                'class' => 'WKTPlatformBundle:TypeOfModification',
                'choice_label' => 'type',
                'multiple' => false,
                'expanded' => true,
                'query_builder' => function(TypeOfModificationRepository $repository){
                    return $repository->qbTypeOfModificationWithoutCreatePage();
                }))
            ->add('save', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WKT\PlatformBundle\Entity\ArticleModified'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wkt_platformbundle_articlemodified';
    }


}
