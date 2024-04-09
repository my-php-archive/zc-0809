<?php
include("../header.php");

$titulo = $descripcion;
cabecera_comunidad();	

$link_pais=xss($_GET['link_pais']);
if($link_pais=="Internacional"){
$link_pais="";
}
if($link_pais!=""){
$tipobusq=$_GET['link_pais'];
}else{
$tipobusq="Internacional";
}

function Get_Pais($stry){
$paissql= @mysql_query("SELECT * FROM `paises` WHERE `img_pais` = '".$stry."' LIMIT 1");
$ds= @mysql_fetch_array($paissql);
return $ds["nombre_pais"];	
}

function Pais_IMG($stry){
$xdSQL="SELECT * FROM `paises` WHERE `nombre_pais` = '".htmlentities(utf8_decode($stry))."' LIMIT 1";
$paissql= @mysql_query($xdSQL);
$ds= @mysql_fetch_array($paissql);
return $ds["img_pais"];	
}

function Pais_Contar_Comunidades($stry){
$paissql= @mysql_query("SELECT * FROM c_comunidades WHERE `pais` = '".$stry."'");
return @mysql_num_rows($paissql);	
}
function Contar_Comunidades($stry){
$link_pais=xss($_GET['link_pais']);
if($link_pais=="Internacional"){
$link_pais="";
}
if($link_pais!=""){
$conpais="AND pais='".Pais_IMG($_GET['link_pais'])."'";
}
$sqlf="SELECT * FROM c_comunidades WHERE `categoria` = '".$stry."' ".$conpais."";
$paissql= @mysql_query($sqlf);
return @mysql_num_rows($paissql);	
}

	?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="comunidades">
<div class="directorio-c">
<h1>Directorio de Comunidades</h1>
<div class="search-c">
	<div class="box-search">


	<form action="http://buscador.zincomienzo.net/comunidades" method="GET">
		<input class="lst value" type="text" title="Search" value="Buscar en comunidades" maxlength="2048" size="41" name="q" autocomplete="off" />

		<input class="lsb2" type="submit" value="Buscar" />
    </form>
	</div>
</div>
<div style="margin-bottom:20px">
<div class="breadcrump">
<ul>
<li class="first"><a title="Comunidades" href="/comunidades/">Comunidades</a></li><li><a title="Comunidades" href="/comunidades/dir/">Directorio</a></li><li>
<?
$link_pais=xss($_GET['link_pais']);
if($link_pais=="Internacional"){
$link_pais="";
}
if($link_pais!=""){
echo $link_pais;
}else{
echo "Internacional";
}
?></li><li class="last"></li>
</ul>
</div>
<div class="floatL content-box">
<?
$catego= mysql_query("SELECT * FROM `d_comunidades`");
while($dsc=mysql_fetch_array($catego)){
if($totalR=Contar_Comunidades($dsc["id_categoriac"])>0){
?>
<div style="float:left; width:45%; margin-right:10px">

<h3><a href="/comunidades/dir/<?=$tipobusq;?>/<?=$dsc["link_categoriac"];?>"><?=$dsc["nom_categoriac"];?></a> (<?=Contar_Comunidades($dsc["id_categoriac"]);?>)</h3>
<?
$subcatego= mysql_query("SELECT * FROM `d_subcomunidades` WHERE `id_categoriac` = '".$dsc["id_categoriac"]."' LIMIT 3");
while($subdsc=mysql_fetch_array($subcatego)){
$d++;
?>
<a href="/comunidades/dir/<?=$tipobusq;?>/<?=$dsc["link_categoriac"];?>/<?=$subdsc["link_subcategoriac"];?>"><?=$subdsc["nom_subcategoriac"];?></a><?
if($d!=3){
echo ",";
}
?> 
<?
}
?>      
</div>
<?
}
}
?>
                       </div>
            <div class="floatR location-box">
        <h2><span>Comunidades por pais</span></h2>

        <ul>
                <li class="first-child"><a href="/comunidades/dir/Internacional">Todos los paises</a></li>
<?php 
$sqldult=$db->query("SELECT * FROM c_comunidades GROUP BY pais HAVING count(*)>0");
while($temas=$db->fetch_array($sqldult)){


echo'<li><a href="/comunidades/dir/'.Get_Pais($temas['pais']).'">'.Get_Pais($temas['pais']).'</a><span>'.Pais_Contar_Comunidades($temas['pais']).'</span></li><br>';
}
$db->free_result($sqldulc);
?>
</ul>
               	 <a class="location-box-more">Ver mas</a>
       	     </div>
    <div class="clearfix"></div>
</div>
</div>
</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
<?
pie();
?>