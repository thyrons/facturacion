<?php
	function generarXML($id,$codDoc){
		$ambiente = 'Pruebas';
		$emision = 'Normal';
		$class = new constante();	
		$sql = "select E.ruc, CR.numeroComprobante,CR.numeroAutorizacion, CR.fechaEmision, CR.claveAcceso, E.razonSocial, E.nombreComercial, E.direccion, E.direccionEstablecimiento, E.contribuyente, E.obligacion, C.razonSocial, C.identificacion, C.direccion, C.telefono, C.email, TC.nombre, CR.secuencial, CR.establecimiento, CR.puntoEmision, CR.fechaAutorizacion, TI.codigo, CR.ejercicioFiscal  from comprobanteretencion CR inner join empresa E ON CR.idEmpresa = E.id inner join contribuyente C on CR.idContribuyente = C.id inner join tipocomprobante TC on  CR.idTipoComprobante = TC.id inner join tipoidentificacion TI on C.idTipoIdentificacion = TI.id where CR.id = '".$id."'";
		$sql = $class->consulta($sql);
		while ($row = $class->fetch_array($sql)) {
			$ruc = $row[0];
			$numeroComprobante = $row[1];
			$numeroAutorizacion = $row[2];
			$fechaEmision = $row[3];
			$claveAcceso = $row[4];
			$razonSocial = $row[5];
			$nombreComercial = $row[6];
			$direcionMatriz = $row[7];
			$direccionEstablecimiento = $row[8];
			$nroContribuyente = $row[9];
			$obligado = $row[10];
			$contribuyente = $row[11];
			$identificacion = $row[12];
			$direcion = $row[13];
			$telefono = $row[14];
			$email = $row[15];
			$tipoDocumento = $row[16];
			$secuencial = $row[17];
			$establecimiento = $row[18];
			$puntoEmision = $row[19];
			$fechaAut = $row[20];
			$tipoIdentificacion = $row[21];
			$ejercicioFiscal = $row[22];
		}							
		$ceros = 9;
		$temp = '';
		$tam = $ceros - strlen($secuencial);
      	for ($i = 0; $i < $tam; $i++) {                 
        	$temp = $temp .'0';        
      	}
      	$secuencial = $temp .''. $secuencial;
      	$s = "";
		$s = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$s .= "<comprobanteRetencion id=\"comprobante\" version=\"1.0.0\">\n";		
			$s .= "<infoTributaria>\n";
				$s .= "<ambiente>1</ambiente>\n";
				$s .= "<tipoEmision>1</tipoEmision>\n";
				$s .= "<razonSocial>".$razonSocial."</razonSocial>\n";
				$s .= "<nombreComercial>".$nombreComercial."</nombreComercial>\n";
				$s .= "<ruc>".$ruc."</ruc>\n";
				$s .= "<claveAcceso>".$claveAcceso."</claveAcceso>\n";
				$s .= "<codDoc>".$codDoc."</codDoc>\n";
				$s .= "<estab>".$establecimiento."</estab>\n";
				$s .= "<ptoEmi>".$puntoEmision."</ptoEmi>\n";
				$s .= "<secuencial>".$secuencial."</secuencial>\n";
				$s .= "<dirMatriz>".$direcionMatriz."</dirMatriz>\n";
			$s .= "</infoTributaria>\n";
			$s .= "<infoCompRetencion>\n";
				$s .= "<fechaEmision>".$fechaEmision."</fechaEmision>\n";
				$s .= "<dirEstablecimiento>".$direccionEstablecimiento."</dirEstablecimiento>\n";
				$s .= "<contribuyenteEspecial>".$nroContribuyente."</contribuyenteEspecial>\n";
				$s .= "<obligadoContabilidad>".$obligado."</obligadoContabilidad>\n";
				$s .= "<tipoIdentificacionSujetoRetenido>".$tipoIdentificacion."</tipoIdentificacionSujetoRetenido>\n";
				$s .= "<razonSocialSujetoRetenido>".$contribuyente."</razonSocialSujetoRetenido>\n";
				$s .= "<identificacionSujetoRetenido>".$identificacion."</identificacionSujetoRetenido>\n";
				$s .= "<periodoFiscal>".$ejercicioFiscal."</periodoFiscal>\n";
			$s .= "</infoCompRetencion>\n";

			$sql = "select CR.ejercicioFiscal, CD.baseImponible, R.nombre, CD.porcentaje, CD.valorRetenido,R.codigo, TR.codigo from comprobanteretencion CR inner join detallecomprobanteretencion CD on CR.id = CD.idComprobanteRetencion inner join tiporetencion R on CD.idCodigoImpuesto = R.id inner join tarifaretencion TR on CD.idCodigoRetencion = TR.id where CR.id = '".$id."'";
			$sql = $class->consulta($sql);

			$s .= "<impuestos>\n";	
			while ($row = $class->fetch_array($sql)) {			
				$s .= "<impuesto>\n";
					$s .= "<codigo>".$row[5]."</codigo>\n";
					$s .= "<codigoRetencion>".$row[6]."</codigoRetencion>\n";
					$s .= "<baseImponible>".number_format($row[1], 2, '.', '')."</baseImponible>\n";
					$s .= "<porcentajeRetener>".number_format($row[3], 2, '.', '')."</porcentajeRetener>\n";
					$s .= "<valorRetenido>".number_format($row[4], 2, '.', '')."</valorRetenido>\n";
					$s .= "<codDocSustento>".$tipoDocumento."</codDocSustento>\n";
					$s .= "<numDocSustento>".$numeroComprobante."</numDocSustento>\n";
					$s .= "<fechaEmisionDocSustento>".$fechaEmision."</fechaEmisionDocSustento>\n";
				$s .= "</impuesto>\n";
			}	
			$s .= "</impuestos>\n";		
			$s .= "<infoAdicional>\n";
				$s .= "<campoAdicional nombre=\"Direccion\">".utf8_decode(substr($direcion,0,299))."</campoAdicional>\n";	
				$s .= "<campoAdicional nombre=\"Telefono\">".utf8_decode(substr($telefono,0,299))."</campoAdicional>\n";	
				$s .= "<campoAdicional nombre=\"Email\">".utf8_decode(substr($email,0,299))."</campoAdicional>\n";					
			$s .= "</infoAdicional>\n";
		$s .="</comprobanteRetencion>";		
								
		$nombre_t = $id.'.xml';			
		$nombre = "comprobantes/".$nombre_t;
		$archivo = fopen($nombre, "w+");	
		if(fwrite($archivo, $s)){			
			fclose($archivo);
			$xml = new DOMDocument();
			$xml->load($nombre);
			if (!$xml->schemaValidate('./ComprobanteRetencion.xsd')) {
   				$data = 3;
			}else{
				$data = 1;		
			}						
		}else{
			$data = 4;
		}	

		return $data;
	}
?>