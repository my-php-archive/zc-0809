<?php
require_once("header.php");
$conectado = $_SESSION['id'];
$postid = $_POST["postid"];
$key    = $_POST["key"];
if ($conectado==$key)
{
$sql = "SELECT id_autor FROM posts WHERE id='$postid'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
}
if ($autor==$key)
{
//seleccionamos post
$sql = "SELECT * FROM posts WHERE id=".$postid."";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$titulo = $row['titulo'];
$categoria = $row['categoria'];

$db->query("INSERT INTO borradores (estatus, borrador, id_autor, titulo, contenido, fecha2, tipo, categoria, causa) VALUES (0, 1, '$key', '$titulo', $postid, unix_timestamp(), 'eliminados', '$categoria', 'Eliminado por el autor')");

$sql = "Update posts Set elim='1' Where id='$postid'";
mysql_query($sql);
$sql = "Update usuarios Set numposts=numposts-'1' where id='$key'";
mysql_query($sql);
mysql_close();
echo "1";
echo "  El post fue eliminado satisfactoriamente";
}
else
{
echo "0";
echo "  Este post no te pertenece y no puedes borrarlo!";
}
}
?>