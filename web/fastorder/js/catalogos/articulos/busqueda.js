var Busquedaarticulos=function(){
	this.tituloNuevo='Nueva';
	this.eliminar=function(){
	
	var me=this;
	
	var id = this.selected[this.configuracion.pk];
	var me=this;	
	var params={};
	params[this.configuracion.pk]=id;
	
	$.ajax({
			type: "POST",
			url: kore.url_base+this.configuracion.modulo.nombre+'/'+this.controlador.nombre+'/eliminar',

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
		TabManager.add(kore.url_base+this.configuracion.modulo.nombre+'/'+this.controlador.nombre+'/nuevo',this.tituloNuevo);
	};
	this.activate=function(){
		// vuelve a renderear estos elementos que presentaban problemas. (correccion de bug)		
		$(this.tabId+" .lista_toolbar").removeClass('ui-tabs-hide');
		$(this.tabId+" .lista_toolbar  ~ .wijmo-wijribbon-panel").removeClass('ui-tabs-hide');		
		
	}
	this.borrar=function(){
		if (this.selected==undefined) return false;
		var r=confirm("øEliminar Elemento?");
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
	    jTab.html(this.catalogo.nombre);		 
		 jTab.addClass('busqueda_'+this.controlador.nombre); 
		//-------------------------------------------
		$('div'+tabId).css('padding','0px 0 0 0');
		$('div'+tabId).css('margin-top','0px');
		$('div'+tabId).css('border','0 1px 1px 1px');			
		//-------------------------------------------				
		this.configurarToolbar(tabId);		
		 this.configurarGrid(tabId);
	};
	this.configurarToolbar=function(tabId){
		var me=this;
		
		$(this.tabId+ " > .lista_toolbar").wijribbon({
			click: function (e, cmd) {
				switch(cmd.commandName){
					case 'nuevo':						
						me.nuevo();
					break;
					case 'editar':
						if (me.selected!=undefined){													
							var id=me.selected[me.configuracion.pk];							
							TabManager.add(kore.url_base+me.configuracion.modulo.nombre+'/'+me.controlador.nombre+'/editar','Editar '+me.catalogo.nombre,id);
						}
					break;
					case 'eliminar':
						if (me.selected==undefined) return false;
						var r=confirm("?liminar?");
						if (r==true){
						  me.eliminar();
						}
					break;
					case 'refresh':
						
						var gridBusqueda=$(me.tabId+" .grid_busqueda");
						gridBusqueda.wijgrid('ensureControl', true);
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
						alert("Imprimir en construcci√≥n");
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
			
		var dataSource = new wijdatasource({
			proxy: new wijhttpproxy({
				url: kore.url_base+this.configuracion.modulo.nombre+'/'+this.controlador.nombre+'/buscar',
				dataType: "json"
			}),
			dynamic:true,
			reader:new wijarrayreader(campos)
		});
				
		dataSource.reader.read= function (datasource) {						
			var totalRows=datasource.data.totalRows;						
			datasource.data = datasource.data.rows;
			datasource.data.totalRows = totalRows;
			dataReader.read(datasource);
		};				
		this.dataSource=dataSource;
		var gridBusqueda=$(this.tabId+" .grid_busqueda");

		var me=this;		 
		gridBusqueda.wijgrid({
			dynamic: true,
			allowColSizing:true,			
			allowKeyboardNavigation:true,
			allowPaging: true,
			pageSize:pageSize,
			selectionMode:'singleRow',
			data:dataSource,
			columns: [ 
			    // { dataKey: "id", hidden:true, visible:true, headerText: "ID" }						
				
{ dataKey: "idarticulo", visible:true, headerText: "Idarticulo" },
{ dataKey: "nombre", visible:true, headerText: "Nombre" },
{ dataKey: "activo", visible:true, headerText: "Activo" },
{ dataKey: "presentacion", visible:true, headerText: "Presentacion" },
{ dataKey: "codigo", visible:true, headerText: "Codigo" },
{ dataKey: "idarticuloclase", visible:true, headerText: "Idarticuloclase" },
{ dataKey: "inventariable", visible:true, headerText: "Inventariable" },
{ dataKey: "impuesto1", visible:true, headerText: "Impuesto1" },
{ dataKey: "impuesto2", visible:true, headerText: "Impuesto2" },
{ dataKey: "impuesto3", visible:true, headerText: "Impuesto3" },
{ dataKey: "costo", visible:true, headerText: "Costo" },
{ dataKey: "precio", visible:true, headerText: "Precio" },
{ dataKey: "puntos", visible:true, headerText: "Puntos" },
{ dataKey: "usado", visible:true, headerText: "Usado" },
{ dataKey: "periodo", visible:true, headerText: "Periodo" },
{ dataKey: "kilometraje", visible:true, headerText: "Kilometraje" },
{ dataKey: "idsublinea", visible:true, headerText: "Idsublinea" },
{ dataKey: "idcategoria", visible:true, headerText: "Idcategoria" },
{ dataKey: "idlinea", visible:true, headerText: "Idlinea" },
{ dataKey: "idgrupo", visible:true, headerText: "Idgrupo" },
{ dataKey: "idtemporada", visible:true, headerText: "Idtemporada" },
{ dataKey: "iddepartamento", visible:true, headerText: "Iddepartamento" },
{ dataKey: "idtipo", visible:true, headerText: "Idtipo" },
{ dataKey: "info", visible:true, headerText: "Info" },
{ dataKey: "fechaalta", visible:true, headerText: "Fechaalta" },
{ dataKey: "nombrebot", visible:true, headerText: "Nombrebot" },
{ dataKey: "imagenbot", visible:true, headerText: "Imagenbot" },
{ dataKey: "fechainv", visible:true, headerText: "Fechainv" },
{ dataKey: "puntoscompra", visible:true, headerText: "Puntoscompra" },
{ dataKey: "ultimocosto", visible:true, headerText: "Ultimocosto" },
{ dataKey: "utilidadminima", visible:true, headerText: "Utilidadminima" },
{ dataKey: "comision", visible:true, headerText: "Comision" },
{ dataKey: "comisionmax", visible:true, headerText: "Comisionmax" },
{ dataKey: "costomax", visible:true, headerText: "Costomax" }
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
				TabManager.add(kore.url_base+me.configuracion.modulo.nombre+'/'+me.controlador.nombre+'/editar','Editar '+me.catalogo.nombre,pedidoId);				
			});			
		} });
	};
};