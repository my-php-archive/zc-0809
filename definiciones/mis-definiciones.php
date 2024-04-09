<?php
include("../header.php");
$titulo	= "Mis Definiciones!";
cabecera_normal();
 $id = $_SESSION['id'];

$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
     $nick = $sqlnick['nick'];

?>
<div id="cuerpocontainer">           
				
<link href="/images/css/definiciones.css" rel="stylesheet" type="text/css" />




		

			<div class="entrybody">
				
<div class="wp-pagenavi" id="teams_listado" style="margin-bottom:0;float:none;">Mis Definiciones!<br style="clear: both;" /></div>
				
				
				<br />
								<div style="text-align:left;font-weight:bold;font-size:14px;margin-bottom:10px;color:#3C3C3C;">
					
				</div>

					
					<ul class="diccionario_listado">

											
											





<?php
$preg = "SELECT * FROM definiciones where nick = '{$nick}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>
        <?php echo' 


<li ><a href="/definiciones/definicion.php?id='.$row['id'].'" title="'.$row['titulo'].'">'.$row['titulo'].'</a></li>

                            	


';?>
  <?php } ?>











					</ul><br style="clear:both;"/>				
			</div>
		
		<br style="clear:both;"/>





<?php

pie();
?>