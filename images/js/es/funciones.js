/*
    Zincomienzo > Funciones
    Autor: Lean18
    ::
    
*/
/* DENUNCIAS */
var denuncia = {
    nueva: function(type, obj_id, obj_title, obj_user){
        // PLANTILLA
		$.ajax({
			type: 'POST',
			url: global_data.url + '/denuncia-' + type + '.php',
			data: 'obj_id=' + obj_id + '&obj_title=' + obj_title + '&obj_user=' + obj_user,
			success: function(h){
                denuncia.set_dialog(h);
			}
		});
    },
    set_dialog: function(html){
        var d_title = 'Denunciar ';
        // MYDIALOG
        mydialog.class_aux = 'registro';
        mydialog.mask_close = false;
        mydialog.close_button = true;
		mydialog.show(true);
		mydialog.title(d_title);
		mydialog.body('<div style="padding:1em 35px;" id="AFormInputs">' + html + '</div>');
		mydialog.buttons(true, true, 'Enviar', 'denuncia.enviar()', true, true, true, 'Cancelar', 'close', true, false);
		mydialog.center();
    },
    enviar: function(){
        var obj_id = $('input[name=obj_id]').val();
        var razon = $('select[name=razon]').val();
        var extras = $('textarea[name=extras]').val();
        //
		$.ajax({
			type: 'POST',
			url: global_data.url + '/denuncia-' + type + '.php',
			data: 'obj_id=' + obj_id + '&obj_title=' + obj_title + '&obj_user=' + obj_user,
			success: function(h){
                switch(h.charAt(0)){
                    case '0':
                        mydialog.alert(h.substring(3));
                    break;
                    case '1':
                        
                    break;
                }
			}
		});
    }
}
/* COMENTARIOS */
var comentario = {
    /* VARIABLES */
    cache: {},
    cargado: false,
    /* FUNCIONES */
    cargar: function(postid, page, autor){
        // GIF
		$('#com_gif').show();
		// COMPRVAMOS CACHE
        if(typeof comentario.cache['c_' + page] == 'undefined'){
    		$.ajax({
    			type: 'POST',
    			url: global_data.url + '/comentario-ajax.php?page=' + page,
    			data: 'postid=' + postid + '&autor=' + autor,
    			success: function(h){
    			    // CACHE
                    comentario.cache['c_' + page] = h;
                    // CARGAMOS
   				    $('#comentarios').html(h);
                    // PAGINAS
    				comentario.set_pages(postid, page, autor);
    				//
    			}
    		});
      } else {
            $('#comentarios').html(comentario.cache['c_' + page]);
            $('.paginadorCom').html(comentario.cache['p_' + page]);
            $('#com_gif').hide();
      }
    },
    set_pages: function(postid, page, autor){
    	var total = parseInt($('#ncomments').text());
    	//
    	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/comentario-pages.php?page=' + page,
    		data: 'postid=' + postid + '&autor=' + autor + '&total=' + total,
    		success: function(h){
    		    comentario.cache['p_' + page] = h;
   			    $('.paginadorCom').html(h);
                $('#com_gif').hide();
    		}
    	});
	},
    // NUEVO COMENTARIO
    nuevo: function(mostrar_resp, comentarionum){
        // EVITAR FLOOD
        $('#btnsComment').attr({'disabled':'disabled'});
        //
    	var textarea = $('#body_comm');
    	var text = textarea.val();
        // VACIO o DEFAULT
    	if(text == '' || text == textarea.attr('title')){
    		textarea.focus();
            $('#btnsComment').attr({'disabled':''});
    		return;
    	}else if(text.length > 1500){
    		alert("Tu comentario no puede ser mayor a 1500 caracteres.");
    		textarea.focus();
            $('#btnsComment').attr({'disabled':''});
    		return;
    	}
        // IMAGEN
    	$('.miComentario #gif_cargando').show();
    	var auser = $('#auser_post').val();
    	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/comentario-agregar.php?ts=true',
    		data: 'comentario=' + encodeURIComponent(text) + '&postid=' + gget('postid') + '&mostrar_resp=' + mostrar_resp + '&auser=' + auser,
    		success: function(h){
    			switch(h.charAt(0)){
    				case '0': //Error
    					$('.miComentario .error').html(h.substring(3)).show('slow');
                        $('#btnsComment').attr({'disabled':''});
    					break;
    				case '1': //OK
    						$('#no-comments').hide();
    						$('#preview').remove();
    						/*textarea.attr('title', 'Escribir un comentario...').val('');
    						onblur_input(textarea);*/
    						$('#nuevos').append(h.substring(3));
                            $('.miComentario').html('<div class="emptyData">Tu comentario fue agregado correctamente :)</div>');
    						// SUMAMOS
    						var ncomments = parseInt($('#ncomments').text());
    						$('#ncomments').text(ncomments + 1);
                            //$('#btnsComment').attr({'disabled':''});
                            // POR SI HABIA ERROR
                            //$('.miComentario .error').html('');
    					break;
    			}
    			//
    			$('.miComentario #gif_cargando').hide();
    		},
    		error: function(){
    			comentario.enviado = 0;
    			mydialog.error_500("add_comment('"+ mostrar_resp +"')");
    			//
    			$('.miComentario #gif_cargando').hide();
                $('#btnsComment').attr({'disabled':''});
    		}
  	     });
    },
    // VISTA PREVIA DEL COMENTARIO
    preview: function(){
    	var textarea = $('#body_comm');
    	var text = textarea.val();
    
    	if(text == '' || text == textarea.attr('title')){
    		textarea.focus();
    		return;
    	}else if(text.length > 1500){
    		alert("Tu comentario no puede ser mayor a 1500 caracteres.");
    		textarea.focus();
    		return;
    	}
    	var auser = $('#auser_post').val();
    
    	$('.miComentario #gif_cargando').show();
    	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/comentario-preview.php?ts=true',
    		data: 'comentario=' + encodeURIComponent(text) + '&auser=' + auser,
    		success: function(h){
    		  switch(h.charAt(0)){
                case '0': //Error
    				$('.miComentario .error').html(h.substring(3)).show('slow');
                    $('.miComentario #gif_cargando').hide();
    				break;
                case '1': //OK
                    $('#preview').html(h.substring(3)).slideDown("slow");
                    $('.miComentario #gif_cargando').hide();
                    $('.miComentario .error').html('');
                    break;
                }
    		},
    		error: function(){
    			add_comment_enviado = false;
    			mydialog.error_500("add_comment('"+mostrar_resp+"')");
    			//
    			$('.miComentario #gif_cargando').hide();
    		}
    	});
    },
    // VOTAR COMENTARIO
    votar: function(cid, voto){
        var voto_tag = $('#votos_total_' + cid)
    	var total_votos = parseInt(voto_tag.text());
        total_votos = (isNaN(total_votos)) ? 0 : total_votos;
        // FIX
        voto = (voto == 1) ? 1 : -1;
        //
    	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/comentario-votar.php',
    		data: 'voto=' + voto + '&cid=' + cid + '&postid=' + gget('postid'),
    		success: function(h){
    			switch(h.charAt(0)){
    				case '0': //Error
    					mydialog.alert("Error al votar",h.substring(3));
    					break;
    				case '1': //OK
    					total_votos = total_votos + voto;
                        if(total_votos > 0) total_votos = '+' + total_votos; // PONEMOS EL SIGNO + POR ESTETICA :P
    					var klass = (total_votos < 0) ? 'negativo' : 'positivo'; // CLASS
                        // MOSTRAMOS SI NO ES VISIBLE Y AGREGAMOS LA NUEVA CLASS
                        $('#ul_cmt_' + cid + ' > .numbersvotes').show();
    					voto_tag.text(total_votos).removeClass('positivo, negativo').addClass(klass);
    					// ESCONDEMOS LAS MANITAS xd
                        $('#ul_cmt_' + cid).find('.icon-thumb-up, .icon-thumb-down').hide();
    					break;
    			}
    		},
    		error: function(){
    			mydialog.error_500('com_post(' + cid + ', ' + voto + ')');
    		}
    	});	
    }
    
}
/* AFILIACION */
var afiliado = {
    vars: Array(),
    nuevo: function(){
        // CARGAMOS Y BORRAMOS
        var form = '';
        form += '<div class="emptyData" style="margin-bottom:10px" id="AFStatus"><span>Ingresa los datos de tu web para afiliarte.</span></div>'
        form += '<div style="padding:0 35px;" id="AFormInputs">'
        form += '<div class="form-line">'
        form += '<label for="atitle">T&iacute;tulo</label>'
        form += '<input type="text" tabindex="1" name="atitle" id="atitle" maxlength="35"/>'
  		form += '</div>'
        form += '<div class="form-line">'
        form += '<label for="aurl">Direcci&oacute;n</label>'
        form += '<input type="text" tabindex="2" name="aurl" id="aurl" value="http://"/>'
  		form += '</div>'
        form += '<div class="form-line">'
        form += '<label for="aimg">Banner <small>(216x42px)</small></label>'
        form += '<input type="text" tabindex="3" name="aimg" id="aimg" value="http://"/>'
  		form += '</div>'
        form += '<div class="form-line">'
        form += '<label for="atxt">Descripci&oacute;n</label>'
        form += '<textarea tabindex="4" rows="10" name="atxt" id="atxt" style="height:60px; width:295px"></textarea>'
  		form += '</div>'
        form += '<div class="form-line">'
        form += '<label for="aID">RefID <a href="#" onclick="$(this).parent().parent().find('
        form += "'span').css({display: 'block'}); return false"
        form += '"><img src="' + global_data.img + '/images/icons/help.png"/></a></label><span style="display:none; margin-bottom:5px">Si utilizas <a href="http://www.tscript.in/"><b>T!Script</b></a> y ya nos enlazaste, ingresa el ID generado en tu panel de adminsitraci&oacute;n.</span>'
        form += '<input type="text" tabindex="5" name="aID" id="aID" value="" style="width:100px!important"/>'
  		form += '</div>'
        form += '</div>'
        //
        mydialog.class_aux = 'registro';
        mydialog.mask_close = false;
        mydialog.close_button = true;
		mydialog.show(true);
		mydialog.title('Nueva Afiliaci&oacute;n');
		mydialog.body(form);
		mydialog.buttons(true, true, 'Enviar', 'afiliado.enviar(0)', true, true, true, 'Cancelar', 'close', true, false);
		mydialog.center();
    },
    enviar: function(){
        var inputs = $('#AFormInputs :input');
        var status = true;
        var params = '';
        //
        inputs.each(function(){
            var val = $(this).val();
            // EL CAMPO AID NO ES NECESARIO
            if($(this).attr('name') == 'aID') val = '0'; 
            // COMPROBAMOS CAMPOS VACIOS
            if((val == '' || val == 'http://') && status == true) {
                var campo = $(this).parent().find('label');
                $('#AFStatus > span').fadeOut().text('No has completado el campo ' + campo.text()).fadeIn();
                status = false; 
            } else if(status == true){
                // JUNTAMOS LOS DATOS
                params += $(this).attr('name') + '=' + val + '&';
            }
		});
        //
        if(status == true){
            mydialog.procesando_inicio('Enviando...', 'Nueva Afiliaci&oacute;n');
            afiliado.enviando(params);
        }
    },
    enviando: function(params){
    	//
    	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/afiliado-nuevo.php',
    		data: params,
    		success: function(h){
    		  mydialog.procesando_fin();
    		  switch(h.charAt(0)){
    		      case '0':
                  break;
                  case '1':
                    mydialog.body(h.substring(3));
                    mydialog.buttons(true, true, 'Aceptar', 'mydialog.close()', true, true);
                  break;
    		  }
              mydialog.center();
    		}
    	});
    },
    detalles: function(aid){
    	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/afiliado-detalles.php',
    		data: 'ref=' + aid,
    		success: function(h){
    		    mydialog.class_aux = '';
        		mydialog.show(true);
        		mydialog.title('Detalles');
        		mydialog.body(h);
                mydialog.buttons(true, true, 'Aceptar', 'mydialog.close()', true, true);
                mydialog.center();
                
    		}
    	});   
    }
}

/* BBCode */
function spoiler(obj){
    $(obj).toggleClass('show').parent().next().slideToggle();
}
/* EMOTICONOS */
function moreEmoticons(margin){
    var emos = $('#emoticons');
    //
	$.ajax({
		type: 'GET',
		url: global_data.url + '/emoticones.php',
		data: 'ts=false',
		success: function(h){
		    if(margin) $(emos).css({marginTop : '1em'})
		    $(emos).append(h);
            $('#moreemofn').hide();
		}
	});   
}
/* IMAGENES */
var imagenes = {
    total: 0,
    presentacion: function(){
        $('#imContent').animate({top: '0px'}, 1000, 'easeOutQuad', 
        function(){
            // MOSTRAMOS
            // MOVEMOS
            $('#imContent').css({top: '-150px'})
            // ULTIMO
            var slm = $('#img_' + imagenes.total).html();
            //
            for(var i = imagenes.total; i >= 0; i--){
                $('#img_' + i).html($('#img_' + (i - 1)).html());
            }
            //
            $('#img_0').html(slm);
            // INFINITO :D
            setTimeout("imagenes.presentacion()",5000);
        });

    }
}

// NEWS
var news = {
    total: 0,
    count: 1,
    slider: function(){
        if(news.total > 1){
            if(news.count < news.total) news.count++;
            else news.count = 1;
            //
            $('#top_news > li').hide();
            $('#new_' + news.count).fadeIn();
            // INFINITO :D
            setTimeout("news.slider()",7000);
        }
    }       
}
// READY
$(document).ready(function(){
    /* NOTICIAS */
    news.total = $('#top_news > li').size();
    news.slider();
    /* IMAGENES */
    imagenes.presentacion();
});