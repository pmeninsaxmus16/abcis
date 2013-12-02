<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcMembers;
use ABC\IsystemBundle\Form\AbcMembersType;
use ABC\IsystemBundle\Form\AbcMembersStudentType;

use ABC\IsystemBundle\Entity\AbcMembersGroups;

/**
 * AbcMembers controller.
 *
 * @Route("/isystem/admin/members")
 */
class AbcMembersController extends Controller
{
 /**
     * Lists all search entities.
     *
     * @Route("/search", name="isystem_admin_members_search")
     * @Template()
     */
    public function searchAction()
    {
    $isAjax = $this->get('Request')->isXMLhttpRequest();
    if($isAjax){
	$search = $this->get('request')->request->get('search');
        $em = $this->getDoctrine()->getEntityManager();
        $membersBd = $em->getRepository('ABCIsystemBundle:AbcMembers')->findMembersSearch($search);
        //$valor = $this->render('ABCIsystemBundle:Members:search.html.twig' , array('entities'=>$entities));
        $resultados = $this->container->getParameter('resultados');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($membersBd,1,$resultados);
        $pagination->setUsedRoute('isystem_admin_members');
        $pagination->setParam('search', $search);
        $members =compact('pagination');
        $members['search']= $search;
        return new Response( $this->renderView('ABCIsystemBundle:AbcMembers:membersTable.html.twig' , $members));
    }	
    return new Response('');
	
     }	
 /**
     * Lists all AbcTribe entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_members")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
      $request = $this->getRequest();
      $search  = $request->query->get('search'); // get a $_GET parameter
      
      $em = $this->getDoctrine()->getManager();
      $resultados = $this->container->getParameter('resultados');
      if(!$search)
          $entities = $em->getRepository('ABCIsystemBundle:AbcMembers')->findAll();
      else{
          $entities = $em->getRepository('ABCIsystemBundle:AbcMembers')->findMembersSearch($search);
      }
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page'] = $page; 
      $pag['search'] = $search;
      return $pag;   
    }    
    /**
     * Creates a new AbcMembers entity.
     *
     * @Route("/", name="isystem_admin_members__create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcMembers:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcMembers();
        $form = $this->createForm(new AbcMembersType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_members__show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcMembers entity.
     *
     * @Route("/new", name="isystem_admin_members__new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $member = new AbcMembers();
        $group  = new AbcMembersGroups();
        $member->getGroups()->add($group);
        $form   = $this->createForm(new AbcMembersType(), $member);

        return array(
            'entity' => $member,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcMembers entity.
     *
     * @Route("/{id}", name="isystem_admin_members__show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMembers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMembers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcMembers $member.
     *
     * @Route("/{id}/edit", name="isystem_admin_members__edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id, Request $request)
    {
    $em = $this->getDoctrine()->getManager();
    $member = $em->getRepository('ABCIsystemBundle:AbcMembers')->find($id);

    if (!$member) {
        throw $this->createNotFoundException('No task found for is '.$id);
    }

    $editForm = $this->createForm(new AbcMembersStudentType(), $member);
    $deleteForm = $this->createDeleteForm($id);
       return array(
                'member'      => $member,
                'form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'errors'=>''
       );
    }
    
    /**
     * Displays a form to edit an existing AbcMembers $member.
     *
     * @Route("/{id}/student/edit", name="isystem_admin_student__edit")
     * @Method("GET")
     * @Template()
     */
    public function editStudentAction($id)
    {
    $em = $this->getDoctrine()->getManager();
    $member = $em->getRepository('ABCIsystemBundle:AbcMembers')->find($id);
    $memberGroup = $em->getRepository('ABCIsystemBundle:AbcStudents')->findOneBy(array('member'=>$id));
    if (!$member) {
        throw $this->createNotFoundException('No task found for is '. $id);
    }
    
    if (!$memberGroup) {
          $group = $memberGroup=0;
    }else $group = $memberGroup->getClassYear();
    $editForm = $this->createForm(new AbcMembersStudentType(), $member);
    $deleteForm = $this->createDeleteForm($id);
       return array(
                'memberType'  =>'students',
                'member'      => $member,
                'memberGroup' => $group,
                'form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'errors'=>''
       );
    }

    /**
     * Edits an existing AbcMembers entity.
     *
     * @Route("/{id}/student/update", name="isystem_admin_student__update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcMembers:editStudent.html.twig")
     */
    public function updateStudentAction(Request $request,$id)
    {
    $errores='';
    $em = $this->getDoctrine()->getManager();
    $member = $em->getRepository('ABCIsystemBundle:AbcMembers')->find($id);
    $memberPhoto = $em->getRepository('ABCIsystemBundle:AbcPhoto')->find($id);
    if (!$member){
        throw $this->createNotFoundException('No Member found for is '.$id);
    }
    
    $deleteForm = $this->createDeleteForm($id);
    $editForm = $this->createForm(new AbcMembersStudentType(), $member);
    $editForm->bind($request);
    if($editForm->isValid()) {
        
        $streams = fopen('/var/www/abcis/pic.jpg','rb');
       
        //we want the real file not a path, so:
        //$memberPhoto->setFichier(stream_get_contents($stream));
        
   $data = fread($streams, filesize('/var/www/abcis/pic.jpg'));
  $data = addslashes($data);
$memberPhoto->setPhoto($data);
$memberPhoto->setWeight(185);
$memberPhoto->setType('jpg');
$memberPhoto->setSize('185');
$memberPhoto->setIp();
$memberPhoto->setPhotoname('pic'  );
$memberPhoto->setMember($id);
        $em->persist($memberPhoto);
        $em->flush();
        $em->persist($member);
        $em->flush();
        // Redirige de nuevo a alguna página de edición
        return $this->redirect($this->generateUrl('isystem_admin_student__edit', array('id' => $id)));
    }else{
        $errores = $this->get('validator')->validate( $editForm);  
        
    }
        return array(
                'member' => $member,
                'form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'errors' =>  $errores
            );
    }
    /**
     * Deletes a AbcMembers entity.
     *
     * @Route("/{id}", name="isystem_admin_members__delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcMembers')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcMembers entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_members_'));
    }

    /**
     * Creates a form to delete a AbcMembers entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
