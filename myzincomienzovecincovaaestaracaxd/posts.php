<?php
include_once("configuracionGeneral.php");
/*******************************/
$Page = @ (int) $_GET['pagi'];
/****************************/
//Resultados por pagina.
$maxRe = 50;
//Empezando desde:
if(!isset($Page)) $Page = 0;
/****************************/
$mostrar = 10*$Page;
/*******************************/
$sqlpost = mysql_query("SELECT * FROM posts ORDER BY id DESC LIMIT $mostrar,$maxRe");
/*******************************/
if(!mysql_num_rows($sqlpost)) echo'<div class="emptyData">No hay mas posts...</div>';
/*******************************/
while($row = mysql_fetch_assoc($sqlpost))
{
 echo'
 <div class="list-element"> 
					<i class="icon '.categoria_id($row['categoria']).'"></i> 
					<a href="/posts/'.categoria_id($row['categoria']).'/'.$row['id'].'/'.urlencode($row['titulo']).'.html"> 
						'.recortar($row['titulo'],20).'					</a> 
				</div>
 ';
}
?>