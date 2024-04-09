<?php
include("header.php");
/* CODIGO */
$id	=	xss(no_i($_GET['id']));

$previo	=	mysql_query("SELECT p.id, p.categoria, p.titulo, c.id_categoria, c.link_categoria FROM (posts as p, categorias AS c) WHERE p.id='$id'+1 AND p.categoria=c.id_categoria");
$resultado	=	mysql_fetch_array($previo);

Header("Location: ".$url."/posts/".$resultado['link_categoria']."/".$resultado['id']."/".corregir($resultado['titulo']).".html");
?>