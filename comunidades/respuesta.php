<?php
include("../header.php");
$respuesta = no_injection(xss($_POST['respuesta']));
$lastid = (int)$_POST['lastid']+1;
$mostrar_resp = no_injection($_POST['mostrar_resp']);
$temaid = (int)$_POST['temaid'];
$key = $_SESSION['id'];


if(empty($key)){
	die("0: Tenes que estar logueado para realizar esta accion");
}
if(empty($respuesta) or empty($temaid)){
	die("0: Faltan Datos");
}
$minuto = time() - (60);
$sqlflood=$db->query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id='{$key}'");
if($db->num_rows($sqlflood)){
	die("0: No puedes realizar tantas acciones en tan poco tiempo. Vuelve a intentarlo en unos instantes");
}
$qte=$db->query("SELECT t.idcomunid,t.cerrado,t.idte,t.idcomunid,t.titulo,c.idco,c.shortname
                FROM (c_temas AS t, c_comunidades AS c)
                WHERE t.idte={$temaid} and t.idcomunid = c.idco");
$tem=$db->fetch_array($qte);
$comid=$tem['idcomunid'];

if($tem['cerrado']=='on'){
	die("0: No se Permite Comentarios en este Tema Loco.");
}

$q1=$db->query("SELECT * FROM c_miembros WHERE iduser='{$key}' AND idcomunity='{$comid}' AND rangoco!='1' ");
if(!$db->num_rows($q1)){
	die("0: Tenes que ser parte de la Comunidad o No Tienes Rango");
}


// Agregar accion.
$href2 = "/comunidades/{$tem['shortname']}/{$tem['idte']}/".corregir($tem['titulo']).".html";

$tipo_ac = tipo_accion("comento-tema");
mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$key}','{$tipo_ac}','Respondi&oacute; en el tema <a href=\"$href2\" >".urlencode($tem['titulo'])."</a>',unix_timestamp(),'')");


$inserr=$db->query("INSERT INTO c_respuestas (idtemare, idautorre, respuesta, fechare) VALUES('$temaid','$key','$respuesta', unix_timestamp())");
$i=$db->insert_id();
$db->query("UPDATE c_temas SET numco=numco+'1' WHERE idte='{$temaid}'");
$db->query("Update usuarios Set ultimaaccion2=unix_timestamp() Where id='{$key}'");

$ava	=	"SELECT *
			FROM usuarios
			WHERE id=".$_SESSION['id']."";
$avat	=	mysql_query($ava, $con);
$avatar	=	mysql_fetch_array($avat);
echo'1; ';

echo'
<div id="id_'.$i.'" '.($respco['nick'] == $co['nick'] ? ' class="especial1"' : '').'>
	<span style="display:none" id="citar_resp_'.$i.'">'.$_POST['respuesta'].'</span>	<div class="respuesta-post clearbeta">

		<div class="avatar-box">
			<a href="/perfil/'.$_SESSION['user'].'">
				<img style="position:relative;z-index:1" class="avatar-48 lazy" width="48" height="48" src="'.$avatar['avatar'].'" alt="Avatar de '.$_SESSION['user'].' en '.$comunidad.'" onerror="error_avatar(this, 2443629, 48)" />
			</a>
					</div>
		<div class="comment-box">
			<div class="dialog-c">
			</div>
			<div class="comment-info clearbeta">

				<div class="floatL">
				<a class="nick" href="/perfil/'.$_SESSION['user'].'/">'.$_SESSION['user'].'</a> dijo <span title="'.date('d.m.Y').' a las '.date('H:m').' hs.">Hace instantes</span>:
				</div>
				<div class="floatR answerOptions">	
					<ul>
					
					<li class="answerCitar"><a href="javascript:com.citar_resp('.$i.', \''.$_SESSION['user'].'\')"><span class="citarAnswer"></span></a></li>					
										
					</ul>
				</div>
			</div>
			<div class="comment-content">
				'.BBparse($_POST['respuesta']).'			</div>

		</div>
	</div>
</div>


</div>
';
?>