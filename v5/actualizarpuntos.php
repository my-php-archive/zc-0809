<?php
include("header.php");
$titulo	= "Puntos Actualizados!";
cabecera_normal();
?>

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->

<center><b>Los puntos se han actualizado Correctamente</b></center>


<center><img src="/images/puntos-actualizados.png"></center>

<!-- fin cuerpocontainer -->

<?php

pie();
?>

<?php
	include("includes/configuracion.php");
	

        //Programador
	$sql = "UPDATE usuarios SET puntosdar='105' WHERE rango='355'";
	mysql_query($sql);

        //Desarrollador
	$sql = "UPDATE usuarios SET puntosdar='200' WHERE rango='255'";
	mysql_query($sql);
	
	//Moderador
	$sql = "UPDATE usuarios SET puntosdar='100' WHERE rango='100'";
	mysql_query($sql);
	
	//Patrocinador
	$sql = "UPDATE usuarios SET puntosdar='300' WHERE rango='50'";
	mysql_query($sql);

        //Match User
	$sql = "UPDATE usuarios SET puntosdar='35' WHERE rango='555'";
	mysql_query($sql);

        //Leyenda
	$sql = "UPDATE usuarios SET puntosdar='40' WHERE rango='96'";
	mysql_query($sql);

        //Gold User
	$sql = "UPDATE usuarios SET puntosdar='30' WHERE rango='16'";
	mysql_query($sql);      

        //Great User
	$sql = "UPDATE usuarios SET puntosdar='20' WHERE rango='14'";
	mysql_query($sql);
	
	//Silver User
	$sql = "UPDATE usuarios SET puntosdar='25' WHERE rango='15'";
	mysql_query($sql);

        //Full User
	$sql = "UPDATE usuarios SET puntosdar='15' WHERE rango='13'";
	mysql_query($sql);
	
	//New Full User
	$sql = "UPDATE usuarios SET puntosdar='12' WHERE rango='12'";
	mysql_query($sql);

        //Novato
	$sql = "UPDATE usuarios SET puntosdar='0' WHERE rango='11'";
	mysql_query($sql);

        //Oficial
	$sql = "UPDATE usuarios SET puntosdar='100' WHERE rango='455'";
	mysql_query($sql);

        //Dueño
	$sql = "UPDATE usuarios SET puntosdar='300' WHERE rango='755'";
	mysql_query($sql);

        //Supervisor
	$sql = "UPDATE usuarios SET puntosdar='150' WHERE rango='655'";
	mysql_query($sql);
       












?>