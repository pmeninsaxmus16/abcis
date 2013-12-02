<?php
class Section extends Generic{
	
	var $id = FALSE;
	var $name = FALSE;
	var $description = FALSE;
	var $created_date = FALSE;
	var $table_name = 'bk_section';
	var $view_name = 'bk_section';
	
	function Section($id = FALSE){
		if($id):
			$db = new Booking_DB;
			$section = $db->get_row("SELECT * FROM {$this->table_name} WHERE id = {$id};");
			$this->id = $section->id;
			$this->name = $section->name;
			$this->description = $section->description;
			$this->created_date = $section->created_date;
		endif;
	}	
}
?>