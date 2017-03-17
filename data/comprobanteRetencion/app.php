<?php 
	if(!isset($_SESSION)){
        session_start();        
    }

	include_once('../../admin/class.php');
	include '../../admin/consultaSRI.php';
	$class = new constante();
	$id = $class->idz();
	$fecha = $class->fecha_hora();	
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
		$sql = $class->consulta($sql);					
		print'<option value=""> </option>';
		while ($row = $class->fetch_array($sql)) {
			print '<option value="'.$row[0].'" data-foo="'.$row[1].'" >'.$row[2].'</option>';
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
		$s9 = $_POST['s9'];
		$s10 = $_POST['s10'];
		$s11 = $_POST['s11'];
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
		$arreglo10 = explode('|', $s9);	
		$arreglo11 = explode('|', $s10);	
		$arreglo12 = explode('|', $s11);	
		
		$cont = 0;
		$sql = "select * from dbo.contribuyente where idTipoIdentificacion = '".$_POST['select_identificacion']."' and identificacion = '".$_POST['txt_2']."'";
		$sql = sqlsrv_query($conexion_2,$sql);		
		while ($row = sqlsrv_fetch_object($sql)){
			$cont = $row->id;
		}
		///datos del contribuyente///		
		if($cont == 0){
			$sql = "insert into dbo.contribuyente VALUES ('".$_POST['select_identificacion']."','".$_POST['txt_2']."','".$_POST['txt_12']."','".$_POST['txt_6']."','".$_POST['txt_7']."','".$_POST['txt_8']."','".$_POST['txt_3']."','".$_POST['select_obligacion']."','1')";
			sqlsrv_query($conexion_2,$sql);					
			$sql = "SELECT IDENT_CURRENT('dbo.comprobanteRetencion')";
			$sql = sqlsrv_query($conexion_2,$sql);					
			$cont = sqlsrv_fetch_object($sql);
		}else{
			$sql = "update dbo.contribuyente set idTipoIdentificacion='".$_POST['select_identificacion']."',identificacion='".$_POST['txt_2']."',email='".$_POST['txt_12']."',razonSocial='".$_POST['txt_6']."',nombreComercial='".$_POST['txt_7']."',direccion='".$_POST['txt_8']."',telefono='".$_POST['txt_3']."',obligado='".$_POST['select_obligacion']."' where id='".$cont."'";
			sqlsrv_query($conexion_2,$sql);					
		}
		////datos del comprobante///
		$sql = "insert into dbo.comprobanteRetencion VALUES('".$cont."','".$_POST['txt_4']."','".''."','".$_POST['select_comprobante']."','".$_POST['txt_9']."','','','','','".$_POST['select_establecimiento']."','".$_POST['select_puntoEmision']."','')";
	}				
?>	