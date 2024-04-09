<?php

require_once('../header.php');

$idte = xss(no_i($_GET['idte']));

$rpm = mysql_query("SELECT c.shortname, t.titulo FROM c_temas t, c_comunidades c WHERE t.idcomunid=c.idco AND t.idte='$idte'");
$te = mysql_fetch_assoc($rpm);
$title = $te['titulo'];

echo'<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/">
<channel>

<title>Zincomienzo.net - '.$title.'</title>
<description><![CDATA[ Últimas respuestas de '.$title.' ]]></description>
<image><title>Downgrade.cz.cc</title><link>'.$url.'/comunidades/'.$te['shortname'].'/'.$idte.'/'.corregir($title).'.html</link><url>'.$images.'/logo-rss.gif</url></image>
<generator>'.$url.'/</generator>
<language>es</language>
<link>'.$url.'/</link>';

$rpm = mysql_query("SELECT c.*, u.nick FROM c_respuestas c, usuarios u WHERE c.idtemare='$idte' AND u.id=c.idautorre ORDER BY c.fechare DESC LIMIT 10");

while($row = mysql_fetch_array($rpm)){echo'

	<item>
		<title><![CDATA[ Respuesta de '.$row['nick'].' ]]></title>
		<link>'.$url.'/comunidades/'.$te['shortname'].'/'.$idte.'/'.corregir($title).'.html</link>
		<pubDate>Thu,9 Sep 2010 19:21:37 -0300</pubDate>
		<comments>'.$url.'/comunidades/'.$te['shortname'].'/'.$idte.'/'.corregir($title).'.html#respuestas</comments>
		<description><![CDATA[ '.BBparse($row['respuesta']).' 		<p><strong><a href="'.$url.'/comunidades/'.$te['shortname'].'/'.$idte.'/'.corregir($title).'.html">Seguir leyendo...</a></strong></p> ]]></description>
	</item>';}
?>
</channel>
</rss>