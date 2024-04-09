<?php
include("header.php");
$section =	xss(no_i($_GET['section']));
$titulo	 =	$descripcion;
$miembro =	$_SESSION['id'];
cabecera_normal();

if($_SESSION['id']==null){
fatal_error('Para ingresar a esta secci&oacute;n es necesario autentificarse.');}

$nots = mysql_query("SELECT n.*, u.nick, u.avatar FROM notificaciones n, usuarios u WHERE u.id=n.id_autor AND n.id_user='$miembro' ORDER BY n.fecha DESC LIMIT 50");

if($section==""){$section="general";}
if($section=="general"){
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div id="centroDerecha" style="width:705px;float:left">
	<div class="">
		<h2 style="font-size:15px">&Uacute;ltimas notificaciones</h2>
	</div>

	<ul class="notification-detail listado-content">
<?php
while($rowS=mysql_fetch_array($nots)){

$from	=	$rowS['id_autor'];
$ipost	=	$rowS['id_post'];
$itema	=	$rowS['id_tema'];
$icomu =	$rowS['id_comu'];
$puntotes	=	$rowS['puntos'];
$detalle	=	$rowS['detalle'];
$detalle2	=	$rowS['detalle2'];
$fechanot	=	$rowS['fecha'];
$concepto	=	$rowS['concepto'];
?>

<li class="<?=$detalle2?><?php if($rowS['estatus_mon']=="1"){echo' unread"';}?>">
	<div class="avatar-box"><a href="/perfil/<?=$rowS['nick']?>"><img src="<?=$rowS['avatar']?>" width="32" height="32" /></a></div>
	<div class="notification-info"><span><a href="/perfil/<?=$rowS['nick']?>"><?=$rowS['nick']?></a> <span class="time" ts="<?=$fechanot?>" title="<?php echo date("d.m.Y", date($fechanot)); ?> a las <?php echo date("H:m:s", date($fechanot)); ?> hs."><?=hace($fechanot)?></span></span><span class="action"><span class="icon-noti <?=$detalle?>"></span> <?php 
if($rowS['detalle']=='sprite-follow'){echo'te est&aacute; siguiendo</span></div>




<?=$concepto?>


';}
$rspo = mysql_query("SELECT p.id as PID, p.titulo, p.categoria, c.* FROM categorias c, posts p WHERE c.id_categoria=p.categoria AND p.id='$ipost'");
$postS = mysql_fetch_array($rspo);

$pid	=	$postS['PID'];
$ptitulo	=	$postS['titulo'];
$link_categoria =	$postS['link_categoria'];

if($rowS['detalle']=='sprite-balloon-left'){echo'coment&oacute; en tu post <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html">'.$ptitulo.'</a></span></div>';} 
if($rowS['detalle']=='sprite-balloon-left-blue'){echo'coment&oacute; en un post que sigues <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html">'.$ptitulo.'</a></span></div>';} 
if($rowS['detalle']=='sprite-document-text-image'){echo'cre&oacute; un nuevo post <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html">'.$ptitulo.'</a></span></div>';} 
if($rowS['detalle']=='sprite-point'){echo'dej&oacute; <b>'.$puntotes.'</b> puntos en tu post <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html">'.$ptitulo.'</a></span></div>';}
if($rowS['detalle']=='sprite-star'){echo'agreg&oacute; tu post <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html">'.$ptitulo.'</a> a Favoritos</span></div>';}

$rsco = mysql_query("SELECT co.nombre, co.shortname, ct.titulo, ct.idte FROM c_comunidades co, c_temas ct WHERE co.idco=ct.idcomunid AND ct.idte='$itema'");
$temaS = mysql_fetch_array($rsco);

$idte	=	$temaS['idte'];
$short	=	$temaS['shortname'];
$ctitulo	=	$temaS['titulo'];
$nombrec =	$temaS['nombre'];

if ($rowS['detalle']=='sprite-block'){echo'cre&oacute; un nuevo tema <a href="/comunidades/'.$short.'/'.$idte.'/'.corregir($ctitulo).'.html">'.$ctitulo.'</a> en <a href="/comunidades/'.$short.'/">'.$nombrec.'</a></span></div>';}
if ($rowS['detalle']=='sprite-balloon-left-green'){echo'respondi&oacute; un tema que sigues <a href="/comunidades/'.$short.'/'.$idte.'/'.corregir($ctitulo).'.html">'.$ctitulo.'</a></span></div>';} 
if ($rowS['detalle']=='sprite-recomendar-p'){echo'te recomienda un ';if($ipost=='0' or $ipost==null){echo'tema <a href="/comunidades/'.$short.'/'.$idte.'/'.corregir($ctitulo).'.html">'.$ctitulo.'';}
else{echo'post <a href="/posts/'.$link_categoria.'/'.$pid.'/'.corregir($ptitulo).'.html">'.$ptitulo.'';}echo'</a></span></div>';}
echo'
</li>';}
mysql_query("UPDATE notificaciones SET estatus_mon='0' WHERE id_user='$miembro'");
?>
	</ul>
</div>

<div id="post-izquierda" style="width:210px;float:right">

	<div class="categoriaList">
		<h6>Filtrar Actividad</h6>
		<ul>
			<li><strong>Mis Posts</strong></li>
			<li><label><span class="icon-noti favoritos-n"></span><input type="checkbox" onclick="notifica.filter('fav', this)" checked="checked" /> Favoritos</label></li>
			<li><label><span class="icon-noti comentarios-n"></span><input type="checkbox" onclick="notifica.filter('comment-own', this)" checked="checked" /> Comentarios</label></li>

			<li><label><span class="icon-noti puntos-n"></span><input type="checkbox" onclick="notifica.filter('points', this)" checked="checked" /> Puntos Recibidos</label></li>
			<li><strong>Usuarios que sigo</strong></li>
			<li><label><span class="icon-noti follow-n"></span><input type="checkbox" onclick="notifica.filter('new', this)" checked="checked" /> Nuevos</label></li>
			<li><label><span class="icon-noti post-n"></span><input type="checkbox" onclick="notifica.filter('post', this)" checked="checked" /> Posts</label></li>
			<li><label><span class="icon-noti comunidades-n"></span><input type="checkbox" onclick="notifica.filter('thread', this)" checked="checked"  /> Temas</label></li>

			<li><label><span class="icon-noti recomendar-p"></span><input type="checkbox" onclick="notifica.filter('spam', this)" checked="checked"  /> Recomendaciones</label></li>
			<li><strong>Posts que sigo</strong></li>
			<li><label><span class="icon-noti comentarios-n-b"></span><input type="checkbox" onclick="notifica.filter('comment', this)" checked="checked" /> Comentarios</label></li>
			<li><strong>Comunidades</strong></li>
			<li><label><span class="icon-noti comunidades-n"></span><input type="checkbox" onclick="notifica.filter('threadc', this)" checked="checked"  /> Temas</label></li>

			<li><label><span class="icon-noti comentarios-n-g"></span><input type="checkbox" onclick="notifica.filter('reply', this)" checked="checked"  /> Respuestas</label></li>
		</ul>
	</div>
	<div class="categoriaList estadisticasList">
		<h6>Estad&iacute;sticas</h6>
		<ul>
		<?php
$sqlp=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$miembro' AND s.id_seguidor=u.id ORDER BY id desc ");
$existep=mysql_num_rows($sqlp);?>

			<li class="clearfix"><a href="/monitor/seguidores"><span class="floatL">Seguidores</span><span class="floatR number"><?=$existep?></span></a></li>
			<?php
$sqlp=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_seguidor='$miembro' AND s.id_user=u.id ORDER BY id desc ");
$existep=mysql_num_rows($sqlp);?>
			<li class="clearfix"><a href="/monitor/siguiendo"><span class="floatL">Usuarios Siguiendo</span><span class="floatR number"><?=$existep?></span></a></li>
			<?php
$sqlp=mysql_query("SELECT p.id, s.id_post_seguido, s.id_seguidor FROM (seguidor as s, posts as p) WHERE s.id_seguidor='$miembro' AND p.id=s.id_post_seguido");
$existepp=mysql_num_rows($sqlp);?>
			<li class="clearfix"><a href="/monitor/posts"><span class="floatL">Posts</span><span class="floatR number"><?=$existepp?></span></a></li>
			<?php
$sqlc=mysql_query("SELECT c.idco, s.id_comu_seguida, s.id_seguidor FROM (c_comunidades AS c, seguidor AS s) WHERE c.idco=s.id_comu_seguida AND s.id_seguidor='$miembro'");
$existec=mysql_num_rows($sqlc);?>			
			<li class="clearfix"><a href="/monitor/comunidades"><span class="floatL">Comunidades</span><span class="floatR number"><?=$existec?></span></a></li>
			<?php
$sqlt=mysql_query("SELECT t.idte, s.id_tema_seguido, s.id_seguidor FROM (c_temas AS t, seguidor AS s) WHERE t.idte=s.id_tema_seguido AND s.id_seguidor='$miembro'");
$existet=mysql_num_rows($sqlt);?>
			<li class="clearfix"><a href="/monitor/temas"><span class="floatL">Temas</span><span class="floatR number"><?=$existet?></span></a></li>
			<li class="clearfix"><a href="/perfil/<?=$rangoz['nick']?>/medallas"><span class="floatL">Medallas</span><span class="floatR number"></span></a></li>

		</ul>
	</div>
</div>
<?
}
if($section=="Seguidores"){
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="menu-tabs clearfix">
	<ul>
		<li  class="selected"><a href="/monitor/seguidores">Seguidores</a></li>

		<li ><a href="/monitor/siguiendo">Siguiendo</a></li>
		<li ><a href="/monitor/posts">Posts</a></li>
		<li ><a href="/monitor/comunidades">Comunidades</a></li>
		<li ><a href="/monitor/temas">Temas</a></li>
	</ul>
</div>
<?php
$sqlp=mysql_query("SELECT s.id_user, s.id_seguidor , u.* 
				  FROM seguidor as s, usuarios as u 
				  WHERE s.id_user=".$_SESSION['id']." 
				  AND s.id_seguidor=u.id ORDER BY s.id desc");
$existep=mysql_num_rows($sqlp);

if($existep==0){
echo'<div class="emptyData">Nada Por Aqu&iacute;</div>';
}else{
echo'<ul class="listado">';
while ($postz=mysql_fetch_array($sqlp)){
$sqlpa=mysql_query("SELECT id_user FROM seguidor WHERE id_seguidor=".$_SESSION['id']." AND id_user='{$postz['id']}'");
$existepa=mysql_num_rows($sqlp);
echo'
	<li class="clearfix">
		<div class="listado-content clearfix">
			<div class="listado-avatar">
				<a href="/perfil/'.$postz['nick'].'"><img src="'.$postz['avatar'].'" width="32" height="32" alt="Avatar de '.$postz['nick'].' en '.$comunidad.'" /></a>
			</div>
			<div class="txt">
				<a href="/perfil/'.$postz['nick'].'" />'.$postz['nick'].'</a><br />
				<img src="'.$images.'/flags/'.bandera($postz['pais']).'.png" alt="'.$postz['nombre_pais'].'" /> <span class="grey">'.$postz['mensaje'].'</span>

			</div>
		</div>
		<div class="action">
			<div class="btn_follow ruser'.$postz['id'].'" '; if($existepa>0){echo '';}else{echo 'style="display: none"';}echo'>
				<a onclick="notifica.unfollow(\'user\', '.$postz['id'].',notifica.userInPostHandle, $(this).children(\'span\'))" title="Dejar de seguir"><span class="remove_follow"></span></a>
			</div>
			<div class="btn_follow ruser'.$postz['id'].'" '; if($existepa>0){echo 'style="display: none"';}else{echo '';}echo'>

				<a onclick="notifica.follow(\'user\', '.$postz['id'].', notifica.userInPostHandle, $(this).children(\'span\'))" title="Seguir usuario"><span class="add_follow"></span></a>
			</div>
		</div>
	</li>';
} echo'<li class="listado-paginador clearfix">
	</li>
</ul>';}
mysql_free_result($sqlp);}
if($section=="Siguiendo"){
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="menu-tabs clearfix">
	<ul>
		<li ><a href="/monitor/seguidores">Seguidores</a></li>

		<li  class="selected"><a href="/monitor/siguiendo">Siguiendo</a></li>
		<li ><a href="/monitor/posts">Posts</a></li>
		<li ><a href="/monitor/comunidades">Comunidades</a></li>
		<li ><a href="/monitor/temas">Temas</a></li>
	</ul>
</div>
<ul class="listado">

<?php
$sqlp=mysql_query("SELECT s.id_user, s.id_seguidor , u.* 
				  FROM seguidor as s, usuarios as u 
				  WHERE s.id_seguidor=".$_SESSION['id']." 
				  AND s.id_user=u.id ORDER BY id desc");
$existep=mysql_num_rows($sqlp);

if($existep==0){
echo'<div class="emptyData">Nada por aqu&iacute;</div>';
}else{
echo'<ul class="listado">';
while ($postz=mysql_fetch_array($sqlp)){
echo'
	<li class="clearfix">
		<div class="listado-content clearfix">
			<div class="listado-avatar">
				<a href="/perfil/'.$postz['nick'].'"><img src="'.$postz['avatar'].'" width="32" height="32" alt="Avatar de '.$postz['nick'].' en '.$comunidad.'" /></a>
			</div>
			<div class="txt">
				<a href="/perfil/'.$postz['nick'].'">'.$postz['nick'].'</a><br />
				<img src="'.$images.'/flags/'.bandera($postz['pais']).'.png" alt="'.$postz['nombre_pais'].'" /> <span class="grey">'.$postz['mensaje'].'</span>

			</div>
		</div>
		<div class="action">
			<div class="btn_follow ruser'.$postz['id'].'">
				<a onclick="notifica.unfollow(\'user\', '.$postz['id'].', notifica.ruserInAdminHandle, this)" title="Dejar de seguir"><span class="remove_follow"></span></a>
			</div>
			<div class="btn_follow ruser'.$postz['id'].'" style="display: none">

				<a onclick="notifica.follow(\'user\', '.$postz['id'].', notifica.ruserInAdminHandle, this)" title="Seguir usuario"><span class="add_follow"></span></a>
			</div>
		</div>
	</li>';
} echo'</ul>';}
mysql_free_result($sqlp);
?>
	<li class="listado-paginador clearfix">
	</li>
</ul>

<?
}
if($section=="Posts"){
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="menu-tabs clearfix">
	<ul>
		<li ><a href="/monitor/seguidores">Seguidores</a></li>

		<li ><a href="/monitor/siguiendo">Siguiendo</a></li>
		<li  class="selected"><a href="/monitor/posts">Posts</a></li>
		<li ><a href="/monitor/comunidades">Comunidades</a></li>
		<li ><a href="/monitor/temas">Temas</a></li>
	</ul>
</div>
<?php
$sqlp=mysql_query("SELECT *, p.id AS PID FROM seguidor as s, posts AS p, categorias AS c, usuarios as u WHERE s.id_seguidor=".$_SESSION['id']." AND s.id_post_seguido=p.id AND p.categoria=c.id_categoria AND p.id_autor=u.id ORDER BY p.fecha desc");
$existep=mysql_num_rows($sqlp);

if($existep==0){
echo '<div class="emptyData">Nada Por Aqu&iacute;</div>';
}else{
echo'<ul class="listado">';
while ($postz=mysql_fetch_array($sqlp)){
echo'
	<li class="clearfix">

		<div class="listado-content clearfix">
			<div class="listado-avatar">
				<a href="/perfil/'.$postz['nick'].'"><img src="'.$postz['avatar'].'" width="32" height="32" alt="Avatar de '.$postz['nick'].' en '.$comunidad.'" /></a>
			</div>
			<div class="txt">
				<a href="/posts/'.$postz['link_categoria'].'/'.$postz['PID'].'/'.corregir($postz['titulo']).'.html">'.$postz['titulo'].'</a><br />
				<span class="categoriaPost '.$postz['link_categoria'].'"></span> <span class="grey">'.$postz['nom_categoria'].'</span>

			</div>
		</div>
		<div class="action">
			<div class="btn_follow list'.$postz['id_post_seguido'].'">
				<a onclick="notifica.unfollow(\'post\', '.$postz['id_post_seguido'].', notifica.listInAdminHandle, this)" title="Dejar de seguir"><img src="'.$images.'/remove_action.png" alt="" /></a>
			</div>
			<div class="btn_follow list'.$postz['id_post_seguido'].'" style="display: none">
				<a onclick="notifica.follow(\'post\', '.$postz['id_post_seguido'].', notifica.listInAdminHandle, this)" title="Seguir post"><img src="'.$images.'/add_action.png" alt="" /></a>
			</div>

		</div>
	</li>';}
echo'<li class="listado-paginador clearfix">
	</li>
  </ul>';}
mysql_free_result($sqlp);}
if($section=="Comunidades"){
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="menu-tabs clearfix">
	<ul>
		<li ><a href="/monitor/seguidores">Seguidores</a></li>

		<li ><a href="/monitor/siguiendo">Siguiendo</a></li>
		<li ><a href="/monitor/posts">Posts</a></li>
		<li  class="selected"><a href="/monitor/comunidades">Comunidades</a></li>
		<li ><a href="/monitor/temas">Temas</a></li>
	</ul>
</div>
<?php
$sqlc=mysql_query("SELECT *, c.idco AS COID, c.nombre AS cnombre 
				  FROM seguidor as s, c_categorias AS ctg, c_comunidades AS c, usuarios as u 
				  WHERE s.id_seguidor=".$_SESSION['id']." 
				  AND ctg.id_categoria=c.categoria 
				  AND s.id_comu_seguida=c.idco 
				  AND c.creadorid=u.id ORDER BY c.fecha desc");
$existet=mysql_num_rows($sqlc);

if($existet==0){
echo '<div class="emptyData">Nada Por Aqu&iacute;</div>';
}else{
echo'<ul class="listado">';
while ($postz=mysql_fetch_array($sqlc)){
echo'
	<li class="clearfix">

		<div class="listado-content clearfix">
			<div class="listado-avatar">
				<a href="/comunidades/'.$postz['shortname'].'/"><img src="'.$postz['imagen'].'" width="32" height="32" alt="'.$postz['cnombre'].'" /></a>
			</div>
			<div class="txt">
				<a href="/comunidades/'.$postz['shortname'].'/">'.$postz['cnombre'].'</a><br />
				<span class="categoriaCom '.$postz['link_categoria'].'"></span> <span class="grey">'.$postz['nom_categoria'].'</span>

			</div>
		</div>
		<div class="action">
			<div class="btn_follow list'.$postz['id_comu_seguida'].'">
				<a class="" onclick="notifica.unfollow(\'comunidad\', '.$postz['id_comu_seguida'].', notifica.listInAdminHandle, this)" title="Dejar de seguir"><img src="'.$images.'/remove_action.png" alt="" /></a>
			</div>
			<div class="btn_follow list'.$postz['id_comu_seguida'].'" style="display: none">
			    <a class="" onclick="notifica.follow(\'comunidad\', '.$postz['id_comu_seguida'].', notifica.listInAdminHandle, this)" title="Seguir comunidad"><img src="'.$images.'/add_action.png" alt="" /></a>
			</div>

		</div>
	</li>';
}echo'<li class="listado-paginador clearfix">
	</li>
</ul>';}
mysql_free_result($sqlc);}
if($section=="Temas"){
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="menu-tabs clearfix">
	<ul>
		<li ><a href="/monitor/seguidores">Seguidores</a></li>

		<li ><a href="/monitor/siguiendo">Siguiendo</a></li>
		<li ><a href="/monitor/posts">Posts</a></li>
		<li ><a href="/monitor/comunidades">Comunidades</a></li>
		<li  class="selected"><a href="/monitor/temas">Temas</a></li>
	</ul>
</div>

<?php
$sqlt=mysql_query("SELECT *, ct.idte AS TID, c.nombre AS cnombre FROM seguidor as s, c_temas AS ct, c_categorias AS ctg, c_comunidades AS c, usuarios as u WHERE s.id_seguidor=".$_SESSION['id']." AND ctg.id_categoria=c.categoria AND s.id_tema_seguido=ct.idte AND ct.idcomunid=c.idco AND ct.id_autor=u.id ORDER BY ct.fechate desc");
$existet=mysql_num_rows($sqlt);

if($existet==0){
echo '<div class="emptyData">Nada Por Aqu&iacute;</div>';
}else{
echo'<ul class="listado">';
while ($postz=mysql_fetch_array($sqlt)){
echo'
	<li class="clearfix">

		<div class="listado-content clearfix">
			<div class="listado-avatar">
				<a href="/perfil/'.$postz['nick'].'"><img src="'.$postz['avatar'].'" width="32" height="32" alt="Avatar de '.$postz['nick'].' en '.$comunidad.'" /></a>
			</div>
			<div class="txt">
				<a href="/comunidades/'.$postz['shortname'].'/'.$postz['TID'].'/'.corregir($postz['titulo']).'.html">'.$postz['titulo'].'</a><br />
				<span class="categoriaCom '.$postz['link_categoria'].'"></span> <a href="/comunidades/'.$postz['shortname'].'/" />'.$postz['cnombre'].'</a> <span class="grey">'.$postz['nom_categoria'].'</span>

			</div>
		</div>
		<div class="action">
			<div class="btn_follow list'.$postz['id_tema_seguido'].'">
				<a class="" onclick="notifica.follow(\'tema\', '.$postz['id_tema_seguido'].', notifica.listInAdminHandle, this)" title="Dejar de seguir"><img src="'.$images.'/remove_action.png" alt="" /></a>
			</div>
			<div class="btn_follow list'.$postz['id_post_seguido'].'" style="display: none">
			    <a class="" onclick="notifica.follow(\'tema\', '.$postz['id_tema_seguido'].', notifica.listInAdminHandle, this)" title="Seguir tema"><img src="'.$images.'/add_action.png" alt="" /></a>
			</div>

		</div>
	</li>';
}echo'<li class="listado-paginador clearfix">
	</li>
	  </ul>';}
mysql_free_result($sqlt);}
?>
<style>
.btn_follow a {
	background-image: url('<?=$images?>/btn_follow.png');
	background-repeat: no-repeat;
	background-position: top left;
display:block;
height:26px;
padding-bottom:0;
padding-left:7px;
padding-right:12px;
padding-top:4px;
width:13px;
}

.btn_follow a:hover , .btn_follow a:focus{
	background-position: -33px 0;
}

.btn_follow a:active{
	background-position: -66px 0;
}

.btn_follow a span {
	display: block;
	width: 19px;
	height: 19px;
	background-image: url('<?=$images?>/follow_actions.png');
	background-repeat: no-repeat;
}

.btn_follow a span.remove_follow {
	background-position: top left;
}

.btn_follow a span.add_follow {
	background-position: 0 -20px;
}

.menu-tabs {
	background: #e1e1e1;
	padding: 10px 10px 0 10px ;
}

.menu-tabs li {
	float: left;
	margin-right: 10px;
}

.menu-tabs li a {
	display: block;
	padding: 10px 15px;
	background: #ebeaea;
	font-size: 14px;
	font-weight: bold;
	color: #2b3ed3!important;
}

.menu-tabs li.selected a,.menu-tabs li a:hover {
	background: #fafafa;
	color: #000!important;
}


.listado li {
	border-top: 1px solid #FFF;
	background: #fafafa;
	border-bottom: 1px dotted #CCC;
}

.listado li:first-child {
	border-top: none;
}



.listado li:hover {
	background: #EEE;
}

.listado a {
	color: #2b3ed3!important;
	font-weight: bold;
}

.listado .listado-avatar {
	float:left;
	margin-right: 10px;
}

.listado .listado-avatar img {
	padding: 1px;
	background: #FFF;
	border: 1px solid #CCC;	
	width: 32px;
	height: 32px;
}

.listado .listado-content {
	padding: 5px;
	float: left;
}

.listado .txt  {
	float: left;
	line-height:18px;
}

.listado .txt .grey {
	color: #999;
}

.listado .action {
	float: right;
	border-left: 1px solid #d6d6d6;
	background: #EEE;
	padding: 8px;
}

.listado-paginador {
	padding: 5px;
}

a.siguiente-listado, a.anterior-listado {
	display: block;
	padding: 5px 10px;
	-moz-border-radius: 15px;
	-webkit-border-radius: 15px;
	border-radius:15px;
	color: #000!important;
	font-size: 13px;
}


/* new clearfix */
.clearfix:after {
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
	}
* html .clearfix             { zoom: 1; } /* IE6 */
*:first-child+html .clearfix { zoom: 1; } /* IE7 */
</style>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
<?php
pie();
?>