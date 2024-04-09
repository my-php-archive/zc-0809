<?php
include("../header.php");
$titulo= $descripcion;
cabecera_normal();

$ida = xss(no_i($_GET['id']));




$valentin = "select * from definiciones where ida = '{$ida}'";
$edito = mysql_query($valentin);

if(mysql_num_rows($edito)==0){
  fatal_error('La definici&oacute;n no existe o fue eliminada.');
}
else{





$id = $_SESSION['id'];

$sqlavatar = mysql_fetch_array(mysql_query("SELECT avatar FROM usuarios WHERE id='$id'"));
$avatar = $sqlavatar['avatar'];




?>
<link href="/images/css/definiciones.css" rel="stylesheet" type="text/css" />
<!-- inicio cuerpocontainer -->
<div id="cuerpocontainer">
		<div id="izquierda">
			<div class="breadcrump">
				<ul>
					<li class="first"><a href="/definiciones" title="Diccionario">Definiciones</a></li>
					<li><h1 class="titulo_head"><?php
$preg = "SELECT * FROM definiciones where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo''.$row['titulo'].'';}}?></h1></li>

					<li class="last"></li>
				</ul>
			</div>
			<br style="clear: both;"/>
			<div class="entrybody">
				<div class="box_title">
					<div class="box_txt ultimos_posts">Definici&oacute;n de <?php
$preg = "SELECT * FROM definiciones where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo''.$row['titulo'].'';}}?></div>
					<div class="box_rss"></div>

				</div>
				<div class="box_cuerpo">
				<div style="max-height:250px;overflow:auto;"><?php
$preg = "SELECT * FROM definiciones where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo''.BBparse(htmlspecialchars($row['cuerpo'])).'';}}?></div>
				




</div>
				
<br><br>
<?php
$pren = "SELECT * FROM comentariosdefi where ida = '{$ida}'";
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
			<img class="avatar-48" width="48" height="48" src="<?=$avatar?>" alt="Avatar del usuario" onerror="error_avatar(this, 800, 48)" />

		</div>

		<div class="answerTxt">
		  <div class="Container">
				<div class="error"></div><form method="post" action="/definiciones/exito.php" name="firmar">
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


	  <?php
if($_SESSION['id']==null){
?>

<div class="emptyData clearfix">Para poder comentar necesitas estar <a href="" onclick="registro_load_form(); return false"><font color="blue">Registrado</font></a>. O.. ya tenes usuario? <a href="#" onclick="open_login_box('open')"><font color="blue">Logueate!</font></a></div>

<?php
}
?>

<br style="clear:both;"/>
			</div>
		</div>
		





<div id="sidebar">
			<div class="box_title">
				<div class="box_txt sidebar">Definici&oacute;n Agregada Por:</div>
				<div class="box_rss"></div>
			</div>

<div class="box_cuerpo">
				
			
<?php
$preg = "SELECT * FROM definiciones where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          
$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());


while($post = mysql_fetch_assoc($rench))   {
           echo'
<img src="'.$post['avatar'].'" class="avatar">';}}?>


	
<br>

<center><?php
$preg = "SELECT * FROM definiciones where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo'<a rel="dc:creator" property="foaf:nick" class="url fn n" href="/perfil/'.$row['nick'].'';}}?>"><h2><font color="dodgerblue"><?php
$preg = "SELECT * FROM definiciones where ida = '{$ida}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>


  <?php echo '';
          

$pregu = "SELECT avatar from usuarios where nick = '{$row['nick']}'";
          $rench = mysql_query($pregu) or die(mysql_error());

while($post = mysql_fetch_assoc($rench))   {
           echo''.$row['nick'].'';}}?></font></h2></a></center>
		





</div>
			
<br>
			<div class="box_title">
				<div class="box_txt sidebar">M&aacute;s Definiciones:</div>
				<div class="box_rss"></div>
			</div>
<div class="box_cuerpo">
				
<?php

$sql=mysql_query("SELECT * FROM definiciones ORDER BY ida LIMIT 10");

while($row=mysql_fetch_array($sql)){


echo "



 <li><strong>".$row['nick']."</strong> &raquo; <a href='/definiciones/definicion.php?id=".$row['ida']."'>".$row['titulo']."</a></li>






";
}  


?>



</div>
			<br />

			
		
		<br style="clear:both;"/>

</div>

<!-- fin cuerpocontainer -->



<?php
 }
pie();
?>
