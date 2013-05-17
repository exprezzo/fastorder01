<?php
class compradetalleModelo extends Modelo{
	var $tabla="compradetalle";
	var $campos=array('idcompradetalle','idcompra','idarticulo','idarticulopre','idordencompradet','precio','cantidad','descuento','subtotal','impuesto1','impuesto2','impuesto3','total','descripcion','impreso','enviado');
	var $pk="idcompradetalle";
	
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
		
		$con = $this->getConexion();
		
		$filtros='';
		if ( isset($params['filtros']) )
			$filtros=$this->cadenaDeFiltros($params['filtros']);
			
		
		$sql = 'SELECT COUNT(*) as total FROM '.$this->tabla.$filtros;				
		$sth = $con->prepare($sql);
		
		if ( isset($params['filtros']) ){
			$this->bindFiltros($sth, $params['filtros']);
		}
		
		
		
		$exito = $sth->execute();
		
		
		
		if ( !$exito ){
			return $this->getError( $sth );
			throw new Exception("Error listando: ".$sql); //TODO: agregar numero de error, crear una exception MiEscepcion
		}		
		// $sth = $con->query($sql); // Simple, but has several drawbacks		
		
		
		$tot = $sth->fetchAll(PDO::FETCH_ASSOC);
		$total = $tot[0]['total'];
		
		$paginar=false;
		if ( isset($params['limit']) && isset($params['start']) ){
			$paginar=true;
		}
		
		if ($paginar){
			$limit=$params['limit'];
			$start=$params['start'];		
			$sql = 'SELECT cd.*,a.nombre, a.codigo,cd.precio as costo, p.descripcion presentacionNombre FROM '.$this->tabla.
			' cd LEFT JOIN articulo a ON a.idarticulo = cd.idarticulo 
			 LEFT JOIN articulopre p ON p.idarticulopre = cd.idarticulopre
			'.
			$filtros.' limit :start,:limit';
		}else{			
			$sql = 'SELECT cd.*,a.nombre, a.codigo,cd.precio as costo, p.descripcion presentacionNombre FROM '.$this->tabla.
			' cd LEFT JOIN articulo a ON a.idarticulo = cd.idarticulo 
			 LEFT JOIN articulopre p ON p.idarticulopre = cd.idarticulopre
			'.
			$filtros;
		}
		
		$sth = $con->prepare($sql);
		if ($paginar){
			$sth->bindValue(':limit',$limit,PDO::PARAM_INT);
			$sth->bindValue(':start',$start,PDO::PARAM_INT);
		}
				
		if ( isset($params['filtros']) ){
			$this->bindFiltros($sth, $params['filtros']);
		}
		
		$exito = $sth->execute();

		
		if ( !$exito ){
		
			echo json_encode( $this->getError( $sth ) );exit;
			// throw new Exception("Error listando: ".$sql); //TODO: agregar numero de error, crear una exception MiEscepcion
		}
		
		$modelos = $sth->fetchAll(PDO::FETCH_ASSOC);				
		
		return array(
			'success'=>true,
			'total'=>$total,
			'datos'=>$modelos
		);
	}
}
?>