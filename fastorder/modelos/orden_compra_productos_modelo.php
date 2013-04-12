<?php
class orden_compra_productosModelo extends Modelo{
	var $tabla="orden_compra_productos";
	var $campos=array('id','fk_orden_compra','fk_articulo','idarticulopre','cantidad','fk_pedido_detalle','fk_producto_origen','fk_pedido','pedidoi','fk_almacen','pendiente');
	var $pk="id";
	
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