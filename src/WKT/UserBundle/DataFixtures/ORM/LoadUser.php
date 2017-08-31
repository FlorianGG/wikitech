<?php
// src/WKT/UserBundle/DataFixtures/ORM/LoadUser.php

namespace WKT\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WKT\UserBundle\Entity\User;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  { 
    // Liste des réseaux sociaux à ajouter
    $users = array(
      array(
        'user' => 'user1',
        'username' => 'johndoe866',
        'username_canonical' => 'johndoe866',
        'email' => 'johndoe@hotmail.fr',
        'email_canonical' => 'johndoe@hotmail.fr',
        'enabled' => true,
        'salt' => null,
        'password' => '$2y$13$pXfwmznbZMJMxRWLffpoduUv1elPQ2QeAyZ/lpmCYEzNQKvr4UWo.',
        'last_login' => null,
        'roles' => array(''),
        'firstname' => 'John',
        'lastname' => 'Doe'),
      array(
        'user' => 'user2',
        'username' => 'floriangarcia866',
        'username_canonical' => 'floriangarcia866',
        'email' => 'florian-garcia@hotmail.fr',
        'email_canonical' => 'florian-garcia@hotmail.fr',
        'enabled' => true,
        'salt' => null,
        'password' => '$2y$13$pXfwmznbZMJMxRWLffpoduUv1elPQ2QeAyZ/lpmCYEzNQKvr4UWo.',
        'last_login' => null,
        'roles' => array(''),
        'firstname' => 'Florian',
        'lastname' => 'Garcia'),
      array(
        'user' => 'user3',
        'username' => 'martymacfly866',
        'username_canonical' => 'martymacfly866',
        'email' => 'martymacfly@hotmail.fr',
        'email_canonical' => 'martymacfly@hotmail.fr',
        'enabled' => false,
        'salt' => null,
        'password' => '$2y$13$pXfwmznbZMJMxRWLffpoduUv1elPQ2QeAyZ/lpmCYEzNQKvr4UWo.',
        'roles' => array(''),
        'firstname' => 'Marty',
        'lastname' => 'MacFly')
        );


    foreach ($users as $newUser) {
      // On crée la catégorie
      $user = new User();
      $user
        ->setUsername($newUser['username'])
        ->setUsernameCanonical($newUser['username_canonical'])
        ->setEmail($newUser['email'])
        ->setEmailCanonical($newUser['email_canonical'])
        ->setEnabled($newUser['enabled'])
        ->setSalt($newUser['salt'])
        ->setPassword($newUser['password'])
        ->setRoles($newUser['roles'])
        ->setFirstname($newUser['firstname'])
        ->setLastname($newUser['lastname']);
      // On la persiste
      $manager->persist($user);
      // On déclenche l'enregistrement de toutes les catégories
      $manager->flush();
      $this->addReference($newUser['user'], $user);
    }
  }

  /**
  * Get the order of this fixture
  * @return integer
  */
  public function getOrder()
  {
    return 1;
  }
}
