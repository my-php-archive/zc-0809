<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/configuracion.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/funciones.php');
include($_SERVER['DOCUMENT_ROOT'].'/session.php');
require "includes/class_db_mysql.php";

$db=new database;
$db->connect();

$key = $_SESSION['id'];
$id = $_SESSION['id'];

$sqlavatar = mysql_fetch_array(mysql_query("SELECT avatar FROM usuarios WHERE id='$id'"));
$avatar = $sqlavatar['avatar'];


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
<title>'.$comunidad.' - '.$titulo.'</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/atom+xml" title="Ultimos Posts" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="TOPs post de la semana" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="Usuarios TOP - Ultimos 30 dias" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link type="text/css" href="http://muzinc.com/img/style.css" rel="stylesheet" />	
<link type="text/css" href="http://o1.t26.net/img/ui.css" rel="stylesheet" />	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://muzinc.com/js/es.js" type="text/javascript"></script>
<script src="http://muzinc.com/js/acciones.js?6.8.94" type="text/javascript"></script>

				
<script type="text/javascript">
var global_data = { user_key: \'\', postid: \'\', comid: \'\', temaid: \'\', img: \'http://muzinc.com/\' }
$(document).ready(function(){
timelib.current = 1306079234;
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
	GA_googleAddAttr("s", "na");
	GA_googleAddAttr("e", "na");
	GA_googleAddAttr("p", "na");
	GA_googleAddAttr("c", "general");
	GA_googleAddAttr("de", "no");
</script>



<script type="text/javascript">
	GA_googleUseIframeRendering();
</script>			</head>
	<body>


		<div id="fb-root"></div>
		
		<div id="header">		
			<div class="wrapper">
				<a id="logo" href="/"></a>
				<div id="search" class="floatR">
					<input type="text"  placeholder="Buscar..." class="searchq fast-search" />
					<a class="btn_search"></a>
				</div> 
			

					

';
if($_SESSION['id']!=null){echo'

        		<div class="current-user rounded real-shadow clearfix">

										<div id="notifications-navitem" class="navitem nohide" onclick="notifica.last()">
						<i href="/monitor" class="icon notifications"></i>
											

<div class="bubble alerts">
							<a>
								<span>2</span>

							</a>
						</div>



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
						<a href="/perfil/'.$_SESSION['user'].'">
							<img src="http://o1.t26.net/images/a32_7.jpg" width="16" height="16" />
							'.$_SESSION['user'].'						</a>
						<div class="my-account-links real-shadow navpanel" onmouseout="user_menu_show(0);">

							<a href="/cuenta/">Cuenta</a>
							<a class="odd" href="/perfil/'.$_SESSION['user'].'">Perfil</a>
							<a href="/mis-borradores/">Borradores</a>
							<a class="odd" href="/logout.php">Salir</a>
						</div>
					</div>
									

';}
else
{echo'

<div class="anon-box">

									


<div class="register-now">
										<a style="color:#fff;" href="/registro" title="Registrate!"><b>Registrate!</b></a>

									</div>
									<div class="login-now">
										<div class="identificarme">
											<a style="color:#fff;" class="iniciar_sesion" onclick="open_login_box(\'open\')" title="Identificarme">Identificarme</a>
										</div>
									</div>

	

<div id="action-dialogs" style="display:none;">
						<div class="login-dialog" title="Identificarme">
							<div id="login_box">
								<div class="login_header">
									<img style="display:none" alt="" src="http://o2.t26.net/images/cerrar.png" class="login_cerrar" onclick="close_login_box();" title="Cerrar mensaje" />
								</div>
								<div class="login_cuerpo">
									<span id="login_cargando" class="gif_cargando floatR"></span>
									<div id="login_error" style="color:red;"></div>

										<form method="post" action="javascript:login()">
											<label>Usuario</label>
											<input maxlength="64" name="nick" id="nickname" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="text" />
											<label>Contrase&ntilde;a</label>
											<input maxlength="64" name="pass" id="password" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="password" />
											
											<a style="margin: 10px 0" onclick="login_ajax()" href="#" class="ui-btn ui-button-blue">Entrar</a>

											<div class="floatR" style="color: #666; padding:5px;font-weight: normal; display:none">

												<input type="checkbox" /> Recordarme?											</div>
										</form>
										<div class="login_footer">
											<a href="/password">
												&iquest;Olvidaste tu contrase&ntilde;a?											</a>
											<br />
											<a href="/registro" style="color:green;">

												<strong>Registrate Ahora!</strong>
											</a>
																					<hr />
											<a onclick="FB.signin()" class="facebook-login">Login Facebook</a>
																			</div>
								</div>
							</div>
						</div>';}

echo'						

<div class="flagPost-dialog" title="Flag Post">
						</div>
						<div class="sharePost-dialog-error" title="Error">
							<p></p>
						</div>
					</div>
									</div>
			</div>
		</div>

';

menu();}

function cabecera_post()
{
	global $comunidad, $notis, $time, $descripcion, $titulo, $url, $images, $db;
echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html version="XHTML+RDFa 1.0"  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
<head profile="http://purl.org/NET/erdf/profile">
<title>'.$comunidad.' - '.$titulo.'</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/atom+xml" title="Ultimos Posts" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="TOPs post de la semana" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="Usuarios TOP - Ultimos 30 dias" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link type="text/css" href="http://muzinc.com/img/style.css" rel="stylesheet" />	
<link type="text/css" href="http://o1.t26.net/img/ui.css" rel="stylesheet" />	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/es.js" type="text/javascript"></script>
<script src="/js/acciones.js?6.8.64" type="text/javascript"></script>
				
<script type="text/javascript">
var global_data = { user_key: \'\', postid: \'\', comid: \'\', temaid: \'\', img: \'http://o1.t26.net/\' }
$(document).ready(function(){
timelib.current = 1306079234;
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
	GA_googleAddAttr("s", "na");
	GA_googleAddAttr("e", "na");
	GA_googleAddAttr("p", "na");
	GA_googleAddAttr("c", "general");
	GA_googleAddAttr("de", "no");
</script>



<script type="text/javascript">
	GA_googleUseIframeRendering();
</script>			</head>
	<body>
		<div id="fb-root"></div>
		
		<div id="header">		
			<div class="wrapper">
				<a id="logo" href="/"></a>
				<div id="search" class="floatR">
					<input type="text"  placeholder="Buscar..." class="searchq fast-search" />
										<a class="btn_search"></a>
				</div> 
			

					



















';
if($_SESSION['id']!=null){echo'

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
						<a href="/perfil/'.$_SESSION['user'].'">
							<img src="http://o1.t26.net/images/a32_7.jpg" width="16" height="16" />
							'.$_SESSION['user'].'						</a>
						<div class="my-account-links real-shadow navpanel" onmouseout="user_menu_show(0);">

							<a href="/cuenta/">Cuenta</a>
							<a class="odd" href="/perfil/'.$_SESSION['user'].'">Perfil</a>
							<a href="/mis-borradores/">Borradores</a>
							<a class="odd" href="/logout.php">Salir</a>
						</div>
					</div>
									

';}
else
{echo'

<div class="anon-box">

									


<div class="register-now">
										<a style="color:#fff;" href="/registro" title="Registrate!"><b>Registrate!</b></a>

									</div>
									<div class="login-now">
										<div class="identificarme">
											<a style="color:#fff;" class="iniciar_sesion" onclick="open_login_box(\'open\')" title="Identificarme">Identificarme</a>
										</div>
									</div>
	

<div id="action-dialogs" style="display:none;">
						<div class="login-dialog" title="Identificarme">
							<div id="login_box">
								<div class="login_header">
									<img style="display:none" alt="" src="http://o2.t26.net/images/cerrar.png" class="login_cerrar" onclick="close_login_box();" title="Cerrar mensaje" />
								</div>
								<div class="login_cuerpo">
									<span id="login_cargando" class="gif_cargando floatR"></span>
									<div id="login_error" style="color:red;"></div>

										<form method="post" action="javascript:login()">
											<label>Usuario</label>
											<input maxlength="64" name="nick" id="nickname" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="text" />
											<label>Contrase&ntilde;a</label>
											<input maxlength="64" name="pass" id="password" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="password" />
											
											<input class="fg-button ui-state-default ui-corner-all box-shadow-soft ui-button" style="width:150px;margin-top:10px;margin-bottom:10px;" value="Entrar" title="Entrar" type="submit" />

											<div class="floatR" style="color: #666; padding:5px;font-weight: normal; display:none">

												<input type="checkbox" /> Recordarme?											</div>
										</form>
										<div class="login_footer">
											<a href="/password">
												&iquest;Olvidaste tu contrase&ntilde;a?											</a>
											<br />
											<a href="/registro" style="color:green;">

												<strong>Registrate Ahora!</strong>
											</a>
																					<hr />
											<a onclick="FB.signin()" class="facebook-login">Login Facebook</a>
																			</div>
								</div>
							</div>
						</div>';}

echo'						

<div class="flagPost-dialog" title="Flag Post">
						</div>
						<div class="sharePost-dialog-error" title="Error">
							<p></p>
						</div>
					</div>
									</div>
			</div>
		</div>





';

menu();}

function cabecera_normal()
{
	global $comunidad, $notis, $time, $descripcion, $titulo, $url, $images, $db;
echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html version="XHTML+RDFa 1.0"  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
<head profile="http://purl.org/NET/erdf/profile">
<title>'.$comunidad.' - '.$titulo.'</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/atom+xml" title="Ultimos Posts" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="TOPs post de la semana" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="Usuarios TOP - Ultimos 30 dias" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link type="text/css" href="http://muzinc.com/img/style.css" rel="stylesheet" />	
<link type="text/css" href="http://o1.t26.net/img/ui.css" rel="stylesheet" />	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/es.js" type="text/javascript"></script>
<script src="/js/acciones.js?6.8.64" type="text/javascript"></script>
				
<script type="text/javascript">
var global_data = { user_key: \'\', postid: \'\', comid: \'\', temaid: \'\', img: \'http://o1.t26.net/\' }
$(document).ready(function(){
timelib.current = 1306079234;
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
	GA_googleAddAttr("s", "na");
	GA_googleAddAttr("e", "na");
	GA_googleAddAttr("p", "na");
	GA_googleAddAttr("c", "general");
	GA_googleAddAttr("de", "no");
</script>



<script type="text/javascript">
	GA_googleUseIframeRendering();
</script>			</head>
	<body>

		<div id="fb-root"></div>
		
		<div id="header">		
			<div class="wrapper">
				<a id="logo" href="/"></a>
				<div id="search" class="floatR">
					<input type="text"  placeholder="Buscar..." class="searchq fast-search" />
										<a class="btn_search"></a>
				</div> 
			

';
if($_SESSION['id']!=null){echo'

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
						<a href="/perfil/'.$_SESSION['user'].'">
							<img src="http://o1.t26.net/images/a32_7.jpg" width="16" height="16" />
							'.$_SESSION['user'].'						</a>
						<div class="my-account-links real-shadow navpanel" onmouseout="user_menu_show(0);">

							<a href="/cuenta/">Cuenta</a>
							<a class="odd" href="/perfil/'.$_SESSION['user'].'">Perfil</a>
							<a href="/mis-borradores/">Borradores</a>
							<a class="odd" href="/logout.php">Salir</a>
						</div>
					</div>
';}
else
{echo'

<div class="anon-box">

									


<div class="register-now">
										<a style="color:#fff;" href="/registro" title="Registrate!"><b>Registrate!</b></a>

									</div>
									<div class="login-now">
										<div class="identificarme">
											<a style="color:#fff;" class="iniciar_sesion" onclick="open_login_box(\'open\')" title="Identificarme">Identificarme</a>
										</div>
									</div>
	

<div id="action-dialogs" style="display:none;">
						<div class="login-dialog" title="Identificarme">
							<div id="login_box">
								<div class="login_header">
									<img style="display:none" alt="" src="http://o2.t26.net/images/cerrar.png" class="login_cerrar" onclick="close_login_box();" title="Cerrar mensaje" />
								</div>
								<div class="login_cuerpo">
									<span id="login_cargando" class="gif_cargando floatR"></span>
									<div id="login_error" style="color:red;"></div>

										<form method="post" action="javascript:login()">
											<label>Usuario</label>
											<input maxlength="64" name="nick" id="nickname" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="text" />
											<label>Contrase&ntilde;a</label>
											<input maxlength="64" name="pass" id="password" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="password" />
											
											<input class="fg-button ui-state-default ui-corner-all box-shadow-soft ui-button" style="width:150px;margin-top:10px;margin-bottom:10px;" value="Entrar" title="Entrar" type="submit" />

											<div class="floatR" style="color: #666; padding:5px;font-weight: normal; display:none">

												<input type="checkbox" /> Recordarme?											</div>
										</form>
										<div class="login_footer">
											<a href="/password">
												&iquest;Olvidaste tu contrase&ntilde;a?											</a>
											<br />
											<a href="/registro" style="color:green;">

												<strong>Registrate Ahora!</strong>
											</a>
																					<hr />
											<a onclick="FB.signin()" class="facebook-login">Login Facebook</a>
																			</div>
								</div>
							</div>
						</div>';}

echo'						

<div class="flagPost-dialog" title="Flag Post">
						</div>
						<div class="sharePost-dialog-error" title="Error">
							<p></p>
						</div>
					</div>
									</div>
			</div>
		</div>





';

menu();}

function cabecera_comunidad()
{
	global $comunidad, $notis, $time, $descripcion, $titulo, $con, $url, $images, $rangoz, $db;
	global $id_comuni, $id_tema;
echo <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html version="XHTML+RDFa 1.0"  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
<head profile="http://purl.org/NET/erdf/profile">

<title>$comunidad - $titulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/atom+xml" title="Ultimos Posts" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="TOPs post de la semana" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link rel="alternate" type="application/atom+xml" title="Usuarios TOP - Ultimos 30 dias" href="http://rss.taringa.net/Taringa/ultimos-post" />
<link type="text/css" href="http://muzinc.com/img/style.css" rel="stylesheet" />	
<link type="text/css" href="http://o1.t26.net/img/ui.css" rel="stylesheet" />	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/es.js" type="text/javascript"></script>
<script src="/js/acciones.js?6.8.64" type="text/javascript"></script>
				
<script type="text/javascript">
var global_data = { user_key: \'\', postid: \'\', comid: \'\', temaid: \'\', img: \'http://o1.t26.net/\' }
$(document).ready(function(){
timelib.current = 1306079234;
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
	GA_googleAddAttr("s", "na");
	GA_googleAddAttr("e", "na");
	GA_googleAddAttr("p", "na");
	GA_googleAddAttr("c", "general");
	GA_googleAddAttr("de", "no");
</script>



<script type="text/javascript">
	GA_googleUseIframeRendering();
</script>			</head>
	<body>

		<div id="fb-root"></div>
		
		<div id="header">		
			<div class="wrapper">
				<a id="logo" href="/"></a>
				<div id="search" class="floatR">
					<input type="text"  placeholder="Buscar..." class="searchq fast-search" />
					<a class="btn_search"></a>
				</div> 
        		<div class="current-user rounded real-shadow clearfix">

										<div class="navitem">
						<a style="color:#fff;" href="/registro" title="Registrate!"><b>Registrate!</b></a>
					</div>
					<div class="navitem">
						<div class="identificarme">
							<a style="color:#fff;" class="iniciar_sesion" onclick="open_login_box(open)" title="Identificarme">Identificarme</a>
						</div>
					</div>

					<div id="action-dialogs" style="display:none;">
						<div class="login-dialog" title="Identificarme">
							<div id="login_box">
								<div class="login_header">
									<img style="display:none" alt="" src="http://o2.t26.net/images/cerrar.png" class="login_cerrar" onclick="close_login_box();" title="Cerrar mensaje" />
								</div>
								<div class="login_cuerpo">
									<span id="login_cargando" class="gif_cargando floatR"></span>
									<div id="login_error" style="color:red;"></div>

										<form method="post" action="javascript:login()">
											<label>Usuario</label>
											<input maxlength="64" name="nick" id="nickname" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="text" />
											<label>Contrase&ntilde;a</label>
											<input maxlength="64" name="pass" id="password" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="password" />
											
											<input class="fg-button ui-state-default ui-corner-all box-shadow-soft ui-button" style="width:150px;margin-top:10px;margin-bottom:10px;" value="Entrar" title="Entrar" type="submit" />

											<div class="floatR" style="color: #666; padding:5px;font-weight: normal; display:none">

												<input type="checkbox" /> Recordarme?											</div>
										</form>
										<div class="login_footer">
											<a href="/password">
												&iquest;Olvidaste tu contrase&ntilde;a?											</a>
											<br />
											<a href="/registro" style="color:green;">

												<strong>Registrate Ahora!</strong>
											</a>
																					<hr />
											<a onclick="FB.signin()" class="facebook-login">Login Facebook</a>
																			</div>
								</div>
							</div>
						</div>

						<div class="flagPost-dialog" title="Flag Post">
						</div>
						<div class="sharePost-dialog-error" title="Error">
							<p></p>
						</div>
					</div>
									</div>
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
<div id="nav" class="">
			<div class="wrapper">
				<ul class="clearfix">




<li ';if($direccion[1]!="comunidades" and $direccion[1]!="admin" and $direccion[1]!="top"){echo' class="active"';}else{echo'class="tabbed"';}echo'>





<a href="/">Posts</a>


</li>
<li id="tabbedComunidades"';if($direccion[1]=="comunidades"){echo' class="active"';}else{echo'class="tabbed"';}echo'>
<a href="/comunidades">Comunidades</a>
</li>
		
 <li id="tabbedTops"';if($direccion[1]=="top"){echo' class="active"';}else{echo'class="tabbed"';}echo'>

<a href="/top/">TOPs</a></li>


';
if($rangoz['rango']=="100" or $rangoz['rango']=="255" or $rangoz['rango']=="655" or $rangoz['rango']=="755"){echo'

<li id="tabbedAdm"';if($direccion[1]=="adm"){echo' class="active"';}else{echo'class="tabbed"';}echo'>

<a href="/adm/">ADM</a></li>
';}
echo'

<div id="show-paises-lista" class="clearfix clearBeta clearboth">
					<span>
												<img src="http://o2.t26.net/images/global.png" width="11" style="margin:0 3px 0 2px;vertical-align:middle" /> Global
											</span>
				</div>





</div></div>




<div class="country">
<div class="wrapper">
<ul id="paises-lista" class="real-shadow clearfix clearBeta clearboth" style="display:none">
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



<div id="main" class="clearfix homes">
<div id="menu">
			<div class="clearfix">
				
<ul class="tabs clearfix">




		


<li ';if($direccion[1]=="" or $direccion[1]=="posts" and $direccion[2]!="novatos"){echo' class="active"';}echo'><a href="/">Inicio</a></li>

<li ';if($direccion[2]=="novatos"){echo' class="active"';}echo'><a href="/posts/novatos/">Novatos</a></li>

<li';if($direccion[1]=="destacados"){echo' class="active"';}echo'><a href="/destacados" title="Destacados">Destacados</a></li>



';


		

if($_SESSION['id']!=null){echo'
		<li';if($direccion[1]=="agregar"){echo' class="active"';}echo'><a href="/agregar/" title="Agregar Post">Agregar</a></li>
	
                <li';if($direccion[1]=="mod-history"){echo' class="active"';}echo'><a href="/mod-history/" title="Historial de Moderaci&oacute;n">Historial</a></li>';}
echo'





</ul>


</div></div>






<div class="subMenu';if($direccion[1]=="comunidades"){echo' here';}echo'" id="subMenuComunidades">
<div';if($direccion[1]=="comunidades" and $direccion[2]!="comunidades"){echo' class="here"';}echo'>

				



<div class="clearBoth"></div>

	</ul>



';
echo'
</div><!-- subMenuContent -->';}

function pie()
{
	global $con, $bd_host, $bd_usuario, $bd_password, $bd_base, $images, $name_short, $rangoz, $comunidad;
echo'

<br class="space" />
	<div class="box_cuerpo">
<center>

</center>
</div>
</div>
		</div>
		<div id="footer">

			<div class="wrapper">
				<div class="last-action clearfix">
					<div class="floatL"><a href="#cielo" onclick="$(\'body\').scrollTo(0); return false" class="irCielo"><strong>Ir al cielo</strong></a></div>
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
										

				</ul>
				
			</div>
		</div>


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
