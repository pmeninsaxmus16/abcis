<?php

namespace ABC\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\BookingBundle\Entity\BkSection;
use ABC\BookingBundle\Form\BkSectionType;

/**
 * BkSection controller.
 *
 * @Route("/booking/mtto/bksection")
 */
class BkSectionController extends Controller
{

    /**
     * Lists all BkSection entities.
     *
     * @Route("/{page}",defaults={"page"=1 }, name="booking_mtto_bksection")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('BookingBundle:BkSection')->findAll();

        return array(
            'entities' => $entities,
        ); */
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('BookingBundle:BkSection')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag;
    }
    /**
     * Creates a new BkSection entity.
     *
     * @Route("/create", name="booking_mtto_bksection_create")
     * @Method("POST")
     * @Template("BookingBundle:BkSection:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new BkSection();
        $form = $this->createForm(new BkSectionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bksection'));
           // return $this->redirect($this->generateUrl('booking_mtto_bksection_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new BkSection entity.
     *
     * @Route("//new", name="booking_mtto_bksection_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BkSection();
        $form   = $this->createForm(new BkSectionType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BkSection entity.
     *
     * @Route("/{id}/show", name="booking_mtto_bksection_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkSection')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkSection entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BkSection entity.
     *
     * @Route("/{id}/edit", name="booking_mtto_bksection_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkSection')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkSection entity.');
        }

        $editForm = $this->createForm(new BkSectionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BkSection entity.
     *
     * @Route("/{id}/update", name="booking_mtto_bksection_update")
     * @Method("PUT")
     * @Template("BookingBundle:BkSection:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkSection')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkSection entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BkSectionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('booking_mtto_bksection_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BkSection entity.
     *
     * @Route("/{id}", name="booking_mtto_bksection_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookingBundle:BkSection')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BkSection entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('booking_mtto_bksection'));
    }

    /**
     * Creates a form to delete a BkSection entity by id.
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
