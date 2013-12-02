<?php

namespace ABC\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\BookingBundle\Entity\BkRoom;
use ABC\BookingBundle\Form\BkRoomType;

/**
 * BkRoom controller.
 *
 * @Route("/booking/mtto/bkroom")
 */
class BkRoomController extends Controller
{

    /**
     * Lists all BkRoom entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="booking_mtto_bkroom")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getEntityManager();

     /*   $entities = $em->getRepository('BookingBundle:BkRoom')->findAll();

        return array(
            'entities' => $entities,
        );*/
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('BookingBundle:BkRoom')->findBy(array(), array('name'=>'ASC'));
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag;
    }
    /**
     * Creates a new BkRoom entity.
     *
     * @Route("/create", name="booking_mtto_bkroom_create")
     * @Method("POST")
     * @Template("BookingBundle:BkRoom:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new BkRoom();
        $form = $this->createForm(new BkRoomType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bkroom'));
            //return $this->redirect($this->generateUrl('bkroom_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new BkRoom entity.
     *
     * @Route("//new", name="booking_mtto_bkroom_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BkRoom();
        $form   = $this->createForm(new BkRoomType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BkRoom entity.
     *
     * @Route("/{id}/show", name="booking_mtto_bkroom_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkRoom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkRoom entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BkRoom entity.
     *
     * @Route("/{id}/edit", name="booking_mtto_bkroom_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkRoom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkRoom entity.');
        }

        $editForm = $this->createForm(new BkRoomType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BkRoom entity.
     *
     * @Route("/{id}/update", name="booking_mtto_bkroom_update")
     * @Method("PUT")
     * @Template("BookingBundle:BkRoom:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkRoom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkRoom entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BkRoomType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bkroom'));
           // return $this->redirect($this->generateUrl('bkroom_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BkRoom entity.
     *
     * @Route("/{id}/delete", name="booking_mtto_bkroom_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookingBundle:BkRoom')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BkRoom entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('booking_mtto_bkroom'));
    }

    /**
     * Creates a form to delete a BkRoom entity by id.
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
