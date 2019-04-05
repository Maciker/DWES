<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tarea 5 : Programación orientada a objetos en PHP -->
<!-- Tienda Web: ordenador.php -->
<!-- Nueva plantilla para presentar los datos de los ordenadores -->
<html>
	<head>
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	  <title>Ordenador {$ordenador->getcodigo()}</title>
	  <link href="tienda.css" rel="stylesheet" type="text/css">
	</head>

	<body class="pagproductos">

		<div id="contenedor" style="background-color: #df8;">
		  <div id="encabezado">
		    <h1>{$ordenador->getnombrecorto()}</h1>
				<p><b>C&oacute;digo: {$ordenador->getcodigo()}</b></p>
		  </div>
		  <div class="ordenador">
		  		<p>{$nombre_alumn}</p>
				<h2>Caracter&iacute;sticas:</h2>
				<p><b>Procesador:</b> {$ordenador->getprocesador()}</p>
				<p><b>RAM:</b> {$ordenador->getram()} GB</p>
				<p><b>Tarjeta gr&aacute;fica:</b> {$ordenador->getgrafica()}</p>
				<p><b>Unidad &oacute;ptica:</b> {$ordenador->getunidadoptica()}</p>
				<p><b>Sistema Operativo:</b> {$ordenador->getso()}</p>		
				<p><b>Otros:</b> {$ordenador->getotros()}</p>
				<p><b>PVP:</b> {$ordenador->getpvp()}</p>
				<h2>Descripci&oacute;n:</h2>
				<p>{$ordenador->getdescripcion()}</p>
			</div>
  
		  <div id="pie" style="height: 25px">
				<form action="productos.php" method="post">
					<input type='submit' name='' value='Volver' class='izq boton' />
					<input type='hidden' name='cod' value='{$ordenador->getcodigo()}' />
					<input type='submit' name='enviar' value='Comprar' class='dch boton' />
				</form>
		  </div>
		</div>
	</body>
</html>