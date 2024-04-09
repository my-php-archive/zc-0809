<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
?>
<!-- inicio cuerpocontainer -->
<?php include("cuenta/menu.php");?>
	<div id="form_div">
				<div class="container702 floatR">
			<br />
			<div class="container400" style="margin: 10px auto 0 auto;">
				<div class="box_title">

					<div class="box_txt cuenta_alerta">Confirmaci&oacute;n</div>
					<div class="box_rrs"><div class="box_rss"></div></div>
				</div>
				<div class="box_cuerpo" style="text-align: center">
					<br>
					Los cambios fueron aceptados y ser&aacute;n aplicados en los pr&oacute;ximos minutos					<br />

					<br />
				<input type="button" class="login" style="font-size:11px" value="Volver" title="Volver" onclick="location.href='/cuenta/'">				<input type="button" class="login" style="font-size:11px" value="Ir a p&aacute;gina principal" title="Ir a p&aacute;gina principal" onclick="location.href='/'">				</div>
			</div>
		</div>
	</div>
	<br clear="left">

<?
pie();
?>