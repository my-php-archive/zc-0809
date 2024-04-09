<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();

$autor	=	xss(no_i($_GET['autor']));
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container720 floatL">

  <div class="box_title">
    <span class="box_txt ultimos_comentarios_de">&Uacute;ltimos comentarios de <?=$autor?></span>
    <span class="box_rss"></span>
  </div>
  <div class="box_cuerpo">
<?
$comentarios	=	"SELECT c.id AS CID, c.fecha, c.autor, c.id_autor, c.id_post, c.comentario, u.id, u.nick, p.id AS PID, p.id_autor, p.categoria, p.titulo, ca.id_categoria, ca.link_categoria, ca.nom_categoria
					FROM (comentarios AS c, usuarios AS u, posts AS p, categorias AS ca)
					WHERE c.autor='$autor'
					AND c.id_post=p.id
					AND p.id_autor=u.id
					AND p.categoria=ca.id_categoria
					ORDER BY c.fecha DESC";
$cmntrs	=	mysql_query($comentarios, $con);
while($row=mysql_fetch_array($cmntrs)){
?>
		<span class="categoria <?=$row['link_categoria']?>" alt="<?=$row['nom_categoria']?>" title="<?=$row['nom_categoria']?>"></span> <a href="/posts/<?=$row['link_categoria']?>/<?=$row['PID']?>/Los-mejores-efectos-de-sonido-de-la-Warner-Bros.html"><strong><?=$row['titulo']?></strong></a><br /><div style="clear:both"></div>
		<div class="perfil_comentario"><?echo date("d.m.Y H:m:s",$row['fecha'])?>: <a href="/posts/<?=$row['link_categoria']?>/<?=$row['PID']?>/Los-mejores-efectos-de-sonido-de-la-Warner-Bros.html#cmnt_<?=$row['CID']?>"><?=$row['comentario']?></a></div>

		<hr />
<?
}
?>
		
	</div>
</div>
<div class="container208 floatR">
	<div class="box_title">
    <span class="box_txt publicidad_ultimos_comentarios_de">Publicidad</span>
    <span class="box_rss"></span>
	</div>
	<div class="box_cuerpo">
		<center>

Publicidad
		</center>
	</div>
</div>
<div style="clear:both"></div>
<hr />
<br clear="left" />
<center>
Publicidad
</center>
<?
pie();
?>
