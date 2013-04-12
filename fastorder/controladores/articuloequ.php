<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/articuloequ_modelo.php';
class articuloequ extends Controlador{
	var $modelo="articuloequ";
	var $campos=array('idarticuloequ','articuloid','articuloid2');
	var $pk="idarticuloequ";
	
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