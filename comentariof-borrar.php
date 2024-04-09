<?php
require_once("header.php");
$id_user = $_SESSION['id'];
$comid = xss(no_i($_POST['comid']));
$key = xss(no_i($_POST['key']));
$postid = xss(no_i($_POST['postid']));
if(empty($id_user)){
	die("0: Debes estar logueado para realizar esta operación");
}
$sql = "SELECT id_autor, id FROM fotos WHERE id='{$postid}'";
$prev = mysql_query($sql);
$autor = mysql_fetch_array($prev);

if($rangoz['rango']==255 or $rangoz['rango']==100 or $rangoz['rango']==655 or $rangoz['rango']==755 or $autor['id_autor']==$id_user){
mysql_query("DELETE FROM comentariosfotos WHERE id='{$comid}'");


}else{
$q2=mysql_query("SELECT * FROM comentariosfotos WHERE id='{$comid}' AND id_autor='{$id_user}'");
if(!mysql_num_rows($q2)){
	die("0: No ten&eacute;s los privilegios necesarios para realizar esta operaci&oacute;n");}
	
mysql_query("DELETE FROM comentariosfotos WHERE id='{$comid}'");

}
die("1");
?>