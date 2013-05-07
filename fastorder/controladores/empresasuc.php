<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/empresasuc_modelo.php';
class empresasuc extends Controlador{
	var $modelo="empresasuc";
	var $campos=array('idempresasuc','nombre','calle','numint','numext','colonia','ciudad','estado','pais','telefono','fax','email','idempresasuczon');
	var $pk="idempresasuc";
	var $nombre="empresasuc";
	
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