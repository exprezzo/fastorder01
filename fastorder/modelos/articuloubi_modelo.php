<?php
class articuloubiModelo extends Modelo{
	var $tabla="articuloubi";
	var $campos=array('idarticuloubi','articuloid','almacenid','ubicacion');
	var $pk="idarticuloubi";
	
	function nuevo($params){
		return parent::nuevo($params);
	}
	function guardar($params){
		return parent::guardar($params);
	}
	function borrar($params){
		return parent::borrar($params);
	}
	function editar($params){
		return parent::obtener($params);
	}
	function buscar($params){
		return parent::buscar($params);
	}
}
?>