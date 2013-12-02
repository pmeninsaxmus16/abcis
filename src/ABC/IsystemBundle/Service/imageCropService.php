<?php
namespace ABC\IsystemBundle\Service;

class imageCropService {
var $image;
var $type;
var $src;
var $srcRemove; 
private $emMy;

function __construct($entityManagerMy) {  
    $this->emMy = $entityManagerMy;
}
function setImage($name,$directory,$img) {   

    $src= $directory.'/'.$img;
    $src = rtrim($src,'/');
    $this->srcRemove=$src;
    
    $fileTypes = array('jpg','jpeg','gif','png'); // File extension
    $fileParts = pathinfo($src);
    if(in_array(strtolower($fileParts['extension']),$fileTypes) ) {
        $this->type=strtolower($fileParts['extension']);
        switch($this->type){
            case 'jpg':
            $this->image = imagecreatefromjpeg($src);
            break;
            case 'jpeg':
            $this->image = imagecreatefromjpeg($src);
               
            break;
            case 'gif':
            $this->image = imagecreatefromgif($src);
               
            break;
            case 'png':
            $this->image = imagecreatefrompng($src);
               
            break;
       }
    }
    
    $this->src= $directory.'/'.$name.'.'.strtoupper($this->type);
    $this->src = rtrim($this->src,'/');

}

function searchImage($user_id, $directory){

  $dirint = dir($directory);
  while (($archivo = $dirint->read()) !== false)
  {
    if ( (eregi("gif", $archivo) || eregi("jpg", $archivo) || eregi("png", $archivo))&& eregi($user_id,$archivo)){
      $src= $directory."/".$archivo;
      break;
    }
 }
 $dirint->close();
return $src;
}
 
function getType(){
    return $this->type;
    
}

function getImage(){
    return $this->image;
    
}

function getSrc(){
    return $this->src;
    
}

function getSrcRemove(){
    return $this->srcRemove;
    
}


}
?>
