  <!-- Plantilla que nos muestra el listado de productos
  he intentado buscar si el producto estaba en un array que he generado de pcs pero no ha habido manera de conseguirlo.
  Lo he peusto de manera manual para poder hacer el ejemplo
  En el if deberia ir esa comparacion, de si producto es pc, lo resalto como hiperlink
  Tambien me ha faltado conseguir para con el hiperlink la informacion del codigo. He estado buscando la manera pero tampoco lo he conseguido.-->
  {foreach from=$productos item=producto}
        <p><form id='{$producto->getcodigo()}' action='productos.php' method='post'>
        <input type='hidden' name='cod' value='{$producto->getcodigo()}'/>
        <input type='submit' name='enviar' value='Añadir'/>
        {if $producto->getcodigo()=='ACERAX3950' || $producto->getcodigo()=='PBELLI810323'}
            <a href="ordenadores.php?cod=$producto->getcodigo()">{$producto->getnombrecorto()}: {$producto->getPVP()} euros.</a></form>
        {else}
            {$producto->getnombrecorto()}: {$producto->getPVP()} euros.</form></p>
        {/if}
    {/foreach}