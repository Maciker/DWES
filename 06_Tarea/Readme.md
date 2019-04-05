Enunciado.
El objetivo de esta práctica es crear un servicio web con una serie de funciones, las cuales expondrán información 
relativa a una empresa (empleados y departamentos en los que trabajan). Los datos de la empresa se hallan en el 
archivo DWES6_tarea_db.sql, adjunto al final de la tarea. La ejecución de las sentencias SQL del archivo dará como
resultado la base de datos tarea6 con las tablas necesarias para realizar la tarea. Será necesarios configurar un 
usuario y contraseña para la base de datos, se recomienda el usuario y contraseña habitual dwes y abc123. .
Para programar el servidor y el cliente con los que haremos las pruebas se usará PHP5 SOAP. Estas son las funciones del servicio:
•	getFechaNacimiento: función que recibe el código de un empleado como parámetro y devuelve su fecha de nacimiento.
•	getDepartamentos: función sin parámetros que devuelve una matriz o array con los códigos de todos los departamentos.
•	getEmpleadosDepartamento: función que recibe el código de un departamento y devuelve una matriz o array con los 
códigos de los empleados de ese departamento.
•	getFechaDesdeEmpleadoDept: función que recibe el código de un departamento y el código de un empleado y devuelve 
la fecha desde la cual el empleado está en ese departamento.

Parte 1
En este parte no se usará un fichero WSDL para realizar la conexión entre cliente y servidor, sino que se utilizarán
los parámetros de conexión URI y URL que se especifican en el apartado 2.5 de la teoría. El script PHP que ejecute 
el servicio se llamará resource.php y deberá programarse de la forma que se explica en el apartado 2.7 de la teoría 
(definiendo una clase llamada DatosEmpresa.php que implemente las cuatro funciones a publicar). Para comprobar la 
correcta ejecución del servicio, programaremos también un cliente con nombre user.php que realice una llamada a cada 
una de las funciones programadas con los parámetros necesarios y muestre el resultado obtenido.
El cliente mostrará en la pantalla el resultado de las pruebas de las cuatro funciones, junto con el nombre y apellidos del alumno/a.

Parte 2
Para esta segunda parte se usará un fichero  WSDL  para realizar la conexión entre cliente y servidor, por lo
que tendremos que conectarnos de la forma que se explica en el  apartado 2.2  de la teoría.

Para generar el fichero WSDL se utilizará la herramienta WSDLDocument que puede descargarse del siguiente link:
https://code.google.com/archive/p/wsdldocument/downloads
Antes de usarla, es fundamental adaptar el servicio con las anotaciones correspondientes. No adaptaremos el 
script resource.php ni DatosEmpresa.php, realizaremos una copia de ambos y los renombraremos a  resource_wsdl.php 
y DatosEmpresa_wsdl.php  (servicio con las cuatro
funciones). De esta forma no se mezclarán los cambios de la parte 1 con los de la parte 2. Las modificaciones a 
realizar están explicadas en el  apartado 2.7 de la teoría.

Para poder realizar la generación del documento WSDL debemos crear un nuevo fuente llamado  generawsdl.php . 
El contenido de este fichero está explicado en el  apartado 2.8 de la teoría.

Con el WSDL ya generado y volcado a un fichero llamado  serviciowsdl.wsdl.xml, crearemos un nuevo fichero cliente 
llamada  user_wsdl.php  que hará uso del WSDL para realizar la conexión. De nuevo, el cliente mostrará en pantalla 
el resultado de las pruebas a las cuatro funciones, y el nombre y apellidos del alumno aparecerán en la prueba junto 
con los resultados. Los parámetros para las pruebas tendrán que ser  distintos  que en las pruebas de la parte 1.

Todos los fuentes, salvo  WSDLDocument.php, serán codificados por el alumno y  tienen que estar convenientemente 
comentados.  No se darán como válidos los clientes que prueben los servicios sin hacer uso de PHP5 SOAP.
Criterios de puntuación. Total 10 puntos.
La consecución de la  parte 1 se puntuará con 5 puntos.
La consecución de la  parte 2 se puntuará con  5 puntos que se dividirá en  3 puntos para la generación del WSDL 
con la herramienta  WSDLDocument y otros 2 puntos para las pruebas a realizar con el  user_wsdl.php haciendo uso de dicho  WSDL.



Consejos y recomendaciones.
En la parte 2, debemos ser especialmente cuidadosos en la generación del documento WSDL. Tal y como se ha planteado 
el fuente  generawsdl.php  el contenido del XML se pintará en la pantalla del navegador. Este contenido tiene que ser 
volcado a un fichero que vamos a llamar
serviciowsdl.wsdl.xml. Para que la generación no dé problemas, definiremos el Content-Type antes de generar el XML en 
el fuente  generawsdl.php:

Al WSDL generado, le añadiremos la  cabecera xml y los siguientes atributos a la etiqueta wsdl:definitions para que 
funcione correctamente:

Indicaciones de entrega.
Elaborarás un único  documento PDF donde figure el plan de pruebas completo que refleje de forma clara las 
pruebas realizadas con los dos clientes a las cuatro funciones expuestas.

Las prácticas sin plan de pruebas serán calificadas directamente con cero. El PDF con el plan de pruebas, 
junto con todos los fuentes de tu proyecto, se añadirán a una carpeta comprimida en .zip. En dicha carpeta 
habrá dos carpetas a un segundo nivel llamadas  Parte1  y  Parte2  que contendrán los siguientes fuentes:

Parte1
resource.php
DatosEmpresa.php
user.php

Parte2
resource_wsdl.php
DatosEmpresa_wsdl.php
user_wsdl.php
generawsdl.php
serviciowsdl.wsdl.xml
WSDLDocument.php 

Si el alumno utiliza otros fuentes para la realización de la tarea (clase para conexión con base de datos, clase empleado...)
deben de colocarse en una carpeta include dentro de Parte1 y Parte2 (una carpeta include por cada parte).
El archivo .zip será el  único entregable de la práctica. El archivo se nombrará siguiendo las siguientes pautas:
apellido1_apellido2_nombre_SIGxx_Tarea
Asegúrate que el nombre no contenga la letra ñ, tildes ni caracteres especiales extraños. Así por ejemplo la alumna Begoña 
Sánchez Mañas para la sexta unidad de DWES, debería nombrar esta tarea como:
sanchez_manas_begona_DWES06_Tarea

