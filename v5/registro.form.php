<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
$error=$_GET['error'];
$r=1;
?>

			
<form name="reg" method="post" action="registro.php">



<script src="http://o1.t26.net/js/registro.js?1.2" type="text/javascript"></script>
<div id="main-col">

	<div id="full-col">		
		<form name="register" class="register">
			<div id="step1">
			
				<div class="clearfix register-header" style="margin-bottom:30px">
					<h1><span>Paso 1.</span> Contanos sobre vos</h1>

					<p>Por favor completa el formulario con tus datos</p>
				</div>

				
				<div class="clearfix form-item">
					<label>Nombre</label>
					<input type="text" name="nombre" maxlength="30" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />
					<div class="helper" style="display:none"><span></span>Ingresa tu nombre</div>
				</div>



<div class="clearfix form-item">
					<label>Apellido</label>

					<input type="text" name="apellido" maxlength="30" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />
					<div class="helper" style="display:none"><span></span>Ingresa tu apellido</div>
				</div>




<div class="clearfix form-item">
					<label>Nombre de usuario</label>

					<input type="text" name="nick" maxlength="16" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />
					<div class="helper" style="display:none"><span></span>Ingresa tu nombre de usuario</div>

					<div class="suggestUsername"><i>Sugerencias: </i> <span id="suggestUsername"></span></div>
				</div>




<div class="clearfix form-item">
					<label>Contrase&ntilde;a</label>
					<input type="password" name="password" maxlength="20" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />

					<div class="helper" style="display:none"><span></span>Ingresa tu contrase&ntilde;a</div>

				</div>




<div class="clearfix form-item">
					<label>Email</label>
					<input type="text" name="mail" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />
					<div class="helper" style="display:none"><span></span>Ingresa tu email</div>
				</div>




				<div class="form-footer" style="margin-top:30px">				
					<a id="back" class="fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" role="button">
						<span class="ui-button-text">Atras</span>
					</a>				
					<input type="submit" class="button" name="botonregistrar" style="font-size:15px" value="   Registrarme   " title="Registrarme" tabindex="20" />
					</a>

				</div>
			</div>
		
		</form>
	</div>
</div>

<div>
	¿Ya tenés cuenta?
	
	<a href="" onclick="open_login_box('open'); return false">Identificarme</a>

</div>		</div>

<!-- fin cuerpocontainer -->








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
echo '<script>alert("Existen campos vacíos o los campos de contraseña y/o mail no son iguales");</script>';
break;

}
?>		