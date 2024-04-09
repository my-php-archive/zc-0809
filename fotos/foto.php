<?php
include("../header.php");
$titulo= $descripcion;
cabecera_normal();

$ida = xss(no_i($_GET['id']));




$valentin = "select * from imagenes where ida = '{$ida}'";
$edito = mysql_query($valentin);

if(mysql_num_rows($edito)==0){
  fatal_error('La imagen no existe o Fue eliminada');
}
else{





$id = $_SESSION['id'];

$sqlavatar = mysql_fetch_array(mysql_query("SELECT avatar FROM usuarios WHERE id='$id'"));
$avatar = $sqlavatar['avatar'];




?>
<!-- inicio cuerpocontainer -->
<div id="cuerpocontainer">

<a name="cielo"></a>
<div class="post-wrapper">

	<div class="post-autor vcard">

		<div class="box_title">
			<div class="box_txt post_autor">Foto Posteada Por:</div>
			<div class="box_rrs">
				<div class="box_rss">
					<a href="/rss/posts-usuario/800">
						<span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big1v11.png" style="position:absolute; top:-354px; clip:rect(352px 16px 368px 0px);" alt="RSS con posts de 
<?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo''.$row['nick'].'';}}?>>" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:14px;height:12px" /></span>					</a>
				</div>

			</div>
		</div>
		<div class="box_cuerpo" typeof="foaf:Person">
			<div class="avatarBox" rel="foaf:img">
				<?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '<a href="/perfil/'.$row['nick'].'';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo'';}}?>">
					<img src="<?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';


$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo''.$post['avatar'].'';}}?>" class="avatar" alt="Ver perfil de <?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo''.$row['nick'].'';}}?>" onerror="error_avatar(this)" />
				</a>
			</div>

			<?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '<center><a rel="dc:creator" property="foaf:nick" class="url fn n" href="/perfil/'.$row['nick'].'';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo'';}}?>">

				<?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '<h2>'.$row['nick'].'';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo'';}}?></h2>
			</a></center>
			<br />
			
				


				

			
			
			</div>
		</div>


	<div class="post-contenedor">
		<div class="post-title">

			
			<h1 property="dc:title"><?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo''.$row['titulo'].'';}}?></h1>
			
		</div>
					<div class="post-contenido">
				
				<div class="floatR">
					<?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo'<a class="btnActions" href="/fotos/borrar-foto.php?id='.$row['ida'].'';}}?>" title="Borrar Foto">
						<img src="http://www.zincomienzo.net/images/borrar.png" alt="Borrar" /> Borrar
					</a>
					<a class="btnActions" href="/fotos/" title="Editar Post">
						<img src="http://www.zincomienzo.net/images/editar.png" alt="Editar" /> Editar
					</a>

				</div>
<br><br>





<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="255" or $rango=="100")
	{

?>
				<div class="floatR">
					<a class="btnActions" href="/fotos/foto-borrada/<?=$ida?>" title="Borrar Foto">
						<img src="<?=$images?>/borrar.png" alt="Borrar" /> Borrar
					</a>
				
				</div>


<?php
}
?>
<br><br>
			

				
			<span property="dc:content">
			<?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo'



   


     
     <center><img class="imagen" src="'.$row['url'].'" border="0"></center>
  

              ';}}?>			


<br></span>



                   <?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';


$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo''.BBparse(htmlspecialchars($rew['detalle'])).'';}}?>
										











</div><!-- Cuerpo -->










<div class="post-metadata floatL">
			<div style="padding: 12px">
			<div class="mensajes" style="display:none"></div>
			
					<div class="dar-puntos">



			</div>

			<hr class="divider" />
						
				

				<?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '<center><strong>Creado:</strong> '.$row['fecha'].'</center>';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo'';}}?>		
			
			<div class="clearfix"></div>
			<hr class="divider" />
			<div class="tags-block">
</div>


			<div class="clearfix"></div>

			</div>
		</div>
	</div><!-- post contenedor 730px -->
	<div class="floatR" style="width: 766px; wi\dth: 765px">

		<div class="post-relacionados">
			<h4>Otras Fotos:</h4>
			




<?php
$sql=mysql_query("SELECT * FROM imagenes ORDER BY ida DESC LIMIT 10");

while($row=mysql_fetch_array($sql)){


echo "<li class='categoriaPost imagenes'>

	<a rel='dc:relation' href='/fotos/foto.php?id=".$row[ida]."' title='".$row[titulo]."'>".$row[titulo]."</a></li>";
}  
?>








		







</div>
		<div class="banner-300">
<!-- Publicidad 300x250 -->
</div>
		<div class="clearfix"></div></div>




<a name="comentarios"></a>
	<div id="post-comentarios">      		<div class="comentarios-title">
	
		
			<a href="http://www.zincomienzo.net/rss/comentarios.php?id=7669">

				<span style="position: relative; z-index: 87; margin-right: 5px;" class="floatL systemicons sRss"></span>
			</a><h4 class="titulorespuestas floatL">Comentarios</h4>
					<div class="clearfix"></div>
		<hr />

	<!-- Paginado --><!-- FIN - Paginado -->

		</div>
		<?php
$pren = "SELECT * FROM comentariosimg where ida = '{$ida}'";
$resg = mysql_query($pren) or die(mysql_error());//hacemos responder a la Bd

while($rew = mysql_fetch_assoc($resg))   { ?>
<?php
$sarasa = "select avatar from usuarios where nick = '{$rew['nick']}' ";
$resgu = mysql_query($sarasa) or die(mysql_error());//hacemos responder a la Bd

while($lala = mysql_fetch_assoc($resgu))   { ?>
 



<div id="comentarios"><div id="div_cmnt_27218">

	<span style="display:none" id="citar_comm_27218">:)</span>	<div class="comentario-post clearbeta">
		<div class="avatar-box"><a href="/perfil/<?php echo ''.$rew['nick'].'' ?>">
				<img style="position: relative; z-index: 1; display: inline;" class="avatar-48 lazy" src="<?php echo ''.$lala['avatar'].'' ?>" orig="<?php echo ''.$lala['avatar'].'' ?>" title="Avatar de <?php echo ''.$rew['nick'].'' ?> en Zincomienzo!" onerror="error_avatar(this, 800, 48)" width="48" height="48" />
			 </a>
					</div>
		<div class="comment-box">
			<div class="dialog-c">
			</div>

			<div class="comment-info clearbeta">

				<div class="floatL">
				<a class="nick" href="/perfil/<?php echo ''.$rew['nick'].'' ?>"><?php echo ''.$rew['nick'].'' ?></a> <?php echo ''.$rew['fecha'].'' ?> dijo:</span>
				</div>
				<div class="floatR answerOptions">
				
					
					
<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="255" or $rango=="655" or $rango=="755" or $rango=="100")
	{

?>
<ul>		
<li class="iconDelete"><a href="/fotos/borrar-comentario/<?php echo ''.$rew['id_comentario'].'' ?>"><span class="borrar-comentario"></span></a></li>
</ul>
<?php
}
?>





					
				</div>					
			</div>
			<div class="comment-content"><?php echo ''.BBparse(htmlspecialchars($rew['cuerpo'])).'' ?></div>
		</div>
	</div>
</div></div>








<?php } ?> <?php } ?>





        
 
    






        
 
    
<?php
if($_SESSION['id']!=null){
?>



	
	<!-- Paginado --><!-- FIN - Paginado -->
	<div class="miComentario">

		<div id="procesando"><div id="post"></div></div>

		<div class="answerInfo">
			<img class="avatar-48" width="48" height="48" src="<?=$avatar?>" alt="Avatar de Usuario en Zincomienzo!" onerror="error_avatar(this, 800, 48)" />

		</div>

		<div class="answerTxt">
		  <div class="Container">
				<div class="error"></div><form method="post" action="/fotos/publicado" name="firmar">
								<textarea name="cuerpo" id="body_comm" class="onblur_effect autogrow" tabindex="1" title="Escribir un comentario..." style="resize:none;" onfocus="onfocus_input(this)" onblur="onblur_input(this)">Escribir un comentario...</textarea>
				<div class="buttons" style="text-align:left">
					<div class="floatL">
				<input type="hidden" name="id" value="<?=$ida?>">
                                
<input type="hidden" name="titulo" value="<?php
$preg = "SELECT * FROM imagenes where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd
while($row = mysql_fetch_assoc($res))   { ?>
<?php echo '';
$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
$rench = mysql_query($pregu) or die(mysql_error());
while($post = mysql_fetch_assoc($rench))   {
           echo''.$row['titulo'].'';}}?>">

<input type="submit" id="btnComment" class="mBtn btnOk" value="Comentar"  />
 </form>
					</div>

					<div class="floatR">
						<a style="font-size:11px" href="javascript:openpopup()">M&aacute;s Emoticones</a>
						<script type="text/javascript">function openpopup(){ var winpops=window.open("/emoticones.php","","width=180px,height=500px,scrollbars,resizable");}</script>
					</div>
					<div id="emoticons" style="float:right">
						<a href="#" smile=":)"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-286px; clip:rect(286px 16px 302px 0px);" alt="sonrisa" title="sonrisa" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=";)"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-308px; clip:rect(308px 16px 324px 0px);" alt="gui&ntilde;o" title="gui&ntilde;o" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":roll:"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-330px; clip:rect(330px 16px 346px 0px);" alt="duda" title="duda" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":P"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-352px; clip:rect(352px 16px 368px 0px);" alt="lengua" title="lengua" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":D"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-374px; clip:rect(374px 16px 390px 0px);" alt="alegre" title="alegre" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":("><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-396px; clip:rect(396px 16px 412px 0px);" alt="triste" title="triste" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="X("><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-418px; clip:rect(418px 16px 434px 0px);" alt="odio" title="odio" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":cry:"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-440px; clip:rect(440px 16px 456px 0px);" alt="llorando" title="llorando" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":twisted:"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-462px; clip:rect(462px 16px 478px 0px);" alt="endiablado" title="endiablado" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":|"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-484px; clip:rect(484px 16px 500px 0px);" alt="serio" title="serio" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=":?"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-506px; clip:rect(506px 16px 522px 0px);" alt="duda" title="duda" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=":cool:"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-528px; clip:rect(528px 16px 544px 0px);" alt="picaro" title="picaro" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":oops:"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-550px; clip:rect(550px 16px 566px 0px);" alt="timido" title="timido" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="^^"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-572px; clip:rect(572px 16px 588px 0px);" alt="sonrizota" title="sonrizota" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="8|"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-594px; clip:rect(594px 16px 610px 0px);" alt="increible!" title="increible!" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":F"><span style="position:relative;"><img border=0 src="http://zincomienzo.net/images/big2.gif" style="position:absolute; top:-616px; clip:rect(616px 16px 632px 0px);" alt="babaaa" title="babaaa" /><img border=0 src="http://zincomienzo.net/images/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
					</div>

					<div class="clearfix"></div>

				</div>

				<script type="text/javascript">$(function(){ lastid_comm='0'; $('#body_comm').val($('#body_comm').attr('title')); });</script>
			</div>
		</div>
	</div>






<?php
}
?>



</div><!-- post comentarios! -->
	<div class="clearfix"></div>
	<a name="comentarios-abajo"></a>
		<br /><div class="clearfix"></div>
		<div class="clearBoth"></div>

		<div style="clear:both"></div>
	  <?php
if($_SESSION['id']==null){
?>

<div class="emptyData clearfix">Para poder comentar necesitas estar <a href="" onclick="registro_load_form(); return false">Registrado</a>. O.. ya tenes usuario? <a href="#" onclick="open_login_box('open')">Logueate!</a></div>

<?php
}
?><div class="clearfix"></div>
<div class="clearBoth"></div>
<div style="clear:both"></div>
<div style="text-align:center"><a href="#cielo" class="irCielo"><strong>Ir al cielo</strong></a></div>



</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->



<?php
 }
pie();
?>
