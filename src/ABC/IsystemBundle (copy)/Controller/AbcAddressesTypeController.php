<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcAddressesType;
use ABC\IsystemBundle\Form\AbcAddressesTypeType;

/**
 * AbcAddressesType controller.
 *
 * @Route("/isystem/admin/mtto/addressestype")
 */
class AbcAddressesTypeController extends Controller
{


    /**
     * Creates a new AbcAddressesType entity.
     *
     * @Route("/create", name="isystem_admin_mtto_addressestype_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcAddressesType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcAddressesType();
        $entity->setCreatedDate(new \DateTime());
        $form = $this->createForm(new AbcAddressesTypeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_addressestype'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_addressestype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcAddressesType entity.
     *
     * @Route("/new", name="isystem_admin_mtto_addressestype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcAddressesType();
        
        $form   = $this->createForm(new AbcAddressesTypeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Lists all AbcAddressesType entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_addressestype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcAddressesType')->findAll();
        $entity = new AbcAddressesType();
        return array(
            'entities' => $entities,
        );
        */
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcAddressesType')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag;       
  
    }
    /**
     * Finds and displays a AbcAddressesType entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_addressestype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcAddressesType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcAddressesType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcAddressesType entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_addressestype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) 
   {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcAddressesType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcAddressesType entity.');
        }

        $editForm = $this->createForm(new AbcAddressesTypeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcAddressesType entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_addressestype_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcAddressesType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcAddressesType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcAddressesType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcAddressesTypeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('isystem_admin_mtto_addressestype_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('isystem_admin_mtto_addressestype'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcAddressesType entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_addressestype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcAddressesType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcAddressesType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_addressestype'));
    }

    /**
     * Creates a form to delete a AbcAddressesType entity by id.
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
