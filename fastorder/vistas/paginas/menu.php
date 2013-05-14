

<script type="text/javascript">
    $(document).ready(function () {
        $("#accordion").wijaccordion();
		// iniciarLinkTabs();
    });
</script>

<style>
	#accordion  .submenu a{
		display:inline-block;
		text-decoration:none;
		margin:15px;
		
	}
	
	#accordion div{
		text-align:center;
	}
	
	
</style>

<div id="menuPrincipal" style="position: absolute; width: 700px;margin-left: 20px;z-index: 6;background-color: white;display: block;right: 0px;top: 35px; display:none; ">
	<div id="accordion">		
		<?php 
			if ( $_SESSION['userInfo']['rol']==1 || $_SESSION['userInfo']['rol']==2  ){
		?>
		<h3>Documentos</h3>		 
		<div class="submenu">			
			<a tablink="true" href="/pedidoint/busqueda" titulo="Pedido Interno" class="link">
				<img src="http://png.findicons.com/files/icons/566/isimple_system/64/paste.png">		 
				<div>Pedido Interno</div>
			</a>				
			<a tablink="true" href="/ordencompra/busqueda" titulo="Orden de Compra" class="link">
				<img src="http://png.findicons.com/files/icons/566/isimple_system/64/shopping_cart.png">		 
				<div>Orden de Compra</div>
			</a>				
			<a tablink="true" href="/compra/busqueda" titulo="Compras" class="link">
				<img src="http://png.findicons.com/files/icons/566/isimple_system/64/shopping_cart_full.png">		 
				<div>Compras</div>
			</a>				
		</div>
		<h3>Catalogos</h3>		 
		<div class="submenu">			
			<a tablink="true" href="/conf_serie/busqueda" titulo="Series" class="link">
				<img src="http://png.findicons.com/files/icons/2580/android_icons/72/serial_number.png">		 
				<div>Series</div>
			</a>				
			<a tablink="true" href="/articulodetalle/busqueda" titulo="Recetas" class="link">
				<img src="http://png.findicons.com/files/icons/1226/agua_extras_vol_1/48/recipes_folder_badged.png">		 
				<div>Recetas</div>
			</a>				
			<a tablink="true" href="/articulos/busqueda" titulo="Articulos" class="link">
				<img src="http://png.findicons.com/files/icons/1673/diagram_part_2/64/diagram_v2_17.png">		 
				<div>Articulos</div>
			</a>			
			<a tablink="true" href="/articulopre/busqueda" titulo="Presentaciones" class="link">
				<img src="http://png.findicons.com/files/icons/2212/carpelinx/64/kwikdisk.png">		 
				<div>Presentaciones</div>
			</a>		
			<a tablink="true" href="/almacenes/busqueda" titulo="Almacenes" class="link">
				<img src="http://png.findicons.com/files/icons/2579/iphone_icons/40/warehouse.png">		 
				<div>Almacenes</div>
			</a>			
			<a tablink="true" href="/empresasuc/busqueda" titulo="Sucursales" class="link">
				<img src="http://png.findicons.com/files/icons/2018/business_icons_for/48/company.png">		 
				<div>Sucursales</div>
			</a>		
			<a tablink="true" href="/proveedor/busqueda" titulo="Proveedores" class="link">
				<img src="http://png.findicons.com/files/icons/2257/berlin/32/suppliers.png">		 
				<div>Proveedores</div>
			</a>
			
			<a tablink="true" href="/ordencompraestado/busqueda" titulo="Proveedores" class="link">
				<img src="http://png.findicons.com/files/icons/2152/snowish/64/boot.png">		 
				<div>Estados OC</div>
			</a>
			
			
			
		</div>
		
		<h3>Sistema</h3>
		<div class="submenu">
			<a tablink="true" href="/backend/usuarios/busqueda" titulo="Usuarios" class="link">
				<img src="http://png.findicons.com/files/icons/2332/super_mono/64/user_card.png">		 
				<div>Usuarios</div>
			</a>				
		</div>
		<?php 
			}
		?>
	</div>
</div>