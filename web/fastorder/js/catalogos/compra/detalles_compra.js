
var DetallesCompra=function (tabId){
	
		
	this.init=function(config){		
		
		var tabId=config.tabId, 
			padre = config.fk_compra, 
			fk_compra=config.fk_compra, 
			articulos= config.articulos;
		
		this.tmp_id=0;
		this.tabId=tabId;
		this.padre=padre;
		// this.configurarFormulario(tabId);	
		this.configurarGrid(tabId, articulos);		
		 this.configurarToolbar(tabId);		
		
		return true;
		
	};
	this.calcularSugerencia=function(){
		var me=this;
		var reorden=parseInt( $(me.tabId+' .frmEditInlinePedido .txtPuntoReorden').val() );
		var existencia=parseInt( $(me.tabId+' .frmEditInlinePedido .txtExistencia').val() );
		var maximo=parseInt( $(me.tabId+' .frmEditInlinePedido .txtMaximo').val() );
		var sugerido=0;
		var pendiente=0;
		if (existencia<=reorden){
			sugerido = maximo-existencia;
			var pedido=$(me.tabId+' .frmEditInlinePedido .txtPedido').val();
			pendiente= sugerido - pedido;
		}
		$(me.tabId+' .frmEditInlinePedido .txtSugerido').val(sugerido);
		$(me.tabId+' .frmEditInlinePedido .txtPendiente').val(pendiente);
	};
	this.configurarComboArticulo=function(target){
		
		var tabId=this.tabId;
		 
		var fields=[			
			{name: 'presentacion'},
			{name: 'idarticulopre'},
			{name: 'codigo'},
			{name: 'existencia'},
			{name: 'minimo'},
			{name: 'maximo'},
			{name: 'puntoreorden'},
			{name: 'label',mapping: 'nombre'}, 
			{name: 'value',mapping: 'id'}, 
			{name: 'selected',defaultValue: false}];
		var me = this;
		var myReader = new wijarrayreader(fields);
		
		var proxy = new wijhttpproxy({
			url: kore.mod_url_base+'compra/getArticulos',
			dataType:"json"			
		});
		
		var datasource = new wijdatasource({
			reader:  new wijarrayreader(fields),
			proxy: proxy,	
			loaded: function (data) {
				// var val=$('#tabs '+tabId+' .txtFkAlmacen').val();
				// $.each(data.items, function(index, datos) {					
					// if (parseInt(val)==parseInt(datos.id) ){						
						// $('#tabs '+tabId+' .cmbAlmacen').wijcombobox({selectedIndex:index});
					// }
				// });				
			},
			loading: function (dataSource, userData) {                            				
				 
				 dataSource.proxy.options.data=dataSource.proxy.options.data || {};
				 dataSource.proxy.options.data.idalmacen = $('#tabs '+me.tabId+' .txtFkAlmacen').val();		
            }
		});
		
		// datasource.proxy.options.data={
			// id		:$(this.tabId+' .frmPedidoi .txtId').val(),
			// IdTmp	:$(this.tabId+' .frmPedidoi .txtIdTmp').val()
		// };
		
		// datasource.proxy.options.data={
			// id		:5,
			// IdTmp	:6
		// };
		
		datasource.reader.read= function (datasource) {
			var totalRows=datasource.data.totalRows;
			datasource.data = datasource.data.rows;
			datasource.data.totalRows = totalRows;
			myReader.read(datasource);
		};
		
		datasource.load();
		var me=this;
		var combo=$(target).wijcombobox({
			data: datasource,
			showTrigger: true,
			autoFilter: false,
			minLength: 1,
			animationOptions: {
				animated: "Drop",
				duration: 1000
			},
			forceSelectionText: false,
			search: function (e, obj) {
				//obj.datasrc.proxy.options.data.name_startsWith = obj.term.value;
			},
			select: function (e, item) 
			{		
				 
				var rowdom=$(me.tabId+' .grid_articulos tbody tr:eq('+me.selected.sectionRowIndex +')');				
				me.articulo=item;
				rowdom.find('td:eq(0) div').html(item.codigo);
				rowdom.find('td:eq(2) div').html(item.presentacion);
				rowdom.find('td:eq(3) div').html(item.maximo);
				rowdom.find('td:eq(4) div').html(item.minimo);
				rowdom.find('td:eq(5) div').html(item.puntoreorden);
				rowdom.find('td:eq(6) div').html(item.existencia);
				
				
				var reorden=parseInt( item.puntoreorden );
				var existencia=parseInt( item.existencia );
				var maximo=parseInt( item.maximo );
				var sugerido=0;
				var pendiente=0;
				if (existencia<=reorden){
					sugerido = maximo-existencia;					
				}
			
				rowdom.find('td:eq(7) div').html(sugerido);
				rowdom.find('td:eq(8) div').html(sugerido);
				rowdom.find('td:eq(9) div').html(0);
				me.articulo.pedido=sugerido;
				me.articulo.sugerido=sugerido;
				
				return true;
				
			}
		});
		combo.focus().select();
	}
	this.guardar=function(){
		
		//Obtener todos los datos del formulario inline, obtener el id_temp del pedido
		//Enviar datos al servidor
		//En la respuesta, refrescar el grid
			
		var datos={
			id			:$(this.tabId+' .frmEditInlinePedido .txtId').val(),
			id_tmp		:$(this.tabId+' .frmEditInlinePedido .txtIdTmp').val(),
			pedido		:$(this.tabId+' .frmEditInlinePedido .txtPedido').val(),
			IdTmp		: $(this.tabId+' .frmEditInlinePedido .txtIdTmp').val(),
			idarticulopre	:$(this.tabId+' .frmEditInlinePedido .txtIdArticuloPre').val(),
			//um			:$(this.tabId+' .frmEditInlinePedido .txtUm').val(),
			maximo		:$(this.tabId+' .frmEditInlinePedido .txtMaximo').val(),
			minimo		: $(this.tabId+' .frmEditInlinePedido .txtMinimo').val(),
			puntoreorden		: $(this.tabId+' .frmEditInlinePedido .txtPuntoReorden').val(),
			existencia		: $(this.tabId+' .frmEditInlinePedido .txtExistencia').val(),
			minimo		: $(this.tabId+' .frmEditInlinePedido .txtMinimo').val(),			
			idarticulopre	:$(this.tabId+' .frmEditInlinePedido .txtIdArticuloPre').val(),
			fk_articulo	:$(this.tabId+' .frmEditInlinePedido .txtFkArticulo').val(),
			fk_pedido	:$(this.tabId+' .frmPedidoi .txtId').val(),
			fk_tmp		:$(this.tabId+' .frmPedidoi .txtIdTmp').val()
		}
		
		var iActual=$(this.tabId+' .frmEditInlinePedido .txtDataItemIndex').val();
		
		var iActual=parseInt(iActual);
		
		var me=this;
		$.ajax({
			type: "POST",
			url: '/'+kore.modulo+'/pedidoi/guardarArticulo',
			data: {datos:datos}
		}).done(function( response ) {
									
			var resp = eval('(' + response + ')');
			var msg= (resp.msg)? resp.msg : '';
			var title;
			if ( resp.success == true	){				
				icon= '/web/'+kore.modulo+'/images/yes.png';
				title= 'Success';
				
				
				me.padre.editado=true;
				var siguiente=parseInt(iActual)+1;				
				if (siguiente>-1){					
					var data = $(me.tabId+" .grid_articulos").wijgrid("data");										
					var siguiente=parseInt(iActual)+1;
					if (data[siguiente] != undefined){
						me.selected=data[siguiente];
						me.selected.dataItemIndex=siguiente;						
						me.selected.editandoId=me.selected.id_tmp;
						me.editar();
					}else{
						me.selected=data[0];
						me.selected.dataItemIndex=0;						
						me.selected.editandoId=me.selected.id_tmp;
						me.editar();
					}
				}else{
					$(me.tabId+' .frmEditInlinePedido').css('visibility','hidden');								
				}
				$(me.tabId+' .grid_articulos').wijgrid('ensureControl', true);
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
	},
	this.configurarGrid=function(tabId, articulos){
		
		var fields=[			
			{ name: "codigo"},
			{ name: "nombre"},
			{ name: "cantidad"},
			{ name: "costo"},
			{ name: "impuesto1"},
			{ name: "subtotal"},
			{ name: "total"},
			{ name: "idarticulo"},
			{ name: "eliminado",default:false},
			{ name: "id"  }
		];
		
		this.fields=fields;		
		var gridPedidos=$(tabId+" .grid_articulos");				
		
		var me=this;
		
		gridPedidos.bind('keydown', function(e) {
			var code = e.keyCode || e.which;
			code=parseInt( code );
			// alert(e.keyCode);
			if(e.keyCode==46){
				me.eliminar();
			}
		});
		
		gridPedidos.wijgrid({			
			allowColSizing:true,
			allowPaging: true,
			pageSize:100,
			allowEditing:true,
			allowColMoving: false,			
			allowKeyboardNavigation:true,
			selectionMode:'singleRow',
			data:articulos,
			columns: [							
				{dataKey: "presentacionNombre", headerText: "Presentacion",width:"300px"},
				{dataKey: "codigo", headerText: "Codigo",width:"300px"},				
				{dataKey: "nombre", headerText: "Descripci&oacute;n",width:"300px", editable:false },				
				{dataKey: "cantidad", headerText: "Cantidad", dataType: "number", dataFormatString: "n2"},
				{dataKey: "costo", headerText: "Costo",editable:true, dataType: "number", dataFormatString: "n2"},
				{dataKey: "subtotal", headerText: "Subtotal",editable:false},
				{dataKey: "impuesto1", headerText: "IVA",editable:false},
				{dataKey: "total", headerText: "Total",editable:false},
				{dataKey: "idcompradetalle", headerText: "Total",visible:false},
				{dataKey: "idcompra", headerText: "Total",visible:false},
				{dataKey: "idarticulo", headerText: "Total",visible:false},
				{dataKey: "idarticulopre", headerText: "Total",visible:false},
				{dataKey: "idordencompradet", headerText: "Total",visible:false},
				{dataKey: "precio", headerText: "Total",visible:false},
				{dataKey: "descuento", headerText: "Total",visible:false},
				{dataKey: "impuesto2", headerText: "impuesto2",visible:false},
				{dataKey: "impuesto3", headerText: "Total",visible:false},
				{dataKey: "descripcion", headerText: "Total",visible:false},
				{dataKey: "impreso", headerText: "Impreso",visible:false},
				{dataKey: "enviado", headerText: "Enviado",visible:false},
				{dataKey: "activo", headerText: "Activo",visible:false},
				{dataKey: "activo", headerText: "Activo",visible:false},
				{dataKey: "idarticuloclase", headerText: "idarticuloclase",visible:false},
				{dataKey: "inventariable", headerText: "inventariable",visible:false},
				{dataKey: "puntos", headerText: "puntos",visible:false},
			]			
		});
		var me=this;
		
		gridPedidos.wijgrid({ 
			beforeCellEdit: function(e, args) {
				var row = args.cell.row() ;								
				var index = args.cell.rowIndex();				
				var sel=gridPedidos.wijgrid('selection');				
				sel.addRows(index);				
				
				if (args.cell.column().editable === false){
					return false;
				}				

				switch (args.cell.column().dataKey) { 		
					case "presentacionNombre": 
						var combo=
						$("<input />")
							.val(args.cell.value()) 
							.appendTo(args.cell.container().empty());   
						args.handled = true;   
						
						var domCel = args.cell.tableCell();
						combo.css('width',	$(domCel).width()-10 );
						combo.css('height',	$(domCel).height()-10 );
						
						me.configurarComboPresentacion(combo, row.data.cantidad);
					break;
					case "codigo": 
						var combo=
						$("<input />")
							.val(args.cell.value()) 
							.appendTo(args.cell.container().empty());   
						args.handled = true;   
						
						var domCel = args.cell.tableCell();
						combo.css('width',	$(domCel).width()-10 );
						combo.css('height',	$(domCel).height()-10 );
						
						me.configurarComboCodigo(combo, row.data.cantidad);
					break;
					case "nombre": 
						var combo=
						$("<input />")
							.val(args.cell.value()) 
							.appendTo(args.cell.container().empty());   
						args.handled = true;   
						
						var domCel = args.cell.tableCell();
						combo.css('width',	$(domCel).width()-10 );
						combo.css('height',	$(domCel).height()-10 );
						
						me.configurarComboArticulo(combo);
					break;
					default:
						var input=$("<input />")
							.val(args.cell.value())
							.appendTo(args.cell.container().empty()).focus().select();
						var domCel = args.cell.tableCell();
						input.css('width',	$(domCel).width()  -10 );
						input.css('height',	$(domCel).height() -10 );
						args.handled = true;
						return true;
					break;						
				} 
			}
		});
		gridPedidos.wijgrid({beforeCellUpdate:function(e, args) {
				switch (args.cell.column().dataKey) {
					case "nombre":
						args.value = args.cell.container().find("input").val();
						
						if (me.articulo!=undefined){
							var row=args.cell.row();
							
							row.data.idarticulo=me.articulo.idarticulo;
							row.data.costo=me.articulo.costo;
							row.data.impuesto1=me.articulo.impuesto1;
							// row.data.total=me.articulo.total;
							
							// row.data.idarticulo=me.articulo.idarticulo;							
							// row.data.fk_articulo=me.articulo.value;
							// row.data.codigo=me.articulo.codigo;
							// row.data.maximo=me.articulo.maximo;
							// row.data.minimo=me.articulo.minimo;
							// row.data.puntoreorden=me.articulo.puntoreorden;
							// row.data.existencia=me.articulo.existencia;
							// row.data.sugerido=me.articulo.sugerido;
							// row.data.pedido=me.articulo.pedido;
							// row.data.pendiente=me.articulo.pendiente;
							// row.data.nombreGpo=me.articulo.grupo;		
							// gridPedidos.wijgrid('ensureControl');
						}
						me.padre.editado=true;
						break;
					case "presentacionNombre":
						args.value = args.cell.container().find("input").val();
						if (me.articulo!=undefined){
							var row=args.cell.row();
							// console.log("me.articulo"); console.log(me.articulo);
							row.data.idarticulo = me.articulo.idarticulo;
							row.data.costo=me.articulo.costo;
							row.data.impuesto1=me.articulo.impuesto1;
							row.data.subtotal=me.articulo.subtotal;
							row.data.total=me.articulo.total;
							row.data.nombre=me.articulo.nombre;
							row.data.codigo=me.articulo.codigo;
							row.data.idarticulopre = me.articulo.value;
							// row.data.presentacion=me.articulo.presentacion;
							
							// row.data.fk_articulo=me.articulo.value;
							// row.data.maximo=me.articulo.maximo;
							// row.data.minimo=me.articulo.minimo;
							// row.data.puntoreorden=me.articulo.puntoreorden;
							// row.data.existencia=me.articulo.existencia;
							// row.data.sugerido=me.articulo.sugerido;
							// row.data.pedido=me.articulo.pedido;
							// row.data.pendiente=me.articulo.pendiente;							
							// row.data.nombreGpo=me.articulo.grupo;
							gridPedidos.wijgrid('ensureControl',true);
							
						}
						me.padre.editado=true;
						break;		
					case "cantidad":
						args.value = args.cell.container().find("input").val();
						
						var cantidad =  args.value;
						var row=args.cell.row();
						row.data.subtotal= cantidad * row.data.costo;
						row.data.cantidad = cantidad;
						// alert(cantidad);
						row.data.total= ( (row.data.impuesto1 / 100) * row.data.subtotal ) + row.data.subtotal;
						gridPedidos.wijgrid('ensureControl', true);
						// row.data.nombre=me.articulo.nombre;
						// row.data.codigo=me.articulo.codigo;
					break;
					case "codigo":
						args.value = args.cell.container().find("input").val();
						if (me.articulo!=undefined){
							var row=args.cell.row();
							// console.log("me.articulo"); console.log(me.articulo);
							
							row.data.idarticulo = me.articulo.value;
							row.data.costo=me.articulo.costo;
							row.data.impuesto1=me.articulo.impuesto1;
							row.data.subtotal=me.articulo.subtotal;
							row.data.total=me.articulo.total;
							row.data.nombre=me.articulo.nombre;
							row.data.codigo=me.articulo.codigo;
							// row.data.presentacion=me.articulo.presentacion;
							
							// row.data.fk_articulo=me.articulo.value;
							// row.data.maximo=me.articulo.maximo;
							// row.data.minimo=me.articulo.minimo;
							// row.data.puntoreorden=me.articulo.puntoreorden;
							// row.data.existencia=me.articulo.existencia;
							// row.data.sugerido=me.articulo.sugerido;
							// row.data.pedido=me.articulo.pedido;
							// row.data.pendiente=me.articulo.pendiente;							
							// row.data.nombreGpo=me.articulo.grupo;
							gridPedidos.wijgrid('ensureControl',true);
							
						}
						me.padre.editado=true;
						break;										
				}
				me.articulo=undefined;		
			}			
		});
		
		gridPedidos.wijgrid({cancelEdit:function(){				
				$(me.tabId+' .grid_articulos').wijgrid('ensureControl',true);
			}
		});
		gridPedidos.wijgrid({ selectionChanged: function (e, args) { 								
			var item=args.addedCells.item(0);						
			var row=item.row();						
			var data=row.data;			
			me.selected=data;			
			me.selected.dataItemIndex=row.dataItemIndex;			
			me.selected.sectionRowIndex=row.sectionRowIndex;
			
		} });
		
		//corregir bug al expandir/colapsar
		gridPedidos.click(function(){
			
                if($(this).hasClass("ui-icon-triangle-1-e"))
                {
				   gridPedidos.wijgrid('endEdit');
					var selectionObj = gridPedidos.wijgrid("selection");
				   selectionObj.clear();
                   gridPedidos.wijgrid('doRefresh');
				   
                }
				
                else if($(this).hasClass("ui-icon-triangle-1-se"))
                {
					gridPedidos.wijgrid('endEdit');
					var selectionObj = gridPedidos.wijgrid("selection");
					selectionObj.clear();
                   gridPedidos.wijgrid('doRefresh');                   
                }
            });	
		this.numCols=$(tabId+' .grid_articulos thead th').length;		
	};
	
	this.configurarFormulario=function(tabId){
		 // $(tabId+" .txtCantidad").wijinputnumber( 
        // {
            // type: 'numeric',
            // minValue: -100,
            // maxValue: 1000,
            // decimalPlaces: 4,
            // showSpinner: true
        // });		
		// this.configurarComboArticulos(tabId);
		// this.configurarComboUM(tabId);
	};
	this.eliminar=function(){
		
		var cellInfo= $(this.tabId+" .grid_articulos").wijgrid("currentCell");
		var row = cellInfo.row();
		var container=cellInfo.container();
		$(this.tabId+" .grid_articulos 	tbody tr:eq("+cellInfo.rowIndex()+")").addClass('eliminado');		
		row.data.eliminado=true;
		
	}
	this.navegarEnter=function(){		
		this.seleccionarSiguiente(false, true, true);		
	}
	this.seleccionarSiguiente = function(alreves, saltar, mantenerColumna){
		//dos direcciones, hacia atras y hacia adelante.
		//de la ultima caja editable de la fila, pasa a la siguiente fila.
		//si se esta navegando alreves, del primer registro editable, pasa al registro anterior.
		//si no hay otra fila, agrega un nuevo elemento.
		//si está ubicado en el ultimo elemento de la pagina, pasar a la pagina siguiente .
		//si está nvegando alrevés, y está ubicado en el primer elemento de la pagina, pasar a la pagina anterior.
		
		//Obtengo la celda seleccionada
		var tabId, cellInfo, cellIndex, rowIndex,  row, nextCell, nextRow; 
		tabId=this.tabId;
		cellInfo= $(tabId+" .grid_articulos").wijgrid("currentCell");
		
		var direccion=	(alreves)? -1 : 1;
		cellIndex=cellInfo.cellIndex();
		rowIndex = cellInfo.rowIndex();
		nextRow=rowIndex;
		nextCell = cellIndex + direccion;
		
		
		if (saltar){
			nextCell=(alreves)? -1 : this.numCols + 1			
		}
		
		if ( nextCell<0 ){
			//ir al registro anterior, cambiar de pagina
			row=cellInfo.row();
			var data = $(tabId+" .grid_articulos").wijgrid('data');
			var pageSize = $(tabId+" .grid_articulos").wijgrid('option','pageSize');
			var pageIndex = $(tabId+" .grid_articulos").wijgrid('option','pageIndex');
			
			dataItemIndex = row.dataItemIndex;
			var fi= (pageSize * pageIndex);
						
			if ( dataItemIndex == fi){
				if (pageIndex==0){
					return false;
				}
				$(tabId+" .grid_articulos").wijgrid('option','pageIndex',pageIndex-1);
				nextCell=0;
				nextRow=pageSize*2;
			}
			
			nextCell=this.numCols-1;
			nextRow	= nextRow - 1;
			
			var cell;

			if (nextCell>-1 && nextRow>-1){
				while (true)
				 {
					cell = $(tabId+" .grid_articulos").wijgrid('currentCell',nextCell, nextRow);
					if (cell.column == undefined ){
						nextRow--;
					}else{					
						break;
					}
				}			
			}else{
				return false;
			}
		} else if ( nextCell>=this.numCols || saltar){
			nextCell=0;
			if (mantenerColumna){
				// alert(' mantenerColumna: '+ cellIndex);
				nextCell=cellIndex;
			}
			//ir al registro siguiente, cambiar de pagina o agregar nuevo registro,
			row=cellInfo.row();			
			var data = $(tabId+" .grid_articulos").wijgrid('data');			 
			var pageSize = $(tabId+" .grid_articulos").wijgrid('option','pageSize');
			var pageIndex = $(tabId+" .grid_articulos").wijgrid('option','pageIndex');			 
			//voy a ver si es el ultimo registro de la pagina
			dataItemIndex = row.dataItemIndex;
			var ip= (pageSize * (pageIndex+1) )-1;
			// var index = collection.indexOf(0, 0);
			// alert(index);
			//alert("pageSize: "+pageSize+" pageIndex:" + pageIndex + " dataItemIndex: " + dataItemIndex + ' ip:' + ip);			
			if ( (dataItemIndex+1) == data.length ){
				//esta en el ultimo registro de la ultima pagina
				//agregar nuevo, si esta al final de la pagina, despues de agregar registro, mover a la siguiente pagina
				var rec={};
				$.each( this.fields, function(indexInArray, valueOfElement){
					var campo=valueOfElement.name;
					rec[campo]='';				
				} );
				data.push(rec);
				//
				$(tabId+" .grid_articulos").wijgrid("ensureControl", true);
				$(tabId+" .grid_articulos").wijgrid('option','pageIndex',pageIndex+1);
			}else if ( ip==dataItemIndex ){
				//esta al final de la pagina, cambiar de página
				nextCell=0;
				nextRow=-1;
				$(tabId+" .grid_articulos").wijgrid('option','pageIndex',pageIndex+1);				
			}
						
			nextRow	= nextRow + 1;			
			var cell;
			
			while (true)
			 {
				cell = $(tabId+" .grid_articulos").wijgrid('currentCell',nextCell, nextRow);
				if (cell.column == undefined ){
					nextRow++;
				}else{						
					break;
				}
			}
			
		}
		
		
		var nuevo = $(tabId+" .grid_articulos").wijgrid("currentCell",nextCell, nextRow);
		
		if ( nuevo.column().editable===false ){
			this.seleccionarSiguiente(alreves);
		}else{			
			$(tabId+" .grid_articulos").wijgrid("beginEdit");					
		}
		
		
		
	};
	this.configurarComboCodigo=function(target, cantidad){		
		// alert(cantidad);
		
		var tabId=this.tabId;
		var me=this;
		var fields=[			
			{name: 'presentacion'},
			{name: 'idarticulopre'},
			{name: 'nombre'},
			{name: 'existencia'},
			{name: 'minimo'},
			{name: 'maximo'},
			{name: 'grupo'},
			{name: 'puntoreorden'},
			{name: 'impuesto1'},
			{name: 'costo'},
		{
			name: 'label',
			mapping: 'codigo'
		}, {
			name: 'value',
			mapping: 'idarticulo'
		}, {
			name: 'selected',
			defaultValue: false
		}];
		
		var myReader = new wijarrayreader(fields);
		
		var proxy = new wijhttpproxy({
			url: kore.mod_url_base+'compra/getCodigos',
			dataType:"json"			
		});
		
		var datasource = new wijdatasource({
			reader:  new wijarrayreader(fields),
			proxy: proxy,
			loaded: function (data) {	
							
			},
			loading: function (dataSource, userData) {                            				
				 
				 dataSource.proxy.options.data=dataSource.proxy.options.data || {};				 
				dataSource.proxy.options.data.codigo = (userData) ?  userData.value : '';
				 
				 // dataSource.proxy.options.data.idalmacen = $('#tabs '+me.tabId+' .txtFkAlmacen').val();		
            }
		});
		
		datasource.reader.read= function (datasource) {			
			var totalRows=datasource.data.totalRows;			
			datasource.data = datasource.data.rows;
			datasource.data.totalRows = totalRows;
			myReader.read(datasource);
		};			
		
		datasource.load();	
		
		var combo=target.wijcombobox({
			data: datasource,
			showTrigger: true,
			minLength: 1,
			forceSelectionText: false,
			autoFilter: true,			
			search: function (e, obj) {
				
			},
			select: function (e, item) 
			{			
				var rowdom=$(me.tabId+' .grid_articulos tbody tr:eq('+me.selected.sectionRowIndex +')');				
				me.articulo=item;
				
				
				item.subtotal=cantidad * item.costo;
				var iva= (item.impuesto1 / 100) * item.subtotal;
				item.total= iva + item.subtotal;
				
				rowdom.find('td:eq(2) div').html(item.nombre);
				// rowdom.find('td:eq(2) div').html(item.presentacion);
				rowdom.find('td:eq(4) div').html(item.costo);
				rowdom.find('td:eq(5) div').html(item.subtotal);
				rowdom.find('td:eq(6) div').html(item.impuesto1);
				rowdom.find('td:eq(7) div').html(item.total);
				return true;
			}
		});
		combo.focus().select();			
	};
	this.configurarComboPresentacion=function(target, cantidad){		
		// alert(cantidad);
		
		var tabId=this.tabId;
		var me=this;
		var fields=[			
			{name: 'presentacionId'},			
			{name: 'presentacionNombre'},
			{name: 'presentacion'},
			{name: 'idarticulopre'},
			{name: 'idarticulo'},
			{name: 'nombre'},
			{name: 'codigo'},
			{name: 'existencia'},
			{name: 'minimo'},
			{name: 'maximo'},
			{name: 'grupo'},
			{name: 'puntoreorden'},
			{name: 'impuesto1'},
			{name: 'costo'},
		{
			name: 'label',
			mapping: 'descripcion'
		}, {
			name: 'value',
			mapping: 'idarticulopre'
		}, {
			name: 'selected',
			defaultValue: false
		}];
		
		var myReader = new wijarrayreader(fields);
		
		var proxy = new wijhttpproxy({
			url: kore.mod_url_base+'compra/buscarPresentaciones',
			dataType:"json"			
		});
		
		var datasource = new wijdatasource({
			reader:  new wijarrayreader(fields),
			proxy: proxy,
			loaded: function (data) {	
							
			},
			loading: function (dataSource, userData) {                            				
				 
				 dataSource.proxy.options.data=dataSource.proxy.options.data || {};				 
				dataSource.proxy.options.data.descripcion = (userData) ?  userData.value : '';
				 
				 // dataSource.proxy.options.data.idalmacen = $('#tabs '+me.tabId+' .txtFkAlmacen').val();		
            }
		});
		
		datasource.reader.read= function (datasource) {			
			var totalRows=datasource.data.totalRows;			
			datasource.data = datasource.data.rows;
			datasource.data.totalRows = totalRows;
			myReader.read(datasource);
		};			
		
		datasource.load();	
		
		var combo=target.wijcombobox({
			data: datasource,
			showTrigger: true,
			minLength: 1,
			forceSelectionText: false,
			autoFilter: true,			
			search: function (e, obj) {
				
			},
			select: function (e, item) 
			{			
				var rowdom=$(me.tabId+' .grid_articulos tbody tr:eq('+me.selected.sectionRowIndex +')');				
				me.articulo=item;
				
				
				item.subtotal=cantidad * item.costo;
				var iva= (item.impuesto1 / 100) * item.subtotal;
				item.total= iva + item.subtotal;
				
				rowdom.find('td:eq(1) div').html(item.codigo);
				rowdom.find('td:eq(2) div').html(item.nombre);
				
				// rowdom.find('td:eq(2) div').html(item.presentacion);
				rowdom.find('td:eq(4) div').html(item.costo);
				rowdom.find('td:eq(5) div').html(item.subtotal);
				rowdom.find('td:eq(6) div').html(item.impuesto1);
				rowdom.find('td:eq(7) div').html(item.total);
				return true;
			}
		});
		combo.focus().select();			
	};
	
	this.nuevo=function(){	
		var rec={};
		$.each( this.fields, function(indexInArray, valueOfElement){
			var campo=valueOfElement.name;
			rec[campo]='';
		
		} );
		
		var nuevo=new Array(rec);
		
		var tabId=this.tabId;
		// console.log("this.padre"); console.log(this.padre);
		var data= $(tabId+" .grid_articulos").wijgrid('data');									
		this.tmp_id++;
		nuevo[0].tmp_id=this.tmp_id;
		var array3 = nuevo.concat(data); // Merges both arrays
		data.length=0;
		for(var i=0; i<array3.length; i++){
			data.push( array3[i] );
		}

		//data.slice([]);
		
		$(tabId+" .grid_articulos").wijgrid("ensureControl", true);
		$(tabId+" .grid_articulos").wijgrid('option','pageIndex',0);			 
		nuevo = $(tabId+" .grid_articulos").wijgrid("currentCell", 0, 0);
		$(tabId+" .grid_articulos").wijgrid("beginEdit");
		
	};
	
	
	
	this.configurarToolbar=function(tabId){
		var me=this;		
		$(this.tabId+ ' .btnAgregar').click(function(){					
			me.nuevo();
			
		});
	}
}