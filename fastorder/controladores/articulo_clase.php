<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/articulo_clase_modelo.php';
class articulo_clase extends Controlador{
	var $modelo="articulo_clase";
	var $campos=array('idarticuloclase','nombre','descripcion');
	var $pk="idarticuloclase";
	
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