<?php
include("header.php");
?>

<?php

$sql=mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 1");

while($row=mysql_fetch_array($sql)){


echo "Esta noticia fue agregada en ".$row[fecha]." a las ".$row[hora]."";




}  
?>


<?php
?>