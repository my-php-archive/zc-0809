<?php
function checkban($ip)
{
// consultas de la base de datos
$q = mysql_query("SELECT * FROM `banned` WHERE `ip` = '$ip' LIMIT 1");
$get = mysql_num_rows($q);
if ($get == "1")
{
// denegar accesos
$r=mysql_fetch_array($q);
die("

<div id='menu'>
	<ul class='menuTabs'>

		<li id='tabbedPosts' class='tabbed here'>
			<a href='/' onclick='menu('Posts', this.href); return false;' title='Ir a Posts'>Posts <img src='http://o1.t26.net/images/arrowdown.png' alt='Posts' /></a>
		</li>
		<li id='tabbedComunidades' class='tabbed'>
			<a href='/comunidades/' onclick='menu('Comunidades', this.href); return false;' title='Ir a Comunidades'>Comunidades <img src='http://o1.t26.net/images/arrowdown.png' alt='Comunidades' /></a>
		</li>
		<li id='tabbedTops' class='tabbed'>
			<a href='/top/' onclick='menu('Tops', this.href); return false;' title='Ir a TOPs'>TOPs <img src='http://o1.t26.net/images/arrowdown.png' alt='TOPs' /></a>

		</li>
		<li class='tabbed registrate'>
			<script>utmx_section('Boton Registrate')</script>
				<a href='' onclick='' title='Registrate!'><b>Registrate!</b></a>
			</noscript>
		</li>
  		<li class='clearBoth'></li>
	</ul>

	<div class='opciones_usuario anonimo'>
<div class='identificarme'>
	<a class='iniciar_sesion' href='javascript:open_login_box()' title='Identificarme'>Identificarme</a>
</div>

<div id='login_box'><div class='login_header'><img style='display:none' alt='' src='http://o1.t26.net/images/cerrar.png' class='login_cerrar' onclick='close_login_box();' title='Cerrar mensaje' /></div>
<div class='login_cuerpo'>
  <span id='login_cargando' class='gif_cargando floatR'></span>
  <div id='login_error'></div>
    <form method='post' action='javascript:login_ajax()'>
		<label>Usuario</label>

		<input maxlength='64' name='' id='nickname' class='ilogin' type='text' />
		<label>Contrase&ntilde;a</label>
		<input maxlength='64' name='' id='password' class='ilogin' type='password' />
		<input class='mBtn btnOk' style='width:198px' value='Entrar' title='Entrar' type='submit' />
		<div class='floatR' style='color: #666; padding:5px;font-weight: normal; display:none'>
        <input type='checkbox' /> Recordarme?      </div>
    </form>

    <div class='login_footer'>
      <a href='/password/'>
        &iquest;Olvidaste tu contrase&ntilde;a?      </a>
     	<br />
      <a href='' onclick='' style='color:green;'>
        <strong>Registrate Ahora!</strong>
      </a>   
	    


	    </div>
  </div>
</div>
	</div>
	<div class='clearBoth'></div>
</div><!-- menu -->

<div class='subMenuContent'>
<div class='subMenu here' id='subMenuPosts'>
	<ul class='floatL tabsMenu clearbeta'>

		<li class='here'><a href='/' title='Inicio'>Inicio</a></li>
		<li><a href='/posts/novatos/' title='Novatos' style='font-weight:bold'>Novatos</a></li>
		<li><a href='/destacados/' title='Destacados' style='font-weight:bold'>Destacados</a></li>
					<li><a href='/buscador' title='Buscador'>Buscador</a></li>
				</ul>
  <div class='floatR filterCat'>
    <span>Filtrar por Categor&iacute;as:</span>

    <select onchange='ir_a_categoria(this.value)'>
			<option value='root'>Seleccionar categor&iacute;a</option>
			<option value='-1' selected='selected'>Ver Todas</option>
			<option value='linea'>-----</option>
        <option value='animaciones'>Animaciones</option>
        <option value='apuntes-y-monografias'>Apuntes y Monograf&iacute;as</option>

        <option value='arte'>Arte</option>
        <option value='autos-motos'>Autos y Motos</option>
        <option value='celulares'>Celulares</option>
        <option value='ciencia-educacion'>Ciencia y Educaci&oacute;n</option>
        <option value='comics'>Comics e Historietas</option>
        <option value='deportes'>Deportes</option>

        <option value='downloads'>Downloads</option>
        <option value='ebooks-tutoriales'>E-books y Tutoriales</option>
        <option value='ecologia'>Ecolog&iacute;a</option>
        <option value='economia-negocios'>Econom&iacute;a y Negocios</option>
        <option value='femme'>Femme</option>

        <option value='hazlo-tu-mismo'>Hazlo tu mismo</option>
        <option value='humor'>Humor</option>
        <option value='imagenes'>Im&aacute;genes</option>
        <option value='info'>Info</option>
        <option value='juegos'>Juegos</option>
        <option value='juegos-online'>Juegos On-line</option>

        <option value='links'>Links</option>
        <option value='linux'>Linux y GNU</option>
        <option value='mac'>Mac</option>
        <option value='manga-anime'>Manga y Anime</option>
        <option value='mascotas'>Mascotas</option>
        <option value='musica'>M&uacute;sica</option>

        <option value='noticias'>Noticias</option>
        <option value='offtopic'>Off-topic</option>
        <option value='paranormal'>Paranormal</option>
        <option value='patrocinados'>Patrocinados</option>
        <option value='recetas-y-cocina'>Recetas y Cocina</option>
        <option value='reviews'>Reviews</option>

        <option value='salud-bienestar'>Salud y Bienestar</option>
        <option value='solidaridad'>Solidaridad</option>
        <option value='zincomienzo'>Zincomienzo!</option>
        <option value='turismo'>Turismo</option>
        <option value='tv-peliculas-series'>TV, Peliculas y series</option>
        <option value='videos'>Videos On-line</option>

        </select>
  </div>

	<div class='clearBoth'></div>
</div>
<div class='subMenu' id='subMenuComunidades'>
	<ul class='floatL tabsMenu clearbeta'>
		<li><a href='/comunidades/' title='Inicio'>Inicio</a></li>

<li >
	<a href='/comunidades/dir/' title='Directorio'>Directorio</a>

</li>
					<li ><a href='http://buscar.zincomienzo.net/comunidades' title='Buscador'>Buscador</a></li>
					</ul>
<div class='floatR filterCat'>
	<span>Filtrar por Categor&iacute;as:</span>
	<select onchange='com.ir_a_categoria(this.value)'>
		<option value='root' selected='selected'>Seleccionar categor&iacute;a</option>

		<option value='-1'>Ver Todas</option>
		<option value='linea'>-----</option>
	<option value='arte-literatura'>Arte y Literatura</option>
	<option value='deportes'>Deportes</option>
	<option value='diversion-esparcimiento'>Diversi&oacute;n y Esparcimiento</option>
	<option value='economia-negocios'>Econom&iacute;a y Negocios</option>

	<option value='entretenimiento-medios'>Entretenimiento y Medios</option>
	<option value='grupos-organizaciones'>Grupos y Organizaciones</option>
	<option value='interes-general'>Inter&eacute;s general</option>
	<option value='internet-tecnologia'>Internet y Tecnolog&iacute;a</option>
	<option value='musica-bandas'>M&uacute;sica y Bandas</option>

	<option value='regiones'>Regiones</option>
	</select>
</div>
	<div class='clearBoth'></div>
</div>

<div class='subMenu' id='subMenuTops'>
	<ul class='floatL tabsMenu'>
		<li><a href='/top/posts/'>Posts</a></li>
		<li><a href='/top/comunidades/'>Comunidades</a></li>

		<li><a href='/top/temas/'>Temas</a></li>
		<li><a href='/top/usuarios/'>Usuarios</a></li>
	</ul>
	<div class='clearBoth'></div>
</div>

</div><!-- subMenuContent -->
<div id='cuerpocontainer'>
<!-- inicio cuerpocontainer -->


<center><img src='/images/baneado-por-ip.png'></center>".$r['razon']."




<div style='clear:both'></div>

<!-- fin cuerpocontainer -->
</div>
<div id='pie'>

<a href=''><strong>Anuncie en Z!</strong></a> - 
<a href='/'>Ayuda</a> -
<a href='/ideas/'>Nuevas Ideas</a> - 
<a href='/bugs/'>Reportar bug</a> - 
<!-- <a href='/chat'></a> -  -->

<a href='/contactenos/'>Contacto</a> - 
<a href='/denuncia-publica/'>Denuncias</a> - 
<a href='/enlazanos/'>Enlazanos</a> - 
<a href='/protocolo/'>Protocolo</a> - 
<a href='/busquedas/'>Trabaja en zincomienzo!</a>


<br />
<a href='/terminos-y-condiciones/'>T&eacute;rminos y condiciones</a> - <a href='/privacidad-de-datos/'>Privacidad de datos</a> - <a href='/takedown-notice.php'>Report Abuse - DMCA</a>
</div>
</div>
<div class='rbott'></div>
<div id='footer'>
<img alt='6b65dcba13' src='http://o1.t26.net/images/space.gif' />
</div>





");
}
}
// agrega una ip baneada
function addban($ip,$reason,$legnth)
{
// get current time
$time = time();
// insertamos en la base de datos
$insert = mysql_query("INSERT INTO `banned` (`ip`,`time`,`long`,`reason`) VALUES ('$ip', '$time', '$legnth', '$reason')") or die("Error.<br />".mysql.error()."");
echo "



<html>
<head>

<META HTTP-EQUIV='Refresh' CONTENT='0; URL=/adm/ip-add.php'>

</head>
</html>





";
}
// elimina un registro de la base de datos
function delban($id)
{
$delete = mysql_query("DELETE FROM `banned` WHERE `id` = '$id' LIMIT 1") or die("Could not remove ban.<br />".mysql.error()."");
echo "La direccion ip ha sido eliminada de la lista.";
}
// muestra las direcciones baneadas
function listbans()
{
echo "<a href=banadmin.php?x=add>Agregar</a><p>";
// bucle para mostrar todas
$query = mysql_query("SELECT * FROM `banned` ORDER BY time DESC");
$num = mysql_num_rows($query);
if ($num)
{
while ($r=mysql_fetch_array($query))
{
echo "$r[ip] – $r[razon] – <a href='banadmin.php?x=delete&id=$r[id]'>Eliminar</a><br />";
}
}
}
?>