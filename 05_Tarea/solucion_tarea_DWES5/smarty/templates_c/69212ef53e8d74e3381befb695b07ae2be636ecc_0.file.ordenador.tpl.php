<?php
/* Smarty version 3.1.33, created on 2019-03-07 22:08:38
  from '/var/www/html/dwes5/solucion/smarty/templates/ordenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c818856aa7e73_78162564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69212ef53e8d74e3381befb695b07ae2be636ecc' => 
    array (
      0 => '/var/www/html/dwes5/solucion/smarty/templates/ordenador.tpl',
      1 => 1551980825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c818856aa7e73_78162564 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tarea 5 : Programación orientada a objetos en PHP -->
<!-- Tienda Web: ordenador.php -->
<!-- Nueva plantilla para presentar los datos de los ordenadores -->
<html>
	<head>
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	  <title>Ordenador <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</title>
	  <link href="tienda.css" rel="stylesheet" type="text/css">
	</head>

	<body class="pagproductos">

		<div id="contenedor" style="background-color: #df8;">
		  <div id="encabezado">
		    <h1><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</h1>
				<p><b>C&oacute;digo: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</b></p>
		  </div>
		  <div class="ordenador">
		  		<p><?php echo $_smarty_tpl->tpl_vars['nombre_alumn']->value;?>
</p>
				<h2>Caracter&iacute;sticas:</h2>
				<p><b>Procesador:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador();?>
</p>
				<p><b>RAM:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getram();?>
 GB</p>
				<p><b>Tarjeta gr&aacute;fica:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica();?>
</p>
				<p><b>Unidad &oacute;ptica:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica();?>
</p>
				<p><b>Sistema Operativo:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getso();?>
</p>		
				<p><b>Otros:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros();?>
</p>
				<p><b>PVP:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getpvp();?>
</p>
				<h2>Descripci&oacute;n:</h2>
				<p><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</p>
			</div>
  
		  <div id="pie" style="height: 25px">
				<form action="productos.php" method="post">
					<input type='submit' name='' value='Volver' class='izq boton' />
					<input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
' />
					<input type='submit' name='enviar' value='Comprar' class='dch boton' />
				</form>
		  </div>
		</div>
	</body>
</html><?php }
}
