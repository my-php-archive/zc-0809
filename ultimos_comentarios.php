<?php
require_once("header.php");
$categoria	=	xss(no_i($_GET['categoria']));

if($categoria == ''){
	$condicion = "1=1";
}else if($categoria == 'novatos'){
	$condicion = "u.rango = '11' ";
}else{
	$condicion = "cat.link_categoria = '$categoria' ";
}

$sqlcome=mysql_query("SELECT c.autor, p.titulo, p.id, cat.link_categoria
FROM comentarios as c 
LEFT JOIN usuarios as u ON u.id = c.id_autor
LEFT JOIN posts as p ON p.id = c.id_post 
LEFT JOIN categorias as cat on cat.id_categoria = p.categoria 
WHERE p.elim='0' AND {$condicion} ORDER BY c.fecha DESC LIMIT 15 ");

while($com = mysql_fetch_array($sqlcome))
{
	echo'<div style="white-space:nowrap;overflow:hidden;width:100%"><strong>'.$com['autor'].'</strong> <a href="/posts/'.$com['link_categoria'].'/'.$com['id'].'/'.corregir($com['titulo']).'.html#comentarios-abajo" class="size10">'.cortar($com['titulo']).'</a></div>';
}

?>