<?php
include("../header.php");
$titulo	= $descripcion;
cabecera_normal();

$key = $_SESSION['id'];
$comid = xss(no_i($_POST['comid']));
$titulo = xss(no_i($_POST['titulo']));
$cuerpo = xss(no_i($_POST['cuerpo']));
$tagste = xss(no_i($_POST['tags']));
$cerrado = xss(no_i($_POST['cerrado']));
$sticky = xss(no_i($_POST['sticky']));

if(empty($titulo)){
	fatal_error('El campo <b>Titulo</b> es requerido para esta operacion','Volver','history.go(-1)');
}
if(empty($cuerpo)){
	fatal_error('El campo <b>Cuerpo</b> es requerido para esta operacion','Volver','history.go(-1)');
}
if(empty($tagste)){
	fatal_error('El campo <b>Tags</b> es requerido para esta operacion','Volver','history.go(-1)');
}
if(empty($key)){
	fatal_error('Tenes que estar logueado');
}

$comunisql=mysql_query("UPDATE c_temas SET titulo='{$titulo}',cuerpo='{$cuerpo}',tagste='{$tagste}',cerrado='{$cerrado}',importante='{$sticky}' WHERE idco='{$comid}'");
$idtemf=mysql_insert_id();
$shortnamesql=mysql_query("SELECT shortname FROM c_comunidades WHERE idco='$comid'");
$shortnamenew = mysql_fetch_array($shortnamesql);



echo"
<div id='cuerpocontainer'>
<div class='container400' style='margin: 10px auto 0 auto;'>
<div class='box_title'>
<div class='box_txt show_error'>YEAH!</div>
<div class='box_rrs'><div class='box_rss'></div></div></div>
<div class='box_cuerpo'  align='center'>
<br />Se ha editado el tema de la comunidad en unos instantes se veran reflejados los cambios<br /><br /><br />
<input type='button' class='mBtn btnOk' style='font-size:13px' value='Ir al tema' title='Ir al tema' onclick=\"location.href='/comunidades/{$shortnamenew['shortname']}/{$idtemf}/".corregir($titulo).".html'\">
<br /></div></div><br /><br /><br /><br />
";
pie();
?>