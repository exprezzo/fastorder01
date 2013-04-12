<?php
class compraModelo extends Modelo{
	var $tabla="compra";
	var $campos=array('idcompra','idproveedor','idalmacen','idcxp','tipo','serie','folio','documento','fecha','fechavence','descuento','subtotal','impuesto1','impuesto2','impuesto3','total','nota','estado','idinvmov','impreso','enviado');
	var $pk="idcompra";
	
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