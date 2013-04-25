<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/empresa_modelo.php';
class empresa extends Controlador{
	var $modelo="empresa";
	var $campos=array('idempresa','nombre','razonsocial','calle','numint','numext','ciudad','estado','pais','telefono','fax','email');
	var $pk="idempresa";
	var $nombre="empresa";
	
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