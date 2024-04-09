<?php
include('../header.php');
$id_user = $_SESSION['id'];
$titulo	= $descripcion;
cabecera_normal();

if ($id_user==null){
fatal_error('Para acceder a esta secci&oacute; es necesario autentificarse');}
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<?php
include('menu.php');
?>    
<form name="entrada" method="POST" action="/acciones.php">
<input type="hidden" name="pag" value="<?=$_SERVER['REQUEST_URI']?>">

		<div class="container702 floatR">
			<div id="m-mensaje" style="display:none;"></div>
      <div class="box_title">
				<div class="box_txt mensajes_titulo">Carpeta: trash</div>
				<div class="box_rss"></div>
			</div>
			
			<div class="box_cuerpo" style="padding:0">
				<div class="m-top">

					<div class="m-opciones"></div>
					<div class="m-remitente">Remitente</div>
					<div class="m-destinatario">Destinatario</div>					
					<div class="m-asunto-carpetas">Asunto</div>
					<div class="m-fecha">Fecha</div>
				</div>
<?php
mysql_query("UPDATE mensajes SET eliminado_receptor='1' WHERE id_receptor='".$id_user."' AND papelera_receptor='1' AND (UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(fecha_papelera))>864000");

$_pagi_sql = "SELECT m.id_mensaje, m.asunto, m.fecha, m.id_receptor, m.leido_receptor, s.nick
			  FROM mensajes as m
			  INNER JOIN usuarios as s
			  ON m.id_emisor = s.id
			  WHERE m.id_receptor = '".$id_user."' AND m.papelera_receptor='1' AND m.eliminado_receptor='0'
			  ORDER BY id_mensaje DESC";

$_pagi_cuantos = 10;

include('paginator.inc.php');

$rs = mysql_query($_pagi_sql, $con);
if(mysql_num_rows($rs)!=0){
while ($row = mysql_fetch_array($_pagi_result)){
?>
			<div class="m-linea-mensaje<?if($row['leido_receptor']==0) echo ""; else echo "-open";?>">
					<div class="m-opciones<?if($row['leido_receptor']==0) echo ""; else echo "-open";?>"><input type="checkbox" name="m_<?=($row['leido_receptor']!='0' ? 'o' : 'c')?>_<?=$row['id_mensaje']?>"> <a href="/mensajes/leer/<?=$row['id_mensaje']?>" alt="Leer mensaje" title="Leer mensaje"><img src="<?=$images?>/icon-email<?if($row['leido_receptor']==0) echo ""; else echo "-open";?>.png" align="texttop" border="0"></a></div>
					<div class="m-remitente<?if($row['leido_receptor']==0) echo ""; else echo "-open";?>"><a href="/perfil/<?=$row['nick']?>" alt="Ver Perfil" title="Ver Perfil"><?=$row['nick']?></a></div>
					<div class="m-destinatario<?if($row['leido_receptor']==0) echo ""; else echo "-open";?>"><a href="/perfil/<?php echo $_SESSION['user'];?>" alt="Ver Perfil" title="Ver Perfil"><?php echo $_SESSION['user'];?></a></div>					<div class="m-asunto-carpetas-open"><a href="/mensajes/leer/<?=$row['id_mensaje']?>" alt="Leer mensaje" title="<?=$row['asunto']?>"><?=$row['asunto']?></a></div>
					<div class="m-fecha<?if($row['leido_receptor']==0) echo ""; else echo "-open";?>"><?=$row['fecha']?></div>
			</div>
<?php
}}else{echo'
<div class="m-linea-mensaje">
Nada por aqu&iacute;...</div>';}
?>
			<div class="m-bottom">
				  <div class="m-seleccionar">
Seleccionar: <a class="m-seleccionar-text" href="#" onclick="mensajes_check(1);return false;">Todos</a>, <a class="m-seleccionar-text" href="#" onclick="mensajes_check(2);return false;">Ninguno</a>, <a class="m-seleccionar-text" href="#" onclick="mensajes_check(3);return false;">Le&iacute;dos</a>, <a class="m-seleccionar-text" href="#" onclick="mensajes_check(4);return false;">No le&iacute;dos</a>, <a class="m-seleccionar-text" href="#" onclick="mensajes_check(5);return false;">Invertir</a>

				  </div>
					<div class="m-borrar">
<input type="button" class="button" value="Eliminar definitivamente" onclick="mensajes_eliminar_2('<?=$id_user?>')">
							<select name="marcar" onchange="mensajes_acciones('<?=$id_user?>')">
								<option value="0">Acciones:</option>
								<option value="L">Marcar como le&iacute;do</option>
								<option value="NL">Marcar como no le&iacute;do</option>

							</select> 
</div>
				  				</div>
<p style="text-align:center;"><a class="m-seleccionar-text" href="#" onclick="mensajes_vaciar_eliminados('<?=$id_user?>'); return false;">Vaciar la carpeta de Mensajes Eliminados ahora</a></p>
			</div>
		</div>
		</form>
	<div style="clear:both"></div>
<?php
pie();
?>