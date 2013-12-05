<?php

namespace ABC\AdmissionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\AdmissionBundle\Entity\Applicant;
use ABC\AdmissionBundle\Entity\Results;
use ABC\AdmissionBundle\Form\ApplicantType;
use ABC\AdmissionBundle\Form\ResultsType;

/**
 * Applicant controller.
 *
 * @Route("/admission/applicant")
 */
class ApplicantController extends Controller
{
     /**
     * Lists layoutApplicante entities.
     *
     * @Route("/form", name="admission_applicants")
     * @Method("GET")
     * @Template()
     */
    public function applicantAction()
    {
       $entity = new Applicant();
       $form   = $this->createForm(new ApplicantType(), $entity);
       return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            );
    }
    /**
     * Lists all Applicant entities.
     *
     * @Route("/", name="abcis_admission_applicant")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager("admission");

        $entities = $em->getRepository('ABCAdmissionBundle:Applicant')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Applicant entity.
     *
     * @Route("/", name="abcis_admission_applicant_create")
     * @Method("POST")
     * @Template("ABCAdmissionBundle:Applicant:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Applicant();
        $form = $this->createForm(new ApplicantType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager("admission");
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('abcis_admission_applicant_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Applicant entity.
     *
     * @Route("/new", name="abcis_admission_applicant_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Applicant();
        $form   = $this->createForm(new ApplicantType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Applicant entity.
     *
     * @Route("/{id}", name="abcis_admission_applicant_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager("admission");

        $entity = $em->getRepository('ABCAdmissionBundle:Applicant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Applicant entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Applicant entity.
     *
     * @Route("/{id}/edit", name="abcis_admission_applicant_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager("admission");

        $entity = $em->getRepository('ABCAdmissionBundle:Applicant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Applicant entity.');
        }

        $editForm = $this->createForm(new ApplicantType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Applicant entity.
     *
     * @Route("/{id}", name="abcis_admission_applicant_update")
     * @Method("PUT")
     * @Template("ABCAdmissionBundle:Applicant:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager("admission");

        $entity = $em->getRepository('ABCAdmissionBundle:Applicant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Applicant entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ApplicantType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('abcis_admission_applicant_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Applicant entity.
     *
     * @Route("/{id}", name="abcis_admission_applicant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager("admission");
            $entity = $em->getRepository('ABCAdmissionBundle:Applicant')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Applicant entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('abcis_admission_applicant'));
    }

    /**
     * Creates a form to delete a Applicant entity by id.
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
