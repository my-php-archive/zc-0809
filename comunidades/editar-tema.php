<?php
include("../header.php");
$key = $_SESSION['id'];
$nameuser = $_SESSION['user'];
$id =  xss(no_i($_GET['id']));

$cosql=mysql_query("SELECT te.*,co.*,us.id,us.nick,us.avatar,us.pais as paisu,us.sexo,ca.*,cm.* FROM c_temas te LEFT JOIN c_comunidades co ON co.idco=te.idcomunid LEFT JOIN usuarios us ON us.id=te.id_autor LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria LEFT JOIN c_miembros cm ON cm.idcomunity=co.idco and cm.iduser='{$key}' and estado='0' WHERE te.idte='{$id}'");
$co=mysql_fetch_array($cosql);
mysql_free_result($cosql);
$id_comuni = $co['idco'];
$id_tema = $co['idte'];
$titulo	= $co['titulo'];
cabecera_comunidad();



if($co['id_autor']==$key or $co['rangoco']==5 or $co['rangoco']==4 ){
visitascomunidad($id_tema, $co['nick']);
echo'
<div id="cuerpocontainer">
<div class="comunidades">
<div class="breadcrump">
<ul>
<li class="first"><a href="/comunidades/" title="Comunidades">Comunidades</a></li><li><a href="/comunidades/home/'.$co['link_categoria'].'/" title="'.$co['nom_categoria'].'">'.$co['nom_categoria'].'</a></li><li><a href="/comunidades/'.$co['shortname'].'/" title="'.$co['nombre'].'">'.$co['nombre'].'</a></li><li><a href="/comunidades/'.$co['shortname'].'/'.$co['idte'].'/'.$co['titulo'].'.html" title="'.$co['titulo'].'">'.$co['titulo'].'</a></li><li>Editar tema</li><li class="last"></li>
</ul>
</div>

	<div style="clear:both"></div>


<div id="izquierda">
<div class="comunidadData'.($co['oficial']=='1' ? ' oficial' : '').'">
<div class="box_title">
<div class="box_txt post_autor">Comunidad</div>
<div class="box_rss"></div>
</div>
<div class="box_cuerpo">'.($co['oficial']=='1' ? '<img src="'.$images.'/riboon_top.png" class="riboon" />' : '').'
	  <div class="avaComunidad">
    <a href="/comunidades/'.$co['shortname'].'/">
      <img class="avatar" src="'.$co['imagen'].'" alt="Logo de la comunidad" title="Logo de la comunidad" onerror="com.error_logo(this)" />
    </a>
  </div>

<h2><a href="/comunidades/'.$co['shortname'].'/">'.$co['nombre'].'</a></h2>

<hr class="divider" />
<ul>
  <li><a href="/comunidades/'.$co['shortname'].'/miembros/"><span id="cont_miembros">'.$co['numm'].'</span> Miembros</a></li>
  <li>'.$co['numte'].' Temas</li>
</ul>';
if($key==$co['iduser'] and $_SESSION['user']!=null){
echo'<hr class="divider" />	Mi rango: <b>'.rangocomunidad($co['rangoco']).'</b>';
}
echo'
<hr class="divider" />
<div class="buttons">';
if($key==$co['iduser'] and $_SESSION['user']!=null){
	echo'<input id="a_susc" class="mBtn btnCancel" onclick="com.miembro_del()" value="Dejar Comunidad" type="button" />';
}else{
	echo'<input id="a_susc" class="mBtn btnGreen" onclick="com.miembro_add()" value="Participar" type="button" />';
}
echo'
</div>
</div>
</div>';
if($co['rangoco']==5){
	echo'<br class="spacer" />
<div class="adminOpt">
  <div class="box_title">
		<div class="box_txt" style="width:142px">Administraci&oacute;n</div>
		<div class="box_rss"></div>
	</div>
	<div class="box_cuerpo">

	  <ul>
			<li><input type="button" value="Editar comunidad" onclick="location.href=\'/comunidades/'.$co['shortname'].'/editar/\'" class="mBtn btnYellow" /></li>
    </ul>
	</div>
</div>';
}
echo'
<br class="spacer" />
<div class="ads120-240">
<!-- Pub -->
</div>
</div>

<div id="centroDerecha">
<script type="text/javascript">

function showError(obj, str) {
            //console.log(obj);
            if (obj.tagName.toLowerCase() == \'textarea\') {
		obj = $(obj).parent().parent().parent();
            }
            $(obj).parent().find(\'span\').addClass(\'error\').html(str).show();
            $.scrollTo($(obj).parent(), 500);}

function hideError(obj) {
            if (obj.tagName.toLowerCase() == \'textarea\') {
		obj = $(obj).parent().parent().parent();
            }
            $(obj).parent().find(\'span\').removeClass(\'error\').html(\'\').hide();
    }

    jQuery(document).ready(function($){

	$(\'.required\').bind(
		\'keyup change\',
		function(){
			if ($.trim($(this).val())) {
				hideError(this);
			}
		}
	);

$(\'input[name=preview]\').bind(
	\'click\',
		function(){
			var error = false;
				$(\'.required\').each(function(){
			if(!$.trim($(this).val())) {
				//console.log(this)
				showError(this, \'Este campo es obligatorio\');
				$(this).parent(\'li\').addClass(\'error\');
				error = true;
				return false;
		}
	});

	if (error) {
		return false;
	}

	if ($(\'textarea[name=cuerpo]\').val().length > 63206) {
		showError($(\'textarea[name=cuerpo]\').get(0), \'El tema es demasiado largo. No debe exceder los 65000 caracteres.\');
		return false;
	}

	if ($(\'textarea[name=cuerpo]\').val().indexOf(\'imageshack.us\') > 0) {
		showError($(\'textarea[name=cuerpo]\').get(0), \'No se permiten imagenes de IMAGESHACK.\');
		return false;
	}

			var tags = $(\'input[name=tags]\').val().split(\',\');

	if (tags.length < 4) {
		showError($(\'input[name=tags]\').get(0), \'Tienes que ingresar por lo menos 4 tags separados por coma.\');
		return false;
	}

		mydialog.close_button = true;
		mydialog.show();
		mydialog.title(\'Previsualizaci&oacute;n\');

		$.ajax({
			type: \'post\',
			url: \'/comunidades/tema_preview.php\',
			data: \'titulo=\' + encodeURIComponent($(\'input[name=titulo]\').val()) + \'&cuerpo=\' + encodeURIComponent($(\'textarea[name=cuerpo]\').val()),
			success: function(r) {

				mydialog.body(r);
				mydialog.buttons(true, true, \'Guardar cambios\', \'postSave()\', true, true, true, \'Cerrar previsualizaci\xf3n\', \'close\', true, false);
				mydialog.center();

				$(\'#mydialog #buttons .mBtn.btnOk\').removeClass(\'btnCancel\').addClass(\'btnGreen\');
			}
		});
	});
});

function postSave() {
	confirm = false;
	document.forms.add_tema.submit();}

</script>
	<div id="post_agregar" class="floatR">

	<div class="box_title">
		<div class="box_txt agregar_post">Editar tema</div>
		<div class="box_rss"></div>
	</div>
	<div id="mensaje-top">
    <a target="_blank" href="/protocolo/">Importante: antes de crear un post lee el protocolo.</a>
  </div>
	<div class="box_cuerpo">

		<div class="form-container">
			<form name="add_tema" method="post" action="/comunidades/edicion-tema.php?id='.$id.'" onsubmit="return validate_form(this, \'titulo,cuerpo,tags\')">
				<input type="hidden" name="key" value="947264" />
				<input type="hidden" name="temaid" value="293381" />
				<div class="data">
					<label for="uname">T&iacute;tulo</label>
					<input class="c_input" type="text" value="'.$co['titulo'].'" name="titulo" tabindex="1" datatype="text" dataname="Titulo" />
				</div>

				<div class="data">
					<label for="uname">Cuerpo</label>
					<textarea class="c_input_desc" id="markItUp" name="cuerpo" tabindex="8" datatype="text" dataname="Cuerpo">'.$co['cuerpo'].'</textarea>
				</div>
				
<input name="tags" type="hidden" value="zincomienzo1,zincomienzo2,zincomienzo3,zincomienzo4" tabindex="9" datatype="tags" dataname="Tags" />

		
				<div class="data postLabel">

					<label for="uname">Opciones</label><br /><br />
					<input type="checkbox" name="cerrado" id="check_cerrado" tabindex="11" '.($co['cerrado']=='on' ? ' checked' : '').' /> <label for="check_cerrado">No se permite responder</label><br />
					<input type="checkbox" name="sticky" id="check_sticky" tabindex="12" '.($co['importante']=='on' ? ' checked' : '').' /> <label for="check_sticky">Sticky</label><br />
				</div>
				<div style="text-align:center">
                <input class="mBtn btnGreen" style="width:auto; margin-left: 5px" type="button" value="Continuar &raquo;" name="preview" />

				</div>
			</form>
		</div>
	</div>
</div>

</div>
</div>


';
}
else
{
	fatal_error('Este Tema No Te Pertenece por Lo Cual No Puedes Editarlo');
}
pie();
?>
