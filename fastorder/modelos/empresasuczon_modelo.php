<?php
class empresasuczonModelo extends Modelo{
	var $tabla="empresasuczon";
	var $campos=array('idempresasuczon','nombre');
	var $pk="idempresasuczon";
	
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