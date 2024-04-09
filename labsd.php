<?php
include("header.php");
/*
LEANDRO, NO TE HAGAS LA PAJA, NO TENES POR Q ENTRAR Y ELIMINAR EL ARCHIVO, IBA UN %
LA CONCHA NEGRA ._.

IGUAL ME HICISTE UN FAVOR :D
*/
cabecera_normal();
/*****************************/

/*****************************/
$cat = xss(no_i($_GET['cat']));
$periodo = xss(no_i($_GET['periodo']));
/*** Periodos ***/
$quince = time() - (60*15);
$hora = time() - (60*60);
$tresh = time() - (3*60*60);
$seish = time() - (6*60*60);
/*** Periodos ***/
// Funciones :D zincomienzo
function GetPost($id,$other)
{
  $sql = mysql_query("SELECT * FROM posts WHERE id = '$id'");
  $row = mysql_fetch_assoc($sql);
  return $row[$other];
}
function tit($s)
{
  $s = str_replace(" ","+",$s);
  return $s;
}
function GetCat($id)
{
  $sql = mysql_query("SELECT * FROM categorias WHERE id_categoria = '$id'");
  $row = mysql_fetch_assoc($sql);
  return $row['link_categoria']; //
}
// Funciones zincomienzo
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->

<?php

?>

		<div class="left" style="float:left;width:150px">
		<div class="boxy">
			<div class="boxy-title">
				<h3>Filtrar</h3>
				<span class="icon-noti"></span>
			</div>
			<div class="boxy-content">
				<h4>Categor&iacute;a</h4>
				<select onchange="location.href='/destacados/?periodo=1h&cat=' + $(this).val()">
					<option value="-1" <? if(!$cat){?>selected="selected" <? } ?>>Todas</option>
                    <?php
                    $sql = mysql_query("SELECT * FROM categorias ORDER BY id_categoria DESC");
                    while($cat = mysql_fetch_assoc($sql))
                    {
					echo'<option value="'.$cat['id_categoria'].' '; if($cat == $cat['id_categoria']) echo'selected="selected"'; echo'">'.$cat['nom_categoria'].'</option>';
                    }
                     ?>
						 			</select>
				<hr />
				<h4>Per&iacute;odo</h4>
				<ul>
					<li>
						<a href="/destacados/?periodo=15m&cat=ar" <?php if($periodo == "15m" or !$periodo){echo'class="selected"';}?>>
							&Uacute;ltimos 15 minutos						</a>
					</li>
					<li>
				   <a href="/destacados/?periodo=1h&cat=ar" <?php if($periodo == "1h"){echo'class="selected"';}?>>
							&Uacute;ltima hora						</a>
					</li>
					<li>
						<a href="/destacados/?periodo=3h&cat=ar" <?php if($periodo == "3h"){echo'class="selected"';}?>>
							&Uacute;ltimas 3 horas						</a>
					</li>
					<li>
						<a href="/destacados/?periodo=6h&cat=ar" <?php if($periodo == "6h"){echo'class="selected"';}?>>
							&Uacute;ltimas 6 horas						</a>
					</li>
				</ul>
				<hr />
				<h4>Pa&iacute;s</h4>
				<ul><div class="emptyData">Proximamente :)</div></ul>
			</div>
		</div>
	</div>
	<div id="trends-content" class="right" style="float:left;margin-left:10px;width:775px">
              <?php
              $sql = "SELECT DISTINCT id_post FROM comentarios ";
              switch ($periodo)
              {
                case "15m":
                $sql.="WHERE fecha BETWEEN '$quince' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
                break;
                default;
                case "1h":
                $sql.="WHERE fecha BETWEEN '$hora' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
                break;
                case "3h":
                $sql.="WHERE fecha BETWEEN '$tresh' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
                break;
                case "6h":
                $sql.="WHERE fecha BETWEEN '$seish' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
                break;
              }

              $sqlq = mysql_query($sql);
              ?>
		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Comentarios</h3>
			</div>
			<div class="boxy-content">
            <?php
            if(!mysql_num_rows($sqlq))
              {
                echo'<div class="emptyData">Nada por aqui...</div>';
              }
            ?>
            <ol>
              <?php

              while($c = mysql_fetch_assoc($sqlq))
              {
             echo'<li class="categoriaPost clearfix '.GetCat(GetPost($c['id_post'],"categoria")).'">
					<a href="/posts/'.GetCat(GetPost($c['id_post'],"categoria")).'/'.$c['id_post'].'/'.tit(GetPost($c['id_post'],"titulo")).'.html">
						'.GetPost($c['id_post'],"titulo").'					</a>
					<span>'.GetPost($c['id_post'],"puntos").'</span>
				     </li>';}
                     ?>
							</ol>

						</div>
		</div>
          <?php
          //     Puntos recibidos      //
          //     ZINCOMIENZO.NET       //
          //                           //
          //////////////////////////////

           $sqlp = "SELECT DISTINCT num FROM puntos";
           switch ($periodo)
           {
             case "15m":
             $sqlp.=" WHERE fecha BETWEEN '$quince' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
             break;
             default;
             case "1h":
             $sqlp.=" WHERE fecha BETWEEN '$hora' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
             break;
             case "3h":
             $sqlp.=" WHERE fecha BETWEEN '$tresh' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
             break;
             case "6h":
             $sqlp.=" WHERE fecha BETWEEN '$seish' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
             break;
           }

             $sqlpu = mysql_query($sqlp) or die("Mysql dijo ::) ".mysql_error());
          ?>
		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Puntos recibidos</h3>
			</div>
			<div class="boxy-content">
            <?php
             if(!mysql_num_rows($sqlpu)) // :monkey: :B
                       {
                         echo'<div class="emptyData">Nada por aqui...</div>';
                       }
            ?>
            <ol>
					   <?php

            while($p = mysql_fetch_assoc($sqlpu))
            {
             echo'<li class="categoriaPost clearfix '.GetCat(GetPost($p['num'],"categoria")).'">
					<a href="/posts/'.GetCat(GetPost($p['num'],"categoria")).'/'.$p['num'].'/'.tit(GetPost($p['num'],"titulo")).'.html">
						'.GetPost($p['num'],"titulo").'					</a>
					<span>'.GetPost($p['num'],"puntos").'</span>
				     </li>';
            }
                      ?>
       </ol>
						</div>
		</div>
    <?php

    $sqlf = "SELECT DISTINCT id_post FROM favoritos";
     switch ($periodo)
     {
       case "15m":
       $sqlf.=" WHERE fecha BETWEEN '$quince' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
       break;
       default;
       case "1h":
       $sqlf.=" WHERE fecha BETWEEN '$hora' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
       break;
       case "3h":
       $sqlf.=" WHERE fecha BETWEEN '$tresh' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
       break;
       case "6h":
       $sqlf.=" WHERE fecha BETWEEN '$seish' AND unix_timestamp() ORDER BY fecha DESC LIMIT 15";
       break;
     }

              $sqlfa = mysql_query($sqlf) or die(mysql_error());
    ?>
		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Favoritos</h3>
			</div>
			<div class="boxy-content">
            <?php
            if(!mysql_num_rows($sqlfa))
            {
              echo'<div class="emptyData">Nada por aqui...</div>';
            }
            ?>
						<ol>
						<?php
            while($f = mysql_fetch_assoc($sqlfa))
              {
             echo'<li class="categoriaPost clearfix '.GetCat(GetPost($f['id_post'],"categoria")).'">
					<a href="/posts/'.GetCat(GetPost($f['id_post'],"categoria")).'/'.$f['id_post'].'/'.tit(GetPost($f['id_post'],"titulo")).'.html">
						'.GetPost($f['id_post'],"titulo").'					</a>
					<span>'.GetPost($f['id_post'],"puntos").'</span>
				     </li>';}
                     ?>

							</ol>
						</div>
		</div>
           <?php

           $sqlr = "SELECT DISTINCT id_post FROM notificaciones";
           switch ($periodo)
           {
             case "15m":
             $sqlr.=" WHERE fecha BETWEEN '$quince' AND unix_timestamp() AND detalle = 'sprite-recomendar-p' ORDER BY fecha DESC LIMIT 15";
             break;
             default;
             case "1h":
             $sqlr.=" WHERE fecha BETWEEN '$hora' AND unix_timestamp() AND detalle = 'sprite-recomendar-p' ORDER BY fecha DESC LIMIT 15";
             break;
             case "3h":
             $sqlr.=" WHERE fecha BETWEEN '$tresh' AND unix_timestamp() AND detalle = 'sprite-recomendar-p' ORDER BY fecha DESC LIMIT 15";
             break;
             case "6h":
             $sqlr.=" WHERE fecha BETWEEN '$seish' AND unix_timestamp() AND detalle = 'sprite-recomendar-p' ORDER BY fecha DESC LIMIT 15";
             break;
           }
           $sqlre = mysql_query($sqlr) or die(mysql_error());
           ?>
		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Recomendaciones</h3>
			</div>
			<div class="boxy-content">
            <?php
            if(!mysql_num_rows($sqlre))
            {
              echo'<div class="emptyData">Nada por aqui...</div>';
            }
            ?>
						<ol>
						 <?php
                          while($r = mysql_fetch_assoc($sqlre))
              {
             echo'<li class="categoriaPost clearfix '.GetCat(GetPost($r['id_post'],"categoria")).'">
					<a href="/posts/'.GetCat(GetPost($r['id_post'],"categoria")).'/'.$r['id_post'].'/'.tit(GetPost($r['id_post'],"titulo")).'.html">
						'.GetPost($r['id_post'],"titulo").'					</a>
					<span>'.GetPost($r['id_post'],"puntos").'</span>
				     </li>';}
                         ?>
							</ol>
						</div>
		</div>

		</div>

 	<!-- <script type="text/javascript">
		jQuery(document).ready(function($){
			var trends_update = setInterval(
				function(){
					$.ajax({
						type: 'get',
						url: '/destacados',
						data: 'ajax=1&periodo=1h&cat=ar',
						success: function (r) {
							$('#trends-content').html(r);
						}
					});
				},
				60000
			);
		});   -->
	</script>
	<div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<?php
pie();
?>