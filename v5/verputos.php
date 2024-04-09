<?php
 require_once('header.php');


$asasa = "select * from usuarios where id = '{$id}'"; 
$preg = mysql_query($asasa);
while($sasa = mysql_fetch_assoc($preg))
{
   $lala = "select * from usuarios where ultimaip = '{$sasa['ultimaip']}'";
   $sll = mysql_query($lala);
   while($rew = mysql_fetch_assoc($sll)){

       echo ''.$rew['nick'].' <br>';

   }


}

?>