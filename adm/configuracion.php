<?php
include("../header.php");
$titulo	=	$descripcion;
$kid	=	$_SESSION['id'];
$sql = "SELECT nick, rango FROM usuarios where id='".$kid."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$rango = $row['rango'];
$user = $row['user'];
if($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755")
{
cabecera_normal();

?>

<div id="cuerpocontainer">
<?php include("menu.php");?>

		


<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3></h3>

				<span class="icon-noti follow-n"></span>
			</div>
			<div class="boxy-content">
		
		
<div class="tabbed-d">



			

				





<strong>Datos de conexi&oacute;n a la base de datos:</strong>
<br />
<br />
Servidor:
<br />
<input type="text" name="db_server" value="localhost" />
<br><br>

<br><br>
Nombre de la base de datos:
<input type="text" name="db_name" class="text cuenta-save-1" value="<?=$bd_base?>" />
<br><br>
Usuario de la base de datos:
<br><br>
<input type="text" name="db_user" value="<?=$bd_usuario?>" />
<br />

Contrase&ntilde;a de la base de datos <span style="font-size:7pt;">(Por seguridad, no se muestra, pero si lo dejas en blanco no cambiar&aacute;)</span>: 
<br />
<input type="password" name="db_password" />
<br />
<br />
<strong>Configuraci&oacute;n de la web:</strong>
<br />
<br />
Nombre de la web completo:
<br />
<input type="text" name="script_name" value="Zincomienzo!" />

<br />
Nombre de la web sin signos, en minusculas:
<br />
<input type="text" name="script_name2" value="zincomienzo" />
<br />
Letra de abreviatura <span style="font-size:7pt;">(EJ: Si el nombre es Wescript!, la letra ser&aacute; W!)</span>:
<br />
<input type="text" name="script_sl" value="Z!" />
<br />
Descripci&oacute;n de la web <span style="font-size:7pt;">(Peque&ntilde;a frase)</span>:

<br />
<input type="text" name="script_desc" value="Sumate a la Revolucion" />
<br />
Direcci&oacute;n URL <span style="font-size:7pt;">(Dejalo en blanco si quieres, para que coja la URL automaticamente)</span>:
<br />
<input type="text" name="script_url" value="http://www.muzinc.com" />
<br />
Edad m&iacute;nima para entrar <span style="font-size:7pt;">(0 (cero) o en blanco para que no halla l&iacute;mite)</span>:
<br />
<input type="text" name="min_age" value="11" />

<br />
Lenguaje por defecto <span style="font-size:7pt;">(Debe existir en la carpeta /Texts/)</span>:
<br />
<input type="text" name="lang" value="spanish" />
<br />
Correo para mensajes automaticos:
<br />
<input type="text" name="noreply_email" value="soy_lean_18@hotmail.com" />
<br />
<br />
<strong>Recaptcha:</strong><br />
<br />
<br />
Public key:

<br />
<input type="text" name="recaptcha_publickey" value="6LdVVAoAAAAAAKdNOSaitZBs7Ktgtc0tb2gxd656" />
<br />
Private key:
<br />
<input type="text" name="recaptcha_privatekey" value="6LdVVAoAAAAAAN5TtVSbcQZ5UKXUOP9GnVA_41Zc" />
<br />
<br />
<strong>Otros datos de la web:</strong> <a style="font-size:7pt;" href="#" onclick="document.getElementById('odw').style.display = 'block';return false;">(Mostrar)</a>
<div style="display:none;" id="odw">
<br />
Nombre de la cookie:
<br />
<input type="text" name="cookie_name" value="zincomie" />

<br />
Nombre del "define":
<br />
<input type="text" name="define" value="define" />
<br />
</div>
<br />
<br />
<strong>Mantenimiento:</strong>&nbsp;&nbsp;<input type="checkbox" name="maintenance" />
<br />
<br />
<input type="submit" class="button" style="font-size:14px;" value="Cambiar configuraci&oacute;n" />
</form>











</div></div>
		</div></div>


<div style="clear:both"></div>
<style>
.boxy {
	background: #FFF;
	border: 1px solid #CCC;
	-moz-box-shadow: 0 0 5px #CCC;
	-webkit-box-shadow: 0 0 5px #CCC
}
.boxy a {
	color: #0f0fb4;
	font-weight: bold;
}
.boxy a.selected {
	background-color:#0F0FB4;
	color:#FFFFFF;
	display:block;

	margin:3px 0;
	padding:3px;
}
.boxy-title {
	background: #d9d9d9 url('<?=$images?>/images/bg-title-boxy.gif') repeat-x top left;
	padding: 10px;
	border-bottom: #bdbdbd 1px solid;
	position: relative;
}
.boxy-title h3 {
	margin: 0;
	text-shadow: #f4f4f4  0 1px 0;
	font-size:13px;
}

.boxy-title span.icon-noti {
	background-image:url('<?=$images?>/images/sprite-notification.png');
	display:block;
	float:right;
	height:16px;
	position:absolute;
	right:9px;
	top:8px;
	width:16px;
}

.boxy-content {
	padding: 12px;
}
.boxy select {
	width: 125px;
}
.boxy h4 {
	color: #FF6600;
	margin: 0 0 5px 0;
	font-size: 14px;
}
.boxy hr {
	border-top: dashed 1px #CCC;
	background: #FFF;
	margin: 10px 0;
}
.xtralarge2 {
	width: 702px;
	margin: 0 5px 10px 0px;
	float: left;
}
.xtralarge ol {
	padding-left:30px;
	margin:0;
	list-style-image:none;
	list-style-position:outside!important;
	list-style-type:decimal;
	position:relative;
}

.xtralarge .categoriaPost, .xtralarge .categoriaUsuario, .xtralarge .categoriaCom {
	font-size: 12px;
	list-style-image:none;
	list-style-position:outside!important;
	list-style-type:decimal;	
	font-weight: bold;
	margin-bottom: 3px;
	display:list-item;
	position:relative;
	border:none;
	height:16px
}

.xtralarge .categoriaCom {
	padding: 3px;
}

.xtralarge .categoriaPost {
	margin-bottom: 0;
	_list-style:none
}

.xtralarge .categoriaPost:hover {
	background-color:none!important;
}



.xtralarge .categoriaPost a, .xtralarge .categoriaUsuario a, .xtralarge .categoriaCom a {
	font-size: 12px;
	font-weight: bold;
	width:250px;
	height:16px;
	overflow:hidden;
	margin:0;
	display:block;
	padding:0
	height:auto!important;
	position:absolute;
	float:none;
}

.xtralarge .categoriaPost span, .xtralarge .categoriaUsuario span, .xtralarge .categoriaCom span {
	font-weight: normal;
	color: #999;
	position:absolute;
	right:0;
	top:0
}

.xtralarge .categoriaUsuario  {
	padding:3px;
}

 .xtralarge .categoriaUsuario a {
 	left: 25px;
 	top:3px;
 	height:16px;
 }

.xtralarge .categoriaCom {
	height:13px;
}

.xtralarge .categoriaCom .titletema {
	margin:0
}
.xtralarge .categoriaUsuario img {

	vertica-align:middle;
	padding:1px;
	border:1px solid #EEE;
	display:block;
	margin-right:5px;
	position:absolute;	
}

.boxy-title .popular-n { background-position:0 -240px; }
.boxy-title .votada-n { background-position:0 -261px; }


</style>


<?php
pie();
}
?>