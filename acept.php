<?php
include("header.php");
cabecera_normal();
?>
<script>
function acept_denuncia_beta(id,denunciante,postid){
		mydialog.procesando_inicio('Cargando...', 'Aceptar Denuncia');
		$.ajax({
			type: 'GET',
			url: '/admin/acept-denuncia-form.php',
			data: 'id='+id+'&denunciante='+denunciante+'&postid='+postid,
			success: function(h){
				mydialog.title('Aceptar Denuncia');
				mydialog.body(h, 500);
				mydialog.buttons(true, true, 'Aceptar denuncia', 'com.acept_denuncia_send()', true, true, true);
				mydialog.center();
				$('#acept-denuncia #denun').focus();
			},
			error: function(){
				mydialog.error_500("com.acept_denuncia()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	}
</script>
<a onclick="acept_denuncia_beta('sdfsf','sdf','dfs')">sdgfdsgfdfg</a>
<?php
//pie();
?>