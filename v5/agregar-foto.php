<?php
include("header.php");
$n2 = time();
$key = $_SESSION['id'];
$titulo	= $descripcion;
cabecera_normal();

$titulo = no_injection(xss($_POST["titulo"]));
$foto = no_injection($_POST['foto']);
$cuerpo = no_injection(xss($_POST["cuerpo"]));
$categoria = (int)$_POST["categoria"];
$privado = no_injection(xss($_POST["privado"]));
$coments = no_injection(xss($_POST["coments"]));

if(empty($key)){
	fatal_error('Por favor, autentificate nuevamente.','Ir a p&aacute;gina principal','location.href=\'/\'','Autentificaci&oacute;n no v&aacute;lida o expirada');
}



if($categoria==38 and $rangoz['rango']!=50 or $categoria>37){
	fatal_error('Che che, que hacemos?');
}

$minuto = time() - (60);

$sqlflood=$db->query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id='{$key}'");
if($db->num_rows($sqlflood)){
fatal_error('No podes realizar tantas acciones en tan poco tiempo. Vuelve a intentarlo en 5 Minutos.','Volver','history.go(-1)','Anti-Flood!');}

$db->query("INSERT INTO fotos (elim, id_autor, titulo, contenido, fecha, privado, coments, sticky, comentarios, categoria, foto, patrocinado) VALUES (0, '$key', '$titulo', '$cuerpo', unix_timestamp(), '$privado', '$coments', '$sticky', 0, '$categoria', '$foto', '$patrocinado')");
$id=$db->insert_id();
$db->query("UPDATE usuarios SET numposts=numposts+'1',ultimaaccion2=unix_timestamp() WHERE id='{$key}'");
$sqlnp=$db->query("SELECT p.id, p.titulo, p.categoria, p.titulo, c.id_categoria, c.link_categoria FROM (fotos AS p, categorias AS c) WHERE p.id='$id' and c.id_categoria='$categoria'");
$datos=$db->fetch_array($sqlnp);

//Nuevo Post Seguidores
$sqlp=$db->query("SELECT s.id_user, s.id_seguidor , u.* FROM seguidor as s, usuarios as u WHERE s.id_user='{$key}' AND s.id_seguidor=u.id ORDER BY id desc");
$existep=$db->num_rows($sqlp);

if($existep!=0){
while($postz=$db->fetch_array($sqlp)){

$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, detalle, detalle2, fecha, estatus) VALUES ('{$key}', '{$postz['id']}',  '{$datos['id']}', 'sprite-document-text-image','friend-post','$n2','1')");
$id=$db->insert_id();

$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='{$postz['id']}' ";
mysql_query($sql);
}}
$href="location.href='/fotos/{$datos['link_categoria']}/{$datos['id']}/".corregir($datos['titulo']).".html'";
$href2 = "/fotos/{$datos['link_categoria']}/{$datos['id']}/".corregir($datos['titulo']).".html";

$tipo_ac = tipo_accion("creo-foto");
mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$key}','icon-noti sprite-document-text-image','Subio una Foto <a href=\"$href2\" >".urlencode($datos['titulo'])."</a>',unix_timestamp(),'')");

fatal_error('El post <b>'.$datos['titulo'].'</b> fue agregado!','Acceder al post',''.$href.'','YEAH!');


?>