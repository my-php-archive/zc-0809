<?php
include("header.php");
require_once("class.inputfilter.php");
$ifilter = new InputFilter();
$titulo	= $descripcion;

function Fotos($parametro)
{
  $caca = mysql_real_escape_string($parametro);
  $mil = htmlspecialchars($caca);
  $cien = stripslashes($mil);
  return $cien;
}

function limpia($var){
	$var = strip_tags($var); //esto te libra de los xss x)
	$malo = array("\\",";","\'","'"); //
	$i=0;$o=count($malo);
	while($i<=$o){
		$var = str_replace($malo[$i],"",$var);
		$i++;
	}
	return $var;
}

function LimpiarTodo($datos){
	if(is_array($datos)){
		$datos = array_map('limpia',$datos);
	}else{
	   header("location: http://www.zincomienzo.net/");
		die();
	}
	return $datos;
}

if($_POST)  $_POST =& LimpiarTodo($_POST);
if($_GET)   $_GET  =& LimpiarTodo($_GET);

$ajax = $_POST['ajax'];
$save = $_POST['save'];
if($ajax != '1') {
	cabecera_normal();
}
/*Llamamos a la session de estas 2 formas*/
$id = $_SESSION['id'];
$id = $_SESSION['key'];

if($_SESSION['user']==null){
fatal_error('Para editar tus datos necesitás autentificarte ');
}

/*Ajax Zincomienzo!! - Cuenta*/

if($ajax == '1') {
	
	if($save == '1') {
		if(empty($_POST['nombre'])) {
			die('{"field":"nombre","error":"Por favor, completa el campo Nombre y Apellido"}');
		}

		if(empty($_POST['email'])) {
			die('{"field":"email","error":"Por favor, completa el campo Email"}');
		}
		





$nombre = $ifilter->process($_POST['nombre']);
$nombre_mostrar = $ifilter->process($_POST['nombre_mostrar']);
$apellido = $ifilter->process($_POST['apellido']);
$email = $ifilter->process($_POST['email']);
$email_mostrar = $ifilter->process($_POST['email_mostrar']);
$ciudad = $ifilter->process($_POST['ciudad']);
$facebook = $ifilter->process($_POST['facebook']);
$region = $ifilter->process($_POST['region']);
$dia = $ifilter->process($_POST['dia']);
$mes = $ifilter->process($_POST['mes']);
$ano = $ifilter->process($_POST['ano']);
$fecha_nacimiento_mostrar = $ifilter->process($_POST['fecha_nacimiento_mostrar']);
$im = $ifilter->process($_POST['im']);
$im_mostrar = $ifilter->process($_POST['im_mostrar']);
$pais = $ifilter->process($_POST['pais']);
$sexo = $ifilter->process($_POST['sexo']);
$key = $ifilter->process($_POST['key']);
$mensaje = $ifilter->process($_POST['mensaje']);




$sqlu=$db->query("Update usuarios Set nombre='$nombre', apellido='$apellido', mail='$email', ciudad='$ciudad', facebook='$facebook', region='$region', dia='$dia', mes='$mes', ano='$ano', pais='$pais', sexo='$sexo' Where id='$key'");
$sqlu=$db->query("Update preferencias Set nombre_mostrar='$nombre_mostrar', email_mostrar='$email_mostrar', fecha_nacimiento_mostrar='$fecha_nacimiento_mostrar', im_mostrar='$im_mostrar' Where iduser='$id'");
		die('{"field":"","0":"Los cambios fueron aceptados y ser&aacute;n aplicados en los pr&oacute;ximos minutos."}');

	}
/*Paso 2 - 1*/

	if($save == '2') {

$mensaje = $ifilter->process($_POST['mensaje']);
$sitio_web = $ifilter->process($_POST['sitio_web']);
$mensajero = $ifilter->process($_POST['mensajero']);
$me_gustaria_amigos = $ifilter->process($_POST['me_gustaria_amigos']);
$me_gustaria_conocer_gente = $ifilter->process($_POST['me_gustaria_conocer_gente']);
$me_gustaria_conocer_gente_negocios = $ifilter->process($_POST['me_gustaria_conocer_gente_negocios']);
$me_gustaria_encontrar_pareja = $ifilter->process($_POST['me_gustaria_encontrar_parejas']);
$me_gustaria_todo = $ifilter->process($_POST['me_gustaria_todo']);
$estadov = $ifilter->process($_POST['estadov']);
$hijos = $ifilter->process($_POST['hijos']);
$vivo = $ifilter->process($_POST['vivo']);





$sqlu=$db->query("Update usuarios Set mensaje='$mensaje', mensajero='$mensajero', sitio_web='$sitio_web', me_gustaria_amigos='$me_gustaria_amigos', me_gustaria_conocer_gente='$me_gustaria_conocer_gente', me_gustaria_conocer_gente_negocios='$me_gustaria_conocer_gente_negocios', me_gustaria_encontrar_pareja='$me_gustaria_encontrar_pareja', me_gustaria_todo='$me_gustaria_todo', estadov='$estadov', hijos='$hijos', vivo='$vivo' Where id='$key'");
				die('{"field":"","error":""}');
	}

/*Paso 3 - 2*/

	if($save == '3') {

$altura = $ifilter->process($_POST['altura']);
$peso = $ifilter->process($_POST['peso']);
$pelo_color = $ifilter->process($_POST['pelo_color']);
$fisico = $ifilter->process($_POST['fisico']);
$dieta = $ifilter->process($_POST['dieta']);
$tengo_tatuajes = $ifilter->process($_POST['tengo_tatuajes']);
$tengo_piercings = $ifilter->process($_POST['tengo_piercings']);
$ojos_color = $ifilter->process($_POST['ojos_color']);
$fumo = $ifilter->process($_POST['fumo']);
$tomo_alcohol = $ifilter->process($_POST['tomo_alcohol']);


$sqlu=$db->query("Update usuarios Set altura='$altura', peso='$peso', pelo_color='$pelo_color', fisico='$fisico', dieta='$dieta', tengo_tatuajes='$tengo_tatuajes', ojos_color='$ojos_color', fumo ='$fumo', tomo_alcohol ='$tomo_alcohol', tengo_piercings ='$tengo_piercings' Where id='$key'");
				die('{"field":"","error":""}');
	}
	if($save == '4') {
/*Paso 4 - 3*/

$estudios = $ifilter->process($_POST['estudios']);
$estudios_mostrar = $ifilter->process($_POST['estudios_mostrar']);
$idioma_castellano = $ifilter->process($_POST['idioma_castellano']);
$idioma_ingles = $ifilter->process($_POST['idioma_ingles']);
$idioma_portugues = $ifilter->process($_POST['idioma_portugues']);
$idioma_frances = $ifilter->process($_POST['idioma_frances']);
$idioma_italiano = $ifilter->process($_POST['idioma_italiano']);
$idioma_aleman = $ifilter->process($_POST['idioma_aleman']);
$idioma_otro = $ifilter->process($_POST['idioma_otro']);
$idiomas_mostrar = $ifilter->process($_POST['idiomas_mostrar']);
$profesion = $ifilter->process($_POST['profesion']);
$profesion_mostrar = $ifilter->process($_POST['profesion_mostrar']);
$empresa = $ifilter->process($_POST['empresa']);
$empresa_mostrar = $ifilter->process($_POST['empresa_mostrar']);
$sector = $ifilter->process($_POST['sector']);
$sector_mostrar = $ifilter->process($_POST['sector_mostrar']);
$ingresos = $ifilter->process($_POST['ingresos']);
$ingresos_mostrar = $ifilter->process($_POST['ingresos_mostrar']);
$intereses_profesionales = $ifilter->process($_POST['intereses_profesionales']);
$intereses_profesionales_mostrar = $ifilter->process($_POST['intereses_profesionales_mostrar']);
$habilidades_profesionales = $ifilter->process($_POST['habilidades_profesionales']);
$habilidades_profesionales_mostrar = $ifilter->process($_POST['habilidades_profesionales_mostrar']);

$sql = "Update usuarios Set estudios='$estudios', estudios_mostrar='$estudios_mostrar', idioma_castellano='$idioma_castellano', idioma_ingles='$idioma_ingles', idioma_portugues='$idioma_portugues', idioma_frances='$idioma_frances', idioma_italiano='$idioma_italiano', idioma_aleman='$idioma_aleman', idioma_otro='$idioma_otro', idiomas_mostrar='$idiomas_mostrar', profesion='$profesion', profesion_mostrar='$profesion_mostrar', empresa='$empresa', empresa_mostrar='$empresa_mostrar', sector='$sector', sector_mostrar='$sector_mostrar', ingresos='$ingresos', ingresos_mostrar='$ingresos_mostrar', intereses_profesionales='$intereses_profesionales', intereses_profesionales_mostrar='$intereses_profesionales_mostrar', habilidades_profesionales='$habilidades_profesionales', habilidades_profesionales_mostrar='$habilidades_profesionales_mostrar' Where id='$key'";
mysql_query($sql);		
		die('{"field":"","error":""}');
	}
	if($save == '5') {
/*Paso 5 - 4*/

$heromaster = $ifilter->process($_POST['heromaster']);
$tv = $ifilter->process($_POST['tv']);
$equipo = $ifilter->process($_POST['equipo']);
$musica = $ifilter->process($_POST['musica']);
$pelicula = $ifilter->process($_POST['pelicula']);
$comida = $ifilter->process($_POST['comida']);
$hobbies = $ifilter->process($_POST['hobbies']);
$series_tv_favoritas = $ifilter->process($_POST['series_tv_favoritas']);

$musica_favorita = $ifilter->process($_POST['musica_favorita']);
$deportes_y_equipos_favoritos = $ifilter->process($_POST['deportes_y_equipos_favoritos']);
$libros_favoritos = $ifilter->process($_POST['libros_favoritos']);
$peliculas_favoritas = $ifilter->process($_POST['peliculas_favoritas']);
$comida_favorita = $ifilter->process($_POST['comida_favorita']);
$mis_heroes_son = $ifilter->process($_POST['mis_heroes_son']);

$mis_intereses = $ifilter->process($_POST['mis_intereses']);
$libros = $ifilter->process($_POST['libros']);

$sqlu=$db->query("Update usuarios Set heromaster='$heromaster', tv='$tv', equipo='$equipo', libros='$libros', musica='$musica', pelicula='$pelicula', comida='$comida', hobbies='$hobbies', series_tv_favoritas='$series_tv_favoritas', musica_favorita='$musica_favorita', deportes_y_equipos_favoritos='$deportes_y_equipos_favoritos', musica_favorita='$musica_favorita', libros_favoritos='$libros_favoritos', peliculas_favoritas='$peliculas_favoritas', comida_favorita='$comida_favorita', mis_heroes_son='$mis_heroes_son', mis_intereses='$mis_intereses' Where id='$key'");		
		die('{"field":"","error":""}');
	}
	if($save == '6') {

/*Paso 6 - 5*/

$participar_busquedas = $ifilter->process($_POST['participar_busquedas']);
$mostrar_estado_checkbox = $ifilter->process($_POST['mostrar_estado_checkbox']);
$recibir_boletin_semanal = $ifilter->process($_POST['recibir_boletin_semanal']);
$recibir_promociones = $ifilter->process($_POST['recibir_promociones']);

$sqlu=$db->query("Update usuarios Set participar_busquedas='$participar_busquedas', mostrar_estado_checkbox='$mostrar_estado_checkbox', recibir_boletin_semanal='$recibir_boletin_semanal', recibir_promociones='$recibir_promociones' Where id='$key'");
		
		die('{"field":"","error":""}');
	}
	if($save == '7') {
		
		if($_POST['action'] == 'add') {
			if(empty($_POST['url'])) {
				die('{"field":"url","error":"La URL ingresada es inv&aacute;lida"}');
			}
			if(empty($_POST['caption'])) {
				die('{"field":"caption","error":"Falta caption"}');
			}
			mysql_query("INSERT INTO usuarios_fotos (iduser, url, nombre) VALUES ('$key', '{$_POST['url']}', '{$_POST['caption']}')");
			$idf = mysql_insert_id();
			die('{"id":'.$idf.',"field":"","error":""}');
		}
		if($_POST['action'] == 'del') {
			if(empty($_POST['id'])) {
				die('{"field":"url","error":"La URL ingresada es inv&aacute;lida"}');
			}
			mysql_query("DELETE FROM usuarios_fotos WHERE fotoid='{$_POST['id']}' AND iduser='$key'");
			die('{"field":"","error":""}');
		}
		
	}
	if($save == '9') {
		if(empty($_POST['passwd']) or empty($_POST['new_passwd']) or empty($_POST['confirm_passwd'])) {
			die('{"field":"passwd","error":"Faltan datos"}');
		}
		
		if($_POST['new_passwd'] != $_POST['confirm_passwd']) {
			die('{"field":"confirm_passwd","error":"Las claves son diferentes"}');
		}
		
		$_POST['passwd'] = md5($_POST['passwd']);
		
		$comprobar9 = mysql_query("SELECT password FROM usuarios WHERE id = '{$key}' and password = '{$_POST['passwd']}'");
		if(!mysql_num_rows($comprobar9)) {
			die('{"field":"passwd","error":"La clave actual ingresada no es correcta"}');
		}
		
		$_POST['new_passwd'] = md5($_POST['new_passwd']);
		
		$id_extreme = md5(uniqid(rand(), true));
		mysql_query("UPDATE usuarios SET id_extreme='$id_extreme', password='{$_POST['new_passwd']}' where id='$key'");
		die('{"field":"","0":"La contraseña fue cambiada"}');		
	}
	
	if($save == '10') {
		mysql_query("UPDATE usuarios SET avatar ='$save' WHERE id = '$key'");				
		die('http://a04.t.net.ar/avatares/4/0/1/3/120_4013504.jpg');
	}	
}
	
/*Cierro los IF :D*/








function mesc($valor){
$valor = str_replace("1", "Enero", $valor);
$valor = str_replace("2", "Febrero", $valor);
$valor = str_replace("3", "Marzo", $valor);
$valor = str_replace("4", "Abril", $valor);
$valor = str_replace("5", "Mayo", $valor);
$valor = str_replace("6", "Junio", $valor);
$valor = str_replace("7", "Julio", $valor);
$valor = str_replace("8", "Agosto", $valor);
$valor = str_replace("9", "Septiembre", $valor);
$valor = str_replace("10", "Octubre", $valor);
$valor = str_replace("11", "Noviembre", $valor);
$valor = str_replace("12", "Diciembre", $valor);
return $valor;}




if($ajax != '1') {

	
	$datosperfil = mysql_query("SELECT * FROM usuarios Where id='$key'");
	$datos = mysql_fetch_array($datosperfil);
	mysql_free_result($datosperfil);
	
	function select($array,$dato) {
		foreach ($array as $titulo => $value) {
			echo "<option value=\"{$value}\"".($value == $dato ? ' selected="selected"' : '').">{$titulo}</option>\n";
		}
	}
	
	echo '
<script src="http://o1.t26.net/js/cuenta.js?2.2" type="text/javascript"></script>



<div id="main-col">
<div id="full-col">
<div class="tabbed-d clearfix">
	<ul class="menu-tab clearfix">

		<li class="active"><a onclick="cuenta.chgtab(this)">Cuenta</a></li>
		<li><a onclick="cuenta.chgtab(this)">Perfil</a></li>
		<li><a onclick="cuenta.chgtab(this)">Opciones</a></li>

		<li><a onclick="cuenta.chgtab(this)">Mis Fotos</a></li>
		<li><a onclick="cuenta.chgtab(this)">Bloqueados</a></li>
		<li><a onclick="cuenta.chgtab(this)">Cambiar Clave</a></li>
		<li class="privacy"><a onclick="cuenta.chgtab(this)">Privacidad</a></li>
	</ul>
	<a name="alert-cuenta"></a>
	

	<form name="editarcuenta" class="horizontal" action="" method="post">

		<div class="content-tabs cuenta">
			<div class="alert-cuenta cuenta-1">
			</div>

			<fieldset>
				<div class="field clearfix">
					<label for="nombre">Nombre:</label>

					<input type="text" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="nombre" name="nombre" maxlength="32" value="'.$datos['nombre'].'" />
				</div>

				

				<div class="field clearfix">
					<label for="nombre">Apellido:</label>
					<input type="text" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="nombre" name="apellido" maxlength="32" value="'.$datos['apellido'].'" />
				</div>


<div class="field clearfix">
					<label for="email">E-Mail:</label>
					<div class="input-fake input-hide-email">
						'.$datos['mail'].' (<a onclick="input_fake(\'email\')">Cambiar</a>)
					</div>
					<input type="text" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft input-hidden-email" id="email" name="email" maxlength="35" value="'.$datos['mail'].'" style="display: none" />
				</div>
				<div class="field clearfix">

					<label for="pais">Pa&iacute;s:</label>
					<select id="pais" name="pais" class="cuenta-save-1" onchange="cuenta.chgpais()">
						<option value="">Pa&iacute;s</option>';
						
$datospais = mysql_query("SELECT nombre_pais, img_pais FROM paises");
while($paizez = mysql_fetch_array($datospais)) {
	echo "<option value=\"{$paizez['img_pais']}\" ".($paizez['img_pais'] == $datos['pais'] ? ' selected="selected"' : '').">{$paizez['nombre_pais']}</option>\n";
}
mysql_free_result($datospais);
echo '										</select>
				</div>

				
				
	<div class="field clearfix">
					<label for="nombre">Regi&oacute;n:</label>

<input type="text" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="dia" name="region" maxlength="255" value="'.$datos['region'].'" />








</div>			






<div class="field clearfix">
					<label for="nombre">Ciudad:</label>

<input type="text" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="dia" name="ciudad" maxlength="255" value="'.$datos['ciudad'].'" />








</div>








<div class="field clearfix">
					<label>Sexo</label>
					<ul class="fields">
						<li>
							<label><input type="radio" class="radio cuenta-save-1" name="sexo" value="m" '.($datos['sexo'] == 'm' ? 'checked="checked"' : '').'/>Masculino</label>
						</li>
						<li>

							<label><input type="radio" class="radio cuenta-save-1" name="sexo" value="f" '.($datos['sexo'] == 'f' ? 'checked="checked"' : '').'/>Femenino</label>
						</li>
					</ul>
				</div>
				
			


				<div class="field clearfix">



<label>Nacimiento:</label>
					<select name="dia" class="cuenta-save-1">
					
												<option value="'.$datos['dia'].'" selected="selected">'.$datos['dia'].'</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>

												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>

												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>

												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>

												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>

												<option value="31">31</option>
											</select>







<select name="mes" class="cuenta-save-1">
            
                                                                                                <option value="'.$datos['mes'].'" selected="selected">'.mesc($datos['mes']).'</option>
											        <option value="1">Enero</option>
												<option value="2">Febrero</option>
												<option value="3">Marzo</option>

												<option value="4">Abril</option>
												<option value="5">Mayo</option>
												<option value="6">Junio</option>
												<option value="7">Julio</option>
												<option value="8">Agosto</option>
												<option value="9">Septiembre</option>

												<option value="10">Octubre</option>
												<option value="11">Noviembre</option>
												<option value="12">Diciembre</option>
											</select>









<select name="ano" class="cuenta-save-1">
						
												
                                                                                              	<option value="'.$datos['ano'].'" selected="selected">'.$datos['ano'].'</option>  
                                                                                                <option value="1910">1910</option>
                                                                                                <option value="1911">1911</option>
												<option value="1912">1912</option>
												<option value="1913">1913</option>
												<option value="1914">1914</option>
												<option value="1915">1915</option>
												<option value="1916">1916</option>

												<option value="1917">1917</option>
												<option value="1918">1918</option>
												<option value="1919">1919</option>
												<option value="1920">1920</option>
												<option value="1921">1921</option>
												<option value="1922">1922</option>

												<option value="1923">1923</option>
												<option value="1924">1924</option>
												<option value="1925">1925</option>
												<option value="1926">1926</option>
												<option value="1927">1927</option>
												<option value="1928">1928</option>

												<option value="1929">1929</option>
												<option value="1930">1930</option>
												<option value="1931">1931</option>
												<option value="1932">1932</option>
												<option value="1933">1933</option>
												<option value="1934">1934</option>

												<option value="1935">1935</option>
												<option value="1936">1936</option>
												<option value="1937">1937</option>
												<option value="1938">1938</option>
												<option value="1939">1939</option>
												<option value="1940">1940</option>

												<option value="1941">1941</option>
												<option value="1942">1942</option>
												<option value="1943">1943</option>
												<option value="1944">1944</option>
												<option value="1945">1945</option>
												<option value="1946">1946</option>

												<option value="1947">1947</option>
												<option value="1948">1948</option>
												<option value="1949">1949</option>
												<option value="1950">1950</option>
												<option value="1951">1951</option>
												<option value="1952">1952</option>

												<option value="1953">1953</option>
												<option value="1954">1954</option>
												<option value="1955">1955</option>
												<option value="1956">1956</option>
												<option value="1957">1957</option>
												<option value="1958">1958</option>

												<option value="1959">1959</option>
												<option value="1960">1960</option>
												<option value="1961">1961</option>
												<option value="1962">1962</option>
												<option value="1963">1963</option>
												<option value="1964">1964</option>

												<option value="1965">1965</option>
												<option value="1966">1966</option>
												<option value="1967">1967</option>
												<option value="1968">1968</option>
												<option value="1969">1969</option>
												<option value="1970">1970</option>

												<option value="1971">1971</option>
												<option value="1972">1972</option>
												<option value="1973">1973</option>
												<option value="1974">1974</option>
												<option value="1975">1975</option>
												<option value="1976">1976</option>

												<option value="1977">1977</option>
												<option value="1978">1978</option>
												<option value="1979">1979</option>
												<option value="1980">1980</option>
												<option value="1981">1981</option>
												<option value="1982">1982</option>

												<option value="1983">1983</option>
												<option value="1984">1984</option>
												<option value="1985">1985</option>
												<option value="1986">1986</option>
												<option value="1987">1987</option>
												<option value="1988">1988</option>

												<option value="1989">1989</option>
												<option value="1990">1990</option>
												<option value="1991">1991</option>
												<option value="1992">1992</option>
												<option value="1993">1993</option>
												<option value="1994">1994</option>

												<option value="1995">1995</option>
												<option value="1996">1996</option>
												<option value="1997">1997</option>
												<option value="1998">1998</option>
												<option value="1999">1999</option>
												<option value="2000">2000</option>

												<option value="2001">2001</option>
												<option value="2002">2002</option>
												<option value="2003">2003</option>
												<option value="2004">2004</option>
												<option value="2005">2005</option>
												<option value="2006">2006</option>

												<option value="2007">2007</option>
												<option value="2008">2008</option>
												<option value="2009">2009</option>
												<option value="2010">2010</option>
												<option value="2011">2011</option>
											</select>

				</div>
			</fieldset>






<div class="buttons">
				<input type="button" class="ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" onclick="cuenta.save(1)" value="Guardar" />
				<input type="button" class="fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" onclick="cuenta.save(1, true)" value="Siguiente" />
			</div>

			
		</div>
		<div class="content-tabs perfil" style="display: none">
			<h3 onclick="cuenta.chgsec(this)" class="active">1. M&aacute;s sobre mi</h3>
			<fieldset>
				<div class="alert-cuenta cuenta-2">
				</div>
				<div class="field clearfix">

					<label for="sitio">Mensaje Personal</label>
					<textarea class="cuenta-save-2" id="mensaje" name="mensaje" maxlength="60" value="">'.$datos['mensaje'].'</textarea>
				</div>
				
				<div class="field clearfix">
					<label for="sitio">Sitio Web</label>
					<input style="width:230px" type="text" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="sitio_web" name="sitio_web" maxlength="60" value="'.$datos['sitio_web'].'" />
				</div>

				<div class="field clearfix">
										<label for="Mensajero">Mensajero</label>
					<select name="im_tipo" class="cuenta-save-2">
						<option value="msn"'.($datos['im_tipo'] == 'msn' ? ' selected="selected"' : '').'>MSN</option>
						<option value="gtalk"'.($datos['im_tipo'] == 'gtalk' ? ' selected="selected"' : '').'>GTalk</option>
						<option value="icq"'.($datos['im_tipo'] == 'icq' ? ' selected="selected"' : '').'>ICQ</option>
						<option value="aim"'.($datos['im_tipo'] == 'aim' ? ' selected="selected"' : '').'>AIM</option>

					</select>
					<input type="text" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="mensajero" name="mensajero" maxlength="64" value="'.$datos['mensajero'].'" />
				</div>
				<div class="field clearfix">
					<label>Me gustaria</label>
					<div class="input-fake">
						<ul>
							<li><input type="checkbox"'.(empty($datos['me_gustaria_amigos']) ? '' : ' checked="checked"').' class="cuenta-save-2" name="me_gustaria_amigos" />Hacer amigos</li>
							<li><input type="checkbox"'.(empty($datos['me_gustaria_conocer_gente']) ? '' : ' checked="checked"').' class="cuenta-save-2" name="me_gustaria_conocer_gente" />Conocer gente con mis intereses</li>
							<li><input type="checkbox"'.(empty($datos['me_gustaria_conocer_gente_negocios']) ? '' : ' checked="checked"').' class="cuenta-save-2" name="me_gustaria_conocer_gente_negocios" />Conocer gente para negocios</li>
							<li><input type="checkbox"'.(empty($datos['me_gustaria_encontrar_pareja']) ? '' : ' checked="checked"').' class="cuenta-save-2" name="me_gustaria_encontrar_pareja" />Encontrar pareja</li>
							<li><input type="checkbox"'.(empty($datos['me_gustaria_todo']) ? '' : ' checked="checked"').' class="cuenta-save-2" name="me_gustaria_todo" />De todo</li>
						</ul>
					</div>
				</div>

				<div class="field clearfix">
					<label for="estadov">Estado Civil</label>
					<div class="input-fake">
						<select id="estadov" name="estadov" class="cuenta-save-2">';

select(array("Sin Respuesta" => "","Soltero" => "Soltero","De novio" => "De novio","Casado" => "Casado","Divorciado" => "Divorciado","Viudo" => "Viudo","En algo..." => "En algo..."),$datos['estadov']);

echo '
						</select>
					</div>
				</div>

				<div class="field clearfix">
					<label for="hijos">Hijos</label>
					<div class="input-fake">
						<select id="hijos" name="hijos" class="cuenta-save-2">';
						
select(array("Sin Respuesta" => "",
"No tengo" => "No tengo",
"Alg&uacute;n d&iacute;a" => "Alg&uacute;n d&iacute;a",
"No son lo m&iacute;o" => "No son lo m&iacute;o",
"Tengo, vivo con ellos" => "Tengo, vivo con ellos",
"Tengo, no vivo con ellos" => "Tengo, no vivo con ellos"),$datos['hijos']);

echo '
						</select>
					</div>
				</div>
				<div class="field clearfix">

					<label for="vivo">Vivo con</label>
					<div class="input-fake">
						<select id="vivo" name="vivo" class="cuenta-save-2">';
						
select(array("Sin Respuesta" => "",
"S&oacute;lo" => "S&oacute;lo",
"Con mis padres" => "Con mis padres",
"Con mi pareja" => "Con mi pareja",
"Con amigos" => "Con amigos",
"Otro" => "otro"),$datos['vivo']);

echo '
						</select>
					</div>
				</div>
				<div class="buttons">
					<input type="button" class="mBtn btnOk" onclick="cuenta.save(2, true)" value="Guardar y seguir" />
				</div>

			</fieldset>
			<h3 onclick="cuenta.chgsec(this)">2. Como soy</h3>
			<fieldset style="display: none">
				<div class="alert-cuenta cuenta-3">
				</div>
				<div class="field clearfix">
					<label for="altura">Mi altura</label>
					<div class="input-fake">
						<input type="text" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="altura" name="altura" maxlength="3" value="'.$datos['altura'].'" /> cent&iacute;metros
					</div>
				</div>
				<div class="field clearfix">
					<label for="peso">Mi peso</label>
					<div class="input-fake">
						<input type="text" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="peso" name="peso" maxlength="3" value="'.$datos['peso'].'" /> kilogramos
					</div>

				</div>
				<div class="field clearfix">
					<label for="pelo_color">Color de pelo</label>
					<div class="input-fake">
						<select id="pelo_color" name="pelo_color" class="cuenta-save-3">';

select(array("Sin Respuesta" => "",
"Negro" => "Negro",
"Casta&ntilde;o oscuro" => "Casta&ntilde;o oscuro",
"Casta&ntilde;o claro" => "Casta&ntilde;o claro",
"Rubio" => "Rubio",
"Pelirrojo" => "Pelirrojo",
"Gris" => "Gris",
"Canoso" => "Canoso",
"Te&ntilde;ido" => "Te&ntilde;ido",
"Rapado" => "Rapado",
"Calvo" => "Calvo"),$datos['pelo_color']);

echo '
						</select>
					</div>
				</div>
				<div class="field clearfix">

					<label for="ojos_color">Color de ojos</label>
					<div class="input-fake">
						<select id="ojos_color" name="ojos_color" class="cuenta-save-3">';
						
select(array("Sin Respuesta" => "",
"Negros" => "Negros",
"Marrones" => "Marrones",
"Celestes" => "Celestes",
"Verdes" => "Verdes",
"Grises" => "Grises"),$datos['ojos_color']);

echo '
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label for="fisico">Complexi&oacute;n</label>

					<div class="input-fake">
						<select id="fisico" name="fisico" class="cuenta-save-3">';
						
select(array("Sin Respuesta" => "",
"Delgado" => "Delgado",
"Atl&eacute;tico" => "Atl&eacute;tico",
"Normal" => "Normal",
"Algunos kilos de m&aacute;s" => "Algunos kilos de m&aacute;s",
"Corpulento" => "Corpulento"),$datos['fisico']);

echo '
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label for="dieta">Mi dieta es</label>
					<div class="input-fake">
						<select id="dieta" name="dieta" class="cuenta-save-3">';
						
select(array("Sin Respuesta" => "",
"Vegetariana" => "Vegetariana",
"Lacto Vegetariana" => "Lacto Vegetariana",
"Org&aacute;nica" => "Org&aacute;nica",
"De todo" => "De todo",
"Comida basura" => "Comida basura"),$datos['dieta']);

echo '

						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Tengo</label>
					<div class="input-fake">
						<ul>
							<li><input type="checkbox"'.(empty($datos['tengo_tatuajes']) ? '' : ' checked="checked"').' class="cuenta-save-3" name="tengo_tatuajes"/>Tatuajes</li>
							<li><input type="checkbox"'.(empty($datos['tengo_piercings']) ? '' : ' checked="checked"').' class="cuenta-save-3" name="tengo_piercings"/>Piercings</li>
						</ul>
					</div>
				</div>
				<div class="field clearfix">
					<label for="fumo">Fumo</label>
					<div class="input-fake">
						<select id="fumo" name="fumo" class="cuenta-save-3">';
						
select(array("Sin Respuesta" => "",
"No" => "No",
"Casualmente" => "Casualmente",
"Socialmente" => "Socialmente",
"Regularmente" => "Regularmente",
"Mucho" => "Mucho"),$datos['fumo']);

echo '
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label for="tomo_alcohol">Tomo alcohol</label>
					<div class="input-fake">
						<select id="tomo_alcohol" name="tomo_alcohol" class="cuenta-save-3">';
						
select(array("Sin Respuesta" => "",
"No" => "No",
"Casualmente" => "Casualmente",
"Socialmente" => "Socialmente",
"Regularmente" => "Regularmente",
"Mucho" => "Mucho"),$datos['tomo_alcohol']);

echo '
						</select>

					</div>
				</div>
				<div class="buttons">
					<input type="button" class="mBtn btnOk" onclick="cuenta.save(3, true)" value="Guardar y seguir" />
				</div>
			</fieldset>
			<h3 onclick="cuenta.chgsec(this)">3. Formaci&oacute;n y trabajo</h3>
			<fieldset style="display: none">

				<div class="alert-cuenta cuenta-4">
				</div>
				<div class="field clearfix">
					<label for="estudios">Estudios</label>
					<div class="input-fake">
						<select id="estudios" name="estudios" class="cuenta-save-4">';
						
select(array("Sin Respuesta" => "",
"Sin Estudios" => "Sin Estudio",
"Primario completo" => "Primario completo",
"Secundario en curso" => "Secundario en curso",
"Secundario completo" => "Secundario completo",
"Terciario en curso" => "Terciario en curso",
"Terciario completo" => "Terciario completo",
"Universitario en curso" => "Universitario en curso",
"Universitario completo" => "Universitario completo",
"Post-grado en curso" => "Post-grado en curso",
"Post-grado completo" => "Post-grado completo"),$datos['estudios']);

echo '
						</select>
					</div>
				</div>
				<div class="field clearfix">

					<label>Idiomas</label>
					<div class="input-fake">
						<ul>
							<li>
								<span class="label-id">Castellano</span>
								<select name="idioma_castellano" class="cuenta-save-4">';
								
select(array("Sin Respuesta" => "",
"Sin conocimiento" => "Sin conocimiento",
"B&aacute;sico" => "Basico",
"Intermedio" => "Intermedio",
"Fluido" => "Fluido",
"Nativo" => "Nativo"),$datos['idioma_castellano']);

echo '
								</select>

							</li>
							<li>
								<span class="label-id">Ingl&eacute;s</span>
								<select name="idioma_ingles" class="cuenta-save-4">';
								
select(array("Sin Respuesta" => "",
"Sin conocimiento" => "Sin conocimiento",
"B&aacute;sico" => "Basico",
"Intermedio" => "Intermedio",
"Fluido" => "Fluido",
"Nativo" => "Nativo"),$datos['idioma_ingles']);

echo '</select>
							</li>
							<li>
								<span class="label-id">Portugu&eacute;s</span>

								<select name="idioma_portugues" class="cuenta-save-4">';
								
select(array("Sin Respuesta" => "",
"Sin conocimiento" => "Sin conocimiento",
"B&aacute;sico" => "Basico",
"Intermedio" => "Intermedio",
"Fluido" => "Fluido",
"Nativo" => "Nativo"),$datos['idioma_portugues']);

echo '</select>
							</li>
							<li>
								<span class="label-id">Franc&eacute;s</span>
								<select name="idioma_frances" class="cuenta-save-4">';
								
select(array("Sin Respuesta" => "",
"Sin conocimiento" => "Sin conocimiento",
"B&aacute;sico" => "Basico",
"Intermedio" => "Intermedio",
"Fluido" => "Fluido",
"Nativo" => "Nativo"),$datos['idioma_frances']);

echo '</select>

							</li>
							<li>
								<span class="label-id">Italiano</span>
								<select name="idioma_italiano" class="cuenta-save-4">';
								
select(array("Sin Respuesta" => "",
"Sin conocimiento" => "Sin conocimiento",
"B&aacute;sico" => "Basico",
"Intermedio" => "Intermedio",
"Fluido" => "Fluido",
"Nativo" => "Nativo"),$datos['idioma_italiano']);

echo '</select>
							</li>
							<li>
								<span class="label-id">Alem&aacute;n</span>

								<select name="idioma_aleman" class="cuenta-save-4">';
								
select(array("Sin Respuesta" => "",
"Sin conocimiento" => "Sin conocimiento",
"B&aacute;sico" => "Basico",
"Intermedio" => "Intermedio",
"Fluido" => "Fluido",
"Nativo" => "Nativo"),$datos['idioma_aleman']);

echo '</select>
							</li>
							<li>
								<span class="label-id">Otro</span>
								<select name="idioma_otro" class="cuenta-save-4">';
								
select(array("Sin Respuesta" => "",
"Sin conocimiento" => "Sin conocimiento",
"B&aacute;sico" => "Basico",
"Intermedio" => "Intermedio",
"Fluido" => "Fluido",
"Nativo" => "Nativo"),$datos['idioma_otro']);

echo '</select>

							</li>
						</ul>
					</div>
				</div> 
				<div class="field clearfix">
					<label for="profesion">Profesi&oacute;n</label>
					<input value="'.$datos['profesion'].'" id="profesion" name="profesion" maxlength="32" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft"/>
				</div>
				<div class="field clearfix">

					<label for="empresa">Empresa</label>
					<input value="'.$datos['empresa'].'" id="empresa" name="empresa" maxlength="32" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft"/>
				</div>
				<div class="field clearfix">
					<label for="sector">Sector</label>
					<div class="input-fake">
						<select id="sector" name="sector" class="cuenta-save-4">';
						
select(array("Sin Respuesta" => "",
"Abastecimiento" => "Abastecimiento",
"Administraci&oacute;n" => "Administraci&oacute;n",
"Apoderado Aduanal" => "Apoderado Aduanal",
"Asesor&iacute;a en Comercio Exterior" => "Asesor&iacute;a en Comercio Exterior",
"Asesor&iacute;a Legal Internacional" => "sesor&iacute;a Legal Internacional",
"Asistente de Tr&aacute;fico" => "Asistente de Tr&aacute;fico",
"Auditor&iacute;a" => "Auditor&iacute;a",
"Calidad" => "Calidad8",
"Call Center" => "Call Center",
"Capacitaci&oacute;n Comercio Exterior" => "Capacitaci&oacute;n Comercio Exterior",
"Comercial" => "Comercial",
"Comercio Exterior" => "Comercio Exterior",
"Compras" => "Compras",
"Compras Internacionales/Importaci&oacute;n" => "Compras Internacionales/Importaci&oacute;n",
"Comunicaci&oacute;n Social" => "Comunicaci&oacute;n Social",
"Comunicaciones Externas" => "Comunicaciones Externas",
"Comunicaciones Internas" => "Comunicaciones Internas",
"Consultor&iacute;a" => "Consultor&iacute;a",
"Consultor&iacute;as Comercio Exterior" => "Consultor&iacute;as Comercio Exterior",
"Contabilidad" => "Contabilidad",
"Control de Gesti&oacute;n" => "Control de Gesti&oacute;n",
"Creatividad" => "Creatividad",
"Dise&ntilde;o" => "Dise&ntilde;o",
"Distribuci&oacute;n" => "Distribuci&oacute;n",
"E-commerce" => "E-commerce",
"Educaci&oacute;n" => "Educaci&oacute;n",
"Finanzas" => "Finanzas",
"Finanzas Internacionales" => "Finanzas Internacionales",
"Gerencia / Direcci&oacute;n General" => "Gerencia / Direcci&oacute;n General",
"Impuestos" => "Impuestos",
"Ingenier&iacute;a" => "Ingenier&iacute;a",
"Internet" => "Internet",
"Investigaci&oacute;n y Desarrollo" => "Investigaci&oacute;n y Desarrollo",
"J&oacute;venes Profesionales" => "J&oacute;venes Profesionales",
"Legal" => "Legal",
"Log&iacute;stica" => "Log&iacute;stica",
"Mantenimiento" => "Mantenimiento",
"Marketing" => "Marketing",
"Medio Ambiente" => "Medio Ambiente",
"Mercadotecnia Internacional" => "Mercadotecnia Internacional",
"Multimedia" => "Multimedia",
"Otra" => "Otra",
"Pasant&iacute;as" => "Pasant&iacute;as",
"Periodismo" => "Periodismo",
"Planeamiento" => "Planeamiento",
"Producci&oacute;n" => "Producci&oacute;n",
"Producci&oacute;n e Ingenier&iacute;a" => "Producci&oacute;n e Ingenier&iacute;a",
"Recursos Humanos" => "Recursos Humanos",
"Relaciones Institucionales / P&uacute;blicas" => "Relaciones Institucionales / P&uacute;blicas",
"Salud" => "Salud",
"Seguridad Industrial" => "Seguridad Industrial",
"Servicios" => "Servicios",
"Soporte T&eacute;cnico" => "Soporte T&eacute;cnico",
"Tecnolog&iacute;a" => "Tecnolog&iacute;a",
"Tecnolog&iacute;as de la Informaci&oacute;n" => "Tecnolog&iacute;as de la Informaci&oacute;n",
"Telecomunicaciones" => "Telecomunicaciones",
"Telemarketing" => "Telemarketing",
"Traducci&oacute;n" => "Traducci&oacute;n",
"Transporte" => "Transporte",
"Ventas" => "Ventas",
"Ventas Internacionales/Exportaci&oacute;n" => "Ventas Internacionales/Exportaci&oacute;n"),$datos['sector']);

echo '
		</select>
					</div>
				</div>
				<div class="field clearfix">
					<label for="ingresos">Nivel de ingresos</label>
					<div class="input-fake">
						<select id="ingresos" name="ingresos" class="cuenta-save-4">';
						
select(array("Sin Respuesta" => "",
"Sin ingresos" => "Sin ingresos",
"Bajos" => "Bajos",
"Intermedios" => "Intermedios",
"Altos" => "Altos"),$datos['ingresos']);

echo '
						</select>
					</div>
				</div>

				<div class="field clearfix">
					<label for="intereses_profesionales">Intereses Profesionales</label>
					<div class="input-fake">
						<textarea id="intereses_profesionales" name="intereses_profesionales" class="cuenta-save-4">'.$datos['intereses_profesionales'].'</textarea>
					</div>
				</div>
				<div class="field clearfix">
					<label for="habilidades_profesionales">Habilidades Profesionales</label>

					<div class="input-fake">
						<textarea id="habilidades_profesionales" name="habilidades_profesionales" class="cuenta-save-4">'.$datos['habilidades_profesionales'].'</textarea>
					</div>
				</div>
				<div class="buttons">
					<input type="button" class="mBtn btnOk" onclick="cuenta.save(4, true)" value="Guardar y seguir" />
				</div>
			</fieldset>

			<h3 onclick="cuenta.chgsec(this)">4. Intereses y preferencias</h3>
			<fieldset style="display: none">
				<div class="alert-cuenta cuenta-5">
				</div>
				<div class="field clearfix">
					<label for="mis_intereses">Mis intereses</label>
					<div class="input-fake">
						<textarea id="mis_intereses" name="mis_intereses" class="cuenta-save-5">'.$datos['mis_intereses'].'</textarea>

					</div>
				</div>


				

				<div class="field clearfix">
					<label for="hobbies">Hobbies</label>
					<div class="input-fake">
						<textarea id="hobbies" name="hobbies" class="cuenta-save-5">'.$datos['hobbies'].'</textarea>
					</div>
				</div>


				<div class="field clearfix">
					<label for="hobbies">Series de TV favoritas</label>
					<div class="input-fake">
						<textarea id="series_tv_favoritas" name="series_tv_favoritas" class="cuenta-save-5">'.$datos['series_tv_favoritas'].'</textarea>
					</div>
				</div>

				<div class="field clearfix">
					<label for="musica_favorita">M&uacute;sica favorita</label>
					<div class="input-fake">
						<textarea id="musica_favorita" name="musica_favorita" class="cuenta-save-5">'.$datos['musica_favorita'].'</textarea>
					</div>

				</div>
				<div class="field clearfix">
					<label for="deportes_y_equipos_favoritos">Deportes y equipos favoritos</label>
					<div class="input-fake">
						<textarea id="deportes_y_equipos_favoritos" name="deportes_y_equipos_favoritos" class="cuenta-save-5">'.$datos['deportes_y_equipos_favoritos'].'</textarea>
					</div>
				</div>
				<div class="field clearfix">

					<label for="libros_favoritos">Libros favoritos</label>
					<div class="input-fake">
						<textarea id="libros_favoritos" name="libros_favoritos" class="cuenta-save-5">'.$datos['libros_favoritos'].'</textarea>
					</div>
				</div>
				<div class="field clearfix">
					<label for="peliculas_favoritas">Pel&iacute;culas favoritas</label>

					<div class="input-fake">
						<textarea id="peliculas_favoritas" name="peliculas_favoritas" class="cuenta-save-5">'.$datos['peliculas_favoritas'].'</textarea>
					</div>
				</div>
				<div class="field clearfix">
					<label for="comida_favorita">Comida favorita</label>
					<div class="input-fake">
						<textarea id="comida_favorita" name="comida_favorita" class="cuenta-save-5">'.$datos['comida_favorita'].'</textarea>

					</div>
				</div> 
				 <div class="field clearfix">
					 <label for="mis_heroes_son">Mis h&eacute;roes son</label>
					 <div class="input-fake">
						 <textarea id="mis_heroes_son" name="mis_heroes_son" class="cuenta-save-5">'.$datos['mis_heroes_son'].'</textarea>
					 </div>
				 </div>

				<div class="buttons">
					<input type="button" class="ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" onclick="cuenta.save(5)" value="Guardar" />
				</div>

			</fieldset>
			
		</div>
';

echo '
		<div class="content-tabs opciones" style="display: none">
			<fieldset>
				<div class="alert-cuenta cuenta-6">
				</div>
				<div class="field clearfix">
					<div class="input-fake">
						<input type="hidden" class="cuenta-save-6" name="nombre_mostrar" value="todos" />
						<ul>
							<li><input type="checkbox" name="mostrar_estado_checkbox" class="cuenta-save-6" '.(empty($datos['mostrar_estado_checkbox']) ? '' : 'checked="checked"').' />Mostrar mi estado cuando navego el sitio</li>
							<li><input type="checkbox" name="participar_busquedas" class="cuenta-save-6" '.(empty($datos['participar_busquedas']) ? '' : 'checked="checked"').' />Permitir que los usuarios encuentren mi perfil en las busquedas de usuarios</li>
							<li><input type="checkbox" name="recibir_boletin_semanal" class="cuenta-save-6" '.(empty($datos['recibir_boletin_semanal']) ? '' : 'checked="checked"').' />Recibir el bolet&iacute;n semanal de novedades de '.$comunidad.' por e-mail</li>
							<li><input type="checkbox" name="recibir_promociones" class="cuenta-save-6" '.(empty($datos['recibir_promociones']) ? '' : 'checked="checked"').' />Recibir promociones y descuentos por e-mail</li>
						</ul>
					</div>
				</div>
			</fieldset>

			<div class="buttons">
				<input type="button" class="ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" onclick="cuenta.save(6)" value="Guardar" />
			</div>
			
		</div>
		<div class="content-tabs mis-fotos" style="display: none">
			<fieldset>
				<div class="alert-cuenta cuenta-7"></div>



';
				
$dbfotos = mysql_query("SELECT * FROM usuarios_fotos WHERE iduser = '$key'");

while($fotoz = mysql_fetch_array($dbfotos)) {
	echo '<div class="field clearfix">
					<label>Imagen</label>
					<div class="input-fake">
						<div class="floatL">
							<img src="'.Fotos($fotoz['url']).'" class="imagen-preview" />
						</div>
						<div class="floatL">
							<input style="width:300px" value="'.Fotos($fotoz['url']).'" type="text" class="text" />
							<textarea class="imagen-desc" style="margin-top:10px;width:300px">'.Fotos($fotoz['nombre']).'</textarea>

							<a onclick="cuenta.imagen.del(this, '.Fotos($fotoz['fotoid']).')" class="misfotos-del">Eliminar</a>
							
						</div>
						<div class="clearfix clearBoth"></div>
					</div>
				</div>';
}

mysql_free_result($dbfotos);
				
echo '				
				<div class="field clearfix">
					<label>Imagen</label>
					<div class="input-fake">
						<input style="width: 300px;margin-bottom:5px" type="text" class="text" value="http://" />
						<textarea style="width: 300px"  class="imagen-desc" style="margin-top:10px">Descripci&oacute;n de la foto</textarea>
						<a onclick="cuenta.imagen.add(this)" class="misfotos-add">Agregar</a>

					</div>
				</div>
			</fieldset>
			
		</div>

		<div class="content-tabs bloqueados" style="display: none">
			<fieldset>
				<div class="field clearfix">
						<ul class="bloqueadosList">';


	
	
	
	$number=0;

$sql= mysql_query("SELECT * FROM bloqueados as b, usuarios as u WHERE u.id=b.b_user AND b.b_iduser='$key'");
if(mysql_num_rows($sql)!=0){
while($row = mysql_fetch_array($sql)){
echo'<li class="bloqueadosList">
        <a href="/perfil/'.$row['nick'].'">'.$row['nick'].'</a>
        <span><a class="desbloqueadosU bloquear_usuario_'.$row['b_user'].'" href="javascript:bloquear(\''.$row['b_user'].'\', false, \'mis_bloqueados\')" title="Desbloquear Usuario">Desbloquear</a></span>
     </li>';
	$number=1;

}
	
	if ($b.bloqueados==0) {
		echo '';
	}
}
	echo '
							</ul>
							</div>
			</fieldset>
			
		</div>
		<div class="content-tabs cambiar-clave" style="display: none">		
			<fieldset>
			<div class="alert-cuenta cuenta-9">
				</div>

				<div class="field clearfix">
					<label for="new_passwd">Contrase&ntilde;a actual:</label>
					<input type="password" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="passwd" name="passwd" maxlength="32" value="" />
				</div>
				<div class="field clearfix">
					<label for="passwd">Contrase&ntilde;a nueva:</label>
					<input type="password" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="new_passwd" name="new_passwd" maxlength="32" value="" />
				</div>

				<div class="field clearfix">
					<label for="confirm_passwd">Repetir Contrase&ntilde;a:</label>
					<input type="password" class="text cuenta-save-1 ui-corner-all form-input-text box-shadow-soft" id="confirm_passwd" name="confirm_passwd" maxlength="32" value="" />
				</div>
			</fieldset>
			<div class="buttons">
				<input type="button" class="ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" onclick="cuenta.save(9)" value="Guardar" />
			</div>

			
		</div>
		



<div class="content-tabs cambiar-color" style="display: none">
			



<fieldset>
<div class="alert-cuenta cuenta-8"></div>


<h2>Cambiar Banner Perfil:</h2> 
<iframe src="/banner.php" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>				
<h2>Cambiar Color a Zincomienzo:</h2> 
<iframe src="/theme.php" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>




		</div>









<div class="content-tabs privacidad" style="display: none">
			<fieldset>
				<div class="alert-cuenta cuenta-9"></div>


<div class="emptyData">Seccion A&uacute;n En Construcci&oacute;n</div>
				<div class="field clearfix">
					<label>Nombre</label>
					<div class="input-fake">

						<select class="cuenta-save-8" name="nombre_mostrar">
							<option value="nadie" selected="selected">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos">Todos</option>
						</select>
					</div>

				</div>
				<div class="field clearfix">
					<label>E-Mail</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="email_mostrar">
							<option value="nadie" selected="selected">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Nacimiento</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="fecha_nacimiento_mostrar">
							<option value="nadie" selected="selected">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Mensajero</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="im_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Mensaje Personal</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="im_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Estado mientras Navego</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="navego_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Me gustaria</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="me_gustaria_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Estado Civil</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="estado_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Hijos</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="hijos_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Vivo con</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="vivo_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Mi altura</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="altura_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Mi peso</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="peso_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Color de pelo</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="pelo_color_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Color de ojos</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="ojos_color_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Complexi&oacute;n</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="fisico_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Mi dieta</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="dieta_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Tatuajes/piercings</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="tengo_tatuajes_piercings_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Fumo</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="fumo_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Tomo alcohol</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="tomo_alcohol_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Estudios</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="estudios_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Idiomas</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="idiomas_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Profesi&oacute;n</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="profesion_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Empresa</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="empresa_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Sector</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="sector_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Nivel de ingresos</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="ingresos_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Intereses Profesionales</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="intereses_profesionales_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Habilidades Profesionales</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="habilidades_profesionales_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Mis intereses</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="mis_intereses_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Hobbies</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="hobbies_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Series de TV favoritas</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="series_tv_favoritas_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>M&uacute;sica favorita</label>
					<div class="input-fake">

						<select class="cuenta-save-8" name="musica_favorita_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>

				</div>
				<div class="field clearfix">
					<label>Deportes y equipos favoritos</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="deportes_y_equipos_favoritos_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Libros favoritos</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="libros_favoritos_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Peliculas favoritas</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="peliculas_favoritas_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<label>Comida favorita</label>

					<div class="input-fake">
						<select class="cuenta-save-8" name="comida_favorita_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>
							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>

					</div>
				</div>
				<div class="field clearfix">
					<label>Mis h&eacute;roes</label>
					<div class="input-fake">
						<select class="cuenta-save-8" name="mis_heroes_son_mostrar">
							<option value="nadie">Nadie</option>
							<option value="amigos">Mis amigos</option>

							<option value="registrados">Usuarios registrados</option>
							<option value="todos" selected="selected">Todos</option>
						</select>
					</div>
				</div>
			</fieldset>
			<div class="buttons">
				<input type="button" class="ui-button-positive fg-button ui-state-default ui-corner-all box-shadow-soft ui-button ui-widget ui-button-text-only" onclick="cuenta.save(8)" value="Guardar" />

			</div>
			
		</div>

	</form>
</div>
</div>
</div>
<div id="sidebar">
	<div class="tabbed-d">
		<div class="box clearbeta avatar-edit">
			<div class="title clearfix">

				<h2>Mi Avatar</h2>
			</div>
				<div class="sidebar-tabs clearbeta">
				<div class="avatar-big-cont">
					<div class="avatar-loading" style="display: none"></div>
					<img class="avatar-big" src="'.$datos['avatar'].'" alt="" width="120" height="120" />
				</div>
				<div class="webcam-capture" style="display: none; margin: 0 0 0 10px">

					<div class="avatar-loading"></div>
					<!--[if !IE]> -->
					<object type="application/x-shockwave-flash" data="/capture.swf" width="225" height="140" wmode="transparent">
					<!-- <![endif]-->
					<!--[if IE]>
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="225" height="140">
					<param name="movie" value="/capture.swf" />
					<!-->
					<param name="loop" value="true" />
					<param name="menu" value="false" />
					<param name="wmode" value="transparent" />
					<param name="flashvars" value="id=8333103&s=2&crc=63a5523c97f75229dbbfaac56f21f33d63ae4099&texto=Tomar+foto&host=hh.taringa.net/upload.php" />

					<p>Tu navegador no soporta flash</p>
					</object>
					<!-- <![endif]-->
				</div>
				<div class="clearfix"></div>
				<ul class="change-avatar" style="display: none">
					<li class="local-file">
						<span><a onclick="avatar.chgtab(this)">Local</a></span>

						<div class="mini-modal">
							<div class="dialog-m"></div>
							<span>Subir Archivo</span>
							<input class="browse" size="15" type="file" id="file-avatar" name="file-avatar" /><br /><button class="avatar-next local" onclick="avatar.upload(this)">Subir</button>
						</div>
					</li>
					<li class="webcam-file">
						<span><a onclick="avatar.chgtab(this)">Webcam</a></span>

					</li>
				</ul>
				<div class="clearfix"></div>
				<a class="edit" onclick="avatar.edit(this)">Editar</a>
			</div>
		</div>
	</div>	
		<!-- ACTION DIALOGS -->
		<div id="action-dialogs" style="display:none;">

			<div class="sharePost-dialog" title="Avatar de la Comunidad">
			</div>
			<div class="flagPost-dialog" title="Flag Post">
			</div>
			<div class="sharePost-dialog-error" title="Error">
				<p></p>
			</div>
		</div>
	<!-- END ACTION DIALOGS -->

	<div class="clearfix"></div>
	<h3 id="porc-completado-label" style="margin: 25px 0 0; padding: 0">Perfil completo al 100%</h3>
	<div id="porc-completado" style="margin-top:5px;text-align:center;font-size:13px;margin-bottom:10px;color:#FFF;text-shadow: 0 1px 0px #000">
		<div style="background: #CCC;padding:2px;line-height:17px">
			<div id="porc-completado-barra" style="width: 100%; height:17px;border-right:1px solid #004b8d; border-left: 1px solid #004b8d;background: url(\'http://o1.t26.net/images/barra.gif\') top left repeat-x;">
			</div>
		</div>
	</div>

			<a class="facebook-vinc" onclick="FB.signin(\'link\')">Vincular con Facebook</a>
			<!-- TWITTER CONNECT -->
		<div id="twt_perfil" style="margin-top:10px;">
						<a class="twitter-vinc" onclick="twitter.link()">Vincular con Twitter</a>
					</div>
			<script type="text/javascript">
				var twitter = {
					link: function(){
						var twitter_window = window.open(\'/twitter_link.php\',\'Vincular mi cuenta con Twitter\', \'width=850,height=450,scrollbars=NO,resizable=NO\'),
							twitter_interval = setInterval(function(){
								if (twitter_window.closed) {
									clearInterval(twitter_interval);
									window.location.reload();
								}
							}, 250);
						
					},
					unlink: function(){
						$.ajax({
							type: \'POST\',
							url: \'/twitter_unlink.php\',
							success: function(h){
								switch(h){ //Error
									case "0":
										alert("Hubo en error al procesar tu solicitud, intentalo nuevamente");
										break;
									case "1":
										window.location.reload();
								}	
							}
						});
					}
				}
			</script>
	</div>		</div>





		
';

}




if($ajax != '1') {
	pie();
}
?>