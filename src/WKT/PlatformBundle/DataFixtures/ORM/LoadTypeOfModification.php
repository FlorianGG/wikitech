<?php
// src/WKT/PlatformBundle/DataFixtures/ORM/LoadTypeOfModification.php

namespace WKT\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WKT\PlatformBundle\Entity\TypeOfModification;

class LoadTypeOfModification extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    $introduction = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.";

    // Liste des noms de catégorie à ajouter
    $typeOfModifications = array(
      array(
        'type' => 'Correction d\'une coquille',
        'value' => 5),
      array(
        'type' => 'Ajout(s) ici et là',
        'value' => 10),
      array(
        'type' => 'Modification complète',
        'value' => 30)
    );

    foreach ($typeOfModifications as $newTypeOfModification) {
      // On crée la catégorie
      $typeOfModification = new TypeOfModification();
      $typeOfModification->setType($newTypeOfModification['type']);
      $typeOfModification->setValue($newTypeOfModification['value']);
      // On la persiste
      $manager->persist($typeOfModification);
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
