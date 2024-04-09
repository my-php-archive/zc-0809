<?php
include("header.php");
$key	=	$_SESSION['id'];
$id     =   no_injection(xss($_GET["id"]));

$sql = "SELECT u.id, u.rango, p.* ";
$sql.= "FROM (borradores as p, usuarios as u) WHERE p.id='$id'";
$rs = mysql_query($sql, $con);
while($edit = mysql_fetch_array($rs))
	{
	$rango	=	$edit['rango'];
	$elim = $edit['elim'];
	$id_autor = $edit['id_autor'];
	$titulo = $edit['titulo'];
	$contenido = $edit['contenido'];
	$categoria = $edit['categoria'];
	$privado = $edit['privado'];
	$coments = $edit['coments'];
	$sticky = $edit['sticky'];
	$patrocinado = $edit['patrocinado'];
	$tags = $edit['tags'];
	
	}
cabecera_normal();
?>
<?
$mod	=	"SELECT *
			FROM usuarios
			WHERE id='$key'";
$moder	=	mysql_query($mod, $con);
$moder2	=	mysql_fetch_array($moder);
 
if($key==$id_autor and $elim==0 or $moder2['rango']==255 or $moder2['rango']==100)
{
?>

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script type="text/javascript">

function countUpperCase(string) {
    var len = string.length, strip = string.replace(/([A-Z])+/g, '').length, strip2 = string.replace(/([a-zA-Z])+/g, '').length, percent = (len  - strip) / (len - strip2) * 100;
    return percent;
}

function showError(obj, str) {
	if (obj.tagName.toLowerCase() == 'textarea') {
		obj = $(obj).parent().parent().parent();
	}
	$(obj).parent('li').addClass('error').children('span.errormsg').html(str).show(); // TODO QUE ONDA
	$.scrollTo($(obj).parent('li'), 500);
}

function hideError(obj) {
	if (obj.tagName.toLowerCase() == 'textarea') {
		obj = $(obj).parent().parent().parent();
	}
	$(obj).parent('li').removeClass('error').children('span.errormsg').html('').hide();
}

function save_borrador(){
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

var confirm = true;
window.onbeforeunload = confirmleave;
function confirmleave() {
    if (confirm && ($('input[name=titulo]').val() || $('textarea[name=cuerpo]').val())) return "Este post no fue publicado y se perder\xe1.";
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
				showError(this, 'El título no debe estar en mayúsculas');
			}
			else {
				hideError(this);
			}
		}
	);

	$('input[name=preview]').bind(
		'click',
		function(){

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

			mydialog.class_aux = 'preview';
			mydialog.show(true);
			mydialog.title('Previsualización');

			$.ajax({
				type: 'post',
				url: '/preview.php',
				data: 'titulo=' + encodeURIComponent($('input[name=titulo]').val()) + '&cuerpo=' + encodeURIComponent($('textarea[name=cuerpo]').val()),
				success: function(r) {

					mydialog.body(r);
					mydialog.buttons(true, true, '     Aplicar cambios     ', 'postSave()', true, true, true, 'Cerrar previsualizaci\xf3n', 'close', true, false);
					mydialog.center();

					$('#mydialog #buttons .mBtn.btnOk').removeClass('btnCancel').addClass('btnGreen');
					$.scrollTo(0, 500)
				}
			});
		}
	);
});

function postSave() {
	confirm = false;
	document.forms.newpost.submit()
}

</script>



<script type="text/javascript">
// definiciones basicas
OCULTO="none";
VISIBLE="block";
function mostrar(blo) {
document.getElementById(blo).style.display=VISIBLE;
document.getElementById('ver_off').style.display=VISIBLE;
document.getElementById('ver_on').style.display=OCULTO;
}
function ocultar(blo) {
document.getElementById(blo).style.display=OCULTO;
document.getElementById('ver_off').style.display=OCULTO;
document.getElementById('ver_on').style.display=VISIBLE;
}
</script>

<div id="add-post" class="clearbeta">

		<div class="sidebar-add-post clearfix">
			<div class="clearfix">
			<p class="floatL" style="margin-top;margin-botom:0"><span class="stitle">Consejos: Para hacer un buen post es importante que tengas en cuenta algunos puntos.</span></p>
			<div id="ver_on"><a class="consejos-view-more-button href="#" onclick="mostrar('bloque')">Ver m&aacute;s...</a></div>
<div id="ver_off" style="display: none"><a href="#" onclick="ocultar('bloque')"></a></div>
 </div>

			<div class="consejos-view-more clearfix" id="bloque" style="display: none">

				<p style="margin-top:5px">Esto ayuda a mantener una mejor calidad de contenido y evitar que sea eliminado por los moderadores.</p>
				<div class="clearfix">

					<div class="floatL clearfix">
						<strong>El Titulo</strong>
						<ul>
							<li class="correct">Que sea descriptivo</li>


                            <li class="">TODO EN MAYUSCULA</li>
                            <li class="">!!!!!!!Exagerados!!!!!!</li>
                            <li class="">PARCIALMENTE en may&uacute;sculas!</li>
                        </ul>
                    </div>
                    <div class="floatL clearfix">
                        <strong class="floatL">Contenido</strong>
                        <br />
                        <ul class="floatL" style="margin-right:10px">
                            <li class="">Informaci&oacute;n personal o de un tercero</li>
                            <li class="">Fotos de personas menores de edad</li>
                            <li class="">Muertos, sangre, v&oacute;mitos, etc.</li>
                            <li class="">Con contenido racista y/o peyorativo</li>
                        </ul>
                        <ul class="floatL">
                            <li class="">Poca calidad (una imagen, texto pobre)</li>
                            <li class="">Chistes escritos, adivinanzas, trivias</li>
                            <li class="">Haciendo preguntas o cr&iacute;ticas</li>
                            <li class="">Insultos o malos modos</li>
                        </ul>
                        <ul class="floatL">
                            <li class="">Con intenci&oacute;n de armar pol&eacute;mica</li>
                            <li class="">Apolog&iacute;a de delito</li>
                            <li class="">Software spyware, malware, virus o troyanos</li>
                      
 </ul>


</div></div></div></div></div>





<div id="add-post" class="clearbeta">
	<div class="form-add-post">
		<form name="newpost" method="post" action="/edicion.php?id=<?=$id?>">

			<input name="key" value="<?=$key?>" type="hidden">
			<input name="id" value="<?=$id?>" type="hidden">
			<input name="borrador_id" value="" type="hidden">
			<ul class="clearbeta">
				<li>
					<label>Titulo</label>
					<span class="errormsg" style="display: none; right: 205px"></span>
					<input class="text-inp required" type="text" name="titulo" maxlength="60" value="<? echo $titulo?>" tabindex=<?=$contar++?> style="width: 410px" />

				</li>
				<li>
					<label>Contenido del Post</label>
					<span class="errormsg" style="display: none"></span>
					<textarea id="markItUp" name="cuerpo" class="required autogrow-big" style="min-height: 400px" tabindex=<?=$contar++?>><?echo $contenido?></textarea>
					<div id="emoticons" style="margin: 10px 0 0">
						<a href="#" smile=":)"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -286px; clip: rect(286px, 16px, 302px, 0px);" alt="sonrisa" title="sonrisa" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=";)"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -308px; clip: rect(308px, 16px, 324px, 0px);" alt="guiño" title="guiño" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>

						<a href="#" smile=":roll:"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -330px; clip: rect(330px, 16px, 346px, 0px);" alt="duda" title="duda" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=":P"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -352px; clip: rect(352px, 16px, 368px, 0px);" alt="lengua" title="lengua" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=":D"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -374px; clip: rect(374px, 16px, 390px, 0px);" alt="alegre" title="alegre" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=":("><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -396px; clip: rect(396px, 16px, 412px, 0px);" alt="triste" title="triste" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile="X("><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -418px; clip: rect(418px, 16px, 434px, 0px);" alt="odio" title="odio" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=":cry:"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -440px; clip: rect(440px, 16px, 456px, 0px);" alt="llorando" title="llorando" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=":twisted:"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -462px; clip: rect(462px, 16px, 478px, 0px);" alt="endiablado" title="endiablado" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=":|"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -484px; clip: rect(484px, 16px, 500px, 0px);" alt="serio" title="serio" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=":?"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -506px; clip: rect(506px, 16px, 522px, 0px);" alt="duda" title="duda" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>

						<a href="#" smile=":cool:"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -528px; clip: rect(528px, 16px, 544px, 0px);" alt="picaro" title="picaro" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=":oops:"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -550px; clip: rect(550px, 16px, 566px, 0px);" alt="timido" title="timido" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile="^^"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -572px; clip: rect(572px, 16px, 588px, 0px);" alt="sonrizota" title="sonrizota" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile="8|"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -594px; clip: rect(594px, 16px, 610px, 0px);" alt="increible!" title="increible!" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a href="#" smile=":F"><span style="position: relative;"><img src="<?=$images?>/big2.gif" style="position: absolute; top: -616px; clip: rect(616px, 16px, 632px, 0px);" alt="babaaa" title="babaaa" border="0"><img src="<?=$images?>/space.gif" style="width: 20px; height: 16px;" align="absmiddle" border="0"></span></a>
						<a style="float: right; margin: 5px 0pt 0pt;" onclick="window.open('/emoticones.php', '', 'width=180px,height=500px,scrollbars,resizable')" class="emoticons-more">M&aacute;s Emoticones</a>
					</div>
				</li>


				<li>
					<label>Tags</label>
					<span class="errormsg" style="display: none" tabindex=<?=$contar++?>></span>
					<input class="text-inp required" type="text" name="tags" value="<?php echo $tags; ?>" />
					Una lista separada por comas, que describa el contenido. Ej: gol, ingleses, Mundial 86, futbol, Maradona, Argentina

				</li>
				<li class="special-left clearbeta">
					<label>Categor&iacute;a</label>

					<span class="errormsg" style="display: none"></span>
					<select name="categoria" class="agregar required" size="9" tabindex=<?=$contar++?>>
						<option style="color:#000;font-weight:bold;padding:3px 3px 3px 3px; background:none;" selected="selected" value="">Elegir una categor&iacute;a</option>


<?php
$sql	=	"SELECT id_categoria, nom_categoria, link_categoria FROM categorias ORDER BY nom_categoria asc";
$rs		=	mysql_query($sql, $con);
while	($row	=	mysql_fetch_array($rs))
{
$categ = $row['id_categoria'];
?>
<option <? if ($categ==$categoria) { echo ' selected="true"'; }?> class="<?=$row['link_categoria']?>" value="<?=$categ?>"><?=$row['nom_categoria']?></option>
<?
}
?>
								</select>
</li>
<?php if($moder2['rango']!=11)
{
?>
				<li class="special-right clearbeta">
					<label>Opciones</label>

					<div class="option clearbeta">
						<input class="floatL" type="checkbox" <?php if($privado=='on'){echo'checked="checked "';}?> name="privado" tabindex="<?=$contar++?>" />
						<p class="floatL">

							<strong>Solo usuarios registrados</strong>
							Tu post ser&aacute; visto solo por los usuarios que tengan cuenta en <?=$comunidad?>
						</p>
					</div>					<div class="option clearbeta">
						<input class="floatL" type="checkbox" <?php if($coments=='on'){echo'checked="checked "';}?> name="coments" tabindex="<?=$contar++?>" />
						<p class="floatL">
							<strong>Cerrar Comentarios</strong>
							Si tu Post es pol&eacute;mico ser&iacute;a mejor que cierres los comentarios.
						</p>

					</div>
<?php
}
?>
<?php
	
if($moder2['rango']==100 or $moder2['rango']==255){
echo'<input type="hidden" name="rango" value="'.$rango.'">';
echo'<label>Causa de la edici&oacute;n:</label>
<input size="50" maxlength="50" name="causa" value="" tabindex="'.$contar++.'" type="text">';}
?>
				</li>
			</ul>
        <div class="end-form clearbeta">
				<input class="mBtn btnGreen" style="width:auto; margin-left: 5px" type="button" value="Continuar &raquo;" name="preview" />
				<input class="mBtn btnOk floatL" type="button" value="Guardar a Borradores" onclick="save_borrador()" />
				<div id="borrador-guardado" style="float: right; font-style: italic; margin: 7px 0 0"></div>
			</div>
		</form>
	</div>
	


<style>

#add-post h2 {
    margin: 5px 0 10px 0;
}

.form-add-post {
    background: #EEE;
    width: 100%;
    border-top: 5px solid #2d7bcc;
    float: left;
}

.sidebar-add-post {
    background: #fff6ca;
    padding: 8px;
    border-top: 5px solid #ff7a00;
    position: relative;
}

.form-add-post form {
    padding: 0;
    width: 770px;
    margin: 30px auto;
}
.form-add-post li {
    margin: 0 0 15px 0;
}

.form-add-post label {
    font-weight: bold;
    font-size: 16px;
  display: block;
  padding: 5px 0;
}

.form-add-post label span {
    color: #165a9e;
}


.form-add-post input.text-inp, .form-add-post textarea, .form-add-post iframe {
    display: block;
  padding:5px;
  width: 760px;
  background: #FFF!important;
}

.form-add-post input.text-inp.selected,.form-add-post input.text-inp:active,.form-add-post input.text-inp:focus,
.form-add-post textarea.selected,.form-add-post textarea:focus,.form-add-post textarea:active,
.form-add-post iframe.selected,.form-add-post iframe:focus,.form-add-post iframe:active {
    -moz-box-shadow:0 0 5px #0066FF!important;
    -webkit-box-shadow:0 0 5px #0066FF!important;
    box-shadow:0 0 5px #0066FF!important;
    border:1px solid #0066FF!important;
}

.form-add-post input.text-inp:hover, .form-add-post textarea:hover, .form-add-post iframe:hover {
    -moz-box-shadow:0 0 5px #CCC;
    -webkit-box-shadow:0 0 5px #CCC;
    box-shadow:0 0 5px #CCC;
    border:1px solid #CCC;
}


.form-add-post textarea, .form-add-post iframe {
    height: 150px;
}

.form-add-post select {
    width:300px
}

.form-add-post .special-right {
    float: right;
    width: 300px;
}

.form-add-post .special-left {
    float: left;
    width: 300px;
}

.special-left label, .special-right h2 {
    margin-bottom: 5px;
}
.form-add-post option {
    padding: 3px 3px 3px 28px;
 
    background:transparent url('/images/big1v12.png') no-repeat scroll left top;
}

.form-add-post option a.privado {
    padding-left: 17px;
    background-position: -3px 0px;
}

.form-add-post option.juegos,#izquierda  .form-add-post option.jogos {
    background-position: 5px -41px;
}

.form-add-post option.imagenes,#izquierda  .form-add-post option.imagens {
    background-position: 5px -62px;
}

.form-add-post option.links {
    background-position: 5px -86px;
}

.form-add-post option.videos {
    background-position: 5px -110px;
}

.form-add-post option.arte {
    background-position: 5px -132px;
}

.form-add-post option.offtopic {
    background-position: 5px -152px;
}

.form-add-post option.animaciones,#izquierda  .form-add-post option.animacoes {
    background-position: 5px -174px;
}

.form-add-post option.musica {
    background-position: 5px -196px;
}

.form-add-post option.downloads {
    background-position: 5px -217px;
}

.form-add-post option.noticias {
    background-position: 5px -240px;
}

.form-add-post option.info {
    background-position: 5px -284px;
}

.form-add-post option.tv-peliculas-series, .form-add-post option.tv-filmes-e-series {
    background-position: 5px -305px;
}

.form-add-post option.patrocinados {
    background-position: 5px -332px;
}

.form-add-post option.poringueras,#izquierda  .form-add-post option.poringueiras {
    background-position: 5px -418px;
}

.form-add-post option.gay {
    background-position: 5px -507px;
}
.form-add-post option.relatos {
    background-position: 5px -528px;
}

.form-add-post option.linux {
    background-position: 5px -547px;
}

.form-add-post option.deportes, .form-add-post option.esportes {
    background-position: 5px -572px;
}

.form-add-post option.celulares {
    background-position: 5px -593px;
}

.form-add-post option.apuntes-y-monografias,#izquierda  .form-add-post option.monografias {
    background-position: 5px -614px;
}

.form-add-post option.comics, .form-add-post option.quadrinhos {
    background-position: 5px -637px;
}

.form-add-post option.solidaridad,#izquierda  .form-add-post option.solidariedade {
    background-position: 5px -661px;
}

.form-add-post option.recetas-y-cocina, .form-add-post option.cozinhas-e-receitas {
    background-position: 5px -678px;
}

.form-add-post option.mac {
    background-position: 5px -702px;
}

.form-add-post option.femme, .form-add-post option.mulher {
    background-position: 5px -724px;
}

.form-add-post option.autos-motos,#izquierda  .form-add-post option.carros-e-motos {
    background-position: 5px -744px;
}

.form-add-post option.humor {
    background-position: 5px -767px;
}

.form-add-post option.ebooks-tutoriales, .form-add-post option.ebooks-e-tutoriais {
    background-position: 5px -789px;
}

.form-add-post option.salud-bienestar, .form-add-post option.saude-bem-estar {
    background-position: 5px -808px;
}

.form-add-post option.Zincomienzo{
    background-position: 5px -438px;
}

.form-add-post option.economia-negocios {
    background-position: 5px -846px;
}

.form-add-post option.mascotas, .form-add-post option.bichos {
    background-position: 5px -866px;
}

.form-add-post option.turismo {
    background-position: 5px -890px;
}

.form-add-post option.manga-anime {
    background-position: 5px -912px;
}

.form-add-post option.ciencia-educacion {
    background-position: 5px -958px
}

.form-add-post option.hazlo-tu-mismo {
    background-position: 5px -935px
}

.form-add-post option.ecologia {
    background-position: 5px -459px
}

.form-add-post .option p {
    margin: 0 0 10px 5px;
    color: #777;
    width: 260px;
}



.form-add-post .option p strong {
    display: block;
    color: #000;
}

.end-form {
    background: #f6f6f6;
    border-top: 1px solid #d1d1d1;
    padding: 8px;
}

.sidebar-add-post p span.stitle {
    margin: 0;
    font-size: 14px;
    color: #3f3f0d;
    font-weight: normal;
}

.sidebar-add-post p {
    color: #737317;
}

.sidebar-add-post ul {
    margin-bottom: 10px;
}

.sidebar-add-post ul li  {
    padding: 3px 0 3px 20px;
    background: url('/images/cross-button.png') no-repeat 0 3px;
    color: #737317;
}

.sidebar-add-post ul li.correct  {
    background: url('/images/tick-button.png') no-repeat 0 3px;
}

.form-add-post .markItUpHeader {
    height: 26px;
    padding: 5px;
    width: 760px;
    background: #3a3a3a;
    -moz-border-radius: 5px 5px 0 0;
    -webkit-border-radius: 5px 5px 0 0;
    border: 1px solid #1f1f1f;
}

.form-add-post .markItUpHeader ul li {
    margin: 0 2px 0 0;
}

.form-add-post .markItUp a {
	background-image: url('/images/bbcodes2.png');
	background-position-x: 0;
}

.form-add-post .markItUp .markItUpButton1 a { background-position: 0 -78px }
.form-add-post .markItUp .markItUpButton2 a {	background-position: 0 -104px }
.form-add-post .markItUp .markItUpButton3 a {	background-position: 0 -312px}
.form-add-post .markItUp .markItUpButton4 a {	background-position: 0 0}
.form-add-post .markItUp .markItUpButton5 a {	background-position: 0 -26px}
.form-add-post .markItUp .markItUpButton6 a {	background-position: 0 -52px}
.form-add-post .markItUp .markItUpButton7 a {	background-position: 0 -338px}
.form-add-post .markItUp .markItUpButton8 a {	background-position: 0 -364px}
.form-add-post .markItUp .markItUpButton9 a {	background-position: 0 -286px}
.form-add-post .markItUp .markItUpButton10 a { background-position: 0 -130px}
.form-add-post .markItUp .markItUpButton11 a { background-position: 0 -78px}
.form-add-post .markItUp .markItUpButton12 a { background-position: 0 -182px}
.form-add-post .markItUp .markItUpButton13 a { background-position: 0  -208px}
.form-add-post .markItUp .markItUpButton14 a { background-position: 0 -234px}
.form-add-post .markItUp .markItUpButton15 a { background-position: 0 -260px}

.form-add-post .markItUp .markItUpButton1 a:hover { background-position: -25px -78px }
.form-add-post .markItUp .markItUpButton2 a:hover {	background-position: -25px -104px }
.form-add-post .markItUp .markItUpButton3 a:hover {	background-position: -25px -312px}
.form-add-post .markItUp .markItUpButton4 a:hover {	background-position: -25px 0}
.form-add-post .markItUp .markItUpButton5 a:hover {	background-position: -25px -26px}
.form-add-post .markItUp .markItUpButton6 a:hover {	background-position: -25px -52px}
.form-add-post .markItUp .markItUpButton7 a:hover {	background-position: -25px -338px}
.form-add-post .markItUp .markItUpButton8 a:hover {	background-position: -25px -364px}
.form-add-post .markItUp .markItUpButton9 a:hover {	background-position: -25px -286px}
.form-add-post .markItUp .markItUpButton10 a:hover { background-position: -25px -130px}
.form-add-post .markItUp .markItUpButton11 a:hover { background-position: -25px -78px}
.form-add-post .markItUp .markItUpButton12 a:hover { background-position: -25px -182px}
.form-add-post .markItUp .markItUpButton13 a:hover { background-position: -25px  -208px}
.form-add-post .markItUp .markItUpButton14 a:hover { background-position: -25px -234px}
.form-add-post .markItUp .markItUpButton15 a:hover { background-position: -25px -260px}


.form-add-post .markItUp .markItUpButton1 a:active { background-position: -50px -78px }
.form-add-post .markItUp .markItUpButton2 a:active {	background-position: -50px -104px }
.form-add-post .markItUp .markItUpButton3 a:active {	background-position: -50px -312px}
.form-add-post .markItUp .markItUpButton4 a:active {	background-position: -50px 0}
.form-add-post .markItUp .markItUpButton5 a:active {	background-position: -50px -26px}
.form-add-post .markItUp .markItUpButton6 a:active {	background-position: -50px -52px}
.form-add-post .markItUp .markItUpButton7 a:active {	background-position: -50px -338px}
.form-add-post .markItUp .markItUpButton8 a:active {	background-position: -50px -364px}
.form-add-post .markItUp .markItUpButton9 a:active {	background-position: -50px -286px}
.form-add-post .markItUp .markItUpButton10 a:active { background-position: -50px -130px}
.form-add-post .markItUp .markItUpButton11 a:active { background-position: -50px -78px}
.form-add-post .markItUp .markItUpButton12 a:active { background-position: -50px -182px}
.form-add-post .markItUp .markItUpButton13 a:active { background-position: -50px  -208px}
.form-add-post .markItUp .markItUpButton14 a:active { background-position: -50px -234px}
.form-add-post .markItUp .markItUpButton15 a:active { background-position: -50px -260px}
.form-add-post .markItUp .markItUpButton15 a:active,.form-add-post .markItUp .markItUpButton15.selected a { background-position: -50px -156px}


.form-add-post .markItUpHeader ul li:hover {
    background: none!important;
}
.form-add-post .markItUp  .markItUpSeparator { background: none;
    width: 8px;
    text-indent: -9999px;
}

.form-add-post .markItUpHeader ul a {
    width: 25px!important;
    height: 26px!important;
    margin: 0!important;
}

.form-add-post .markItUpHeader ul li {
    height: 26px;
    width: 25px;
}
/*
li.markItUpButton7 ul {
    display: block!important;
}
*/
.form-add-post .markItUpHeader ul ul {
    top: 24px;
    border: 1px solid #000;
    -moz-border-radius: 0 5px 5px 5px;
    -moz-box-shadow: 0 0 6px #000000;
    -webkit-border-radius: 0 5px 5px 5px;
    -webkit-box-shadow: 0 0 6px #000000;
}

.form-add-post .markItUpHeader ul ul li a {
    background: #000;
}

.form-add-post .markItUpHeader ul ul li {
    display: block;
    height: auto;
    margin: 0;
    width: auto;
    border-bottom: 1px solid #000;
    border-top: 1px solid #555;
}

.form-add-post .markItUpHeader ul li.markItUpButton7 ul  li a {
    width: 90px!important;
    text-shadow: 0 1px 0 #000;
}

.form-add-post .markItUpHeader ul li.markItUpButton8 ul li a {
    width: 90px!important;
    color: #FFF;
}

.form-add-post .markItUpHeader ul li.markItUpButton9 ul li a {
    width: 120px!important;
        color: #FFF;
}


.form-add-post .markItUpHeader ul ul li a {
    background: #222;
    width: auto!important;
    padding: 8px;
    height: auto!important;
}
.error
 {
    position: relative;
}

.errormsg{
    position: absolute;
    top: 0;
    right: 0;
    color: red;
}

.markItUpButton11 {
    display: none;
}
body .form-add-post form li.error input,.error textarea {

-moz-box-shadow:0 0 5px #e20404!important;
-webkit-box-shadow:0 0 5px #e20404!important;
box-shadow:0 0 5px #e20404!important;
border:1px solid #e20404!important;
}

#mydialog.preview #buttons {
    padding: 0 !important;
    margin: -10px 10px 10px !important;
}

#mydialog.preview #dialog #title {
    display: none !important;
}

iframe.markItUpEditor {
    border: 1px solid #ccc;
    overflow: auto !important
}
#markItUp.hide, iframe.hide {
    position: absolute;
    top: -9999px;
    visibility: hidden;
}

.consejos-view-more-button {
background: none repeat scroll 0 0 #B59704;
 border-radius: 5px 5px 5px 5px;
 color: #FFFFFF;
 display: block;
 float: right;
 font-weight: bold;
 margin-left: 10px;
 margin-top: 8px;
 padding: 5px 10px;
 vertical-align: middle;
}
.betad a {
    
    font-size: 14px;padding:12px;background:#e0ffba;color:#456f13;display:block; font-weight: bold;text-align: center;
    margin-top: 10px;
}

.betad #leave-beta {
        font-size: 14px;padding:12px;background:#CCC;color:#333;display:block; font-weight: bold;text-align: center;
    
}
</style>

<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
</div>
<?
}else{
fatal_error('Este post no te pertenece y no puedes editarlo!');}

pie();
?>
