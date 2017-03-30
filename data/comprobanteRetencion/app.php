<?php 
	if(!isset($_SESSION)){
        session_start();        
    }    
    $codDoc = '07';
    $ambiente = '1';
    $emision = '1';//normal cuando generamos la clave
	include_once('../../admin/class.php');
	include '../../admin/consultaSRI.php';	
	include 'generarPDF.php';	
	$class = new constante();	
	$fecha = $class->fecha();	
	//error_reporting(0);				
	
	if (isset($_POST['llenar_tipoComprobante']) == "llenar_tipoComprobante") {			
		$sql = "SELECT id,codigo, nombre FROM tipoComprobante order by id asc";
		$sql = $class->consulta($sql);					
		print'<option value=""> </option>';
		while ($row = $class->fetch_array($sql)) {
			print '<option value="'.$row[0].'" data-foo="'.$row[1].'" >'.$row[2].'</option>';
		}
	}			
	if (isset($_POST['llenar_codigoRetencion']) == "llenar_codigoRetencion") {			
		$sql = "SELECT id,codigo, nombre FROM tipoRetencion order by id asc";
		$sql = $class->consulta($sql);					
		print'<option value=""> </option>';
		while ($row = $class->fetch_array($sql)) {
			print '<option value="'.$row[0].'" data-foo="'.$row[1].'" >'.$row[2].'</option>';
		}		
	}		
	if (isset($_POST['llenar_Retencion']) == "llenar_Retencion") {			
		$sql = "SELECT id,codigo,nombre,descripcion FROM tarifaRetencion WHERE idTarifa = '".$_POST['id']."'";
		//echo $sql;
		$sql = $class->consulta($sql);					
		print'<option value=""> </option>';
		while ($row = $class->fetch_array($sql)) {
			print '<option value="'.$row[0].'" data-foo="'.$row[2].'" >'.$row[1] .' '.$row[3].'</option>';
		}		
	}		
	if (isset($_POST['llenar_empresa']) == "llenar_empresa") {			
		$sql = "SELECT id,razonSocial,ruc,puntoEmision,establecimiento, ciudad FROM empresa order by id asc";
		$sql = $class->consulta($sql);					
		print'<option value=""> </option>';
		while ($row = $class->fetch_array($sql)) {
			print '<option value="'.$row[0].'" data-foo="'.$row[2].'" data-PE="'.$row[3].'" data-E="'.$row[4].'">'.$row[1].' '.$row[5].'</option>';
		}
	}	
	if (isset($_POST['llenar_identificacion']) == "llenar_identificacion") {			
		$sql = "SELECT id,codigo, nombre FROM tipoIdentificacion order by id asc";
		$sql = $class->consulta($sql);					
		print'<option value=""> </option>';
		while ($row = $class->fetch_array($sql)) {
			print '<option value="'.$row[0].'" data-foo="'.$row[1].'">'.$row[2].'</option>';
		}
	}	
	if (isset($_POST['buscarDatos']) == "buscarDatos") {			
		$lista = array();		
		$sql = "SELECT * FROM contribuyente WHERE identificacion = '".$_POST['txt_2']."'";
		$sql = $class->consulta($sql);					
		while ($row = $class->fetch_array($sql)) {
			$lista[] = 0;
			$lista[] = $row[0];
			$lista[] = $row[1];
			$lista[] = $row[2];
			$lista[] = $row[3];
			$lista[] = $row[4];
			$lista[] = $row[5];
			$lista[] = $row[6];
			$lista[] = $row[7];			
			$lista[] = $row[8];			
		}		

		if(count($lista) > 0){
			print_r(json_encode($lista)); /// 0 info de la base
		}else{
			if($_POST['txt_3'] == '04' ){
				$fa=fopen("../../admin/cookie.txt","w+");
				fwrite($fa,"");
				fclose($fa);

				$ruc=$_POST['txt_2'];
				$ff = new ServicioSRI();///creamos nuevo objeto de servicios SRI
				$datos = $ff->datosRUC($ruc); ////accedemos a la funcion datosSRI		
				$total = array();///creamos un array para almacenar la informacion
				$t_e='';
				
				$estab = establecimientoSRI($ruc);				
				if(property_exists ($datos,'mensaje')){//verificacios si existe el ruc ingresado
					$total = json_encode($datos->mensaje);//respuesta de error
					$acu[]=1;
					print_r(json_encode($acu)); ///1 error del ruc
				}else{			
					$html = str_get_html($datos);
					$arr[]=2; /// datos del ruc
					foreach($html->find('table tr td') as $e){
					    $arr[] =utf8_encode(trim($e->innertext));
					}
					//print_r(json_encode($arr));
					$html = str_get_html($estab);
					$arr_1[]=2; // datos del ruc
					foreach($html->find('table tr td') as $e){				
						/*if(utf8_encode(trim($e->innertext)) == '\t' || utf8_encode(trim($e->innertext)) == '&nbsp;'){
					    	$arr_1[] = utf8_encode(trim($e->innertext));
						}else{
							$arr_1[] = utf8_encode(trim($e->innertext));
						}*/
						$txt = preg_replace('/\t/', '', utf8_encode(trim($e->innertext)));
					    $arr_1[] = $txt;				
					}			
					print_r(json_encode(array($arr,$arr_1)));			
					$fa=fopen("../../admin/cookie.txt","w+");
					fwrite($fa,"");
					fclose($fa);
				}	
			}else{
				$arr_2[] = 4; // no existe	
				print_r(json_encode($arr_2));
			}
		}		
	}				
	if (isset($_POST['enviarDatos']) == "enviarDatos") {					
		$s0 = $_POST['s0'];
		$s1 = $_POST['s1'];
		$s2 = $_POST['s2'];
		$s3 = $_POST['s3'];
		$s4 = $_POST['s4'];
		$s5 = $_POST['s5'];		
		$s6 = $_POST['s6'];
		$s7 = $_POST['s7'];
		$s8 = $_POST['s8'];		
		////////////detalles del comprobante////////
		$arreglo1 = explode('|', $s0);
		$arreglo2 = explode('|', $s1);
		$arreglo3 = explode('|', $s2);
		$arreglo4 = explode('|', $s3);
		$arreglo5 = explode('|', $s4);
		$arreglo6 = explode('|', $s5);	
		$arreglo7 = explode('|', $s6);	
		$arreglo8 = explode('|', $s7);	
		$arreglo9 = explode('|', $s8);			
		$cont = 0;

		$sql = "select id from contribuyente where idTipoIdentificacion = '".$_POST['select_identificacion']."' and identificacion = '".$_POST['txt_1']."'";
		$sql = $class->consulta($sql);
		while ($row = $class->fetch_array($sql)) {
			$cont = $row[0];
		}							
		///datos del contribuyente///				
		if($cont == 0){
			$id_contribuyente = $class->idz();
			$temp = $id_contribuyente;			
			$sql = "insert into contribuyente VALUES ('".$id_contribuyente."','".$_POST['select_identificacion']."','".$_POST['txt_1']."','".$_POST['txt_6']."','".$_POST['txt_3']."','".$_POST['txt_2']."','".$_POST['txt_4']."','".$_POST['txt_5']."','".$_POST['select_obligacion']."','1')";
			if($class->consulta($sql)){
				$data = 1;	//Contribuyente Guardado			
			}else{
				$data = 3;	//Error en la base
			}	
		}else{
			$sql = "update contribuyente set idTipoIdentificacion='".$_POST['select_identificacion']."',identificacion='".$_POST['txt_1']."',email='".$_POST['txt_6']."',razonSocial='".$_POST['txt_3']."',nombreComercial='".$_POST['txt_2']."',direccion='".$_POST['txt_4']."',telefono='".$_POST['txt_5']."',obligado='".$_POST['select_obligacion']."' where id='".$cont."'";
			$temp = $cont;
			if($class->consulta($sql)){
				$data = 2;	//Contribuyente Modificado			
			}else{
				$data = 3;	//Error en la base
			}
		}
		////datos del comprobante///
		///1 GUARDADO
		///2 GENERADO
		///3 VALIDADO
		///4 RECHAZADO
		$id = $class->idz();		
		$sql = "select ruc from empresa where id = '".$_POST['select_empresa']."'";
		$sql = $class->consulta($sql);
		while ($row = $class->fetch_array($sql)) {
			$ruc = $row[0];
		}	
		/////////
		$secuencialComprobante = 0;
		$sql = "select  * from nroDocumento where idEmpresa = '".$_POST['select_empresa']."'";
		$sql = $class->consulta($sql);
		while ($row = $class->fetch_array($sql)) {
			$secuencialComprobante = $row[5];
		}	
		$secuencialComprobante = $secuencialComprobante + 1;
		
		////////		
		$sql = "insert into comprobanteRetencion VALUES('".$id."','".$temp."','".$_POST['txt_9']."','','".$_POST['select_comprobante']."','".$_POST['txt_10']."','1','','','".$_POST['txt_8']."','".$_POST['txt_7']."','".$_POST['select_mes'] .'/'. $_POST['select_ejercicio']."','".$secuencialComprobante."','1','".$_POST['select_empresa']."')";		
		//echo $sql;
		if($class->consulta($sql)){
			$data = 1;	//Cabecera generada			
		}else{
			$data = 3;	//Error en la base			
		}
		if($data == 1){
			for ($i=1; $i < sizeof($arreglo1); $i++) { 
				$id_detalles = $class->idz();		
				$sql = "insert into detalleComprobanteRetencion VALUES('".$id_detalles."','".$id."','".$arreglo3[$i]."','".$arreglo5[$i]."','".$arreglo6[$i]."','".$arreglo8[$i]."','".$arreglo9[$i]."')";
				if($class->consulta($sql)){						
					$data = 1;	//detalle generada			
					
				}else{
					$data = 3;	//Error en la base			
				}
			}
			if($data == 1){
				$sql = "UPDATE nroDocumento SET nroRetencion = '".$secuencialComprobante."' where idEmpresa = '".$_POST['select_empresa']."'";				
				$class->consulta($sql);					
				$clave = $class->generarClave($_POST['txt_9'],$codDoc,$ruc,$ambiente,$_POST['txt_7'].''.$_POST['txt_8'],$secuencialComprobante,$_POST['txt_9'],$emision);
				$sql = "UPDATE comprobanteretencion SET claveAcceso = '".$clave."' where id = '".$id."'";				
				$class->consulta($sql);	
				generarPDF($id);
			}
		}				
	}			
?>	