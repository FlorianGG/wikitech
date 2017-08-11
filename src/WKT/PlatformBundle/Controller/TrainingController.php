<?php 
// src/WKT/PlatformBundle/Controller/TrainingController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Training;


class TrainingController extends Controller
{
	public function indexAction()
	{
		$trainingRepository = $this->getDoctrine()->getManager()->getRepository('WKTPlatformBundle:Training');

		$trainings = $trainingRepository->findAll();

		return $this->render('WKTPlatformBundle:Training:index.html.twig', array('trainings' => $trainings));
	}

	public function viewAction($id)
	{
		$trainingRepository = $this->getDoctrine()->getManager()->getRepository('WKTPlatformBundle:Training');

		$training = $trainingRepository->find($id);

		return $this->render('WKTPlatformBundle:Training:view.html.twig', array('training' => $training));
	}

	public function addAction()
	{
		$em = $this->getDoctrine()->getManager();

		$training = (new Training())->setTitle('Word 2016')->setIntroduction('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

		$training2 = (new Training())->setTitle('Excel 2016')->setIntroduction('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

		$training3 = (new Training())->setTitle('PowerPoint 2016')->setIntroduction('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

		$em->persist($training);
		$em->persist($training2);
		$em->persist($training3);


		$em->flush();

		return new Response('Formations bien ajoutées');


	}
}
