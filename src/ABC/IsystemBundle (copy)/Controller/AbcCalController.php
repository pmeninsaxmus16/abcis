<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcCal;
use ABC\IsystemBundle\Form\AbcCalType;

/**
 * AbcCal controller.
 *
 * @Route("/isystem/admin/mtto/cal")
 */
class AbcCalController extends Controller
{

    /**
     * Lists all AbcCal entities.
     *
     * @Route("/", name="isystem_admin_mtto_cal")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ABCIsystemBundle:AbcCal')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AbcCal entity.
     *
     * @Route("/", name="isystem_admin_mtto_cal_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcCal:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcCal();
        $form = $this->createForm(new AbcCalType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_cal_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcCal entity.
     *
     * @Route("/new", name="isystem_admin_mtto_cal_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcCal();
        $form   = $this->createForm(new AbcCalType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcCal entity.
     *
     * @Route("/{id}", name="isystem_admin_mtto_cal_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcCal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcCal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcCal entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mtto_cal_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcCal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcCal entity.');
        }

        $editForm = $this->createForm(new AbcCalType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcCal entity.
     *
     * @Route("/{id}", name="isystem_admin_mtto_cal_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcCal:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcCal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcCal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcCalType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mtto_cal_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcCal entity.
     *
     * @Route("/{id}", name="isystem_admin_mtto_cal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcCal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcCal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mtto_cal'));
    }

    /**
     * Creates a form to delete a AbcCal entity by id.
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
