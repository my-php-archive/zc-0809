<?php
require_once("header.php");
$categoria	=	htmlspecialchars($_GET['categoria'], ENT_QUOTES);

if($categoria == ''){
	$condicion = "1=1";
}else if($categoria == 'novatos'){
	$condicion = "u.rango = '11' ";
}else{
	$condicion = "cat.link_categoria = '$categoria' ";
}

$sqlcome=$db->query("SELECT u.*, c.autor, p.titulo, p.id, cat.link_categoria
FROM comentarios as c 
LEFT JOIN usuarios as u ON u.id = c.id_autor
LEFT JOIN posts as p ON p.id = c.id_post 
LEFT JOIN categorias as cat on cat.id_categoria = p.categoria 
WHERE p.elim='0' AND {$condicion} AND u.pais='AR' ORDER BY c.fecha DESC LIMIT 15 ");

while($com = $db->fetch_array($sqlcome))
{
	echo'<li><strong>'.$com['autor'].'</strong> <a href="/posts/'.$com['link_categoria'].'/'.$com['id'].'/'.corregir($com['titulo']).'.html#comentarios-abajo" class="size10">'.cortar($com['titulo']).'</a></li>';
}

?>