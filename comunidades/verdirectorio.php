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
$link_subcategoriac=xss($_GET['link_subcategoriac']);	
$catego= mysql_query("SELECT * FROM `d_comunidades` WHERE `link_categoriac` = '".$link_categoriac."'");
$dscatg= mysql_fetch_array($catego);
$id_categoriac=$dscatg["id_categoriac"];
$nom_categoriac=$dscatg["nom_categoriac"];
$link_categoriac=$dscatg["link_categoriac"];		

$subcatego= mysql_query("SELECT * FROM `d_subcomunidades` WHERE `link_subcategoriac` = '".$link_subcategoriac."'");
$dssubcatg= mysql_fetch_array($subcatego);
$id_subcategoriac=$dssubcatg["id_subcategoriac"];
$nom_subcategoriac=$dssubcatg["nom_subcategoriac"];
$link_subcategoriac=$dssubcatg["link_subcategoriac"];	

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
function Pais_Contar_Comunidades($stry){
$link_subcategoriac=xss($_GET['link_subcategoriac']);	
$subcatego= mysql_query("SELECT * FROM `d_subcomunidades` WHERE `link_subcategoriac` = '".$link_subcategoriac."'");
$dssubcatg= mysql_fetch_array($subcatego);
$id_subcategoriac=$dssubcatg["id_subcategoriac"];
if($link_categoriac!=""){
$conpais="AND subcategoria='".$id_subcategoriac."'";
}
$paissql= mysql_query("SELECT * FROM c_comunidades WHERE `pais` = '".$stry."' ".$conpais."");
return mysql_num_rows($paissql);	
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
?></li>
<li><a title="Comunidades" href="/comunidades/dir/<?=$tipobusq;?>/<?=$link_categoriac;?>"><?=$nom_categoriac;?></a></li>
<li><?=$nom_subcategoriac;?></li><li class="last"></li></ul>
</div>
<div class="floatL content-box">

<?
$link_pais=xss($_GET['link_pais']);
if($link_pais=="Internacional"){
$link_pais="";
}
if($link_pais!=""){
$conpais="AND pais='".Pais_IMG($_GET['link_pais'])."'";
}
$subcatego= mysql_query("SELECT * FROM `c_comunidades` WHERE `subcategoria` = '".$id_subcategoriac."' ".$conpais."");
while($dssubc=mysql_fetch_array($subcatego)){
	?>
<div class="list-com-dir">
	<img src="<?=$dssubc["imagen"];?>" width="75" height="75" />
	<div class="data-list-com">
		<h3><a href="/comunidades/<?=$dssubc["shortname"];?>/"><?=$dssubc["nombre"];?></a> (Miembros: <?=$dssubc["numm"];?> - Temas: <?=$dssubc["numte"];?>)</h3>
		<p><?=$dssubc["descripcion"];?></p>
	</div>

	<div class="clearfix"></div>
</div> 
 <?
	}
?>




   
                        </div>
            <div class="floatR location-box">
        <h2><span>Comunidades por pais</span></h2>

        <ul>
                <li class="first-child"><a href="/comunidades/dir/Internacional/<?=$link_categoriac;?>/<?=$link_subcategoriac;?>">Todos los paises</a></li>
<?php 
$sqldult=$db->query("SELECT * FROM c_comunidades WHERE subcategoria ='".$id_subcategoriac."' GROUP BY pais HAVING count(*)>0");
while($temas=$db->fetch_array($sqldult)){
	echo'<li><a href="/comunidades/dir/'.Get_Pais($temas['pais']).'/'.$link_categoriac.'/'.$link_subcategoriac.'">'.Get_Pais($temas['pais']).'</a><span>'.Pais_Contar_Comunidades($temas['pais']).'</span></li>';
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