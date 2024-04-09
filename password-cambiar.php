<?php
include("header.php");
$titulo	= $descripcion;
cabecera_normal();

$id = $_SESSION['id'];
$password = no_i($_POST["password"]);
$password1 = no_i($_POST["password1"]);
$password2 = no_i($_POST["password2"]);

if($_SESSION['user']!=null){
	if ($password!=null and $password1!=null and $password2!=null and $password1==$password2) {
		$sqlpa=mysql_query("SELECT password FROM usuarios WHERE id='$id'");
		$dat=mysql_fetch_array($sqlpa);
		$passwordnuevo5 = md5($password1);
		$passwordviejo5 = md5($password);
		
		if ($passwordviejo5 == $dat['password']) {
			$id_zinfinal = md5(uniqid(rand(), true));
			$sqlgp=mysql_query("UPDATE usuarios SET id_extreme='$id_zinfinal', password='$passwordnuevo5' where id='$id'");
            $titulo_error	=	"Confirmaci&oacute;n";
            $mensaje_error	=	"La contrase&ntilde;a fue cambiada";
            $boton_error	=	"Ir a la p&aacute;gina principal";
            error();
		}
		else {
	    $titulo_error	=	"Error";
        $mensaje_error	=	"La clave actual ingresada no es correcta";
        $boton_error	=	"Ir a p&aacute;gina principal";
        error();
    }
	}
	else {
	$titulo_error	=	"Error";
    $mensaje_error	=	"Error de seguridad ";
    $boton_error	=	"Ir a p&aacute;gina principal";
    error();
    }
}
else {
$titulo_error	=	"Atenci&oacute;n";
$mensaje_error	=	"Para editar tus datos necesit&aacute;s autentificarte";
$boton_error	=	"Ir a p&aacute;gina principal";
error();
}
pie();
?>