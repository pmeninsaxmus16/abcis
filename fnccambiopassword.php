<?php
require("nvalidateform.php");
include("phpmailer/sendMailABC.php");
include("phpmailer/themeResetPassword.php");
$util = new nvalidateform;
$idCard= $_POST['idcard']; 

//VERIFICAR SI RECIBO EL IDCARD
$error = '';
if($idCard){
  $data_ = getEmails($idCard,$util); 

  if($data_['total']>0){
      /*
      * 1) verificar si ya fue cambiado
      */
      $data_2 = getPasswordReset($idCard,$util);
      if($data_2['total']>0){ 
	  $passwd = $data_2['clear_password']; 
      }else{
      /*
       * 1.1) SI NO Cambiar en DB POSGTGRES 
      */
      $passwd = shell_exec('< /dev/urandom tr -dc a-np-z1-9 | head -c6');
      $sql="update general.system set password = md5('$passwd'), request_cpassword = 't', clear_password = '$passwd' where id_card = '$idCard';";
      $update = $util->doQueryPG($sql);
      }
      /*
       * 2) enviar mail;	
      */
      $mail = new sendMailABC();
      $mail->setSubject('[ABC] Password Request');
      /*
       * 2.1 construiomos el body del mail
      */
      $body = new themeResetPassword($idCard,$passwd);
      $mail->setBody($body->getBody());
      if($data_['e_mail'])$mail->setEmail($data_['e_mail']);
      if($data_['alternative_email'])$mail->setEmail($data_['alternative_email']);
      $val = $mail->Send(); 
      if(!$val){
	     $error='';
      }else{
	     $error='no';
      }
	$resp['email1'] = $data_['e_mail'];
	$resp['email2'] = $data_['alternative_email'];
	echo json_encode($resp);
  } else {
        $resp['email1'] = 'no';
	$resp['email2'] = 'no';
	echo json_encode($resp);
  }
}
else{
        $resp['email1'] = 'error';
	$resp['email2'] = 'error';
	echo json_encode($resp);
}

function getEmails($idCard,$util){
  $sql="select count(*) as total, e_mail, alternative_email from general.persons where lower(trim(id_card))= lower(trim('$idCard')) and (e_mail is not null or alternative_email is not null) group by e_mail,alternative_email;"; 
  $data_  =  pg_fetch_array($util->doQueryPG($sql));

return $data_;
}

function getPasswordReset($idCard,$util){
   $sql="select count(clear_password) as total, clear_password from general.system where id_card = '$idCard' and request_cpassword='t' and md5(clear_password)=password group by clear_password;"; 
  	  $data_2  =  pg_fetch_array($util->doQueryPG($sql));
return $data_2; 
}
?>
