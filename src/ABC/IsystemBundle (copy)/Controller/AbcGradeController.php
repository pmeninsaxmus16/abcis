<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcGrade;
use ABC\IsystemBundle\Form\AbcGradeType;

/**
 * AbcGrade controller.
 *
 * @Route("/isystem/admin/mtto/grade")
 */
class AbcGradeController extends Controller
{


    /**
     * Creates a new AbcGrade entity.
     *
     * @Route("/", name="isystem_admin_mtto_grade_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcGrade:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcGrade();
        $form = $this->createForm(new AbcGradeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_grade'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_grade_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcGrade entity.
     *
     * @Route("/new", name="isystem_admin_mtto_grade_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcGrade();
        $form   = $this->createForm(new AbcGradeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcGrade entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_grade_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcGrade')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcGrade entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcGrade entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_grade_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcGrade')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcGrade entity.');
        }

        $editForm = $this->createForm(new AbcGradeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcGrade entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_grade_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcGrade:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcGrade')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcGrade entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcGradeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_grade'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_grade_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcGrade entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_grade_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcGrade')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcGrade entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_grade'));
    }

    /**
     * Creates a form to delete a AbcGrade entity by id.
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
     * Lists all AbcGrade entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_grade")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcGrade')->findAll();

        return array(
            'entities' => $entities,
        );
        */
        
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcGrade')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag; 
    }
}
