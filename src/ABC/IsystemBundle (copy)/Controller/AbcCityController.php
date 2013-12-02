<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcCity;
use ABC\IsystemBundle\Form\AbcCityType;

/**
 * AbcCity controller.
 *
 * @Route("/isystem/admin/mtto/city")
 */
class AbcCityController extends Controller
{


    /**
     * Creates a new AbcCity entity.
     *
     * @Route("/create", name="isystem_admin_mtto_city_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcCity:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcCity();
        $form = $this->createForm(new AbcCityType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $name=trim(strtoupper($entity->getName()));
            $entity->setName($name);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_city'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_city_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcCity entity.
     *
     * @Route("/new", name="isystem_admin_mtto_city_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcCity();
        $form   = $this->createForm(new AbcCityType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcCity entity.
     *
     * @Route("/{id}/show", name="isystem_admin_mtto_city_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcCity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcCity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcCity entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_city_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcCity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcCity entity.');
        }

        $editForm = $this->createForm(new AbcCityType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcCity entity.
     *
     * @Route("/{id}/update", name="isystem_admin_mtto_city_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcCity:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcCity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcCity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcCityType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $name=trim(strtoupper($entity->getName()));
            $entity->setName($name);
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('isystem_admin_mtto_city'));
            //return $this->redirect($this->generateUrl('isystem_admin_mtto_city_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcCity entity.
     *
     * @Route("/{id}/delete", name="isystem_admin_mtto_city_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcCity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcCity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_city'));
    }

    /**
     * Creates a form to delete a AbcCity entity by id.
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
     * Lists all AbcCity entities.
     *
     * @Route("/{page}",defaults={"page"= 1 }, name="isystem_admin_mtto_city")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $entities = $em->getRepository('ABCIsystemBundle:AbcCity')->findAll();
        return array(
            'entities' => $entities,
        );
        */
      $resultados = $this->container->getParameter('resultados');
      $entities = $em->getRepository('ABCIsystemBundle:AbcCity')->findAll();
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page']= $page; 
      return $pag; 
    }
}
