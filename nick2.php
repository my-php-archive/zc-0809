<?php
function limpia($var){
	$var = strip_tags($var); //esto te libra de los xss x)
	$malo = array("\\",";","\'","'"); // aqui pones caracteres no permitidos x)
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
 

require("header.php");
$id      = no_i($_GET['id']);
$nom     = no_i($_SESSION['id']);
$section = xss($_GET['section']);



$direccion = explode("/", $_SERVER['REQUEST_URI']);
$aux       = $direccion[2];






if($section == "") $section="Actividad";
if ($id == null) $id = $aux;
if (is_numeric($id)) $donde = "u.id='{$id}'"; else $donde = "u.nick='{$id}'";

$sqlu   = $db->query("SELECT u.*,r.nom_rango FROM usuarios u LEFT JOIN rangos r ON r.id_rango=u.rango WHERE {$donde} ");
$existe = $db->num_rows($sqlu);
$row    = $db->fetch_array($sqlu);

$db->free_result($sqlu);
$edad   = date("Y")-$row['ano'];
$ultimaip  = $row['ultimaip'];
$activacion  = $row['activacion'];



if (!$existe){
    $titulo	= $descripcion;
    cabecera_normal();
    fatal_error('Ese usuario no existe');
}

$id_autor  = $row['id'];
$titulo    = $comunidad;
$comunidad = "Perfil de ".$row['nick']."";
cabecera_normal();
$comunidad = "Zincomienzo!";

function sexoedit($valor){
$valor = str_replace("m", "Hombre", $valor);
$valor = str_replace("f", "Mujer", $valor);

return $valor;}

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='$nom'"));
$rango = $sqlrango['rango'];

if ($rango=="255" or $rango=="655" or $rango=="755"){


?>

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<form action="/anonimo-guardar.php" method="post">
<div class="container228 floatL">
<div class="box_title"><div class="box_txt">Avatar de <?=$row['nick']?></div></div>
<div class="box_cuerpo">



<center><img src="<?=$row['avatar']?>" width="120" weight="120" align="center" vspace="4" hspace="4" id="miAvatar" onerror="error_avatar(this)"><br/>
<input type="text" class="inputedit" size="30" maxlength="255" name="avatar" value="<?=$row['avatar']?>"/>
<br/><br/> 


<br/><br/><input type="submit" class="mBtn btnOk" style="font-size:13px" value="Aplicar cambios" title="Modificar mi perfil"></center>

</div>

<br/><div class="box_title"><div class="box_txt">Cambiar Nick De <?=$row['nick']?></div></div>
<div class="box_cuerpo">



<center><input type="text" class="inputeditnick" size="30" maxlength="32" name="nick" value="<?=$row['nick']?>"/></center>



</div></div>

<div class="container702 floatR">

<div class="box_title"><div class="box_txt">Edicion del perfil de <?=$row['nick']?></div></div>
<div class="box_cuerpo">
<table width="100%" cellpadding="4">


<td width="25%" align="right"><b>Nombre: </b></td>
<td><input type="text" class="inputedit" size="30" maxlength="32" name="nombre" value="<?=$row['nombre']?>"/></td>
</tr>


<tr>
<td width="25%" align="right"><b>Mensaje Personal: </b></td>
<td><input type="text" class="inputedit" size="30" maxlength="32" name="mensaje" value="<?=$row['mensaje']?>"/></td>
</tr>

<tr>
<td width="25%" align="right"><b>Empresa: </b></td>
<td><input type="text" class="inputedit" size="30" maxlength="32" name="empresa" value="<?=$row['empresa']?>"/></td>
</tr>

<tr>
<td width="25%" align="right"><b>Email: </b></td>
<td><input type="text" class="inputedit" size="30" maxlength="32" name="mail" value="<?=$row['mail']?>"/></td>
</tr>

<tr>
<td width="25%" align="right"><b>Pa&iacute;s: </b></td>

<td><select id="pais" name="pais" class="cuenta-save-1" onchange="cuenta.chgpais()">

<option value="<?=$row['pais']?>"><?=pais($row['pais'])?></option>

<option value="AF" >Afganist&aacute;n</option>
<option value="AL" >Albania</option>
<option value="DE" >Alemania</option>
<option value="DZ" >Argelia</option>

<option value="AD" >Andorra</option>
<option value="AO" >Angola</option>
<option value="AI" >Anguila</option>
<option value="AG" >Antigua y Barbuda</option>
<option value="AN" >Antillas Neerlandesas</option>
<option value="AQ" >Ant&aacute;rtida</option>
<option value="SA" >Arabia Saudita</option>
<option value="AR" >Argentina</option>

<option value="AM" >Armenia</option>
<option value="AW" >Aruba</option>
<option value="AU" >Australia</option>
<option value="AT" >Austria</option>
<option value="AZ" >Azerbaiy&aacute;n</option>
<option value="BS" >Bahamas</option>
<option value="BH" >Bahr&eacute;in</option>
<option value="BD" >Bangladesh</option>

<option value="BB" >Barbados</option>
<option value="BZ" >Belice</option>
<option value="BJ" >Benin</option>
<option value="BM" >Bermudas</option>
<option value="BY" >Bielorrusia</option>
<option value="BO" >Bolivia</option>
<option value="BA" >Bosnia y Herzegovina</option>
<option value="BW" >Botswana</option>
<option value="BR" >Brasil</option>

<option value="BN" >Brun&eacute;i</option>
<option value="BG" >Bulgaria</option>
<option value="BF" >Burkina Faso</option>
<option value="BI" >Burundi</option>
<option value="BT" >But&aacute;n</option>
<option value="BE" >B&eacute;lgica</option>
<option value="CV" >Cabo Verde</option>

<option value="KH" >Camboya</option>
<option value="CM" >Camer&uacute;n</option>
<option value="CA" >Canad&aacute;</option>
<option value="TD" >Chad</option>
<option value="CL" >Chile</option>
<option value="CN" >China</option>
<option value="CY" >Chipre</option>
<option value="VA" >Ciudad del Vaticano</option>

<option value="CO" >Colombia</option>
<option value="KM" >Comoras</option>
<option value="KP" >Corea del Norte</option>
<option value="KR" >Corea del Sur</option>
<option value="CR" >Costa Rica</option>
<option value="CI" >Costa de Marfil</option>
<option value="HR" >Croacia</option>
<option value="CU" >Cuba</option>
<option value="DK" >Dinamarca</option>

<option value="DM" >Dominica</option>
<option value="EC" >Ecuador</option>
<option value="EG" >Egipto</option>
<option value="SV" >El Salvado</option>
<option value="AE" >Emiratos &Aacute;rabes Unidos</option>
<option value="ER" >Eritrea</option>
<option value="SK" >Eslovaquia</option>
<option value="SI" >Eslovenia</option>

<option value="ES" >Espa&ntilde;a</option>
<option value="US" >Estados Unidos</option>
<option value="EE" >Estonia</option>
<option value="ET" >Etiop&iacute;a</option>
<option value="PH" >Filipinas</option>
<option value="FI" >Finlandia</option>
<option value="FJ" >Fiyi</option>
<option value="FR" >Francia</option>

<option value="GA" >Gab&oacute;n</option>
<option value="GM" >Gambia</option>
<option value="GE" >Georgia</option>
<option value="GH" >Ghana</option>
<option value="GI" >Gibraltar</option>
<option value="GD" >Granada</option>
<option value="GR" >Grecia</option>
<option value="GL" >Groenlandi</option>

<option value="GP" >Guadalupe</option>
<option value="GU" >Guam</option>
<option value="GT" >Guatemala</option>
<option value="GF" >Guayana Francesa</option>
<option value="GG" >Guernsey</option>
<option value="GN" >Guinea</option>
<option value="GQ" >Guinea Ecuatorial</option>
<option value="GW" >Guinea-Bissau</option>
<option value="GY" >Guyana</option>

<option value="HT" >Hait&iacute;</option>
<option value="HN" >Honduras</option>
<option value="HK" >Hong Kong</option>
<option value="HU" >Hungr&iacute;a</option>
<option value="IN" >India</option>
<option value="ID" >Indonesia</option>
<option value="IQ" >Iraq</option>
<option value="IE" >Irlanda</option>

<option value="IR" >Ir&aacute;n</option>
<option value="BV" >Isla Bouvet</option>
<option value="IM" >Isla de Man</option>
<option value="CX" >Isla de Navidad</option>
<option value="IS" >Islandia</option>
<option value="KY" >Islas Caim&aacute;n</option>
<option value="CC" >Islas Cocos</option>
<option value="CK" >Islas Cook</option>

<option value="FO" >Islas Feroe</option>
<option value="GS" >Islas Georgias del Sur y Sandwich del Sur</option>
<option value="HM" >Islas Heard y McDonald</option>
<option value="MP" >Islas Marianas del Norte</option>
<option value="MH" >Islas Marshall</option>
<option value="PN" >Islas Pitcairn</option>
<option value="SB" >Islas Salom&oacute;n</option>
<option value="TC" >Islas Turcas y Caicos</option>

<option value="VG" >Islas V&iacute;rgenes Brit&aacute;nicas</option>
<option value="VI" >Islas V&iacute;rgenes Estadounidenses</option>
<option value="UM" >Islas ultramarinas de Estados Unidos</option>
<option value="IL" >Israel</option>
<option value="IT" >Italia</option>
<option value="JM" >Jamaica</option>
<option value="JP" >Jap&oacute;n</option>

<option value="JE" >Jersey</option>
<option value="JO" >Jordania</option>
<option value="KZ" >Kazajist&aacute;n</option>
<option value="KE" >Kenia</option>
<option value="KG" >Kirguist&aacute;n</option>
<option value="KI" >Kiribati</option>
<option value="KW" >Kuwait</option>
<option value="LA" >Laos</option>

<option value="LS" >Lesoto</option>
<option value="LV" >Letonia</option>
<option value="LR" >Liberia</option>
<option value="LY" >Libia</option>
<option value="LI" >Liechtenst</option>
<option value="LT" >Lituania</option>
<option value="LU" >Luxemburgo</option>
<option value="LB" >L&iacute;bano</option>

<option value="MO" >Macao</option>
<option value="MG" >Madagascar</option>
<option value="MY" >Malasia</option>
<option value="MW" >Malaui</option>
<option value="MV" >Maldivas</option>
<option value="MT" >Malta</option>
<option value="ML" >Mal&iacute;</option>
<option value="MA" >Marruecos</option>
<option value="MQ" >Martinica</option>

<option value="MU" >Mauricio</option>
<option value="MR" >Mauritania</option>
<option value="YT" >Mayotte</option>
<option value="FM" >Micronesia</option>
<option value="MD" >Moldavia</option>
<option value="MN" >Mongolia</option>
<option value="ME" >Montenegro</option>
<option value="MS" >Montserrat</option>
<option value="MZ" >Mozambique</option>

<option value="MM" >Myanmar</option>
<option value="MX" >M&eacute;xico</option>
<option value="MC" >M&oacute;naco</option>
<option value="NA" >Namibia</option>
<option value="NR" >Nauru</option>
<option value="NP" >Nepal</option>
<option value="NI" >Nicaragua</option>
<option value="NE" >Niger</option>

<option value="NG" >Nigeria</option>
<option value="NU" >Niue</option>
<option value="NF" >Norfolk</option>
<option value="NO" >Noruega</option>
<option value="NC" >Nueva Caledonia</option>
<option value="NZ" >Nueva Zelanda</option>
<option value="OM" >Om&aacute;n</option>
<option value="PK" >Pakist&aacute;n</option>

<option value="PW" >Palaos</option>
<option value="PA" >Panam&aacute;</option>
<option value="PG" >Pap&uacute;a Nueva Guinea</option>
<option value="PY" >Paraguay</option>
<option value="NL" >Pa&iacute;ses Bajos</option>
<option value="PE" >Per&uacute;</option>
<option value="PF" >Polinesia Francesa</option>
<option value="PL" >Polonia</option>

<option value="PT" >Portugal</option>
<option value="PR" >Puerto Rico</option>
<option value="QA" >Qatar</option>
<option value="GB" >Reino Unido</option>
<option value="CF" >Rep&uacute;blica Centroafricana</option>
<option value="CZ" >Rep&uacute;blica Checa</option>
<option value="CD" >Rep&uacute;blica Democr&aacute;tica del Congo</option>

<option value="DO" >Rep&uacute;blica Dominicana</option>
<option value="MK" >Rep&uacute;blica de Macedonia</option>
<option value="CG" >Rep&uacute;blica del Congo</option>
<option value="EH" >Rep&uacute;blica &Aacute;rabe Saharaui Democr&aacute;tica</option>
<option value="RE" >Reuni&oacute;n</option>

<option value="RW" >Ruanda</option>
<option value="RO" >Rumania</option>
<option value="RU" >Rusia</option>
<option value="MF" >Saint-Martin</option>
<option value="WS" >Samoa</option>
<option value="AS" >Samoa Americana</option>
<option value="BL" >San Bartolom&eacute;</option>
<option value="KN" >San Crist&oacute;bal y Nieves</option>

<option value="SM" >San Marino</option>
<option value="PM" >San Pedro </option>
<option value="VC" >San Vicente y las Granadinas</option>
<option value="SH" >Santa Helena</option>
<option value="LC" >Santa Luc&iacute;a</option>
<option value="ST" >Sao Tom&eacute; y Principe</option>
<option value="SN" >Senegal</option>

<option value="RS" >Serbia</option>
<option value="SC" >Seychelles</option>
<option value="SL" >Sierra Leona</option>
<option value="SG" >Singapur</option>
<option value="SY" >Siria</option>
<option value="SO" >Somalia</option>
<option value="LK" >Sri Lanka</option>
<option value="SZ" >Suazilandia</option>
<option value="ZA" >Sud&aacute;frica</option>

<option value="SD" >Sud&aacute;n</option>
<option value="SE" >Suecia</option>
<option value="CH" >Suiza</option>
<option value="SR" >Surinam</option>
<option value="SJ" >Svalbard y Jan Mayen</option>
<option value="TH" >Tailandia</option>
<option value="TW" >Taiw&aacute;n</option>
<option value="TZ" >Tanzania</option>

<option value="TJ" >Tayikist&aacute;n</option>
<option value="IO" >Territorio Brit&aacute;nico del Oc&eacute;ano &Iacute;ndico</option>
<option value="TF" >Territorios Australes Franceses</option>
<option value="PS" >Territorios palestinos</option>
<option value="TL" >Timor Oriental</option>
<option value="TG" >Togo</option>
<option value="TK" >Tokelau</option>

<option value="TO" >Tonga</option>
<option value="TT" >Trinidad y Tobago</option>
<option value="TM" >Turkmenist&aacute;n</option>
<option value="TR" >Turqu&iacute;a</option>
<option value="TV" >Tuvalu</option>
<option value="TN" >T&uacute;nez</option>
<option value="UA" >Ucrania</option>

<option value="UG" >Uganda</option>
<option value="UY" >Uruguay</option>
<option value="UZ" >Uzbekist&aacute;n</option>
<option value="VU" >Vanuatu</option>
<option value="VE" >Venezuela</option>
<option value="VN" >Vietnam</option>
<option value="WF" >Wallis y Futuna</option>
<option value="YE" >Yemen</option>

<option value="DJ" >Yibuti</option>
<option value="ZM" >Zambia</option>
<option value="ZW" >Zimbabue</option>
										</select>
</td>
</tr>


<tr>
<td width="25%" align="right"><b>Ciudad: </b></td>
<td><input type="text" class="inputedit" size="30" maxlength="32" name="ciudad" value="<?=$row['ciudad']?>"/></td>
</tr>

<tr>
<td width="25%" align="right"><b>Regi&oacute;n: </b></td>
<td><input type="text" class="inputedit" size="30" maxlength="32" name="region" value="<?=$row['region']?>"/></td>
</tr>
<tr>
<td width="25%" align="right"><b>Sitio web: </b></td>
<td><input type="text" class="inputedit" size="30" maxlength="32" name="sitio_web" value="<?=$row['sitio_web']?>"/></td>
</tr>

<tr>
<td align="right"><b>Mensajero:</b></td>
<td><input type="text" class="inputedit" size="20" maxlength="64" name="mensajero" value="<?=$row['mensajero']?>" />

<select id="im_tip" name="im_tipo">
<option value="msn">MSN</option>
<option value="gtalk">GTalk</option>
<option value="icq">ICQ</option>
<option value="aim">AIM</option>
</select>
</td>
</tr>

<tr>
<td width="25%" align="right"><b>Direccion IP: </b></td>
<td><input type="text" class="inputedit" size="30" maxlength="32" name="ultimaip" value="<?=$row['ultimaip']?>"/></td>
</tr>



</table>




<center><tr>
<td width="25%" align="right"><b>La Forma <font color="red">"Anonima"</font> Se Refiere Que Al Usuario No Se Le Envie El MP.</font> </b></td>
</tr></center>


<hr>
<center><input type="submit" class="mBtn btnOk" style="font-size:13px" value="Aplicar cambios" title="Modificar mi perfil"></center>

<div class="clearfix"></div>

		</div>
		<div class="content-tabs perfil" style="display: none">
			<h3 onclick="cuenta.chgsec(this)" class="active">1. M&aacute;s sobre mi</h3>
			<fieldset>
				<div class="alert-cuenta cuenta-2">
				</div>
				<div class="field">

<input type="text" name="id" value="<?=$row['id']?>">
</div>
      



		</form>

</div>
<div style="clear:both"></div>
<!-- fin cuerpocontainer --><div style="clear:both"></div></div>

<?
pie();
}
?>