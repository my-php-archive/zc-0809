<?php
include("header.php");
cabecera_normal();
$id = $_SESSION['id'];
$imail = mysql_real_escape_string($_POST['email']);
?>


<?php

if(!$imail)
{
  fatal_error("Complete todos los campos");
}

if($id)
{
  fatal_error("Los usuarios registrados no pueden ver esta seccion");
}

 //Consultas necesarias
 $mail = mysql_query("select * from usuarios where activacion = 0 and mail = '{$imail}'") or die(mysql_error());
 $cantidad = mysql_num_rows($mail);
 $row = mysql_fetch_assoc($mail);
 //Consultas -_-

if(!$cantidad)
{
  fatal_error("No hay usuarios con el eMail solicitado e inactivos");
}
elseif($cantidad)
{
  $to      = $row['mail'];  //Mail del  pajero
$subject = 'Reactivacion de la cuenta'; //Sujeto
$message = 'Gracias por haberte registrado en zincomienzo :D

   El link para activar tu cuenta: '.$row['nick'].' es: http://www.zincomienzo.net/registro-confirmar.php?k='.$row['id_extreme'].'';  //predicado (?)
$headers = 'Desde: webmaster@zincomienzo.net' . "\r\n" .
    'Reply-To: webmaster@zincomienzo.net' . "\r\n";
    mail($to, $subject, $message, $headers);    //Enviamos mensaje :E

   fatal_error("El mail fue enviado, si no llega en los proximos minutos revisa la bandeja de correos no deseados");

}
?>


<?php
pie();

?>