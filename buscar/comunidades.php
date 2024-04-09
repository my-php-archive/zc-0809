<?
include("header.php");
$q = xss(no_i($_GET['q']));
$autor = xss(no_i($_GET['autor']));
$cat = xss(no_i($_GET['cat']));
$sort = xss(no_i($_GET['sort']));
$pais = xss(no_i($_GET['pais']));
$tupo= xss(no_i($_GET['type']));
$section= xss(no_i($_GET['section']));
$fechaB= xss(no_i($_GET['fecha']));
if(empty($tupo)){
	$tupo="comunidades";
	}
if($tupo=="comunidades"){
$type = "comunidades";
}else{
$type = "temas";	
}
if(!empty($autor)){
	$sq2l = "SELECT id FROM usuarios WHERE nick='".$autor."' ";
	$rs2 = mysql_query($sq2l,$con);
	if (mysql_num_rows($rs2)>0){
		$row2 = mysql_fetch_array($rs2);
		$cadena_usuario = " and creadorid='".$row2['id']."' ";
	}
}
	
if(!empty($pais)){
		$cadena_pais = " and pais='".$pais ."' ";
}

if($sort == "1"){
$ORDAR = "ORDER BY p.fecha DESC";
}elseif($sort == "2"){
if($type=="temas"){
$ORDAR = "ORDER BY t.calificacion DESC";
}else{
$ORDAR = "ORDER BY p.numm DESC";
}
}elseif($sort == "3"){	
if($type=="temas"){
$ORDAR = "ORDER BY t.visitaste DESC";
}else{
$ORDAR = "ORDER BY p.numte DESC";
}
}else{
$ORDAR = "ORDER BY p.fecha DESC";
}


$catg=$cat;
if(!empty($catg) && $catg!=""){
$catg="&cat=".$cat."";
$category=" AND c.link_categoriac ='".$cat."'";
}



if($fechaB == "1"){
}elseif($fechaB == "2"){
$fumes= "'".(time() - (60*60*24))."' AND '".(time())."'";
}elseif($fechaB == "4"){	
$fumes= "'".(time() - (60*60*24*7))."' AND '".(time())."'";
}elseif($fechaB == "5"){	
$fumes= "'".(time() - (60*60*24*30))."' AND '".(time())."'";
}elseif($fechaB == "6"){	
$fumes= "'".(time() - (60*60*24*365))."' AND '".(time())."'";
}else{
$fechaB = "1";
}

if(!empty($fechaB)){
if($fechaB!=1){
	if($type=="temas"){
		$fechado=" AND p.fecha BETWEEN ".$fumes;
	}else{
		$fechado=" AND t.fechate BETWEEN ".$fumes;
		}
		
	}
	}
	
	
    $trozos=explode(" ",$q);
  	$numero=count($trozos); 
	
	
	if ($numero==1){
if($type=="temas"){
$_pagi_sql = "SELECT *
	  FROM c_comunidades as p  
	  inner join d_comunidades as c
      on p.categoria=c.id_categoriac
	  inner join c_temas as t
	  on p.idco=t.idcomunid
	  WHERE (titulo LIKE '%$q%' or tagste LIKE '%$q%' or cuerpo LIKE '%$q%') and eliminado='0' ".$fechado." ".$category." ".$cadena_usuario."  ".$cadena_pais."  ".$ORDAR."";
}else{
$_pagi_sql = "SELECT *
	  FROM c_comunidades as p  
	  inner join d_comunidades as c
      on p.categoria=c.id_categoriac
	  WHERE (nombre LIKE '%$q%' or tags LIKE '%$q%' or descripcion LIKE '%$q%')
	   and eliminado='0' ".$fechado." ".$category." ".$cadena_usuario." ".$cadena_pais." ".$ORDAR."";	
}
	}elseif ($numero>1){
		$longi=strlen($q);//cogemos la longitud de la cadena 
		//echo $longi."<br>"; 
		$q[$longi]="$";//finalizamos la cadena 
		$cont=0;//cuenta los caracteres que llevamos leidos 
		$cont2=0; //nos sirve para indicar en que posicion numerica empezara la siguiente cadena 
		$cad=" "; //hay que inicializarlas en blanco, sino sale la palabra "array" 
		$cadena[]=" "; //inicializamos el que va a ser el array de cadenas 
		$ncadenas=0;//cuenta el n&#186; de cadenas, condicionado por el espacio en blanco 
		for($x=0;$x<=$longi;$x++){
	   		if($q[$x]==' ' OR $q[$x]=='$')
			{ //si encuentra espacio en blanco o fin de cadena 
	       		$ncadenas++; //aumentamos el n&#186; de cadenas que vamos creando 
	       		for($y=0;$y<$cont;$y++){ 
	           	$cad[$y]=$q[$y+$cont2];//pasamos a una cadena nueva cada carater 
	       		} 
	       	$cad=ltrim($cad);//eliminamos los posibles espacios en blanco al principio 
	       	$cadena[$ncadenas]=$cad;//pasamos cada cadena creada al final de un array de cadenas 
	       	//echo "cadena buscada: ".$cad."<br>"; 
	       	$cont2+=$cont; 
	       	$cont=0;//ponemos el contador a 0 
	       	$cad=" "; //hay que ponerla en blanco otra vez porque sino quedan caracteres de la ultima cadena que tuvo &#233;sta variable 
	   		} 
	   	//echo $cadena[$ncadenas]; 
	   	$cont++; //aumentamos el contador 
		} 
		//creamos la "super consulta"
		if($type=="temas"){
		$_pagi_sql="SELECT *
	  FROM c_comunidades as p  
	  inner join d_comunidades as c
      on p.categoria=c.id_categoriac
	  inner join c_temas as t
	  on p.idco=t.idcomunid
	  WHERE "; 
		}else{
      $_pagi_sql="SELECT *
	  FROM c_comunidades as p  
	  inner join d_comunidades as c
      on p.categoria=c.id_categoriac
	  WHERE "; 	
			
			}
		for($x=1;$x<=$ncadenas;$x++){
	   	//echo $cadena[$x]; 
		if($type=="temas"){
	   	$_pagi_sql.=" (titulo LIKE '%$cadena[$x]%' or tagste LIKE '%$cadena[$x]%' or cuerpo LIKE '%$cadena[$x]%') AND"; 
		}else{
		$_pagi_sql.=" (nombre LIKE '%$cadena[$x]%' or tags LIKE '%$cadena[$x]%' or descripcion LIKE '%$cadena[$x]%') AND"; 
		}
		//estos son los campos que yo use, puedes poner los que quieras 
		} 
		$longiconsulta=strlen($_pagi_sql);
		$_pagi_sql=substr($_pagi_sql,0,($longiconsulta-3));//esto es para quitarle el ultimo OR 
		if($type=="temas"){
		$_pagi_sql.= " AND elimte='0' ".$fechado." ".$category." ".$cadena_usuario."  ".$cadena_pais."  ".$ORDAR."";//para que haga la ordenacion 
				}else{
		$_pagi_sql.= " AND eliminado='0' ".$fechado." ".$category." ".$cadena_usuario."  ".$cadena_pais."  ".$ORDAR."";//para que haga la ordenacion 
		} 
		$q=substr($q,0,$longi);//para corregir un defecto al finalizar la cadena con $ 
		//echo $buscar; 
		//echo $consulta; 
	}
	
	$_pagi_cuantos = 50;
include("../includes/paginator.inc.php");
	$alltotal=mysql_num_rows($_pagi_result);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="google-site-verification" content="xLzDE9MQcQ5X1skYRVxR21fa1JtYpZqk1kWiN8yBxsQ" />
		<meta name="description" content="El buscador de Taringa! ofrece excelentes resultados ya que permite la integraci&oacute;n de todos los contenidos de Internet junto a la mejor informaci&oacute;n seleccionada y evaluada por nuestra gran comunidad." />
		<link rel="search" type="application/opensearchdescription+xml" title="Taringa! Buscador" href="/opensearch.xml" />
				<link rel="icon" href="/favicon.ico" type="image/x-icon">
				<title><?=$q;?>	- <?=$comunidad;?> Buscador</title>

		<link type="text/css" rel="stylesheet" href="http://www.zincomienzo.net/images/search/estilo.css" />
				
		<script type="text/javascript">
			var global_location = 'comunidades';
		</script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://www.zincomienzo.net/search/search.js?2.1"></script>
		
		<script src="http://www.google.com/jsapi">
		</script>

		<script type="text/javascript" charset="utf-8">
		google.load('ads.search', '2');
		</script>		
		
		<!--[if IE 6]>
		<script src="http://http://o2.t26.net/images/js/DD_belatedPNG_0.0.8a-min.js"></script>
		<script>DD_belatedPNG.fix('*');</script>
		<script src="http://http://o2.t26.net//images/js/bgiframe.js"></script>
		<![endif]-->
	</head>
	<body class="comunidades">
		<div id="wrapper">
		<div id="header" class="clearfix">
	<div class="taringa-bar clearfix">
		<ul class="floatL">
			<li class="tab-search iconos16 tab-home"><a href="<?=$url;?>"><span></span></a></li>

						<li class="tab-search iconos16 tab-web"><a href="/web?q=<?=$q;?>"><span></span> Web</a></li>
						<li class="tab-search iconos16 tab-posts"><a href="/posts?q=<?=$q;?>"><span></span> Posts</a></li>
			<li class="tab-search iconos16 tab-comunidades selected"><a href=""><span></span> Comunidades</a></li>
		</ul>
		

			</div>	
				
	<div class="search clearfix">

		<div id="logo">
			<a href="/">Zincomienzo!</a>
		</div>
		<div class="search-box clearfix">
			<form name="buscar">
				<div class="input-left"></div>			
				<input type="text" name="q" value="<?=$q;?>" />
				<div class="input-right"></div>
				<input type="hidden" name="type" value="temas" />				<div class="btn-search floatL">

					<a href="" onclick="$('form[name=buscar]').submit(); return false"></a>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="container clearfix">
		<div id="sidebar">
		  <div class="filter-box">
		    <h6><a href="#"><span class="iconos16 icon-expand"></span></a>Motor</h6>
		    <ul>
		<li class="clearfix"><a href="/comunidades?type=temas&q=<?=$q;?>"><span>Temas</span></a></li>
		<li class="clearfix"><a class="active" href="/comunidades?type=comunidades&q=<?=$q;?>&sort=3"><span>Comunidades</span></a></li>

	        </ul>
	      </div>
		  
		  <div class="filter-box">
	<h6><a href="#"><span class="iconos16 icon-expand"></span></a> <a href="#">Categor&iacute;a</a></h6>

	<select style="width: 140px" onchange="search.categoria('/comunidades?type=<?=$type;?>&amp;type=temas&q=<?=$q;?>', '<?=$q;?>', this.value)">
		<option selected="selected" value="-1">Todas</option>
				<option value="arte-literatura">Arte y Literatura</option>
				<option value="deportes">Deportes</option>
				<option value="diversion-esparcimiento">Diversi&oacute;n y Esparcimiento</option>
				<option value="economia-negocios">Econom&iacute;a y Negocios</option>

				<option value="entretenimiento-medios">Entretenimiento y Medios</option>
				<option value="grupos-organizaciones">Grupos y Organizaciones</option>
				<option value="interes-general">Inter&eacute;s general</option>
				<option value="internet-tecnologia">Internet y Tecnolog&iacute;a</option>
				<option value="musica-bandas">M&uacute;sica y Bandas</option>

				<option value="regiones">Regiones</option>
			</select>
</div>
<div class="filter-box">
	<h6><a href="#"><span class="iconos16 icon-expand"></span></a> <a href="#">Pa&iacute;s</a></h6>
	<select style="width: 140px" onchange="search.pais('/comunidades?type=temas&q=<?=$q;?>', '<?=$q;?>', this.value)">
		<option selected="selected" value="-1">Todos</option>
				<option value="AF">Afganist&aacute;n</option>

				<option value="AL">Albania</option>
				<option value="DE">Alemania</option>
				<option value="DZ">Argelia</option>
				<option value="AD">Andorra</option>
				<option value="AO">Angola</option>
				<option value="AI">Anguila</option>

				<option value="AG">Antigua y Barbuda</option>
				<option value="AN">Antillas Neerlandesas</option>
				<option value="AQ">Ant&aacute;rtida</option>
				<option value="SA">Arabia Saudita</option>
				<option value="AR">Argentina</option>
				<option value="AM">Armenia</option>

				<option value="AW">Aruba</option>
				<option value="AU">Australia</option>
				<option value="AT">Austria</option>
				<option value="AZ">Azerbaiy&aacute;n</option>
				<option value="BS">Bahamas</option>
				<option value="BH">Bahr&eacute;in</option>

				<option value="BD">Bangladesh</option>
				<option value="BB">Barbados</option>
				<option value="BZ">Belice</option>
				<option value="BJ">Benin</option>
				<option value="BM">Bermudas</option>
				<option value="BY">Bielorrusia</option>

				<option value="BO">Bolivia</option>
				<option value="BA">Bosnia y Herzegovina</option>
				<option value="BW">Botswana</option>
				<option value="BR">Brasil</option>
				<option value="BN">Brun&eacute;i</option>
				<option value="BG">Bulgaria</option>

				<option value="BF">Burkina Faso</option>
				<option value="BI">Burundi</option>
				<option value="BT">But&aacute;n</option>
				<option value="BE">B&eacute;lgica</option>
				<option value="CV">Cabo Verde</option>
				<option value="KH">Camboya</option>

				<option value="CM">Camer&uacute;n</option>
				<option value="CA">Canad&aacute;</option>
				<option value="TD">Chad</option>
				<option value="CL">Chile</option>
				<option value="CN">China</option>
				<option value="CY">Chipre</option>

				<option value="VA">Ciudad del Vaticano</option>
				<option value="CO">Colombia</option>
				<option value="KM">Comoras</option>
				<option value="KP">Corea del Norte</option>
				<option value="KR">Corea del Sur</option>
				<option value="CR">Costa Rica</option>

				<option value="CI">Costa de Marfil</option>
				<option value="HR">Croacia</option>
				<option value="CU">Cuba</option>
				<option value="DK">Dinamarca</option>
				<option value="DM">Dominica</option>
				<option value="EC">Ecuador</option>

				<option value="EG">Egipto</option>
				<option value="SV">El Salvador</option>
				<option value="AE">Emiratos &aacute;rabes Unidos</option>
				<option value="ER">Eritrea</option>
				<option value="SK">Eslovaquia</option>
				<option value="SI">Eslovenia</option>

				<option value="ES">Espa&ntilde;a</option>
				<option value="US">Estados Unidos</option>
				<option value="EE">Estonia</option>
				<option value="ET">Etiop&iacute;a</option>
				<option value="PH">Filipinas</option>
				<option value="FI">Finlandia</option>

				<option value="FJ">Fiyi</option>
				<option value="FR">Francia</option>
				<option value="GA">Gab&oacute;n</option>
				<option value="GM">Gambia</option>
				<option value="GE">Georgia</option>
				<option value="GH">Ghana</option>

				<option value="GI">Gibraltar</option>
				<option value="GD">Granada</option>
				<option value="GR">Grecia</option>
				<option value="GL">Groenlandia</option>
				<option value="GP">Guadalupe</option>
				<option value="GU">Guam</option>

				<option value="GT">Guatemala</option>
				<option value="GF">Guayana Francesa</option>
				<option value="GG">Guernsey</option>
				<option value="GN">Guinea</option>
				<option value="GQ">Guinea Ecuatorial</option>
				<option value="GW">Guinea-Bissau</option>

				<option value="GY">Guyana</option>
				<option value="HT">Hait&iacute;</option>
				<option value="HN">Honduras</option>
				<option value="HK">Hong Kong</option>
				<option value="HU">Hungr&iacute;a</option>
				<option value="IN">India</option>

				<option value="ID">Indonesia</option>
				<option value="IQ">Iraq</option>
				<option value="IE">Irlanda</option>
				<option value="IR">Ir&aacute;n</option>
				<option value="BV">Isla Bouvet</option>
				<option value="IM">Isla de Man</option>

				<option value="CX">Isla de Navidad</option>
				<option value="IS">Islandia</option>
				<option value="KY">Islas Caim&aacute;n</option>
				<option value="CC">Islas Cocos</option>
				<option value="CK">Islas Cook</option>
				<option value="FO">Islas Feroe</option>

				<option value="GS">Islas Georgias del Sur y Sandwich del Sur</option>
				<option value="HM">Islas Heard y McDonald</option>
				<option value="MP">Islas Marianas del Norte</option>
				<option value="MH">Islas Marshall</option>
				<option value="PN">Islas Pitcairn</option>
				<option value="SB">Islas Salom&oacute;n</option>

				<option value="TC">Islas Turcas y Caicos</option>
				<option value="VG">Islas V&iacute;rgenes Brit&aacute;nicas</option>
				<option value="VI">Islas V&iacute;rgenes Estadounidenses</option>
				<option value="UM">Islas ultramarinas de Estados Unidos</option>
				<option value="IL">Israel</option>
				<option value="IT">Italia</option>

				<option value="JM">Jamaica</option>
				<option value="JP">Jap&oacute;n</option>
				<option value="JE">Jersey</option>
				<option value="JO">Jordania</option>
				<option value="KZ">Kazajist&aacute;n</option>
				<option value="KE">Kenia</option>

				<option value="KG">Kirguist&aacute;n</option>
				<option value="KI">Kiribati</option>
				<option value="KW">Kuwait</option>
				<option value="LA">Laos</option>
				<option value="LS">Lesoto</option>
				<option value="LV">Letonia</option>

				<option value="LR">Liberia</option>
				<option value="LY">Libia</option>
				<option value="LI">Liechtenstein</option>
				<option value="LT">Lituania</option>
				<option value="LU">Luxemburgo</option>
				<option value="LB">L&iacute;bano</option>

				<option value="MO">Macao</option>
				<option value="MG">Madagascar</option>
				<option value="MY">Malasia</option>
				<option value="MW">Malaui</option>
				<option value="MV">Maldivas</option>
				<option value="MT">Malta</option>

				<option value="ML">Mal&iacute;</option>
				<option value="MA">Marruecos</option>
				<option value="MQ">Martinica</option>
				<option value="MU">Mauricio</option>
				<option value="MR">Mauritania</option>
				<option value="YT">Mayotte</option>

				<option value="FM">Micronesia</option>
				<option value="MD">Moldavia</option>
				<option value="MN">Mongolia</option>
				<option value="ME">Montenegro</option>
				<option value="MS">Montserrat</option>
				<option value="MZ">Mozambique</option>

				<option value="MM">Myanmar</option>
				<option value="MX">M&eacute;xico</option>
				<option value="MC">M&oacute;naco</option>
				<option value="NA">Namibia</option>
				<option value="NR">Nauru</option>
				<option value="NP">Nepal</option>

				<option value="NI">Nicaragua</option>
				<option value="NE">Niger</option>
				<option value="NG">Nigeria</option>
				<option value="NU">Niue</option>
				<option value="NF">Norfolk</option>
				<option value="NO">Noruega</option>

				<option value="NC">Nueva Caledonia</option>
				<option value="NZ">Nueva Zelanda</option>
				<option value="OM">Om&aacute;n</option>
				<option value="PK">Pakist&aacute;n</option>
				<option value="PW">Palaos</option>
				<option value="PA">Panam&aacute;</option>

				<option value="PG">Pap&uacute;a Nueva Guinea</option>
				<option value="PY">Paraguay</option>
				<option value="NL">Pa&iacute;ses Bajos</option>
				<option value="PE">Per&uacute;</option>
				<option value="PF">Polinesia Francesa</option>
				<option value="PL">Polonia</option>

				<option value="PT">Portugal</option>
				<option value="PR">Puerto Rico</option>
				<option value="QA">Qatar</option>
				<option value="GB">Reino Unido</option>
				<option value="CF">Rep&uacute;blica Centroafricana</option>
				<option value="CZ">Rep&uacute;blica Checa</option>

				<option value="CD">Rep&uacute;blica Democr&aacute;tica del Congo</option>
				<option value="DO">Rep&uacute;blica Dominicana</option>
				<option value="MK">Rep&uacute;blica de Macedonia</option>
				<option value="CG">Rep&uacute;blica del Congo</option>
				<option value="EH">Rep&uacute;blica &aacute;rabe Saharaui Democr&aacute;tica</option>
				<option value="RE">Reuni&oacute;n</option>

				<option value="RW">Ruanda</option>
				<option value="RO">Rumania</option>
				<option value="RU">Rusia</option>
				<option value="MF">Saint-Martin</option>
				<option value="WS">Samoa</option>
				<option value="AS">Samoa Americana</option>

				<option value="BL">San Bartolom&eacute;</option>
				<option value="KN">San Crist&oacute;bal y Nieves</option>
				<option value="SM">San Marino</option>
				<option value="PM">San Pedro y Miquel&oacute;n</option>
				<option value="VC">San Vicente y las Granadinas</option>
				<option value="SH">Santa Helena</option>

				<option value="LC">Santa Luc&iacute;a</option>
				<option value="ST">Sao Tom&eacute; y Principe</option>
				<option value="SN">Senegal</option>
				<option value="RS">Serbia</option>
				<option value="SC">Seychelles</option>
				<option value="SL">Sierra Leona</option>

				<option value="SG">Singapur</option>
				<option value="SY">Siria</option>
				<option value="SO">Somalia</option>
				<option value="LK">Sri Lanka</option>
				<option value="SZ">Suazilandia</option>
				<option value="ZA">Sud&aacute;frica</option>

				<option value="SD">Sud&aacute;n</option>
				<option value="SE">Suecia</option>
				<option value="CH">Suiza</option>
				<option value="SR">Surinam</option>
				<option value="SJ">Svalbard y Jan Mayen</option>
				<option value="TH">Tailandia</option>

				<option value="TW">Taiw&aacute;n</option>
				<option value="TZ">Tanzania</option>
				<option value="TJ">Tayikist&aacute;n</option>
				<option value="IO">Territorio Brit&aacute;nico del Oc&eacute;ano &iacute;ndico</option>
				<option value="TF">Territorios Australes Franceses</option>
				<option value="PS">Territorios palestinos</option>

				<option value="TL">Timor Oriental</option>
				<option value="TG">Togo</option>
				<option value="TK">Tokelau</option>
				<option value="TO">Tonga</option>
				<option value="TT">Trinidad y Tobago</option>
				<option value="TM">Turkmenist&aacute;n</option>

				<option value="TR">Turqu&iacute;a</option>
				<option value="TV">Tuvalu</option>
				<option value="TN">T&uacute;nez</option>
				<option value="UA">Ucrania</option>
				<option value="UG">Uganda</option>
				<option value="UY">Uruguay</option>

				<option value="UZ">Uzbekist&aacute;n</option>
				<option value="VU">Vanuatu</option>
				<option value="VE">Venezuela</option>
				<option value="VN">Vietnam</option>
				<option value="WF">Wallis y Futuna</option>
				<option value="YE">Yemen</option>

				<option value="DJ">Yibuti</option>
				<option value="ZM">Zambia</option>
				<option value="ZW">Zimbabue</option>
			</select>
</div>
<div class="filter-box">
	<h6><a href="#"><span class="iconos16 icon-expand"></span></a> <a href="#">Autor</a></h6>

	<input type="text" style="width: 105px;float:left" value="" autocomplete="off" title="Buscar por Usuario" onkeypress="search.autor_intro(event, '/comunidades?type=temas&q=<?=$q;?>', '<?=$q;?>', this.value, 1)" />
	<input type="button" class="sbutton" value="&raquo;" onclick="search.autor_submit('/comunidades?type=temas&q=<?=$q;?>', '<?=$q;?>', $(this).prev().val(), 1)" />
</div>
	<div class="clearfix clearBoth" style="clear:both"></div>
	</div>
	<div id="results" class="results">
		
<!-- Filters -->
<div class="filters-apply clearfix">
				</div>
<!-- /Filters -->



<!-- Suggest -->
<p class="suggest" style="display:none">
	<span>Quisiste decir:</span> <a href=""></a> ?
</p>
<script type="text/javascript">search.suggest("<?=$q;?>", "<?=$q;?>", "<?=$q;?>", '/buscardor-comunidades.php?type=temas&q=');</script><!-- /Suggest -->

<!-- Sort -->
<div class="filter-bar clearfix">
	<span>Ordenar por:</span>

	<ul>
    	<li <? if($sort==""){echo 'class="selected"';}?>><a href="/comunidades?type=<?=$type;?>&amp;q=<?=$q;?>">Fecha</a></li>
        <? if($type=="temas"){ ?>
        <li <? if($sort=="2"){echo 'class="selected"';}?>><a href="/comunidades?type=temas&amp;q=<?=$q;?>&amp;sort=2">Calificaci&oacute;n</a></li>
		<li <? if($sort=="3"){echo 'class="selected"';}?>><a href="/comunidades?type=temass&amp;q=<?=$q;?>&amp;sort=3">Relevancia</a></li>
          <? }else{ ?>
        <li <? if($sort=="2"){echo 'class="selected"';}?>><a href="/comunidades?type=comunidades&amp;q=<?=$q;?>&amp;sort=2">Miembros</a></li>
		<li <? if($sort=="3"){echo 'class="selected"';}?>><a href="/comunidades?type=comunidades&amp;q=<?=$q;?>&amp;sort=3">Temas</a></li>
                 <? } ?>
	</ul>
	<div class="floatR search-results"><strong><?=$alltotal;?></strong> resultados totales</div>

</div>
<!-- /Sort -->

<!-- Banners -->
<div id="avisosTop"></div>
<!-- /Banners -->

<!-- Result -->
<ol style="display:none">
<?
function Get_Pais($stry){
$paissql= @mysql_query("SELECT * FROM `paises` WHERE `img_pais` = '".$stry."' LIMIT 1");
$ds= @mysql_fetch_array($paissql);
return $ds["nombre_pais"];	
}
function Get_Autor($idUser){
$sql= mysql_query("SELECT *
FROM `usuarios`
WHERE `id` ='".$idUser."'");
$row = mysql_fetch_array($sql);
return $row["nick"];
}
function Get_Favoritos($id){
$sql= mysql_query("SELECT *
FROM `favoritos`
WHERE `id` ='".$id."'");
$row = mysql_num_rows($sql);
return $row;
}
	
if($type=="temas"){
if($alltotal>0){
while($row = mysql_fetch_array($_pagi_result)){
$favorite = Get_Favoritos($row['id']);
?>

	<li class="result-i">
		<h2 title="Inter&eacute;s <?=$row['nom_categoriac'];?>" class="categoriaCom <?=$row['link_categoriac'];?>"><a title="<?=$row['titulo'];?>" href="<?=$url;?>/comunidades/<?=$row['shortname'];?>/<?=$row['idte'];?>/<?=corregir($row['titulo']);?>.html"><?=$row['titulo'];?></a></h2>
		<div class="info" style="font-size:11px">
			<img src="http://o2.t26.net/search/clock.png" alt="Creado"  title="Creado" /> <span title="<?=hace($row['fechate']);?>"><?=hace($row['fechate']);?></span> 
			- <img src="http://o2.t26.net/search/autor.png" alt="Autor"  title="Autor" /> <a style="font-weight:normal"  href="<?=$url;?>/perfil/<?=Get_Autor($row['id_autor']);?>"><?=Get_Autor($row['id_autor']);?></a>

			 en <a style="font-weight:normal" href="<?=$url;?>/comunidades/<?=$row['shortname'];?>/"><?=$row['nombre'];?></a>
			- Calificaci&oacute;n <strong><?=$row['calificacion'];?></strong> 
					</div>
	</li>
<?
}
}else{
?>  	
<div id="resultados" style="width:100%">
	<div class="emptyData">
		
<div class="med">
	<p>No se han encontrado resultados para su b&uacute;squeda.</p>
	<p style="margin-top: 1em;">Sugerencias:</p>
	<ul>
		<li>Comprueba que todas las palabras est&aacute;n escritas correctamente.</li>
		<li>Intenta usar otras palabras.</li>
		<li>Intenta usar palabras m&aacute;s generales.</li>
	</ul>
</div>
	</div>
<?
}
}else{
if($alltotal>0){
while($row = mysql_fetch_array($_pagi_result)){
$favorite = Get_Favoritos($row['id']);
?>
<li class="result-i">
		<h2 title="<?=$row['nom_categoriac'];?>" class="categoriaCom <?=$row['link_categoriac'];?>"><a title="<?=$row['nombre'];?>" href="<?=$url;?>/comunidades/<?=$row['shortname'];?>/"><?=$row['nombre'];?></a></h2>
		<div class="info">
			<p><?=$row['descripcion'];?></p>
			<div style="color: rgb(103, 103, 103); font-size: 11px;">
				<img src="http://o2.t26.net/search/clock.png" alt="Creado" title="Creado"> <span title="<?=hace($row['fecha']);?>"><?=hace($row['fecha']);?></span> 
				 - <img src="http://o2.t26.net/search/autor.png" alt="Autor" title="Autor"> <a href="<?=$url;?>/perfil/<?=Get_Autor($row['creadorid']);?>"><?=Get_Autor($row['creadorid']);?></a> 
- <img class="flag" title="<?=Get_Pais($row['pais']);?>" src="http://o2.t26.net/images/flags/<?=strtolower($row['pais']);?>.png" alt="<?=Get_Pais($row['pais']);?>"> <?=Get_Pais($row['pais']);?>				- <img src="http://o2.t26.net/search/miembros.png" alt="Miembros" title="<?=$row['numm'];?> Miembros"> <?=$row['numm'];?> Miembros 
- <img src="http://o2.t26.net/search/temas.png" alt="Temas" title="8 Temas"> <?=$row['numte'];?> Temas
			</div>
		</div>
	</li>
<?
}
}else{
?>  	
<div id="resultados" style="width:100%">
	<div class="emptyData">
		
<p>No se han encontrado resultados para su b&uacute;squeda.</p>
	<p style="margin-top: 1em;">Sugerencias:</p>
	<ul>
		<li>Comprueba que todas las palabras est&aacute;n escritas correctamente.</li>
		<li>Intenta usar otras palabras.</li>
		<li>Intenta usar palabras m&aacute;s generales.</li>
	</ul>

	</div>
<?
}
}
?> 
</ol>
<!-- Banners -->
<div id="avisosBot"></div>
<!-- /Banners -->
<div class="before floatL">
<?=$_pagi_navegacion;?>
</div>
<!-- Paginado -->
<!-- /Paginado -->
	</div>
		<div id="avisosVert"></div>
</div>	
	
		</div>

	</body>
</html>