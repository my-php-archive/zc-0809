<?php
require_once("header.php");

$id_user = $_SESSION['id'];
$postid = xss(no_i($_POST['postid']));

mysql_query("DELETE FROM favoritos WHERE id_post='$postid' AND id_usuario='$id_user'");

mysql_query("UPDATE posts SET favoritos=favoritos-1 WHERE id='$postid'");

echo "1";
?>

