<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/compra_modelo.php';
class compra extends Controlador{
	var $modelo="compra";
	var $campos=array('idcompra','idproveedor','idalmacen','idcxp','tipo','serie','folio','documento','fecha','fechavence','descuento','subtotal','impuesto1','impuesto2','impuesto3','total','nota','estado','idinvmov','impreso','enviado');
	var $pk="idcompra";
	
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