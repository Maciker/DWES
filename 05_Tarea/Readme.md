Tarea para DWES05.
Detalles de la tarea de esta unidad.
Enunciado.
En esta tarea vamos a ampliar ligeramente la funcionalidad de la tienda online trabajada en los contenidos. 
Se precisa mostrar a los usuarios de la tienda información más detallada sobre los productos de la misma, 
y se ha decidido comenzar por los ordenadores.
A nivel funcional, el cambio es sencillo, introducir en los productos de tipo ordenador un link en el listado de
productos que nos permita navegar a una nueva página que contendrá toda la información detallada sobre el ordenador 
(información que obtendremos de la nueva tabla ordenador que vamos a crear).
Los pasos que has de seguir son:
EN PRIMER LUGAR...
•	Crear una nueva base de datos de nombre "tarea5", similar a la que usamos en los ejercicios de la tienda web.  
Al final de la tarea se te proporciona un guión de comandos SQL (archivo DWES05_TAR_R01_Crear_BD_tarea5_ordenador.zip)
para crear su estructura y añadir los datos correspondientes. Este guión crea también la estructura de la nueva tabla "ordenador"
y le añade algunos datos, correspondientes a los ordenadores existentes. Para acceder se usan las credenciales habituales:
usuario "dwes" y contraseña "abc123.".
•	Descargar, instalar y configurar el motor de plantillas Smarty.
•	Utilizando el código de la tienda web que se aporta al final de la tarea (archivo DWES05_Tienda_web.zip), 
instalarla y comprobar su correcto funcionamiento. El punto de entrada a la tienda se realiza mediante la página login.php,
utilizando las mismas credenciales que la base de datos.
 
A IMPLEMENTAR...
•	Modificación 1: Sobre la tienda web, crear una nueva clase Ordenador.phppara manejar la información correspondiente 
a cada ordenador. Modificar el resto de código para adaptarlo a esta circunstancia.
•	Modificación 2: Utilizando Smarty, crear una nueva vista o página en PHP, con su correspondiente plantilla (*.tpl), 
para mostrar la información de un modelo de ordenador y adaptar el resto de código. Se debe mostrar: nombre corto, 
código, procesador, RAM, tarjeta gráfica, unidad óptica, otros, PVP y descripción (ten en cuenta que algunos datos 
están almacenados en la tabla producto y otros en la nueva tabla ordenador). En la primera línea del apartado 
características de esta nueva página deberás imprimir en pantalla tu nombre y apellidos, utilizando para ello 
una variable de Smarty, justo encima del resto de campos del ordenador. La página deberá contar, además, con un 
botón Volver que permita regresar al listado de productos. Puedes fijarte en la imagen de la página resultante que se aporta.
  

•	Modificación 3: Modificar la clase productos.php y la plantilla productos.tplpara convertir los nombres de 
los productos de tipo ordenador en enlaces a la página anterior. Cuando el usuario pinche en uno de esos enlaces, 
se le abrirá la nueva página, con la información del modelo de ordenador seleccionado. Puedes fijarte en esta captura:
 

NOTA IMPORTANTE:
Los cambios introducidos deben seguir las pautas de la programación orientada a objetos que se han explicado en el apartado de teoría. 
Es importante fijarse en la estructura del código que se aporta y entenderla para trabajar en la misma línea. 
Se pueden realizar cuantos cambios sean necesarios en el código que se entrega, mientras se mantenga la separación 
entre la lógica de presentación y la lógica de negocio. 
No cumplir con estas especificaciones supondrá la valoración de los ítems correspondientes con cero.
Criterios de puntuación. Total 10 puntos.
Se valorará la consecución de cada uno de los siguientes ítems:
•	Crear la nueva base de datos y añadir la tabla ordenador. (1 punto)
•	Descargar, instalar y configurar correctamente el motor de plantillas Smarty. (1 punto)
•	Poner en funcionamiento la tienda online utilizando el código que se aporta. (1 punto)
•	Modificar el listado de productos para añadir los enlaces a la nueva página con el detalle de los ordenadores. (1,5 puntos)
•	Crear la nueva vista para el detalle del ordenador de la forma que se ha especificado, obteniendo la información 
de base de datos y utilizando para ello los recursos vistos en el tema 5 (plantillas y clases). (3,5 puntos)
•	Código bien comentado y estructurado. (1 punto)
•	Claridad y calidad del plan de pruebas. (1 punto)
Recursos necesarios para realizar la Tarea.
Ordenador con PHP, servidor web Apache y entorno de desarrollo NetBeans, correctamente instalado y configurado.
Extensión de depuración Xdebug para PHP instalada y funcionando con NetBeans.
Consejos y recomendaciones.
Además del manual online de PHP, se recomienda dar libre acceso a Internet para la búsqueda de información.
Indicaciones de entrega.
Elaborarás un único documento PDF donde figure el plan de pruebas completo que refleje de forma clara todos los casos 
de uso con capturas de pantalla y explicaciones. Recuerda que la única manera de demostrar que has conseguido cada
uno de los items del apartado de criterios es que aparezca reflejado en dicho plan. Las prácticas sin plan de 
pruebas serán calificadas directamente con cero.
En esta práctica, se deberá realizar una primera batería de pruebas que muestre la consecución de los primeros 
tres ítems (puesta en marcha de la tienda web). Tras la realización de las modificaciones, se deberá realizar 
una segunda batería de pruebas que muestre la consecución del resto de ítems. Estas dos baterías de pruebas 
deben estar convenientemente separadas en el plan de pruebas.
El PDF con el plan de pruebas, junto con todos los fuentes y plantillas de tu proyecto, se añadirán a una 
carpeta comprimida en .zip. Este archivo .zip será el único entregable de la práctica. En dicho .zip existirán 
dos carpetas, una llamada tarea con los fuentes de tu proyecto de NetBeans y otra llamada webcon las plantillas 
de Smarty que has utilizado (estructura idéntica al paquete comprimido que has descargado al inicio de la práctica). 
El archivo se nombrará siguiendo las siguientes pautas:
apellido1_apellido2_nombre_SIGxx_Tarea
 Asegúrate que el nombre no contenga la letra ñ, tildes ni caracteres especiales extraños. Así por ejemplo la alumna
 Begoña Sánchez Mañas para la quinta unidad del MP de DWES, debería nombrar esta tarea como...
sanchez_manas_begona_DWES05_Tarea
