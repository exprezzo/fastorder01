
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
				nombre:'articuloequ'
			},			
			pk:"idarticuloequ"
			
		};				
		 var editor=new Edicionarticuloequ();
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
			<label style="">idarticuloequ:</label>
			<input type="text" name="idarticuloequ" class="txt_idarticuloequ" value="<?php echo $this->datos['idarticuloequ']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">articuloid:</label>
			<input type="text" name="articuloid" class="txt_articuloid" value="<?php echo $this->datos['articuloid']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">articuloid2:</label>
			<input type="text" name="articuloid2" class="txt_articuloid2" value="<?php echo $this->datos['articuloid2']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
