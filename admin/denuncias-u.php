<?php
include("../header.php");

$id	=	$_SESSION['id'];
 cabecera_normal();

 $titulo	=	$descripcion;
$sql = "SELECT nick, rango FROM usuarios where id='".$id."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755"){



include("menu.php");
?>
	<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Lista de Denuncias</h3>
		</div>
	<div class="boxy-content">

		<table class="linksList">
		<thead>
			<tr>
			    <th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th>7</th>
				<th>8</th>
			</tr>
		</thead>
	<tbody>
		<tbody>

	<tr id="div_1">
	    <td>1</td>
		<td>2</td>
		<td>3</td>
		<td>4</td>
		<td>5</td>
		<td>6</td>
		<td>7</td>
		<td>8</td>
	</tr>
	</div></div>
	<br clear="left" />
<?php
}
else{
fatal_error('Tu no deberias estar aqui :|');}
echo'</div></div>';
pie();
?>