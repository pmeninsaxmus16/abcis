// JavaScript Document

function loadAction(param,container){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		/*dataType: 'json text',*/
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
			if( container == 'update_series' ){
				//nada	
			}else{
				$(container).html(data);
				if(container == '#resource_picker')
					$(".chzn-select").chosen().change(function(){
						filterResources();
					});
				else if(container == '#booking_details'){
					if( $("#esubject").val().length > 0)
						$("#btn-eupdate,#btn-edelete").show();
				}else $(".chzn-select").chosen(); 
			}
		}
	});
}

function loadTable(template_name,tmp, npage){
	$.ajax({
		url: template_url+'/'+template_name+".php",
		type: 'POST',
		data: {page: npage, template: template_name, container: tmp},
		context: document.body,
		statusCode: {
			404: function() {
			  $(tmp).html('<h3>Template not found.</h3>');
			  return false;
			}
		},
		success: function(data) {
			$(tmp).html(data);
		}
	});
}

function addActions(template,class_name,action){
	var ch = [];
	$(':checkbox:checked').each(function(i,v){
		ch.push(v.value);
	});
	if(ch.length > 0){
		if(confirm('Are you sure that you want to delete these items?')){
			addAction(template,class_name,action,ch.join(','));
		}
	}
}

function confirmDelete(template_name,class_name,act,p){
	if(confirm('Are you sure that you want to delete this item?')){
		addAction(template_name,class_name,act,p);
	}
}

function addAction(template_name,class_name,act,p){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		data: {template: template_name, 'class': class_name, action: act, param: p},
		context: document.body,
		statusCode: {
			404: function() {
			  $('#info').html('<div class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>This action could not be performed.</p></div>');
			  $(".alert").alert();
			  return false;
			}
		},
		success: function(data) {
			var message = '';
			if(parseInt(data) == 1){
				message = '<div id="message" class="alert alert-success fade in"><button class="close" data-dismiss="alert">&times;</button><p>The resource was deleted successfully.</p></div>';
			}else if(parseInt(data) > 1){
				message = '<div id="message" class="alert alert-success fade in"><button class="close" data-dismiss="alert">&times;</button><p>The resources were deleted successfully.</p></div>';
			}else{
				message = '<div id="message" class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>These action could not be performed. Please check out if some other objects depend on these item. [NOTICE: '+data+']</p></div>';	
			}
			$("#info").html(message);
			$(".alert").alert();
			$('#message').bind('closed', function () {
				document.getElementById('nav_options').submit();	
			});
		}
	});
}

function clearSearch(){
	$('#keyword').val( '' );
	document.getElementById('nav_options').submit();
}

function performSearch(obj){
	$('#keyword').val( $(obj).val() );
	$('#page').val('1');
	document.getElementById('nav_options').submit();
}

function add_edit_resource(pid,pnm,pcid,pqu,ptbb,ptid){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		data: {action: 'add_resource', id: pid, nm: pnm, cid: pcid, qu: pqu, tbb: ptbb, tid: ptid },
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
				$('#new_resource').modal('hide');
				var message = '';
				message = '<div id="message" class="alert alert-success fade in"><button class="close" data-dismiss="alert">&times;</button><p>The resource was registered successfully.</p></div>';		
				$("#info").html(message);
				$(".alert").alert();
				$('#message').bind('closed', function () {
					document.getElementById('nav_options').submit();	
				});
			}
		}
	});
}

function add_edit_locations(ids,rid){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		data: {action: 'save_locations', rooms: ids, resource: rid },
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
				$('#locations').modal('hide');
				var message = '';
				message = '<div id="message" class="alert alert-success fade in"><button class="close" data-dismiss="alert">&times;</button><p>The locations were added successfully to the resource.</p></div>';		
				$("#info").html(message);
				$(".alert").alert();
				$('#message').bind('closed', function () {
					document.getElementById('nav_options').submit();	
				});
			}
		}
	});
}

function modifyEvent(param,calendario){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		/*dataType: 'json text',*/
		data: param,
		context: document.body,
		statusCode: {
			404: function() {
			  $('#info').html('<div class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>This action could not be performed.</p></div>');
			  $(".alert").alert();
			  calendario.fullCalendar( 'refetchEvents' );
			  return false;
			}
		},
		success: function(data) {
			var d = parseInt(data);
			if(d == 0){
				$('#info').html('<div id="message" class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>Your reservation could not be done. The resource you are requesting is busy at this time or is not available.</p></div>');
			  	$("#message").fadeIn(1000);
				$(".alert").alert();
				$("#message").delay(5000).fadeOut(1000);
				calendario.fullCalendar( 'refetchEvents' );
			  	return false;
			}
		}
	});
}

function modifyOneEvent(param,calendario){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		data: param,
		context: document.body,
		statusCode: {
			404: function() {
			  $('#info').html('<div class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>This action could not be performed.</p></div>');
			  $(".alert").alert();
			  calendario.fullCalendar( 'refetchEvents' );
			  return false;
			}
		},
		success: function(data) {
			var d = parseInt(data);
			if(d == 0){
				$('#info').html('<div id="message" class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>Your reservation could not be done. The resource you are requesting is busy at this time or is not available.</p></div>');
			  	$("#message").fadeIn(1000);
				$(".alert").alert();
				$("#message").delay(5000).fadeOut(1000);
			  	return false;
			}
			calendario.fullCalendar( 'refetchEvents' );
		}
	});
}

//funcion que permite a un campo de texto solo numeros enteros, retorna falso si no es numero,
//forma de uso: onKeyPress="return intNumber(event,this);"
//para esta funcion se ha tomado en cuenta la tecla backspace(8)
function intNumber(e,obj){
	var keynum;
	var keychar;
	var numcheck;
	var valorObj;
	if(window.event){ // IE
		keynum = e.keyCode;
	}else if(e.which){ // Netscape/Firefox/Opera
		keynum = e.which;
	}
	keychar = String.fromCharCode(keynum);
	numcheck = /\d/;
	valorObj = obj.value;
	//alert(e.which);
	return numcheck.test(keychar) || (keynum == 8) || (e.which == 0);
}
