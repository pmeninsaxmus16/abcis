<?php

namespace ABC\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\BookingBundle\Entity\BkBookingheader;
use ABC\BookingBundle\Form\BkBookingheaderType;

/**
 * BkBookingheader controller.
 *
 * @Route("/booking/mtto/bkbookingheader")
 */
class BkBookingheaderController extends Controller
{

    /**
     * Lists all BkBookingheader entities.
     *
     * @Route("/{page}",defaults={"page"=1}, name="booking_mtto_bkbookingheader")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('BookingBundle:BkBookingheader')->findAll();

        return array(
            'entities' => $entities,
        );*/
        $resultados = $this->container->getParameter('resultados');
        $entities = $em->getRepository('BookingBundle:BkBookingheader')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities,$page,$resultados);
        $pag =compact('pagination');
        $pag['page']= $page; 
        return $pag;
    }
    /**
     * Creates a new BkBookingheader entity.
     *
     * @Route("/create", name="booking_mtto_bkbookingheader_create")
     * @Method("POST")
     * @Template("BookingBundle:BkBookingheader:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new BkBookingheader();
        $form = $this->createForm(new BkBookingheaderType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
             return $this->redirect($this->generateUrl('booking_mtto_bkbookingheader'));
          //  return $this->redirect($this->generateUrl('booking_mtto_bkbookingheader_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new BkBookingheader entity.
     *
     * @Route("/new", name="booking_mtto_bkbookingheader_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BkBookingheader();
        $form   = $this->createForm(new BkBookingheaderType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BkBookingheader entity.
     *
     * @Route("/{id}/show", name="booking_mtto_bkbookingheader_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkBookingheader')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkBookingheader entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BkBookingheader entity.
     *
     * @Route("/{id}/edit", name="booking_mtto_bkbookingheader_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkBookingheader')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkBookingheader entity.');
        }

        $editForm = $this->createForm(new BkBookingheaderType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BkBookingheader entity.
     *
     * @Route("/{id}", name="booking_mtto_bkbookingheader_update")
     * @Method("PUT")
     * @Template("BookingBundle:BkBookingheader:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkBookingheader')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkBookingheader entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BkBookingheaderType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bkbookingheader_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BkBookingheader entity.
     *
     * @Route("/{id}", name="booking_mtto_bkbookingheader_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookingBundle:BkBookingheader')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BkBookingheader entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bkbookingheader'));
    }

    /**
     * Creates a form to delete a BkBookingheader entity by id.
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
