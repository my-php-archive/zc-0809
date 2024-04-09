<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
?>

			    <div id="main-col">

	<div id="full-col" class="post-deleted notFound">
		<div class="content-splash">
			<h3>Oops, lo que est&aacute;s buscando no est&aacute; por aqu&iacute;!</h3>
			Pero no te escapes, aun pod&eacute;s seguir busc&aacute;ndolo..			<div class="searchFil">
				<div style="margin-bottom: 5px;">

					<div class="tabs404 filterBy filterFull clearfix ui-corner-all">
						<ul class="select-search">
							<li class="here"><a>Posts</a></li>
							<li><a>Comunidades</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>

				<div class="boxBox">
					<div class="searchEngine">
						<div id="PostsSearch">
							<form style="padding:0;margin:0" name="buscador" method="get" action="/buscar/posts/">
								<input type="text" name="q2" size="25" class="searchBar real-shadow rounded searchq" id="search-big" value="" />
								<a class="btn_search ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" type="hidden" name="q" value="">Buscar</a>
							</form>
						</div>

						<div id="ComunidadesSearch" style="display:none">
							<form style="padding:0;margin:0" name="buscador" method="get" action="/buscar/temas/">
								<input type="text" name="q2" size="25" class="searchBar real-shadow rounded searchq" id="search-big" value="" />
								<a class="btn_search ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" type="hidden" name="q" value="">Buscar</a>
							</form>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<h4>..o visitar el mejor contenido de la semana:</h4>
			<div id="TopsPosts" class="list">


<?php
$sql = "SELECT p.titulo, p.puntos, p.categoria, p.id, p.fecha, c.id_categoria, c.nom_categoria, c.link_categoria 
		FROM (posts AS p, categorias AS c) WHERE p.categoria=c.id_categoria AND p.elim=0 
		ORDER BY p.puntos DESC LIMIT 15 ";
$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs)){

$id = $row['id'];
$link_categoria = $row['link_categoria'];
$titulop	=	$row['titulo'];
$fecha	=	$row['fecha'];
$puntos = $row['puntos'];
$cant = strlen($titu);

if($cant > 41){

$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;

}else{

$titulo2=$titulop;
$tit=0;}
?>


<div class="list-element">

<i class="icon <?php echo $link_categoria; ?>"></i>
<a href="/posts/<?php echo $link_categoria; ?>/<?php echo $id; ?>/<?php echo corregir($titulop); ?>.html" alt="<?php echo $titulop; ?> - <?php echo $fecha; ?>" title="<?php echo $titulop; ?> - <?php echo $fecha; ?>"><?echo $titulo2; if ($tit==1) echo"...";?></a>

</div>


<?php
}
?>
</div>
		
			<div id="TopsComunidades" class="list" style="display:none">
						</div>
		</div>
	</div>
</div>
		

<?php
pie();
?>