<?php
include("header.php");
cabecera_normal();
$key = $_SESSION['id'];

?>


 <?php
        if(!$key)
        {
          fatal_error("Para realizar esta operacion necesitas Loguearte.");
        }
        ?>

<div id="cuerpocontainer">

 <div id="izquierda">
<div class="box_title" style="_width:380px">
<div class="box_txt ultimos_posts">&Uacute;ltimas noticias.</div>
<div class="box_rss">
	<a href="/rss/ultimos-post">
		<span style="position:relative;z-index:87" class="systemicons sRss"></span>
	</a>
</div>
</div>
<!-- inicio posts -->
<div class="box_cuerpo">
<ul>
<?php
$sql = mysql_query("select * from news where importante = 1");
$cant = mysql_num_rows($sql);
while($row = mysql_fetch_assoc($sql)){

echo'<li class="categoriaPost sticky">
	<a href="/new.php?id='.$row['id'].'" target="_self" title="'.$row['titulo'].'" alt="'.$row['titulo'].'" class="categoriaPost Zincomienzo">'.$row['titulo'].'</a>
	</li>
    ';}
    $sql2 = mysql_query("select * from news where importante = 0");
    $cant2 = mysql_num_rows($sql2);
    while($row2 = mysql_fetch_assoc($sql2)){
    echo'
    <li class="categoriaPost zincomienzo">
    <a href="/new.php?id='.$row2['id'].'" target="_self" title="'.$row2['titulo'].'" class="">'.$row2['titulo'].'</a>
    </li> ';}

     echo'
    </ul></div></div>';



  ?>
<?
pie();
?>