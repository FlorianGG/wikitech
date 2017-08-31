<?php 
// src/WKT/PlatformBundle/Controller/TrainingController.php

namespace WKT\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class CoreController extends Controller
{
	public function homeAction()
	{
		return $this->render('WKTCoreBundle:Core:home.html.twig');
	}

}
