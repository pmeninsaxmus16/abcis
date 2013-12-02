<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcMembersContacts;
use ABC\IsystemBundle\Form\AbcMembersContactsType;

/**
 * AbcMembersContacts controller.
 *
 * @Route("/isystem/admin/membercontacts")
 */
class AbcMembersContactsController extends Controller
{

    /**
     * Lists all AbcMembersContacts entities.
     *
     * @Route("/", name="isystem_admin_membercontacts")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ABCIsystemBundle:AbcMembersContacts')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AbcMembersContacts entity.
     *
     * @Route("/", name="isystem_admin_membercontacts_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcMembersContacts:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcMembersContacts();
        $form = $this->createForm(new AbcMembersContactsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_membercontacts_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcMembersContacts entity.
     *
     * @Route("/new", name="isystem_admin_membercontacts_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcMembersContacts();
        $form   = $this->createForm(new AbcMembersContactsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcMembersContacts entity.
     *
     * @Route("/{id}", name="isystem_admin_membercontacts_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMembersContacts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMembersContacts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcMembersContacts entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_membercontacts_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMembersContacts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMembersContacts entity.');
        }

        $editForm = $this->createForm(new AbcMembersContactsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcMembersContacts entity.
     *
     * @Route("/{id}", name="isystem_admin_membercontacts_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcMembersContacts:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMembersContacts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMembersContacts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcMembersContactsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_membercontacts_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcMembersContacts entity.
     *
     * @Route("/{id}", name="isystem_admin_membercontacts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcMembersContacts')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcMembersContacts entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_membercontacts'));
    }

    /**
     * Creates a form to delete a AbcMembersContacts entity by id.
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
