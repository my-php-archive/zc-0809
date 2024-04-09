<?php
include("header.php");


$direccion = explode("/", $_SERVER['REQUEST_URI']);
$section =	$direccion[2];
$titulo	=	$descripcion;


function putas($mensaje)
{
$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace(")","",$mensaje);
$mensaje = str_replace("(","",$mensaje);
$mensaje = str_replace("'", "",$mensaje);
$mensaje = str_replace('"',"",$mensaje);
$mensaje = str_replace("$","",$mensaje);
$mensaje = str_replace("%%","",$mensaje);
$mensaje = str_replace("###","",$mensaje);
$mensaje = str_replace("`","",$mensaje);
$mensaje = str_replace("´","",$mensaje);
$mensaje = str_replace("<","",$mensaje);
$mensaje = str_replace(">","",$mensaje);
$mensaje = str_replace("*","",$mensaje);
$mensaje = str_replace("insert","",$mensaje);
$mensaje = str_replace("INSERT","",$mensaje);
$mensaje = str_replace("Insert","",$mensaje);
$mensaje = str_replace("iNsert","",$mensaje);
$mensaje = str_replace("inSert","",$mensaje);
$mensaje = str_replace("insErt","",$mensaje);
$mensaje = str_replace("inseRt","",$mensaje);
$mensaje = str_replace("insERt","",$mensaje);
$mensaje = str_replace("inserT","",$mensaje);
$mensaje = str_replace("select","",$mensaje);
$mensaje = str_replace("SELECT","",$mensaje);
$mensaje = str_replace("delete","",$mensaje);
$mensaje = str_replace("DELETE","",$mensaje);
$mensaje = str_replace("Delete","",$mensaje);
$mensaje = str_replace("from","",$mensaje);
$mensaje = str_replace("FROM","",$mensaje);
$mensaje = str_replace("From","",$mensaje);
$mensaje = str_replace("fRom","",$mensaje);
$mensaje = str_replace("frOm","",$mensaje);
$mensaje = str_replace("froM","",$mensaje);
$mensaje = str_replace("FroM","",$mensaje);
$mensaje = str_replace("fRoM","",$mensaje);
$mensaje = str_replace("frOM","",$mensaje);
$mensaje = str_replace("FROm","",$mensaje);
$mensaje = str_replace("UPDATE","",$mensaje);
$mensaje = str_replace("update","",$mensaje);
$mensaje = str_replace("WHERE","",$mensaje);
$mensaje = str_replace("where","",$mensaje);
$mensaje = str_replace("Where","",$mensaje);
$mensaje = str_replace("TRUNCATE","",$mensaje);
$mensaje = str_replace("truncate","",$mensaje);
$mensaje = str_replace("Truncate","",$mensaje);
$mensaje = str_replace("into","",$mensaje);
$mensaje = str_replace("INTO","",$mensaje);
$mensaje = str_replace("Into","",$mensaje);
$mensaje = str_replace("iNto","",$mensaje);
$mensaje = str_replace("inTo","",$mensaje);
$mensaje = str_replace("intO","",$mensaje);
$mensaje = str_replace("@@","",$mensaje);
$mensaje = str_replace("--","",$mensaje);
$mensaje = str_replace("database()","",$mensaje);
$mensaje = str_replace("á","&aacute;",$mensaje);
$mensaje = str_replace("é","&eacute;",$mensaje);
$mensaje = str_replace("í","&iacute;",$mensaje);
$mensaje = str_replace("ó","&oacute;",$mensaje);
$mensaje = str_replace("ú","&uacute;",$mensaje);
$mensaje = str_replace("ñ","&ntilde;",$mensaje);
$mensaje = str_replace("Á","&Aacute;",$mensaje);
$mensaje = str_replace("É","&Eacute;",$mensaje);
$mensaje = str_replace("Í","&Iacute;",$mensaje);
$mensaje = str_replace("Ó","&Oacute;",$mensaje);
$mensaje = str_replace("Ú","&Uacute;",$mensaje);
$mensaje = str_replace("Ñ","&Ntilde;",$mensaje);
$mensaje = str_replace("or","1",$mensaje);
$mensaje = str_replace("Or","1",$mensaje);
$mensaje = str_replace("oR","1",$mensaje);
return addslashes(mysql_real_escape_string($mensaje));
}



 $cat = putas($_GET['cat']);
$fecha = putas($_GET['fecha']);


//funciones de las fechas
$fechahoy = time() - (60*60*24);
$fechayer = time() - (60*60*24*2);
$fusemana = time() - (60*60*24*7);
$fechames = time() - (2592000);
$fechamespas = time() - (5184000);
//FIN funciones de las fechas

cabecera_normal();
if($section==""){$section="posts";}
 if($cat and !is_numeric($cat))
 {
   fatal_error("Categoria debe ser un valor numerico");
 }
 if($fecha and !is_numeric($fecha))
 {
   fatal_error("Fecha debe ser un valor numerico");
 }

$sqlc = mysql_num_rows(mysql_query("SELECT * FROM categorias WHERE id_categoria = '$cat'"));
if($cat and !$sqlc)
{
  fatal_error("La categoria no existe");
}

if($section=="posts"){
//Seleccion de Categoria
if($cat!='-1'){$catego="AND p.categoria=$cat";}
if($cat==""){$catego="";}
//FIN Seleccion de Categoria
//switch tiempo
	switch ($fecha){
	case 1:
	$sort_by = "AND p.fecha BETWEEN '$fechahoy' AND unix_timestamp()";
	break;
	case 2:
	$sort_by = "AND p.fecha BETWEEN '$fechayer' AND unix_timestamp()";
	break;
	case 3:
	$sort_by = "AND p.fecha BETWEEN '$fusemana' AND unix_timestamp()";
	break;
	case 4:
	$sort_by = "AND p.fecha BETWEEN '$fechamespas' AND unix_timestamp()";
	break;
	case 5:
	$sort_by = "AND p.fecha BETWEEN '$fechames' AND unix_timestamp()";
	break;
	default:
	$sort_by = "";}
// FIN switch tiempo
?>
			    	
<div id="sidebar"><!-- SIDEBAR -->
		<div class="box filters">
			<div class="title clearfix">

				<h2>Filtrar</h2>
			</div>
			<h4>Categor&iacute;a</h4>
			 <select onchange="location.href='/top/posts/?fecha=<?=$fecha?>&cat='+$(this).val()">
					<option value="-1">Todas</option> 
							 <option <? if ($cat==1){echo'selected';}?>value="1" > Animaciones</option>
                             <option <? if ($cat==2){echo'selected';}?>value="2" >Apuntes y Monograf&iacute;as</option>

                             <option <? if ($cat==3){echo'selected';}?>value="3" >Arte</option>
                             <option <? if ($cat==4){echo'selected';}?>value="4" >Autos y Motos</option>
                             <option <? if ($cat==5){echo'selected';}?>value="5" >Celulares</option>
                             <option <? if ($cat==32){echo'selected';}?>value="6" >Ciencia y Educaci&oacute;n</option>
                             <option <? if ($cat==6){echo'selected';}?>value="7" >Comics e Historietas</option>
                             <option <? if ($cat==7){echo'selected';}?>value="8" >Deportes</option>

                             <option <? if ($cat==27){echo'selected';}?>value="24" >Zincomienzo</option>
                             <option <? if ($cat==8){echo'selected';}?>value="9" >Downloads</option>
                             <option <? if ($cat==9){echo'selected';}?>value="10" >E-books y Tutoriales</option>
                             <option <? if ($cat==33){echo'selected';}?>value="11" >Ecolog&iacute;a</option>
                             <option <? if ($cat==10){echo'selected';}?>value="12" >Econom&iacute;a y negocios</option>

                             <option <? if ($cat==11){echo'selected';}?>value="13" >Femme</option>
                             <option <? if ($cat==31){echo'selected';}?>value="14" >Hazlo tu mismo</option>
                             <option <? if ($cat==12){echo'selected';}?>value="15" >Humor</option>
                             <option <? if ($cat==13){echo'selected';}?>value="16" >Im&aacute;genes</option>
                             <option <? if ($cat==14){echo'selected';}?>value="17" >Info</option>
                             <option <? if ($cat==15){echo'selected';}?>value="18" >Juegos</option>

                             <option <? if ($cat==16){echo'selected';}?>value="19" >Links</option>
                             <option <? if ($cat==17){echo'selected';}?>value="20" >Linux y GNU</option>
                             <option <? if ($cat==21){echo'selected';}?>value="25" >M&uacute;sica</option>
                             <option <? if ($cat==28){echo'selected';}?>value="21" >Mac</option>
                             <option <? if ($cat==19){echo'selected';}?>value="22" >Manga y Anime</option>
                             <option <? if ($cat==20){echo'selected';}?>value="23" >Mascotas</option>

                             <option <? if ($cat==22){echo'selected';}?>value="26" >Noticias</option>
                             <option <? if ($cat==23){echo'selected';}?>value="27" >Off-topic</option>
                             <option <? if ($cat==24){echo'selected';}?>value="28" >Recetas y Cocina</option>
                             <option <? if ($cat==25){echo'selected';}?>value="29" >Salud y Bienestar</option>
                             <option <? if ($cat==26){echo'selected';}?>value="30" >Solidaridad</option>
                             <option <? if ($cat==28){echo'selected';}?>value="31" >Turismo</option>

                             <option <? if ($cat==29){echo'selected';}?>value="32" >TV, Peliculas y series</option>
                             <option <? if ($cat==30){echo'selected';}?>value="33" >Videos On-line</option>
									</select>

			<h4 class="sub">Per&iacute;odo</h4>
			<ul>
				<li><a href="/top/posts/?fecha=-1&cat=<?=$cat?>" <? if ($fecha=="-1" or $fecha==""){echo' class="selected"';}?>>Todos los tiempos</a></li>
					<li><a href="/top/posts/?fecha=1&cat=<?=$cat?>" <? if ($fecha==1){echo' class="selected"';}?>>Hoy</a></li>
					<li><a href="/top/posts/?fecha=2&cat=<?=$cat?>" <? if ($fecha==2){echo' class="selected"';}?>>Ayer</a></li>
					<li><a href="/top/posts/?fecha=3&cat=<?=$cat?>" <? if ($fecha==3){echo' class="selected"';}?>>&Uacute;ltimos 7 d&iacute;as</a></li>
					<li><a href="/top/posts/?fecha=4&cat=<?=$cat?>" <? if ($fecha==4){echo' class="selected"';}?>>Del mes</a></li>

					<li><a href="/top/posts/?fecha=5&cat=<?=$cat?>" <? if ($fecha==5){echo' class="selected"';}?>>Mes anterior</a></li>
			</ul>
		</div>

	</div>



<div id="main-col"><!-- POST MAIN-COL -->
		<div id="full-col" class="clearfix tops">
						<div class="box sticky">
				<div class="title clearfix">
					<h2>Top post con m&aacute;s puntos</h2>

				<span class="action">

						<i class="icon points"></i>
					</span>
				</div>
				<div class="boxy-content">
					<div class="list">
												

			<?php
$sql = "SELECT p.titulo, p.puntos, p.categoria, p.id, p.fecha, c.id_categoria, c.nom_categoria, c.link_categoria 
		FROM (posts AS p, categorias AS c) 
		WHERE p.categoria=c.id_categoria AND p.elim=0 ".$catego." ".$sort_by." 
		ORDER BY p.puntos  DESC LIMIT 15";
$rs = mysql_query($sql, $con);
$existecs=mysql_num_rows($rs);

if(!$existecs){
echo'Nada Por Aqu&iacute;...';
}

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
	
<div class="list-element clearfix">

<span class="number-list">1</span>

<i class="icon <?=$link_categoria?>"></i>
<a href="/posts/<?=$link_categoria?>/<?=$id?>/<?=corregir($titulop)?>.html" alt="<?=$titulop?> - <?=$fecha?>" title="<?=$titulop?> - <?=$fecha?>"><?echo $titulo2; if ($tit==1) echo"...";?></a>
<span class="value"><?=$puntos?></span>

</div>

<?php
}
?></div>
				</div>
			</div>
			
						<div class="box sticky">

				<div class="title clearfix">
					<h2>Top post con m&aacute;s favoritos</h2>


				<span class="action">
						<i class="icon favs"></i>
					</span>
				</div>
				<div class="boxy-content">
					<div class="list">

<?php
$sql = "SELECT p.titulo, p.puntos, p.categoria, p.id, p.fecha, p.favoritos, c.id_categoria, c.nom_categoria, c.link_categoria 
		FROM (posts AS p, categorias AS c) 
		WHERE p.categoria=c.id_categoria AND p.elim=0 ".$catego." ".$sort_by." 
		ORDER BY p.favoritos DESC LIMIT 15";
$rs = mysql_query($sql, $con);
$existecss=mysql_num_rows($rs);

if(!$existecss){
echo'Nada Por Aqu&iacute;...';
}

while($row = mysql_fetch_array($rs)){

$id = $row['id'];
$link_categoria = $row['link_categoria'];
$titulop	=	$row['titulo'];
$fecha	=	$row['fecha'];
$fav = $row['favoritos'];
$cant = strlen($titu);

if($cant > 41){
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}else{
$titulo2=$titulop;
$tit=0;}
?>
	

<div class="list-element clearfix">
<span class="number-list">1</span>
<i class="icon <?=$link_categoria?>"></i>
<a href="/posts/<?=$link_categoria?>/<?=$id?>/<?=corregir($titulop)?>.html" alt="<?=$titulop?> - <?=$fecha?>" title="<?=$titulop?> - <?=$fecha?>"><?echo $titulo2; if ($tit==1) echo"...";?></a>
<span class="value"><?=$fav?></span>
</div>

<?php
}
?>

																</div>
				</div>
			</div>
			
						<div class="box sticky">
				<div class="title clearfix">
					<h2>Top post con m&aacute;s seguidores</h2>
					<span class="action">
						<i class="icon puntos-n"></i>

					</span>
				</div>
				<div class="boxy-content">
					<div class="list">

<?php
			  	$sql = "SELECT p.titulo, p.seguidor, p.categoria, p.id, p.fecha, c.id_categoria, c.nom_categoria, c.link_categoria ";
				$sql.= "FROM (posts AS p, categorias AS c) WHERE p.categoria=c.id_categoria AND p.elim=0 ORDER BY p.seguidor DESC LIMIT 15 ";
				$rs = mysql_query($sql, $con);
                $existecssss=mysql_num_rows($rs);

if(!$existecssss){
echo'Nada Por Aqu&iacute;...';
}
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$link_categoria = $row['link_categoria'];
$tituloc	=	$row['titulo'];
$fecha	=	$row['fecha'];
$comentarios = $row['seguidor'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($tituloc), 0, 38);
$tit=1;
}
else
{
$titulo2=$tituloc;
$tit=0;
}
?>
	
<div class="list-element clearfix">
							<span class="number-list">1</span>
							<i class="icon <?=$link_categoria?>"></i>
<a href="/posts/<?=$link_categoria?>/<?=$id?>/<?=corregir($tituloc)?>.html" alt="<?=$tituloc?> - <?=$fecha?>" title="<?=$tituloc?> - <?=$fecha?>"><?echo $titulo2; if ($tit==1) echo"...";?></a>
							<span class="value"><?=$comentarios?></span>
						</div>
<?php
}
?>
					
								
			
</div>
				</div>
			</div>
			
		</div>
	</div>

		</div>

<?php
}
?>
<?php
if($section=="comunidades")
{
if($cat!='-1'){$catego="AND co.categoria=$cat";}
if($cat==""){$catego="";}
//switch tiempo
	switch ($fecha){
	case 1:
	$sort_by = "AND co.fecha BETWEEN '$fechahoy' AND unix_timestamp()";
	break;
	case 2:
	$sort_by = "AND co.fecha BETWEEN '$fechayer' AND unix_timestamp()";
	break;
	case 3:
	$sort_by = "AND co.fecha BETWEEN '$fusemana' AND unix_timestamp()";
	break;
	case 4:
	$sort_by = "AND co.fecha BETWEEN '$fechamespas' AND unix_timestamp()";
	break;
	case 5:
	$sort_by = "AND co.fecha BETWEEN '$fechames' AND unix_timestamp()";
	break;
	default:
	$sort_by = "";
	}
// FIN switch tiempo
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
	<div class="left" style="float:left;width:150px">
		<div class="boxy">
			<div class="boxy-title">
				<h3>Filtrar</h3>

				<span class="icon-noti"></span>
			</div>
			<div class="boxy-content">
				<h4>Categor&iacute;a</h4>
				<select onchange="location.href='/top/comunidades/?fecha=<?=$fecha?>&cat='+$(this).val()">
					<option value="-1">Todas</option>
												<option <? if ($cat==1){echo'selected';}?> value="1">Arte y Literatura</option>

												<option <? if ($cat==2){echo'selected';}?> value="2">Deportes</option>
												<option <? if ($cat==3){echo'selected';}?> value="3">Diversi&oacute;n y Esparcimiento</option>
												<option <? if ($cat==4){echo'selected';}?> value="4">Econom&iacute;a y Negocios</option>
												<option <? if ($cat==5){echo'selected';}?> value="5">Entretenimiento y Medios</option>
												<option <? if ($cat==6){echo'selected';}?> value="6">Grupos y Organizaciones</option>

												<option <? if ($cat==7){echo'selected';}?> value="7">Inter&eacute;s general</option>
												<option <? if ($cat==8){echo'selected';}?> value="8">Internet y Tecnolog&iacute;a</option>
												<option <? if ($cat==9){echo'selected';}?> value="9">M&uacute;sica y Bandas</option>
												<option <? if ($cat==10){echo'selected';}?> value="10">Regiones</option>
									</select>

				<hr />
				<h4>Per&iacute;odo</h4>
				<ul>
					<li><a href="/top/comunidades/?fecha=-1&cat=<?=$cat?>" <? if ($fecha=="-1" or $fecha==""){echo' class="selected"';}?>>Todos los tiempos</a></li>
					<li><a href="/top/comunidades/?fecha=1&cat=<?=$cat?>" <? if ($fecha==1){echo' class="selected"';}?>>Hoy</a></li>
					<li><a href="/top/comunidades/?fecha=2&cat=<?=$cat?>" <? if ($fecha==2){echo' class="selected"';}?>>Ayer</a></li>

					<li><a href="/top/comunidades/?fecha=3&cat=<?=$cat?>" <? if ($fecha==3){echo' class="selected"';}?>>&Uacute;ltimos 7 d&iacute;as</a></li>
					<li><a href="/top/comunidades/?fecha=4&cat=<?=$cat?>" <? if ($fecha==4){echo' class="selected"';}?>>Del mes</a></li>
					<li><a href="/top/comunidades/?fecha=5&cat=<?=$cat?>" <? if ($fecha==5){echo' class="selected"';}?>>Mes anterior</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="right" style="float:left;margin-left:10px;width:775px">
		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Comunidades m&aacute;s populares</h3>
				<span class="icon-noti popular-n"></span>
			</div>
			<div class="boxy-content">
						<ol>

<?php 
$sqldulmp=mysql_query("SELECT co.*,ca.* FROM c_comunidades co LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria WHERE 1=1 {$cat_condition} ".$catego." ORDER BY co.numm DESC LIMIT 15");
$existec=mysql_num_rows($sqldulmp);

if($existec==0){
echo'<div class="emptyData">Nada Por Aqu&iacute;...</div>';
}else{
while($temas=mysql_fetch_array($sqldulmp)){
echo'
	<li class="categoriaCom clearfix '.$temas['link_categoria'].'">
		<a class="titletema" title="'.$temas['nombre'].'" href="/comunidades/'.$temas['shortname'].'/">'.$temas['nombre'].'</a>
		<span>'.$temas['numm'].'</span>
	</li>';}}
mysql_free_result($sqldulmp);
?>
							</ol>
						</div>
		</div>
		<div class="boxy xtralarge">

			<div class="boxy-title">
				<h3>Comunidades con m&aacute;s temas</h3>
				<span class="icon-noti comunidades-n"></span>
			</div>
			<div class="boxy-content">
						<ol>
<?php 
$sqldulmt=mysql_query("SELECT co.*,ca.* FROM c_comunidades co LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria WHERE 1=1 {$cat_condition} ".$catego." ".$sort_by." ORDER BY co.numte DESC LIMIT 15");
$existec=mysql_num_rows($sqldulmt);
if($existec==0){
echo'<div class="emptyData">Nada Por Aqu&iacute;...</div>';
}else{
while($temas=mysql_fetch_array($sqldulmt)){
echo'
	<li class="categoriaCom clearfix '.$temas['link_categoria'].'">
		<a class="titletema" title="'.$temas['nombre'].'" href="/comunidades/'.$temas['shortname'].'/">'.$temas['nombre'].'</a>
		<span>'.$temas['numte'].'</span>
	</li>';}}
mysql_free_result($sqldulmt);
?>
							</ol>
						</div>
		</div>
		
		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Comunidades con m&aacute;s respuestas</h3>

				<span class="icon-noti comentarios-n-g"></span>
			</div>
			<div class="boxy-content">
						<ol>
<?php 
$sqldulmr=mysql_query("SELECT DISTINCT t.numco,co.*,ca.*,t.numco as coms
					  FROM c_temas t, c_comunidades co, c_categorias ca 
					  WHERE t.idcomunid=co.idco 
					  AND ca.id_categoria=co.categoria {$cat_condition} ".$catego." ".$sort_by." 
					  ORDER BY t.numco DESC LIMIT 15");
$existec=mysql_num_rows($sqldulmr);

if(!$existec){
echo'<div class="emptyData">Nada Por Aqu&iacute;...</div>';
}else{
while($temas=mysql_fetch_array($sqldulmr)){
echo'
<li class="categoriaCom clearfix '.$temas['link_categoria'].'">
<a class="titletema" title="'.$temas['nombre'].'" href="/comunidades/'.$temas['shortname'].'/">'.$temas['nombre'].'</a>
<span>'.$temas['coms'].'</span>
					</li>';}}
mysql_free_result($sqldulmr);
?>

							</ol>
						</div>
		</div>

		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Comunidades con m&aacute;s seguidores</h3>
				<span class="icon-noti follow-n"></span>
			</div>

			<div class="boxy-content">

<ol>
<?php 
$sqldulms=mysql_query("SELECT co.*,ca.*
					  FROM c_comunidades co, c_categorias ca 
					  WHERE co.eliminado=0 AND ca.id_categoria=co.categoria {$cat_condition} ".$catego." ".$sort_by." 
					  ORDER BY co.seguico DESC LIMIT 15");
$existec=mysql_num_rows($sqldulms);

if(!$existec){
echo'<div class="emptyData">Nada Por Aqu&iacute;...</div>';
}else{
while($temas=mysql_fetch_array($sqldulms)){
echo'
<li class="categoriaCom clearfix '.$temas['link_categoria'].'">
<a class="titletema" title="'.$temas['nombre'].'" href="/comunidades/'.$temas['shortname'].'/">'.$temas['nombre'].'</a>
<span>'.$temas['seguico'].'</span>
					</li>';}}
mysql_free_result($sqldulms);
?>
							</ol>
						</div>
		</div>


		
	</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
<?php
}
if($section=="temas"){
if($cat!='-1'){$catego="AND co.categoria=$cat";}
if($cat==""){$catego="";}

//switch tiempo
	switch ($fecha){
	case 1:
	$sort_by = "AND t.fechate BETWEEN '$fechahoy' AND unix_timestamp()";
	break;
	case 2:
	$sort_by = "AND t.fechate BETWEEN '$fechayer' AND unix_timestamp()";
	break;
	case 3:
	$sort_by = "AND t.fechate BETWEEN '$fusemana' AND unix_timestamp()";
	break;
	case 4:
	$sort_by = "AND t.fechate BETWEEN '$fechamespas' AND unix_timestamp()";
	break;
	case 5:
	$sort_by = "AND t.fechate BETWEEN '$fechames' AND unix_timestamp()";
	break;
	default:
	$sort_by = "";}
// FIN switch tiempo
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
	<div class="left" style="float:left;width:150px">
		<div class="boxy">
			<div class="boxy-title">
				<h3>Filtrar</h3>

				<span class="icon-noti"></span>
			</div>
			<div class="boxy-content">
				<h4>Categor&iacute;a</h4>
				<select onchange="location.href='/top/temas/?fecha=<?=$fecha?>&cat='+$(this).val()">
					<option value="-1">Todas</option>
												<option <? if ($cat==1){echo'selected';}?> value="1">Arte y Literatura</option>

												<option <? if ($cat==2){echo'selected';}?> value="2">Deportes</option>
												<option <? if ($cat==3){echo'selected';}?> value="3">Diversi&oacute;n y Esparcimiento</option>
												<option <? if ($cat==4){echo'selected';}?> value="4">Econom&iacute;a y Negocios</option>
												<option <? if ($cat==5){echo'selected';}?> value="5">Entretenimiento y Medios</option>
												<option <? if ($cat==6){echo'selected';}?> value="6">Grupos y Organizaciones</option>

												<option <? if ($cat==7){echo'selected';}?> value="7">Inter&eacute;s general</option>
												<option <? if ($cat==8){echo'selected';}?> value="8">Internet y Tecnolog&iacute;a</option>
												<option <? if ($cat==9){echo'selected';}?> value="9">M&uacute;sica y Bandas</option>
												<option <? if ($cat==10){echo'selected';}?> value="10">Regiones</option>
									</select>

				<hr />
				<h4>Per&iacute;odo</h4>
				<ul>
					<li><a href="/top/temas/?fecha=-1&cat=<?=$cat?>" <? if ($fecha=="-1" or $fecha==""){echo' class="selected"';}?>>Todos los tiempos</a></li>
					<li><a href="/top/temas/?fecha=1&cat=<?=$cat?>" <? if ($fecha=="1"){echo' class="selected"';}?>>Hoy</a></li>
					<li><a href="/top/temas/?fecha=2&cat=<?=$cat?>" <? if ($fecha=="2"){echo' class="selected"';}?>>Ayer</a></li>

					<li><a href="/top/temas/?fecha=3&cat=<?=$cat?>" <? if ($fecha=="3"){echo' class="selected"';}?>>&Uacute;ltimos 7 d&iacute;as</a></li>
					<li><a href="/top/temas/?fecha=4&cat=<?=$cat?>" <? if ($fecha=="4"){echo' class="selected"';}?>>Del mes</a></li>
					<li><a href="/top/temas/?fecha=5&cat=<?=$cat?>" <? if ($fecha=="5"){echo' class="selected"';}?>>Mes anterior</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="right" style="float:left;margin-left:10px;width:775px">
		
		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Temas m&aacute;s votados</h3>
				<span class="icon-noti votada-n "></span>
			</div>
			<div class="boxy-content">
						<ol>

<?php 
$sqldultv=mysql_query("SELECT t.*,co.*,us.nick,ca.* FROM c_temas t LEFT JOIN c_comunidades co ON co.idco=t.idcomunid LEFT JOIN usuarios us ON us.id=t.id_autor LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria WHERE 1=1 ".$catego." ".$sort_by." AND t.elimte=0 ORDER BY t.calificacion DESC LIMIT 15");
$existec=mysql_num_rows($sqldultv);
if($existec==0){
echo'<div class="emptyData">Nada Por Aqu&iacute;...</div>';
}else{
while($temas=mysql_fetch_array($sqldultv)){
	echo'
	<li class="clearfix categoriaCom '.$temas['link_categoria'].'">
		<a title="'.$temas['link_categoria'].' | '.$temas['titulo'].'" class="titletema" href="/comunidades/'.$temas['shortname'].'/'.$temas['idte'].'/'.corregir($temas['titulo']).'.html">'.$temas['titulo'].'</a>
		<span>'.$temas['calificacion'].'</span>
	</li>';}}
mysql_free_result($sqldultv);
?>

							</ol>
						</div>
		</div>

		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Temas m&aacute;s visitados</h3>
				<span class="icon-noti"></span>
			</div>
			<div class="boxy-content">
						<ol>

<?php 
$sqldultvi=mysql_query("SELECT t.*,co.*,us.nick,ca.* FROM c_temas t LEFT JOIN c_comunidades co ON co.idco=t.idcomunid LEFT JOIN usuarios us ON us.id=t.id_autor LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria WHERE 1=1 ".$catego." ".$sort_by." AND t.elimte=0 ORDER BY t.visitaste DESC LIMIT 15");
$existec=mysql_num_rows($sqldultvi);
if($existec==0){
echo'<div class="emptyData">Nada Por Aqu&iacute;...</div>';
}else{
while($temas=mysql_fetch_array($sqldultvi)){
	echo'
	<li class="clearfix categoriaCom '.$temas['link_categoria'].'">
		<a title="'.$temas['link_categoria'].' | '.$temas['titulo'].'" class="titletema" href="/comunidades/'.$temas['shortname'].'/'.$temas['idte'].'/'.corregir($temas['titulo']).'.html">'.$temas['titulo'].'</a>
		<span>'.$temas['visitaste'].'</span>
	</li>';}}
mysql_free_result($sqldultvi);
?>
							</ol>
						</div>
		</div>

	</div>

<?php
}
if($section=="usuarios"){
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
	<div class="left" style="float:left;width:150px">
		<div class="boxy">
			<div class="boxy-title">
				<h3>Filtrar</h3>

				<span class="icon-noti"></span>
			</div>
			<div class="boxy-content">
				<h4>Categor&iacute;a</h4>
				<select onchange="location.href='/top/usuarios/?fecha=4&cat='+$(this).val()">
					<option value="-1">Todas</option>
				</select>
				<hr />
				<h4>Per&iacute;odo</h4>

				<ul>
					<li><a href="/top/usuarios/?fecha=-1&cat=-1" class="selected">Todos los tiempos</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="right" style="float:left;margin-left:10px;width:775px">

		<div class="boxy xtralarge">
			<div class="boxy-title">

				<h3>Top usuario con m&aacute;s puntos</h3>
				<span class="icon-noti puntos-n"></span>
			</div>
			<div class="boxy-content">
						<ol>
<?php 
$sql = "SELECT nick, puntos,avatar FROM usuarios 
		WHERE ban=0 
		ORDER BY puntos 
		DESC LIMIT 15";
$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs)){
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
?>
				<li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>
					<span><?=$puntos?></span>
				</li>
<?php
}
?>
							</ol>
						</div>
		</div>

		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Top usuario con m&aacute;s seguidores</h3>
				<span class="icon-noti follow-n"></span>
			</div>
			<div class="boxy-content">
									<ol>
<?php 
$sql = "SELECT nick,seguidores,avatar FROM usuarios 
		WHERE ban=0 
		ORDER BY seguidores 
		DESC LIMIT 15";
$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs)){
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$seguidores = $row['seguidores'];
?>
			   <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>
					<span><?=$seguidores?></span>
			   </li>
<?php
}
?>
											</ol>
						</div>
		</div>

	</div>

<?php
}
pie();
?>