<?php 
// src/WKT/PlatformBundle/Controller/TrainingController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class TrainingController extends Controller
{
	public function indexAction()
	{
		return $this->render('WKTPlatformBundle:Training:index.html.twig');
	}

	public function viewAction($id)
	{

	}
}
