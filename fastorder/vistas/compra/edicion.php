
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
				nombre:'compra'
			},			
			pk:"idcompra"
			
		};				
		 var editor=new Edicioncompra();
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
			<label style="">idcompra:</label>
			<input type="text" name="idcompra" class="txt_idcompra" value="<?php echo $this->datos['idcompra']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idproveedor:</label>
			<input type="text" name="idproveedor" class="txt_idproveedor" value="<?php echo $this->datos['idproveedor']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idalmacen:</label>
			<input type="text" name="idalmacen" class="txt_idalmacen" value="<?php echo $this->datos['idalmacen']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idcxp:</label>
			<input type="text" name="idcxp" class="txt_idcxp" value="<?php echo $this->datos['idcxp']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">tipo:</label>
			<input type="text" name="tipo" class="txt_tipo" value="<?php echo $this->datos['tipo']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">serie:</label>
			<input type="text" name="serie" class="txt_serie" value="<?php echo $this->datos['serie']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">folio:</label>
			<input type="text" name="folio" class="txt_folio" value="<?php echo $this->datos['folio']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">documento:</label>
			<input type="text" name="documento" class="txt_documento" value="<?php echo $this->datos['documento']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">fecha:</label>
			<input type="text" name="fecha" class="txt_fecha" value="<?php echo $this->datos['fecha']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">fechavence:</label>
			<input type="text" name="fechavence" class="txt_fechavence" value="<?php echo $this->datos['fechavence']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">descuento:</label>
			<input type="text" name="descuento" class="txt_descuento" value="<?php echo $this->datos['descuento']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">subtotal:</label>
			<input type="text" name="subtotal" class="txt_subtotal" value="<?php echo $this->datos['subtotal']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">impuesto1:</label>
			<input type="text" name="impuesto1" class="txt_impuesto1" value="<?php echo $this->datos['impuesto1']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">impuesto2:</label>
			<input type="text" name="impuesto2" class="txt_impuesto2" value="<?php echo $this->datos['impuesto2']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">impuesto3:</label>
			<input type="text" name="impuesto3" class="txt_impuesto3" value="<?php echo $this->datos['impuesto3']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">total:</label>
			<input type="text" name="total" class="txt_total" value="<?php echo $this->datos['total']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">nota:</label>
			<input type="text" name="nota" class="txt_nota" value="<?php echo $this->datos['nota']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">estado:</label>
			<input type="text" name="estado" class="txt_estado" value="<?php echo $this->datos['estado']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idinvmov:</label>
			<input type="text" name="idinvmov" class="txt_idinvmov" value="<?php echo $this->datos['idinvmov']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">impreso:</label>
			<input type="text" name="impreso" class="txt_impreso" value="<?php echo $this->datos['impreso']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">enviado:</label>
			<input type="text" name="enviado" class="txt_enviado" value="<?php echo $this->datos['enviado']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
