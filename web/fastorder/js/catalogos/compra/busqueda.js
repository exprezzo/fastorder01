var Busquedacompra=function(){
	this.tituloNuevo='Nueva';
	this.configComboAlmacen=function(datasource){
		var me=this;
		 $( this.tabId + ' [name="idalmacen"]').wijcombobox({
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
						// $(this.tabId + ' [name="folio"]').val('');																	
						
						// var datasource = $(me.tabId + ' [name="idserie"]').wijcombobox('option','data');
						resp.datos.push({idconf_serie:0,serie:'todas' });
						datasource.data = resp.datos;
						datasource.read();						
						if (resp.datos.length > 0){
							 // alert( resp.datos[0]['idconf_serie'] );
							$(me.tabId + ' [name="idserie"]').wijcombobox("option","selectedIndex", -1);
							$(me.tabId + ' [name="idserie"]').wijcombobox("option","selectedIndex", 0);							
							// $(me.tabId + ' [name="idserie"]').val(resp.datos[0]['idconf_serie']);
						}
					}					
				});
			}
		 });
	}
	this.configComboSerie=function(series, idSerie){
		
		var myReader = new wijarrayreader([{name: 'label', mapping: 'serie'}, {name: 'value', mapping: 'idconf_serie'}, {name: 'sig_folio'}]);		 		 
		// var series=<?php echo json_encode($this->series) ?>;
		
		
		var datasource = new wijdatasource({
		    reader: myReader,
		    data: series,		
		    loaded: function (data){
                // get items by data.items
//                 var items = data.items;
            }
		});
					
		// var idSerie=<?php echo empty($this->datos['serie'])? 0 : $this->datos['serie']; ?>;
		this.serieDS = datasource;
		var idxSel=-1;
		for(var i=0; i<series.length; i++){
			if ( series[i].idconf_serie == idSerie ) {
				idxSel=i;
				break;
			}
		}
		 
		
		
		 $(this.tabId + ' [name="idserie"]').wijcombobox({
			selectedIndex: (idxSel > -1)? idxSel: undefined,
			data:datasource,
			select:function(e, item){
				// $( this.tabId + ' [name="folio"]').val( item.sig_folio );
				$( this.tabId + ' [name="idserie"]').wijcombobox("repaint");							
				// $( this.tabId + ' [name="idserie"]').wijcombobox("option", "text", "comboboText");
			}
		 });
	},	
	this.eliminar=function(){
	
	var me=this;
	
	var id = this.selected[this.configuracion.pk];
	var me=this;	
	var params={};
	params[this.configuracion.pk]=id;
	
	$.ajax({
			type: "POST",
			url: '/'+this.configuracion.modulo.nombre+'/'+this.controlador.nombre+'/eliminar',

			data: params
		}).done(function( response ) {		
			var resp = eval('(' + response + ')');
			var msg= (resp.msg)? resp.msg : '';
			var title;
			if ( resp.success == true	){
				icon='/web/'+kore.modulo+'/images/yes.png';
				title= 'Success';				
				var gridBusqueda=$(me.tabId+" .grid_busqueda");				
				gridBusqueda.wijgrid('ensureControl', true);
			}else{
				icon= '/web/'+kore.modulo+'/images/error.png';
				title= 'Error';
			}
			
			//cuando es true, envia tambien los datos guardados.
			//actualiza los valores del formulario.
			$.gritter.add({
				position: 'bottom-left',
				title:title,
				text: msg,
				image: icon,
				class_name: 'my-sticky-class'
			});
		});
}
	this.nuevo=function(){		
		TabManager.add('/'+this.configuracion.modulo.nombre+'/'+this.controlador.nombre+'/nuevo',this.tituloNuevo);
	};
	this.activate=function(){
		// vuelve a renderear estos elementos que presentaban problemas. (correccion de bug)		
		$(this.tabId+" .lista_toolbar").removeClass('ui-tabs-hide');
		$(this.tabId+" .lista_toolbar  ~ .wijmo-wijribbon-panel").removeClass('ui-tabs-hide');		
		
	}
	this.borrar=function(){
		if (this.selected==undefined) return false;
		var r=confirm("¿Eliminar Elemento?");
		if (r==true){
		  this.eliminar();
		}
	}
	this.agregarClase=function(clase){
		var tabId=this.tabId;		
		var tab=$('div'+this.tabId);						
		tab.addClass(clase);		
		tab=$('a[href="'+tabId+'"]');
		tab.addClass(clase);
	}
	this.init=function(config){		
		//-------------------------------------------Al nucleo		*/		
		this.controlador=config.controlador;
		this.catalogo=config.catalogo;
		this.configuracion=config;
		//-------------------------------------------
		var tab=config.tab;		
		tabId = '#' + tab.id;
		this.tabId = tabId;
		var jTab=$('div'+tabId);				
		jTab.data('tabObj',this);		
				
		var jTab=$('a[href="'+tabId+'"]');		//// this.agregarClase('busqueda_'+this.controlador.nombre);
	    jTab.html('Compras');		 
		 jTab.addClass('busqueda_'+this.controlador.nombre); 
		//-------------------------------------------
		$('div'+tabId).css('padding','0px 0 0 0');
		$('div'+tabId).css('margin-top','0px');
		$('div'+tabId).css('border','0 1px 1px 1px');			
		//-------------------------------------------				
		this.configurarToolbar(tabId);		
		this.configurarGrid(tabId);
		this.configComboSerie(config.series, config.idSerie);
		
		this.configComboAlmacen( this.serieDS ); // this.serieDS es el datasource del combo serie
	};
	this.configurarToolbar=function(tabId){
		var me=this;
		$(this.tabId + ' [name="fechai"]').wijinputdate({showTrigger:true,dateFormat:'dd/MM/yyyy'});
		$(this.tabId + ' [name="fechaf"]').wijinputdate({showTrigger:true,dateFormat:'dd/MM/yyyy'});
		// $(this.tabId + ' [name="folioi"]').wijinputnumber({decimalPlaces: 0});
		// $(this.tabId + ' [name="foliof"]').wijinputnumber({decimalPlaces: 0});
		$(this.tabId + ' [name="folioi"]').wijtextbox();
		$(this.tabId + ' [name="foliof"]').wijtextbox();
		
		$(this.tabId + ' [name="idserie"]').wijcombobox();
		$(this.tabId + ' [name="idproveedor"]').wijcombobox();
		$(this.tabId + ' [name="idalmacen"]').wijcombobox();
		
		$(this.tabId+ " > .lista_toolbar").wijribbon({
			click: function (e, cmd) {
				switch(cmd.commandName){
					case 'nuevo':						
						me.nuevo();
					break;
					case 'editar':
						if (me.selected!=undefined){													
							var id=me.selected[me.configuracion.pk];							
							TabManager.add('/'+me.configuracion.modulo.nombre+'/'+me.controlador.nombre+'/editar','Editar '+me.catalogo.nombre,id);
						}
					break;
					case 'eliminar':
						if (me.selected==undefined) return false;
						var r=confirm("¿Eliminar?");
						if (r==true){
						  me.eliminar();
						}
					break;
					case 'refresh':
						
						var gridBusqueda=$(me.tabId+" .grid_busqueda");
						gridBusqueda.wijgrid('ensureControl', true);
					break;
					case 'filtros':
						$(me.tabId+" .filtros").toggle({duration:400});
						// alert("mostrar filtros");
					break;
										
					default:						 
						$.gritter.add({
							position: 'bottom-left',
							title:cmd.commandName,
							text: "Acciones del toolbar en construcci&oacute;n",
							image: '/web/'+kore.modulo+'/images/info.png',
							class_name: 'my-sticky-class'
						});
						
					break;
					case 'imprimir':
						alert("Imprimir en construcción");
					break;
				}
				
			}
		});
		
	};
	this.configurarGrid=function(tabId){
		pageSize=10;
		
		var campos=[
			// { name: "id"  }
		];
		var dataReader = new wijarrayreader(campos);
		
		var me=this;		 
		
		var dataSource = new wijdatasource({
			proxy: new wijhttpproxy({
				url: '/'+this.configuracion.modulo.nombre+'/'+this.controlador.nombre+'/buscar',
				dataType: "json"
			}),
			dynamic:true,
			reader:new wijarrayreader(campos),
			loading: function(e, data) { 
				
				var folioi=$(me.tabId + ' [name="folioi"]').val();
				var foliof=$(me.tabId + ' [name="foliof"]').val();
				// var idserie=$(me.tabId + ' [name="idserie"]').val();
				
				//----------------------
				var selectedIndex = $(me.tabId + ' [name="idserie"]').wijcombobox("option","selectedIndex"); 
				var idserie='';
				if (selectedIndex != null && selectedIndex > -1 ){					
					var dataSerie=$(me.tabId + ' [name="idserie"]').wijcombobox("option","data");
					
					if (dataSerie.data){
						idserie =     dataSerie.data[selectedIndex].idconf_serie;
					}else if (dataSerie[selectedIndex] ){
						idserie =     dataSerie[selectedIndex].value;
					}					
					
					console.log("dataSerie"); console.log(dataSerie);
					console.log("idserie"); console.log(idserie);
				}
				
				
				//----------------------
				var idproveedor=$(me.tabId + ' [name="idproveedor"]').val();
				var idalmacen = $(me.tabId + ' [name="idalmacen"]').val();
				if (folioi!='')
				data.data.filtering.push({
					field: 'folio',
					dataKey:'folioi',
					filterOperator:'greaterorequal',
					filterValue:folioi
				});
				
				if (foliof!='')
				data.data.filtering.push({
					field: 'folio',
					dataKey:'foliof',
					filterOperator:'lessorequal',
					filterValue:foliof
				});
				
				data.data.filtering.push({
					field: 'fecha',
					dataKey:'fechai',
					filterOperator:'greaterorequal',
					filterValue:$(me.tabId + ' [name="fechai"]').val()
				});
				
				data.data.filtering.push({
					field: 'fecha',
					dataKey:'fechaf',
					filterOperator:'lessorequal',
					filterValue:$(me.tabId + ' [name="fechaf"]').val()
				});
				
				if (idalmacen!=0)
				data.data.filtering.push({
					 dataKey: 'idalmacen',
					 field:'c.idalmacen',
					filterOperator:'equals',
					filterValue:$(me.tabId + ' [name="idalmacen"]').val()
				});
				
				if (idproveedor!=0)
				data.data.filtering.push({
					dataKey: 'idproveedor',					
					filterOperator:'equals',
					filterValue:$(me.tabId + ' [name="idproveedor"]').val()
				});
				
				if (idserie!=0)
				data.data.filtering.push({
					dataKey: 'serie',
					field:'c.serie',
					filterOperator:'equals',
					filterValue:idserie
				});
				
				
			}
		});
				
		dataSource.reader.read= function (datasource) {						
			var totalRows=datasource.data.totalRows;						
			datasource.data = datasource.data.rows;
			datasource.data.totalRows = totalRows;
			dataReader.read(datasource);
		};				
		this.dataSource=dataSource;
		var gridBusqueda=$(this.tabId+" .grid_busqueda");

		
		gridBusqueda.wijgrid({
			dynamic: true,
			allowColSizing:true,			
			allowKeyboardNavigation:true,
			allowPaging: true,
			pageSize:pageSize,
			selectionMode:'singleRow',
			data:dataSource,
			showFilter:false,
			columns: [ 
			    // { dataKey: "id", hidden:true, visible:true, headerText: "ID" }										
				{ dataKey: "idcompra", visible:false, headerText: "Idcompra" },				
				{ dataKey: "idalmacen", visible:false, headerText: "Idalmacen" },
				{ dataKey: "idcxp", visible:false, headerText: "Idcxp" },
				{ dataKey: "tipo", visible:false, headerText: "Tipo" },
				{ dataKey: "serie", visible:true, headerText: "Serie y Folio",
					cellFormatter: function (args) {						
						if (args.row.type & $.wijmo.wijgrid.rowType.data) {
							args.$container
								.css("text-align", "center")
								.empty()
								.append($("<div>").html( args.row.data.nombreserie+'-'+args.row.data.folio ));
							return true; 
						} 
					} 
				},
				{ dataKey: "folio", visible:false, headerText: "Folio" },
				{ dataKey: "idproveedor", visible:false, headerText: "Proveedor" },
				{ dataKey: "nombreProv", visible:true, headerText: "Proveedor" },
				{ dataKey: "nombreserie", visible:false, headerText: "nombreSerie" },				
				{ dataKey: "documento", visible:true, headerText: "Docto" },				
				{ dataKey: "fecha", visible:true, headerText: "Fecha",
					cellFormatter: function (args) {						
						if (args.row.type & $.wijmo.wijgrid.rowType.data) {																					
							var d= new Date(args.row.data.fecha);														
							var curr_date = d.getDate();
							if (curr_date<10) curr_date = '0' + curr_date.toString();							
							var curr_month = getMonthName(d); //Months are zero based							
							var curr_year = d.getFullYear();
							args.$container.html( curr_date + "/" + curr_month + "/" + curr_year );
							return true; 
						} 
					}
				},
				{ dataKey: "fechavence", visible:true, headerText: "Fecha Vence",
					cellFormatter: function (args) {						
						if (args.row.type & $.wijmo.wijgrid.rowType.data) {																					
							var d= new Date(args.row.data.fechavence);														
							var curr_date = d.getDate();
							if (curr_date<10) curr_date = '0' + curr_date.toString();							
							var curr_month = getMonthName(d); //Months are zero based							
							var curr_year = d.getFullYear();
							args.$container.css('text-align','center').html( curr_date + "/" + curr_month + "/" + curr_year );
							return true; 
						} 
					} 
				},
				{ dataKey: "estado", visible:false, headerText: "Estado" },
				{ dataKey: "nombreEstado", visible:true, headerText: "Estado" },
				{ dataKey: "descuento", visible:false, headerText: "Descuento" },
				{ dataKey: "subtotal", visible:true, headerText: "Subtotal", dataType: "number", dataFormatString: "n2",
					cellFormatter: function (args) {						
						if (args.row.type & $.wijmo.wijgrid.rowType.data) {							
							if (  !$.isNumeric( args.row.data.subtotal) ) args.row.data.subtotal=new Number(0);
							args.row.data.subtotal*=1;							 
							var subtotal ="$"+args.row.data.subtotal.toFixed(2);														
							args.$container.html( subtotal );
							return true; 
						} 
					}
				},
				{ dataKey: "impuesto1", visible:false, headerText: "Iva" },
				{ dataKey: "impuesto2", visible:false, headerText: "Impuesto2" },
				{ dataKey: "impuesto3", visible:false, headerText: "Impuesto3" },
				{ dataKey: "total", visible:true, headerText: "Total", dataType: "number", dataFormatString: "n2",
					cellFormatter: function (args) {												
						if (args.row.type & $.wijmo.wijgrid.rowType.data) {							
							if ( args.row.data.total ==undefined || ! $.isNumeric( args.row.data.total) ) args.row.data.total=new Number(0);							
							args.row.data.total*=1;
							var total="$"+args.row.data.total.toFixed(2);												
							args.$container.html( total );
							return true; 
						} 
					}
				},
				{ dataKey: "nota", visible:false, headerText: "Nota" },
				{ dataKey: "idinvmov", visible:false, headerText: "Idinvmov" },
				{ dataKey: "impreso", visible:false, headerText: "Impreso" },
				{ dataKey: "enviado", visible:false, headerText: "Enviado" }
			]
		});
		
		var me=this;
		
		gridBusqueda.wijgrid({ selectionChanged: function (e, args) { 					
			var item=args.addedCells.item(0);
			var row=item.row();
			var data=row.data;			
			me.selected=data;			
		} });
		
		gridBusqueda.wijgrid({ loaded: function (e) { 
			$(me.tabId + ' .grid_busqueda tr').bind('dblclick', function (e) { 							
				var pedidoId=me.selected[me.configuracion.pk];
				TabManager.add('/'+me.configuracion.modulo.nombre+'/'+me.controlador.nombre+'/editar','Editar '+me.catalogo.nombre,pedidoId);				
			});			
		} });
	};
};