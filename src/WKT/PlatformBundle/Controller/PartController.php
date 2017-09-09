<?php 
// src/WKT/PlatformBundle/Controller/PartController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Part;
use WKT\PlatformBundle\Entity\Training;


class PartController extends Controller
{
	public function addWithAjaxAction(Request $request, Training $id)
	{
		$part = new Part();
		$part->setTraining($id);

		if ($request->isMethod('POST')) {
			$part->setTitle($request->request->get('title'))->setOrderInTraining($request->request->get('orderInTraining'))->setIsEnabled(false);
			$em = $this->getDoctrine()->getManager();
			$em->persist($part);
			$em->flush();

			$partJson = json_encode(array(
    			'id' => $part->getId(),
    			'title' => $part->getTitle()));
			
			return new JsonResponse($partJson);
		}

	}

	public function deletePartWithoutArticleAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$parts = $em->getRepository('WKTPlatformBundle:Part')->findAll();
		$partsDeleted = 0;
		$today = new \DateTime;



		foreach ($parts as $part) {
			if (sizeof($part->getArticles()) === 0 && $part->getCreatedAt()->add(new \DateInterval('P1D')) < $today) {
				$em->remove($part);
				$partsDeleted++;
			}
		}

		$em->flush();

		if ($partsDeleted === 0) {
			$request->getSession()->getFlashBag()->add('notice', 'Aucune partie ne devait être supprimée 😜');
		}elseif($partsDeleted === 1){
			$request->getSession()->getFlashBag()->add('notice', 'Une partie a été supprimée 😝');
		}else{
			$request->getSession()->getFlashBag()->add('notice', $partsDeleted . ' parties ont été supprimées 😝🤗');
		}

		

		return $this->redirectToRoute('wkt_platform_add');

	}


}
