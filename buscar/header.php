<?php
include('../includes/configuracion.php');
include('../includes/funciones.php');
include('../session.php');
error_reporting(0);
$key = $_SESSION['id'];

$direccion = explode("/", $_SERVER['REQUEST_URI']);
$naci = time();

$ip = no_i($_SERVER['REMOTE_ADDR']);
mysql_query("UPDATE usuarios SET ultimaaccion=unix_timestamp(), ultimaip='$ip' WHERE id='{$key}'");
$sqlrango=mysql_query("SELECT * FROM usuarios WHERE id='{$key}'");
$rangoz=mysql_fetch_array($sqlrango);
actualizarango($_SESSION['id'], $rangoz['rango'], $rangoz['puntos']);


$sql = "SELECT id, elim, id_autor, titulo, contenido, privado, coments, tags, categoria FROM posts where id='$id'";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$sql3 = "SELECT * FROM usuarios where id='{$row['id_autor']}'";
$rs1 = mysql_query($sql3, $con);
$raw = mysql_fetch_array($rs1);

$sql1 = "SELECT * FROM usuarios WHERE id='{$key}'";
$rs = mysql_query($sql1, $con);
$rowNot = mysql_fetch_array($rs);

function cabecera_buscador()
{
	global $comunidad, $descripcion, $titulo, $con, $url, $images, $manten, $aux, $db;
	global $id_comuni, $id_tema;
echo <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="google-site-verification" content="xLzDE9MQcQ5X1skYRVxR21fa1JtYpZqk1kWiN8yBxsQ" />
		<meta name="description" content="El buscador de {$comunidad} ofrece excelentes resultados ya que permite la integraci&oacute;n de todos los contenidos de Internet junto a la mejor informaci&oacute;n seleccionada y evaluada por nuestra gran comunidad." />
		<link rel="search" type="application/opensearchdescription+xml" title="{$comunidad} Buscador" href="/opensearch.xml" />
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<title>{$titulo} - {$comunidad} Buscador</title>
		<link type="text/css" rel="stylesheet" href="http://zincomienzo.net/search/estilo.css?2.1" />
				<script type="text/javascript">window.google_analytics_uacct = "UA-91290-9";</script>
		<script type="text/javascript">
			var global_location = 'home';
			var global_data = {
				pais: 'mx'
			}
		</script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://zincomienzo.net/search/search.js?2.0"></script>
		<script type="text/javascript" src="http://www.google.com/jsapi?autoload=%7B%22modules%22%3A%5B%7B%22name%22%3A%22ads%22%2C%22version%22%3A%221%22%2C%22packages%22%3A%5B%22search%22%5D%7D%5D%7D"></script>

		<!--[if IE 6]>
		<script src="{$images}/js/DD_belatedPNG_0.0.8a-min.js"></script>
		<script>DD_belatedPNG.fix('*');</script>
		<script src="{$images}/js/bgiframe.js"></script>
		<![endif]-->
	</head>

EOF;

}

function cabecera_buscadorp()
{
	global $comunidad, $descripcion, $titulo, $con, $url, $images, $manten, $aux, $db;
	global $id_comuni, $id_tema;
echo <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="google-site-verification" content="xLzDE9MQcQ5X1skYRVxR21fa1JtYpZqk1kWiN8yBxsQ" />
		<meta name="description" content="El buscador de {$comunidad} ofrece excelentes resultados ya que permite la integraci&oacute;n de todos los contenidos de Internet junto a la mejor informaci&oacute;n seleccionada y evaluada por nuestra gran comunidad." />
		<link rel="search" type="application/opensearchdescription+xml" title="{$comunidad} Buscador" href="/opensearch.xml" />
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<title>{$titulo} - {$comunidad} Buscador</title>
		<link type="text/css" rel="stylesheet" href="http://zincomienzo.net/search/estilo.css?2.1" />
				<script type="text/javascript">window.google_analytics_uacct = "UA-91290-9";</script>
		<script type="text/javascript">
			var global_location = 'posts';
			var global_data = {
				pais: 'mx'
			}
		</script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://zincomienzo.net/search/search.js?2.0"></script>
		<script type="text/javascript" src="http://zincomienzo.net/js/es/beta_acciones2.js?6.2.2"></script>
		<script type="text/javascript" src="http://www.google.com/jsapi?autoload=%7B%22modules%22%3A%5B%7B%22name%22%3A%22ads%22%2C%22version%22%3A%221%22%2C%22packages%22%3A%5B%22search%22%5D%7D%5D%7D"></script>

		<!--[if IE 6]>
		<script src="{$images}/js/DD_belatedPNG_0.0.8a-min.js"></script>
		<script>DD_belatedPNG.fix('*');</script>
		<script src="{$images}/js/bgiframe.js"></script>
		<![endif]-->
	</head>
EOF;

}

function cabecera_buscadorw()
{
	global $comunidad, $descripcion, $titulo, $con, $url, $images, $manten, $aux, $db;
	global $id_comuni, $id_tema;
echo <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="google-site-verification" content="xLzDE9MQcQ5X1skYRVxR21fa1JtYpZqk1kWiN8yBxsQ" />
		<meta name="description" content="El buscador de {$comunidad} ofrece excelentes resultados ya que permite la integraci&oacute;n de todos los contenidos de Internet junto a la mejor informaci&oacute;n seleccionada y evaluada por nuestra gran comunidad." />
		<link rel="search" type="application/opensearchdescription+xml" title="{$comunidad} Buscador" href="/opensearch.xml" />
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<title>{$titulo} - {$comunidad} Buscador</title>

		<link type="text/css" rel="stylesheet" href="http://zincomienzo.net/search/estilo.css?2.1" />
				<script type="text/javascript">window.google_analytics_uacct = "UA-91290-9";</script>
		<script type="text/javascript">
			var global_location = 'internet';
			var global_data = {
				pais: 'mx'
			}
		</script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://zincomienzo.net/search/search.js?2.0"></script>
		<script type="text/javascript" src="http://www.google.com/jsapi?autoload=%7B%22modules%22%3A%5B%7B%22name%22%3A%22ads%22%2C%22version%22%3A%221%22%2C%22packages%22%3A%5B%22search%22%5D%7D%5D%7D"></script>

		<!--[if IE 6]>
		<script src="{$images}/js/DD_belatedPNG_0.0.8a-min.js"></script>
		<script>DD_belatedPNG.fix('*');</script>
		<script src="{$images}/js/bgiframe.js"></script>
		<![endif]-->
	</head>
EOF;

}

function cabecera_buscadorc()
{
	global $comunidad, $descripcion, $titulo, $con, $url, $images, $manten, $aux, $db;
	global $id_comuni, $id_tema;
echo <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="google-site-verification" content="xLzDE9MQcQ5X1skYRVxR21fa1JtYpZqk1kWiN8yBxsQ" />
		<meta name="description" content="El buscador de {$comunidad} ofrece excelentes resultados ya que permite la integraci&oacute;n de todos los contenidos de Internet junto a la mejor informaci&oacute;n seleccionada y evaluada por nuestra gran comunidad." />
		<link rel="search" type="application/opensearchdescription+xml" title="{$comunidad} Buscador" href="/opensearch.xml" />
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<title>{$titulo} - {$comunidad} Buscador</title>

		<link type="text/css" rel="stylesheet" href="http://zincomienzo.net/search/estilo.css?2.1" />
				<script type="text/javascript">window.google_analytics_uacct = "UA-91290-9";</script>
		<script type="text/javascript">
			var global_location = 'comunidades';
			var global_data = {
				pais: 'mx'
			}
		</script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://zincomienzo.net/search/search.js?2.0"></script>
		<script type="text/javascript" src="http://www.google.com/jsapi?autoload=%7B%22modules%22%3A%5B%7B%22name%22%3A%22ads%22%2C%22version%22%3A%221%22%2C%22packages%22%3A%5B%22search%22%5D%7D%5D%7D"></script>

		<!--[if IE 6]>
		<script src="{$images}/js/DD_belatedPNG_0.0.8a-min.js"></script>
		<script>DD_belatedPNG.fix('*');</script>
		<script src="{$images}/js/bgiframe.js"></script>
		<![endif]-->
	</head>

EOF;

}

function menubu()
{
	global $con, $url, $rangoz, $row, $url, $images, $db, $rowNot, $direccion;
	
if($_SESSION['id']!=null){
echo'
<ul class="bar-list floatR">
					<li><a href="'.$url.'/clima/" title="El clima en '.$rangoz['ciudad'].'"><img style="vertical-align: top; border: medium none;" src="http://o1.t26.net/images/clima/i_0002.png"> '.$weather['current']['temp'].'&deg;C</a></li>
			<li class="monitor icon"><a title="Monitor de usuario" href="'.$url.'/monitor"><span></span></a></li>
			<li class="favoritos icon"><a title="Mis Favoritos" href="'.$url.'/favoritos.php"><span></span></a></li>
			<li class="mensajes icon"><a title="Mensajes" href="'.$url.'/mensajes/"><span></span></a></li>
			<li class="nick icon"><a title="Mi Perfil" href="'.$url.'/perfil/'.$_SESSION['user'].'"><span>'.$_SESSION['user'].'</span></a></li>
			<li class="salir icon"><a title="Salir" href="'.$url.'/logout.php"><span></span></a></li>
					</ul>
';}else{echo'
	<ul class="bar-list floatR">
				<li class="registrate"><a href="'.$url.'/reg.php"><span>Registrate</span></a></li>
			<li class="identificate"><a href="javascript:open_login_box()"><span>Identificate</span></a></li>
					</ul>
				<div id="login_box" style="display: none">
			<div class="login_header">
				<img title="Cerrar mensaje" onclick="close_login_box();" class="login_cerrar" src="'.$images.'/cerrar.png" style="display: none;" />
			</div>
			<div class="login_cuerpo">

				<span class="gif_cargando floatR" id="login_cargando" style="display: none;"></span>
				<div id="login_error" style="display: none;"></div>
				<form action="javascript:login_ajax()" method="post">
					<label>Usuario</label>
					<input type="text" class="ilogin" id="nickname" name="nick" maxlength="64" />
					<label>Contrase&ntilde;a</label>
					<input type="password" class="ilogin" id="password" name="pass" maxlength="64" />
					<input type="submit" title="Entrar" value="Entrar" class="mBtn btnOk" />

					<div style="color: rgb(102, 102, 102); padding: 5px; font-weight: normal; display: none;" class="floatR">
						<input type="checkbox"> Recordarme&#8470;
					</div>
				</form>
				<div class="login_footer">
					<strong>AYUDA</strong><br>
					<a href="'.$url.'/password/">&iquest;Olvidaste tu contrase&ntilde;a?</a>
				</div>

			</div>
		</div>';}
		echo'	</div>';
}
?>