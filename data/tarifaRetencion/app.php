<?php 
	if(!isset($_SESSION)) {
        session_start();        
    }
    
	include_once('../../admin/class.php');
	$class = new constante();
	$id = $class->idz();
	$data = 0;

	if ($_POST['oper'] == "add") {
		$sql = "SELECT count(*)count FROM tarifaRetencion WHERE codigo = UPPER('".$_POST['codigo']."')";
		$sql = $class->consulta($sql);		
		while ($row = $class->fetch_array($sql)) {
			$data = $row[0];
		}
		if ($data != 0) {
			$data = "3";
		} else {			
			$sql = "INSERT INTO tarifaRetencion VALUES ('".$id."','".$_POST['nombreImpuesto']."','".$_POST['codigo']."','".$_POST['nombre']."','".$_POST['descripcion']."');";
			if($class->consulta($sql)){
				$data = "1";	
			}else{
				$data = "5";
			}
		}
	} else {
	    if ($_POST['oper'] == "edit") {
	    	$sql = "SELECT count(*)count FROM tarifaRetencion WHERE codigo = UPPER('".$_POST['codigo']."') AND id NOT IN ('".$_POST['id']."')";
	    	//echo $sql;
	    	$sql = $class->consulta($sql);		
			while ($row = $class->fetch_array($sql)) {
				$data = $row[0];
			}

			if ($data != 0) {
			 	$data = "3";
			} else {								
				$sql = "UPDATE tarifaRetencion SET idTarifa='".$_POST['nombreImpuesto']."',codigo = '".$_POST['codigo']."',nombre = '".$_POST['nombre']."',descripcion = '".$_POST['descripcion']."' WHERE id = '".$_POST['id']."'";
				if($class->consulta($sql)){
					$data = "2";	
				}else{
					$data = "5";
				}
			}
	    }
	}    
	echo $data;
?>