<?php
include("header.php");
$titulo	=	"Clones";  
cabecera_normal();
?><div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->               <script type="text/javascript" src="/Temas/default/js/admin.js"></script>
                <div id="borradores">
					<div class="clearfix">
                    	<div class="left" style="float:left;width:200px">
                   			<div class="boxy">

                                <div class="boxy-title">
                                    <h3>Men&uacute;</h3>
                                    <span></span>
                                </div><!-- boxy-title -->
                                <div class="boxy-content" id="admin_menu">
									                                    <script type="text/javascript">
										var action_menu = 'rangos';
										// <-- no borrar
										$(function(){
											if(action_menu != '') $('#a_' + action_menu).addClass('active');
											else $('#a_main').addClass('active');
										});
									</script>
                                    
                                    <h4>General</h4>

                                    <ul class="cat-list">
                                        <li id="a_main"><span class="cat-title"><a href="http://www.muzinc.com/admin/">Centro de Administraci&oacute;n</a></span></li>
                                        <li id="a_creditos"><span class="cat-title"><a href="http://www.muzinc.com/admin/creditos">Soporte y Cr&eacute;ditos</a></span></li>
                                    </ul>
                                    <h4>Configuraci&oacute;n de PHPost</h4>
                                    <ul class="cat-list">

                                        <li id="a_configs"><span class="cat-title"><a href="http://www.muzinc.com/admin/configs">Configuraci&oacute;n </a></span></li>
                                        <li id="a_temas"><span class="cat-title"><a href="http://www.muzinc.com/admin/temas">Temas y apariencia</a></span></li>
                                        <li id="a_news"><span class="cat-title"><a href="http://www.muzinc.com/admin/news">Noticias</a></span></li>
                                        <li id="a_ads"><span class="cat-title"><a href="http://www.muzinc.com/admin/ads">Publicidad</a></span></li>
                                    </ul>
                                    <h4>Control de PHPost</h4>

                                    <ul class="cat-list">
                                        <li id="a_medals"><span class="cat-title"><a href="http://www.muzinc.com/admin/medals">Medallas</a></span></li>
                                        <li id="a_afs"><span class="cat-title"><a href="http://www.muzinc.com/admin/afs">Afiliados</a></span></li>
                                    </ul>
                                    <h4>Control de Posts</h4>
                                    <ul class="cat-list">
                                        <li id="a_posts"><span class="cat-title"><a href="http://www.muzinc.com/admin/posts">Todos los Posts</a></span></li>

                                    	<li id="a_cats"><span class="cat-title"><a href="http://www.muzinc.com/admin/cats">Categor&iacute;as</a></span></li>
                                    </ul>
                                    <h4>Control de Usuarios</h4>
                                    <ul class="cat-list">
                                    	<li id="a_users"><span class="cat-title"><a href="http://www.muzinc.com/admin/users">Todos los Usuarios</a></span></li>
                                        <li id="a_rangos"><span class="cat-title"><a href="http://www.muzinc.com/admin/rangos">Rangos de Usuarios</a></span></li>

                                    </ul>                                </div><!-- boxy-content -->
                            </div>
                        </div>
                        <div class="right" style="float:left;margin-left:10px;width:730px">
                            <div class="boxy" id="admin_panel">
                            	                            	                            									<script type="text/javascript">
								// 
									$(function(){
										$('#cat_img').change(function(){
											var cssi = $("#cat_img option:selected").css('background');
											$('#c_icon').css({"background" : cssi});
										});
									});
								// 
								</script>
                                <div class="boxy-title">
                                    <h3>Administrar Rangos de Usuarios</h3>

                                </div>
                                
                                <div style="width:550px; margin:0 auto">
                                <h3 style="margin:0">Rangos basados en el conteo de puntos y posts</h3><hr style="margin:4px 0" />
                                <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="550" align="center">
                                	<thead>
                                    	<th width="150">Rango</th>
                                        <th>Usuarios</th>

                                        <th>Puntos requeridos</th>
                                        <th>Posts requeridos</th>
                                        <th>Puntos para dar</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </thead>

                                    <tbody>
                                                                        	<tr>
                                        	<td><a href="?act=list&rid=4&t=p" style="color:#3399ff">New Full User</a></td>
                                            <td>0</td>
                                            <td>50</td>
                                            <td>0</td>
                                            <td>10</td>

                                            <td><img src="http://www.muzinc.com/Temas/default/images/icons/ran/medal_gold_3.png" /></td>
                                            <td class="admin_actions">
                                            <a href="?act=editar&rid=4&t=p" title="Editar Rango"><img src="http://www.muzinc.com/Temas/default/images/icons/editar.png" /></a>
                                            <a href="?act=borrar&rid=4" title="Borrar Rango"><img src="http://www.muzinc.com/Temas/default/images/icons/close.png" /></a>                                            
                                            </td>
                                        </tr>
                                                                        </tbody>
                                    <tfoot>
                                    	<td colspan="7" style="text-align:right"><a href="?act=nuevo">Agregar nuevo rango &raquo;</a></td>

                                    </tfoot>
                                </table>
                                </div>
                                                                </div>                                                            </div>
                        </div>
                    </div>
                </div>
               <div style="clear:both"></div>
<!-- fin cuerpocontainer -->


<?php
pie();
?>
