<?php 
// src/WKT/UserBundle/Controller/UserController.php

namespace WKT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\UserBundle\Entity\User;
use WKT\UserBundle\Repository\UserRepository;


class UserController extends Controller
{
	public function promoteUserAction(Request $request, User $id)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getDoctrine()->getRepository("WKTUserBundle:User")->find($id);
		$user->addRole("ROLE_ADMIN");
		$em->persist($user);
		$em->flush();

		$request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur' . $user->getUsername() . ' a bien été promu 🤠');

		return $this->redirectToRoute('wkt_user_index');
	}

	public function demoteUserAction(Request $request, User $id)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getDoctrine()->getRepository("WKTUserBundle:User")->find($id);
		$user->removeRole("ROLE_ADMIN");
		$user->addRole("");
		$em->persist($user);
		$em->flush();

		$request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur' . $user->getUsername() . ' a bien été retrogradé 😡');

		return $this->redirectToRoute('wkt_user_index');
	}

	public function enabledUserAction(Request $request, User $id, int $activate)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getDoctrine()->getRepository("WKTUserBundle:User")->find($id);
		if ($activate === 0) {
			$user->setEnabled(false);
			$request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur' . $user->getUsername() . ' a bien été désactivé 😈');
		}else{
			$user->setEnabled(true);
			$request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur' . $user->getUsername() . ' a bien été activé 🤓');
		}

		$em->persist($user);
		$em->flush();

		return $this->redirectToRoute('wkt_user_index');
	}


	public function indexAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$users = $em->getRepository('WKTUserBundle:User')->findAll();

		// on crée un tableau contenant tous les users 
		// puis on calcul le confidence Score pour chacun
		$confidenceScores = [];
		foreach ($users as $user) {
			if (!array_key_exists($user->getUsername(), $confidenceScores)) {
				$confidenceScores[$user->getUsername()] = $this->container->get('wkt_user.confidence_score')->getConfidenceScore($user);
			}
		}

		return $this->render('WKTUserBundle:User:user.html.twig', array(
			'users' => $users,
			'confidenceScores' => $confidenceScores));
	}

	public function viewProfileAction(Request $request, User $id)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository('WKTUserBundle:User')->find($id);

		return $this->render('WKTUserBundle:User:viewProfile.html.twig', array(
			'user' => $user,));
	}
}
