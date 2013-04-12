
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
				nombre:'empresa'
			},			
			pk:"idempresa"
			
		};				
		 var editor=new Edicionempresa();
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
			<label style="">idempresa:</label>
			<input type="text" name="idempresa" class="txt_idempresa" value="<?php echo $this->datos['idempresa']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">nombre:</label>
			<input type="text" name="nombre" class="txt_nombre" value="<?php echo $this->datos['nombre']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">razonsocial:</label>
			<input type="text" name="razonsocial" class="txt_razonsocial" value="<?php echo $this->datos['razonsocial']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">calle:</label>
			<input type="text" name="calle" class="txt_calle" value="<?php echo $this->datos['calle']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">numint:</label>
			<input type="text" name="numint" class="txt_numint" value="<?php echo $this->datos['numint']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">numext:</label>
			<input type="text" name="numext" class="txt_numext" value="<?php echo $this->datos['numext']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">ciudad:</label>
			<input type="text" name="ciudad" class="txt_ciudad" value="<?php echo $this->datos['ciudad']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">estado:</label>
			<input type="text" name="estado" class="txt_estado" value="<?php echo $this->datos['estado']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">pais:</label>
			<input type="text" name="pais" class="txt_pais" value="<?php echo $this->datos['pais']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">telefono:</label>
			<input type="text" name="telefono" class="txt_telefono" value="<?php echo $this->datos['telefono']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">fax:</label>
			<input type="text" name="fax" class="txt_fax" value="<?php echo $this->datos['fax']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">email:</label>
			<input type="text" name="email" class="txt_email" value="<?php echo $this->datos['email']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
