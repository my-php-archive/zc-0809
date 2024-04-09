<?php
function cabecera_general()
{
 echo'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" > 
	<head profile="http://purl.org/NET/erdf/profile"> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
				<link rel="alternate" type="application/atom+xml" title="Ultimos Posts" href="http://rss.taringa.net/Taringa/ultimos-post" /> 
				<link rel="alternate" type="application/atom+xml" title="TOPs post de la semana" href="http://rss.taringa.net/Taringa/ultimos-post" /> 
				<link rel="alternate" type="application/atom+xml" title="Usuarios TOP - Ultimos 30 dias" href="http://rss.taringa.net/Taringa/ultimos-post" /> 
						<title>Taringa! - Inteligencia Colectiva</title> 
						<link type="text/css" href="http://o2.t26.net/img/style.css" rel="stylesheet" />	
		<link type="text/css" href="http://o2.t26.net/img/ui.css" rel="stylesheet" />	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script> 
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript"></script> 
		<script src="http://o2.t26.net/js/es.js" type="text/javascript"></script> 
		<script src="http://o2.t26.net/js/acciones.js?6.8.64" type="text/javascript"></script> 
				<script type="text/javascript"> 
		var global_data = { user_key: "9f9cb7", postid: "", comid: "", temaid: "", img: "http://o2.t26.net/" }
		$(document).ready(function(){
			timelib.current = 1306122744;
			timelib.upd();
					});
		</script> 
		<script type="text/javascript" src="http://partner.googleadservices.com/gampad/google_service.js"></script> 
 
<script type="text/javascript"> 
	GS_googleAddAdSenseService("ca-pub-5717128494977839");
	GS_googleEnableAllServices();
</script> 
 
 
 
<script type="text/javascript"> 
	GA_googleAddAttr("d", "si");
	GA_googleAddAttr("s", "m");
	GA_googleAddAttr("e", "36");
	GA_googleAddAttr("p", "florida");
	GA_googleAddAttr("c", "general");
	GA_googleAddAttr("de", "no");
</script> 
 
 
 
<script type="text/javascript"> 
	GA_googleUseIframeRendering();
</script>			</head> 
	<body> 
		<div id="fb-root"></div> 
		<script type="text/javascript">window.fbAsyncInit=facebook_ready;(function(){var e=document.createElement(script);e.src=document.location.protocol+//connect.facebook.net/es_LA/all.js;e.async=true;document.getElementById(fb-root).appendChild(e)}())</script> 
		<div id="header">		
			<div class="wrapper"> 
				<a id="logo" href="/"></a> 
				<div id="search" class="floatR"> 
					<input type="text"  placeholder="Buscar..." class="searchq fast-search" /> 
					<a class="btn_search"></a> 
				</div> 
        		<div class="current-user rounded real-shadow clearfix"> 
										<div id="notifications-navitem" class="navitem nohide" onclick="notifica.last()"> 
						<i href="/monitor" class="icon notifications"></i> 
											</div> 
					<div id="notifications-box" class="nohide navpanel modal-dialog real-shadow rounded" style="display:none"> 
						<div class="tail up"> 
						</div> 
						<div class="modal-wrapper rounded"> 
							<h3>Notificaciones</h3> 
							<div class="list"> 
							</div> 
							<div class="view-more-list"> 
								<a class="" href="/monitor" style="margin-left:5px;padding:2px;"> 
									Ir a Notificaciones
								</a> 
							</div> 
						</div> 
					</div> 
					<div  id="mensajes-navitem" class="navitem nohide" onclick="mensajes.last(); return false;"> 
						<i class="icon messages"></i> 
												<div class="bubble"> 
							<a href="/mensajes"> 
								<span>692</span> 
							</a> 
						</div> 
											</div> 
					<div id="mensajes-box" class="nohide navpanel modal-dialog real-shadow rounded" style="display:none;"> 
						<div class="tail up"> 
						</div> 
						<div class="modal-wrapper rounded"> 
							<h3>Mensajes</h3> 
							<div id="mensajes-list" class="list"> 
							</div> 
							<div class="view-more-list"> 
								<a class="" href="/mensajes" style="margin-left:5px;padding:2px;"> 
									Ir a Mensajes
								</a> 
							</div> 
						</div> 
					</div> 
					<div class="navitem favorites" onclick="location.href=\'/favoritos\'"> 
						<i class="icon favorites"></i> 
					</div> 
					<div class="navitem username" onmouseover="user_menu_show(1);" onmouseout="user_menu_show(0);"> 
						<a href="/perfil/clon_de_eze"> 
							<img src="http://a02.t.net.ar/avatares/5/8/4/0/16_5840591.jpg" /> 
							clon_de_eze						</a> 
						<div class="my-account-links real-shadow navpanel" onmouseout="user_menu_show(0);"> 
							<a href="/cuenta/">Cuenta</a> 
							<a class="odd" href="/perfil/clon_de_eze">Perfil</a> 
							<a href="/mis-borradores/">Borradores</a> 
							<a class="odd" href="/logout/9f9cb7">Salir</a> 
						</div> 
					</div> 
									</div> 
			</div> 
		</div> 
		<div id="nav" class=""> 
			<div class="wrapper"> 
				<ul class="clearfix"> 
					<li class="new"><a href="/mi"><i class="icon home"></i></a><span></span></li>					<li class="active"><a href="/">Posts</a></li> 
					<li><a href="/comunidades">Comunidades</a></li> 
					<li><a href="/top">TOPs</a></li> 
									</ul> 
 
				<div id="show-paises-lista" class="clearfix clearBeta clearboth"> 
					<span> 
												<img src="http://o2.t26.net/images/global.png" width="11" style="margin:0 3px 0 2px;vertical-align:middle" /> Global
											</span> 
				</div> 
			</div> 
		</div> 
		<div class="country"> 
			<div class="wrapper"> 
				<ul id="paises-lista" class="real-shadow clearfix clearBeta clearboth" style="display:none"> 
					<li><a data-country="0"><img data-lazy="http://o2.t26.net/images/global.png" width="11" style="margin:0 3px 0 2px" /> Global</a> </li> 
					<li><a data-country="ar"><img data-lazy="http://o2.t26.net/images/flags/ar.png" /> Argentina</a> </li> 
					<li><a data-country="cl"><img data-lazy="http://o2.t26.net/images/flags/cl.png" /> Chile</a> </li> 
					<li><a data-country="co"><img data-lazy="http://o2.t26.net/images/flags/co.png" /> Colombia</a> </li> 
					<li><a data-country="es"><img data-lazy="http://o2.t26.net/images/flags/es.png" /> España</a> </li> 
					<li><a data-country="us"><img data-lazy="http://o2.t26.net/images/flags/us.png" /> Estados Unidos</a> </li> 
					<li><a data-country="mx"><img data-lazy="http://o2.t26.net/images/flags/mx.png" /> México</a> </li> 
					<li><a data-country="pe"><img data-lazy="http://o2.t26.net/images/flags/pe.png" /> Perú</a> </li> 
					<li><a data-country="uy"><img data-lazy="http://o2.t26.net/images/flags/uy.png" /> Uruguay</a> </li> 
					<li><a data-country="ve"><img data-lazy="http://o2.t26.net/images/flags/ve.png" /> Venezuela</a> </li> 
				</ul> 
			</div> 
		</div> 
		<div id="main" class="clearfix homes">		
				<div id="menu"> 
			<div class="clearfix"> 
				<ul class="tabs clearfix"> 
					<li class="active"><a href="/">Inicio</a></li> 
					<li ><a href="/posts/novatos">Novatos</a></li> 
					<li ><a href="/destacados">Destacados</a></li> 
										<li ><a href="/agregar">Agregar</a></li> 
					<li ><a href="/mod-history">Historial</a></li> 
									</ul> 
							</div> 
		</div> 
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
												<option value="taringa"> 
							<i class="icon taringa"></i> Taringa!						</option> 
												<option value="turismo"> 
							<i class="icon turismo"></i> Turismo						</option> 
												<option value="tv-peliculas-series"> 
							<i class="icon tv-peliculas-series"></i> TV, Peliculas y series						</option> 
												<option value="videos"> 
							<i class="icon videos"></i> Videos On-line						</option> 
											</select> 
				</div> ';
}
function pie()
{
echo' 
		<div id="footer"> 
			<div class="wrapper"> 
				<div><a href="#cielo" onclick="$(\'body\').scrollTo(0); return false" class="irCielo"><strong>Ir al cielo</strong></a></div> 
				<div id="search-bottom" class="floatR"> 
					<input type="text"  placeholder="Buscar..." class="searchq fast-search" /> 
					<a class="btn_search"></a> 
				</div> 
			</div> 
			<ul class="clearfix"> 
				<li><a href="http://anuncie.taringa.net">Anunciar</a></li> 
				<li><a href="http://ayuda.itaringa.net">Ayuda</a></li> 
				<li><a href="/protocolo/">Protocolo</a></li> 
				<li><a href="/ideas/">Ideas</a></li> 
				<li><a href="/bugs/">Reportar bug</a></li> 
				<li><a href="/contacto/">Contacto</a></li> 
				<li><a href="/busquedas/">Denuncias</a></li> 
				<li><a href="/takedown-notice.php">Report Abuse - DMCA</a></li> 
				<li><a href="/terminos-y-condiciones/">T&eacute;rminos y condiciones</a></li> 
				<li><a href="/privacidad-de-datos/">Privacidad de datos</a></li> 
								<li><a onclick="eraseCookie(\'canIHaveBetaForTaringaV5Plskthx\');window.location.reload()">Desactivar la Beta!</a></li> 
			</ul> 
		</div> 
		<!-- TEMPLATES FOR TPL --> 
		<script id="hovercard" type="text/html"> 
		<div class="tooltip-c compact clearfix">
			<span class="pick"></span>
			<div class="clearfix data-tip">
				<a href="/perfil/<%= nick %>" class="avatar-tip"><img src="<%= avatar %>" /></a>
				<div class="user-tip">
					<a class="nick" href="/perfil/<%= nick %>"><%= nick %></a>
					<img src="http://o2.t26.net/images/flags/<%= flag %>.png" /> <%= rango %>
				</div>
			</div>
			<div class="view-more"><a>M&aacute;s informaci&oacute;n</a></div>
		</div>
		<div class="tooltip-c extended clearfix">
			<span class="pick"></span>
			<div class="clearfix data-tip">
				<a href="/perfil/<%= nick %>" class="avatar-tip"><img src="<%= avatar %>" /></a>
				<div class="user-tip">
					<a class="nick" href="/perfil/<%= nick %>"><%= nick %></a>
					<img src="http://o2.t26.net/images/flags/<%= flag %>.png" /> <%= rango %>
				</div>
			</div>
			<div class="more-data">
				<strong><%= followers %> Seguidores</strong>
				<span>Acerca<%= nameline %></span>
				<%= bio %>
			</div>
			<div class="view-more">
				<%= followButton %>
			</div>
		</div>
		</script> 
		<script id="lastmessages_tmpl" type="text/html"> 
		<% for ( var i = 0; i < data.length; i++ ) { %>
		<div class="list-element <%= data[i].unread %>">
			<img src="<%= data[i].avatar %>" />
			<div class="info-msg">
				<a href="/perfil/<%= data[i].nick %>"><%= data[i].nick %></a><br/>
				<a class="asunto" style="overflow:hidden" href="/mensajes/leer/<%= data[i].id %>"><%= data[i].subject %></a>
			</div>
		</div>
		<% } %>
		</script> 
 
		<script type="text/javascript"> 
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script> 
 
 
<script type="text/javascript"> 
 
var pageTracker = _gat._getTracker("UA-91290-1");
pageTracker._initData();
 
 
pageTracker._setVar(\'registrado\');
pageTracker._trackPageview();
</script> 
</body> 
</html> ';}

?>