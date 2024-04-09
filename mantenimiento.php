<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
<head profile="http://purl.org/NET/erdf/profile">

	<meta http-equiv="X-UA-Compatible" content="chrome=1" />
	<link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
	<link rel="schema.foaf" href="http://xmlns.com/foaf/0.1/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Zincomienzo! - Sumate a la Revolucion</title>

<link href="http://zincomienzo.net/images/css/beta_estilos3.css?5.3" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="http://zincomienzo.net/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="http://zincomienzo.net/images/apple-icon.png" />
<link rel="search" type="application/opensearchdescription+xml" title="Zincomienzo!" href="http://zincomienzo.net/lab/opensearch/Zincomienzo.xml" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="http://zincomienzo.net/images/js/es/beta_acciones2.js?6.5.1" type="text/javascript"></script>
<!--[if IE 6]>
<script src="http://zincomienzo.net/images/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>DD_belatedPNG.fix('#logo a,li, li a, .systemicons, .categoriaPost,.thumb-clima');</script>
<script src="http://zincomienzo.net/images/js/bgiframe.js"></script>
<![endif]-->


<script type="text/javascript">
var global_data={
user_key:'',
postid:'',
comid:'',
temaid:'',
img:'http://zincomienzo.net/'
};
$(document).ready(function(){
timelib.current = 1296669333;
timelib.upd();
})
</script>
</head>

<body>
<div class="brandday">

<div id="mask"></div>
<div id="mydialog"></div>
<div class="rtop"></div>
<div id="maincontainer">
<div id="head">
	<div id="logo">
		<a href="/" title="Zincomienzo!" id="logoi"><img src="http://zincomienzo.net/images/space.gif" border="0" alt="Zincomienzo!" title="Zincomienzo!" align="top" /></a>
	</div>
<div id="banner">
<!-- Publicidad 468x60 -->


</div>
</div><script type="text/javascript">
	var menu_section_actual = 'Posts';
</script>
<div id="menu">
	<ul class="menuTabs">
		<li id="tabbedPosts" class="tabbed here">
			<a href="/" onclick="menu('Posts', this.href); return false;" title="Ir a Posts">Posts  <img src="http://zincomienzo.net/images/arrowdown.png" alt="Drop Down" /></a>
		</li>
		<li id="tabbedComunidades"class="tabbed">
			<a href="/" onclick="menu('Comunidades', this.href); return false;" title="Ir a Comunidades">Comunidades <img src="http://zincomienzo.net/images/arrowdown.png" alt="Drop Down" /></a>

		</li>
		<li id="tabbedTops"class="tabbed">
			<a href="/" onclick="menu('Tops', this.href); return false;" title="Ir a TOPs">TOPs <img src="http://zincomienzo.net/images/arrowdown.png" alt="Drop Down" /></a>
		</li>
	<li class="tabbed registrate">
			<a href="" onclick="registro_load_form(); return false" title="Registrate!"><b>Registrate!</b></a>
	 </li>
  		<li class="clearBoth"></li>

	</ul>

	<div class="opciones_usuario anonimo">
<div class="identificarme">
	<a class="iniciar_sesion" href="javascript:open_login_box()" title="Identificarme">Identificarme</a>

</div>
<div id="login_box"><div class="login_header"><img style="display:none" alt="" src="http://o1.t26.net/images/cerrar.png" class="login_cerrar" onclick="close_login_box();" title="Cerrar mensaje" /></div>
<div class="login_cuerpo">
  <span id="login_cargando" class="gif_cargando floatR"></span>

  <div id="login_error"></div>
    	<form method="POST" action="/cargando.php" id="login_form">
		<label>Usuario</label>
		<input maxlength="64" name="email" id="email" class="ilogin" type="text" />
		<label>Contrase&ntilde;a</label>

		<input maxlength="64" name="pass" id="password" class="ilogin" type="password" />
		<input class="mBtn btnOk" style="width:198px" value="Entrar" title="Entrar" type="submit" />

		<div class="floatR" style="color: #666; padding:5px;font-weight: normal; display:none">
        <input type="checkbox" /> Recordarme?      </div>
    </form>
    <div class="login_footer">
      <a href="/password/">

        &iquest;Olvidaste tu contrase&ntilde;a?      </a>

     	<br />
      <a href="" onclick="open_login_box(); $('#RegistroForm .pasoUno #nick').focus(); return false" style="color:green;">
        <strong>Registrate Ahora!</strong>
	  </a>
		</div>
  </div></div>
	</div>

	<div class="clearBoth"></div>
</div><!-- menu -->

<div class="subMenuContent">

<div class="subMenu here" id="subMenuPosts">
	<ul class="floatL tabsMenu">
		<li class="here"><a href="/" title="Inicio">Inicio</a></li>
		<li><a href="/" title="Novatos" style="font-weight:bold">Novatos</a></li>
		<li><a href="/" title="Destacados" style="font-weight:bold">Destacados</a></li>
		<li><a href="/" title="Buscador(Beta)">Buscador</a></li>
	</ul>

  <div class="floatR filterCat">
	<span>Filtrar por Categor&iacute;as:</span>
	<select onchange="ir_a_categoria(this.value)">
			<option value="root" selected="selected">Seleccionar categor&iacute;a</option>
			<option value="-1">Ver Todas</option>
			<option value="linea">-----</option>

			<option value="animaciones">Animaciones</option>
			<option value="apuntes-y-monografias">Apuntes y Monograf&iacute;as</option>
			<option value="arte">Arte</option>
			<option value="autos-motos">Autos y Motos</option>
			<option value="celulares">Celulares</option>
			<option value="ciencia-educacion">Ciencia y Educaci&oacute;n</option>

			<option value="comics">Comics</option>
			<option value="deportes">Deportes</option>
			<option value="Zincomienzo">Zincomienzo!</option>
			<option value="downloads">Downloads</option>
			<option value="ebooks-tutoriales">E-books y Tutoriales</option>
			<option value="ecologia">Ecolog&iacute;a</option>

			<option value="economia-negocios">Econom&iacute;a y negocios</option>
			<option value="femme">Femme</option>
			<option value="hazlo-tu-mismo">Hazlo tu mismo</option>
			<option value="humor">Humor</option>
			<option value="imagenes">Im&aacute;genes</option>

			<option value="info">Info</option>
			<option value="juegos">Juegos</option>
			<option value="links">Links</option>
			<option value="linux">Linux</option>
			<option value="musica">M&uacute;sica</option>
			<option value="mac">Mac</option>

			<option value="manga-anime">Manga y Anime</option>
			<option value="mascotas">Mascotas</option>
			<option value="noticias">Noticias</option>
			<option value="offtopic">Off-topic</option>
			<option value="recetas-y-cocina">Recetas y Cocina</option>
			<option value="salud-bienestar">Salud y Bienestar</option>

			<option value="solidaridad">Solidaridad</option>
			<option value="turismo">Turismo</option>
			<option value="tv-peliculas-series">TV, Peliculas y series</option>
			<option value="videos">Videos On-line</option></select>
  </div>
	<div class="clearBoth"></div>
</div>

<div class="subMenu" id="subMenuComunidades">
	<ul class="floatL tabsMenu">
<li><a href="/comunidades/" title="Inicio">Inicio</a></li>
<li>
	<a href="/comunidades/dir/" title="Directorio">Directorio</a>
</li>
<li><a href="http://buscar.zincomienzo.net/" title="Buscador (Beta)">Buscador</a></li>
	</ul>
<div class="floatR filterCat">
	<span>Filtrar por Categor&iacute;as:</span>

	<select onchange="com.ir_a_categoria(this.value)">
		<option value="root" selected="selected">Seleccionar categor&iacute;a</option>
		<option value="-1">Ver Todas</option>
		<option value="linea">-----</option>
		<option value="arte-literatura">Arte y Literatura</option>
		<option value="deportes">Deportes</option>

		<option value="diversion-esparcimiento">Diversi&oacute;n y Esparcimiento</option>
		<option value="economia-negocios">Econom&iacute;a y Negocios</option>
		<option value="entretenimiento-medios">Entretenimiento y Medios</option>
		<option value="grupos-organizaciones">Grupos y Organizaciones</option>
		<option value="interes-general">Inter&eacute;s general</option>

		<option value="internet-tecnologia">Internet y Tecnolog&iacute;a</option>
		<option value="musica-bandas">M&uacute;sica y Bandas</option>
		<option value="regiones">Regiones</option>	</select>
</div>
	<div class="clearBoth"></div>
</div>

<div class="subMenu" id="subMenuTops">
	<ul class="floatL tabsMenu">
		<li><a href="/top/">Posts</a></li>
		<li><a href="/top/comunidades/">Comunidades</a></li>
		<li><a href="/top/temas/">Temas</a></li>
		<li><a href="/top/usuarios/">Usuarios</a></li>
	</ul>

	<div class="clearBoth"></div>
</div>
</div><!-- subMenuContent -->
<div id="cuerpocontainer">
<div align="center">
<br />
<center><font size=2><b>Estamos realizando algunas mejoras en el sistema, volveremos en unos minutos..</b></font><center/> 
<br />
<br />
<img src="http://www.zincomienzo.net/images/mejorastecnicas.png"/>
<br />

</div>
<div style="clear:both"></div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
</div>
<div id="pie">

<a href="/"><b>Anuncie en Z!</b></a> - 

<a href="/">Nuevas Ideas</a> -
<a href="/">Reportar Bug</a> -
<a href="/">Contacto</a> - 
<a href="/">Denuncias</a> - 
<a href="/">Enlazanos</a> - 
<a href="/">Definiciones</a> - 
<a href="/">Protocolo</a> - 
<a href="/">Trabaja en Zincomienzo!</a>
<br />
<a href="/">T&eacute;rminos y condiciones</a> - 
<a href="/">Privacidad de datos</a> -
<a href="/">Report Abuse - DCMA</a>
</div>
</div>
<div class="rbott"></div>
<div id="footer">

</div><!--FOOTER -->

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18297032-1']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</body>
</html>