<?php
include("../header.php");
$titulo	= $descripcion;
cabecera_normal();

$key = $_SESSION['id'];
$comid = no_injection($_POST['comid']);
$titulo = xss(no_injection($_POST['titulo']));
$cuerpo = xss(no_injection($_POST['cuerpo']));
$tags = xss(no_injection(guardartags($_POST['tags'])));
$cerrado = no_injection($_POST['cerrado']);
$sticky = no_injection($_POST['sticky']);
$n2 = time();

if(empty($detalles)){
	fatal_error('El <b>Comentario</b> es requerido para esta operacion','Volver','history.go(-1)');
}


$minuto = time() - (240);
$sqlflood=$db->query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id='{$key}'");
if($db->num_rows($sqlflood)){
fatal_error('No podes realizar tantas acciones en tan poco tiempo. Vuelve a intentarlo en unos instantes','Volver','history.go(-1)','Anti-Flood');
}

$q=$db->query("SELECT * FROM c_miembros WHERE iduser='{$key}' AND idcomunity='{$comid}' AND (rangoco='5' OR rangoco='3') ");

if(!$db->num_rows($q)){
	fatal_error('Tenes que ser parte de la Comunidad o No Tienes Rango.');
}

$comunisql=$db->query("INSERT INTO c_temas (id_autor, titulo, cuerpo, tagste, calificacion, cerrado, importante, idcomunid, fechate, visitaste) VALUES('$key','$titulo','$cuerpo','$tags','0','$cerrado','$sticky','$comid', unix_timestamp(),'0')");
$idtemf=$db->insert_id();

$db->query("UPDATE c_comunidades SET numte=numte+'1' WHERE idco='$comid'");
$db->query("UPDATE usuarios SET ultimaaccion2=unix_timestamp() WHERE id='{$key}'");

$shortnamesql=$db->query("SELECT shortname FROM c_comunidades WHERE idco='$comid'");
$shortnamenew = $db->fetch_array($shortnamesql);

$sqlp=$db->query("SELECT u.id, u.nick, s.id_seguidor, s.id_comu_seguida FROM seguidor as s, usuarios as u WHERE id_seguidor=u.id AND s.id_comu_seguida='$comid' ORDER BY id desc");
$existep=$db->num_rows($sqlp);

if($existep!=0){

while($postz=$db->fetch_array($sqlp)){

if($postz['nick']!=$_SESSION['user']){
$db->query("INSERT INTO notificaciones (id_autor, id_user, id_tema, id_comu, detalle, detalle2, fecha, estatus) VALUES ('$key','{$postz['id']}','$idtemf','$comid','sprite-block','com-thread','$n2','1')");
$id=$db->insert_id();

$db->query("Update usuarios Set notificaciones=notificaciones+'1' where nick='{$postz['nick']}'");}}}

echo"
<div id='cuerpocontainer'>
<div class='container400' style='margin: 10px auto 0 auto;'>
<div class='box_title'>
<div class='box_txt show_error'>YEAH!</div>
<div class='box_rrs'><div class='box_rss'></div></div></div>
<div class='box_cuerpo'  align='center'>
<br />El nuevo tema fue agregado a la comunidad<br /><br /><br />
<input type='button' class='mBtn btnOk' style='font-size:13px' value='Ir al tema' title='Ir al tema' onclick=\"location.href='/comunidades/{$shortnamenew['shortname']}/{$idtemf}/".corregir($titulo).".html'\">
<br /></div></div><br /><br /><br /><br />";
pie();
?>