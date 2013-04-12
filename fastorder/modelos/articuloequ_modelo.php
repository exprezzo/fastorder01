<?php
class articuloequModelo extends Modelo{
	var $tabla="articuloequ";
	var $campos=array('idarticuloequ','articuloid','articuloid2');
	var $pk="idarticuloequ";
	
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