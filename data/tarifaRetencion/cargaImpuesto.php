<?php 
	if(!isset($_SESSION)){
        session_start();        
    }
	include_once('../../admin/class.php');
	$class = new constante();
	$resultado = "SELECT * FROM tipoRetencion";		
	$sql = $class->consulta($resultado);		
	$response ='<select >';
	while ($row = $class->fetch_array($sql)) {
    	$response .= '<option value="'.$row[0].'">'.$row[2].'</option>';
	}
	$response .= '</select>';	
	echo $response;	
?>