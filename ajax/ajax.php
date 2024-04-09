<?php
include_once("header.php");
$sql = mysql_query("SELECT * FROM acciones LIMIT 100");
echo'[';
while($row = mysql_fetch_assoc($sql))
{
echo'{"accionObjeto":"comentario","accionTipo":"agregar","ts":"20:25:52","nick":"baneado3veces","id":26981988,"accion_name":"Creo un nuevo comentario","url":"\/posts\/deportes\/10527163\/Resumen-River-vs-All-Boys.html","titulo":"Resumen River vs All Boys"},';
}
echo']';
?>