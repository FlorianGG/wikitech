<?php
// src/WKT/UserBundle/DataFixtures/ORM/LoadSocial.php

namespace WKT\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WKT\UserBundle\Entity\Social;

class LoadSocial extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  { 
    // Liste des réseaux sociaux à ajouter
    $socials = array(
      array(
        'logo' => 'fa fa-facebook-square',
        'name' => 'Facebook'),
      array(
        'logo' => 'fa fa-twitter-square',
        'name' => 'Twitter'),
      array(
        'logo' => 'fa fa-instagram',
        'name' => 'Instagram'),
      array(
        'logo' => 'fa fa-google-plus-square',
        'name' => 'Google +'),
      array(
        'logo' => 'fa fa-github-square',
        'name' => 'GitHub'),
      array(
        'logo' => 'fa fa-dribbble',
        'name' => 'Dribble'),
      array(
        'logo' => 'fa fa-youtube',
        'name' => 'Youtube'),
      array(
        'logo' => 'fa fa-tumblr-square',
        'name' => 'Tumblr'),
      array(
        'logo' => 'fa fa-linkedin-square',
        'name' => 'LinkedIn'),
      array(
        'logo' => 'fa fa-viadeo-square',
        'name' => 'Viadeo'),
      array(
        'logo' => 'fa fa-at',
        'name' => 'Site internet'),
      array(
        'logo' => 'fa fa-pinterest-square',
        'name' => 'Pinterest'),
    );


    foreach ($socials as $newSocial) {
      // On crée la catégorie
      $social = new Social();
      
      $social->setLogo($newSocial['logo']);
      $social->setName($newSocial['name']);

      // On la persiste
      $manager->persist($social);
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
    return 7;
  }
}
