<?php
class Resource extends Generic{
	
	var $id = FALSE;
	var $name = FALSE;
	var $description = FALSE;
	var $category_id = FALSE;
	var $quantity = FALSE;
	var $time_before_booking = FALSE;
	var $is_active = FALSE;
	var $timetable_id = FALSE;
	var $created_date = FALSE;
	var $category_name = FALSE;
	var $timetable_name = FALSE;
	var $table_name = 'bk_resource';
	var $view_name = 'bk_view_resources';
	var $filters;
	var $filter_fields = array("resource_name","resource_description","category_name");
	var $primary_key = 'id';
	
	function Resource($id = FALSE){
		if($id):
			$db = new Booking_DB;
			$resource = $db->get_row("SELECT * FROM {$this->table_name} WHERE id = {$id};");
			$this->id = $resource->id;
			$this->name = $resource->name;
			$this->description = $resource->description;
			$this->category_id = $resource->category_id;
			$this->quantity = $resource->quantity;
			$this->time_before_booking = $resource->time_before_booking;
			$this->is_active = $resource->is_active;
			$this->timetable_id = $resource->timetable_id;
			$this->created_date = $resource->created_date;
			$extras = $db->get_row("SELECT * FROM {$this->view_name} WHERE id = {$id};");
			$this->category_name = $extras->category_name;
			$this->timetable_name = $extras->timetable_name;
		endif;
	}
}
?>