<?php
// src/WKT/PlatformBundle/DataFixtures/ORM/LoadVideo.php

namespace WKT\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WKT\PlatformBundle\Entity\Video;

class LoadVideo extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  { 
    $author = "Nicolas Levé";
    
    // Liste des noms de catégorie à ajouter
    $videos = array(
      //////////
      // WORD //
      //////////
      array(
        'video' => 'video1-1',
        'url' => 'https://www.youtube.com/embed/yuFMwmkqnvg',
        'author' => $author),
      array(
        'video' => 'video1-2',
        'url' => 'https://www.youtube.com/embed/KHO8gznmNi8',
        'author' => $author),
      array(
        'video' => 'video1-3',
        'url' => 'https://www.youtube.com/embed/wAQn091fevo',
        'author' => $author),
      array(
        'video' => 'video1-4',
        'url' => 'https://www.youtube.com/embed/eTHyZBFo7xQ',
        'author' => $author),
      array(
        'video' => 'video1-5',
        'url' => 'https://www.youtube.com/embed/fsnhnIcu6GY',
        'author' => $author),
      array(
        'video' => 'video1-6',
        'url' => 'https://www.youtube.com/embed/6Dzkb6PIxHw',
        'author' => $author),
      array(
        'video' => 'video1-7',
        'url' => 'https://www.youtube.com/embed/64u2BK0oU8M',
        'author' => $author),
      //////////
      // EXCEL //
      //////////
      array(
        'video' => 'video2-1',
        'url' => 'https://www.youtube.com/embed/Ak1nAphLee0',
        'author' => $author),
      array(
        'video' => 'video2-2',
        'url' => 'https://www.youtube.com/embed/vigmAJAUY_Y',
        'author' => $author),
      array(
        'video' => 'video2-3',
        'url' => 'https://www.youtube.com/embed/lUAPr0ZwPuk',
        'author' => $author),
      array(
        'video' => 'video2-4',
        'url' => 'https://www.youtube.com/embed/fRmW4JUe62M',
        'author' => $author),
      array(
        'video' => 'video2-5',
        'url' => 'https://www.youtube.com/embed/yxM8Bu-DkWk',
        'author' => $author),
      array(
        'video' => 'video2-6',
        'url' => 'https://www.youtube.com/embed/dqMk4NGYNOA',
        'author' => $author),
      array(
        'video' => 'video2-7',
        'url' => 'https://www.youtube.com/embed/1b0H-VJKMho',
        'author' => $author),
      array(
        'video' => 'video2-8',
        'url' => 'https://www.youtube.com/embed/Mydnp1SqSSU',
        'author' => $author),
      //////////
      // POWERPOINT //
      //////////
      array(
        'video' => 'video3-1',
        'url' => 'https://www.youtube.com/embed/OefjC18b8YQ',
        'author' => $author),
      array(
        'video' => 'video3-2',
        'url' => 'https://www.youtube.com/embed/NInYBK02Wb8',
        'author' => $author),
      array(
        'video' => 'video3-3',
        'url' => 'https://www.youtube.com/embed/OX3oCZsZ31k',
        'author' => $author),
      array(
        'video' => 'video3-4',
        'url' => 'https://www.youtube.com/embed/AZ6nWUfPQdM',
        'author' => $author),
      array(
        'video' => 'video3-5',
        'url' => 'https://www.youtube.com/embed/CMXvATuofS8',
        'author' => $author),
      array(
        'video' => 'video3-6',
        'url' => 'https://www.youtube.com/embed/QxL5w7-qZlY',
        'author' => $author),
      array(
        'video' => 'video3-7',
        'url' => 'https://www.youtube.com/embed/Io72Hx_7Frc',
        'author' => $author),
    );


    foreach ($videos as $newVideo) {
      // On crée la catégorie
      $video = new Video();
      
      $video->setUrl($newVideo['url']);
      $video->setAuthor($newVideo['author']);

      // On la persiste
      $manager->persist($video);
      // On déclenche l'enregistrement de toutes les catégories
      $manager->flush();
      $this->addReference($newVideo['video'], $video);
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
