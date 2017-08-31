<?php
// src/WKT/PlatformBundle/GenerateForm/WKTGenerateForm.php

namespace WKT\PlatformBundle\GenerateForm;

use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormFactory;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\ArticleModified;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Form\Type\VideoType;
use WKT\PlatformBundle\Repository\PartRepository;

class WKTGenerateForm
{
  private $em;

  public function __construct(EntityManager $entityManager, FormFactory $fromFactory )
  {
      $this->em = $entityManager;
      $this->formBuilder = $fromFactory;
  }

  //Appelle la fonction qui génère un formulaire recevant un article et l'id du training
  public function generateFormArticle(Article $article, Training $id)
  {
    return $this->generateForm($article, $id)->getForm();
  }

  //Appelle la fonction qui génère un formulaire recevant un article et l'id du training pour l'interface de validation
  public function generateFormArticleValidation(Article $article, Training $id)
  {
    return $this->generateFormValidation($article, $id)->getForm();
  }

  //Appelle la fonction qui génère un formulaire recevant un article et l'id du training pour l'interface de validation
  // mais sans le form sur orderInPart et Part
  public function generateFormArticleValidationWithoutPart(Article $article, Training $id)
  {
    return $this->generateFormValidation($article, $id)
      ->remove('part')
      ->remove('orderInPart')
      ->getForm();
  }

  //Appelle la fonction qui génère un formulaire recevant un article et l'id du training
  public function generateFormArticleModified(ArticleModified $articleModified, Training $id)
  {
    return $this->generateForm($articleModified, $id)->getForm();
  }

  private function generateForm($article, $id)
  {

    return $this->formBuilder->createBuilder(FormType::class, $article)
      ->add('title')
      ->add('introduction', TextareaType::class, array(
          'attr' => array('class' => 'tinymce')))
      ->add('content', TextareaType::class, array(
          'attr' => array('class' => 'tinymce')))
      ->add('orderInPart', HiddenType::class)
      ->add('part', EntityType::class, array(
          'class' => 'WKTPlatformBundle:Part',
          'choice_label' => 'title',
          'multiple' => false,
          'query_builder' => function(PartRepository $repository) use($id){
              return $repository->qbPartsByTraining($id);
          }))
      ->add('video', VideoType::class, array(
        'required' => false))
      ->add('save', SubmitType::class);
  }

  private function generateFormValidation($article, $id)
  {
    return $this->generateForm($article, $id)
            ->remove('save')
            ->add('coefScore', ChoiceType::class, array(
              'choices'  => array(
                    'x 2' => 2,
                    'x 1,5' => 1.5,
                    'x 1' => 1,
                    'x 0,5' => 0.5,
                    'x 0' => 0,
                  ),
              'mapped' => false,
              'multiple' => false,
              'preferred_choices' => array(1),
              ));
  }

}
