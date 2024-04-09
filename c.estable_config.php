<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/configuracion.php'); //
include($_SERVER['DOCUMENT_ROOT'].'/includes/funciones.php');
include($_SERVER['DOCUMENT_ROOT'].'/session.php');
require "includes/class_db_mysql.php";
date_default_timezone_set("America/Buenos_Aires");

$load = sys_getloadavg(); 
if ($load[0] > 80) { 
    header('HTTP/1.1 503 Demasiado Ocupado. Intentelo de Nuevo'); 
    die('Error al intentar procesar lo solicitado.'); 
} 

$db=new database;
$db->connect();

$key = $_SESSION['id'];
$mantenimiento = false; //True =
if($mantenimiento == true) Header("Location: mantenimiento.php");

$time = time();


$direccion = explode("/", $_SERVER['REQUEST_URI']);

if($_SESSION['id']!=null){
   $IPREAL =  ($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : $_SERVER["HTTP_X_FORWARDED_FOR"];
   $IP = ((ip2long($IPREAL)) === false) ? die('Chupala Gato!') : $IPREAL;
   
   $db->query("UPDATE usuarios SET ultimaaccion=unix_timestamp(), ultimaip='$IP' WHERE id='{$key}'");
   
   $sqlrango=$db->query("SELECT * FROM usuarios WHERE id='{$key}'");
   $rangoz=$db->fetch_array($sqlrango);
   $notis = $rangoz['notificaciones'];
   
   actualizarango($_SESSION['id'], $rangoz['rango'], $rangoz['puntos']);
}

function cabecera_index()
{
	global $comunidad, $notis, $time, $descripcion, $titulo, $url, $images, $db;
echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html version="XHTML+RDFa 1.0"  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
<head profile="http://purl.org/NET/erdf/profile">

	<meta http-equiv="X-UA-Compatible" content="chrome=1" />
	<link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
	<link rel="schema.foaf" href="http://xmlns.com/foaf/0.1/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv=\'refresh\' content=\'600\' />
<meta name=\'keywords\' content=\''.$comunidad.',linksharing,enlaces,juegos,musica,links,noticias,imagenes,videos,animaciones,arte,deportes,linux,apuntes,monografias,autos,motos,celulares,comics,tutoriales,ebooks,humor,mac,recetas,peliculas,series,Mexico,comunidad\' />
<link rel="alternate" type="application/atom+xml" title="&Uacute;ltimos posts" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="TOPs post de la semana" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="Usuarios TOP - &uacute;ltimos 30 d&iacute;as" href="http://rss.taringa.net/Taringa/ultimos-post" />

<title>'.$comunidad.' - '.$titulo.'</title>


<link href="/images/css/beta_estilos3.css" rel="stylesheet" type="text/css" />





<link rel="shortcut icon" href="'.$images.'/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="'.$images.'/apple-icon.png" />
<link rel="search" type="application/opensearchdescription+xml" title="'.$comunidad.'" href="'.$url.'/lab/opensearch/zincomienzo.xml" />';
if(date('n', $naci)==$rangoz['mes'] and date('j', $naci)==$rangoz['dia']){echo"
<style rel=\"stylesheet\" type=\"text/css\">
#logoi:hover { background-position: 0 0;}
#logoi{background:transparent url('$images/logos/logo_c.png') no-repeat scroll 0 0; float:left; height:60px; width:270px; margin:0;}
</style>";}echo'
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="/images/js/es/beta_acciones2.js?6.3.6" type="text/javascript"></script>
<script src="'.$images.'/js/es/registro.js" type="text/javascript"></script>
<!--[if IE 6]>
<script src="'.$images.'/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>DD_belatedPNG.fix(\'#logo a,li, li a, .systemicons, .categoriaPost,.thumb-clima\');</script>
<script src="'.$images.'/js/bgiframe.js"></script>
<![endif]-->





</div>

<script type="text/javascript">
var global_data={
user_key:\''.$_SESSION['id'].'\',
postid:\'\',
comid:\'\',
temaid:\'\',
img:\''.$url.'/\'
};
$(document).ready(function(){
timelib.current = '.$time.';
timelib.upd();
notifica.popup('.$notis.');
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
		<a href="/" title="'.$comunidad.'" id="logoi"><img src="'.$images.'/space.gif" border="0" alt="'.$comunidad.'" title="'.$comunidad.'" align="top" /></a>
	</div>
<div id="banner">
<!-- Publicidad 480x60 -->
</div>
</div>
';

menu();}

function cabecera_post()
{
	global $comunidad, $id_a, $nick, $fecha, $fechapo, $titulo, $tags, $notis, $time, $titulo2, $id, $descripcion, $url, $images, $db;

$fecha = date('Y-m-d H:m:s',$fechapo);

echo <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html version="XHTML+RDFa 1.0"  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
<head profile="http://purl.org/NET/erdf/profile">

	<meta http-equiv="X-UA-Compatible" content="chrome=1" />
	<link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
	<link rel="schema.foaf" href="http://xmlns.com/foaf/0.1/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="KEYWORDS" CONTENT="{$tags}"><META name="ROBOTS" content="ALL" />
<meta name="revisit-after" content="1 days" />
<meta name="title" content="{$titulo}" />
<meta property="dc:date" content="{$fecha}"/>
<meta property="dc:creator" content="{$nick}" />
<link rel="prev" href="/prev.php?id={$id}" />
<link rel="next" href="/next.php?id={$id}" />
<link rel="alternate" type="application/atom+xml" title="Comentarios del post" href="/rss/comentarios/{$id}" />
<link rel="alternate" type="application/atom+xml" title="Post del usuario" href="/rss/posts-usuario/{$id_a}" />

<title>{$titulo2} - {$comunidad}</title>

<link href="{$images}/css/beta_estilos3.css?5.4.9" rel="stylesheet" type="text/css" />








<link rel="shortcut icon" href="{$images}/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="{$images}/apple-icon.png" />
<link rel="search" type="application/opensearchdescription+xml" title="{$comunidad}" href="{$url}/lab/opensearch/zincomienzo.xml" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="{$images}/js/es/beta_acciones2.js?6.3.6" type="text/javascript"></script>
<!--[if IE 6]>
<script src="{$images}/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>DD_belatedPNG.fix('#logo a,li, li a, .systemicons, .categoriaPost,.thumb-clima');</script>
<script src="{$images}/js/bgiframe.js"></script>
<![endif]-->

<script type="text/javascript">
var global_data={
user_key:'{$_SESSION['id']}',
postid:'{$id}',
comid:'',
temaid:'',
img:'{$url}/'
};
$(document).ready(function(){
timelib.current = {$time};
timelib.upd();
notifica.popup({$notis});
})
</script>


{$code}





</head>
<body>

<div class="brandday">
<div id="mask"></div>
<div id="mydialog"></div>
<div class="rtop"></div>
<div id="maincontainer">
<div id="head">
	<div id="logo">
          <a href="/" title="{$comunidad}" id="logoi"><img src="{$images}/space.gif" border="0" alt="{$comunidad}" title="{$comunidad}" align="top" /></a>
</div>
<div id="banner">
<form name="top_search_box" class="buscador-h" action="{$url_buscador}/posts">
    	<div class="search-in">
	    <a onclick="search_set(this, 'web')">Web</a> - <a onclick="search_set(this, 'posts')" class="search_active">Posts</a> - <a onclick="search_set(this, 'comunidades')">Comunidades</a>
	</div>
    <div style="clear:both">
        <img class="mini_leftIbuscador" src="{$images}/mini_InputSleft_2.gif" />

        <input class="mini_ibuscador onblur_effect" type="text" title="Buscar" value="Buscar" onblur="onblur_input(this)" onfocus="onfocus_input(this)" onkeypress="ibuscador_intro(event)" name="q" id="ibuscadorq" />
	    <input class="mini_bbuscador" vspace="2" type="submit" hspace="10" align="top" title="Buscar" class="bbuscador" alt="Buscar" value="" />
    </div>
</form>

</div>
</div>

EOF;
menu();}

function cabecera_normal()
{
	global $comunidad, $notis, $time, $descripcion, $titulo, $con, $url, $images, $rangoz, $db;
	global $id_comuni, $id_tema;
echo <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html version="XHTML+RDFa 1.0"  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
<head profile="http://purl.org/NET/erdf/profile">

	<meta http-equiv="X-UA-Compatible" content="chrome=1" />
	<link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
	<link rel="schema.foaf" href="http://xmlns.com/foaf/0.1/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>{$comunidad} - {$titulo}</title>

<link href="{$images}/css/beta_estilos3.css?5.4.9" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{$images}/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="{$images}/apple-icon.png" />
<link rel="search" type="application/opensearchdescription+xml" title="{$comunidad}" href="{$url}/lab/opensearch/zincomienzo.xml" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="{$images}/js/es/beta_acciones2.js?6.3.6" type="text/javascript"></script>
<!--[if IE 6]>
<script src="{$images}/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>DD_belatedPNG.fix('#logo a,li, li a, .systemicons, .categoriaPost,.thumb-clima');</script>
<script src="{$images}/js/bgiframe.js"></script>
<![endif]-->


<script type="text/javascript">
var global_data={
user_key:'{$_SESSION['id']}',
postid:'',
comid:'{$id_comuni}',
temaid:'{$id_tema}',
img:'{$url}/'
};
$(document).ready(function(){
timelib.current = {$time};
timelib.upd();
notifica.popup({$notis});
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
		<a href="/" title="{$comunidad}" id="logoi"><img src="{$images}/space.gif" border="0" alt="{$comunidad}" title="{$comunidad}" align="top" /></a>
</div>
<div id="banner">
<!-- Publicidad 480x60 -->
</div>
</div>

EOF;
menu();}

function cabecera_comunidad()
{
	global $comunidad, $notis, $time, $descripcion, $titulo, $con, $url, $images, $rangoz, $db;
	global $id_comuni, $id_tema;
echo <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html version="XHTML+RDFa 1.0"  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
<head profile="http://purl.org/NET/erdf/profile">

	<meta http-equiv="X-UA-Compatible" content="chrome=1" />
	<link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
	<link rel="schema.foaf" href="http://xmlns.com/foaf/0.1/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="KEYWORDS" CONTENT="{$tagsss}"><link rel="alternate" type="application/atom+xml" title="&Uacute;ltimas Respuestas" href="/rss/comunidades/tema-respuestas/{$id_tema}/" />

<title>{$titulo} - {$comunidad}</title>

<link href="{$images}/css/beta_estilos3.css?5.4.9" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{$images}/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="{$images}/apple-icon.png" />
<link rel="search" type="application/opensearchdescription+xml" title="{$comunidad}" href="{$url}/lab/opensearch/zincomienzo.xml" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="{$images}/js/es/beta_acciones2.js?6.3.6" type="text/javascript"></script>
<!--[if IE 6]>
<script src="{$images}/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>DD_belatedPNG.fix('#logo a,li, li a, .systemicons, .categoriaPost,.thumb-clima');</script>
<script src="{$images}/js/bgiframe.js"></script>
<![endif]-->

<script type="text/javascript">
var global_data={
user_key:'{$_SESSION['id']}',
postid:'',
comid:'{$id_comuni}',
temaid:'{$id_tema}',
img:'{$url}/'
};
$(document).ready(function(){
timelib.current = {$time};
timelib.upd();
notifica.popup({$notis});
})
</script>


{$code}

</head>

<body>
<div class="brandday">
<div id="mask"></div>
<div id="mydialog"></div>
<div class="rtop"></div>
<div id="maincontainer">

<div id="head">
	<div id="logo">
		<a href="/" title="{$comunidad}" id="logoi"><img src="{$images}/space.gif" border="0" alt="{$comunidad}" title="{$comunidad}" align="top" /></a>
</div>
<div id="banner">
<form name="top_search_box" class="buscador-h" action="{$url}/comunidades/buscador-comunidades.php">
    	<div class="search-in">
	    <a onclick="search_set(this, 'web')">Web</a> - <a onclick="search_set(this, 'posts')">Posts</a> - <a onclick="search_set(this, 'comunidades')" class="search_active">Comunidades</a>

	</div>
    <div style="clear:both">
        <img class="mini_leftIbuscador" src="{$images}/mini_InputSleft_2.gif" />
        <input class="mini_ibuscador onblur_effect" type="text" title="Buscar" value="Buscar" onblur="onblur_input(this)" onfocus="onfocus_input(this)" onkeypress="ibuscador_intro(event)" name="q" id="ibuscadorq" />
	    <input class="mini_bbuscador" vspace="2" type="submit" hspace="10" align="top" title="Buscar" class="bbuscador" alt="Buscar" value="" />
    </div>
</form>

</div>
</div>

EOF;
menu();}

function menu()
{
	global $con, $url, $rangoz, $row, $url, $images, $rangoz, $db, $url_buscador, $rowNot, $direccion;
echo'<script type="text/javascript">
	var menu_section_actual = \'Posts\';
</script>


';

include($_SERVER['DOCUMENT_ROOT'].'/adm/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/adm/func.ban.php');
checkban($_SERVER['REMOTE_ADDR']);


echo'
<div id="menu">
	<ul class="menuTabs">
		<li id="tabbedPosts"';if($direccion[1]!="comunidades" and $direccion[1]!="admin" and $direccion[1]!="top"){echo' class="tabbed here"';}else{echo'class="tabbed"';}echo'>
			<a href="/" onclick="menu(\'Posts\', this.href); return false;" title="Ir a Posts">Posts  <img src="'.$images.'/arrowdown.png" alt="Drop Down" /></a>
		</li>
		<li id="tabbedComunidades"';if($direccion[1]=="comunidades"){echo' class="tabbed here"';}else{echo'class="tabbed"';}echo'>
			<a href="/comunidades/" onclick="menu(\'Comunidades\', this.href); return false;" title="Ir a Comunidades">Comunidades <img src="'.$images.'/arrowdown.png" alt="Drop Down" /></a>
		</li>
		
 <li id="tabbedTops"';if($direccion[1]=="top"){echo' class="tabbed here"';}else{echo'class="tabbed"';}echo'>
			<a href="/top/';if($direccion[1]=="comunidades"){echo'comunidades/';}echo'" onclick="menu(\'Tops\', this.href); return false;" title="Ir a TOPs">TOPs <img src="'.$images.'/arrowdown.png" alt="Drop Down" /></a>
		</li>







';
if($rangoz['rango']=="255" or $rangoz['rango']=="100" or $rangoz['rango']=="655" or $rangoz['rango']=="755"){echo'
		 <li id="tabbedAdmin"'; if($direccion[1]=="admin"){echo' class="tabbed here"';}else{echo'class="tabbed"';}echo'>
		        <a href="/adm/" onclick="menu(\'Admin\', this.href); return false;" title="Ir a la Administraci&oacute;n">ADM <img src="'.$images.'/arrowdown.png" alt="Drop Down" /></a>
		</li>';
		$denuncias = mysql_num_rows(mysql_query("SELECT * FROM denuncias"));
		if($denuncias) echo'
		 <li id="tabbedTops" class="tabbed">
			<a href="/adm/denuncias"  onclick="menu(\'Tops\', this.href); return false;" title="Ir a Denuncias">Denuncias '.$denuncias.'</a>
		</li>';
		}














if($_SESSION['id']!=null){echo'
  		<li class="clearBoth"></li>
	</ul>

	<div class="opciones_usuario">
<div class="userInfoLogin">
  <ul>
    <li style="position: relative" class="monitor">
		<a name="Monitor" title="Monitor de usuario" alt="Monitor de usuario" onclick="notifica.last(); return false" href="/monitor">
			<span class="systemicons monitor"></span>
		</a>
      <div class="notificaciones-list">
				<div style="padding: 10px 10px 0 10px;font-size:13px">
					<strong onclick="location.href=\'/monitor\'" style="cursor:pointer">Notificaciones</strong>
				</div>
			<ul>
			</ul>
			<a class="ver-mas" href="/monitor">Ver m&aacute;s notificaciones</a>
		</div>
	</li>
	<li>
		<a href="/favoritos.php" title="Mis Favoritos" alt="Mis Favoritos">
			<span class="systemicons favoritos"></span>
		</a>
	</li>
	<li>
		<a href="/mis-borradores" title="Mis Borradores" alt="Mis Borradores">
			<span class="systemicons borradores"></span>
		</a>
	</li>
	





';

$sqltheme=mysql_query("SELECT theme FROM usuarios where id='".$_SESSION['id']."'");
$theme=mysql_fetch_array($sqltheme);
mysql_free_result($sqltheme);
$code = $theme['theme'];

echo'<link href="/images/css/'.$code.'.css" rel="stylesheet" type="text/css" />
';

echo'











<li>
		<a href="/mensajes/" title="Mensajes">';
if($_SERVER['PHP_SELF'] == "/mensajes/mensajes_recibidos.php")
include("mensajes/marcar_leido.php");

$mens=$db->query("SELECT m.id_mensaje, m.leido_receptor, m.id_receptor FROM (mensajes AS m) WHERE m.id_receptor='".$_SESSION['id']."' AND m.leido_receptor='0'");
$mensn=$db->num_rows($q3);
if($mensn != 0){echo'
<img src="'.$images.'/newMsg.png" alt="Mensajes" />
<span style="margin-left: 5px;font-size:12px">'.$mensn.'</span>';
}else{
echo '<img src="'.$images.'/oldMsg.png" alt="Mensajes" />';}
echo'</a>
	</li>
	<li>
		<a href="/cuenta/" title="Mi cuenta" alt="Editar mi perfil">
			<span class="systemicons micuenta"></span>
		</a>
	</li>
	<li class="usernameMenu">
		<a class="username" href="/perfil/'.$_SESSION['user'].'" title="Mi Perfil">'.$_SESSION['user'].'</a>
</li>
	<li class="logout">
		<a title="Salir" style="vertical-align: middle" href="/logout.php">
			<span class="systemicons logout"></span>
		</a>
	</li>
	</ul>
	<div style="clear:both"></div>';}
else
{echo'<li class="tabbed registrate">
			<a href="" onclick="registro_load_form(); return false" title="Registrate!"><b>Registrate!</b></a>
	 </li>
  		<li class="clearBoth"></li>
	</ul>

	<div class="opciones_usuario anonimo">
<div class="identificarme">
	<a class="iniciar_sesion" href="javascript:open_login_box()" title="Identificarme">Identificarme</a></b>
</div>
<div id="login_box"><div class="login_header"><img style="display:none" src="'.$images.'/cerrar.png" class="login_cerrar" onclick="close_login_box();" title="Cerrar mensaje" /></div>
<div class="login_cuerpo">
  <span id="login_cargando" class="gif_cargando floatR"></span>

  <div id="login_error"></div>
    <form method="post" action="javascript:login_ajax()">
		<label>Usuario</label>
      <input maxlength="64" name="nick" id="nickname" class="ilogin" type="text" />
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

      <a href="" onclick="open_login_box(); registro_load_form(); return false" style="color:green;">
        <strong>Registrate Ahora!</strong>
      </a>
	    </div>
  </div>';}

echo'</div>
	</div>

	<div class="clearBoth"></div>
</div><!-- menu -->






<div class="subMenuContent">
<div class="subMenu here" id="subMenuPosts">
	<ul class="floatL tabsMenu">
		<li';if($direccion[1]=="" or $direccion[1]=="posts" and $direccion[2]!="novatos"){echo' class="here"';}echo'><a href="/" title="Inicio">Inicio</a></li>
		<li';if($direccion[2]=="novatos"){echo' class="here"';}echo'><a href="/posts/novatos/" title="Novatos" style="font-weight:bold">Novatos</a></li>
				<li';if($direccion[1]=="destacados"){echo' class="here"';}echo'><a href="/destacados" title="Destacados">Destacados</a></li>
               <li><a href="http://www.buscar.zincomienzo.net" title="Buscador">Buscador</a></li>';
		if($_SESSION['id']!=null){echo'
		<li';if($direccion[1]=="agregar"){echo' class="here"';}echo'><a href="/agregar/" title="Agregar Post">Agregar Post</a></li>
	
                <li';if($direccion[1]=="mod-history"){echo' class="here"';}echo'><a href="/mod-history/" title="Historial de Moderaci&oacute;n">Historial</a></li>';}
echo'				<div class="clearBoth"></div>
	</ul>
  <div class="floatR filterCat">
    <span>Filtrar por Categor&iacute;as:</span>
    <select onchange="ir_a_categoria(this.value)">
			<option value="root" selected="selected">Seleccionar categor&iacute;a</option>
			<option value="-1">Ver Todas</option>

			<option value="linea">-----</option>';
$categorias=$db->query("SELECT * FROM categorias ORDER BY nom_categoria ASC");
while($cate=$db->fetch_array($categorias)){echo'
		<option value="'.$cate['link_categoria'].'">'.$cate['nom_categoria'].'</option>';}
echo'</select>
  </div>

	<div class="clearBoth"></div>
</div>
<div class="subMenu';if($direccion[1]=="comunidades"){echo' here';}echo'" id="subMenuComunidades">
	<ul class="floatL tabsMenu">
<li';if($direccion[1]=="comunidades" and $direccion[2]==""){echo' class="here"';}echo'><a href="/comunidades/" title="Inicio">Inicio</a></li>';
        if($_SESSION['id']!=null){echo'
		 <li';if($direccion[2]=="mis-comunidades"){echo' class="here"';}echo'><a href="/comunidades/mis-comunidades/">Mis Comunidades</a></li>';}
echo'<li';if($direccion[2]=="dir"){echo' class="here"';}echo'>
	<a href="/comunidades/dir/" title="Directorio">Directorio</a>
</li>

<li';if($direccion[2]=="buscador"){echo' class="here"';}echo'><a href="'.$url_buscador.'/buscar" title="Buscador">Buscador</a></li>
<li';if($direccion[2]=="mod-history"){echo' class="here"';}echo'><a href="/comunidades/mod-history/" title="Historial de comunidades">Historial</a></li>				<div class="clearBoth"></div>

	</ul>
<div class="floatR filterCat">
	<span>Filtrar por Categor&iacute;as:</span>
	<select onchange="com.ir_a_categoria(this.value)">
		<option value="root" selected="selected">Seleccionar categor&iacute;a</option>
		<option value="-1">Ver Todas</option>
		<option value="linea">-----</option>';
$categorias=$db->query("SELECT * FROM c_categorias ORDER BY nom_categoria ASC");
while($cate=$db->fetch_array($categorias)){echo'
	<option value="'.$cate['link_categoria'].'">'.$cate['nom_categoria'].'</option>';}
echo'	</select>
</div>
	<div class="clearBoth"></div>
</div>
<div class="subMenu';if($direccion[1]=="top"){echo' here';}echo'" id="subMenuTops">
	<ul class="floatL tabsMenu">
		<li';if($direccion[1]=="top" and $direccion[2]=="" or $direccion[2]=="posts"){echo' class="here"';}echo'><a href="/top/">Posts</a></li>
		<li';if($direccion[2]=="comunidades"){echo' class="here"';}echo'><a href="/top/comunidades/">Comunidades</a></li>
		<li';if($direccion[2]=="temas"){echo' class="here"';}echo'><a href="/top/temas/">Temas</a></li>
		<li';if($direccion[2]=="usuarios"){echo' class="here"';}echo'><a href="/top/usuarios/">Usuarios</a></li>
	</ul>
	<div class="clearBoth"></div>
</div>






<div class="subMenu';if($direccion[1]=="fotos"){echo' here';}echo'" id="subMenuTops">
	<ul class="floatL tabsMenu">
		<li';if($direccion[1]=="fotos" and $direccion[2]=="" or $direccion[2]=="posts"){echo' class="here"';}echo'><a href="/fotos">Inicio</a></li>
		
';
		if($_SESSION['id']!=null){echo'
		<li';if($direccion[1]=="fotos/agregar"){echo' class="here"';}echo'><a href="/fotos/agregar" title="Agregar Foto">Agregar Foto</a></li>
		<li';if($direccion[1]=="mis-fotos"){echo' class="here"';}echo'><a href="/fotos/mis-fotos" title="Mis Fotos">Mis Fotos</a></li>	
';}
echo '
	</ul>
	<div class="clearBoth"></div>
</div>






';

if($rangoz['rango']==255 or $rangoz['rango']==100 or $rangoz['rango']=="755" or $rangoz['rango']=="655"){echo'
<div class="subMenu';if($direccion[1]=="adm"){echo' here';}echo'" id="subMenuAdmin">
	<ul class="floatL tabsMenu">
		<li';if($direccion[1]=="adm" and $direccion[2]!="comunidades"){echo' class="here"';}echo'><a href="/adm/">General</a></li>
		<li';if($direccion[2]=="comunidades"){echo' class="here"';}echo'><a href="/adm/comunidades/">Comunidades</a></li>
	</ul>
	<div class="clearBoth"></div>
</div>';}
echo'
</div><!-- subMenuContent -->';}

function pie()
{
	global $con, $bd_host, $bd_usuario, $bd_password, $bd_base, $images, $name_short, $rangoz, $comunidad;
echo'
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
</div>
<div id="pie">
<div class="floatL"><span class="MegaBulletIcons negro"></span></div>
					<div class="floatL"><span class="MegaBulletIcons amarillo"></span></div>
					<div class="floatL"><span class="MegaBulletIcons negro"></span></div>
					<div class="floatL"><span class="MegaBulletIcons verde"></span></div>
					<div class="floatL"><span class="MegaBulletIcons negro"></span></div>
					<div class="floatR"><span class="MegaBulletIcons negro"></span></div>
					<div class="floatR"><span class="MegaBulletIcons amarillo"></span></div>
					<div class="floatR"><span class="MegaBulletIcons negro"></span></div>
					<div class="floatR"><span class="MegaBulletIcons verde"></span></div>
					<div class="floatR"><span class="MegaBulletIcons negro"></span></div>
<a href="/anuncie/"><b>Anuncie en '.$name_short.'</b></a> - 

<a href="/ideas/">Nuevas Ideas</a> - 
<a href="/bugs/">Reportar bug</a> - 
<a href="/contactenos/">Contacto</a> - 
<a href="/denuncia-publica/">Denuncias</a> - 
<a href="/enlazanos/">Enlazanos</a> - 
<a href="/protocolo">Protocolo</a> - 
<a href="/busquedas/">Trabaja en '.$comunidad.'</a>
<br />
<a href="/terminos-y-condiciones/">T&eacute;rminos y condiciones</a> - 
<a href="/privacidad-de-datos/">Privacidad de datos</a> - <a href="/takedown-notice.php">Report Abuse - DMCA</a>
</div>
</div>
<div class="rbott"></div>
<div id="footer">
<img alt="6b65dcba13" src="http://o1.t26.net/images/space.gif" />
<center>';
if($rangoz['rango']=="255" or $rangoz['rango']=="100"){echo'
<b>Memora usada: ' . round(memory_get_usage() / 1024,1) . ' KB de ' . round(memory_get_usage(1) / 1024,1) . ' KB </b></br></br></br>
';}
echo'


</center>
</div><!--FOOTER -->

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-18297032-1\']);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</body>
</html>';
mysql_close($con);}

function error()
{
	global $titulo_error, $mensaje_error, $titulo2, $descripcion, $boton_error, $url_error, $url, $images, $db;
echo '
<div id="cuerpocontainer"><div class="container400" style="margin: 10px auto 0 auto;"><div class="box_title">
<div class="box_txt show_error">'.$titulo_error.'</div>
<div class="box_rrs"><div class="box_rss"></div></div></div>
<div class="box_cuerpo"  align="center">
<br />'.$mensaje_error.'<br /><br /><br />
<input type="button" class="mBtn btnOk" style="font-size:13px" value="'.$boton_error.'" title="'.$boton_error.'" onclick="location.href=\''.$url_error.'/\'">
<br /></div></div><br /><br /><br /><br />';}

function fatal_error($mensaje,$value='Ir a p&aacute;gina principal',$onclick='location.href=\'/\'',$titulo='CHAN!!')
{
	global $publicidadz;
echo'<div id="cuerpocontainer">
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">'.$titulo.'</div>
		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>
	<div class="box_cuerpo"  align="center">
		<br />
'.$mensaje.'		<br />		
		<br />
		<br />
<input type="button" class="mBtn btnOk" style="font-size:13px" value="'.$value.'" title="'.$value.'" onclick="'.$onclick.'">			<br />
		
	</div>
	
</div>	
		<br />

		<br />
		<br />
		<br />



';
pie();
exit;}
?>
