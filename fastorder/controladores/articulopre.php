<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/articulopre_modelo.php';
class articulopre extends Controlador{
	var $modelo="articulopre";
	var $campos=array('idarticulopre','idarticulo','descripcion','factor','ultimocosto');
	var $pk="idarticulopre";
	var $nombre="articulopre";
	
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