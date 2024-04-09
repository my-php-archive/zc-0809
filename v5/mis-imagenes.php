<?php
include("header.php");
$titulo	= "Pruebas!";
cabecera_normal();
 $id = $_SESSION['id'];

$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
     $nick = $sqlnick['nick'];

?>
<div id="cuerpocontainer"> 
<!--Cuperpo-->                <link href="http://www.tscript.in/demo/Temas/default/css/fotos.css" rel="stylesheet" type="text/css" />

				<style>
                
				</style>

                                                <style>
                /**/
                .fotos-detail li{
                    width:303px;
                }
                .fotos-detail .notification-info {
                    width:188px;
                }
                .paginadorCom{
                    width:100%!important;
                }
                /**/
                </style>
                <div id="album" style="width: 100%;">
                	<div class="title-w clearfix">
                        <h2>Mis fotos</h2>
                    </div>
                    <ul class="fotos-detail listado-content">
                                            	<li>
                        	
                           <?php
$preg = "SELECT * FROM imagenes where nick = '{$nick}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>
        <?php echo' 


<div class="avatar-box" style="z-index: 99;">

                            	<a href="/foto.php?id='.$row['ida'].'">
                            		<img height="100" width="100" src="'.$row['url'].'"/>
                                </a>
                            </div>


<div class="notification-info">
                            	<span>
                                    <a href="/foto.php?id='.$row['ida'].'">'.$row['titulo'].'</a><br /> 
                            		<span class="time"><strong>'.$row['fecha'].'</strong> - Por <a href="/perfil/'.$row['nick'].'">'.$row['nick'].'</a></span><hr />

                                    <span class="time">'.$row['detalle'].'</span>
                                </span>
                            </div>';?>
  <?php } ?>


                        </li>
                                            </ul>
                </div>
                <div class="paginadorCom">
                                                        </div>                                <div class="clearBoth"></div>

		<!--end-cuerpo-->



<?php

pie();
?>