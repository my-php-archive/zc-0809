<?php
include("header.php");
$titulo	= $descripcion;
cabecera_normal();

if($_SESSION['user']==null){
fatal_error('Para agregar posts necesitas autentificarte.');
}
if($rangoz['rango']==11){
	echo"<div id='mensaje-top'>
<div class='msgtxt'>Logr&aacute; obtener m&aacute;s de 50 puntos y ser&aacute;s New Full User</div>
</div>";
}
echo'<div id="preview" style="display:none"></div>';
?>


<script type="text/javascript">

function countUpperCase(string) {
    var len = string.length, strip = string.replace(/([A-Z])+/g, '').length, strip2 = string.replace(/([a-zA-Z])+/g, '').length, percent = (len  - strip) / (len - strip2) * 100;
    return percent;
}

function showError(obj, str) {
	if (obj.tagName.toLowerCase() == 'textarea') {
		obj = $(obj).parent().parent().parent();
	}
	$(obj).parent('li').addClass('error').children('span.errormsg').html(str).show();
	$.scrollTo($(obj).parent('li'), 500);
}

function hideError(obj) {
	if (obj.tagName.toLowerCase() == 'textarea') {
		obj = $(obj).parent().parent().parent();
	}
	$(obj).parent('li').removeClass('error').children('span.errormsg').html('').hide();
}

function save_borrador(){
	if($('#markItUp').get(0).view == 'html')
		$('#markItUp').val($.html2bbcode($($('#markItUp').get(0).editor.contentWindow.document.body).html()));

	var params = 'titulo=' + encodeURIComponent($('input[name="titulo"]').val()) + '&cuerpo=' + encodeURIComponent($('textarea[name="cuerpo"]').val()) + '&tags=' + encodeURIComponent($('input[name="tags"]').val()) + '&categoria=' + encodeURIComponent($('select[name="categoria"]').val());
	params += $('input[name="privado"]').is(':checked') ? '&privado=1' : '';
	params += $('input[name="sin_comentarios"]').is(':checked') ? '&sin_comentarios=1' : '';
		$('div#borrador-guardado').html('Guardando...');

	borrador_setTimeout = setTimeout('borrador_save_enabled()', 60000);
	borrador_save_disabled();

	if(!empty($('input[name="borrador_id"]').val())){
		$.ajax({
			type: 'POST',
			url: '/borradores-guardar.php',
			data: params + '&borrador_id=' + encodeURIComponent($('input[name="borrador_id"]').val()),
			success: function(h){
				switch(h.charAt(0)){
					case '0': //Error
						clearTimeout(borrador_setTimeout);
						borrador_setTimeout = setTimeout('borrador_save_enabled()', 5000);
						borrador_ult_guardado = h.substring(3);
						$('div#borrador-guardado').html(borrador_ult_guardado);
						break;
					case '1': //Guardado
						var currentTime = new Date();
						borrador_ult_guardado = 'Guardado a las ' + currentTime.getHours() + ':' + currentTime.getMinutes() + ':' + currentTime.getSeconds() + ' hs.';
						$('div#borrador-guardado').html(borrador_ult_guardado);
				}
			},
			error: function(){
				mydialog.error_500('save_borrador()');
			}
		});
	}else{
		$.ajax({
			type: 'POST',
			url: '/borradores-agregar.php',
			data: params,
			success: function(h){
				switch(h.charAt(0)){
					case '0': //Error
						clearTimeout(borrador_setTimeout);
						borrador_setTimeout = setTimeout('borrador_save_enabled()', 5000);
						borrador_ult_guardado = h.substring(3);
						$('div#borrador-guardado').html(borrador_ult_guardado);
						break;
					case '1': //Creado
						$('input[name="borrador_id"]').val(h.substring(3));
						var currentTime = new Date();
						borrador_ult_guardado = 'Guardado a las ' + currentTime.getHours() + ':' + currentTime.getMinutes() + ':' + currentTime.getSeconds() + ' hs.';
						$('div#borrador-guardado').html(borrador_ult_guardado);
				}
			},
			error: function(){
				mydialog.error_500('save_borrador()');
			}
		});
	}
}

var borrador_setTimeout;
var borrador_ult_guardado = '';
var borrador_is_enabled = true;

function borrador_save_enabled() {
	if ($('input#borrador-save')) {
		$('input#borrador-save').removeClass('disabled').removeAttr('disabled');
	}
	borrador_is_enabled = true;
}
function borrador_save_disabled() {
	if($('input#borrador-save')) {
		$('input#borrador-save').addClass('disabled').attr('disabled', 'disabled');
	}
	borrador_is_enabled = false;
}

var xconfirm = true;
window.onbeforeunload = confirmleave;
function confirmleave() {
    if (xconfirm && ($('input[name=titulo]').val() || $('textarea[name=cuerpo]').val())) return "Este post no fue publicado y se perdera.";
}

jQuery(document).ready(function($){

	$('.required').bind(
		'keyup change',
		function(){
			if ($.trim($(this).val())) {
				hideError(this);
			}
		}
	);

	$('input[name=titulo]').bind(
		'keyup',
		function(){
			if ($(this).val().length >= 5 && countUpperCase($(this).val()) > 90) {
				showError(this, 'El t&iacute;tulo no debe estar en may&uacute;sculas');
			}
			else {
				hideError(this);
			}
		}
	);

	$('input[name=continue]').bind(
		'click',
		function () {

			if ($('#markItUp').get(0).view == 'html') {
				$('#markItUp').val($.html2bbcode($($('#markItUp').get(0).editor.contentWindow.document.body).html()));
			}

			var error = false;

			$('.required').each(function(){
				if (!$.trim($(this).val())) {
					showError(this, 'Este campo es obligatorio');
					$(this).parent('li').addClass('error');
					error = true;
					return false;
				}
			});

			if (error) {
				return false;
			}

			if ($('textarea[name=cuerpo]').val().length > 63206) {
				showError($('textarea[name=cuerpo]').get(0), 'El post es demasiado largo. No debe exceder los 65000 caracteres.');
				return false;
			}

			if ($('textarea[name=cuerpo]').val().indexOf('imageshack.us') > 0) {
				showError($('textarea[name=cuerpo]').get(0), 'No se permiten imagenes de IMAGESHACK.');
				return false;
			}

			var tags = $('input[name=tags]').val().split(',');

			if (tags.length < 4) {
				showError($('input[name=tags]').get(0), 'Tienes que ingresar por lo menos 4 tags separados por coma.');
				return false;
			}

			$.ajax({
				type: 'post',
				url: '/preview.php',
				data: 'titulo=' + encodeURIComponent($('input[name=titulo]').val()) + '&cuerpo=' + encodeURIComponent($('textarea[name=cuerpo]').val()),
				success: function(r) {

					$(r).dialog({
						modal: true,
						resizable: false,
						draggable: false,
						width: 750,
						title: 'Previsualizar',
						buttons: [
							{
								text: 'Agregar',
								class: 'ui-button-positive box-shadow-soft floatL',
								click: function () {
									postSave();
								}
							},
							{
								text: 'Cancelar',
								class: 'ui-button-cancel floatR',
								click: function () {
									$(this).dialog('close');
								}
							}
						]
					});

					$.scrollTo('.ui-dialog')

				}
			});

		}

	);

	var suggestedTags = false;
	$('textarea[name=cuerpo]').bind('blur', function(){
		if ($.trim($('textarea[name=cuerpo]').val()) && !suggestedTags) {
			ajax('tags', 'suggest', { text: $('textarea[name=cuerpo]').val(), n: 6 },
				{
					success: function (r) {
						if (r.data && r.data.split(',').length >= 3) {
							$('#tag-suggest').html(r.data);
						}
					}
				}
			);
			suggestedTags = true;
			setTimeout(function(){
				suggestedTags = false;
			}, 60000);
		}
	});

	$('select[name=categoria]').change(function(){
		if ($(this).val() == 28 && !confirm('Atencion\n\n\nEsta categor&iacute;a es -exclusivamente- para contenido relacionado con Taringa!')) {
			$(this).val('')
		}
	});

});

function postSave() {
	xconfirm = false;
	document.forms.newpost.submit()
}

</script>

<div id="main-col">
<div id="full-col">
<div id="add-post" class="clearfix">


		
		
		
		
		
	<div class="form-add-post">
		<form name="newpost" method="post" action="/agregar.php">
			<input type="hidden" name="key" value="50faa4" />
			<input type="hidden" name="id" value="" />
			<input type="hidden" name="borrador_id" value="" />
			<div style="">

	
			</div>
			<ul class="clearfix">

				<li>
					<label>T&iacute;tulo</label>
					<span class="errormsg"></span>
					<input class="text-inp required text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" type="text" name="titulo" maxlength="60" tabindex="1"  />
				</li>

				<li>
					<label>Contenido del Post</label>
					<span class="errormsg"></span>
					<textarea id="markItUp" name="cuerpo" class="post required text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" style="height: 500px; resize: none;" tabindex="2"></textarea>
					<div id="emoticons" style="margin: 10px 0 0">
												<a href="#" smile=":)" data-smile=":),smile.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-286px; clip:rect(286px 16px 302px 0px);" alt="sonrisa" title="sonrisa" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=";)" data-smile=";),wink.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-308px; clip:rect(308px 16px 324px 0px);" alt="gui&ntilde;o" title="gui&ntilde;o" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":roll:" data-smile=":roll:,wassat.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-330px; clip:rect(330px 16px 346px 0px);" alt="duda" title="duda" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=":P" data-smile=":P,tongue.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-352px; clip:rect(352px 16px 368px 0px);" alt="lengua" title="lengua" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":D" data-smile=":D,laughing.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-374px; clip:rect(374px 16px 390px 0px);" alt="alegre" title="alegre" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":(" data-smile=":(,sad.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-396px; clip:rect(396px 16px 412px 0px);" alt="triste" title="triste" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="X(" data-smile="X(,angry.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-418px; clip:rect(418px 16px 434px 0px);" alt="odio" title="odio" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":cry:" data-smile=":cry:,crying.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-440px; clip:rect(440px 16px 456px 0px);" alt="llorando" title="llorando" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":twisted:" data-smile=":twisted:,evil.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-462px; clip:rect(462px 16px 478px 0px);" alt="endiablado" title="endiablado" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":|" data-smile=":|,huh.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-484px; clip:rect(484px 16px 500px 0px);" alt="serio" title="serio" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":?" data-smile=":?,s.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-506px; clip:rect(506px 16px 522px 0px);" alt="duda" title="duda" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":cool:" data-smile=":cool:,cool.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-528px; clip:rect(528px 16px 544px 0px);" alt="picaro" title="picaro" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=":oops:" data-smile=":oops:,red.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-550px; clip:rect(550px 16px 566px 0px);" alt="timido" title="timido" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="^^" data-smile="^^,grn.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-572px; clip:rect(572px 16px 588px 0px);" alt="sonrizota" title="sonrizota" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="8|" data-smile="8|,8.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-594px; clip:rect(594px 16px 610px 0px);" alt="increible!" title="increible!" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":F" data-smile=":F,drool.gif"><span style="position:relative;"><img border=0 src="http://o1.t26.net/images/big2.gif" style="position:absolute; top:-616px; clip:rect(616px 16px 632px 0px);" alt="babaaa" title="babaaa" /><img border=0 src="http://o1.t26.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a style="float: right; margin: 5px 0 0" onclick="window.open('/emoticones.php', '', 'width=180px,height=500px,scrollbars,resizable')" class="emoticons-more">M&aacute;s Emoticones</a>
					</div>
				</li>
		
				<li>

					<label>Tags</label>
					<span class="errormsg"></span>
					<input class="text-inp required text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" type="text" name="tags" />
					Una lista separada por comas, que describa el contenido. Ej: <span id="tag-suggest">gol, ingleses, Mundial 86, futbol, Maradona, Argentina</span>
				</li>
				<li class="special-left clearfix">
					<label>Categor&iacute;a</label>

					<span class="errormsg"></span>
					<select name="categoria" class="agregar required" size="9" tabindex="4">
						<option style="color:#000;font-weight:bold;padding:3px 3px 3px 3px; background:none;" selected="selected" value="">Elegir una categor&iacute;a</option>
												<?php
$sqlc=mysql_query("SELECT * FROM categorias ORDER BY nom_categoria asc");
while($categorias=mysql_fetch_array($sqlc))
{
	echo"<option class='{$categorias['link_categoria']}' value='{$categorias['id_categoria']}'>{$categorias['nom_categoria']}</option>";
}
echo"</select></li>";
if($rangoz['rango']!=11){
	echo"

				<li class=\"special-right clearfix\">
					<label>Opciones</label>

										<div class=\"option clearfix\">  
						<input class=\"floatL\" type=\"checkbox\" name=\"facebook\" tabindex=\"5\" onclick=\"FB.signin('link_nocb')\" />
						<p class=\"floatL\">
							<strong>Compartir en Facebook</strong>
							El post sera compartido en tu Wall para que todos tus amigos puedan conocerlo.
						</p>
					</div>
					
					
					<div class=\"option clearfix\">  
						<input class=\"floatL\" type=\"checkbox\" name=\"sin_comentarios\" tabindex=\"7\" />

						<p class=\"floatL\">
							<strong>Cerrar Comentarios</strong>
							Si tu Post es pol&eacute;mico ser&iacute;a mejor que cierres los comentarios.
						</p>
					</div>


";}
	
echo"

</li>


			</ul>
			<div class=\"end-form clearfix\">
				<input class=\"mBtn btnGreen ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only\" style=\"width:auto; margin-left: 5px\" type=\"button\" value=\"Previsualizar\" name=\"continue\" />
				<input class=\"mBtn btnOk fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only\" type=\"button\" value=\"Guardar a Borradores\" onclick=\"save_borrador()\" />
				<div id=\"borrador-guardado\" style=\"float: right; font-style: italic; margin: 7px 0 0\"></div>
			</div>
			
			<div class=\"betad clearfix\">
				<a id=\"try-beta\" onclick=\"beta_tester.add()\" style=\"display: none\">Prueba el nuevo creador de Posts beta</a>

				<a id=\"leave-beta\" onclick=\"beta_tester.del()\" style=\"display: none\">Vuelve al editor anterior</a>
			</div>
			
			
		</form>
	</div>
	
</div>

</div>
</div>

<div id=\"sidebar\">

		<div class=\"sidebar-add-post clearfix\">
			<div class=\"clearfix\">
			<p class=\"floatL\" style=\"margin-top;margin-botom:0\"><span class=\"stitle\">Consejos: Para hacer un buen post es importante que tengas en cuenta algunos puntos.</span></p>
			</div>

			<div class=\"consejos-view-more clearfix\">
				<p style=\"margin-top:5px\">Esto ayuda a mantener una mejor calidad de contenido y evitar que sea eliminado por los moderadores.</p>
				<div class=\"clearfix\">

		
					<div class=\"floatL clearfix\">
						<strong>El Titulo</strong>
						<ul>
							<li class=\"correct\">Que sea descriptivo</li>
							<li class=\"\">TODO EN MAYUSCULA</li>
							<li class=\"\">!!!!!!!Exagerados!!!!!!</li>
							<li class=\"\">PARCIALMENTE en may&uacute;sculas!</li>

						</ul>
					</div>
					<div class=\"floatL clearfix\">
						<strong class=\"floatL\">Contenido</strong>
						<br />
						<ul class=\"floatL\" style=\"margin-right:10px\">
							<li class=\"\">Informaci&oacute;n personal o de un tercero</li>
							<li class=\"\">Fotos de personas menores de edad</li>

							<li class=\"\">Muertos, sangre, v&oacute;mitos, etc.</li>
							<li class=\"\">Con contenido racista y/o peyorativo</li>
						</ul>
						<ul class=\"floatL\">
							<li class=\"\">Poca calidad (una imagen, texto pobre)</li>
							<li class=\"\">Chistes escritos, adivinanzas, trivias</li>
							<li class=\"\">Haciendo preguntas o cr&iacute;ticas</li>

							<li class=\"\">Insultos o malos modos</li>
						</ul>
						<ul class=\"floatL\">
							<li class=\"\">Con intenci&oacute;n de armar pol&eacute;mica</li>
							<li class=\"\">Apolog&iacute;a de delito</li>
							<li class=\"\">Software spyware, malware, virus o troyanos</li>
						</ul>

						</div>
				</div>
			</div>
		</div>
		
		
</div>

</div>




";
pie();
?>
