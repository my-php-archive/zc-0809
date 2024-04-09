<?php
include("header.php");
$id = xss(no_i($_GET['id']));
$user = $_SESSION['user'];


if($_SESSION['user']!=null)
{
$sql = "SELECT p.id, p.titulo, p.id_autor, p.categoria, c.id_categoria, c.link_categoria, c.nom_categoria, u.nick, u.id FROM (posts as p, categorias as c, usuarios as u) WHERE p.id='$id' AND p.categoria=c.id_categoria AND u.id=p.id_autor";
$rs = mysql_query($sql);
$row = mysql_fetch_array($rs);
$dtitulo =$row['titulo'];
$nick	 =$row['nick'];
$contar++;
?>

		<form action="/denuncia.php" method="post">
			<b>Denunciar el post:</b>
			<br />

			<?php echo $id; ?> / <?php echo $dtitulo; ?>			<br />
			<br />
			<b>Creado por:</b>
			<br />
			<?php echo $nick; ?>			<br />			
			<br />
			<b>Raz&oacute;n de la denuncia:</b>

			<br />
			<select name="razon" style="color:black; background-color: #FAFAFA; font-size:12px">
				<option value="10">Re-post</option>
				<option value="11">Se hace Spam</option>
				<option value="12">Tiene links muertos</option>
				<option value="13">Es Racista o irrespetuoso</option>
				<option value="14">Contiene informaci&oacute;n personal</option>
				<option value="15">El T&iacute;tulo esta en may&uacute;scula</option>
				<option value="16">Contiene Pedofilia</option>
				<option value="17">Es Gore o asqueroso</option>
				<option value="18">Est&aacute; mal la fuente</option>
				<option value="19">Post demasiado pobre / Crap</option>
				<option value="20"><?php echo $comunidad; ?> no es un foro</option>
				<option value="21">No cumple con el protocolo</option>
				<option value="22">Otra raz&oacute;n (especificar)</option>
			</select>
			<br />
			<br />
			<b>Aclaraci&oacute;n y comentarios:</b>

			<br />
			<textarea name="cuerpo" cols="40" rows="5" wrap="hard" tabindex="<?php echo $contar++; ?>"></textarea>
			<br />
			<span class="size9">En el caso de ser Re-post se debe indicar el link del post original.</span>
			<br />
			<br />
			<input type="hidden" name="id_post" value="<?php echo $id; ?>">
			<input type="submit" class="mBtn btnOk" style="font-size:11px" value="Enviar denuncia" title="Enviar denuncia">

			<br />
			<br />
		</form>
	
<?php
}
else
{
$titulo_error	=	"CHAN!!";
$mensaje_error	=	"No pod&eacute;s hacer una denuncia si no est&aacute;s autentificado";
$boton_error	=	"Ir a p&aacute;gina principal";
$url_error		=	"";
error();
}

?>