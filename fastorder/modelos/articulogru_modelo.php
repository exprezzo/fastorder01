<?php
class articulogruModelo extends Modelo{
	var $tabla="articulogru";
	var $campos=array('idarticulogru','nombre','posicion');
	var $pk="idarticulogru";
	
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