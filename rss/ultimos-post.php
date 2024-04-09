<?php
include("../header.php");

$sqlposts=mysql_query("SELECT p.*,c.*,u.rango 
					  FROM posts p LEFT JOIN categorias c ON c.id_categoria=p.categoria 
					  LEFT JOIN usuarios u ON u.id=p.id_autor 
					  WHERE p.elim='0' AND u.rango>'11' 
					  ORDER BY p.id DESC LIMIT 15");

header('Content-Type: text/xml');
echo'<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" 
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/">
<channel>
<title>'.$comunidad.' - '.utf8_encode("&#218;ltimos posts").'</title>
<description>'.utf8_encode("&#218;ltimos posts").' de Zincomienzo.net</description>
<image><title>Zincomienzo!</title><link>'.$url.'/</link><url>'.$images.'/logo-rss.gif</url></image>
<generator>'.$url.'</generator>
<language>es</language>
<link>'.$url.'</link>';

while($row=mysql_fetch_array($sqlposts)){
echo'
        <item>
			<title>'.$row['titulo'].' ('.$row['puntos'].' puntos)</title>
			<link>'.$url.'/posts/'.$row['link_categoria'].'/'.$row['id'].'/'.$row['titulo'].'.html</link>
			<pubDate>'.date("d.m.Y", date($row['fecha'])).' a las '.date("H:m:s", date($row['fecha'])).' hs.</pubDate>
			<category><![CDATA['.$row['link_categoria'].']]></category>
			<comments>'.$url.'/posts/'.$row['link_categoria'].'/'.$row['id'].'/'.$row['titulo'].'.html#comentarios</comments>

			<description><![CDATA['.cortar(BBparse($row['contenido']),'501').'
            <p><strong><a href=\''.$url.'/posts/'.$row['link_categoria'].'/'.$row['id'].'/'.$row['titulo'].'.html\'>Seguir leyendo... >></a></strong></p>]]></description>
		</item>';
}
echo'
</channel>
</rss>';
mysql_free_result($sqlposts);
?>