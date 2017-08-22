<?php

namespace WKT\PlatformBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WKT\PlatformBundle\Repository\PartRepository;

class ArticleType extends AbstractType
{
    public function __construct(array $param)
    {
        
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // var_dump($this->request->attributes->get('id'));
        // $builder
        //     ->add('title')
        //     ->add('introduction', TextareaType::class, array(
        //         'attr' => array('class' => 'tinymce')))
        //     ->add('content', TextareaType::class, array(
        //         'attr' => array('class' => 'tinymce')))
        //     ->add('orderInPart')
        //     ->add('part', EntityType::class, array(
        //         'class' => 'WKTPlatformBundle:Part',
        //         'choice_label' => 'title',
        //         'multiple' => false,
        //         'query_builder' => function(PartRepository $repository){
        //             return $repository->qbPartsByTraining(1);
        //         }
        //         ))
        //     ->add('video', VideoType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WKT\PlatformBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wkt_platformbundle_article';
    }


}
