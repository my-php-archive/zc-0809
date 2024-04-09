<?php
include("header.php");
require_once("class.inputfilter.php");
$logued = $_SESSION['id'];
$user  = $_SESSION['user'];
$postid = (int) $_POST['postid'];



$ifilter = new InputFilter();
$comentario = $ifilter->process($_POST['comentario']);




$detalle = 'sprite-balloon-left';
$fecha = time();

$lastid = (int)$_POST['lastid'];
$mostrar_resp = no_injection($_POST['mostrar_resp']);

	$sql = "SELECT id_autor FROM muro WHERE id='".$postid."'";
    $rs = mysql_query($sql,$con);
    $row = mysql_fetch_array($rs);
    $receptor = $row['id_autor'];


if($key==null) {
	die('0: Usuarios anonimos no pueden comentar');
}

if(empty($postid)) {
	die('0: El campo <b>ID del Post</b> es requerido para esta operacion');
}

if(empty($comentario)) {
	die('0: El campo <b>Comentario</b> es requerido para esta operacion');
}
if($postid !==10932){
$minuto = time() - (20);
$sqlflood = mysql_query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id=$key");

if(mysql_num_rows($sqlflood)){
	die('0: No puedes realizar tantas acciones en tan poco tiempo. Vuelve a intentarlo en unos instantes');
}}

$q2 = mysql_query("SELECT id_autor FROM muro WHERE id = '{$postid}'");

if(!mysql_num_rows($q2) or $row['elim']=="1"){
	die("0: El post no existe o fue eliminado");
}

$co = mysql_fetch_array($q2);
mysql_free_result($q2);

if($key!=$receptor){
$sql = "INSERT INTO notificaciones (id_autor, id_user, id_post,  detalle, detalle2, fecha, estatus) VALUES ('$key', '$receptor', '$postid', '$detalle', 'post-comment-own','$fecha','1')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
mysql_query("UPDATE usuarios Set notificaciones=notificaciones+'1' where id='".$receptor."' ");}

$sqlp=mysql_query("SELECT s.id_post_seguido, s.id_seguidor, u.nick, u.id FROM seguidor as s, usuarios as u WHERE s.id_post_seguido='$postid' AND s.id_seguidor=u.id ORDER BY id desc");
$existep=mysql_num_rows($sqlp);

if($existep!=0){
while($postz=mysql_fetch_array($sqlp)){
if($postz['nick']!=$user){
mysql_query("INSERT INTO notificaciones (id_autor, id_user, id_post, detalle, detalle2, fecha, estatus) VALUES ('$key', '{$postz['id']}',  '$postid', 'sprite-balloon-left-blue', 'post-comment','$fecha','1')");
mysql_query("UPDATE usuarios SET notificaciones=notificaciones+'1' WHERE id='{$postz['id']}'");}}}



mysql_query("INSERT INTO actividad (id_autor, id_user, id_post, detalle, fecha) VALUES ('$key', '$receptor', '$postid', 'comentarios-n','$fecha')");
mysql_query("UPDATE muro Set comentarios=comentarios+'1' Where id='".$postid."'");
mysql_query("UPDATE usuarios Set numcomentarios=numcomentarios+'1',ultimaaccion2=unix_timestamp() Where id = '".$key."'");
mysql_query("INSERT INTO comentariosmuro (id_post, id_autor, autor, comentario, fecha) VALUES ('$postid', '$key', '$user', '$comentario', unix_timestamp())");
$idc = mysql_insert_id();


//  Redirecionar si existe el post.
$p = mysql_query("SELECT p.id, p.titulo, c.link_categoria, c.id_categoria
                FROM (muro AS p, categorias AS c)
                WHERE p.id = {$postid} and p.categoria = c.id_categoria");
$p = mysql_fetch_object(($p));
$href2 = "/muro/{$p->link_categoria}/{$p->id}/".corregir($p->titulo).".html";

$tipo_ac = tipo_accion("comento-post");
mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$key}','{$tipo_ac}','Coment&oacute; en el post <a href=\"$href2\" >".urlencode($p->titulo)."</a>',unix_timestamp(),'')");



$ava	=	"SELECT avatar
			FROM usuarios
			WHERE id=".$key."";
$avat	=	mysql_query($ava, $con);
$avatar	=	mysql_fetch_array($avat);

echo '1:'; 
if ($co['id_autor'] == $key){

echo'
<div id="div_cmnt_'.$idc.'" class="especial1">';}else{
echo'
<div id="div_cmnt_'.$idc.'" class="especial3Me">';}
echo'

	<span style="display:none" id="citar_comm_'.$idc.'">'.$comentario.'</span>	<div class="comentario-post clearbeta">
		<div class="avatar-box">
			<a href="/perfil/'.$user.'">
				<img width="48" height="48" style="position:relative;z-index:1" class="avatar-48 lazy" src="'.$avatar['avatar'].'" title="Avatar de '.$user.' en '.$comunidad.'" onerror="error_avatar(this, '.$key.', 48)" />
			</a>
					</div>
		<div class="comment-box">

			<div class="dialog-c">
			</div>
			<div class="comment-info clearbeta">
				<div class="floatL">
				<a class="nick" href="/perfil/'.$user.'">'.$user.'</a> dijo <span title="'.date('d.m.Y').' a las '.date('H:m').' hs.">Hace instantes</span>:
				</div>
				<div class="floatR answerOptions">

				
					<ul>
					<li class="iconDelete"><a href="javascript:citar_comment('.$idc.', \''.$user.'\')"><span class="citar-comentario"></span></a></li>
                    <li class="iconDelete"><a href="javascript:borrar_com('.$idc.')"><span class="borrar-comentario"></span></a></li>

					</ul>
				</div>

									
			</div>
			<div class="comment-content">
							'.BBparse($comentario).'						</div>
		</div>

	</div>
</div>';
?>