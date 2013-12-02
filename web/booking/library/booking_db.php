<?php
require "ez_sql_mysql.php";
class Booking_DB extends ezSQL_mysql{
	
	function Booking_DB(){
		parent::ezSQL_mysql('abcis', 'trali20ausa', 'iabcis', 'localhost');
	}
}
?>