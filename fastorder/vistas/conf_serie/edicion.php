
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
				nombre:'conf_serie'
			},			
			pk:"idconf_serie"
			
		};				
		 var editor=new Edicionconf_serie();
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
			<label style="">Idconf_serie:</label>
			<input type="text" name="idconf_serie" class="txt_idconf_serie" value="<?php echo $this->datos['idconf_serie']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Serie:</label>
			<input type="text" name="serie" class="txt_serie" value="<?php echo $this->datos['serie']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Folio_i:</label>
			<input type="text" name="folio_i" class="txt_folio_i" value="<?php echo $this->datos['folio_i']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Folio_f:</label>
			<input type="text" name="folio_f" class="txt_folio_f" value="<?php echo $this->datos['folio_f']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Sig_folio:</label>
			<input type="text" name="sig_folio" class="txt_sig_folio" value="<?php echo $this->datos['sig_folio']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Es_default:</label>
			<input type="text" name="es_default" class="txt_es_default" value="<?php echo $this->datos['es_default']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Idalmacen:</label>
			<input type="text" name="idalmacen" class="txt_idalmacen" value="<?php echo $this->datos['idalmacen']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Proceso:</label>
			<input type="text" name="proceso" class="txt_proceso" value="<?php echo $this->datos['proceso']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Idempresa:</label>
			<input type="text" name="idempresa" class="txt_idempresa" value="<?php echo $this->datos['idempresa']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Idsucursal:</label>
			<input type="text" name="idsucursal" class="txt_idsucursal" value="<?php echo $this->datos['idsucursal']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
