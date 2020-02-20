<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
       
       $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            if (
                ($securityContext->isGranted('ROLE_USER')) && !($securityContext->isGranted('ROLE_ADMIN'))){

                  return $this->redirect('EspaceCompte');
            }elseif(($securityContext->isGranted('ROLE_ADMIN')) && ($securityContext->isGranted('ROLE_USER'))){

                return $this->redirect('EspaceAdmin');
            }
        }
            else{
                 return $this->redirect('login');
            }
}   
    }

