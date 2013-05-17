<?php
class compraModelo extends Modelo{
	var $tabla="compra";
	var $campos=array('idcompra','idproveedor','idalmacen','idcxp','tipo','serie','folio','documento','fecha','fechavence','descuento','subtotal','impuesto1','impuesto2','impuesto3','total','nota','estado','idinvmov','impreso','enviado');
	var $pk="idcompra";
	
	function nuevo($params){
		return parent::nuevo($params);
	}
	
	function guardar($params){
		$articulos = ( empty($params['articulos']) )? array() : $params['articulos'];
		
		unset( $params['articulos'] );
		
		$res = parent::guardar( $params );
		
		if ( $res['success'] ){
			$compraMod = new compradetalleModelo();
			// echo 'procesar detalles';
			foreach($articulos as $art){
				unset( $art['nombre'] ) ;
				unset( $art['codigo'] ) ;
				$art['precio'] =$art['costo'];
				unset( $art['costo'] ) ;
				unset( $art['presentacion'] ) ;
				unset( $art['dataItemIndex'] ) ;
				unset( $art['sectionRowIndex'] ) ;
				unset( $art['activo'] ) ;
				unset( $art['idarticuloclase'] ) ;				
				unset( $art['id'] ) ;
				unset( $art['tmp_id'] ) ;
				unset( $art['inventariable'] ) ;
				unset( $art['puntos'] ) ;
				unset( $art['presentacionNombre'] ) ;
				
				
				$art['idcompra']=$res['datos']['idcompra'];
				
				if ( !empty( $art['eliminado'] ) ){
					// print_r( $art );
					$resp = $compraMod->eliminar( $art );
					// print_r($resp);
				}else{
					unset( $art['eliminado'] ) ;
					if ( !empty($art['idarticulo']) )
					$compraMod->guardar( $art );
				}			
			}
			
			$compradetalleMod=new compradetalleModelo();			
			$params=array(
				'filtros'=>array(
					array('dataKey'=>'idcompra', 'filterOperator'=>'equals','filterValue'=> $res['datos']['idcompra']),
				)
			);
			
			$articulos= $compradetalleMod->buscar( $params );				
			$res['datos']['articulos'] =$articulos['datos'];		
		}
		return $res;
	}
	function borrar($params){
		return parent::borrar($params);
	}
	function editar($params){
		return parent::obtener($params);
	}
	
	function bindFiltros($sth,$filtros){
		foreach($filtros as $filtro){
			$dk=':'.empty($filtro['field'])? $filtro['dataKey'] : $filtro['field'];						
			
			switch( strtolower( $filtro['filterOperator'] ) ){
				case 'equals':									
					$sth->bindValue($dk, $filtro['filterValue'], PDO::PARAM_STR);
				break;
				case 'contains':				
					$sth->bindValue($dk, '%'.$filtro['filterValue'].'%', PDO::PARAM_STR);
				break;
				case 'beginswith':					
					$sth->bindValue($dk, $filtro['filterValue'].'%', PDO::PARAM_STR);
				break;
				case 'endswith':
					$sth->bindValue($dk, '%'.$filtro['filterValue'], PDO::PARAM_STR);
				break;
				case 'greater':
					$sth->bindValue($dk, floatval( $filtro['filterValue'] ), PDO::PARAM_STR);
				break;
				case 'greaterorequal':
					if ( !empty($filtro['dataKey']) && $filtro['dataKey']=='fechai' ) {
						$filtro['filterValue'].=' 00:00:00';
						$sth->bindValue($dk, $filtro['filterValue'], PDO::PARAM_STR);
					}else{
						$sth->bindValue($dk, floatval( $filtro['filterValue'] ), PDO::PARAM_STR);
					}
					
					
				break;
				case 'lessorequal':							
					 if ( !empty($filtro['dataKey']) && $filtro['dataKey']=='fechaf' ) {
						$filtro['filterValue'].=' 23:59:59';
						$sth->bindValue($dk, $filtro['filterValue'], PDO::PARAM_STR);
					}else{
						$sth->bindValue($dk, floatval( $filtro['filterValue'] ), PDO::PARAM_STR);
					}
				break;
				case 'isempty':				
					// aqui no se usan parametros (se usa campo='' ) 
				break;
			}
			
		}
	}
	function buscar($params){
		
		$con = $this->getConexion();
		
		$filtros='';
		if ( isset($params['filtros']) )
			$filtros=$this->cadenaDeFiltros($params['filtros']);
			
		
		
		$sql = 'SELECT COUNT(*) as total FROM '.$this->tabla.' c '.$filtros;				
		$sth = $con->prepare($sql);
		 
		if ( isset($params['filtros']) ){
			$this->bindFiltros($sth, $params['filtros']);
		}
		
		
		
		$exito = $sth->execute();
		
		
		
		if ( !$exito ){
			return $this->getError( $sth );
			throw new Exception("Error listando: ".$sql); //TODO: agregar numero de error, crear una exception MiEscepcion
		}						
		
		$tot = $sth->fetchAll(PDO::FETCH_ASSOC);
		$total = $tot[0]['total'];
		
		$paginar=false;
		if ( isset($params['limit']) && isset($params['start']) ){
			$paginar=true;
		}
		
		
		
		
		if ($paginar){
			$limit=$params['limit'];
			$start=$params['start'];		
			$sql = 'SELECT c.*, cs.serie as nombreserie,p.nombre as nombreProv,e.nombre as nombreEstado FROM '.$this->tabla.
			' c LEFT JOIN conf_serie cs ON cs.idconf_serie = c.serie 
			LEFT JOIN proveedor p ON p.idproveedor = c.idproveedor 
			LEFT JOIN compraestado e ON e.idcompraestado = c.estado
			'.
			$filtros.' limit :start,:limit';
		}else{			
			$sql = 'SELECT c.*, cs.serie as nombreserie,p.nombre as nombreProv,e.nombre as nombreEstado FROM '.$this->tabla.
			' c LEFT JOIN conf_serie cs ON cs.idconf_serie = c.serie 
			LEFT JOIN proveedor p ON p.idproveedor = c.idproveedor
			LEFT JOIN compraestado e ON e.idcompraestado = c.estado
			'.
			$filtros.' c LEFT JOIN conf_serie cs ON cs.idconf_serie = c.serie ';
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

		
		// echo $sql; exit;
		
		if ( !$exito ){
			
			$error = $this->getError( $sth );
			return $error;
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