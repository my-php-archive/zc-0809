<?php
require_once('../header.php');

$id_us = xss(no_i($_GET['id']));

$rs = mysql_query("SELECT nick FROM usuarios WHERE id='$id_us'");
$prf = mysql_fetch_array($rs);

echo'<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/">
<channel>
	<title>Zincomienzo.net - Post creados por el usuario: </title>
	<description>Últimos 15 post creados por el usuario '.$prf['nick'].' en Zincomienzo.net</description>
	<image><title>Zincomienzo.net</title><link>'.$url.'/</link><url>'.$images.'/logo-rss.gif</url></image>
	<generator>'.$url.'/</generator>
	<language>es</language>
	<link>'.$url.'/perfil/'.$id_us.'</link>';
$sql = mysql_query("SELECT * FROM posts p, categorias c WHERE c.id_categoria=p.categoria AND p.elim='0' AND p.id_autor='$id_us' ORDER BY p.fecha DESC LIMIT 15");
while($row = mysql_fetch_assoc($sql)){

$id = $row['id'];
$cat = $row['link_categoria'];
$titulo = $row['titulo'];
$fech = $row['fecha'];
$cuerpo = $row['contenido'];

echo'
		<item>
			<title>'.$titulo.'</title>
			<link>'.$url.'/posts/'.$cat.'/'.$id.'/'.corregir($titulo).'.html</link>
			<pubDate>'.date("d.m.Y", $fech).' a las '.date("H:m:s", $fech).' hs.</pubDate>
			<category><![CDATA['.$cat.']]></category>
			<comments>'.$url.'/posts/'.$cat.'/'.$id.'/'.corregir($titulo).'.html#comentarios</comments>
			<description><![CDATA[ '.cortar(BBparse($cuerpo),501).' 			<p><strong><a href="'.$url.'/posts/'.$cat.'/'.$id.'/'.corregir($titulo).'.html">Seguir leyendo... >></a></strong></p><hr />]]></description>
		</item>';}
?>
	</channel>
</rss>