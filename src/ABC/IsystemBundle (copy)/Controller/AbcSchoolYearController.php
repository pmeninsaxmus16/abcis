<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcSchoolYear;
use ABC\IsystemBundle\Form\AbcSchoolYearType;

/**
 * AbcSchoolYear controller.
 *
 * @Route("/isystem/admin/mtto/sy")
 */
class AbcSchoolYearController extends Controller
{


    /**
     * Creates a new AbcSchoolYear entity.
     *
     * @Route("/", name="isystem_admin_mtto_sy_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcSchoolYear:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcSchoolYear();
        $form = $this->createForm(new AbcSchoolYearType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_sy_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcSchoolYear entity.
     *
     * @Route("/new", name="isystem_admin_mtto_sy_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcSchoolYear();
        $form   = $this->createForm(new AbcSchoolYearType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcSchoolYear entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_sy_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcSchoolYear')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcSchoolYear entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcSchoolYear entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_sy_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcSchoolYear')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcSchoolYear entity.');
        }

        $editForm = $this->createForm(new AbcSchoolYearType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcSchoolYear entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_sy_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcSchoolYear:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcSchoolYear')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcSchoolYear entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcSchoolYearType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_sy_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcSchoolYear entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_sy_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcSchoolYear')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcSchoolYear entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_sy'));
    }

    /**
     * Creates a form to delete a AbcSchoolYear entity by id.
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
     * Lists all AbcSchoolYear entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_sy")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcSchoolYear')->findAll();
        return array(
            'entities' => $entities,
        );
        */
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcSchoolYear')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag;
        
    }    
}
