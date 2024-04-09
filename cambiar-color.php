<?php
include("header.php");
$key = $_SESSION['id'];
$id = $_SESSION['id'];
$titulo = "Cambiar Color!";
cabecera_normal();

if($key==null){
fatal_error('Para editar tu tema debes autentificarte');
}

$sqltheme = mysql_fetch_array(mysql_query("SELECT theme FROM usuarios WHERE id='$id'"));
$theme = $sqltheme['theme'];

function coloresc($valor)
{
$valor	=	str_replace("rojo", "Rojo", $valor);
$valor	=	str_replace("verde", "Verde", $valor);
$valor	=	str_replace("negro", "Negro", $valor);
$valor	=	str_replace("azul", "Azul", $valor);
$valor	=	str_replace("gris", "Gris", $valor);
$valor	=	str_replace("Azulc", "ColorFull", $valor);
$valor	=	str_replace("Azulm", "Azul Modern", $valor);
$valor	=	str_replace("azul", "Azul", $valor);

return $valor;
}


?>
<div id="cuerpocontainer">



<div class="tabbed-d">
	<ul class="menu-tab">
		<li class="active"><a onclick="cuenta.chgtab(this)">Color</a></li>

	</ul>
	<a name="alert-cuenta"></a>
	<form name="editarcuenta" class="horizontal" action="" method="post">

		<div class="content-tabs cuenta">

			<div class="alert-cuenta cuenta-1">
			</div>
			<fieldset>
			

<iframe src="/theme.php" frameborder="0" width="300" height="75" scrolling="no"></iframe>

</div>

<div class="floatR">
<div class="sidebar-tabs">
<h3>Tu Color Actual</h3>

<div class="avatar-big-cont">

<div class="avatar-loading" style="display: none"></div>
<img class="avatar-big" src="/images/<?=$theme?>.png" alt="" width="120" height="120" />

</div>
		
<a class="edit"><?=coloresc($theme)?></a>

</div>

<div class="clearfix"></div>


</div></div><div class"clearBoth"></div>

<?php
pie();
?>