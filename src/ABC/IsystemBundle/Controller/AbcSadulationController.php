<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcSadulation;
use ABC\IsystemBundle\Form\AbcSadulationType;

/**
 * AbcSadulation controller.
 *
 * @Route("/isystem/admin/mtto/saludation")
 */
class AbcSadulationController extends Controller
{

    /**
     * Lists all AbcSadulation entities.
     *
     * @Route("/", defaults={"page"= 1 }, name="isystem_admin_mtto_saludation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();

        /*$entities = $em->getRepository('ABCIsystemBundle:AbcSadulation')->findAll();

        return array(
            'entities' => $entities,
        );*/
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcSadulation')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag;
    }



    /**
     * Creates a new AbcSadulation entity.
     *
     * @Route("/", name="isystem_admin_mtto_saludation_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcSadulation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcSadulation();
        $form = $this->createForm(new AbcSadulationType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_saludation', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcSadulation entity.
     *
     * @Route("/new", name="isystem_admin_mtto_saludation_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcSadulation();
        $form   = $this->createForm(new AbcSadulationType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcSadulation entity.
     *
     * @Route("/{id}", name="isystem_admin_mtto_saludation_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcSadulation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcSadulation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcSadulation entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_saludation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcSadulation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcSadulation entity.');
        }

        $editForm = $this->createForm(new AbcSadulationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcSadulation entity.
     *
     * @Route("/{id}", name="isystem_admin_mtto_saludation_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcSadulation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcSadulation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcSadulation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcSadulationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_saludation', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcSadulation entity.
     *
     * @Route("/{id}", name="isystem_admin_mtto_saludation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcSadulation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcSadulation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_saludation'));
    }

    /**
     * Creates a form to delete a AbcSadulation entity by id.
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
