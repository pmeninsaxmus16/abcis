<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcPosition;
use ABC\IsystemBundle\Form\AbcPositionType;

/**
 * AbcPosition controller.
 *
 * @Route("/isystem/admin/mtto/position")
 */
class AbcPositionController extends Controller
{


    /**
     * Creates a new AbcPosition entity.
     *
     * @Route("/", name="isystem_admin_mtto_position_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcPosition:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcPosition();
        $form = $this->createForm(new AbcPositionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_position'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_position_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcPosition entity.
     *
     * @Route("/new", name="isystem_admin_mtto_position_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcPosition();
        $form   = $this->createForm(new AbcPositionType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcPosition entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_position_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcPosition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcPosition entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcPosition entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_position_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcPosition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcPosition entity.');
        }

        $editForm = $this->createForm(new AbcPositionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcPosition entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_position_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcPosition:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcPosition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcPosition entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcPositionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_position'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_position_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcPosition entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_position_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcPosition')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcPosition entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_position'));
    }

    /**
     * Creates a form to delete a AbcPosition entity by id.
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
     * Lists all AbcPosition entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_position")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /* 
        $entities = $em->getRepository('ABCIsystemBundle:AbcPosition')->findAll();

        return array(
            'entities' => $entities,
        );
        */
        
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcPosition')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag; 
       
    }    
}
