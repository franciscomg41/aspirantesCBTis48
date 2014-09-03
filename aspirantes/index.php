<?
	session_start();
	require 'check.php';
	include 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>CBTis 48</title>
	<script src="functions.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="jquery.label_better.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="index.css">
	<script>
	$(document).ready( function(){
		$("input.label_better").label_better({
			position: "top", // This will let you define the position where the label will appear when the user clicked on the input fields. Acceptable options are "top", "bottom", "left" and "right". Default value is "top".
			animationTime: 500, // This will let you control the animation speed when the label appear. This option accepts value in milliseconds. The default value is 500.
			easing: "ease-in-out", // This option will let you define the CSS easing you would like to see animating the label. The option accepts all default CSS easing such as "linear", "ease" etc. Another extra option is you can use is "bounce". The default value is "ease-in-out".
			offset: 12, // You can add more spacing between the input and the label. This option accepts value in pixels (without the unit). The default value is 20.
			hidePlaceholderOnFocus: true // The default placeholder text will hide on focus
		});
	});
	</script>
<!---->
<script>
	$(function() {
	var availableTags = [
		<?
		$q="SELECT asp_sec_nombre FROM $tabla GROUP BY asp_sec_nombre";
		$res = mysqli_query($cn,$q);
		while($row=mysqli_fetch_row($res)){
			$escuela=$row[0];
			echo "'".$escuela."',";
		}
		?>
	];
	$("#sec_nombre").autocomplete({
		source: availableTags
	});
});
</script>
<!---->
</head>
<body>
	<section id="content">
		<header>
			<h1>Formulario para solicitud de ficha</h1>
		</header>
		<form id="nuevoAspirante" action="curp.php" method="POST">
			<div>
				<h2 id='h2_1'>Información básica:</h2>
				<h2 id='h2_2' title='Revisa que tu CURP esté escrita correctamente'>CURP: <?echo $_SESSION['curp']?></h2>
			</div>
			<input autocomplete='off' class='label_better' id='nombre1' name='nombre1' placeholder='Primer nombre' required title='Ingresa tu nombre'>
			<input autocomplete='off' class='label_better' id='nombre2' name='nombre2' placeholder='Segundo nombre' title='Si tienes un segundo nombre ingrésalo aquí'>
			<input autocomplete='off' class='label_better' id='nombre3' name='nombre3' placeholder='Tercer nombre' title='Si tienes un tercer o más nombres ingrésalos aquí'>
			<br>
			<input autocomplete='off' class='label_better' id='apellidop' name='apellidop' placeholder='Apellido paterno' required title='Ingresa tu apellido paterno'>
			<input autocomplete='off' class='label_better' id='apellidom' name='apellidom' placeholder='Apellido materno' required title='Ingresa tu apellido materno'>
			<br>
		<h2>Domicilio del solicitante:</h2>
			<select id='estado' name='estado' required onchange='mostrarMunicipios();' title='Selecciona tu estado'>
				<script>selectEstado()</script>
			</select>
			<select id='municipio' name='municipio' required title='Selecciona tu municipio'>
				<option value='' disabled selected>Municipio</option>
			</select>
			<br>
			<input autocomplete='off' class='label_better' id='localidad' name='localidad' placeholder='Localidad' required title='Ingresa el nombre de tu localidad'>
			<input autocomplete='off' class='label_better' id='colonia' name='colonia' placeholder='Colonia' required title='Ingresa el nombre de tu colonia'>
			<br>
			<input autocomplete='off' class='label_better' id='direccion' name='direccion' placeholder='Dirección' required title='Ingresa el nombre de tu calle y número'>
			<input autocomplete='off' class='label_better' id='cp' name='cp' placeholder='C.P.' maxlength='5' required title='Ingresa tu código postal'>
			<br>
		<h2>Especialidad y turno a solicitar</h2>
			<select id='especialidad1' name='especialidad1' required title='Selecciona una especialidad como tu primera opción' onchange='selectEspecialidad(2);selectEspecialidad(3);'>
				<script>selectEspecialidad(1)</script>
			</select>
			<select id='especialidad2' name='especialidad2' required title='Selecciona otra especialidad como tu segunda opción' onchange='selectEspecialidad(3);'>
				<option value='' disabled selected>Opción 2</option>
			</select>
			<br>
			<select id='especialidad3' name='especialidad3' required title='Selecciona otra especialidad como tu tercera opción'>
				<option value='' disabled selected>Opción 3</option>
			</select>
			<select id='turno' name='turno' required title='Selecciona el turno que deseas'>
				<option value='' disabled selected>Turno</option>
				<option>Matutino</option>
				<option>Vespertino</option>
			</select>
			<br>
		<h2>Datos de la secundaria de procedencia:</h2>
			<input autocomplete='off' class='label_better' id='sec_nombre' name='sec_nombre' placeholder='Nombre de la escuela' required title=''>
			<input autocomplete='off' class='label_better' id='sec_clave' name='sec_clave' placeholder='Clave de la escuela' required title='Ingresa la clave de la escuela secundaria de procedencia' maxlength='10' onblur='upperIt(this)'>
			<br>
			<select id='sec_tipo' name='sec_tipo' required title='Selecciona el tipo de escuela secundaria'>
				<option value='' disabled selected>Tipo de secundaria</option>
				<option>General</option>
				<option>Técnica</option>
				<option>Telesecundaria</option>
				<option>Abierta</option>
				<option>Para trabajadores</option>
				<option>Particular</option>
			</select>
			<select id='sec_regimen' name='sec_regimen' required title='Selecciona el régimen de la escuela secundaria'>
				<option value='' disabled selected>Régimen de la escuela</option>
				<option>Pública</option>
				<option>Privada</option>
			</select>
			<input autocomplete='off' class='label_better' type='number' id='promedio' name='promedio' min='6' max='10' step='0.1' placeholder='Prom.' data-new-placeholder='Promedio' required title='Ingresa tu promedio de calificaciones actual'>
		<h2>Información de contacto:</h2>
			<input autocomplete='off' class='label_better' type="tel" id='telefono' name='telefono' placeholder='Teléfono' required maxlength='10' title='Ingresa los 10 dígitos de tu número telefónico o celular'>
			<input autocomplete='off' class='label_better' type="email" id='email' name='email' placeholder='E-mail' required title='Ingresa tu correo electrónico'>
			<br>
			<input type='hidden' name='curp' value='<?echo $_SESSION['curp']?>'>
			<input type='hidden' name='fechanac' value='<?echo $_SESSION['fecha']?>'>
			<input class='buttons' type='submit' value='Enviar'>
			<a class='buttons cancel' type='submit' value='Cancelar' onclick="window.location.href = '../logout.php'">Cancelar</a>
		</form>
		<div style="text-align: right;">
			<img src="http://cbtis48.ml/logo48.png" style="margin-top: -268px;width: 300px;height: auto;">
		</div>
	</section>
	<script>$( document ).tooltip();
	$( document ).tooltip({ tooltipClass: "custom-tooltip-styling" });
	</script>
</body>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-49184522-1']);
_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</html>