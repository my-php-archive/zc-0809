<?php
include("../header.php");
$id = $_SESSION['id'];

if($id !==null or $rangoz['rango'] !=="255"||"755")
{
$asunto = $_POST['asunto'];
$emisor = $_POST['emisor'];
$receptor = $_POST['id'];
$cuerpo = $_POST['cuerpo'];
mysql_query("INSERT INTO `mensajes` (`id_mensaje`, `id_emisor`, `id_receptor`, `asunto`, `contenido`, `papelera_emisor`, `papelera_receptor`, `eliminado_emisor`, `eliminado_receptor`, `id_carpeta`, `leido_emisor`, `leido_receptor`, `fecha`, `fecha_papelera`) VALUES (NULL, '{$emisor}', '{$receptor}', '{$asunto}', 'El Staff de la web te envi&oacute; este mensaje para advertirte de tu mal actuar.

Causa: {$cuerpo}

Esperamos que reconsideres esto, y puedas seguir disfrutando de la web. 

Gracias!.', '0', '0', '0', '0', '0', '0', '0', NOW(), NOW());");
echo'Good!';
}
else
{
  echo'';
}
?>