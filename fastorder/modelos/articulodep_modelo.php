<?php
class articulodepModelo extends Modelo{
	var $tabla="articulodep";
	var $campos=array('idarticulodep','nombre');
	var $pk="idarticulodep";
	
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