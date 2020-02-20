<?php

namespace GroupBundle\Controller;

use Cassandra\Date;
use GroupBundle\Entity\Groups;
use GroupBundle\Entity\Membre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;

class MembreController extends Controller
{


    public function joinAction($idGroup){
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $idUser = $user->getId();
        $Member=new Membre();
        $Member->setIdM($user);
        $Rep =$this->getDoctrine()->getManager()->getRepository(Groups::class);
        $Group=$Rep->find($idGroup);
        $Member->setIdG($Group);
        $Member->setDateJoin(new \DateTime());
        $em=$this->getDoctrine()->getManager();
        $em->persist($Member);
        $em->flush();
        return $this->redirectToRoute('GroupList');

    }

    public function ListGroupMembreAction(){
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $idUser = $user->getId();

        $Rep =$this->getDoctrine()->getManager()->getRepository(Membre::class);
        $list = $Rep->FindGroupMember($idUser);
     //   var_dump($list);

        return $this->render('@Group/Groups/ListGroupMembre.html.twig',array('list' => $list));

    }

    public function quitterAction($id)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $idUser = $user->getId();
        $em = $this->getDoctrine()->getManager();
        $Membre =$em->getRepository(Membre::class)->findOneBy(array("idG"=>$id,"idM"=>$idUser));
        //var_dump($Membre);
        $em->remove($Membre);
        $em->flush();
        return $this->redirectToRoute('GroupList');

    }
}
