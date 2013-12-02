<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcMediaCommunication;
use ABC\IsystemBundle\Form\AbcMediaCommunicationType;

/**
 * AbcMediaCommunication controller.
 *
 * @Route("/isystem/admin/mtto/media")
 */
class AbcMediaCommunicationController extends Controller
{


    /**
     * Creates a new AbcMediaCommunication entity.
     *
     * @Route("/", name="isystem_admin_media_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcMediaCommunication:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcMediaCommunication();
        $form = $this->createForm(new AbcMediaCommunicationType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_media'));
            //return $this->redirect($this->generateUrl('isystem_admin_media_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcMediaCommunication entity.
     *
     * @Route("/new", name="isystem_admin_media_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcMediaCommunication();
        $form   = $this->createForm(new AbcMediaCommunicationType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcMediaCommunication entity.
     *
     * @Route("/{id}/show", name="isystem_admin_media_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMediaCommunication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMediaCommunication entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcMediaCommunication entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_media_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMediaCommunication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMediaCommunication entity.');
        }

        $editForm = $this->createForm(new AbcMediaCommunicationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcMediaCommunication entity.
     *
     * @Route("/{id}/update", name="isystem_admin_media_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcMediaCommunication:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMediaCommunication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMediaCommunication entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcMediaCommunicationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_media'));
            //return $this->redirect($this->generateUrl('isystem_admin_media_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcMediaCommunication entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_media_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcMediaCommunication')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcMediaCommunication entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_media'));
    }

    /**
     * Creates a form to delete a AbcMediaCommunication entity by id.
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
     * Lists all AbcMediaCommunication entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_media")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcMediaCommunication')->findAll();
        return array(
            'entities' => $entities,
        );
        */
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcMediaCommunication')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag; 
      
    }    
}
