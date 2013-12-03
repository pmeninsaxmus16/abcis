<?php

namespace ABC\IsystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * AbcPhoto controller.
 *
 * @Route("/isystem/photo")
 */
class AbcPhotoController extends Controller
{

    /**
     * Lists all AbcPhoto entities.
     *
     * @Route("/upload/{idcard}/{folder}/{subfolder}/", name="isystem_upload")
    * @Template()
     */
    public function uploadAction($idcard,$folder,$subfolder)
    {
        if (!empty($_FILES)) {
            $tempFile =  $_FILES['file']['tmp_name'];
            $imagen = getimagesize($tempFile);    //Sacamos la información
            $ancho = $imagen[0]; //Ancho
            $alto = $imagen[1];  //Alto 
            if($ancho > 640 and $alto >480){
                    $resize= $this->get('imageResize');                    
                    // set maximum height within wich the image should be resized
                    $resize->max_height(480);
                    // set maximum width within wich the image should be resized
                    $resize->max_width(640);
                    $resize->image_path($tempFile);
                    // call the functio to resize the image
                    $resize->image_resize();
            }
            $targetPath = $resultados = $this->container->getParameter('photo.targetPath');

            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
            $fileParts = pathinfo($_FILES['file']['name']);
            $targetFile = rtrim($targetPath,'/') . '/' . $folder.'/'.$subfolder.'/'.$_FILES['file']['name'];

            if (in_array(strtolower($fileParts['extension']),$fileTypes) ) {
                    move_uploaded_file("$tempFile","$targetFile");
                    chmod($targetFile,0777);
                    return new Response('1');
            } else {
                  return new Response('echo \'Invalid file type.');
            }
        }
    }
    
        /**
     * Lists all AbcPhoto entities.
     *
     * @Route("/crop", name="isystem_crop")
     * @Method("POST")
     * @Template()
     */
    public function cropAction()
    {
    $isAjax = $this->get('Request')->isXMLhttpRequest();
    if($isAjax){
        $x          = $this->get('request')->request->get('x');
        $y          = $this->get('request')->request->get('y');
        $w          = $this->get('request')->request->get('w');
        $h          = $this->get('request')->request->get('h');
        $user_id    = $this->get('request')->request->get('user_id');
        $img        = $this->get('request')->request->get('img');
        $folder     = $this->get('request')->request->get('folder');
        $subfolder  = $this->get('request')->request->get('subfolder');
        
        $targetPath = $resultados = $this->container->getParameter('photo.targetPath');

	$targ_w = 320; $targ_h = 380;
	$jpeg_quality = 100;
        $crop= $this->get('imageCrop');
        $crop->SetImage($user_id, $targetPath.''.$folder.'/'.$subfolder.'/',$img);
        $img_r = $crop->getImage();
        $src   = $crop->getSrc();
        $srcRemove   = $crop->getSrcRemove();
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
	imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$w,$h);
	imagejpeg($dst_r,$src,$jpeg_quality);  
        unlink($srcRemove);
        
      }
      return new Response('1');
    }
}