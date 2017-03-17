<?php 
	if(!isset($_SESSION)){
        session_start();        
    }

	include_once('../../admin/class.php');
	include '../../admin/consultaSRI.php';
	$class = new constante();
	$id = $class->idz();
	$fecha = $class->fecha_hora();
	

	if (isset($_POST['btn_guardar']) == "btn_guardar") {		

		$sql = "SELECT * FROM contribuyente where idTipoIdentificacion = '".$_POST['select_identificacion']."' and identificacion = '".$_POST['txt_1']."'";
		
		$sql = $class->consulta($sql);			
		if($class->num_rows($sql) > 0) {		
			echo 2;///Contribuyente repetido
		}else{
			$sql = "INSERT INTO contribuyente VALUES ('".$id."','".$_POST['select_identificacion']."','".$_POST['txt_1']."','".$_POST['txt_6']."','".$_POST['txt_3']."','".$_POST['txt_2']."','".$_POST['txt_4']."','".$_POST['txt_5']."','".$_POST['select_obligacion']."','1');";
			if($class->consulta($sql)){
				echo 1;	//Empresa Guardado			
			}else{
				echo 3;	//Error en la base
			}			
		}								
	}

	if (isset($_POST['btn_modificar']) == "btn_modificar") {	
		$sql = "SELECT * FROM contribuyente where idTipoIdentificacion = '".$_POST['select_identificacion']."' and identificacion = '".$_POST['txt_1']."' AND NOT id = '".$_POST['txt_0']."'";						
		$sql = $class->consulta($sql);				
		if($class->num_rows($sql) > 0) {		
			echo 2;///Nombre Contribuyente Repetido
		}else{
			$sql = "UPDATE contribuyente SET idTipoIdentificacion='".$_POST['select_identificacion']."', identificacion='".$_POST['txt_1']."', email='".$_POST['txt_6']."', razonSocial='".$_POST['txt_3']."', nombreComercial='".$_POST['txt_2']."', direccion='".$_POST['txt_4']."', telefono='".$_POST['txt_5']."', obligado='".$_POST['select_obligacion']."' WHERE id = '".$_POST['txt_0']."'";
			//echo $sql;
			if($class->consulta($sql)){
				echo 1;	//Usuario Modificado			
			}else{
				echo 3;	//Error en la base
			}		
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
?>