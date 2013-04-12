<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/ordencompraestado_modelo.php';
class ordencompraestado extends Controlador{
	var $modelo="ordencompraestado";
	var $campos=array('idordencompraestado','nombre');
	var $pk="idordencompraestado";
	
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