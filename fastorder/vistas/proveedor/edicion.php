
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
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Idproveedor:</label>
			<input type="text" name="idproveedor" class="txt_idproveedor" value="<?php echo $this->datos['idproveedor']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Nombre:</label>
			<input type="text" name="nombre" class="txt_nombre" value="<?php echo $this->datos['nombre']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Razonsocial:</label>
			<input type="text" name="razonsocial" class="txt_razonsocial" value="<?php echo $this->datos['razonsocial']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Rfc:</label>
			<input type="text" name="rfc" class="txt_rfc" value="<?php echo $this->datos['rfc']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Calle:</label>
			<input type="text" name="calle" class="txt_calle" value="<?php echo $this->datos['calle']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Numint:</label>
			<input type="text" name="numint" class="txt_numint" value="<?php echo $this->datos['numint']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Colonia:</label>
			<input type="text" name="colonia" class="txt_colonia" value="<?php echo $this->datos['colonia']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Ciudad:</label>
			<input type="text" name="ciudad" class="txt_ciudad" value="<?php echo $this->datos['ciudad']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Estado:</label>
			<input type="text" name="estado" class="txt_estado" value="<?php echo $this->datos['estado']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Pais:</label>
			<input type="text" name="pais" class="txt_pais" value="<?php echo $this->datos['pais']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Cp:</label>
			<input type="text" name="cp" class="txt_cp" value="<?php echo $this->datos['cp']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Telefono:</label>
			<input type="text" name="telefono" class="txt_telefono" value="<?php echo $this->datos['telefono']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Email:</label>
			<input type="text" name="email" class="txt_email" value="<?php echo $this->datos['email']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Fax:</label>
			<input type="text" name="fax" class="txt_fax" value="<?php echo $this->datos['fax']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Conven:</label>
			<input type="text" name="conven" class="txt_conven" value="<?php echo $this->datos['conven']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Conventel:</label>
			<input type="text" name="conventel" class="txt_conventel" value="<?php echo $this->datos['conventel']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Convenfax:</label>
			<input type="text" name="convenfax" class="txt_convenfax" value="<?php echo $this->datos['convenfax']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Convenema:</label>
			<input type="text" name="convenema" class="txt_convenema" value="<?php echo $this->datos['convenema']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Concom:</label>
			<input type="text" name="concom" class="txt_concom" value="<?php echo $this->datos['concom']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Concomtel:</label>
			<input type="text" name="concomtel" class="txt_concomtel" value="<?php echo $this->datos['concomtel']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Concomfax:</label>
			<input type="text" name="concomfax" class="txt_concomfax" value="<?php echo $this->datos['concomfax']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Concomema:</label>
			<input type="text" name="concomema" class="txt_concomema" value="<?php echo $this->datos['concomema']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Diacre:</label>
			<input type="text" name="diacre" class="txt_diacre" value="<?php echo $this->datos['diacre']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Despropag:</label>
			<input type="text" name="despropag" class="txt_despropag" value="<?php echo $this->datos['despropag']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Limcre:</label>
			<input type="text" name="limcre" class="txt_limcre" value="<?php echo $this->datos['limcre']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
			<label style="">Observaciones:</label>
			<input type="text" name="observaciones" class="txt_observaciones" value="<?php echo $this->datos['observaciones']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
