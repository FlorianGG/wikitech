<?php

namespace WKT\PlatformBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WKT\PlatformBundle\Repository\TrainingRepository;

class PartType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        var_dump($options['data']);
        $id = $options['data'];
        $builder
            ->add('title')
            ->add('training', EntityType::class, array(
                'class' => 'WKTPlatformBundle:Training',
                'choice_label' => 'title',
                'multiple' => false,
                'query_builder' => function(TrainingRepository $repository) use($id){
                    return $repository->queryBuilderTraining($id);
                }
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WKT\PlatformBundle\Entity\Part'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wkt_platformbundle_part';
    }


}
