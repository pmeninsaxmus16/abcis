<?php
// template for maintenance page
require(get_path('library')."/generic.php");
require(get_path('library')."/resource.php");
require(get_path('library')."/resource_category.php");
require(get_path('library')."/room.php");
require(get_path('library')."/section.php");
require(get_path('library')."/timetable.php");
//include(get_path('library')."/functions.php");

class Authentication{
	
	var $option;
	var $title;
	
	function index($args = FALSE){
		$this->option = $args['option'];
	}
	
	function the_title(){
		echo "Booking System [Authentication]";
	}
	
	function the_header(){
		$this->title = "";
	}
	
	function the_body(){
		include(get_path('template')."/authentication-template.php");
	}
	
	function the_footer(){}
}
?>