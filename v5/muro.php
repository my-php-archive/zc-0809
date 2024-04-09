<?php
include("header.php");
$id = (int) $_GET["id"];
$iduser = $_SESSION['id'];

$sqlp = mysql_query("SELECT p.*,p.fecha,p.puntos as pt,p.id,u.*,r.nom_rango,r.img_rango,ca.* 
FROM muro p 
LEFT JOIN usuarios u ON u.id=p.id_autor 
LEFT JOIN rangos r ON r.id_rango=u.rango 
LEFT JOIN categorias ca ON ca.id_categoria=p.categoria 
WHERE p.id='{$id}' LIMIT 1");

$existe = mysql_num_rows($sqlp);
$postz = mysql_fetch_array($sqlp);
mysql_free_result($sqlp);

$titulo2=$postz['titulo'];
if($postz['rango']=="11"){
	$direccion[2]="novatos";
}






if ($HTTP_X_FORWARDED_FOR == ""){
	$ip = getenv(REMOTE_ADDR);
}
else{
	$ip = getenv(HTTP_X_FORWARDED_FOR);
}
contarVisita($id,$ip);

echo'';

if ($id_user==$id_autor){
echo'';}
echo'';
$limit_posts=500;
$request = mysql_query("SELECT * FROM comentariosmuro where id_post='$id'");
$NroRegistros = mysql_num_rows($request);

if(isset($_GET['pagina'])){
$RegistrosAEmpezar=(xss(htmlentities($_GET['pagina']))-1)*$limit_posts;
$PagAct=xss(htmlentities($_GET['pagina']));
}else{
$RegistrosAEmpezar=0;
$PagAct=1;
}
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$limit_posts;
$Res=$NroRegistros%$limit_posts;

if($Res>0){
$PagUlt=floor($PagUlt)+1;}

$num=0;
$sqlcom = mysql_query("SELECT * FROM comentariosmuro WHERE id_post='$id' order by id ASC LIMIT $RegistrosAEmpezar, $limit_posts");
echo'';
if($limit_posts<$NroRegistros){
echo '';
}
echo '';
if($NroRegistros<=0 and $row['coments']!='on'){echo'';
		}else if($row['coments']=='on'){
			echo'';}
while($comenz = mysql_fetch_array($sqlcom)){
$num=$num+1;
				echo'';

$avat	=	"SELECT * FROM usuarios WHERE id=".$comenz['id_autor']."";
$avata	=	mysql_query($avat, $con);
$avatar	=	mysql_fetch_array($avata);

		echo'
			 </a>';
			if($key!=null){
			if($key!=$comenz['id_autor']){
				echo'';}}
			echo'';}
if($NroRegistros>0 and $row['coments']=='on'){
			echo'';}
mysql_free_result($sqlcom);
echo'';
if($limit_posts<$NroRegistros){
echo'';}
echo'';
if($_SESSION['user']!=null and $row['coments']!='on' and $moder2['rango']!=111){
echo'
<script src="http://zincomienzo.net/images/js/es/beta_acciones2.js?6.3.6" type="text/javascript"></script>
<link href="http://zincomienzo.net/images/css/beta_estilos3.css?5.4.9" rel="stylesheet" type="text/css" />


<div class="miComentario">
		<div id="procesando"><div id="post"></div></div>

		<div class="answerInfo">
			<img class="avatar-48" width="48" height="48" src="';if($moder2['avatar']==null or $moder2['avatar']=="/images/avatar.gif"){echo''.$images.'/a48_9.jpg';}else{echo''.$moder2['avatar'].'';}echo'" alt="Avatar de Usuario en '.$comunidad.'" onerror="error_avatar(this, '.$moder2['id'].', 48)" />
		</div>

		<div class="answerTxt">
		  <div class="Container">
				<div class="error"></div>
								<textarea id="body_comm" class="onblur_effect autogrow" tabindex="1" title="Escribir un comentario..." style="resize:none;" onfocus="onfocus_input(this)" onblur="onblur_input(this)">Escribir un comentario...</textarea>
				<div class="buttons" style="text-align:left">
					<div class="floatL">
						<input type="button" onclick="add_murog(\'true\')" class="mBtn btnOk" value="Enviar Comentario" tabindex="2" />
					</div>

					<div class="floatR">
						<a style="font-size:11px" href="javascript:openpopup()">M&aacute;s Emoticones</a>
						<script type="text/javascript">function openpopup(){ var winpops=window.open("/emoticones.php","","width=180px,height=500px,scrollbars,resizable");}</script>
					</div>
					<div id="emoticons" style="float:right">
						<a href="#" smile=":)"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-286px; clip:rect(286px 16px 302px 0px);" alt="sonrisa" title="sonrisa" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=";)"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-308px; clip:rect(308px 16px 324px 0px);" alt="gui&ntilde;o" title="gui&ntilde;o" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":roll:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-330px; clip:rect(330px 16px 346px 0px);" alt="duda" title="duda" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":P"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-352px; clip:rect(352px 16px 368px 0px);" alt="lengua" title="lengua" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":D"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-374px; clip:rect(374px 16px 390px 0px);" alt="alegre" title="alegre" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":("><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-396px; clip:rect(396px 16px 412px 0px);" alt="triste" title="triste" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="X("><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-418px; clip:rect(418px 16px 434px 0px);" alt="odio" title="odio" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":cry:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-440px; clip:rect(440px 16px 456px 0px);" alt="llorando" title="llorando" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":twisted:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-462px; clip:rect(462px 16px 478px 0px);" alt="endiablado" title="endiablado" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":|"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-484px; clip:rect(484px 16px 500px 0px);" alt="serio" title="serio" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":?"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-506px; clip:rect(506px 16px 522px 0px);" alt="duda" title="duda" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=":cool:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-528px; clip:rect(528px 16px 544px 0px);" alt="picaro" title="picaro" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":oops:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-550px; clip:rect(550px 16px 566px 0px);" alt="timido" title="timido" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="^^"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-572px; clip:rect(572px 16px 588px 0px);" alt="sonrizota" title="sonrizota" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="8|"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-594px; clip:rect(594px 16px 610px 0px);" alt="increible!" title="increible!" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":F"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-616px; clip:rect(616px 16px 632px 0px);" alt="babaaa" title="babaaa" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
					</div>

					<div class="clearfix"></div>
				</div>

				<script type="text/javascript">$(function(){ lastid_comm=\'0\'; $(\'#body_comm\').val($(\'#body_comm\').attr(\'title\')); });</script>
			</div>
		</div>
	</div>';
}else{
if($_SESSION['user']!=null and $row['coments']!='on' and $rng2['nom_rango']=="Novato" and $moder2['rango']==11){
echo'
	<div class="miComentario">
		<div id="procesando"><div id="post"></div></div>
		<div class="answerInfo">
			<img class="avatar-48" width="48" height="48" src="';if($moder2['avatar']==null or $moder2['avatar']=="/images/avatar.gif"){echo''.$images.'/a48_9.jpg';}else{echo''.$moder2['avatar'].'';}echo'" alt="Avatar de Usuario en '.$comunidad.'" onerror="error_avatar(this, '.$moder2['id'].', 48)" />
		</div>

		<div class="answerTxt">
		  <div class="Container">
				<div class="error"></div>
								<textarea id="body_comm" class="onblur_effect autogrow" tabindex="1" title="Escribir un comentario..." style="resize:none;" onfocus="onfocus_input(this)" onblur="onblur_input(this)">Escribir un comentario...</textarea>
				<div class="buttons" style="text-align:left">
					<div class="floatL">
						<input type="button" onclick="add_comment(\'true\')" class="mBtn btnOk" value="Enviar Comentario" tabindex="2" />
					</div>

					<div class="floatR">
						<a style="font-size:11px" href="javascript:openpopup()">M&aacute;s Emoticones</a>
						<script type="text/javascript">function openpopup(){ var winpops=window.open("/emoticones.php","","width=180px,height=500px,scrollbars,resizable");}</script>
					</div>
					<div id="emoticons" style="float:right">
												<a href="#" smile=":)"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-286px; clip:rect(286px 16px 302px 0px);" alt="sonrisa" title="sonrisa" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=";)"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-308px; clip:rect(308px 16px 324px 0px);" alt="gui&ntilde;o" title="gui&ntilde;o" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=":roll:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-330px; clip:rect(330px 16px 346px 0px);" alt="duda" title="duda" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":P"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-352px; clip:rect(352px 16px 368px 0px);" alt="lengua" title="lengua" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":D"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-374px; clip:rect(374px 16px 390px 0px);" alt="alegre" title="alegre" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":("><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-396px; clip:rect(396px 16px 412px 0px);" alt="triste" title="triste" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="X("><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-418px; clip:rect(418px 16px 434px 0px);" alt="odio" title="odio" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":cry:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-440px; clip:rect(440px 16px 456px 0px);" alt="llorando" title="llorando" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":twisted:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-462px; clip:rect(462px 16px 478px 0px);" alt="endiablado" title="endiablado" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":|"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-484px; clip:rect(484px 16px 500px 0px);" alt="serio" title="serio" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":?"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-506px; clip:rect(506px 16px 522px 0px);" alt="duda" title="duda" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>

						<a href="#" smile=":cool:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-528px; clip:rect(528px 16px 544px 0px);" alt="picaro" title="picaro" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":oops:"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-550px; clip:rect(550px 16px 566px 0px);" alt="timido" title="timido" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="^^"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-572px; clip:rect(572px 16px 588px 0px);" alt="sonrizota" title="sonrizota" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile="8|"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-594px; clip:rect(594px 16px 610px 0px);" alt="increible!" title="increible!" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
						<a href="#" smile=":F"><span style="position:relative;"><img border=0 src="'.$images.'/big2.gif" style="position:absolute; top:-616px; clip:rect(616px 16px 632px 0px);" alt="babaaa" title="babaaa" /><img border=0 src="'.$images.'/space.gif" style="width:20px;height:16px" align="absmiddle" /></span></a>
					</div>

					<div class="clearfix"></div>
				</div>

				<script type="text/javascript">$(function(){ lastid_comm=\'0\'; $(\'#body_comm\').val($(\'#body_comm\').attr(\'title\')); });</script>
			</div>
		</div>
	</div>';}}







?>