<?php
$pagina1 = xss(no_i($_GET['pagina']));
 if(empty($_pagi_sql)){
	die("<b>Error Paginator : </b>No se ha definido la variable \$_pagi_sql");
 }
 
 if(empty($_pagi_cuantos)){

	$_pagi_cuantos = 20;
 }
 
 if(!isset($_pagi_mostrar_errores)){

	$_pagi_mostrar_errores = true;
 }

 if(!isset($_pagi_conteo_alternativo)){

	$_pagi_conteo_alternativo = false;
 }
 
 if(!isset($_pagi_separador)){

	$_pagi_separador = " ";
 }
 
  if(isset($_pagi_nav_estilo)){
	$_pagi_nav_estilo_mod = "class=\"$_pagi_nav_estilo\"";
 }else{

 	$_pagi_nav_estilo_mod = "";
 }
 
 if(!isset($_pagi_nav_anterior)){

	$_pagi_nav_anterior = "&laquo; Anterior";
 } 
 
 if(!isset($_pagi_nav_siguiente)){

	$_pagi_nav_siguiente = "Siguiente &raquo;";
 } 

 if(!isset($_pagi_nav_primera)){

	$_pagi_nav_primera = "&laquo;&laquo; Primera";
 } 
 
 if(!isset($_pagi_nav_ultima)){

	$_pagi_nav_ultima = "&Uacute;ltima &raquo;&raquo;";
 }
 
 if (empty($pagina1)){

	$_pagi_actual = 1;
 }else{
	// Si se "pidió" una página específica:
	// La página actual será la que se pidió.
    	$_pagi_actual = $pagina1;
 }

 if($_pagi_conteo_alternativo == false){
 	$_pagi_sqlConta = eregi_replace("select[[:space:]](.*)[[:space:]]from", "SELECT COUNT(*) FROM", $_pagi_sql);
 	$_pagi_result2 = mysql_query($_pagi_sqlConta);
	// Si ocurrió error y mostrar errores está activado
 	if($_pagi_result2 == false && $_pagi_mostrar_errores == true){
		die (" Error en la consulta de conteo de registros: $_pagi_sqlConta. Mysql dijo: <b>".mysql_error()."</b>");
 	}
 	$_pagi_totalReg = mysql_result($_pagi_result2,0,0);//total de registros
 }else{
	$_pagi_result3 = mysql_query($_pagi_sql);
	// Si ocurrió error y mostrar errores está activado
 	if($_pagi_result3 == false && $_pagi_mostrar_errores == true){
		die (" Error en la consulta de conteo alternativo de registros: $_pagi_sql. Mysql dijo: <b>".mysql_error()."</b>");
 	}
	$_pagi_totalReg = mysql_num_rows($_pagi_result3);
 }
 
 $_pagi_totalPags = ceil($_pagi_totalReg / $_pagi_cuantos);

 $_pagi_enlace = $_SERVER['PHP_SELF'];
 $_pagi_query_string = "?";
 
 if(!isset($_pagi_propagar)){

	if (isset($_GET['pagina'])) unset($_GET['pagina']);
	$_pagi_propagar = array_keys($_GET);
 }elseif(!is_array($_pagi_propagar)){

	die("<b>Error Paginator : </b>La variable \$_pagi_propagar debe ser un array");
 }

 foreach($_pagi_propagar as $var){
 	if(isset($GLOBALS[$var])){

		$_pagi_query_string.= $var."=".$GLOBALS[$var]."&";
	}elseif(isset($_REQUEST[$var])){

		$_pagi_query_string.= $var."=".xss(no_i($_REQUEST[$var]))."&";
	}
 }


 $_pagi_enlace .= $_pagi_query_string;

 $_pagi_navegacion_temporal = array();
 if ($_pagi_actual != 1){
	
	$_pagi_url = $_pagi_actual - 1;
	$_pagi_navegacion_temporal[] = "<a href='pagina".$_pagi_url."'>$_pagi_nav_anterior</a>";
 }

 
 if(!isset($_pagi_nav_num_enlaces)){

	
 }else{

	$_pagi_nav_intervalo = ceil($_pagi_nav_num_enlaces/2) - 1;
	
	$_pagi_nav_desde = $_pagi_actual - $_pagi_nav_intervalo;

	$_pagi_nav_hasta = $_pagi_actual + $_pagi_nav_intervalo;

	if($_pagi_nav_desde < 1){
 
		$_pagi_nav_hasta -= ($_pagi_nav_desde - 1);

		$_pagi_nav_desde = 1;
	}

	if($_pagi_nav_hasta > $_pagi_totalPags){

		$_pagi_nav_desde -= ($_pagi_nav_hasta - $_pagi_totalPags);
		// Establecemos $_pagi_nav_hasta como el total de páginas.
		$_pagi_nav_hasta = $_pagi_totalPags;
		// Hacemos el último ajuste verificando que al cambiar $_pagi_nav_desde no haya quedado con un valor no válido.
		if($_pagi_nav_desde < 1){
			$_pagi_nav_desde = 1;
		}
	}
 }

 for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){//Desde página 1 hasta última página ($_pagi_totalPags)
	if ($_pagi_i == $_pagi_actual) {
		// Si el número de página es la actual ($_pagi_actual). Se escribe el número, pero sin enlace y en negrita.
		$_pagi_navegacion_temporal[] = "<span ".$_pagi_nav_estilo_mod.">$_pagi_i</span>";
	}else{
		// Si es cualquier otro. Se escibe el enlace a dicho número de página.
		$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."pagina=".$_pagi_i."'>".$_pagi_i."</a>";
	}
 }

 if ($_pagi_actual < $_pagi_totalPags){

	$_pagi_url = $_pagi_actual + 1;
	$_pagi_navegacion_temporal[] = "<a href='pagina".$_pagi_url."'>$_pagi_nav_siguiente</a>";

 }
 $_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);

 $_pagi_inicial = ($_pagi_actual-1) * $_pagi_cuantos;

 $_pagi_sqlLim = $_pagi_sql." LIMIT $_pagi_inicial,$_pagi_cuantos";
 $_pagi_result = mysql_query($_pagi_sqlLim);

 if($_pagi_result == false && $_pagi_mostrar_errores == true){
 	die ("Error en la consulta limitada: $_pagi_sqlLim. Mysql dijo: <b>".mysql_error()."</b>");
 }

 $_pagi_desde = $_pagi_inicial + 1;

 $_pagi_hasta = $_pagi_inicial + $_pagi_cuantos;
 if($_pagi_hasta > $_pagi_totalReg){

 	$_pagi_hasta = $_pagi_totalReg;
 }
 
 $_pagi_info = "desde el $_pagi_desde hasta el $_pagi_hasta de un total de $_pagi_totalReg";

?>