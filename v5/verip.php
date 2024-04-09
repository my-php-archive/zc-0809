<?php
include("header.php");

$key = $_SESSION['id'];

$id = mysql_real_escape_string($_GET['id']);

if(!$key)
{

echo'Q haces? r.r';

}
else
{

$asasa = "select * from usuarios where id = '{$id}'";
$preg = mysql_query($asasa);
while($sasa = mysql_fetch_assoc($preg))
{

   $lala = "select * from usuarios where ultimaip = '{$sasa['ultimaip']}'";

   $sll = mysql_query($lala);
   while($rew = mysql_fetch_assoc($sll)){
     echo '<br>'.$rew['nick'].'</center>';}}}
    echo' <input type="submit" onClick="alert("Bien hecho, de seguro en este momento lo debe estar gozando");return false"" value="Hacele un pete a leandro" />';

?>