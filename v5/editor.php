<?php include('header.php'); ?>


<?php
$id = $_POST['ida'];

$request = mysql_query("SELECT * FROM usuarios WHERE id = $id");
$row = mysql_query($request);
echo '

<form method="POST" action="editar-cuenta.php">

<table>
<tr>

<td>ID</td><td><input type="text" name="id" value="' . $row['id'] .'" />
</tr>
<tr>
<td>Nombre</td><td><input type="text" name="nombre" value="' . $row['nombre'] .' " />
</tr>

<tr>
<td>Correo</td><td><input type="text" name="mail" value="' . $row['mail'] .' " />
</tr>
<tr><td></td><td><input type="submit" value="Guardar Datos" />
</table>
';

?>