<script type="text/javascript" src="http://o2.t26.net/images/js/es/registro.js?1.2"></script>
<script type="text/javascript">
function validate_data(){
	var f=document.forms.Freenviar;
	var fit='email'.split(',');
	for(var i=0; i<fit.length; i++)
		if(f[fit[i]].value==''){
			alert('El campo ' + fit[i] + ' es obligatorio.');
			f[fit[i]].focus();
			return false;
		}
	return true;
	if($('#recaptcha_response_field').val()==''){
		alert('El campo captcha es obligatorio.');
		$('#recaptcha_response_field').focus();
		return false;
	}
}


//Trae captcha
//Load recaptcha
$.getScript("http://api.recaptcha.net/js/recaptcha_ajax.js", function(){
	Recaptcha.create('6Ldl5AkAAAAAABwY5HWnITwUNLCcXAEaoO_TAJYd', 'recaptcha_ajax', {
		theme:'custom', lang:'es', tabindex:'13', custom_theme_widget: 'recaptcha_ajax',
		callback: function(){
			$('#recaptcha_response_field').blur(function(){
				registro.blur(this);
			}).focus(function(){
				registro.focus(this);
			}).attr('title', 'Ingrese el c&oacute;digo de la imagen');
		}
	});
});

</script>
	<div align="left" style="font-size:12px">
		<div align="center">
		<br />
                   No te llego el email de confirmaci&oacute;n para habilitar la cuenta ?
                   <br />
                   Ingresa el email con el que te registraste y te lo reenviaremos.
                <br />

		<br />
		<form onsubmit="return validate_data();" name="Freenviar" action="/reenviar-mail.php" method="post">
			<br />
			<div class="form-line">
                            <label for="email">E-mail:</label>
                            <input type="text" size="30" name="email" tabindex="1" id="email"/>
                            <div class="help"><span><em></em></span></div>
                        </div>

			<br />
			
			<div class="form-line">
                            <label for="recaptcha_response_field">Ingresa el c&oacute;digo de la imagen:</label>
                            <div id="recaptcha_ajax">
                                    <div id="recaptcha_image"></div>
                                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                            </div> <div class="help recaptcha"><span><em></em></span></div>

                        </div>

                        <br />
			<br />
                            <input type="submit" value="Reenviar email" title="Reenviar email" tabindex="3" tabindex="2" id="gift-send" class="mBtn btnOk">
                        <br />
			<br />
		</form>
		</div>

	</div>