<?php
    class  BaseDeDato{
        private $Servidor;
        private $Puerto;
        private $Nombre;
        private $Usuario;
        private $Clave;

        function __construct($Servidor,$Puerto,$Nombre,$Usuario,$Clave){
            $this->Servidor=$Servidor;
            $this->Puerto=$Puerto;
            $this->Nombre=$Nombre;
            $this->Usuario=$Usuario;
            $this->Clave=$Clave;
        }
        function Conectar(){               
            $conexion = mysql_connect($this->Servidor, $this->Usuario,$this->Clave);
            mysql_select_db($this->Nombre,$conexion);            
            return $conexion;
        }
        function Consultas($Consulta){

            $Valor=$this->Conectar();            
            if(!$Valor)
                return 0; //Si no se pudo conectar
            else{                            
                $Resultado=mysql_query($Consulta,$Valor); 
                return $Resultado;// retorna si fue afectada una fila
            }
        }
    }    
?>