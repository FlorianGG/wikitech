<?php
// src/WKT/UserBundle/Controller/ProfileController.php

namespace WKT\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
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

       $links = $this->linksByUser($user);

       return $this->render('@FOSUser/Profile/show.html.twig', array(
           'user' => $user,
           'links' => $links,
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
}
