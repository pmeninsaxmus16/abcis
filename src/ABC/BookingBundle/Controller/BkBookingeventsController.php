<?php

namespace ABC\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\BookingBundle\Entity\BkBookingevents;
use ABC\BookingBundle\Form\BkBookingeventsType;

/**
 * BkBookingevents controller.
 *
 * @Route("/booking/mtto/bkbookingevents")
 */
class BkBookingeventsController extends Controller
{

    /**
     * Lists all BkBookingevents entities.
     *
     * @Route("/{page}",defaults={"page"=1}, name="booking_mtto_bkbookingevents")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('BookingBundle:BkBookingevents')->findAll();

        return array(
            'entities' => $entities,
        );*/
        $resultados = $this->container->getParameter('resultados');
        $entities = $em->getRepository('BookingBundle:BkBookingevents')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities,$page,$resultados);
        $pag =compact('pagination');
        $pag['page']= $page; 
        return $pag;
    }
    /**
     * Creates a new BkBookingevents entity.
     *
     * @Route("/create", name="booking_mtto_bkbookingevents_create")
     * @Method("POST")
     * @Template("BookingBundle:BkBookingevents:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new BkBookingevents();
        $form = $this->createForm(new BkBookingeventsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bkbookingevents'));
          //  return $this->redirect($this->generateUrl('booking_mtto_bkbookingevents_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new BkBookingevents entity.
     *
     * @Route("/new", name="booking_mtto_bkbookingevents_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BkBookingevents();
        $form   = $this->createForm(new BkBookingeventsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BkBookingevents entity.
     *
     * @Route("/{id}/show", name="booking_mtto_bkbookingevents_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkBookingevents')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkBookingevents entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BkBookingevents entity.
     *
     * @Route("/{id}/edit", name="booking_mtto_bkbookingevents_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkBookingevents')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkBookingevents entity.');
        }

        $editForm = $this->createForm(new BkBookingeventsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BkBookingevents entity.
     *
     * @Route("/{id}/update", name="booking_mtto_bkbookingevents_update")
     * @Method("PUT")
     * @Template("BookingBundle:BkBookingevents:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkBookingevents')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkBookingevents entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BkBookingeventsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bkbookingevents'));
          //  return $this->redirect($this->generateUrl('booking_mtto_bkbookingevents_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BkBookingevents entity.
     *
     * @Route("/{id}/delete", name="booking_mtto_bkbookingevents_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookingBundle:BkBookingevents')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BkBookingevents entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('booking_mtto_bkbookingevents'));
    }

    /**
     * Creates a form to delete a BkBookingevents entity by id.
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
