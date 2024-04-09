<?php
include("../header.php");
$key = $_SESSION['id'];
$nameuser = $_SESSION['user'];
$id = xss(no_i($_GET['id']));

if(empty($id)){

$titulo= $descripcion;
cabecera_normal();


fatal_error('El campo <b>ID del tema</b> es requerido para esta operaci&oacute;n','Volver','history.go(-1)');}


$cosql=mysql_query("SELECT te.*,co.*,us.id,us.nick,us.avatar,us.pais as paisu,us.sexo,ca.*,cm.*
				   FROM c_temas te
				   LEFT JOIN c_comunidades co ON co.idco=te.idcomunid
				   LEFT JOIN usuarios us ON us.id=te.id_autor
				   LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria
				   LEFT JOIN c_miembros cm ON cm.idcomunity=co.idco and cm.iduser='{$key}' and estado='0'
				   WHERE te.idte='{$id}'");


if(!mysql_num_rows($cosql)){
$titulo = $comunidad;
$comunidad = "Comunidad Colectiva";
cabecera_comunidad();

fatal_error('El tema no existe');}

$co=mysql_fetch_array($cosql);
mysql_free_result($cosql);

if($co['eliminado']=='1'){
$titulo = $comunidad;
$comunidad = "Sumate a la Revolucion";
cabecera_comunidad();

fatal_error('La comunidad fue eliminada');}

if($co['elimte']=='1'){
if($co['rangoco']=='3' or $co['rangoco']=='2' or $co['rangoco']=='1'){
$titulo = $comunidad;
$comunidad = "Comunidad Colectiva";
cabecera_comunidad();

fatal_error('El tema no existe');}}

$id_comuni = $co['idco'];
$id_tema = $co['idte'];
$titulo	= $co['titulo'];
cabecera_comunidad();
# El ficer rompe pija me dijo que haga esto y es contra mi voluntad .______.
 $ficer = mysql_query("SELECT * FROM c_comunidades WHERE idco = '$id_comuni'") or die(mysql_error());
 $timbal = mysql_fetch_assoc($ficer);
 if($timbal['solo_mods'] == 1 and $rangoz['rango'] !== "255" and $rangoz['rango'] !== "100" and $rangoz['rango'] !== "655" and $rangoz['rango'] !== "755"){
   fatal_error("Esta comunidad solo puede ser vista por moderadores globales.",'Ir a p&aacute;gina principal','location.href=\'/\'','Error');
	}
 // Lesto .-.


if($co['privada']=='2' and $_SESSION['user']==null){
	fatal_error('Tienes que estar registrado para ingresar a esta comunidad');}

visitascomunidad($id_tema, $co['nick']);



echo'<!-- subMenuContent -->
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->







<div class="comunidades">

<div class="breadcrump">
<ul>
<li class="first"><a href="/comunidades/" title="Comunidades">Comunidades</a></li><li><a href="/comunidades/home/'.$co['link_categoria'].'/" title="'.$co['nom_categoria'].'">'.$co['nom_categoria'].'</a></li><li><a href="/comunidades/'.$co['shortname'].'/" title="'.$co['nombre'].'">'.$co['nombre'].'</a></li><li>'.$co['titulo'].'</li><li class="last"></li>
</ul>
</div>

<div class="denunciar"><a href="javascript:com.denuncia_publica()" title="">Denunciar</a></div>
	<div style="clear:both"></div>';

include('menu.php');
echo'
<div id="centroDerecha">

';
if($co['elimte']=="0" and $co['id_autor']==$key or $co['rangoco']==5 or $co['rangoco']==4)
              {echo'<div class="" style="background: none repeat scroll 0 0 #EEEEEE; border: 1px solid #CCCCCC; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;margin-bottom: 10px; padding: 12px 4px;">

';}echo'

';
if($co['elimte']=="1" and $co['rangoco']==5 or $co['rangoco']==4)
              {echo'<a class="btnActions" href="javascript:com.react_tema()" title="Reactivar tema">
          				<img src="'.$images.'/editar.png" alt="Reactivar"> Reactivar
          			</a>';}else
if($co['elimte']=="0" and $co['id_autor']==$key or $co['rangoco']==5 or $co['rangoco']==4){
echo'         			<a class="btnActions" href="javascript:com.del_tema()" title="Borrar tema">
          				<img src="'.$images.'/borrar.png" alt="Borrar" /> Borrar
          			</a>
          			<a class="btnActions" href="/comunidades/editar-tema.php?id='.$co['idte'].'" title="Editar tema">
          				<img src="'.$images.'/editar.png" alt="Editar" /> Editar
          			</a></div>';}echo'



<div id="temaComunidad">
  <div class="temaBubble">
    <div class="bubbleCont">
      <div class="Container">
        <div class="TemaCont">
          <div class="postBy">

<a href="/perfil/'.$co['nick'].'">
	<img title="Ver perfil de '.$co['nick'].'" alt="Ver perfil de '.$co['nick'].'" class="avatar" src="'.$co['avatar'].'" onerror="error_avatar(this)" />
</a>
<strong><a title="Ver perfil de '.$co['nick'].'" href="/perfil/'.$co['nick'].'">'.$co['nick'].'</a></strong><br>
';
 $pregunta = "select * from c_miembros where idcomunity = '{$co['idco']}' and iduser = '{$co['id_autor']}' ";
 $resp = mysql_query($pregunta);
 while($ran=mysql_fetch_assoc($resp)){
 switch ($ran['rangoco']){

 case "1":
 echo'Visitante';
 break;
 case "2":
 echo'Comentador';
 break;
 case "3":
 echo'Posteador';
 break;
 case "4":
 echo'Moderador';
 break;
 case "5";
 echo'Administrador';
 break; }



  }
echo'

<ul class="userIcons">
<li>';   
$user1 = $co['id'];

$q=mysql_query("SELECT * FROM usuarios WHERE id='$user1' AND ultimaaccion>unix_timestamp()-2*60");
$existe=mysql_num_rows($q);
if($existe){
echo'<span style="float: left; width: 16px; height: 16px; background: url('.$images.'/big2v1.png); background-position: 0 -792px" title="Online"></span>';}
else
{echo'<span style="float: left; width: 16px; height: 16px; background: url('.$images.'/big2v1.png); background-position: 0 -814px" title="Offline"></span>';}
echo'</li><li>';
if($co['sexo']=='m'){
	echo'<span title="Hombre" class="systemicons sexoM"></span>';
}else{
	echo'<span title="Mujer" class="systemicons sexoF"></span>';}
	
$march=mysql_query("SELECT nombre_pais FROM paises WHERE img_pais='{$co['paisu']}'");
$pais=mysql_fetch_array($march);
echo'</li>
<li><img title="'.$pais['nombre_pais'].'" src="'.$images.'/flags/'.bandera($co['paisu']).'.png" width="16" height="11" align="absmiddle" alt="'.$pais['nombre_pais'].'" /></li>';
if($_SESSION['id']!=null)
{echo'<li>
		<a title="Enviar un mensaje privado" href="/mensajes/a/'.$co['nick'].'"><span class="systemicons mensaje"></span></a>
      </li>';}
echo'</ul>
</div><!-- END postBy -->
   <div class="temaCont" style="width:600px">
        	  <div class="floatL">
        	    <h1 class="titulopost">'.no_injection($co['titulo']).'</h1>
        	  </div>
        	 

        		        	 

        		<div class="clearBoth"></div>

        		<hr />


<p>'.BBparse(no_injection($co['cuerpo'])).'</p>
      	



</div> <!-- END TemaCont -->
        <div class="clearBoth"></div>

<!-- fede tema2 -->
        <div class="clearBoth"></div>
      	<div class="infoPost floatL">
      		<div class="shareBox" style="width:15%">
      			<strong class="title">Compartir:</strong>';
if($nameuser!=null){echo'<a class="favicon" title="'.$comunidad.'" href="javascript:notifica.shareTema('.$id_tema.')"></a>';}else{echo'<a class="favicon" title="'.$comunidad.'" href="/register"></a>';}
echo'<a class="delicious socialIcons" title="Delicious" href="http://del.icio.us/post?url='.$url.''.$_SERVER['REQUEST_URI'].'" rel="nofollow" target="_blank"></a>
<a class="facebook socialIcons" title="Facebook" href="http://www.facebook.com/share.php?u='.$url.''.$_SERVER['REQUEST_URI'].'" rel="nofollow" target="_blank"></a>
<a class="digg socialIcons" title="Digg" href="http://digg.com/submit?phase=2&url='.$url.''.$_SERVER['REQUEST_URI'].'" rel="nofollow" target="_blank"></a>
<a class="twitter socialIcons" title="Twitter" href="http://twitter.com/home?status='.$url.''.$_SERVER['REQUEST_URI'].'" rel="nofollow" target="_blank"></a>
</div><!-- END shareBox -->
      		<div class="rateBox" style="width:15%">
      			<strong class="title">Calificar:</strong>
      	  	<span id="actions">
        			<a href="javascript:com.tema_votar(1)" class="thumbs thumbsUp" title="Votar positivo"></a>
        			<a href="javascript:com.tema_votar(-1)" class="thumbs thumbsDown" title="Votar negativo"></a>
        		</span>
<script>var votos_total='.$co['calificacion'].';</script>
<span id="votos_total" class="color_green">';
if($co['calificacion']<=0){echo''.$co['calificacion'].'';}else{echo'+'.$co['calificacion'].'';}
echo'</span>
      		</div><!-- END RateBox -->
      		<div class="ageBox">
      			<strong class="title">Creado</strong>
      			<span style="font-size:11px" title="'.hace($co['fechate']).'">'.hace($co['fechate']).'</span>
      		</div><!-- END Creadobox -->

      		<div class="metaBox" style="width: 15%">
	    			<strong class="title">Visitas:</strong>
      			<span style="font-size:11px">'.$co['visitaste'].'</span>
     			</div><!-- END Visitas -->
     			
     			<div class="metaBox" style="width: 15%">
     				<strong class="title">Seguidores</strong>
     				<span style="font-size:11px" class="tema_notifica_count">'.$co['seguite'].'</span>

     				</div><!-- END Visitas -->
     				
     				<div class="followBox">';
if($_SESSION['id']==null){echo'<a class="btn_g follow_tema floatR" href="/register"><span class="icons follow">Seguir tema</span></a>';}else{
$sqlc=mysql_query("SELECT id_user FROM seguidor WHERE id_seguidor=".$_SESSION['id']." AND id_tema_seguido=".$id_tema."");
$existec=mysql_num_rows($sqlc);	
echo'
   <a class="btn_g unfollow_tema floatR"'; if($existec>0){echo'';}else{echo' style="display: none"';}echo' onclick="notifica.unfollow(\'tema\', '.$id_tema.', notifica.temaInComunidadHandle, $(this).children(\'span\'))"><span class="icons unfollow">Dejar de seguir</span></a>
   <a class="btn_g follow_tema floatR"';if($existec>0){echo' style="display: none"';}else{echo '';}echo' onclick="notifica.follow(\'tema\', '.$id_tema.', notifica.temaInComunidadHandle, $(this).children(\'span\'))"><span class="icons follow">Seguir tema</span></a>';}
echo'</div>
      		<div class="clearBoth"></div>
     	</div><!-- END infoPost -->
		<!-- fin fede tema2 -->

<div class="clearBoth"></div>
</div></div></div></div></div>';
$respsql=mysql_query("SELECT re.*,us.id,us.nick,us.avatar 
					 FROM c_respuestas re 
					 LEFT JOIN usuarios us ON us.id=re.idautorre 
					 WHERE re.idtemare='{$id}' ORDER BY re.idre ASC");
echo'
<div class="clearBoth"></div>
<div id="respuestas"'.($co['numco']=='0' ? ' style="display:none"' : '').'>
	
	<a name="respuestas"></a>

	<a href="/rss/comunidades/tema-respuestas/'.$co['idte'].'/" title="&Uacute;ltimas Respuestas"><span class="floatL systemicons sRss" style="position: relative; z-index: 87;margin-right: 5px"></span></a>
	<h1 class="titulorespuestas">'.$co['numco'].' Respuestas</h1>
	<hr />
	<!-- Paginado -->';
$numero=1;
while($respco=mysql_fetch_array($respsql)){echo'
<div id="id_'.$respco['idre'].'"'.($respco['nick'] == $co['nick'] ? ' class="especial1"' : '').'>
	<span style="display:none" id="citar_resp_'.$respco['idre'].'">'.$respco['respuesta'].'</span>	<div class="respuesta-post clearbeta">

		<div class="avatar-box">
			<a href="/perfil/'.$respco['nick'].'">
				<img style="position:relative;z-index:1" class="avatar-48 lazy" width="48" height="48" orig="'.$respco['avatar'].'" alt="Avatar de '.$respco['nick'].' en '.$comunidad.'" onerror="error_avatar(this, 2443629, 48)" />
			</a>';
if($key!=null)
if($nameuser!=$respco['nick']){{echo'<ul>
<li class="enviar-mensaje"><a href="/mensajes/a/'.$respco['nick'].'">Enviar Mensaje <span></span></a></li>
<li class="bloquear desbloquear_'.$respco['id'].'" style="display: none"><a href="javascript:bloquear(\''.$respco['id'].'\', false, \'comentarios\')">Desbloquear<span></span></a></li>
<li class="bloquear bloquear_'.$respco['id'].'"><a href="javascript:bloquear(\''.$respco['id'].'\', true, \'comentarios\')">Bloquear<span></span></a></li>
</ul>';}}
			echo'  </div>
		<div class="comment-box">
			<div class="dialog-c">
			</div>
			<div class="comment-info clearbeta">

				<div class="floatL">
				<a class="nick" href="/perfil/'.$respco['nick'].'">'.$respco['nick'].'</a> dijo <span title='.date('d.m.Y', $respco['fechare']).' a las '.date('H:m:s', $respco['fechare']).' hs.">'.hace($respco['fechare']).'</span>:
				</div>
				<div class="floatR answerOptions">	
					<ul>
					

				

						<li class="iconDelete">
							<a href="javascript:com.citar_resp(\''.$respco['idre'].'\', \''.$respco['nick'].'\')">
								<span class="citar-comentario"></span>
							</a>
						</li>';
if($respco['nick']==$nameuser or $co['id_autor']==$key or $co['rangoco']==5 or $co['rangoco']==4){echo'




<li class="iconDelete">
						<a href="javascript:com.borrar_resp('.$respco['idre'].')">
							<span class="borrar-comentario"></span>
						</a>

					</li>







';}			
					echo'</ul>
				</div>
			</div>
			<div class="comment-content">'.BBparse(no_injection($respco['respuesta'])).'</div>
		</div>
	</div>
</div>';}
mysql_free_result($respsql);
echo'
</div><!-- #respuestas -->
<a name="respuestas-abajo"></a>

<!-- Paginado -->
<div class="clearBoth"></div>';
if($co['cerrado']=='on'){
	echo'<div class="emptyData" style="margin-top: 10px">Las respuestas de este tema fueron cerradas</div>';
}else{
if($key==$co['iduser'] and $_SESSION['user']!=null){
echo'<div class="miRespuesta">
	<div id="procesando"><div id="tema"></div></div>
	<div class="answerInfo">
	<img style="position:relative;z-index:1" class="avatar-48 lazy" width="48" height="48" orig="'.$rangoz['avatar'].'" alt="Avatar de '.$nameuser.' en '.$comunidad.'" onerror="error_avatar(this, 2443629, 48)" />

	</div>
	<div class="answerTxt">
	  <div class="Container">
			<div class="add_resp_error"></div>
						<textarea id="body_resp" class="onblur_effect autogrow" tabindex="1" title="Escribir una respuesta..." style="resize:none;" onfocus="onfocus_input(this)" onblur="onblur_input(this)">Escribir una respuesta...</textarea>

			<div class="buttons" style="text-align:left">
				<input type="button" onclick="com.add_resp(\'true\')" id="button_add_resp" class="mBtn btnOk" value="Responder" tabindex="2" />
			</div>
			<script type="text/javascript">$(function(){ com.lastid_resp=\''.$co['numco'].'\'; $(\'#body_resp\').val($(\'#body_resp\').attr(\'title\')); });</script>
		</div>
	</div>
</div>';
}else{
	echo'<div class="emptyData" style="margin-top: 10px">Para poder comentar en esta comunidad necesitas ser parte de la misma. Para eso necesitas <a href="javascript:com.miembro_add()">Unirte</a></div>';
}
}
echo'</div></div>';
pie();
?>