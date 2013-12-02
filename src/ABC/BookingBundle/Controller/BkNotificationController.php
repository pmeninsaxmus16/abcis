<?php

namespace ABC\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\BookingBundle\Entity\BkNotification;
use ABC\BookingBundle\Form\BkNotificationType;

/**
 * BkNotification controller.
 *
 * @Route("/booking/mtto/bknotification")
 */
class BkNotificationController extends Controller
{

    /**
     * Lists all BkNotification entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="booking_mtto_bknotification")
     * @Method("GET")
     * @Template()
     */
    
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();

       /* $entities = $em->getRepository('BookingBundle:BkNotification')->findAll();

        return array(
            'entities' => $entities,
        );*/
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('BookingBundle:BkNotification')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag;
    }
    /**
     * Creates a new BkNotification entity.
     *
     * @Route("/create", name="booking_mtto_bknotification_create")
     * @Method("POST")
     * @Template("BookingBundle:BkNotification:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new BkNotification();
        $form = $this->createForm(new BkNotificationType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bknotification_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new BkNotification entity.
     *
     * @Route("/new", name="booking_mtto_bknotification_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BkNotification();
        $form   = $this->createForm(new BkNotificationType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BkNotification entity.
     *
     * @Route("/{id}/show", name="booking_mtto_bknotification_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkNotification')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkNotification entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BkNotification entity.
     *
     * @Route("/{id}/edit", name="booking_mtto_bknotification_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkNotification')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkNotification entity.');
        }

        $editForm = $this->createForm(new BkNotificationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BkNotification entity.
     *
     * @Route("/{id}/update", name="booking_mtto_bknotification_update")
     * @Method("PUT")
     * @Template("BookingBundle:BkNotification:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkNotification')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkNotification entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BkNotificationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bknotification_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BkNotification entity.
     *
     * @Route("/{id}/delete", name="booking_mtto_bknotification_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookingBundle:BkNotification')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BkNotification entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bknotification'));
    }

    /**
     * Creates a form to delete a BkNotification entity by id.
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
