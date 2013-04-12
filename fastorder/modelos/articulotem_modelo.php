<?php
class articulotemModelo extends Modelo{
	var $tabla="articulotem";
	var $campos=array('idarticulotem','nombre');
	var $pk="idarticulotem";
	
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