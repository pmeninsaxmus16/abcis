<?php

namespace ABC\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\BookingBundle\Entity\BkTimetable;
use ABC\BookingBundle\Form\BkTimetableType;

/**
 * BkTimetable controller.
 *
 * @Route("/booking/mtto/bktimetable")
 */
class BkTimetableController extends Controller
{

    /**
     * Lists all BkTimetable entities.
     *
     * @Route("/{page}",defaults={"page" = 1 }, name="booking_mtto_bktimetable")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('BookingBundle:BkTimetable')->findAll();

        return array(
            'entities' => $entities,
        );*/
        $resultados = $this->container->getParameter('resultados');
        $entities = $em->getRepository('BookingBundle:BkTimetable')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities,$page,$resultados);
        $pag =compact('pagination');
        $pag['page']= $page; 
        return $pag;
    }
    /**
     * Creates a new BkTimetable entity.
     *
     * @Route("/create", name="booking_mtto_bktimetable_create")
     * @Method("POST")
     * @Template("BookingBundle:BkTimetable:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new BkTimetable();
        $form = $this->createForm(new BkTimetableType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bktimetable'));
           // return $this->redirect($this->generateUrl('bktimetable_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new BkTimetable entity.
     *
     * @Route("//new", name="booking_mtto_bktimetable_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BkTimetable();
        $form   = $this->createForm(new BkTimetableType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BkTimetable entity.
     *
     * @Route("/{id}/show", name="booking_mtto_bktimetable_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkTimetable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkTimetable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BkTimetable entity.
     *
     * @Route("/{id}/edit", name="booking_mtto_bktimetable_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkTimetable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkTimetable entity.');
        }

        $editForm = $this->createForm(new BkTimetableType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BkTimetable entity.
     *
     * @Route("/{id}/update", name="booking_mtto_bktimetable_update")
     * @Method("PUT")
     * @Template("BookingBundle:BkTimetable:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkTimetable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkTimetable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BkTimetableType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
             return $this->redirect($this->generateUrl('booking_mtto_bktimetable'));
         //   return $this->redirect($this->generateUrl('bktimetable_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BkTimetable entity.
     *
     * @Route("/{id}/delete", name="booking_mtto_bktimetable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookingBundle:BkTimetable')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BkTimetable entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('booking_mtto_bktimetable'));
    }

    /**
     * Creates a form to delete a BkTimetable entity by id.
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
