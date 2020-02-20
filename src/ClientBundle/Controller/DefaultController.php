<?php

namespace ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('ClientBundle:Default:EspaceClient.html.twig');
    }
    public function CompteAction()
    {
    	$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('ClientBundle:Default:EspaceCompte.html.twig');
    }
}
