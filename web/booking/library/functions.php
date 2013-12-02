<?php
//functions file
require_once("booking_db.php");
require_once("abcis_db.php");
$db = new Booking_DB;
$user = new ABCIS_DB;

if( !empty($_POST['template']) ):
	require("generic.php");
	require("{$_POST['template']}");
	$template = new $_POST['class'];
endif;
switch($_POST['action']){
	case "delete":
		delete();
		break;
	case "resource_categories":
		get_resource_categories();
		break;
	case "get_timetables":
		get_timetables();
		break;
	case "add_resource":
		add_resource();
		break;
	case "sections":
		sections();
		break;
	case "get_locations":
		get_locations();
		break;
	case "save_locations":
		save_locations();
		break;
	case "get_resources":
		get_resources();
		break;
	case "get_mixed_locations":
		get_mixed_locations();
		break;
	case "new_booking":
		new_booking();
		break;
	case "update_series":
		update_series();
		break;
	case "update_event":
		update_event();
		break;
	case "update_one_event":
		update_one_event();
		break;
	case "pick_quantity":
		pick_quantity();
		break;
	case "get_booking_details":
		get_booking_details();
		break;
	case "set_update_event":
		set_update_event();
		break;
	case "deletebooking":
		deletebooking();
		break;
}

function delete(){
	global $db, $template;
	if( !empty($_POST['param']) && $template ){
		$ids = explode(",",$_POST['param']);
		foreach($ids as $id):
			//make validations from database
			$db->query("DELETE FROM bk_resource WHERE id = {$id}");
		endforeach;
		//echo 1;
		echo $db->rows_affected;
		return;
	}
	echo "No Template or Param found.";
}

//print categories of resources
function get_resource_categories(){
	global $db;
	$select = "<select name='cmb_category' id='cmb_category'>";
	$select .= "<option value='-1'>[ Select a category ]</option>";
	foreach($db->get_results("SELECT id,name FROM bk_resource_category") as $category):
		$selected = ($category->id == $_POST['cmb_category'])?'selected':''; 
		$select .= "<option value='{$category->id}' ".$selected.">";
		$select .= $category->name;
		$select .= "</option>";
	endforeach;
	$select .= "</select>";
	echo $select;
}

//print timetables
function get_timetables(){
	global $db;
	$select = "<select name='cmb_timetable' id='cmb_timetable'>";
	$select .= "<option value='-1'>[ Select a timetable ]</option>";
	foreach($db->get_results("SELECT id,name FROM bk_timetableheader") as $timetable):
		$selected = ($timetable->id == $_POST['cmb_timetable'])?'selected':''; 
		$select .= "<option value='{$timetable->id}' ".$selected.">";
		$select .= $timetable->name;
		$select .= "</option>";
	endforeach;
	$select .= "</select>";
	echo $select;
}

//show all sections in a select
function sections(){
	global $db;
	$select = "<select name='cmb_section' id='cmb_section'>";
	$select .= "<option value='-1'>[ Sections ]</option>";
	foreach($db->get_results("select distinct section_name from bk_view_rooms order by section_name asc") as $section):
		$selected = ($section->section_name == $_POST['cmb_section'])?'selected':''; 
		$select .= "<option value='{$section->section_name}' ".$selected.">";
		$select .= $section->section_name;
		$select .= "</option>";
	endforeach;
	$select .= "</select>";
	echo $select;
}

//get locations in a select
//Add all of the rooms and buildings where this resource will be available
function get_locations(){
	global $db;
	if( empty($_POST['resource']) ){
		echo 'Choose a resource first';
		return false;
	}
	if($_POST['resource'])
		$cmb_room = $db->get_col("select room_id from bk_link_resource_room where resource_id = {$_POST['resource']}",0);
	?>
    <select name="cmb_room[]" id="cmb_room" data-placeholder="Choose all the rooms that you need" style="width:300px;" size="6" class="chzn-select" <?php echo ($_POST['multiple'])? 'multiple' : '' ;?> tabindex="6">
    <option value=""></option>
    <?php
	foreach($db->get_results("select distinct section_id,section_name from bk_view_rooms order by section_name asc") as $section):
		?>
       	<optgroup label="<?php echo $section->section_name?>">
        <?php
		foreach($db->get_results("select room_id,room_name from bk_view_rooms where section_id = {$section->section_id} order by room_name asc") as $room){
			?>
            <option value="<?php echo $room->room_id?>" <?php echo ( in_array($room->room_id,$cmb_room) )? 'selected' : ''; ?>><?php echo $room->room_name?></option>
            <?php	
		}
	endforeach;
	?>
	</select>
	<?php
	
}
//adds or updates a resource
function add_resource(){
	global $db;
	$id = $db->get_var("select add_resource({$_POST['id']}, '{$_POST['nm']}',{$_POST['cid']},{$_POST['qu']},'{$_POST['tbb']}',{$_POST['tid']});");
	echo $id;
}

//save locations to the resources
function save_locations(){
	global $db;
	$db->query("delete from bk_link_resource_room where resource_id = {$_POST['resource']}");
	$rooms = $_POST['rooms'];
	if( is_array($rooms) ){
		foreach($rooms as $r):
			$db->query("insert into bk_link_resource_room(resource_id,room_id,created_date) values({$_POST['resource']},{$r},now());");
		endforeach;
	}
	echo $db->rows_affected;
}
//get resources in a select
function get_resources($width = '300px', $name = 'cmb_resource'){
	global $db;
	if( !empty($_POST['width']) )$width = $_POST['width'];
	if( !empty($_POST['name']) )$name = $_POST['name'];
	//$cmb_room = $db->get_col("select room_id from link_resource_room where resource_id = {$_POST['resource']}",0);
	?>
    <select name="<?php echo $name?>[]" id="<?php echo $name?>" data-placeholder="Click here to pick resources" style="width:<?php echo $width?>;" size="6" class="chzn-select" multiple tabindex="6">
    <option value=""></option>
    <?php $chosenresources = (array)explode(',', $_COOKIE['resources'])?>
    <?php
	foreach($db->get_results("select distinct category_id,category_name from bk_view_resources order by category_name asc") as $category):
		?>
       	<optgroup label="<?php echo $category->category_name?>">
        <?php
		foreach($db->get_results("select resource_id,resource_name from bk_view_resources where category_id = {$category->category_id} and resource_active='t' order by category_name asc") as $resource){
			?>
            <option value="<?php echo $resource->resource_id?>" <?php echo ( in_array($resource->resource_id,$chosenresources) )? 'selected' : ''; ?>><?php echo $resource->resource_name?></option>
            <?php	
		}
	endforeach;
	?>
	</select>
	<?php
	
}
//get locations in common in a select
function get_mixed_locations(){
	global $db;
	
	if( is_array($_POST['resource']) ):
		if(count($_POST['resource']) == 1)$selected = '';
		else $selected = '';
		$resource = implode(',',$_POST['resource']);
	else:
		echo 'Choose a resource first';
		return false;
	endif;
	?>
    <select name="cmb_room" id="cmb_room" data-placeholder="Choose a location" style="width:300px;" size="6" class="chzn-select" <?php echo ($_POST['multiple'])? 'multiple' : '' ;?> tabindex="6">
    <option value=""></option>
    <?php
	foreach($db->get_results("select distinct room_id,room_name from bk_view_room_resource where resource_id in ({$resource}) order by room_name asc") as $room):
		?>f
		<option value="<?php echo $room->room_id?>" <?php echo $selected?>><?php echo $room->room_name?></option>
		<?php	
	endforeach;
	?>
	</select>
	<?php
	
}

function new_booking(){
	global $db;
	//echo $_POST['endsoc']."<br>";
	$bookings = 0;
	$resources = explode(",",$_POST['resources']);
	$quantities = explode(",",$_POST['quantities']);
	$daysofweek = explode(",",$_POST['repeaton']);
	$booking_id = booking_header($_POST['subject'],$_POST['location'],$_POST['description']);
	if( $booking_id !== FALSE ):
		$rs = $resources;
		for($i=0;$i<count($rs);$i++):
			if( $_POST['repeat'] == 'daily' ){
				//echo "select createseriesevent('daily', -1, '".formatdate($_POST['startson'],'Y-m-d')."', {$_POST['endsoc']}, '".formatdate($_POST['endson'],'Y-m-d')."', {$booking_id}, {$rs[$i]}, {$quantities[$i]}, '{$_POST['stime']}:00', '{$_POST['etime']}:00');";
				if( is_numeric($quantities[$i]) )
					$bookings += $db->get_var("select bk_createseriesevent('daily', -1, '".formatdate($_POST['startson'],'Y-m-d')."', {$_POST['endsoc']}, '".formatdate($_POST['endson'],'Y-m-d')."', {$booking_id}, {$rs[$i]}, {$quantities[$i]}, '{$_POST['stime']}:00', '{$_POST['etime']}:00');");
			}else{
				foreach($daysofweek as $day){
					if( is_numeric($quantities[$i]) )
						$bookings += $db->get_var("select bk_createseriesevent('weekly', {$day}, '".formatdate($_POST['startson'],'Y-m-d')."', {$_POST['endsoc']}, '".formatdate($_POST['endson'],'Y-m-d')."', {$booking_id}, {$rs[$i]}, {$quantities[$i]}, '{$_POST['stime']}:00', '{$_POST['etime']}:00');");
					//echo "select createseriesevent('weekly', {$day}, '".formatdate($_POST['startson'],'Y-m-d')."', {$_POST['endsoc']}, '".formatdate($_POST['endson'],'Y-m-d')."', {$booking_id}, {$rs}, 1, '{$_POST['stime']}:00', '{$_POST['etime']}:00');";
				}
			}
		endfor;
	endif;
	echo $bookings;
}

function booking_header($subject,$location,$description){
	global $db;
	$ip = getRealIpAddr();
	$db->query("insert into bk_bookingheader(subject,location,description,owner,ip) values('".addslashes($subject)."',{$location},'".addslashes($description)."','{$_COOKIE['user_id']}','{$ip}');");
	if( $db->rows_affected > 0 )
		return $db->insert_id;
	else return FALSE;
}

function getRealIpAddr(){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){   //check ip from share internet
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){   //to check ip is pass from proxy
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function formatdate($obj,$format){
	$fecha = strtotime($obj);
	return date($format,$fecha);
}

function update_series(){
	global $db;
	$update = $db->get_var("select bk_updateseries('{$_COOKIE['user_id']}', '".getRealIpAddr()."', {$_POST['booking_id']},  {$_POST['dayDelta']}, '{$_POST['stime']}', '{$_POST['etime']}')");
	echo $update;
}

function update_event(){
	global $db;
	$db->query("begin");
	foreach(( $db->get_results("select * from bk_bookingevents where booking_id = {$_POST['booking_id']}") ) as $event):
		$u = $db->get_var("select bk_updateevent('{$_COOKIE['user_id']}', '".getRealIpAddr()."', {$event->id}, {$event->resource_id}, {$event->quantity}, '{$_POST['bookingdate']}', '{$_POST['stime']}', '{$_POST['etime']}')");
		//mail("davidmartinez@abc-net.edu.sv","{$event->id}","select updateevent('{$_COOKIE['user_id']}', '".getRealIpAddr()."', {$event->id}, {$event->resource_id}, {$event->quantity}, '{$_POST['bookingdate']}', '{$_POST['stime']}', '{$_POST['etime']}')");
		if($u == 0){
			$db->query("rollback");
			echo 0;
			return false;
		}
		$update += $u; 
	endforeach;
	$db->query("commit");
	echo $update;
}

function update_one_event(){
	/* if update one event we should separate it from the series and put it apart */
	global $db;
	// first we get a new booking header for the events
	$booking = $db->get_row("select * from bk_bookingheader where id = {$_POST['bookingid']}");
	$booking_id = booking_header($booking->subject,$booking->location);
	if( $booking_id ){
		$db->query("update bk_bookingevents set booking_id = {$booking_id} where id in(" . str_replace(':',',',$_POST['events_id']) . ")");
	}
	$events = explode(':',$_POST['events_id']);
	foreach($events as $e):
		$details = $db->get_row("select quantity,resource_id from bk_bookingevents where id = {$e}");
		$update += $db->get_var("select bk_updateevent('{$_COOKIE['user_id']}', '".getRealIpAddr()."', {$e}, {$details->resource_id}, {$details->quantity}, '{$_POST['bookingdate']}', '{$_POST['starttime']}', '{$_POST['endtime']}')");
	endforeach;
	echo $update;
}

function pick_quantity(){
	global $db;
	$r_available = false;
	// split resources into an array, if a resource is available in a quantity of one, then not show it.
	$resources = (array)explode(',', $_POST['resources']);
	//validate if quantity is one
	$av = true;
	$resource_quantities = 0;
	foreach($resources as $rs):
		$row = $db->get_row("select r.quantity as total, bk_checkavailable({$rs}, '" . formatdate($_POST['startson'],'Y-m-d') . "', '{$_POST['stime']}', '{$_POST['etime']}') as available from bk_resource r where id = {$rs}; ");
		//echo "select r.quantity as total, checkavailable({$rs}, '" . formatdate($_POST['startson'],'Y-m-d') . "', '{$_POST['stime']}', '{$_POST['etime']}') as available from resource r where id = {$rs}; ";
		$resource_quantities += $row->total;
		if( $row->available == 0 )$show = false;
	endforeach;
	if( $resource_quantities == count($resources) && $av == true ){
		$a = array();
		$a = array_fill(0, $resource_quantities, 1);
		$a = implode(",", $a);
		$_POST['quantities'] = $a;
		new_booking();
		return false;
	} 
	?>
	<table id="booking_quantity" border="0" cellpadding="5" cellspacing="5" width="100%">
	<tbody>
	<?php
	foreach($resources as $r):
		$available = $db->get_var(" select `bk_checkavailable`({$r}, '" . formatdate($_POST['startson'],'Y-m-d') . "', '{$_POST['stime']}', '{$_POST['etime']}') ");
		//echo " select `checkavailable`({$r}, '" . formatdate($_POST['startson'],'Y-m-d') . "', '{$_POST['stime']}', '{$_POST['etime']}') ";
		//get the details of the resource
		$resource = $db->get_row("select * from bk_resource where id = {$r}");
		if( $available > 0 ){
			$r_available = true;
			?>
				<tr>
					<td><?php echo $resource->name?></td>
					<td>
						<select class="input-small cmbresourcesq" name="qu_<?php echo $r?>" id="qu_">
						<?php 
							for($i=1;$i<=$available;$i++){
								?>
									<option value="<?php echo $i?>"><?php echo $i?></option>
								<?php
							}
						?>
						</select>
					</td>
				</tr>
			<?php
		}else{
			?>
			<tr>
				<td colspan="2" align="left"><span class="label label-important">Error: The <?php echo $resource->name?> is not available at this time.</span></td>
			</tr>
			<?php
		}
	endforeach;
	?>
	</tbody>
	<?php
	if( $r_available ){
		?>
		<thead>
		<tr>
			<td colspan="2" align="left"><span><strong>Pick the number of resource(s) that you want to use: </strong></span></td>
		</tr>
		<?php
	}
	?>
	</table>
	<?php
}

function get_booking_details(){
	global $db;
	global $user;
	$details = (array)$db->get_results("select *, date_format(booking_date, '%M %e, %Y') as formated_date from bk_view_booking where booking_id = {$_POST['booking_id']} and booking_date = '{$_POST['booking_date']}' and start_time = '{$_POST['start_time']}' and end_time = '{$_POST['end_time']}';");
	if( !empty($details[0]->owner) ):
		$ow = $user->get_row("select id_card, forename as firstname, surname as lastname, e_mail as sitewide_login from general.view_staff where id_card = '{$details[0]->owner}';");
	endif; 
	?>
	<div>
		<p>
			<div><strong><h4><a href="mailto:<?php echo $ow->sitewide_login?>" target="_blank"><?php echo ($ow->firstname . ' ' . $ow->lastname)?></a></h4></strong></div>
			<ul>
	<?php
	foreach($details as $d):
		?>
				<li>
				<strong><em><?php echo $d->resource?></em></strong> &rarr; Quantity: <strong><?php echo $d->quantity?></strong>
				<div><span><em><?php echo $d->formated_date . "</em> [ " . $d->start_time . " &mdash; " . $d->end_time;?> ]</span></div>
				</li>
				<li>
				<label class="control-label" for="edescription"><strong><em>Comments:</em></strong> &rarr; <?php echo $details[0]->description?></label>
				</li>
		<?php
		$owner = $d->owner;
	endforeach;
	?>
			</ul>
		</p>
	</div>
	<?php
	if( $ow->id_card== $_COOKIE['user_id'] ):
		?>
		<div id="bdetails">
			<div><strong>You can also change the information of your booking: </strong></div>
			<form id="editevent" class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="esubject">Subject</label>
					<div class="controls">
						<input type="text" id="esubject" value="<?php echo $details[0]->subject?>" placeholder="Subject">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="esubject">Location</label>
					<div class="controls">
						<select name="elocation" id="elocation">
						    <?php
						    $resource = (array)$db->get_col("select distinct resource_id from bk_view_booking where booking_id = {$_POST['booking_id']}");
						    $resource = implode(',',$resource);
							foreach($db->get_results("select distinct room_id,room_name from bk_view_room_resource where resource_id in ({$resource}) order by room_name asc") as $room):
								if( $details[0]->location == $room->room_id )$selected = 'selected="selected"';
								else $selected = '';
								?>
								<option value="<?php echo $room->room_id?>" <?php echo $selected?>><?php echo $room->room_name?></option>
								<?php	
							endforeach;
							?>
						</select>
						<!--<input type="text" id="elocation" value="<?php echo $details[0]->subject?>" placeholder="Location">-->
					</div>
				</div>
				<input type="hidden" id="ebooking_id" value="<?php echo $_POST['booking_id']?>" />
			</form>
		</div>
		<?php
	endif;
}

function is_valid_user($booking_id,$action){
	return true;
}

function set_update_event(){
	global $db;
	if( is_valid_user($_POST['booking_id'],'update_event') ):
		$db->query("update bk_bookingheader set subject = '".addslashes($_POST['subject'])."', location = {$_POST['location']} where id = {$_POST['booking_id']}");
		echo $db->rows_affected;
	else: echo '0';
	endif;
}

function deletebooking(){
	global $db;
	
	if($_POST['single'] == '1'){ // single event, the whole series
		$db->query("delete from bk_bookingevents where booking_id = {$_POST['bookingid']}");
		$db->query("delete from bk_bookingheader where id = {$_POST['bookingid']}");
		echo $db->rows_affected;	
	}else{ // one event in series
		$db->query("delete from bk_bookingevents where booking_id = {$_POST['bookingid']} and start_time = '{$_POST['starttime']}' and end_time = '{$_POST['endtime']}' and bdate = '{$_POST['bookingdate']}'");
		echo $db->rows_affected;
	}
}
?>
