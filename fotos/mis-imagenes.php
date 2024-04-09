<?php
include("../header.php");
$titulo	= "Mis Fotos!";
cabecera_normal();
 $id = $_SESSION['id'];

$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
     $nick = $sqlnick['nick'];

?>
<div id="cuerpocontainer"> 
<!--Cuperpo-->                <link href="/images/css/fotos.css" rel="stylesheet" type="text/css" />

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
                    
                        	
                           <?php
$preg = "SELECT * FROM imagenes where nick = '{$nick}'";
$res = mysql_query($preg) or die(mysql_error());//hacemos responder a la Bd

while($row = mysql_fetch_assoc($res))   { ?>
        <?php echo' 

<ul class="fotos-detail listado-content">
                                            	<li>
<div class="avatar-box" style="z-index: 99;">

                            	<a href="/fotos/foto.php?id='.$row['ida'].'">
                            		<img height="100" width="100" src="'.$row['url'].'"/>
                                </a>
                            </div>


<div class="notification-info">
                            	<span>
                                    <a href="/fotos/foto.php?id='.$row['ida'].'">'.$row['titulo'].'</a><br /> 
                            		<span class="time"><strong>'.$row['fecha'].'</strong> - Por <a href="/perfil/'.$row['nick'].'">'.$row['nick'].'</a></span><hr />

                                    <span class="time">'.limit_chars_words($row['detalle']).'</span>
                                
<br><br>


<span class="time"><img src="/images/borrar.png"><a href=""> Eliminar</a></span>


                            </div>
                        </li>







';?>
  <?php } ?>


                       
                                            </ul>
                </div>
                <div class="paginadorCom">
                                                        </div>                                <div class="clearBoth"></div>

		<!--end-cuerpo-->



<?php

pie();
?>