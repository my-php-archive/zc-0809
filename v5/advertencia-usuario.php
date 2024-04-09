<?php
include("header.php");
$coso = $_SESSION['id'];

cabecera_normal();

$sql = "select * from usuarios where id = '{$id}'";
$rs = mysql_query($sql);
$row = mysql_fetch_array($rs);

$nick	 = $row['nick'];

 $id = no_i($_GET['id']);
if($row['nick']==$coso){
  echo'No puedes hacerte una advertencia';
}
else
{





?>
 <div id="cuerpocontainer">

		<form action="/denuncia-usuario.php" method="post">
			<b>Advertir usuario!</b>
			<br />

			<?php echo $id; ?> 		<br />
			<br />

			<b>Raz&oacute;n de la advertencia:</b>


			<br />


			<br />
			<textarea name="cuerpo" cols="40" rows="5" wrap="hard" tabindex="<?php echo $contar++; ?>"></textarea>
			<br />
			<span class="size9">No seas agresivo. Tendremos un log de todas las advertencias a&ntilde;iadidas</span>
			<br />
			<br />
			<input type="hidden" name="id_post" value="<?php echo $id; ?>">
			<input type="submit" class="mBtn btnOk" style="font-size:11px" value="Enviar denuncia" title="Enviar denuncia">

			<br />
			<br />
		</form>
	 </div>     <div style="clear:both"></div> 
<?php
pie();
 }
?>