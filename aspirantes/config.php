<?php
$mysql_host = "mysql14.000webhost.com";
$mysql_user = "a9291836_cbtis48";
$mysql_password = "711873008181zz";
$mysql_database = "a9291836_cbtis";
$cn=mysqli_connect($mysql_host,$mysql_user,$mysql_password);
mysqli_select_db($cn,$mysql_database);
mysqli_set_charset($cn,'utf8');
//"ON" Habilita el tramite de fichas al público. Para negarlo use "OFF";
$config_tramite="ON";
//Indica la generación con la cual se trabajará. Por defecto es el año en curso
$config_generacion=date(Y);
$tabla="c48_aspirantes".$config_generacion;
?>