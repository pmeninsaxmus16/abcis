<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcBellTimes;
use ABC\IsystemBundle\Form\AbcBellTimesType;

/**
 * AbcBellTimes controller.
 *
 * @Route("/isystem/admin/mtto/belltimes")
 */
class AbcBellTimesController extends Controller
{


    /**
     * Creates a new AbcBellTimes entity.
     *
     * @Route("/create", name="isystem_admin_mtto_belltimes_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcBellTimes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcBellTimes();
        $entity->setCreatedDate(new \DateTime());
        $form = $this->createForm(new AbcBellTimesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_belltimes'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_belltimes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcBellTimes entity.
     *
     * @Route("/new", name="isystem_admin_mtto_belltimes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcBellTimes();
        $form   = $this->createForm(new AbcBellTimesType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcBellTimes entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_belltimes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ABCIsystemBundle:AbcBellTimes')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcBellTimes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcBellTimes entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_belltimes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcBellTimes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcBellTimes entity.');
        }

        $editForm = $this->createForm(new AbcBellTimesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcBellTimes entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_belltimes_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcBellTimes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcBellTimes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcBellTimes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcBellTimesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_belltimes'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_belltimes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcBellTimes entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_belltimes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcBellTimes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcBellTimes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_belltimes'));
    }

    /**
     * Creates a form to delete a AbcBellTimes entity by id.
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
     * Lists all AbcBellTimes entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_belltimes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcBellTimes')->findAll();
        return array(
            'entities' => $entities,
        );
        */
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcBellTimes')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag; 
        
        
    }
}
