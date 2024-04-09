<?php
include("../header.php");
$titulo	=	"Definiciones!";  
cabecera_normal();




?>
<div id="cuerpocontainer">           
				
<link href="/images/css/definiciones.css" rel="stylesheet" type="text/css" />




		<div id="izquierda">

			<div class="entrybody">
				
<div class="wp-pagenavi" id="teams_listado" style="margin-bottom:0;float:none;">Definiciones!<br style="clear: both;" /></div>
				
				
				<br />
								<div style="text-align:left;font-weight:bold;font-size:14px;margin-bottom:10px;color:#3C3C3C;">
					
				</div>

					
					<ul class="diccionario_listado">

											
											



<?php

$sql=mysql_query("SELECT * FROM definiciones ORDER BY ida DESC LIMIT 100");






while($row=mysql_fetch_array($sql)){
echo "

<li ><a href='/definiciones/definicion.php?id=".$row[ida]."' title='".$row[titulo]."'>".$row[titulo]."</a></li>


";


}  
	
?>













					</ul><br style="clear:both;"/>				<div style="text-align:right;font-weight:bold;font-size:14px;">
					<?php
if($_SESSION['id']!=null){
?><a title="Ver todas" href="/definiciones/todas.php">Ver Todas</a>
	<?php
}
?>			


</div>
			</div>
		</div>

		<div id="sidebar">
			<div class="box_title">
				<div class="box_txt sidebar">Atenci&oacute;n</div>
				<div class="box_rss"></div>
			</div>
			<div class="box_cuerpo">
				<b>Las <font color="green">Definiciones</font> son para que los usuarios de <font color="blue">Zincomienzo</font> puedan saber los significados de las palabras que usamos en <font color="blue">Zincomienzo</font> Por Ejemplo: 
<br><br>
Definicion De <font color="red">Crap</font>,<font color="red">spam</font>,<font color="red">etc</font> asi sabemos cada uno que se significa. Puedes agregar tu definici&oacute;n.</b>
<br><br>

			</div>
			<br />
			
			







<?php
if($_SESSION['id']!=null){
?>

<div style="text-align:center;">
				<a href="/definiciones/agregar" title="Agregar definici&oacute;n"><img src="/images/diccionario_agregar.png" alt="Agregar definici&oacute;n"/></a>
			</div>

<?php
}
?>










<br />
			 <?php

$mb=mysql_query("SELECT count(*) as cantidad FROM definiciones");
$mbz=mysql_fetch_array($mb);

$poz=mysql_query("SELECT count(*) as cantidad FROM comentariosdefi");
$pos=mysql_fetch_array($poz);

$cmz=mysql_query("SELECT count(*) as cantidad FROM usuarios");
$com=mysql_fetch_array($cmz);


$cone=mysql_query("SELECT * FROM usuarios WHERE ultimaaccion>unix_timestamp()-2*60 ORDER BY ultimaaccion DESC");
$conez=mysql_num_rows($cone);



echo "





<div class='box_title'>
<div class='box_txt destacados'>Estadisticas!</div>

<div class='box_rss'></div>
</div>

<div class='box_cuerpo'>



<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr>
<td> 
<a href='/usuarios-online/' class='usuarios_online'><b><img src='/images/online-icono.png'> ".$conez." usuarios online</b></a></td>

<td><b><img src='/images/diccionario_listado.png'> ".$mbz['cantidad']."  Definiciones</b></td>
</tr>
<tr>
<td><b><img src='/images/comentarios-icono.png'> ".$pos['cantidad']." Comentarios</b></td>

<td><b><img src='/images/miembros-icono.png'> ".$com['cantidad']."  Miembros</b></td>

</tr>
</table>




";


?>






</div>
			<br />

		</div>
		<br style="clear:both;"/>



<?php
pie();
?>
