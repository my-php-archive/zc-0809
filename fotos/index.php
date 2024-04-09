<?php
include("../header.php");
$titulo	=	"Fotos";  
cabecera_normal();
?>

<div id="cuerpocontainer">
<link href="/images/css/fotos.css" rel="stylesheet" type="text/css" />

<!-- inicio cuerpocontainer -->              <script type="text/javascript" src="http://www.tscript.in/demo/Temas/default/js/fotos.js"></script>
				<style>
                
				</style>

                                
                <div id="centroDerecha" style="width: 630px; float: left;">
                	<div class="">
                        <h2 style="font-size: 15px;">&Uacute;ltimas fotos</h2>
                    </div>
                      <ul class="fotos-detail listado-content">
                                            	<li>


                                            	
                                            
                                           



<?php
	$_pagi_sql = "SELECT * FROM fotos ORDER BY id DESC ";
	$rs = mysql_query($_pagi_sql, $con);
	if (mysql_num_rows($rs)>0)
	{
?>


<?php
		$_pagi_cuantos = 10; 
		include("paginator.inc.php"); 
		while($row = mysql_fetch_array($_pagi_result))
		{
?>



<div class="avatar-box" style="z-index: 99;">

<a href="/fotos/Zincomienzo/<?=$row['id'];?>/<?=$row['titulo'];?>.html">
                            		




<img height="100" width="100" src="<?=$row['foto'];?>"/>

                                </a>
                            </div>
                            <div class="notification-info">
                            	<span>
                                    <a href="/fotos/Zincomienzo/<?=$row['id'];?>/<?=$row['titulo'];?>.html"><?=$row['titulo'];?></a><br /> 
                            		<span title="27.02.11 a las 21:03 hs." class="time"><strong><?=hace($row['fecha']);?></strong> - Por <?php
        $lala = "select * from usuarios where id = ".$row['id_autor']."";
         $lelele = mysql_query($lala);
         while($lela = mysql_fetch_assoc($lelele)){
           echo'<a href="http://www.zincomienzo.net/perfil/'.$lela['nick'].'">'.$lela['nick'].'</a>';
         }
        ?></a></span><hr />
                                    
                                  <span class="time"><?=limit_chars_words($row['detalle']);?></span>


                                </span>
                            </div>
                        </li>

<li>
                










<?php
		}
	}
?>


</div>












                

<div style="width: 300px; float: right;" id="post-izquierda">

<?php

$mb=mysql_query("SELECT count(*) as cantidad FROM fotos");
$mbz=mysql_fetch_array($mb);

$poz=mysql_query("SELECT count(*) as cantidad FROM comentariosfotos");
$pos=mysql_fetch_array($poz);

$cmz=mysql_query("SELECT count(*) as cantidad FROM usuarios");
$com=mysql_fetch_array($cmz);


$cone=mysql_query("SELECT * FROM usuarios WHERE ultimaaccion>unix_timestamp()-2*60 ORDER BY ultimaaccion DESC");
$conez=mysql_num_rows($cone);



echo "



<div class='categoriaList estadisticasList'>
                        <h6>Estad&iacute;sticas</h6>
                        <ul>
                            <li class='clearfix'><a href='#'><span class='floatL'>Miembros</span><span class='floatR number'>".$com['cantidad']."</span></a></li>

                            <li class='clearfix'><a href='#'><span class='floatL'>Fotos</span><span class='floatR number'>".$mbz['cantidad']."</span></a></li>
                            <li class='clearfix'><a href='#'><span class='floatL'>Comentarios</span><span class='floatR number'>".$pos['cantidad']."</span></a></li>
                        </ul>
                    </div>




";


?>


                
<div class="birthHome clearbeta">
	<div class="clima-h-city">

		Mas Fotos
		<img class="changec" style="vertical-align:middle" src="/images/mas-fotos.png" alt="" />
	</div>
    <div class="clima-h-data">
		<div>
		<?php echo "".$_pagi_navegacion."";?>	

		</div>
	</div>
</div>


<br class="space" />

		

	<div style="width: 300px; float: right;" id="post-izquierda">
                   <div class="categoriaList">

                        <h6>&Uacute;ltimos comentarios</h6>
                         
<?php

$categoria	=	xss(no_i($_GET['categoria']));

if($categoria == ''){
	$condicion = "1=1";
}else if($categoria == 'novatos'){
	$condicion = "u.rango = '11' ";
}else{
	$condicion = "cat.link_categoria = '$categoria' ";
}

$sqlcome=mysql_query("SELECT c.autor, p.titulo, p.id, cat.link_categoria
FROM comentariosfotos as c 
LEFT JOIN usuarios as u ON u.id = c.id_autor
LEFT JOIN fotos as p ON p.id = c.id_post 
LEFT JOIN categorias as cat on cat.id_categoria = p.categoria 
WHERE p.elim='0' AND {$condicion} ORDER BY c.fecha DESC LIMIT 15 ");

while($com = mysql_fetch_array($sqlcome))
{
echo'<ul>';
echo'<li><strong>'.$com['autor'].'</strong> &raquo; <a href="/fotos/'.$com['link_categoria'].'/'.$com['id'].'/'.corregir($com['titulo']).'.html#comentarios-abajo">'.cortar($com['titulo']).'</a></li>';
echo'</ul>';



}

?>
                    </div>
 </div>












<?php
if($_SESSION['id']!=null){
?>



<?php
}
?>




                               </div> <div class="clearBoth"></div>
	<!-- fin cuerpocontainer -->


<?php
pie();
?>
