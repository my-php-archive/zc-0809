<?php
include('../header.php');
$titulo	=	$descripcion;
cabecera_normal();
$id_user = $_SESSION['id'];
$name = xss(no_i($_GET['name']));

if(empty($name)){
fatal_error('Especifica una carpeta','Centro de mensajes','location.href=\'/mensajes/\'','Atenci&oacute;n');}

if(empty($id_user)){
fatal_error('Para ingresar a esta secci&oacute;n es necesario autentificarse.','Ir a la p&aacute;gina principal','location.href=\'/\'','Atenci&oacute;n');}

$sql = mysql_query("SELECT * FROM carpmp WHERE name='$name' AND user_creator='$id_user'");
if(!mysql_num_rows($sql)){
fatal_error('No existe esa carpeta','Centro de mensajes','location.href=\'/mensajes/\'','Atenci&oacute;n');}

$mp = mysql_fetch_array($sql);
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<?php
include('menu.php');
?>
<form name="mensajes" method="GET">
		<div class="container702 floatR">
			<div id="m-mensaje" style="display:none;"></div>
      <div class="box_title">
				<div class="box_txt mensajes_titulo">Carpeta: <?=$name?></div>
				<div class="box_rss"></div>
			</div>
			
			<div class="box_cuerpo" style="padding:0">

				<div class="m-top">
					<div class="m-opciones"></div>
					<div class="m-remitente">Remitente</div>
										<div class="m-asunto">Asunto</div><div class="m-fecha">Fecha</div>
				</div>

<?php
$i = 0;

$_pagi_sql = "SELECT m.id_mensaje, m.asunto, m.fecha, m.id_receptor, m.leido_receptor, s.nick
			  FROM mensajes as m
			  INNER JOIN usuarios as s
			  ON m.id_emisor = s.id
			  WHERE m.id_receptor = '".$id_user."' AND m.id_carpeta='".$mp['id']."' AND m.papelera_receptor='0' AND m.eliminado_receptor='0'
			  ORDER BY id_mensaje DESC";

$rs = mysql_query($_pagi_sql, $con);
if (mysql_num_rows($rs)!=0){

$_pagi_cuantos = 10;
include('paginator.inc.php');

while($row = mysql_fetch_array($_pagi_result)){
?>
		<div class="m-linea-mensaje<? if($row['leido_receptor']==0) {echo "";} else {echo "-open";}?>">
					<div class="m-opciones-open"><input name="i_<?=$i?>" type="checkbox" value="<?=$row['id_mensaje']?>"> <a href="/mensajes/leer/<?=$row['id_mensaje']?>" alt="Leer mensaje" title="Leer mensaje"><img src="<?=$images?>/icon-email<? if($row['leido_receptor']==0) {echo "";} else {echo "-open";}?>.png" align="texttop" border="0"></a></div>
					<div class="m-remitente-open"><a href="/perfil/<?=$row['nick']?>" alt="Ver Perfil" title="Ver Perfil"><?=$row['nick']?></a></div>

										<div class="m-asunto-open"><a href="/mensajes/leer/<?=$row['id_mensaje']?>" alt="Leer mensaje" title="<?=$row['asunto']?>"><?=$row['asunto']?></a></div>
					<div class="m-fecha-open"><?=$row['fecha']?></div>
				</div>
<?php
$i++;}
}else{echo'
<div class="m-linea-mensaje">
Nada por aqu&iacute;...</div>';}
?>
				<div class="m-bottom">
				<div class="m-seleccionar">
Seleccionar: <a class="m-seleccionar-text" href="#" onclick="mensajes_check(1);return false;">Todos</a>, <a class="m-seleccionar-text" href="#" onclick="mensajes_check(2);return false;">Ninguno</a>, <a class="m-seleccionar-text" href="#" onclick="mensajes_check(3);return false;">Le&iacute;dos</a>, <a class="m-seleccionar-text" href="#" onclick="mensajes_check(4);return false;">No le&iacute;dos</a>, <a class="m-seleccionar-text" href="#" onclick="mensajes_check(5);return false;">Invertir</a>
				  </div>
					<div class="m-borrar">

<input type="button" class="button" value="Eliminar" onclick="mensajes_eliminar('<?=$id_user?>')">
							<select name="marcar" onchange="mensajes_acciones('<?=$id_user?>')">
								<option value="0">Acciones:</option>
								<option value="L">Marcar como le&iacute;do</option>
								<option value="NL">Marcar como no le&iacute;do</option>
							</select> 

</div>
<?php echo "".$_pagi_navegacion."";?>
				  				</div>
								</div>
		</form>
		</div>
	<div style="clear:both"></div>
<?php
pie();
?>