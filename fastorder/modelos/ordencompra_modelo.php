<?php
class ordencompraModelo extends Modelo{
	var $tabla="ordencompra";
	var $campos=array('idordencompra','idproveedor','fecha','vencimiento','idestado','serie','folio','idalmacen','enviada','impresa');
	var $pk="idordencompra";
	
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