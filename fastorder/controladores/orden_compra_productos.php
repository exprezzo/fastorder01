<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/orden_compra_productos_modelo.php';
class orden_compra_productos extends Controlador{
	var $modelo="orden_compra_productos";
	var $campos=array('id','fk_orden_compra','fk_articulo','idarticulopre','cantidad','fk_pedido_detalle','fk_producto_origen','fk_pedido','pedidoi','fk_almacen','pendiente');
	var $pk="id";
	
	function nuevo(){		
		$campos=$this->campos;
		$vista=$this->getVista();				
		for($i=0; $i<sizeof($campos); $i++){
			$obj[$campos[$i]]='';
		}
		$vista->datos=$obj;		
		
		global $_PETICION;
		$vista->mostrar('/'.$_PETICION->controlador.'/edicion');
		
		
	}
	
	function guardar(){
		return parent::guardar();
	}
	function borrar(){
		return parent::borrar();
	}
	function editar(){
		return parent::editar();
	}
	function buscar(){
		return parent::buscar();
	}
}
?>