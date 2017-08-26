<?php
// src/WKT/PlatformBundle/DataFixtures/ORM/LoadPart.php

namespace WKT\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WKT\PlatformBundle\Entity\Part;

class LoadPart extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $parts = array(
      array(
        'part' => 'part1-0',
        'title' => 'Introduction',
        'orderInTraining' => 1,
        'isEnabled' => true,
        'training' => 'training1'),
      array(
        'part' => 'part1-1',
        'title' => 'Créer un nouveau document',
        'orderInTraining' => 2,
        'isEnabled' => true,
        'training' => 'training1'),
      array(
        'part' => 'part1-3',
        'title' => 'C\'est parti pour le publipostage',
        'orderInTraining' => 4,
        'isEnabled' => true,
        'training' => 'training1'),
      array(
        'part' => 'part1-4',
        'title' => 'Pour conclure',
        'orderInTraining' => 5,
        'isEnabled' => true,
        'training' => 'training1'),
      array(
        'part' => 'part1-2',
        'title' => 'Créer votre mise en page',
        'orderInTraining' => 3,
        'isEnabled' => true,
        'training' => 'training1'),
      array(
        'part' => 'part2-1',
        'title' => 'Créer votre premier tableau',
        'orderInTraining' => 2,
        'isEnabled' => true,
        'training' => 'training2'),
      array(
        'part' => 'part2-2',
        'title' => 'Les fonctions recherches',
        'orderInTraining' => 3,
        'isEnabled' => true,
        'training' => 'training2'),
      array(
        'part' => 'part2-3',
        'title' => 'Les tableaux croisé-dynamiques',
        'orderInTraining' => 4,
        'isEnabled' => true,
        'training' => 'training2'),
      array(
        'part' => 'part2-4',
        'title' => 'Les graphiques croisé-dynamiques',
        'orderInTraining' => 5,
        'isEnabled' => true,
        'training' => 'training2'),
      array(
        'part' => 'part3-1',
        'title' => 'Créer un nouveau slide',
        'orderInTraining' => 2,
        'isEnabled' => true,
        'training' => 'training3'),
      array(
        'part' => 'part3-2',
        'title' => 'Créer vos animations',
        'orderInTraining' => 3,
        'isEnabled' => true,
        'training' => 'training3'),
      array(
        'part' => 'part2-0',
        'title' => 'Introduction',
        'orderInTraining' => 1,
        'isEnabled' => true,
        'training' => 'training2'),
      array(
        'part' => 'part2-5',
        'title' => 'Pour conclure',
        'orderInTraining' => 6,
        'isEnabled' => true,
        'training' => 'training2'),
      array(
        'part' => 'part3-0',
        'title' => 'Introduction',
        'orderInTraining' => 1,
        'isEnabled' => true,
        'training' => 'training3'),
      array(
        'part' => 'part3-3',
        'title' => 'Pour conclure',
        'orderInTraining' => 4,
        'isEnabled' => true,
        'training' => 'training3')

    );


    foreach ($parts as $newPart) {
      // On crée la catégorie
      $part = new Part();
      $part->setTitle($newPart['title']);
      $part->setIsEnabled($newPart['isEnabled']);
      $part->setTraining($this->getReference($newPart['training']));
      $part->setOrderInTraining($newPart['orderInTraining']);
      // On la persiste
      $manager->persist($part);
      // On déclenche l'enregistrement de toutes les catégories
      $manager->flush();
      $this->addReference($newPart['part'], $part);
    }


  }

  /**
  * Get the order of this fixture
  * @return integer
  */
  public function getOrder()
  {
    return 3;
  }
}
