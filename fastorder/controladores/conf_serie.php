<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/conf_serie_modelo.php';
class conf_serie extends Controlador{
	var $modelo="conf_serie";
	var $campos=array('idconf_serie','serie','folio_i','folio_f','sig_folio','es_default','idalmacen','proceso');
	var $pk="idconf_serie";
	
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