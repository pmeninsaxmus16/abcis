<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcIdType;
use ABC\IsystemBundle\Form\AbcIdTypeType;

/**
 * AbcIdType controller.
 *
 * @Route("/isystem/admin/mtto/idtype")
 */
class AbcIdTypeController extends Controller
{


    /**
     * Creates a new AbcIdType entity.
     *
     * @Route("/", name="isystem_admin_mtto_idtype_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcIdType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcIdType();
        $form = $this->createForm(new AbcIdTypeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_idtype', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcIdType entity.
     *
     * @Route("/new", name="isystem_admin_mtto_idtype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcIdType();
        $form   = $this->createForm(new AbcIdTypeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcIdType entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_idtype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcIdType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcIdType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcIdType entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_idtype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcIdType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcIdType entity.');
        }

        $editForm = $this->createForm(new AbcIdTypeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcIdType entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_idtype_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcIdType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ABCIsystemBundle:AbcIdType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcIdType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcIdTypeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_idtype', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcIdType entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_idtype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcIdType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcIdType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_idtype'));
    }

    /**
     * Creates a form to delete a AbcIdType entity by id.
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
     * Lists all AbcIdType entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_idtype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcIdType')->findAll();
        return array(
            'entities' => $entities,
        );
        */  
        
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcIdType')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag; 
    }    
}
