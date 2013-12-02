<?php
class Room extends Generic{
	
	var $id = FALSE;
	var $name = FALSE;
	var $description = FALSE;
	var $section_id = FALSE;
	var $section_name = FALSE;
	var $created_date = FALSE;
	var $table_name = 'bk_room';
	var $view_name = 'bk_view_rooms';
	
	function Room($id = FALSE){
		if($id):
			$db = new Booking_DB;
			$room = $db->get_row("SELECT * FROM {$this->table_name} WHERE id = {$id};");
			$this->id = $room->id;
			$this->name = $room->name;
			$this->section_id = $room->section_id;
			$this->description = $room->description;
			$this->created_date = $room->created_date;
			$extras = $db->get_row("SELECT * FROM {$this->view_name} WHERE id = {$id};");
			$this->section_name = $extras->section_name;
		endif;
	}	
}
?>