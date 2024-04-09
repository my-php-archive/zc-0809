<?php
include("header.php");
 cabecera_normal();
if($rangoz['rango']=="255" or $rangoz['rango']=="100" or $rangoz['rango']=="655" or $rangoz['rango']=="755")
{
$palabra = $_POST['palabra'];
$censura = $_POST['censura'];
$por = $_SESSION['user'];
if(empty($palabra) or empty($por) or empty($censura))
{
  fatal_error("Faltan datos hermano :|");
}
else
{
  mysql_query("INSERT INTO `zincomie_zinco`.`censura` (`id`, `palabra`, `censura`, `por`) VALUES (NULL, '{$palabra}', '{$censura}', '{$por}')");
  fatal_error("Bien hecho :D");
}

}
else
{
  include("404.php");
}
pie();

?>