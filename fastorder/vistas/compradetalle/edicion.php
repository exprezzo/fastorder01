
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
				nombre:'compradetalle'
			},			
			pk:"idcompradetalle"
			
		};				
		 var editor=new Edicioncompradetalle();
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
			<label style="">idcompradetalle:</label>
			<input type="text" name="idcompradetalle" class="txt_idcompradetalle" value="<?php echo $this->datos['idcompradetalle']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idcompra:</label>
			<input type="text" name="idcompra" class="txt_idcompra" value="<?php echo $this->datos['idcompra']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idarticulo:</label>
			<input type="text" name="idarticulo" class="txt_idarticulo" value="<?php echo $this->datos['idarticulo']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idarticulopre:</label>
			<input type="text" name="idarticulopre" class="txt_idarticulopre" value="<?php echo $this->datos['idarticulopre']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idordencompradet:</label>
			<input type="text" name="idordencompradet" class="txt_idordencompradet" value="<?php echo $this->datos['idordencompradet']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">precio:</label>
			<input type="text" name="precio" class="txt_precio" value="<?php echo $this->datos['precio']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">cantidad:</label>
			<input type="text" name="cantidad" class="txt_cantidad" value="<?php echo $this->datos['cantidad']; ?>" style="width:500px;" />
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
			<label style="">descripcion:</label>
			<input type="text" name="descripcion" class="txt_descripcion" value="<?php echo $this->datos['descripcion']; ?>" style="width:500px;" />
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
