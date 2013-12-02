<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ABC\IsystemBundle\Entity\AbcPhoto;
use ABC\IsystemBundle\Form\AbcPhotoType;

/**
 * AbcPhoto controller.
 *
 * @Route("/isystem/admin/photo")
 */
class AbcPhotoController extends Controller
{

    /**
     * Lists all AbcPhoto entities.
     *
     * @Route("/upload", name="isystem_admin_upload")
     * @Method("PUT")
     * @Template()
     */
    public function imagenAction(Request $request)
    {
$targetFolder = '/var/www/abcis/web/uploads/'; // Relative to the root
$st=new Response( '0');
$_FILES=$request;
if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . '/' . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['file']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['file']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		//chmod($targetFile,0777);
		  $st = new Response( '1') ;
	} else {
		  $st = new Response('Invalid file type.') ;
	}

    }
     return $st;
    }
     public function photoUsuarioAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcPhoto')->find($id);
        $entity->setImg($entity->getPhoto());
       //return $this->render('ABCIsystemBundle:AbcPhoto:photo.html.twig');
        $response = new Response();
        $response->headers->set('Content-Type',  $entity->getType());
        $response->headers->set('Content-length', filesize( $entity->getPhoto() ));
        $response->headers->set('Connection', 'Keep-Alive');
        $response->headers->set('Accept-Ranges','bytes');
        $response->send();
        
        return $response;

/*new Response('', 200, array(
            'X-Sendfile'          => $entity->getPhotoName(),
            'Content-type'        => $entity->getType(),
            'Content-Disposition' => sprintf('attachment; filename="%s"', $entity->getPhoto()))
          ); */
        
        
        
        
        
    }
    /**
     * Lists all AbcPhoto entities.
     *
     * @Route("/", name="isystem_admin_photo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ABCIsystemBundle:AbcPhoto')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AbcPhoto entity.
     *
     * @Route("/", name="isystem_admin_photo_create")
     * @Method("POST")
     * @Template("ABCIsystemBundle:AbcPhoto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new AbcPhoto();
        $form = $this->createForm(new AbcPhotoType(), $entity);
        
        $form->bind($request);
        $entity->setType($entity->getImg()->getMimeType());
        $entity->setSize($entity->getImg()->getClientSize());
        $entity->setPhotoname($entity->getImg()->getClientOriginalName());
        $entity->uploadPhoto();
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //$em->persist($entity);
            //$em->flush();

            //return $this->redirect($this->generateUrl('isystem_admin_photo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    
     /**
     *
     * @Route("/savephoto", name="isystem_member_photo")
     * @Template()
     */
     public function savePhotoAction()
    {
         
        $isAjax = $this->get('Request')->isXMLhttpRequest();
	if($isAjax){
		
        $search = $this->get('request')->request->get('campos');
        var_dump($search);
        
        }
    }

    /**
     * Displays a form to create a new AbcPhoto entity.
     *
     * @Route("/new", name="isystem_admin_photo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AbcPhoto();
        $form   = $this->createForm(new AbcPhotoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AbcPhoto entity.
     *
     * @Route("/{id}/show", name="isystem_admin_photo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcPhoto')->find($id);
        $entity->setImg($entity->getPhoto());
        //$entity->setImage();
        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcPhoto entity show.');
        }

        $deleteForm = $this->createDeleteForm($id);

       return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
       );
    }


    /**
     * Displays a form to edit an existing AbcPhoto entity.
     *
     * @Route("/{id}/edit", name="isystem_admin_photo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcPhoto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcPhoto entity edit.');
        }

        $editForm = $this->createForm(new AbcPhotoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AbcPhoto entity.
     *
     * @Route("/{id}", name="isystem_admin_photo_update")
     * @Method("PUT")
     * @Template("ABCIsystemBundle:AbcPhoto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCIsystemBundle:AbcPhoto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbcPhoto entity update.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbcPhotoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('isystem_admin_photo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AbcPhoto entity.
     *
     * @Route("/{id}", name="isystem_admin_photo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCIsystemBundle:AbcPhoto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AbcPhoto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('isystem_admin_photo'));
    }

    /**
     * Creates a form to delete a AbcPhoto entity by id.
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
