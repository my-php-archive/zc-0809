<?php
$comunidad		=	"Zincomienzo!"; //Titulo de tu Web
$descripcion	=	"Sumate a la Revolucion"; //Slogan
$name_short		=	"Z!";
$url			=	"http://www.zincomienzo.net"; //dominio

$codigo_google	=	"001507672859189470273:3j9lr2f4gws"; //codigo de busqueda google
$images			=	"http://www.zincomienzo.net/images"; //ruta de las imagenes
$public_key		=	"6Ldl5AkAAAAAABwY5HWnITwUNLCcXAEaoO_TAJYd"; //public key recaptcha aqui
$private_key	=	"6Ldl5AkAAAAAAGyvpo823KskGkX1dVWqn5-Y0oK7"; //private key recaptcha aqui

$bd_host		=	"localhost";
$bd_usuario		=	"zincomie";
$bd_password	=	"^]dZ#H0E,g+a";
$bd_base		=	"zincomie_zinco";
$con			=	mysql_connect($bd_host, $bd_usuario, $bd_password);
					mysql_select_db($bd_base, $con);		
?>