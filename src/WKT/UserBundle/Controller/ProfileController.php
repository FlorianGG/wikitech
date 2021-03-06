<?php
// src/WKT/UserBundle/Controller/ProfileController.php

namespace WKT\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use WKT\UserBundle\Entity\User;

class ProfileController extends BaseController
{
    /**
     * Show the user.
     */
    public function showAction(Request $request)
    {
       $user = $this->getUser();
       if (!is_object($user) || !$user instanceof UserInterface) {
           throw new AccessDeniedException('This user does not have access to this section.');
       }
       // on récupère les liens du user
       $links = $this->linksByUser($user);

       // on récupère les points de contributions par formation du user
       $contributionScoreByTraining = $this->container->get('wkt_user.confidence_score')->getContributionScoreByUserAndByTraining($user);

       return $this->render('@FOSUser/Profile/show.html.twig', array(
           'user' => $user,
           'links' => $links,
           'score' => $contributionScoreByTraining,
       ));
    }

    //fonction qui récupère l'ensemble des liens d'un user
    private function linksByUser(User $user)
    {
        $em = $this->getDoctrine()->getManager();

        //on récupère l'ensemble des liens du user
        $links = $em->getRepository('WKTUserBundle:Link')->findBy(array('user' => $user));

        return $links;

    }

    /**
     * Edit the user.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function editAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        /** @var $formFactory FactoryInterface */
        $formFactory = $this->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);
        $links = $this->linksByUser($user);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var $userManager UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);

            $userManager->updateUser($user);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('fos_user_profile_show');
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

            return $response;
        }

        return $this->render('@FOSUser/Profile/edit.html.twig', array(
            'form' => $form->createView(),
            'links' => $links,
        ));
    }
}
