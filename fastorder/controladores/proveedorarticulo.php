<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/proveedorarticulo_modelo.php';
class proveedorarticulo extends Controlador{
	var $modelo="proveedorarticulo";
	var $campos=array('idarticulo','idproveedor','prioridad','id');
	var $pk="id";
	
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