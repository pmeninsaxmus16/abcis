<?php
class Resource_Category extends Generic{
	
	var $id = FALSE;
	var $name = FALSE;
	var $description = FALSE;
	var $created_date = FALSE;
	var $table_name = 'bk_resource_category';
	var $view_name = 'bk_resource_category';
	
	function Resource_Category($id = FALSE){
		if($id):
			$db = new Booking_DB;
			$category = $db->get_row("SELECT * FROM {$this->table_name} WHERE id = {$id};");
			$this->id = $category->id;
			$this->name = $category->name;
			$this->description = $category->description;
			$this->created_date = $category->created_date;
		endif;
	}	
}
?>