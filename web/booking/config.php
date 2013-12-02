<?php
$http = "https";
$server_url = $_SERVER["SERVER_NAME"];
$server_root = "/var/www/system/abcis/web/booking";
$site_url = 'system/abcis/web/booking';
$website = "$http://$server_url/$site_url";
$website_loginurl = "$website/auth.php";
$website_loginurllout = "$website/auth.php";
$urls = array(
		"javascript"=>"$website/library/js",
		"css"=>"$website/library/css",
		"template"=>"$website/template",
		"media"=>"$website/media"
		);

$paths = array(
		"root"=>"$server_root",
		"template"=>"$server_root/template",
		"library"=>"$server_root/library"
		);
$limit = 10;
function get_site($path){
	global $server_url, $site_url, $website, $urls;
	
	return $urls["$path"];
	
}

function get_path($path){
	global $server_root, $paths;
	
	return $paths["$path"];
}

function check_protocol(){
	if($_SERVER["HTTPS"] != 'on'){
		echo "<script type='text/javascript'>window.location.href = '$website/';</script>";
	}
}

function loginTemp($user){
	$users = array();
	$users[0]= 'SJ015607'; //judith
	$users[1]='BI014307'; //castro
	$users[2]='SM015209'; //soto
	$users[3]='HR012608'; //hall
	$users[4]='GJ015212'; //garcia
	$users[5]='LV014911'; //veronica
	$users[6]='CA015307'; //candel
	$users[7]='HJ019707'; //george
	$users[8]='MJ010607'; //fer
	$users[9]='KP018907'; //keslake
	$users[10]='AC010507'; //claudia
	$users[11]='DA019910'; //mandy
	$users[12]='HC018313'; //chris hall
	$users[13]='RE016007'; //Eli
	//$users[14]='RS017707'; //samuel
	//$users[15]='MC010013'; //carlos
	$users[16]='TO011608';
 	if (in_array($user, $users))
	    $r = 't';
	else
	    $r = 'f';
	
return $r;
}

?>
