<?php

function limpia($var){
	$var = strip_tags($var); //esto te libra de los xss x)
	$malo = array("\\",";","\'","'"); // aqui pones caracteres no permitidos x)
	$i=0;$o=count($malo);
	while($i<=$o){
		$var = str_replace($malo[$i],"",$var);
		$i++;
	}
	return $var;
}

function LimpiarTodo($datos){
	if(is_array($datos)){
		$datos = array_map('limpia',$datos);
	}else{
	   header("location: http://www.zincomienzo.net/");
		die();
	}
	return $datos;	
}

if($_POST)  $_POST =& LimpiarTodo($_POST);
if($_GET)   $_GET  =& LimpiarTodo($_GET);
 

require("header.php");
$id      = no_i($_GET['id']);

$nom     = no_i($_SESSION['id']);
$section = xss($_GET['section']);



$direccion = explode("/", $_SERVER['REQUEST_URI']);
$aux       = $direccion[2];

if ($id == null) $id = $aux;
if (is_numeric($id)) $donde = "u.id='{$id}'"; else $donde = "u.nick='{$id}'";

$sqlu   = $db->query("SELECT u.*,r.nom_rango FROM usuarios u LEFT JOIN rangos r ON r.id_rango=u.rango WHERE {$donde} ");
$existe = $db->num_rows($sqlu);
$row    = $db->fetch_array($sqlu);

$db->free_result($sqlu);
$edad   = date("Y")-$row['ano'];
$ultimaip  = $row['ultimaip'];
$activacion  = $row['activacion'];



if (!$existe){
    $titulo	= $descripcion;
    cabecera_normal();
    fatal_error('Ese usuario no existe');
}
$Actividad = mysql_num_rows(mysql_query("select * from acciones where idu = '{$row['id']}'"));
$Posts = mysql_num_rows(mysql_query("select * from posts where id_autor = '{$row['id']}'"));

/*$secciones = array("posts","medallas","seguidores","siguiendo","informacion","comunidades","administrar","Actividad","");
if($section !=$secciones) $section = "Actividad"; */
if($section == "") $section="Actividad";

$id_autor  = $row['id'];
$titulo    = $comunidad;
$comunidad = "Perfil de ".$row['nick']."";
cabecera_normal();
$comunidad = "Zincomienzo!";

function mespe($valor){
$valor = str_replace("1", "Enero", $valor);
$valor = str_replace("2", "Febrero", $valor);
$valor = str_replace("3", "Marzo", $valor);
$valor = str_replace("4", "Abril", $valor);
$valor = str_replace("5", "Mayo", $valor);
$valor = str_replace("6", "Junio", $valor);
$valor = str_replace("7", "Julio", $valor);
$valor = str_replace("8", "Agosto", $valor);
$valor = str_replace("9", "Septiembre", $valor);
$valor = str_replace("10", "Octubre", $valor);
$valor = str_replace("11", "Noviembre", $valor);
$valor = str_replace("12", "Diciembre", $valor);
return $valor;}


?>


<script src="http://www.zincomienzo.net/images/js/es/beta_acciones2.js?6.3.6" type="text/javascript"></script>

<div class="menu-tabs-perfil clearfix">


<?php
$TemasVer = mysql_query("select * from c_temas where id_autor = '{$row['id']}' and elimte = 0");
$VerTemas = mysql_num_rows($TemasVer);
$postsVer = mysql_query("select * from posts where id_autor = '{$row['id']}' and elim = 0");
$Verposts = mysql_num_rows($postsVer);
$SeguidoresVer = mysql_query("select * from seguidor where id_seguidor = '{$row['id']}'");
$VerSeguidores = mysql_num_rows($SeguidoresVer);
$ComunidadesVer = mysql_query("select * from c_miembros where iduser = '{$row['id']}'");
$VerComunidades = mysql_num_rows($SeguidoresVer);
?>


<ul class="clearfix">

<li <?php if($section=="Actividad"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>"><i class="icon actividad"></i> Actividad</a></li>
<li <?php if($section=="Informacion"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>/informacion"><i class="icon info-p"></i>Informaci&oacute;n</a></li>
<li <?php if($section=="posts"){echo 'class="selected"'; }?>><li><a href="/perfil/<?=$row['nick']?>/posts"><i class="icon sprite-document-text-image"></i>Posts</a></li>
<?php if($VerTemas !==0){ ?><li <?php  if($section=="temas"){echo 'class="selected"'; }?>><li><a href="/perfil/<?=$row['nick']?>/temas"><i class="icon sprite-block"></i>Temas</a></li><?php } ?>
<?php if($VerComunidades){ ?><li <?php if($section=="Comunidades"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>/comunidades"><i class="icon comunidades-p"></i>Comunidades</a></li><?php } ?>
<li <?php if($section=="Seguidores"){echo 'class="selected"'; }?>><li><a href="/perfil/<?=$row['nick']?>/seguidores"><i class="icon sprite-follow"></i>Seguidores</a></li>
<li <?php if($section=="Siguiendo"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>/siguiendo"><i class="icon followers"></i>Siguiendo</a></li>

</ul>

	</div><!-- menu tab -->
	<style>#menu { display: none }</style>
	


<div class="<?=$row['nom_rango']?>">
		<div id="main-col">
<div class="perfil-user clearfix <?=$row['nom_rango']?>">
	<div class="perfil-box clearfix">
		<div class="perfil-data clearfix">
			<div class="clearfix floatR">
								<i class="icon hastipsy male" title="Hombre"></i>

				<i class="icon flag hastipsy" style="margin-top:-3px"><img hspace="3" height="11" align="absmiddle" width="16" alt="Argentina" src="http://o2.t26.net/images/flags/ar.png" class="hastipsy country-name" title="Argentina"></i>
			</div>
			<div class="perfil-avatar">
				<a href="/perfil/<?=$row['nick']?>"><img src="<?=$row['avatar']?>" alt="" onerror="error_avatar(this)" /></a>
			</div><!-- ava -->
			<div class="perfil-info">

<h1 class="nick"><span class="name"><?=$row['nombre']?> <?=$row['apellido']?></span></h1>

<span class="realname">@<?=$row['nick']?></span>
								
<span class="bio"><?=$row['mensaje']?></span>

<span class="web"><a href="http://www.zincomienzo.net" target="_blank" rel="nofollow"><?=$row['sitio_web']?></a></span>
				


<?php
if($row['id']!=$nom){
    if($_SESSION['id'] != null){
        
        $sqlp = $db->query("SELECT id_user FROM seguidor WHERE id_seguidor= '{$_SESSION['id']}' AND id_user=".$row['id']."");
        $existep = $db->num_rows($sqlp);
        $mierda = $db->query("SELECT * FROM  seguidor WHERE id_seguidor ='{$_SESSION['id']}' AND id_user ='{$row['id']}'");
        $concha_peluda = $db->num_rows($mierda);

        if($concha_peluda !==0){
        echo'









<a onclick="notifica.unfollow(\'user\', '.$row['id'].', notifica.userInPostHandle, $(this).children(\'span\'))" class="unfollow-user-profile ui-button-positive following-button fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only"';}else{echo'<a title="Est&aacute; siguiendote" onclick="notifica.unfollow(\'user\', '.$row['id'].', notifica.userInPostHandle, $(this).children(\'span\'))" class="btn_g unfollow_user_post tipsy-s"';}

        echo ($existep>0?'':'style="display: none"');
        echo'><i class="icon followers"></i>
		<span class="following-button-text">
			Siguiendo		</span>
<span class="unfollow-button-text" style="display:none">

			Dejar de Seguir		</span>
<a name="unfollow" onclick="notifica.follow(\'user\', '.$row['id'].', notifica.userInPostHandle, $(this).children(\'span\'))" class="follow-user-profile ui-button-positive following-button fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only"';
        
        echo ($existep>0?' style="display: none"':'');
        echo'><i class="icon followers"></i>
		<span class="follow-button-text">Seguir</span></a>';
    }
}


// Siguiendo -> Querys.
$Query_Siguiendo = $db->query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_seguidor='$id_autor' AND s.id_user=u.id ORDER BY id desc limit 999999");
$Siguiendo = $db->num_rows($Query_Siguiendo);



?>


	<a href="/mensajes/a/<?=$row['nick']?>" class="ui-btn ui-state-default" style="margin-right:5px">
<i class="icon private-message"></i>Enviar Mensaje</a>




</div>
		</div>
	</div>
	
	<div id="user-metadata-profile" class="user-level">
		<ul class="clearfix">
			<li class="user-<?=$row['nom_rango']?>" style="position:relative; width:134px">
				<strong><?=$row['nom_rango']?></strong>

				<span>Rango</span>


<span style="position:absolute;top:11px;right:6px">
						
</span>
							</li>
			<li>
				<strong><?=$row['puntos']?></strong>
				<span>Puntos</span>

			</li>
			<li>
				<strong>
					<a href="/perfil/<?=$row['nick']?>/posts"><?=$row['numposts']?></a>
				</strong>
				<span>Posts</span>
			</li>
			<li>

				<strong><?=$row['numcomentarios']?></strong>
				<span>Comentarios</span>
			</li>
			<li>
				<strong>
					<a href="/perfil/<?=$row['nick']?>/temas">0</a>
				</strong>

				<span>Temas</span>
			</li>
			<li class="followers-count">
				<strong>
										<a data-val="1" class="data-followers-count" href="/perfil/<?=$row['nick']?>/seguidores"><?php
$sqld=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$id_autor' AND s.id_seguidor=u.id ORDER BY id desc limit 99999999");
$existep=mysql_num_rows($sqld);?>
		  <?=$existep?></a>
				</strong>
				<span>Seguidores</span>

			</li>
			<li style="border-right:0 none;">
				<strong>
					<a href="/perfil/<?=$row['nick']?>/siguiendo"><?=($Siguiendo != '' && $Siguiendo != '0' ? $Siguiendo : '0')?></a>
				</strong>
				<span>Siguiendo</span>
			</li>
			
		</ul>

	</div><!-- usermetadata -->
</div><!-- template header perfil -data -->
<?
if($section=="Actividad")
{
?>
<div id="full-col" class="perfil-content general">
	<div class="box">
		<div class="title clearfix">
			<h2>&Uacute;ltima actividad de <?=$row['nick']?></h2>
			<div class="action">
                          <select id="last-activity-filter" onChange="filtrar_ultima_actividad(this.value, <?=$row['id']?> )">
				<option value="todo">Todas</option>
				
                                <option value="post-nuevo">Post nuevo</option>
                                <option value="definicion-n">Definici&oacute;n Nueva</option>
				<option value="recomendar-p">Post recomendado</option>
				<option value="comentarios-n">Comentario en un post</option>
				<option value="tema-new">Tema nuevo</option>
				<option value="favoritos-n">Agrego a Favoritos un post</option>
				<option value="puntos-n">Agrego puntos a un post</option>				
                                <option value="comentarios-n-g">Respuesta en un tema</option>
				<option value="creo-comunidad">Cre&oacute; una comunidad</option>
				<option value="comunidades-n">Se uni&oacute; a una comunidad</option>
				<option value="follow-post">Sigui&oacute; un post</option>
				<option value="follow-n">Sigui&oacute; un tema</option>
			</select>

			</div>
		</div>
		<div id="last-activity-container" class="list activity">
					<div id="last-activity-date-today" class="date-sep">
			<script>filtrar_ultima_actividad('todo','<?=$row['id']?>')</script>
</div>		</div>
	</div>
	</div>
</div>
<?php
}
?>


<?php
if($section=="Informacion"){
?>
<div id="full-col">
<div class="perfil-content general">
	<div class="widget big-info clearfix box">
		<div class="title clearfix">
			<h2>Informaci&oacute;n de <?=$row['nick']?></h2>
		</div>

    <ul>

<li><label>Nombre</label><strong><?=$row['nombre']?></strong></li>						
						

<li><label>Edad</label><strong><?=$edad?> a&ntilde;os</strong></li>

<li><label>Fecha de Nacimiento</label><strong><?=$row['dia']?> de <?=mespe($row['mes'])?> de <?=$row['ano']?></strong></li>

<li><label>Pa&iacute;s</label><strong><?=pais($row['pais'])?></strong></li>	

<li><label>Mensajero</label><strong><?=$row['mensajero']?></strong></li>

<li><label>Es usuario desde</label><strong><?=date('d', $row['fecha'])?> de <?=mesp(date('m', $row['fecha']))?> de <?=date('Y', $row['fecha'])?></strong></li>	

<?php if ($row['estudios_mostrar']!='nadie'){ ?>

<li><label>Estudios</label><strong><?=secper($row['estudios'])?></strong></li>

<? }?>

<?php if ($row['idiomas_mostrar']!='nadie'){ ?>	

<li class="sep"><h4>Idiomas</h4></li>

<li><label>Castellano</label><strong><?=secper($row['idioma_castellano'])?></strong></li>				

<li><label>Ingl&eacute;s</label><strong><?=secper($row['idioma_ingles'])?></strong></li>				

<li><label>Portugu&eacute;s</label><strong><?=secper($row['idioma_portugues'])?></strong></li>				

<li><label>Franc&eacute;s</label><strong><?=secper($row['idioma_frances'])?></strong></li>				

<li><label>Italiano</label><strong><?=secper($row['idioma_italiano'])?></strong></li>				

<li><label>Alem&aacute;n</label><strong><?=secper($row['idioma_aleman'])?></strong></li>

<li><label>Otro</label><strong><?=secper($row['idioma_otro'])?></strong></li>						

<? }?>
						 	 	 	 	 	
<li class="sep"><h4>Datos profesionales</h4></li>

<?php if ($row['profesion_mostrar']!='nadie'){ ?>

<li><label>Profesi&oacute;n</label><strong><?=$row['profesion']?></strong></li>

<? }?>	

<?php if ($row['empresa_mostrar']!='Nadie'){ ?>		

<li><label>Empresa</label><strong><?=$row['empresa']?></strong></li>

<? }?>

<?php if ($row['sector_mostrar']!='nadie'){ ?>			

<li><label>Sector</label><strong><?=$row['sector']?></strong></li>

<? }?>	

<?php if ($row['ingresos_mostrar']!='nadie'){ ?>		

<li><label>Ingresos</label><strong><?=ingp($row['ingresos'])?></strong></li>

<? }?>

<?php if ($row['intereses_profesionales_mostrar']!='nadie'){ ?>			

<li><label>Intereses profesionales</label><strong><?=$row['intereses_profesionales']?></strong></li>

<? }?>

<?php if ($row['habilidades_profesionales_mostrar']!='nadie'){ ?>			

<li><label>Habilidades profesionales</label><strong><?=$row['habilidades_profesionales']?></strong></li>

<? }?>

<li class="sep"><h4>Vida personal</h4></li>

<?php if ($row['me_gustaria_mostrar']!='nadie'){ ?>	 	 	

<li><label>Le gustar&iacute;a</label><strong><?php if ($row['me_gustaria_amigos']=='on'){echo'Hacer Amigos,';} if ($row['me_gustaria_conocer_gente']=='on'){echo' Conocer gente con mis intereses,';} if ($row['me_gustaria_conocer_gente_negocios']=='on'){echo' Conocer gente para hacer negocios,';} if ($row['me_gustaria_encontrar_pareja']=='on'){echo' Encontrar pareja,';} if ($row['me_gustaria_todo']=='on'){echo' De todo un poco.';} ?></strong></li>

<? }?>			

<?php if ($row['estado_profesionales_mostrar']!='nadie'){ ?>

<li><label>Estado civil</label><strong><?=secper($row['estadov'])?></strong></li>

<? }?>			

<?php if ($row['hijos_profesionales_mostrar']!='nadie'){ ?>

<li><label>Hijos</label><strong><?=secper($row['hijos'])?></strong></li>

<? }?>			

<?php if ($row['vivo_profesionales_mostrar']!='nadie'){ ?>

<li><label>Vive con</label><strong><?=secper($row['vivo'])?></strong></li>

<? }?>

						
<li class="sep"><h4>&iquest;C&oacute;mo es?</h4></li>

<li><label>Mide</label><strong><?=$row['altura']?> centimetros</strong></li>

<li><label>Pesa</label><strong><?=$row['peso']?> kilos</strong></li>

<li><label>Su pelo es</label><strong><?=$row['pelo_color']?></strong></li>

<li><label>Sus ojos son</label><strong><?=$row['ojos_color']?></strong></li>

<li><label>Su f&iacute;sico es</label><strong><?=$row['fisico']?></strong></li>



<li class="sep"><h4>Habitos personales</h4></li>

<li><label>Mantiene una dieta</label><strong><?=$row['dieta']?></strong></li>

<li><label>Fuma</label><strong><?=$row['fumo']?></strong></li>

<li><label>Toma alcohol</label><strong><?=$row['tomo_alcohol']?></strong></li>

<li class="sep"><h4>Sus propias palabras</h4></li>

<?php if ($row['mis_intereses_mostrar']!='nadie'){ ?>

<li><label>Intereses</label><strong><?=$row['mis_intereses']?></strong></li>	

<? }?>

<?php if ($row['hobbies_mostrar']!='nadie'){ ?>	

<li><label>Hobbies</label><strong><?=$row['hobbies']?></strong></li>	

<? }?>

						</ul>
	</div>
</div>
</div>
</div>

<? }?>



<?php
if($section=="Comunidades"){
?>


<div id="full-col">
<div class="perfil-content box w-comunidades">
<div class="title clearfix">
	<h2>Comunidades en las que participa <?=$row['nick']?></h2>
</div>
<div class="list">



		


<?php 
$sqlco=$db->query("SELECT co.nombre,co.shortname,co.categoria,co.imagen FROM c_miembros m LEFT JOIN c_comunidades co ON co.idco=idcomunity WHERE iduser={$id_autor} AND co.eliminado='0' ORDER BY m.idm DESC LIMIT 10");
$exico=$db->num_rows($sqlco);
?>
<?php
if($exico){
while ($comun=$db->fetch_array($sqlco)){
echo'<div class="listado-content clearfix list-element">
			<a href="/comunidades/'.$comun['shortname'].'/" style="margin-right:10px;display:block;width:32px;height:32px;float:left"><img src="'.$comun['imagen'].'" alt="" onerror="com.error_logo(this)" width="32" height="32" /></a>
			<div class="floatL">
				<a href="/comunidades/'.$comun['shortname'].'/">'.$comun['nombre'].'</a><br />
				<span class="categoriaCom '.$comun['categoria'].'"></span> <span class="grey">'.$comun['categoria'].'</span>

			</div>
		</div>';}
}else{
echo'	<div class="emptyData">No es miembro de ninguna comunidad</div>';}

if($exico>=10){
echo'<a class="see-more" href="/perfil/'.$row['nick'].'/comunidades">Ver m&aacute;s &raquo;</a>';}
?>


</div>
</div>
</div>
</div>




<? }?>



<?php
if($section=="posts"){
?>

<div id="full-col">
<div class="perfil-content general">
		<div class="widget w-posts box clearfix">
	  <div class="title clearfix">
	  	<h2>&Uacute;ltimos Posts creados</h2>
	  	<span><a class="systemicons sRss" href="/rss/<?=$row['nick']?>/posts/" title="&Uacute;ltimos Posts de <?=$row['nick']?>"></a></span>
	  </div>
<div class="list">


<?php
$sqlp=$db->query("SELECT id, id_autor, titulo, fecha, privado, categoria, puntos, c.link_categoria, c.nom_categoria FROM posts as p inner join categorias as c on p.categoria=c.id_categoria where id_autor='$id_autor' and elim='0' ORDER BY id DESC LIMIT 20");
$existep=$db->num_rows($sqlp);
if($existep==0){
echo'';
}else{
echo'';
while ($postz=$db->fetch_array($sqlp)){
echo'
<div class="clearfix list-element">
				<i class="icon '.$postz['link_categoria'].'"></i><a href="/posts/'.$postz['link_categoria'].'/'.$postz['id'].'/'.corregir($postz['titulo']).'.html">'.$postz['titulo'].'</a> <span class="value">'.$postz['puntos'].'</span>
			</div>

';}

echo'<div class="see-more"><a href="http://buscar.zincomienzo.net/posts?&autor='.$row['nick'].'">Ver m&aacute;s &raquo;</a></div>

				</div>

			</div>
	</div>
</div>
</div>';

if($existep>=20){
?>






<?php
}}}
?>

<?php
if($section=="Seguidores"){
?>
<div id="full-col">
<div class="perfil-content box">
<div class="title clearfix">
	<h2>Usuarios que siguen a <?=$row['nick']?></h2>

</div>
<div class="list">

<?php
$sqlp=$db->query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$id_autor' AND s.id_seguidor=u.id ORDER BY id desc");
$existep=$db->num_rows($sqlp);

if($existep==0){
echo'<div class="emptyData">No tiene seguidores</div>';
}else{
echo'<ul class="listado">';
while($postz=$db->fetch_array($sqlp)){
echo'
		
<div class="clearfix list-element">
		<div class="listado-content clearfix">
			<a style="margin-right:10px;display:block;width:32px;height:32px;float:left" href="/perfil/'.$postz['nick'].'"><img src="'.$postz['avatar'].'" width="32" height="32" alt="Avatar de '.$postz['nick'].' en Zincomienzo!" /></a>
			<div class="txt">
				<a href="/perfil/'.$postz['nick'].'">'.$postz['nick'].'</a><br />
				<img src="/img/flags/'.bandera($postz['pais']).'.png" alt="'.$postz['nombre_pais'].'" /> <span class="grey">'.strip_tags($postz['mensaje']).'</span>

			</div>
		</div>
				<div class="accion-seguir">
			<a name="follow"
		onclick="notifica.follow(\'user\', '.$postz['id'].', notifica.userInfollowersContext, $(this), false);"
		class="follow-user-followers following-button fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only"
		>
		<i class="icon followers"></i>
		<span class="follow-button-text">
			Seguir		</span>
		<span class="following-button-text" style="display:none">

			Siguiendo		</span>
		<span class="unfollow-button-text disabled" style="display:none">
			Dejar de Seguir		</span>
		
	</a>
			</div>
			</div>';}

echo'';}
$db->free_result($sqlp);
?>		
</div>

</div>
</div>
</div>
<?php
}
?>

<div id="sidebar">
	<div class="box w-medallas">

	<div class="title clearfix">
		<h2>Medallas</h2>
		<span class="action value">
			<a href="/perfil/<?=$row['nick']?>/medallas"><?php
$sqlp=$db->query("SELECT * FROM medallas WHERE usuario='$id_autor' ORDER BY fecha asc");
$existep=$db->num_rows($sqlp);?>
<?=$existep?></a>
		</span>
	</div>
	<ul class="clearfix">
	
	






<?php
if($existep==0){
echo "";
}
else{
echo"";
while ($postz=$db->fetch_array($sqlp)){
$cont=$cont+1;
echo"

<li>
<span title='{$postz['causa']}' class='icon-medallas {$postz['medalla']}'></span>
</li>
";
}
if($existep>=6)
{
echo'';
}
}
$db->free_result($sqlp);
?>











</ul>
	<div class="read-more clearfix">
		<span class="show-more"><a href="/perfil/<?=$row['nick']?>/medallas">Ver mas &raquo;</a></span>
	</div>
</div>
<div id="followers-profile-box" class="box w-seguidores">
	<div class="title clearfix followers-count">

		<h2>Seguidores</h2>
		<span class="action value">
						<a data-val="1" class="data-followers-count" href="/perfil/<?=$row['nick']?>/seguidores"><?php
$sqld=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$id_autor' AND s.id_seguidor=u.id ORDER BY id desc limit 99999999");
$existep=mysql_num_rows($sqld);?>
		  <?=$existep?>
		
<?php
if($existep==0){
echo'';
}else{
echo'';
while ($postz=mysql_fetch_array($sqld)){
echo'
';}
if($existep>=99999999){
echo'';}}
mysql_free_result($sqld);
?></a>
		</span>
	</div>
			
			



<?php
if($existep==0){
echo'';
}else{
echo'';
while ($postz=mysql_fetch_array($sqld)){
echo'
';}
if($existep>=99999999){
echo'';}}
mysql_free_result($sqld);
?>



<?php
$sqld=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$id_autor' AND s.id_seguidor=u.id ORDER BY id desc limit 21");
$existep=mysql_num_rows($sqld);?>
		  
<ul class="clearfix avatar-list">
<?php
if($existep==0){
echo'';
}else{
echo'';
while ($postz=mysql_fetch_array($sqld)){
echo'


<li class="hovercard" data-uid="'.$postz['id'].'">
			<a href="/perfil/'.$postz['nick'].'"><img src="'.$postz['avatar'].'" width="32" height="32" alt="'.$postz['nick'].'" title="'.$postz['nick'].'" /></a>
</li>


';}

if($existep>=99999999){
echo'';}}
mysql_free_result($sqld);
?>









		</ul>
	</div>
<div class="box w-siguiendo">
  <div class="title clearfix">
	  <h2>Siguiendo</h2>
	  <span class="action value">
	  		<a href="/perfil/<?=$row['nick']?>/siguiendo"><?php
$sqls=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_seguidor='$id_autor' AND s.id_user=u.id ORDER BY id desc limit 999999");
$existep=mysql_num_rows($sqls);?>
		<?=$existep?>
		
<?php
if($existep==0){
echo'';
}else{
echo'';
while ($postz=mysql_fetch_array($sqls)){
echo'
';}
if($existep>=999999){
echo'';}}
mysql_free_result($sqls);
?>
			
<?php 
$sqlco=mysql_query("SELECT co.nombre,co.shortname FROM c_miembros m LEFT JOIN c_comunidades co ON co.idco=idcomunity WHERE iduser={$id_autor} AND co.eliminado='0' ORDER BY m.idm DESC LIMIT 10");
$exico=mysql_num_rows($sqlco);
?></a>
</span>
</div>
<ul class="clearfix avatar-list">



		

<?php
$sqls=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_seguidor='$id_autor' AND s.id_user=u.id ORDER BY id desc limit 21");
$existep=mysql_num_rows($sqls);?>
		  
		
<?php
if($existep==0){
echo'<div class="emptyData">No Sigue a Nadie</div>';
}else{
echo'';
while ($postz=mysql_fetch_array($sqls)){
echo'
<li class="hovercard" data-uid="'.$postz['id'].'">
<a href="/perfil/'.$postz['nick'].'"><img src="'.$postz['avatar'].'" alt="'.$postz['nick'].'" width="32" height="32" title="'.$postz['nick'].'" /></a>
</li>';}


if($existep>=999999){
echo'<a class="see-more" href="/perfil/'.$row['nick'].'/siguiendo">Ver m&aacute;s &raquo;</a>';}}
mysql_free_result($sqls);
?>



</ul>
	</div>
<div class="box w-comunidades">
<?php 
$sqlco=$db->query("SELECT co.nombre,co.shortname,co.imagen,co.numm FROM c_miembros m LEFT JOIN c_comunidades co ON co.idco=idcomunity WHERE iduser={$id_autor} AND co.eliminado='0' ORDER BY m.idm DESC LIMIT 5");
$exico=$db->num_rows($sqlco);
?>
  <div class="title clearfix">
		<h2>Comunidades</h2>
		<span class="action value">
			<a href="/perfil/<?=$row['nick']?>/comunidades"><?=$exico?></a>
		</span>
	</div>
	<div class="comunidades-list">
			



		


<?php
if($exico){
    $Comunidad_Contado = $db->num_rows($sqlco);
    while ($comun=$db->fetch_array($sqlco)){
        $acm1pt++;
    echo '<div class="list-single clearfix ">

			<img src="'.$comun['imagen'].'" />
			<div class="list-data">
				<a href="/comunidades/'.$comun['shortname'].'/">'.($comun['nombre']).'</a>
				<span>'.$comun['numm'].' Miembros</span>
			</div></div>';
    }
    
}else{
    echo'	<div class="emptyData">'.$row['nick'].' no es miembro de ninguna comunidad</div>';
}

if($exico>=5){
echo'<div class="read-more clearfix">
		<span class="show-more"><a href="/perfil/'.$row['nick'].'/comunidades">Ver m&aacute;s &raquo;</a></span>
	</div>';}

?>
</div>
		

	</div>
</div>	</div>
		</div>

















<?
pie();
?>