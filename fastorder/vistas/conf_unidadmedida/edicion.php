
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
				nombre:'conf_unidadmedida'
			},			
			pk:"idconf_unidadmedida"
			
		};				
		 var editor=new Edicionconf_unidadmedida();
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
			<label style="">idconf_unidadmedida:</label>
			<input type="text" name="idconf_unidadmedida" class="txt_idconf_unidadmedida" value="<?php echo $this->datos['idconf_unidadmedida']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">abrev:</label>
			<input type="text" name="abrev" class="txt_abrev" value="<?php echo $this->datos['abrev']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">descripcion:</label>
			<input type="text" name="descripcion" class="txt_descripcion" value="<?php echo $this->datos['descripcion']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
