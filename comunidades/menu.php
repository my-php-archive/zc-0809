<?php
echo'<div id="izquierda">
<div class="comunidadData'.($co['oficial']=='1' ? ' oficial' : '').'">
<div class="box_title">
<div class="box_txt post_autor">Comunidad</div>
<div class="box_rss"></div>
</div>
<div class="box_cuerpo">'.($co['oficial']=='1' ? '<img src="'.$images.'/riboon_top.png" class="riboon" />' : '').'
	  <div class="avaComunidad">
    <a href="/comunidades/'.$co['shortname'].'/">
      <img class="avatar" src="'.$co['imagen'].'" alt="Logo de la comunidad" title="Logo de la comunidad" onerror="com.error_logo(this)" />
    </a>
  </div>

<h2><a href="/comunidades/'.$co['shortname'].'/">'.$co['nombre'].'</a></h2>

<hr class="divider" />
<ul>
  <li><a href="/comunidades/'.$co['shortname'].'/miembros/"><span id="cont_miembros">'.$co['numm'].'</span> Miembros</a></li>
  <li>'.$co['numte'].' Temas</li>
  <li class="comunidad_seguidores">'.$co['seguico'].' Seguidores</li>
</ul>';
if($_SESSION['id']==$co['iduser'] and $_SESSION['user']!=null){
echo'<hr class="divider" />	Mi rango: <b>'.rangocomunidad($co['rangoco']).'</b>';}
echo'
<hr class="divider" />
<div class="buttons">';
if($_SESSION['user']!=null){
if($_SESSION['id']==$co['iduser']){
	echo'<input id="a_susc" class="mBtn btnCancel" onclick="com.miembro_del()" value="Dejar Comunidad" type="button" />';
}else{
	echo'<input id="a_susc" class="mBtn btnGreen" onclick="com.miembro_add()" value="Participar" type="button" />';}
$sqlc=mysql_query("SELECT id_user FROM seguidor WHERE id_seguidor=".$_SESSION['id']." AND id_comu_seguida=".$co['idco']."");
$existep=mysql_num_rows($sqlc);
echo'
	<a class="btn_g unfollow_comunidad"';if($existep>0){echo'';}else{echo' style="display: none"';}echo' onclick="notifica.unfollow(\'comunidad\', '.$co['idco'].', notifica.inComunidadHandle, $(this).children(\'span\'))"><span class="icons unfollow">Dejar de seguir</span></a>
	<a class="btn_g follow_comunidad"';if($existep>0){echo' style="display: none"';}else{echo'';}echo' onclick="notifica.follow(\'comunidad\', '.$co['idco'].', notifica.inComunidadHandle, $(this).children(\'span\'))"><span class="icons follow">Seguir comunidad</span></a>';}else{
echo'
	<input id="a_susc" class="mBtn btnGreen" onclick="location.href=\'/register\'" value="Participar" type="button">
	<a class="btn_g follow_comunidad" href="/register"><span class="icons follow">Seguir comunidad</span></a>';}
echo'



</div>

</div>
</div>';
if($co['rangoco']==5){echo'

<br class="spacer" />


<div class="box_title">
<div class="box_txt">Administraci&oacute;n</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">

<li><input type="button" value="Editar comunidad" onclick="location.href=\'/comunidades/'.$co['shortname'].'/editar/\'" class="mBtn btnYellow" /></li>


</div>
';}
echo'</div>';
?>