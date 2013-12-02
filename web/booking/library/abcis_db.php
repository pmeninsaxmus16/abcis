<?php
require_once "ez_sql_postgresql.php";
class ABCIS_DB extends ezSQL_postgresql{
	
	function ABCIS_DB(){
		parent::ezSQL_postgresql('postgres', 'trali20ausa', 'abcis', 'localhost');
		//parent::ezSQL_mysql('abcisuser', '-womAnize4', 'abcis', 'localhost');
		// pg_connect("host=rh port=5432 dbname=abcis user=postgres password=trali20ausa") or die ("Nao consegui conectar ao PostGres --> " . pg_last_error($conn));

	}
}
?>
