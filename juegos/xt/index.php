<?php
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
$titulo	= "XT Multiplayer";
cabecera_normal();
?>

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script language="JavaScript">
function Abrir_juego (pagina) {
    var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=740, height=580";
    window.open(pagina,"juego",opciones);
}
</script>
<div class="container940">
		<div class="box_title">

			<div class="box_txt juegos_container">Juegos Zincomienzo! - Tetris</div>
			<div class="box_rss"></div>
		</div>
		
			<div class="box_cuerpo" align="center">

	
				<table width="600" height="36" border="0" cellspacing="4" align="left" bgcolor="#FFFFFF">
					
					<tr>
				    <td height="78" colspan="3" align="center">
					<img  src="http://www.zincomienzo.net/images/head-tetris.jpg">

					
					</td>
				  </tr>
					
				  <tr>
				
				    <td width="270" align="center" class="size13">
				

				    <td height="30" colspan="3" align="center"></td>

				  </tr>


				  <tr>
				   <td width="85" height="30" class="size13"><img title="Sal&oacute;n" src="http://o2.t26.net/images/icon-ttris.jpg" alt="Sal&oacute;n de tetris" hspace="4"  border="0" align="absmiddle"><strong>Sal&oacute;n 1</strong></td>
				    <td width="270" align="center" class="size13"><strong></strong><strong></strong></td>

				    <td  align="center">
					
						
					<a href="javascript:Abrir_juego('/juegos/xt/tetris.php')"><img title="Sal&oacute;n" src="http://o2.t26.net/images/btn-jugar.gif" alt="Sal&oacute;n de tetris" border="0" align="absmiddle"></a>
									    </td>
				  </tr>

					<tr>
				    <td height="30" colspan="3" align="center"><hr/></td>
				  </tr>


				  <tr>
				    <td width="85" height="30" class="size13"><img title="Sal&oacute;n" src="http://o2.t26.net/images/icon-ttris.jpg" alt="Sal&oacute;n de tetris" border="0" hspace="4"  align="absmiddle"><strong>Sal&oacute;n 2</strong></td>
				    <td width="270" align="center" class="size13"><strong></strong><strong></strong></td>
				    <td  align="center">
					
						
					<a href="javascript:Abrir_juego('/juegos/xt/tetris.php')"><img title="jugar al tetris" src="http://o2.t26.net/images/btn-jugar.gif" alt="jugar al tetris" border="0"></a>

									    </td>
				  </tr>

					<tr>
				    <td height="78" colspan="3" align="center"  bgcolor="#FFFFFF">

					<hr />
					
					</td>
				  </tr>


				</table>		

							<table width="300" border="0" cellpadding="3" cellspacing="0"   bgcolor="#FFFFFF">
							  <tr>
							    <td colspan="3"  height="30" align="center"><strong class="size13">Ranking de la semana</strong></td>
							  </tr>

							  <tr>
							    <td align="center" bgcolor="#CCCCCC" width="50"><strong>Puesto</strong></td>

							    <td  bgcolor="#CCCCCC" width="130"><strong>Usuario</strong></td>
							    <td align="center" bgcolor="#CCCCCC"><strong>Partidos Ganados</strong></td>
			  				</tr>
			

							</table>
		
			<br clear="left">	


 
   
</div>

</div><div style="clear:both"></div>
<!-- fin cuerpocontainer -->
<?php

pie();
?>

