<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">

<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>DWES: Pruebas</title>
     </head>
     <h2>Agenda</h2><br>
          <?php

        $agenda["iker"] =  "iker@gmail.com";
        $agenda["erku"] =  "erku@gmail.com";
        $agenda["iker"] =  "iker1@gmail.com";
        $agenda["erku"] =  "erku1@gmail.com";
        $agenda["asier"] =  "asier@gmail.com";
        foreach ($agenda as $a => $b) {
            print "- " .$a.": ".$b ."<br />";
        }
 
     ?>
     </body>
</html>