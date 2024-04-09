<?php


function xss($get)
{
	$get = htmlspecialchars($get, ENT_QUOTES);
	return $get;
}

# Anti Flood(); creado por timba :D
 /*function Flood()
 {
    # Globalizamos variables:
	$key = $_SESSION['id'];
	# Si falta la session...
	if(!$key) fatal_error("Debes estar logueado para realizar esta operacion.");
	# Tiempo:
	$Tiempo = time() - 60;
	# Querys:
	$Flood = mysql_query("SELECT * FROM usuarios WHERE ultimaaccion2 BETWEEN '$Tiempo' AND unix_timestamp() AND id = '$key'");
	if(!empty(mysql_num_rows($Flood))) fatal_error("No puedes realizar tantas acciones en tan poco tiempo, intentalo en unos instantes...");
	 else
	mysql_query("UPDATE usuarios SET ultimaaccion2 = unix_timestamp() WHERE id = '$key'");
 }
 */
function no_i($entra){
if(get_magic_quotes_gpc()){
$entra = stripslashes($entra);}
return mysql_real_escape_string($entra);}


function actualizarango($usuarion, $rango, $puntos)
{
	if($rango=="11"){
		if($puntos>"49"){
		 mysql_query("UPDATE usuarios SET rango=12 WHERE id=".$usuarion);
	    }
	}
	else if($rango=="12"){
		if($puntos>"999"){
		 mysql_query("UPDATE usuarios SET rango=13 WHERE id=".$usuarion);
	    }
	}
}

function no_injection($string)
{
	if(get_magic_quotes_gpc())
    	$string = stripslashes($string);
	return $string;
}

function contarVisita($post, $ip)
{
	if ($_SESSION['user']!="")
	{
		mysql_query("UPDATE posts SET visitas=visitas+1 WHERE id=".$post);
	}
}

function arreglarpost($texto)
{
	$texto = str_replace("'", "&#39;",$texto);
	return $texto;
}





function quitarrrr($text)
	{
		$text = htmlentities($text, ENT_QUOTES, 'UTF-8');
		$text = strtolower($text);
		$patron = array (
			// Espacios, puntos y comas por guion
//			'/[\., ]+/' => '-',
 
			// Vocales
			'/&agrave;/' => 'a',
			'/&egrave;/' => 'e',
			'/&igrave;/' => 'i',
			'/&ograve;/' => 'o',
			'/&ugrave;/' => 'u',
 
			'/&aacute;/' => 'a',
			'/&eacute;/' => 'e',
			'/&iacute;/' => 'i',
			'/&oacute;/' => 'o',
			'/&uacute;/' => 'u',
 
			'/&acirc;/' => 'a',
			'/&ecirc;/' => 'e',
			'/&icirc;/' => 'i',
			'/&ocirc;/' => 'o',
			'/&ucirc;/' => 'u',
 
			'/&atilde;/' => 'a',
			'/&etilde;/' => 'e',
			'/&itilde;/' => 'i',
			'/&otilde;/' => 'o',
			'/&utilde;/' => 'u',
 
			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
 
			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
 
			// Otras letras y caracteres especiales
			'/&aring;/' => 'a',
			'/&ntilde;/' => 'n',
 
			// Agregar aqui mas caracteres si es necesario
 
		);
 
		$text = preg_replace(array_keys($patron),array_values($patron),$text);
        

		return $text;
	}









function BBparse($texto)
{
   $texto = nl2br($texto);  
   $a = array(
      "/\[b\](.*?)\[\/b\]/is",
      "/\[i\](.*?)\[\/i\]/is",
      "/\[u\](.*?)\[\/u\]/is",
      "/\[hr\]/is",
      "/\[img\](.*?)\[\/img\]/is",
      "/\[img=(.*?)\]/is",
      "/\[align=(.*?)\](.*?)\[\/align\]/is",
	  "/\[url=(.*?)\](.*?)\[\/url\]/is",
	  "/\[url\](.*?)\[\/url\]/is",
   	  "/\[quote=(.*?)\](.*?)/is",
   	  "/\[quote\](.*?)/is",
	  "/\[\/quote\]/is",
   	  "/\[size=(.*?)\](.*?)\[\/size\]/is",
   	  "/\[color=(.*?)\](.*?)\[\/color\]/is",
   	  "/\[font=(.*?)\](.*?)\[\/font\]/is",
	  "/\[swf=http:\/\/www.youtube.com\/v\/(.*?)\]/is",
	  "/\[swf=http:\/\/video.google.com\/googleplayer.swf?docId=(.*?)\]/is",
	  "/\[swf=(.*?)\]/is"
   );
   $b = array(
      "<b>$1</b>",
      "<em>$1</em>",
      "<u>$1</u>",
	  "<hr class=\"divider\">",
      '<img class="imagen" src="$1" border="0">',
      '<img class="imagen" src="$1" border="0">',
	  "<div align=\"$1\">$2</div>",
	  "<a href=\"$1\" target='_blank'>$2</a>",
   	  "<a href=\"$1\" target='_blank'>$1</a>",
   	  "<blockquote><div class=\"cita\"><strong>$1</strong> dijo:</div><div class=\"citacuerpo\"><p>$2</p>",
   	  "<blockquote><div class=\"cita\">Cita :</div><div class=\"citacuerpo\">$1<br>",
	  "</div></blockquote>",
   	  "<span style=\"font-size: $1pt;\">$2</span>",
   	  "<font color=\"$1\">$2</font>",
	  "<font face=\"$1\">$2</font>",
	  "<div align=\"center\"><embed src=\"http://www.youtube.com/v/$1\" quality=high width=\"425\" height=\"350\" TYPE=\"application/x-shockwave-flash\" AllowScriptAccess=\"never\"></embed></div>",
	  "<div align=\"center\"><embed src=\"http://www.youtube.com/v/$1\" quality=high width=\"425\" height=\"350\" TYPE=\"application/x-shockwave-flash\" AllowScriptAccess=\"never\"></embed></div>",
	  '<center><embed src="$1" quality="high" type="application/x-shockwave-flash" allownetworking="internal" allowscriptaccess="never" wmode="transparent" width="425" height="350"></center>'
   );
   	$texto = preg_replace($a, $b, $texto);
	
	$bbcode = array();
	$html = array();
	
	$bbcode[] = ":)"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -288px; clip: rect(286px, 16px, 302px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = "X("; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -420px; clip: rect(418px, 16px, 434px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":cool:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -530px; clip: rect(528px, 16px, 544px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":cry:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -442px; clip: rect(440px, 16px, 456px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":blaf:"; $html[] = '<img src="'.$url.'/images/smiles/blaf.gif">';
	$bbcode[] = ":winky:"; $html[] = '<img src="'.$url.'/images/smiles/winky.gif">';
	$bbcode[] = ":noo:"; $html[] = '<img src="'.$url.'/images/smiles/sad2.gif">';
	$bbcode[] = ":twisted:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -464px; clip: rect(462px, 16px, 478px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = "^^"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -574px; clip: rect(572px, 16px, 588px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":|"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -486px; clip: rect(484px, 16px, 500px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":D"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -376px; clip: rect(374px, 16px, 390px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":oops:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -552px; clip: rect(550px, 16px, 566px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":?"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -508px; clip: rect(506px, 16px, 522px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":F"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -618px; clip: rect(616px, 16px, 632px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":("; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -398px; clip: rect(396px, 16px, 412px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":P"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -354px; clip: rect(352px, 16px, 368px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":roll:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -332px; clip: rect(330px, 16px, 346px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ";)"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -310px; clip: rect(308px, 16px, 324px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":crying:"; $html[] = '<img src="'.$url.'/images/smiles/cry.gif">';
	$bbcode[] = ":bobo:"; $html[] = '<img src="'.$url.'/images/smiles/bobo.gif">';
	$bbcode[] = ":grin:"; $html[] = '<img src="'.$url.'/images/smiles/grin.gif">';
	$bbcode[] = ":alaba:"; $html[] = '<img src="'.$url.'/images/smiles/alabama.gif" />';
	$bbcode[] = ":lpmqtp:"; $html[] = '<img src="'.$url.'/images/smiles/lpmqtp.gif" />';
	$bbcode[] = ":idiot:"; $html[] = '<img src="'.$url.'/images/smiles/idiot.gif" />';
	$bbcode[] = ":shrug:"; $html[] = '<img src="'.$url.'/images/smiles/shrug.gif" />';
	$bbcode[] = ":unsure:"; $html[] = '<img src="'.$url.'/images/smiles/unsure.gif">';
	$bbcode[] = ":8S:"; $html[] = '<img src="'.$url.'/images/smiles/8s.gif">';
	$bbcode[] = ":]"; $html[] = '<img src="'.$url.'/images/smiles/5.gif">';
	$bbcode[] = ":blind:"; $html[] = '<img src="'.$url.'/images/smiles/15.gif">';
	$bbcode[] = ":buaa:"; $html[] = '<img src="'.$url.'/images/smiles/17.gif">';
	$bbcode[] = ":cold:"; $html[] = '<img src="'.$url.'/images/smiles/cold.gif">';
	$bbcode[] = ":hot:"; $html[] = '<img src="'.$url.'/images/smiles/hot.gif">';
	$bbcode[] = ":love:"; $html[] = '<img src="'.$url.'/images/smiles/love.gif">';
	$bbcode[] = ":globo:"; $html[] = '<img src="'.$url.'/images/smiles/globo.gif">';
	$bbcode[] = ":zombie:"; $html[] = '<img src="'.$url.'/images/smiles/zombie.gif">';
	$bbcode[] = ":man:"; $html[] = '<img src="'.$url.'/images/smiles/pacman.gif">';
	$bbcode[] = ":metal:"; $html[] = '<img src="'.$url.'/images/smiles/metal.gif">';
	$bbcode[] = ":mario:"; $html[] = '<img src="'.$url.'/images/smiles/mario.gif">';
	$bbcode[] = ":info:"; $html[] = '<img src="'.$url.'/images/smiles/i.gif">';
	$bbcode[] = ":exc:"; $html[] = '<img src="'.$url.'/images/smiles/exclamacion.gif">';
	$bbcode[] = ":q:"; $html[] = '<img src="'.$url.'/images/smiles/pregunta.gif">';
	$bbcode[] = ":NO:"; $html[] = '<img src="'.$url.'/images/smiles/no.gif">';
	$bbcode[] = ":OK:"; $html[] = '<img src="'.$url.'/images/smiles/ok.gif">';
	$bbcode[] = ":WOW:"; $html[] = '<img src="'.$url.'/images/smiles/wow.gif">';
	$bbcode[] = ":LOL:"; $html[] = '<img src="'.$url.'/images/smiles/lol.gif">';
	$bbcode[] = ":oo:"; $html[] = '<img src="'.$url.'/images/smiles/papel.gif">';
	$bbcode[] = ":RIP:"; $html[] = '<img src="'.$url.'/images/smiles/rip.gif">';
	$bbcode[] = ":alien:"; $html[] = '<img src="'.$url.'/images/smiles/koe.gif">';
	$bbcode[] = ":trago:"; $html[] = '<img src="'.$url.'/images/smiles/106.gif">';
	$bbcode[] = ":money:"; $html[] = '<img src="'.$url.'/images/smiles/dolar.gif">';
	$bbcode[] = ":culo:"; $html[] = '<img src="'.$url.'/images/smiles/culo.gif">';
	$bbcode[] = ":auto:"; $html[] = '<img src="'.$url.'/images/smiles/car.gif">';
	$bbcode[] = ":lala:"; $html[] = '<img src="'.$url.'/images/smiles/mobe.gif">';
	$bbcode[] = ":fantasma:"; $html[] = '<img src="'.$url.'/images/smiles/fantasma.gif">';
	$bbcode[] = ":buenpost:"; $html[] = '<img src="'.$url.'/images/smiles/buenpost.gif">';
	$bbcode[] = ":GET A LIFE:"; $html[] = '<img src="'.$url.'/images/smiles/getalife.gif">';
	$bbcode[] = ":headbang:"; $html[] = '<img src="'.$url.'/images/smiles/bang.gif">';
	$bbcode[] = ":limon:"; $html[] = '<img src="'.$url.'/images/smiles/limoon.gif">';
	$bbcode[] = ":EEE:"; $html[] = '<img src="'.$url.'/images/smiles/ee.png">';
	$bbcode[] = ":daleee:"; $html[] = '<img src="'.$url.'/images/smiles/dale.gif">';
	$bbcode[] = ":WTF:"; $html[] = '<img src="'.$url.'/images/smiles/wtf.gif">';
	$bbcode[] = ":verde:"; $html[] = '<img src="'.$url.'/images/smiles/verde.gif">';
	$bbcode[] = "8|"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -596px; clip: rect(594px, 16px, 610px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":E"; $html[] = '<img src="'.$url.'/images/E.png">';
        $texto = str_replace($bbcode, $html, $texto);
   



	$texto = str_replace("22web","******", $texto);
	$texto = str_replace("10001mb","******", $texto);
	$texto = str_replace("byethost.com","******", $texto);
	$texto = str_replace("byethost","******", $texto);
	$texto = str_replace("66ghz","******", $texto);
        $texto = str_replace("totalh","******", $texto);
	$texto = str_replace("skynet","*****", $texto);
	$texto = str_replace("Turinga","******", $texto);
        $texto = str_replace("turinga", "****", $texto);
        $texto = str_replace("Lockerz.com", "******", $texto);

	$texto = str_replace("zinfinal","******", $texto);
	$texto = str_replace("ZinFinal","******", $texto);
	$texto = str_replace("Spirate","******", $texto);
	$texto = str_replace("tripiante","***", $texto);
	$texto = str_replace("small pirate","******", $texto);
	$texto = str_replace("smallpirate","******", $texto);
	$texto = str_replace("Small Pirate","******", $texto);
	$texto = str_replace("SmallPirate","******", $texto);
	$texto = str_replace("puto","******", $texto);
	$texto = str_replace("tripiante","*******", $texto);
	$texto = str_replace("pendejo","******", $texto);
	$texto = str_replace("isgreat.org","********", $texto);
	$texto = str_replace("isgreat","******", $texto);
	$texto = str_replace(".es.tl","******", $texto);
	$texto = str_replace(".co.cc","******", $texto);
	$texto = str_replace("TARINGA","****", $texto);
	$texto = str_replace("Taringueros","Zincomienzeros", $texto);
	$texto = str_replace(".c c","****", $texto);
	$texto = str_replace("warez","****", $texto);
	$texto = str_replace(". c o","****", $texto);
	$texto = str_replace(". c c","****", $texto);
	$texto = str_replace(". t k","****", $texto);
	$texto = str_replace("taringueros","Zincomienzeros", $texto);
	$texto = str_replace(".t k","****", $texto);
	$texto = str_replace("ZINLIMITE","****", $texto);
	$texto = str_replace("zinlimite","****", $texto);

        $texto = str_replace("talk4fun","******", $texto);
        $texto = str_replace("#"," ", $texto);
	$texto = str_replace("linkhide","******", $texto);
	$texto = str_replace("freepremiumz","******", $texto);
	$texto = str_replace("iblogger","******", $texto);
	$texto = str_replace("2kool4u","******", $texto);
	$texto = str_replace("v-junker","******", $texto);
	$texto = str_replace("spirate","******", $texto);
	$texto = str_replace("SKYNET","******", $texto);
	$texto = str_replace("emascotas","******", $texto);
	$texto = str_replace("tinyurl","******", $texto);
        $texto = str_replace("Lockerz", "******", $texto);
        $texto = str_replace("lokerz", "******", $texto);
        $texto = str_replace("http://taringa.net", "******", $texto);
        $texto = str_replace("http://www.lockerz.com", "******", $texto);
        $texto = str_replace("lockerz.com", "******", $texto);
        $texto = str_replace('[tu]', ($_SESSION['id']!=null ? $_SESSION['user'] : 'visitante'), $texto);
    














return $texto;
}






function mpcontenido($texto)
{
 
   $a = array(
      "/\[b\](.*?)\[\/b\]/is",
      "/\[i\](.*?)\[\/i\]/is",
      "/\[u\](.*?)\[\/u\]/is",
      "/\[hr\]/is",
      "/\[img\](.*?)\[\/img\]/is",
      "/\[img=(.*?)\]/is",
      "/\[align=(.*?)\](.*?)\[\/align\]/is",
	  "/\[url=(.*?)\](.*?)\[\/url\]/is",
	  "/\[url\](.*?)\[\/url\]/is",
   	  "/\[quote=(.*?)\](.*?)/is",
   	  "/\[quote\](.*?)/is",
	  "/\[\/quote\]/is",
   	  "/\[size=(.*?)\](.*?)\[\/size\]/is",
   	  "/\[color=(.*?)\](.*?)\[\/color\]/is",
   	  "/\[font=(.*?)\](.*?)\[\/font\]/is",
	  "/\[swf=http:\/\/www.youtube.com\/v\/(.*?)\]/is",
	  "/\[swf=http:\/\/video.google.com\/googleplayer.swf?docId=(.*?)\]/is",
	  "/\[swf=(.*?)\]/is"
   );
   $b = array(
      "<b>$1</b>",
      "<em>$1</em>",
      "<u>$1</u>",
	  "<hr class=\"divider\">",
      '<img class="imagen" src="$1" border="0" widht="50" height="50">',
      '<img class="imagen" src="$1" border="0" widht="50" height="50">',
	  "<div align=\"$1\">$2</div>",
	  "<a href=\"$1\" target='_blank'>$2</a>",
   	  "<a href=\"$1\" target='_blank'>$1</a>",
   	  "<blockquote><div class=\"cita\"><strong>$1</strong> dijo:</div><div class=\"citacuerpo\"><p>$2</p>",
   	  "<blockquote><div class=\"cita\">Cita :</div><div class=\"citacuerpo\">$1<br>",
	  "</div></blockquote>",
   	  "<span style=\"font-size: $1pt;\">$2</span>",
   	  "<font color=\"$1\">$2</font>",
	  "<font face=\"$1\">$2</font>",
	  "<div align=\"center\"><embed src=\"http://www.youtube.com/v/$1\" quality=high width=\"425\" height=\"350\" TYPE=\"application/x-shockwave-flash\" AllowScriptAccess=\"never\"></embed></div>",
	  "<div align=\"center\"><embed src=\"http://www.youtube.com/v/$1\" quality=high width=\"425\" height=\"350\" TYPE=\"application/x-shockwave-flash\" AllowScriptAccess=\"never\"></embed></div>",
	  '<center><embed src="$1" quality="high" type="application/x-shockwave-flash" allownetworking="internal" allowscriptaccess="never" wmode="transparent" width="425" height="350"></center>'
   );
   	$texto = preg_replace($a, $b, $texto);
	
	$bbcode = array();
	$html = array();
	
	$bbcode[] = ":)"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -288px; clip: rect(286px, 16px, 302px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = "X("; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -420px; clip: rect(418px, 16px, 434px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":cool:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -530px; clip: rect(528px, 16px, 544px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":cry:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -442px; clip: rect(440px, 16px, 456px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":blaf:"; $html[] = '<img src="'.$url.'/images/smiles/blaf.gif">';
	$bbcode[] = ":winky:"; $html[] = '<img src="'.$url.'/images/smiles/winky.gif">';
	$bbcode[] = ":noo:"; $html[] = '<img src="'.$url.'/images/smiles/sad2.gif">';
	$bbcode[] = ":twisted:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -464px; clip: rect(462px, 16px, 478px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = "^^"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -574px; clip: rect(572px, 16px, 588px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":|"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -486px; clip: rect(484px, 16px, 500px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":D"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -376px; clip: rect(374px, 16px, 390px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":oops:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -552px; clip: rect(550px, 16px, 566px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":?"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -508px; clip: rect(506px, 16px, 522px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":F"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -618px; clip: rect(616px, 16px, 632px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":("; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -398px; clip: rect(396px, 16px, 412px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":P"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -354px; clip: rect(352px, 16px, 368px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":roll:"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -332px; clip: rect(330px, 16px, 346px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ";)"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -310px; clip: rect(308px, 16px, 324px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$bbcode[] = ":crying:"; $html[] = '<img src="'.$url.'/images/smiles/cry.gif">';
	$bbcode[] = ":bobo:"; $html[] = '<img src="'.$url.'/images/smiles/bobo.gif">';
	$bbcode[] = ":grin:"; $html[] = '<img src="'.$url.'/images/smiles/grin.gif">';
	$bbcode[] = ":alaba:"; $html[] = '<img src="'.$url.'/images/smiles/alabama.gif" />';
	$bbcode[] = ":lpmqtp:"; $html[] = '<img src="'.$url.'/images/smiles/lpmqtp.gif" />';
	$bbcode[] = ":idiot:"; $html[] = '<img src="'.$url.'/images/smiles/idiot.gif" />';
	$bbcode[] = ":shrug:"; $html[] = '<img src="'.$url.'/images/smiles/shrug.gif" />';
	$bbcode[] = ":unsure:"; $html[] = '<img src="'.$url.'/images/smiles/unsure.gif">';
	$bbcode[] = ":8S:"; $html[] = '<img src="'.$url.'/images/smiles/8s.gif">';
	$bbcode[] = ":]"; $html[] = '<img src="'.$url.'/images/smiles/5.gif">';
	$bbcode[] = ":blind:"; $html[] = '<img src="'.$url.'/images/smiles/15.gif">';
	$bbcode[] = ":buaa:"; $html[] = '<img src="'.$url.'/images/smiles/17.gif">';
	$bbcode[] = ":cold:"; $html[] = '<img src="'.$url.'/images/smiles/cold.gif">';
	$bbcode[] = ":hot:"; $html[] = '<img src="'.$url.'/images/smiles/hot.gif">';
	$bbcode[] = ":love:"; $html[] = '<img src="'.$url.'/images/smiles/love.gif">';
	$bbcode[] = ":globo:"; $html[] = '<img src="'.$url.'/images/smiles/globo.gif">';
	$bbcode[] = ":zombie:"; $html[] = '<img src="'.$url.'/images/smiles/zombie.gif">';
	$bbcode[] = ":man:"; $html[] = '<img src="'.$url.'/images/smiles/pacman.gif">';
	$bbcode[] = ":metal:"; $html[] = '<img src="'.$url.'/images/smiles/metal.gif">';
	$bbcode[] = ":mario:"; $html[] = '<img src="'.$url.'/images/smiles/mario.gif">';
	$bbcode[] = ":info:"; $html[] = '<img src="'.$url.'/images/smiles/i.gif">';
	$bbcode[] = ":exc:"; $html[] = '<img src="'.$url.'/images/smiles/exclamacion.gif">';
	$bbcode[] = ":q:"; $html[] = '<img src="'.$url.'/images/smiles/pregunta.gif">';
	$bbcode[] = ":NO:"; $html[] = '<img src="'.$url.'/images/smiles/no.gif">';
	$bbcode[] = ":OK:"; $html[] = '<img src="'.$url.'/images/smiles/ok.gif">';
	$bbcode[] = ":WOW:"; $html[] = '<img src="'.$url.'/images/smiles/wow.gif">';
	$bbcode[] = ":LOL:"; $html[] = '<img src="'.$url.'/images/smiles/lol.gif">';
	$bbcode[] = ":oo:"; $html[] = '<img src="'.$url.'/images/smiles/papel.gif">';
	$bbcode[] = ":RIP:"; $html[] = '<img src="'.$url.'/images/smiles/rip.gif">';
	$bbcode[] = ":alien:"; $html[] = '<img src="'.$url.'/images/smiles/koe.gif">';
	$bbcode[] = ":trago:"; $html[] = '<img src="'.$url.'/images/smiles/106.gif">';
	$bbcode[] = ":money:"; $html[] = '<img src="'.$url.'/images/smiles/dolar.gif">';
	$bbcode[] = ":culo:"; $html[] = '<img src="'.$url.'/images/smiles/culo.gif">';
	$bbcode[] = ":auto:"; $html[] = '<img src="'.$url.'/images/smiles/car.gif">';
	$bbcode[] = ":lala:"; $html[] = '<img src="'.$url.'/images/smiles/mobe.gif">';
	$bbcode[] = ":fantasma:"; $html[] = '<img src="'.$url.'/images/smiles/fantasma.gif">';
	$bbcode[] = ":buenpost:"; $html[] = '<img src="'.$url.'/images/smiles/buenpost.gif">';
	$bbcode[] = ":GET A LIFE:"; $html[] = '<img src="'.$url.'/images/smiles/getalife.gif">';
	$bbcode[] = ":headbang:"; $html[] = '<img src="'.$url.'/images/smiles/bang.gif">';
	$bbcode[] = ":limon:"; $html[] = '<img src="'.$url.'/images/smiles/limoon.gif">';
	$bbcode[] = ":EEE:"; $html[] = '<img src="'.$url.'/images/smiles/ee.png">';
	$bbcode[] = ":daleee:"; $html[] = '<img src="'.$url.'/images/smiles/dale.gif">';
	$bbcode[] = ":WTF:"; $html[] = '<img src="'.$url.'/images/smiles/wtf.gif">';
	$bbcode[] = ":verde:"; $html[] = '<img src="'.$url.'/images/smiles/verde.gif">';
	$bbcode[] = "8|"; $html[] = '<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -596px; clip: rect(594px, 16px, 610px, 0px);"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 12px;"></span>';
	$texto = str_replace($bbcode, $html, $texto);
	

return $texto;
}






















function reco_titulo($texto){
	$texto = str_replace(' ','+',$texto);
	return $texto;
}

function corregir($arreglo)
{
$arreglo = str_replace("<","&lt;",$arreglo);
$arreglo = str_replace(">","&gt;",$arreglo);
$arreglo = str_replace("\'","'",$arreglo);
$arreglo = str_replace('\"',"&quot;",$arreglo);
$arreglo = str_replace("\\\\","\\",$arreglo);
$arreglo = str_replace(" ","-",$arreglo);
$arreglo = str_replace("?","",$arreglo);
$arreglo = str_replace("%","",$arreglo);
$arreglo = str_replace("/","",$arreglo);
return $arreglo;
}


function centitulo($texto)
{
$censura = array();

$sql = mysql_query("SELECT * FROM censura");

while($fila = mysql_fetch_array($sql))
$censura[] = $fila['palabra'];

return str_ireplace($censura, '******', $texto);
}


function code($cadena){
if(preg_match_all("/\[code\](.*)\[\/code\]+/is", $cadena, $arrays)){

$txt1 = explode('[code]', $cadena);
$txt2 = explode('[/code]', $cadena);

$code = implode('', $arrays[1]);

echo nl2br($txt1[0]);str_replace($code, highlight_string(htmlspecialchars_decode($code)), $cadena);echo nl2br($txt2[1]);}

else return $texto = nl2br($cadena);
}


function mencion($cadena){
if(!preg_match_all('/@([a-zA-Z0-9_-]+)(?:by_jony)?/is', $cadena, $arrays))  //HECHO POR JONY
return $cadena;

$datos = implode("', '", $arrays[1]);

$usuarios = array();

$sql = mysql_query("SELECT * FROM usuarios WHERE nick IN ('$datos')");
while($fila = mysql_fetch_array($sql))

$usuarios[] = array(
'nick' => $fila['nick'], 
'id' => $fila['id'], 
'avatar' => $fila['avatar'],
'rango' => $fila['rango'],
'pais' => $fila['pais']);


foreach($usuarios as $perfil){

$cadena = str_ireplace('@'.$perfil['nick'], '<a href="/perfil/'.$perfil['nick'].'" data-hovercard="'.$perfil['id'].';'.$perfil['nick'].';'.rngo($perfil['rango']).';'.$pais.';'.strtolower($perfil['pais']).';0;'.$perfil['avatar'].'" class="hovercard">@'.$perfil['nick'].'</a>', $cadena);}


return $cadena;

}


function quitar($mensaje)
{
	$mensaje = str_replace("<","&lt;",$mensaje);
	$mensaje = str_replace(">","&gt;",$mensaje);
	$mensaje = str_replace("\'","'",$mensaje);
	$mensaje = str_replace('\"',"&quot;",$mensaje);
	$mensaje = str_replace("\\\\","\\",$mensaje);
	return $mensaje;
}

function pais($valor)
{
							$valor = str_replace("AF", "Afganist&aacute;n", $valor);
							$valor = str_replace("AL", "Albania", $valor);
							$valor = str_replace("DE", "Alemania", $valor);
							$valor = str_replace("DZ", "Argelia", $valor);

							$valor = str_replace("AD", "Andorra", $valor);
							$valor = str_replace("AO", "Angola", $valor);
							$valor = str_replace("AI", "Anguila", $valor);
							$valor = str_replace("AG", "Antigua y Barbuda", $valor);
							$valor = str_replace("AN", "Antillas Neerlandesas", $valor);
							$valor = str_replace("AQ", "Ant&aacute;rtida", $valor);

							$valor = str_replace("SA", "Arabia Saudita", $valor);
							$valor = str_replace("AR", "Argentina", $valor);
							$valor = str_replace("AM", "Armenia", $valor);
							$valor = str_replace("AW", "Aruba", $valor);
							$valor = str_replace("AU", "Australia", $valor);
							$valor = str_replace("AT", "Austria", $valor);

							$valor = str_replace("AZ", "Azerbaiy&aacute;n", $valor);
							$valor = str_replace("BS", "Bahamas", $valor);
							$valor = str_replace("BH", "Bahr&eacute;in", $valor);
							$valor = str_replace("BD", "Bangladesh", $valor);
							$valor = str_replace("BB", "Barbados", $valor);
							$valor = str_replace("BZ", "Belice", $valor);

							$valor = str_replace("BJ", "Benin", $valor);
							$valor = str_replace("BM", "Bermudas", $valor);
							$valor = str_replace("BY", "Bielorrusia", $valor);
							$valor = str_replace("BO", "Bolivia", $valor);
							$valor = str_replace("BA", "Bosnia y Herzegovina", $valor);
							$valor = str_replace("BW", "Botswana", $valor);

							$valor = str_replace("BR", "Brasil", $valor);
							$valor = str_replace("BN", "Brun&eacute;i", $valor);
							$valor = str_replace("BG", "Bulgaria", $valor);
							$valor = str_replace("BF", "Burkina Faso", $valor);
							$valor = str_replace("BI", "Burundi", $valor);
							$valor = str_replace("BT", "But&aacute;n", $valor);

							$valor = str_replace("BE", "B&eacute;lgica", $valor);
							$valor = str_replace("CV", "Cabo Verde", $valor);
							$valor = str_replace("KH", "Camboya", $valor);
							$valor = str_replace("CM", "Camer&uacute;n", $valor);
							$valor = str_replace("CA", "Canad&aacute;", $valor);
							$valor = str_replace("TD", "Chad", $valor);

							$valor = str_replace("CL", "Chile", $valor);
							$valor = str_replace("CN", "China", $valor);
							$valor = str_replace("CY", "Chipre", $valor);
							$valor = str_replace("VA", "Ciudad del Vaticano", $valor);
							$valor = str_replace("CO", "Colombia", $valor);
							$valor = str_replace("KM", "Comoras", $valor);

							$valor = str_replace("KP", "Corea del Norte", $valor);
							$valor = str_replace("KR", "Corea del Sur", $valor);
							$valor = str_replace("CR", "Costa Rica", $valor);
							$valor = str_replace("CI", "Costa de Marfil", $valor);
							$valor = str_replace("HR", "Croacia", $valor);
							$valor = str_replace("CU", "Cuba", $valor);

							$valor = str_replace("DK", "Dinamarca", $valor);
							$valor = str_replace("DM", "Dominica", $valor);
							$valor = str_replace("EC", "Ecuador", $valor);
							$valor = str_replace("EG", "Egipto", $valor);
							$valor = str_replace("SV", "El Salvador", $valor);
							$valor = str_replace("AE", "Emiratos &Aacute;rabes Unidos", $valor);

							$valor = str_replace("ER", "Eritrea", $valor);
							$valor = str_replace("SK", "Eslovaquia", $valor);
							$valor = str_replace("SI", "Eslovenia", $valor);
							$valor = str_replace("ES", "Espa&ntilde;a", $valor);
							$valor = str_replace("US", "Estados Unidos", $valor);
							$valor = str_replace("EE", "Estonia", $valor);

							$valor = str_replace("ET", "Etiop&iacute;a", $valor);
							$valor = str_replace("PH", "Filipinas", $valor);
							$valor = str_replace("FI", "Finlandia", $valor);
							$valor = str_replace("FJ", "Fiyi", $valor);
							$valor = str_replace("FR", "Francia", $valor);
							$valor = str_replace("GA", "Gab&oacute;n", $valor);

							$valor = str_replace("GM", "Gambia", $valor);
							$valor = str_replace("GE", "Georgia", $valor);
							$valor = str_replace("GH", "Ghana", $valor);
							$valor = str_replace("GI", "Gibraltar", $valor);
							$valor = str_replace("GD", "Granada", $valor);
							$valor = str_replace("GR", "Grecia", $valor);

							$valor = str_replace("GL", "Groenlandia", $valor);
							$valor = str_replace("GP", "Guadalupe", $valor);
							$valor = str_replace("GU", "Guam", $valor);
							$valor = str_replace("GT", "Guatemala", $valor);
							$valor = str_replace("GF", "Guayana Francesa", $valor);
							$valor = str_replace("GG", "Guernsey", $valor);

							$valor = str_replace("GN", "Guinea", $valor);
							$valor = str_replace("GQ", "Guinea Ecuatorial", $valor);
							$valor = str_replace("GW", "Guinea-Bissau", $valor);
							$valor = str_replace("GY", "Guyana", $valor);
							$valor = str_replace("HT", "Hait&iacute;", $valor);
							$valor = str_replace("HN", "Honduras", $valor);

							$valor = str_replace("HK", "Hong Kong", $valor);
							$valor = str_replace("HU", "Hungr&iacute;a", $valor);
							$valor = str_replace("IN", "India", $valor);
							$valor = str_replace("ID", "Indonesia", $valor);
							$valor = str_replace("IQ", "Iraq", $valor);
							$valor = str_replace("IE", "Irlanda", $valor);

							$valor = str_replace("IR", "Ir&aacute;n", $valor);
							$valor = str_replace("BV", "Isla Bouvet", $valor);
							$valor = str_replace("IM", "Isla de Man", $valor);
							$valor = str_replace("CX", "Isla de Navidad", $valor);
							$valor = str_replace("IS", "Islandia", $valor);
							$valor = str_replace("KY", "Islas Caim&aacute;n", $valor);

							$valor = str_replace("CC", "Islas Cocos", $valor);
							$valor = str_replace("CK", "Islas Cook", $valor);
							$valor = str_replace("FO", "Islas Feroe", $valor);
							$valor = str_replace("GS", "Islas Georgias del Sur y Sandwich del Sur", $valor);
							$valor = str_replace("HM", "Islas Heard y McDonald", $valor);
							$valor = str_replace("MP", "Islas Marianas del Norte", $valor);

							$valor = str_replace("MH", "Islas Marshall", $valor);
							$valor = str_replace("PN", "Islas Pitcairn", $valor);
							$valor = str_replace("SB", "Islas Salom&oacute;n", $valor);
							$valor = str_replace("TC", "Islas Turcas y Caicos", $valor);
							$valor = str_replace("VG", "Islas V&iacute;rgenes Brit&aacute;nicas", $valor);
							$valor = str_replace("VI", "Islas V&iacute;rgenes Estadounidenses", $valor);

							$valor = str_replace("UM", "Islas ultramarinas de Estados Unidos", $valor);
							$valor = str_replace("IL", "Israel", $valor);
							$valor = str_replace("IT", "Italia", $valor);
							$valor = str_replace("JM", "Jamaica", $valor);
							$valor = str_replace("JP", "Jap&oacute;n", $valor);
							$valor = str_replace("JE", "Jersey", $valor);

							$valor = str_replace("JO", "Jordania", $valor);
							$valor = str_replace("KZ", "Kazajist&aacute;n", $valor);
							$valor = str_replace("KE", "Kenia", $valor);
							$valor = str_replace("KG", "Kirguist&aacute;n", $valor);
							$valor = str_replace("KI", "Kiribati", $valor);
							$valor = str_replace("KW", "Kuwait", $valor);

							$valor = str_replace("LA", "Laos", $valor);
							$valor = str_replace("LS", "Lesoto", $valor);
							$valor = str_replace("LV", "Letonia", $valor);
							$valor = str_replace("LR", "Liberia", $valor);
							$valor = str_replace("LY", "Libia", $valor);
							$valor = str_replace("LI", "Liechtenstein", $valor);

							$valor = str_replace("LT", "Lituania", $valor);
							$valor = str_replace("LU", "Luxemburgo", $valor);
							$valor = str_replace("LB", "L&iacute;bano", $valor);
							$valor = str_replace("MO", "Macao", $valor);
							$valor = str_replace("MG", "Madagascar", $valor);
							$valor = str_replace("MY", "Malasia", $valor);

							$valor = str_replace("MW", "Malaui", $valor);
							$valor = str_replace("MV", "Maldivas", $valor);
							$valor = str_replace("MT", "Malta", $valor);
							$valor = str_replace("ML", "Mal&iacute;", $valor);
							$valor = str_replace("MA", "Marruecos", $valor);
							$valor = str_replace("MQ", "Martinica", $valor);

							$valor = str_replace("MU", "Mauricio", $valor);
							$valor = str_replace("MR", "Mauritania", $valor);
							$valor = str_replace("YT", "Mayotte", $valor);
							$valor = str_replace("FM", "Micronesia", $valor);
							$valor = str_replace("MD", "Moldavia", $valor);
							$valor = str_replace("MN", "Mongolia", $valor);

							$valor = str_replace("ME", "Montenegro", $valor);
							$valor = str_replace("MS", "Montserrat", $valor);
							$valor = str_replace("MZ", "Mozambique", $valor);
							$valor = str_replace("MM", "Myanmar", $valor);
							$valor = str_replace("MX", "M&eacute;xico", $valor);
							$valor = str_replace("MC", "M&oacute;naco", $valor);

							$valor = str_replace("NA", "Namibia", $valor);
							$valor = str_replace("NR", "Nauru", $valor);
							$valor = str_replace("NP", "Nepal", $valor);
							$valor = str_replace("NI", "Nicaragua", $valor);
							$valor = str_replace("NE", "Niger", $valor);
							$valor = str_replace("NG", "Nigeria", $valor);

							$valor = str_replace("NU", "Niue", $valor);
							$valor = str_replace("NF", "Norfolk", $valor);
							$valor = str_replace("NO", "Noruega", $valor);
							$valor = str_replace("NC", "Nueva Caledonia", $valor);
							$valor = str_replace("NZ", "Nueva Zelanda", $valor);
							$valor = str_replace("OM", "Om&aacute;n", $valor);

							$valor = str_replace("PK", "Pakist&aacute;n", $valor);
							$valor = str_replace("PW", "Palaos", $valor);
							$valor = str_replace("PA", "Panam&aacute;", $valor);
							$valor = str_replace("PG", "Pap&uacute;a Nueva Guinea", $valor);
							$valor = str_replace("PY", "Paraguay", $valor);
							$valor = str_replace("NL", "Pa&iacute;ses Bajos", $valor);

							$valor = str_replace("PE", "Per&uacute;", $valor);
							$valor = str_replace("PF", "Polinesia Francesa", $valor);
							$valor = str_replace("PL", "Polonia", $valor);
							$valor = str_replace("PT", "Portugal", $valor);
							$valor = str_replace("PR", "Puerto Rico", $valor);
							$valor = str_replace("QA", "Qatar", $valor);

							$valor = str_replace("GB", "Reino Unido", $valor);
							$valor = str_replace("CF", "Rep&uacute;blica Centroafricana", $valor);
							$valor = str_replace("CZ", "Rep&uacute;blica Checa", $valor);
							$valor = str_replace("CD", "Rep&uacute;blica Democr&aacute;tica del Congo", $valor);
							$valor = str_replace("DO", "Rep&uacute;blica Dominicana", $valor);
							$valor = str_replace("MK", "Rep&uacute;blica de Macedonia", $valor);

							$valor = str_replace("CG", "Rep&uacute;blica del Congo", $valor);
							$valor = str_replace("EH", "Rep&uacute;blica &Aacute;rabe Saharaui Democr&aacute;tica", $valor);
							$valor = str_replace("RE", "Reuni&oacute;n", $valor);
							$valor = str_replace("RW", "Ruanda", $valor);
							$valor = str_replace("RO", "Rumania", $valor);
							$valor = str_replace("RU", "Rusia", $valor);

							$valor = str_replace("MF", "Saint-Martin", $valor);
							$valor = str_replace("WS", "Samoa", $valor);
							$valor = str_replace("AS", "Samoa Americana", $valor);
							$valor = str_replace("BL", "San Bartolom&eacute;", $valor);
							$valor = str_replace("KN", "San Crist&oacute;bal y Nieves", $valor);
							$valor = str_replace("SM", "San Marino", $valor);

							$valor = str_replace("PM", "San Pedro y Miquel&oacute;n", $valor);
							$valor = str_replace("VC", "San Vicente y las Granadinas", $valor);
							$valor = str_replace("SH", "Santa Helena", $valor);
							$valor = str_replace("LC", "Santa Luc&iacute;a", $valor);
							$valor = str_replace("ST", "Sao Tom&eacute; y Principe", $valor);
							$valor = str_replace("SN", "Senegal", $valor);

							$valor = str_replace("RS", "Serbia", $valor);
							$valor = str_replace("SC", "Seychelles", $valor);
							$valor = str_replace("SL", "Sierra Leona", $valor);
							$valor = str_replace("SG", "Singapur", $valor);
							$valor = str_replace("SY", "Siria", $valor);
							$valor = str_replace("SO", "Somalia", $valor);

							$valor = str_replace("LK", "Sri Lanka", $valor);
							$valor = str_replace("SZ", "Suazilandia", $valor);
							$valor = str_replace("ZA", "Sud&aacute;frica", $valor);
							$valor = str_replace("SD", "Sud&aacute;n", $valor);
							$valor = str_replace("SE", "Suecia", $valor);
							$valor = str_replace("CH", "Suiza", $valor);

							$valor = str_replace("SR", "Surinam", $valor);
							$valor = str_replace("SJ", "Svalbard y Jan Mayen", $valor);
							$valor = str_replace("TH", "Tailandia", $valor);
							$valor = str_replace("TW", "Taiw&aacute;n", $valor);
							$valor = str_replace("TZ", "Tanzania", $valor);
							$valor = str_replace("TJ", "Tayikist&aacute;n", $valor);

							$valor = str_replace("IO", "Territorio Brit&aacute;nico del Oc&eacute;ano &Iacute;ndico", $valor);
							$valor = str_replace("TF", "Territorios Australes Franceses", $valor);
							$valor = str_replace("PS", "Territorios palestinos", $valor);
							$valor = str_replace("TL", "Timor Oriental", $valor);
							$valor = str_replace("TG", "Togo", $valor);
							$valor = str_replace("TK", "Tokelau", $valor);

							$valor = str_replace("TO", "Tonga", $valor);
							$valor = str_replace("TT", "Trinidad y Tobago", $valor);
							$valor = str_replace("TM", "Turkmenist&aacute;n", $valor);
							$valor = str_replace("TR", "Turqu&iacute;a", $valor);
							$valor = str_replace("TV", "Tuvalu", $valor);
							$valor = str_replace("TN", "T&uacute;nez", $valor);

							$valor = str_replace("UA", "Ucrania", $valor);
							$valor = str_replace("UG", "Uganda", $valor);
							$valor = str_replace("UY", "Uruguay", $valor);
							$valor = str_replace("UZ", "Uzbekist&aacute;n", $valor);
							$valor = str_replace("VU", "Vanuatu", $valor);
							$valor = str_replace("VE", "Venezuela", $valor);

							$valor = str_replace("VN", "Vietnam", $valor);
							$valor = str_replace("WF", "Wallis y Futuna", $valor);
							$valor = str_replace("YE", "Yemen", $valor);
							$valor = str_replace("DJ", "Yibuti", $valor);
							$valor = str_replace("ZM", "Zambia", $valor);
							$valor = str_replace("ZW", "Zimbabue", $valor);
return $valor;
}

function denuncias($valor)
{
$valor = str_replace("10", "Re-post", $valor);
$valor = str_replace("11", "Se hace Spam", $valor);
$valor = str_replace("12", "Tiene links muertos", $valor);
$valor = str_replace("13", "Es Racista o irrespetuoso", $valor);
$valor = str_replace("14", "Contiene informaci&oacute;n personal", $valor);
$valor = str_replace("15", "El T&iacute;tulo esta en may&uacute;scula", $valor);
$valor = str_replace("16", "Contiene Pedofilia", $valor);
$valor = str_replace("17", "Es Gore o asqueroso", $valor);
$valor = str_replace("18", "Est&aacute; mal la fuente", $valor);
$valor = str_replace("19", "Post demasiado pobre / Crap", $valor);
$valor = str_replace("20", "Downgrade! no es un foro", $valor);
$valor = str_replace("21", "No cumple con el protocolo", $valor);
$valor = str_replace("22", "Otra raz&oacute;n (especificar)", $valor);
return $valor;
}

function historial($valor)
{
$valor = str_replace("1", "<span class=\"color_red\">Eliminado</span>", $valor);
$valor = str_replace("2", "<span class=\"color_green\">Editado</span>", $valor);
$valor = str_replace("3", "<span class=\"color_green\">Reactivado</span>", $valor);
return $valor;
}

function sx($valor)
{
$valor	=	str_replace("m", "&#231;", $valor);
$valor	=	str_replace("f", "*", $valor);
return $valor;
}

function imgsx($valor)
{
$valor	=	str_replace("&#231;",	'<span style="position:relative;"><img border=0 src="'.$url.'/images/big2v1.png" style="position:absolute; top:-132px; clip:rect(132px 16px 148px 0px);" alt="Hombre" title="Hombre" /><img border=0 src="'.$url.'/images/space.gif" style="width:16px;height:16px" align="absmiddle" /></span>', $valor);
$valor	=	str_replace("*",	'<span style="position: relative;"><img src="'.$url.'/images/big2v5.gif" style="position: absolute; top: -154px; clip: rect(154px, 16px, 170px, 0px);" alt="Mujer" title="Mujer" border="0"><img src="'.$url.'/images/space.gif" style="width: 16px; height: 16px;" align="absmiddle" border="0"></span>', $valor);
return $valor;
}

function guardartags($valor)
{
$valor	=	str_replace(", ", ",", $valor);
return $valor;
}

function mostrartags($valor)
{
$valor	=	str_replace(",", ", ", $valor);
return $valor;
}

function hace($fecha){
    $fecha = $fecha; 
    $ahora = time();
    $tiempo = $ahora-$fecha; 
     if(round($tiempo / 31536000) <= 0){ 
        if(round($tiempo / 2678400) <= 0){ 
             if(round($tiempo / 86400) <= 0){ 
                 if(round($tiempo / 3600) <= 0){ 
                    if(round($tiempo / 60) <= 0){ 
                if($tiempo <= 60){ $hace = "Menos de 1 minuto"; } 
                } else  
                { 
                    $can = round($tiempo / 60); 
                    if($can <= 1) {    $word = "minuto"; } else { $word = "minutos"; } 
                    $hace = "Hace " .$can. " ".$word; 
                } 
                } else  
                { 
                    $can = round($tiempo / 3600); 
                    if($can <= 1) {    $word = "hora"; } else {    $word = "horas"; } 
                    $hace = "Hace " .$can. " ".$word; 
                } 
                } else  
                { 
                    $can = round($tiempo / 86400); 
                    if($can <= 1) {    $word = "d&iacute;a"; } else {    $word = "d&iacute;as"; } 
                    $hace = "Hace " .$can. " ".$word;
                } 
                } else  
                { 
                    $can = round($tiempo / 2678400);  
                    if($can <= 1) {    $word = "mes"; } else { $word = "meses"; }
                    $hace = "Hace " .$can. " ".$word; 
                } 
                } else  
                { 
                    $can = round($tiempo / 31536000); 
                    if($can <= 1) {    $word = "a&ntilde;o";} else { $word = "a&ntilde;os"; } 
                    $hace = "Hace " .$can. " ".$word; 
                }
                
    return $hace; 
}







function haceano($fecha){
    $fecha = $fecha; 
    $ahora = time();
    $tiempo = $ahora-$fecha; 
     if(round($tiempo / 31536000) <= 0){ 
        if(round($tiempo / 2678400) <= 0){ 
             if(round($tiempo / 86400) <= 0){ 
                 if(round($tiempo / 3600) <= 0){ 
                    if(round($tiempo / 60) <= 0){ 
                if($tiempo <= 60){ $hace = "Menos de 1 minuto"; } 
                } else  
                { 
                    $can = round($tiempo / 60); 
                    if($can <= 1) {    $word = "minuto"; } else { $word = "minutos"; } 
                    $hace = " " .$can. " ".$word; 
                } 
                } else  
                { 
                    $can = round($tiempo / 3600); 
                    if($can <= 1) {    $word = "hora"; } else {    $word = "horas"; } 
                    $hace = " " .$can. " ".$word; 
                } 
                } else  
                { 
                    $can = round($tiempo / 86400); 
                    if($can <= 1) {    $word = "d&iacute;a"; } else {    $word = "d&iacute;as"; } 
                    $hace = " " .$can. " ".$word;
                } 
                } else  
                { 
                    $can = round($tiempo / 2678400);  
                    if($can <= 1) {    $word = "mes"; } else { $word = "meses"; }
                    $hace = " " .$can. " ".$word; 
                } 
                } else  
                { 
                    $can = round($tiempo / 31536000); 
                    if($can <= 1) {    $word = "a&ntilde;o";} else { $word = "a&ntilde;os"; } 
                    $hace = " " .$can. " ".$word; 
                }
                
    return $hace; 
}











function cortar($texto,$hasta=45){
    $cantidad = strlen($texto);
    if($cantidad > $hasta){
        return substr($texto, 0, $hasta)."...";
    }
    else{
        return "$texto";
    }
}

function getLocation(&$city, &$coords) {
	$c = file_get_contents('http://www.ipaddressapi.com/lookup/'.$_SERVER['REMOTE_ADDR']);
	$ex = explode('<th>City:</th><td>', $c);
	$ex2 = explode('</td>', $ex[1]);
	$city = $ex2[0];
	$ex = explode('<th>Latitude:</th><td>', $c);
	$ex2 = explode('</td>', $ex[1]);
	$coords[0] = $ex2[0];
	$ex = explode('<th>Longitude:</th><td>', $c);
	$ex2 = explode('</td>', $ex[1]);
	$coords[1] = $ex2[0];
}

function getWeather($city, &$weather, $onlyHome = false) {
	$c = @file_get_contents('http://www.google.com/ig/api?weather='.str_replace(' ', '%20', $city).'&hl=es');
	if(!$c || strpos($c, 'problem_cause') !== false) {
		$weather['current']['temp'] = '?';
		$weather['current']['hum'] = '?%';
	}
	//echo htmlspecialchars($c);
	$ex = explode('<temp_c data="', $c);
	$ex1 = explode('"', $ex[1]);
	$weather['current']['temp'] = $ex1[0];
	
	$ex = explode('<humidity data="', $c);
	$ex1 = explode('"', $ex[1]);
	$ex = explode(' ', $ex1[0]);
	$weather['current']['hum'] = $ex[1];
	
	$ex = explode('<condition data="', $c);
	$ex1 = explode('"/>', $ex[1]);
	$weather['current']['stat'] = $ex1[0];
	
	$ex = explode('<wind_condition data="Viento: ', $c);
	$ex1 = explode('"/>', $ex[1]);
	$weather['current']['wind'] = $ex1[0];
	
	$ex = explode('<current_conditions>', $c);
	$ex1 = explode('</current_conditions>', $ex[1]);
	$ex = explode('/ig/images/weather/', $ex1[0]);
	$ex1 = explode('.gif"', $ex[1]);
	$weather['current']['icon'] = $ex1[0];
}

function bandera($valor)
{
$valor = str_replace("AF", "af", $valor);
$valor = str_replace("AL", "al", $valor);
$valor = str_replace("DE", "de", $valor);
$valor = str_replace("DZ", "dz", $valor);
$valor = str_replace("AD", "ad", $valor);
$valor = str_replace("AO", "ao", $valor);
$valor = str_replace("AI", "ai", $valor);
$valor = str_replace("AG", "ag", $valor);
$valor = str_replace("AN", "an", $valor);
$valor = str_replace("AQ", "aq", $valor);
$valor = str_replace("SA", "sa", $valor);
$valor = str_replace("AR", "ar", $valor);
$valor = str_replace("AM", "am", $valor);
$valor = str_replace("AW", "aw", $valor);
$valor = str_replace("AU", "au", $valor);
$valor = str_replace("AT", "at", $valor);
$valor = str_replace("AZ", "az", $valor);
$valor = str_replace("BS", "bs", $valor);
$valor = str_replace("BH", "bh", $valor);
$valor = str_replace("BD", "bd", $valor);
$valor = str_replace("BB", "bb", $valor);
$valor = str_replace("BZ", "bz", $valor);
$valor = str_replace("BJ", "bj", $valor);
$valor = str_replace("BM", "bm", $valor);
$valor = str_replace("BY", "by", $valor);
$valor = str_replace("BO", "bo", $valor);
$valor = str_replace("BA", "ba", $valor);
$valor = str_replace("BW", "bw", $valor);
$valor = str_replace("BR", "br", $valor);
$valor = str_replace("BN", "bn", $valor);
$valor = str_replace("BG", "bg", $valor);
$valor = str_replace("BF", "bf", $valor);
$valor = str_replace("BI", "bi", $valor);
$valor = str_replace("BT", "bt", $valor);
$valor = str_replace("BE", "be", $valor);
$valor = str_replace("CV", "cv", $valor);
$valor = str_replace("KH", "kh", $valor);
$valor = str_replace("CM", "cm", $valor);
$valor = str_replace("CA", "ca", $valor);
$valor = str_replace("TD", "td", $valor);
$valor = str_replace("CL", "cl", $valor);
$valor = str_replace("CN", "cn", $valor);
$valor = str_replace("CY", "cy", $valor);
$valor = str_replace("VA", "va", $valor);
$valor = str_replace("CO", "co", $valor);
$valor = str_replace("KM", "km", $valor);
$valor = str_replace("KP", "kp", $valor);
$valor = str_replace("KR", "kr", $valor);
$valor = str_replace("CR", "cr", $valor);
$valor = str_replace("CI", "ci", $valor);
$valor = str_replace("HR", "hr", $valor);
$valor = str_replace("CU", "cu", $valor);
$valor = str_replace("DK", "dk", $valor);
$valor = str_replace("DM", "dm", $valor);
$valor = str_replace("EC", "ec", $valor);
$valor = str_replace("EG", "eg", $valor);
$valor = str_replace("SV", "sv", $valor);
$valor = str_replace("AE", "ae", $valor);
$valor = str_replace("ER", "er", $valor);
$valor = str_replace("SK", "sk", $valor);
$valor = str_replace("SI", "si", $valor);
$valor = str_replace("ES", "es", $valor);
$valor = str_replace("US", "us", $valor);
$valor = str_replace("EE", "ee", $valor);
$valor = str_replace("ET", "et", $valor);
$valor = str_replace("PH", "ph", $valor);
$valor = str_replace("FI", "fi", $valor);
$valor = str_replace("FJ", "fj", $valor);
$valor = str_replace("FR", "fr", $valor);
$valor = str_replace("GA", "ga", $valor);
$valor = str_replace("GM", "gm", $valor);
$valor = str_replace("GE", "ge", $valor);
$valor = str_replace("GH", "gh", $valor);
$valor = str_replace("GI", "gi", $valor);
$valor = str_replace("GD", "gd", $valor);
$valor = str_replace("GR", "gr", $valor);
$valor = str_replace("GL", "gl", $valor);
$valor = str_replace("GP", "gp", $valor);
$valor = str_replace("GU", "gu", $valor);
$valor = str_replace("GT", "gt", $valor);
$valor = str_replace("GF", "gf", $valor);
$valor = str_replace("GP", "gp", $valor);
$valor = str_replace("GU", "gu", $valor);
$valor = str_replace("GT", "gt", $valor);
$valor = str_replace("GF", "gf", $valor);
$valor = str_replace("GG", "gg", $valor);
$valor = str_replace("GN", "gn", $valor);
$valor = str_replace("GQ", "gq", $valor);
$valor = str_replace("GW", "gw", $valor);
$valor = str_replace("GY", "gy", $valor);
$valor = str_replace("HT", "ht", $valor);
$valor = str_replace("HN", "hn", $valor);
$valor = str_replace("HK", "hk", $valor);
$valor = str_replace("HU", "hu", $valor);
$valor = str_replace("IN", "in", $valor);
$valor = str_replace("ID", "id", $valor);
$valor = str_replace("IQ", "iq", $valor);
$valor = str_replace("IE", "ie", $valor);
$valor = str_replace("IR", "ir", $valor);
$valor = str_replace("BV", "bv", $valor);
$valor = str_replace("IM", "im", $valor);
$valor = str_replace("CX", "cx", $valor);
$valor = str_replace("IS", "is", $valor);
$valor = str_replace("KY", "ky", $valor);
$valor = str_replace("CC", "cc", $valor);
$valor = str_replace("CK", "ck", $valor);
$valor = str_replace("FO", "fo", $valor);
$valor = str_replace("GS", "gs", $valor);
$valor = str_replace("HM", "hm", $valor);
$valor = str_replace("MP", "mp", $valor);
$valor = str_replace("MH", "mh", $valor);
$valor = str_replace("PN", "pn", $valor);
$valor = str_replace("SB", "sb", $valor);
$valor = str_replace("TC", "tc", $valor);
$valor = str_replace("VG", "vg", $valor);
$valor = str_replace("VI", "vi", $valor);
$valor = str_replace("UM", "um", $valor);
$valor = str_replace("IL", "il", $valor);
$valor = str_replace("IT", "it", $valor);
$valor = str_replace("JM", "jm", $valor);
$valor = str_replace("JP", "jp", $valor);
$valor = str_replace("JE", "je", $valor);
$valor = str_replace("JO", "jo", $valor);
$valor = str_replace("KZ", "kz", $valor);
$valor = str_replace("KE", "ke", $valor);
$valor = str_replace("KG", "kg", $valor);
$valor = str_replace("KI", "ki", $valor);
$valor = str_replace("KW", "kw", $valor);
$valor = str_replace("LA", "la", $valor);
$valor = str_replace("LS", "ls", $valor);
$valor = str_replace("LV", "lv", $valor);
$valor = str_replace("LR", "lr", $valor);
$valor = str_replace("LY", "ly", $valor);
$valor = str_replace("LI", "li", $valor);
$valor = str_replace("LT", "lt", $valor);
$valor = str_replace("LU", "lu", $valor);
$valor = str_replace("LB", "lb", $valor);
$valor = str_replace("MO", "mo", $valor);
$valor = str_replace("MG", "mg", $valor);
$valor = str_replace("MY", "my", $valor);
$valor = str_replace("MW", "mw", $valor);
$valor = str_replace("MV", "mv", $valor);
$valor = str_replace("MT", "mt", $valor);
$valor = str_replace("ML", "ml", $valor);
$valor = str_replace("MA", "ma", $valor);
$valor = str_replace("MQ", "mq", $valor);
$valor = str_replace("MU", "mu", $valor);
$valor = str_replace("MR", "mr", $valor);
$valor = str_replace("YT", "yt", $valor);
$valor = str_replace("FM", "fm", $valor);
$valor = str_replace("MU", "mu", $valor);
$valor = str_replace("MR", "mr", $valor);
$valor = str_replace("YT", "yt", $valor);
$valor = str_replace("FM", "fm", $valor);
$valor = str_replace("MD", "md", $valor);
$valor = str_replace("MN", "mn", $valor);
$valor = str_replace("ME", "me", $valor);
$valor = str_replace("MS", "ms", $valor);
$valor = str_replace("MZ", "mz", $valor);
$valor = str_replace("MM", "mm", $valor);
$valor = str_replace("MX", "mx", $valor);
$valor = str_replace("MC", "mc", $valor);
$valor = str_replace("NA", "na", $valor);
$valor = str_replace("NR", "nr", $valor);
$valor = str_replace("NP", "np", $valor);
$valor = str_replace("NI", "ni", $valor);
$valor = str_replace("NE", "ne", $valor);
$valor = str_replace("NG", "ng", $valor);
$valor = str_replace("NU", "nu", $valor);
$valor = str_replace("NF", "nf", $valor);
$valor = str_replace("NO", "no", $valor);
$valor = str_replace("NC", "nc", $valor);
$valor = str_replace("NZ", "nz", $valor);
$valor = str_replace("OM", "om", $valor);
$valor = str_replace("PK", "pk", $valor);
$valor = str_replace("PW", "pw", $valor);
$valor = str_replace("PA", "pa", $valor);
$valor = str_replace("PG", "pg", $valor);
$valor = str_replace("PY", "py", $valor);
$valor = str_replace("NL", "nl", $valor);
$valor = str_replace("PE", "pe", $valor);
$valor = str_replace("PF", "pf", $valor);
$valor = str_replace("PL", "pl", $valor);
$valor = str_replace("PT", "pt", $valor);
$valor = str_replace("PR", "pr", $valor);
$valor = str_replace("QA", "qa", $valor);
$valor = str_replace("GB", "gb", $valor);
$valor = str_replace("CF", "cf", $valor);
$valor = str_replace("CZ", "cz", $valor);
$valor = str_replace("CD", "cd", $valor);
$valor = str_replace("DO", "do", $valor);
$valor = str_replace("MK", "mk", $valor);
$valor = str_replace("CG", "cg", $valor);
$valor = str_replace("EH", "eh", $valor);
$valor = str_replace("RE", "re", $valor);
$valor = str_replace("RW", "rw", $valor);
$valor = str_replace("RO", "ro", $valor);
$valor = str_replace("RU", "ru", $valor);
$valor = str_replace("WS", "ws", $valor);
$valor = str_replace("AS", "as", $valor);
$valor = str_replace("BL", "bl", $valor);
$valor = str_replace("KN", "kn", $valor);
$valor = str_replace("SM", "sm", $valor);
$valor = str_replace("PM", "pm", $valor);
$valor = str_replace("VC", "vc", $valor);
$valor = str_replace("SH", "sh", $valor);
$valor = str_replace("LC", "lc", $valor);
$valor = str_replace("ST", "st", $valor);
$valor = str_replace("SN", "sn", $valor);
$valor = str_replace("RS", "rs", $valor);
$valor = str_replace("SC", "sc", $valor);
$valor = str_replace("SL", "sl", $valor);
$valor = str_replace("SG", "sg", $valor);
$valor = str_replace("SY", "sy", $valor);
$valor = str_replace("SO", "so", $valor);
$valor = str_replace("LK", "lk", $valor);
$valor = str_replace("SZ", "sz", $valor);
$valor = str_replace("ZA", "za", $valor);
$valor = str_replace("SD", "se", $valor);
$valor = str_replace("SE", "se", $valor);
$valor = str_replace("CH", "ch", $valor);
$valor = str_replace("SR", "sr", $valor);
$valor = str_replace("SJ", "sj", $valor);
$valor = str_replace("TH", "th", $valor);
$valor = str_replace("TW", "tw", $valor);
$valor = str_replace("TJ", "tj", $valor);
$valor = str_replace("IO", "io", $valor);
$valor = str_replace("TF", "tf", $valor);
$valor = str_replace("PS", "ps", $valor);
$valor = str_replace("TL", "tl", $valor);		
$valor = str_replace("TG", "tg", $valor);
$valor = str_replace("TK", "tk", $valor);
$valor = str_replace("TO", "to", $valor);
$valor = str_replace("TT", "tt", $valor);
$valor = str_replace("TM", "tm", $valor);
$valor = str_replace("TR", "tr", $valor);
$valor = str_replace("TV", "tv", $valor);
$valor = str_replace("TN", "tn", $valor);
$valor = str_replace("UA", "ua", $valor);
$valor = str_replace("UG", "ug", $valor);
$valor = str_replace("UY", "uy", $valor);
$valor = str_replace("UZ", "uz", $valor);
$valor = str_replace("VU", "vu", $valor);
$valor = str_replace("VE", "ve", $valor);
$valor = str_replace("VN", "vn", $valor);
$valor = str_replace("WF", "wf", $valor);
$valor = str_replace("YE", "ye", $valor);
$valor = str_replace("ZM", "zm", $valor);
$valor = str_replace("ZW", "zw", $valor);
return $valor;
}

function mesp($valor)
{
$valor = str_replace("01", "Enero", $valor);
$valor = str_replace("02", "Febrero", $valor);
$valor = str_replace("03", "Marzo", $valor);
$valor = str_replace("04", "Abril", $valor);
$valor = str_replace("05", "Mayo", $valor);
$valor = str_replace("06", "Junio", $valor);
$valor = str_replace("07", "Julio", $valor);
$valor = str_replace("08", "Agosto", $valor);
$valor = str_replace("09", "Septiembre", $valor);
$valor = str_replace("10", "Octubre", $valor);
$valor = str_replace("11", "Noviembre", $valor);
$valor = str_replace("12", "Diciembre", $valor);
return $valor;
}

function estud($valor)
{
$valor	=	str_replace("10", "Sin Estudios", $valor);
$valor	=	str_replace("11", "Primario completo", $valor);
$valor	=	str_replace("12", "Secundario en curso", $valor);
$valor	=	str_replace("13", "Secundario completo", $valor);
$valor	=	str_replace("14", "Terciario en curso", $valor);
$valor	=	str_replace("15", "Terciario completo", $valor);
$valor	=	str_replace("16", "Universitario en curso", $valor);
$valor	=	str_replace("17", "Universitario completo", $valor);
$valor	=	str_replace("18", "Post-grado en curso", $valor);
$valor	=	str_replace("19", "Post-grado completo", $valor);
return $valor;
}

function sexico($valor)
{
$valor	=	str_replace("m", "un Hombre", $valor);
$valor	=	str_replace("f", "una Mujer", $valor);
return $valor;
}

function ingre($valor)
{
$valor = str_replace("10", "Sin ingresos", $valor);
$valor = str_replace("11", "Bajos", $valor);
$valor = str_replace("12", "Intermedios", $valor);
$valor = str_replace("13", "Altos", $valor);
return $valor;
}

function sexcom($valor)
{
$valor	=	str_replace("m", "Hombre", $valor);
$valor	=	str_replace("f", "Mujer", $valor);
return $valor;
}

function sexco($valor)
{
$valor	=	str_replace("m", "<span title='Hombre' class='systemicons sexoM'></span>", $valor);
$valor	=	str_replace("f", "<span title='Mujer' class='systemicons sexoF'></span>", $valor);
return $valor;
}

function sect($valor)
{
$valor	=	str_replace("10", "Abastecimiento", $valor);
$valor	=	str_replace("12", "Administraci&oacute;n", $valor);
$valor	=	str_replace("13", "Apoderado Aduanal", $valor);
$valor	=	str_replace("14", "Asesor&iacute;a en Comercio Exterior", $valor);
$valor	=	str_replace("15", "Asesor&iacute;a Legal Internacional", $valor);
$valor	=	str_replace("16", "Asistente de Tr&aacute;fico", $valor);
$valor	=	str_replace("17", "Auditor&iacute;a", $valor);
$valor	=	str_replace("18", "Calidad", $valor);
$valor	=	str_replace("19", "Call Center", $valor);
$valor	=	str_replace("20", "Capacitaci&oacute;n Comercio Exterior", $valor);
$valor	=	str_replace("21", "Comercial", $valor);
$valor	=	str_replace("22", "Comercio Exterior", $valor);
$valor	=	str_replace("23", "Compras", $valor);
$valor	=	str_replace("24", "Compras Internacionales/Importaci&oacute;n", $valor);
$valor	=	str_replace("25", "Comunicaci&oacute;n Social", $valor);
$valor	=	str_replace("26", "Comunicaciones Externas", $valor);
$valor	=	str_replace("27", "Comunicaciones Internas", $valor);
$valor	=	str_replace("28", "Consultor&iacute;a", $valor);
$valor	=	str_replace("29", "Consultor&iacute;as Comercio Exterior", $valor);
$valor	=	str_replace("30", "Contabilidad", $valor);
$valor	=	str_replace("31", "Control de Gesti&oacute;n", $valor);
$valor	=	str_replace("32", "Creatividad", $valor);
$valor	=	str_replace("33", "Dise&ntilde;o", $valor);
$valor	=	str_replace("34", "Distribuci&oacute;n", $valor);
$valor	=	str_replace("35", "E-commerce", $valor);
$valor	=	str_replace("36", "Educaci&oacute;n", $valor);
$valor	=	str_replace("37", "Finanzas", $valor);
$valor	=	str_replace("38", "Finanzas Internacionales", $valor);
$valor	=	str_replace("39", "Gerencia / Direcci&oacute;n General", $valor);
$valor	=	str_replace("40", "Impuestos", $valor);
$valor	=	str_replace("41", "Ingenier&iacute;a", $valor);
$valor	=	str_replace("42", "Internet", $valor);
$valor	=	str_replace("43", "Investigaci&oacute;n y Desarrollo", $valor);
$valor	=	str_replace("44", "J&oacute;venes Profesionales", $valor);
$valor	=	str_replace("45", "Legal", $valor);
$valor	=	str_replace("46", "Log&iacute;stica", $valor);
$valor	=	str_replace("47", "Mantenimiento", $valor);
$valor	=	str_replace("48", "Marketing", $valor);
$valor	=	str_replace("49", "Medio Ambiente", $valor);
$valor	=	str_replace("50", "Mercadotecnia Internacional", $valor);
$valor	=	str_replace("51", "Multimedia", $valor);
$valor	=	str_replace("52", "Otra", $valor);
$valor	=	str_replace("53", "Pasant&iacute;as", $valor);
$valor	=	str_replace("54", "Periodismo", $valor);
$valor	=	str_replace("55", "Planeamiento", $valor);
$valor	=	str_replace("56", "Producci&oacute;n", $valor);
$valor	=	str_replace("57", "Producci&oacute;n e Ingenier&iacute;a", $valor);
$valor	=	str_replace("58", "Recursos Humanos", $valor);
$valor	=	str_replace("59", "Relaciones Institucionales / P&uacute;blicas", $valor);
$valor	=	str_replace("60", "Salud", $valor);
$valor	=	str_replace("61", "Seguridad Industrial", $valor);
$valor	=	str_replace("62", "Servicios", $valor);
$valor	=	str_replace("63", "Soporte T&eacute;cnico", $valor);
$valor	=	str_replace("64", "Tecnolog&iacute;a", $valor);
$valor	=	str_replace("65", "Tecnolog&iacute;as de la Informaci&oacute;n", $valor);
$valor	=	str_replace("66", "Telecomunicaciones", $valor);
$valor	=	str_replace("67", "Telemarketing", $valor);
$valor	=	str_replace("68", "Traducci&oacute;n", $valor);
$valor	=	str_replace("69", "Transporte<", $valor);
$valor	=	str_replace("70", "Ventas", $valor);
$valor	=	str_replace("70", "Ventas Internacionales/Exportaci&oacute;n", $valor);
return $valor;
}

function rngo($valor)
{
$valor	=	str_replace("255", "Desarrollador", $valor);
$valor	=	str_replace("555", "Match User", $valor);
$valor	=	str_replace("455", "Oficial", $valor);
$valor	=	str_replace("655", "Supervisor", $valor);
$valor	=	str_replace("755", "Due&ntilde;o", $valor);
$valor	=	str_replace("100", "Moderador", $valor);
$valor	=	str_replace("50", "Patrocinador", $valor);
$valor	=	str_replace("18", "Oficial", $valor);
$valor	=	str_replace("17", "Colaborador", $valor);
$valor	=	str_replace("16", "Gold User", $valor);
$valor	=	str_replace("15", "Silver User", $valor);
$valor	=	str_replace("14", "Great User", $valor);
$valor	=	str_replace("13", "Full User", $valor);
$valor	=	str_replace("12", "New Full User", $valor);
$valor	=	str_replace("11", "Novato", $valor);
return $valor;
}



function rngp($valor)
{
$valor	=	str_replace("255", "Desarrollador", $valor);
$valor	=	str_replace("555", "Match User", $valor);
$valor	=	str_replace("655", "Supervisor", $valor);
$valor	=	str_replace("755", "Due&ntilde;o", $valor);
$valor	=	str_replace("100", "Moderador", $valor);
$valor	=	str_replace("50", "Patrocinador", $valor);
$valor	=	str_replace("18", "Oficial", $valor);
$valor	=	str_replace("17", "Colaborador", $valor);
$valor	=	str_replace("16", "Gold User", $valor);
$valor	=	str_replace("15", "Silver User", $valor);
$valor	=	str_replace("14", "Great User", $valor);
$valor	=	str_replace("13", "Full User", $valor);
$valor	=	str_replace("12", "New Full User", $valor);
$valor	=	str_replace("11", "Novato", $valor);
return $valor;
}














/* Funciones de Comunidades */

function visitascomunidad($idtemax, $creadoxc)
{
	if ($_SESSION['id']!=null and $_SESSION['user']!=$creadoxc){
		mysql_query("UPDATE c_temas SET visitaste=visitaste+1 WHERE idte='{$idtemax}'");
	}
}

function rangocomunidad($valor)
{
$valor = str_replace("1", "Visitante", $valor);
$valor = str_replace("2", "Comentador", $valor);
$valor = str_replace("3", "Posteador", $valor);
$valor = str_replace("4", "Moderador", $valor);
$valor = str_replace("5", "Administrador", $valor);
return $valor;
}

/* Funciones: Modulo "acciones" */
// inteligente ?.?

function tipo_accion($n){
    $p = array("comento-tema" => "comentarios-n-g",
               "comento-post" => "comentarios-n",
               "creo-post" => "post-nuevo",
               "creo-tema" => "tema-nuevo",
               "creo-comunidad" => "creo-comunidad",
               "recomendo-post" => "recomendar-p",
               "favoritos-post" => "favoritos-n",
               "unio-comunidad" => "comunidades-n",
               "sigue-post" => "follow-n",
               "sigue-tema" => "follow-n",               
               );
        return $p[$n];
}


function secper($valor)
{

$valor	=	str_replace("sin", "Sin Estudios", $valor);
$valor	=	str_replace("pri", "Primario completo", $valor);
$valor	=	str_replace("sec_curso", "Secundario en curso", $valor);
$valor	=	str_replace("sec_completo", "Secundario completo", $valor);
$valor	=	str_replace("ter_curso", "Terciario en curso", $valor);
$valor	=	str_replace("ter_completo", "Terciario completo", $valor);
$valor	=	str_replace("univ_curso", "Universitario en curso", $valor);
$valor	=	str_replace("univ_completo", "Universitario completo", $valor);
$valor	=	str_replace("post_curso", "Post-grado en curso", $valor);
$valor	=	str_replace("post_completo", "Post-grado completo", $valor);
$valor	=	str_replace("basico", "B&aacute;sico", $valor);
$valor	=	str_replace("intermedio", "Intermedio", $valor);

$valor	=	str_replace("fluido", "Fluido", $valor);
$valor	=	str_replace("nativo", "Nativo", $valor);
$valor	=	str_replace("00", "Sin Respuesta", $valor);
$valor	=	str_replace("01", "Abastecimiento", $valor);
$valor	=	str_replace("02", "Administraci&oacute;n", $valor);
$valor	=	str_replace("03", "Apoderado Aduanal", $valor);
$valor	=	str_replace("04", "Asesor&iacute;a en Comercio Exterior", $valor);
$valor	=	str_replace("05", "Asesor&iacute;a Legal Internacional", $valor);
$valor	=	str_replace("06", "Asistente de Tr&aacute;fico", $valor);
$valor	=	str_replace("07", "Auditor&iacute;a", $valor);
$valor	=	str_replace("08", "Calidad", $valor);
$valor	=	str_replace("09", "Call Center", $valor);
$valor	=	str_replace("10", "Capacitaci&oacute;n Comercio Exterior", $valor);
$valor	=	str_replace("11", "Comercial", $valor);
$valor	=	str_replace("12", "Comercio Exterior", $valor);
$valor	=	str_replace("13", "Compras", $valor);
$valor	=	str_replace("14", "Compras Internacionales/Importaci&oacute;n", $valor);
$valor	=	str_replace("15", "Comunicaci&oacute;n Social", $valor);
$valor	=	str_replace("16", "Comunicaciones Externas", $valor);
$valor	=	str_replace("17", "Comunicaciones Internas", $valor);
$valor	=	str_replace("18", "Consultor&iacute;a", $valor);
$valor	=	str_replace("19", "Consultor&iacute;as Comercio Exterior", $valor);
$valor	=	str_replace("20", "Contabilidad", $valor);
$valor	=	str_replace("21", "Control de Gesti&oacute;n", $valor);
$valor	=	str_replace("22", "Creatividad", $valor);
$valor	=	str_replace("23", "Dise&ntilde;o", $valor);
$valor	=	str_replace("24", "Distribuci&oacute;n", $valor);
$valor	=	str_replace("25", "E-commerce", $valor);
$valor	=	str_replace("26", "Educaci&oacute;n", $valor);
$valor	=	str_replace("27", "Finanzas", $valor);
$valor	=	str_replace("28", "Finanzas Internacionales", $valor);
$valor	=	str_replace("29", "Gerencia / Direcci&oacute;n General", $valor);
$valor	=	str_replace("30", "Impuestos", $valor);
$valor	=	str_replace("31", "Ingenier&iacute;a", $valor);
$valor	=	str_replace("32", "Internet", $valor);
$valor	=	str_replace("33", "Investigaci&oacute;n y Desarrollo", $valor);
$valor	=	str_replace("34", "J&oacute;venes Profesionales", $valor);
$valor	=	str_replace("35", "Legal", $valor);
$valor	=	str_replace("36", "Log&iacute;stica", $valor);
$valor	=	str_replace("37", "Mantenimiento", $valor);
$valor	=	str_replace("38", "Marketing", $valor);
$valor	=	str_replace("39", "Medio Ambiente", $valor);
$valor	=	str_replace("40", "Mercadotecnia Internacional", $valor);
$valor	=	str_replace("41", "Multimedia", $valor);
$valor	=	str_replace("42", "Otra", $valor);
$valor	=	str_replace("43", "Pasant&iacute;as", $valor);
$valor	=	str_replace("44", "Periodismo", $valor);
$valor	=	str_replace("45", "Planeamiento", $valor);
$valor	=	str_replace("46", "Producci&oacute;n", $valor);
$valor	=	str_replace("47", "Producci&oacute;n e Ingenier&iacute;a", $valor);
$valor	=	str_replace("48", "Recursos Humanos", $valor);
$valor	=	str_replace("49", "Relaciones Institucionales / P&uacute;blicas", $valor);
$valor	=	str_replace("50", "Salud", $valor);
$valor	=	str_replace("51", "Seguridad Industrial", $valor);
$valor	=	str_replace("52", "Servicios", $valor);
$valor	=	str_replace("53", "Soporte T&eacute;cnico", $valor);
$valor	=	str_replace("54", "Tecnolog&iacute;a", $valor);
$valor	=	str_replace("55", "Tecnolog&iacute;as de la Informaci&oacute;n", $valor);
$valor	=	str_replace("56", "Telecomunicaciones", $valor);
$valor	=	str_replace("57", "Telemarketing", $valor);
$valor	=	str_replace("58", "Traducci&oacute;n", $valor);
$valor	=	str_replace("59", "Transporte", $valor);
$valor	=	str_replace("60", "Ventas", $valor);
$valor	=	str_replace("61", "Ventas Internacionales/Exportaci&oacute;n", $valor);
$valor	=	str_replace("soltero", "Soltero/a", $valor);
$valor	=	str_replace("novio", "De novio/a", $valor);
$valor	=	str_replace("casado", "Casado/a", $valor);
$valor	=	str_replace("divorciado", "Divorciado/a", $valor);
$valor	=	str_replace("viudo", "Viudo/a", $valor);
$valor	=	str_replace("algo", "En algo...", $valor);
$valor	=	str_replace("", "No tengo", $valor);
$valor	=	str_replace("algun_dia", "Alg&uacute;n d&iacute;a", $valor);
$valor	=	str_replace("no_quiero", "No son lo m&iacute;o", $valor);
$valor	=	str_replace("viven_conmigo", "Tengo, vivo con ellos", $valor);
$valor	=	str_replace("no_viven_conmigo", "Tengo, no vivo con ellos", $valor);
$valor	=	str_replace("solo", "S&oacute;lo", $valor);
$valor	=	str_replace("padres", "Con mis padres", $valor);
$valor	=	str_replace("pareja", "Con mi pareja", $valor);
$valor	=	str_replace("amigos", "Con amigos", $valor);
$valor	=	str_replace("otro", "Otro", $valor);
return $valor;
}




function ingp($valor)
{
$valor	=	str_replace("sin", "Sin ingresos", $valor);
$valor	=	str_replace("bajos", "Bajos", $valor);
$valor	=	str_replace("intermedios", "Intermedios", $valor);
$valor	=	str_replace("altos", "Altos", $valor);
return $valor;
}


function limit_chars_words($string, $char_limit = 40) {
// limitar el número de caracteres y devolver solo palabras enteras
$string = preg_replace('/<(p|br)s*>/i', ' ', $string);
$string = strip_tags($string);
$orig_str_length = strlen($string);
$words = explode(' ', $string);

$i=0;
$str_length = 0;
while ($str_length < $char_limit) {
$str_length = $str_length + strlen($words[$i])+1;
$new_words[$i] = $words[$i];
$i++;
}

$string = implode(' ', $new_words);

if (strlen($string) > $char_limit) {
$new_words = explode(' ', $string);
$word_count = count($new_words);
$word_limit = $word_count - 1;
$string = implode(' ', array_slice($new_words, 0, $word_limit));
}

if ($orig_str_length > strlen($string)) { $string = "$string..."; }
return $string;
}



?>