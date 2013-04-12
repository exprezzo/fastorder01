<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/ordencompra_modelo.php';
class ordencompra extends Controlador{
	var $modelo="ordencompra";
	var $campos=array('idordencompra','idproveedor','fecha','vencimiento','idestado','serie','folio','idalmacen','enviada','impresa');
	var $pk="idordencompra";
	
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