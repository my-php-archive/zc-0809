<?php
include("header.php");
$titulo	=	"Juegos Multiplayer";  
cabecera_normal();
?><div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->

<style>
.muro_nuevo {padding: 3px;text-shadow: 0px 1px 0px #FFF;}
.muro_nuevo:hover {background: #edeff4;padding: 3px;}
.avatar_muro {border: 1px solid #333;padding: 1px;}
.publi {background: #FFF;border: 1px solid #b4bbcd;width: 565px;height: 26px;resize:none;}
.boton_publi {background: #627aac;color: #FFF;font-family: tahoma;font-size: 13px;border: 1px solid #29447e;font-weight: bold;}
.boton_publi:active {background: #4f6aa3;}
.box_face {background: #edeff4;width: 590px;padding: 7px;border: 1px solid #d8dfea;}
.imagen-muro {margin: 10px;padding: 3px; border: 1px solid #cccccc;max-width: 200px;}
.imagen-muro:hover {border: 1px solid #3b5998;}
.old-publi {background: #edeff4;border: 1px solid #d8dfea;color: #3b5998;padding: 10px;}
.old-publi:hover {background: #d8dfea;}
.bor-mu {border: 1px dashed #CCC; margin-top: 10px; margin-bottom: 15px;}
</style>

<div id="izquierda" style="width: 630px">




<div class="box_face"><textarea class="publi" name="cuerpo" id="body_comm" onfocus="onfocus_input(this)" onblur="onblur_input(this)">&#191;Que estas pensando?</textarea>

			<input type="hidden" name="id_post" value="2212"><div style="margin-bottom: 4px"></div>
			<input type="submit" class="boton_publi" value="Compartir" title="Publicar en mi muro"></div>		
</form><br/><hr class="divider" style="margin:6px 0px;" /><div class="muro_nuevo">
<div class="comentario_muro_1750">
<div class="floatL" style="padding-right:2px;width:50px;margin-right: 5px;">
<a href="/perfil/Brucan"><img src="http://3.bp.blogspot.com/_ipgiWTm49h0/S8YIV6KjoNI/AAAAAAAADio/XFJAfM9DJgg/s1600/piedra+papel+tijera.bmp" class="avatar_muro" width="50" height="50" alt="Avatar" border="0" onerror="error_avatar(this)" /></a>
</div><div class="floatL" style="padding-left:2px;max-width:470px;"><a href="/perfil/Brucan/" style="font-weight:bold;color:#3B5998;font-size:13px;">Brucan</a> 
<br/><span style="font-size:13px;">oye kieres er full user verdad<br />
</span><br/>

<span style="color:#808080">Hace 27 minutos</span> - <a href="/like/1750">Me gusta</a> - <a href="javascript:muros.desplegar_comentador('1750')">Comentar</a>
<br/><br/><div id="comentador_1750" style="display:none;">
<div class="caja-com"><table><tr>	
<img src="http://blogs.grupojoly.com/con-la-venia/files/2010/11/Hombres-llorando.jpg" onerror="error_avatar(this)" style="width: 32px; height: 32px">
<form method="post" action="/muro_comentar.php">			
<textarea class="text-area" title="Escribe algo..." name="comentario">Escribe algo...</textarea>
<input type="hidden" name="idpu" value="1750">
<input style="margin-top:4px" class="boton-b" type="submit" value="Comentar" title="Comentar" />
</form>

</tr></table></div></div></div>
<div style="clear:both"></div>
		</div></div><hr class="divider" style="margin:6px 0px;" /><div class="muro_nuevo">







		</div></div><hr class="divider" style="margin:6px 0px;" /></div>
</div>

<div id="derecha" style="width: 300px">

<div class="box_title">
<div class="box_txt">Buscar usuarios</div>
</div>

<div class="box_cuerpo" style="text-align:center">

<form action="/buscador-usuarios.php" method="GET"">
				<input type="text" class="input-b" name="busqueda" title="Escribe el nombre de usuario que deseas buscar" >
				<br/><br/><input type="submit" class="boton-b" value="Buscar usuario" title="Buscar usuario" >
			</form>

</div>

<br class="space" />

<div class="box_title">
<div class="box_txt destacados">Cumplea&ntilde;os de hoy</div>
<div class="box_rss"><img src="/images/icon-cumple.png"></div>
</div>

<div class="box_cuerpo">- <img src="/images/star-small.png" aling="middle"> <a href="/perfil/penesote/muro" title="Ir al muro de penesote" alt="Ir al muro de penesote" style="font-weight: bold">penesote</a><hr/>- <img src="/images/star-small.png" aling="middle"> <a href="/perfil/alancitoo/muro" title="Ir al muro de alancitoo" alt="Ir al muro de alancitoo" style="font-weight: bold">alancitoo</a><hr/>- <img src="/images/star-small.png" aling="middle"> <a href="/perfil/Ryanbena97/muro" title="Ir al muro de Ryanbena97" alt="Ir al muro de Ryanbena97" style="font-weight: bold">Ryanbena97</a><hr/>- <img src="/images/star-small.png" aling="middle"> <a href="/perfil/UNR3AL/muro" title="Ir al muro de UNR3AL" alt="Ir al muro de UNR3AL" style="font-weight: bold">UNR3AL</a><hr/>- <img src="/images/star-small.png" aling="middle"> <a href="/perfil/cesar_cabj90/muro" title="Ir al muro de cesar_cabj90" alt="Ir al muro de cesar_cabj90" style="font-weight: bold">cesar_cabj90</a><hr/>- <img src="/images/star-small.png" aling="middle"> <a href="/perfil/reysoft/muro" title="Ir al muro de reysoft" alt="Ir al muro de reysoft" style="font-weight: bold">reysoft</a><hr/><div class="bienvm"><span style="color: #0033CC;">Entra en sus muros y felicitalos !</span></div></div>

<br class="space" />

<div class="box_title">
<div class="box_txt destacados">Publicidad</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">
<center><script type="text/javascript"><!--
google_ad_client = "pub-4338890074922376";
/* 160x600, creado 3/01/10 */
google_ad_slot = "5872565486";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
</div>

</div>

<div style="clear:both"></div><div style="clear:both"></div>

<!-- fin cuerpocontainer -->


<?php
pie();
?>