<?php
// Archivo en donde se acumular el numero de visitas
$archivo = "contador.txt";
// Abrimos el archivo para solamente leerlo (r de read)
$abre = fopen($archivo, "r");
// Leemos el contenido del archivo
$total = fread($abre, filesize($archivo));
// Cerramos la conexin al archivo
fclose($abre);
// Abrimos nuevamente el archivo
$abre = fopen($archivo, "w");
// Sumamos 1 nueva visita
$total = $total + 1;
// Y reemplazamos por la nueva cantidad de visitas
$grabar = fwrite($abre, $total);
// Cerramos la conexin al archivo
fclose($abre);
// Imprimimos el total de visitas dndole un formato
echo "<center><font face='verdana' size='2'>Total de visitas:".$total."</font></center>";
?>