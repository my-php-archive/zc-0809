<?php
include("header.php");
$nick = $_SESSION['user'];
# MP
$sqlmp = mysql_query("SELECT * FROM usuarios WHERE nick = '$nick'");
$coco = mysql_fetch_assoc($sqlmp);
$id_user = $coco['id'];
mysql_query("INSERT INTO `zincomie_zinco`.`mensajes` (`id_mensaje`, `id_emisor`, `id_receptor`, `asunto`, `contenido`, `papelera_emisor`, `papelera_receptor`, `eliminado_emisor`, `eliminado_receptor`, `id_carpeta`, `leido_emisor`, `leido_receptor`, `fecha`, `fecha_papelera`) VALUES (NULL, '821', '{$id_user}', 'Bienvenido a zincomienzo!', 'Hola!, sea bienvenido a zincomienzo.
<br />
Te recomendamos que antes de hacer un post leas bien el protocolo.
No seras bienvenido si tu pretencion es incumplir con el protocolo.

Gracias por usar nuetra web. Si quieres ser New Full User hace un post con 50 puntos :D .

Gracias Atte: Zincomienzo Staff! ', '0', '0', '0', '0', '0', '0', '0', NOW(), NULL);");
?>