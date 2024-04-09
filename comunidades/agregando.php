<?php
function limpia($var){
	$var = strip_tags($var); //esto te libra de los xss x)
	$malo = array("\\",";","\'","'"); // dami emo, aqui pones caracteres no permitidos x)
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
	   header("location: http://www.dozzu.com/");
		die();
	}
	return $datos;	
}
if($_POST)  $_POST =& LimpiarTodo($_POST);
if($_GET)   $_GET =& LimpiarTodo($_GET);
 

include("../header.php");
$titulo	= $descripcion;
cabecera_comunidad();

$key = $_SESSION['id'];
$comid = no_injection($_POST['comid']);
$titulo = no_injection($_POST['titulo']);
$cuerpo = no_injection($_POST['cuerpo']);
$tags = no_injection(guardartags($_POST['tags']));
$cerrado = no_injection($_POST['cerrado']);
$sticky = no_injection($_POST['sticky']);

if(empty($key)){
	fatal_error('Tenes que Estar Logueado');
}

if(empty($cuerpo)){
	fatal_error('El campo <b>Cuerpo</b> es requerido para esta operacion','Volver','history.go(-1)');
}

if(empty($titulo)){
	fatal_error('El campo <b>Titulo</b> es requerido para esta operacion','Volver','history.go(-1)');
}




$q=$db->query("SELECT * FROM c_miembros WHERE iduser='{$key}' AND idcomunity='{$comid}' AND (rangoco='5' OR rangoco='3') ");

if(!$db->num_rows($q)){
	fatal_error('Tenes que ser parte de la Comunidad o no tienes rango.');
}

$minuto = time()-60;
$sqlf = mysql_query("SELECT * FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id = '$key'") or die(mysql_error());
if(mysql_num_rows($sqlf)){ 
fatal_error("No puedes realizar tantas acciones en tan poco tiempo, intentalo en 1 minuto");
}
mysql_query("UPDATE usuarios SET ultimaaccion2 = unix_timestamp() WHERE id = '$key'");

$comunisql=$db->query("INSERT INTO c_temas (id_autor, titulo, cuerpo, tagste, calificacion, cerrado, importante, idcomunid, fechate, visitaste) VALUES('$key','$titulo','$cuerpo','$tags','0','$cerrado','$sticky','$comid', unix_timestamp(),'0')");
$idtemf=$db->insert_id();
$db->query("UPDATE c_comunidades SET numte=numte+'1' WHERE idco='$comid'");
$shortnamesql=$db->query("SELECT shortname FROM c_comunidades WHERE idco='$comid'");
$shortnamenew = $db->fetch_array($shortnamesql);

$href2 = "/comunidades/{$shortnamenew['shortname']}/{$idtemf}/".corregir($titulo).".html";

$tipo_ac = tipo_accion("tema-new");
mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$key}','tema-new','Cre&#243; un nuevo Tema <a href=\"$href2\">".urlencode($titulo)."</a>',unix_timestamp(),'')");


echo "
<div id='cuerpocontainer'>
<div class='container400' style='margin: 10px auto 0 auto;'>
<div class='box_title'>
<div class='box_txt show_error'>YEAH!</div>
<div class='box_rrs'><div class='box_rss'></div></div></div>
<div class='box_cuerpo'  align='center'>
<br />El nuevo tema fue agregado a la comunidad<br /><br /><br />
<input type='button' class='mBtn btnOk' style='font-size:13px' value='Ir al tema' title='Ir al tema' onclick=\"location.href='{$href2}'\">
<br /></div></div><br /><br /><br /><br />
";
pie();
?>