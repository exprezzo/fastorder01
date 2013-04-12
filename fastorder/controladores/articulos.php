<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/articulo_modelo.php';
class articulos extends Controlador{
	var $modelo="articulo";
	var $campos=array('idarticulo','nombre','activo','presentacion','codigo','idarticuloclase','inventariable','impuesto1','impuesto2','impuesto3','costo','precio','puntos','usado','periodo','kilometraje','idsublinea','idcategoria','idlinea','idgrupo','idtemporada','iddepartamento','idtipo','info','fechaalta','nombrebot','imagenbot','fechainv','puntoscompra','ultimocosto','utilidadminima','comision','comisionmax','costomax');
	var $pk="idarticulo";
	
	function nuevo(){		
		$campos=$this->campos;
		$vista=$this->getVista();				
		for($i=0; $i<sizeof($campos); $i++){
			$obj[$campos[$i]]='';
		}
		$vista->datos=$obj;		
		
		global $_PETICION;
		$vista->mostrar('/'.$_PETICION->controlador.'/edicion');
		
		
	}
	
	function guardar(){
		return parent::guardar();
	}
	function borrar(){
		return parent::borrar();
	}
	function editar(){
		return parent::editar();
	}
	function buscar(){
		return parent::buscar();
	}
}
?>