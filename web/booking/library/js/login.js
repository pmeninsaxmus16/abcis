// javascript for login page
$(document).ready(function(){
	$("#txtusername").focus();
	$("#txtpassword").keypress(function(event) {
		if ( event.which == 13 ) {
			checklogin(document.getElementById('frmlogin'));
		}
	});
});


function checklogin(frm){
	//check for fields needs to filled in
	var message = '';
	if($("#txtusername").val() == ''){
		var errormessage = 'Please type your username';
		message = '<div id="message" class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>' + errormessage + '</p></div>';
		$("#info").html(message);
		$("#message").fadeIn(1000);
		$(".alert").alert();
		$("#message").delay(5000).fadeOut(1000);
		return false;
	}
	if($("#txtpassword").val() == ''){
		var errormessage = 'Please type your password';
		message = '<div id="message" class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>' + errormessage + '</p></div>';
		$("#info").html(message);
		$("#message").fadeIn(1000);
		$(".alert").alert();
		$("#message").delay(5000).fadeOut(1000);
		return false;
	}
	$("#action").val('login');
	frm.submit();
}