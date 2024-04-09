<?php
include("header.php");
$time = time();
include("online/online.php");
$titulo	= $descripcion;
function PaisHome($string)
 {
    switch ($string)
    {
	  default;
      case "0":
      return'Global';
      break;
      case "AR":
      return"Argentina";
      break;
      case "CL":
      return "Chile";
      break;
      case "CO":
      return "Colombia";
      break;
      case "ES":
      return"Espa&ntilde;a";
      break;
      case "US":
      return"Estados Unidos";
      break;
      case "MX":
      return"M&eacute;xico";
      break;
      case "PE":
      return"Per&uacute;";
      break;
      case "UY":
      return"Uruguay";
      break;
      case "VE":
      return"Venezuela";
      break;
    }
 }
cabecera_index();
echo'
<style>

.box_title {
background: url(/images/box_title_2.png) repeat-x #E1E1E1;
border: solid 1px #CCCCCC;
text-shadow:0 1px 0 #FFFFFF;
padding-top: 5px;
padding-bottom: 5px;
font-size: 12px;
font-weight: bold;
}

.box_cuerpo{
background: #F9F9F9;
border-bottom: 1px solid #CCCCCC;
border-left: 1px solid #CCCCCC;
border-right: 1px solid #CCCCCC;
font-size: 11px;
}

.box_cuerpo div.filterBy {
  background: #ececec;
}

.avam {margin: 5px;border: 1px solid #cccccc;padding: 1px;height: 48px;width: 48px;}
.avam:hover {border: 1px solid #000;}
.bienvm {background:#FFFFCC; border:1px solid #FFCC33; padding:5px;margin:5px 0 0 0;font-weight: bold; text-align:center;-moz-border-radius: 5px}


</style>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script src="http://o2.t26.net/images/js/es/beta_acciones2.js?6.7.0" type="text/javascript"></script>




<script type="text/javascript">
(new Image()).src=\''.$images.'/big1v12.png\';
</script>

<div id="izquierda">
<div class="box_title" style="_width:380px">
<div class="box_txt ultimos_posts">&Uacute;ltimos posts '; if($_COOKIE['pais_home'] and $_COOKIE['pais_home'] !=="0"){echo' de '.PaisHome(strtoupper($_COOKIE['pais_home'])).'';} echo'</div>
<div class="box_rss">
	<a href="/rss/ultimos-post">
		<span style="position:relative;z-index:87" class="systemicons sRss"></span>
	</a>
</div>
</div>
<!-- inicio posts -->
<div class="box_cuerpo">
<ul>';
include('posts.php');
echo'
<!-- fin posts -->
</div>

<div id="centro">
<div class="new-search posts"><!-- buscador -->
	<div class="bar-options">
		<ul class="clearfix">
			<li class="web-tab"><a>Web</a></li>			
			<li class="posts-tab selected"><a>Posts</a></li>
			<li class="comunidades-tab"><a>Comunidades</a></li></ul>
	</div>
	<div class="search-body clearfix">
<form name="search" action="http://buscar.zincomienzo.net/posts">
			<input type="hidden" name="engine" value="google" /> 
			<div class="input-search-left"></div>
			<input class="input-search-middle" name="q" type="text" value="Buscar" autocomplete="off" />
			<div class="input-search-right"></div>
			<a href="javascript:$(\'form[name=search]\').submit()" class="btn-search-home"></a>
		</form>
	</div>
</div>';
$mb=mysql_query("SELECT count(*) as cantidad FROM usuarios");
$mbz=mysql_fetch_array($mb);
$poz=mysql_query("SELECT count(*) as cantidad FROM posts");
$pos=mysql_fetch_array($poz);
$cmz=mysql_query("SELECT count(*) as cantidad FROM comentarios");
$com=mysql_fetch_array($cmz);
$cone=mysql_query("SELECT * FROM usuarios WHERE ultimaaccion>unix_timestamp()-2*60 ORDER BY ultimaaccion DESC");
$conez=mysql_num_rows($cone);
echo'
<div id="estadisticasBox"><!-- estadisticas -->
<!--<div class="box_title"><span class="box_txt estadisticas">Estad&iacute;sticas</span><span class="box_rss"></span></div>-->
<div class="box_cuerpo" style="border:1px solid #ccc;-moz-border-radius:5px;border-radius:5px">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<a href=\'/usuarios-online/\' class=\'usuarios_online\'>'.$usuarios.' usuarios online</a></td>
<td>'.$mbz['cantidad'].'  miembros</td>
</tr>
<tr>
<td>'.$pos['cantidad'].'  posts</td>
<td>'.$com['cantidad'].'  comentarios</td>

</tr>
</table>



</div>
<!-- ultimos comentarios -->
<br class="space" />
<div id="lastCommBox">
	<div class="box_title">
		<div class="box_txt ultimos_comentarios">&Uacute;ltimos comentarios</div>
		<div class="box_rss">
		
    <a href="#" class="size9" onclick="actualizar_comentarios(\'-1\',\'0\'); return false;">
				<span class="systemicons actualizar"></span>
			</a>
		</div>
	</div>
<div class="box_cuerpo" id="ult_comm" style="padding:0;height:240px">


		<ol id="filterByTodos" class="filterBy" style="display:block;margin:8px;padding:0">


<ul>';
require_once('ultimos_comentarios.php');
echo'
</ul></ol>

<ol id="filterByPais" class="filterBy" style="margin:8px;padding:0">';
require_once('ultimos_comentariosm.php');
echo'</ol>

</div>
</div>
</div>

';
if($direccion[2]!="novatos"){echo'
<div id="trendsBox"><br class="space" />

	<div class="box_title">
		<div class="box_txt ultimos_comentarios">
			Posts destacados			<a href="/destacados" class="size9">(Ver m&aacute;s)</a>
		</div>
	</div>
	<div class="box_cuerpo" style="padding: 0; height: 232px">
		<div class="filterBy"><a id="15m" href="javascript:TopsTabs(\'trendsBox\',\'15m\')" class="here">15m</a> - <a id="1h" href="javascript:TopsTabs(\'trendsBox\',\'1h\')">1h</a> - <a id="3h" href="javascript:TopsTabs(\'trendsBox\',\'3h\')">3h</a> - <a id="6h" href="javascript:TopsTabs(\'trendsBox\',\'6h\')">6h</a></div>

				<ol class="filterBy cleanlist" id="filterBy15m" style="display: block">';

$fechaayer = time() - (60*15);
$sqlsemana = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha2 BETWEEN '$fechaayer' AND unix_timestamp() ORDER BY p.visitas DESC LIMIT 10");

while($semana = mysql_fetch_array($sqlsemana))
{	
	$a=$a+01;
	echo'<li>'; if($a<10){echo'0';}echo''.$a.'. <a href="/posts/'.$semana['link_categoria'].'/'.$semana['id'].'/'.corregir($semana['titulo']).'.html">'.cortar($semana['titulo'],'40').'</a> <span></span></li>';
}
mysql_free_result($sqlsemana);

echo'
</ol>
				<ol class="filterBy cleanlist" id="filterBy1h">';

$fechadia = time() - (60*60*1);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 10");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a> <span>'.$dia['puntos'].'</span> </li>';}
mysql_free_result($sqldia);

echo'
</ol>
				<ol class="filterBy cleanlist" id="filterBy3h">';

$fechadia = time() - (60*60*3);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 10");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a> <span>'.$dia['puntos'].'</span> </li>';}
mysql_free_result($sqldia);

echo'
</ol>
				<ol class="filterBy cleanlist" id="filterBy6h">';

$fechadia = time() - (60*60*6);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 10");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a> <span>'.$dia['puntos'].'</span> </li>';}
mysql_free_result($sqldia);

echo'
</ol>
					
			</div>
</div>



<!-- top posts -->

<div id="topsPostBox">
<br class="space" />

<div class="box_title">
<div class="box_txt tops_posts_semana">TOPs posts <a href="/top/" class="size9">(Ver m&aacute;s)</a></div>
<div class="box_rss">
<a href="/rss/top-post-semana">
<span class="systemicons sRss"></span>
</a>
</div>
</div>
<div class="box_cuerpo" style="padding: 0pt; height: 330px;">
    <div class="filterBy">
        <a id="Ayer" href="javascript:TopsTabs(\'topsPostBox\',\'Ayer\')">Ayer</a> - <a id="Semana" href="javascript:TopsTabs(\'topsPostBox\',\'Semana\')" class="here">Semana</a> - <a id="Mes" href="javascript:TopsTabs(\'topsPostBox\',\'Mes\')">Mes</a> - <a id="Historico" href="javascript:TopsTabs(\'topsPostBox\',\'Historico\')">Hist&oacute;rico</a>    </div>
    <ol class="filterBy cleanlist" id="filterByAyer">';

$fechadia = time() - (60*60*24*2);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 15");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a> <span>'.$dia['puntos'].'</span> </li>';}
mysql_free_result($sqldia);

echo'</ol>
<ol class="filterBy cleanlist" id="filterBySemana">';

$fechasemana = time() - (60*60*24*7);
$sqlsemana = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechasemana' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 15");
$contador = 0;
while($semana = mysql_fetch_array($sqlsemana)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/posts/'.$semana['link_categoria'].'/'.$semana['id'].'/'.corregir($semana['titulo']).'.html">'.cortar($semana['titulo'],'40').'</a><span>'.$semana['puntos'].'</span></li>';}
mysql_free_result($sqlsemana);

echo'
</ol>
<ol class="filterBy cleanlist" id="filterByMes">';

$fechames = time() - (2592000);
$sqlmes = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechames' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 15");
$contador = 0;
while($mes = mysql_fetch_array($sqlmes)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/posts/'.$mes['link_categoria'].'/'.$mes['id'].'/'.corregir($mes['titulo']).'.html">'.cortar($mes['titulo'],'40').'</a><span>'.$mes['puntos'].'</span></li>';}
mysql_free_result($sqlmes);

echo'
</ol>
<ol class="filterBy cleanlist" id="filterByHistorico">';
$sqlhisto = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria ORDER BY p.puntos DESC LIMIT 15");
$contador = 0;
while($histo = mysql_fetch_array($sqlhisto)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/posts/'.$histo['link_categoria'].'/'.$histo['id'].'/'.corregir($histo['titulo']).'.html">'.cortar($histo['titulo'],'40').'</a><span>'.$histo['puntos'].'</span></li>';}
mysql_free_result($sqlhisto);

echo'
</ol>
</div>
</div>
<div id="topsUserBox">
<br class="space" />
<div class="box_title">
<div class="box_txt tops_usuarios">Usuarios TOPs <a href="/top/usuarios/" class="size9">(Ver m&aacute;s)</a></div>

<div class="box_rss">
  <a href="/rss/usuarios-top-mes">
    <span class="systemicons sRss"></span>
  </a>
</div>
</div>
<div class="box_cuerpo" style="padding: 0pt; height: 330px;">
    <div class="filterBy">
        <a id="AyerUser" href="javascript:TopsTabs(\'topsUserBox\',\'AyerUser\')">Ayer</a> - <a id="SemanaUser" href="javascript:TopsTabs(\'topsUserBox\',\'SemanaUser\')">Semana</a> - <a id="MesUser" href="javascript:TopsTabs(\'topsUserBox\',\'MesUser\')" class="here">Mes</a> - <a id="HistoricoUser" href="javascript:TopsTabs(\'topsUserBox\',\'HistoricoUser\')">Hist&oacute;rico</a>    </div>
    <ol class="filterBy cleanlist" id="filterByAyerUser">';
$fuserhoy = time() - (60*60*24*2);
$sqluserhoy = mysql_query("SELECT nick,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fuserhoy' AND unix_timestamp() ORDER BY puntos DESC LIMIT 15");
$contador = 0;
while($userhoy = mysql_fetch_array($sqluserhoy)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/perfil/'.$userhoy['nick'].'">'.$userhoy['nick'].'</a><span>'.$userhoy['puntos'].'</span></li>';}
mysql_free_result($sqluserhoy);
echo'
    </ol>
    <ol class="filterBy cleanlist" id="filterBySemanaUser">';
$fusemana = time() - (60*60*24*7);
$sqlusemana = mysql_query("SELECT nick,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fusemana' AND unix_timestamp() ORDER BY puntos DESC LIMIT 15");
$contador = 0;
while($usemana = mysql_fetch_array($sqlusemana)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/perfil/'.$usemana['nick'].'">'.$usemana['nick'].'</a><span>'.$usemana['puntos'].'</span></li>';}
mysql_free_result($sqlusemana);
echo'
</ol>
    <ol class="filterBy cleanlist" id="filterByMesUser" style="display: block">';
$fumes = time() - (2592000);
$sqlumes = mysql_query("SELECT nick,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fumes' AND unix_timestamp() ORDER BY puntos DESC LIMIT 15");
$contador = 0;
while($umes = mysql_fetch_array($sqlumes)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/perfil/'.$umes['nick'].'">'.$umes['nick'].'</a><span>'.$umes['puntos'].'</span></li>';}
mysql_free_result($sqlumes);
echo'
</ol>
<ol class="filterBy cleanlist" id="filterByHistoricoUser">';
$sqluhist = mysql_query("SELECT nick,puntos FROM usuarios ORDER BY puntos DESC LIMIT 15");
$contador = 0;
while($uhist = mysql_fetch_array($sqluhist)){$contador++;
echo'<li>';if($contador<10){echo'0'.$contador;}else{echo $contador;}echo'. <a href="/perfil/'.$uhist['nick'].'">'.$uhist['nick'].'</a><span>'.$uhist['puntos'].'</span></li>';}
mysql_free_result($sqluhist);
echo'
</ol>
</div>
</div>




';}
echo'</div>
<div id="derecha">';
?>
 <style>
		#show-paises-lista {
			cursor: pointer
		}
		#paises-lista {
			display: block;
			border: 1px solid #CCC;
			background: #EEE;
			padding: 3px;
		}
		#paises-lista li{
			display: block;
			float: left;
			width: 45%;
			padding: 3px;
		}
	</style>
	<div class="clearfix clearBeta clearboth" style="margin-bottom:10px">
		<div id="show-paises-lista" class="clearfix clearBeta clearboth">
			<span class="floatL" style="padding:3px 0 0">
				<a style="font-size:10px;color:#666;font-weight:bold">Filtrar informaci&oacute;n para:</a>
			</span>
			<span class="floatR" style="background:#004a95;font-weight:bold;color:#FFF; -moz-border-radius:3px;padding:3px 6px;-webkit-border-radius:3px; border-radius:3px">
								<img src="<?php if(!$_COOKIE['pais_home']){echo'/images/global.png';} elseif($_COOKIE['pais_home']=="0"){echo'/images/global.png';}else{echo'/images/flags/'.$_COOKIE['pais_home'].".png";}?>" style="vertical-align:middle" /> <?=PaisHome(strtoupper($_COOKIE['pais_home']))?>
							</span>
		</div>
		<div class="clearfix clearBeta clearboth" style="margin-top:5px">
			<ul id="paises-lista" class="clearfix clearBeta clearboth" style="display:none">
            
				<li><a data-country="0"><img data-lazy="http://o2.t26.net/images/global.png" width="11" style="margin:0 3px 0 2px" /> Global</a> </li>
								<li><a data-country="ar"><img data-lazy="http://o2.t26.net/images/flags/ar.png" /> Argentina</a> </li>
								<li><a data-country="cl"><img data-lazy="http://o2.t26.net/images/flags/cl.png" /> Chile</a> </li>
								<li><a data-country="co"><img data-lazy="http://o2.t26.net/images/flags/co.png" /> Colombia</a> </li>
								<li><a data-country="es"><img data-lazy="http://o2.t26.net/images/flags/es.png" /> Espa&ntilde;a</a> </li>
								<li><a data-country="us"><img data-lazy="http://o2.t26.net/images/flags/us.png" /> Estados Unidos</a> </li>
								<li><a data-country="mx"><img data-lazy="http://o2.t26.net/images/flags/mx.png" /> M&eacute;xico</a> </li>
								<li><a data-country="pe"><img data-lazy="http://o2.t26.net/images/flags/pe.png" /> Per&uacute;</a> </li>
								<li><a data-country="uy"><img data-lazy="http://o2.t26.net/images/flags/uy.png" /> Uruguay</a> </li>
								<li><a data-country="ve"><img data-lazy="http://o2.t26.net/images/flags/ve.png" /> Venezuela</a> </li>
							</ul>
		</div>
	</div>
	<script type="text/javascript">
		$('#show-paises-lista').click(function(){
			$('#paises-lista li a img[data-lazy]').each(function(){
				$(this).attr('src', $(this).attr('data-lazy'));
			});
			$('#paises-lista').toggle();
		});
		$("#paises-lista li a").click(function(){
			var pais = $(this).attr('data-country');
			eraseCookie("pais_home");
			createCookie("pais_home", pais, 1);
			pais = readCookie("pais_home");
			if (pais) {
				location.reload();
			}
		});
	</script>

<?php
		getLocation($cCity, $cCoords);
		getWeather($cCity, $weather, true);
echo'
		<div class="climaHome clearbeta">

		<div class="clima-h-city">
			<a href="/clima" style="color:#000;text-decoration:none">El clima en '.$cCity.'</a>';
if($_SESSION['id']!=null){echo '<a href="/cuenta"><img src="'.$images.'/edit_c.png" class="changec" /></a>'; }echo'
            </div>
		<div class="clima-h-data" onclick="$(\'.climaH-ext\').toggle()">
		<img style="vertical-align:top" src="'.$images.'/clima/'.$weather['current']['icon'].'.png" title="'.$weather['current']['stat'].'" /> <strong><span style="color:#666">Temp</span> '.$weather['current']['temp'].'&deg; <span style="color:#666"> - Hum</span> '.$weather['current']['hum'].'</strong>

		<a class="expand"></a>
		<div class="climaH-ext" style="display: none">
		    <ul>
			    <li>
			    	<div class="floatL" style="font-weight:normal;text-transform:uppercase;color:#333">Ma&ntilde;ana</div>
				    <div class="floatR"><img src="'.$images.'/clima/'.$weather['current']['icon'].'.png" alt="" /> <strong><span style="color:#666">Min</span> <span style="color:#007ADE">18&deg;</span><span style="color:#666"> - Max</span> <span style="color:#F40000">32&deg;</span></strong></div>

			    </li>
			    <li>
			    	<div class="floatL" style="font-weight:normal;text-transform:uppercase;color:#333">Pasado</div>
				    <div class="floatR"><img src="'.$images.'/clima/'.$weather['current']['icon'].'.png" alt="" /> <strong><span style="color:#666">Min</span> <span style="color:#007ADE">15&deg;</span><span style="color:#666"> - Max</span> <span style="color:#F40000">30&deg;</span></strong></div>

			    </li>
			    <li style="text-align:center;padding-top:7px;background:#f1f1f1"><a href="/clima" style="color:#1571ba;">M&aacute;s informaci&oacute;n sobre el tiempo &raquo;</a></li>
			</ul>
			</div>
		</div>';
		if($_SESSION['id']==null)
		{echo'<div style="border-top:#CCCCCC 1px solid ; text-align:center; padding:4px 3px 3px 3px;margin-top:6px;">
			<a onclick="registro_load_form(); return false">Registrate para cambiar de ciudad</a>
		</div>';}
			echo'</div>
	



<div class="climaHome clearbeta">

	<div class="clima-h-city">
		';



$sql=mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 1");

while($row=mysql_fetch_array($sql)){


echo "".$row[titulo]."";
}  
	

echo'</a>

		
	</div>
    <div class="clima-h-data">
		<div>
		';



$sql=mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 1");

while($row=mysql_fetch_array($sql)){


echo "<center><font size='-2'>".BBparse($row[detalle])."</font></center>";
}  
	

echo'	

		</div>
	</div>
</div>

<br class="space" />






'; ?>

<?php
/*  $cantidad = mysql_query("SELECT * FROM posts") or die(mysql_error());
  $tag_array = array(); 
  while($canti = mysql_fetch_assoc($cantidad)){
    $men = explode(",",$canti['tags']); 
    $tag_array[] = $men;	
  }
  $i = 0;
  foreach($tag_array as $ar){
    $i++; 
  }
  */
  
/*$tags = array();
$sql   = mysql_query("SELECT tags FROM posts WHERE id > 0") 
 while($fila = mysql_fetch_assoc($sql){
	$tags[] = $fila['tags'];
}
$tags = implode(',', $tags);
$cola = explode(',' $tags);
$total = count($cola);*/


    
 
$sql = "SELECT * FROM posts WHERE elim = 0 ORDER BY id DESC LIMIT 5 ";
$roc = mysql_query($sql) or die(mysql_error());

function Contar($palabra, $matriz){    
 
	$i = 0;
    
    foreach($matriz as $valor){
        
		if( $palabra == $valor ){
            $i++;
        }
    }
    
    return $i;
}

?>

<div id="tags-trendsBox">
	<br class="space">
	<div class="box_title">
		<div class="box_txt ultimos_comentarios">&Uacute;ltimos tags relevantes</div>
	</div>
	<div class="box_cuerpo" style="padding:0">		
		<div id="tagcloud" class="textrank-tags">
		<?php
		  while($row = mysql_fetch_assoc($roc)){
		  $tags = explode(",",$row['tags']);
		  //$tags =
		  array_unique($tags);
		  shuffle($tags);
		  foreach($tags as $tag){
    
		     echo'<span class="tag-size'.rand(1,5).'"> <a rel="tag" href="/tags/'.htmlspecialchars($tag).'">'.htmlspecialchars($tag).'</a></span>';
            }		
		} ?>
		

		
		
		</div>
	</div>
</div>
<br class="space" />



<?php

echo'



<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a href="/juegos/" title="Juegos Zincomienzo!" style="color:#000">Juegos '.$comunidad.'</a>
		<img class="changec" style="vertical-align:middle" src="/images/game.png" alt="" />
	</div>
    <div class="clima-h-data">
		<div>
			<a href="/juegos/damas/" alt="Damas" title="Damas">Damas</a>,
			<a href="/juegos/ajedrez/" alt="Ajedrez" title="Ajedrez">Ajedrez</a>,
			<a href="/juegos/parchis/" alt="Parchis" title="Parchis">Parchis</a>,
			<a href="/juegos/poker/" alt="Poker Texas Hold\'em" title="Poker Texas Hold\'em">Poker</a>,
			<a href="/juegos/tetris/" alt="Tetris" title="Tetris">Tetris</a>,
			<a href="/juegos/batalla-naval/" alt="Batalla naval" title="Batalla naval">Batalla naval</a>

		</div>
	</div>
</div>


<br class="space" />


<div class="box_cuerpo">

<center>
<!-- BEGIN SMOWTION TAG - 160x600 - zincomienzo: p2p - DO NOT MODIFY -->
<script type="text/javascript"><!--
smowtion_size = "160x600";
smowtion_section = "1165924";
//-->
</script>
<script type="text/javascript"
src="http://ads.smowtion.com/ad.js">
</script>
<!-- END SMOWTION TAG - 160x600 - zincomienzo: p2p - DO NOT MODIFY -->
</center></div>





</div>';
pie();
?>
