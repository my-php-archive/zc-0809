<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$idmod = $_SESSION['id'];
$idpost = xss(no_i($_POST['idpost']));
$razon = xss(no_i($_POST['razon']));
$denunciante = xss(no_i($_POST['denun']));

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$idmod."'"));

$rango = $sqlrango['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755")
{
	 $sql = "SELECT id FROM usuarios WHERE nick='".$denunciante."'";
     $r2 = mysql_query($sql);
  if (mysql_num_rows($r2)>0)
  {
$sqltitulo = mysql_fetch_array(mysql_query("SELECT titulo FROM posts WHERE id='".$idpost."'"));
$postitulo = $sqltitulo['titulo'];

/*Aceptada*/
$para1      = xss(no_i($_POST['denun']));
$asunto1    = 'Denuncia aceptada: '.$postitulo .'';
$contenido1 = 'Hola!

Gracias por colaborar con el sistema de denuncias de '.$comunidad.', con tu accion estas ayudando a que el contenido del sitio sea cada vez mejor.

Nuestro equipo de moderadores ha revisado tu denuncia y ha considerado que el post debia ser eliminado y dado que asi esta establecido en el [b][url='.$url.'/protocolo]protocolo[/url][/b] te seran sumados 3 puntos a tu cuenta.

Gracias por tu aporte a la comunidad!';
$id_user1   = $_SESSION['id'];

/*Borrada*/

    $sql = "SELECT p.id_autor, p.id, u.id, u.nick 
	        FROM (posts as p, usuarios as u)
			WHERE p.id='$idpost' AND u.id=p.id_autor";
	$rs = mysql_query($sql);
	$row = mysql_fetch_array($rs);
	$autor_nick = $row['nick'];

$para2      =  $autor_nick;
$asunto2  = 'Post eliminado: '.$postitulo.'';
$contenido2 = 'Hola!

Lamento contarte que tu post titulado [b]'.$postitulo.'[/b] ha sido eliminado.

Causa: [b]'.$razon.'[/b]

Para acceder al protocolo, presiona este [b][url='.$url.'/protocolo]enlace[/url][/b].

Muchas gracias por entender!';
$id_user2   = $_SESSION['id'];

	$sqlposts = mysql_query("SELECT id, elim FROM posts WHERE id='".$idpost."'");
	$pozt = mysql_fetch_array($sqlposts);
	$elim = $pozt['elim'];
    if (mysql_num_rows($sqlposts)>0 or $elim!=1)
    {
        $sqlpostse = mysql_query("SELECT id_post, accion FROM posts_eliminados WHERE id_post='".$idpost."' and accion='1' ");
		if (!mysql_num_rows($sqlpostse)>0)
    {
			$sql = "INSERT INTO posts_eliminados (id_modera,moderador,id_post,causa,fecha,accion)";
            $sql.= "VALUES ('".$_SESSION['id']."','".$_SESSION['user']."','$idpost','$razon',NOW(),'1')";
            mysql_query($sql);

            $sql = "UPDATE posts SET elim='1' WHERE id='$idpost'";
            mysql_query($sql);
			
            $sql = "UPDATE posts SET denuncias='0' WHERE id='$idpost'";
            mysql_query($sql);
			
            $sql = "UPDATE usuarios SET numposts=numposts-'1' WHERE nick='".$para2."'";
            mysql_query($sql);
			
			$sql = "UPDATE usuarios SET puntos=puntos+'3' WHERE nick='".$denunciante."'";
            mysql_query($sql);
			

    $sql = "SELECT id FROM usuarios WHERE nick='".$para1."'";
	$rs = mysql_query($sql);
	if (mysql_num_rows($rs)>0)
	{
	$row = mysql_fetch_array($rs);
	$para_id1 = $row['id'];
		
	$sql = "INSERT INTO mensajes (id_emisor, id_receptor, asunto, contenido, fecha) ";
	$sql.= "VALUES ('$id_user1', '$para_id1', '$asunto1', '$contenido1', NOW())";
	$rs = mysql_query($sql) or die("Error al enviar el mensaje");
	}
		
	$sql = "SELECT id FROM usuarios WHERE nick='".$para2."'";
	$rs2 = mysql_query($sql);
	if (mysql_num_rows($rs2)>0)
	{
	$row2 = mysql_fetch_array($rs2);
	$para_id2 = $row2['id'];
		
	$sql = "INSERT INTO mensajes (id_emisor, id_receptor, asunto, contenido, fecha) ";
	$sql.= "VALUES ('$id_user2', '$para_id2', '$asunto2', '$contenido2', NOW())";
	$rs = mysql_query($sql) or die("Error al enviar el mensaje");
	}
			
echo '   La Denuncia Ha Sido Aceptada y El Post <b>'.$postitulo.'</b> Ha Sido Borrado.';
}else{
	echo '   El Post <b>'.$postitulo.'</b> Ya se Encuentra Eliminado';
}}else{
	echo '   El Post <b>'.$idpost.'</b> No Existe';
}}else{
	echo '   El Usuario <b>'.$denunciante.'</b> No Existe';
}}else{
	echo '   No Tienes Rango';
}
?>