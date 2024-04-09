<?php
include("../header.php");
$titulo	=	"Definiciones!";  
cabecera_normal(); // que te parece si lo abric con el notepas

if(1==1) Header("Location: ../index.php");
?>
<div id="cuerpocontainer">           
				
<link href="/images/css/definiciones.css" rel="stylesheet" type="text/css" />




		<div id="izquierda">

			<div class="entrybody">
				
<div class="wp-pagenavi" id="teams_listado" style="margin-bottom:0;float:none;">Definiciones<br style="clear: both;" /></div>
				
				
				<br />
								<div style="text-align:left;font-weight:bold;font-size:14px;margin-bottom:10px;color:#3C3C3C;">
					
				</div>

					
					<ul class="diccionario_listado">

											
											



<?php

$sql=mysql_query("SELECT * FROM definiciones ORDER BY ida DESC LIMIT 50");






while($row=mysql_fetch_array($sql)){
echo "

<li ><a href='/definiciones/definicion.php?id=".$row[ida]."' title='".$row[titulo]."'>".$row[titulo]."</a></li>


";


}  
	
?>













					</ul><br style="clear:both;"/>				<div style="text-align:right;font-weight:bold;font-size:14px;">
					<?php
if($_SESSION['id']!=null){
?><center><a title="Ver todas" href="/definiciones/todas.php">M&aacute;s Definiciones</a><center/>
	<?php
}
?>			


</div>
			</div>
		</div>

		<div id="sidebar">
			<div class="box_title">
				<div class="box_txt sidebar">Importante</div>
				<div class="box_rss"></div>
			</div>
			<div class="box_cuerpo">
				<center>Las Definiciones tienen como objetivo que los usuarios sepan el significado de las palabras que se usan en la web. Por ejemplo: Crap, Spam, etc.<center/>
<br>
<center>Puedes agregar tu propia Definici&oacute;n siempre y cuando cumpla con el Protocolo, de lo contrario sera eliminada, si lo amerita la situaci&oacute;n seras suspendido el tiempo que el Moderador determine.</b><center/>
<br>

			</div>
			<br />
			
			







<?php
if($_SESSION['id']!=null){
?>

<div style="text-align:center;">
				<a href="/definiciones/agregar" title="Agregar Definici&oacute;n"><img src="/images/diccionario_agregar.png" alt="Agregar Definici&oacute;n"/></a>
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
<div class='box_txt destacados'>Estadisticas</div>

<div class='box_rss'></div>
</div>

<div class='box_cuerpo'>


<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tr>
<td> 
<a href='/usuarios-online/' class='usuarios_online'><b> ".$conez." usuarios online</b></a></td>

<td> ".$mbz['cantidad']."  Definiciones</td>
</tr>
<tr>
<td> ".$pos['cantidad']." Comentarios</td>

<td> ".$com['cantidad']."  Miembros</td>

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
