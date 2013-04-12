
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
				nombre:'articuloubi'
			},			
			pk:"idarticuloubi"
			
		};				
		 var editor=new Edicionarticuloubi();
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
			<label style="">idarticuloubi:</label>
			<input type="text" name="idarticuloubi" class="txt_idarticuloubi" value="<?php echo $this->datos['idarticuloubi']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">articuloid:</label>
			<input type="text" name="articuloid" class="txt_articuloid" value="<?php echo $this->datos['articuloid']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">almacenid:</label>
			<input type="text" name="almacenid" class="txt_almacenid" value="<?php echo $this->datos['almacenid']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">ubicacion:</label>
			<input type="text" name="ubicacion" class="txt_ubicacion" value="<?php echo $this->datos['ubicacion']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
