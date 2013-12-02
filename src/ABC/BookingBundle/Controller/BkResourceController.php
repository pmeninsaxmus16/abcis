<?php

namespace ABC\BookingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\BookingBundle\Entity\BkResource;
use ABC\BookingBundle\Form\BkResourceType;

use Guzzle\Http\Client;
use Guzzle\Plugin\Cookie\CookiePlugin;
use Guzzle\Plugin\Cookie\CookieJar\ArrayCookieJar;

/**
 * BkResource controller.
 *
 * @Route("/booking/mtto/bkresource")
 */
class BkResourceController extends Controller
{ 

    /**
     * Lists all BkResource entities.
     *
     * @Route("/{page}",defaults={"page"=1 }, name="booking_mtto_bkresource")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getEntityManager();
        /*
        $entities = $em->getRepository('BookingBundle:BkResource')->findAll();

        return array(
            'entities' => $entities,
        );*/
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('BookingBundle:BkResource')->findBy(array(), array('name'=>'ASC'));
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag; 
    }
    /**
     * Creates a new BkResource entity.
     *
     * @Route("/create", name="booking_mtto_bkresource_create")
     * @Method("POST")
     * @Template("BookingBundle:BkResource:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new BkResource();
        $form = $this->createForm(new BkResourceType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bkresource'));
          //  return $this->redirect($this->generateUrl('booking_mtto_bkresource_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new BkResource entity.
     *
     * @Route("//new", name="booking_mtto_bkresource_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BkResource();
        $form   = $this->createForm(new BkResourceType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BkResource entity.
     *
     * @Route("/{id}/show", name="booking_mtto_bkresource_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkResource')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkResource entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BkResource entity.
     *
     * @Route("/{id}/edit", name="booking_mtto_bkresource_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkResource')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkResource entity.');
        }

        $editForm = $this->createForm(new BkResourceType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BkResource entity.
     *
     * @Route("/{id}/update", name="booking_mtto_bkresource_update")
     * @Method("PUT")
     * @Template("BookingBundle:BkResource:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookingBundle:BkResource')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BkResource entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BkResourceType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('booking_mtto_bkresource'));
          //  return $this->redirect($this->generateUrl('bkresource_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BkResource entity.
     *
     * @Route("/{id}/delete", name="booking_mtto_bkresource_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookingBundle:BkResource')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BkResource entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('booking_mtto_bkresource'));
    }

    /**
     * Creates a form to delete a BkResource entity by id.
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
