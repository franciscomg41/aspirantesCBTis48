<?php
	session_start();
	session_destroy();
	include 'aspirantes/curp.php';
	$curp=$_POST['curp'];
	$mycurp=$curp;
	//Condiciones para que sea una CURP valida
	$error=False;
	$valores=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
	$letras=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$numeros=array('0','1','2','3','4','5','6','7','8','9');
	//UpperCase
	$curp=strtoupper($curp);
	//Longitud = 18
	if(strlen($curp)!=18){
		$error=True;
	}
	//Letras y números
	for($c=0;$c<strlen($curp);$c++){
		for($i=0;$i<count($valores);$i++){
			if($curp[$c]==$valores[$i]){
				break;
			}
			if($i==35){
				$error=True;
			}
		}
	}
	//4 letras al principio
	for($c=0;$c<4;$c++){
		for($i=0;$i<count($letras);$i++){
			if($curp[$c]==$letras[$i]){
				break;
			}
			if($i==25){
				$error=True;
			}
		}
	}
	//6 siguientes son numeros
	for($c=4;$c<10;$c++){
		for($i=0;$i<count($numeros);$i++){
			if($curp[$c]==$numeros[$i]){
				break;
			}
			if($i==9){
				$error=True;
			}
		}
	}
	//6 siguientes son letras
	for($c=10;$c<16;$c++){
		for($i=0;$i<count($letras);$i++){
			if($curp[$c]==$letras[$i]){
				break;
			}
			if($i==25){
				$error=True;
			}
		}
	}
	//2 numeros al final
	for($c=16;$c<18;$c++){
		for($i=0;$i<count($numeros);$i++){
			if($curp[$c]==$numeros[$i]){
				break;
			}
			if($i==9){
				$error=True;
			}
		}
	}
	//Si hay error con la curp manda directo a la página principal
	if($error){
		header("Location:./");
	}else{
		//Verifica la cantidad de folios registrados con la curp de la generación actual
		$cant=existeCurp($curp);
		if($cant==0){
			//Obtiene la fecha del CURP
			for($c=4;$c<6;$c++){$y.=$curp[$c];}
			for($c=6;$c<8;$c++){$m.=$curp[$c];}
			for($c=8;$c<10;$c++){$d.=$curp[$c];}
			$fecha = $y.'-'.$m.'-'.$d;
			$fecha = date_create(date('y-m-d',strtotime($fecha)));
			$fecha = date_format($fecha,'Y-m-d');
			//Crea sesiones con datos de curp y fecha de nacimiento
			session_register('curp');
			session_register('fecha');
			header("Location:./aspirantes");
		}
		if($cant==1){
			//Debe redireccionar a una página que de la oportunidad de ver el folio
			session_register('mycurp');
			header("Location:./?status=done");
		}
	}
?>