<?php include "config.php"?>
<?php require("library/booking_db.php")?>
<?php include_once("library/utilities.php")?>
<?php
if(empty($_COOKIE['user_id']))header( "Location: $website_loginurl" ) ;
//elseif(loginTemp($_COOKIE['user_id'])=='f') header( "Location: auth.php?logout" ) ;
$db = new Booking_DB;
checklogout();
if( !isset($_POST['template']) && empty($_POST['template']) ):
	$_POST['template'] = 'home';
	$_POST['option'] = 'resources';
endif;
require("template/{$_POST['template']}.php");
$template = new $_POST['template'];
if( !isset($_POST['page']) )$_POST['page'] = 1;
?>
<?php include "template/header.php"?>
<div class="container-fluid">
<div class="row-fluid">
	<div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
        	<div class="container">
                <ul class="nav nav-pills">
                	<li class="active"><a href="#" class="brand">[ ABC ] &mdash; Booking System</a></li>
                	<li class="divider-vertical"></li>
                    <li class="<?php echo ($_POST['template'] == 'home')? 'active' : '' ;?>"><a href="javascript:void(0)" onClick="setTemplate('home','')">Home</a></li>
                    <li class="divider-vertical"></li>
                  <!--   <li class="<?php echo ($_POST['template'] == 'notifications')? 'active' : '' ;?>"><a href="javascript:void(0)" onClick="setTemplate('notifications','')"></a></li>  -->
                     <li class="divider-vertical"></li>
                 <li class="dropdown <?php echo ($_POST['template'] == 'maintenance')? 'active' : '' ;?>">
                    <!--   <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="caret"></b></a>
                         <ul class="dropdown-menu">
                              <li><a href="http://localhost/abcis/web/app_dev.php/booking/mtto/bkresource">Resources</a></li>
                            <li><a href="javascript:void(0)" onClick="setTemplate('maintenance','rooms')">Rooms</a></li>
                            <li><a href="javascript:void(0)" onClick="setTemplate('maintenance','timetable')">Timetable</a></li>
                       </ul>--> 
                    </li>
                </ul> 
                <ul class="nav pull-right">
                	<li class="dropdown active">
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i>&nbsp;&nbsp;<?php echo ($_COOKIE['chosen_name'])?><b class="caret"></b></a>
                		<ul class="dropdown-menu">
                			<!-- <li><a href="#">Help</a></li>-->
                			<li><a href="<?php echo $website_loginurl?>?logout">Log out </a></li>
                		</ul>
                	</li>
                	
                </ul>
        	</div>
        </div>
    </div>
</div>
<form name="nav_options" id="nav_options" method="post">
 <input type="hidden" name="template" id="template" value="<?php echo $_POST['template']?>" />
 <input type="hidden" name="option" id="option" value="<?php echo $_POST['option']?>" />
 <input type="hidden" name="page" id="page" value="<?php echo $_POST['page']?>" />
 <input type="hidden" name="keyword" id="keyword" value="<?php echo $_POST['keyword']?>" />
</form>
<?php

//if( $_POST['template'] == 'maintenance' )$template->index( array('option'=>$_POST['option']) );
?>
<div><?php $template->the_header()?></div>
<div><?php $template->the_body()?></div>
<div><?php ?></div>
</div> <!-- END OF FLUID CONTAINER -->
<script type="text/javascript">
$(document).ready(function(){
	$('.dropdown-toggle').dropdown();
});
function setTemplate(temp,opt){
	$('#template').val(temp);
	$('#option').val(opt);
	$('#page').val('1');
	document.getElementById('nav_options').submit();
}
function turnPage(page){
	$('#page').val(page);
	document.getElementById('nav_options').submit();
}
function nextPage(page,maxlimit){
	if(parseInt(page) >= parseInt(maxlimit))return false;
	turnPage(parseInt(page)+1);
}
function prevPage(page,minlimit){
	if(parseInt(page) <= parseInt(minlimit))return false;
	turnPage(parseInt(page)-1);
}
</script>
<?php include "template/footer.php"?>
