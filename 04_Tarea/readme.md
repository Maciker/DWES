Tarea para DWES04.
Detalles de la tarea de esta unidad.
Enunciado.
Tienes que programar una aplicación web sencilla que permita gestionar una serie de preferencias del usuario. 
La aplicación se dividirá en dos páginas:
•	preferences.php. Permitirá al usuario escoger sus preferencias y las almacenará en la sesión del usuario. 
 
Mostrará un cuadro desplegable por cada una de las preferencias. Estas serán:
o	Idioma. El usuario podrá escoger idiomas entre "inglés" , "español" y "euskara"
o	Perfil público. Sus posibles opciones será "sí" y "no".
o	Zona horaria. Los valores en este caso estarán limitados a "GMT-2", "GMT-1", "GMT", "GMT+1" y "GMT+2".
Además en la parte inferior tendrá un botón con el texto "Establecer preferencias" y un enlace que ponga "Mostrar preferencias".
El botón almacenará las preferencias en la sesión del usuario y volverá a cargar esta misma página, en la que se mostrará 
el texto "Información guardada en la sesión". Una vez establecidas esas preferencias, deben estar seleccionadas como 
valores por defecto en los campos del formulario.
 
El enlace "Mostrar preferencias" llevará a la página show.php.
•	show.php. Debe mostrar un texto con las preferencias que se encuentran almacenadas en la sesión del usuario. Además, 
en la parte inferior tendrá un botón con el texto "Borrar preferencias" y un enlace que ponga "Establecer preferencias". 
 
El botón borrará las preferencias de la sesión del usuario y volverá a cargar esta misma página, en la que se mostrará 
el texto "Información de la sesión eliminada". Una vez borradas esas preferencias, se debe comprobar que sus valores no 
se muestran en el texto de la página.
 
El enlace "Establecer preferencias" llevará a la página llevará a la página preferences.php.
Se adjunta una hoja de estilos para usar en las páginas que se programen.
Hoja de estilo. (2.00 KB)

Criterios de puntuación. Total 10 puntos.
Se valorará con dos puntos la consecución de cada uno de los siguientes ítems:
•	En preferences.php, recoger los valores enviados por el formulario y almacenarlos en la sesión del usuario.
•	En show.php, mostrar las preferencias del usuario según figuran en los valores de la sesión.
Se valorará con un punto la consecución de cada uno de los siguientes ítems:
•	En preferences.php, establecer las preferencias seleccionadas por el usuario como valores por defecto en los cuadros de selección.
•	En show.php, eliminar las preferencias almacenadas en la sesión del usuario cuando se indica.
•	Realizar las dos páginas con los elementos HTML indicados, incluyendo las referencias a la hoja de estilos facilitada,
etiquetas, formularios, cuadros de selección, botones y enlaces.
•	Iniciar y restablecer correctamente las sesiones en las dos páginas.
•	Introducir comentarios y estructurar el código.
•	Calidad y presentación del plan de pruebas.
Recursos necesarios para realizar la Tarea.
Ordenador con PHP, servidor web Apache y entorno de desarrollo NetBeans, correctamente instalado y configurado. Extensión 
de depuración Xdebug para PHP instalada y funcionando con NetBeans.
Consejos y recomendaciones.
Además del manual online de PHP, se recomienda dar libre acceso a Internet para la búsqueda de información.
Indicaciones de entrega.
Una vez realizada la tarea, elaborarás un único documento PDF donde figure el plan de pruebas completo que refleje de forma 
clara todos los casos de uso con capturas de pantalla y explicaciones. Recuerda que la única manera de demostrar que has 
conseguido cada uno de los items del apartado de criterios es que aparezca reflejado en dicho plan. Las prácticas sin plan
de pruebas serán calificadas directamente con cero.
El PDF con el plan de pruebas, junto a los dos fuentes .php con el programa y sus comentarios, se añadirán a una carpeta
comprimida en .zip. Este archivo .zip será el único entregable de la práctica. En el caso de que se utilice una hoja de
estilos diferente (no lo recomiendo), ésta deberá entregarse en el mismo .zip junto con el resto de fuentes.
El envío del .zip se realizará a través de la plataforma de la forma establecida para ello, y el archivo se nombrará
siguiendo las siguientes pautas:
apellido1_apellido2_nombre_SIGxx_Tarea
Asegúrate que el nombre no contenga la letra ñ, tildes ni caracteres especiales extraños. Así por ejemplo la alumna 
Begoña Sánchez Mañas para la cuarta unidad del MP de DWES, debería nombrar esta tarea como...
sanchez_manas_begona_DWES04_Tarea

