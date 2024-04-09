<?php
include("funciones.php");
//Configuracion web
$con['webName'] = "Nombre";
$con['webSlogan'] = "Fixeando sin limites (?)";
$con['url'] = "http://localhost/";
$con['Images'] = "http://localhost";
//Ya termine lo que es lo estetico, ahora me voy a conectar con la base de datos e,e:E
$con['server'] = "localhost";
$con['userName'] = "zincomie";
$con['Password'] = "4wsu5fN80C";
$con['DB'] = "zincomie_zinco";
$con['TiempoOnlines'] = 60*3;
/**************************/ 
mysql_connect("localhost","zincomie","4wsu5fN80C") or die(mysql_error());
mysql_select_db("zincomie_zinco") or die(mysql_error());
// we, ya anda la conexion, ahora tengo q hacer el index :Er,r
?>