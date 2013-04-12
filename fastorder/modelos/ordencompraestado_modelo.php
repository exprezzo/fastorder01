<?php
class ordencompraestadoModelo extends Modelo{
	var $tabla="ordencompraestado";
	var $campos=array('idordencompraestado','nombre');
	var $pk="idordencompraestado";
	
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