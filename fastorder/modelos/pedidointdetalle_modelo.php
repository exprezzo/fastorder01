<?php
class pedidointdetalleModelo extends Modelo{
	var $tabla="pedidointdetalle";
	var $campos=array('idpedidointdetalle','idarticulo','idpedidoint','cantidad','status','concentrado');
	var $pk="idpedidointdetalle";
	
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