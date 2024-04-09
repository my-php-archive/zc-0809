<?php
/** Desarrollado por timbalentimba... Licenced by Zincomienzo v5 */
include_once("headerprincipal.php");
cabecera_general();
$majuno = htmlentities($_GET['pagi']+1);
$tiempoO = time()-60*3;
?>
	<div id="right-col"> 
		<div id="estadisticasBox" class="box"><!-- estadisticas --> 
			<div class="title clearfix">
<?php
//estadisticas
$usuarios = mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE ban = '0'"));
$posts = mysql_num_rows(mysql_query("SELECT * FROM posts"));
$comentarios = mysql_num_rows(mysql_query("SELECT * FROM comentarios"));
$onlines = mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE ultimaaccion BETWEEN $tiempoO AND unix_timestamp() AND ban = '0'")) or die(mysql_error());
?>			
				<h2>Estadisticas</h2> 
			</div> 
			<div style="margin:5px 0 0 0;"> 
				<div class="clearfix"> 
					<div class="floatL"><strong><?=$onlines?></strong>  usuarios online</div> 
					<div class="floatR"><strong><?=$usuarios?></strong>  miembros</div> 
				</div> 
				<div class="clearfix"> 
					<div class="floatL"><strong><?=$posts?></strong>  posts</div> 
					<div class="floatR"><strong><?=$comentarios?></strong>  comentarios</div> 
				</div> 
								<div class="view-more-list" style="margin-top:5px"> 
					<a title="Taringa! en vivo" href="/envivo/">Taringa! en vivo</a> 
				</div> 
							</div> 
		</div> 
		<div id="lastCommentsBox" class="box"><!-- LAST COMMENTS --> 
	<div class="title clearfix"> 
		<h2>Comentarios recientes</h2> 
    <div class="action text"> 
		<a href="#" class="size9" onclick="actualizar_comentarios('-1','0'); return false;"> 
			<i class="icon refresh"></i> 
		</a> 
    </div> 
	</div> 
		<div id="lastCommentsBox-data" class="list small-list"> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/Propellerhead">Propellerhead</a> 
				</span> 
				<a href="/posts/solidaridad/10750238.ultima/S_O_S-Mauricio-Echenique_-Un-perverso-y-su-estafa.html">S.O.S Mauricio Echenique. Un perver...</a>	
			</div> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/ridebmxteam">ridebmxteam</a> 
				</span> 
				<a href="/posts/noticias/10709654.ultima/Sentencia-colectiva.html">Sentencia colectiva</a>	
			</div> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/diego002">diego002</a> 
				</span> 
				<a href="/posts/noticias/10750300.ultima/Tevez-el-primer-argentino-en-ser-maximo-goleador.html">Tevez el primer argentino en ser má...</a>	
			</div> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/elementalsoft">elementalsoft</a> 
				</span> 
				<a href="/posts/noticias/10749536.ultima/Santa-Fe_-Internas-minuto-a-minuto.html">Santa Fe: Internas minuto a minuto</a>	
			</div> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/chamato91">chamato91</a> 
				</span> 
				<a href="/posts/imagenes/10723576.ultima/Filosoraptor.html">Filosoraptor</a>	
			</div> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/leaa7">leaa7</a> 
				</span> 
				<a href="/posts/imagenes/10750244.ultima/Una-sola-imagen.html">Una sola imagen</a>	
			</div> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/fercho1711234">fercho1711234</a> 
				</span> 
				<a href="/posts/humor/10750096.ultima/Como-saber-si-eres-un-pretencioso-de-mierda.html">Cómo saber si eres un pretencioso d...</a>	
			</div> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/vani8904">vani8904</a> 
				</span> 
				<a href="/posts/humor/10745033.ultima/Lo-que-me-pasa-cuando-se-viene-un-parcial.html">Lo que me pasa cuando se viene un p...</a>	
			</div> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/Emaaspeed">Emaaspeed</a> 
				</span> 
				<a href="/posts/humor/10749582.ultima/___Como-en-ese-capitulo-de-los-Simpsons-que___.html">...Como en ese capítulo de los Simp...</a>	
			</div> 
					<div class="list-element overflow"> 
				<span class="subinfo"> 
					<a href="/perfil/Attack">Attack</a> 
				</span> 
				<a href="/posts/hazlo-tu-mismo/10750297.ultima/Hice-una-Firma-medio-sencilla-en-photoshop-y-te-la-muestro.html">Hice una Firma medio sencilla en ph...</a>	
			</div> 
				</div> 
</div><!-- LAST COMMENTS --> 
		
			<div id="trendsPostBox" class="box"><!-- TOP POSTS --> 
		<div class="title clearfix"> 
			<h2>Destacados</h2> 
						<div class="action text drop time-tops-filter"> 
				<span> 
					15m				</span> 
				<ul id="trendsPostBox-filter" class="min-dropdown time-box"> 
										<li><a id="15mtrends" href="javascript:nTopsTabs('trendsPostBox','15mtrendsPostBox', '15mtrends')" class="15mtrendsPostBox">15m</a></li> 
										<li><a id="1htrends" href="javascript:nTopsTabs('trendsPostBox','1htrendsPostBox', '1htrends')" class="1htrendsPostBox">1h</a></li> 
										<li><a id="3htrends" href="javascript:nTopsTabs('trendsPostBox','3htrendsPostBox', '3htrends')" class="3htrendsPostBox">3h</a></li> 
										<li><a id="6htrends" href="javascript:nTopsTabs('trendsPostBox','6htrendsPostBox', '6htrends')" class="6htrendsPostBox">6h</a></li> 
									</ul> 
			</div> 		</div> 
			
							
				<div id="15mtrendsPostBox" class="list" > 
					
										
										<div class="list-element"> 
						<span class="number-list">1</span> 
						<a href="/posts/humor/10749582/___Como-en-ese-capitulo-de-los-Simpsons-que___.html"> 
							...Como en ese capítulo de los Simpsons						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">2</span> 
						<a href="/posts/deportes/10749702/Los-promedios-arden___recargado-_Fecha15claus---34temporada_.html"> 
							Los promedios arden...recargado (Fecha15						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">3</span> 
						<a href="/posts/hazlo-tu-mismo/10750060/Te-enseno-a-dibujar-manga_-_Primera-parte-basico_.html"> 
							Te enseño a dibujar manga: (Primera par						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">4</span> 
						<a href="/posts/hazlo-tu-mismo/10749749/Antena-WIFI-caserita-hecha-por-mi_.html"> 
							Antena WIFI caserita hecha por mi!						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">5</span> 
						<a href="/posts/videos/10750113/Un-peloduro-que-nos-puede-matar_.html"> 
							Un peloduro que nos puede matar!!						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">6</span> 
						<a href="/posts/noticias/10750083/Confirman-que-existe-un-vortex-que-rodea-la-Tierra.html"> 
							Confirman que existe un vortex que rodea						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">7</span> 
						<a href="/posts/imagenes/10627480/Desmotivadores-Para-Romperte-El-Corazon-_.html"> 
							Desmotivadores Para Romperte El Corazon 						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">8</span> 
						<a href="/posts/deportes/10749974/Frases-de-Martin-Palermo-_Ilustradas_Vida-y-obra_.html"> 
							Frases de Martin Palermo [Ilustradas][Vi						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">9</span> 
						<a href="/posts/deportes/10650195/Te-da-paja-ir-al-Gym_.html"> 
							Te da paja ir al Gym?						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">10</span> 
						<a href="/posts/noticias/10750084/Por-Carrizo-River-esta-en-Promocion.html"> 
							Por Carrizo River está en Promoción						</a> 
					</div> 
									
					<div class="view-more-list"> 
						<a href="/destacados/?cat=-1" class=""> 
							Ver m&aacute;s						</a> 
					</div> 
				</div> 
									
				<div id="1htrendsPostBox" class="list"  style="display: none"> 
					
										
										<div class="list-element"> 
						<span class="number-list">1</span> 
						<a href="/posts/humor/10749582/___Como-en-ese-capitulo-de-los-Simpsons-que___.html"> 
							...Como en ese capítulo de los Simpsons						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">2</span> 
						<a href="/posts/deportes/10749702/Los-promedios-arden___recargado-_Fecha15claus---34temporada_.html"> 
							Los promedios arden...recargado (Fecha15						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">3</span> 
						<a href="/posts/noticias/10743182/Musica-Electronica-Hits-2011.html"> 
							Musica Electronica Hits 2011						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">4</span> 
						<a href="/posts/hazlo-tu-mismo/10749749/Antena-WIFI-caserita-hecha-por-mi_.html"> 
							Antena WIFI caserita hecha por mi!						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">5</span> 
						<a href="/posts/imagenes/10627480/Desmotivadores-Para-Romperte-El-Corazon-_.html"> 
							Desmotivadores Para Romperte El Corazon 						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">6</span> 
						<a href="/posts/humor/10748412/Mas-de-1-hora-te-quedas__.html"> 
							Mas de 1 hora te quedas..						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">7</span> 
						<a href="/posts/info/10712805/101-preguntas-inteligentes___.html"> 
							101 preguntas inteligentes...						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">8</span> 
						<a href="/posts/humor/10749560/Memes-_-unos-nuevos.html"> 
							Memes ^^ unos nuevos						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">9</span> 
						<a href="/posts/mascotas/10747935/Tenemos-que-hacer-algo-ante-esto_.html"> 
							Tenemos que hacer algo ante esto!						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">10</span> 
						<a href="/posts/deportes/10650195/Te-da-paja-ir-al-Gym_.html"> 
							Te da paja ir al Gym?						</a> 
					</div> 
									
					<div class="view-more-list"> 
						<a href="/destacados/?cat=-1" class=""> 
							Ver m&aacute;s						</a> 
					</div> 
				</div> 
									
				<div id="3htrendsPostBox" class="list"  style="display: none"> 
					
										
										<div class="list-element"> 
						<span class="number-list">1</span> 
						<a href="/posts/animaciones/6484708/megapost-cosas-flash.html"> 
							megapost cosas flash						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">2</span> 
						<a href="/posts/mascotas/10747935/Tenemos-que-hacer-algo-ante-esto_.html"> 
							Tenemos que hacer algo ante esto!						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">3</span> 
						<a href="/posts/noticias/10743182/Musica-Electronica-Hits-2011.html"> 
							Musica Electronica Hits 2011						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">4</span> 
						<a href="/posts/imagenes/10627480/Desmotivadores-Para-Romperte-El-Corazon-_.html"> 
							Desmotivadores Para Romperte El Corazon 						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">5</span> 
						<a href="/posts/humor/10749582/___Como-en-ese-capitulo-de-los-Simpsons-que___.html"> 
							...Como en ese capítulo de los Simpsons						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">6</span> 
						<a href="/posts/humor/10748412/Mas-de-1-hora-te-quedas__.html"> 
							Mas de 1 hora te quedas..						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">7</span> 
						<a href="/posts/info/10712805/101-preguntas-inteligentes___.html"> 
							101 preguntas inteligentes...						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">8</span> 
						<a href="/posts/deportes/10650195/Te-da-paja-ir-al-Gym_.html"> 
							Te da paja ir al Gym?						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">9</span> 
						<a href="/posts/imagenes/10744820/Lost_-a-una-ano-del-final_Cronologia-ilustrada.html"> 
							Lost: a una año del final.Cronologia il						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">10</span> 
						<a href="/posts/mascotas/10747831/perritos-que-estaban-destinados-a-morir-pero___-los-adopte.html"> 
							perritos que estaban destinados a morir 						</a> 
					</div> 
									
					<div class="view-more-list"> 
						<a href="/destacados/?cat=-1" class=""> 
							Ver m&aacute;s						</a> 
					</div> 
				</div> 
									
				<div id="6htrendsPostBox" class="list"  style="display: none"> 
					
										
										<div class="list-element"> 
						<span class="number-list">1</span> 
						<a href="/posts/info/1710720/Pink-Floyd-Analisis-de-su-Obra-I.html"> 
							Pink Floyd Analisis de su Obra I						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">2</span> 
						<a href="/posts/info/9702001/Estudio-sobre-maderas-para-guitarra.html"> 
							Estudio sobre maderas para guitarra						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">3</span> 
						<a href="/posts/imagenes/10739499/Barras-Separadoras-Gif.html"> 
							Barras Separadoras Gif						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">4</span> 
						<a href="/posts/femme/3952376/La-posta-sobre-las-minas_-levantes-y-seduccion_.html"> 
							La posta sobre las minas: levantes y sed						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">5</span> 
						<a href="/posts/imagenes/10627480/Desmotivadores-Para-Romperte-El-Corazon-_.html"> 
							Desmotivadores Para Romperte El Corazon 						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">6</span> 
						<a href="/posts/imagenes/10744820/Lost_-a-una-ano-del-final_Cronologia-ilustrada.html"> 
							Lost: a una año del final.Cronologia il						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">7</span> 
						<a href="/posts/noticias/10743182/Musica-Electronica-Hits-2011.html"> 
							Musica Electronica Hits 2011						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">8</span> 
						<a href="/posts/mascotas/10747935/Tenemos-que-hacer-algo-ante-esto_.html"> 
							Tenemos que hacer algo ante esto!						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">9</span> 
						<a href="/posts/offtopic/10745550/Jean-Claude-Van-Damme-me-mando-un-regalo-y-te-lo-muestro.html"> 
							Jean-Claude Van Damme me mandó un regal						</a> 
					</div> 
										<div class="list-element"> 
						<span class="number-list">10</span> 
						<a href="/posts/info/10712805/101-preguntas-inteligentes___.html"> 
							101 preguntas inteligentes...						</a> 
					</div> 
									
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
									<li><a id="YesterdayPost" href="javascript:nTopsTabs('topsPostBox','YesterdayPostBox', 'YesterdayPost')" class="YesterdayPostBox">Ayer</a></li> 
									<li><a id="WeekPost" href="javascript:nTopsTabs('topsPostBox','WeekPostBox', 'WeekPost')" class="active WeekPostBox">Semana</a></li> 
									<li><a id="MonthPost" href="javascript:nTopsTabs('topsPostBox','MonthPostBox', 'MonthPost')" class="MonthPostBox">Mes</a></li> 
									<li><a id="AllPost" href="javascript:nTopsTabs('topsPostBox','AllPostBox', 'AllPost')" class="AllPostBox">Todos</a></li> 
							</ul> 
		</div> 
	</div> 
		<div id="WeekPostBox" class="list" style=""> 
				<div class="list-element"> 
			<span class="number-list">1</span> 
			<a href="/posts/deportes/10650195/Te-da-paja-ir-al-Gym_.html"> 
				Te da paja ir al Gym?			</a> 
			<span class="value">5359</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">2</span> 
			<a href="/posts/deportes/10689909/Porque-Tevez-debe-estar-en-la-seleccion_.html"> 
				Porque Tevez debe estar en la selec			</a> 
			<span class="value">4303</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">3</span> 
			<a href="/posts/imagenes/10681648/Gifs-Extranamente-Interesantes_Videotutorial--como-editarlo.html"> 
				Gifs Extrañamente Interesantes|Vid			</a> 
			<span class="value">3621</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">4</span> 
			<a href="/posts/info/10712805/101-preguntas-inteligentes___.html"> 
				101 preguntas inteligentes...			</a> 
			<span class="value">3150</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">5</span> 
			<a href="/posts/imagenes/10666533/Almeyda-Corazon-de-Leon-_-Wallpapers-_-avatares-_Ineditos.html"> 
				Almeyda Corazón de Leon • Wallpa			</a> 
			<span class="value">2443</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">6</span> 
			<a href="/posts/deportes/10642118/Los-promedios-arden___recargado-_Fecha14claus---33temporada_.html"> 
				Los promedios arden...recargado (Fe			</a> 
			<span class="value">2080</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">7</span> 
			<a href="/posts/humor/10660830/Esos-Momentos-no-muy-inteligentes___-4.html"> 
				Esos Momentos no muy inteligentes..			</a> 
			<span class="value">1909</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">8</span> 
			<a href="/posts/info/10714116/Me-ofrecieron-trabajar-lavando-dinero-y-te-lo-muestro.html"> 
				Me ofrecieron trabajar lavando dine			</a> 
			<span class="value">1902</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">9</span> 
			<a href="/posts/humor/10642361/Las-Aventuras-de-manolo12-y-herni---Cap_-1-Parte-1.html"> 
				Las Aventuras de manolo12 y herni -			</a> 
			<span class="value">1834</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">10</span> 
			<a href="/posts/humor/10671391/Si-Cristina-K_-administrara-Taringa_-2.html"> 
				Si Cristina K. administrara Taringa			</a> 
			<span class="value">1595</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">11</span> 
			<a href="/posts/patrocinados/10679584/Concurso_-Protege-nuestros-bosques.html"> 
				Concurso: Protegé nuestros bosques			</a> 
			<span class="value">1204</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">12</span> 
			<a href="/posts/hazlo-tu-mismo/10690455/Tv-Satelital-Sin-Rentas-Mensuales-Parte-2.html"> 
				Tv Satelital Sin Rentas Mensuales P			</a> 
			<span class="value">811</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">13</span> 
			<a href="/posts/hazlo-tu-mismo/10647372/_Photoshop_-Hace-tu-avatar-Gamer-_Estilo-Propio_.html"> 
				[Photoshop] Hacé tu avatar Gamer [			</a> 
			<span class="value">793</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">14</span> 
			<a href="/posts/info/10657040/Newell_s_-el-causal-de-mi-alegria_-_Historia-y-fotos_.html"> 
				Newell's, el causal de mi alegría.			</a> 
			<span class="value">771</span> 
		</div> 
			</div> 
		<div id="YesterdayPostBox" class="list" style="display:none;"> 
				<div class="list-element"> 
			<span class="number-list">1</span> 
			<a href="/posts/imagenes/10718763/Nace-un-Artista_.html"> 
				Nace un Artista.			</a> 
			<span class="value">480</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">2</span> 
			<a href="/posts/imagenes/10723576/Filosoraptor.html"> 
				Filosoraptor			</a> 
			<span class="value">444</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">3</span> 
			<a href="/posts/salud-bienestar/10732768/El-Fin-del-mundo-SI-esta-cerca_.html"> 
				El Fin del mundo SI esta cerca!			</a> 
			<span class="value">392</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">4</span> 
			<a href="/posts/deportes/10724222/Todo-Sobre-La-Copa-America-2011.html"> 
				Todo Sobre La Copa America 2011			</a> 
			<span class="value">379</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">5</span> 
			<a href="/posts/hazlo-tu-mismo/10722535/Como-he-rejuvenecido-mi-cuarto-de-bano.html"> 
				Como he rejuvenecido mi cuarto de b			</a> 
			<span class="value">351</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">6</span> 
			<a href="/posts/imagenes/10721753/Sabias-Que____-_Megapost_-M_s-De-500-Im_genes.html"> 
				Sabias Que...? [Megapost] Màs De 5			</a> 
			<span class="value">337</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">7</span> 
			<a href="/posts/mascotas/10726641/Guau____Que-no-me-entendes_-_Diccionario-de-Lenguaje-Canino_.html"> 
				Guau!...Que no me entendes? (Diccio			</a> 
			<span class="value">333</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">8</span> 
			<a href="/posts/recetas-y-cocina/10725229/Esta-es-la-gastronomia-Colombiana_-Entra-y-Conocela_.html"> 
				Esta es la gastronomia Colombiana, 			</a> 
			<span class="value">302</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">9</span> 
			<a href="/posts/hazlo-tu-mismo/10732993/Entra-y-sali-sabiendo-tocar-la-guitarra---Tutorial-complet.html"> 
				Entrá y salí sabiendo tocar la gu			</a> 
			<span class="value">251</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">10</span> 
			<a href="/posts/imagenes/10717971/Tu-gif-de-seguir-usuario-con-chicas-sexys_-futbolistas_-etc.html"> 
				Tu gif de seguir usuario con chicas			</a> 
			<span class="value">250</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">11</span> 
			<a href="/posts/humor/10728614/Post-Dedicado-Al-Fin-Del-Mundo-_La-Verdadera-Historia_.html"> 
				Post Dedicado Al Fin Del Mundo (La 			</a> 
			<span class="value">225</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">12</span> 
			<a href="/posts/hazlo-tu-mismo/10724591/Disene-una-CPU-de-8-bits_-Y-te-la-muestro-_.html"> 
				Diseñé una CPU de 8 bits, Y te la			</a> 
			<span class="value">206</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">13</span> 
			<a href="/posts/imagenes/10733209/_Ac_Dc_---Mi-Homenaje.html"> 
				?Ac/Dc? - Mi Homenaje			</a> 
			<span class="value">201</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">14</span> 
			<a href="/posts/info/10720270/Si-hubiese-sido-el-ultimo-Dia-de-Vida.html"> 
				Si hubiese sido el ultimo Día de V			</a> 
			<span class="value">200</span> 
		</div> 
			</div> 
		<div id="MonthPostBox" class="list" style="display:none;"> 
				<div class="list-element"> 
			<span class="number-list">1</span> 
			<a href="/posts/taringa/10557222/La-situacion-de-Taringa_-explicada-por-nosotros.html"> 
				La situación de Taringa! explicada			</a> 
			<span class="value">33031</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">2</span> 
			<a href="/posts/info/10458069/Por-que-no-voy-a-votar-a-CFK-este-2011.html"> 
				Por qué no voy a votar a CFK este 			</a> 
			<span class="value">16692</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">3</span> 
			<a href="/posts/info/10442057/La-posta-sobre-4Chan_-Fue-un-Argentino.html"> 
				La posta sobre 4Chan: Fue un Argent			</a> 
			<span class="value">14199</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">4</span> 
			<a href="/posts/imagenes/10627480/Desmotivadores-Para-Romperte-El-Corazon-_.html"> 
				Desmotivadores Para Romperte El Cor			</a> 
			<span class="value">13602</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">5</span> 
			<a href="/posts/humor/10508238/El-Misterio-de-Lexotanil---Parte-1_2.html"> 
				El Misterio de Lexotanil - Parte 1/			</a> 
			<span class="value">12934</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">6</span> 
			<a href="/posts/noticias/10578847/Taringa-y-el-bochorno-legal-definitivo.html"> 
				Taringa y el bochorno legal definit			</a> 
			<span class="value">9245</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">7</span> 
			<a href="/posts/imagenes/10465257/17-frases-en-17-imagenes.html"> 
				17 frases en 17 imágenes			</a> 
			<span class="value">9143</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">8</span> 
			<a href="/posts/info/10556700/_Quien-ha-matado-mas-gente-en-la-biblia_-_-Dios-o-el-diablo.html"> 
				¿Quien ha matado mas gente en la b			</a> 
			<span class="value">7091</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">9</span> 
			<a href="/posts/hazlo-tu-mismo/10546404/Tv-Satelital-Sin-Rentas-Mensuales-Fta.html"> 
				Tv Satelital Sin Rentas Mensuales F			</a> 
			<span class="value">6970</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">10</span> 
			<a href="/posts/mascotas/10446849/Se-acuerdan-de-Benet_el-perro-que-quemo-un-h_d_p_Ayer-y-hoy.html"> 
				Se acuerdan de Benet,el perro que q			</a> 
			<span class="value">6723</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">11</span> 
			<a href="/posts/imagenes/10454230/No-somos-mas-que-parte-de-una-Gran-estadistica.html"> 
				No somos mas que parte de una Gran 			</a> 
			<span class="value">6401</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">12</span> 
			<a href="/posts/humor/10515567/Si-Cristina-K_-administrara-Taringa_.html"> 
				Si Cristina K. administrara Taringa			</a> 
			<span class="value">6170</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">13</span> 
			<a href="/posts/recetas-y-cocina/10530104/Bon-o-bon.html"> 
				Bon o bon			</a> 
			<span class="value">5802</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">14</span> 
			<a href="/posts/info/10628348/OPTaringa_-de-Anonymous_-Convocatoria-Oficial.html"> 
				OPTaringa! de Anonymous: Convocator			</a> 
			<span class="value">5689</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">15</span> 
			<a href="/posts/deportes/10650195/Te-da-paja-ir-al-Gym_.html"> 
				Te da paja ir al Gym?			</a> 
			<span class="value">5283</span> 
		</div> 
			</div> 
		<div id="AllPostBox" class="list" style="display:none;"> 
				<div class="list-element"> 
			<span class="number-list">1</span> 
			<a href="/posts/imagenes/7838486/Un-bajo-para-Paul-McCartney-_lo-hice-yo-y-se-lo-di_.html"> 
				Un bajo para Paul McCartney (lo hic			</a> 
			<span class="value">44789</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">2</span> 
			<a href="/posts/taringa/10557222/La-situacion-de-Taringa_-explicada-por-nosotros.html"> 
				La situación de Taringa! explicada			</a> 
			<span class="value">33195</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">3</span> 
			<a href="/posts/videos/10245249/Mi-video-salio-en-todos-los-canales.html"> 
				Mi video salio en todos los canales			</a> 
			<span class="value">29427</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">4</span> 
			<a href="/posts/info/3719948/Te-querias-comprar-una-PC_-Primero-Informate.html"> 
				Te querías comprar una PC? Primero			</a> 
			<span class="value">24516</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">5</span> 
			<a href="/posts/apuntes-y-monografias/8937335/Mi-hermano-le-gano-al-cancer-y-es-mi-heroe.html"> 
				Mi hermano le gano al cáncer y es 			</a> 
			<span class="value">21335</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">6</span> 
			<a href="/posts/offtopic/6123797/Te-cuento-algo-cortito.html"> 
				Te cuento algo cortito			</a> 
			<span class="value">19656</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">7</span> 
			<a href="/posts/noticias/9604172/Mando-sensible-al-movimiento-para-pc---Creacion-propia.html"> 
				Mando sensible al movimiento para p			</a> 
			<span class="value">19053</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">8</span> 
			<a href="/posts/offtopic/7587057/_Digamosle-Equot_NOEquot_-a-Tinelli_.html"> 
				¡Digamosle &quot;NO&quot; a Tinell			</a> 
			<span class="value">17890</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">9</span> 
			<a href="/posts/info/9962576/Mi-Viejo-y-la-Verdad-de-Malvinas.html"> 
				Mi Viejo y la Verdad de Malvinas			</a> 
			<span class="value">17553</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">10</span> 
			<a href="/posts/imagenes/9811380/Bloque-de-monedas-de-Mario-en-la-vida-real.html"> 
				Bloque de monedas de Mario en la vi			</a> 
			<span class="value">17285</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">11</span> 
			<a href="/posts/info/10458069/Por-que-no-voy-a-votar-a-CFK-este-2011.html"> 
				Por qué no voy a votar a CFK este 			</a> 
			<span class="value">16742</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">12</span> 
			<a href="/posts/offtopic/10133988/Me-encontre-_5000-pesos-y-tarde-15-minutos-en-devolverlos_.html"> 
				Me encontre $5000 pesos y tarde 15 			</a> 
			<span class="value">16285</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">13</span> 
			<a href="/posts/imagenes/10627480/Desmotivadores-Para-Romperte-El-Corazon-_.html"> 
				Desmotivadores Para Romperte El Cor			</a> 
			<span class="value">15357</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">14</span> 
			<a href="/posts/imagenes/7339332/Aprende-50-cosas-en-un-ratito.html"> 
				Aprendé 50 cosas en un ratito			</a> 
			<span class="value">15294</span> 
		</div> 
				<div class="list-element"> 
			<span class="number-list">15</span> 
			<a href="/posts/deportes/9858723/El-futbol-sin-Argentina___.html"> 
				El futból sin Argentina...			</a> 
			<span class="value">14940</span> 
		</div> 
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
									<li><a id="YesterdayUser" href="javascript:nTopsTabs('topsUserBox','YesterdayUserBox', 'YesterdayUser')" class="active YesterdayUserBox">Ayer</a></li> 
									<li><a id="WeekUser" href="javascript:nTopsTabs('topsUserBox','WeekUserBox', 'WeekUser')" class="WeekUserBox">Semana</a></li> 
									<li><a id="MonthUser" href="javascript:nTopsTabs('topsUserBox','MonthUserBox', 'MonthUser')" class="MonthUserBox">Mes</a></li> 
									<li><a id="AllUser" href="javascript:nTopsTabs('topsUserBox','AllUserBox', 'AllUser')" class="AllUserBox">Todos</a></li> 
							</ul> 
		</div> 
	</div> 
	
		<div id="YesterdayUserBox" class="list" style=""> 
								<div class="list-element user-highlight"> 
				<a href="/perfil/AxelYinYAng"> 
					<img src="http://a03.t.net.ar/avatares/3/6/1/8/48_3618285.jpg" alt="" /> 
				</a> 
				<div class="highlight-data"> 
				<a href="/perfil/AxelYinYAng"> 
					AxelYinYAng				</a> 
				<span class="value">480</span> 
				<a		name="follow"
	onclick="notifica.follow('user', 3618285, notifica.userIntopContext, $(this), false);"
		class="follow-user-top ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only"
	> 
	<i class="icon followers"></i> 
	<span class="ui-button-text default-button-text"> 
		Seguir	</span> 
	<span class="success-button-text" style="display:none"> 
		Dejar de seguir	</span> 
</a> 
						</div> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">2</span> 
				<a href="/perfil/santy359"> 
					santy359				</a> 
				<span class="value">444</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">3</span> 
				<a href="/perfil/kamekameja"> 
					kamekameja				</a> 
				<span class="value">392</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">4</span> 
				<a href="/perfil/nicocat"> 
					nicocat				</a> 
				<span class="value">379</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">5</span> 
				<a href="/perfil/NanoLazaro"> 
					NanoLazaro				</a> 
				<span class="value">351</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">6</span> 
				<a href="/perfil/galoflow"> 
					galoflow				</a> 
				<span class="value">337</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">7</span> 
				<a href="/perfil/IvoWarhead"> 
					IvoWarhead				</a> 
				<span class="value">336</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">8</span> 
				<a href="/perfil/RICKYMOSCA"> 
					RICKYMOSCA				</a> 
				<span class="value">335</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">9</span> 
				<a href="/perfil/x_lulu"> 
					x_lulu				</a> 
				<span class="value">333</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">10</span> 
				<a href="/perfil/DaOp0725"> 
					DaOp0725				</a> 
				<span class="value">302</span> 
			</div> 
						</div> 
		<div id="WeekUserBox" class="list" style="display:none;"> 
								<div class="list-element user-highlight"> 
				<a href="/perfil/El_Chapo_Guzman"> 
					<img src="http://a02.t.net.ar/avatares/3/8/3/9/48_3839278.jpg" alt="" /> 
				</a> 
				<div class="highlight-data"> 
				<a href="/perfil/El_Chapo_Guzman"> 
					El_Chapo_Guzman				</a> 
				<span class="value">13632</span> 
				<a		name="follow"
	onclick="notifica.follow('user', 3839278, notifica.userIntopContext, $(this), false);"
		class="follow-user-top ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only"
	> 
	<i class="icon followers"></i> 
	<span class="ui-button-text default-button-text"> 
		Seguir	</span> 
	<span class="success-button-text" style="display:none"> 
		Dejar de seguir	</span> 
</a> 
						</div> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">2</span> 
				<a href="/perfil/AnonOP"> 
					AnonOP				</a> 
				<span class="value">6364</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">3</span> 
				<a href="/perfil/coquito1408"> 
					coquito1408				</a> 
				<span class="value">5364</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">4</span> 
				<a href="/perfil/pablOOO5"> 
					pablOOO5				</a> 
				<span class="value">4248</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">5</span> 
				<a href="/perfil/judas369"> 
					judas369				</a> 
				<span class="value">3954</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">6</span> 
				<a href="/perfil/ser_gio009"> 
					ser_gio009				</a> 
				<span class="value">2994</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">7</span> 
				<a href="/perfil/Imnotathome"> 
					Imnotathome				</a> 
				<span class="value">2923</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">8</span> 
				<a href="/perfil/Estebanelv"> 
					Estebanelv				</a> 
				<span class="value">2390</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">9</span> 
				<a href="/perfil/Edwardo"> 
					Edwardo				</a> 
				<span class="value">2234</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">10</span> 
				<a href="/perfil/gastongarello"> 
					gastongarello				</a> 
				<span class="value">2080</span> 
			</div> 
						</div> 
		<div id="MonthUserBox" class="list" style="display:none;"> 
								<div class="list-element user-highlight"> 
				<a href="/perfil/Taringa"> 
					<img src="http://a04.t.net.ar/avatares/2/9/8/7/48_2987.jpg" alt="" /> 
				</a> 
				<div class="highlight-data"> 
				<a href="/perfil/Taringa"> 
					Taringa				</a> 
				<span class="value">33021</span> 
				<a		aria-disabled="true"
	disabled="true"
		class="unfollow-user-top ui-button-positive ui-button-disabled ui-state-disabled fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only"
	> 
	<i class="icon followers"></i> 
	<span class="ui-button-text default-button-text"> 
		Siguiendo	</span> 
	<span class="success-button-text" style="display:none"> 
		Ver Perfil	</span> 
</a> 
						</div> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">2</span> 
				<a href="/perfil/ddd1991"> 
					ddd1991				</a> 
				<span class="value">16682</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">3</span> 
				<a href="/perfil/nanopene"> 
					nanopene				</a> 
				<span class="value">14513</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">4</span> 
				<a href="/perfil/El_Chapo_Guzman"> 
					El_Chapo_Guzman				</a> 
				<span class="value">13632</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">5</span> 
				<a href="/perfil/Estebancalvo95"> 
					Estebancalvo95				</a> 
				<span class="value">12923</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">6</span> 
				<a href="/perfil/judas369"> 
					judas369				</a> 
				<span class="value">11697</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">7</span> 
				<a href="/perfil/sodes"> 
					sodes				</a> 
				<span class="value">11125</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">8</span> 
				<a href="/perfil/Juan_elcarmen2"> 
					Juan_elcarmen2				</a> 
				<span class="value">9490</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">9</span> 
				<a href="/perfil/manolo12"> 
					manolo12				</a> 
				<span class="value">9244</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">10</span> 
				<a href="/perfil/antoni16z16"> 
					antoni16z16				</a> 
				<span class="value">7757</span> 
			</div> 
						</div> 
		<div id="AllUserBox" class="list" style="display:none;"> 
								<div class="list-element user-highlight"> 
				<a href="/perfil/peluq"> 
					<img src="http://a02.t.net.ar/avatares/3/7/7/0/48_377027.jpg" alt="" /> 
				</a> 
				<div class="highlight-data"> 
				<a href="/perfil/peluq"> 
					peluq				</a> 
				<span class="value">85333</span> 
				<a		name="follow"
	onclick="notifica.follow('user', 377027, notifica.userIntopContext, $(this), false);"
		class="follow-user-top ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only"
	> 
	<i class="icon followers"></i> 
	<span class="ui-button-text default-button-text"> 
		Seguir	</span> 
	<span class="success-button-text" style="display:none"> 
		Dejar de seguir	</span> 
</a> 
						</div> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">2</span> 
				<a href="/perfil/kuruzka"> 
					kuruzka				</a> 
				<span class="value">74423</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">3</span> 
				<a href="/perfil/blanconegro"> 
					blanconegro				</a> 
				<span class="value">73539</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">4</span> 
				<a href="/perfil/adrianmetaliko2009"> 
					adrianmetaliko2009				</a> 
				<span class="value">70024</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">5</span> 
				<a href="/perfil/polbaz"> 
					polbaz				</a> 
				<span class="value">64599</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">6</span> 
				<a href="/perfil/ironmatt"> 
					ironmatt				</a> 
				<span class="value">62747</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">7</span> 
				<a href="/perfil/Australopitecusentanga"> 
					Australopitecusentanga				</a> 
				<span class="value">60085</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">8</span> 
				<a href="/perfil/Filiby"> 
					Filiby				</a> 
				<span class="value">58327</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">9</span> 
				<a href="/perfil/sli33"> 
					sli33				</a> 
				<span class="value">57519</span> 
			</div> 
											<div class="list-element"> 
				<span class="number-list">10</span> 
				<a href="/perfil/judas369"> 
					judas369				</a> 
				<span class="value">57368</span> 
			</div> 
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
		<span class="city floatL">Miami Beach</span> 
		<img style="margin-left:5px" src="http://o2.t26.net/images/clima/i_0008.png" /> 
					<a href="/cuenta" class="floatR">Cambiar</a> 
				<div class="weather-data floatL"> 
			<div class="floatL">Temp 27&deg;</div> 
			<div class="floatR">Hum 65%</div> 
		</div> 
	</div> 
	<div class="weather-more" style="display:none;"> 
		<div class="clearfix" style="border-bottom:1px dotted #EEE;padding-bottom:5px; margin-bottom:5px;"> 
			<span>Ma&ntilde;ana</span> 
			<img src="http://o2.t26.net/images/clima/i_0001.png" alt="" /> 
			<strong><span class="min">26&deg;</span> / <span class="max">29&deg;</span></strong> 
		</div> 
		<div class="clearfix"> 
			<span>Pasado</span> 
			<img src="http://o2.t26.net/images/clima/i_0001.png" alt="" /> 
			<strong><span class="min">26&deg;</span> / <span class="max">28&deg;</span></strong> 
		</div> 
		<div class="view-more-list"><a href="/clima/" class="">Informacion detallada del clima</a></div> 
		
	</div> 
	<div class="read-more clearfix"> 
		<span onclick="$('div.weather-more, .show-more').toggle()" style="" class="show-more">Ver más &#187;</span> 
		<span onclick="$('div.weather-more, .show-more').toggle()" style="display:none" class="show-more">&#171; Ver menos</span> 
	</div> 
</div> 
		
 
 
 
 
<!-- ADIDAS CAMISETA --> 
 
 
 
 
<!-- FIN ADIDAS CAMISETA -->		<div id="takeover_div"></div> 
	<div style="padding:0;"> 
		<center> 
			
<script type="text/javascript"> 
	GA_googleFillSlotWithSize("ca-pub-5717128494977839", "tar_h_250_general", 250, 250);
</script> 
 
		</center> 
	</div> 
	
<!-- Nokia --> 
 
<!-- Nokia - Celulares --> 
 
 
		<!-- tagcloud --> 
		<div id="tags-trendsBox" class="box"> 
		<div id="tagcloud" class="textrank-tags"> 
					<span class="tag-size5"> <a rel="tag" href="/tags/espa%C3%B1a">españa</a></span> 
						<span class="tag-size4"> <a rel="tag" href="/tags/gratis">gratis</a></span> 
						<span class="tag-size1"> <a rel="tag" href="/tags/imagen">imagen</a></span> 
						<span class="tag-size3"> <a rel="tag" href="/tags/boca">boca</a></span> 
						<span class="tag-size4"> <a rel="tag" href="/tags/musica">musica</a></span> 
						<span class="tag-size2"> <a rel="tag" href="/tags/carrizo">carrizo</a></span> 
						<span class="tag-size5"> <a rel="tag" href="/tags/mejor">mejor</a></span> 
						<span class="tag-size5"> <a rel="tag" href="/tags/juego">juego</a></span> 
						<span class="tag-size2"> <a rel="tag" href="/tags/lorenzo">lorenzo</a></span> 
						<span class="tag-size1"> <a rel="tag" href="/tags/mundo">mundo</a></span> 
						<span class="tag-size4"> <a rel="tag" href="/tags/nueva">nueva</a></span> 
						<span class="tag-size3"> <a rel="tag" href="/tags/auto">auto</a></span> 
						<span class="tag-size2"> <a rel="tag" href="/tags/video">video</a></span> 
						<span class="tag-size3"> <a rel="tag" href="/tags/fotos">fotos</a></span> 
						<span class="tag-size5"> <a rel="tag" href="/tags/nuevo">nuevo</a></span> 
						<span class="tag-size1"> <a rel="tag" href="/tags/futbol">futbol</a></span> 
						<span class="tag-size3"> <a rel="tag" href="/tags/amor">amor</a></span> 
						<span class="tag-size4"> <a rel="tag" href="/tags/argentina">argentina</a></span> 
						<span class="tag-size1"> <a rel="tag" href="/tags/river">river</a></span> 
						<span class="tag-size2"> <a rel="tag" href="/tags/humor">humor</a></span> 
					</div> 
	</div> 
		<!-- /tagcloud --> 
	<br class="space" /> 
	<div class="box_cuerpo"> 
<center> 
<script type="text/javascript"> 
	GA_googleFillSlotWithSize("ca-pub-5717128494977839", "tar_h_160_general", 160, 600);
</script> 
</center> 
</div> 
</div> 
		</div> 
<?php
pie();
?>