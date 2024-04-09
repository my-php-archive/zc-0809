<?php
include("header.php");
$id = $_SESSION['id'];
$nick = no_i($_GET['nick']);

$sql = mysql_query("select * from usuarios where nick = '{$nick}'");

while($row=mysql_fetch_assoc($sql))
{
  if($row['activacion']==1)
  {
    echo'<script type="text/javascript">history.go(-1);
  alert("La cuenta ya esta habilitada, no te pases de vivo");</script>';
  }


}


$cantidad = mysql_num_rows($sql);
if($cantidad==0)
{
  echo'<script type="text/javascript">history.go(-1);
  alert("ERROR Provocado por el usuario");</script></script>';
}
else
{

  mysql_query("UPDATE  `zincomie_zinco`.`usuarios` SET  `activacion` = 1 WHERE  `usuarios`.`nick` ='{$nick}'");
   echo'<script type="text/javascript">history.go(-1);
   alert("La cuenta se ha editado");</script>';
}





?>