
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
				nombre:'ordencompra'
			},			
			pk:"idordencompra"
			
		};				
		 var editor=new Edicionordencompra();
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
			<label style="">Idordencompra:</label>
			<input type="text" name="idordencompra" class="txt_idordencompra" value="<?php echo $this->datos['idordencompra']; ?>" style="width:500px;" />
			</div>	
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Idproveedor:</label>
			<input type="text" name="idproveedor" class="txt_idproveedor" value="<?php echo $this->datos['idproveedor']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Fecha:</label>
			<input type="text" name="fecha" class="txt_fecha" value="<?php echo $this->datos['fecha']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Vencimiento:</label>
			<input type="text" name="vencimiento" class="txt_vencimiento" value="<?php echo $this->datos['vencimiento']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Idestado:</label>
			<input type="text" name="idestado" class="txt_idestado" value="<?php echo $this->datos['idestado']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Serie:</label>
			<input type="text" name="serie" class="txt_serie" value="<?php echo $this->datos['serie']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Folio:</label>
			<input type="text" name="folio" class="txt_folio" value="<?php echo $this->datos['folio']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Idalmacen:</label>
			<input type="text" name="idalmacen" class="txt_idalmacen" value="<?php echo $this->datos['idalmacen']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Enviada:</label>
			<input type="text" name="enviada" class="txt_enviada" value="<?php echo $this->datos['enviada']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Impresa:</label>
			<input type="text" name="impresa" class="txt_impresa" value="<?php echo $this->datos['impresa']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
