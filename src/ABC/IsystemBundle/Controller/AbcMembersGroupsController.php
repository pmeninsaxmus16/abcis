<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcMembersGroups;
use ABC\IsystemBundle\Form\AbcMembersGroupsType;

/**
 * AbcMembersGroups controller.
 *
 * @Route("/isystem/admin/membersgroups")
 */
class AbcMembersGroupsController extends Controller
{

    /**
     * Lists all AbcMembersGroups entities.
     *
     * @Route("/", name="isystem_admin_membersgroups")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ABCIsystemBundle:AbcMembersGroups')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AbcMembersGroups entity.
     *
     * @Route("/", name="isystem_admin_membersgroups_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcMembersGroups:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcMembersGroups();
        $form = $this->createForm(new AbcMembersGroupsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_membersgroups_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcMembersGroups entity.
     *
     * @Route("/new", name="isystem_admin_membersgroups_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcMembersGroups();
        $form   = $this->createForm(new AbcMembersGroupsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcMembersGroups entity.
     *
     * @Route("/{id}", name="isystem_admin_membersgroups_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMembersGroups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMembersGroups entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcMembersGroups entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_membersgroups_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMembersGroups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMembersGroups entity.');
        }

        $editForm = $this->createForm(new AbcMembersGroupsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcMembersGroups entity.
     *
     * @Route("/{id}", name="isystem_admin_membersgroups_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcMembersGroups:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMembersGroups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMembersGroups entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcMembersGroupsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_membersgroups_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcMembersGroups entity.
     *
     * @Route("/{id}", name="isystem_admin_membersgroups_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcMembersGroups')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcMembersGroups entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_membersgroups'));
    }

    /**
     * Creates a form to delete a AbcMembersGroups entity by id.
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
