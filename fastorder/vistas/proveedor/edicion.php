
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
				nombre:'proveedor'
			},			
			pk:"idproveedor"
			
		};				
		 var editor=new Edicionproveedor();
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
			<label style="">idproveedor:</label>
			<input type="text" name="idproveedor" class="txt_idproveedor" value="<?php echo $this->datos['idproveedor']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">nombre:</label>
			<input type="text" name="nombre" class="txt_nombre" value="<?php echo $this->datos['nombre']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">razonsocial:</label>
			<input type="text" name="razonsocial" class="txt_razonsocial" value="<?php echo $this->datos['razonsocial']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">rfc:</label>
			<input type="text" name="rfc" class="txt_rfc" value="<?php echo $this->datos['rfc']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">calle:</label>
			<input type="text" name="calle" class="txt_calle" value="<?php echo $this->datos['calle']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">numint:</label>
			<input type="text" name="numint" class="txt_numint" value="<?php echo $this->datos['numint']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">colonia:</label>
			<input type="text" name="colonia" class="txt_colonia" value="<?php echo $this->datos['colonia']; ?>" style="width:500px;" />
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
			<label style="">cp:</label>
			<input type="text" name="cp" class="txt_cp" value="<?php echo $this->datos['cp']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">telefono:</label>
			<input type="text" name="telefono" class="txt_telefono" value="<?php echo $this->datos['telefono']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">email:</label>
			<input type="text" name="email" class="txt_email" value="<?php echo $this->datos['email']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">fax:</label>
			<input type="text" name="fax" class="txt_fax" value="<?php echo $this->datos['fax']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">conven:</label>
			<input type="text" name="conven" class="txt_conven" value="<?php echo $this->datos['conven']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">conventel:</label>
			<input type="text" name="conventel" class="txt_conventel" value="<?php echo $this->datos['conventel']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">convenfax:</label>
			<input type="text" name="convenfax" class="txt_convenfax" value="<?php echo $this->datos['convenfax']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">convenema:</label>
			<input type="text" name="convenema" class="txt_convenema" value="<?php echo $this->datos['convenema']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">concom:</label>
			<input type="text" name="concom" class="txt_concom" value="<?php echo $this->datos['concom']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">concomtel:</label>
			<input type="text" name="concomtel" class="txt_concomtel" value="<?php echo $this->datos['concomtel']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">concomfax:</label>
			<input type="text" name="concomfax" class="txt_concomfax" value="<?php echo $this->datos['concomfax']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">concomema:</label>
			<input type="text" name="concomema" class="txt_concomema" value="<?php echo $this->datos['concomema']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">diacre:</label>
			<input type="text" name="diacre" class="txt_diacre" value="<?php echo $this->datos['diacre']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">despropag:</label>
			<input type="text" name="despropag" class="txt_despropag" value="<?php echo $this->datos['despropag']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">limcre:</label>
			<input type="text" name="limcre" class="txt_limcre" value="<?php echo $this->datos['limcre']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">observaciones:</label>
			<input type="text" name="observaciones" class="txt_observaciones" value="<?php echo $this->datos['observaciones']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
