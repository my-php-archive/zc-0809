<?php
include("header.php");
cabecera_normal();
$id = $_SESSION['id'];
 $ide = mysql_real_escape_string($_GET['id']);
$sql = mysql_query("select * from news where id = '{$ide}'");
$row = mysql_fetch_assoc($sql);
?>
<?php
$cant = mysql_num_rows($sql);
if($cant ==0)
{
  fatal_error("La noticia no existe");
}


 echo'
<div id="cuerpocontainer">

<div class="post-contenedor">
		<div class="post-title">

			<h1 property="dc:title">'.$row['titulo'].'</h1>

		</div>
					<div class="post-contenido">



			<span property="dc:content">
            '.$row['cuerpo'].'

			</span>


</div>
								<div class="banner 728x90">
								 Posteada por '.$row['por'].' El dia '.$row['fecha'].' a las '.$row['hora'].'.
								</div>
										</div>   ';
    ?>
<?php
pie();
?>