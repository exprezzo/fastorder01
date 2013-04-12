<?php
class pedidointModelo extends Modelo{
	var $tabla="pedidoint";
	var $campos=array('idpedidoint','idalmacen','fecha','vencimiento','idestado','serie','folio');
	var $pk="idpedidoint";
	
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