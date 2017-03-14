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

		$sql = "SELECT * FROM empresa where ruc = '".$_POST['txt_5']."' and puntoEmsion = '".$_POST['select_emision']."' and establecimiento = '".$_POST['select_establecimiento']."'";
		
		$sql = $class->consulta($sql);			
		if($class->num_rows($sql) > 0) {		
			echo 3;///Empresa repetida
		}else{
			$sql = "INSERT INTO empresa VALUES ('".$id."','".$_POST['txt_2']."','".$_POST['txt_1']."','".$_POST['txt_3']."','".$_POST['txt_4']."','".$_POST['txt_5']."','".$_POST['select_emision']."','".$_POST['select_establecimiento']."','".$_POST['txt_7']."','".$_POST['txt_6']."','".$_POST['txt_8']."');";
			if($class->consulta($sql)){
				echo 1;	//Empresa Guardado			
			}else{
				echo 4;	//Error en la base
			}			
		}								
	}

	if (isset($_POST['btn_modificar']) == "btn_modificar") {			
		$sql = "SELECT * FROM empresa where ruc = '".$_POST['txt_5']."' and puntoEmision = '".$_POST['select_emision']."' and establecimiento = '".$_POST['select_establecimiento']."' AND NOT id = '".$_POST['txt_0']."'";				
		$sql = $class->consulta($sql);				
		if($class->num_rows($sql) > 0) {		
			echo 3;///Nombre Empresa Repetida
		}else{
			$sql = "UPDATE empresa SET razonSocial='".$_POST['txt_2']."',nombreComercial='".$_POST['txt_1']."',direccion='".$_POST['txt_3']."',telefono='".$_POST['txt_4']."',ruc='".$_POST['txt_5']."',puntoEmision='".$_POST['select_emision']."',establecimiento='".$_POST['select_establecimiento']."',email='".$_POST['txt_7']."',autorizacion='".$_POST['txt_6']."',ciudad='".$_POST['txt_8']."' where id='".$_POST['txt_0']."'";			
			if($class->consulta($sql)){
				echo 1;	//Usuario Guardado			
			}else{
				echo 4;	//Error en la base
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
			print_r(json_encode($lista));
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
					print_r(json_encode($acu));
				}else{			
					$html = str_get_html($datos);
					$arr[]=1;
					foreach($html->find('table tr td') as $e){
					    $arr[] =utf8_encode(trim($e->innertext));
					}
					//print_r(json_encode($arr));
					$html = str_get_html($estab);
					$arr_1[]=1;
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
				$arr_2[] = 2;	
				print_r(json_encode($arr_2));
			}
		}
		
	}	
?>