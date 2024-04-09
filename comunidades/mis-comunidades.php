<?php
include("../header.php");
error_reporting(0);
$titulo	= $descripcion;
$orden = xss(no_i($_GET['orden']));

cabecera_normal();
$key=$_SESSION['id'];

if($key==null){
fatal_error('<b>Tienes que estar logueado</b>. Logueate!','Volver','history.go(-1)');
}

switch($orden){
case "nombre":
$sort_by = "co.nombre ASC";
break;
case "rango":
$sort_by = "cm.rangoco DESC";
break;
case "miembros":
$sort_by = "co.numm DESC";
break;
case "temas":
$sort_by = "co.numte DESC";
break;
default:
$sort_by = "cm.rangoco DESC";
}
$_pagi_sql = "SELECT co.*,ca.*,cm.* FROM c_comunidades co LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria LEFT JOIN c_miembros cm ON cm.idcomunity=co.idco WHERE cm.iduser='{$key}' AND eliminado = '0' ORDER BY ".$sort_by." ";
$_pagi_cuantos = 10;
include("../includes/paginator.inc.php");

echo'<div id="cuerpocontainer">
<div class="comunidades">
<div class="breadcrump">
<ul>
<li class="first"><a href="/comunidades/" title="Comunidades">Comunidades</a></li><li>Mis comunidades</li><li class="last"></li>
</ul>

</div>
	<div style="clear:both"></div>
	<div id="resultados" class="resultadosFull">

<div class="filterBy filterFull">
	<div class="floatL xResults">
		Mostrando <strong>'.$_pagi_desde.' - '.$_pagi_hasta.'</strong> resultados de <strong>'.$_pagi_totalReg.'</strong>

	</div>
	<ul class="floatR">
		<li class="orderTxt">Ordenar por:</li>
		<li';if($orden=='nombre'){echo' class="here"';}echo'><a href="/comunidades/mis-comunidades/nombre/">Nombre</a></li>
		<li';if($orden=='rango' or $orden==''){echo' class="here"';}echo'><a href="/comunidades/mis-comunidades/rango/">Rango</a></li>
		<li';if($orden=='miembros'){echo' class="here"';}echo'><a href="/comunidades/mis-comunidades/miembros/">Miembros</a></li>
		<li';if($orden=='temas'){echo' class="here"';}echo'><a href="/comunidades/mis-comunidades/temas/">Temas</a></li>

	</ul>
	<div class="clearBoth"></div>
</div> <!-- FILTER BY -->

<div id="showResult" class="resultFull">
	<ul>';
while($row = mysql_fetch_array($_pagi_result))
{
	echo'<li class="resultBox'.($row['oficial']=='1' ? ' oficial' : '').'">
			<h4><a href="/comunidades/'.$row['shortname'].'/">'.$row['nombre'].'</a></h4>
			<div class="floatL avatarBox">

				<a href="/comunidades/'.$row['shortname'].'/"><img src="'.$row['imagen'].'" alt="'.$row['shortname'].'" width="75" height="75" onerror="com.error_logo(this)" />'.($row['oficial']=='1' ? '<img src="'.$images.'/riboon.png" class="riboon" />' : '').'</a>
			</div>
			<div class="floatL infoBox">
				<ul>
					<li>Categor&iacute;a: <strong>'.$row['nom_categoria'].'</strong></li>
					<li title="'.$row['descripcion'].'">'.cortar($row['descripcion'],70).'</li>
					<li>Miembros: <strong>'.$row['numm'].'</strong> - Temas: <strong>'.$row['numte'].'</strong></li>
					<li>Mi rango: <strong>'.rangocomunidad($row['rangoco']).'</strong></li>
				</ul>
			</div>
		</li>';
}
echo'
	</ul>
	<div class="clearBoth"></div>

<!-- Paginado -->
<div class="paginadorCom" style="float:left;width:685px">
<div class="before floatL" style="display:block;margin: 5px 0;width: 270px; width: 110px">
'.$_pagi_navegacion.'
</div>
</div></div>
<!-- FIN - Paginado -->
</div>';
pie();
?>