<?php
class articulosubModelo extends Modelo{
	var $tabla="articulosub";
	var $campos=array('idarticulosub','nombre');
	var $pk="idarticulosub";
	
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