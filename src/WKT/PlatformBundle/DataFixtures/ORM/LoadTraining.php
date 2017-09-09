<?php
// src/WKT/PlatformBundle/DataFixtures/ORM/LoadTraining.php

namespace WKT\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WKT\PlatformBundle\Entity\Training;

class LoadTraining extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    $introduction = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.";

    // Liste des noms de catégorie à ajouter
    $trainings = array(
      array(
        'title' => 'Word 2016',
        'homeText' => 'Apprenez à vous servir de la référence du traitement de texte',
        'introduction' => $introduction,
        'draft' => false,
        'training' => 'training1'),
      array(
        'title' => 'Excel 2016',
        'homeText' => 'Le plus célèbre des tableurs à la porté de tous',
        'introduction' => $introduction,
        'draft' => false,
        'training' => 'training2'),
      array(
        'title' => 'PowertPoint 2016',
        'homeText' => 'Le plus célèbre éditeur de présentation. Bien meilleur que Keynote 😘',
        'introduction' => $introduction,
        'draft' => false,
        'training' => 'training3'),
      array(
        'title' => 'Access 2016',
        'homeText' => 'Logiciel de gestion de base de données',
        'introduction' => $introduction,
        'draft' => true,
        'training' => 'training4')
    );

    foreach ($trainings as $newTraining) {
      // On crée la catégorie
      $training = new Training();
      $training->setTitle($newTraining['title']);
      $training->setIntroduction($newTraining['introduction']);
      $training->setHomeText($newTraining['homeText']);
      $training->setDraft($newTraining['draft']);
      // On la persiste
      $manager->persist($training);
      $manager->flush();
      $this->addReference($newTraining['training'], $training);
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
