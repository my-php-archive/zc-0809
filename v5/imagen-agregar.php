<?php
include("header.php");
$titulo	=	"Agregar Foto";  
cabecera_normal();
?><div id="cuerpocontainer">
<link href="http://www.tscript.in/demo/Temas/default/css/fotos.css" rel="stylesheet" type="text/css" />

<!-- inicio cuerpocontainer -->
<div class="container">              

                                                <div id="derecha" style="width: 630px; float: left;">
                	<div class="">
                        <h2 style="font-size: 15px;">Agregar nueva foto</h2>
                    </div>
                    <form name="add_foto" method="post" action="imagen-agregada" enctype="multipart/form-data" id="foto_form" class="form-add-post" autocomplete="off">
                    



                    




<div class="fade_out">
                        <ul class="clearbeta">
                            <li>
                            <label for="ftitle">T&iacute;tulo</label>
                            <span style="display: none;" class="errormsg"></span>
                            <input class="text-inp required" type="text" name="titulo" maxlength="60" tabindex="1" style="width: 410px" />
                            </li>

                                                                                <li>
                            <label for="ffile">URL De La Imagen</label>
                          <input class="text-inp required" type="text" name="url" maxlength="60" tabindex="1" style="width: 410px" />
                            </li>
                                                                                <li>
                            <label for="fdesc">Descripci&oacute;n</label>

                            <span style="display: none;" class="errormsg"></span>
                         <textarea name="detalle" id="fdesc" cols="60" rows="5" onkeydown="return ControlLargo(this);" onkeyup="return ControlLargo(this);"></textarea>


                            </li>
                            <li>

                        </ul>
                        <div class="end-form clearbeta">
                        	
                        
<input style="width: auto; margin-left: 5px;" class="mBtn btnGreen" type="submit" name="button"  value="Agregar Imagen" />





</div>

                    </div>                    
                    </form>
                </div>                
                <div style="width: 300px; float: right; margin-top:37px" id="post-izquierda">
                    <div class="categoriaList">
                        <h6>Protocolo para fotos</h6>
                        <ul>
                            <li>Tus fotograf&iacute;as no pueden contener material pornogr&aacute;fico, escatol&oacute;gico, violento, ni nada que pueda ser considerado ofensivo por otros usuarios. Realizar este tipo de actividades puede causar el cierre definitivo de tu cuenta.</li>

                        
                                                    </ul>
                    </div>
</div></div><div style="clear:both"></div>
<!-- fin cuerpocontainer -->


<?php
pie();
?>