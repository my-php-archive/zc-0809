<?php
require_once("header.php");
$n2 = time();
$key = $_SESSION['id'];
$titulo = $_POST["titulo"];
$tags = no_injection(htmlentities(trim(guardartags($_POST['tags']))));
$cuerpo = $_POST["cuerpo"];
$categoria = (int)$_POST["categoria"];
$privado = 'borradores';
$patrocinado = $_POST["patrocinado"];
$sticky = $_POST["sticky"];
$coments = $_POST["coments"];
if(empty($key)){
die("0: Tenes que Estar Logueado");
}
if(empty($titulo) or empty($tags) or empty($cuerpo) or empty($categoria)){
	die("0: Faltan Datos");
}
if($categoria==31 and $rangoz['rango']!=50){
	die("0: No Puedes Crear Posts en la Categoria de Patrocinados, No Tienes Rango");
}

$db->query("INSERT INTO borradores (estatus, borrador, id_autor, titulo, contenido, fecha, fecha2, tipo, coments, comentarios, categoria, tags, patrocinado, sticky) VALUES (10, 1, '$key', '$titulo', '$cuerpo', NOW(), unix_timestamp(), '$privado', '$coments', 0, '$categoria', '$tags', '$patrocinado', '$sticky')");

echo "1";
?>