<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
?><div id="cuerpocontainer">

<!-- inicio cuerpocontainer -->
<script>
function validate_data(){	
	var f=document.forms.Fdenuncia;
	var fit='nombre,email,comentarios'.split(',');
	for(var i=0; i<fit.length; i++){
		if(f[fit[i]].value==''){
			alert('El campo ' + fit[i] + ' es obligatorio.');
			f[fit[i]].focus();
			return false;
		}
	}
	if($('#recaptcha_response_field').val()==''){
		alert('El campo captcha es obligatorio.');
		$('#recaptcha_response_field').focus();
		return false;
	}
}
</script>


<style type="text/css">

	h1 {
		color: #555;
		margin: 0 0 20px 0;
                font-size:15px;
	}

	label {
		font-size: 20px;
		color: #666;
	}

	form {
		float: left;
		border: 1px solid #ddd;
		padding: 30px 40px 20px 40px;
		margin: 10px 0 0 0;
		width: 715px;
		background: #fff;

		/* -- CSS3 - define rounded corners for the form -- */
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;

		/* -- CSS3 - create a background graident -- */
		background: -webkit-gradient(linear, 0% 0%, 0% 40%, from(#EEE), to(#FFFFFF));
		background: -moz-linear-gradient(0% 40% 90deg,#FFF, #EEE);

		/* -- CSS3 - add a drop shadow -- */
		-webkit-box-shadow:0px 0 50px #ccc;
		-moz-box-shadow:0px 0 50px #ccc;
		box-shadow:0px 0 50px #ccc;
	}

	fieldset { border: none; }

	#user-details {
		float: left;
		width: 230px;
	}

	#user-message {
		float: right;
		width: 405px;
	}

	input, textarea {
		padding: 8px;
		margin: 4px 0 20px 0;
		background: #fff;
		width: 220px;
		font-size: 14px;
		color: #555;
		border: 1px #ddd solid;
		-webkit-box-shadow: 0px 0px 4px #aaa;
		-moz-box-shadow: 0px 0px 4px #aaa;
		box-shadow: 0px 0px 4px #aaa;
		-webkit-transition: background 0.3s linear;
	}

	textarea {
		width: 390px;
		height: 175px;
	}

	input:hover, textarea:hover {
		background: #eee;
	}

	input.submit {
		width: 150px;
		color: #eee;
		text-transform: uppercase;
		margin-top: 10px;
		background-color: #18a5cc;
		border: none;
		-webkit-transition: -webkit-box-shadow 0.3s linear;
		-moz-border-radius: 4px;
		-webkit-border-radius: 4px;
		border-radius: 4px;
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#18a5cc), to(#0a85a8));
		background: -moz-linear-gradient(25% 75% 90deg,#0a85a8, #18a5cc);
	}

	input.submit:hover {
		-webkit-box-shadow: 0px 0px 20px #555;
		-moz-box-shadow: 0px 0px 20px #aaa;
		box-shadow: 0px 0px 20px #555;
		cursor:  pointer;
	}
	</style> 

<div class="container600" style="margin: 10px 70px;">


	<form onsubmit="return validate_data();" name="Fdenuncia" action="/contacto.php" method="post" style="text-align:center;">
		<h1>P&oacute;ngase en contacto con nosotros ...</h1>

		<fieldset id="user-details">

			<label for="name">Nombre:</label>
			<input type="text" name="nombre" value="" />
			
                        <label for="email">Correo Electr&oacute;nico:</label>
			<input type="text" name="email" value=""  />
                        
                        <label for="email">Empresa:</label>
			<input type="text" name="empresa" value=""  />
			
                        <label for="phone">Tel&eacute;fono:</label>
			<input type="text" name="telefono" value=""  />
                        
                        <label for="phone">Horarios de contacto:</label>
			<input type="text" name="horario" value=""  />
			
                        <label for="website">Sitio Web:</label>
			<input type="url" name="sitio" value=""  />
               

<input type="submit" class="submit" value="Enviar" title="Enviar"/>
		
</fieldset>

		<fieldset id="user-message">

			<label for="message2">Su Mensaje:</label>

			<textarea name="comentarios" rows="0" cols="0"></textarea>

		</fieldset>

		
			

			
		</form>
</div><div style="clear:both"></div>

<!-- fin cuerpocontainer -->


<?php
pie();
?>
