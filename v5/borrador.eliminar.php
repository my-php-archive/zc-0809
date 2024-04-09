<?php
require_once("header.php");
$conectado = $_SESSION['id'];
$borrador = xss(no_i($_POST["borrador"];))
$key    = xss(no_i($_POST["key"]));
if ($conectado==$key)
{
$sql = "SELECT id_autor FROM borradores WHERE id='$borrador'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
}
if ($autor==$key)
{
$sql = "Update posts Set elim='1' Where id='$borrador'";
mysql_query($sql);
$sql = "Update usuarios Set numborradores=numborradores-'1' where id='$key'";
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