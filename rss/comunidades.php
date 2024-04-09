<?php
require_once('../header.php');

echo'<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/">
<channel>

<title>Downgadex.cz.cc - Últimos Temas de Comunidades</title>
<description><![CDATA[ Últimos Temas creados ]]></description>
<image><title>Downgadex.cz.cc</title><link>'.$url.'/</link><url>'.$images.'/logo-rss.gif</url></image>
<generator>'.$url.'/</generator>
<language>es</language>
<link>'.$url.'/</link>';

$rs = mysql_query("SELECT ct.*, co.* FROM c_temas ct, c_comunidades co WHERE ct.idcomunid=co.idco ORDER BY ct.fechate DESC LIMIT 10");
while($row = mysql_fetch_array($rs)){

$id = $row['idte'];
$contenido = $row['cuerpo'];
$titulo = $row['titulo'];
$shortname = $row['shortname'];

	echo'<item>
		<title><![CDATA[ '.$titulo.' ]]></title>
		<link>'.$url.'/comunidades/'.$shortname.'/'.$id.'/'.corregir($titulo).'.html</link>
		<pubDate>'.date("d.m.Y", date($row['fechate'])).' a las '.date("H:m:s", date($row['fechate'])).' hs. -0300</pubDate>
		<comments>'.$url.'/comunidades/'.$shortname.'/'.$id.'/'.corregir($titulo).'.html#respuestas</comments>
		<description><![CDATA[ '.cortar(BBparse($contenido),'501').' <p><strong><a href="'.$url.'/comunidades/'.$shortname.'/'.$id.'/'.corregir($titulo).'.html">Seguir leyendo...</a></strong></p>  ]]></description>
	</item>';}
?>
</channel>
</rss>