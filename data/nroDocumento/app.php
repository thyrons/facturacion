<?php 
	if(!isset($_SESSION)){
        session_start();        
    }

	include_once('../../admin/class.php');
	$class = new constante();
	$id = $class->idz();
	$fecha = $class->fecha_hora();
	

	if (isset($_POST['btn_guardar']) == "btn_guardar") {		

		$sql = "SELECT * FROM empresa where ruc = '".$_POST['txt_5']."' and puntoEmsion = '".$_POST['select_emision']."' and establecimiento = '".$_POST['select_establecimiento']."'";
		
		$sql = $class->consulta($sql);			
		if($class->num_rows($sql) > 0) {		
			echo 3;///Empresa repetida
		}else{
			$sql = "INSERT INTO empresa VALUES ('".$id."','".$_POST['txt_2']."','".$_POST['txt_1']."','".$_POST['txt_3']."','".$_POST['txt_4']."','".$_POST['txt_5']."','".$_POST['select_emision']."','".$_POST['select_establecimiento']."','".$_POST['txt_7']."','".$_POST['txt_6']."','".$_POST['txt_8']."','".$_POST['txt_9']."','".$_POST['select_obligacion']."','".$_POST['txt_13']."');";
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
			$sql = "UPDATE empresa SET razonSocial='".$_POST['txt_2']."',nombreComercial='".$_POST['txt_1']."',direccion='".$_POST['txt_3']."',telefono='".$_POST['txt_4']."',ruc='".$_POST['txt_5']."',puntoEmision='".$_POST['select_emision']."',establecimiento='".$_POST['select_establecimiento']."',email='".$_POST['txt_7']."',autorizacion='".$_POST['txt_6']."',ciudad='".$_POST['txt_8']."',direccionEstablecimiento= '".$_POST['txt_9']."', obligacion= '".$_POST['select_obligacion']."', contribuyente='".$_POST['txt_13']."' where id='".$_POST['txt_0']."'";			
			//echo $sql;
			if($class->consulta($sql)){
				echo 1;	//Usuario Guardado			
			}else{
				echo 4;	//Error en la base
			}		
		}							
	}		
?>