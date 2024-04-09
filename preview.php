<?php
include("header.php");
$cuerpo = xss($_POST["cuerpo"]);
$titulo = xss($_POST["titulo"]);

if(empty($cuerpo) or empty($titulo) or $key==null){
	die("<script>alert('Esto no deberia estar pasando. Si ves esto, por favor, contacta a un Administrador para reportar el problema. Gracias!');</script>");
}
$sqlpre = mysql_query("SELECT u.*,r.id_rango,r.nom_rango,r.img_rango FROM usuarios u LEFT JOIN rangos r ON r.id_rango=u.rango WHERE u.id='$key'");
$row = mysql_fetch_array($sqlpre);
mysql_free_result($sqlpre);
    echo'<div id="preview" class="box_cuerpo" style="margin: -15px 0pt 0pt; font-size: 13px; line-height: 1.4em; width: 750px; padding: 12px 80px; overflow-y: auto; text-align: left; height: 394px;">
'.BBparse($cuerpo).'</div>';

?>
