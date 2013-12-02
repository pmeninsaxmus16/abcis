<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcRelationship;
use ABC\IsystemBundle\Form\AbcRelationshipType;

/**
 * AbcRelationship controller.
 *
 * @Route("/isystem/admin/mtto/relationship")
 */
class AbcRelationshipController extends Controller
{


    /**
     * Creates a new AbcRelationship entity.
     *
     * @Route("/", name="isystem_admin_mtto_relationship_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcRelationship:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcRelationship();
        $form = $this->createForm(new AbcRelationshipType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_relationship'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_relationship_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcRelationship entity.
     *
     * @Route("/new", name="isystem_admin_mtto_relationship_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcRelationship();
        $form   = $this->createForm(new AbcRelationshipType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcRelationship entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_relationship_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcRelationship')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcRelationship entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcRelationship entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_relationship_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcRelationship')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcRelationship entity.');
        }

        $editForm = $this->createForm(new AbcRelationshipType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcRelationship entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_relationship_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcRelationship:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcRelationship')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcRelationship entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcRelationshipType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_relationship'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_relationship_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcRelationship entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_relationship_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcRelationship')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcRelationship entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_relationship'));
    }

    /**
     * Creates a form to delete a AbcRelationship entity by id.
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
     * Lists all AbcRelationship entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_relationship")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcRelationship')->findAll();
        return array(
            'entities' => $entities,
        );
        */
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcRelationship')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag;       
    }
}
