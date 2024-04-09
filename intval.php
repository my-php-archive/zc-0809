<?php
include("header.php");
cabecera_normal();
?>
<script>
//Banear Usuarios
	function banear_u(nick) {
		mydialog.procesando_inicio('Cargando...', 'Suspender Usuario');
		$.ajax({
			type: 'GET',
			url: '/admin/banear-usuario-form.php',
			data: 'nick='+nick,
			success: function(h){
				mydialog.title('Formulario de Suspenci&oacute;n');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Suspender', 'com.banear_usuario_send()', true, true, true);
				mydialog.center();
				$('#baneo #usuario').focus();
			},
			error: function(){
				mydialog.error_500("com.banear_usuario()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	}
</script>

<a href="javascript:banear_u('timbalentimba')" onclick="banear_u('timbalentimba')">BAN!</a>