<?php
/* Smarty version 3.1.33, created on 2019-03-07 22:08:35
  from '/var/www/html/dwes5/solucion/smarty/templates/listaproductos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c81885398e9d2_03233761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '259c8c29798390b0e26f09a9a21bd9089a24ee02' => 
    array (
      0 => '/var/www/html/dwes5/solucion/smarty/templates/listaproductos.tpl',
      1 => 1551974959,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c81885398e9d2_03233761 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
      <p><form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='post'>
      <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>
      <input type='submit' name='enviar' class='boton' value='Añadir'/>
            <?php if ($_smarty_tpl->tpl_vars['producto']->value->getfamilia() != "ORDENA") {?>
                <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>

      <?php } else { ?>
                <a href="ordenador.php?codigo=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
</a>
      <?php }?>
      : <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</form></p>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
