<?php include "config.php"?>
<?php if(!empty($_COOKIE['user_id']))header( "Location: $website" )?>
<?php require("library/booking_db.php")?>
<?php require("library/abcis_db.php")?>
<?php $db = new Booking_DB?>
<?php $abcis = new ABCIS_DB?>

<?php
/* login temporal quitar cuando el sitema este en produccion
*/ 	require("template/authentication.php");
	$template = new Authentication;
?>
<?php
	require_once 'library/googleoauth/Google_Client.php';
	require_once 'library/googleoauth/contrib/Google_Oauth2Service.php';
	session_start();
	/* Setting up authentication with google */
	$client = new Google_Client();
	$client->setApplicationName("Google UserInfo PHP Starter Application");
	// Visit https://code.google.com/apis/console?api=plus to generate your
	// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
	//$client->setClientId('886861326.apps.googleusercontent.com');
	//$client->setClientSecret('xh7_5Y6SKxYklNx9Srh3UuOj');

	$client->setClientId('918658788144-heooihbh5uufanbb0e4cs986musauk5r.apps.googleusercontent.com');
	$client->setClientSecret('XuhKVW2pXcwMxKE7n1w2nLf2');
	$client->setRedirectUri($website_loginurl);
	// $client->setDeveloperKey('insert_your_developer_key');
	$oauth2 = new Google_Oauth2Service($client);
	
	if (isset($_GET['code'])) {
		$client->authenticate($_GET['code']);
		$_SESSION['token'] = $client->getAccessToken();
		$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		return;
	}
	
	if (isset($_SESSION['token'])) {
		$client->setAccessToken($_SESSION['token']);
	}
	
	if (isset($_REQUEST['logout'])) {
		setcookie("user_id", $_COOKIE['user_id'], time()-3600, "/", "abc.edu.sv");
		unset($_SESSION['token']);
		session_destroy();
		$client->revokeToken();
		$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		return;
	}
	
	/* If request sign in with google */
	if ($client->getAccessToken()) {
		$user = $oauth2->userinfo->get();
		
		// These fields are currently filtered through the PHP sanitize filters.
		// See http://www.php.net/manual/en/filter.filters.sanitize.php
		/*$email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
		$img = filter_var($user['picture'], FILTER_VALIDATE_URL);
		$personMarkup = "$email<div><img src='$img?sz=50'></div>";*/
		$googleglobal = $user;
		if($user['verified_email'] == 1):
			// update nickname

		$abcis->query("update general.persons set chosen_name = '".addslashes($googleglobal['name'])."' where e_mail ='{$googleglobal['email']}'" );
 
		//	$abcis->query("update members set nickname = '".addslashes($googleglobal['name'])."' where sitewide_login = '{$googleglobal['email']}'");
		$user = $abcis->get_row("select count(id_card) as n, id_card, chosen_name from general.view_staff where e_mail = '{$user['email']}' group by id_card, chosen_name");

			//$user = $abcis->get_row("select count(id_card) as n, id_card, nickname from abc_view_staff where sitewide_login = '{$user['email']}' group by id_card, nickname");
			if( !empty($user->id_card) ){
				//Set cookie
				//setcookie("user_id", $user->id_card, time()+2592000, "/", "abc.edu.sv");
				setcookie("user_id", $user->id_card, time()+2592000, "/", "abc.edu.sv");
				//setcookie("nickname", $user->nickname, time()+2592000, "/", "abc.edu.sv");
				setcookie("chosen_name", $user->chosen_name, time()+2592000, "/", "abc.edu.sv");
				header( "Location: $website/index.php" ) ;
			}else{echo "Error!";}
		endif;
		// The access token may have been updated lazily.
		$_SESSION['token'] = $client->getAccessToken();
	} else {
		// Create url to sign in with google
		$authUrl = $client->createAuthUrl();
	}

	/* ---------------------------------------------- */
?>
<?php
	if($_POST['action'] == 'login'){
		$user = $abcis->get_row("select count(id_card) as n, id_card, nickname from abc_view_staff where password = md5('{$_POST['txtpassword']}') and login = '{$_POST['txtusername']}' group by id_card, nickname;");
		/*$user = $abcis->get_row("select count(id_card) as n, id_card, chosen_name from general.view_staff where id_card='BI014307' or id_card='MC010013' and password = md5('{$_POST['txtpassword']}') and login = '{$_POST['txtusername']}' group by id_card, chosen_name;");*/

		if( !empty($user->id_card) and $user->n == 1 ):
			//Set cookie
			if($_POST['chkremember'] == 1)$cookietime = time()+2592000;
			else $cookietime = time()+1800;
			setcookie("user_id", $user->id_card, $cookietime, "/", "abc.edu.sv");
			//setcookie("nickname", $user->nickname, $cookietime, "/", "abc.edu.sv");
			setcookie("chosen_name", $user->chosen_name, $cookietime, "/", "abc.edu.sv");
			header( "Location: $website/index.php" ) ;
		else:
			echo "Bad username or password";
		endif;
	}
?>
<?php include "template/header.php"?>
<br><br>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12"><div id="info"></div></div>
	</div>
	<div class="row-fluid">
		<div class="span4" style="text-align:center;">
			<fieldset>
				<h4>Welcome at Booking System Authentication</h4>
				<h4><a href="<?php echo $authUrl ?>" class="zocial googleplus">Sign in with Google+</a></h4>
			</fieldset>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
		    <form method="post" id="frmlogin">
		    <fieldset>
		<!--	    <legend>Or Sign me in with my ABC's account</legend>
			    <label for="txtusername">Username</label>
			    <input type="text" class="input-xlarge" name="txtusername" id="txtusername" value="" placeholder="Type your username">
			    <label for="txtpassword">Password</label>
			    <input type="password" class="input-xlarge" name="txtpassword" id="txtpassword" placeholder="your password">
			    <span class="help-block"><a href="#">Forgot your password?</a></span>
			    <label class="checkbox" for="chkremember">
			    <input type="checkbox" id="chkremember" name="chkremember" value="1"> Remember me
			    </label>
			    <div class="form-actions">
				    <button type="button" id="btsignin" name="btnsignin" onclick="checklogin(this.form);" class="btn btn-primary"><i class="icon-ok-sign icon-white"></i>&nbsp;Submit</button>
			    </div> -->
		    </fieldset>
		    <input type="hidden" name="action" id="action" value="" />
		    </form>
		</div>
		<div class="span7">
		</div>
	</div>
</div>
<?php include "template/footer.php"?>
