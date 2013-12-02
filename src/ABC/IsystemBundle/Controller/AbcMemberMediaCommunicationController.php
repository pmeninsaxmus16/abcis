<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcMemberMediaCommunication;
use ABC\IsystemBundle\Form\AbcMemberMediaCommunicationType;

/**
 * AbcMemberMediaCommunication controller.
 *
 * @Route("/isystem/admin/mediacomunication")
 */
class AbcMemberMediaCommunicationController extends Controller
{

    /**
     * Lists all AbcMemberMediaCommunication entities.
     *
     * @Route("/", name="isystem_admin_mediacommunication")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ABCIsystemBundle:AbcMemberMediaCommunication')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AbcMemberMediaCommunication entity.
     *
     * @Route("/", name="isystem_admin_mediacommunication_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcMemberMediaCommunication:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcMemberMediaCommunication();
        $form = $this->createForm(new AbcMemberMediaCommunicationType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mediacommunication_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new AbcMemberMediaCommunication entity.
     *
     * @Route("/new", name="isystem_admin_mediacommunication_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcMemberMediaCommunication();
        $form   = $this->createForm(new AbcMemberMediaCommunicationType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcMemberMediaCommunication entity.
     *
     * @Route("/{id}", name="isystem_admin_mediacommunication_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMemberMediaCommunication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMemberMediaCommunication entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AbcMemberMediaCommunication entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_mediacommunication_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMemberMediaCommunication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMemberMediaCommunication entity.');
        }

        $editForm = $this->createForm(new AbcMemberMediaCommunicationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcMemberMediaCommunication entity.
     *
     * @Route("/{id}", name="isystem_admin_mediacommunication_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcMemberMediaCommunication:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcMemberMediaCommunication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcMemberMediaCommunication entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcMemberMediaCommunicationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_mediacommunication_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcMemberMediaCommunication entity.
     *
     * @Route("/{id}", name="isystem_admin_mediacommunication_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcMemberMediaCommunication')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcMemberMediaCommunication entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_mediacommunication'));
    }

    /**
     * Creates a form to delete a AbcMemberMediaCommunication entity by id.
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
