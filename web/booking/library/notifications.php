<?php
// template for maintenance page
require(get_path('library')."/generic.php");
require(get_path('library')."/resource.php");
require(get_path('library')."/resource_category.php");
require(get_path('library')."/room.php");
require(get_path('library')."/section.php");
require(get_path('library')."/timetable.php");
//include(get_path('library')."/functions.php");

class maintenance{
	
	var $option;
	var $title;
	
	function index($args = FALSE){
		$this->option = $args['option'];
	}
	
	function the_title(){
		echo "[ BS ] &mdash; Notifications";
	}
	
	function the_header(){
		?>
        	<div class="row-fluid">
            	<div class="span12">
                	<div class="page-header"><h1>Notifications</h1></div>
                </div>
            </div>
        <?php
	}
	
	function the_body(){
		switch($this->option){
			case "resources":
				include(get_path('template')."/resources-tags.php");
				break;
			case "rooms":
				include(get_path('template')."/rooms-tags.php");
				break;
			case "timetable":
				include(get_path('template')."/timetable-tags.php");
				break;
		}
	}
	
	function the_footer(){}
}
?>