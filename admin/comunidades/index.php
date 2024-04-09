<?php
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
$titulo	=	$descripcion;
cabecera_normal();
$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];
$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];
if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){
include("menu.php");
?>
	<div class="boxy xtralarge">
<div class="boxy-title">
<h3><center>Hola <a href="/perfil/<?=$nick?>"><?=$nick?></a>!<br>Bienvendio al Panel General de Moderaci&oacute;n</center></h3>
</div>
	<div class="boxy-content">
<font style="color:#333333" size="2"><strong>
<li><img src="http://www.zincomienzo.net/images/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Probablemente seas nuevo en nuestro equipo de moderaci&oacute;n en Zincomienzo!, as&iacute; que aqu&iacute; encontrar&aacute;s una breve explicaci&oacute;n de lo que ver&aacute;s en el panel de moderaci&oacute;n de las comunidades.</li>

<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/denunciar.png" align="absmiddle" vspace="2">&nbsp;&nbsp;Denuncias:
<br>
Es la secci&oacute;n que m&aacute;s usar&aacute;s sin duda, aqu&iacute; encontrar&aacute;s y revisar&aacute;s una lista de denuncias de las comunidades y temas hechos por los usuarios de Zincomienzo! y denuncias an&oacute;nimas por parte usuarios no registrados.
<br>
<br>
En estas denuncias, no se recompensan a los usuarios por hacerlas y s&oacute;lo se revisan, si son correctas se eliminan o editan los temas y comunidades que hayan sido denunciados.
</li>

<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/cerrar.png" align="absmiddle" vspace="2">&nbsp;&nbsp;Temas Eliminados:
<br>
Aqu&iacute; encontrar&aacute;s una lista de los &uacute;ltimos temas eliminados, y tienes la opci&oacute;n de reactivarlos si la raz&oacute;n de la eliminaci&oacute;n del tema fue incorrecta.
<br>
<br>
Los moderadores no deben abusar de sus privilegios y eliminar sin raz&oacute;n alguna los temas, de lo contrario se les podr&iacute;a retirar el rango.
</li>

<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/cerrar.png" align="absmiddle" vspace="2">&nbsp;&nbsp;Comunidades Eliminadas:
<br>
Aqu&iacute; encontrar&aacute;s una lista de las &uacute;ltimos comunidades eliminadas, y tienes la opci&oacute;n de reactivarlas si la raz&oacute;n de la eliminaci&oacute;n de la comunidad fue incorrecta.
<br>
<br>
Los moderadores no deben abusar de sus privilegios y eliminar sin raz&oacute;n alguna las comunidades, de lo contrario se les podr&iacute;a retirar el rango.
</li>

<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/oficial.png" width="16" height="16" align="absmiddle" vspace="2">&nbsp;&nbsp;Comunidades Oficiales: (S&oacute;lo para administradores)
<br>
Son las comunidades importantes de Zincomienzo!, donde se informa a los usuarios sobre constantes actualizaciones y concursos en Zincomienzo!<br>
<br>
Tambi&eacute;n las comunidades oficiales son aquellas que han sido pagadas a Zincomienzo! por una empresa para promocionar un producto en Zincomienzo!</li>
</strong>
</font>
</div>
</div>
<div class="boxy xtralarge">
<div class="boxy-title">
<h3>Protocolo de un Moderador</h3>

</div>
<div class="boxy-content">
<font style="color:#333333" size="2"><strong>
<li><img src="http://www.zincomienzo.net/images/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;No hagas l&iacute;o ac&aacute;, sino se pudre todo...</li>
<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Un moderador es un usuario con mayores privilegios en la web, con lo cual implica una mayor responsabilidad.</li>
<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Un error de uno, es un error de todos.</li>
<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Hacer un post puede llevar mucho tiempo y dedicaci&oacute;n, por lo tanto, se debe revisar bien antes de decidir editar o borrar un post.</li>

<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Un moderador no puede insultar, maltratar, trollear, ni burlarse de los dem&aacute;s. Si nosotros lo hacemos, lo estamos permitiendo.</li>
<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;No se puede quitar la suspenci&oacute;n a usuarios suspendidos por otro moderador, salvo que se haya cumplido el tiempo de suspenci&oacute;n.</li>
<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/sticky.gif" align="absmiddle" vspace="2">&nbsp;&nbsp;Un moderador no puede pasar capturas de pantalla de la administraci&oacute;n a otras personas o amigos.</li></strong></font>
</div>
</div>

<div style="clear:both"></div>

<!-- fin cuerpocontainer -->

<?php
}
?>
<?php
pie();
?>