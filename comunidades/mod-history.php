<?php
include("../header.php");
cabecera_comunidad();
if ($manten['Estado']==0 or $rangoz['rango']==255 or $rangoz['rango']==100){
if($_SESSION['user']==null){
fatal_error('No pod&eacute;s ver el historial de moderaci&oacute;n si no est&aacute;s autentificado');
}
echo'<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->

<title>A</title>
<div class="comunidades">

<div class="breadcrump">
<ul>
<li class="first"><a href="/comunidades/" title="Comunidades">Comunidades</a></li><li>Historial de moderaci&oacute;n</li><li class="last"></li>
</ul>
</div>

	<div style="clear:both"></div>




	<div id="resultados" style="width:100%">
    <table class="linksList">
	<thead>
            <tr>
                <th>Comunidad > Tema</th>
                <th>Acci&oacute;n</th>
                <th>Moderador</th>

                <th>Causa</th>
            </tr>
        </thead>
	<tbody>
            <tbody>
';



$sqlhist=$db->query("SELECT pe.accion, pe.id_modera, pe.id_post, pe.causa, pe.fecha, pe.id_comunidad, po.*, us.*, cc.*
		FROM (c_temas_eliminados AS pe, usuarios AS us, c_temas as po, c_comunidades as cc)
		WHERE pe.id_modera=us.id
		AND pe.id_post=po.idte
	    AND po.idcomunid=cc.idco
		ORDER BY pe.id desc
		LIMIT 20");
while($mod=$db->fetch_array($sqlhist))
{

$nombrecom = mysql_query("select * from c_comunidades where idco = '{$mod['id_comunidad']}'");//Generamos la consulta ::)

$que = mysql_fetch_assoc($nombrecom);//Para imprimir ::)

echo'
	<tr>';
	if($rangoz['rango']==255 or $rangoz['rango']==100 or $mod['accion']==2 or $rangoz['rango']==655 or $rangoz['rango']==755 or $rangoz['rango']==11 or $rangoz['rango']==96 or $rangoz['rango']==678 or $rangoz['rango']==14 or $rangoz['rango']==12 or $rangoz['rango']==13 or $rangoz['rango']==15 or $rangoz['rango']==16 ){echo'





 <td style="text-align: left;">


       ';


       echo'


<span class="titlePost">'.$mod['titulo'].'</span><br>En <a href="/comunidades/'.$mod['shortname'].'/">'.$que['nombre'].'</a>

                    <td>';}else


{echo'</td>';}
	





echo' '.historial($mod['accion']).' </td>
		<td><a href="/perfil/'.$mod['nick'].'/">'.$mod['nick'].'</a></td>
		<td>
        '.$mod['causa'].'
		</td>

        <td>

        </td>
	</tr>
	<tr>';
}
echo'
</tbody>

        </tbody>
    </table>
</div>




</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
';
pie();
}else{
echo'
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<center>
<br />

<span style="font-size:13px;font-weight: bold;">Estamos realizando algunas mejoras en el sistema, volveremos en unos minutos..</span><br />

<br />
<img src="'.$images.'/images/mejorastecnicas.png" title="Haciendo mejoras" hspace="15" vspace="15" />
<br /><div style="clear:both"></div>
<!-- fin cuerpocontainer -->';
pie();
}
?>