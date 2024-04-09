<?php
include($_SERVER['DOCUMENT_ROOT']."/header.php");
$id = xss(no_i($_GET['id']));
$categoria1 = xss(htmlentities($_GET['categoria']));
$aux = substr( $_SERVER['REQUEST_URI'], strlen('/muro/'.$categoria1.'/'));

  if(!is_numeric($id))
  {

$sql = "SELECT p.id, p.titulo, p.id_autor, p.categoria, c.id_categoria, c.link_categoria, c.nom_categoria, u.nick, u.id FROM (posts as p, categorias as c, usuarios as u) WHERE p.id='$id' AND p.categoria=c.id_categoria AND u.id=p.id_autor";
$rs = mysql_query($sql);
$row = mysql_fetch_array($rs);
$dtitulo =$row['titulo'];
$nick	 =$row['nick'];
$contar++;


$titulo	= $descripcion;
cabecera_normal();

echo'

<div id="cuerpocontainer">
<div class="post-deleted">
<h3>Oops! El post fue eliminado!</h3>
Pero no pierdas las esperanzas, no todo esta perdido, la soluci&oacute;n est&aacute; en:
<h4>Post Relacionados</h4>
     <ul>';
$Post_Rel = "SELECT p.titulo, p.puntos, p.categoria, p.id, p.fecha, c.id_categoria, c.nom_categoria, c.link_categoria
			 FROM (posts AS p, categorias AS c) WHERE p.categoria=c.id_categoria AND p.elim=0
			 ORDER BY p.puntos DESC LIMIT 10 ";

$Post_Rel2 = mysql_query($Post_Rel, $con);
while($post = mysql_fetch_array($Post_Rel2)){
?>
	<li class="categoriaPost <?=$post['link_categoria']?>">
				<a rel="dc:relation" href="/posts/<?=$post['link_categoria']?>/<?=$post['id']?>/<?=corregir($post['titulo'])?>.html" title="<?=$post['titulo']?>"><?=$post['titulo']?></a>
	</li>

<?php
}
echo'</ul>
</div>';
pie();
die();}

if(empty($id)){
$titulo= $descripcion;
cabecera_normal();

fatal_error('El campo <b>ID del Post</b> es requerido para esta operaci&oacute;n','Volver','history.go(-1)');}

$_pagi_sql = "SELECT id, elim, id_autor, titulo, contenido, privado, coments, tags, categoria FROM posts where id='$id'";
$mysql = mysql_query($_pagi_sql, $con);
include("includes/paginator.inc.php");

$_pagi_nav_anterior = '<a class="icons anterior" title="Post Anterior (m&aacute;s viejo)"></a>';
$_pagi_nav_siguiente = '';	
 
if( substr( $aux, -1) == '/'){
$aux = substr( $aux, 0, -1);}

$variables = explode( '/', $aux);
$id = $variables[0];

$id_user = $_SESSION['id'];
$user = $_SESSION['user'];

$sql = "SELECT p.*, u.* FROM posts as p, usuarios as u WHERE p.id_autor=u.id AND p.id=".$id."";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);


$contenido = $row['contenido'];
$nick	= $row['nick'];
$id_a	= $row['id'];
$paises	= $row['pais'];
$rango	=	$row['rango'];
$id_autor	= $row['id_autor'];
$titulo	= $row['titulo'];
$elim	= $row['elim'];
$fechapo	= $row['fecha'];
$cate	= $row['categoria'];
$denuncias = $row['denuncias'];
$privado = $row['privado'];
$coments = $row['coments'];
$visitas = $row['visitas'];
$tags = $row['tags'];

$sql = "SELECT u.id, u.rango, p.elim, p.id_autor, p.titulo, p.contenido, p.categoria, p.privado, p.coments, p.tags, p.sticky, p.patrocinado ";
$sql.= "FROM (posts as p, usuarios as u) WHERE p.id='$id'";
$rs = mysql_query($sql, $con);
while($edit = mysql_fetch_array($rs)){
	$rango	=	$edit['rango'];
	$elim = $edit['elim'];
	$id_autor = $edit['id_autor'];
	$titulo = $edit['titulo'];
	$contenido = $edit['contenido'];
	$categoria = $edit['categoria'];
	$privado = $edit['privado'];
	$coments = $edit['coments'];
	$tags = $edit['tags'];
	$stick = $edit['sticky'];
	$patr = $edit['patrocinado'];}
    ?>



    <?php


if(mysql_num_rows($rs)==0){

$sql = "SELECT p.id, p.titulo, p.id_autor, p.categoria, c.id_categoria, c.link_categoria, c.nom_categoria, u.nick, u.id FROM (posts as p, categorias as c, usuarios as u) WHERE p.id='$id' AND p.categoria=c.id_categoria AND u.id=p.id_autor";
$rs = mysql_query($sql);
$row = mysql_fetch_array($rs);
$dtitulo =$row['titulo'];
$nick	 =$row['nick'];
$contar++;


$titulo	= $descripcion;
cabecera_normal();

echo'

<div id="cuerpocontainer">
<div class="post-deleted">
<h3>Oops! El post fue eliminado!</h3>
Pero no pierdas las esperanzas, no todo esta perdido, la soluci&oacute;n est&aacute; en:
<h4>Post Relacionados</h4>
     <ul>';
$Post_Rel = "SELECT p.titulo, p.puntos, p.categoria, p.id, p.fecha, c.id_categoria, c.nom_categoria, c.link_categoria
			 FROM (posts AS p, categorias AS c) WHERE p.categoria=c.id_categoria AND p.elim=0 
			 ORDER BY p.puntos DESC LIMIT 10 ";
                        
$Post_Rel2 = mysql_query($Post_Rel, $con);
while($post = mysql_fetch_array($Post_Rel2)){
?>
	<li class="categoriaPost <?=$post['link_categoria']?>">
				<a rel="dc:relation" href="/posts/<?=$post['link_categoria']?>/<?=$post['id']?>/<?=corregir($post['titulo'])?>.html" title="<?=$post['titulo']?>"><?=$post['titulo']?></a>
	</li>

<?php
}
echo'</ul>
</div>';
pie();
die();}

if($id_autor!="")
$esta=1;

$cant = strlen($titulo);

if($cant > 50){
	$titulo2=substr(stripslashes($titulo), 0, 50);
	$tit=1;
}else{
	$titulo2=$titulo;
	$tit=0;}
cabecera_post();

if ($elim==0 and $esta==1 or $rangoz['rango']==255 or $rangoz['rango']==655 or $rangoz['rango']==755 or $rangoz['rango']==100)
{

  if($denuncias<2 or $rangoz['rango']==255 or $rangoz['rango']==655 or $rangoz['rango']==755 or $rangoz['rango']==100)
  {
  
	if($user!="" or $privado=="")
	{

		$ip = htmlentities($_SERVER['REMOTE_ADDR']);
		
		contarVisita($id, $ip);
		
		if(!strstr($_SERVER[HTTP_USER_AGENT],"MSIE")){echo"";}
?>
<script>


   function puntear_comentario2(comentario,puntos){
		$.ajax({
  type: "POST", 
  url: "/votarposi.php", 
  data: "comentario="+comentario+"&puntos="+puntos+"",
  success: function (mensaje) {
  $('#puntearComent'+comentario+'').show();
	  switch(mensaje.charAt(0)){
		  case "1":
		  if(puntos=="-1"){
		   puntosAhora = parseInt($("#comentario"+comentario+"_puntos").html());
		  puntosDespues = puntosAhora - 1;
		  $("#comentario"+puntosDespues+"_puntos").html(puntosDespues);
		  $('#color_comentario'+comentario+'_puntos').css('color','red');
		  } else if(puntos=="1"){
		  puntosAhora = parseInt($("#comentario"+comentario+"_puntos").html());
		  puntosDespues = puntosAhora + 1;
		  $("#comentario"+puntosDespues+"_puntos").html(puntosDespues);
		   $('#color_comentario'+comentario+'_puntos').css('color','green');
		   }
		  break;
          case "0":
		  mydialog.alert('Error',mensaje.substring(3));
		  break;
		  default:
		  mydialog.alert('Error',mensaje);
		  break;
	  }
  }
   }); 
}
</script>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script src="/images/js/es/js.js" type="text/javascript"></script>
<a name="cielo"></a>
<div class="post-wrapper">
<?php
$cant = strlen($nick);
if($cant > 3){
$nick2=substr(stripslashes($nick), 0, 15);
$nick2=$nick2."...";
}else{$nick2=$nick;}

if($_SESSION['user']!=null){

if($rangoz['rango']==255 or $rangoz['rango']==655 or $rangoz['rango']==755 or $rangoz['rango']==100){
if($denuncias>=4){echo'<div class="emptyData">El Post se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias</div><br>';}
if($elim==1){echo'<div class="warningData">Este Post se encuentra eliminado</div>';}}
?>
   <!-- Perfil logeado-->
	<div class="post-autor vcard">
		<div class="box_title">
			<div class="box_txt post_autor">Posteado por:</div>
			<div class="box_rrs">
				<div class="box_rss">
					<a href="/rss/posts-usuario/<?=$id_a?>">
						<span style="position:relative;"><img border=0 src="<?=$images?>/big1v11.png" style="position:absolute; top:-354px; clip:rect(352px 16px 368px 0px);" alt="RSS con posts de <?=$row['nick']?>" title="RSS con posts de <?=$row['nick']?>" /><img border=0 src="<?=$images?>/space.gif" style="width:14px;height:12px" /></span>					</a>
				</div>

			</div>
		</div>
		<div class="box_cuerpo" typeof="foaf:Person">
			<div class="avatarBox" rel="foaf:img">
				<a href="/perfil/<?=$row['nick']?>">
					<img src="<?=$row['avatar']?>" class="avatar" alt="Ver perfil de <?=$row['nick']?>" title="Ver perfil de <?=$row['nick']?>" onerror="error_avatar(this)" />
				</a>
			</div>

			<a rel="dc:creator" property="foaf:nick" class="url fn n" href="/perfil/<?=$row['nick']?>">

				<span class="given-name"><?=$row['nick']?></span>
			</a>
			<br />
			<span class="title"><?php
$rango	=	"SELECT *
			FROM (rangos AS r, usuarios as u)
			WHERE u.rango=r.id_rango
			AND u.id='$id_a'";
$rng	=	mysql_query($rango, $con);
$rng2	=	mysql_fetch_array($rng);
echo $rng2['nom_rango']?></span>
			<br />
<?php
/*Conectados*/
$q=mysql_query("SELECT * FROM usuarios WHERE id='$id_autor' AND ultimaaccion>unix_timestamp()-2*60");
$existe=mysql_num_rows($q);

$pais	=	"SELECT *
			FROM paises
			WHERE img_pais='$paises'";
$pis	=	mysql_query($pais, $con);
$pis2	=	mysql_fetch_array($pis);

if($existe){
echo'<span class="dot-online-offline" style="float: left; width: 16px; height: 16px; background: url('.$images.'/big2v1.png); background-position: 0 -792px" title="Online"></span>
'; } else {echo'<span class="dot-online-offline" style="float: left; width: 16px; height: 16px; background: url('.$images.'/big2v1.png); background-position: 0 -814px" title="Offline"></span>'; }
?><span style="position:relative;"><img border=0 src="<?=$images?>/big2v1.png" style="<?=$rng2['img_rango']?>" alt="<?=$rng2['nom_rango']?>" title="<?=$rng2['nom_rango']?>" /><img border=0 src="<?=$images?>/space.gif" style="width:17px;height:16px" align="absmiddle" /><?=($row['sexo']=="m") ? '<span style="position:relative;"><img border=0 src="'.$url.'/images/big2v1.png" style="position:absolute; top:-132px; clip:rect(132px 16px 148px 0px);" alt="Hombre" title="Hombre" /><img border=0 src="'.$url.'/images/space.gif" style="width:16px;height:16px" align="absmiddle" /></span>' : '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -154px; clip: rect(154px, 16px, 170px, 0px);" alt="Mujer" title="Mujer" border="0"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 16px;" align="absmiddle" border="0"></span>';?>&nbsp;<img title="<?=$pis2['nombre_pais']?>" src="<?=$images?>/flags/<?=bandera($row['pais'])?>.png" width="16" height="11" align="absmiddle" alt="<?=($row['nombre_pais'])?>" hspace="3"> <?php if ($id_user!=$id_autor){ ?><a href="/mensajes/a/<?=$row['nick']?>"><img align="absmiddle" src="<?=$images?>/icon-mensajes-recibidos.gif" title="Enviar mensaje privado" alt="Enviar mensaje privado" /></a>
			<hr class="divider"/>
<?php
$sqlp=mysql_query("SELECT id_user FROM seguidor WHERE id_seguidor=".$_SESSION['id']." AND id_user=".$id_a."");
$existep=mysql_num_rows($sqlp);
?>
<a onclick="notifica.unfollow('user', <?=$id_a?>, notifica.userInPostHandle, $(this).children('span'))" class="btn_g unfollow_user_post" <? if($existep>0){echo '';}else{echo 'style="display: none"';}?>><span class="icons unfollow">Dejar de seguir</span></a>
<a onclick="notifica.follow('user', <?=$id_a?>, notifica.userInPostHandle, $(this).children('span'))" class="btn_g follow_user_post" <? if($existep>0){echo 'style="display: none"';}else{echo '';}?>><span class="icons follow">Seguir Usuario</span></a>
            <?php
			}
			?>
			<hr class="divider"/>
			<div class="metadata-usuario">
				<span class="nData user_follow_count"><?=$row['seguidores']?></span>
				<span class="txtData">Seguidores</span>
				<span class="nData"><?=$row['puntos']?></span>
				<span class="txtData">Puntos</span>

				<span class="nData"><a style="color: #0196ff" href="/buscador.php?autor=<?=$row['nick']?>" title="Posts de <?=$row['nick']?>"><?=$row['numposts']?></a></span>
				<span class="txtData"><a href="/buscador.php?autor=<?=$row['nick']?>" title="Posts de <?=$row['nick']?>">Posts</a></span>

				<span class="nData"><a style="color: #456c00" href="/comentarios/<?=$row['nick']?>" title="Comentarios de <?=$row['nick']?>"><?=$row['numcomentarios']?></a></span>
				<span class="txtData"><a href="/perfil/<?=$row['nick']?>/comentarios" title="Comentarios de <?=$row['nick']?>">Comentarios</a></span>

			
			
			</div>

		</div>
<br />
<center>
</center>
	</div><!-- Perfil logeado-->
<?php
}else{
?>
<!-- Perfil -->

	<div class="post-autor vcard">
		<div class="box_title">
			<div class="box_txt post_autor">Posteado por:</div>
			<div class="box_rrs">
				<div class="box_rss">
					<a href="/rss/posts-usuario/<?=$id_a?>">
						<span style="position:relative;"><img border=0 src="<?=$images?>/big1v11.png" style="position:absolute; top:-354px; clip:rect(352px 16px 368px 0px);" alt="RSS con posts de <?=$row['nick']?>" title="RSS con posts de <?=$row['nick']?>" /><img border=0 src="<?=$images?>/space.gif" style="width:14px;height:12px" /></span>					</a>
				</div>

			</div>
		</div>
		<div class="box_cuerpo" typeof="foaf:Person">
			<div class="avatarBox" rel="foaf:img">
				<a href="/perfil/<?=$row['nick']?>">
					<img src="<?=$row['avatar']?>" class="avatar" alt="Ver perfil de <?=$row['nick']?>" title="Ver perfil de <?=$row['nick']?>" onerror="error_avatar(this)" />
				</a>
			</div>
			<a rel="dc:creator" property="foaf:nick" class="url fn n" href="/perfil/<?=$row['nick']?>">

				<span class="given-name"><?=$row['nick']?></span>
			</a>
			<br />
			<span class="title"><?php
$rango	=	"SELECT *
			FROM (rangos AS r, usuarios as u)
			WHERE u.rango=r.id_rango
			AND u.id='$id_a'";
$rng	=	mysql_query($rango, $con);
$rng2	=	mysql_fetch_array($rng);
echo $rng2['nom_rango']?></span>
			<br />
<?php
/*Conectados*/
$q=mysql_query("SELECT * FROM usuarios WHERE id='$id_autor' AND ultimaaccion>unix_timestamp()-2*60");
$existe=mysql_num_rows($q);

$pais	=	"SELECT *
			FROM paises
			WHERE img_pais='$paises'";
$pis	=	mysql_query($pais, $con);
$pis2	=	mysql_fetch_array($pis);

if($existe){
echo'<span class="dot-online-offline" style="float: left; width: 16px; height: 16px; background: url('.$images.'/big2v1.png); background-position: 0 -792px" title="Online"></span>
'; } else {echo'<span class="dot-online-offline" style="float: left; width: 16px; height: 16px; background: url('.$images.'/big2v1.png); background-position: 0 -814px" title="Offline"></span>'; }
?><span style="position:relative;"><img border=0 src="<?=$images?>/big2v1.png" style="<?=$rng2['img_rango']?>" alt="<?=$rng2['nom_rango']?>" title="<?=$rng2['nom_rango']?>" /><img border=0 src="<?=$images?>/space.gif" style="width:17px;height:16px" align="absmiddle" /><?=($row['sexo']=="m") ? '<span style="position:relative;"><img border=0 src="'.$url.'/images/big2v1.png" style="position:absolute; top:-132px; clip:rect(132px 16px 148px 0px);" alt="Hombre" title="Hombre" /><img border=0 src="'.$url.'/images/space.gif" style="width:16px;height:16px" align="absmiddle" /></span>' : '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -154px; clip: rect(154px, 16px, 170px, 0px);" alt="Mujer" title="Mujer" border="0"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 16px;" align="absmiddle" border="0"></span>';?>&nbsp;<img title="<?=($pis2['nombre_pais'])?>" src="<?=$images?>/flags/<?=bandera($row['pais'])?>.png" width="16" height="11" align="absmiddle" alt="<?=($pis2['nombre_pais'])?>" hspace="3"> <a href="/register"><img align="absmiddle" src="<?=$images?>/icon-mensajes-recibidos.gif" title="Enviar mensaje privado" alt="Enviar mensaje privado" /></a>
            <hr class="divider"/>
				<a href="/register" class="btn_g follow_user_post"><span class="icons follow">Seguir Usuario</span></a>
			<hr class="divider"/>
			<div class="metadata-usuario">
	      		<span class="nData user_follow_count"><?=$row['seguidores']?></span>
				<span class="txtData">Seguidores</span>

				<span class="nData"><?=$row['puntos']?></span>
				<span class="txtData">Puntos</span>

				<span class="nData"><a style="color: #0196ff" href="/buscador.php?autor=<?=$row['nick']?>" title="Posts de <?=$row['nick']?>"><?=$row['numposts']?></a></span>
				<span class="txtData"><a href="/buscador.php?autor=<?=$row['nick']?>" title="Posts de <?=$row['nick']?>">Posts</a></span>

				<span class="nData"><a style="color: #456c00" href="/comentarios/<?=$row['nick']?>" title="Comentarios de <?=$row['nick']?>"><?=$row['numcomentarios']?></a></span>
				<span class="txtData"><a href="/perfil/<?=$row['nick']?>/comentarios" title="Comentarios de <?=$row['nick']?>">Comentarios</a></span>

			
			
			</div>

			</div>
<br />
		<center>
		</center>
			</div><!-- Perfil -->

<?php
}
$mod	=	"SELECT *
			FROM usuarios
			WHERE id='$id_user'";
$moder	=	mysql_query($mod, $con);
$moder2	=	mysql_fetch_array($moder);

if($moder2['rango']==255 or $moder2['rango']==100 or $moder2['rango']==655 or $moder2['rango']==755){
?>
<!-- Cuerpo Moderacion-->
<script src="<?=$url?>/admin/acciones.js?7.0" type="text/javascript"></script>



<div class="moderacion_del_post">

<div class="boxy-negro">
<center>
<?php
            if($rangoz['rango']=="255" or $rangoz['rango']=="655" or $rangoz['rango']=="755" or $rangoz['rango']=="100")
            {
			
			?>
			
			<script>
				function borrar_postmod_beta(postid) {
		mydialog.procesando_inicio('Cargando...', 'Borrar Post');
		$.ajax({
			type: 'GET',
			url: '/admin/borrar-postmod-form.php',
			data: 'postid='+postid,
			success: function(h){
				mydialog.title('Borrar Post');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Borrar', 'com.borrar_postmod_send()', true, true, true);
				mydialog.center();
				$('#borrar-post #idpost').focus();
			},
			error: function(){
				mydialog.error_500("com.borrar_postmod()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	}
			</script>
			<script>
			function agregar_sticky_beta(postid){
		mydialog.procesando_inicio('Cargando...', 'Agregar Sticky Mod');
		$.ajax({
			type: 'GET',
			url: '/admin/agregar-sticky-form.php',
			data: 'postid='+postid,
			success: function(h){
				mydialog.title('Formulario Para Agregar Stycky');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Aceptar', 'com.agregar_sticky()', true, true, true);
				mydialog.center();
				$('#borrar-post #idpost').focus();
			},
			error: function(){
				mydialog.error_500("com.borrar_postmod()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	}
			
			</script>
			<?php
              $jeje = mysql_query("select * from usuarios where ultimaip = '{$row['ultimaip']}'");
              $ipis = mysql_num_rows($jeje);
              echo'




<td valign="top"><a onclick="javascript:borrar_postmod_beta(\''.$id.'\')" title="Borrar el post"<img src="/images/borrar-mod.png"> <font size=3><font color="#FFFFFF"> Borrar&nbsp;&nbsp;</font></font> </a></td>

<font color="#FFFFFF">&nbsp;-&nbsp;</font>

<td valign="top"><a href="javascript:void(0)" onclick="location.href=\'/edicion.form.php?id='.$id.'\'" title="Editar Post"><img src="/images/editar-mod.png"> <font size=3><font color="#FFFFFF"> Editar Post&nbsp;&nbsp;</font></font> </a></td>

<font color="#FFFFFF">&nbsp;-&nbsp;</font>

<td valign="top"><a href="javascript:agregar_sticky_beta(\''.$id.'\')" title="Sticky"> <img src="/images/sticky-mod.png"> <font size=3><font color="#FFFFFF"> Sticky&nbsp;&nbsp;</font></font> </a></td>

<font color="#FFFFFF">&nbsp;-&nbsp;</font>

<td valign="top"><a href="javascript:com.agregar_patrocinio()" title="Patrocinar"> <img src="/images/patrocinar-mod.png"> <font size=3><font color="#FFFFFF"> Patrocinar&nbsp;&nbsp;</font></font> </a></td>








';

}else{echo'

<td valign="top"><a id="change_status" title="Reactivar el post" onclick="javascript:reactivar_post(\''.$id.'\')" > <img src="/images/ractivar-mod.png"> <font size=3><font color="#FFFFFF">  Reactivar Post&nbsp;</font></font> </a></td>


';}
echo'';
$supersql = "SELECT * FROM denuncias WHERE id_post='".$id."' ORDER BY fecha ASC ";
$rs = mysql_query($supersql, $con);
if(mysql_num_rows($rs)!=0){
while($mod = mysql_fetch_array($rs)){

$razon = $mod['razon'];
$autor = $mod['autor'];
$cuerpo = $mod['cuerpo'];
$fecha = $mod['fecha'];
?>

    
	
<?php
}}else{
echo'';}
?>





</center>

</div>

<div class="mod_container">



</div></div>
<!--Fin Cuerpo Moderacion-->	
<? }?>				
<!-- Cuerpo -->
	<div class="post-contenedor">
		<div class="post-title">
			<a href="/prev.php?id=<?=$id?>" class="icons anterior" title="Post Anterior (m&aacute;s viejo)"></a>
			<h1 property="dc:title"><?=$titulo2?></h1>
			<a href="/next.php?id=<?=$id?>" class="icons siguiente" title="Post Siguiente (m&aacute;s nuevo)"></a>
		</div>
					<div class="post-contenido">
<?php
if ($id_user==$id_autor){
?>
				<div class="floatR">
					<a class="btnActions" href="" onclick="borrar_post(); return false;" title="Borrar Post">
						<img src="<?=$images?>/borrar.png" alt="Borrar" /> Borrar
					</a>
					<a class="btnActions" href="javascript:void(0)" onclick="location.href='/edicion.form.php?id=<?=$id?>'" title="Editar Post">
						<img src="<?=$images?>/editar.png" alt="Editar" /> Editar
					</a>
				</div>
<br><br>
<?php
}
?>			

				
			<span property="dc:content">
			<?=BBparse(mencion($contenido))?>
			</span>

				
<div class="compartir-mov" style="text-align: right; color:#888; font-size: 14px;margin: 30px 0 10px">
					<div class="m-left">
					</div>
					
					<div class="m-right">
					</div>
					 <ul class="post-compartir clearbeta">
						<li class="min-icon"><a rel="nofollow" target="_blank" href="http://www.sonico.com/share.php?url=<?=$url?><?=$_SERVER['REQUEST_URI']?>"><img src="<?=$images?>/sonico_32.png" alt="Sonico" title="Sonico" /></a></li>
						<li class="min-icon"><a rel="nofollow" target="_blank" href="http://del.icio.us/post?url=<?=$url?><?=$_SERVER['REQUEST_URI']?>"><img src="<?=$images?>/delicious_32.png" alt="Delicious" title="Delicious" /></a></li>
 						<li class="min-icon"><a rel="nofollow" target="_blank" href="<?=$url?>/recomendar-form.php?id=<?=$id?>"><img alt="Enviarselo a un amigo" title="Enviar a un amigo" src="<?=$images?>/email_32.png" /></a></li>
						<li class="share-big"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="mexicanoslibres" data-lang="es" data-url="<?=$url?><?=$_SERVER['REQUEST_URI']?>">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
						<li class="share-big"><a style="text-decoration: none;" name="fb_share" share_url="<?=$url?><?=$_SERVER['REQUEST_URI']?>" type="box_count" href="http://www.facebook.com/sharer.php">Me gusta</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></li>
						

<li class="share-big"><?php
$sqlp=mysql_query("SELECT * FROM notificaciones WHERE id_post='$id' AND detalle='sprite-recomendar-p' GROUP BY id_autor");
$existep=mysql_num_rows($sqlp);?>
						 	<span class="share-d-count"><?=$existep?></span>
							<a class="share-d" <?php if($id_user!=null){echo'href="javascript:notifica.sharePost('.$id.')"';}else{echo'href="/register"';}?>></a>
						</li>
						<li class="txt-movi">Compartir en:</li>				
					</ul>
				</div>
								<div class="banner 728x90">
								 <!-- Publicidad 728x90 -->
								</div>
										</div><!-- Cuerpo -->
<?php
$user		=	$_SESSION['user'];
$id_user	=	$_SESSION['id'];

if($_SESSION['user']!=null){
$sql = "SELECT p.coments, u.rango, u.puntosdar, u.id, k.puntosdar AS Kpuntosdar, k.id, k.rango AS KRango, p.id_autor, u.nick as nick_autor, p.seguidores, p.categoria, p.fecha, p.puntos AS PPuntos, p.comentarios, p.visitas, p.tags, c.nom_categoria, c.link_categoria, c.id_categoria 
		FROM (posts as p, usuarios as u, usuarios as k)
		inner join categorias as c
		on c.id_categoria = p.categoria
 		where p.id='$id'
		and p.id_autor=u.id
		AND k.id='$id_user'";
}else{
$sql = "SELECT p.coments, u.rango AS Urango, u.puntosdar, u.id, k.puntosdar AS Kpuntosdar, k.id, k.rango AS KRango, p.id_autor, p.seguidores, u.nick as nick_autor, p.categoria, p.fecha, p.puntos AS PPuntos, p.comentarios, p.visitas, p.tags, c.nom_categoria, c.link_categoria, c.id_categoria 
		FROM (posts as p, usuarios as u, usuarios as k)
		inner join categorias as c
		on c.id_categoria = p.categoria
 		where p.id='$id'
		and p.id_autor=u.id";}

$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$query2	=	mysql_query("SELECT * FROM favoritos WHERE id_post = '$id'");
$fav	=	mysql_num_rows($query2);

if($_SESSION['user']!=null){
?>
<div class="post-metadata floatL">
			<div style="padding: 12px">
			<div class="mensajes" style="display:none"></div>
<?php 
if($row['KRango']!=11 and $row['Kpuntosdar']>0){
if($cate!=30){

?>			
					<div class="dar-puntos">


<span>Dar Puntos:</span>
<?php
if($row['Kpuntosdar']>0){
?>
 <a href="javascript:votar_post(1, '4051a35ddbaf0d04f4a3f59643e54f2a')">1</a><? }?><? if($row['Kpuntosdar']>1)
{?> - <a href="javascript:votar_post(2, 'b76b07c84b21cfe8d2e2d7d3a4b1871f')">2</a><? }?><? if($row['Kpuntosdar']>2)
{?> - <a href="javascript:votar_post(3, 'fbbb498bd083a93f620152abb7101340')">3</a> <? }?><? if($row['Kpuntosdar']>3)
{?>- <a href="javascript:votar_post(4, '7de0f021e2f783e8f39dd760eaf73003')">4</a> <? }?><? if($row['Kpuntosdar']>4)
{?>- <a href="javascript:votar_post(5, '490c32c0ba97584d06b3bf099c013821')">5</a> <? }?><? if($row['Kpuntosdar']>5)
{?>- <a href="javascript:votar_post(6, '22dc40b09a8fa2a7632483ee8367cc38')">6</a> <? }?><? if($row['Kpuntosdar']>6)
{?>- <a href="javascript:votar_post(7, '6f9545fe5048be9ca8c9a4094511dcab')">7</a> <? }?><? if($row['Kpuntosdar']>7)
{?>- <a href="javascript:votar_post(8, '0b4d0c142964196f15d87e9b56955445')">8</a> <? }?><? if($row['Kpuntosdar']>8)
{?>- <a href="javascript:votar_post(9, 'acef33bd0f2d6704272c78dce020d7ef')">9</a> <? }?><? if($row['Kpuntosdar']>9)
{?>- <a href="javascript:votar_post(10, '434be78f65dea94d80f8430edba31d04')">10</a> <? }?> (de <?=$row['Kpuntosdar'];?> Disponibles)
			</div>

			<hr class="divider" />
<?php 
}}
?>
					<div class="post-acciones">
			<ul>
<? if($id_autor!=$key){
$sqlp=mysql_query("SELECT id_user FROM seguidor WHERE id_seguidor=".$_SESSION['id']." AND id_post_seguido=".$id."");
$existep=mysql_num_rows($sqlp);
?>
<li<? if($existep>0){echo '';}else{echo ' style="display: none"';}?>><a class="btn_g unfollow_post" href="javascript:notifica.unfollow('post', <?=$id?>, notifica.inPostHandle, $(this).children('span'))"><span class="icons follow_post unfollow">Dejar de seguir</span></a></li>
				<li<? if($existep>0){echo ' style="display: none"';}else{echo '';}?>><a class="btn_g follow_post" href="javascript:notifica.follow('post', <?=$id?>, notifica.inPostHandle, $(this).children('span'))"><span class="icons follow_post follow ">Seguir Post</span></a></li>
<? }?>
<li><a class="btn_g" href="javascript:add_favoritos()"><span class="icons agregar_favoritos">Agregar a Favoritos</span></a></li>

<li><a class="btn_g denuncia_form" href="javascript:;"><span class="icons denunciar_post">Denunciar</span></a></li>
<li><a class="btn_g" href="/imprimir-post/<?php echo''.$id.''; ?>"><img src="/images/imprimir.ico" width="14" height="14" /></a></li>
</ul>

            <script type="text/javascript">
                $(document).ready(function(){
                    $(".denuncia_form").click(function(){
                           $.ajax({
                                    type: 'POST',
                                    url: '/denuncia-form.php?id=<?=$id?>',
                                    data: 'anick='+'Taringa'+'&aid='+2987+'&id='+9251469+'&t='+'Buscamos Diseñador Interactivo',
                                    success: function(h){
					mydialog.mask_close = false;
                                        mydialog.close_button = true;		                                        
					mydialog.show();
                                        mydialog.title('Denunciar post');
                                        mydialog.body(h);
                                        mydialog.buttons(false);
                                        mydialog.center();
                                    },
                                    error: function(){
					mydialog.mask_close = false;
                                        mydialog.close_button = true;	
                                        mydialog.show();
                                        mydialog.title('Denunciar post');
                                        mydialog.body('Hubo en error al procesar la denuncia, intentalo de nuevo');
                                        mydialog.buttons(true, true, 'Aceptar','close',true, false);
                                        mydialog.center();
                                    }
                           });
                      });
                 });
            </script>


           
		






</div>
			<ul class="post-estadisticas">

				<li>
					<span class="icons favoritos_post"><?=$fav?></span><br />
											Favoritos
									</li>
				<li>
					<span class="icons visitas_post"><?=$row['visitas']?></span><br />
					Visitas
				</li>
				<li>

					<span class="icons puntos_post"><?=$row['PPuntos']?></span><br />
											Puntos
				</li>
                <li>
					<span class="icons monitor"><?=$row['seguidores']?></span><br />
					 Seguidores
				</li>

			</ul>
			<div class="clearfix"></div>
			<hr class="divider" />
			<div class="tags-block">
				<span class="icons tags_title">Tags:</span>
				<?php
if($row['tags']!=null){
$tags	=	mostrartags($row['tags']);
$mytags	=	explode(", ", $tags);
$cant_tags = count($mytags);
foreach ($mytags as $tag){
echo'<a href="/tags/'.$tag.'" rel="tag">'.$tag.'</a>';
$ctags++;
if ($ctags<=$cant_tags-1){
echo " - ";
}}}else{echo'<a>El post no tiene Tags</a>';}
?>
							</div>

			<ul class="post-cat-date">
				<li><strong>Categor&iacute;a:</strong> <a href="/posts/<?=$row['link_categoria']?>/"><?=$row['nom_categoria']?></a></li>
				<li><strong>Creado:</strong> <span property="dc:date" content="<?php echo date("Y-m-d H:m:s", date($row['fecha'])); ?>"><?php echo date("d.m.Y", date($row['fecha'])); ?> a las <?php echo date("H:m:s", date($row['fecha'])); ?> hs.</span></li>
			</ul>
			<div class="clearfix"></div>

			</div>
		</div>
	</div><!-- post contenedor 730px -->
	<div class="floatR" style="width: 766px; wi\dth: 765px">
		<div class="post-relacionados">
			<h4>Otros posts que te van a interesar:</h4>
			<ul>
<?php
	$busqueda = mostrartags($row['tags']);
	$trozos = explode(", ", $busqueda);
	$numero = count($trozos);
	
if($numero==0){
echo'<br>Este post no tiene tags';
}else{
$Post_Relacionados	=	"SELECT DISTINCT *
                        FROM posts, categorias
						WHERE MATCH posts.tags
						AGAINST ('$busqueda')
						AND posts.categoria=categorias.id_categoria AND posts.elim = 0
						ORDER BY posts.tags DESC
						LIMIT 0, 10";
                        
$Post_Relaciona2 = mysql_query($Post_Relacionados, $con) or die ("Error en la query $Post_Relacionados, el error es".mysql_error());
while($PR=mysql_fetch_array($Post_Relaciona2)){
?>
<li class="categoriaPost <?=$PR['link_categoria']?>">
	<a rel="dc:relation" href="/posts/<?=$PR['link_categoria']?>/<?=$PR['id']?>/<?=corregir($PR['titulo'])?>.html" title="<?=$PR['titulo']?>"><?=$PR['titulo']?></a>
</li>
<?php
}}
?>
			</ul>
		</div>
		<div class="banner-300">
<!-- Publicidad 300x250 -->
</div>
		<div class="clearfix"></div></div>



<?php
}else{
?>
<div class="post-metadata floatL">
			<div style="padding: 12px">
			<div class="mensajes" style="display:none"></div>
<div class="post-acciones">
			<ul>
<li><a class="btn_g follow_post" href="/register"><span class="icons follow_post follow ">Seguir Post</span></a></li>
<li><a class="btn_g" href="/register"><span class="icons agregar_favoritos">Agregar a Favoritos</span></a></li>
<li><a class="btn_g" href="/register"><span class="icons denunciar_post">Denunciar</span></a></li>
<li><a class="btn_g" href="/imprimir-post/<?php echo''.$id.''; ?>"><img src="/images/imprimir.ico" width="14" height="14" />&nbsp;&nbsp;Imprimir</a></li>
			</ul>

			</div>
			<ul class="post-estadisticas">

				<li>
					<span class="icons favoritos_post"><?=$fav?></span><br />
											Favoritos
									</li>
				<li>
					<span class="icons visitas_post"><?=$row['visitas']?></span><br />
					Visitas
				</li>
				<li>

					<span class="icons puntos_post"><?=$row['PPuntos']?></span><br />
											Puntos
									</li>
				<li>
					<span class="icons monitor"><?=$row['seguidores']?></span><br />
					 Seguidores
				</li>
			</ul>
			<div class="clearfix"></div>
			<hr class="divider" />
			<div class="tags-block">
				<span class="icons tags_title">Tags:</span>
				<?php
if($row['tags']!=null){
$tags	=	mostrartags($row['tags']);
$mytags	=	explode(", ", $tags);
$cant_tags = count($mytags);
foreach ($mytags as $tag){
echo'<a href="/tags/'.$tag.'" rel="tag">'.$tag.'</a>';
$ctags++;
if ($ctags<=$cant_tags-1){
echo " - ";
}}}else{echo'El post no tiene Tags';}
?>
							</div>

			<ul class="post-cat-date">
				<li><strong>Categor&iacute;a:</strong> <a href="/posts/<?=$row['link_categoria']?>/"><?=$row['nom_categoria']?></a></li>
				<li><strong>Creado:</strong> <span property="dc:date" content="<?php echo date("Y-m-d H:m:s", date($row['fecha'])); ?>"><?php echo date("d-m-Y", date($row['fecha'])); ?> a las <?php echo date("H:m:s", date($row['fecha'])); ?> hs.</span></li>
			</ul>
			<div class="clearfix"></div>

			</div>
		</div>
	</div><!-- post contenedor 730px! -->
	<div class="floatR" style="width: 766px; wi\dth: 765px">
		<div class="post-relacionados">
			<h4>Otros posts que te van a interesar:</h4>
			<ul>
<?php
	$busqueda	=	mostrartags($row['tags']);
	$trozos = explode(", ", $busqueda);
	$numero = count($trozos);
if($numero==0){
echo'<br>Este post no tiene tags';
}else{
$Post_Relacionados	=	"SELECT DISTINCT *
                        FROM posts, categorias
						WHERE MATCH posts.tags
						AGAINST ('$busqueda')
						AND posts.categoria=categorias.id_categoria AND posts.elim = 0 
						ORDER BY posts.tags DESC
						LIMIT 0, 10";
                        
$Post_Relaciona2    =    mysql_query($Post_Relacionados, $con) or die ("Error en la query $Post_Relacionados, el error es".mysql_error());
while($PR=mysql_fetch_array($Post_Relaciona2)){
?>
<li class="categoriaPost <?=$PR['link_categoria']?>">
	<a rel="dc:relation" href="/posts/<?=$PR['link_categoria']?>/<?=$PR['id']?>/<?=corregir($PR['titulo'])?>.html" title="<?=$PR['titulo']?>"><?=$PR['titulo']?></a>
</li>
<?php
}}
?>
			</ul>
		</div>
		<div class="banner-300">
<!-- Publicidad 300x250 -->
</div>
		<div class="clearfix"></div>
</div>
<?php
}
echo'
<a name="comentarios"></a>
	<div id="post-comentarios">';

if ($id_user==$id_autor){
echo'<div style="clear: both; text-align: left; border: 1px solid rgb(211, 98, 98); background: none repeat scroll 0% 0% rgb(255, 255, 204); font-size: 13px; margin-top: 10px; margin-bottom: 10px; padding: 15px; width: 735px; margin-left: 50px;">
<span style="float: left; width: 550px; margin-top: 11px;">Si hay usuarios que insultan o generan disturbios en tu post puedes bloquearlos haciendo click sobre la opci&oacute;n desplegable de su avatar.</span><img style="float: right" src="http://i.t.net.ar/images/bloquear_usuario.png" alt="Bloquear Usuario">
<div style="clear: both;">
    	</div></div>';}
echo'      		<div id="comentarios-container" class="clearfix"> 
<div class="comentarios-title">
	
		
			<a href="'.$url.'/rss/comentarios.php?id='.$id.'">
				<span style="position: relative; z-index: 87; margin-right: 5px;" class="floatL systemicons sRss"></span>
			</a>';
# Paginado by timba al 99%
			$limit_posts=100;
$request = mysql_query("SELECT * FROM comentarios where id_post='$id'");
$regCom = mysql_num_rows($request);
$pagina = $_GET['pagina'];
$limit = 100000;
if(!is_numeric($pagina)) $pagina = 0;
if(!$pagina) $pagina = 0;
$emp_limit = $limit*$pagina;
# fin paginado!
$sqlcom = mysql_query("SELECT * FROM comentarios WHERE id_post='$id' order by id ASC LIMIT $emp_limit,$limit");
$NroRegistros = mysql_num_rows($sqlcom);
echo'<h4 class="titulorespuestas floatL">'.$NroRegistros.' Comentarios</h4>';
if($pagina>1){echo'Pagina '.$pagina;} 
echo'
	<div id="comentarios-loading" class="floatR ac_loading" style="display: none; width: 16px; height: 16px"></div> 

					<div class="clearfix"></div>
		<hr />

	';
echo'

';
echo '<!-- FIN - Paginado -->

		</div>
		<div id="comentarios">';
if($regCom<=0 and $row['coments']!='on'){echo'
		<div class="clearfix"></div>
				<style>
		
				 *+html .no-comments {
				 	width: 700px;
				 	margin-top: 0px;
				 }
				</style>
				<div style="font-weight: bold; font-size: 14px;text-align: center;color: #666;margin: 10px 0 10px 175px;" class="no-comments">Este post no tiene comentarios, Se el primero!</div>';
		}else if($row['coments']=='on'){
			echo'<div class="clearfix"></div>
				<div style="font-weight: bold; font-size: 14px;text-align: center;color: #666;margin: 20px 0 20px 0;">El post se encuentra cerrado y no se permiten comentarios.</div></div>';}
while($comenz = mysql_fetch_array($sqlcom)){
$idcoment = $comenz['id'];
$num=$num+1;
				echo'<div id="div_cmnt_'.$comenz['id'].'"'.($comenz['autor'] == $nick ? ' class="especial1"' : '').'>
	<span style="display:none" id="citar_comm_'.$comenz['id'].'">'.$comenz['comentario'].'</span>	<div class="comentario-post clearbeta">
		<div class="avatar-box">';

$avat	=	"SELECT * FROM usuarios WHERE id=".$comenz['id_autor']."";
$avata	=	mysql_query($avat, $con);
$avatar	=	mysql_fetch_array($avata);

$poz=mysql_query("SELECT SUM(mal) as maltotal FROM prueba WHERE idcoment=".$idcoment."");
$maltotal=mysql_fetch_array($poz);

$poz2=mysql_query("SELECT SUM(bien) as bientotal FROM prueba WHERE idcoment=".$idcoment."");
$bientotal=mysql_fetch_array($poz2);
$total = $bientotal['bientotal'] - $maltotal['maltotal']  ;
if($total<0){$color= 'red' and $variable='';}
if($total==0){$color= 'black' and $variable='';}
if($total>0){$color= 'green' and $variable='+';}
		echo'<a href="/perfil/'.$comenz['autor'].'">
				<img style="position: relative; z-index: 1; display: inline;" class="avatar-48 lazy" src="';if($avatar['avatar']==null or $avatar['avatar']=="/images/avatar.gif"){echo''.$images.'/a32_9.jpg';}else{echo''.$avatar['avatar'].'';}echo'" orig="';if($avatar['avatar']==null or $avatar['avatar']=="/images/avatar.gif"){echo''.$images.'/a32_9.jpg';}else{echo''.$avatar['avatar'].'';}echo'" title="Avatar de '.$comenz['autor'].' en '.$comunidad.'" onerror="error_avatar(this, '.$comenz['id_autor'].', 48)" width="48" height="48" />
			 </a>';
			if($key!=null){
			if($key!=$comenz['id_autor']){
				echo'<ul>
<li class="enviar-mensaje"><a href="/mensajes/a/'.$comenz['autor'].'">Enviar Mensaje <span></span></a></li>
<li class="bloquear desbloquear_'.$comenz['id_autor'].'" style="display: none"><a href="javascript:bloquear(\''.$comenz['id_autor'].'\', false, \'comentarios\')">Desbloquear<span></span></a></li>
<li class="bloquear bloquear_'.$comenz['id_autor'].'"><a href="javascript:bloquear(\''.$comenz['id_autor'].'\', true, \'comentarios\')">Bloquear<span></span></a></li>
</ul>';}}
			echo'
			</div>
		<div class="comment-box">
			<div class="dialog-c">
			</div>
			<div class="comment-info clearbeta">

				<div class="floatL">
				<a class="nick" href="/perfil/'.$comenz['autor'].'">'.$comenz['autor'].'</a>'; if($moder2['rango']==255 or $moder2['rango']==100 or $moder2['rango']==655 or $moder2['rango']==755){echo' ('.$avatar['ultimaip'].')';}echo' dijo <span title="'.date('d.m.Y',$comenz['fecha']).' a las '.date('H.m',$comenz['fecha']).' hs.">'.hace($comenz['fecha']).'</span>:
				</div>
				<div class="floatR answerOptions">
				
					<ul>';
					if($key!=null){
                    if($total == 0)
                    {
					$displayCoso = 'none';
					} else {
					$displayCoso = 'block';
					}echo'
					<li id="puntearComent'.$idcoment.'" style="display:'.$displayCoso.'"><font id="color_comentario'.$idcoment.'_puntos" color="'.$color.'"><b><center><div id="votaposi_'.$idcoment.'"><span id="comentario'.$idcoment.'_puntos">'.$variable.''.$total.'</span></center></b></font></li> ';}echo'
					<span id="positivo_'.$idcoment.'"><li class="iconDelete"><a onclick="comment.vote(this, '.$idcoment.', '.$id.', 1, 1, 25)"><span class="voto-p-comentario"></a></li>
					<li><a onclick="comment.vote(this, '.$idcoment.', '.$id.', 1, -1, 25)"><span class="voto-n-comentario"></a></li></span>

					<li class="iconDelete"><a href="javascript:citar_comment('.$comenz['id'].', \''.$comenz['autor'].'\')"><span class="citar-comentario"></span></a></li>
                     ';

					if($moder2['rango']==255 or $moder2['rango']==100 or $moder2['rango']==655 or $moder2['rango']==755 or $key == $comenz['id_autor'] or $key == $id_autor){
					echo '<li class="iconDelete" ><a href="javascript:borrar_com('.$comenz['id'].')"><span class="borrar-comentario" ></span></a></li></ul>
';}
					echo'
				</div>
			</div>
			<div class="comment-content">'.code(BBparse(mencion($comenz['comentario']))).'</div>
		</div>
	</div>
</div>';}
if($NroRegistros>0 and $row['coments']=='on'){
			echo'<div class="clearfix"></div>
				<div style="font-weight: bold; font-size: 14px;text-align: center;color: #666;margin: 20px 0 20px 0;">El post se encuentra cerrado y no se permiten comentarios.</div>';}
mysql_free_result($sqlcom);
echo'</div>
	<!-- Paginado -->';
echo'<!-- FIN - Paginado -->';
if($_SESSION['user']!=null and $row['coments']!='on' and $moder2['rango']!=11){
echo'
</div>

	<div class="miComentario">
		<div id="procesando"><div id="post"></div></div>

		<div class="answerInfo">
			<img class="avatar-48" width="48" height="48" src="';if($moder2['avatar']==null or $moder2['avatar']=="/images/avatar.gif"){echo''.$images.'/a48_9.jpg';}else{echo''.$moder2['avatar'].'';}echo'" alt="Avatar de Usuario en '.$comunidad.'" onerror="error_avatar(this, '.$moder2['id'].', 48)" />
		</div>

		<div class="answerTxt">
		  <div class="Container">
				<div class="error"></div>
								<textarea id="body_comm" class="onblur_effect autogrow markItUpEditor" tabindex="1" title="Escribir un comentario..." style="resize:none;" onfocus="onfocus_input(this)" onblur="onblur_input(this)">Escribir un comentario...</textarea>
				<div class="buttons" style="text-align:left">
					<div class="floatL">
						<input type="button" onclick="add_comment(\'true\')" class="mBtn btnOk" value="Enviar Comentario" tabindex="2" />
					</div>

					<div class="floatR">
						<a style="font-size:11px" href="javascript:openpopup()">M&aacute;s Emoticones</a>
						<script type="text/javascript">function openpopup(){ var winpops=window.open("/emoticones.php","","width=180px,height=500px,scrollbars,resizable");}</script>
					</div>
					<div id="emoticons" style="float:right">
						<a href="#" smile=":)"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-286px; clip:rect(286px 16px 302px 0px);" alt="sonrisa" title="sonrisa" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=";)"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-308px; clip:rect(308px 16px 324px 0px);" alt="gui&ntilde;o" title="gui&ntilde;o" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":roll:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-330px; clip:rect(330px 16px 346px 0px);" alt="duda" title="duda" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":P"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-352px; clip:rect(352px 16px 368px 0px);" alt="lengua" title="lengua" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":D"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-374px; clip:rect(374px 16px 390px 0px);" alt="alegre" title="alegre" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":("><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-396px; clip:rect(396px 16px 412px 0px);" alt="triste" title="triste" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="X("><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-418px; clip:rect(418px 16px 434px 0px);" alt="odio" title="odio" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":cry:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-440px; clip:rect(440px 16px 456px 0px);" alt="llorando" title="llorando" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":twisted:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-462px; clip:rect(462px 16px 478px 0px);" alt="endiablado" title="endiablado" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":|"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-484px; clip:rect(484px 16px 500px 0px);" alt="serio" title="serio" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":?"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-506px; clip:rect(506px 16px 522px 0px);" alt="duda" title="duda" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=":cool:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-528px; clip:rect(528px 16px 544px 0px);" alt="picaro" title="picaro" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":oops:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-550px; clip:rect(550px 16px 566px 0px);" alt="timido" title="timido" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="^^"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-572px; clip:rect(572px 16px 588px 0px);" alt="sonrizota" title="sonrizota" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="8|"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-594px; clip:rect(594px 16px 610px 0px);" alt="increible!" title="increible!" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":F"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-616px; clip:rect(616px 16px 632px 0px);" alt="babaaa" title="babaaa" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
					</div>

					<div class="clearfix"></div>
				</div>

				<script type="text/javascript">$(function(){ lastid_comm=\'0\'; $(\'#body_comm\').val($(\'#body_comm\').attr(\'title\')); });</script>
			</div>
		</div>
	</div>';
}else{
if($_SESSION['user']!=null and $row['coments']!='on' and $rng2['nom_rango']=="Novato" and $moder2['rango']==11){
echo'
<div class="miComentario">
		<div id="procesando"><div id="post"></div></div>

		<div class="answerInfo">
			<img class="avatar-48" width="48" height="48" src="';if($moder2['avatar']==null or $moder2['avatar']=="/images/avatar.gif"){echo''.$images.'/a48_9.jpg';}else{echo''.$moder2['avatar'].'';}echo'" alt="Avatar de Usuario en '.$comunidad.'" onerror="error_avatar(this, '.$moder2['id'].', 48)" />
		</div>

		<div class="answerTxt">
		  <div class="Container">
				<div class="error"></div>
								<textarea id="body_comm" class="onblur_effect autogrow markItUpEditor" tabindex="1" title="Escribir un comentario..." style="resize:none;" onfocus="onfocus_input(this)" onblur="onblur_input(this)">Escribir un comentario...</textarea>
				<div class="buttons" style="text-align:left">
					<div class="floatL">
						<input type="button" onclick="add_comment(\'true\')" class="mBtn btnOk" value="Enviar Comentario" tabindex="2" />
					</div>

					<div class="floatR">
						<a style="font-size:11px" href="javascript:openpopup()">M&aacute;s Emoticones</a>
						<script type="text/javascript">function openpopup(){ var winpops=window.open("/emoticones.php","","width=180px,height=500px,scrollbars,resizable");}</script>
					</div>
					<div id="emoticons" style="float:right">
						<a href="#" smile=":)"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-286px; clip:rect(286px 16px 302px 0px);" alt="sonrisa" title="sonrisa" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=";)"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-308px; clip:rect(308px 16px 324px 0px);" alt="gui&ntilde;o" title="gui&ntilde;o" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":roll:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-330px; clip:rect(330px 16px 346px 0px);" alt="duda" title="duda" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":P"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-352px; clip:rect(352px 16px 368px 0px);" alt="lengua" title="lengua" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":D"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-374px; clip:rect(374px 16px 390px 0px);" alt="alegre" title="alegre" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":("><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-396px; clip:rect(396px 16px 412px 0px);" alt="triste" title="triste" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="X("><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-418px; clip:rect(418px 16px 434px 0px);" alt="odio" title="odio" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":cry:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-440px; clip:rect(440px 16px 456px 0px);" alt="llorando" title="llorando" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":twisted:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-462px; clip:rect(462px 16px 478px 0px);" alt="endiablado" title="endiablado" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":|"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-484px; clip:rect(484px 16px 500px 0px);" alt="serio" title="serio" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":?"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-506px; clip:rect(506px 16px 522px 0px);" alt="duda" title="duda" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=":cool:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-528px; clip:rect(528px 16px 544px 0px);" alt="picaro" title="picaro" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":oops:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-550px; clip:rect(550px 16px 566px 0px);" alt="timido" title="timido" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="^^"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-572px; clip:rect(572px 16px 588px 0px);" alt="sonrizota" title="sonrizota" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="8|"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-594px; clip:rect(594px 16px 610px 0px);" alt="increible!" title="increible!" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":F"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-616px; clip:rect(616px 16px 632px 0px);" alt="babaaa" title="babaaa" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
					</div>

					<div class="clearfix"></div>
				</div>

				<script type="text/javascript">$(function(){ lastid_comm=\'0\'; $(\'#body_comm\').val($(\'#body_comm\').attr(\'title\')); });</script>
			</div>
		</div>
	</div>';}}
echo'
	</div><!-- post comentarios! -->
	<div class="clearfix"></div>
	<a name="comentarios-abajo"></a>
		<br />';
if($_SESSION['user']==null){
echo'<div class="clearfix"></div>
		<div class="clearBoth"></div>
		<div style="clear:both"></div>
	  <div class="emptyData clearfix">
		  Para poder comentar necesitas estar <a href="" onclick="registro_load_form(); return false">Registrado</a>. O.. ya tenes usuario? <a href="#" onclick="open_login_box(\'open\')">Logueate!</a>
	  </div></div>';
}
echo'<div class="clearfix"></div>
<div class="clearBoth"></div>
<div style="clear:both"></div>
<div style="text-align:center"><a href="#cielo" class="irCielo"><strong>Ir al cielo</strong></a></div>

</div>
<script type="text/javascript"> 
var comment_ultima_pagina = false;
$(\'img.lazy\').lazyload({placeHolder:global_data.img+\'images/space.gif\',sensitivity:300});
var zIndexNumber = 99;$(\'div.avatar-box\').each(function(){$(this).css(\'zIndex\', zIndexNumber);zIndexNumber -= 1});
</script> 
<script type="text/javascript">var x = location.href.split(\'#pagina-\');if (x[1]) comment.page(x[1])</script> 
';
pie();
}else{
$titulo2 = $descripcion;
echo'
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<style>

.reg-login {
	margin-top: 15px;
}
	.registro {
		float: left;
		width: 300px;
	}
	.login-panel {
		float: left;
		border-left: #CCC 1px solid;
		padding-left: 25px;
	}
	
	.login-panel label {
		font-weight: bold;
		display: block;
		margin: 5px 0;
	}
	
	.login-panel .mBtn {
		margin-top: 10px;
	}
</style>

<div class="post-deleted post-privado clearbeta">
	<div class="content-splash">

		<h3>Este post es privado, s&oacute;lo los usuarios registrados de '.$comunidad.' pueden acceder.</h3>
		Pero no te preocupes, tambi&eacute;n puedes formar parte de nuestra gran familia.
		<div class="reg-login">
			<div class="registro">
				<h4>Registrarme!</h4>
				<div id="RegistroForm">
	<!-- Paso Uno -->
	<div class="pasoUno">
		<div class="form-line">
			<label for="nick">Nombre de usuario</label>
			<input type="text" id="nick" name="nick" tabindex="1" onblur="registro.blur(this)" onfocus="registro.focus(this)" onkeyup="registro.set_time(this.name)" onkeydown="registro.clear_time(this.name)" autocomplete="off" title="Ingrese un nombre de usuario &uacute;nico" /> <div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="password">Contraseña deseada</label>
			<input type="password" id="password" name="password" tabindex="2" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese una contrase&ntilde;a segura" /> <div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="password2">Confirme contraseña</label>
			<input type="password" id="password2" name="password2" tabindex="3" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Vuelva a introducir la contrase&ntilde;a" /> <div class="help"><span><em></em></span></div>

		</div>

		<div class="form-line">
			<label for="email">E-mail</label>
			<input type="text" id="email" name="email" tabindex="4" onblur="registro.blur(this)" onfocus="registro.focus(this)" onkeyup="registro.set_time(this.name)" onkeydown="registro.clear_time(this.name)" autocomplete="off" title="Ingrese su email" /> <div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label>Fecha de Nacimiento</label>

			<select id="dia" name="dia" tabindex="5" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese d&iacute;a de nacimiento">
				<option value="">D&iacute;a</option>';
				for ($i = 1; $i <= 31; $i++) {
					echo "\n<option value=\"$i\">$i</option>";
				}
				echo'</select>
			<select id="mes" name="mes" tabindex="6" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese mes de nacimiento">
				<option value="">Mes</option>
				<option value="1">Enero</option>

				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>

				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
			</select>

			<select id="anio" name="anio" tabindex="7" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese a&ntilde;o de nacimiento">
				<option value="">A&ntilde;o</option>';
				for ($i = 1992; $i >= 1900; $i--) {
					echo "\n<option value=\"$i\">$i</option>";
				}
				echo'</select> <div class="help"><span><em></em></span></div>

		</div>
		<div class="clearfix"></div>
	</div>

	<!-- Paso Dos -->
	<div class="pasoDos">

		<div class="form-line">
			<label for="sexo">Sexo</label>

			<input class="radio" type="radio" id="sexo_m" tabindex="8" name="sexo" value="m" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese el sexo" /> <label class="list-label" for="sexo_m">Masculino</label>
			<input class="radio" type="radio" id="sexo_f" tabindex="8" name="sexo" value="f" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese el sexo" /> <label class="list-label" for="sexo_f">Femenino</label>
			<div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="pais">Pa&iacute;s</label>

			<select id="pais" name="pais" tabindex="9" onblur="registro.blur(this)" onchange="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese su pa&iacute;s">
				<option value="">Pa&iacute;s</option>';
$sql = mysql_query("SELECT * FROM paises ORDER BY nombre_pais ASC");
while($pais = mysql_fetch_array($sql)){
echo'
				<option value="'.$pais['img_pais'].'">'.$pais['nombre_pais'].'</option>';
}
						echo'</select> 
					<div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="provincia">Regi&oacute;n</label>
			<select id="provincia" name="provincia" tabindex="10" onblur="registro.blur(this)" onchange="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese su provincia">
				<option value="">Regi&oacute;n</option>

							<option value="1">Amazonas</option>
							<option value="2">Ancash</option>
							<option value="3">Apurímac</option>
							<option value="4">Arequipa</option>
							<option value="5">Ayacucho</option>
							<option value="6">Cajamarca</option>

							<option value="8">Cusco</option>
							<option value="9">Huancavelica</option>
							<option value="10">Huánuco</option>
							<option value="11">Ica</option>
							<option value="12">Junín</option>
							<option value="13">La Libertad</option>

							<option value="14">Lambayeque</option>
							<option value="15">Lima</option>
							<option value="16">Loreto</option>
							<option value="17">Madre de Dios</option>
							<option value="18">Moquegua</option>
							<option value="19">Pasco</option>

							<option value="20">Piura</option>
							<option value="7">Provincia Constitucional del Callao</option>
							<option value="15">Provincia de Lima</option>
							<option value="21">Puno</option>
							<option value="22">San Martín</option>
							<option value="23">Tacna</option>

							<option value="24">Tumbes</option>
							<option value="25">Ucayali</option>
						</select> <div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="ciudad">Ciudad</label>

			<input type="text" id="ciudad" name="ciudad" tabindex="11" onblur="registro.blur(this)" onfocus="registro.focus(this)" title="Escriba el nombre de su ciudad" autocomplete="off" disabled="disabled" class="disabled" /> <div class="help"><span><em></em></span></div>
		</div>

		<div class="footerReg">
			<div class="form-line">
				<input type="checkbox" class="checkbox" id="noticias" name="noticias" tabindex="12" checked="checked" onchange="registro.datos[\'noticias\'] = $(this).is(\':checked\')" title="Enviar noticias por email?" /> <label class="list-label" for="noticias">Enviarme mails con noticias de '.$comunidad.'</label>
			</div>
		</div>

		<div class="form-line">
			<label for="recaptcha_response_field">C&oacute;digo de Seguridad:</label>
			<div id="recaptcha_ajax">
				<div id="recaptcha_image"></div>
				<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
			</div> <div class="help recaptcha"><span><em></em></span></div>
		</div>

		<div class="footerReg">
			<div class="form-line">
				<input type="checkbox" class="checkbox" id="terminos" name="terminos" tabindex="14" onblur="registro.blur(this)" onfocus="registro.focus(this)" title="¿Acepta los T&eacute;rminos y Condiciones?" /> <label class="list-label" for="terminos">Acepto los <a href="/terminos-y-condiciones/" target="_blank">T&eacute;rminos de uso</a></label> <div class="help"><span><em></em></span></div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
//Load JS
$.getScript("'.$images.'/js/es/registro.js?1.1", function(){
				//Seteo el pais seleccionado
			registro.datos[\'pais\']=\'PE\';
			registro.datos_status[\'pais\']=\'ok\';
			registro.datos_text[\'pais\']=\'OK\';
	
	//Genero el autocomplete de la ciudad
	$(\'#RegistroForm .pasoDos #ciudad\').autocomplete(\'/registro-geo.php\', {
		minChars: 2,
		width: 298
	}).result(function(event, data, formatted){
		registro.datos[\'ciudad_id\'] = (data) ? data[1] : \'\';
		registro.datos[\'ciudad_text\'] = (data) ? data[0].toLowerCase() : \'\';
		if(data)
			$(\'#RegistroForm .pasoDos #terminos\').focus();
	});

			registro.change_paso(1);
		mydialog.procesando_fin();
	});

//Load recaptcha
$.getScript("http://api.recaptcha.net/js/recaptcha_ajax.js", function(){
	Recaptcha.create(\''.$public_key.'\', \'recaptcha_ajax\', {
		theme:\'custom\', lang:\'es\', tabindex:\'13\', custom_theme_widget: \'recaptcha_ajax\',
		callback: function(){
			$(\'#recaptcha_response_field\').blur(function(){
				registro.blur(this);
			}).focus(function(){
				registro.focus(this);
			}).attr(\'title\', \'Ingrese el código de la imagen\');
		}
	});
});
</script>
				<div id="buttons" style="display: inline-block;">
					<input id="sig" type="button" onclick="registro.change_paso(2)" value="Siguiente &raquo;" style="display:inline-block;" class="mBtn btnOk" tabindex="8" />
					<input id="term" type="button" onclick="registro.submit()" value="Terminar" style="display:none;" class="mBtn btnOk btnGreen" tabindex="15" />
				</div>

			</div>
			<div class="login-panel">
				<h4>...O quizas ya tengas usuario</h4>
				<div style="width:210px;font-size:13px;border: 5px solid rgb(195, 0, 20); background: none repeat scroll 0% 0% rgb(247, 228, 221); color: rgb(195, 0, 20); padding: 8px; margin: 10px 0;">
					<strong>&iexcl;Atenci&oacute;n!</strong>
					<br/>Antes de ingresar tus datos asegurate que la URL de esta p&aacute;gina pertenece a <strong>Zincomienzo.net</strong>
				</div>
				<div class="login_cuerpo">
				  <span id="login_cargando" class="gif_cargando floatR"></span>
				  <div id="login_error"></div>
				    <form method="POST" id="login-registro-logueo" action="javascript:login_ajax(\'registro-logueo\')">
				      <label>Usuario</label>

				      <input maxlength="64" name="nick" id="nickname" class="ilogin" type="text" tabindex="20" />
				
				      <label>Contraseña</label>
				      <input maxlength="64" name="pass" id="password" class="ilogin" type="password" tabindex="21" />
				
				      <input class="mBtn btnOk" value="Entrar" title="Entrar" type="submit" tabindex="22" />
				      <div class="floatR" style="color: #666; padding:5px;font-weight: normal; display:none">
				        <input type="checkbox" /> Recordarme?
				      </div>
				    </form>

				    <div class="login_footer">
				      <a href="/password/" tabindex="23">&iquest;Olvidaste tu contrase&ntilde;a?</a>
				    </div>
				  </div>

			</div>
		</div>
	</div>

</div><div style="clear:both"></div>
<!-- fin cuerpocontainer -->';
pie();}
}else{
echo'<div id="cuerpocontainer">
<div class="post-denunciado">
	<h3>Oops! El Post se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias</h3>
	Pero no pierdas las esperanzas, no todo esta perdido, la soluci&oacute;n est&aacute; en:

	<h4>Post Relacionados</h4>
	<ul>';
$busqueda	=	mostrartags($row['tags']);
$Potrel	=	"SELECT DISTINCT *
             FROM posts, categorias
		     WHERE MATCH posts.tags
			 AGAINST ('$busqueda')
			 AND posts.categoria=categorias.id_categoria 
			 ORDER BY posts.tags DESC
			 LIMIT 0, 10";
                        
$posts    =    mysql_query($Potrel, $con);
while($post=mysql_fetch_array($posts))
{echo'
<li class="categoriaPost '.$post['link_categoria'].'">
					<a rel="dc:relation" href="/posts/'.$post['link_categoria'].'/'.$post['id'].'/'.corregir($post['titulo']).'.html" title="'.$post['titulo'].'">'.$post['titulo'].'</a>
				</li>';
}echo'
		</ul>
</div>';
pie();}

}else{

$titulo2		=	$descripcion;
echo'<div id="cuerpocontainer">
<div class="post-deleted">
<h3>Oops! El post fue eliminado!</h3>
Pero no pierdas las esperanzas, no todo esta perdido, la soluci&oacute;n est&aacute; en:
<h4>Post Relacionados</h4>
     <ul>';
$busqueda	=	mostrartags($row['tags']);
$Post_Rel	=	"SELECT DISTINCT *
                 FROM posts, categorias
				 WHERE MATCH posts.tags
				 AGAINST ('$busqueda')
				 AND posts.categoria=categorias.id_categoria  AND posts.elim = 0
				 ORDER BY posts.tags DESC
				 LIMIT 0, 10";
                        
$Post_Rel2    =    mysql_query($Post_Rel, $con);
while($post = mysql_fetch_array($Post_Rel2)){
?>
	<li class="categoriaPost <?=$post['link_categoria']?>">
				<a rel="dc:relation" href="/posts/<?=$post['link_categoria']?>/<?=$post['id']?>/<?=corregir($post['titulo'])?>.html" title="<?=$post['titulo']?>"><?=$post['titulo']?></a>
	</li>

<?php
}
echo'</ul>
</div>';
pie();}
?>