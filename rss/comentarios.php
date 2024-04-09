<?php
require_once("../header.php");

$id	=	xss(no_i($_GET['id']));

$existe	=	mysql_query("SELECT com.fecha, com.id AS CID, com.id_autor, com.id_post, com.comentario, p.id as PID, p.titulo, p.categoria, u.id, u.nick
						FROM (comentarios AS com, posts AS p, usuarios AS u)
						WHERE com.id_autor=u.id
						AND com.id_post=p.id
						AND p.id='$id'");
$row	=	mysql_fetch_array($existe);
echo '<?xml version="1.0" encoding="UTF-8"?>	<rss version="2.0" 
	     xmlns:content="http://purl.org/rss/1.0/modules/content/"
	     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	     xmlns:dc="http://purl.org/dc/elements/1.1/"
	 >
	<channel>
		<title>'.$comunidad.' - Comentarios para el post: '.$row['titulo'].'</title>
		<description>Comentarios para el post '.$row['titulo'].' de '.$comunidad.'</description>
		<image><title>'.$comunidad.'</title><link>'.$url.'/</link><url>'.$images.'/logo-rss.gif</url></image>
		<generator>'.$url.'/</generator>
		<language>es</language>
		<link>'.$url.'/posts/categoria/'.$row['PID'].'/'.corregir($row['titulo']).'.html#'.$row['CID'].'</link>';

while ($row2 = mysql_fetch_array($existe))
{
?>
				<item>
					<title>Comentario de <?=$row2['nick']?></title>
					<link><?=$url?>/posts/categoria/<?=$row['PID']?>/<?=corregir($row['titulo'])?>.html#<?=$row['CID']?></link>
					<dc:creator><?=$row2['nick']?></dc:creator>

					<pubDate><?=date("D, d M y H:m:s", $row2['fecha'])?></pubDate>
					<description><![CDATA[<?=BBparse($row2['comentario'])?>]]></description>
				</item>
				
<?php
}
echo '
	</channel>
	</rss>';
	?>

