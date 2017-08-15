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

	}

}
