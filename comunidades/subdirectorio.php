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

$link_categoriac=xss($_GET['link_categoriac']);	
$catego= mysql_query("SELECT * FROM `d_comunidades` WHERE `link_categoriac` = '".$link_categoriac."'");
$dscatg= mysql_fetch_array($catego);
$id_categoriac=$dscatg["id_categoriac"];
$nom_categoriac=$dscatg["nom_categoriac"];
$link_categoriac=$dscatg["link_categoriac"];		


function Get_Pais($stry){
$paissql= mysql_query("SELECT * FROM `paises` WHERE `img_pais` = '".$stry."' LIMIT 1");
$ds= mysql_fetch_array($paissql);
return $ds["nombre_pais"];	
}
function Pais_IMG($stry){
$paissql= mysql_query("SELECT * FROM `paises` WHERE `nombre_pais` = '".htmlentities(utf8_decode($stry))."' LIMIT 1");
$ds= mysql_fetch_array($paissql);
return $ds["img_pais"];	
}
function Contar_Comunidades($stry){
$link_pais=xss($_GET['link_pais']);
if($link_pais=="Internacional"){
$link_pais="";
}
if($link_pais!=""){
$conpais="AND pais='".Pais_IMG($_GET['link_pais'])."'";
}
$paissql= mysql_query("SELECT * FROM c_comunidades WHERE `subcategoria` = '".$stry."' ".$conpais."");
return mysql_num_rows($paissql);	
}
function Pais_Contar_Comunidades($stry){
$link_categoriac=xss($_GET['link_categoriac']);	
$catego= mysql_query("SELECT * FROM `d_comunidades` WHERE `link_categoriac` = '".$link_categoriac."'");
$dscatg= mysql_fetch_array($catego);
$id_categoriac=$dscatg["id_categoriac"];

if($link_categoriac!=""){
$conpais="AND categoria='".$id_categoriac."'";
}
$paissql= @mysql_query("SELECT * FROM c_comunidades WHERE `pais` = '".$stry."' ".$conpais."");
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
	<form action="http://buscador.dozzu.com/comunidades" method="GET">
		<input class="lst value" type="text" title="Search" value="Buscar en comunidades" maxlength="2048" size="41" name="q" autocomplete="off" />

		<input class="lsb2" type="submit" value="Buscar" />
    </form>
	</div>
</div>
<div style="margin-bottom:20px">
<div class="breadcrump">
<ul>
<li class="first"><a title="Comunidades" href="/comunidades/">Comunidades</a></li><li><a title="Comunidades" href="/comunidades/dir/">Directorio</a></li><li><?
$link_pais=xss($_GET['link_pais']);
if($link_pais=="Internacional"){
echo '<a title="Comunidades" href="/comunidades/dir/Internacional">Internacional</a>';
}else{
echo '<a title="Comunidades" href="/comunidades/dir/'.$link_pais.'">'.$link_pais.'</a>';
}
?>


</li>
<li><?=$nom_categoriac;?></li><li class="last"></li
></ul>
</div>
<div class="floatL content-box">

<?
$subcatego= mysql_query("SELECT * FROM `d_subcomunidades` WHERE `id_categoriac` = '".$id_categoriac."'");
while($dssubc=mysql_fetch_array($subcatego)){
	if($totalR=Contar_Comunidades($dssubc["id_subcategoriac"])>0){
	?>
  <div style="float:left; width:45%; margin-right:10px">
<h3><a href="/comunidades/dir/<?=$tipobusq;?>/<?=$link_categoriac;?>/<?=$dssubc["link_subcategoriac"];?>"><?=$dssubc["nom_subcategoriac"];?></a></h3>
</div>  
    <?
	}
	}
?>




   
                        </div>
            <div class="floatR location-box">
        <h2><span>Comunidades por pais</span></h2>

        <ul>
                <li class="first-child"><a href="/comunidades/dir/Internacional/<?=$link_categoriac;?>">Todos los paises</a></li>
<?php 
$sqldult=$db->query("SELECT * FROM c_comunidades WHERE categoria ='".$id_categoriac."' GROUP BY pais HAVING count(*)>0");
while($temas=$db->fetch_array($sqldult)){
	echo'<li><a href="/comunidades/dir/'.Get_Pais($temas['pais']).'/'.$link_categoriac.'">'.Get_Pais($temas['pais']).'</a><span>'.Pais_Contar_Comunidades($temas['pais']).'</span></li>';
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