<?php
echo'1:';
?>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
$id_user = $_SESSION['id'];
$actid = no_injection($_POST['actid']);
$perfilid = no_injection($_POST['perfilid']);


$sql = "SELECT id_autor, id FROM acciones WHERE idu='{$actid}'";
$prev = mysql_query($sql);
$autor = mysql_fetch_array($prev);

if($rangoz['rango']==255 or $autor['id_autor']==$id_user){
$db->query("DELETE FROM acciones WHERE idu='{$actid}'");
die("1:");
}else{
$q2=$db->query("SELECT * FROM comentarios WHERE id='{$comid}' AND id_autor='{$id_user}'");
if(!$db->num_rows($q2)){
	die("0: Heidi xd");}}
?>