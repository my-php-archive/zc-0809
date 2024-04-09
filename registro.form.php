<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
$error=$_GET['error'];
$r=1;
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script type="text/javascript">
function validate_data(){

	var f=document.forms.reg;

	//terminos
	if(!f.terminos.checked){
		alert('La aceptaci\u00f3n de los t\u00e9rminos es necesaria para obtener una cuenta de <?=$comunidad?>.');
		return false;
	}

	//Chequeo por empty
	var fit='nombre,nick,password1,password2,mail1,mail2,ciudad,dia,mes,ano'.split(',');
	var fittr='Nombre,Nick,Password1,Password2,Email,Email2,Ciudad,Dia,Mes,A\u00d1o,C\u00f3digo'.split(',');
	for(var i=0; i<fit.length; i++){
		if(f[fit[i]].value==''){
			alert('El campo ' + fittr[i] + ' es obligatorio..');
			f[fit[i]].focus();
			return false;
		}
	}
	if($('#recaptcha_response_field').val()==''){
		alert('El campo captcha es obligatorio.');
		$('#recaptcha_response_field').focus();
		return false;
	}

	//Chequeo passwords
	if(f.password1.value != f.password2.value){
		alert('Las claves no son iguales. Por favor, completar nuevamente.');
		f.password1.value = f.password2.value = '';
		f.password1.focus();
		return false;
	}
	

	if(f.password1.value.length < 6){
		alert('La clave debe tener al menos 6 caracteres.');
		f.password1.value = f.password2.value = '';
		f.password1.focus();
		return false;
	}

	//Chequeo mail
	if(f.mail1.value != f.mail2.value){
		alert('Los mail no son iguales. Por favor, completar nuevamente.');
		f.mail1.value = f.mail2.value = '';
		f.mail1.focus();
		return false;
	}
	
	//Chequeo la edad
	var y=((new Date()).getYear()<200? (new Date()).getYear()+1900 : (new Date()).getYear());
	if(parseInt(f.ano.value)+18>y){
		alert('Disculpas. <?=$comunidad?> es un sitio para mayores de edad..');
		return false;
	}

	//Pais
	if(f.pais.options[f.pais.options.selectedIndex].value==-1){
		alert('Por favor, elegir un pa\u00EDs..');
		return false;
	}

	//Sexo
	if(!f.sexo[0].checked && !f.sexo[1].checked){
		alert('Especificar el g\u00E9nero sexual.');
		return false;
	}

} /* validate_data() */

</script>
			<div id="form_div">
				<div class="container350" style="width:350px;float:left;">
					<div class="box_title" >
						<div class="box_txt registro_aclaracion" style="width:342px;height:18px;text-align:center;font-size:12px">Aclaraci&oacute;n sobre el registro</div>
						<div class="box_rrs">
							<div class="box_rss"></div>
						</div>

					</div>
					<div class="box_cuerpo">
						El registro de usuarios de <?php echo $comunidad; ?> es limitado. Al registrarte tendr&aacute;s acceso a la totalidad de los posts. Podr&aacute;s tambi&eacute;n crear tus propios posts, los cuales ser&aacute;n publicados en un espacio para nuevos usuarios.<br /><br />Para ser un usuario con los privilegios totales (FULL USER), deber&aacute;s conseguir que alguno de tus posts sume <b>50 puntos</b>.<br /><br />IMPORTANTE: La cuenta de e-mail ser&aacute; verificada, por favor asegurate que sea correcta.					</div>

					<br />
				</div>
				<div id="post_agregar" style="width:574px;height:850px;">
					<div class="box_title" style="width:574px;">
						<div class="box_txt registro" style="width:566px;height:18px;text-align:center;font-size:12px">Registro en <?php echo $comunidad;?></div>
						<div class="box_rrs"><div class="box_rss"></div>
					</div>
						
					<div class="box_cuerpo registrarse" style='width:558px;float:left;'>

						<form name="reg" method="post" action="registro.php" onsubmit="return validate_data();">
							<table width="558"  cellpadding="4">
							<tr>
								<td width="25%" align="right" valign="top"><b>Nombre y Apellido:</b></td>
								<td width="75%"><input type="text" size="30" maxlength="32" name="nombre" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['nombre'])) echo $_GET['nombre']; ?>" /></td>
							</tr>
							<tr>
								<td width="25%"  align="right" valign="top"><b>Nick:</b></td>

								<td width="75%"><input type="text" size="30" maxlength="35" name="nick" id="verificacion" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['nick'])) echo $_GET['nick']; ?>" /></td>
							</tr>
							<tr>
								<td align="right" valign="top"><b>Password:</b></td>
								<td><input type="password" size="30" maxlength="32" name="password1" tabindex="<?php echo $r++; ?>" /></td>
							</tr>
							<tr>
								<td align="right" valign="top"><b>Confirmar password:</b></td>

								<td><input type="password" size="30" maxlength="32" name="password2" tabindex="<?php echo $r++; ?>" /></td>
							</tr>
							<tr>
								<td align="right" valign="top"><b>E-mail:</b></td>
								<td><input type="text" size="30" maxlength="35" name="mail1" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['mail1'])) echo $_GET['mail1']; ?>"/></td>
							</tr>
							<tr>
								<td align="right" valign="top"><b>Confirmar E-mail:</b></td>
								<td><input type="text" size="30" maxlength="35" name="mail2" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['mail1'])) echo $_GET['mail1']; ?>"/></td>
							</tr>
							<tr>
								<td align="right" valign="top"><b>Avatar</b> (URL):</td>

								<td><input type="text" size="30" maxlength="255" name="avatar" value="<?php if (isset($_GET['avatar'])) echo $_GET['avatar']; else echo $url . "/images/avatar.gif"; ?>" tabindex="<?php echo $r++; ?>" /></td>
							</tr>
							<tr>
								<td align="right" valign="top"><b>Pa&iacute;s:</b></td>
								<td>
										<select id="pais" name="pais" tabindex="<?php echo $r++; ?>">
						<option value="-1">Seleccionar Pa&iacute;s</option>

<?php
$paises	=	mysql_query("SELECT p.id, p.nombrepais
						FROM (paises AS p)");
while($pss	=	mysql_fetch_array($paises))
{
?>
						<option value="<?=$pss['id']?>" <?if ($_GET['pais']==$pss['id']) echo"selected='true'"?>><?=$pss['nombrepais']?></option>
<?
}
?>

										</select>
								</td>
							</tr>
							<tr>
								<td align="right" valign="top">

										<b>Ciudad:</b>
								</td>
								<td>
									<input type="text" size="30" maxlength="32" name="ciudad" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['ciudad'])) echo $_GET['ciudad']; ?>" />
								</td>
							</tr>
							<tr>
								<td align="right" valign="top">

										<b>Sexo:</b>
								</td>
								<td>
									<input name="sexo" type="radio" value="m" tabindex="<?php echo $r++; ?>" <?if ($_GET['sexo']=="m") echo"checked"?> /> Masculino									&nbsp;
									<input name="sexo" type="radio" value="f" tabindex="<?php echo $r++; ?>" <?if ($_GET['sexo']=="f") echo"checked"?> /> Femenino								</td>
							</tr>

							<tr>
								<td align="right" valign="top">
										<b>Fecha de Nacimiento</b><br />(d&iacute;a/mes/a&ntilde;o):</b>
								</td>
								<td>
									<input type="text" size="2" maxlength=2 name="dia" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['dia'])) echo $_GET['dia']; ?>" />&nbsp;
									<input type="text" size="2" maxlength=2 name="mes" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['mes'])) echo $_GET['mes']; ?>" />&nbsp;

									<input type="text" size="4" maxlength=4 name="ano" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['ano'])) echo $_GET['ano']; ?>" />
								</td>
							</tr>
							<tr>
								<td align="right" valign="top">
										<b>Sitio Web / Blog:</b>
								</td>
								<td>

									<input type="text" size="30" maxlength="60" name="sitio_web" value="<?php if (isset($_GET['avatar'])) echo $_GET['avatar']; else echo "http://"; ?>" tabindex="<?php echo $r++; ?>" />
								</td>
							</tr>
							<tr>
								<td align="right" valign="top">
										<b>Mensajero:</b> <br /> (msn, gtalk)
								</td>
								<td>

									<input type="text" size="30" maxlength="64" name="mensajero" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['mensajero'])) echo $_GET['mensajero']; ?>" />
								</td>
							</tr>
							<tr>
								<td align="right" valign="top">
										<b>Mensaje Personal:</b>
								</td>
								<td>

									<input type="text" name="mensaje" size="30" maxlength="64" tabindex="<?php echo $r++; ?>" value="<?php if (isset($_GET['mensaje'])) echo $_GET['mensaje']; ?>" />
								</td>
							</tr>
							<tr>
								<td align="right" valign="top"><b>C&oacute;digo de la im&aacute;gen</b>:</td>
								<td><?php
require_once("recaptcha/recaptchalib.php");
require_once("includes/configuracion.php");
$publickey = $public_key;
echo recaptcha_get_html($publickey);
?></td>
							</tr>
							<tr>
								<td>
								</td>
								<td>	
									<input type="checkbox" name="terminos" value="checkbox" tabindex="<?php echo $r++; ?>" />Acepto los <a href="/terminos-y-condiciones/" target="_blank">T&eacute;rminos de uso</a> y la <a href="/privacidad-de-datos/" target="_blank"> p&oacute;litica de privacidad de datos</a>

								</td>
							</tr>
							<tr>
								<td>
								</td>
								<td>	
									<input type="checkbox" name="enviar_publicidad" CHECKED value="checkbox" tabindex="<?php echo $r++; ?>" /> Deseo que me env&iacute;en informaci&oacute;n por correo.
								</td>

							</tr>
							<tr>
							<td></td>
							<td style="color:red;">* Todos los campos son obligatorios</td>
						</tr>
						</table>
            <hr />
						<br class="space" />

						<center>
              <input type="submit" class="button" name="botonregistrar" style="font-size:15px" value="   Registrarme   " title="Registrarme" tabindex="20" />
						</center>
						</form>
					</div>
					</div>
					<br class="space" />
				</div>
					<br class="space" />

			</div>
<?
pie();
?>
<?
switch ($error){
case "1":
echo '<script>alert("Usuario Existente");</script>';
break;
case "2":
echo '<script>alert("Mail ya existente en nuestra base de datos");</script>';
break;
case "3":
echo '<script>alert("El nick debe tener por lo menos 3 caracteres");</script>';
break;
case "4":
echo '<script>alert("Existen campos vacíos o los campos de contrase\u00n9a y/o mail no son iguales");</script>';
break;
case "5":
echo '<script>alert("Codigo Incorrecto");</script>';
break;
}
?>		