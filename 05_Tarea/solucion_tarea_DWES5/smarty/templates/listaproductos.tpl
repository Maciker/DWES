    {foreach from=$productos item=producto}
      <p><form id='{$producto->getcodigo()}' action='productos.php' method='post'>
      <input type='hidden' name='cod' value='{$producto->getcodigo()}'/>
      <input type='submit' name='enviar' class='boton' value='Añadir'/>
      {* Comprobamos por nombres de familia que tengan que ver con lo que indica la tarea *}
      {if $producto->getfamilia()!="ORDENA"}
        {* Si no son ordenadores mostramos el nombre de forma normal*}
        {$producto->getnombrecorto()}
      {else}
        {* Si son ordenadores creamos un enlace a ordenador.php pasando el codigo por GET *}
        <a href="ordenador.php?codigo={$producto->getcodigo()}">{$producto->getnombrecorto()}</a>
      {/if}
      : {$producto->getPVP()} euros.</form></p>
    {/foreach}
