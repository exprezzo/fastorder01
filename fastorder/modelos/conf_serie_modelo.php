<?php
class conf_serieModelo extends Modelo{
	var $tabla="conf_serie";
	var $campos=array('idconf_serie','serie','folio_i','folio_f','sig_folio','es_default','idalmacen','proceso','idempresa','idsucursal');
	var $pk="idconf_serie";
	
	function nuevo($params){
		return parent::nuevo($params);
	}
	function guardar($params){
		return parent::guardar($params);
	}
	function borrar($params){
		return parent::borrar($params);
	}
	function editar($params){
		return parent::obtener($params);
	}
	function buscar($params){
		return parent::buscar($params);
	}
	
	function obtenerSeries( $params ){
		
		$res=$this->buscar( $params ); //buscar con todos los parametros
		
		if ( empty($res['datos']) ){
			unset ( $params['idalmacen'] );
			$res=$this->buscar( $params );
		}
		
		if ( empty($res['datos']) ){
			unset ( $params['idsucursal'] );
			$res=$this->buscar( $params );
		}
		
		if ( empty($res['datos']) ){
			return array(
				'success'=>false,
				'msg'=>'No hay series disponibles'
			);
		}
		return $res;
		
		
	}
	function asignarFolio( $params ){
		//obtiene el siguiente folio para la serie, para regresarlo al usuario, y lo incrementa
		  // print_r($params); exit;
		$con = $this->getConexion();
		
		$sql='SELECT * FROM conf_serie WHERE idconf_serie=:idconf_serie';
		$sth = $con->prepare($sql);		
		
		$sth->bindValue(':idconf_serie', $params['idconf_serie'], PDO::PARAM_INT);
		// $sth->bindValue(':proceso', $params['proceso'], PDO::PARAM_STR);
		
		
		$exito = $sth->execute();
		
		if ( !$exito ){			
			return $this->getError( $sth );
		}
		
		$datos = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sig_folio = $datos[0]['sig_folio'] ; 

		//actualiza
		$sql='UPDATE conf_serie  SET sig_folio=:sig_folio WHERE idconf_serie=:idconf_serie';
		$sth = $con->prepare($sql);		
		$sth->bindValue(':sig_folio', $sig_folio+1, PDO::PARAM_INT);
		$sth->bindValue(':idconf_serie',  $params['idconf_serie'], PDO::PARAM_INT);
		$exito = $sth->execute();
		if ( !$exito ){			
			return $this->getError( $sth );
		}
		
		return array(
			'success'=>true,
			'sig_folio'=>$sig_folio
		);
	}
}
?>