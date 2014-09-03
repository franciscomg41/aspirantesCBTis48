<?
	session_start();
	if(preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT'])){
		// if IE<=9
		header('Location: navegadores.html');
	}else{
		// if IE>9
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>CBTis 48</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="bootstrap.js"></script>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="index.css">
	<script src="aspirantes/functions.js"></script>
	<script src="http://malsup.github.com/jquery.cycle2.js"></script>
	<?if($_SESSION['mycurp']){
		if($_GET['status']=='done'){
	?>
		<script>
		$(document).ready( function(){
			$('#see').modal('show');
		});
		</script>
	<?
		}else{
			session_destroy();
		}
	}
	?>
	<script>
		var especialidades=["La carrera de técnico en administración de recursos humanos se desarrolla como vertiente de la carrera de administración y ofrece las competencias profesionales que permiten al estudiante elaborar y gestionar documentación administrativa referente a recursos humanos, integrar al personal a la organización, asistir en actividades de capacitación desarrollo y evaluación del personal, así como determinar las remuneraciones al personal.","Es un profesional con las condiciones y aptitudes para colaborar con los miembros del equipo del área química en la solución de necesidades y de problemas basados en los conocimientos de química, biología, física, así como análisis químicos y bacteriológicos en general. Puedes continuar tus estudios en: Medicina, Ingeniería química, Biología, Agronomía y Bioquímica.","Formar profesionales con los conocimientos y habilidades que los capaciten en la detección de fallas mecánicas, llevando a cabo mantenimiento de maquinarias y sus accesorios utilizando un criterio y una mayor eficiencia en el empleo de las instalaciones y en el manejo de maquinaria. Puedes continuar tus estudios en: Ingeniería industrial, Ingeniería mecatrónica.","Formar al profesional con los conocimientos y habilidades para dirigir y supervisar los procesos de producción en montaje y mantenimiento de sistemas, equipos y partes electrónicas, interpretando diagramas electrónicos y seleccionando materiales y equipo que utilicen en los procesos de producción y ensamble de la industria electrónica.","Formar al profesional con los conocimientos y habilidades para intervenir en la coordinación de los procesos de fabricación, operación y mantenimiento de máquinas de combustión interna y sus sistemas eléctricos, además interpretar y elaborar guías mecánicas para el montaje y fijación de las máquinas de combustión interna. Puedes continuar tus estudios en: Ingeniería mecánica, Ingeniería industrial e Ingeniería automotriz.","Tiene por objetivo formar técnicos con una preparación propedéutica que le permita continuar estudios a nivel licenciatura en el área económica administrativa, así como una formación tecnológica que de los conocimientos técnicos para el manejo de sistemas contables y financieros. Puedes continuar tus estudios en las licenciaturas de: Contaduría, Economía, Administración de empresas, Estadística, Relaciones comerciales, Comercio internacional, Turismo e Informática."];
		var backs=["http://utslp.edu.mx/wp-content/uploads/2013/11/Contabilidad-1.jpg"];
		//0 Administración de recursos humanos
		//1 Laboratorista químico
		//2 Mecánica industrial
		//3 Electrónica
		//4 Mantenimiento automotriz
		//5 Contabilidad
		function getEspecialidad(i){
			document.getElementById('description').innerHTML=especialidades[i];
			document.getElementById('description').style.fontSize='13px';
			document.getElementById('description').style.padding='10px';
			document.getElementById('description').style.textAlign='justify';
		}
	</script>
	<style>
	#mainsection{
		min-width: 930px;
	}
	#description{
		background-color: #909292;
		display: block;
		width: 920px;
		text-align: center;
		font-family: sans-serif;
		font-size: 30px;
		color: #292121;
		font-weight: bold;
		margin-left: auto;
		margin-right: auto;
		padding-top: 22px;
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		min-height: 95px;
	}
	#especialidades{
		margin-top: 20px;
	}
	#list {
		display: inline-block;
		vertical-align: top;
		background-color: #CACECD;
		padding-left: 0px;
		border-top-left-radius: 10px;
		margin-bottom: 0px;
		text-align: left;
	}
	#infodiv {
		width: 640px;
		height: 360px;
		background-color: #4F7292;
		display: inline-block;
		vertical-align: top;
		margin-left: -4px;
		border-top-right-radius: 10px;
		background-repeat: no-repeat;
		background-size: 100% auto;
		position: relative;
	}
	.especialidades{
		list-style: none;
		width: 280px;
		height: 60px;
		padding-top: 20px;
		padding-left: 15px;
//color: #3563D3;
font-size: 12px;
font-weight: bold;
	}
	.especialidades:hover{
		background-color: #80E785;
		transition: .3s;
		padding-left: 25px;
	}
	.especialidades:first-child {
		border-top-left-radius: 10px;
	}
	.imgs{
		height: 360px;
		border-top-right-radius: 10px;
width: 640px;
	}
	</style>
</head>
<body>
	<header class="main-navigation" id="site-header">
		<a href="/">
			<hgroup id="logo" style="text-align: center">
				<img src="logo48.png" style="width: auto;height:100%">
			</hgroup>
		</a>
		<div class="navigation">
			<nav class="site-nav">
				<a class="nav-link" data-toggle="modal" data-target="#ins" href="#instrucciones">
				Instrucciones</a>
				<a class="nav-link" data-toggle="modal" data-target="#reg" href="#aspirantes">
				Registro</a>
			</nav>
			<nav class="action-nav">
				<a class="nav-link icon-search" href="https://www.facebook.com/CBTis48" title="Síguenos en Facebook" id='fb'>
					<span class="cbtis-name">CBTis "Mariano Abasolo"</span>
					<img src="fb.png">
				</a>
			</nav>
		</div>
	</header>
	<section id="mainsection">
		<h1 class="page-title type-dark">Trámite de fichas para el examen de admisión 2014</h1>
		<section id="especialidades">
			<ul id="list">
				<li class="especialidades" onmouseover="getEspecialidad(0)">✓ Administración de recursos humanos</li>
				<li class="especialidades" onmouseover="getEspecialidad(1)">✓ Laboratorista químico</li>
				<li class="especialidades" onmouseover="getEspecialidad(2)">✓ Mecánica industrial</li>
				<li class="especialidades" onmouseover="getEspecialidad(3)">✓ Electrónica</li>
				<li class="especialidades" onmouseover="getEspecialidad(4)">✓ Mantenimiento automotriz</li>
				<li class="especialidades" onmouseover="getEspecialidad(5)">✓ Contabilidad</li>
			</ul>
			<div id="infodiv" class="cycle-slideshow">
<?
			$imgs=array(
				"http://imageshack.com/a/img28/9782/olnp.jpg",
				"http://imageshack.com/a/img59/6214/4vih.jpg",
				"http://imageshack.com/a/img812/3476/mz5v.jpg",
				"http://imageshack.com/a/img706/2759/q6pn.jpg",
				"http://imageshack.com/a/img21/3807/99op.jpg",
				"http://imageshack.com/a/img18/4840/9wk6.jpg",
				"http://imageshack.com/a/img835/4717/dhqd.jpg",
				"http://imageshack.com/a/img62/3509/e47s.jpg",
				"http://imageshack.com/a/img706/9283/a9du.jpg",
				"http://imageshack.com/a/img833/9854/omps.jpg",
				"http://imageshack.com/a/img22/8098/x5vx.jpg"
				);
			shuffle($imgs);
			foreach ($imgs as $img) {
				echo "			<img class='imgs' src='".$img."'>\n";
			}
?>
			</div>
			<div id="description">↑&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¡Conoce las áreas y especialidades!</div>
		</section>
		<p class="txt-info-justify">
			<b>Bienvenido aspirante.</b>  Antes de realizar tu registro te recomendamos que leas las <a data-toggle="modal" data-target="#ins" href="#instrucciones">INSTRUCCIONES</a> y tengas a la mano todos los documentos requeridos para poder rellenar tu solicitud. La información enviada mediante éste medio, será verificada el día correspondiente a las fechas programadas en el plantel de la institución.
		</p>
		<div class="button-div">
			<a id='btn-req' data-toggle="modal" data-target="#ins" href="#instrucciones">Instrucciones</a>
			<a id='btn-reg' data-toggle="modal" data-target="#reg" href="#aspirantes">Regístrate</a>
		</div>
	</section>
	<!-- Modal -->
	<div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Ingresa tu CURP</h4>
				</div>
				<div class="modal-body">
					El primer paso es introducir tu CURP en el siguiente campo:
					<form name='curpform' action='result.php' method='POST'>
						<input id='curp' name='curp' title='Ingresa tu CURP correctamente' autocomplete='off' onblur='upperIt(this)'>
					</form>
					<div id='msg'></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" onclick='sendCurp()'>Enviar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="see" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">CURP: <?echo $_SESSION['mycurp']?></h4>
				</div>
				<div class="modal-body">
					<h2>La CURP ya ha sido registrada</h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" onclick="noEsMiCurp()">Ésta no es mi CURP</button>
					<button type="button" class="btn btn-primary" onclick="window.location.href='aspirantes/mificha.php'">Imprimir ficha</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="ins" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Instrucciones</h4>
				</div>
				<div class="modal-body instrucciones">
					Del formulario de registro:
					<ul>
						<li>Si no tienes los documentos requeridos a la mano, regístrate más tarde</li>
						<li>Rellena correctamente los campos en base a lo solicitado</li>
						<li><b>Utiliza mayúsculas y minúsculas</b> según sea el caso</li>
						<li><b>Acentúa</b> las palabras necesarias</li>
						<li>Antes de enviar los datos <b>verifica que la información sea correcta</b></li>
						<li>Al enviar los datos <b>imprime el documento</b> generado (son dos hojas)</li>
						<li><b>No olvides pegar tus fotos</b> en cada una de las hojas</li>
					</ul>
					Fechas de recepción de documentos:
					<ul>
						<li>De la ficha 001 - 100: 24 de marzo</li>
						<li>De la ficha 101 - 200: 25 de marzo</li>
						<li>De la ficha 201 - 300: 26 de marzo</li>
						<li>De la ficha 301 - 400: 27 de marzo</li>
						<li>De la ficha 401 - 500: 28 de marzo</li>
						<li>De la ficha 501 - 600: 31 de marzo</li>
						<li>De la ficha 601 - 700: 1 de abril</li>
						<li>De la ficha 701 - 800: 2 de abril</li>
						<li>De la ficha 801 - 900: 3 de abril</li>
						<li>De la ficha 901 - en adelante: 4 de abril</li>
						<li>Fecha límite: 11 de abril</li>
					</ul>
					Horarios de atención:
					<ul>
						<li>De 9:00 a 13:00</li>
					</ul>
					Documentación requerida:
					<ul>
						<li>Ficha para examen de admisión</li>
						<li>2 Fotografías tamaño infantil (pegadas a la ficha)</li>
						<li>1 Copia legible del acta de nacimiento</li>
						<li>1 Copia ampliada al doble de la CURP</li>
						<li>1 Copia de comprobante de domicilio reciente</li>
						<li>Original de constancia de no adeudo de materias, con promedio y conducta observada a la fecha</li>
					</ul>
					Problemas, dudas o sugerencias:
					<ul>
						<li><a href="https://www.facebook.com/CBTis48">Facebook</a></li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
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