<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcGroups;
use ABC\IsystemBundle\Form\AbcGroupsType;

/**
 * AbcGroups controller.
 *
 * @Route("/isystem/admin/mtto/groups")
 */
class AbcGroupsController extends Controller
{

    
    /**
     * Creates a new AbcGroups entity.
     *
     * @Route("/", name="isystem_admin_mtto_groups_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcGroups:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcGroups();
        $form = $this->createForm(new AbcGroupsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_groups'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_groups_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcGroups entity.
     *
     * @Route("/new", name="isystem_admin_mtto_groups_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcGroups();
        $form   = $this->createForm(new AbcGroupsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcGroups entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_groups_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcGroups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcGroups entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcGroups entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_groups_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcGroups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcGroups entity.');
        }

        $editForm = $this->createForm(new AbcGroupsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcGroups entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_groups_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcGroups:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcGroups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcGroups entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcGroupsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('isystem_admin_mtto_groups'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_groups_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcGroups entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_groups_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcGroups')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcGroups entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_groups'));
    }

    /**
     * Creates a form to delete a AbcGroups entity by id.
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
     * Lists all AbcGroups entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_groups")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcGroups')->findAll();

        return array(
            'entities' => $entities,
        );
        */
        
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcGroups')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag; 
    }    
}
