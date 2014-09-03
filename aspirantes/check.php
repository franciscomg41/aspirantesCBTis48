<?php
	if($_SESSION['curp']==''||$_SESSION['fecha']==''){
		header('Location: /logout.php');
	}
?>