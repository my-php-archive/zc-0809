<?php
include("../header.php");
$titulo	=	$descripcion;
cabecera_normal();

$id = $_SESSION['id'];
$id_user = $_SESSION['id'];

if(empty($id_user)){
fatal_error('No puedes agregar una Definici&oacute;n si no logueado','Ir a la p&aacute;gina principal','location.href=\'/\'','Error!');}

$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];

$sqlavatar = mysql_fetch_array(mysql_query("SELECT avatar FROM usuarios WHERE id='$id'"));
$avatar = $sqlavatar['avatar'];

$sqlultimaip = mysql_fetch_array(mysql_query("SELECT ultimaip FROM usuarios WHERE id='$id'"));
$ultimaip = $sqlultimaip['ultimaip'];

?>

<div id="cuerpocontainer">

<!-- inicio cuerpocontainer -->
<div id="preview" style="display:none"></div> 

<div id="add-post" class="clearbeta">

		




<div id="add-post" class="clearbeta">

	<div class="form-add-post">
		<form action="/definiciones/agregado.php" method="post">

			<ul class="clearbeta">
				<li>
					<label>T&iacute;tulo</label>

					<span class="errormsg" style="display: none; right: 205px"></span>
					<input class="text-inp required" type="text" name="titulo" maxlength="60" tabindex="1" style="width: 410px" />

				</li>

				<li>
					<label>Contenido de la Definici&oacute;n</label>

<span class="errormsg" style="display: none"></span>

<textarea id="markItUp" name="cuerpo" class="required autogrow-big" style="min-height: 400px" tabindex="2"></textarea>


</div>

<br><br>
<div style="text-align:center">


<div class='end-form clearbeta'>
				
			        <input class='mBtn btnGreen' style='width:auto; margin-left: 5px' type='submit' href="javascript:Validar();" value="Agregar &raquo;" title="Agregar &raquo;"/>
				<div id='borrador-guardado' style='float: right; font-style: italic; margin: 7px 0 0'></div>
			</div>


</div>

<div class="clearfix"></div>

		</div>
		<div class="content-tabs perfil" style="display: none">
			<h3 onclick="cuenta.chgsec(this)" class="active">1. M&aacute;s sobre mi</h3>
			<fieldset>
				<div class="alert-cuenta cuenta-2">
				</div>
				<div class="field">

<input type="text" name="ultimaip" value="<?=$ultimaip?>">
<input type="text" name="nick" value="<?=$nick?>">
<input type="text" name="avatar" value="<?=$avatar?>"></div>
      



		</form>
</div>
</div>


<div style="clear:both"></div>
<!-- fin cuerpocontainer -->


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
    background: url('http://o1.t26.net/images/cross-button.png') no-repeat 0 3px;
    color: #737317;
}

.sidebar-add-post ul li.correct  {
    background: url('http://o1.t26.net/images/tick-button.png') no-repeat 0 3px;
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
	background-image: url('http://zincomienzo.net/images/bbcodes2.png');
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

<?php
pie();
?>
