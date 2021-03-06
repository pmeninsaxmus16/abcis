<?php

namespace ABC\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\BookingBundle\Entity\BkResourceCategory;
use ABC\BookingBundle\Form\BkResourceCategoryType;

/**
 * BkResourceCategory controller.
 *
 * @Route("/booking/mtto/bkresourcecategory")
 */
class BkResourceCategoryController extends Controller
{

    /**
     * Lists all BkResourceCategory entities.
     *
     * @Route("/{page}",defaults={"page"=1} ,name="booking_mtto_bkresourcecategory")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('BookingBundle:BkResourceCategory')->findAll();

        return array(
            'entities' => $entities,
        );*/
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('BookingBundle:BkResourceCategory')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag;
    }
    /**
     * Creates a new BkResourceCategory entity.
     *
     * @Route("/create", name="booking_mtto_bkresourcecategory_create")
     * @Method("POST")
     * @Template("BookingBundle:BkResourceCategory:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new BkResourceCategory();
        $form = $this->createForm(new BkResourceCategoryType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bkresourcecategory'));
           // return $this->redirect($this->generateUrl('booking_mtto_bkresourcecategory_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new BkResourceCategory entity.
     *
     * @Route("//new", name="booking_mtto_bkresourcecategory_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BkResourceCategory();
        $form   = $this->createForm(new BkResourceCategoryType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BkResourceCategory entity.
     *
     * @Route("/{id}/show", name="booking_mtto_bkresourcecategory_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkResourceCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkResourceCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BkResourceCategory entity.
     *
     * @Route("/{id}/edit", name="booking_mtto_bkresourcecategory_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkResourceCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkResourceCategory entity.');
        }

        $editForm = $this->createForm(new BkResourceCategoryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BkResourceCategory entity.
     *
     * @Route("/{id}/update", name="booking_mtto_bkresourcecategory_update")
     * @Method("PUT")
     * @Template("BookingBundle:BkResourceCategory:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkResourceCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkResourceCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BkResourceCategoryType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bkresourcecategory'));
            //return $this->redirect($this->generateUrl('booking_mtto_bkresourcecategory_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BkResourceCategory entity.
     *
     * @Route("/{id}/delete", name="booking_mtto_bkresourcecategory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookingBundle:BkResourceCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BkResourceCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('booking_mtto_bkresourcecategory'));
    }

    /**
     * Creates a form to delete a BkResourceCategory entity by id.
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
