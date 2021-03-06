<script src="<?php echo $MOD_WEB_PATH; ?>js/catalogos/<?php echo $_PETICION->controlador; ?>/edicion.js"></script>
<script src="<?php echo $MOD_WEB_PATH; ?>js/catalogos/<?php echo $_PETICION->controlador; ?>/detalles_compra.js"></script>
<style>
	.tab_compra .toolbarEdicion{
		display:inline-block;float:right;
	}
</style>
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
		 
		var tabId='#' + config.tab.id;
		
		 
		 var articulos=<?php echo json_encode($this->articulos); ?>;				
		 var fk_compra=<?php echo $this->datos['idcompra']; ?>;				
		 
		var configDet={
			articulos:articulos,
			tabId:tabId,
			fk_compra:fk_compra
		 };	 
		 
		
		
		
			 // foreach($this->series as $serie){
							// if ($serie['idconf_serie'] == $this->datos['serie'] ) $selected='selected';
							// echo '<option '.$selected.' value='.$serie['idconf_serie'].'>'.$serie['serie'].'</option>';
							// $selected='';
						// }
		 // $('#' + config.tab.id + ' .detalle').wijgrid();
		 // alert(configDet.tabId);
		 $(configDet.tabId+' .txtObservacionesPreview').bind('change',function(){
			// alert("change");
			console.log(configDet.tabId + ' [name="nota"]');
			$(configDet.tabId + ' [name="nota"]').val( $(this).val() );
		 });
		 
		 $('#' + config.tab.id + ' [name="idproveedor"]').wijcombobox();
		 $('#' + config.tab.id + ' [name="idalmacen"]').wijcombobox({
			select:function(e, item){
				var params={
					idalmacen: item.value
				};				
				$.ajax({
				  url: "/compra/getSeries",
				  cache: false,
				  data:params
				}).done(function( response ) {
					var resp = eval('(' + response + ')');
					if (resp.success){
						// alert("actualizar combo serie y folio");
						$('#' + config.tab.id + ' [name="folio"]').val('');
						
						// var datos=new Array();
						// for(var i=0; i<resp.datos.length; i++){
							// datos.push({
								// value: resp.datos[i].idconf_serie,
								// label: resp.datos[i].serie,
								// sig_folio: resp.datos[i].sig_folio
							// })
						// }
						
						
						var ds = $('#' + config.tab.id + ' [name="serie"]').wijcombobox('option','data');
						datasource.data = resp.datos;
						datasource.read();
						// $('#' + config.tab.id + ' [name="serie"]').wijcombobox({
							// data: resp.datos
						// });
						
						if (resp.datos.length > 0){
							
							
							$('#' + config.tab.id + ' [name="serie"]').wijcombobox("option","selectedIndex", -1);
							$('#' + config.tab.id + ' [name="serie"]').wijcombobox("option","selectedIndex", 0);
							// $('#' + config.tab.id + ' [name="serie"]').wijcombobox("option","text", "SELECCIONADO");
							// alert("asd");
							// $('#' + config.tab.id + ' [name="serie"]').wijcombobox("repaint");
							$('#' + config.tab.id + ' [name="folio"]').val( resp.datos[0].sig_folio );
						}
					}					
				});
			}
		 });
		 
		var myReader = new wijarrayreader([{name: 'label', mapping: 'serie'}, {name: 'value', mapping: 'idconf_serie'}, {name: 'sig_folio'}]);		 		 
		var series=<?php echo json_encode($this->series) ?>;
		
		var datasource = new wijdatasource({
		    reader: myReader,
		    data: series,		
		    loaded: function (data){
                // get items by data.items
//                 var items = data.items;
            }
		});
					
		var idSerie=<?php echo empty($this->datos['serie'])? 0 : $this->datos['serie']; ?>;
		
		var idxSel=-1;
		for(var i=0; i<series.length; i++){
			if ( series[i].idconf_serie == idSerie ) {
				idxSel=i;
				break;
			}
		}
		 
		
		
		 $('#' + config.tab.id + ' [name="serie"]').wijcombobox({
			selectedIndex: (idxSel > -1)? idxSel: undefined,
			data:datasource,
			select:function(e, item){
				$('#' + config.tab.id + ' [name="folio"]').val( item.sig_folio );
				$('#' + config.tab.id + ' [name="serie"]').wijcombobox("repaint");							
				$('#' + config.tab.id + ' [name="serie"]').wijcombobox("option", "text", "comboboText");
			}
		 });
		 
		 $('#' + config.tab.id + ' [name="fecha"]').wijinputdate({showTrigger:true,dateFormat:'dd/MM/yyyy' });
		 $('#' + config.tab.id + ' [name="fechavence"]').wijinputdate({showTrigger:true,dateFormat:'dd/MM/yyyy' });
		 
		  
		 
		 var editor=new Edicioncompra();
		 editor.init(config);
		 
		 var detalleCompra=new DetallesCompra();
		 
		 configDet.padre=editor;
		 detalleCompra.init(configDet);
	});
</script>

	<div class="pnlIzq" style="background:white;padding-bottom:10px;">
		<?php 	
			global $_PETICION;
			$this->mostrar('/backend/componentes/toolbar_edicion_maestro_detalle');	
			if (!isset($this->datos)){		
				$this->datos=array();		
			}
		?>
		
		<form class="frmEdicion" style="padding-top:10px;">							
			<input type="hidden" name="idcompra" class="txt_idcompra" value="<?php echo $this->datos['idcompra']; ?>" style="width:500px;" />
			
			<div style="display:inline-block;">
				<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;"  >
					<label style="">Almacén:</label>
					<select name='idalmacen'>					
						<?php 
							$seleccionado=false;
							$selected='';
							foreach($this->almacenes as $alm){
								if ($alm['id'] == $this->datos['idalmacen'] ){
									$selected='selected';
									$seleccionado=true;
								} 
								echo '<option '.$selected.' value='.$alm['id'].'>'.$alm['nombre'].'</option>';
								$selected='';
							}
							if ( !$seleccionado ){
								echo '<option value="0" selected>Seleccione un Almacén</option>';
							}
						?>
					</select>				
				</div>
				<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;"  >
					<label style="">Serie:</label>
					<select name='serie' style="width:130px;">					
						
						<?php 
							echo '<option value="0" selected>Seleccione una serie</option>';
							// foreach($this->series as $serie){
								// if ($serie['idconf_serie'] == $this->datos['serie'] ) $selected='selected';
								// echo '<option '.$selected.' value='.$serie['idconf_serie'].'>'.$serie['serie'].'</option>';
								// $selected='';
							// }						
						?>
					</select>				
				</div>
				<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;"  >
					<label style="">Folio:</label>
					<input readonly type="text" name="folio" class="txt_folio" value="<?php echo $this->datos['folio']; ?>" style="width:50px;" />
				</div>
			</div>
			<div style="display:inline-block;">
				<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;"  >
					<label style="">Proveedor:</label>
					<select name='idproveedor'>					
						<?php 
							$seleccionado=false;
							foreach($this->proveedores as $prov){
								if ($prov['idproveedor'] == $this->datos['idproveedor'] ){
									$selected='selected';
									
								} 
								echo '<option '.$selected.' value='.$prov['idproveedor'].'>'.$prov['nombre'].'</option>';
								$selected='';
							}							
						?>
					</select>				
				</div>
				<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;"  >
					<label style="">Fecha:</label>
					<input type="text" name="fecha" class="txt_fecha" value="<?php echo $this->datos['fecha']; ?>" style="width:150px;" />
				</div>
				<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;"  >
					<label style="">Fechavence:</label>
					<input type="text" name="fechavence" class="txt_fechavence" value="<?php echo $this->datos['fechavence']; ?>" style="width:150px;" />
				</div>
			</div>
			<!--div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
				<label style="">Idcxp:</label>
				<input type="text" name="idcxp" class="txt_idcxp" value="<?php // echo $this->datos['idcxp']; ?>" style="width:500px;" />
			</div>
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
				<label style="">Tipo:</label>
				<input type="text" name="tipo" class="txt_tipo" value="<?php // echo $this->datos['tipo']; ?>" style="width:500px;" />
			</div>
			
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
				<label style="">Documento:</label>
				<input type="text" name="documento" class="txt_documento" value="<?php // echo $this->datos['documento']; ?>" style="width:500px;" />
			</div>
			
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
				<label style="">Descuento:</label>
				<input type="text" name="descuento" class="txt_descuento" value="<?php // echo $this->datos['descuento']; ?>" style="width:500px;" />
			</div-->
			<div class="inputBox" style="display:none; margin-bottom:8px;margin-left:10px;width:100%;"  >
				<label style="">Subtotal:</label>
				<input type="text" name="subtotal" class="txt_subtotal" value="<?php  echo $this->datos['subtotal']; ?>" style="width:500px;" />
			</div>
			<div class="inputBox" style="display:none; margin-bottom:8px;margin-left:10px;width:100%;"  >
				<label style="">Impuesto1:</label>
				<input type="text" name="impuesto1" class="txt_impuesto1" value="<?php  echo $this->datos['impuesto1']; ?>" style="width:500px;" />
			</div>
			<!--div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
				<label style="">Impuesto2:</label>
				<input type="text" name="impuesto2" class="txt_impuesto2" value="<?php // echo $this->datos['impuesto2']; ?>" style="width:500px;" />
			</div>
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
				<label style="">Impuesto3:</label>
				<input type="text" name="impuesto3" class="txt_impuesto3" value="<?php // echo $this->datos['impuesto3']; ?>" style="width:500px;" />
			</div-->
			<div class="inputBox" style="display:none; margin-bottom:8px;margin-left:10px;width:100%;"  >
				<label style="">Total:</label>
				<input type="text" name="total" class="txt_total" value="<?php  echo $this->datos['total']; ?>" style="width:500px;" />
			</div>
			<div class="inputBox" style="display:none; margin-bottom:8px;margin-left:10px;width:100%;"  >
				<label style="">Nota:</label>
				<input type="text"  name="nota" class="txt_nota" value="<?php  echo $this->datos['nota']; ?>" style="width:500px;" />
			</div>
			<div class="inputBox" style="margin-bottom:8px;display:none;margin-left:10px;width:100%;"  >
				<label style="">Estado:</label>
				<input type="text" name="estado" class="txt_estado" value="<?php  echo $this->datos['estado']; ?>" style="width:500px;" />
			</div>
			<!--div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
				<label style="">Idinvmov:</label>
				<input type="text" name="idinvmov" class="txt_idinvmov" value="<?php // echo $this->datos['idinvmov']; ?>" style="width:500px;" />
			</div>
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
				<label style="">Impreso:</label>
				<input type="text" name="impreso" class="txt_impreso" value="<?php // echo $this->datos['impreso']; ?>" style="width:500px;" />
			</div>
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;"  >
				<label style="">Enviado:</label>
				<input type="text" name="enviado" class="txt_enviado" value="<?php // echo $this->datos['enviado']; ?>" style="width:500px;" />
			</div-->

		</form>
		<div>
			<table class="grid_articulos">
			  <thead>
				<th>Codigo</th><th>Nombre</th><th>Cantidad</th><th>Costo</th><th>Subtotal</th><th>Iva</th><th>Total</th>
			  </thead>
			  <tbody>
				
				  <?php 
					foreach($this->articulos as $articulo){	
					
						// echo '<tr><td>'.$articulo['codigo'].'</td>
						// <td>'.$articulo['nombre'].'</td>						
						// <td>'.$articulo['cantidad'].'</td>
						// <td>'.$articulo['costo'].'</td>
						// <td>'.$articulo['subtotal'].'</td>
						// <td>'.$articulo['impuesto1'].'</td>
						// <td>'.$articulo['total'].'</td></tr>'
						// ;
					}
				  ?>
				
				
			  </tbody>
			</table>			
		</div>
		<div style="margin-top:10px;">
			<div class="" style="display:inline-block;margin-left:10px;"  >
				<label style="display:block;" >Observaciones:</label><textarea style="width:650px; height:80px;" class="txtObservacionesPreview"><?php  echo $this->datos['nota']; ?></textarea>
			</div>
			<div class="" style="display:inline-block;float:right; margin-right:10px;"  >
				<table>
					<tr>
						<td>Sub Total</td>
						<td><input class="subtotalPreview" style="text-align:right;" type="text" readonly value="<?php  echo  '$'.number_format($this->datos['subtotal'],2,'.',','); ?>" /> </td>
					</tr>
					<tr>
						<td>Iva</td>
						<td><input class="ivaPreview" style="text-align:right;" type="text" readonly value="<?php  echo  '$'.number_format($this->datos['impuesto1'],2,'.',','); ?>" /></td>
					</tr>
					<tr>
						<td>Total</td>
						<td><input class="totalPreview" style="text-align:right;" type="text" readonly value="<?php  echo  '$'.number_format($this->datos['total'],2,'.',','); ?>" /></td>
					</tr>
				</table>
				
			</div>
		</div>
	</div>
</div>
