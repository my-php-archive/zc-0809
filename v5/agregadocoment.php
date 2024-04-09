<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();

$id = $_SESSION['id'];



$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];

$sqlavatar = mysql_fetch_array(mysql_query("SELECT avatar FROM usuarios WHERE id='$id'"));
$avatar = $sqlavatar['avatar'];

$sqlultimaip = mysql_fetch_array(mysql_query("SELECT ultimaip FROM usuarios WHERE id='$id'"));
$ultimaip = $sqlultimaip['ultimaip'];

?>

<div id="cuerpocontainer">



<div class="right" style="float:left;margin-left:10px;width:800px">

		<div class="boxy xtralarge">
			<div class="boxy-title">

				<h3>Panel general de medallas</h3>
				
			</div>

			<div class="boxy-content">
  <form onsubmit="return validate_data();" name="Fdenuncia" action="/agregarcomentario.php" method="post" style="text-align:center;">

<center><div class="bienvm"><b>Formulario para otorgar medallas</b><br /><hr />
  
ID Del Usuario: <input type="text" name="usuario" value="" /><br />
<br>
Detalle: <input type="text" name="detalles" value=""  /> <br />
<br>
Causa: <input type="text" name="causa" value=""  /> <br /> 
<br>
Tipo De Medalla: <select name="medalla"  >

<option value="medalla-255">Administrador</option>

<option value="medallap-255">Desarrollador</option>

<option value="medalla-100">Moderador</option>    

<option value="medalla-diamante">Diamante</option> 

<option value="medalla-platino">Platino</option> 

<option value="medalla-great-user">Great User</option> 

<option value="medalla-oro">Oro</option>

<option value="medalla-bronce">Bronce</option>


 </select>







<hr /><input type="submit" class="mBtn btnGreen" style="width:auto; margin-left: 5px" value="Agregar Medalla!" title="Agregar Medalla!"/></form></div>
</center>
                        
						</div>
		</div>

<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Cuerpo de moderacion</h3>

				
			</div>
			<div class="boxy-content">
            <center><b>Instrucciones:</b>   </center>
            <hr />
            <li>No dar medallas porque si!</li>
            <li>una medalla es el equivalente a un rango</li>
            <li>No abusar de este sistema</li>
            <b>Actualizar las reglas!</b>
            <hr />
            <center><b>Tipos de medallas:</b><hr /></center>


           <center> <table border="0">
  <tr>
    <th><b>Medalla</b></th>
    <th><b>Imagen</b></th>
  </tr>
  <br />
  <tr>
    <td>Administrador</td>
    <td><img src="http://www.zincomienzo.net/admin/img/sprite-notification_12.png" /> </td>
  </tr>
  <tr>
    <td>Moderador</td>
    <td><img src="http://www.zincomienzo.net/admin/img/sprite-notification_10.png" /> </td>
  </tr>
  <tr>
    <td>Diamante</td>
    <td><img src="http://www.zincomienzo.net/admin/img/sprite-notification_08.png" /> </td>
  </tr>
  <tr>
    <td>Platino</td>
    <td><img src="http://www.zincomienzo.net/admin/img/sprite-notification_06.png" /></td>
  </tr>
  <tr>
    <td>Great User</td>
    <td><img src="http://www.zincomienzo.net/admin/img/sprite-notification_11.png" /> </td>
  </tr>
  <tr>
    <td>Oro</td>
    <td><img src="http://www.zincomienzo.net/admin/img/sprite-notification_02.png" />  </td>
  </tr>
  <tr>
    <td>Bronce</td>
    <td><img src="http://www.zincomienzo.net/admin/img/sprite-notification_05.png" /></td>
  </tr>
</table> </center>
<hr />


  <center>Para entendernos mejor</center>
    <hr />
  <br />

  <li><b>Id De usuario</b>: Ejemplo <b>374</b> (Posarse dobre el boton de bloquear usuario para saber la ID)</li>
  <li><b>Detalle</b>: Ejemplo: Distinguido como Great User por una accion Especial.</li>
  <li><b>Causa:</b>: Ejemplo: Great User (Al posarse sobre la medalla)</li>
  <li><b>Tipo de medalla</b>: Tipo de imagen de la medalla. Ejemplo: Administrador</li>




						</div>
</div></div>
<div style="clear:both"></div>


<!-- fin cuerpocontainer -->

<?php
pie();
?>
