<?php
class empresasucModelo extends Modelo{
	var $tabla="empresasuc";
	var $campos=array('idempresasuc','idempresa','nombre','calle','numint','numext','colonia','ciudad','estado','pais','telefono','fax','email','idempresasuczon');
	var $pk="idempresasuc";
	
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