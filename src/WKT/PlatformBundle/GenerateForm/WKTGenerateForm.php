<?php
// src/WKT/PlatformBundle/GenerateForm/WKTGenerateForm.php

namespace WKT\PlatformBundle\GenerateForm;

use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormFactory;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\ArticleModified;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Form\VideoType;
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
    return $this->generateForm($article, $id);
  }

  //Appelle la fonction qui génère un formulaire recevant un article et l'id du training
  public function generateFormArticleModified(ArticleModified $articleModified, Training $id)
  {
    return $this->generateForm($articleModified, $id);
  }

  private function generateForm($article, $id)
  {
    $parts = $this->em->getRepository('WKTPlatformBundle:Part')->getPartsByTrainingAsArray($id);

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
          }
          ))
      ->add('video', VideoType::class, array(
        'required' => false))
      ->add('save', SubmitType::class)
      ->getForm();
  }

}
