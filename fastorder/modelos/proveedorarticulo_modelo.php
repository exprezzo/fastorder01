<?php
class proveedorarticuloModelo extends Modelo{
	var $tabla="proveedorarticulo";
	var $campos=array('idarticulo','idproveedor','prioridad','id');
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