<?php
include("header.php");
$id = $_SESSION['id'];
$nick = no_i($_GET['nick']);

$sql = mysql_query("select * from usuarios where nick = '{$nick}'");

while($row=mysql_fetch_assoc($sql))
{
  if($row['ban']==0)
  {
    echo'<script type="text/javascript">history.go(-1);
  alert("La cuenta no se encuentra suspendida");</script>';
  }


}


$cantidad = mysql_num_rows($sql);
if($cantidad==0)
{
  echo'<script type="text/javascript">history.go(-1);
  alert("Hubo un error");</script></script>';
}
else
{

  mysql_query("UPDATE  `zincomie_zinco`.`usuarios` SET  `ban` = 0 WHERE  `usuarios`.`nick` ='{$nick}'");
   echo'<script type="text/javascript">history.go(-1);
   alert("El usuario se ha desbaneado");</script>';
}





?>