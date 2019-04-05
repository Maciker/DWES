<?php
/* Smarty version 3.1.33, created on 2019-03-01 23:19:21
  from '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates/listaproductos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c79afe9ec0750_73982220',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '282ab90c96a0aa9c29e20de753d2bef9a4e7c133' => 
    array (
      0 => '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates/listaproductos.tpl',
      1 => 1551478756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c79afe9ec0750_73982220 (Smarty_Internal_Template $_smarty_tpl) {
?>  <!-- Plantilla que nos muestra el listado de productos
  he intentado buscar si el producto estaba en un array que he generado de pcs pero no ha habido manera de conseguirlo.
  Lo he peusto de manera manual para poder hacer el ejemplo
  En el if deberia ir esa comparacion, de si producto es pc, lo resalto como hiperlink
  Tambien me ha faltado conseguir para con el hiperlink la informacion del codigo. He estado buscando la manera pero tampoco lo he conseguido.-->
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
        <p><form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='post'>
        <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>
        <input type='submit' name='enviar' value='Añadir'/>
        <?php if ($_smarty_tpl->tpl_vars['producto']->value->getcodigo() == 'ACERAX3950' || $_smarty_tpl->tpl_vars['producto']->value->getcodigo() == 'PBELLI810323') {?>
            <a href="ordenadores.php?cod=$producto->getcodigo()"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</a></form>
        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</form></p>
        <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
