<?php
include("../header.php");

$id = $_SESSION['id'];

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

if ($rango=="255" or $rango=="655" or $rango=="755"){

$titulo	=	$descripcion;
cabecera_normal();

include("menumas.php");
?>
	<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Protocolo de un Moderador</h3>
		</div>
	<div class="boxy-content">
<font style="color:#333333" size="2"><strong>
<li><img src="<?=$images?>/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;No hagas lio aca, sino se pudre todo...</li>
<hr class="divider">
<li><img src="<?=$images?>/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Un moderador es un usuario con mayores privilegios en la web, con lo cual implica una mayor responsabilidad.</li>
<hr class="divider">
<li><img src="<?=$images?>/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Un error de uno, es un error de todos.</li>
<hr class="divider">
<li><img src="<?=$images?>/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Hacer un post puede llevar mucho tiempo y dedicacion.</li>
<hr class="divider">
<li><img src="<?=$images?>/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Un moderador no puede insultar, maltratar, trollear, ni burlarse de los dem&aacute;s. Si nosotros lo hacemos, lo estamos permitiendo.</li>
<hr class="divider">
<li><img src="<?=$images?>/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;No se pueden Desbannear usuarios suspendidos por otro moderador salvo que se haya cumplido el tiempo de suspencion.</li>
<hr class="divider">
<li><img src="<?=$images?>/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Un moderador no puede pasar capturas de pantalla de la admin a otras personas o amigos</li></strong></font>
</div></div>
<?php
pie();
}else{
include('../404.php');}
?>