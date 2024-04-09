<?php
require_once("header.php");
$key = $_SESSION['id'];
$id = $_POST['borrador_id']; 

$sql = "DELETE FROM borradores WHERE id='$id' AND id_autor='$key'";
mysql_query($sql);

echo "1";
?>