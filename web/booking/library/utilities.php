<?php
//utilities

//print categories of resources
function get_resource_categories(){
	global $db;
	$select = "<select name='cmb_category' id='cmb_category'>";
	foreach($db->get_results("SELECT id,name FROM bk_resource_category") as $category):
		$selected = ($category->id == $_POST['cmb_category'])?'selected':''; 
		$select .= "<option value='{$category->id}' ".$selected.">";
		$select .= $category->name;
		$select .= "</option>";
	endforeach;
	$select .= "</select>";
	echo $select;
}

//check if user has requested log out
function checklogout(){
	global $website_loginurl;
	if(isset($_REQUEST['logout'])):
		header( "Location: $website_loginurl" ) ;
	endif; 
}
?>