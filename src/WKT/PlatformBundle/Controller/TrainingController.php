<?php 
// src/WKT/PlatformBundle/Controller/TrainingController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Form\Type\TrainingType;


class TrainingController extends Controller
{
	public function viewAction(Request $request, $slugTraining)
	{
		$em = $this->getDoctrine()->getManager();
		$trainingRepository = $em->getRepository('WKTPlatformBundle:Training');

		$training = $trainingRepository->findOneBy(array('slug' => $slugTraining));

		$top = $this->container->get('wkt_user.confidence_score')->getContributionScoreByTraining($training);
		$articles= $this->container->get('wkt_platform.summary')->getArticlesByTraining($training);
		if (!empty($articles)) {
			$firstArticleNotRead = $articles[0];
		}else{
			$firstArticleNotRead = null;
		}
		if ($this->getUser()) {
			$userTraining = $em->getRepository('WKTUserBundle:UserTraining')->getUserTrainingByUserAndTraining($this->getUser(), $training);
			if (!is_null($userTraining)) {
				$firstArticleNotRead = $this->container->get('wkt_user.training_is_finished')->getFirstArticleNotRead($userTraining);
			}
			
		}
		return $this->render('WKTPlatformBundle:Training:view.html.twig', array(
			'training' => $training,
			'top' => $top,
			'articleNotRead' => $firstArticleNotRead));
	}

	public function addAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$trainings = $em->getRepository('WKTPlatformBundle:Training')->findAll();

		$training = new Training;

		$form  = $this->get('form.factory')->create(TrainingType::class, $training);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em->persist($training);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'La formation  ' . $training->getTitle() . ' a bien été crée 🤗');

			return $this->redirectToRoute('wkt_platform_add');
		}

		return $this->render('WKTPlatformBundle:Training:add.html.twig', array(
			'form' => $form->createView(),
			'trainings' => $trainings));
	}

	public function editAction(Request $request, Training $id)
	{
		$em = $this->getDoctrine()->getManager();

		$trainings = $em->getRepository('WKTPlatformBundle:Training')->findAll();

		$training = $em->getRepository('WKTPlatformBundle:Training')->find($id);

		$form  = $this->get('form.factory')->create(TrainingType::class, $training);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em->persist($training);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'La formation ' . $training->getTitle() . ' a bien été modifiée 🤓');

			return $this->redirectToRoute('wkt_platform_add');
		}

		return $this->render('WKTPlatformBundle:Training:edit.html.twig', array(
			'form' => $form->createView(),
			'trainings' => $trainings,
			'training' => $training,
			));
	}

	public function deleteAction(Request $request, Training $id)
	{
		$em = $this->getDoctrine()->getManager();

		$training = $em->getRepository('WKTPlatformBundle:Training')->find($id);

		if (is_null($training->getParts()[0])) {
			$em->remove($training);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'La formation a bien été supprimée');

			return $this->redirectToRoute('wkt_platform_add');
		}
		$request->getSession()->getFlashBag()->add('alert', 'Impossible de supprimer la formation, car cette dernière n\'est pas vide');

		return $this->redirectToRoute('wkt_platform_add');
	}

	public function draftAction(Request $request, Training $training, bool $boolean)
	{
		$em = $this->getDoctrine()->getManager();

		$training = $em->getRepository('WKTPlatformBundle:Training')->find($training);

		$training->setDraft($boolean);

		$em->persist($training);

		$em->flush();

		if ($boolean) {
			$status = 'mise en status brouillon';
		}else{
			$status = 'publiée';
		}
		$request->getSession()->getFlashBag()->add('notice', 'La formation '. $training->getTitle() . ' a bien été ' . $status);

		return $this->redirectToRoute('wkt_platform_add');
	}

	public function summaryAction(Training $id)
	{
		//utilisation du service summary qui récupère toutes les pages d'une formations activée
		//les organise par parties et dans l'ordre
		$summary = $this->container->get('wkt_platform.summary')->returnSummaryInArray($id);


		$request = $this->get('request_stack')->getMasterRequest();
		return $this->render('WKTPlatformBundle:Training:summary.html.twig', array('summary' => $summary, 'request' => $request));
	}

}
