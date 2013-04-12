<?php
class compradetalleModelo extends Modelo{
	var $tabla="compradetalle";
	var $campos=array('idcompradetalle','idcompra','idarticulo','idarticulopre','idordencompradet','precio','cantidad','descuento','subtotal','impuesto1','impuesto2','impuesto3','total','descripcion','impreso','enviado');
	var $pk="idcompradetalle";
	
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