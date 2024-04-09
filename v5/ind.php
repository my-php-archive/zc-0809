<?php
include("header.php");
$titulo	=	"Juegos Multiplayer";  
cabecera_normal();
?>



						<div class="login-dialog" title="Identificarme">
							<div id="login_box">
								<div class="login_header">
									<img style="display:none" alt="" src="http://o2.t26.net/images/cerrar.png" class="login_cerrar" onclick="close_login_box();" title="Cerrar mensaje" />
								</div>
								<div class="login_cuerpo">
									<span id="login_cargando" class="gif_cargando floatR"></span>
									<div id="login_error" style="color:red;"></div>

										<form method="post" action="javascript:login()">
											<label>Usuario</label>
											<input maxlength="64" name="nick" id="nickname" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="text" />
											<label>Contrase&ntilde;a</label>
											<input maxlength="64" name="pass" id="password" class="ui-corner-all form-input-text box-shadow-soft ac_input" type="password" />
											
											<input class="fg-button ui-state-default ui-corner-all box-shadow-soft ui-button" style="width:150px;margin-top:10px;margin-bottom:10px;" value="Entrar" title="Entrar" type="submit" />

											<div class="floatR" style="color: #666; padding:5px;font-weight: normal; display:none">

												<input type="checkbox" /> Recordarme?											</div>
										</form>
										<div class="login_footer">
											<a href="/password">
												&iquest;Olvidaste tu contrase&ntilde;a?											</a>
											<br />
											<a href="/registro" style="color:green;">

												<strong>Registrate Ahora!</strong>
											</a>
																					<hr />
											<a onclick="FB.signin()" class="facebook-login">Login Facebook</a>
																			</div>
								</div>
							</div>
						

</div><div style="clear:both"></div>
<!-- fin cuerpocontainer -->


<?php
pie();
?>