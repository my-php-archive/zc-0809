<?
include("header.php");
function no_ii($string)
{
    $string = mysql_real_escape_string($string);
    $string = stripslashes($string);
    return $string;
}
$q = strip_tags(no_ii(trim(($_GET['q']))));
$autor = no_i(trim(htmlentities($_GET['autor'])));
$cat = no_i($_GET['cat']);
$sort = no_i($_GET['sort']);

	$sq2l = "SELECT id FROM usuarios WHERE nick='".$autor."' ";
	$rs2 = mysql_query($sq2l,$con);
	if (mysql_num_rows($rs2)>0){
		$row2 = mysql_fetch_array($rs2);
		$cadena_usuario = " and id_autor='".$row2['id']."' ";
	}
	
if($sort == "1"){
$ORDAR = "ORDER BY p.fecha DESC";
}elseif($sort == "2"){
$ORDAR = "ORDER BY p.puntos DESC";
}elseif($sort == "3"){	
$ORDAR = "ORDER BY p.comentarios DESC";
}else{
$ORDAR = "ORDER BY p.fecha DESC";
}
$catg=xss($cat);
if(!empty($catg)&& $catg!=""){
$catg="&cat=".xss($cat)."";
$category=" AND c.link_categoria ='".$cat."'";
}
$section=xss($_GET['section']);
$fechaB=xss($_GET['fecha']);
if($fechaB == "1"){
}elseif($fechaB == "2"){
$fumes= "'".(time() - (60*60*24))."' AND '".(time())."'";
}elseif($fechaB == "4"){	
$fumes= "'".(time() - (60*60*24*7))."' AND '".(time())."'";
}elseif($fechaB == "5"){	
$fumes= "'".(time() - (60*60*24*30))."' AND '".(time())."'";
}elseif($fechaB == "6"){	
$fumes= "'".(time() - (60*60*24*365))."' AND '".(time())."'";
}else{
$fechaB = "1";
}
if(!empty($fechaB)){
if($fechaB!=1){

		$fechado=" AND p.fecha BETWEEN ".$fumes;

	}
	}
	
	
    $trozos=explode(" ",$q);
  	$numero=count($trozos); 
	
	
	if ($numero==1){
$_pagi_sql = "SELECT *
					FROM posts as p  
					inner join categorias as c
					on p.categoria=c.id_categoria 
					WHERE (titulo LIKE '%$q%' or contenido LIKE '%$q%') and elim='0' ".$fechado." ".$category." ".$cadena_usuario." ".$ORDAR."";
	}elseif ($numero>1){
		$longi=strlen($q);//cogemos la longitud de la cadena 
		//echo $longi."<br>"; 
		$q[$longi]="$";//finalizamos la cadena 
		$cont=0;//cuenta los caracteres que llevamos leidos 
		$cont2=0; //nos sirve para indicar en que posicion numerica empezara la siguiente cadena 
		$cad=" "; //hay que inicializarlas en blanco, sino sale la palabra "array" 
		$cadena[]=" "; //inicializamos el que va a ser el array de cadenas 
		$ncadenas=0;//cuenta el n&#186; de cadenas, condicionado por el espacio en blanco 
		for($x=0;$x<=$longi;$x++){
	   		if($q[$x]==' ' OR $q[$x]=='$')
			{ //si encuentra espacio en blanco o fin de cadena 
	       		$ncadenas++; //aumentamos el n&#186; de cadenas que vamos creando 
	       		for($y=0;$y<$cont;$y++){ 
	           	$cad[$y]=$q[$y+$cont2];//pasamos a una cadena nueva cada carater 
	       		} 
	       	$cad=ltrim($cad);//eliminamos los posibles espacios en blanco al principio 
	       	$cadena[$ncadenas]=$cad;//pasamos cada cadena creada al final de un array de cadenas 
	       	//echo "cadena buscada: ".$cad."<br>"; 
	       	$cont2+=$cont; 
	       	$cont=0;//ponemos el contador a 0 
	       	$cad=" "; //hay que ponerla en blanco otra vez porque sino quedan caracteres de la ultima cadena que tuvo &#233;sta variable 
	   		} 
	   	//echo $cadena[$ncadenas]; 
	   	$cont++; //aumentamos el contador 
		} 
		//creamos la "super consulta"
		$_pagi_sql="SELECT *
					FROM posts as p  
					inner join categorias as c
					on p.categoria=c.id_categoria 
					WHERE"; 
		for($x=1;$x<=$ncadenas;$x++){
	   	//echo $cadena[$x]; 
	   	$_pagi_sql.=" (titulo LIKE '%$cadena[$x]%' OR contenido LIKE '%$cadena[$x]%') AND"; 
		//estos son los campos que yo use, puedes poner los que quieras 
		} 
		$longiconsulta=strlen($_pagi_sql);
		$_pagi_sql=substr($_pagi_sql,0,($longiconsulta-3));//esto es para quitarle el ultimo OR 
		$_pagi_sql.= " AND elim='0' ".$fechado." ".$category." ".$cadena_usuario." ".$ORDAR."";//para que haga la ordenacion 
		$q=substr($q,0,$longi);//para corregir un defecto al finalizar la cadena con $ 
		//echo $buscar; 
		//echo $consulta; 
	}
	
	$_pagi_cuantos = 50;
include("../includes/paginator.inc.php");
	$alltotal=mysql_num_rows($_pagi_result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="google-site-verification" content="xLzDE9MQcQ5X1skYRVxR21fa1JtYpZqk1kWiN8yBxsQ" />
		<meta name="description" content="El buscador de Zincomienzo! ofrece excelentes resultados ya que permite la integraci&oacute;n de todos los contenidos de Internet junto a la mejor informaci&oacute;n seleccionada y evaluada por nuestra gran comunidad." />
		<link rel="search" type="application/opensearchdescription+xml" title="Zincomienzo! Buscador" href="/opensearch.xml" />
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<title><?=$q;?>	- <?=$comunidad;?> Buscador</title>

		<link type="text/css" rel="stylesheet" href="http://www.zincomienzo.net/images/search/estilo.css" />
				<script type="text/javascript">window.google_analytics_uacct = "UA-91290-9";</script>
		<script type="text/javascript">
			var global_location = 'posts';
			var global_data = {
				pais: 've'
			}
		</script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://www.zincomienzo.net/images/search/search.js?2.1"></script>
		
		<script src="http://www.google.com/jsapi">
		</script>

		<script type="text/javascript" charset="utf-8">
		google.load('ads.search', '2');
		</script>		
		
		<!--[if IE 6]>
		<script src="http://images/js/DD_belatedPNG_0.0.8a-min.js"></script>
		<script>DD_belatedPNG.fix('*');</script>
		<script src="http:///images/js/bgiframe.js"></script>
		<![endif]-->
	</head>
	<body class="posts">
		<div id="wrapper">
		<div id="header" class="clearfix">
	<div class="dozzu-bar clearfix">
		<ul class="floatL">
			<li class="tab-search iconos16 tab-home"><a href="<?=$url;?>"><span></span></a></li>

						<li class="tab-search iconos16 tab-web"><a href="/web?q=<?=$q;?>"><span></span> Web</a></li>
						<li class="tab-search iconos16 tab-posts selected"><a href=""><span></span> Posts</a></li>
			<li class="tab-search iconos16 tab-comunidades"><a href="/comunidades?type=temas&q=<?=$q;?>"><span></span> Comunidades</a></li>
						
					</ul>



				</div>
				
	<div class="search clearfix">

		<div id="logo">
			<a href="/">Zincomienzo!</a>
		</div>
		<div class="search-box clearfix">
			<form name="buscar">
				<div class="input-left"></div>			
				<input type="text" name="q" value="<?=$q;?>" />
				<div class="input-right"></div>
								<div class="btn-search floatL">

					<a href="" onclick="$('form[name=buscar]').submit(); return false"></a>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="container clearfix">
		<div id="sidebar">
		<div class="filter-box">
	<h6><a href="#"><span class="iconos16 icon-expand"></span></a>Motor</h6>

	<ul>
		<li class="clearfix"><a class="active" href="/posts?q=<?=$q;?>"><span>Zincomienzo!</span></a></li>
		<li class="clearfix"><a href="/posts?q=<?=$q;?>&engine=google"><span>Google</span></a></li>
	</ul>
</div>
<div class="filter-box">
	<h6><a href="#"><span class="iconos16 icon-expand"></span></a>Creado</h6>
	<ul>
        <li class="clearfix"><a href="/posts?q=<?=$q;?>&fecha=1<?=$catg;?>"><span>Historico</span></a></li>
		<li class="clearfix"><a href="/posts?q=<?=$q;?>&fecha=2<?=$catg;?>"><span>&Uacute;ltimas 24 horas</span></a></li>
		<li class="clearfix"><a href="/posts?q=<?=$q;?>&fecha=4<?=$catg;?>"><span>&Uacute;ltima semana</span></a></li>
		<li class="clearfix"><a href="/posts?q=<?=$q;?>&fecha=5<?=$catg;?>"><span>&Uacute;ltimo mes</span></a></li>
		<li class="clearfix"><a href="/posts?q=<?=$q;?>&fecha=6<?=$catg;?>"><span>&Uacute;ltimo a&ntilde;o</span></a></li>
	</ul>
</div>
<div class="filter-box">

	<h6><a href="#"><span class="iconos16 icon-expand"></span></a> <a href="#">Categor&iacute;a</a></h6>
		<select style="width: 140px" onchange="search.categoria('/posts?', '<?=$q;?>', this.value)">
		<option value="-1" selected="selected"></option>
	<?php 

	$categorias=mysql_query("SELECT * FROM categorias ORDER BY nom_categoria ASC");
while($cate=mysql_fetch_array($categorias))
{
echo '<option value="'.$cate['link_categoria'].'">'.$cate['nom_categoria'].'</option>';
}
?>
			</select>
</div>
<div class="filter-box">
	<h6><a href="#"><span class="iconos16 icon-expand"></span></a> <a href="#">Autor</a></h6>
	<input type="text" style="width: 105px;float:left" value="" autocomplete="off" title="Buscar por Usuario" onkeypress="search.autor_intro(event, '/posts?', '<?=$q;?>', this.value, 1)" />
	<input type="button" class="sbutton" value="&raquo;" onclick="search.autor_submit('/posts?', '<?=$q;?>', $(this).prev().val(), 1)" />
</div>
<div class="clearfix clearBoth" style="clear:both"></div>
	</div>
	<div id="results" class="results">
		
<!-- Filters -->

<!-- /Filters -->



<!-- Suggest -->
<p class="suggest" style="display:none">
	<span>Quisiste decir:</span> <a href=""></a> ?
</p>
<script type="text/javascript">search.suggest("<?=$q;?>", "<?=$q;?>", "<?=$q;?>", '/posts?&q=');</script><!-- /Suggest -->

<!-- Sort -->
<div class="filter-bar clearfix">
	<span>Ordenar por:</span>

	<ul>
    
		<li <? if($sort==""){echo 'class="selected"';}?>><a href="/posts?q=<?=$q;?>">Fecha</a></li>
		<li <? if($sort=="2"){echo 'class="selected"';}?>><a href="/posts?q=<?=$q;?>&sort=2">Calificaci&oacute;n</a></li>
		<li <? if($sort=="3"){echo 'class="selected"';}?>><a href="/posts?q=<?=$q;?>&sort=3">Relevancia</a></li>
	</ul>
	<div class="floatR search-results"><strong><?=$alltotal;?></strong> resultados totales</div>

</div>
<!-- /Sort -->

<!-- Banners -->
<div id="avisosTop"></div>
<!-- /Banners -->

<ol>
<?
function Get_Autor($idUser){
$sql= mysql_query("SELECT *
FROM `usuarios`
WHERE `id` ='".$idUser."'");
$row = mysql_fetch_array($sql);
return $row["nick"];
}
function Get_Favoritos($id){
$sql= mysql_query("SELECT *
FROM `favoritos`
WHERE `id` ='".$id."'");
$row = mysql_num_rows($sql);
return $row;
}
if($alltotal>0){
while($row = mysql_fetch_array($_pagi_result)){

$favorite = Get_Favoritos($row['id']);
?>
	<li class="result-i">
		<h2 title="<?=$row['categoria'];?>" class="categoriaPost <?=$row['link_categoria'];?>"><a title="<? echo $url.'/posts/'.$row['link_categoria'].'/'.$row['id'].'/'.corregir($row['titulo']).'.html'; ?>" href="<? echo $url.'/posts/'.$row['link_categoria'].'/'.$row['id'].'/'.corregir($row['titulo']).'.html'; ?>"><?=$row['titulo'];?></a></h2>
		<div class="info">
			<img src="http://www.zincomienzo.net/images/search/clock.png" alt="<?=hace($row['fecha']);?>" /> <strong title="<?=hace($row['fecha']);?>"><?=hace($row['fecha']);?></strong> - <img src="http://www.zincomienzo.net/images/search/autor.png" alt="Creado por <?=Get_Autor($row['id_autor']);?>" />  <strong><a href="<? echo $url.'/perfil/'.Get_Autor($row['id_autor']).'/'; ?>"><?=Get_Autor($row['id_autor']);?></a></strong><br />

			  <img src="http://www.zincomienzo.net/images/search/puntos.png" alt="<?=$row['puntos'];?> puntos" /><strong><?=$row['puntos'];?></strong> Puntos  - <img src="http://www.zincomienzo.net/images/search/favoritos.gif" alt="<?=$favorite;?> puntos" /> <strong><?=$favorite;?></strong> Favoritos - <img src="http://www.zincomienzo.net/images/search/comentarios.gif" alt="0 puntos" /> <strong><?=$row['comentarios'];?></strong> Comentarios<br /> 
</div>

	</li>
<?
}
}else{
?>  	
<div id="resultados" style="width:100%">
	<div class="emptyData">
		
<div class="med">
	<p>No se han encontrado resultados para su b&uacute;squeda.</p>
	<p style="margin-top: 1em;">Sugerencias:</p>
	<ul>
		<li>Comprueba que todas las palabras est&aacute;n escritas correctamente.</li>
		<li>Intenta usar otras palabras.</li>
		<li>Intenta usar palabras m&aacute;s generales.</li>
	</ul>
</div>
	</div>
<?
}
?>    
</ol>

<!-- Banners -->
<div id="avisosBot"></div>
<!-- /Banners -->
<div class="before floatL">
<?=$_pagi_navegacion;?>
</div>
<!-- Paginado -->
<!-- /Paginado -->
	</div>
		<div id="avisosVert"></div>
</div>	
	<script type="text/javascript" charset="utf-8">
	var pageOptions = {
	'pubId' : '<?=$ads_google;?>',
	'query' : '<?=$q;?>',
	'channel' : '<?=$channel_google;?>'
	}

	var avisosTop = {
	'container' : 'avisosTop',
	'number' : '3',
	'width' : 'auto',
	'lines' : '3',
	'fontFamily' : 'arial',
	'fontSizeTitle' : '14px',
	'fontSizeDescription' : '13px',
	'fontSizeDomainLink' : '13px',
	'colorText' : '#000000',
	'colorTitleLink' : '#0000de',
	'colorDomainLink' : '#228822',
	'colorBackground' : '#FFFFFF',
	'colorBorder': '#FFFFFF',
	'colorText' : '#666666', 
	'linkTarget' : '_blank',
	'hl' : 'es',
	'adsafe' : 'low'
	};

	var avisosVert = {
	'container' : 'avisosVert',
	'number' : '8',
	'format' : 'narrow',
	'fontFamily' : 'arial',
	'fontSizeTitle' : '13px',
	'fontSizeDescription' : '13px',
	'fontSizeDomainLink' : '13px',
	'colorText' : '#000000',
	'colorTitleLink' : '#0000de',
	'colorDomainLink' : '#228822',
	'colorBackground' : '#ffffff',
	'colorBorder': '#ffffff',
	'colorText' : '#666666', 
	'linkTarget' : '_blank',
	'hl' : 'es',
	'adsafe' : 'low'
	};



	new google.ads.search.Ads(pageOptions, avisosTop, avisosVert);
	</script>



<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-91290-9']);
_gaq.push(['_trackPageview']);
(function(){
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

		</div>

	</body>
</html>
