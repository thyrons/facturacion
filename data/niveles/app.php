<?php 
	if(!isset($_SESSION)) {
        session_start();        
    }  
	
	include_once('../../admin/class.php');
	$class = new constante();
	$id = $class->idz();
	$fecha = $class->fecha_hora();

	$data = 0;

	if ($_POST['oper'] == "add") {
		$sql = "SELECT count(*)count FROM nivel WHERE nombre = UPPER('".$_POST['nombre']."')";
		$sql = $class->consulta($sql);		
		while ($row = $class->fetch_array($sql)) {
			$data = $row[0];
		}
		if ($data != 0) {
			$data = "3";
		} else {
			$sql = "INSERT INTO nivel VALUES ('".$id."','".$_POST['nombre']."');";
			
			if($class->consulta($sql)){
				$data = "1";	
			}else{
				$data = "4";
			}
			
		}
	} else {
	    if ($_POST['oper'] == "edit") {
	    	$sql = "SELECT count(*)count FROM nivel WHERE nombre = UPPER('".$_POST['nombre']."') AND id NOT IN ('".$_POST['id']."')";	
			$sql = $class->consulta($sql);			
	    	
			while ($row = $class->fetch_array($sql)) {
				$data = $row[0];
			}

			if ($data != 0) {
			 	$data = "3";
			} else {		
				$sql = "UPDATE nivel SET nombre = '".$_POST['nombre']."' WHERE id = '".$_POST['id']."'";	
				if($class->consulta($sql)){
					$data = "2";	
				}else{
					$data = "4";
				}
			}
	    }
	}    
	echo $data;
?>