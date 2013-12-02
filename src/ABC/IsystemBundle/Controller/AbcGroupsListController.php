<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcGroupsList;
use ABC\IsystemBundle\Form\AbcGroupsListType;

/**
 * AbcGroupsList controller.
 *
 * @Route("/isystem/admin/mtto/groupslist")
 */
class AbcGroupsListController extends Controller
{

    /**
     * Creates a new AbcGroupsList entity.
     *
     * @Route("/", name="isystem_admin_mtto_groupslist_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcGroupsList:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcGroupsList();
        $form = $this->createForm(new AbcGroupsListType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
	    return $this->redirect($this->generateUrl('isystem_admin_mtto_groupslist'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_groupslist_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcGroupsList entity.
     *
     * @Route("/new", name="isystem_admin_mtto_groupslist_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcGroupsList();
        $form   = $this->createForm(new AbcGroupsListType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcGroupsList entity.
     *
     * @Route("/{id}", name="isystem_admin_mtto_groupslist_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcGroupsList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcGroupsList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcGroupsList entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_groupslist_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcGroupsList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcGroupsList entity.');
        }

        $editForm = $this->createForm(new AbcGroupsListType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcGroupsList entity.
     *
     * @Route("/{id}", name="isystem_admin_mtto_groupslist_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcGroupsList:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcGroupsList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcGroupsList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcGroupsListType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
	    return $this->redirect($this->generateUrl('isystem_admin_mtto_groupslist'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_groupslist_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcGroupsList entity.
     *
     * @Route("/{id}", name="isystem_admin_mtto_groupslist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcGroupsList')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcGroupsList entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_groupslist'));
    }

    /**
     * Creates a form to delete a AbcGroupsList entity by id.
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
     * Lists all AbcGroupsList entities.
     * 
     * @Route("/", defaults={"page"= 1 }, name="isystem_admin_mtto_groupslist")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*$entities = $em->getRepository('ABCIsystemBundle:AbcGroupsList')->findAll();
        return array(
            'entities' => $entities,
        );*/       
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcGroupsList')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag;
    }




}
