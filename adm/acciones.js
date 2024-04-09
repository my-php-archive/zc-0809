													/* JS Panel de Administracion */

//Desbanear Usuario
function desbanear_usuario(usuariob){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/desbanear-usuario.php',
		data: 'usuario='+usuariob,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+usuariob).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("desbanear_usuario('"+usuariob+"')");
		}
	});
}

//Reactivar posts
function reactivar_post(pid){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/reactivar-p.php',
		data: 'id='+pid,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+pid).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("reactivar_post('"+pid+"')");
		}
	});
}

//Reactivar temas
function reactivar_tema(idt){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/comunidades/reactivar-t.php',
		data: 'idte='+idt,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+idt).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("reactivar_post('"+idt+"')");
		}
	});
}

//Reactivar comunidades
function reactivar_comunidad(idc){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/comunidades/reactivar-c.php',
		data: 'idco='+idc,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+idc).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("reactivar_post('"+idc+"')");
		}
	});
}

//Quitar Denuncia
function borrar_denuncia(id){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/droop-denuncia.php',
		data: 'id='+id,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+id).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("borrar_denuncia('"+id+"')");
		}
	});
}

//Quitar Denuncia Comunidad
function borrar_denuncia_comunidad(id){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/comunidades/droop-denuncia-comunidad.php',
		data: 'idc='+id,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+id).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("borrar_denuncia_comunidad('"+id+"')");
		}
	});
}

//Quitar Denuncia Publica
function borrar_denunciapub(id){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/droop-denuncia-publica.php',
		data: 'id='+id,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+id).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("borrar_denunciapub('"+id+"')");
		}
	});
}

//Quitar Anunciantes
function borrar_anunciante(id){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/droop-anuncio.php',
		data: 'id='+id,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+id).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("borrar_anunciante('"+id+"')");
		}
	});
}

//Quitar Contactantes
function borrar_contactante(id){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/droop-contacto.php',
		data: 'id='+id,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+id).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("borrar_contactante('"+id+"')");
		}
	});
}



//Quitar Contactantes
function borrar_definicion(id){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/definiciones/droop-definiciones.php',
		data: 'id='+id,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+id).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("borrar_definicion('"+id+"')");
		}
	});
}

















//Quitar sticky
function sticky_quitar(idpost){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/quitar-sticky.php',
		data: 'id='+idpost,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+idpost).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("sticky_quitar('"+idpost+"')");
		}
	});
}

//Quitar Oficial
function oficial_quitar(idco){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/admin/comunidades/oficial-delete.php',
		data: 'id='+idco,
		success: function(h){
			switch(h.charAt(0)){
				case '0':
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+idco).fadeOut('normal', function(){ $(this).remove(); });
					break;
			}
		},
		error: function(){
			mydialog.error_500("oficial_quitar('"+idco+"')");
		}
	});
}

var com = {
//Borrar Post
	borrar_postmod: function(){
		mydialog.procesando_inicio('Cargando...', 'Borrar Post');
		$.ajax({
			type: 'GET',
			url: '/admin/borrar-postmod-form.php',
			data: '',
			success: function(h){
				mydialog.title('Borrar Post');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Borrar', 'com.borrar_postmod_send()', true, true, true);
				mydialog.center();
				$('#borrar-post #idpost').focus();
			},
			error: function(){
				mydialog.error_500("com.borrar_postmod()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	},
	borrar_postmod_send: function(){
		if($('#borrar-post #idpost').val()==''){
			$('#borrar-post #error_data').html('El campo ID POST es obligatorio').slideDown('fast');
			$('#borrar-post #idpost').focus();
			return;
		}else if($('#borrar-post #razon').val()==''){
			$('#borrar-post #error_data').html('El campo Raz&oacute;n es obligatorio').slideDown('fast');
			$('#borrar-post #razon').focus();
			return;
		}

		mydialog.procesando_inicio('Enviando...', 'Borrando Post...');
		$.ajax({
			type: 'POST',
			url: '/admin/borrar-postmod.php',
			data: 'idpost='+encodeURIComponent($('#borrar-post #idpost').val())+'&razon='+encodeURIComponent($('#borrar-post #razon').val()),
			success: function(h){
				mydialog.alert('Post Borrado', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.borrar_postmod_send()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},


//Agregar Stick admin mod
	agregar_stycky: function(){
		mydialog.procesando_inicio('Cargando...', 'Agregar Sticky Mod');
		$.ajax({
			type: 'GET',
			url: '/admin/agregar-sticky-form.php',
			data: '',
			success: function(h){
				mydialog.title('Formulario Para Agregar Stycky');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Agregar Sticky', 'com.agregar_sticky()', true, true, true);
				mydialog.center();
				$('#borrar-post #idpost').focus();
			},
			error: function(){
				mydialog.error_500("com.borrar_postmod()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	},
	agregar_sticky: function(){
		if($('#borrar-post #idpost').val()==''){
			$('#borrar-post #error_data').html('El campo ID del POST es obligatorio').slideDown('fast');
			$('#borrar-post #idpost').focus();
			return;
		}else if($('#borrar-post #razon').val()==''){
			$('#borrar-post #error_data').html('El campo Termina es obligatorio').slideDown('fast');
			$('#borrar-post #termina').focus();
			return;
		}

		mydialog.procesando_inicio('Procesando el Sticky...', 'Espere...');
		$.ajax({
			type: 'POST',
			url: '/admin/agregar-sticky.php',
			data: 'idpost='+encodeURIComponent($('#sticky-agregar #idpost').val())+'&termina='+encodeURIComponent($('#sticky-agregar #termina').val()),
			success: function(h){
				mydialog.alert('Formulario de Stickys', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.agregar_sticky()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},
//Termina





//Agregar Patrocinio admin mod
	agregar_patrocinio: function(){
		mydialog.procesando_inicio('Cargando...', 'Patrocinio Mod');
		$.ajax({
			type: 'GET',
			url: '/admin/agregar-patrocinio-form.php',
			data: '',
			success: function(h){
				mydialog.title('Formulario Para Patrocinar Mod');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Agregar Patrocinio', 'com.agregar_patrocinioa()', true, true, true);
				mydialog.center();
				$('#borrar-post #idpost').focus();
			},
			error: function(){
				mydialog.error_500("com.borrar_postmod()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	},
	agregar_patrocinioa: function(){
		if($('#borrar-post #idpost').val()==''){
			$('#borrar-post #error_data').html('El campo ID del POST es obligatorio').slideDown('fast');
			$('#borrar-post #idpost').focus();
			return;
		}else if($('#borrar-post #razon').val()==''){
			$('#borrar-post #error_data').html('El campo Termina es obligatorio').slideDown('fast');
			$('#borrar-post #termina').focus();
			return;
		}

		mydialog.procesando_inicio('Procesando el Sticky...', 'Espere...');
		$.ajax({
			type: 'POST',
			url: '/admin/agregar-patrocinio.php',
			data: 'idpost='+encodeURIComponent($('#sticky-agregar #idpost').val())+'&termina='+encodeURIComponent($('#sticky-agregar #termina').val()),
			success: function(h){
				mydialog.alert('Formulario de Stickys', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.agregar_sticky()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},
//Termina








//Borrar Tema
	borrar_temamod: function(){
		mydialog.procesando_inicio('Cargando...', 'Eliminar Tema');
		$.ajax({
			type: 'GET',
			url: '/admin/comunidades/borrar-tema-form.php',
			data: '',
			success: function(h){
				mydialog.title('Eliminar Tema');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Eliminar', 'com.borrar_temamod_send()', true, true, true);
				mydialog.center();
				$('#borrar-tema #idte').focus();
			},
			error: function(){
				mydialog.error_500("com.borrar_temamod()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	},
	borrar_temamod_send: function(){
		if($('#borrar-tema #idpost').val()==''){
			$('#borrar-tema #error_data').html('El campo ID del TEMA es obligatorio').slideDown('fast');
			$('#borrar-tema #idpost').focus();
			return;
		}else if($('#borrar-tema #razon').val()==''){
			$('#borrar-tema #error_data').html('El campo Raz&oacute;n es obligatorio').slideDown('fast');
			$('#borrar-tema #razon').focus();
			return;
		}

		mydialog.procesando_inicio('Enviando...', 'Eliminando Tema...');
		$.ajax({
			type: 'POST',
			url: '/admin/comunidades/borrar-tema.php',
			data: 'idte='+encodeURIComponent($('#borrar-tema #idte').val())+'&razon='+encodeURIComponent($('#borrar-tema #razon').val()),
			success: function(h){
				mydialog.alert('Tema eliminado', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.borrar_temamod_send()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},

//Borrar Comunidad
	borrar_comumod: function(){
		mydialog.procesando_inicio('Cargando...', 'Borrar Comunidad');
		$.ajax({
			type: 'GET',
			url: '/admin/comunidades/borrar-comu-form.php',
			data: '',
			success: function(h){
				mydialog.title('Eliminar Comunidad');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Eliminar', 'com.borrar_comumod_send()', true, true, true);
				mydialog.center();
				$('#borrar-com #idco').focus();
			},
			error: function(){
				mydialog.error_500("com.borrar_comumod()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	},
	borrar_comumod_send: function(){
		if($('#borrar-com #idco').val()==''){
			$('#borrar-com #error_data').html('El campo Shortname es obligatorio').slideDown('fast');
			$('#borrar-com #idco').focus();
			return;
		}

		mydialog.procesando_inicio('Enviando...', 'Eliminando Comunidad...');
		$.ajax({
			type: 'POST',
			url: '/admin/comunidades/borrar-comu.php',
			data: 'shortname='+encodeURIComponent($('#borrar-com #idco').val()),
			success: function(h){
				mydialog.alert('Comunidad eliminada', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.borrar_comumod_send()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});	
	},

//Banear Usuarios
	banear_usuario: function(){
		mydialog.procesando_inicio('Cargando...', 'Suspender Usuario');
		$.ajax({
			type: 'GET',
			url: '/admin/banear-usuario-form.php',
			data: '',
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
	},
	banear_usuario_send: function(){
		if($('#baneo #usuario').val()==''){
			$('#baneo #error_data').html('El campo Usuario es obligatorio').slideDown('fast');
			$('#baneo #usuario').focus();
			return;
		}else if($('#baneo #razon').val()==''){
			$('#baneo #error_data').html('El campo Raz&oacute;n es obligatorio').slideDown('fast');
			$('#baneo #razon').focus();
			return;
		}else if($('#baneo #url').val()==''){
			$('#baneo #error_data').html('Escribe la Fecha de Fin de Suspencion').slideDown('fast');
			$('#baneo #url').focus();
			return;
		}

		mydialog.procesando_inicio('Enviando...', 'Suspendiendo...');
		$.ajax({
			type: 'POST',
			url: '/admin/banear-usuario.php',
			data: 'nombre='+encodeURIComponent($('#baneo #usuario').val())+'&email='+encodeURIComponent($('#baneo #razon').val())+'&url='+encodeURIComponent($('#baneo #finbaneo').val()),
			success: function(h){
				mydialog.alert('Usuario Suspendido', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.banear_usuario_send()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},

//Aceptar denuncia
	acept_denuncia: function(){
		mydialog.procesando_inicio('Cargando...', 'Aceptar Denuncia');
		$.ajax({
			type: 'GET',
			url: '/admin/acept-denuncia-form.php',
			data: '',
			success: function(h){
				mydialog.title('Aceptar Denuncia');
				mydialog.body(h, 500);
				mydialog.buttons(true, true, 'Aceptar', 'com.acept_denuncia_send()', true, true, true);
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
	},
	acept_denuncia_send: function(){
		if($('#acept-denuncia #denun').val()==''){
			$('#acept-denuncia #error_data').html('El campo Denunciante es obligatorio').slideDown('fast');
			$('#acept-denuncia #denun').focus();
			return;
		}else if($('#acept-denuncia #idpost').val()==''){
			$('#acept-denuncia #error_data').html('El campo ID POST es obligatorio').slideDown('fast');
			$('#acept-denuncia #idpost').focus();
			return;
		}else if($('#acept-denuncia #razon').val()==''){
			$('#acept-denuncia #error_data').html('El campo Raz&oacute;n es obligatorio').slideDown('fast');
			$('#acept-denuncia #razon').focus();
			return;
		}

		mydialog.procesando_inicio('Enviando...', 'Aceptando Denuncia...');
		$.ajax({
			type: 'POST',
			url: '/admin/acept-denuncia.php',
			data: 'idpost='+encodeURIComponent($('#acept-denuncia #idpost').val())+'&razon='+encodeURIComponent($('#acept-denuncia #razon').val())+'&denun='+encodeURIComponent($('#acept-denuncia #denun').val()),
			success: function(h){
				mydialog.alert('Denuncia Aceptada', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.acept_denuncia_send()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},

//Rechazar denuncia Post Mod	
	rech_denuncia: function(){
		mydialog.procesando_inicio('Cargando...', 'Rechazar Denuncia');
		$.ajax({
			type: 'GET',
			url: '/admin/rech-denuncia-form.php',
			data: '',
			success: function(h){
				mydialog.title('Rechazo de Denuncia');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Rechazar', 'com.rech_denuncia_send()', true, true, true);
				mydialog.center();
				$('#rech-denuncia #denun').focus();
			},
			error: function(){
				mydialog.error_500("com.rech_denuncia()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	},
	rech_denuncia_send: function(){
		if($('#rech-denuncia #idpost').val()==''){
			$('#rech-denuncia #error_data').html('El campo ID del POST es obligatorio').slideDown('fast');
			$('#rech-denuncia #idpost').focus();
			return;
		}else if($('#rech-denuncia #denun').val()==''){
			$('#rech-denuncia #error_data').html('El campo Denunciante es obligatorio').slideDown('fast');
			$('#rech-denuncia #denun').focus();
			return;
		}

		mydialog.procesando_inicio('Enviando...', 'Rechazando Denuncia...');
		$.ajax({
			type: 'POST',
			url: '/admin/rech-denuncia.php',
			data: 'idpost='+encodeURIComponent($('#rech-denuncia #idpost').val())+'&denun='+encodeURIComponent($('#rech-denuncia #denun').val()),
			success: function(h){
				mydialog.alert('Denuncia Rechazada', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.rech_denuncia_send()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},
	
//Cambiar Rango
	rango_usuario: function(){
		mydialog.procesando_inicio('Cargando...', 'Rango Usuario');
		$.ajax({
			type: 'GET',
			url: '/admin/rango-form.php',
			data: '',
			success: function(h){
				mydialog.title('Editar Rango');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Cambiar Rango', 'com.rango_usuario_send()', true, true, true);
				mydialog.center();
				$('#rango #nick').focus();
			},
			error: function(){
				mydialog.error_500("com.rango_usuario()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	},
	rango_usuario_send: function(){
		if($('#rango #nick').val()==''){
			$('#rango #error_data').html('El campo Usuario es obligatorio').slideDown('fast');
			$('#rango #nick').focus();
			return;
		}else if($('#rango #rango_data').val()==''){
			$('#rango #error_data').html('El campo Rango es obligatorio').slideDown('fast');
			$('#rango #rango_data').focus();
			return;
		}

		mydialog.procesando_inicio('Enviando...', 'Editando Rango...');
		$.ajax({
			type: 'POST',
			url: '/admin/rango.php',
			data: 'nombre='+encodeURIComponent($('#rango #nick').val())+'&email='+encodeURIComponent($('#rango #rango_data').val()),
			success: function(h){
				mydialog.alert('Rango Editado', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.rango_usuario_send()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},

//Agregar Puntos
	agregar_puntos: function(){
		mydialog.procesando_inicio('Cargando...', 'Agregar Puntos');
		$.ajax({
			type: 'GET',
			url: '/admin/agregar-form.php',
			data: '',
			success: function(h){
				mydialog.title('Agregar Puntos');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Agregar', 'com.agregar_puntos_send()', true, true, true);
				mydialog.center();
				$('#puntos-agregar #nick').focus();
			},
			error: function(){
				mydialog.error_500("com.agregar_puntos()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	},
	agregar_puntos_send: function(){
		if($('#puntos-agregar #nick').val()==''){
			$('#puntos-agregar #error_data').html('El campo Usuario es obligatorio').slideDown('fast');
			$('#puntos-agregar #nick').focus();
			return;
		}else if($('#puntos-agregar #puntos').val()==''){
			$('#puntos-agregar #error_data').html('El campo Puntos es obligatorio').slideDown('fast');
			$('#puntos-agregar #puntos').focus();
			return;
		}

		mydialog.procesando_inicio('Enviando...', 'Agregando Puntos...');
		$.ajax({
			type: 'POST',
			url: '/admin/agregar.php',
			data: 'nombre='+encodeURIComponent($('#puntos-agregar #nick').val())+'&email='+encodeURIComponent($('#puntos-agregar #puntos').val()),
			success: function(h){
				mydialog.alert('Puntos Agregados', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.agregar_puntos_send()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},

//Quitar Puntos
	quitar_puntos: function(){
		mydialog.procesando_inicio('Cargando...', 'Quitar Puntos');
		$.ajax({
			type: 'GET',
			url: '/admin/quitar-form.php',
			data: '',
			success: function(h){
				mydialog.title('Quitar Puntos');
				mydialog.body(h, 450);
				mydialog.buttons(true, true, 'Quitar', 'com.quitar_puntos_send()', true, true, true);
				mydialog.center();
				$('#quitar-puntos #nick').focus();
			},
			error: function(){
				mydialog.error_500("com.quitar_puntos()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	},
	quitar_puntos_send: function(){
		if($('#quitar-puntos #nick').val()==''){
			$('#quitar-puntos #error_data').html('El campo Usuario es obligatorio').slideDown('fast');
			$('#quitar-puntos #nick').focus();
			return;
		}else if($('#quitar-puntos #puntos').val()==''){
			$('#quitar-puntos #error_data').html('El campo Puntos es obligatorio').slideDown('fast');
			$('#quitar-puntos #puntos').focus();
			return;
		}

		mydialog.procesando_inicio('Enviando...', 'Quitando Puntos...');
		$.ajax({
			type: 'POST',
			url: '/admin/quitar.php',
			data: 'nombre='+encodeURIComponent($('#quitar-puntos #nick').val())+'&email='+encodeURIComponent($('#quitar-puntos #puntos').val()),
			success: function(h){
				mydialog.alert('Puntos Retirados', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.quitar_puntos_send()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},
	
//Agregar Sticky
	agregar_sticky: function(){
		if($('#sticky-agregar #idpost').val()==''){
			$('#sticky-agregar #error_data').html('Debes ingresar la ID del POST').slideDown('fast');
			$('#sticky-agregar #idpost').focus();
			return;
		}

		mydialog.procesando_inicio('Agregando Sticky...', 'Espere...');
		$.ajax({
			type: 'POST',
			url: '/admin/agregar-sticky.php',
			data: 'idpost='+encodeURIComponent($('#sticky-agregar #idpost').val()),
			success: function(h){
				mydialog.alert('Sticky Agregado', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.agregar_sticky()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},
//Agregar Comunidad oficial
	agregar_oficial: function(){
		if($('#comunidad-agregar #name').val()==''){
			$('#comunidad-agregar #error_data').html('Debes ingresar el nombre corto de la comunidad').slideDown('fast');
			$('#comunidad-agregar #name').focus();
			return;
		}

		mydialog.procesando_inicio('Agregando comunidad...', 'Espere...');
		$.ajax({
			type: 'POST',
			url: '/admin/comunidades/agregar-oficial.php',
			data: 'shortname='+encodeURIComponent($('#comunidad-agregar #name').val()),
			success: function(h){
				mydialog.alert('Agregar comunidad oficial', h.substring(3));
			},
			error: function(){
				mydialog.error_500("com.agregar_oficial()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});		
	},
};
													




/* FIN - JS Panel de Administracion */