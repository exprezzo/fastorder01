<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/compradetalle_modelo.php';
class compradetalle extends Controlador{
	var $modelo="compradetalle";
	var $campos=array('idcompradetalle','idcompra','idarticulo','idarticulopre','idordencompradet','precio','cantidad','descuento','subtotal','impuesto1','impuesto2','impuesto3','total','descripcion','impreso','enviado');
	var $pk="idcompradetalle";
	
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