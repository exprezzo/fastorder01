<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/proveedor_modelo.php';
class proveedor extends Controlador{
	var $modelo="proveedor";
	var $campos=array('idproveedor','nombre','razonsocial','rfc','calle','numint','colonia','ciudad','estado','pais','cp','telefono','email','fax','conven','conventel','convenfax','convenema','concom','concomtel','concomfax','concomema','diacre','despropag','limcre','observaciones');
	var $pk="idproveedor";
	var $nombre="proveedor";
	
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