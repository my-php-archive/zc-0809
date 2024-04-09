<?php
include('../header.php');
$id_user = $_SESSION['id'];
$titulo	=	$descripcion;

$id_mensaje = xss(no_i($_GET['mensaje']));
cabecera_normal();
 ?>

 <script type="text/javascript">
                $(document).ready(function(){
                    $(".denuncia_form").click(function(){
                           $.ajax({
                                    type: 'POST',
                                    url: '/denuncia-mp.php?id=<?=$id_mensaje?>',
                                    data: 'anick='+'Taringa'+'&aid='+2987+'&id='+9251469+'&t='+'Buscamos Dise?ador Interactivo',
                                    success: function(h){
					mydialog.mask_close = false;
                                        mydialog.close_button = true;
					mydialog.show();
                                        mydialog.title('Denunciar post');
                                        mydialog.body(h);
                                        mydialog.buttons(false);
                                        mydialog.center();
                                    },
                                    error: function(){
					mydialog.mask_close = false;
                                        mydialog.close_button = true;
                                        mydialog.show();
                                        mydialog.title('Denunciar post');
                                        mydialog.body('Hubo en error al procesar la denuncia, intentalo de nuevo');
                                        mydialog.buttons(true, true, 'Aceptar','close',true, false);
                                        mydialog.center();
                                    }
                           });
                      });
                 });
            </script>

           <?php




if ($_SESSION['user']==null){
fatal_error('Para ingresar a esta secci&oacute;n es necesario autentificarse.');}

$sql = "SELECT m.*, s.nick, s.id 
		FROM mensajes as m
		INNER JOIN usuarios as s
		ON m.id_emisor = s.id
		WHERE m.id_mensaje = '".$id_mensaje."' AND m.id_receptor = '".$id_user."'
		OR m.id_mensaje = '".$id_mensaje."' AND m.id_emisor = '".$id_user."'
		ORDER BY id_mensaje DESC";

$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

if(!mysql_num_rows($rs)){
fatal_error('Mensaje no encontrado','Centro de mensajes','location.href=\'/mensajes/\'','Error');}

mysql_close();

echo'<div id="cuerpocontainer">';

include('menu.php');
?>
<form name="mensaje" action="/mensajes/redactar/">
		<div class="container702" style="width:702px;float:left;padding-left:5px;">
			<div class="box_title">
				<div class="box_txt mensajes_ver" style="width:694px;height:2px;text-align:center;font-size:12px"><?=$row['asunto'];?></div>
				<div class="box_rss"></div>
			</div>
			<div class="box_cuerpo" style="width:686px">
				<div class="m-col1">De:</div>
				<div class="m-col2"><strong><a href="/perfil/<?=$row['nick']?>" alt="Ver Perfil" title="Ver Perfil"><?=$row['nick']?></a></strong></div>

				<div class="m-col1">Enviado:</div>
				<div class="m-col2"><?=$row['fecha']?></div> 
				<div class="m-col1">Asunto:</div>
				<div class="m-col2"><?=$row['asunto']?></div>
				<div class="m-col1">Mensaje:</div>
				<div class="m-col2m"><br /><?=bbparse($row['contenido'])?><br /></div>

				<br clear="left" />
			</div>
			<div class="m-bottom">
				<div class="m-borrar" style="width:700px;">
								<form name="responder" method="POST" action="redactar.php">
									<input type="hidden" name="para" value="<?=$row['nick']?>">
									<input type="hidden" name="asunto" value="<?="RE: ".$row['asunto']?>">
									<input type="button" class="button" value="Responder" onclick="submit();">&nbsp;
								</form>
				<input type="button" class="button" value="Eliminar" onclick="mensajes_eliminar<? if($row['papelera_receptor']=='1'){echo'_2';}?>('<?=$id_user?>','<?=$id_mensaje?>')">&nbsp;
				<input type="button" class="button" value="Marcar como no le&iacute;do" onclick="mensajes_acciones('<?=$id_user?>','<?=$id_mensaje?>')">



<?php
if($row['id_emisor']!=$id_user){
$rs = mysql_query("SELECT * FROM carpmp WHERE user_creator='$id_user'");

if(mysql_num_rows($rs)!=0){
			   echo'<select id="mover_a_carpeta" onchange="mensajes_mover_actual(\''.$id_user.'\',\''.$id_mensaje.'\',this.value)">
						<option value="0">Mover a la carpeta</option>';
while($mps = mysql_fetch_array($rs)){echo'
						<option value="'.$mps['id'].'">'.$mps['name'].'</option>';}
echo'</select>';}}
?>
				</div>
			</div>
		</div>
		</form>
		<br clear="left" />

<?php
if($row['id']==$id_user){
mysql_query("UPDATE mensajes SEY leido_emisor='1' WHERE id_mensaje='".$id_mensaje."' AND id_emisor='".$id_user."'");}
pie();
?>