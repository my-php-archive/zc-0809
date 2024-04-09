<?php
include("header.php");
?>
<?php
$sql = "select * from posts where id = '$id'";
$pres = mysql_query($sql);
while($row=mysql_fetch_assoc($pres)){
?>


<title><?php echo''.$row['titulo'].''; ?> - Zincomienzo! Imprimir post</title>

<style>
.header {border-top: 1px solid #999999;border-bottom: 1px solid #999999;padding: 10px;text-align: center;font-size: 20px;font-family: arial;margin-bottom: 20px;}
.cuerpo-impresion {font-family: arial;text-align: center;width: 960px;margin: 0 auto;border-left: 1px solid #999999;border-right: 1px solid #999999;border-bottom: 1px solid #999999;padding: 10px;}
</style>

<div class="cuerpo-impresion">
<div class="header"> Zincomienzo.net! -  Sumate a la Revolucion</div>

 <?php echo''.BBparse($row['contenido']).''; ?>
<br>
<div align="left">Post creado en <b>WWW.ZINCOMIENZO.NET</b></div></div>

<?php } ?>