<?php
include("header.php");
$titulo	= "Noticias Publicadas";
cabecera_normal();
?>


<div id="cuerpocontainer">

<center><img src="/images/noticia.png" /></center>

<br>
<div class="box_title">
<div class="box_txt webs_amigas">En Esta Seccion Podras Ver Las Noticias Que Fueron Realizadas En Zincomienzo!</div>
<div class="box_rss"></div>
</div>
<div class="box_cuerpo">





<?php
$preg = 'SELECT * FROM noticias order by id desc limit 10';
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   {
echo'<center><div class="bienvm"><span style="color: #FF0000;">'.$row['titulo'].'</span></div><br>
'.BBparse($row['detalle']).'
<hr>
Enviado el '.$row['fecha'].' a las '.$row['hora'].'</center>';


 } ?>


</div>


<?php

pie();

 ?>