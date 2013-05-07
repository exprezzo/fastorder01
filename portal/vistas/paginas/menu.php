

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
		<h3>Catalogos</h3>		 
		<div class="submenu">			
			<a tablink="true" href="/grupos/busqueda" titulo="Grupos" class="link">
				<img src="http://png.findicons.com/files/icons/2354/dusseldorf/32/category.png">		 
				<div>Configuración de series.</div>
			</a>				
			<a tablink="true" href="/grupos/busqueda" titulo="Grupos" class="link">
				<img src="http://png.findicons.com/files/icons/2354/dusseldorf/32/category.png">		 
				<div>Receta de insumo</div>
			</a>				
			<a tablink="true" href="/grupos/busqueda" titulo="Grupos" class="link">
				<img src="http://png.findicons.com/files/icons/2354/dusseldorf/32/category.png">		 
				<div>Pedido Interno</div>
			</a>				
			<a tablink="true" href="/tiendas/busqueda" titulo="Tiendas" class="link">
				<img src="http://png.findicons.com/files/icons/2379/shopping/64/roadside_shop.png">		 
				<div>Orden de Compra</div>
			</a>				
			<a tablink="true" href="/tiendas/busqueda" titulo="Tiendas" class="link">
				<img src="http://png.findicons.com/files/icons/2379/shopping/64/roadside_shop.png">		 
				<div>Compra</div>
			</a>				
			<a tablink="true" href="/articulos/busqueda" titulo="Articulos" class="link">
				<img src="http://png.findicons.com/files/icons/1673/diagram_part_2/64/diagram_v2_28.png">		 
				<div>Articulos</div>
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