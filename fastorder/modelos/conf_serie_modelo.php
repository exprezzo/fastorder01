<?php
class conf_serieModelo extends Modelo{
	var $tabla="conf_serie";
	var $campos=array('idconf_serie','serie','folio_i','folio_f','sig_folio','es_default','idalmacen','proceso');
	var $pk="idconf_serie";
	
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