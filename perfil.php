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

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script src="/images/js/es/js.js" type="text/javascript"></script>


<script src="/admin/acciones.js" type="text/javascript"></script>








<style>
#cuerpocontainer {
	padding: 0!important;
	width: 960px!important;
}
</style>
<script type="text/javascript">
	function perfil_foto_error(id){
		$('#user_photo_'+id).remove();
	}
	function moreData(){
		if($('.moreData').css('display') == 'none'){
			$('.moreData').css('display', 'block');
			$('a.seeMore').html('&laquo; Ver menos');
		}else{
			$('.moreData').css('display', 'none');
			$('a.seeMore').html('Ver m&aacute;s &raquo;');
		}
	}

</script>








<script type="text/javascript">
                $(document).ready(function(){
                    $(".denuncia_form").click(function(){
                           $.ajax({
                                    type: 'POST',
                                    url: '/denuncia-usuario-form.php?id=<?php echo $id; ?>',
                                    data: 'anick='+'zincomienzo'+'&aid='+2987+'&id='+9251469+'&t='+'Buscamos Dise?ador Interactivo',
                                    success: function(h){
					mydialog.mask_close = false;
                                        mydialog.close_button = true;
					mydialog.show();
                                        mydialog.title('Denunciar Usuario');
                                        mydialog.body(h);
                                        mydialog.buttons(false);
                                        mydialog.center();
                                    },
                                    error: function(){
					mydialog.mask_close = false;
                                        mydialog.close_button = true;
                                        mydialog.show();
                                        mydialog.title('Denunciar Usuario');
                                        mydialog.body('Hubo en error al procesar la denuncia, intentalo de nuevo');
                                        mydialog.buttons(true, true, 'Aceptar','close',true, false);
                                        mydialog.center();
                                    }
                           });
                      });
                 });
            </script>








<div class="perfil-user clearfix '.$row['nom_rango'].'">
		<div class="perfil-box clearfix">
			<div class="perfil-data">
				<div class="perfil-avatar">
					<a href="/perfil/<?=$row['nick']?>"><img src="<?=$row['avatar']?>" alt="" onerror="error_avatar(this)" /></a>
				</div>
    			<div class="perfil-info">
    				<h1 class="nick"><?=$row['nick']?></h1>
                   
                    <span class="realname"><?=$row['nombre']?> <?=$row['apellido']?></span>


<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755")
	{

?>
<a onclick="window.location.href='/perfil/<?=$row['nick']?>/administrar'">Administrar Usuario</a>
<?php
	
}
?>				




<?=($row['mensaje'] != "" ? "<span class=\"frase-personal\">".strip_tags($row['mensaje'])."</span>" : "")?>
				<span class="bio"><?=$row['nombre']?> <? if($row['nombre']!=null){echo'es';}else{echo'Es';}?> <?=($row['sexo']=="m") ? 'un hombre' : 'una mujer';?> de <?=$edad?> a&ntilde;os. Vive en <?=pais($row['pais'])?> y se uni&oacute; a la familia de <?=$comunidad?> el <?=date('d', $row['fecha'])?> de <?=mesp(date('m', $row['fecha']))?> del <?=date('Y', $row['fecha'])?>.<? if($row['empresa']!=null){echo' Trabaja en '.$row['empresa'].'';} echo'
';?></span>



<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="255" or $rango=="655" or $rango=="755" or $rango=="100")
	{

?>

<br>

<?php
}
?>




							
<?php
if($row['id']!=$nom){
    if($_SESSION['id'] != null){
        
        $sqlp = $db->query("SELECT id_user FROM seguidor WHERE id_seguidor= '{$_SESSION['id']}' AND id_user=".$row['id']."");
        $existep = $db->num_rows($sqlp);
        $mierda = $db->query("SELECT * FROM  seguidor WHERE id_seguidor ='{$_SESSION['id']}' AND id_user ='{$row['id']}'");
        $concha_peluda = $db->num_rows($mierda);

        if($concha_peluda !==0){
        echo'


<a onclick="notifica.unfollow(\'user\', '.$row['id'].', notifica.userInPostHandle, $(this).children(\'span\'))" class="btn_g unfollow_user_post"';}else{echo'<a title="Est&aacute; siguiendote" onclick="notifica.unfollow(\'user\', '.$row['id'].', notifica.userInPostHandle, $(this).children(\'span\'))" class="btn_g unfollow_user_post tipsy-s"';}

        echo ($existep>0?'':'style="display: none"');
        echo'><span class="icons unfollow">Dejar de seguir</span></a><a onclick="notifica.follow(\'user\', '.$row['id'].', notifica.userInPostHandle, $(this).children(\'span\'))" class="btn_g follow_user_post"';
        
        echo ($existep>0?' style="display: none"':'');
        echo'><span class="icons follow">Seguir Usuario</span></a>';
    }
}


// Siguiendo -> Querys.
$Query_Siguiendo = $db->query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_seguidor='$id_autor' AND s.id_user=u.id ORDER BY id desc limit 999999");
$Siguiendo = $db->num_rows($Query_Siguiendo);



?>




</div>

			</div>
			





<div class="user-level">
				

<ul class="clearfix">
					<li class="user-<?=$row['rango']?>" style="position:relative;">
						<strong><?=$row['nom_rango']?></strong>
						<span>Rango</span>
                        <?
                            $q      = $db->query("SELECT * FROM usuarios WHERE id='$id_autor' AND ultimaaccion>unix_timestamp()-2*60");
                            $existe = $db->num_rows($q);
                            if($existe){
                                $status = '<span class="dot-online-offline" style="float: left; width: 16px; height: 16px; background: url(/images/big2v1.png); background-position: 0 -792px" title="Online"></span>';
                            }else{
                                $status = '<span class="dot-online-offline" style="float: left; width: 16px; height: 16px; background: url(/images/big2v1.png); background-position: 0 -814px" title="Offline"></span>';
                            }
                        ?>
						<span style="position:absolute;top:11px;right:6px"><?=$status?></span>
					</li>

					<li>
						<strong><?=$row['puntos']?></strong>
						<span>Puntos</span>
					</li>

					<li>
						<strong><?=$row['numposts']?></strong>

						<span>Posts</span>
					</li>

					<li>
						<strong><?=$row['numcomentarios']?></strong>
						<span>Comentarios</span>
					</li>

					<li>
						<strong><?php
$sqld=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$id_autor' AND s.id_seguidor=u.id ORDER BY id desc limit 99999999");
$existep=mysql_num_rows($sqld);?>
		  <?=$existep?></strong>
						<span>Seguidores</span>
					</li>

					<li>
						<strong><?=($Siguiendo != '' && $Siguiendo != '0' ? $Siguiendo : '0')?></strong>
						<span>Siguiendo</span>

					</li>

				</ul>
			





</div>
</div>
	


<?php
$TemasVer = mysql_query("select * from c_temas where id_autor = '{$row['id']}' and elimte = 0");
$VerTemas = mysql_num_rows($TemasVer);
$PostsVer = mysql_query("select * from posts where id_autor = '{$row['id']}' and elim = 0");
$VerPosts = mysql_num_rows($PostsVer);
$SeguidoresVer = mysql_query("select * from seguidor where id_seguidor = '{$row['id']}'");
$VerSeguidores = mysql_num_rows($SeguidoresVer);
$ComunidadesVer = mysql_query("select * from c_miembros where iduser = '{$row['id']}'");
$VerComunidades = mysql_num_rows($SeguidoresVer);
?>


<div class="menu-tabs-perfil clearfix">
			<ul>

<li <?php if($section=="Actividad"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>">Actividad</a></li>

<li><a href="/perfil/<?=$row['nick']?>/informacion">Informaci&oacute;n</a></li>

<?php if($VerPosts) { ?><li <?php if($section=="posts"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>/posts">Posts</a></li>  <?php } ?>

<?php if($VerTemas !==0){ ?><li <?php  if($section=="temas"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>/temas">Temas</a></li> <?php } ?>


<?php if($VerComunidades){ ?><li <?php if($section=="Comunidades"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>/comunidades">Comunidades</a></li><?php } ?>

<?php if($row['seguidores']!='0'){ ?><li <?php if($section=="Seguidores"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>/seguidores">Seguidores</a></li><? } ?>

<?php if($VerSeguidores) { ?><li <?php if($section=="Siguiendo"){echo 'class="selected"'; }?>><a href="/perfil/<?=$row['nick']?>/siguiendo">Siguiendo</a></li><?php } ?>





				<?php if($row['id']!=$nom){
				if($_SESSION['id']!=null){echo'

<li class="bloquear" style="float:right" >
<a id="bloquear_cambiar" href="javascript:bloquear('.$row['id'].', true, \'perfil\')">Bloquear</a></li>







<li class="enviar-mensaje">
<a href="/mensajes/a/'.$row['nick'].'" style="height:14px;"><span class="systemicons mensaje"></span></a>
</li>


<li class="enviar-mensaje">
<a class="denuncia_form" href="javascript:;"><span><img src="/images/denuncia-user.png" width="14" height="14"</span></a>
</li>


';}}?>












<? if($row['facebook']!=null){echo'
<li style="float:right">
<a href="'.$row['facebook'].'" style="height:14px;">
<img src="/images/facebook_mini.png" width="14" height="14">
</a>
</li>
';}?>





            </ul>
		






</div>
	</div>




<?
if($section=="Actividad"){
?>    
	<div class="perfil-main clearfix <?=rngp($row['rango'])?>">

	<div class="perfil-content general">
	<div class="widget big-info clearfix">
		<div class="title-w clearfix">
			<h3>&Uacute;ltima actividad de <?=$row['nick']?></h3>
			<select id="last-activity-filter" onChange="filtrar_ultima_actividad(this.value, <?=$row['id']?> )">
				<option value="todo">Todas</option>
				
                                <option value="post-nuevo">Post nuevo</option>
                                <option value="recomendar-p">Post recomendado</option>
				<option value="comentarios-n">Comentario en un post</option>
				<option value="tema-new">Tema nuevo</option>
				
				
                                <option value="comentarios-n-g">Respuesta en un tema</option>
				<option value="creo-comunidad">Cre&oacute; una comunidad</option>
				<option value="comunidades-n">Se uni&oacute; a una comunidad</option>
				
			</select>
		</div>



<div id="last-activity-container" class="last-activity">

<script>filtrar_ultima_actividad('todo','<?=$row['id']?>')</script>

</div>
</div>
</div>



<div class="perfil-sidebar">
	




<div style="margin-bottom: 10px">
     <!-- Publicidad 300x250 -->
</div>
		
<?php
if($_SESSION['id'] != null){




echo'





';
        

    }







?>




<div class="widget w-medallas clearfix">
		<div class="title-w clearfix">
			<h3>Medallas</h3>
<?php
$sqlp=$db->query("SELECT * FROM medallas WHERE usuario='$id_autor' ORDER BY fecha asc");
$existep=$db->num_rows($sqlp);?>
		  <span><?=$existep?></span>
		</div>
<?php
if($existep==0){
echo "<div class='emptyData'>No tiene medallas</div>";
}
else{
echo"<ul>";
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
echo'<a class="see-more" href="/perfil/'.$row['nick'].'/medallas">Ver detalles &raquo;</a>';
}
}
$db->free_result($sqlp);
?>

</ul>

</div>
	


<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="255" or $rango=="655" or $rango=="755")
	{

?>




		<div class="widget w-medallas clearfix">

		<div class="title-w clearfix">
		
		</div>



<script type="text/javascript">
// definiciones basicas
OCULTO="none";
VISIBLE="block";
function mostrar(blo) {
document.getElementById(blo).style.display=VISIBLE;
document.getElementById('ver_off').style.display=VISIBLE;
document.getElementById('ver_on').style.display=OCULTO;
}
function ocultar(blo) {
document.getElementById(blo).style.display=OCULTO;
document.getElementById('ver_off').style.display=OCULTO;
document.getElementById('ver_on').style.display=VISIBLE;
}
</script>


<div class='emptyData'><div id="ver_on" href="#" onclick="mostrar('bloque')"><font color="black"><img src="/images/add.png"> Agregar Medallas </font></a></div></div>

<div id="ver_off"></div>

<div id="bloque" style="display: none">

<form onsubmit="return validate_data();" name="Fdenuncia" action="/admin/agregarmedalla.php" method="post" style="text-align:center;">

<center><div class="bienvm"><b>Formulario para otorgar medallas</b><br /><hr />
  

<br>
Raz&oacute;n: <input type="text" name="causa" value=""  /> <br /> 
<br>
Aclaraci&oacute;n: <input type="text" name="detalles" value=""  /> <br />
<br>
Categor&iacute;a: <select name="medalla"  >

<option>Elegir Medalla</option>

<option value="medalla-255">Administrador</option>

<option value="medalla-100">Moderador</option>    

<option value="medalla-diamante">Gold User</option> 

<option value="medalla-great-user">Great User</option> 

<option value="medalla-platino">Silver Great</option> 

<option value="medalla-oro">Full User</option> 

<option value="medalla-plata">New Full User</option> 

<option value="medalla-bronce">Novato</option>

<option value="medalla-oro">Oro</option> 

<option value="medalla-diamante">Diamante</option> 

<option value="medalla-platino">Platino</option> 

<option value="medalla-bronce">Bronce</option>


 </select>


<br>
<hr />
<input type="submit" class="mBtn btnGreen" style="width:auto; margin-left: 5px" value="Agregar Medalla" title="Agregar Medalla"/>


<div class="clearfix"></div>

		</div>
		<div class="content-tabs perfil" style="display: none">
			<h3 onclick="cuenta.chgsec(this)" class="active">1. M&aacute;s sobre mi</h3>
			<fieldset>
				<div class="alert-cuenta cuenta-2">
				</div>
				<div class="field">
<input type="text" name="usuario" value="<?=$row['id']?>" /></div>



</form>


</div></div>
</ul>

</div>


<br><br>
<?php
 }

?>



<div class="widget w-seguidores clearfix">
	  <div class="title-w clearfix">
		  <h3>Seguidores</h3>

<span><?php
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
?></span>



<?php
$sqld=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$id_autor' AND s.id_seguidor=u.id ORDER BY id desc limit 21");
$existep=mysql_num_rows($sqld);?>
		  
		</div>
<?php
if($existep==0){
echo'<div class="emptyData">No tiene seguidores</div>';
}else{
echo'<ul class="clearfix">
';
while ($postz=mysql_fetch_array($sqld)){
echo'





<li><a class="hovercard-avatar" data-hovercard="'.$postz['id'].';'.$postz['nick'].';'.rngo($postz['rango']).';'.pais($postz['pais']).';'.bandera($postz['pais']).';1;'.$postz['avatar'].'" href="/perfil/'.$postz['nick'].'"><img src="'.$postz['avatar'].'" alt="'.$postz['nick'].'" title="'.$postz['nick'].'" width="32" height="32" /></a></li>';}









if($existep>=99999999){
echo'<a class="see-more" href="/perfil/'.$row['nick'].'/seguidores">Ver m&aacute;s &raquo;</a>';}}
mysql_free_result($sqld);
?>
							</ul>
				<a class="see-more" href="/perfil/<?=$row['nick']?>/seguidores">Ver m&aacute;s &raquo;</a>
			</div>

	
	<div class="widget w-siguiendo clearfix">
	  <div class="title-w clearfix">

		  <h3>Siguiendo</h3>

						<span>
<?php
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
?></span>





<?php
$sqls=mysql_query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_seguidor='$id_autor' AND s.id_user=u.id ORDER BY id desc limit 21");
$existep=mysql_num_rows($sqls);?>
		  
		</div>
<?php
if($existep==0){
echo'<div class="emptyData">No sigue usuarios</div>';
}else{
echo'<ul class="clearfix">';
while ($postz=mysql_fetch_array($sqls)){
echo'
<li><a class="hovercard-avatar" data-hovercard="'.$postz['id'].';'.$postz['nick'].';'.rngo($postz['rango']).';'.pais($postz['pais']).';'.bandera($postz['pais']).';1;'.$postz['avatar'].'" href="/perfil/'.$postz['nick'].'"><img src="'.$postz['avatar'].'" alt="'.$postz['nick'].'" title="'.$postz['nick'].'" width="32" height="32" /></a></li>';}
if($existep>=999999){
echo'<a class="see-more" href="/perfil/'.$row['nick'].'/siguiendo">Ver m&aacute;s &raquo;</a>';}}
mysql_free_result($sqls);
?>
									</ul>
				<a class="see-more" href="/perfil/<?=$row['nick']?>/siguiendo">Ver m&aacute;s &raquo;</a>
			
			</div>
	<div class="widget w-comunidades clearfix">
	  <div class="title-w clearfix">
<?php 
$sqlco=$db->query("SELECT co.nombre,co.shortname FROM c_miembros m LEFT JOIN c_comunidades co ON co.idco=idcomunity WHERE iduser={$id_autor} AND co.eliminado='0' ORDER BY m.idm DESC LIMIT 10");
$exico=$db->num_rows($sqlco);
?>	  
		   <h3>Mis comunidades</h3>
		  <span><?=$exico?></span>
		</div>
		<?php
if($exico){
while ($comun=$db->fetch_array($sqlco)){
echo'	<a href="/comunidades/'.$comun['shortname'].'/">'.$comun['nombre'].'</a> - ';}
}else{
echo'	<div class="emptyData">No es miembro de ninguna comunidad</div>';}

if($exico>=10){
echo'<a class="see-more" href="/perfil/'.$row['nick'].'/comunidades">Ver m&aacute;s &raquo;</a>';}

$fotoscount = mysql_query("select * from usuarios_fotos where iduser = '{$row['id']}'");
$cantidad = mysql_num_rows($fotoscount);

echo'			</div>
	<div class="widget w-fotos clearfix">
	  <div class="title-w clearfix">
		  <h3>Mis Fotos</h3>';
if($cantidad == 0){echo'
		  <span>0</span>
		</div>
<div class="emptyData">No public&oacute; ninguna foto</div>';
}else{echo'
		  <span>'.$cantidad.'</span>
		</div>';
 //Hacemos la misma consulta que ahi arriba ::)
while($sql_fotos=mysql_fetch_assoc($fotoscount))
echo'<div id="user_photo_'.htmlspecialchars($sql_fotos['fotoid']).'" class="photo_small">
		<a title="Abrir en nueva ventana" target="_blank" href="'.htmlspecialchars($sql_fotos['url']).'"><img border="0" onerror="perfil_foto_error('.$sql_fotos['fotoid'].')" style="max-width: 77px; max-height: 77px;" src="'.htmlspecialchars($sql_fotos['url']).'"></a>
	 </div>';
if($cantidad>=6){
echo'<a class="see-more" href="/perfil/'.$row['nick'].'/fotos">Ver m&aacute;s &raquo;</a>';}}
?>
			</div>
</div>
	</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
<?php
 // Fin Zona Actividad

 }



if($section=="posts"){
?>


<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
	<div class="perfil-content">
<div class="title-w clearfix">
	  	<h2>&Uacute;ltimos Posts creados</h2>
</div>



<?php
$sqlp=$db->query("SELECT id, id_autor, titulo, fecha, privado, categoria, puntos, c.link_categoria, c.nom_categoria FROM posts as p inner join categorias as c on p.categoria=c.id_categoria where id_autor='$id_autor' and elim='0' ORDER BY id DESC LIMIT 20");
$existep=$db->num_rows($sqlp);
if($existep==0){
echo'<div class="emptyData">No se pueden obtener los Posts en este momento.</div>';
}else{
echo'<ul class="ultimos">';
while ($postz=$db->fetch_array($sqlp)){
echo'
<li class="categoriaPost '.$postz['link_categoria'].'">
<a href="/posts/'.$postz['link_categoria'].'/'.$postz['id'].'/'.corregir($postz['titulo']).'.html">'.$postz['titulo'].'</a> <span>'.$postz['puntos'].' Puntos</span>
</li>';}

echo'</ul>';

if($existep>=20){
?>
<li style="




	background: #EEE;
	background: #EEE -moz-linear-gradient(0% 100% 90deg,#CCC, #EEE);
	background: #EEE -webkit-gradient(linear, 0% 0%, 0% 100%, from(#EEEEEE), to(#CCCCCC));

	color: #333!important;
	border: 1px solid #CCC;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius: 3px;
	font-weight:bold;
	padding: 2px 7px;
	display: block;
	float: right;
	margin-top: 5px;
	text-shadow: 0 1px 0 #EEE;
	clear: both;


"><a href="http://www.buscar.zincomienzo.net/posts/?q=&engine=google&autor=<?=$row['nick']?>">Ver m&aacute;s &raquo;</a></li>
<?php
}}
$db->free_result($sqlp);
?>
			
	</div>
</div>
<div class="perfil-sidebar">
	<div style="margin-bottom: 10px">
     <!-- Publicidad 300x250 -->





</div>
	</div>
<div style="clear:both"></div>
<? }?>
<?
if($section=="Muro")
{
?>

<script src="/admin/acciones.js" type="text/javascript"></script>

<?php
$sqlp=$db->query("SELECT * FROM muroperfil WHERE usuario='$id_autor' ORDER BY fecha asc");
$existep=$db->num_rows($sqlp);?>





<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
		<div class="perfil-content general">
	<div class="widget big-info clearfix">
		<div class="title-w clearfix"> 
			<h3><img src="/images/muro-perfil.png"> Muro de <?=$row['nick']?></h3>

<br><br>
        		<div class="comentarios-title">
			
			
			<h4 class="titulorespuestas floatL"><?=$existep?> Comentarios:</h4>
								<div class="clearfix"></div>

		</div>


</div>
<script>

function enviar_muro(){
	$('#boton_envia').addClass('disabled');
	$('#boton_envia').attr('disabled','disabled');
    var textarea = $('#body_comm');
	var text = textarea.val();
				if(text == '' || text == textarea.attr('title')){
		textarea.focus();
		$('#boton_envia').removeClass('disabled');
	$('#boton_envia').attr('disabled','');
		return;
				}

	if (!$.trim(text)) {
	textarea.focus();
	$('#boton_envia').removeClass('disabled');
	$('#boton_envia').attr('disabled','');
	return;
	}
	
 $.ajax({
  type: "GET", 
  url: "/agregar.comentario.php?detalle="+encodeURIComponent(text)+"&usuario=<?php echo $row['id']; ?>", 
  success: function(end){ 
  switch(end.charAt(0)){

		case '0':		
			$('#boton_envia').removeClass('disabled');
	$('#boton_envia').attr('disabled','');
	  $("#errorComent").html(end.substring(3)).slideDown('slow');
	  break;
	  case '1':
	  	$('#boton_envia').removeClass('disabled');
	$('#boton_envia').attr('disabled','');
	  $("#errorComent").html('');
	  $('#ultimo_murocoment').before(end.substring(3)).slideDown('slow');
	  break;
  } 
  }
  }); 
  }
  
  </script>
<ul>
<?php echo $row['id']; ?>
<?php
$sqlp=$db->query("SELECT *, m.fecha as FECHON FROM muroperfil as m, posts as p, categorias as c WHERE usuario='$id_autor' AND m.id_posts=p.id AND  p.categoria=c.id_categoria ORDER BY m.fecha asc");
$existep=$db->num_rows($sqlp);?>
<?php
if($existep==0){
echo "<div class='emptyData'>".$row['nick']." aun no tiene publicaciones en su muro</div><br>";
}
else{
echo"";
while ($postz=$db->fetch_array($sqlp)){
$cont=$cont+1;
echo"




		

<div id='div_cmnt_1161'><div class='comentario-post clearbeta'>
		<div class='avatar-box'>
			<a href='/perfil/{$postz['nick']}/'>
				<img width='48' height='48' style='position:relative;z-index:1' class='avatar-48 lazy' src='http://o1.t26.net/images/space.gif' orig='{$postz['avatar']}' title='Avatar de ".$row['nick']." en Zincomienzo!' onerror='error_avatar(this)'/>
			</a>

	<ul>

	</ul>
					</div>

<div class='comment-box' style='width: 520px'>
<div class='dialog-c'>
			</div>
			<div class='comment-info clearbeta'>

				<div class='floatL'>
				<a class='nick' href='/perfil/{$postz['nick']}'>{$postz['nick']}</a> dijo:
				</div>

<div class='floatR answerOptions'>
				
				
<ul>







<li class='iconDelete'><a href=''><span class='borrar-comentario'></span></a></li>






</ul>





</div>					
			</div>
			<div class='comment-content'>".BBparse($postz['detalles'])."</div>
		</div>
	
</div></div>

";
}
}
$db->free_result($sqlp);
?>
</div>
<div id="ultimo_murocoment" style="display:none;"></div>
<?php
if($_SESSION['id'] != null){
        

        
        echo'<style>
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



<div class="box_face">


<textarea class="publi" name="detalles" id="body_comm"></textarea>





<div style="margin-bottom: 4px"></div>


<input type="button" id="boton_envia" onclick="enviar_muro()" class="mBtn btnGreen" style="width:auto; margin-left: 5px" value="Enviar" title="Enviar"/>
	



</div>';
        
 
    }







?>



<?php
if($_SESSION['id']==null){




echo'<div class="emptyData clearfix">

Para poder publicar en el muro de '.$row['nick'].' necesitas estar <a href="" onclick="registro_load_form(); return false">Registrado</a>. O.. si ya tenes usuario <a href="#" onclick="open_login_box(\'open\')">Logueate!</a>
</div>
';
        
 
    }







?>











<div class="clearfix"></div>

		</div>
		<div class="content-tabs perfil" style="display: none">
			<h3 onclick="cuenta.chgsec(this)" class="active">1. M&aacute;s sobre mi</h3>
			<fieldset>
				<div class="alert-cuenta cuenta-2">
				</div>
				<div class="field">


<input type="text" name="nick" value="<?php
require_once("header.php");

$id = $_SESSION['id'];

$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];
?><?=$nick?><?php
?>">


<input type="text" name="avatar" value="<?php
require_once("header.php");

$id = $_SESSION['id'];

$sqlavatar = mysql_fetch_array(mysql_query("SELECT avatar FROM usuarios WHERE id='$id'"));
$avatar = $sqlavatar['avatar'];
?><?=$avatar?><?php
?>">
<input type="text" name="nick2" value="<?=$row['nick']?>">
<input type="text" name="usuario" value="<?=$row['id']?>"></div>

</form>
</div>
</div><br/>



</ul>
		

</div>
<div class="perfil-sidebar">
<!-- Publicidad 300x250 -->



<div style="clear:both"></div>
<!-- fin cuerpocontainer -->


?>
<?php
}
?>

<?
if($section=="administrar")
{
?>

		<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
		<div class="perfil-content general">
	<div class="widget big-info clearfix">
		<div class="title-w clearfix">
			<h3>Administrar a <?=$row['nick']?></h3>
		</div>
<ul>
<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="100")
	{


function estadope($valor){
$valor = str_replace("0", "<span class=\"color_green\">No</span>", $valor);
$valor = str_replace("1", "<span class=\"color_red\">Si</span>", $valor);
return $valor;}

function activacionpe($valor){
$valor = str_replace("0", "<span class=\"color_red\">Inactiva</span>", $valor);
$valor = str_replace("1", "<span class=\"color_green\">Habilitada</span>", $valor);
return $valor;}

?>


<script src="/admin/acciones.js" type="text/javascript"></script>

<div class="boxy xtralarge2">
			<div class="boxy-title">
			<center><h3>Administraci&oacute;n de Usuarios</h3></center>

				<span class="icon-noti popular-n"></span>
			</div>
			<div class="boxy-content">

<hr>
<b><font color="orange">Informaci&oacute;n:</font></b>
<hr>
<b>IP:</b> <b><font color="#5390B3"><?=$ultimaip?></font></b>
<br><br>
<b>ID:</b> <b><font color="#5390B3"><?=$row['id']?></font></b>
<br><br>
<b>Suspendido:</b> <b><?=estadope($row['ban'])?></b>
<br>
<?php
if($row['ban'] == 1)
{
$nickk = $row['nick'];
$sqls = mysql_query("SELECT * FROM suspendidos WHERE nick = '$nikk'");
$crew = mysql_fetch_assoc($sqls);
?>
Por: <?=$crew['nick']?><br>
Causa: <?=$crew['causa']?>
<? } ?>
<br>
<b>Estado de la Cuenta:</b> <b><?=activacionpe($row['activacion'])?></b>
<br><br>
<b>E-mail:</b> <b><?=$row['mail']?></b> caca
<br><br>
<b>Pa&iacute;s:</b> <b><?=pais($row['pais'])?></b>
<br><br> 
<b>&Uacute;ltima vez activo:</b> <b><?=hace($row['ultimaaccion'])?></b>
<br><br>
<div id="res" class="boxy-content" style="position:relative">
<div style="width:350px; margin:0 auto 1em">

<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="400">
<thead>
<th>Cuentas ingresadas con la misma IP<?php



$asasa = "select * from usuarios where id = '{$row['id']}'";
$preg = mysql_query($asasa);
while($sasa = mysql_fetch_assoc($preg))
{

   $lala = "select * from usuarios where ultimaip = '{$sasa['ultimaip']}'";

   $sll = mysql_query($lala);
   $cantidad = mysql_num_rows($sll);
   echo' (<b>'.$cantidad.'</b>):';
   while($rew = mysql_fetch_assoc($sll)){

       echo '';



   }


}

?></th>

</thead>
<tbody>
<tr>


<td><?php



$asasa = "select * from usuarios where id = '{$row['id']}'";
$preg = mysql_query($asasa);
while($sasa = mysql_fetch_assoc($preg))
{

   $lala = "select * from usuarios where ultimaip = '{$sasa['ultimaip']}'";

   $sll = mysql_query($lala);
   $cantidad = mysql_num_rows($sll);
   echo'';
   while($rew = mysql_fetch_assoc($sll)){

       echo '<a href="/perfil/'.$rew['nick'].'"> '.$rew['nick'].'</a><hr>';



   }


}

?></a></td>

                                            
                                                                                        </td>
                                        </tr>
                                                                        	
                                                                        </tbody>
                                    

                                </table>
                                </div>
<hr>
<b><font color="orange">M&aacute;s Opciones</font></b>
<br><br>
<img src="/images/baneados-negado-icon.png"><a href="javascript:com.banear_usuario()"><b> Suspender</b></a>

</div></div>


<?php
	
}
?>

<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="255" or $rango=="655" or $rango=="755")
	{
function estadope($valor){
$valor = str_replace("0", "<span class=\"color_green\">No</span>", $valor);
$valor = str_replace("1", "<span class=\"color_red\">Si</span>", $valor);
return $valor;}

function activacionpe($valor){
$valor = str_replace("0", "<span class=\"color_red\">Inactiva</span>", $valor);
$valor = str_replace("1", "<span class=\"color_green\">Habilitada</span>", $valor);
return $valor;}








$sqlmod = mysql_fetch_array(mysql_query("SELECT * FROM suspendidos where activo='1' order by id desc"));
$mod = $sqlmod['mod'];







?>

<script src="/admin/acciones.js" type="text/javascript"></script>

<div class="boxy xtralarge2">
			<div class="boxy-title">
				<center><h3>Administraci&oacute;n de Usuarios</h3></center>

				<span class="icon-noti popular-n"></span>
			</div>
			<div class="boxy-content">


<b><font color="orange">Informaci&oacute;n:</font></b>
<hr>
<b>IP:</b> <b><font color="#5390B3"><?=$ultimaip?></font></b>
<br><br>
<b>ID:</b> <b><font color="#5390B3"><?=$row['id']?></font></b>
<br><br>
<b>Suspendido:</b> <b><?=estadope($row['ban'])?></b>
<br><br>
<b>Estado de la Cuenta:</b> <b><?=activacionpe($row['activacion'])?></b>
<br><br>
<b>E-mail:</b> <b><?=$row['mail']?></b>
<br><br>
<b>Pa&iacute;s:</b> <b><?=pais($row['pais'])?></b>
<br><br> 
<b>&Uacute;ltima vez activo:</b> <b><?=hace($row['ultimaaccion'])?></b>
<br><br>


<div id="res" class="boxy-content" style="position:relative">
<div style="width:350px; margin:0 auto 1em">

<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="400">
<thead>
<th>Cuentas ingresadas con la misma IP<?php



$asasa = "select * from usuarios where id = '{$row['id']}'";
$preg = mysql_query($asasa);
while($sasa = mysql_fetch_assoc($preg))
{

   $lala = "select * from usuarios where ultimaip = '{$sasa['ultimaip']}'";

   $sll = mysql_query($lala);
   $cantidad = mysql_num_rows($sll);
   echo' (<b>'.$cantidad.'</b>):';
   while($rew = mysql_fetch_assoc($sll)){

       echo '';



   }


}

?></th>

</thead>
<tbody>
<tr>


<td><?php



$asasa = "select * from usuarios where id = '{$row['id']}'";
$preg = mysql_query($asasa);
while($sasa = mysql_fetch_assoc($preg))
{

   $lala = "select * from usuarios where ultimaip = '{$sasa['ultimaip']}'";

   $sll = mysql_query($lala);
   $cantidad = mysql_num_rows($sll);
   echo'';
   while($rew = mysql_fetch_assoc($sll)){

       echo '<a href="/perfil/'.$rew['nick'].'"> '.$rew['nick'].'</a><hr>';



   }


}

?></a></td>

                                            
                                                                                        </td>
                                        </tr>
                                                                        	
                                                                        </tbody>
                                    

                                </table>
                                </div>

<hr>
<b><font color="orange">M&aacute;s Opciones</font></b>




<br><br>
<img src="/images/baneados-negado-icon.png"><a href="javascript:com.banear_usuario()"><b> Suspender</b></a>
<br><br>
<img src="/images/rango-new.png"><a href="javascript:com.rango_usuario()"><b> Editar Rango</b></a>
<br><br>
<img src="/images/puntos-icon.png"><a href="javascript:com.agregar_puntos()"><b> Agregar Puntos</b></a>
<br><br>
<img src="/images/denuncias-ico-pu.png"><a href="javascript:com.quitar_puntos()"><b> Quitar Puntos</b></a>
<br><br>
<img src="/images/editar-cuenta-icon.png"><a href="/editar-cuenta/<?=$row['nick']?>"><b> Editar Cuenta</b></a>
<br><br>
<img src="/images/quitar-medalla.png"><a href="/user-medalla/<?=$row['nick']?>"><b> Quitar Medallas</b></a>
<br><br>
<?php
if($row['activacion']==0){
  ?>
  <img src="http://zincomienzo.net/images/reactivar.png"><a href="/habilitar-cuenta.php?nick=<?=$row['nick']?>"><b> Activar cuenta</b></a>
<br><br>
<?php
}
?>


<?php
if($row['ban']==1){//Comprobamos si la cuenta se encuentra baneada jeje lean18
?>
<img src="http://zincomienzo.net/images/reactivar.png"><a href="/desbanear-cuenta.php?nick=<?=$row['nick']?>"><b> Desbanear</b></a>
<br><br>
<?php
}
?>



<!-- Y aca es donde va a venir ficer :B... hola xD timba agarrame el pingo! :E Lean18 -->


</div></div>





<? }?>
</ul>
		

</div></div>
<div class="perfil-sidebar">



<!-- BEGIN SMOWTION TAG - 300x250 - zincomienzo: p2p - DO NOT MODIFY -->
<script type="text/javascript"><!--
smowtion_size = "300x250";
smowtion_section = "1165924";
//-->
</script>
<script type="text/javascript"
src="http://ads.smowtion.com/ad.js">
</script>
<!-- END SMOWTION TAG - 300x250 - zincomienzo: p2p - DO NOT MODIFY -->







</div>
</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
<? }?>



<?
if($section=="Informacion")
{
?>
		<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
		<div class="perfil-content general">
	<div class="widget big-info clearfix">
		<div class="title-w clearfix">
			<h3>Informaci&oacute;n de <?=$row['nick']?></h3>
		</div>
<ul>

<li><label>Nombre</label><strong><?=$row['nombre']?></strong></li>						
						

<li><label>Edad</label><strong><?=$edad?> a&ntilde;os</strong></li>

<li><label>Fecha de Nacimiento</label><strong><?=$row['dia']?> de <?=mespe($row['mes'])?> de <?=$row['ano']?></strong></li>

<li><label>El usurio lleva </label><strong> <?=haceano($row['fecha'])?> en <b>Zincomienzo</b>

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
		

</div></div>
<div class="perfil-sidebar">



<!-- BEGIN SMOWTION TAG - 300x250 - zincomienzo: p2p - DO NOT MODIFY -->
<script type="text/javascript"><!--
smowtion_size = "300x250";
smowtion_section = "1165924";
//-->
</script>
<script type="text/javascript"
src="http://ads.smowtion.com/ad.js">
</script>
<!-- END SMOWTION TAG - 300x250 - zincomienzo: p2p - DO NOT MODIFY -->







</div>
</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
<? }?>
<?
if($section=="Comunidades"){
?>
	<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
	<div class="perfil-content">
<div class="title-w clearfix">
	<h2>Comunidades en las que participa <?=$row['nick']?></h2>
</div>
<ul class="listado">

<?php 
		$sqlco=$db->query("SELECT co.*, ca.* FROM c_miembros m LEFT JOIN c_comunidades co ON co.idco=idcomunity LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria WHERE iduser={$id_autor} AND co.eliminado='0' ORDER BY m.idm desc limit 30");
$exico=$db->num_rows($sqlco);
if($exico){
while ($temas=$db->fetch_array($sqlco)){
echo'
		<li class="clearfix">
		<div class="listado-content clearfix">
			<div class="listado-avatar">
<a href="/comunidades/'.$temas['shortname'].'/"><img src="'.$temas['imagen'].'" alt="" onerror="com.error_logo(this)" width="32" height="32" /></a>
		</div>
			<div class="txt">
	<a href="/comunidades/'.$temas['shortname'].'/">'.$temas['nombre'].'</a><br />
	<span class="categoriaCom '.$temas['link_categoria'].'"></span> <span class="grey">'.$temas['nom_categoria'].'</span>
			</div>
		</div>

	</li>';}
}else{
	echo'<div class="widget">
	<div class="emptyData">No es miembro de ninguna comunidad</div>
	     </div>';}
?>
	
</ul>
</div>
<div class="perfil-sidebar">
<!-- Publicidad 300x250 -->




</div>
	</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<? }?>
<?
if($section=="Fotos"){
?>
	<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
<div class="perfil-content general">
<div class="title-w clearfix">
	<h2>Fotos De <?=$row['nick']?></h2>
</div>
	<div class="widget">
<?php
if($row['imagenes']!=null){
 
foreach(explode('@*', $row['imagenes']) as $imagen) {
echo'<div id="user_photo_{$row[\'id\']}" class="photo_small clearfix">
			<a title="Descripcion de la foto" target="_blank" href="'.$imagen.'">
			<img border="0" onerror="perfil_foto_error({$row[\'id\']})" src="'.$imagen.'" alt="Descripcion de la foto" /></a>

		</div>';}
?>
<?php
}else{
?>
				<div class='emptyData'>No publico ninguna foto</div>
<?php
}
?>
  </div>
</div>
<div class="perfil-sidebar">
<!-- Publicidad 300x250 -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
	</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<? }?>
<?
if($section=="Comentarios"){
?>
	<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
<div class="perfil-content general">
<div class="title-w clearfix">
	<h2>Comentarios de <?=$row['nick']?></h2>
</div>
<?
if($row['numcomentarios']!='0'){

$comentarios	=  "SELECT c.id AS CID, c.fecha, c.autor, c.id_autor, c.id_post, c.comentario, u.id, u.nick, p.id AS PID, p.id_autor, p.categoria, p.titulo, ca.id_categoria, ca.link_categoria, ca.nom_categoria
					FROM (comentarios AS c, usuarios AS u, posts AS p, categorias AS ca)
					WHERE c.id_autor='$id_autor'
					AND c.id_post=p.id
					AND p.id_autor=u.id
					AND p.categoria=ca.id_categoria
					ORDER BY c.fecha DESC
					LIMIT 50";
$cmntrs	=	mysql_query($comentarios, $con);
while($row = mysql_fetch_array($cmntrs)){
?>
		<span class="categoria <?=$row['link_categoria']?>" alt="<?=$row['nom_categoria']?>" title="<?=$row['nom_categoria']?>"></span> <a href="/posts/<?=$row['link_categoria']?>/<?=$row['PID']?>/<?=corregir($row['titulo'])?>.html"><strong><?=$row['titulo']?></strong></a><br /><div style="clear:both"></div>
		<div class="perfil_comentario"><?echo date("d.m.Y H:m:s",$row['fecha'])?>: <a href="/posts/<?=$row['link_categoria']?>/<?=$row['PID']?>/<?=corregir($row['titulo'])?>.html#cmnt_<?=$row['CID']?>"><?=BBparse($row['comentario'])?></a></div>

		<hr />
<?
}}else{
?>	
<div class="widget">
				<div class="emptyData">No hay comentarios</div>
</div>
<?php
}
?>
</div>
<div class="perfil-sidebar">
<!-- Publicidad 300x250 -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
	</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<? }?>
<?
if($section=="Seguidores"){
$pagina = $_GET['p'];
?>
	<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
<div class="perfil-content general">
<div class="title-w clearfix">
	<h2>Usuarios que siguen a <?=$row['nick'].strlen($pagina)?></h2>
</div>
<?php
# Paginado By timbalentimba | zincomienzo.net :D NO TOCAR HIJO DE PUTA.
// Definimos la pagina ::) la primera pagina es 0

// Si falta la pagina, pagina es = 0;
if(empty($pagina)) $pagina = 0;
// Si !is_numeric pagina = 0;
if(!is_numeric($pagina)) $pagina = 0;
// Limite por pagina:
$limite = 25;
// Otra configuraciones necesarias;
$limit_per_page_emp = $limite*$pagina;
// Anterior y siguiente:
$anterior = $pagina-1;
$siguiente = $pagina+1;
# FIN DEL PAGINADO, Y SI TOCAS TE DESFIGURO LA CARA ... me alegro de que estes bien r.r
$sqlp=$db->query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='$id_autor' AND s.id_seguidor=u.id ORDER BY id desc LIMIT $limit_per_page_emp,$limite") or die(mysql_error());
$existep=$db->num_rows($sqlp);

if($existep==0){
echo'<div class="emptyData">No tiene seguidores</div>';
}else{
echo'<ul class="listado">';
while($postz=$db->fetch_array($sqlp)){
echo'<li class="clearfix">
		<div class="listado-content clearfix">
			<div class="listado-avatar">
				<a href="/perfil/'.$postz['nick'].'"><img src="';if($postz['avatar']==null or $postz['avatar']=="/images/avatar.png"){echo'/images/a32_9.jpg';}else{echo''.$postz['avatar'].'';}echo'" width="32" height="32" alt="Avatar de '.$postz['nick'].' en '.$comunidad.'" /></a>
			</div>
			<div class="txt">
				<a href="/perfil/'.$postz['nick'].'">'.$postz['nick'].'</a><br />
				<img src="/images/flags/'.bandera($postz['pais']).'.png" alt="'.$postz['nombre_pais'].'" /> <span class="grey">'.strip_tags($postz['mensaje']).'</span>
			</div>
		</div>
	</li>';}
echo'</ul>';
echo'
<style>
.listado-paginador {
	padding: 5px;
}

</style>
';
echo"<li class=\"listado-paginador clearfix\"> ";
if($p >= 1){echo'<a class="anterior-listado floatL" href="/perfil/'.$row['nick'].'/seguidores'.$anterior.'"><b>Anterior</b></a>';}

echo"<a class=\"siguiente-listado floatR\" href=\"/perfil/".$row['nick']."/seguidores".$siguiente."\"><b>Siguiente</b></a> 
		</li>";
}
$db->free_result($sqlp);
?>	
</div>
<div class="perfil-sidebar">
<!-- Publicidad 300x250 -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
	</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<? }?>
<?
if($section=="Siguiendo")
{
?>
	<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
<div class="perfil-content general">
<div class="title-w clearfix">
	<h2>Usuarios que <?=$row['nick']?> sigue</h2>
</div>

<?php
# Paginado para "Siguiendo"
 $p = $_GET['p'];
 if(!is_numeric($p)) $p = 0;
 if(!$p) $p = 0;
 $limit = 25;
 $limit_emp = $limit*$p;
# fin paginado
$sqlp=$db->query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_seguidor='$id_autor' AND s.id_user=u.id ORDER BY id desc LIMIT $limit_emp,$limit");
$existep=$db->num_rows($sqlp);

if($existep==0){
echo "<div class='emptyData'>No sigue a nadie</div>";
}
else{
echo"<ul class=\"listado\">";
function RecoMensaje($mensaje)
{
  if(strlen($mensaje) > 50)
  {
    return substr($mensaje,0,60)."..."; 
  }
  else
  {
    return $mensaje;
  }
}
$sig = $p+1;
$ant = $p-1;
while ($postz=$db->fetch_array($sqlp)){
$cont=$cont+1;
echo"
<li class='clearfix'>
		<div class='listado-content clearfix'>
			<div class='listado-avatar'>
				<a href='/perfil/{$postz['nick']}/'><img src='{$postz['avatar']}' width='32' height='32' alt='Avatar de {$postz['nick']} en '.$comunidad.'!' /></a>
			</div>
			<div class='txt'>
				<a href='/perfil/{$postz['nick']}/'>{$postz['nick']}</a><br />
				<img src='$images/flags/".bandera($postz['pais']).".png' alt='{$postz['nombre_pais']}' /> <span class='grey'>".RecoMensaje($postz['mensaje'])."</span>

			</div>
		</div>
	</li>
	

";
} echo"</ul>";
echo'
<style>
.listado-paginador {
	padding: 5px;
}

</style>
';
echo"<li class=\"listado-paginador clearfix\"> ";
if($p >= 1){echo'<a class="anterior-listado floatL" href="/perfil/'.$row['nick'].'/siguiendo'.$ant.'"><b>Anterior</b></a>';}
if(mysql_num_rows($sqlp) <= $limit){
echo"<a class=\"siguiente-listado floatR\" href=\"/perfil/".$row['nick']."/siguiendo".$sig."\"><b>Siguiente</b></a> 
		</li> 
";}else {echo"";}
}
$db->free_result($sqlp);
?>

</div>
<div class="perfil-sidebar">
</div>
	</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<? }?>

  <?php
  if($section=="temas")
  {
     echo'
     <div class="perfil-main clearfix new-full-user">
	<div class="perfil-content general">
     <div class="title-w clearfix">
		  <h3>&Uacute;ltimos Temas creados</h3> <br><br>';
    $tem = mysql_query("select * from c_temas where id_autor = '{$row['id']}' and elimte = 0 order by idte desc limit 20");
    if(!mysql_num_rows($tem))
    {
      echo'<div class="emptyData">No hay temas</div>';
    }
    while($tema = mysql_fetch_assoc($tem))
    {

      $com = mysql_query("select * from c_comunidades where idco = '{$tema['idcomunid']}'");
       while($comu = mysql_fetch_assoc($com))
       {
       $cat = mysql_query("select * from c_categorias where id_categoria = '{$comu['categoria']}'");
       while($cate = mysql_fetch_assoc($cat))
       {
         $res = mysql_query("select * from c_respuestas where idtemare = '{$tema['idte']}'");

       echo "<ul class='ultimos'>
					<li class='clearfix categoriaCom ".$cate['link_categoria']."'>
				<a title='".$cate['link_categoria']." | ".$tema['titulo']."' class='titletema' href='/comunidades/".$comu['shortname']."/".$tema['idte']."/hasta+que+haga+la+funcion+este+va+a+ser+el+titulo+xD.html'>".$tema['titulo']."</a>
				En <a href='/comunidades/".$comu['sortname']."/'>".$comu['nombre']."</a>
				<span>".mysql_num_rows($res)." respuestas</span>
			</li>";
    } } }
    echo'</div></div></div>';
  }

  ?>

<?
if($section=="Medallas")
{
?>
	<div class="perfil-main clearfix <?=rngp($row['rango'])?>">
<div class="perfil-content general">
<div class="title-w clearfix">
	<h2>Medallas Ganadas Por <?=$row['nick']?></h2>
</div>
<?php
$sqlp=$db->query("SELECT *, m.fecha as FECHON FROM medallas as m, posts as p, categorias as c WHERE usuario='$id_autor' AND m.id_posts=p.id AND  p.categoria=c.id_categoria ORDER BY m.fecha asc");
$existep=$db->num_rows($sqlp);?>




<?php
if($existep==0){
echo "<div class='emptyData'>No tiene medallas</div>";
}
else{
echo"<ul class=\"listado\">";


while ($postz=$db->fetch_array($sqlp)){
$cont=$cont+1;

echo"

<li class='clearfix'>
	<div class='listado-content clearfix'>
		<div class='medalla {$postz['medalla']}-big' title='{$postz['causa']}'>
			<span></span>
		</div>

		<div class='txt'>
			<span class='medalla-title'>{$postz['causa']}</span>- ".date('d', $postz['FECHON'])." de ".mesp(date('n', $postz['FECHON']))." de ".date('Y', $postz['FECHON'])."<span class='grey'></span><br />
			";
			if($postz['id_posts']!='1'){echo"<a class='link-medalla' href='/posts/{$postz['link_categoria']}/{$postz['id_posts']}/".corregir($postz['titulo']).".html'>{$postz['titulo']}</a> - ";}
			echo"<span class='grey'>{$postz['detalles']}</span>"; if($postz['id'] !=="1" and $rangoz['rango']=="255" or $rangoz['rango']=="655" or $rangoz['rango']=="755" or $rangoz['rango']=="100"){ ?> <script src='/admin/acciones.js' type='text/javascript'></script><?php }
		echo"
        </div>
	</div>
</li>

";
}
}
$db->free_result($sqlp);
?>

</ul>
</div>
<div class="perfil-sidebar">



</div>
</div>
<? }?>
<style>

.medalla-title {
	font-weight: bold;
	color: #000;
}

.link-medalla {
	font-weight: normal!important;
}

.listado li:hover {
	background-color: #FAFAFA!important;
}


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




<?
pie();
?>