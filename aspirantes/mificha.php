<?
	session_start();
	session_destroy();
	header('Content-type: text/plain; charset=utf-8');
	require 'checkmy.php';
	require 'config.php';
	require 'fpdf/fpdf.php';
	if($_SESSION['mycurp']){
		//Creación de datos por SQL
		$q="SELECT * FROM $tabla WHERE asp_curp='".$_SESSION['mycurp']."'";
		$res = mysqli_query($cn,$q);
		while($row=mysqli_fetch_array($res)){
			$folio=$row['asp_folio'];//
			$curp=$row['asp_curp'];//
			$nombre1=$row['asp_nombre1'];//
			$nombre2=$row['asp_nombre2'];//
			$nombre3=$row['asp_nombre3'];//
			$apellidop=$row['asp_apellidop'];//
			$apellidom=$row['asp_apellidom'];//
			$fechanac=$row['asp_fechanac'];//
			$esp1=$row['asp_esp1'];//
			$esp2=$row['asp_esp2'];//
			$esp3=$row['asp_esp3'];//
			$turno=$row['asp_turno'];//
			$sec_nombre=$row['asp_sec_nombre'];//
			$sec_clave=$row['asp_sec_clave'];//
			$sec_tipo=$row['asp_sec_tipo'];//
			$sec_regimen=$row['asp_sec_regimen'];//
			$promedio=$row['asp_promedio'];//
			$estado=$row['asp_estado'];//
			$municipio=$row['asp_municipio'];//
			$localidad=$row['asp_localidad'];//
			$colonia=$row['asp_colonia'];//
			$direccion=$row['asp_direccion'];//
			$cp=$row['asp_cp'];//
			$telefono=$row['asp_telefono'];
			$email=$row['asp_email'];
			$fechareg=$row['asp_fechareg'];
		}
		$q="SELECT year(curdate())-year('$fechanac')+if(date_format(curdate(),'%m-%d')>date_format('$fechanac','%m-%d'),'0','-1') as edad";
		$res = mysqli_query($cn,$q);
		while($row=mysqli_fetch_row($res)){
			$edad=$row[0];
		}
		if(substr($curp,10,1)=="H"){
			$sexo="Hombre";
		}else{
			$sexo="Mujer";
		}
		if($folio<=100){
			$dia="24";
			$mes="marzo";
		}else{
			if($folio<=200){
				$dia="25";
				$mes="marzo";
			}else{
				if($folio<=300){
					$dia="26";
					$mes="marzo";
				}else{
					if($folio<=400){
						$dia="27";
						$mes="marzo";
					}else{
						if($folio<=500){
							$dia="28";
							$mes="marzo";
						}else{
							if($folio<=600){
								$dia="31";
								$mes="marzo";
							}else{
								if($folio<=700){
									$dia="1";
									$mes="abril";
								}else{
									if($folio<=800){
										$dia="2";
										$mes="abril";
									}else{
										if($folio<=900){
											$dia="3";
											$mes="abril";
										}else{
											$dia="4";
											$mes="abril";
										}
									}
								}
							}
						}
					}
				}
			}
		}
		class PDF extends FPDF{
			// Cabecera de página
			function Header(){
				global $folio,$dia,$mes;
				if($this->PageNo()==1){
					$txt="PLANTEL";
				}else{
					$txt="ASPIRANTE";
				}
				// Logo
				$this->Image('../logo48.png',10,6,15);
				$this->SetFont('Arial','B',25);
				// Movernos a la derecha
				$this->Cell(15);
				// Título
				$this->Cell(160,7,'CBTis48',0,1,'L');
				$this->Ln(2);
				$this->SetFont('Arial','B',14);
				$this->Cell(0,6,'Ficha para examen de admisión No: '.sprintf("%04s", $folio),0,1,'L');
				$this->SetFont('Arial','',12);
				$this->Cell(0,6,'( Para el '.$txt.' )',0,1,'L');
				$this->Cell(0,6,'Presentarse en el plantel el día: '.$dia.' de '.$mes.' de 9:00 a 13:00',0,1,'L');
				//$this->Cell(-30);
				$this->Ln(-27);
				$this->Cell(162,33,'',0,0,'R');
				$this->Cell(28,33,'FOTO',1,1,'C');
				$this->Ln(5);
			}
			// Pie de página
			function Footer(){
				global $fechareg;
				// Posición: a 1,5 cm del final
				$this->SetY(-15);
				// Arial italic 8
				$this->SetFont('Arial','I',8);
				// Número de página
				$fechareg2.=substr($fechareg,8,2).'-';
				$fechareg2.=substr($fechareg,5,2).'-';
				$fechareg2.=substr($fechareg,0,4).substr($fechareg,10,9);
				//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
				$this->Cell(0,10,$fechareg2,0,0,'R');
			}
		}
		// Creación del objeto de la clase heredada
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		//$pdf->SetMargins(30, 25 , 30); 

		#Establecemos el margen inferior: 
		$pdf->SetAutoPageBreak(false,10);
		// Empiza contenido
		for($i=0;$i<2;$i++){
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(90,8,' Nombre(s)',1,0);
			$pdf->Cell(50,8,' Apellido paterno',1,0);
			$pdf->Cell(50,8,' Apellido materno',1,1);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(90,8,' '.$nombre1.' '.$nombre2.' '.$nombre3,1,0);
			$pdf->Cell(50,8,' '.$apellidop,1,0);
			$pdf->Cell(50,8,' '.$apellidom,1,1);
			$pdf->Ln(4);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(60,8,' CURP',1,0);
			$pdf->Cell(60,8,' Fecha de nacimiento',1,0);
			$pdf->Cell(35,8,' Edad',1,0);
			$pdf->Cell(35,8,' Sexo',1,1);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(60,8,' '.$curp,1,0);
			$pdf->Cell(20,8,' '.substr($fechanac,8,2),1,0,'C');
			$pdf->Cell(20,8,' '.substr($fechanac,5,2),1,0,'C');
			$pdf->Cell(20,8,' '.substr($fechanac,0,4),1,0,'C');
			$pdf->Cell(35,8,' '.$edad,1,0,'C');
			$pdf->Cell(35,8,' '.$sexo,1,1);
			$pdf->Ln(4);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(140,8,' Especialidades a solicitar',1,0);
			$pdf->Cell(50,8,' Generación de ingreso',1,1);
			$pdf->Cell(140,24,'',1,1);
			$pdf->Ln(-24);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(140,8,' Opción 1: '.$esp1,0,0);
			$pdf->Cell(50,8,' '.$config_generacion,1,1);
			$pdf->Cell(140,8,' Opción 2: '.$esp2,0,0);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(50,8,' Turno',1,1);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(140,8,' Opción 3: '.$esp3,0,0);
			$pdf->Cell(50,8,' '.$turno,1,1);
			$pdf->Ln(4);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(190,8,' Secundaria de procedencia',1,1);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(190,8,' '.$sec_nombre,1,1);
			$pdf->Ln(4);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(45,8,' Clave',1,0);
			$pdf->Cell(70,8,' Tipo',1,0);
			$pdf->Cell(40,8,' Régimen',1,0);
			$pdf->Cell(35,8,' Promedio',1,1);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(45,8,' '.$sec_clave,1,0);
			$pdf->Cell(70,8,' '.$sec_tipo,1,0);
			$pdf->Cell(40,8,' '.$sec_regimen,1,0);
			$pdf->Cell(35,8,' '.$promedio,1,1,'C');
			$pdf->Ln(4);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(95,8,' Estado',1,0);
			$pdf->Cell(95,8,' Municipio',1,1);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(95,8,' '.$estado,1,0);
			$pdf->Cell(95,8,' '.$municipio,1,1);
			$pdf->Ln(4);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(95,8,' Localidad',1,0);
			$pdf->Cell(95,8,' Colonia',1,1);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(95,8,' '.$localidad,1,0);
			$pdf->Cell(95,8,' '.$colonia,1,1);
			$pdf->Ln(4);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(155,8,' Dirección',1,0);
			$pdf->Cell(35,8,' C.P.',1,1);
			$pdf->SetFont('Arial','',12);		
			$pdf->Cell(155,8,' '.$direccion,1,0);
			$pdf->Cell(35,8,' '.$cp,1,1);
			$pdf->Ln(4);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(60,8,' Teléfono',1,0);
			$pdf->Cell(130,8,' Correo electrónico',1,1);
			$pdf->SetFont('Arial','',12);		
			$pdf->Cell(60,8,' '.$telefono,1,0);
			$pdf->Cell(130,8,' '.$email,1,1);
			$pdf->Ln(3);
			$pdf->SetFont('helvetica','',12);
			$pdf->Cell(0,8,'Deberá presentar la siguiente documentación:',0,1);
			$pdf->SetFont('helvetica','',11);
			$pdf->Cell(3);
			$pdf->Cell(0,4,'» 2 Fotografías tamaño infantil',0,1);
			$pdf->Cell(3);
			$pdf->Cell(0,5,'» 1 Copia legible del acta de nacimiento',0,1);
			$pdf->Cell(3);
			$pdf->Cell(0,5,'» 1 Copia ampliada al doble de la CURP',0,1);
			$pdf->Cell(3);
			$pdf->Cell(0,5,'» 1 Copia de comprobante de domicilio reciente',0,1);
			$pdf->Cell(3);
			$pdf->Cell(0,5,'» Original de constancia de no adeudo de materias, con promedio y conducta observada a la fecha',0,1);
			if($i==0){
				$pdf->AddPage();
			}
		}
		$pdf->Output('mificha.pdf','I');
		//$pdf->Output($pdf, 'F');
	}else{
		header('Location: ../');
	}
?>