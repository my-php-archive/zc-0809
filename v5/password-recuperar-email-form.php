<?php
include('header.php');
$titulo = $descripcion;
cabecera_normal();

if($_SESSION['user']==null){

$id = xss(no_i($_GET['id']));
$key = xss(no_i($_GET['key']));

if(empty($key) or empty($id)){
fatal_error('Clave de seguridad no v&aacute;lida');}

$rs = mysql_query("SELECT id,id_extreme,password FROM usuarios WHERE id='$id' AND id_extreme='$key'");

if(!mysql_num_rows($rs)){
fatal_error('Clave de seguridad no v&aacute;lida');}
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
			<div id="form_div">
		<div class="container940">
			<div class="box_title">
				<div class="box_txt recuperar_pass">Recuperar mi password</div>
				<div class="box_rrs">
					<div class="box_rss"></div> 
				</div>
			</div>
			<div class="box_cuerpo">
				<center>
				<br />
				<b class="size13">Ingresa tu nueva contrase&ntilde;a</b>
				<br />
				<br />
				<form name="pass" method="post" action="/password-recuperar-email.php">
					<input type="hidden" name="key" value="<?=$key?>">
					<input type="hidden" name="id" value="<?=$id?>">
					<table width="500" border="0" cellpadding="2" cellspacing="4">
						<tr>
							<td width="30%" align="right"><strong>Password:</strong></td>
							<td ><input type="password" size="25" name="password1"></td>
						</tr>
						<tr>
							<td width="30%" align="right"><strong>Confirmar password:</strong></td>
							<td ><input type="password" size="25" name="password2"></td>
						</tr>
					</table>
					<br />
					<input type="submit" value="Aceptar" name="send_pass"/>
				</form>
				<br />
				<br />
				</b>
				</div>
			</div>
		</div>
<?php
}else{
fatal_error('No existe raz&oacute;n alguna por la cual debas estar aqu&iacute;');}
pie();
?>