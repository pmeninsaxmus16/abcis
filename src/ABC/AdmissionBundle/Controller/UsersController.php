<?php

namespace ABC\AdmissionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\admissionBundle\Entity\Users;
use ABC\admissionBundle\Form\UsersType;
use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\Doctrine_Manager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\DBAL\DriverManager;

/**
 * Users controller.
 *
 * @Route("/admission/admin/users")
 */
class UsersController extends Controller
{


    /**
     * Finds and displays a Users entity.
     *
     * @Route("/{id}/show", name="admin_users_show")
     * @Template()
     */
    public function showAction($id)
    {
		/*
		$rsm = new \Doctrine\ORM\Query\ResultSetMapping;
		$rsm->addEntityResult('ABC\admissionBundle\Entity\Users', 'u');
		$rsm->addFieldResult('u','id','id');
		$rsm->addFieldResult('u','username','username');
		$rsm->addFieldResult('u','password','password'); */
		
        $em = $this->getDoctrine()->getEntityManager();
		//$query = $this->$em->createNativeQuery('SELECT id, id_card, username FROM user WHERE id= ?',$rsm);
		//$query->setParameter(1,$id);
		//$entity = $query->getResult();
        
		$entity = $em->getRepository('ABCadmissionBundle:Users')->find($id);
		
		

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Users.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Users entity.
     *
     * @Route("/new", name="admin_users_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Users();
        $form   = $this->createForm(new UsersType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Users entity.
     *
     * @Route("/create", name="admin_users_create")
     * @Method("post")
     * @Template("ABCadmissionBundle:Users:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Users();
        $request = $this->getRequest();
        $form    = $this->createForm(new UsersType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
			$this->setSecurePassword($entity);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_users_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Users entity.
     *
     * @Route("/{id}/edit", name="admin_users_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ABCadmissionBundle:Users')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Users entity.');
        }

        $editForm = $this->createForm(new UsersType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Users entity.
     *
     * @Route("/{id}/update", name="admin_users_update")
     * @Method("post")
     * @Template("ABCadmissionBundle:Users:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ABCadmissionBundle:Users')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Users entity.');
        }

        $editForm   = $this->createForm(new UsersType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();
	    //obtiene la contraseña actual -----------------------
	    $current_pass = $entity->getPassword();
        
		$editForm->bindRequest($request);

        if ($editForm->isValid()) {
            //evalua si la contraseña fue modificada: ------------------------
            if ($current_pass != $entity->getPassword()) {
                $this->setSecurePassword($entity);
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_users_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }	
	// añadimos esta función
	private function setSecurePassword(&$entity) {
		$entity->setSalt(md5(time()));
		$encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
		$password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
		$entity->setPassword($password);
	}

    /**
     * Deletes a Users entity.
     *
     * @Route("/{id}/delete", name="admin_users_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ABCadmissionBundle:Users')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Users entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_users'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    /**
     * Lists all Users entities.
     *
     * @Route("/{page}", defaults={"page"=1}, name="admin_users")
     * @Template()
     */
    public function indexAction($page)
    {
      $request = $this->getRequest();
      $search  = $request->query->get('search'); // get a $_GET parameter
      
      $em = $this->getDoctrine()->getManager('admission');
      $resultados = $this->container->getParameter('resultados');
      if(!$search)
          $entities = $em->getRepository('ABCAdmissionBundle:Users')->findAll();
      else{
          $entities = $em->getRepository('ABCAdmissionBundle:Users')->findUserSearch($search);
      }
      $paginator = $this->get('knp_paginator');
      $pagination = $paginator->paginate($entities,$page,$resultados);
      $pag =compact('pagination');
      $pag['page'] = $page; 
      $pag['search'] = $search;
      return $pag; 

    }
}
