<?php
include("../header.php");
$titulo	= "Comentario publicado";
cabecera_normal();
 $id = $_SESSION['id'];
   $idco = $_GET['id'];
   $cuerpo = htmlspecialchars(xss($_POST['cuerpo']));
    $titulo2 = no_injection(xss($_POST['titulo']));     
    
$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];




?>



 <?php
$pren = "insert into comentariosdefi
values
(null,'".$_POST['id']."','".$_POST['cuerpo']."','".$_POST['titulo']."','".$nick."',NOW(),NOW())";
$resg = mysql_query($pren) or die(mysql_error());//hacemos responder a la Bd
?>



<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">YEAH!!</div>
		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>

	<div class="box_cuerpo"  align="center">
		<br />
		El comentario se ha publicado correctamente.		<br />
		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ver comentario" title="Ver comentario" onclick="history.go(-1)">			<br />

		
	</div>
	
</div>	
		<br />
		<br />
		<br />
		<br />
	<div style="clear:both"></div>
<!-- fin cuerpocontainer -->


<?php
 
pie();
?>