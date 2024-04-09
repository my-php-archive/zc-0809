<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/configuracion.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/funciones.php');

require $_SERVER['DOCUMENT_ROOT']."/includes/class_db_mysql.php";

$db=new database;
$db->connect();

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
 
function TiempoTranscurrido($time_inicio) {
	$time_actual = time();
	$secs = $time_actual-$time_inicio;
	$secs_real = $secs%60;
	$secs_sobrantes = intval($secs/60);
	$mins_real = $secs_sobrantes%60;
	$mins_sobrantes = intval($secs_sobrantes/60);
	$horas_real = $mins_sobrantes%24;
	$horas_sobrantes = intval($mins_sobrantes/24);
	$dias_real = $horas_sobrantes;
	
	$mes = date("t");
	
	if($dias_real > $mes){
		// mas de un mes
		$mesD = 30+$mes;
		if($dias_real >= $mesD){
			return "Mas de un mes";
		}else{
			return "Hace un mes";
		}
	}

	if($dias_real == $mes)	   return "Hace $dias_real dias";
	if($dias_real < $mes && $dias_real != 0)	return ($dias_real==1 ? "ayer" : "Hace ".$dias_real." dias");
	if($horas_real != 0)	return "Hace ".($horas_real==1 ? $horas_real." hora" : $horas_real." horas");
	if($mins_real != 0)	return "Hace ".($mins_real==1 ? $mins_real." minuto" : $mins_real." minutos");
	
	return "Hace unos segundos";
}

function filtro_tipos($tipo){
	$tipo = str_replace("post-nuevo","sprite-document-text-image",$tipo);
	$tipo = str_replace("tema-nuevo","sprite-document-text-image",$tipo);
	$tipo = str_replace("creo-comunidad","sprite-document-text-image",$tipo);
	return $tipo;
}

function listar($idu,$tipo,$va){
global $db;


	$ActividadQuery .= "select * from acciones where idu = '$idu' ";
	$catsql = ($tipo=='todo'?"  ":" AND tipo = '$tipo' ");

	switch ($va){
		case 'Todas':
			$fecha       = time() - (60*60*24*365);
			$fecha = "AND fecha BETWEEN '$fecha' AND unix_timestamp() order by fecha DESC limit 30";
		break;
		
		case 'ayer':
			$fecha       = time() - (60*60*24);
			$fecha = "AND fecha BETWEEN '$fecha' AND '$fecha' order by fecha DESC limit 30";
		break;
	
		case 'dias-anteriores':
			$fecha       = strtotime("-1 week") - (60*60*24/2); // dias anteriores
			$fecha = "AND fecha BETWEEN '$fecha' AND '$fecha' order by fecha DESC limit 30";
		break;
	
		case 'semanas-anteriores':
			$fecha       = strtotime("-4 week") - (60*60*24);  // semanas anteriores
			$fecha = "AND fecha BETWEEN '$fecha' AND '$fecha' order by fecha DESC limit 30";
		break;
	
		case 'actividad-mas-antigua':
			$fecha       = time() - (60*60*24*365); // actividad mas antigua
			$fecha = "AND fecha BETWEEN '$fecha' AND '$fecha' order by fecha DESC limit 30";
		break;
	
		default:
		$fecha = "";
	}

	$ActividadQuery = $ActividadQuery." $catsql $fecha";

	$Execute = $db->query($ActividadQuery);
	if($db->num_rows($Execute) < 1){
		return false;
	}
	$html = "<div id=\"last-activity-date-$va\" class=\"date-sep\">";
	$html .= "<h3>".ucwords(str_replace("-"," ",$va))."</h3>";
		
	while($p = $db->fetch_array($Execute)){
		$html .= "

<div class=\"list-element clearfix\">
<i class=\"icon ".filtro_tipos($p['tipo'])."\"></i>
".urldecode($p['html'])."
<span class=\"time\" ts=\"".$p['fecha']."\">".TiempoTranscurrido($p['fecha'])."</span>
<i class=\"remove\"><a href=\"\" onclick=\"borrar_act('".$p['ida']."',".$p['ida'].", this); return false;\">x</a></i>
</div>";
	}
	
	$html .= "</div>";
	
	return array("html" => $html);
}

$idu = $_POST['idu'];
$tipo = $_POST['tipo'];

if($idu == "" || $tipo == "") die();


$Todas     = listar($idu,$tipo,'Todas');
$ayer    = listar($idu,$tipo,'ayer');
$dias    = listar($idu,$tipo,'dias-anteriores');
$semanas = listar($idu,$tipo,'semanas-anteriores');
$antigua = listar($idu,$tipo,'actividad-mas-antigua');

$nada  = false;
$_ayer = false;

echo "1: \n";
if(is_array($Todas)){
	echo $Todas['html'];
	
	if(is_array($ayer)){
		echo $ayer['html'];
		
	}

	if(is_array($dias)){
		echo $dias['html'];
	}

	if(is_array($semanas)){
		echo $_ayer == true ? $semanas['html'] : "";
	}

}else{

	if(is_array($ayer)){
		echo $ayer['html'];
	}

	if(is_array($dias)){
		echo $dias['html'];
	}

	if(is_array($semanas)){
		echo $semanas['html'];
	}

	if(is_array($antigua)){
		echo $antigua['html'];
	}else{
		$nada = true;
	}
}

if($nada == true){
	echo "";
}

?>