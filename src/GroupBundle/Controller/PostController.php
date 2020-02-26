<?php

namespace GroupBundle\Controller;

use GroupBundle\Entity\Chat;
use GroupBundle\Entity\Membre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{

    public function  ListAction($idG)
    { $Rep =$this->getDoctrine()->getManager()->getRepository(Chat::class);
        $ChatG=$Rep->FindPostG($idG);

        return $this->render('@Group/Post/list.html.twig',array('ChatG' => $ChatG));

    }

    public function AddAction(Request $request,$id)    {
        $group =new Groups();
        $form =$this->createForm(GroupsType::class,$group);
        $form =$form->handleRequest($request);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $id = $user->getId();

        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();

            return $this->redirectToRoute('GroupList');



        }else{
            return $this->render('@Group/Groups/add.html.twig',array('form'=>$form->createView()));
        }
    }
}
