<?php
include("header.php");
cabecera_normal();
# Destacados creados por timbalentimba!
 // Fechas || minutos || segundos BUUU (?)
   $quince = time() - 60*15; // 15 minutos
   $hora = time() - 60*60; //Hora
   $tres = time() - 3*60*60; // 3 Horas
   $seis = time() - 6*60*60; // Seis horas .-.
   /*****/
   $periodo = $_GET['periodo'];
   $pais = $_GET['cat'];
   $pais = strtoupper($pais);
   // Fin de fechas.
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
				<select onchange="location.href='/destacados/?periodo=15m&cat=' + $(this).val()"> 
					<option value="-1" selected="selected">Todas</option>
<?
$sql = mysql_query("SELECT * FROM categorias ORDER BY nom_categoria ASC");
while($cat = mysql_fetch_assoc($sql))
{
  echo'<option value="'.$cat['id_categoria'].'"> 
					'.$cat['nom_categoria'].'					</option>';
}
?> 
										
									</select> 
				<hr /> 
				<h4>Per&iacute;odo</h4> 
				<ul> 
					<li> 
						<a href="/destacados/?periodo=15m&cat=-1" class="selected"> 
							&Uacute;ltimos 15 minutos						</a> 
					</li> 
					<li> 
						<a href="/destacados/?periodo=1h&cat=-1"> 
							&Uacute;ltima hora						</a> 
					</li> 
					<li> 
						<a href="/destacados/?periodo=3h&cat=-1"> 
							&Uacute;ltimas 3 horas						</a> 
					</li> 
					<li> 
						<a href="/destacados/?periodo=6h&cat=-1"> 
							&Uacute;ltimas 6 horas						</a> 
					</li> 
				</ul> 
				<hr /> 
				<h4>Pa&iacute;s</h4> 
				<ul> 
					<li> 
						<a href="/destacados/?periodo=1h&cat=-1" class="selected"> 
							Todos
						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=ar"> 
							Argentina						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=mx"> 
							México						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=es"> 
							España						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=cl"> 
							Chile						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=co"> 
							Colombia						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=pe"> 
							Perú						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=ve"> 
							Venezuela						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=uy"> 
							Uruguay						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=us"> 
							Estados Unidos						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=ec"> 
							Ecuador						</a> 
					</li> 
										<li> 
						<a href="/destacados/?periodo=1h&cat=py"> 
							Paraguay						</a> 
					</li> 
									</ul> 
			</div> 
		</div> 
	</div> 
	<div id="trends-content" class="right" style="float:left;margin-left:10px;width:775px"> 
	
		<div class="boxy xtralarge"> 
			<div class="boxy-title"> 
				<h3>Comentarios</h3> 
			</div> 
			<div class="boxy-content"> 
						<ol> 
						<?
						# Comentarios:
						 switch($periodo)
						 {
	                     case "15m":
						 $comentarios = "SELECT * FROM (comentarios AS c,usuarios AS u,posts AS p) WHERE c.fecha BETWEEN '$quince' AND unix_timestamp()";
						 $caca = mysql_query($comentarios) or die(mysql_error());
                         break;
                         default;						 
						 }
						?>
								<li class="categoriaPost clearfix noticias"> 
					<a href="/posts/noticias/11003218/Que-Sudamerica-tiemble_-Peru-jugara-con-Claudio-Pizarro_.html"> 
						Que Sudamerica tiemble: Perú jugará con Claudio Pizarro.					</a> 
					<span>27</span> 
				</li> 
								
							</ol> 
						</div> 
		</div> 
 
		<div class="boxy xtralarge"> 
			<div class="boxy-title"> 
				<h3>Puntos recibidos</h3> 
			</div> 
			<div class="boxy-content"> 
						<ol> 
								<li class="categoriaPost clearfix deportes"> 
					<a href="/posts/deportes/11003297/Gracias-Ronaldo__-_Homenaje_.html"> 
						Gracias Ronaldo.. [Homenaje]					</a> 
					<span>55</span> 
				</li> 
								<li class="categoriaPost clearfix ecologia"> 
					<a href="/posts/ecologia/10949738/Te-gustan-las-historias-de-terror_.html"> 
						Te gustan las historias de terror?					</a> 
					<span>45</span> 
				</li> 
								<li class="categoriaPost clearfix arte"> 
					<a href="/posts/arte/11003123/Mi-dibujo-de-Gaara.html"> 
						Mi dibujo de Gaara					</a> 
					<span>30</span> 
				</li> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/10997241/Explicando-la-vida-en-Gifs-e-Imagenes____18_.html"> 
						Explicando la vida en Gifs e Imágenes...(+18)					</a> 
					<span>20</span> 
				</li> 
								<li class="categoriaPost clearfix salud-bienestar"> 
					<a href="/posts/salud-bienestar/10989573/_Te-quiero-pero-como-amigo_.html"> 
						''Te quiero pero como amigo''					</a> 
					<span>20</span> 
				</li> 
								<li class="categoriaPost clearfix arte"> 
					<a href="/posts/arte/10896494/Mis-ultimas-pinturas-realistas_.html"> 
						Mis ultimas pinturas realistas.					</a> 
					<span>20</span> 
				</li> 
								<li class="categoriaPost clearfix deportes"> 
					<a href="/posts/deportes/10987373/Los-promedios-arden___recargado-_Fecha17claus---36temporada_.html"> 
						Los promedios arden...recargado (Fecha17claus - 36temporada)					</a> 
					<span>20</span> 
				</li> 
								<li class="categoriaPost clearfix info"> 
					<a href="/posts/info/11003194/Index-con-mas-de-135-Juegos-de-Pc-_Recomendado_.html"> 
						Index con mas de 135 Juegos de Pc [Recomendado]					</a> 
					<span>15</span> 
				</li> 
								<li class="categoriaPost clearfix offtopic"> 
					<a href="/posts/offtopic/10997097/Indignados-En-Argentina_-Fomentemos-Cultura_.html"> 
						Indignados En Argentina: Fomentemos Cultura!					</a> 
					<span>15</span> 
				</li> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/11002940/Super-Megapost-de-memes---parte-2.html"> 
						Super Megapost de memes - parte 2					</a> 
					<span>15</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/11003204/Construido-con-Lego-_Excelentes-imagenes_.html"> 
						Construido con Lego [Excelentes imagenes]					</a> 
					<span>15</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/11000909/Inventos-que-te-gustaria-tener.html"> 
						Inventos que te gustaría tener					</a> 
					<span>14</span> 
				</li> 
								<li class="categoriaPost clearfix offtopic"> 
					<a href="/posts/offtopic/11002454/Les-cuento-por-que-quiero-ser-presidente-de-la-Argentina_.html"> 
						Les cuento por qué quiero ser presidente de la Argentina.					</a> 
					<span>14</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/11003232/Fotos-HD-del-Volcan-Peyehue-_TIME_.html"> 
						Fotos HD del Volcan Peyehue (TIME)					</a> 
					<span>14</span> 
				</li> 
								<li class="categoriaPost clearfix patrocinados"> 
					<a href="/posts/patrocinados/10977450/La-Mezcla-de-Tic-Tac-Mas-Grande-del-Mundo.html"> 
						La Mezcla de Tic-Tac Más Grande del Mundo					</a> 
					<span>10</span> 
				</li> 
							</ol> 
						</div> 
		</div> 
 
		<div class="boxy xtralarge"> 
			<div class="boxy-title"> 
				<h3>Favoritos</h3> 
			</div> 
			<div class="boxy-content"> 
						<ol> 
								<li class="categoriaPost clearfix hazlo-tu-mismo"> 
					<a href="/posts/hazlo-tu-mismo/11003100/Como-hacer-y-editar-un-video-profesionalmente.html"> 
						Como hacer y editar un video profesionalmente					</a> 
					<span>12</span> 
				</li> 
								<li class="categoriaPost clearfix apuntes-y-monografias"> 
					<a href="/posts/apuntes-y-monografias/10970922/Queres-hacer-musica-con-tu-pc-_-Entra-YA_.html"> 
						Queres hacer música con tu pc ? Entrá YA!					</a> 
					<span>11</span> 
				</li> 
								<li class="categoriaPost clearfix deportes"> 
					<a href="/posts/deportes/11003085/El-penal-mas-extrano-de-los-ultimos-anos.html"> 
						El penal más extraño de los últimos años					</a> 
					<span>8</span> 
				</li> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/10971100/memes-para-cagarte-de-risa-_una-sonrisa-te-saco_-_parte-3-_.html"> 
						memes para cagarte de risa [una sonrisa te saco] [parte 3 ]					</a> 
					<span>6</span> 
				</li> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/11002752/Aburrido_-Charla-con-tu-PC.html"> 
						Aburrido? Charla con tu PC					</a> 
					<span>6</span> 
				</li> 
								<li class="categoriaPost clearfix ciencia-educacion"> 
					<a href="/posts/ciencia-educacion/10942340/_Preguntas-de-ciencia_-Asimov-responde_-_I_.html"> 
						¿Preguntas de ciencia? Asimov responde. (I)					</a> 
					<span>6</span> 
				</li> 
								<li class="categoriaPost clearfix deportes"> 
					<a href="/posts/deportes/11003234/penal-rarisimo.html"> 
						penal rarisimo					</a> 
					<span>5</span> 
				</li> 
								<li class="categoriaPost clearfix info"> 
					<a href="/posts/info/11003194/Index-con-mas-de-135-Juegos-de-Pc-_Recomendado_.html"> 
						Index con mas de 135 Juegos de Pc [Recomendado]					</a> 
					<span>5</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/11000909/Inventos-que-te-gustaria-tener.html"> 
						Inventos que te gustaría tener					</a> 
					<span>4</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/10160814/Queres-Un-Pack-De-Renders-De-Halo-Tomalo-Aki_-_MF_.html"> 
						Queres Un Pack De Renders De Halo Tómalo Aki! [MF]					</a> 
					<span>4</span> 
				</li> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/10997241/Explicando-la-vida-en-Gifs-e-Imagenes____18_.html"> 
						Explicando la vida en Gifs e Imágenes...(+18)					</a> 
					<span>4</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/11003161/Decora-tus-post-_por-mi_.html"> 
						Decora tus post [por mi]					</a> 
					<span>4</span> 
				</li> 
								<li class="categoriaPost clearfix salud-bienestar"> 
					<a href="/posts/salud-bienestar/11002831/Trucos-utiles-para-estimular-el-clitoris-con-la-lengua.html"> 
						Trucos útiles para estimular el clítoris con la lengua					</a> 
					<span>3</span> 
				</li> 
								<li class="categoriaPost clearfix salud-bienestar"> 
					<a href="/posts/salud-bienestar/10989573/_Te-quiero-pero-como-amigo_.html"> 
						''Te quiero pero como amigo''					</a> 
					<span>3</span> 
				</li> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/11002940/Super-Megapost-de-memes---parte-2.html"> 
						Super Megapost de memes - parte 2					</a> 
					<span>3</span> 
				</li> 
							</ol> 
						</div> 
		</div> 
 
		<div class="boxy xtralarge"> 
			<div class="boxy-title"> 
				<h3>Recomendaciones</h3> 
			</div> 
			<div class="boxy-content"> 
						<ol> 
								<li class="categoriaPost clearfix ecologia"> 
					<a href="/posts/ecologia/10949738/Te-gustan-las-historias-de-terror_.html"> 
						Te gustan las historias de terror?					</a> 
					<span>3</span> 
				</li> 
								<li class="categoriaPost clearfix ecologia"> 
					<a href="/posts/ecologia/11000000/Barbie-destruye-los-bosques_.html"> 
						Barbie destruye los bosques!					</a> 
					<span>3</span> 
				</li> 
								<li class="categoriaPost clearfix hazlo-tu-mismo"> 
					<a href="/posts/hazlo-tu-mismo/10907124/Mira-lo-que-estoy-fabricando-_PC-Modding-desde-0_-Parte1.html"> 
						Mirá lo que estoy fabricando [PC Modding desde 0] Parte1					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix noticias"> 
					<a href="/posts/noticias/10989158/Nuevo-virus-en-Facebook.html"> 
						Nuevo virus en Facebook					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/11000909/Inventos-que-te-gustaria-tener.html"> 
						Inventos que te gustaría tener					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/1975068/Dragon-Ball-Z-_-Imagenes-de-goku_vegeta_gohan_trunks-y-gote.html"> 
						Dragon Ball Z : Imagenes de goku,vegeta,gohan,trunks y gote					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/10373904/Nuestro-Ejercito-Argentino_megapost_-parte-3.html"> 
						Nuestro Ejercito Argentino(megapost) parte 3					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix ciencia-educacion"> 
					<a href="/posts/ciencia-educacion/5700185/La-Argentina-que-no-nos-muestran___.html"> 
						La Argentina que no nos muestran...					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix info"> 
					<a href="/posts/info/10990880/Y-vos_-_por-que-pirateas____.html"> 
						Y vos, ¿por qué pirateas?...					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/4606592/Imagenes-de-Dragon-Ball-z-_Algunas_-_P.html"> 
						Imágenes de Dragon Ball z (Algunas) :P					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/10991211/Nuestro-planeta-insolitos-lugares-del-mundo.html"> 
						Nuestro planeta insolitos lugares del mundo					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix arte"> 
					<a href="/posts/arte/10613314/Dibujando-una-Cabaret-Lady.html"> 
						Dibujando una Cabaret Lady					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix noticias"> 
					<a href="/posts/noticias/11002230/Foo-Fighters-se-rie-de-Justin-Bieber.html"> 
						Foo Fighters se ríe de Justin Bieber					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/9945805/Estas-aburrido_-Encuestas-para-ustedes-2_0.html"> 
						Estas aburrido? Encuestas para ustedes 2.0					</a> 
					<span>1</span> 
				</li> 
								<li class="categoriaPost clearfix taringa"> 
					<a href="/posts/taringa/6296833/Para-no-ser-victima-de-la-trampa-_Nuevos_.html"> 
						Para no ser victima de la trampa [Nuevos]					</a> 
					<span>1</span> 
				</li> 
							</ol> 
						</div> 
		</div> 
 
		<div class="boxy xtralarge"> 
			<div class="boxy-title"> 
				<h3>Usuarios que recibieron Recomendaci&oacute;n</h3> 
			</div> 
			<div class="boxy-content"> 
						<ol> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/10875789/gifs-graciosos.html"> 
						gifs graciosos					</a> 
					<span>720</span> 
				</li> 
								<li class="categoriaPost clearfix deportes"> 
					<a href="/posts/deportes/11003297/Gracias-Ronaldo__-_Homenaje_.html"> 
						Gracias Ronaldo.. [Homenaje]					</a> 
					<span>340</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/4606592/Imagenes-de-Dragon-Ball-z-_Algunas_-_P.html"> 
						Imágenes de Dragon Ball z (Algunas) :P					</a> 
					<span>315</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/1041041/Dragon-Ball_-Muchos-Avatares.html"> 
						Dragon Ball: Muchos Avatares					</a> 
					<span>315</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/1975068/Dragon-Ball-Z-_-Imagenes-de-goku_vegeta_gohan_trunks-y-gote.html"> 
						Dragon Ball Z : Imagenes de goku,vegeta,gohan,trunks y gote					</a> 
					<span>315</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/2291847/Gente-freak-vestida-como-Dragon-Ball.html"> 
						Gente freak vestida como Dragon Ball					</a> 
					<span>315</span> 
				</li> 
								<li class="categoriaPost clearfix ecologia"> 
					<a href="/posts/ecologia/11000000/Barbie-destruye-los-bosques_.html"> 
						Barbie destruye los bosques!					</a> 
					<span>215</span> 
				</li> 
								<li class="categoriaPost clearfix arte"> 
					<a href="/posts/arte/10613314/Dibujando-una-Cabaret-Lady.html"> 
						Dibujando una Cabaret Lady					</a> 
					<span>207</span> 
				</li> 
								<li class="categoriaPost clearfix hazlo-tu-mismo"> 
					<a href="/posts/hazlo-tu-mismo/10907124/Mira-lo-que-estoy-fabricando-_PC-Modding-desde-0_-Parte1.html"> 
						Mirá lo que estoy fabricando [PC Modding desde 0] Parte1					</a> 
					<span>181</span> 
				</li> 
								<li class="categoriaPost clearfix deportes"> 
					<a href="/posts/deportes/11002965/Se-nos-va-un-Grande-_Ronaldo-_Espn_-_.html"> 
						Se nos va un Grande (Ronaldo [Espn] )					</a> 
					<span>169</span> 
				</li> 
								<li class="categoriaPost clearfix info"> 
					<a href="/posts/info/10998816/Videos-Como-Fondo-de-Escritorio-en-Windows-7.html"> 
						Videos Como Fondo de Escritorio en Windows 7					</a> 
					<span>132</span> 
				</li> 
								<li class="categoriaPost clearfix ciencia-educacion"> 
					<a href="/posts/ciencia-educacion/5700185/La-Argentina-que-no-nos-muestran___.html"> 
						La Argentina que no nos muestran...					</a> 
					<span>121</span> 
				</li> 
								<li class="categoriaPost clearfix salud-bienestar"> 
					<a href="/posts/salud-bienestar/11003357/Consejos-para-tu-pene-o_O.html"> 
						Consejos para tu pene o.O					</a> 
					<span>116</span> 
				</li> 
								<li class="categoriaPost clearfix patrocinados"> 
					<a href="/posts/patrocinados/10977450/La-Mezcla-de-Tic-Tac-Mas-Grande-del-Mundo.html"> 
						La Mezcla de Tic-Tac Más Grande del Mundo					</a> 
					<span>90</span> 
				</li> 
								<li class="categoriaPost clearfix offtopic"> 
					<a href="/posts/offtopic/10980740/jodastereo-jodas-telefonicas___.html"> 
						jodastereo jodas telefonicas...					</a> 
					<span>61</span> 
				</li> 
							</ol> 
						</div> 
		</div> 
 
		<div class="boxy xtralarge"> 
			<div class="boxy-title"> 
				<h3>Veces puntuado</h3> 
			</div> 
			<div class="boxy-content"> 
						<ol> 
								<li class="categoriaPost clearfix deportes"> 
					<a href="/posts/deportes/11003297/Gracias-Ronaldo__-_Homenaje_.html"> 
						Gracias Ronaldo.. [Homenaje]					</a> 
					<span>6</span> 
				</li> 
								<li class="categoriaPost clearfix ecologia"> 
					<a href="/posts/ecologia/10949738/Te-gustan-las-historias-de-terror_.html"> 
						Te gustan las historias de terror?					</a> 
					<span>5</span> 
				</li> 
								<li class="categoriaPost clearfix arte"> 
					<a href="/posts/arte/11003123/Mi-dibujo-de-Gaara.html"> 
						Mi dibujo de Gaara					</a> 
					<span>4</span> 
				</li> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/10997241/Explicando-la-vida-en-Gifs-e-Imagenes____18_.html"> 
						Explicando la vida en Gifs e Imágenes...(+18)					</a> 
					<span>4</span> 
				</li> 
								<li class="categoriaPost clearfix offtopic"> 
					<a href="/posts/offtopic/11002454/Les-cuento-por-que-quiero-ser-presidente-de-la-Argentina_.html"> 
						Les cuento por qué quiero ser presidente de la Argentina.					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/11003232/Fotos-HD-del-Volcan-Peyehue-_TIME_.html"> 
						Fotos HD del Volcan Peyehue (TIME)					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix femme"> 
					<a href="/posts/femme/11003287/Cuidados-para-tu-piel_-Tu-cabello-_parte-2_.html"> 
						Cuidados para tu piel: Tu cabello (parte 2)					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix info"> 
					<a href="/posts/info/11003194/Index-con-mas-de-135-Juegos-de-Pc-_Recomendado_.html"> 
						Index con mas de 135 Juegos de Pc [Recomendado]					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix offtopic"> 
					<a href="/posts/offtopic/10997097/Indignados-En-Argentina_-Fomentemos-Cultura_.html"> 
						Indignados En Argentina: Fomentemos Cultura!					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix humor"> 
					<a href="/posts/humor/11002940/Super-Megapost-de-memes---parte-2.html"> 
						Super Megapost de memes - parte 2					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/11000909/Inventos-que-te-gustaria-tener.html"> 
						Inventos que te gustaría tener					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix hazlo-tu-mismo"> 
					<a href="/posts/hazlo-tu-mismo/10907124/Mira-lo-que-estoy-fabricando-_PC-Modding-desde-0_-Parte1.html"> 
						Mirá lo que estoy fabricando [PC Modding desde 0] Parte1					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix imagenes"> 
					<a href="/posts/imagenes/11003204/Construido-con-Lego-_Excelentes-imagenes_.html"> 
						Construido con Lego [Excelentes imagenes]					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix arte"> 
					<a href="/posts/arte/10896494/Mis-ultimas-pinturas-realistas_.html"> 
						Mis ultimas pinturas realistas.					</a> 
					<span>2</span> 
				</li> 
								<li class="categoriaPost clearfix mascotas"> 
					<a href="/posts/mascotas/11002271/Frases-Perras-2-Tenes-un-perro_-entra.html"> 
						Frases Perras 2 Tenés un perro? entrá					</a> 
					<span>2</span> 
				</li> 
							</ol> 
						</div> 
		</div> 
 
		</div> 
	
	<div style="clear:both"></div> 
<!-- fin cuerpocontainer --> 
<?php
pie();
?>