<?php
require_once("header.php");
$n2 = time();
$key = $_SESSION['id'];
$id = $_POST['borrador_id']; 
$titulo = $_POST["titulo"];
$tags = no_injection(htmlentities(trim(guardartags($_POST['tags']))));
$cuerpo = $_POST["cuerpo"];
$categoria = (int)$_POST["categoria"];
$privado = $_POST["privado"];
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

$sql = "Update borradores Set titulo='$titulo', contenido='$cuerpo', privado='$privado', coments='$coments', categoria='$categoria', tags='$tags', patrocinado='$patrocinado', sticky='$sticky', fecha='NOW()' Where id='$id'"; 	
mysql_query($sql);

echo "1";
?>