<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
    <h1>{$infopro->getnombrecorto()}</h1><br>
    <h3>Codigo: {$infopc->getcod()}</h3><br>
  </div>
  <h1>Caracteristicas:</h1><br>
  <h3>Procesador: {$infopc->getprocesador()}</h3><br>
  <h3>RAM: {$infopc->getram()}</h3><br>
  <h3>Tarjeta gráfica: {$infopc->getgrafica()}</h3><br>
  <h3>Unidad optica: {$infopc->getoptica()}</h3><br>
  <h3>Sistema operativo: {$infopc->getso()}</h3><br>
  <h3>Otros: {$infopc->getotros()}</h3><br>
  <h3>PVP: {$infopro->getPVP()}</h3><br>
  <h1>Descripcion:</h1><br>
  <h3>{$infopro->getdesc()}</h3><br>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
    </form>
      <div id="volver">
          <!-- Boton que nos permite volver a la pagina anterior.-->
    <form action='productos.php' method='post'>
        <input type='submit' name='volver' value='Volver'/>
    </form>  
  </div>
</div>
</body>
</html>