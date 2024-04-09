<?php
require_once("../header.php");

$idmod = $_SESSION['id'];
$moderador = $_SESSION['user'];
$idpost = xss(no_i($_POST['idpost']));
$denunciante = xss(no_i($_POST['denun']));


$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$idmod."'"));
$rango = $sqlrango['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){

$sqltitulo = mysql_fetch_array(mysql_query("SELECT titulo FROM posts WHERE id='".$idpost."'"));
$postitulo = $sqltitulo['titulo'];

/*Rechazada*/
$para1      = xss(no_i($_POST['denun']));
$asunto1    = 'Denuncia Rechazada:';
$contenido1 = 'Hola!

Gracias por colaborar con el sistema de denuncias de '.$comunidad.', con tu accion estas ayudando a que el contenido del sitio sea cada vez mejor.

Nuestro equipo de moderadores ha revisado tu denuncia y ha considerado que el post no debia ser eliminado y dado que asi esta establecido en el [b][url='.$url.'/protocolo]protocolo[/url][/b] te seran restados 3 puntos.';
$id_user1   = $_SESSION['id'];

	$sqlposts = mysql_query("select id from posts where id='".$idpost."'");
    if (mysql_num_rows($sqlposts)>0)
    {
        $sqlpostse = mysql_query("select id_post, accion from posts_eliminados where id_post='".$idpost."' and accion='1' ");
		if (!mysql_num_rows($sqlpostse)>0)
		{
			
			$sql = "Update usuarios set puntos=puntos-'3' where nick='$denunciante'";
            mysql_query($sql);
			
			$sql = "UPDATE posts SET denuncias='0' WHERE id='$idpost'";
            mysql_query($sql);

    $sql = "select id from usuarios where nick='".$para1."'";
	$rs = mysql_query($sql);
	if (mysql_num_rows($rs)>0)
	{
		$row = mysql_fetch_array($rs);
		$para_id1 = $row['id'];
		$sql = "INSERT INTO mensajes (id_emisor, id_receptor, asunto, contenido, fecha) ";
		$sql.= "VALUES ('$id_user1', '$para_id1', '$asunto1', '$contenido1', NOW())";
		$rs = mysql_query($sql) or die("Error al enviar el mensaje");
		
		}
		
echo '   La Denuncia De El Post  <b>'.$postitulo.'</b> Ha Sido Rechazada';
}
else{
	echo '   El POST <b>'.$idpost.'</b> Ya se Encuentra Eliminado';
}
}
else{
	echo '   El POST <b>'.$idpost.'</b> NO Existe';
}
}
else{
	echo '   No Tienes Rango';
}
?>