<?php
class empresaModelo extends Modelo{
	var $tabla="empresa";
	var $campos=array('idempresa','nombre','razonsocial','calle','numint','numext','ciudad','estado','pais','telefono','fax','email');
	var $pk="idempresa";
	
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