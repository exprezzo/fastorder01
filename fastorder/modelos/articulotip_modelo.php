<?php
class articulotipModelo extends Modelo{
	var $tabla="articulotip";
	var $campos=array('idarticulotip','nombre');
	var $pk="idarticulotip";
	
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