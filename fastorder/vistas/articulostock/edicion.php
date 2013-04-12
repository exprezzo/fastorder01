
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
				nombre:'articulostock'
			},			
			pk:"idarticuloalmacen"
			
		};				
		 var editor=new Edicionarticulostock();
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
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idarticuloalmacen:</label>
			<input type="text" name="idarticuloalmacen" class="txt_idarticuloalmacen" value="<?php echo $this->datos['idarticuloalmacen']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idarticulo:</label>
			<input type="text" name="idarticulo" class="txt_idarticulo" value="<?php echo $this->datos['idarticulo']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idalmacen:</label>
			<input type="text" name="idalmacen" class="txt_idalmacen" value="<?php echo $this->datos['idalmacen']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">existencia:</label>
			<input type="text" name="existencia" class="txt_existencia" value="<?php echo $this->datos['existencia']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">minimo:</label>
			<input type="text" name="minimo" class="txt_minimo" value="<?php echo $this->datos['minimo']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">maximo:</label>
			<input type="text" name="maximo" class="txt_maximo" value="<?php echo $this->datos['maximo']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">puntoreorden:</label>
			<input type="text" name="puntoreorden" class="txt_puntoreorden" value="<?php echo $this->datos['puntoreorden']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idgrupo:</label>
			<input type="text" name="idgrupo" class="txt_idgrupo" value="<?php echo $this->datos['idgrupo']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">grupoposicion:</label>
			<input type="text" name="grupoposicion" class="txt_grupoposicion" value="<?php echo $this->datos['grupoposicion']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
