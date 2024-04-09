<?php
 /******************************************************************
  * Contador de visitas programado en PHP  *************************
  * Modificado y personalizado por sebatian garcia *****************
  * Mas utilidaddes para webmsters en www.desenredate.com  *********
  ******************************************************************/
  $destino = "numero.dat";
  $abrir = fopen($destino,"r");
  $cuenta = trim(fread($abrir,filesize($destino)));
  

  if ($cuenta != "") $cuenta++;
  else $cuenta = 1;
  @fclose($abrir);
  $abrir = fopen($destino,"w");
  @fputs($abrir,$cuenta);



  for($i=0;$i<strlen($cuenta);$i++) {
    $imagen = substr($cuenta,$i,1);
    $contador .= "<img alt='$imagen ' src='$imagen.gif'>";
  }
  @fclose($abrir);
  print $contador;
?>
