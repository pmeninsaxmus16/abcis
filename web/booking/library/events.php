<?php
require_once("booking_db.php");
require_once("abcis_db.php");
$db = new Booking_DB;
$user = new ABCIS_DB;

$resources = $_COOKIE['resources'];
$start = date('Y-m-d',$_GET['start']);
$end = date('Y-m-d',$_GET['end']);
$e = array();
if( strlen($resources) > 0 ){
	//echo "SELECT owner, booking_id, subject, location, room, description, booking_date, start_time, end_time, starttime, endtime, series, events_id FROM view_booking WHERE booking_date >= '{$start}' AND booking_date <= '{$end}' AND resource_id in ({$resources}) group by owner,booking_id, subject, location, room, description, booking_date, start_time, end_time, starttime, endtime, series, events_id;";
	$events = $db->get_results("SELECT owner, booking_id, subject, location, room, description, quantity, booking_date, start_time, end_time, starttime, endtime, series, events_id FROM bk_view_booking WHERE booking_date >= '{$start}' AND booking_date <= '{$end}' AND resource_id in ({$resources}) group by owner,booking_id, subject, location, room, description, booking_date, start_time, end_time, starttime, endtime, series, events_id;");
}elseif($resources == -1){
	$events = (array)$db->get_results("SELECT owner, booking_id, subject, location, room, description, quantity, booking_date, start_time, end_time, starttime, endtime, series, events_id FROM bk_view_booking WHERE booking_date >= '{$start}' AND booking_date <= '{$end}' and owner = '{$_COOKIE['user_id']}' group by owner,booking_id, subject, location, room, description, booking_date, start_time, end_time, starttime, endtime, series, events_id;");
}else $events = array();
foreach($events as $event):
	$owner = $user->get_row("select e_mail as sitewide_login from general.view_staff where id_card = '{$event->owner}';");
	$general = array(
		'id'=>$event->booking_id,
		'booking_id'=>$event->booking_id,
		'event_id'=>$event->events_id,
		'room'=>$event->room,
		'title'=>$event->subject . " - " . $event->room,
		'resource'=>$event->resource,
		'quantity'=>$event->quantity,
		'start'=>$event->starttime,
		'end'=>$event->endtime,
		'allDay'=>false,
		'owner_id'=>$event->owner,
		'owner_name'=>$owner->sitewide_login,
		'tooltip'=>"<div id='tooltip-{$event->booking_id}' class='event-tooltip'><strong>{$owner->sitewide_login}</strong><br />{$event->subject}<br />{$event->room} &rarr; {$event->start_time} &mdash; {$event->end_time} &rarr; Quantity {$event->quantity}</div>",		
	);
	if( $event->owner == $_COOKIE['user_id']  ):
		$general['color'] = '#7E3763'; // 81152C - 7E3763
		$general['textColor'] = '#FFFFFF'; 
	else:
		$general['color'] = '#4F7B1C'; 
		$general['textColor'] = '#FFF';
		$general['editable'] = false;
	endif;
	if($event->series == 't'):
		$general['series'] = 'true';
	else:
		$general['series'] = 'false';
	endif;
	//print_r($general);
	array_push($e,$general);
endforeach;
echo json_encode($e);
?>
