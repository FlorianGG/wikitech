<?php 
// src/WKT/CoreBundle/Controller/CoreController.php

namespace WKT\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CoreController extends Controller
{
	public function homeAction()
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getUser();

		$trainings = $em->getRepository('WKTPlatformBundle:Training')->findBy(array('draft' => false));
		$userTrainings = $em->getRepository('WKTUserBundle:UserTraining')->findBy(array('user' => $user));
		$trainingsBeginned = $this->container->get('wkt_user.training_is_finished')->getTrainingsBeginnedStatus($userTrainings);

		//on récupère les 3 premiers users au leaderboard général
		$users = $em->getRepository('WKTUserBundle:User')->findBy(array('enabled' => true), array('nbPoint' => 'DESC'), 3, 0);

		return $this->render('WKTCoreBundle:Core:home.html.twig', array(
			'trainings' => $trainings,
			'trainingsBeginned' => $trainingsBeginned,
			'users' => $users));
	}

	public function leaderboardAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$trainings = $em->getRepository('WKTPlatformBundle:Training')->findBy(array('draft' => false));
		$topTrainings = [];
		if (!is_null($trainings)) {
			foreach ($trainings as $training) {
				$topTrainings[$training->getTitle()] = array(
					'training' => $training,
					'top' => $this->container->get('wkt_user.confidence_score')->getContributionScoreByTraining($training),
				);
			}
		}
		
		$users = $em->getRepository('WKTUserBundle:User')->findBy(array('enabled' => true), array('nbPoint' => 'DESC'));

		return $this->render('WKTCoreBundle:Core:leaderboard.html.twig', array(
			'users' => $users,
			'topTrainings' => $topTrainings));

	}


	public function contributionAction()
	{
		return $this->render('WKTCoreBundle:Core:contribution.html.twig');
	}

	public function projectAction()
	{
		return $this->render('WKTCoreBundle:Core:project.html.twig');
	}

	public function cguAction()
	{
		return $this->render('WKTCoreBundle:Core:cgu.html.twig');
	}

	public function legalAction()
	{
		return $this->render('WKTCoreBundle:Core:legal.html.twig');
	}

	public function profilAdvantageAction()
	{
		return $this->render('WKTCoreBundle:Core:profilAdvantage.html.twig');
	}
}
