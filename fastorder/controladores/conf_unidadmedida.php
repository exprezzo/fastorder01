<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/conf_unidadmedida_modelo.php';
class conf_unidadmedida extends Controlador{
	var $modelo="conf_unidadmedida";
	var $campos=array('idconf_unidadmedida','abrev','descripcion');
	var $pk="idconf_unidadmedida";
	
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