<?php
	session_start();
	session_destroy();
	//header('Content-type: text/plain; charset=utf-8');
	include 'config.php';
	function existeCurp($curp){
		global $tabla,$cn;
		$q="SELECT count(*) FROM $tabla WHERE asp_curp='$curp'";
		$res = mysqli_query($cn,$q);
		while($row=mysqli_fetch_row($res)){
			$cant=$row[0];
		}
		return $cant;
	}
	if($config_tramite=="ON"){
		if($_POST['email']){
			$curp=$_POST['curp'];
			$nombre1=$_POST['nombre1'];
			$nombre2=$_POST['nombre2'];
			$nombre3=$_POST['nombre3'];
			$apellidop=$_POST['apellidop'];
			$apellidom=$_POST['apellidom'];
			$fechanac=$_POST['fechanac'];
			$esp1=$_POST['especialidad1'];
			$esp2=$_POST['especialidad2'];
			$esp3=$_POST['especialidad3'];
			$turno=$_POST['turno'];
			$sec_nombre=$_POST['sec_nombre'];
			$sec_clave=$_POST['sec_clave'];
			$sec_tipo=$_POST['sec_tipo'];
			$sec_regimen=$_POST['sec_regimen'];
			$promedio=$_POST['promedio'];
			$estado=$_POST['estado'];
			$municipio=$_POST['municipio'];
			$localidad=$_POST['localidad'];
			$colonia=$_POST['colonia'];
			$direccion=$_POST['direccion'];
			$cp=$_POST['cp'];
			$telefono=$_POST['telefono'];
			$email=$_POST['email'];
			$mycurp=$curp;
			$q="SELECT count(asp_curp) FROM $tabla WHERE asp_curp='$curp'";
			$res = mysqli_query($cn,$q);
			while($row=mysqli_fetch_row($res)){
				$cant=$row[0];
			}
			if($cant==0){
				// Camino normal de inserción
				$q="INSERT INTO $tabla VALUES (NULL,'$curp','$nombre1','$nombre2','$nombre3','$apellidop','$apellidom','$fechanac','$esp1','$esp2','$esp3','$turno','$sec_nombre','$sec_clave', '$sec_tipo','$sec_regimen','$promedio','$estado','$municipio','$localidad','$colonia','$direccion','$cp','$telefono','$email',now()-INTERVAL 2 HOUR)";
				$res=mysqli_query($cn,$q);
				if($res){
					session_register('mycurp');
					header("Location:./mificha.php");
				}else{
					//error de conexion
					header("Location:../");
				}
			}else{
				// Bug botón guardar. No se puede duplicar registros con la misma CURP
				header("Location:../");
			}
		}else{
			//NO continua por que no pasó por el formulario
			header("Location:../");
		}
	}else{
		//NO se puede insertar por que no es temporada
		header("Location:../");
	}
?>