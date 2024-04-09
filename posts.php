<?php
require_once("header.php");
error_reporting(0);
$id = xss(no_i($_GET['categoria']));
$limit_posts=52;

if($id == ''){
    $cat_condition = "AND u.rango!='11'";
}elseif($id == 'novatos'){
	$cat_condition = "AND u.rango='11'";
}
else{
    $cat_condition = "AND c.link_categoria='{$id}'";
}

//Determinar las paginas
if($id == ''){
	$request=mysql_query("SELECT * FROM posts WHERE elim=0");
	$NroRegistros=mysql_num_rows($request);
}elseif($id == 'novatos'){
	$request=mysql_query("SELECT p.*,u.* FROM posts as p LEFT JOIN usuarios as u ON u.id=p.id_autor WHERE p.elim=0 {$cat_condition}");
	$NroRegistros=mysql_num_rows($request);
}else{
	$request=mysql_query("SELECT p.*,c.* FROM posts as p LEFT JOIN categorias as c ON c.id_categoria=p.categoria WHERE p.elim=0 {$cat_condition}");
	$NroRegistros=mysql_num_rows($request);
}

if(intval($_GET['pagina'])){
$RegistrosAEmpezar=(xss(no_i($_GET['pagina']))-1)*$limit_posts;
$PagAct=xss(no_i($_GET['pagina']));
}else{
$RegistrosAEmpezar=0;
$PagAct=1;
}
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$limit_posts;
$Res=$NroRegistros%$limit_posts;

if($Res>0){
$PagUlt=floor($PagUlt)+1;
}

if ($PagAct==1){
	$requestst = mysql_query("SELECT p.*,c.*,u.rango FROM posts p LEFT JOIN categorias c ON c.id_categoria=p.categoria LEFT JOIN usuarios u ON u.id=p.id_autor WHERE p.elim='0' AND p.sticky='on' {$cat_condition} ORDER BY p.id DESC");
	while($postsst = mysql_fetch_array($requestst))
	{
		echo'<li class="categoriaPost '.($postsst['patrocinado'] ? "sticky patrocinado" : 'sticky').'">
	<a href="/posts/'.$postsst['link_categoria'].'/'.$postsst['id'].'/'.corregir($postsst['titulo']).'.html" target="_self" title="'.$postsst['titulo'].'" alt="'.$postsst['titulo'].'" class="categoriaPost '.$postsst['link_categoria'].'">'.cortar($postsst['titulo']).'</a>
	</li>';
    }
mysql_free_result($requestst);
}

//Posts Normales
$sqlfilp = "SELECT p.*,c.*,u.rango FROM posts p LEFT JOIN categorias c ON c.id_categoria=p.categoria LEFT JOIN usuarios u ON u.id=p.id_autor WHERE p.elim='0' AND p.sticky=''";
if($_COOKIE['pais_home'] and $_COOKIE['pais_home'] !=="0")
{
  $sqlfilp.=" AND u.pais ='".strtoupper($_COOKIE['pais_home'])."'";
}
$sqlfilp.=" {$cat_condition} ORDER BY p.id DESC LIMIT $RegistrosAEmpezar, $limit_posts";
	$requestn = mysql_query($sqlfilp);
    if(!mysql_num_rows($requestn))
    {
      echo'<div class="emptyData">No hay posts...</div>';
    }
	while($postsn = @mysql_fetch_array($requestn))
	{
		echo'<li class="categoriaPost '.$postsn['link_categoria'].'">
    <a href="/posts/'.$postsn['link_categoria'].'/'.$postsn['id'].'/'.corregir($postsn['titulo']).'.html" target="_self" title="'.$postsn['titulo'].'" alt="'.$postsn['titulo'].'" class="'.($postsn['privado'] ? "categoria privado" : '').'">'.cortar($postsn['titulo']).'</a>
    </li>';
    }
@mysql_free_result($requestn);

echo'</ul><br clear="left" /><div align="center" class="size13">';
    if($PagAct>1) echo'<a href="/'.($id != null ? "posts/$id/" : '').'pagina'.$PagAnt.'">&laquo; Anterior</a>';
    if($PagAct>1 && $PagAct<$PagUlt) echo '&nbsp;';
    if($PagAct<$PagUlt)  echo'<a href="/'.($id != null ? "posts/$id/" : '').'pagina'.$PagSig.'">Siguiente &raquo;</a>';
echo'</div></div>';
?>