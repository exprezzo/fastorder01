<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/articulo_cod_modelo.php';
class articulo_cod extends Controlador{
	var $modelo="articulo_cod";
	var $campos=array('idarticulocod','idarticulo','codigo','idproducto');
	var $pk="idarticulocod";
	
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