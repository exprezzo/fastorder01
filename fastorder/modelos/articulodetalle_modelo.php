<?php
class articulodetalleModelo extends Modelo{
	var $tabla="articulodetalle";
	var $campos=array('idarticulo','cantidad','preciocompra','costototal','idarticulodetalle');
	var $pk="idarticulodetalle";
	
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