<?php 
	if(!isset($_SESSION)){
        session_start();        
    }

	include_once('../../admin/class.php');
	$class = new constante();
	$id = $class->idz();
	$fecha = $class->fecha_hora();
	

	if (isset($_POST['btn_guardar']) == "btn_guardar") {	
		$sql = "UPDATE nroDocumento SET nroFactura = '".$_POST['txt_2']."', nroNotaDebito = '".$_POST['txt_3']."', nroNotaCredito = '".$_POST['txt_4']."', nroRetencion = '".$_POST['txt_5']."', nroGuia = '".$_POST['txt_6']."' where id = '".$_POST['txt_0']."'";
		//echo $sql;
		if($class->consulta($sql)){
			echo 1;	//Empresa Guardado			
		}else{
			echo 4;	//Error en la base
		}													
	}	
?>