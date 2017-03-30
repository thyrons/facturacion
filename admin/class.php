<?php 
  include_once("conex.php");
  include("constante.php");

  class constante {
    public function consulta($q) {
      $BaseDato=new BaseDeDato(SERVIDOR,PUERTO,BD,USUARIO,CLAVE);
      $result=$BaseDato->Consultas($q);
      return $result;
    }

    public function fetch_array($consulta) {
      return mysql_fetch_array($consulta);
    }

    public function num_rows($consulta) {
      return mysql_num_rows($consulta);
    }

    public function getTotalConsultas() {
      return $this->total_consultas; 
    }   
    
    function idz(){
      date_default_timezone_set('America/Guayaquil'); 
      $fecha=date("YmdHis");
      return($fecha.uniqid()); 
    }

    function client_ip() {
      $ipaddress = '';
      if ($_SERVER['HTTP_CLIENT_IP'])
          $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
      else if($_SERVER['HTTP_X_FORWARDED_FOR'])
          $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
      else if($_SERVER['HTTP_X_FORWARDED'])
          $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
      else if($_SERVER['HTTP_FORWARDED_FOR'])
          $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
      else if($_SERVER['HTTP_FORWARDED'])
          $ipaddress = $_SERVER['HTTP_FORWARDED'];
      else if($_SERVER['REMOTE_ADDR'])
          $ipaddress = $_SERVER['REMOTE_ADDR'];
      else
          $ipaddress = 'UNKNOWN';
      return $ipaddress;
    }      

    public function fecha() {
      $fecha = date("d-m-Y");
      return $fecha;
    } 

    public function hora() {
      date_default_timezone_set('America/Guayaquil');
      $hora = date("H:i:s");
      return $hora;
    } 

    public function fecha_hora() {
      date_default_timezone_set('America/Guayaquil');
      $fecha = date("Y-m-d H:i:s");
      return $fecha;
    }       
    
    function generaPass() {      
      $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";      
      $longitudCadena=strlen($cadena);
      $pass = "";      
      $longitudPass=10;             
      for($i=1 ; $i<=$longitudPass ; $i++) {          
          $pos=rand(0,$longitudCadena-1);                 
          $pass .= substr($cadena,$pos,1);
      }
      return $pass;
    }

    function generarClave($fecha,$tipoComprobante,$ruc,$ambiente,$serie,$numeroDocumento,$fecha, $tipoEmision ){
      $secuencia = '765432';      
      $ceros = 9;      
      $temp = '';
      $tam = $ceros - strlen($numeroDocumento);
      for ($i = 0; $i < $tam; $i++) {                 
        $temp = $temp .'0';        
      }
      $numeroDocumento = $temp .''. $numeroDocumento;                  
      $fechaT = explode('/', $fecha);    
      $fecha = $fechaT[0].''.$fechaT[1].''.$fechaT[2];            
      $clave = $fecha.''.$tipoComprobante.''.$ruc.''.$ambiente.''.$serie.''.$numeroDocumento.''.$fecha.''.$tipoEmision;      
      $tamSecuencia = strlen($secuencia);
      $ban = 0;
      $inc = 0;
      $sum = 0;
      for ($i = 0; $i < strlen($clave); $i++) { 
        $sum = $sum  + $clave[$i] * $secuencia[$ban + $inc];        
        $inc++;
        if($inc >= $tamSecuencia){
          $inc = 0;
        }
      }            
      $resp = $sum % 11;
      $resp = 11 - $resp;      

      $clave = $clave.$resp;      
      return $clave;      
    }    
  }  
?>