<?php
class articulolinModelo extends Modelo{
	var $tabla="articulolin";
	var $campos=array('idarticulolin','nombre');
	var $pk="idarticulolin";
	
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