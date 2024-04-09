<?php

require_once('../header.php');

$idu = xss(no_i($_GET['id']));

$rpm = mysql_query("SELECT nick FROM usuarios WHERE id='$idu'");
$nik = mysql_fetch_assoc($rpm);
$nick = $nik['nick'];

echo'<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/">
<channel>

<title>Zincomienzo.net - Últimos Temas de '.$nick.'</title>
<description><![CDATA[ Últimos Temas creados ]]></description>
<image><title>Zincomienzo.net</title><link>'.$url.'/</link><url>'.$images.'/logo-rss.gif</url></image>
<generator>'.$url.'/</generator>
<language>es</language>
<link>'.$url.'/</link>';

$rpm = mysql_query("SELECT * FROM c_temas ct, c_comunidades co WHERE elimte='0' AND ct.idcomunid=co.idco AND ct.id_autor='$idu' ORDER BY ct.fechate DESC LIMIT 10");

while($row = mysql_fetch_array($rpm)){echo'

	<item>
		<title><![CDATA[ '.$row['titulo'].' ]]></title>
		<link>'.$url.'/comunidades/'.$row['shortname'].'/'.$row['idte'].'/'.corregir($row['titulo']).'.html</link>
		<pubDate>Thu,9 Sep 2010 19:21:37 -0300</pubDate>
		<comments>'.$url.'/comunidades/'.$row['shortname'].'/'.$row['idte'].'/'.corregir($row['titulo']).'.html#respuestas</comments>
		<description><![CDATA[ '.cortar(BBparse($row['cuerpo']), 501).' 		<p><strong><a href="'.$url.'/comunidades/'.$row['shortname'].'/'.$row['idte'].'/'.corregir($row['titulo']).'.html">Seguir leyendo...</a></strong></p> ]]></description>
	</item>';}
?>
</channel>
</rss>