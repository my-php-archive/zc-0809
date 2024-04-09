<?php 
include("header.php");
$titulo	= $descripcion;
cabecera_normal();
if($_SESSION['user']!=null){

?>



<script>

function eliminar_imagen(id){	$('#imagen_' + id).css('display','none');	$('#imagen_' + id).val('');	$('#eliminar_imagen_' + id).remove();	$('#br_' + id).remove();}function agregar_imagen(){	if(!window.imagenes_nuevas)		window.imagenes_nuevas=1;	else		++window.imagenes_nuevas;  	var imagen_nueva_input = document.createElement('input');	imagen_nueva_input.type = 'text';	imagen_nueva_input.id = 'imagen_nueva_' + imagenes_nuevas;	imagen_nueva_input.name = 'imagen_nueva_' + imagenes_nuevas;	imagen_nueva_input.size = 30;	imagen_nueva_input.maxlength = 64;	var imagen_nueva_boton_eliminar = document.createElement('input');	imagen_nueva_boton_eliminar.id = "eliminar_imagen_nueva_" + imagenes_nuevas;	imagen_nueva_boton_eliminar.type = "button";	imagen_nueva_boton_eliminar.value = "Eliminar";	imagen_nueva_boton_eliminar.setAttribute('onclick',"eliminar_imagen('nueva_" + imagenes_nuevas + "')");	document.getElementById('mis_imagenes').appendChild(imagen_nueva_input);	document.getElementById('mis_imagenes').appendChild(im
agen_nueva_boton_eliminar);	var br = document.createElement('br');	br.id = 'br_nueva_' + imagenes_nuevas;	document.getElementById('mis_imagenes').appendChild(br);}</script>	






<?php $useractual = mysql_fetch_array(mysql_query("SELECT * FROM `usuarios` WHERE id = '".$_SESSION['id']."'"));if($useractual['imagenes'] != ''){$explode = explode('@*', $useractual['imagenes']);$count = count($explode);for($i=0;$i<$count;$i++){echo '<input type="text" id="imagen_'.$i.'" name="imagen_'.$i.'" size="30" maxlength="64" value="'.$explode[$i].'"/> <input type="button" id="eliminar_imagen_'.$i.'" value="Eliminar" onclick="eliminar_imag



en('.$i.')" /><br id="br_'.$i.'" />';}}}?>