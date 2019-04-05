<?php
/* Smarty version 3.1.33, created on 2019-02-27 20:02:23
  from '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates/cesta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c76debf317767_17855089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c0b49d2ec28ad5f54867f0bd41e35a25826697f' => 
    array (
      0 => '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates/cesta.tpl',
      1 => 1312200026,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c76debf317767_17855089 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: cesta.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Cesta de la Compra con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagcesta">

<div id="contenedor">
  <div id="encabezado">
    <h1>Cesta de la compra</h1>
  </div>
  <div id="productos">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productoscesta']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
        <p>
            <span class='codigo'><?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
</span>
            <span class='nombre'><?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombre();?>
</span>
            <span class='precio'><?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
</span>
        </p>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <hr />
    <p><span class='pagar'>Precio total: <?php echo $_smarty_tpl->tpl_vars['coste']->value;?>
 €</span></p>
    <form action='pagar.php' method='post'>
        <p><span class='pagar'>
            <input type='submit' name='pagar' value='Pagar'/>
        </span></p>
    </form>
  </div>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
    </form>        
  </div>
</div>
</body>
</html>
<?php }
}
