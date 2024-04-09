<?php
include("header.php");


$key = $_SESSION['id'];
if($key==null){
fatal_error('Para editar tu tema debes autentificarte');
}

$sqltheme=mysql_query("SELECT theme FROM usuarios where id='$key'");
$theme=mysql_fetch_array($sqltheme);
mysql_free_result($sqltheme);
$url = $theme['theme'];

echo'

	


<form name="per" method="post" onsubmit="return load_new_theme();" action="/mitheme_cambiar.php">

<select name="theme"  >
        


<option value="rojo">Rojo</option>
   

<option value="verde">Verde</option>


<option value="negro">Negro</option>


<option value="azul">Azul</option>


<option value="gris">Gris</option>


<option value="azulc">Azul ColorFull</option>



<option value="azulm">Azul Modern</option>


</select>


<br><br>

<button type="submit" class=\"mBtn btnOk\">Cambiar</button>
				




					
</form>
		';

?>