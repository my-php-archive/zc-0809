<?php
/*$con = mysql_connect("localhost","root","");
$db = mysql_select_db("online",$con);        */
//include("../header.php");



// Tiempo máximo de espera
$time = 5 ;
// Momento que entra en línea
$date = time() ;
// Recuperamos su IP
$ip = $_SERVER["REMOTE_ADDR"];
// Tiempo Limite de espera
$limite = $date-$time*60 ;
// si se supera el tiempo limite (5 minutos) lo borramos
mysql_query("delete from gente_online where date < $limite") ;
// tomamos todos los usuarios en linea
$resp = mysql_query("select * from gente_online where ip='$ip'") ;
// Si son los mismo actualizamos la tabla gente_online
if(mysql_num_rows($resp) != 0) {
mysql_query("update gente_online set date='$date' where ip='$ip'") ;
}
// de lo contrario insertamos los nuevos
else {
mysql_query("insert into gente_online (date,ip) values ('$date','$ip')") ;
}
// Seleccionamos toda la tabla
$query = "SELECT * FROM gente_online";
// Ocultamos algún mensaje de error con @
$resp = @mysql_query($query) or die(mysql_error());
// almacenamos la consulta en la variable $usuarios
$usuarios = mysql_num_rows($resp);
// Si hay 1 usuarios se muestra en singular; si hay más de uno, en plural
/*if($usuarios > 1 || $usuarios == 0){echo("<center>Hay ");}else{echo("<center>Hay ");}if($usuarios == 0){echo("no ");}else{echo($usuarios." ");}if($usuarios > 1 || $usuarios == 0){echo("visitantes Online.</center>");}else{echo("visitante Online.</center>");}*/
?>

