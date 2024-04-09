<?php
include("header.php");
$titulo	=	"Registrate en Zincomienzo!";  
cabecera_normal();
?>
<!-- Inicio cuerpocontainer -->

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
					<input type="text" name="firstname" maxlength="30" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />
					<div class="helper" style="display:none"><span></span>Ingresa tu nombre</div>
				</div>

				
				<div class="clearfix form-item">
					<label>Apellido</label>
					<input type="text" name="lastname" maxlength="30" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />
					<div class="helper" style="display:none"><span></span>Ingresa tu apellido</div>
				</div>
				
				<div class="clearfix form-item">
					<label>Nombre de usuario</label>

					<input type="text" name="username" maxlength="16" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />
					<div class="helper" style="display:none"><span></span>Ingresa tu nombre de usuario</div>
					<div class="suggestUsername"><i>Sugerencias: </i> <span id="suggestUsername"></span></div>
				</div>
				
				<div class="clearfix form-item">
					<label>Contraseña</label>
					<input type="password" name="password" maxlength="20" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />

					<div class="helper" style="display:none"><span></span>Ingresa tu contraseña</div>
				</div>
	 
				<div class="clearfix form-item">
					<label>Email</label>
					<input type="text" name="email" class="ui-corner-all form-input-text box-shadow-soft" autocomplete="off" />
					<div class="helper" style="display:none"><span></span>Ingresa tu email</div>
				</div>

			
				<div class="clearfix form-item">
					<label>Fecha de nacimiento</label>
					<div class="floatL">
						<select name="day" autocomplete="off">
							<option value="">Día</option>
							<script type="text/javascript">
								for(i=1;i<32;i++) document.write('<option value="'+i+'">'+i+'</option>\n');
							</script>
						</select>

						<select name="month" autocomplete="off">
							<option value="">Mes</option>
							<script type="text/javascript">
								$.each( registro.months, function(i,val){ document.write('<option value="'+(i+1)+'">'+val+'</option>\n') });
							</script>
						</select>
						<select name="year" autocomplete="off">
							<option value="">Año</option>
							<script type="text/javascript">
								for(d=new Date(),i=d.getFullYear();i!=1910;i--) document.write('<option value="'+i+'">'+i+'</option>\n');
							</script> 
						</select>

						<i>¿Por qué debo ingresar mi fecha de nacimiento?</i>
					</div>
					<div class="helper" id="date_msg" style="display:none">Ingresa tu fecha de nacimiento</div>
				</div>
				
				<div class="form-footer">				
					<a id="next" class="fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" role="button">
						<span class="ui-button-text">Siguiente</span>
					</a>	
				</div>

			</div>

			<div id="step2" style="display:none">
				<div class="clearfix register-header" style="margin-bottom:30px">
					<h1><span>Paso 2.</span> Completa el campo de verificación</h1>
					<p>Ingresa el texto que ves debajo tal cual aparece ( incluyendo espacios y mayúsculas)</p>
				</div>

				<div class="clearfix form-item" id="recaptcha_ajax">
					<label>Código</label>
					<div class="floatL">
						<div id="recaptcha_image"></div>
						<input class="ui-corner-all form-input-text box-shadow-soft" type="text" id="recaptcha_response_field" name="recaptcha_response_field" autocomplete="off" style="margin-left: " />
					</div>
					<div id="captcha_msg" class="helper" style="display:none"><span></span>Código de la imagen</div>

				</div>

				<div class="clearfix form-item">
					<input name="suscribe" value="1" checked="checked" type="checkbox" autocomplete="off" />
					<i>Recibir Emails de noticias de Taringa!</i>
				</div>

				<div class="clearfix form-item">
					<i>Haciendo clic en "Registrarse", estás confirmando haber leído, entendido y estar de acuerdo con los <a href="/terminos-y-condiciones/">Terminos de Uso</a> y la <a href="/privacidad-de-datos/">Política de Privacidad</a></i>

				</div>

				<div class="form-footer" style="margin-top:30px">				
					<a id="back" class="fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" role="button">
						<span class="ui-button-text">Atras</span>
					</a>				
					<a id="submit" class="fg-button ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only ui-button-positive" role="button">
						<span class="ui-button-text">Registrarse</span>
					</a>

				</div>
			</div>
			<script type="text/javascript">
				$.getScript("http://api.recaptcha.net/js/recaptcha_ajax.js", function(){
					Recaptcha.create('6Le8jQQAAAAAAGt1bzJsaHKCoLMWt6NFHupdtxf9', 'recaptcha_ajax', {
						theme:'custom', lang:'es', tabindex:'13', custom_theme_widget: 'recaptcha_ajax'
					});
				});
			</script>
		</form>
	</div>
</div>

<div>
	¿Ya tenés cuenta?
	
	<a href="" onclick="open_login_box('open'); return false">Identificarme</a>

</div>		</div>

<!-- fin cuerpocontainer -->


<?php
pie();
?>