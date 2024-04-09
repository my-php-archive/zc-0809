<?php
include("header.php");
$time = time();
include("online/online.php");
$titulo	= $descripcion;
function PaisHome($string)
 {
    switch ($string)
    {
      case "0":
      return'Global';
      break;
      default;
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
 <script type="text/javascript">
(new Image()).src=\'http://o2.t26.net/images/big1v12.png\';


</script>
<div id="izquierda">
<!-- inicio posts -->
<div class="box_cuerpo">
<ul>




</ul>
<div id="main-col">
	<div id="left-col">
		<div class="box">
			<div class="title clearfix">

				<div class="action text">
					<select id="post-filter-select" onchange="ir_a_categoria(this.value)" autocomplete="off">
												<option selected="selected" value="">Seleccionar categor&iacute;a</option>
												<optgroup label="-"></optgroup>
												<option value="animaciones">
							<i class="icon animaciones"></i> Animaciones						</option>
												<option value="apuntes-y-monografias">

							<i class="icon apuntes-y-monografias"></i> Apuntes y Monograf&iacute;as						</option>
												<option value="arte">
							<i class="icon arte"></i> Arte						</option>
												<option value="autos-motos">
							<i class="icon autos-motos"></i> Autos y Motos						</option>

												<option value="celulares">
							<i class="icon celulares"></i> Celulares						</option>
												<option value="ciencia-educacion">
							<i class="icon ciencia-educacion"></i> Ciencia y Educaci&oacute;n						</option>
												<option value="comics">
							<i class="icon comics"></i> Comics e Historietas						</option>

												<option value="deportes">
							<i class="icon deportes"></i> Deportes						</option>
												<option value="downloads">
							<i class="icon downloads"></i> Downloads						</option>
												<option value="ebooks-tutoriales">
							<i class="icon ebooks-tutoriales"></i> E-books y Tutoriales						</option>

												<option value="ecologia">
							<i class="icon ecologia"></i> Ecolog&iacute;a						</option>
												<option value="economia-negocios">
							<i class="icon economia-negocios"></i> Econom&iacute;a y Negocios						</option>
												<option value="femme">
							<i class="icon femme"></i> Femme						</option>

												<option value="hazlo-tu-mismo">
							<i class="icon hazlo-tu-mismo"></i> Hazlo tu mismo						</option>
												<option value="humor">
							<i class="icon humor"></i> Humor						</option>
												<option value="imagenes">
							<i class="icon imagenes"></i> Im&aacute;genes						</option>

												<option value="info">
							<i class="icon info"></i> Info						</option>
												<option value="juegos">
							<i class="icon juegos"></i> Juegos						</option>
												<option value="juegos-online">
							<i class="icon juegos-online"></i> Juegos On-line						</option>

												<option value="links">
							<i class="icon links"></i> Links						</option>
												<option value="linux">
							<i class="icon linux"></i> Linux y GNU						</option>
												<option value="mac">
							<i class="icon mac"></i> Mac						</option>

												<option value="manga-anime">
							<i class="icon manga-anime"></i> Manga y Anime						</option>
												<option value="mascotas">
							<i class="icon mascotas"></i> Mascotas						</option>
												<option value="musica">
							<i class="icon musica"></i> M&uacute;sica						</option>

												<option value="noticias">
							<i class="icon noticias"></i> Noticias						</option>
												<option value="offtopic">
							<i class="icon offtopic"></i> Off-topic						</option>
												<option value="paranormal">
							<i class="icon paranormal"></i> Paranormal						</option>

												<option value="recetas-y-cocina">
							<i class="icon recetas-y-cocina"></i> Recetas y Cocina						</option>
												<option value="reviews">
							<i class="icon reviews"></i> Reviews						</option>
												<option value="salud-bienestar">
							<i class="icon salud-bienestar"></i> Salud y Bienestar						</option>

												<option value="solidaridad">
							<i class="icon solidaridad"></i> Solidaridad						</option>
												<option value="Zincomienzo">
							<i class="icon Zincomienzo"></i> Zincomienzo!						</option>
												<option value="turismo">
							<i class="icon turismo"></i> Turismo						</option>

												<option value="tv-peliculas-series">
							<i class="icon tv-peliculas-series"></i> TV, Peliculas y series						</option>
												<option value="videos">
							<i class="icon videos"></i> Videos On-line						</option>
											</select>
				</div>
				<h2>Recientes</h2>

			</div>
			<div class="list">
				';
include('posts.php');
echo'
			

</div>
<div class="view-more-list">
<a href="/pagina1">Siguiente</a>
</div>

</div>

	</div>

	
';
$mb=mysql_query("SELECT count(*) as cantidad FROM usuarios");
$mbz=mysql_fetch_array($mb);
$poz=mysql_query("SELECT count(*) as cantidad FROM posts");
$pos=mysql_fetch_array($poz);
$cmz=mysql_query("SELECT count(*) as cantidad FROM comentarios");
$com=mysql_fetch_array($cmz);
$cone=mysql_query("SELECT * FROM usuarios WHERE ultimaaccion>unix_timestamp()-2*60 ORDER BY ultimaaccion DESC");
$conez=mysql_num_rows($cone);
echo'



<div id="right-col">

		<div id="estadisticasBox" class="box"><!-- estadisticas -->
			<div class="title clearfix">
				<h2>Estadisticas</h2>
			</div>

			<div style="margin:5px 0 0 0;">
				<div class="clearfix">
					<div class="floatL"><strong>'.$conez.'</strong>  usuarios online</div>
					<div class="floatR"><strong>'.$mbz['cantidad'].'</strong>  miembros</div>
				</div>
				<div class="clearfix">

					<div class="floatL"><strong>'.$pos['cantidad'].'</strong>  posts</div>
					<div class="floatR"><strong>'.$com['cantidad'].'</strong>  comentarios</div>
				</div>
								<div class="view-more-list" style="margin-top:5px">
					<a title="Zincomienzo! en vivo" href="/envivo/">Zincomienzo! en vivo</a>

				</div>
							</div>
		</div>
		<div id="lastCommentsBox" class="box">
	<div class="title clearfix">
		<h2>Comentarios recientes</h2>
    <div class="action text">
		<a href="#" class="size9" onclick="actualizar_comentarios(\'-1\',\'0\'); return false;">

			<i class="icon refresh"></i>
		</a>
    </div>
	</div>
		<div id="lastCommentsBox-data" class="list small-list">
					
				';
require_once('ultimos_comentarios.php');
echo'
			</div>

				
</div><!-- LAST COMMENTS -->

		
			<div id="trendsPostBox" class="box"><!-- TOP POSTS -->
		<div class="title clearfix">
			<h2>Destacados</h2>

						<div class="action text drop time-tops-filter">
				<span>
					15m				</span>
				<ul id="trendsPostBox-filter" class="min-dropdown time-box">
										<li><a id="15mtrends" href="javascript:nTopsTabs(\'trendsPostBox\',\'15mtrendsPostBox\', \'15mtrends\')" class="15mtrendsPostBox">15m</a></li>
										<li><a id="1htrends" href="javascript:nTopsTabs(\'trendsPostBox\',\'1htrendsPostBox\', \'1htrends\')" class="1htrendsPostBox">1h</a></li>
										<li><a id="3htrends" href="javascript:nTopsTabs(\'trendsPostBox\',\'3htrendsPostBox\', \'3htrends\')" class="3htrendsPostBox">3h</a></li>

										<li><a id="6htrends" href="javascript:nTopsTabs(\'trendsPostBox\',\'6htrendsPostBox\', \'6htrends\')" class="6htrendsPostBox">6h</a></li>
									</ul>
			</div> 		</div>
			
							
				<div id="15mtrendsPostBox" class="list" >
					
										
			
';



$fechadia = time() - (2592000);

$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 10");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<div class="list-element clearfix">
<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
<a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a>
</div>';}
mysql_free_result($sqldia);

echo'
									
					<div class="view-more-list">
						<a href="/destacados/?cat=-1" class="">
							Ver m&aacute;s						</a>
					</div>

				</div>
									
				<div id="1htrendsPostBox" class="list"  style="display: none">
					
										
';

$fechadia = time() - (60*60*1);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 10");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<div class="list-element clearfix">
<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
<a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a>
</div>';}
mysql_free_result($sqldia);

echo'
									
					<div class="view-more-list">
						<a href="/destacados/?cat=-1" class="">
							Ver m&aacute;s						</a>
					</div>
				</div>
									
				<div id="3htrendsPostBox" class="list"  style="display: none">
					
										
';

$fechadia = time() - (60*60*3);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 10");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<div class="list-element clearfix">
<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
<a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a>
</div>';}
mysql_free_result($sqldia);

echo'
									
					<div class="view-more-list">
						<a href="/destacados/?cat=-1" class="">

							Ver m&aacute;s						</a>
					</div>
				</div>
									
				<div id="6htrendsPostBox" class="list"  style="display: none">
					
										
										';

$fechadia = time() - (60*60*6);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 10");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<div class="list-element clearfix">
<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
<a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a>
</div>';}
mysql_free_result($sqldia);

echo'
									
					<div class="view-more-list">
						<a href="/destacados/?cat=-1" class="">
							Ver m&aacute;s						</a>
					</div>

				</div>
					</div> 		<div id="topsPostBox" class="box"><!-- TOP POSTS -->
	<div class="title clearfix">
		<h2>TOP Posts</h2>
		<div class="action text drop time-tops-filter">
			<span>
				Semana			</span>

			<ul id="topsPostBox-filter" class="min-dropdown time-box">
									<li><a id="YesterdayPost" href="javascript:nTopsTabs(\'topsPostBox\',\'YesterdayPostBox\', \'YesterdayPost\')" class="YesterdayPostBox">Ayer</a></li>
									<li><a id="WeekPost" href="javascript:nTopsTabs(\'topsPostBox\',\'WeekPostBox\', \'WeekPost\')" class="active WeekPostBox">Semana</a></li>
									<li><a id="MonthPost" href="javascript:nTopsTabs(\'topsPostBox\',\'MonthPostBox\', \'MonthPost\')" class="MonthPostBox">Mes</a></li>
									<li><a id="AllPost" href="javascript:nTopsTabs(\'topsPostBox\',\'AllPostBox\', \'AllPost\')" class="AllPostBox">Todos</a></li>
							</ul>
		</div>

	</div>



<div id="WeekPostBox" class="list" style="">
				
';

$fechadia = time() - (60*60*24*7);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 15");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<div class="list-element">
			<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
			<a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a>
			<span class="value">'.$dia['puntos'].'</span>

</div>
';}
mysql_free_result($sqldia);

echo'



				
</div>
		


<div id="YesterdayPostBox" class="list" style="display:none;">
				

';

$fechadia = time() - (60*60*24*2);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 15");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<div class="list-element">
			<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
			<a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a>
			<span class="value">'.$dia['puntos'].'</span>

</div>
';}
mysql_free_result($sqldia);

echo'




</div>
		



<div id="MonthPostBox" class="list" style="display:none;">
				

';

$fechadia = time() - (2592000);
$sqldia = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria WHERE p.fecha BETWEEN '$fechadia' AND unix_timestamp() ORDER BY p.puntos DESC LIMIT 15");
$contador = 0;
while($dia = mysql_fetch_array($sqldia)){$contador++;
echo'<div class="list-element">
			<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
			<a href="/posts/'.$dia['link_categoria'].'/'.$dia['id'].'/'.corregir($dia['titulo']).'.html">'.cortar($dia['titulo'],'40').'</a>
			<span class="value">'.$dia['puntos'].'</span>

</div>
';}
mysql_free_result($sqldia);

echo'



</div>
		

<div id="AllPostBox" class="list" style="display:none;">
				

';
$sqlhisto = mysql_query("SELECT p.*,ca.link_categoria FROM posts p LEFT JOIN categorias ca ON ca.id_categoria=p.categoria ORDER BY p.puntos DESC LIMIT 15");
$contador = 0;
while($histo = mysql_fetch_array($sqlhisto)){$contador++;
echo'<div class="list-element">
			<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
			<a href="/posts/'.$histo['link_categoria'].'/'.$histo['id'].'/'.corregir($histo['titulo']).'.html">'.cortar($histo['titulo'],'40').'</a>
			<span class="value">'.$histo['puntos'].'</span>

</div>';}
mysql_free_result($sqlhisto);

echo'



</div>
		



<div class="view-more-list">
		<a href="/top/posts/" class="">
			Ver m&aacute;s		</a>
	</div>

</div><!-- TOP POSTS -->
		<div id="topsUserBox" class="box"><!-- TOP USERS -->
	<div class="title clearfix">
		<h2>TOP Usuarios</h2>
		<div class="action text drop time-tops-filter">
			<span>
				Ayer			</span>
			<ul id="topsUserBox-filter" class="min-dropdown time-box">

									<li><a id="YesterdayUser" href="javascript:nTopsTabs(\'topsUserBox\',\'YesterdayUserBox\', \'YesterdayUser\')" class="active YesterdayUserBox">Ayer</a></li>
									<li><a id="WeekUser" href="javascript:nTopsTabs(\'topsUserBox\',\'WeekUserBox\', \'WeekUser\')" class="WeekUserBox">Semana</a></li>
									<li><a id="MonthUser" href="javascript:nTopsTabs(\'topsUserBox\',\'MonthUserBox\', \'MonthUser\')" class="MonthUserBox">Mes</a></li>
									<li><a id="AllUser" href="javascript:nTopsTabs(\'topsUserBox\',\'AllUserBox\', \'AllUser\')" class="AllUserBox">Todos</a></li>
							</ul>
		</div>
	</div>

	
		<div id="YesterdayUserBox" class="list" style="">



';
$fuserhoy = time() - (60*60*24*2);
$sqluserhoy = mysql_query("SELECT nick,avatar,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fuserhoy' AND unix_timestamp() ORDER BY puntos DESC LIMIT 1");
$contador = 0;
while($userhoy = mysql_fetch_array($sqluserhoy)){$contador++;
echo'<div class="list-element user-highlight">
				<a href="/perfil/'.$userhoy['nick'].'">
					<img src="'.$userhoy['avatar'].'"  width="48" height="48" />
				</a>
				<div class="highlight-data">
				<a href="/perfil/'.$userhoy['nick'].'">
					'.$userhoy['nick'].'				</a>

				<span class="value">'.$userhoy['puntos'].'</span>
				<a		name="follow"
	onclick="notifica.follow(\'user\', , notifica.userIntopContext, $(this), false);"
		class="follow-user-top ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only">
	<i class="icon followers"></i>
	<span class="ui-button-text default-button-text">
		Seguir	</span>
	<span class="success-button-text" style="display:none">
		Dejar de seguir	</span>

</a>
						</div>
			</div>';}
mysql_free_result($sqluserhoy);
echo'




';
$fuserhoy = time() - (60*60*24*2);
$sqluserhoy = mysql_query("SELECT nick,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fuserhoy' AND unix_timestamp() ORDER BY puntos DESC LIMIT 10");
$contador = 1;
while($userhoy = mysql_fetch_array($sqluserhoy)){$contador++;
echo'




<div class="list-element">
				<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
				<a href="/perfil/'.$userhoy['nick'].'">
					'.$userhoy['nick'].'				</a>
				<span class="value">'.$userhoy['puntos'].'</span>

			</div>





';}
mysql_free_result($sqluserhoy);
echo'



</div>
		




<div id="WeekUserBox" class="list" style="display:none;">
								



';
$fuserhoy = time() - (60*60*24*7);
$sqluserhoy = mysql_query("SELECT nick,avatar,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fuserhoy' AND unix_timestamp() ORDER BY puntos DESC LIMIT 1");
$contador = 0;
while($userhoy = mysql_fetch_array($sqluserhoy)){$contador++;
echo'<div class="list-element user-highlight">
				<a href="/perfil/'.$userhoy['nick'].'">
					<img src="'.$userhoy['avatar'].'"  width="48" height="48" />
				</a>
				<div class="highlight-data">
				<a href="/perfil/'.$userhoy['nick'].'">
					'.$userhoy['nick'].'				</a>

				<span class="value">'.$userhoy['puntos'].'</span>
				<a		name="follow"
	onclick="notifica.follow(\'user\', , notifica.userIntopContext, $(this), false);"
		class="follow-user-top ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only">
	<i class="icon followers"></i>
	<span class="ui-button-text default-button-text">
		Seguir	</span>
	<span class="success-button-text" style="display:none">
		Dejar de seguir	</span>

</a>
						</div>
			</div>';}
mysql_free_result($sqluserhoy);
echo'




';
$fuserhoy = time() - (60*60*24*7);
$sqluserhoy = mysql_query("SELECT nick,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fuserhoy' AND unix_timestamp() ORDER BY puntos DESC LIMIT 10");
$contador = 1;
while($userhoy = mysql_fetch_array($sqluserhoy)){$contador++;
echo'




<div class="list-element">
				<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
				<a href="/perfil/'.$userhoy['nick'].'">
					'.$userhoy['nick'].'				</a>
				<span class="value">'.$userhoy['puntos'].'</span>

			</div>





';}
mysql_free_result($sqluserhoy);
echo'

</div>
		<div id="MonthUserBox" class="list" style="display:none;">
							


';
$fuserhoy = time() - (2592000);
$sqluserhoy = mysql_query("SELECT nick,avatar,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fuserhoy' AND unix_timestamp() ORDER BY puntos DESC LIMIT 1");
$contador = 0;
while($userhoy = mysql_fetch_array($sqluserhoy)){$contador++;
echo'<div class="list-element user-highlight">
				<a href="/perfil/'.$userhoy['nick'].'">
					<img src="'.$userhoy['avatar'].'"  width="48" height="48" />
				</a>
				<div class="highlight-data">
				<a href="/perfil/'.$userhoy['nick'].'">
					'.$userhoy['nick'].'				</a>

				<span class="value">'.$userhoy['puntos'].'</span>
				<a		name="follow"
	onclick="notifica.follow(\'user\', , notifica.userIntopContext, $(this), false);"
		class="follow-user-top ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only">
	<i class="icon followers"></i>
	<span class="ui-button-text default-button-text">
		Seguir	</span>
	<span class="success-button-text" style="display:none">
		Dejar de seguir	</span>

</a>
						</div>
			</div>';}
mysql_free_result($sqluserhoy);
echo'




';
$fuserhoy = time() - (2592000);
$sqluserhoy = mysql_query("SELECT nick,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fuserhoy' AND unix_timestamp() ORDER BY puntos DESC LIMIT 10");
$contador = 1;
while($userhoy = mysql_fetch_array($sqluserhoy)){$contador++;
echo'




<div class="list-element">
				<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
				<a href="/perfil/'.$userhoy['nick'].'">
					'.$userhoy['nick'].'				</a>
				<span class="value">'.$userhoy['puntos'].'</span>

			</div>





';}
mysql_free_result($sqluserhoy);
echo'

</div>
		<div id="AllUserBox" class="list" style="display:none;">
								



';

$sqluserhoy = mysql_query("SELECT nick,avatar,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fuserhoy' AND unix_timestamp() ORDER BY puntos DESC LIMIT 1");
$contador = 0;
while($userhoy = mysql_fetch_array($sqluserhoy)){$contador++;
echo'<div class="list-element user-highlight">
				<a href="/perfil/'.$userhoy['nick'].'">
					<img src="'.$userhoy['avatar'].'"  width="48" height="48" />
				</a>
				<div class="highlight-data">
				<a href="/perfil/'.$userhoy['nick'].'">
					'.$userhoy['nick'].'				</a>

				<span class="value">'.$userhoy['puntos'].'</span>
				<a		name="follow"
	onclick="notifica.follow(\'user\', , notifica.userIntopContext, $(this), false);"
		class="follow-user-top ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only">
	<i class="icon followers"></i>
	<span class="ui-button-text default-button-text">
		Seguir	</span>
	<span class="success-button-text" style="display:none">
		Dejar de seguir	</span>

</a>
						</div>
			</div>';}
mysql_free_result($sqluserhoy);
echo'




';

$sqluserhoy = mysql_query("SELECT nick,puntos FROM usuarios WHERE ultimaaccion BETWEEN '$fuserhoy' AND unix_timestamp() ORDER BY puntos DESC LIMIT 10");
$contador = 1;
while($userhoy = mysql_fetch_array($sqluserhoy)){$contador++;
echo'




<div class="list-element">
				<span class="number-list">';if($contador<10){echo''.$contador;}else{echo $contador;}echo'</span>
				<a href="/perfil/'.$userhoy['nick'].'">
					'.$userhoy['nick'].'				</a>
				<span class="value">'.$userhoy['puntos'].'</span>

			</div>





';}
mysql_free_result($sqluserhoy);
echo'






</div>
		<div class="view-more-list">
		<a href="/top/usuarios/" class="">
			Ver m&aacute;s		</a>
	</div>
</div><!-- TOP USERS -->
	</div>
</div>
</div>

</div>
<div id="sidebar">
	
	<div class="box">
	<div class="title clearfix">
		<h2>Clima</h2>
	</div>
	<div class="weather-box clearfix">
		<span class="city floatL">San Luis</span>
		<img style="margin-left:5px" src="http://o1.t26.net/images/clima/i_0001.png" />

					<a href="/cuenta" class="floatR">Cambiar</a>
				<div class="weather-data floatL">
			<div class="floatL">Temp 16&deg;</div>
			<div class="floatR">Hum 53%</div>
		</div>
	</div>
	<div class="weather-more" style="display:none;">

		<div class="clearfix" style="border-bottom:1px dotted #EEE;padding-bottom:5px; margin-bottom:5px;">
			<span>Ma&ntilde;ana</span>
			<img src="http://o1.t26.net/images/clima/i_0001.png" alt="" />
			<strong><span class="min">6&deg;</span> / <span class="max">16&deg;</span></strong>
		</div>
		<div class="clearfix">

			<span>Pasado</span>
			<img src="http://o1.t26.net/images/clima/i_0001.png" alt="" />
			<strong><span class="min">8&deg;</span> / <span class="max">17&deg;</span></strong>
		</div>
		<div class="view-more-list"><a href="/clima/" class="">Informaci&oacute;n detallada del clima</a></div>

		
	</div>
	<div class="read-more clearfix">
		<span onclick="$(\'div.weather-more, .show-more\').toggle()" style="" class="show-more">Ver m&aacute;s &#187;</span>
		<span onclick="$(\'div.weather-more, .show-more\').toggle()" style="display:none" class="show-more">&#171; Ver menos</span>
	</div>
</div>
		




		<!-- tagcloud -->
		<div id="tags-trendsBox" class="box">
		<div id="tagcloud" class="textrank-tags">
					<span class="tag-size3"> <a rel="tag" href="/tags/copa">copa</a></span>
						<span class="tag-size2"> <a rel="tag" href="/tags/juego">juego</a></span>
						<span class="tag-size2"> <a rel="tag" href="/tags/boca">boca</a></span>

						<span class="tag-size5"> <a rel="tag" href="/tags/windows">windows</a></span>
						<span class="tag-size1"> <a rel="tag" href="/tags/Zincomienzo">Zincomienzo</a></span>
						<span class="tag-size1"> <a rel="tag" href="/tags/se%C3%B1ales+para">se&ntilde;ales para</a></span>
						<span class="tag-size4"> <a rel="tag" href="/tags/a%C3%B1o">a&ntilde;o</a></span>
						<span class="tag-size3"> <a rel="tag" href="/tags/mejor">mejor</a></span>

						<span class="tag-size4"> <a rel="tag" href="/tags/amor">amor</a></span>
						<span class="tag-size5"> <a rel="tag" href="/tags/auto">auto</a></span>
						<span class="tag-size2"> <a rel="tag" href="/tags/video">video</a></span>
						<span class="tag-size5"> <a rel="tag" href="/tags/america">america</a></span>
						<span class="tag-size5"> <a rel="tag" href="/tags/mundo">mundo</a></span>

						<span class="tag-size4"> <a rel="tag" href="/tags/vida">vida</a></span>
						<span class="tag-size3"> <a rel="tag" href="/tags/humor">humor</a></span>
						<span class="tag-size3"> <a rel="tag" href="/tags/cosa">cosa</a></span>
						<span class="tag-size1"> <a rel="tag" href="/tags/futbol">futbol</a></span>
						<span class="tag-size2"> <a rel="tag" href="/tags/nuevo">nuevo</a></span>

						<span class="tag-size4"> <a rel="tag" href="/tags/gratis">gratis</a></span>
						<span class="tag-size1"> <a rel="tag" href="/tags/argentina">argentina</a></span>
					</div>
	</div>
		<!-- /tagcloud -->
	<br class="space" />
	
</div>
		</div>

		



';
pie();
?>
