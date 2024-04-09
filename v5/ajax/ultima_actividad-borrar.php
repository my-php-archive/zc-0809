<?php
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
$id = $_SESSION['id'];

echo'1:';

$actid = no_injection($_POST['actid']);
$perfilid = no_injection($_POST['perfilid']);


$sql = "SELECT * FROM acciones WHERE idu='{$id}'";
$prev = mysql_query($sql);
$autor = mysql_fetch_assoc($prev);

if($rangoz['rango']==255 or $rangoz['rango']==755 or $rangoz['rango']==655 or $rangoz['rango']==100 or $rangoz['rango']==455){

$db->query("DELETE FROM acciones WHERE ida='{$actid}'");
die("1:");
}else{
$q2=$db->query("SELECT * FROM comentarios WHERE id='{$comid}' AND id_autor='{$id_user}'");
if(!$db->num_rows($q2)){
die("0: :L");}}

?>