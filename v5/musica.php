<?php
require_once("funcion.php");
$titulo	= "Pruebas!";
cabecera_normal();




?>
 <style type="text/css">
 .avam {
margin: 5px;
border: 1px solid #CCC;
padding: 1px;
height: 100px;
width: 100px;
}
.avam:hover {
border: 1px solid black;
}
 </style>
 <link href="http://www.tscript.in/demo/Temas/default/css/fotos.css" rel="stylesheet" type="text/css" />
<div id="cuerpocontainer">
<?php cabecera_musica(); ?>


<!-- inicio cuerpocontainer -->


 <div id="izquierda">
<div class="box_title" style="_width:380px">
<div class="box_txt ultimos_posts">&Uacute;ltimas Canciones</div>
<div class="box_rss">
	<a href="/rss/ultimos-post">
		<span style="position:relative;z-index:87" class="systemicons sRss"></span>
	</a>
</div>
</div>
<div class="box_cuerpo">



<?php
$preg = 'SELECT * FROM musica order by id desc limit 20';
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>

      <?php echo'

      <li class="categoriaPost musica"><a href="/escuchar.php?id='.$row['id'].'" >'.$row['titulo'].'</a></li><hr>'?>


     <?php } ?>

    </div>




       </div> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /> </div>







<div style="clear:both">
<!-- fin cuerpocontainer -->


<?php

pie();
?>