<?php
include("header.php");


$key = $_SESSION['id'];
if($key==null){
fatal_error('Para editar tu tema debes autentificarte.');
}

$sqltheme=mysql_query("SELECT theme FROM usuarios where id='$key'");
$theme=mysql_fetch_array($sqltheme);
mysql_free_result($sqltheme);
$url = $theme['theme'];

echo'

	


<form name="per" method="post" onsubmit="return load_new_theme();" action="/mitheme_cambiar.php">

<select name="theme"  >
        


<option value="rojo">Red</option>
   

<option value="verde">Green</option>


<option value="negro">Black</option>


<option value="azul">Blue</option>


<option value="gris">Gray</option>


<option value="azulc">Blue Special</option>



<option value="azulm">Blue Modern</option>


</select>


<br><br>

<button type="submit" class=\"mBtn btnOk\">Guardar</button>
				




					
</form>
		';

?>