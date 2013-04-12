<?php
class proveedorModelo extends Modelo{
	var $tabla="proveedor";
	var $campos=array('idproveedor','nombre','razonsocial','rfc','calle','numint','colonia','ciudad','estado','pais','cp','telefono','email','fax','conven','conventel','convenfax','convenema','concom','concomtel','concomfax','concomema','diacre','despropag','limcre','observaciones');
	var $pk="idproveedor";
	
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