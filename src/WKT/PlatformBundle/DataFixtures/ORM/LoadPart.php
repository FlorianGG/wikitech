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
        'training' => 'training1'),
      array(
        'part' => 'part1-1',
        'title' => 'Créer un nouveau document',
        'training' => 'training1'),
      array(
        'part' => 'part1-3',
        'title' => 'C\'est parti pour le publipostage',
        'training' => 'training1'),
      array(
        'part' => 'part1-4',
        'title' => 'Pour conclure',
        'training' => 'training1'),
      array(
        'part' => 'part1-2',
        'title' => 'Créer votre mise en page',
        'training' => 'training1'),
      array(
        'part' => 'part2-1',
        'title' => 'Créer votre premier tableau',
        'training' => 'training2'),
      array(
        'part' => 'part2-2',
        'title' => 'Les fonctions recherches',
        'training' => 'training2'),
      array(
        'part' => 'part2-3',
        'title' => 'Les tableaux croisé-dynamiques',
        'training' => 'training2'),
      array(
        'part' => 'part2-4',
        'title' => 'Les graphiques croisé-dynamiques',
        'training' => 'training2'),
      array(
        'part' => 'part3-1',
        'title' => 'Créer un nouveau slide',
        'training' => 'training3'),
      array(
        'part' => 'part3-2',
        'title' => 'Créer vos animations',
        'training' => 'training3'),
      array(
        'part' => 'part2-0',
        'title' => 'Introduction',
        'training' => 'training2'),
      array(
        'part' => 'part2-5',
        'title' => 'Pour conclure',
        'training' => 'training2'),
      array(
        'part' => 'part3-0',
        'title' => 'Introduction',
        'training' => 'training3'),
      array(
        'part' => 'part3-3',
        'title' => 'Pour conclure',
        'training' => 'training3')

    );


    foreach ($parts as $newPart) {
      // On crée la catégorie
      $part = new Part();
      $part->setTraining($this->getReference($newPart['training']));
      $part->setTitle($newPart['title']);

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
    return 2;
  }
}
