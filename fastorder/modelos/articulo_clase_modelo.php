<?php
class articulo_claseModelo extends Modelo{
	var $tabla="articuloclase";
	var $campos=array('idarticuloclase','nombre','descripcion');
	var $pk="idarticuloclase";
	
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