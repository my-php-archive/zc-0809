<?php
require_once("header.php");
$id = xss(no_i($_GET['categoria']));
$limit_posts=10;

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

if(isset($_GET['pagina'])){
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
		echo'
<li class="categoriaPost '.($postsst['patrocinado'] ? "sticky patrocinado" : 'sticky').'">

			<a href="/posts/'.$postsst['link_categoria'].'/'.$postsst['id'].'/'.corregir($postsst['titulo']).'.html" title="'.$postsst['titulo'].'">'.cortar(corregir($postsst['titulo'])).'</a>
		</li>';
    }
mysql_free_result($requestst);
}

//Posts Normales
	$requestn = mysql_query("SELECT p.*,c.*,u.rango FROM posts p LEFT JOIN categorias c ON c.id_categoria=p.categoria LEFT JOIN usuarios u ON u.id=p.id_autor WHERE p.elim='0' AND p.sticky='' {$cat_condition} ORDER BY p.id DESC LIMIT $RegistrosAEmpezar, $limit_posts");
	while($postsn = mysql_fetch_array($requestn))
	{
		echo'<li class="categoriaPost '.$postsn['link_categoria'].'">

			<a href="/posts/'.$postsn['link_categoria'].'/'.$postsn['id'].'/'.corregir($postsn['titulo']).'.html" title="'.$postsst['titulo'].'">'.cortar(corregir($postsn['titulo'])).'</a>
		</li>';
    }

?>