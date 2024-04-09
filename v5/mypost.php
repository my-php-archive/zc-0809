<?php
include("header.php");
?>


<?php

$timba =  "select * from posts where id_autor = 274";
$tmb = mysql_query($timba);
$cantidad_inicial = mysql_num_rows($tmb);

$insertar = "insert into mypost (cantidad_post) values ('$cantidad_inicial')";
mysql_query($insertar);


$lala = "select * from usuarios where id = 274";
$sasa = mysql_query($lala);
while($row = mysql_fetch_assoc($sasa)){
if($cantidad_inicial + 10==$row['numposts']){

$pene = "UPDATE posts SET  sticky = '1' WHERE id = 1";
$sarasa = mysql_query($pene);

echo'Felicitaciones, ya procesamos tu pedido y agregamos la peticion ;) <br>
Reecuerda que este sistema es automatico, si tu peticion falla reporta a un administrador tu error que revisaremos en nuestro log tu pedido ;)';
   }
   else
   {
     echo'Faltan post ;)';
   }

 }

  ?>
