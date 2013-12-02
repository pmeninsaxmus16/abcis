<?php

require("nvalidateform.php");
$util = new nvalidateform();
?>
<!DOCTYPE html>
<html>
<head>
<head>
<meta charset="utf-8">
<title>Ejemplo sencillo</title>
	<?php
	$util->include_javascript(array("jquery-1.10.2.js"));

	//$util->include_css(array("prompt/imprompt.css","bootstrap/css/bootstrap.css","bootstrap/css/bootstrap-responsive.css","bootstrap/css/datepicker.css"));
	?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>
<h1 id="header">Esto es JavaScript</h1>
<body>
</body>
</html>
<script>
jQuery.each(jQuery.browser, function(i, val) {
  $("<div>" + i + " : <span>" + val + "</span>")
  .appendTo( document.body );
	$("p").html( "The version # of the browser's rendering engine is: <span>" +
                $.browser.version + "</span>" );



if ( $.browser.msie ) {
  alert( $.browser.version );
}
alert($.browser.version);
});

$(document).ready(function(){
alert($.browser.version);
    if (navigator.userAgent.indexOf('Mac OS X') != -1) {
        // Mac
        if ($.browser.opera) { alert('opera'); }
        if ($.browser.webkit) {alert('webkit'); }
        if ($.browser.mozilla) { alert('mozilla'); }
        if (/camino/.test(navigator.userAgent.toLowerCase())){alert('camino'); }
        if (/chrome/.test(navigator.userAgent.toLowerCase())) { alert('chrome'); }
        if (navigator && navigator.platform && navigator.platform.match(/^(iPad|iPod|iPhone)$/)) {alert('apple'); }
        if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) { alert('safari'); }
    } else {
        // Not Mac
        if ($.browser.opera) { alert('opera-pc'); }
        if ($.browser.webkit) { alert('webkit-pc'); }
        if ($.browser.mozilla) { alert('mozilla-pc'); }
        if (document.all && document.addEventListener) { alert('ie9'); }
        if (/chrome/.test(navigator.userAgent.toLowerCase())) { alert('chrome-pc'); }
        if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) { alert('safari-pc'); }
    }
});
</script> 
