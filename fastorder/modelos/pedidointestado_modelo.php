<?php
class pedidointestadoModelo extends Modelo{
	var $tabla="pedidointestado";
	var $campos=array('idpedidointestado','nombre');
	var $pk="idpedidointestado";
	
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