<?php
include("header.php");
$coso = $_SESSION['id'];
$sql = "select * from usuarios where id = '{$id}'";
$rs = mysql_query($sql);
$row = mysql_fetch_array($rs);

$nick	 = $row['nick'];

 $id = no_i($_GET['id']);
if($row['nick']==$coso){
  echo'No puedes denunciarte a ti mismo';
}
else
{





?>

		<form action="/denuncia-usuario.php" method="post">
			<b>Denunciar usuario:</b>
			<br />

			<?php echo $id; ?>		<br />
			<br />

			<b>Raz&oacute;n de la denuncia:</b>

			<br />
			<select name="razon" style="color:black; background-color: #FAFAFA; font-size:12px">
                <option value="No cumple con el protocolo">No cumple con el protocolo</option>
				<option value="Hace Spam">Hace Spam</option>
				<option value="Hace spam por mps">Hace spam por mps</option>
				<option value="Hace spam en comunidades">Hace spam en comunidades</option>
				<option value="Hace Crap">Hace Crap</option>
				<option value="Hace Repost">Hace Repost</option>
                <option value="Insulta">Insulta</option>
				<option value="Tiene un avatar inapropiado">Tiene un avatar inapropiado</option>
                <option value="Otra razon">Otra razon</option>
            </select>
			<br />
			<br />
			<b>Aclaraci&oacute;n</b>

			<br />
			<textarea name="cuerpo" cols="40" rows="5" wrap="hard" tabindex="<?php echo $contar++; ?>"></textarea>
			<br />
			<span class="size9">Gracias por colaborar con el sistema denuncias de usuarios</span>
			<br />
			<br />
			<input type="hidden" name="id_post" value="<?php echo $id; ?>">
			<input type="submit" class="mBtn btnOk" style="font-size:11px" value="Enviar denuncia" title="Enviar denuncia">

			<br />
			<br />
		</form>
	
<?php
 }
?>