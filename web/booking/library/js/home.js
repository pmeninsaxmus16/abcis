// JavaScript Document
var calendario = null;
var revertproc = null;
var booking_params = null;
$(document).ready(function(){
	loadAction({action:'get_resources', multiple: 'multiple'},'#divresources');
	loadAction({action:'get_resources', multiple: 'multiple', width: '195px', name: 'resourcepicker'},'#resource_picker');
	restoreResources();
	/*
		Resources handlers
	*/
	$("div#list_resources").hide();
	/* ---------------------------------------------------------------------------------*/
	$('#dp6').datepicker({
        todayBtn: 'linked',
        format: 'yyyy-mm-dd',
        weekStart: 1
    }).on('changeDate', function(ev){
    	ev.date = Date.DateAdd('d',1,ev.date);
		calendario.fullCalendar( 'gotoDate', ev.date );
		getTitle(calendario);
	});
	
	$('#starts_on').datepicker({format: 'dd-mm-yyyy'}).on('changeDate', function(ev){
		var stdate = $.fullCalendar.formatDate(Date.DateAdd('d',1,ev.date),'dd-MM-yyyy');
		$('#enddate').datepicker('setStartDate', stdate);
	});
	$('#enddate').datepicker({format: 'dd-mm-yyyy'}).on('changeDate', function(ev){
		var stdate = $.fullCalendar.formatDate(Date.DateAdd('d',1,ev.date),'dd-MM-yyyy');
		$('#starts_on').datepicker('setEndDate', stdate);
	});
	
	$('#start_time').timepicker({
		template: false,
		showInputs: false,
		minuteStep: 1,
		defaultTime: 'value',
		showMeridian: false
	}).keypress(function(event){ return intNumber(event,$(this));
	});
	$('#end_time').timepicker({
		template: false,
		showInputs: false,
		minuteStep: 1,
		defaultTime: 'value',
		showMeridian: false
	}).keypress(function(event){ return intNumber(event,$(this));
	});
	
	calendario = $('#calendar').fullCalendar({
		weekends: false, // we'll show Saturdays and Sundays
		header: {
					left: '',
					center: '',
					right: ''
				},
		defaultView: 'agendaWeek',
		editable: true,
		weekends: true,
		firstDay: 1,
		slotMinutes: 30,
		axisFormat: 'hh:mm tt',
		firstHour: 7,
		allDaySlot: false,
		selectable: true,
		selectHelper: true,
		select: function( startDate, endDate, allDay, jsEvent, view ){
					//$('#form_booking').reset();

					var stdate = $.fullCalendar.formatDate(startDate,'dd-MM-yyyy');
					var endate = $.fullCalendar.formatDate(endDate,'dd-MM-yyyy');
					var starttm = $.fullCalendar.formatDate(startDate,'HH:mm');
					var endtm = $.fullCalendar.formatDate(endDate,'HH:mm');
					var day = $.fullCalendar.formatDate(startDate,'dddd');
					//alert(day);
					$('#new_booking').modal('show');
				
					$("#subject").val('');
					$("#description").val('');
					$("#sunnday").attr('checked',false);
					$("#monday").attr('checked',false);
					$("#tuesday").attr('checked',false);
					$("#wednesday").attr('checked',false);
					$("#thursday").attr('checked',false);	
					$("#friday").attr('checked',false);
					$("#saturday").attr('checked',false);
					
					$('#starts_on').val(stdate);
					$('#enddate').val(endate);
					$('#enddate').datepicker('setStartDate', stdate);
					$('#start_time').val(starttm);
					$('#end_time').val(endtm);
					$('#'+day.toLowerCase()).attr('checked','true'); 
					
				},
		
		/*************************************************************************************************************/
		// WHEN EVENT CHANGE DAY
		eventDrop: function(event,dayDelta,minuteDelta,revertFunc) {
			revertproc = revertFunc;
			if(event.series == 'true'){
				var msj = '<strong>THIS EVENT BELONGS TO A SERIES!</strong><br><span class="label label-important">Do you want to modify all the events in the series?</span><br>Click "No" if you just want to modify the current event.';
				jConfirm(msj, "Update Event", function(r) {
					if(r) {
						var starttime = $.fullCalendar.formatDate(event.start,'HH:mm');
						var newend = $.fullCalendar.formatDate(Date.DateAdd('m',minuteDelta,event.end),'HH:mm');
						modifyEvent( {action:'update_series', dayDelta: dayDelta, booking_id: event.booking_id, stime: starttime, etime: newend} ,revertFunc);
					} else {
						var bdate = $.fullCalendar.formatDate(event.start,'yyyy-MM-dd');
						var stime = $.fullCalendar.formatDate(event.start,'HH:mm');
						var etime = $.fullCalendar.formatDate(event.end,'HH:mm');
						modifyOneEvent({action: 'update_one_event', events_id: event.event_id, bookingid: event.booking_id, bookingdate: bdate, starttime: stime, endtime: etime},calendario);
					}
				});
			}else{
				var eventdate = $.fullCalendar.formatDate(event.start,'yyyy-MM-dd');
				var starttime = $.fullCalendar.formatDate(event.start,'HH:mm');
				var newend = $.fullCalendar.formatDate(Date.DateAdd('m',minuteDelta,event.end),'HH:mm');
				modifyEvent( {action:'update_event', booking_id: event.booking_id, bookingdate: eventdate, stime: starttime, etime: newend},calendario);
			}
			$("#tooltip-"+event.id).remove();
		},
		/*************************************************************************************************************/
		// WHEN EVENT CHANGE DURATION
		eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
			revertproc = revertFunc;
			dayDelta = parseInt(dayDelta);
			if(event.series == 'true'){
				var msj = '<strong>THIS EVENT BELONGS TO A SERIES!</strong><br><span class="label label-important">Do you want to modify all the events in the series?</span><br>Click "No" if you just want to modify the current event.';
				jConfirm(msj, "Update Event", function(r) {
					if(r) {
						var starttime = $.fullCalendar.formatDate(event.start,'HH:mm');
						var newend = $.fullCalendar.formatDate(Date.DateAdd('m',minuteDelta,event.end),'HH:mm');
						modifyEvent( {action:'update_series', dayDelta: dayDelta, booking_id: event.booking_id, stime: starttime, etime: newend},revertFunc);
					} else {
						var bdate = $.fullCalendar.formatDate(event.start,'yyyy-MM-dd');
						var stime = $.fullCalendar.formatDate(event.start,'HH:mm');
						var etime = $.fullCalendar.formatDate(event.end,'HH:mm');
						modifyOneEvent({action: 'update_one_event', events_id: event.event_id, bookingid: event.booking_id, bookingdate: bdate, starttime: stime, endtime: etime},calendario);
					}
				});
			}else{
				var eventdate = $.fullCalendar.formatDate(event.start,'yyyy-MM-dd');
				var starttime = $.fullCalendar.formatDate(event.start,'HH:mm');
				var newend = $.fullCalendar.formatDate(Date.DateAdd('m',minuteDelta,event.end),'HH:mm');
				modifyEvent( {action:'update_event', booking_id: event.booking_id, bookingdate: eventdate, stime: starttime, etime: newend},calendario);
			}
			$("#tooltip-"+event.id).remove();
		},
		eventMouseover: function( event, jsEvent, view ) { 
			xOffset = 10;
			yOffset = 30;
			$("body").append(event.tooltip);
			$("#tooltip-"+event.id)
			.css("top",(jsEvent.clientY - xOffset) + "px")
			.css("left",(jsEvent.clientX + yOffset) + "px")
			.css("position","absolute")
			.css("z-index","1001")
			.fadeIn("fast");
		},
		eventMouseout: function(event, jsEvent, view) {
			$("#tooltip-"+event.id).remove();
		},
		eventClick: function(event, jsEvent, view) {
		
			var eventdate = $.fullCalendar.formatDate(event.start,'yyyy-MM-dd');
			var starttime = $.fullCalendar.formatDate(event.start,'HH:mm');
			var endtime = $.fullCalendar.formatDate(event.end,'HH:mm');
			$('#resourcesdetail').modal('show');
			$('#bookinginfo').val(event.booking_id);
			$('#bookingseries').val(event.series);
			$('#bookingdate').val(eventdate);
			$('#bookingstarttime').val(starttime);
			$('#bookingendtime').val(endtime);
			$("#btn-eupdate,#btn-edelete,#bdetails").hide();
			loadAction({action:'get_booking_details', booking_id: event.booking_id, booking_date: eventdate, start_time: starttime, end_time: endtime},'#booking_details');
	
	        // change the border color just for fun
	        /*$(this).css('border-color', 'red');*/
	
	    },
		events: ajax_url + '/events.php',
		height: $(window).height() - 115
	});
	$("#cmb_resource").live('change',function(){
		loadAction({action:'get_mixed_locations',resource: $(this).val()},'#divlocations');
	});
	$('#repeat').change(function(){
		if( $(this).val() == 'daily' ){
			$(':checkbox').attr('checked', false);
		}
	});
	$('#ends_occurrences').click(function(){ $('#occurrences').focus(); });
	$('#ends_date').click(function(){
		if( $(this).attr('checked') )
			$('#occurrences').val('');
	});
	/*************************************************************************/
	$('#btn_week').click(function(){
		calendario.fullCalendar( 'changeView', 'agendaWeek' );
		getTitle(calendario);
	});
	$('#btn_day').click(function(){
		calendario.fullCalendar( 'changeView', 'agendaDay' );
		getTitle(calendario);
	});
	$('#btn_month').click(function(){
		calendario.fullCalendar( 'changeView', 'month' );
		getTitle(calendario);
	});
	$('#btn_back').click(function(){
		calendario.fullCalendar( 'prev' );
		getTitle(calendario);
		$('#dp6').datepicker('update',$.fullCalendar.formatDate(calendario.fullCalendar( 'getDate' ),'yyyy-MM-dd'));
	});
	$('#btn_next').click(function(){
		calendario.fullCalendar( 'next' );
		getTitle(calendario);
		$('#dp6').datepicker('update',$.fullCalendar.formatDate(calendario.fullCalendar( 'getDate' ),'yyyy-MM-dd'));
	});
	$('#btn_today').click(function(){
		calendario.fullCalendar( 'today' );
		getTitle(calendario);
		$('th.today').click();
	});
	getTitle(calendario);
	/*************************************************************************/
	$('#btn_selectnone').click(function(){
		$('#btn_mybookings').removeClass('btn-success');
		$(this).addClass('btn-success');
		$('input:checkbox').removeAttr('checked');
		$.cookie("resources", "");
		calendario.fullCalendar( 'refetchEvents' );
	});
	
	$('#btn_mybookings').click(function(){
		$('#btn_selectnone').removeClass('btn-success');
		$(this).addClass('btn-success');
		$.cookie("resources", "-1");
		calendario.fullCalendar( 'refetchEvents' );
	}); 
	$('#new_booking').on('shown',function(){
		$("#cmb_resource").val( [] );
		var ar = $("#resourcepicker").val() || [];
		$("#cmb_resource").val( ar );
		$("#cmb_resource").trigger("liszt:updated");
		loadAction({action:'get_mixed_locations',resource: $("#cmb_resource").val()},'#divlocations');
		$("#subject").focus();
		//$("#description").focus();
	}); 
	
	$('#btn-edelete').click(function(){
		if( $('#bookingseries').val() == 'true' ){ // delete condition
			var msj = '<strong>This event belongs to a series!</strong> <em>Do you want to delete this single event? Click "No" to delete the whole series.</em>';
			jConfirm(msj, "Delete Event", function(r) {
				if(r) {
					$.post(ajax_url+'/functions.php',{action: 'deletebooking', single: '0', starttime: $('#bookingstarttime').val(), endtime: $('#bookingendtime').val(), bookingdate: $('#bookingdate').val(), bookingid: $('#bookinginfo').val()},
					function(data){
						if(parseInt(data) > 0){
							$('#resourcesdetail').modal('hide');
							calendario.fullCalendar( 'refetchEvents' );
						}else{alert('This action could not be performed.');}
					});
				}else{
					$.post(ajax_url+'/functions.php',{action: 'deletebooking', single: '1', starttime: $('#bookingstarttime').val(), endtime: $('#bookingendtime').val(), bookingdate: $('#bookingdate').val(), bookingid: $('#bookinginfo').val()},
					function(data){
						if(parseInt(data) > 0){
							$('#resourcesdetail').modal('hide');
							calendario.fullCalendar( 'refetchEvents' );
						}else{alert('This action could not be performed.');}
					});
				}
			});
		}else{
			var msj = '<strong>Are you sure that you want to delete this event?</strong>';
			jConfirm(msj, "Delete Event", function(r) {
				if(r) {
					$.post(ajax_url+'/functions.php',{action: 'deletebooking', single: '1', starttime: $('#bookingstarttime').val(), endtime: $('#bookingendtime').val(), bookingdate: $('#bookingdate').val(), bookingid: $('#bookinginfo').val()},
					function(data){
						if(parseInt(data) > 0){
							$('#resourcesdetail').modal('hide');
							calendario.fullCalendar( 'refetchEvents' );
						}else{alert('This action could not be performed.');}
					});
				}
			});
		}// end of delete condition
	});
});

function getTitle(obj){
	var view = $('#calendar').fullCalendar('getView');
	$('#calendar_title').html('<h4>' + view.title + '</h4>');
}

function checkForm(){
	var day = false;
	if( $('#subject').val() == '' ){alert('Please type a subject for this event.'); $('#subject').focus(); return false;}
	if( $('#cmb_resource').val() == null ){alert('Please set at least one resource for this event.'); $('.search-field input:text').focus(); return false;}
	if( $('#cmb_room').val() == null ){alert('Please select a location for this event.'); $('.chzn-search input:text').focus(); return false;}
	if($('#repeat').val() == 'weekly'){
		if( document.getElementById('sunday').checked == true || 
			document.getElementById('monday').checked == true || 
			document.getElementById('tuesday').checked == true || 
			document.getElementById('wednesday').checked == true ||
			document.getElementById('thursday').checked == true || 
			document.getElementById('friday').checked == true || 
			document.getElementById('saturday').checked == true){ day = true; }
		if(day == false){alert('Please select at least one day of the week for this event to be repeated.'); return false;}
	}
	if( document.getElementById('ends_occurrences').checked == true ){
		if($('#occurrences').val() != ''){
			if(parseInt($('#occurrences').val()) < 1){alert('Please specify the number of occurrences.');$('#occurrences').focus();return false}
		}else{alert('Please specify the number of occurrences.');$('#occurrences').focus();return false}
	}
	//send all data to server
	var d = [];
	var daysofweek = '';
	var occurrences = '-1';
	var rs = $("#cmb_resource").val() || [];
	$('[type="checkbox"]:checked').each(function(i,value){
		d[i] = $(this).val();
	});
	if( d.length == 0 ){ daysofweek = '-1';}else{ daysofweek = d.join(','); }
	if( document.getElementById('ends_occurrences').checked == true ){
		occurrences = $('#occurrences').val();
	}else{ occurrences = '-1'; }
	booking_params = null;
	booking_params = {
			action: 'new_booking',
			subject: $('#subject').val(),
			description: $('#description').val(),
			location: $('#cmb_room').val(),
			repeat: $('#repeat').val(),
			repeaton: daysofweek,
			startson: $('#starts_on').val(),
			endsoc: occurrences,
			endson: $('#enddate').val(),
			resources: rs.join(','),
			stime: $('#start_time').val(),
			etime: $('#end_time').val()
		};
	//CAMBIOS barra proceso
	$('#new_booking').modal('hide');
	$(document).ready(function () {
		$('#modal_progress').modal({
			show: true,
			keyboard: false,
			backdrop: true, 
			backdrop: 'static'
		});
	});
/*
	calendario.fullCalendar('refetchEvents');
		var message = '<div id="message1" class="alert alert-success fade in"><button class="close" data-dismiss="alert">&times;</button><p>Waiting a moment, your booking is saving.</p></div>';
						$("#info").html(message);
						$("#message1").fadeIn(1000);
						$(".alert").alert();
						$("#message1").delay(100000).fadeOut(1000);
*/	
	/*$('#booking_qu').modal('show');
	loadAction(
		{
		resources: rs.join(','), 
		action: 'pick_quantity', 
		bookingdate: $('#starts_on').val(), 
		stime: $('#start_time').val(), 
		etime: $('#end_time').val()
		}, '#booking_quantity'); */
	booking_params.action = 'pick_quantity';
	add_booking(booking_params);
	//loadAction(booking_params, '#booking_quantity');
}

function create_booking(){
	var d = [];	
	$('.cmbresourcesq').each(function(i,value){
		d[i] = value.options[value.selectedIndex].value;
	});
	booking_params.quantities = d.join(',');
	booking_params.action = 'new_booking';
	add_booking(booking_params);
	$('#booking_qu').modal('hide');
}

function add_booking(param){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		data: param,
		context: document.body,
		statusCode: {
			404: function() {
			  $('#info').html('<div class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>This action could not be performed.</p></div>');
			  $(".alert").alert();
			  return false;
			}
		},
		success: function(data) {
			if( !isNaN(data) ){
				if( parseInt(data) > 0 ){
					//$('#new_booking').modal('hide');
					calendario.fullCalendar('refetchEvents');
					$('#modal_progress').modal('hide');
					var message = '<div id="message" class="alert alert-success fade in"><button class="close" data-dismiss="alert">&times;</button><p>Your booking has been successfully created.</p></div>';
					$("#info").html(message);
					$("#message").fadeIn(1000);
					$(".alert").alert();
					$("#message").delay(5000).fadeOut(1000);
				}else{jAlert("Your reservation could not be done. The resource you are requesting is busy at this time.", "Busy Resource");
					$('#modal_progress').modal('hide');
				}
			}else{
				//$('#modal_progress').modal('hide');				
				$('#new_booking').modal('hide');
				$('#booking_qu').modal('show');
				$('#booking_quantity').html(data);
			}
		}
	});
}

function filterResources(){

	var rs = $("#resourcepicker").val() || [];
	rs = rs.join(',');
	$.cookie("resources", rs);
	calendario.fullCalendar( 'refetchEvents' );
	//$("#cmb_resource > option:selected").prop("selected", false);
	//$("#cmb_resource").val( $("#resource_picker").val().split(',') );
}

function openList(clName/*,objID*/){
	/*$("div.resource-container > button").removeClass('btn-inverse');
	$('#'+objID).addClass('btn-inverse');*/
	$("div#list_resources").hide();
	$("."+clName).show(500);
}

function restoreResources(){
	var rs = [];
	var res = '';
	if( $.cookie("resources") != '' && $.cookie("resources") != '-1' ){
		res = $.cookie("resources");
		if( !res )return false;
		rs = res.split(',');
		if(rs.length > 0){
			for(var i = 0; i < rs.length; i++ ){
				$('[name="resourceid-' + rs[i] + '"]').prop('checked', true);
			}
		}
	}
}
function sendUpdate(){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		/*dataType: 'json text',*/
		data: {action: 'set_update_event', booking_id: $('#ebooking_id').val(), subject: $('#esubject').val(), location: $('#elocation').val()},
		context: document.body,
		statusCode: {
			404: function() {
			  $('#info').html('<div class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>This action could not be performed.</p></div>');
			  $(".alert").alert();
			  return false;
			}
		},
		success: function(data) {
			if(parseInt(data) > 0){
				alert('The booking was successfuly updated.');
				calendario.fullCalendar( 'refetchEvents' );
			}
			$('#resourcesdetail').modal('hide');
		}
	});
}
function deleteevent(n){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		/*dataType: 'json text',*/
		data: {action: 'deleteevent', booking_id: $('#bookinginfo').val(), series: n, starttime: $('#bookingstarttime').val(), endtime: $('#bookingendtime').val()},
		context: document.body,
		statusCode: {
			404: function() {
			  $('#info').html('<div class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>This action could not be performed.</p></div>');
			  $(".alert").alert();
			  return false;
			}
		},
		success: function(data) {
			if(parseInt(data) > 0){
				alert('The booking was successfuly deleted.');
				calendario.fullCalendar( 'refetchEvents' );
			}
			$('#resourcesdetail').modal('hide');
		}
	});
}

/*

jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}*/
