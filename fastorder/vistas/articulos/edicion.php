
<script src="<?php echo $MOD_WEB_PATH; ?>js/catalogos/<?php echo $_PETICION->controlador; ?>/edicion.js"></script>

<script>			
	$( function(){		
		var config={
			tab:{
				id:'<?php echo $_REQUEST['tabId']; ?>'
			},
			controlador:{
				nombre:'<?php echo $_PETICION->controlador; ?>'
			},
			modulo:{
				nombre:'<?php echo $_PETICION->modulo; ?>'
			},
			catalogo:{
				nombre:'articulo'
			},			
			pk:"idarticulo"
			
		};				
		 var editor=new Edicionarticulos();
		 editor.init(config);		
	});
</script>

	<div class="pnlIzq">
		<?php 	
			global $_PETICION;
			$this->mostrar('/backend/componentes/toolbar');	
			if (!isset($this->datos)){		
				$this->datos=array();		
			}
		?>
		
		<form class="frmEdicion" style="padding-top:10px;">				
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Idarticulo:</label>
	<input type="text" name="idarticulo" class="txt_idarticulo" value="<?php echo $this->datos['idarticulo']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Nombre:</label>
	<input type="text" name="nombre" class="txt_nombre" value="<?php echo $this->datos['nombre']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Activo:</label>
	<input type="text" name="activo" class="txt_activo" value="<?php echo $this->datos['activo']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Presentacion:</label>
	<input type="text" name="presentacion" class="txt_presentacion" value="<?php echo $this->datos['presentacion']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Codigo:</label>
	<input type="text" name="codigo" class="txt_codigo" value="<?php echo $this->datos['codigo']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Idarticuloclase:</label>
	<input type="text" name="idarticuloclase" class="txt_idarticuloclase" value="<?php echo $this->datos['idarticuloclase']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Inventariable:</label>
	<input type="text" name="inventariable" class="txt_inventariable" value="<?php echo $this->datos['inventariable']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Impuesto1:</label>
	<input type="text" name="impuesto1" class="txt_impuesto1" value="<?php echo $this->datos['impuesto1']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Impuesto2:</label>
	<input type="text" name="impuesto2" class="txt_impuesto2" value="<?php echo $this->datos['impuesto2']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Impuesto3:</label>
	<input type="text" name="impuesto3" class="txt_impuesto3" value="<?php echo $this->datos['impuesto3']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Costo:</label>
	<input type="text" name="costo" class="txt_costo" value="<?php echo $this->datos['costo']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Precio:</label>
	<input type="text" name="precio" class="txt_precio" value="<?php echo $this->datos['precio']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Puntos:</label>
	<input type="text" name="puntos" class="txt_puntos" value="<?php echo $this->datos['puntos']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Usado:</label>
	<input type="text" name="usado" class="txt_usado" value="<?php echo $this->datos['usado']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Periodo:</label>
	<input type="text" name="periodo" class="txt_periodo" value="<?php echo $this->datos['periodo']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Kilometraje:</label>
	<input type="text" name="kilometraje" class="txt_kilometraje" value="<?php echo $this->datos['kilometraje']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Idsublinea:</label>
	<input type="text" name="idsublinea" class="txt_idsublinea" value="<?php echo $this->datos['idsublinea']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Idcategoria:</label>
	<input type="text" name="idcategoria" class="txt_idcategoria" value="<?php echo $this->datos['idcategoria']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Idlinea:</label>
	<input type="text" name="idlinea" class="txt_idlinea" value="<?php echo $this->datos['idlinea']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Idgrupo:</label>
	<input type="text" name="idgrupo" class="txt_idgrupo" value="<?php echo $this->datos['idgrupo']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Idtemporada:</label>
	<input type="text" name="idtemporada" class="txt_idtemporada" value="<?php echo $this->datos['idtemporada']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Iddepartamento:</label>
	<input type="text" name="iddepartamento" class="txt_iddepartamento" value="<?php echo $this->datos['iddepartamento']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Idtipo:</label>
	<input type="text" name="idtipo" class="txt_idtipo" value="<?php echo $this->datos['idtipo']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Info:</label>
	<input type="text" name="info" class="txt_info" value="<?php echo $this->datos['info']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Fechaalta:</label>
	<input type="text" name="fechaalta" class="txt_fechaalta" value="<?php echo $this->datos['fechaalta']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Nombrebot:</label>
	<input type="text" name="nombrebot" class="txt_nombrebot" value="<?php echo $this->datos['nombrebot']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Imagenbot:</label>
	<input type="text" name="imagenbot" class="txt_imagenbot" value="<?php echo $this->datos['imagenbot']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Fechainv:</label>
	<input type="text" name="fechainv" class="txt_fechainv" value="<?php echo $this->datos['fechainv']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Puntoscompra:</label>
	<input type="text" name="puntoscompra" class="txt_puntoscompra" value="<?php echo $this->datos['puntoscompra']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Ultimocosto:</label>
	<input type="text" name="ultimocosto" class="txt_ultimocosto" value="<?php echo $this->datos['ultimocosto']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Utilidadminima:</label>
	<input type="text" name="utilidadminima" class="txt_utilidadminima" value="<?php echo $this->datos['utilidadminima']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Comision:</label>
	<input type="text" name="comision" class="txt_comision" value="<?php echo $this->datos['comision']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Comisionmax:</label>
	<input type="text" name="comisionmax" class="txt_comisionmax" value="<?php echo $this->datos['comisionmax']; ?>" style="width:500px;" />
</div>
<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
	<label style="">Costomax:</label>
	<input type="text" name="costomax" class="txt_costomax" value="<?php echo $this->datos['costomax']; ?>" style="width:500px;" />
</div>

		</form>
	</div>
</div>
