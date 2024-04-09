<?php
include("header.php");
$titulo	=	"Imagenes";  
cabecera_normal();




?><div id="cuerpocontainer">
<link href="http://www.tscript.in/demo/Temas/default/css/fotos.css" rel="stylesheet" type="text/css" />

<!-- inicio cuerpocontainer -->              <script type="text/javascript" src="http://www.tscript.in/demo/Temas/default/js/fotos.js"></script>
				<style>
                
				</style>

                                
                <div id="centroDerecha" style="width: 630px; float: left;">
                	<div class="">
                        <h2 style="font-size: 15px;">&Uacute;ltimas fotos</h2>
                    </div>
                    <ul class="fotos-detail listado-content">

                                            	
                                            
                                           




<?php
$preg = 'SELECT * FROM imagenes order by id desc';
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '<li>
                        	<div class="avatar-box" style="z-index: 99;">
                            	<a href="/fotos/'.$row['id'].'">
                            		<img height="100" width="100" src="'.$row['url'].'"/>

                                </a>
                            </div>
                            <div class="notification-info">
                            	<span>
                                    <a href="/fotos/'.$row['id'].'">'.$row['titulo'].'</a><br /> 
                            		<span title="27.02.11 a las 21:03 hs." class="time"><strong>'.$row['fecha'].'</strong> - Por <a href="/perfil/'.$row['nick'].'">'.$row['nick'].'</a></span><hr />
                                    <span class="time">'.$row['detalle'].'</span>

                                </span>
                            </div>
                        </li>









'; ?>

     <?php } ?>









</ul>
                
</div>                

<div style="width: 300px; float: right;" id="post-izquierda">

 <?php

$mb=mysql_query("SELECT count(*) as cantidad FROM imagenes");
$mbz=mysql_fetch_array($mb);

$poz=mysql_query("SELECT count(*) as cantidad FROM comentariosimg");
$pos=mysql_fetch_array($poz);

$cmz=mysql_query("SELECT count(*) as cantidad FROM usuarios");
$com=mysql_fetch_array($cmz);


$cone=mysql_query("SELECT * FROM usuarios WHERE ultimaaccion>unix_timestamp()-2*60 ORDER BY ultimaaccion DESC");
$conez=mysql_num_rows($cone);



echo "





<div class='box_title'>
<div class='box_txt destacados'>Estadisticas!</div>

<div class='box_rss'></div>
</div>

<div class='box_cuerpo'>



<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr>
<td> 
<a href='/usuarios-online/' class='usuarios_online'><b><img src='/images/online-icono.png'> ".$conez." usuarios online</b></a></td>

<td><b><img src='/images/foto-icon.png'> ".$mbz['cantidad']."  Imagenes</b></td>
</tr>
<tr>
<td><b><img src='/images/comentarios-icono.png'> ".$pos['cantidad']." Comentarios</b></td>

<td><b><img src='/images/miembros-icono.png'> ".$com['cantidad']."  Miembros</b></td>

</tr>
</table>


</div>


";


?>


<br>




<center><a href="/agregar-imagen"><img src="/images/agregar-imagen.png"></a></center>






                               </div> <div class="clearBoth"></div>
	<!-- fin cuerpocontainer -->


<?php
pie();
?>
