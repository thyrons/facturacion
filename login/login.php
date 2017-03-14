<?php  
	if(!isset($_SESSION)){
	    session_start();        
	}
	include_once('../admin/class.php');
	$class=new constante();

	if(isset($_POST['login_user']) == 'login_user') {
		$sql = "SELECT * FROM user where userName = '".$_POST['txt_1']."' and password = md5('".$_POST['txt_2']."')";		
		$resultado = $class->consulta($sql);
		if($class->num_rows($resultado) == 1) {
			$row=$class->fetch_array($resultado);
			$_SESSION['user'] = array('id'=>$row[0], 'name' => $row[1].' '. $row[2], 'usuario' => $row[3], 'nivel' => $row[7], 'email' => $row[4], 'genero' => $row[8]);
			print_r(json_encode(array('status' => 'ok')));
		} else {
			print_r(json_encode(array('status' => 'error', 'problem' => 'Usuario Inválido')));
		}
	}
?>