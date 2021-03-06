<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcDepartment;
use ABC\IsystemBundle\Form\AbcDepartmentType;

/**
 * AbcDepartment controller.
 *
 * @Route("/isystem/admin/mtto/depto")
 */
class AbcDepartmentController extends Controller
{


    /**
     * Creates a new AbcDepartment entity.
     *
     * @Route("/", name="isystem_admin_mtto_depto_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcDepartment:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcDepartment();
        $form = $this->createForm(new AbcDepartmentType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_depto_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcDepartment entity.
     *
     * @Route("/new", name="isystem_admin_mtto_depto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcDepartment();
        $form   = $this->createForm(new AbcDepartmentType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcDepartment entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_depto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcDepartment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcDepartment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcDepartment entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_depto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcDepartment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcDepartment entity.');
        }

        $editForm = $this->createForm(new AbcDepartmentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcDepartment entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_depto_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcDepartment:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcDepartment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcDepartment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcDepartmentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_depto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcDepartment entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_depto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcDepartment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcDepartment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_depto'));
    }

    /**
     * Creates a form to delete a AbcDepartment entity by id.
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
    
    /**
     * Lists all AbcDepartment entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_depto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
     
        $em = $this->getDoctrine()->getManager();
     /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcDepartment')->findAll();
        return array(
            'entities' => $entities,
        );
      */  
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcDepartment')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag; 
        
    }    
    
}
