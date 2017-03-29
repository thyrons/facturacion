<?php
//datos empresa
			$sql = "select razonSocial, nombreComercial, ruc, puntoEmision, establecimiento, direccion, direccionEstablecimiento,obligacion,contribuyente from empresa where id = '".$_POST['select_empresa']."'";		
			$sql = $class->consulta($sql);
			while ($row = $class->fetch_array($sql)) {
				$rucEmpresa = $row[2];
				$razonSocialEmpresa = $row[0];
				$nombreComercialEmpresa = $row[1];
				$puntoEmisionEmpresa = $row[3];
				$establecimientoEmpresa = $row[4];
				$direccionEmpresa = $row[5];
				$direccionEstablecimientoEmpresa = $row[6];
				$obligacionEmpresa = $row[7];
				$nroContribuyenteEspecial = $row[8];
			}	
			/// datos contribuyente
			$sql = "select TI.codigo from contribuyente C inner join tipoidentificacion TI on C.idTipoIdentificacion = TI.id where C.id = '".$temp."'";		
			$sql = $class->consulta($sql);
			while ($row = $class->fetch_array($sql)) {
				$tipoDocumento = $row[0];				
			}	

			$s = "";
			$s = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
			$s .= "<comprobanteRetencion id=\"comprobante\" version=\"1.0.0\">\n";		
				$s .= "<infoTributaria>\n";
					$s .= "<ambiente>1</ambiente>\n";
					$s .= "<tipoEmision>1</tipoEmision>\n";
					$s .= "<razonSocial>".$razonSocialEmpresa."</razonSocial>\n";
					$s .= "<nombreComercial>".$nombreComercialEmpresa."</nombreComercial>\n";
					$s .= "<ruc>".$rucEmpresa."</ruc>\n";
					$s .= "<claveAcceso></claveAcceso>\n";
					$s .= "<codDoc>".$codDoc."</codDoc>\n";
					$s .= "<estab>".$establecimientoEmpresa."</estab>\n";
					$s .= "<ptoEmi>".$puntoEmisionEmpresa."</ptoEmi>\n";
					$s .= "<secuencial></secuencial>\n";
					$s .= "<dirMatriz>".$direccionEmpresa."</dirMatriz>\n";
				$s .= "</infoTributaria>\n";
				$s .= "<infoCompRetencion>\n";
					$s .= "<fechaEmision>".$_POST['txt_9']."</fechaEmision>\n";
					$s .= "<dirEstablecimiento>".$direccionEstablecimientoEmpresa."</dirEstablecimiento>\n";
					$s .= "<contribuyenteEspecial>".$row[8]."</contribuyenteEspecial>\n";
					$s .= "<obligadoContabilidad>".$row[7]."</obligadoContabilidad>\n";
					$s .= "<tipoIdentificacionSujetoRetenido>".$tipoDocumento."</tipoIdentificacionSujetoRetenido>\n";
					$s .= "<razonSocialSujetoRetenido>".$_POST['txt_3']."</razonSocialSujetoRetenido>\n";
					$s .= "<identificacionSujetoRetenido>".$_POST['txt_1']."</identificacionSujetoRetenido>\n";
					$s .= "<periodoFiscal>".$_POST['select_mes']."/".$_POST['select_ejercicio']."</periodoFiscal>\n";						
				$s .= "</infoCompRetencion>\n";
				///detalles comprobantes
				$s .= "<impuestos>\n";									
					for ($i=1; $i < count($arreglo1); $i++) { 
						$s .= "<impuesto>\n";
						$sql = "select TI.codigo, TR.codigo, TR.nombre from tiporetencion TI inner join tarifaretencion TR on TI.id = TR.idTarifa where TI.id = '".$arreglo6[$i]."' and TR.id = '".$arreglo3[$i]."'";
						$sql = $class->consulta($sql);
						while ($row = $class->fetch_array($sql)) {
							$codigo = $row[0];				
							$tarifaRetencion = $row[1];
							$porcentaje = $row[2];
						}

						$sql = "select codigo from tipocomprobante where id = '".$arreglo1[$i]."'";
						$sql = $class->consulta($sql);
						while ($row = $class->fetch_array($sql)) {
							$tipoDocumentoC = $row[0];												
						}	
						$s .= "<código>".$codigo."</código>\n";
						$s .= "<codigoRetencion>".$tarifaRetencion."</codigoRetencion>\n";
						$s .= "<baseImponible>".$arreglo5[$i]."</baseImponible>\n";
						$s .= "<porcentajeRetener>".$porcentaje."</porcentajeRetener>\n";
						$s .= "<valorRetenido>".$arreglo9[$i]."</valorRetenido>\n";
						$s .= "<codDocSustento>".$tipoDocumentoC."</codDocSustento>\n";
						$s .= "<numDocSustento>".$_POST['txt_10']."</numDocSustento>\n";
						$s .= "<fechaEmisionDocSustento>".$_POST['txt_9']."</fechaEmisionDocSustento>\n";
						$s .= "</impuesto>\n";
					}					
				$s .= "</impuestos>\n";
				$s .= "<infoAdicional>\n";
					$s .= "<campoAdicional nombre=\"Direccion\">".$_POST['txt_4']."</campoAdicional>\n";	
					$s .= "<campoAdicional nombre=\"Teléfono\">".$_POST['txt_5']."</campoAdicional>\n";	
					$s .= "<campoAdicional nombre=\"Email\">".$_POST['txt_6']."</campoAdicional>\n";					
				$s .= "</infoAdicional>\n";
			$s .="</comprobanteRetencion>";						
			$nombre_t = $id.'_'.$_POST['txt_1'].'_'.$fecha.'.xml';			
			$nombre = "comprobantes/".$nombre_t;
			$archivo = fopen($nombre, "w+");	
			if(fwrite($archivo, $s)){
				$data = 1;
				$sql = "update comprobanteRetencion set archivo = '".$nombre_t."' where id = '".$id."'";
				$class->consulta($sql);		
				fclose($archivo);
				///generacion pdf//				
				
			}else{
				$data = 4;
			}		
			echo $data;	

?>