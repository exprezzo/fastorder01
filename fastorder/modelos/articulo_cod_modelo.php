<?php
class articulo_codModelo extends Modelo{
	var $tabla="articulocod";
	var $campos=array('idarticulocod','idarticulo','codigo','idproducto');
	var $pk="idarticulocod";
	
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