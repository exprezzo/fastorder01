
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
				nombre:'pedidointdetalle'
			},			
			pk:"idpedidointdetalle"
			
		};				
		 var editor=new Edicionpedidointdetalle();
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
			<label style="">idpedidointdetalle:</label>
			<input type="text" name="idpedidointdetalle" class="txt_idpedidointdetalle" value="<?php echo $this->datos['idpedidointdetalle']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idarticulo:</label>
			<input type="text" name="idarticulo" class="txt_idarticulo" value="<?php echo $this->datos['idarticulo']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">idpedidoint:</label>
			<input type="text" name="idpedidoint" class="txt_idpedidoint" value="<?php echo $this->datos['idpedidoint']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">cantidad:</label>
			<input type="text" name="cantidad" class="txt_cantidad" value="<?php echo $this->datos['cantidad']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">status:</label>
			<input type="text" name="status" class="txt_status" value="<?php echo $this->datos['status']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">concentrado:</label>
			<input type="text" name="concentrado" class="txt_concentrado" value="<?php echo $this->datos['concentrado']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
