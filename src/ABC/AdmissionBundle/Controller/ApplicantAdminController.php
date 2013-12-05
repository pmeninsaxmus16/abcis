<?php

namespace ABC\AdmissionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\AdmissionBundle\Entity\Applicant;
use ABC\AdmissionBundle\Entity\Results;
use ABC\AdmissionBundle\Form\ApplicantAdminType;
use ABC\AdmissionBundle\Form\ResultsType;

/**
 * Applicant controller.
 *
 * @Route("/admission/admin/applicant")
 */
class ApplicantAdminController extends Controller
{

    
    /**
     * Lists all search entities.
     *
     * @Route("/search", name="admission_admin_applicant_search")
     * @Template()
     */
    public function searchAction()
    {
    $isAjax = $this->get('Request')->isXMLhttpRequest();
    if($isAjax){
	$search = $this->get('request')->request->get('search');

        $em = $this->getDoctrine()->getEntityManager('admission');
        $applicantBd = $em->getRepository('ABCAdmissionBundle:Applicant')->findApplicantSearch($search);        
        $resultados = $this->container->getParameter('resultados');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($applicantBd,1,$resultados);
        $pagination->setUsedRoute('admission_admin_applicant');
        $pagination->setParam('search', $search);
        $results =compact('pagination');
        $results['search']= $search;
        return new Response( $this->renderView('ABCAdmissionBundle:ApplicantAdmin:applicantTable.html.twig' , $results));
    }	
    return new Response('');
	
     }	
     
     
    /**
     * Lists all Applicant entities.
     *
    * @Route("/{page}",defaults={"page"= 1 }, name="admission_admin_applicant")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
      
      $request = $this->getRequest();
      $search  = $request->query->get('search');  
        
      $em = $this->getDoctrine()->getManager('admission');      
      $resultados = $this->container->getParameter('resultados');
      
      if(!$search)
          $results = $em->getRepository('ABCAdmissionBundle:Applicant')->findApplicant();
      else{
           $results = $em->getRepository('ABCAdmissionBundle:Applicant')->findApplicantSearch($search);
      }
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($results, $page, $resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      $pag['results']= $results;
      $pag['search'] = $search;
      return $pag; 
    }
    
    
    
    /**
     * Finds and displays a Applicant entity.
     *
     * @Route("/{id}/show", name="admission_admin_applicant_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
      $em = $this->getDoctrine()->getManager('admission');
      
      $applicant = $em->getRepository('ABCAdmissionBundle:Applicant')->find($id);      
      if (!$applicant) { throw $this->createNotFoundException('Unable to find Applicant entity.'); }
      
      $result = $em->getRepository('ABCAdmissionBundle:Applicant')->findResults($id);        
       if (!$result) { $resultRecord=array(); }
       else $resultRecord=$result[0];
               
       $school = $em->getRepository('ABCAdmissionBundle:Applicant')->findSchool($id);
       if (!$school) { $schoolRecord=array(); }
       else $schoolRecord=$school[0];
        
       $previousSchool = $em->getRepository('ABCAdmissionBundle:SchoolRecord')->findOneBy(array('applicant'=>$id, 'isCurrent'=>'false'));	
       if (!$previousSchool) { $previousSchool='';}
       else {$previousSchool=array($previousSchool);}              
       
       $contact= $em->getRepository('ABCAdmissionBundle:Applicant')->findContact($id);
       if (!$contact) { $contactRecord=array(); }
        else { $contactRecord=$contact[0];}
                        
       $results= $em->getRepository('ABCAdmissionBundle:Applicant')->findResult($id);
       if (!$results) { $results=''; }       
            
        $deleteForm = $this->createDeleteForm($id);
        
return array( 'applicant'=>$applicant,    'result'   => $resultRecord,
              'school'	=> $schoolRecord, 'previous'=> $previousSchool,
              'contact'	=> $contact,      'results'	=> $results,
              'delete_form' => $deleteForm->createView(),
        );
    }  
    
    
    
    /**
     * Creates a new Applicant entity.
     *
     * @Route("/", name="admission_admin_applicant_create")
     * @Method("POST")
     * @Template("ABCAdmissionBundle:ApplicantAdmin:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Applicant();
        $form = $this->createForm(new ApplicantAdminType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager('admission');
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admission_admin_applicant_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Applicant entity.
     *
     * @Route("/new", name="admission_admin_applicant_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Applicant();
        $form   = $this->createForm(new ApplicantAdminType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    

    /**
     * Displays a form to edit an existing Applicant entity.
     *
     * @Route("/{id}/edit", name="admission_admin_applicant_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
         $em = $this->getDoctrine()->getManager('admission');
      
        //$entity = $em->getRepository('ABCAdmissionBundle:Applicant')->find($id);
        $entity =$em->getRepository('ABCAdmissionBundle:Applicant')->findApplicant();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Applicant entity.');
        }

        $editForm = $this->createForm(new ApplicantAdminType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Applicant entity.
     *
     * @Route("/{id}", name="admission_admin_applicant_update")
     * @Method("PUT")
     * @Template("ABCAdmissionBundle:ApplicantAdmin:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager('admission');

        $entity = $em->getRepository('ABCAdmissionBundle:Applicant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Applicant entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ApplicantAdminType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admission_admin_applicant_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Applicant entity.
     *
     * @Route("/{id}", name="admission_admin_applicant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager('admission');
            $entity = $em->getRepository('ABCAdmissionBundle:Applicant')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Applicant entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admission_admin_applicant'));
    }

    /**
     * Creates a form to delete a Applicant entity by id.
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
