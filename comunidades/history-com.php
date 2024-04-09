<?php
include("../header.php");
cabecera_normal();
$comunidadd = xss(no_i($_GET['c']));
$CantCom = mysql_num_rows(mysql_query("SELECT * FROM c_comunidades WHERE shortname = '{$comunidadd}'"));
function ComNom($id)
{
  $sql = mysql_query("SELECT nombre FROM c_comunidades WHERE shortname = '{$id}'");
  $com = mysql_fetch_assoc($sql);
  return $com['nombre'];
}
function Ctit($titulo)
{
  $titulo = str_replace(" ","+",$titulo);
  return $titulo;
}
function seguridad($entra){
if(get_magic_quotes_gpc()){
$entra = stripslashes($entra);}
return mysql_real_escape_string($entra);}

function GetNick($id)
{
  $sql = mysql_query("SELECT * FROM usuarios WHERE id = '{$id}'");
  $nick = mysql_fetch_assoc($sql);
  return $nick['nick'];
}
function GetTemaT($id)
{
  $sql = mysql_query("SELECT * FROM c_temas WHERE idte = '{$id}'");
  $tema = mysql_fetch_assoc($sql);
  return $tema['titulo'];
}

?>

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->



<div class="comunidades">

<div class="breadcrump">
<ul>
<li class="first"><a href="/comunidades/" title="Comunidades">Comunidades</a></li><li>Historial de moderaci&oacute;n</li><?php if(!$comunidad){echo'<li class="last"></li>';} ?><?php if($comunidad && $CantCom){ ?><li><?=ComNom($comunidad)?></li><li class="last"></li> <?php } ?>
</ul>
</div>

	<div style="clear:both"></div>




	<div id="resultados" style="width:100%">

    <table class="linksList">

	<thead>

            <tr>

                <th>Comunidad > Tema</th>

                <th>Acci&oacute;n</th>

                <th>Moderador</th>

                <th>Causa</th>

            </tr>

        </thead>
          <?php
       $sql = "SELECT * FROM comhis";
       if($CantCom)
       {
         $sql.= " WHERE shortc = '{$comunidadd}'";
       }
       $sql.=" ORDER BY id DESC LIMIT 20";
         $sqlq = mysql_query($sql);
         $cantc = mysql_num_rows($sqlq);
         if(!$cantc)
         {
           echo'<div class="emptyData">No hay acciones de la comunidad seleccionada</div>';
         }
       while($row = mysql_fetch_assoc($sqlq))
       {
     ?>

	<tbody>

            <tbody>

                <tr>

                    <td style="text-align: left;">

                    <a class='titlePost' href='/comunidades/<?=$row['shortc']?>/<?=$row['tema']?>/<?=Ctit(GetTemaT($row['tema']))?>.html'><?=GetTemaT($row['tema'])?></a><br>En <a href='/comunidades/<?=$row['shortc']?>/'><?=ComNom($row['shortc'])?></a>                    </td>

                    <td>

                        <?php
                        switch ($row['act'])
                        {
                          case 0:
                          echo'<span class="color_red">Eliminado</span>';
                          break;
                          case 1:
                          echo'<span class="color_red">Eliminado</span>';
                          break;
                          case 2:
                          echo'<span class="color_green">Editado</span>';
                          break;
                          case 3:
                          echo'<span class="color_green">Reactivado</span>';
                          break;
                        }
                        ?>

                    </td>

                    <td>

                    <a href='/perfil/<?=GetNick($row['modera'])?>'><?=GetNick($row['modera'])?></a>                     </td>

                    <td>

                    <?=seguridad($row['causa'])?>                   </td>

                </tr>


            </tbody>

        </tbody>
        <?php
         }
        ?>

    </table>

</div>







</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<?php

pie();
?>