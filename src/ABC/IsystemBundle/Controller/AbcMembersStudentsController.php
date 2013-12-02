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
 * @Route("/isystem/admin/students")
 */
class AbcMembersStudentsController extends Controller
{
 /**
     * Lists all search entities.
     *
     * @Route("/search", name="isystem_admin_students_search")
     * @Template()
     */
     
    public function searchAction()
    {
    $isAjax = $this->get('Request')->isXMLhttpRequest();
    if($isAjax){
	$search = $this->get('request')->request->get('search');
        $em = $this->getDoctrine()->getEntityManager();
        $studentBd = $em->getRepository('ABCIsystemBundle:AbcMembers')->findStudentSearch($search);
        //$valor = $this->render('ABCIsystemBundle:Members:search.html.twig' , array('entities'=>$entities));
        $resultados = $this->container->getParameter('resultados');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($studentBd,1,$resultados);
        $pagination->setUsedRoute('isystem_admin_students');
        $pagination->setParam('search', $search);
        $students =compact('pagination');
        $students['search']= $search;
        return new Response( $this->renderView('ABCIsystemBundle:AbcMembersStudents:membersTable.html.twig' , $students));
    }	
    return new Response('');
	
     }	
 /**
     * Lists all AbcTribe entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_students")
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
          $entities = $em->getRepository('ABCIsystemBundle:AbcMembers')->findStudent();
      else{
          $entities = $em->getRepository('ABCIsystemBundle:AbcMembers')->findStudentSearch($search);
      }
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page'] = $page; 
      $pag['search'] = $search;
      return $pag;   
    }  
    
}
