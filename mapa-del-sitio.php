<?php
include("header.php");
$titulo	=	"Mapa del sitio";
cabecera_normal();
?>
<div id="cuerpocontainer">

<div class="mapa_del_sitio">
	<div class="box_title" >
		<div class="box_txt">Home</div>

		<div class="box_rrs">
			<div class="box_rss"></div> 
		</div>
	</div>
	<div class="box_cuerpo">
		<ul>
    <li><a href="/anunciate"><b>Anuncie en Z!</b></a></li>
    <li><a href="/chat">Chat</a></li>
    <li><a href="/contactenos/">Contacto</a></li>
    <li><a href="/denuncia-publica/">Denuncias</a></li>
    <li><a href="/enlazanos/">Enlazanos</a></li>
    <li><a href="/mapa-del-sitio/">Mapa del sitio</a></li>
    <li><a href="/protocolo">Protocolo</a></li>
    <li><a href="/busquedas/">Trabaja en Zincomienzo!</a></li>
    <li><a href="/terminos-y-condiciones/">T&eacute;rminos y condiciones</a></li>
    <li><a href="/privacidad-de-datos/">Privacidad de datos</a></li>












</ul>
	</div>
	<br class="space" />
</div>
<div class="mapa_del_sitio">
	<div class="box_title">
		<div class="box_txt">Categor&iacute;as</div>

		<div class="box_rrs">
			<div class="box_rss"></div> 
		</div>
	</div>
	<div class="box_cuerpo">
		<ul>
			<ul>
<?php
$categorias	=	mysql_query("SELECT * FROM categorias ORDER BY nom_categoria ASC");
while($row=mysql_fetch_array($categorias))
{echo'

<li class="categoriaPost '.$row['link_categoria'].'">
    <a href="" target="_self" title="'.$row['nom_categoria'].'">'.$row['nom_categoria'].'</a>
    </li>';}

?>

			</ul>
		</ul>
	</div>
	<br class="space" />
</div>
<div class="mapa_del_sitio">
	<div class="box_title">

		<div class="box_txt"><img alt="RSS" title="RRS" src="http://o1.t26.net/images/rss.gif" heigth="14" width="14" border="0" align="absmiddle"> RSS</div>
		<div class="box_rrs">
			<div class="box_rss"></div> 
		</div>
	</div>
	<div class="box_cuerpo">
		<ul>
			<ul>

			<li><a href="/rss/ultimos-post">&Uacute;ltimos posts</a></li>
			</ul>
		</ul>
	</div>
	<br class="space" />

</div><div style="clear:both"></div>
<!-- fin cuerpocontainer -->

	
<?php
pie();
?>


 