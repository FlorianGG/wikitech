<?php
// src/WKT/PlatformBundle/Form/ArticleType.php

namespace WKT\PlatformBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Form\VideoType;
use WKT\PlatformBundle\Repository\PartRepository;
use WKT\PlatformBundle\Repository\TrainingRepository;

class ArticleType extends AbstractType
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
            ->add('orderInTraining')
            ->add('isModifying', HiddenType::class)
            ->add('video', VideoType::class)
            ->add('hasNewPart', ChoiceType::class , array(
                'choices' => array(
                    'oui' => 'Oui',
                    'non' => 'Non'),
                'multiple' => false,
                'label' => 'Souhaitez-vous créer une nouvelle partie ?'))
            ->add('save', SubmitType::class);
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();

                // this would be your entity, i.e. SportMeetup
                $article = $event->getData();
                $training = $article->getTraining();
                $hasNewPart = $article->getHasNewPart();

                if (null === $article) {
                  return; // On sort de la fonction sans rien faire lorsque $article vaut null
                }
                // si hasNewPart est vrai, on ajoute un champ texte pour entrer le nom de la nouvelle partie
                // si hasNewPart est faux, on charge un champ entityType pour obtenir toutes les parties del a formation
                if (!$hasNewPart) {
                    $form->add('part', PartType::class
                        , array( 'data' => $training->getId())
                        );
                }else(
                    $form->add('part', EntityType::class, array(
                        'class' => 'WKTPlatformBundle:Part',
                        'choice_label' => 'title',
                        'multiple' => false,
                        'query_builder' => function(PartRepository $repository) use($training){
                            return $repository->queryBuilderPartsByTraining($training);
                        }
                    ))
                );
                
            }
        );
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
