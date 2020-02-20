<?php

namespace GroupBundle\Controller;

use AppBundle\Entity\User;
use GroupBundle\Entity\Groups;
use GroupBundle\Entity\Membre;
use GroupBundle\Form\GroupsType;
use GroupBundle\Form\GroupsUpdateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class GroupsController extends Controller
{
    public function AddAction(Request $request)    {
        $group =new Groups();
        $form =$this->createForm(GroupsType::class,$group);
        $form =$form->handleRequest($request);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $id = $user->getId();

        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $group->setIdF($id);
            $membre =new Membre();
            $em->persist($group);
            $em->flush();
            $Rep =$this->getDoctrine()->getManager()->getRepository(Groups::class);
            $gr=  $Rep->findOneBy(array("idF"=>$id , "nom"=>$group->getNom()));
            var_dump($gr->getId());
            $membre->setIdG($gr);
            $membre->setIdM($user);
            $membre->setDateJoin(new \DateTime());
            $em->persist($membre);
            $em->flush();
            return $this->redirectToRoute('GroupList');



        }else{
            return $this->render('@Group/Groups/add.html.twig',array('form'=>$form->createView()));
        }
    }

    public function  ListAction(){
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $idUser = $user->getId();
        $Rep =$this->getDoctrine()->getManager()->getRepository(Groups::class);
        $listgroup=$Rep->findAll();
        $Rep =$this->getDoctrine()->getManager()->getRepository(Membre::class);
        $list = $Rep->FindGroupMember($idUser);
      //  var_dump($list);

        return $this->render('@Group/Groups/list.html.twig',array('listG' => $listgroup,'listExi'=>$list,"id"=>$idUser));

    }
    public function  ListGroupFondAction()
    {    $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $id = $user->getId();

        $Rep =$this->getDoctrine()->getManager()->getRepository(Groups::class);
        $listgroup=$Rep->FindGroupFond($id);

        return $this->render('@Group/Groups/listGroupFond.html.twig',array('listG' => $listgroup));

    }
    public function updateAction(Request $request,$id)
    {

        $group = $this->getDoctrine()->getManager()->getRepository(Groups::class)->find($id);
        $form =$this->createForm(GroupsUpdateType::class,$group);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $this->getDoctrine()->getManager()->persist($group);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('GroupList');
        } else {
            return $this->render('@Group/Groups/update.html.twig', array('form' => $form->createView()));
        }

    }
    public function DeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $group =$em->getRepository(Groups::class)->find($id);

        $em->remove($group);
        $em->flush();
        return $this->redirectToRoute('GroupFondList');

    }
}
