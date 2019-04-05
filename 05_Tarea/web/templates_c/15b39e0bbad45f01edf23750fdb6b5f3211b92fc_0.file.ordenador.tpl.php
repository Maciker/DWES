<?php
/* Smarty version 3.1.33, created on 2019-03-01 23:19:26
  from '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates/ordenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c79afee863cd4_60417449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15b39e0bbad45f01edf23750fdb6b5f3211b92fc' => 
    array (
      0 => '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates/ordenador.tpl',
      1 => 1551478756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c79afee863cd4_60417449 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: ordenador.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Listado de Productos con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagproductos">
<!-- Aqui se muestra la informacion de cada ordenador
 Segun la plantilla requerida en la tarea-->
<div id="contenedor">
  <div id="encabezado">
    <h1><?php echo $_smarty_tpl->tpl_vars['infopro']->value->getnombrecorto();?>
</h1><br>
    <h3>Codigo: <?php echo $_smarty_tpl->tpl_vars['infopc']->value->getcod();?>
</h3><br>
  </div>
  <h1>Caracteristicas:</h1><br>
  <h3>Procesador: <?php echo $_smarty_tpl->tpl_vars['infopc']->value->getprocesador();?>
</h3><br>
  <h3>RAM: <?php echo $_smarty_tpl->tpl_vars['infopc']->value->getram();?>
</h3><br>
  <h3>Tarjeta gráfica: <?php echo $_smarty_tpl->tpl_vars['infopc']->value->getgrafica();?>
</h3><br>
  <h3>Unidad optica: <?php echo $_smarty_tpl->tpl_vars['infopc']->value->getoptica();?>
</h3><br>
  <h3>Sistema operativo: <?php echo $_smarty_tpl->tpl_vars['infopc']->value->getso();?>
</h3><br>
  <h3>Otros: <?php echo $_smarty_tpl->tpl_vars['infopc']->value->getotros();?>
</h3><br>
  <h3>PVP: <?php echo $_smarty_tpl->tpl_vars['infopro']->value->getPVP();?>
</h3><br>
  <h1>Descripcion:</h1><br>
  <h3><?php echo $_smarty_tpl->tpl_vars['infopro']->value->getdesc();?>
</h3><br>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
    </form>
      <div id="volver">
          <!-- Boton que nos permite volver a la pagina anterior.-->
    <form action='productos.php' method='post'>
        <input type='submit' name='volver' value='Volver'/>
    </form>  
  </div>
</div>
</body>
</html><?php }
}
