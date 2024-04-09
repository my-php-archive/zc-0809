    <?php

    include "config.php";
    include "func.ban.php";

    switch ($_GET['x'])
    {
    default:
    listbans();
    break;
    // si agregamos una direccion mostraremos el formulario
    case "add":
    // y en caso de que el formulario haya sido enviado crearemos el registro
    if ($_POST['add'])
    {
    $ip = $_POST['ip'];
    if (!$ip)
    {
    echo "Debes poner una Ip al menos";
    }
    addban($ip,$_POST[reason],$_POST[legnth]);
    }
    // otra manera de mostrar el formulario
    else
    {
    echo "Agregar direccion baneada.<br />";
    echo "<form method='post' action='banadmin.php?x=add'>";
    echo "Direccion IP<br /><input type='text' name='ip'><br />";
    echo "Razon<br /><input type='text' name='reason'><br />";
    echo "Duracion<br /><input type='text' name='legnth'><br />";
    echo "<input type='submit' name='add' value='Agregar direccion'>";
    }
    break;
    // eliminar una direccion
    case "delete":
    if ($_GET['id'])
    {
    delban($_GET['id']);
    }
    // show error
    else
    {
    echo "No has seleccionado ninguna IP para eliminar";
    }
    break;
    }
    ?> 