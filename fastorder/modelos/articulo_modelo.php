<?php
class articuloModelo extends Modelo{
	var $tabla="articulo";
	var $campos=array('idarticulo','nombre','activo','presentacion','codigo','idarticuloclase','inventariable','impuesto1','impuesto2','impuesto3','costo','precio','puntos','usado','periodo','kilometraje','idsublinea','idcategoria','idlinea','idgrupo','idtemporada','iddepartamento','idtipo','info','fechaalta','nombrebot','imagenbot','fechainv','puntoscompra','ultimocosto','utilidadminima','comision','comisionmax','costomax');
	var $pk="idarticulo";
	
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