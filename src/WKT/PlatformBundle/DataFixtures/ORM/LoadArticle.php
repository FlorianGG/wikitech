<?php
// src/WKT/PlatformBundle/DataFixtures/ORM/LoadArticle.php

namespace WKT\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WKT\PlatformBundle\Entity\Article;

class LoadArticle extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  { 
    $introduction = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.";

    $content = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
    
    // Liste des noms de catégorie à ajouter
    $articles = array(
      //////////
      // WORD //
      //////////
      array(
        'part' => 'part1-0',        
        'video' => 'video1-1',
        'title' => 'Présentation de l\'interface',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part1-1',        
        'video' => 'video1-2',
        'title' => 'Nouveau document',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part1-1',        
        'video' => 'video1-3',
        'title' => 'Vos premiers paragraphes',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 2),
      array(
        'part' => 'part1-1',
        'video' => 'video1-7',
        'title' => 'Vos premières pages',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 3),
      array(
        'part' => 'part1-3',        
        'video' => 'video1-4',
        'title' => 'Créons notre base de données',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part1-3',
        'video' => null,
        'title' => 'On adapte la mise en page',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 2),
      array(
        'part' => 'part1-3',
        'video' => 'video1-6',
        'title' => 'On envoi nos premiers courriers',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 3),
      array(
        'part' => 'part1-2',        
        'video' => 'video1-5',
        'title' => 'Utilisations des thèmes par défauts',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part1-4',        
        'video' => null,
        'title' => 'Pour conclure',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      //////////
      // EXCEL //
      //////////
      array(
        'part' => 'part2-0',        
        'video' => null,
        'title' => 'Présentation de l\'interface',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part2-1',
        'video' => 'video2-2',
        'title' => 'Les formules de bases',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part2-1',        
        'video' => null,
        'title' => 'Tableau automatique',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 2),
      array(
        'part' => 'part2-1',        
        'video' => 'video2-3',
        'title' => 'Les filtres',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 3),
      array(
        'part' => 'part2-1',        
        'video' => 'video2-4',
        'title' => 'Les relations entre cellules',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 4),
      array(
        'part' => 'part2-3',
        'video' => null,
        'title' => 'On utilise des fonctions dans les filtres',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 3),
      array(
        'part' => 'part2-3',        
        'video' => 'video2-5',
        'title' => 'On choisit ses données',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 2),
      array(
        'part' => 'part2-3',        
        'video' => 'video2-6',
        'title' => 'On utilise les filtres',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part2-2',        
        'video' => null,
        'title' => 'Fonctions RECHERCHE',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part2-2',        
        'video' => 'video2-7',
        'title' => 'Fonction INDEX EQUIV',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 2),
      array(
        'part' => 'part2-4',
        'video' => 'video2-8',
        'title' => 'On crée le graphique',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part2-5',
        'video' => null,
        'title' => 'Pour conclure',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      //////////
      // POWERPOINT //
      //////////
      array(
        'part' => 'part3-0',        
        'video' => 'video3-1',
        'title' => 'Présentation des thèmes',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part3-0',        
        'video' => null,
        'title' => 'Présentation de l\'interface',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 2),
      array(
        'part' => 'part3-1',        
        'video' => 'video3-2',
        'title' => 'Gérer les diverses formes',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part3-1',        
        'video' => 'video3-4',
        'title' => 'Gestion des titres',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 2),
      array(
        'part' => 'part3-2',
        'video' => 'video3-5',
        'title' => 'On lance nos animations',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 2),
      array(
        'part' => 'part3-2',
        'video' => 'video3-6',
        'title' => 'On définit les évènements',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1),
      array(
        'part' => 'part3-3',        
        'video' => 'video3-7',
        'title' => 'Pour conclure',
        'introduction' => $introduction,
        'content' => $content,
        'orderInPart' => 1)
    );


    foreach ($articles as $newArticle) {
      // On crée la catégorie
      $article = new Article();
      $article->setPart($this->getReference($newArticle['part']));

      if (!is_null($newArticle['video'])) {
        $article->setVideo($this->getReference($newArticle['video']));
      }
      
      $article->setTitle($newArticle['title']);
      $article->setIntroduction($newArticle['introduction']);
      $article->setContent($newArticle['content']);
      $article->setOrderInPart($newArticle['orderInPart']);

      // On la persiste
      $manager->persist($article);
      // On déclenche l'enregistrement de toutes les catégories
      $manager->flush();
    }
  }

  /**
  * Get the order of this fixture
  * @return integer
  */
  public function getOrder()
  {
    return 5;
  }
}
