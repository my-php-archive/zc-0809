<?php
require_once("header.php");
$postid = $_POST['borrador_id'];

//seleccionamos borrador
$sql = "SELECT contenido FROM borradores WHERE id=".$postid."";
$rs = mysql_query($sql, $con);
$rows = mysql_fetch_array($rs);
$pid = $rows['contenido'];

//seleccionamos post
$sql = "SELECT * FROM posts WHERE id=".$pid."";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$titulo = $row['titulo'];
$contenido = $row['contenido'];

echo "1   <div style=\"text-align: left; padding-left: 15px;\">
	<strong>T&iacute;tulo:</strong><br>
	<input value=\"{$row['titulo']}\" style=\"width: 480px;\" onfocus=\"this.select()\" type=\"text\"><br>
	<strong>Cuerpo:</strong><br>
	<textarea style=\"width: 490px; height: 140px;\" onfocus=\"this.select()\">{$row['contenido']}</textarea>
</div>";
?>