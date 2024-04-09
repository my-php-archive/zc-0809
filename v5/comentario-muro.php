<?php
require_once("header.php");
require_once("class.inputfilter.php");
$ifilter = new InputFilter();
$comentario = $ifilter->process($_POST['comentario']);
$user  = $_SESSION['user'];
$postid = (int) $_POST['postid'];

$fecha = time();



if (get_magic_quotes_gpc()!=1)
   $cadena=addslashes($_POST['comentario']);

$lastid = (int)$_POST['lastid'];
$mostrar_resp = no_injection($_POST['mostrar_resp']);

	$sql = "SELECT id_autor FROM muro WHERE id='".$postid."'";
    $rs = mysql_query($sql,$con);
    $row = mysql_fetch_array($rs);
    $receptor = $row['id_autor'];







if($key==null) {
	die('0: Usuarios anonimos no pueden comentar :)');
}

if(empty($postid)) {
	die('0: El campo <b>ID de la Foto</b> es requerido para esta operacion');
}

if(empty($comentario)) {
	die('0: El campo <b>Comentario</b> es requerido para esta operacion');
}

$minuto = time() - (0);
$sqlflood = mysql_query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id=$key");

if(mysql_num_rows($sqlflood)){
	die('0: No puedes realizar tantas acciones en tan poco tiempo. Vuelve a intentarlo en unos instantes');
}

$q2 = mysql_query("SELECT id_autor FROM muro WHERE id = '{$postid}'");

if(!mysql_num_rows($q2)){
	die("0: No Existe este Post");
}

$co = mysql_fetch_array($q2);
mysql_free_result($q2);


mysql_query("INSERT INTO comentariosmuro (id_post, id_autor, autor, comentario, fecha) VALUES ('$postid', '$key', '$user', '$comentario', unix_timestamp())");
$idc = mysql_insert_id();






echo '1: 
<div id="div_cmnt_'.$idc.'"'.($co['id_autor'] == $key ? '"' : '').'>


	



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