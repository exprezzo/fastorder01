<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/compra_modelo.php';
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/conf_serie_modelo.php';
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/almacenes_modelo.php';
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/proveedor_modelo.php';
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/compradetalle_modelo.php';
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/articulo_modelo.php';
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/articulopre_modelo.php';

class compra extends Controlador{
	var $modelo="compra";
	var $campos=array('idcompra','idproveedor','idalmacen','idcxp','tipo','serie','folio','documento','fecha','fechavence','descuento','subtotal','impuesto1','impuesto2','impuesto3','total','nota','estado','idinvmov','impreso','enviado');
	var $pk="idcompra";
	var $nombre="compra";
	
	function nuevo(){
		$campos=$this->campos;
		$vista=$this->getVista();
		for($i=0; $i<sizeof($campos); $i++){
			$obj[$campos[$i]]='';
		}
		$obj['idcompra']=0;
		$obj['estado']=1;
		$vista->datos=$obj;
		
		$params=array(
			'filtros'=>array(
				array('dataKey'=>'proceso', 'filterOperator'=>'equals','filterValue'=>$this->nombre),
				array('dataKey'=>'idempresa', 'filterOperator'=>'equals','filterValue'=>1),
				// array('dataKey'=>'idalmacen', 'filterOperator'=>'equals','filterValue'=>( isset($_REQUEST['idalmacen'] ) )?  $_REQUEST['idalmacen'] : 0),
				array('dataKey'=>'idsucursal', 'filterOperator'=>'equals','filterValue'=>( isset($_REQUEST['idsucursal'] ) )?  $_REQUEST['idsucursal'] : 0),				
			)
		);		
		$serieMod=new Conf_serieModelo();
		$res= $serieMod->obtenerSeries($params);
		if ( !$res['success'] ){
			$vista->series=array();
			$vista->datos['folio'] = 0;
		}else{
			$vista->series=$res['datos'];
			$vista->datos['folio'] = $res['datos'][0]['sig_folio'];	
		}
		
		// $vista->series = ($res['success'])? $res['datos'] : array();
		
		
		$provMod=new ProveedorModelo();
		$res=$provMod->buscar(array() );		
		$vista->proveedores=$res['datos'];
		
		$almMod=new AlmacenesModelo();
		$res=$almMod->buscar(array() );		
		$vista->almacenes=$res['datos'];
		
		// print_r( $vista->series ); exit;
		$vista->articulos=array();
		
		global $_PETICION;
		$vista->mostrar('/'.$_PETICION->controlador.'/edicion');		
	} 
	
	function getSeries(){
		
		$params=array(
			'filtros'=>array(
				array('dataKey'=>'proceso', 'filterOperator'=>'equals','filterValue'=>$this->nombre),
				// array('dataKey'=>'idempresa', 'filterOperator'=>'equals','filterValue'=>1),
				array('dataKey'=>'idalmacen', 'filterOperator'=>'equals','filterValue'=>( isset($_REQUEST['idalmacen'] ) )?  $_REQUEST['idalmacen'] : 0),
				array('dataKey'=>'idsucursal', 'filterOperator'=>'equals','filterValue'=>( isset($_REQUEST['idsucursal'] ) )?  $_REQUEST['idsucursal'] : 0),				
			)
		);
		
		$serieMod=new Conf_serieModelo();
		$res= $serieMod->obtenerSeries($params);
		
		echo json_encode($res);
	}
	
	function buscarPresentaciones(){
		
		$params=array(
			'filtros'=>array(
				array('dataKey'=>'descripcion', 'filterOperator'=>'contains','filterValue'=>$_REQUEST['descripcion'])
			)
		);
		
		$presentacionModelo = new articulopreModelo();
		$res = $presentacionModelo->obtenerPresentaciones($params);
		
		
		$respuesta=array(
			'rows'=>$res['datos']
		);
		echo json_encode($respuesta);	
		
	}
	
	function guardar(){
		
		$fecha = DateTime::createFromFormat('d/m/Y', $_REQUEST['datos']['fecha'] );
		$_POST['datos']['fecha']=$fecha->format('Y-m-d H:i:s');
		
		$fecha = DateTime::createFromFormat('d/m/Y', $_REQUEST['datos']['fechavence'] );
		$_POST['datos']['fechavence']=$fecha->format('Y-m-d H:i:s');
		
		//------------------------------------------------------
		
		if ( empty($_POST['datos']['idcompra']) ){
						
			$serieMod=new Conf_serieModelo();
			$params=array(
				'idconf_serie'	=>$_REQUEST['datos']['serie']				
			);
			$res= $serieMod->asignarFolio( $params );  //regresa el folio siguiente, y lo incrementa
			if ( !$res['success'] ){
				return $res;
			}
			
			$_POST['datos']['folio'] = $res['sig_folio'];
		}
		
		//------------------------------------------------------
		
		
		$res = parent::guardar();
		
		
	}
	function borrar(){
		return parent::borrar();
	}
	function editar(){
		$vista=$this->getVista();
		
		$provMod=new ProveedorModelo();
		$res=$provMod->buscar(array() );		
		$vista->proveedores=$res['datos'];
		
		$almMod=new AlmacenesModelo();
		$res=$almMod->buscar(array() );		
		$vista->almacenes=$res['datos'];
		
		// return parent::editar();
		
		$id=empty( $_REQUEST['id'])? 0 : $_REQUEST['id'];
		$model=$this->getModel();
		$params=array(
			$this->pk=>$id
		);
		$obj=$model->obtener( $params );
		// $vista=$this->getVista();
		$vista->datos=$obj;
		
		// print_r( $obj ); exit;
		$params=array(
			'filtros'=>array(
				array('dataKey'=>'proceso', 'filterOperator'=>'equals','filterValue'=>$this->nombre),
				// array('dataKey'=>'idempresa', 'filterOperator'=>'equals','filterValue'=>1),
				array('dataKey'=>'idalmacen', 'filterOperator'=>'equals','filterValue'=> $obj['idalmacen']),
				array('dataKey'=>'idsucursal', 'filterOperator'=>'equals','filterValue'=> 0 ),
			)
		);
		$serieMod=new Conf_serieModelo();
		$res= $serieMod->obtenerSeries( $params );
		$vista->series=$res['datos'];		
				
		$compradetalleMod=new compradetalleModelo();
		$nombre_campo_fk='idcompra';		
		$params=array(
			'filtros'=>array(
				array('dataKey'=>$nombre_campo_fk, 'filterOperator'=>'equals','filterValue'=>$obj[ $this->pk ] ),
			)
		);		
		$articulos= $compradetalleMod->buscar( $params );				
		$vista->articulos=$articulos['datos'];		
		
		// print_r($articulos); exit;
		global $_PETICION;
		$vista->mostrar('/'.$_PETICION->controlador.'/edicion');
	}
	
	
	function getCodigos(){
		$codMOd= new articuloModelo();
		
		$params=array(
			'filtros'=>array(
				array('dataKey'=>'codigo', 'filterOperator'=>'contains','filterValue'=>$_REQUEST['codigo'])
			)				
		);
		$res = $codMOd->buscar( $params );
		
		$respuesta=array(
			'rows'=>$res['datos']
		);
		echo json_encode($respuesta);	
	}
	function buscar(){
		
		
		
		for($i=0; $i<sizeof($_GET['filtering']); $i++ ){
			if ( !empty($_GET['filtering'][$i]['dataKey']) )
			if ( $_GET['filtering'][$i]['dataKey']=='fechai' ){
				$fechai=DateTime::createFromFormat ( 'd/m/Y' , $_GET['filtering'][$i]['filterValue'] );
				$_GET['filtering'][$i]['filterValue']=$fechai->format('Y-m-d');
			}
			
			if ( !empty($_GET['filtering'][$i]['dataKey']) )
			if ( $_GET['filtering'][$i]['dataKey']=='fechaf' ){
				$fechaf=DateTime::createFromFormat ( 'd/m/Y' , $_GET['filtering'][$i]['filterValue'] );
				$_GET['filtering'][$i]['filterValue']=$fechaf->format('Y-m-d');
			}
		}
		// $fechaf->format('Y-m-d')
		
		return parent::buscar();
	}
	
	function busqueda(){
		$params=array(
			'filtros'=>array(
				array('dataKey'=>'proceso', 'filterOperator'=>'equals','filterValue'=>$this->nombre),
				// array('dataKey'=>'idempresa', 'filterOperator'=>'equals','filterValue'=>1),
				array('dataKey'=>'idalmacen', 'filterOperator'=>'equals','filterValue'=>( isset($_REQUEST['idalmacen'] ) )?  $_REQUEST['idalmacen'] : 0),
				array('dataKey'=>'idsucursal', 'filterOperator'=>'equals','filterValue'=>( isset($_REQUEST['idsucursal'] ) )?  $_REQUEST['idsucursal'] : 0),				
			)
		);		
		$serieMod=new Conf_serieModelo();
		$res= $serieMod->obtenerSeries($params);
		
		$vista = $this->getVista();
		
		if ( !$res['success'] ){
			$vista->series=array();
			// $vista->datos['folio'] = 0;
		}else{
			$vista->series=$res['datos'];
			// $vista->datos['folio'] = $res['datos'][0]['sig_folio'];	
		}
		
		
		$provMod=new ProveedorModelo();
		$res=$provMod->buscar(array() );		
		$vista->proveedores=$res['datos'];
		
		$almMod=new AlmacenesModelo();
		$res=$almMod->buscar(array() );		
		$vista->almacenes=$res['datos'];
		
		$this->mostrarVista();
	}
}
?>