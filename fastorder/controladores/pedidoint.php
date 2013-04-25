<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/pedidoint_modelo.php';
class pedidoint extends Controlador{
	var $modelo="pedidoint";
	var $campos=array('idpedidoint','idalmacen','fecha','vencimiento','idestado','serie','folio');
	var $pk="idpedidoint";
	var $nombre="pedidoint";
	
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