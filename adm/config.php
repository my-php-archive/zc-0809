<?php

$config['host'] = "localhost"; // Servidor mysql
$config['user'] = "zincomie"; // usuario mysql
$config['pass'] = "^]dZ#H0E,g+a"; // password mysql
$config['db'] = "zincomie_zinco"; // base de datos

mysql_connect("$config[host]","$config[user]","$config[pass]") or die("There was an error connecting to the database, MySql said:<br />".mysql_error()."");
mysql_select_db("$config[db]") or die("Hubo un error en la conexion de base de datos");
    ?> 