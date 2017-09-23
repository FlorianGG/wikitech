<?php
// src/WKT/CoreBundle/EventListener/CoreExceptionListener.php
namespace WKT\CoreBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CoreExceptionListener
{
	protected $router;
	
	public function __construct($router)
	{
	    $this->router = $router;
	}

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof NotFoundHttpException) {
        	$request = $event->getRequest(); 

        	$request->getSession()->getFlashBag()->add('alert', 'Oups! La page indiquée n\'existe pas 😱 Allô ? Allô ? Y\'a personne au bout du fil ? Faut réfléchir, McFly, faut réfléchir !🤠');
			$response = new RedirectResponse($this->router->generate('wkt_core_home'));
			$event->setResponse($response);
        }else{
        	$request = $event->getRequest(); 

        	$request->getSession()->getFlashBag()->add('alert', 'Les voyages dans le temps sont beaucoup trop dangereux. Mieux vaut que je me consacre à l\'étude de l\'autre grand mystère de l\'univers : Corriger les bugs du site 😱');
			$response = new RedirectResponse($this->router->generate('wkt_core_home'));
			$event->setResponse($response);
        }
    }
}
