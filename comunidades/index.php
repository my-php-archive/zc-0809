<?php
include("../header.php");
$comunidadget = xss(no_i($_GET['comunidad']));
$accion1 = xss(no_i($_GET['accion']));
$categoria1 = xss(no_i($_GET['categoria']));
$pagina1 = xss(no_i($_GET['pagina']));
$onlineu = $_SESSION['id'];

if($comunidadget){
$comunisql= mysql_query("SELECT co.*,ca.*,us.id,us.nick,cm.*,sub.* 
					   FROM c_comunidades co 
					   LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria 
					   LEFT JOIN usuarios us ON co.creadorid=us.id 
					   LEFT JOIN c_miembros cm ON cm.idcomunity=co.idco and cm.iduser='$onlineu' and cm.estado='0' 
					   LEFT JOIN c_subscategorias sub ON sub.id_categoria=co.categoria AND sub.id_subcategoria=co.subcategoria 
					   WHERE co.shortname='$comunidadget'");

if(!$existe=mysql_num_rows($comunisql)){
$titulo=$descripcion;
cabecera_normal();

fatal_error('La comunidad no existe');}

$co=mysql_fetch_array($comunisql);
mysql_free_result($comunisql);
$id_comuni=$co['idco'];

if($co['eliminado']=='1'){
$titulo = $comunidad;
$comunidad = "Sumate a la Revolucion";
  
  if($rangoz['rango']==255 or $rangoz['rango']==100 or $rangoz['rango']==655 or $rangoz['rango']==755)
  {

   echo'<div class="warningData">La comunidad esta eliminada</div>';
  }
  else
  {
fatal_error('La comunidad fue eliminada');}
}

$dest=mysql_query("SELECT nombre FROM c_comunidades WHERE idco='".$id_comuni."'");
$acados=mysql_fetch_array($dest);
$nomcom = $acados['nombre'];
$titulo	= $nomcom;
cabecera_comunidad();

$sqluserz=mysql_query("SELECT m.*,us.id,us.nick,us.avatar FROM c_miembros m LEFT JOIN usuarios us ON us.id=m.iduser WHERE m.estado='0' and m.idcomunity='{$id_comuni}' LIMIT 10");
while($rowu=mysql_fetch_array($sqluserz))
{
            $miembros['miembros'][] = array(
                'id' => $rowu['id'],
                'nick' => $rowu['nick'],
                'avatar' => $rowu['avatar'],
                'rangoco' => $rowu['rangoco'],);}

mysql_free_result($sqluserz);

# El ficer rompe pija me dijo que haga esto y es contra mi voluntad .______.
 $ficer = mysql_query("SELECT * FROM c_comunidades WHERE idco = '$id_comuni'") or die(mysql_error());
 $timbal = mysql_fetch_assoc($ficer);
 if($timbal['solo_mods'] == 1 and $rangoz['rango'] !== "255" and $rangoz['rango'] !== "100" and $rangoz['rango'] !== "655" and $rangoz['rango'] !== "755"){
   fatal_error("Esta comunidad solo puede ser vista por moderadores globales.",'Ir a p&aacute;gina principal','location.href=\'/\'','Error');
	}
 // Lesto .-.
switch($accion1){
case "agregar":

if($_SESSION['id']!=$co['iduser'] or $_SESSION['user']==null){
	fatal_error('Tienes que ser miembro para realizar esta operaci&oacute;n');
}

if($co['rangoco']=='1' or $co['rangoco']=='2'){
	fatal_error('No Tienes Rango Suficiente');
}

agregar();
break;
case "editar":

if($co['rangoco']!='5'){
	fatal_error('No tienes Rango.');}

editar(); break;
case "miembros": miembros(); break;
default: comunidad();}

}else{
$titulo	= $descripcion;
cabecera_normal();
inicio();}

function inicio(){
	global $db, $comunidad, $images;
	echo'<div id="cuerpocontainer">
<div class="comunidades">
<div class="home">
<div id="izquierda">
<div class="crear_comunidad">
<div class="box_cuerpo" style="background:#FFFFCC;border:#b5b539 1px solid; -moz-border-radius:7px">
<h3 style="margin:5px 0">Comunidades</h3>
<p style="color: #333">'.$comunidad.' te permite crear tu comunidad para que puedas compartir gustos e intereses con los dem&aacute;s.</p>
<div class="buttons">
<input id="a_susc" class="mBtn btnYellow" onclick="location.href=\'/comunidades/crear/\'" value="&iexcl;Crea la tuya! &raquo;" type="button" />
</div></div></div>
<br class="space">
<div class="destacadas">
<div class="box_title">
<span class="box_txt">Destacadas</span>
<span class="box_rss"></span>
</div>
<div class="box_cuerpo oficial" style="text-align:center">
<div class="avaComunidad">';

$sqldest=mysql_query("SELECT co.nombre,co.shortname,co.imagen,co.oficial FROM c_comunidades as co WHERE co.oficial=1 ORDER BY RAND() LIMIT 1");
while($destacados=mysql_fetch_array($sqldest)){echo'
<a href="/comunidades/'.$destacados['shortname'].'/"><img class="avatar" src="'.$destacados['imagen'].'" alt="'.$destacados['shortname'].'" title="'.$destacados['nombre'].'" /></a>
</div>
<a href="/comunidades/'.$destacados['shortname'].'/" style="font-weight:bold;font-size: 12px;color:#1A7706" title="'.$destacados['nombre'].'">'.$destacados['nombre'].'</a>';}
mysql_free_result($sqldest);

echo'</div></div>
<br class="space">


<!-- BEGIN SMOWTION TAG - 160x600 - zincomienzo: p2p - DO NOT MODIFY -->
<script type="text/javascript"><!--
smowtion_size = "160x600";
smowtion_section = "1165924";
//-->
</script>
<script type="text/javascript"
src="http://ads.smowtion.com/ad.js">
</script>
<!-- END SMOWTION TAG - 160x600 - zincomienzo: p2p - DO NOT MODIFY -->




</div>
<div id="centro">
<div class="box_title">
<div class="box_txt ultimos_posts">
			&Uacute;ltimos temas 
</div>
<div class="box_rss">
<a href="/rss/comunidades/" title="&Uacute;ltimos Temas"><span class="systemicons sRss" style="position: relative; z-index: 87;"></span></a>
</div></div><div class="box_cuerpo">
<ul>';

$categoria = $categoria1;
$limit_posts=20;

if($categoria == ''){
    $cat_condition = "";
}else{
    $cat_condition = "AND ca.link_categoria='{$categoria}'";}

if($categoria == ''){
	$request=mysql_query("SELECT * FROM c_temas WHERE elimte=0");
	$NroRegistros=mysql_num_rows($request);
}else{
	$request=mysql_query("SELECT t.*,co.*,ca.* FROM c_temas t LEFT JOIN c_comunidades co ON co.idco=t.idcomunid LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria WHERE 1=1 {$cat_condition}");
	$NroRegistros=mysql_num_rows($request);}

if(isset($pagina1)){
$RegistrosAEmpezar=($pagina1-1)*$limit_posts;
$PagAct=$pagina1;
}else{
$RegistrosAEmpezar=0;
$PagAct=1;}

$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$limit_posts;
$Res=$NroRegistros%$limit_posts;

if($Res>0){
$PagUlt=floor($PagUlt)+1;}

$sqldult=mysql_query("SELECT t.*,co.*,us.nick,ca.* FROM c_temas t LEFT JOIN c_comunidades co ON co.idco=t.idcomunid LEFT JOIN usuarios us ON us.id=t.id_autor LEFT JOIN c_categorias ca ON ca.id_categoria=co.categoria WHERE 1=1 AND t.elimte='0' AND co.eliminado='0' {$cat_condition} ORDER BY t.idte DESC LIMIT $RegistrosAEmpezar, $limit_posts");
while($temas=mysql_fetch_array($sqldult))
{
	echo'<li class="categoriaCom '.$temas['link_categoria'].''.($temas['oficial']=='1' ? ' oficial' : '').'">
				<a href="/comunidades/'.$temas['shortname'].'/'.$temas['idte'].'/'.corregir($temas['titulo']).'.html" class="titletema" title="'.$temas['nom_categoria'].' | '.$temas['titulo'].'">'.$temas['titulo'].'</a>
				En <a'.($temas['privada']=='2' ? ' class="systemicons cerrada"' : '').' href="/comunidades/'.$temas['shortname'].'/">'.$temas['nombre'].'</a> por <a href="/perfil/'.$temas['nick'].'">'.$temas['nick'].'</a>'.($temas['oficial']=='1' ? '<img src="'.$images.'/oficial.png" alt="Comunidad Oficial" title="Comunidad Oficial" class="comOfi">' : '').'</li>';
}
echo'
</ul>
<br clear="left">
<div class="paginator" align="center">';

if($PagAct>1) echo'<div class="floatL"><a href="/comunidades/'.($categoria != null ? "home/$categoria/" : '').'pagina.'.$PagAnt.'">&laquo; Anterior</a></div>';
if($PagAct<$PagUlt)  echo'<div class="floatR"><a href="/comunidades/'.($categoria != null ? "home/$categoria/" : '').'pagina.'.$PagSig.'">Siguiente &raquo;</a></div>';

echo'
<div class="clearBoth"></div>
</div></div></div>
<div id="derecha">



	<!-- buscador -->

	<div class="buscador">
		<div class="box_title">
			<span class="box_txt home_buscador">Buscador</span><span class="box_rss"></span>
		</div>
		<div class="box_cuerpo">
			<img class="leftIbuscador" src="http://o2.t26.net/images/InputSleft_2.gif" />
			<form style="padding:0;margin:0" name="buscador_home" method="GET" action="http://buscar.zincomienzo.net/comunidades" onsubmit="return com.buscador_home()">
				<input type="text" name="q" class="ibuscador onblur_effect" onfocus="onfocus_input(this)" onblur="onblur_input(this)" value="Buscar" title="Buscar" />

				<input type="submit" title="Buscar" value="" class="bbuscador" alt="Buscar" />
			</form>
			<div style="margin: 5px 5px 0pt 0pt; color: rgb(135, 135, 135); font-weight: bold;">
				<span class="floatL">Buscar en:</span>
				<div class="floatR buscarEn">
					<input type="radio" value="comunidades" onchange="com.buscador_home_radio(this.value)" name="buscar_en" id="buscar_en_comunidades" class="radio" checked="checked" />
					<label for="buscar_en_comunidades">Comunidades</label> 
					<input type="radio" value="temas" onchange="com.buscador_home_radio(this.value)" name="buscar_en" id="buscar_en_temas" class="radio" />

					<label for="buscar_en_temas">Temas</label> 
				</div>
				<div style="clear: both;"/></div>
			</div>
		</div>
	</div>
	<br class="space">








	<div class="ult_respuestas">
		<div class="box_title">
			<div class="box_txt ultimos_comentarios">&Uacute;ltimas respuestas</div>
			<div class="box_rss">
				<a href="javascript:com.actualizar_respuestas()">
					<span class="systemicons actualizar"></span>

				</a>
			</div>
		</div>
<div class="box_cuerpo" id="ult_resp">
<ul>';
require_once('../comunidades/ultimas-respuestas.php');
mensajes(false);
echo'
</ul>
</div>
</div>
<br class="space">
<div class="com_populares">
<div class="box_title">
<div class="box_txt">Comunidades Populares</div>
<div class="box_rrs"><span class="box_rss"></span></div>
</div>
<div class="box_cuerpo" style="padding:0 0 0 0; height: 250px;">
<div class="filterBy">Filtrar por: <a id="Semana" href="javascript:com.TopsTabs(\'Semana\')" class="here">Semana</a> - <a id="Mes" href="javascript:com.TopsTabs(\'Mes\')">Mes</a> - <a id="Historico" href="javascript:com.TopsTabs(\'Historico\')">Hist&oacute;rico</a>
</div>
<ol class="filterBy" id="filterBySemana">';

$fsemana = time() - (60*60*24*7);
$sqlsemana=mysql_query("SELECT nombre,shortname,numm FROM c_comunidades WHERE fecha BETWEEN '$fsemana' AND unix_timestamp() AND eliminado='0' ORDER BY numm DESC LIMIT 15");
while($semana=mysql_fetch_array($sqlsemana)){echo'
<li><a href="/comunidades/'.$semana['shortname'].'/">'.$semana['nombre'].'</a> ('.$semana['numm'].')</li>';}

echo'
</ol>
<ol class="filterBy" id="filterByMes">';

$fmes = time() - (2592000);
$sqlmes=mysql_query("SELECT nombre,shortname,numm FROM c_comunidades WHERE fecha BETWEEN '$fmes' AND unix_timestamp() AND eliminado='0' ORDER BY numm DESC LIMIT 15");
while($mes=mysql_fetch_array($sqlmes)){echo'
<li><a href="/comunidades/'.$mes['shortname'].'/">'.$mes['nombre'].'</a> ('.$mes['numm'].')</li>';}

mysql_free_result($sqlmes);
echo'
</ol>
<ol class="filterBy" id="filterByHistorico">';

$sqlhist=mysql_query("SELECT nombre,shortname,numm FROM c_comunidades WHERE eliminado='0' ORDER BY numm DESC LIMIT 15");
while($hist=mysql_fetch_array($sqlhist)){echo'
<li><a href="/comunidades/'.$hist['shortname'].'/">'.$hist['nombre'].'</a> ('.$hist['numm'].')</li>';}

mysql_free_result($sqlhist);
echo'
</ol>
</div>
</div>
<br class="space">
<div class="ult_comunidades">
		<div class="box_title">
			<div class="box_txt ultimas_comunidades">&Uacute;ltimas Comunidades</div>
			<div class="box_rrs"><span class="box_rss"></span></div>

		</div>
		<div class="box_cuerpo">
			<ul class="listDisc">';

$sqldulc=mysql_query("SELECT co.nombre,co.shortname FROM c_comunidades as co ORDER BY co.idco DESC LIMIT 15");
while($ucom=mysql_fetch_array($sqldulc)){echo'
<li><a href="/comunidades/'.$ucom['shortname'].'/" class="size10">'.$ucom['nombre'].'</a></li>';}

mysql_free_result($sqldulc);
echo'</ul>
<div style="background:#FFFFCC; border:1px solid #FFCC33; padding:5px;margin:5px 0 0 0;font-weight: bold; text-align:center;-moz-border-radius: 5px">
<a href="/comunidades/crear/" style="color:#0033CC">&iquest;Qu&eacute; esperas para crear la tuya?</a>
</div></div></div></div></div></div>';}

function comunidad(){
	global $db,$comunidadget,$co,$miembros,$images;

if($co['privada']=='2' and $_SESSION['id']==null){
fatal_error('Tienes que estar registrado para ingresar a esta comunidad');}
	
echo'<div id="cuerpocontainer">
<div class="comunidades">
<div class="breadcrump">
<ul>
<li class="first"><a href="/comunidades/" title="Comunidades">Comunidades</a></li><li><a href="/comunidades/home/'.$co['link_categoria'].'/" title="'.$co['nom_categoria'].'">'.$co['nom_categoria'].'</a></li><li>'.$co['nombre'].'</li><li class="last"></li>
</ul>
</div>
<div class="denunciar"><a href="javascript:com.denuncia_publica()" title="">Denunciar</a> - <a href="/comunidades/mod-history/?c='.$co['shortname'].'">Historial</a></div>
<div style="clear:both"></div>';
include("menu.php");
echo'
<div id="centro">
<div class="bubbleCont">
<div id="ComInfo" class="Container">
<div class="floatL">
<h1 style="*padding: 5px">'.$co['nombre'].'</h1>
</div>
<div class="verMas">
<a id="aVerMas" href="javascript:com.masinfo();">Ver m&aacute;s &raquo;</a>
</div>
				<div class="clearfix"></div>
				<br class="spacer"/>

				<div class="dataRow ">
					<p class="dataLeft">Descripci&oacute;n</p>

					<p class="dataRight">'.$co['descripcion'].'</p>
					<div style="clear:both"></div>
				</div>
				<div id="cMasInfo" style="display:none">
				<div class="dataRow">
					<p class="dataLeft">Categor&iacute;a</p>

<p class="dataRight">
<a href="/comunidades/home/'.$co['link_categoria'].'/" title="'.$co['nom_categoria'].'">'.$co['nom_categoria'].'</a> > '.$co['nombre_subcategoria'].'</p>
<div class="clearBoth"></div>
</div>';

if($co['oficial']=='1'){echo'
<div class="dataRow">
<p class="dataLeft">Oficial</p>
<p class="dataRight">Esta es una comunidad Oficial</p>
<div class="clearBoth"></div>
</div>';}

echo'
<div class="dataRow">
<p class="dataLeft">Creado</p>
<p class="dataRight">
por <a title="Ver el perfil de '.$co['nick'].'" href="/perfil/'.$co['nick'].'"><b>'.$co['nick'].'</b> </a> '.hace($co['fecha']).'
</p>
<div class="clearBoth"></div>
</div>	
<div class="dataRow">
<p class="dataLeft">Tipo</p>
<p class="dataRight">'.($co['privada']=='1' ? 'Todos pueden ver la comunidad' : 'Solo usuarios registrados pueden ver la comunidad').'</p>
<div class="clearBoth"></div>
</div>
<div class="dataRow">
<p class="dataLeft">Tipo de validaci&oacute;n</p>
<p class="dataRight">Los nuevos miembros son aceptados automaticamente<br />Con el rango <b>'.rangocomunidad($co['rango_default']).'</b>					</p>
<div class="clearBoth"></div>	
</div>
<div class="dataRow">
<p class="dataLeft">Creada</p>
<p class="dataRight" title="'.date('d.m.Y', $co['fecha']).' a las '.date('H:m:s', $co['fecha']).' hs.">'.hace($co['fecha']).'</p>
<div class="clearBoth"></div>	
</div>
</div>
<div class="clearBoth"></div>
</div>
</div><!-- COMUNIDAD DATA -->

<div class="bubbleCont clearbeta" style="margin: 10px 0 0 0;height:30px">			
	<form style="margin:0;padding:0" method="get" action="http://buscar.zincomienzo.net/comunidades">
		<input type="hidden" name="comunidad" value="" />
		<input type="hidden" name="type" value="temas" />
		<input name="q" style="float:left;-moz-border-radius:5px;-webkit-border-radius: 5px; border-radius:5px;height:19px;padding: 5px;_width:390px;width:410px;margin-right:5px" default="Buscar en la comunidad: Sigueme Y Te Sigo Recomiendame Y Te Recomendare" type="text" />
		<input class="mBtn btnOk"type="submit" value="Buscar"/>

	</form>
</div>


			<br class="spacer" />
';

$temsty=mysql_query("SELECT te.*,co.shortname,us.nick FROM c_temas te LEFT JOIN c_comunidades co ON co.idco=te.idcomunid LEFT JOIN usuarios us ON us.id=te.id_autor WHERE co.shortname='$comunidadget' and te.elimte = '0' and te.importante='on' ORDER BY te.fechate desc");

if(mysql_num_rows($temsty)){echo'
<div class="bubbleCont">
<div class="Container">
<h1>Importantes</h1>
<table style="clear:both" cellpadding="0" cellspacing="0">
<tr>
<td class="thead"></td>
<td class="thead titulo">Titulo</td>
<td class="thead" style="text-align:right;width:120px">Creado</td>
<td class="thead">Respuestas</td>
</tr>';

$num2=1;
while($styckt=mysql_fetch_array($temsty)){
$num2++;
echo'<tr class="temas color'.($num2%2==0 ? '1' : '2').'"><td>
<img src="'.$images.'/page.png" />
</td>
<td class="temaTitulo">
<a href="/comunidades/'.$styckt['shortname'].'/'.$styckt['idte'].'/'.corregir($styckt['titulo']).'.html">'.$styckt['titulo'].'</a><br />
<span class="small color_gray">Por <a href="/perfil/'.$styckt['nick'].'">'.$styckt['nick'].'</a></span>
</td>
<td class="datetema" style="text-align:right" title="'.date('d.m.Y',$styckt['fechate']).' a las '.date('H:m:s',$styckt['fechate']).' hs."> '.hace($styckt['fechate']).'</td>
<td class="datetema"> '.$styckt['numco'].' </td>
</tr>';}
mysql_free_result($temsty);

echo'
</table>  
<div class="clearBoth"></div>
</div>
</div>
<br class="spacer" />';}

if($_SESSION['id']!=$co['iduser'] or $_SESSION['user']==null){
echo'<div class="emptyData">
  Para poder participar en esta comunidad necesitas ser parte de la misma.<br />Para eso tienes que <a href="javascript:com.miembro_add()">Unirte</a>
</div>
<br class="spacer" />';}

echo'<div class="bubbleCont">
<div id="ComInfo" class="Container">
<a href="/rss/comunidades/'.$co['shortname'].'/" style="display:block; float:left; margin-top:4px" title="&Uacute;ltimos Temas"><span class="systemicons sRss" style="position: relative; z-index: 87;"></span></a>
<h1 class="floatL">Temas</h1>';

if($co['rangoco']=='5' or $co['rangoco']=='4' or $co['rangoco']=='3'){
echo'<div class="floatR">
<input type="button" class="mBtn btnYellow nuevoTema" onclick="location.href=\'/comunidades/'.$co['shortname'].'/agregar/\'" value="Nuevo Tema"/>	
</div>';}

echo '<div class="clearBoth"></div>';
$ultem=mysql_query("SELECT te.*,co.shortname,us.nick FROM c_temas te LEFT JOIN c_comunidades co ON co.idco=te.idcomunid LEFT JOIN usuarios us ON us.id=te.id_autor WHERE co.shortname='$comunidadget' AND te.elimte='0' ORDER BY te.fechate desc");
$cont=0;
if(mysql_num_rows($ultem)!=0){
echo'<table cellpadding="0" cellspacing="0">
<tr>
<td class="thead"></td>
<td class="thead titulo">Titulo</td>
<td class="thead" style="text-align:right;width: 120px">Creado</td>
<td class="thead" style="text-align:right">Respuestas</span></td>
</tr>';
while($ultemz=mysql_fetch_array($ultem)){
$cont++;
echo'
<tr class="temas color'.($cont%2==0 ? '1' : '2').'"><td>
<img src="'.$images.'/page.png" />
</td>
<td class="temaTitulo">
<a href="/comunidades/'.$ultemz['shortname'].'/'.$ultemz['idte'].'/'.corregir($ultemz['titulo']).'.html">'.$ultemz['titulo'].'</a><br />
<span class="small color_gray">Por <a href="/perfil/'.$ultemz['nick'].'">'.$ultemz['nick'].'</a></span>
</td>
<td class="datetema" style="text-align: right;" title="'.date('d.m.Y',$ultemz['fechate']).' a las '.date('H:m:s',$ultemz['fechate']).' hs."> '.hace($ultemz['fechate']).'</td>
<td class="datetema"> '.$ultemz['numco'].' </td>
</tr>';}
echo'</table>';}else{echo'<div class="emptyData">No hay m&aacute;s temas	</div>';}
mysql_free_result($ultem);

echo'<div class="pages"><!-- Paginado -->
<div class="clearBoth"></div>
</div>
</div>
</div>
</div>
<div id="derecha">';
include("demenu.php");
echo'</div></div>';}

function agregar(){
global $db,$comunidadget,$co,$miembros;
echo'
<div id="cuerpocontainer"><div class="comunidades"><div class="breadcrump"><ul>
<li class="first"><a href="/comunidades/" title="Comunidades">Comunidades</a></li><li><a href="/comunidades/home/'.$co['link_categoria'].'/" title="'.$co['nom_categoria'].'">'.$co['nom_categoria'].'</a></li><li><a href="/comunidades/'.$co['shortname'].'/" title='.$co['nombre'].'>'.$co['nombre'].'</a></li><li>Agregar tema</li><li class="last"></li>
</ul></div>
<div style="clear:both"></div>';
include("menu.php");
echo'
<div id="centroDerecha">
<script type="text/javascript">

function showError(obj, str) {
            //console.log(obj);
            if (obj.tagName.toLowerCase() == \'textarea\') {
		obj = $(obj).parent().parent().parent();
            }
            $(obj).parent().find(\'span\').addClass(\'error\').html(str).show();
            $.scrollTo($(obj).parent(), 500);}

function hideError(obj) {
            if (obj.tagName.toLowerCase() == \'textarea\') {
		obj = $(obj).parent().parent().parent();
            }
            $(obj).parent().find(\'span\').removeClass(\'error\').html(\'\').hide();
    }

    jQuery(document).ready(function($){

	$(\'.required\').bind(
		\'keyup change\',
		function(){
			if ($.trim($(this).val())) {
				hideError(this);
			}
		}
	);

$(\'input[name=preview]\').bind(
	\'click\',
		function(){
			var error = false;
				$(\'.required\').each(function(){
			if(!$.trim($(this).val())) {
				//console.log(this)
				showError(this, \'Este campo es obligatorio\');
				$(this).parent(\'li\').addClass(\'error\');
				error = true;
				return false;
		}
	});

	if (error) {
		return false;
	}

	if ($(\'textarea[name=cuerpo]\').val().length > 63206) {
		showError($(\'textarea[name=cuerpo]\').get(0), \'El tema es demasiado largo. No debe exceder los 65000 caracteres.\');
		return false;
	}

	if ($(\'textarea[name=cuerpo]\').val().indexOf(\'imageshack.us\') > 0) {
		showError($(\'textarea[name=cuerpo]\').get(0), \'No se permiten imagenes de IMAGESHACK.\');
		return false;
	}

		mydialog.close_button = true;
		mydialog.show();
		mydialog.title(\'Previsualizaci&oacute;n\');

		$.ajax({
			type: \'post\',
			url: \'/comunidades/tema_preview.php\',
			data: \'titulo=\' + encodeURIComponent($(\'input[name=titulo]\').val()) + \'&cuerpo=\' + encodeURIComponent($(\'textarea[name=cuerpo]\').val()),
			success: function(r) {

				mydialog.body(r);
				mydialog.buttons(true, true, \'Agregar tema\', \'postSave()\', true, true, true, \'Cerrar previsualizaci\xf3n\', \'close\', true, false);
				mydialog.center();

				$(\'#mydialog #buttons .mBtn.btnOk\').removeClass(\'btnCancel\').addClass(\'btnGreen\');
			}
		});
	});
});

function postSave() {
	confirm = false;
	document.forms.add_tema.submit();}

</script>
<div id="post_agregar" class="floatR">
<div class="box_title">
<div class="box_txt agregar_post">Agregar tema</div>
<div class="box_rss"></div></div>
<div id="mensaje-top">
<a target="_blank" href="/protocolo/">Importante: antes de crear un tema lee el protocolo.</a>
</div>

<div class="box_cuerpo">
<div class="form-container">
<form name="add_tema" method="post" action="/comunidades/agregando/" onsubmit="return validate_form(this, \'titulo,cuerpo,tags\')">
<input type="hidden" name="key" value="'.$_SESSION['id'].'" />
<input type="hidden" name="comid" value="'.$co['idco'].'" />
<div class="data">
<label for="uname">T&iacute;tulo</label>
<input class="c_input" type="text" value="" name="titulo" tabindex="1" datatype="text" dataname="Titulo" />
</div>
<div class="data">
<label for="uname">Cuerpo</label>
<textarea class="c_input_desc" id="markItUp" name="cuerpo" tabindex="8" datatype="text" dataname="Cuerpo"></textarea>
</div>
<div class="data postLabel">
<label for="uname">Opciones</label><br /><br />
<input type="checkbox" name="cerrado" id="check_cerrado" tabindex="11" /> <label for="check_cerrado">No se permite responder</label><br />';
if($co['rangoco']=="5"){
echo'<input type="checkbox" name="sticky" id="check_sticky" tabindex="12" /> <label for="check_sticky">Sticky</label><br />';}

echo'</div>
<div style="text-align:center">
<input class="mBtn btnGreen" style="width:auto; margin-left: 5px" type="button" value="Continuar &raquo;" name="preview" />
</div>
</form>
</div>
</div>
</div>
</div>
</div>';}

function editar(){
	global $db,$comunidadget,$co,$miembros,$images;
	echo'<div id="cuerpocontainer">	<div class="comunidades"><div class="breadcrump">
<ul>
<li class="first"><a href="/comunidades/" title="Comunidades">Comunidades</a></li><li><a href="/comunidades/home/'.$co['link_categoria'].'/" title="'.$co['nom_categoria'].'">'.$co['nom_categoria'].'</a></li><li><a href="/comunidades/'.$co['shortname'].'/" title="'.$co['nombre'].'">'.$co['nombre'].'</a></li><li>Editar comunidad</li><li class="last"></li>
</ul>
</div>
<div style="clear:both"></div>';
include("menu.php");
echo'<div id="centroDerecha">
<script type="text/javascript">
function validate_form_crear(f, campos){
	if(!validate_form(f, campos))
		return false;
	if($(f[\'tipo_val\']).val()==\'2\')
		if(!check_complete(f[\'rango_default\'], \'default\'))
			return false;
			
	return true;
}
</script>
<div id="centro">
<div style="background: #f7f7f7">
<div class="titleHighlight">Editar la comunidad</div>
<div class="form-container form2">
<form name="add_comunidad" method="post" action="/comunidades/editando/" onsubmit="return validate_form_crear(this, \'nombre,imagen,categoria,subcategoria,pais,descripcion,tags\')">
<input type="hidden" name="comid" value="'.$co['idco'].'" />
<input type="hidden" name="shortnamez" value="'.$co['shortname'].'" />
<div class="dataL">
<label for="uname">Nombre de la comunidad</label>
<input class="c_input" type="text" value="'.$co['nombre'].'" name="nombre" tabindex="1" datatype="text" dataname="Nombre" />
</div>




<div class="dataR">
<label for="fname">Categoria</label>
<select class="agregar_categoria" name="categoria" tabindex="5" datatype="select" default="-1" dataname="Categoria" onchange="com.get_subcategorias(this.value)">
<option value="-1">Elegir una categor&iacute;a</option>';
$sqlca=mysql_query("SELECT * FROM c_categorias");
while($categ=mysql_fetch_array($sqlca))
{echo'
	<option value="'.$categ['id_categoria'].'"'.($co['id_categoria']==$categ['id_categoria'] ? ' selected="true"' : '').'>'.$categ['nom_categoria'].'</option>'."\n";}
echo'</select>
</div>

<div class="clearBoth"></div>


<div class="dataL">
<span class="gif_cargando floatR" id="shortname" style="top:0px"></span>
<label for="uname">Nombre corto</label>
<input class="c_input" type="text" value="'.$co['shortname'].'" name="shortname" tabindex="2" onkeyup="com.crear_shortname_key(this.value)" onblur="com.crear_shortname_check(this.value)" datatype="text" dataname="Nombre corto" disabled />
<div class="desform">URL de la comunidad: <br /><strong>http://www.zincomienzo.net/comunidades/<span id="preview_shortname">'.$co['shortname'].'</span></strong></div>
<span id="msg_crear_shortname"></span></div>

<div class="dataR">
<span class="gif_cargando floatR" id="subcategoria" style="top:0px"></span>
<label for="fname">Sub-Categoria</label>

					<select class="agregar_subcategoria" name="subcategoria" tabindex="6" datatype="select" default="-1" dataname="Subcategoria">
						<option value="-1">Elegir una subcategor&iacute;a</option>';
$sqlsubca=mysql_query("SELECT * FROM c_subscategorias WHERE id_categoria='".$co['id_categoria']."'");
while($subc=mysql_fetch_array($sqlsubca))
{echo'
	<option value="'.$subc['id_subcategoria'].'"'.($co['id_subcategoria']==$subc['id_subcategoria'] ? ' selected="true"' : '').'>'.$subc['nombre_subcategoria'].'</option>'."\n";}
echo'</select>
</div>


<div class="clearBoth"></div>


<div class="dataL">
<label for="fname">Pa&iacute;s</label>
<select id="pais" name="pais" tabindex="4" datatype="select" default="-1" dataname="Pais">
<option value="-1">Seleccionar Pa&iacute;s</option>
<option value="-2">---</option>';
$sqlpais=mysql_query("SELECT * FROM paises");
while($pais=mysql_fetch_array($sqlpais))
{echo'
	<option value="'.$pais['id_pais'].'"'.($co['pais']==$pais['id_pais'] ? ' selected="selected"' : '').'>'.$pais['nombre_pais'].'</option>'."\n";}
mysql_free_result($sqlpais);
echo'</select>
</div>



<div class="clearBoth"></div>
<div class="data">
<label for="uname">Descripcion</label>
<textarea class="c_input_desc autogrow" style="resize: none;" name="descripcion" tabindex="7" datatype="text" dataname="Descripcion">'.$co['descripcion'].'</textarea>
</div>

<hr style="clear:both;margin-bottom:15px;margin-top:20px;" class="divider"/>
<div class="dataL dataRadio">
<label for="lname">Acceso</label>
<div class="postLabel">
<input name="privada" id="privada_1" type="radio" value="1"'.($co['privada']=='1' ? ' checked' : '').' tabindex="9" /><label for="privada_1">Todos</label><br />
<p class="descRadio">Todas las personas que visitan Zincomienzo podr&aacute;n acceder a tu comunidad. (Recomendado)</p>
<input name="privada" id="privada_2" type="radio" value="2"'.($co['privada']=='2' ? ' checked' : '').'/><label for="privada_2">S&oacute;lo usuarios registrados</label><br />	
<p class="descRadio">El acceso a tu comunidad estar&aacute; restringida &uacute;nicamente para los usuarios que se han registrado en Zincomienzo</p>
</div></div>
<div class="data" style="display:none">
<label for="lname">Tipo de validaci&oacute;n</label>
<div class="postLabel">
<input name="tipo_val" type="radio" value="1" checked onclick="com.create_show_rango_def(true)" /> Autom&aacute;tica<br />
<input name="tipo_val" type="radio" value="2" tabindex="10" onclick="com.create_show_rango_def(false)" /> Manual
</div></div>
<div class="dataR dataRadio" id="rango_default">
<label for="fname">Permisos</label>
<div class="postLabel">
<input name="rango_default" id="permisos_1" type="radio" value="3" '.($co['rango_default']=='3' ? ' checked' : '').' tabindex="11" /><label for="permisos_1">Posteador</label><br />
<p class="descRadio">Los usuarios al ingresar en tu comunidad podr&aacute;n comentar y crear temas.</p>
<input name="rango_default" id="permisos_2" type="radio" value="2" '.($co['rango_default']=='2' ? ' checked' : '').'/><label for="permisos_2">Comentador</label><br />
<p class="descRadio">Los usuarios al participar en tu  comunidad s&oacute;lo podr&aacute;n comentar pero no estar&aacute;n habilitados para crear nuevos temas.</p>
<input name="rango_default" id="permisos_3" type="radio" value="1" '.($co['rango_default']=='1' ? ' checked' : '').'/><label for="permisos_3">Visitante</label><br />
<p class="descRadio">
              Los usuarios al participar en tu comunidad no podr&aacute;n comentar ni tampoco crear temas.						</p>

					</div>
				</div>
				<br clear="all">
				<div style="color:#666;font-weight:normal;margin:5px 0; margin-top:20px;">
					  <strong>Nota:</strong>
					  La opci&oacute;n seleccionada le asignar&aacute; autom&aacute;ticamente el mismo rango a todos los usuarios que ingresan a tu comunidad, sin embargo, podr&aacute;s posteriormente modificarlo para cada uno de los participantes.				</div>

				<hr style="clear:both;margin-bottom:15px;margin-top:20px;" class="divider"/>


<hr style="clear:both;margin-bottom:15px;margin-top:20px;" class="divider"/>
				<div id="buttons">

<input class="mBtn btnOk" type="submit" tabindex="14" title="Guardar cambios" value="Guardar cambios" class="button" name="Enviar" />
<input class="mBtn btnDelete " type="button" tabindex="15" title="Eliminar comunidad" value="Eliminar comunidad" onclick="com.comunidad_eliminar(0)" />











</div>

</div></div></div>
<div id="izquierda" style="float:right; display:none">
<div class="box_title">
<div class="box_txt para_un_buen_post">Vista Previa</div>
<div class="box_rss"></div>
</div>
<div class="box_cuerpo">
		<div class="avaComunidad">
			<a href="/comunidades/putore/">
				<img onerror="com.error_logo(this)" title="Logo de la comunidad" alt="Logo de la comunidad" src="http://static.dev.hq.taringa.net/images/avatar.gif" class="avatar"/>
			</a>
		</div>
	<h2><a href="/comunidades/putore/">Nombre</a></h2>
	</div>
</div>

<script src="http://www.zincomienzo.net/images/js/es/cuenta.js?1.1" type="text/javascript"></script>



<div id="derecha" style="width: 193px;">
	<div class="tabbed-d" style="width: 193px;">
		<div class="sidebar-tabs clearbeta" style="width: 195px; border:1px solid #E9E94F">
			<h3>Imagen Comunidad</h3>
			<div class="avatar-big-cont">
				<div class="avatar-loading" style="display: none"></div>
				<img class="avatar-big" src="'.$co['imagen'].'" alt="" width="120" height="120" />
			</div>
			<div class="webcam-capture" style="display: none; margin: 0 0 0 10px">

				<div class="avatar-loading"></div>
				<!--[if !IE]> -->
				<object type="application/x-shockwave-flash" data="/capture.swf" width="175" height="130" wmode="transparent">
				<!-- <![endif]-->
				<!--[if IE]>
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="175" height="130">
				<param name="movie" value="/capture.swf" />
				<!-->
				<param name="loop" value="true" />
				<param name="menu" value="false" />
				<param name="wmode" value="transparent" />
				<param name="flashvars" value="id=49391&s=2&crc=cf516f867c1f12cb5413013deeeb80438276a748&texto=Tomar+foto&objeto=c&host=hh.taringa.net/upload.php" />

				<p>Tu navegador no soporta flash</p>
				</object>
				<!-- <![endif]-->
			</div>
			<div class="clearfix"></div>
			<ul class="change-avatar" style="display: none; margin: 0 0 0 60px;">
				<li class="local-file">
					<span><a onclick="avatar.chgtab(this)">Local</a></span>

					<div class="mini-modal">
						<div class="dialog-m"></div>
						<span>Subir Archivo</span>
						<input class="c_input" type="text" value="'.$co['imagen'].'" name="imagen" tabindex="3" datatype="url" dataname="Imagen" /><input class="button" type="submit" title="Subir" value="Subir" class="button" name="Subir" />
					</div>
				</li>
				<li class="webcam-file">
					<span><a onclick="avatar.chgtab(this)">Webcam</a></span>

				</li>
			</ul>
			<div class="clearfix"></div>
			<a class="edit" onclick="avatar.edit(this)">Editar</a></form>

</div>
</div>
</div>
</div>
</div>';}

function miembros(){
global $db,$comunidadget,$co,$miembros,$images;
echo'

<div id="cuerpocontainer">
<div class="comunidades">
<div class="breadcrump">
<ul>
<li class="first"><a href="/comunidades/" title="Comunidades">Comunidades</a></li><li><a href="/comunidades/home/'.$co['link_categoria'].'/" title="'.$co['nom_categoria'].'">'.$co['nom_categoria'].'</a></li><li><a href="/comunidades/'.$co['shortname'].'/" title="'.$co['nombre'].'">'.$co['nombre'].'</a></li><li>Miembros</li><li class="last"></li>
</ul>
</div>
<div style="clear:both"></div>';
include("menu.php");
echo'
<div id="centro">';
if($co['rangoco']=='5' or $co['rangoco']=='4'){echo'
	<div class="filterBy">
	<div class="floatL">

		<input id="miembros_list_search" class="search-input" type="text" value="" /><input type="button" class="mBtn btnOk" value="&raquo;" onclick="javascript:com.miembros_list_search_set()" style="padding:3px 10px;width:30px;" />
	</div>
  <ul>
<li id="act" class="here"><a href="javascript:com.miembros_list(\'act\')">Miembros</a></li>
<li id="susp"><a href="javascript:com.miembros_list(\'susp\')">Suspendidos</a></li>
<li id="history"><a href="javascript:com.miembros_list(\'history\')">Historial</a></li>
</ul>
<span class="gif_cargando floatR"></span>
<div class="clearBoth"></div>
</div>';}
echo'
<div id="showResult">';
foreach($miembros['miembros'] as $usermic)
{
	echo'<ul id="userid_'.$usermic['id'].'">
<li class="resultBox">
<h4><a href="/perfil/'.$usermic['nick'].'" title="Perfil de '.$usermic['nick'].'">'.$usermic['nick'].'</a></h4>
<div class="floatL avatarBox">
<a href="/perfil/'.$usermic['nick'].'" title="Perfil de '.$usermic['nick'].'">
<img width="75px" height="75px" src="'.$usermic['avatar'].'" onerror="error_avatar(this)" />
</a>
</div>
<div class="floatL infoBox">
<ul>
<li>Rango: <strong>'.rangocomunidad($usermic['rangoco']).'</strong></li>';
$sls=mysql_query("SELECT sexo FROM usuarios WHERE nick='".$usermic['nick']."'");
$p_user=mysql_fetch_array($sls);
echo'
<li>Sexo: <strong>'.sexcom($p_user['sexo']).'</strong></li>';
echo'<li><a href="/mensajes/a/'.$usermic['nick'].'" title="Enviar mensaje">Enviar mensaje</a></li>';
if($co['rangoco']==5 or $co['rangoco']==4){
if($usermic['nick']!=$_SESSION['user']){echo'
<li><a href="javascript:com.admin_users(\''.$usermic['id'].'\');" title="Administrar al usuario">Administrar</a></li>';}}
echo'</ul>
</div>
</li>
</ul>
';}
echo'
<div class="clearBoth"></div>
<div class="paginatorBar">
	<div class="floatR"><a href="javascript:com.miembros_list_sig()">Siguiente &raquo;</a></div>
	<div class="clearBoth"></div>
</div>


</div></div>
<div id="derecha">';
include('demenu.php');
echo'
</div></div>';}
pie();
?>