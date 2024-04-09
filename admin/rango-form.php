<?php
include("../header.php");
?>
<div id="rango" class="form-container">
	<div id="error_data" class="warningData" style="display:none"></div>
	<div class="data">
		<label>Usuario<span class="color_red">*</span></label>
		<input class="c_input" id="nick" />
		<div class="desform">Ejemplo: Ususario: <b><?=$nick?></b></div>
	</div>
	<div class="data">
		<label>Elige Un Rango:<span class="color_red">*</span></label>
<select id="rango_data" >
<?php
$sqlq = mysql_query("select * from rangos order by id_rango asc");
while($rank = mysql_fetch_assoc($sqlq))
{
echo'<option value="'.$rank['id_rango'].'">'.$rank['nom_rango'].'</option>';
}
?>

</select>


	</div>
	<div class="data">
<table class='linksList'>


<?php
include($_SERVER['DOCUMENT_ROOT']."/includes/configuracion.php");

$saml = "SELECT nick FROM usuarios WHERE id='$id'";
$roc = mysql_query($saml, $con);

while($row = mysql_fetch_array($roc)){
$nick = $sqlnick['nick'];

?>

<?php
}
mysql_close();
?>



<?=$nick?>


<?php
include($_SERVER['DOCUMENT_ROOT']."/includes/configuracion.php");

$saml = "SELECT * FROM rangos ORDER BY id_rango DESC";
$roc = mysql_query($saml, $con);

while($row = mysql_fetch_array($roc)){
$img_rng = $row['img_rango'];
$nom_rng = $row['nom_rango'];
$id_rng = $row['id_rango'];
?>

<?php
}
mysql_close();
?></table></div>
<span style="float:left"><span class="color_red">*</span>Obligatorio</span></div>