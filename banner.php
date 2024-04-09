<?php
include("header.php");


$key = $_SESSION['id'];
if($key==null){
fatal_error('Para editar tu tema debes autentificarte');
}

$sqltema=mysql_query("SELECT tema FROM usuarios where id='$key'");
$tema=mysql_fetch_array($sqltema);
mysql_free_result($sqltema);
$url = $tema['tema'];

echo'

	

<form name="per" method="post" onsubmit="return load_new_tema();" action="/mitema_cambiar.php">


<select name="tema"  >
        

<option value="1">Blue Classic</option>
<option value="2">Black colorful</option>
<option value="3">Blue Ocean</option>
<option value="4">Green Classic</option>
<option value="5">Aqua</option>
<option value="6">Orange Classic</option>
<option value="7">Black Classic</option>
<option value="8">Pink Classic</option>
<option value="9">Orange Modern</option>
<option value="10">Black Hacker</option>
<option value="">Normal</option>    

</select>





<button type="submit" class=\"tema-next local\">Subir</button>
				




					
</form>
		';

?>