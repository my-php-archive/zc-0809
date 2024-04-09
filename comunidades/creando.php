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
$titulo	=	$descripcion;
cabecera_comunidad();
$key = $_SESSION['id'];
$nombre = no_injection($_POST['nombre']);
$shortname = no_injection($_POST['shortname']);
$imagen = no_injection($_POST['imagen']);
$pais = no_injection($_POST['pais']);
$categoria = no_injection($_POST['categoria']);
$subcategoria = no_injection($_POST['subcategoria']);
$descripcion = no_injection($_POST['descripcion']);

$privada = no_injection($_POST['privada']);
$tipo_val = no_injection($_POST['tipo_val']);
$rango_default = no_injection($_POST['rango_default']);

list($width, $height) = @getimagesize($imagen);
if(($width<="400") && ($height<="400")){
}else{
fatal_error('La Imagen no puede tener dimensiones mayores a 400x400');
}
if($rangoz['rango']==11){
	fatal_error('Tu rango no te permite crear comunidades');
}
if(empty($shortname)){
	fatal_error('El campo <b>Nombre corto</b> es requerido para esta operacion','Volver','history.go(-1)');
}
if(empty($nombre)){
	fatal_error('El campo <b>Nombre</b> es requerido para esta operacion','Volver','history.go(-1)');
}
if(empty($categoria)){
	fatal_error('El campo <b>Categor&#237;a</b> es requerido para esta operacion','Volver','history.go(-1)');
}
if(empty($descripcion)){
	fatal_error('El campo <b>Descripcion</b> es requerido para esta operacion','Volver','history.go(-1)');
}

if(strlen($imagen) < 7){
	fatal_error('La url ingresada en el campo <b>Imagen para mostrar</b> es incorrecta','Volver','history.go(-1)');
}
if($pais==null){
	fatal_error('El pais seleccionado es incorrecto','Volver','history.go(-1)');
}
if(empty($key)){
	fatal_error('Tenes que Estar Logueado');
}
if(strlen($shortname) < 5 or strlen($shortname) > 32){
	fatal_error('El nombre debe tener entre 5 y 32 caracteres');
}
if (is_numeric($shortname)){
	fatal_error('El nombre tiene que tener por lo menos una letra');
}
if (!ereg("^([a-zA-Z0-9\-]{1,32})$", $shortname)){
	fatal_error('Solo se permiten letras, n&uacute;meros y guiones medios (-)');
}

$q=$db->query("SELECT shortname FROM c_comunidades WHERE shortname='{$shortname}'");

if($db->num_rows($q)){
	fatal_error('Error: Tu IP y Usuario han sido Guardados.');
}
$crearco=$db->query("INSERT INTO c_comunidades (nombre, shortname, imagen, pais, categoria, subcategoria, descripcion, privada, oficial, tipo_val, rango_default, fecha, creadorid, numte, numm) VALUES ('{$nombre}','{$shortname}','{$imagen}','{$pais}','{$categoria}','{$subcategoria}','{$descripcion}','{$privada}',0,'{$tipo_val}','{$rango_default}', unix_timestamp(),'{$key}','0','1')");
$comid=$db->insert_id();
$unirseco=$db->query("INSERT INTO c_miembros (iduser, idcomunity, rangoco, fechaco) VALUES('{$key}','{$comid}','5', unix_timestamp())");
$db->query("UPDATE usuarios SET numcomuni=numcomuni+'1',ultimaaccion2=unix_timestamp() WHERE id='{$key}'");


$href2 = "/comunidades/{$_POST['shortname']}/";
$tipo_ac = tipo_accion("creo-comunidad");
mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$key}','{$tipo_ac}','Creo una nueva Comunidad <a href=\"$href2\" >".urlencode($nombre)."</a>',unix_timestamp(),'')");



echo'
<div id="cuerpocontainer">
<div class="container400" style="margin: 10px auto 0 auto;">
<div class="box_title">
<div class="box_txt show_error">YEAH!</div>
<div class="box_rrs"><div class="box_rss"></div></div>
</div>
<div class="box_cuerpo"  align="center">
<br />El mundo entero est&aacute; ante la presencia de una nueva comunidad. Felicitaciones!<br /><br /><br />
<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ir a mi nueva comunidad!" title="Ir a mi nueva comunidad!" onclick="location.href=\''.$href2.'\'">			<br />
</div>
</div>	
<br />
<br />
<br />
<br />';
pie();
?>