<?php
$pagi = xss(no_i($_GET['_pagi_pg']));

 if(empty($_pagi_sql)){
	// Si no se defini&#243; $_pagi_sql... grave error!
	// Este error se muestra s&#237; o s&#237; (ya que no es un error de mysql)
	die("<b>Error Paginator : </b>No se ha definido la variable \$_pagi_sql");
 }
 
 if(empty($_pagi_cuantos)){
	// Si no se ha especificado la cantidad de registros por p&#225;gina
	// $_pagi_cuantos ser&#225; por defecto 20
	$_pagi_cuantos = 20;
 }
 
 if(!isset($_pagi_mostrar_errores)){
	// Si no se ha elegido si se mostrar&#225; o no errores
	// $_pagi_errores ser&#225; por defecto true. (se muestran los errores)
	$_pagi_mostrar_errores = true;
 }

 if(!isset($_pagi_conteo_alternativo)){
	// Si no se ha elegido el tipo de conteo
	// Se realiza el conteo dese mySQL con COUNT(*)
	$_pagi_conteo_alternativo = false;
 }
 
 if(!isset($_pagi_separador)){
	// Si no se ha elegido un separador
	// Se toma el separador por defecto.
	$_pagi_separador = " | ";
 }
 
  if(isset($_pagi_nav_estilo)){
	// Si se ha definido un estilo para los enlaces, se genera el atributo "class" para el enlace
	$_pagi_nav_estilo_mod = "class=\"$_pagi_nav_estilo\"";
 }else{
 	// Si no, se utiliza una cadena vac&#237;a.
 	$_pagi_nav_estilo_mod = "";
 }
 
 if(!isset($_pagi_nav_anterior)){
	// Si no se ha elegido una cadena para el enlace "siguiente"
	// Se toma la cadena por defecto.
	$_pagi_nav_anterior = "<b>&laquo; Anterior</b>";
 } 
 
 if(!isset($_pagi_nav_siguiente)){
	// Si no se ha elegido una cadena para el enlace "siguiente"
	// Se toma la cadena por defecto.
	$_pagi_nav_siguiente = "<b>Siguiente &raquo;</b>";
 } 

 if(!isset($_pagi_nav_primera)){
	// Si no se ha elegido una cadena para el enlace "primera"
	// Se toma la cadena por defecto.
	$_pagi_nav_primera = "<b>&laquo;&laquo; Primera</b>";
 } 
 
 if(!isset($_pagi_nav_ultima)){
	// Si no se ha elegido una cadena para el enlace "siguiente"
	// Se toma la cadena por defecto.
	$_pagi_nav_ultima = "<b>&Uacute;ltima &raquo;&raquo;</b>";
 } 
 
//------------------------------------------------------------------------


/*
 * Establecimiento de la p&#225;gina actual.
 *------------------------------------------------------------------------
 */
 if (empty($pagi)){
	// Si no se ha hecho click a ninguna p&#225;gina espec&#237;fica
	// O sea si es la primera vez que se ejecuta el script
    	// $_pagi_actual es la pagina actual-->ser&#225; por defecto la primera.
	$_pagi_actual = 1;
 }else{
	// Si se "pidi&#243;" una p&#225;gina espec&#237;fica:
	// La p&#225;gina actual ser&#225; la que se pidi&#243;.
    	$_pagi_actual = $pagi;
 }
//------------------------------------------------------------------------


/*
 * Establecimiento del n&#250;mero de p&#225;ginas y del total de registros.
 *------------------------------------------------------------------------
 */
 // Contamos el total de registros en la BD (para saber cu&#225;ntas p&#225;ginas ser&#225;n)
 // La forma de hacer ese conteo depender&#225; de la variable $_pagi_conteo_alternativo
 if($_pagi_conteo_alternativo == false){
 	$_pagi_sqlConta = eregi_replace("select[[:space:]](.*)[[:space:]]from", "SELECT COUNT(*) FROM", $_pagi_sql);
 	$_pagi_result2 = mysql_query($_pagi_sqlConta);
	// Si ocurri&#243; error y mostrar errores est&#225; activado
 	if($_pagi_result2 == false && $_pagi_mostrar_errores == true){
		die (" Error en la consulta de conteo de registros: $_pagi_sqlConta. Mysql dijo: <b>".mysql_error()."</b>");
 	}
 	$_pagi_totalReg = mysql_result($_pagi_result2,0,0);//total de registros
 }else{
	$_pagi_result3 = mysql_query($_pagi_sql);
	// Si ocurri&#243; error y mostrar errores est&#225; activado
 	if($_pagi_result3 == false && $_pagi_mostrar_errores == true){
		die (" Error en la consulta de conteo alternativo de registros: $_pagi_sql. Mysql dijo: <b>".mysql_error()."</b>");
 	}
	$_pagi_totalReg = mysql_num_rows($_pagi_result3);
 }
 // Calculamos el n&#250;mero de p&#225;ginas (saldr&#225; un decimal)
 // con ceil() redondeamos y $_pagi_totalPags ser&#225; el n&#250;mero total (entero) de p&#225;ginas que tendremos
 $_pagi_totalPags = ceil($_pagi_totalReg / $_pagi_cuantos);

//------------------------------------------------------------------------


/*
 * Propagaci&#243;n de variables por el URL.
 *------------------------------------------------------------------------
 */
 // La idea es pasar tambi&#233;n en los enlaces las variables hayan llegado por url.
 $_pagi_enlace = $_SERVER['PHP_SELF'];
 $_pagi_query_string = "?";
 
 if(!isset($_pagi_propagar)){
 	//Si no se defini&#243; qu&#233; variables propagar, se propagar&#225; todo el $_GET (por compatibilidad con versiones anteriores)
	//Perd&#243;n... no todo el $_GET. Todo menos la variable _pagi_pg
	if (isset($_GET['_pagi_pg'])) unset($_GET['_pagi_pg']); // Eliminamos esa variable del $_GET
	$_pagi_propagar = array_keys($_GET);
 }elseif(!is_array($_pagi_propagar)){
	// si $_pagi_propagar no es un array... grave error!
	die("<b>Error Paginator : </b>La variable \$_pagi_propagar debe ser un array");
 }
 // Este foreach est&#225; tomado de la Clase Paginado de webstudio
 // (http://www.forosdelweb.com/showthread.php?t=65528)
 foreach($_pagi_propagar as $var){
 	if(isset($GLOBALS[$var])){
		// Si la variable es global al script
		$_pagi_query_string.= $var."=".$GLOBALS[$var]."&";
	}elseif(isset($_REQUEST[$var])){
		// Si no es global (o register globals est&#225; en OFF)
		$_pagi_query_string.= $var."=".xss(no_i($_REQUEST[$var]))."&";
	}
 }

 // A&#241;adimos el query string a la url.
 $_pagi_enlace .= $_pagi_query_string;
 
//------------------------------------------------------------------------


/*
 * Generaci&#243;n de los enlaces de paginaci&#243;n.
 *------------------------------------------------------------------------
 */
 // La variable $_pagi_navegacion contendr&#225; los enlaces a las p&#225;ginas.
 $_pagi_navegacion_temporal = array();
 if ($_pagi_actual != 1){
	// Si no estamos en la p&#225;gina 1. Ponemos el enlace "primera"
	$_pagi_url = 1; //ser&#225; el n&#250;mero de p&#225;gina al que enlazamos
	$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_primera</a>";

	// Si no estamos en la p&#225;gina 1. Ponemos el enlace "anterior"
	$_pagi_url = $_pagi_actual - 1; //ser&#225; el n&#250;mero de p&#225;gina al que enlazamos
	$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_anterior</a>";
 }
 
 // La variable $_pagi_nav_num_enlaces sirve para definir cu&#225;ntos enlaces con 
 // n&#250;meros de p&#225;gina se mostrar&#225;n como m&#225;ximo.
 // Ojo: siempre se mostrar&#225; un n&#250;mero impar de enlaces. M&#225;s info en la documentaci&#243;n.
 
 if(!isset($_pagi_nav_num_enlaces)){
	// Si no se defini&#243; la variable $_pagi_nav_num_enlaces
	// Se asume que se mostrar&#225;n todos los n&#250;meros de p&#225;gina en los enlaces.
	$_pagi_nav_desde = 1;//Desde la primera
	$_pagi_nav_hasta = $_pagi_totalPags;//hasta la &#250;ltima
 }else{
	// Si se defini&#243; la variable $_pagi_nav_num_enlaces
	// Calculamos el intervalo para restar y sumar a partir de la p&#225;gina actual
	$_pagi_nav_intervalo = ceil($_pagi_nav_num_enlaces/2) - 1;
	
	// Calculamos desde qu&#233; n&#250;mero de p&#225;gina se mostrar&#225;
	$_pagi_nav_desde = $_pagi_actual - $_pagi_nav_intervalo;
	// Calculamos hasta qu&#233; n&#250;mero de p&#225;gina se mostrar&#225;
	$_pagi_nav_hasta = $_pagi_actual + $_pagi_nav_intervalo;
	
	// Ajustamos los valores anteriores en caso sean resultados no v&#225;lidos
	
	// Si $_pagi_nav_desde es un n&#250;mero negativo
	if($_pagi_nav_desde < 1){
		// Le sumamos la cantidad sobrante al final para mantener el n&#250;mero de enlaces que se quiere mostrar. 
		$_pagi_nav_hasta -= ($_pagi_nav_desde - 1);
		// Establecemos $_pagi_nav_desde como 1.
		$_pagi_nav_desde = 1;
	}
	// Si $_pagi_nav_hasta es un n&#250;mero mayor que el total de p&#225;ginas
	if($_pagi_nav_hasta > $_pagi_totalPags){
		// Le restamos la cantidad excedida al comienzo para mantener el n&#250;mero de enlaces que se quiere mostrar.
		$_pagi_nav_desde -= ($_pagi_nav_hasta - $_pagi_totalPags);
		// Establecemos $_pagi_nav_hasta como el total de p&#225;ginas.
		$_pagi_nav_hasta = $_pagi_totalPags;
		// Hacemos el &#250;ltimo ajuste verificando que al cambiar $_pagi_nav_desde no haya quedado con un valor no v&#225;lido.
		if($_pagi_nav_desde < 1){
			$_pagi_nav_desde = 1;
		}
	}
 }

 for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){//Desde p&#225;gina 1 hasta &#250;ltima p&#225;gina ($_pagi_totalPags)
	if ($_pagi_i == $_pagi_actual) {
		// Si el n&#250;mero de p&#225;gina es la actual ($_pagi_actual). Se escribe el n&#250;mero, pero sin enlace y en negrita.
		$_pagi_navegacion_temporal[] = "<b>$_pagi_i</b>";
	}else{
		// Si es cualquier otro. Se escibe el enlace a dicho n&#250;mero de p&#225;gina.
		$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_i."'>".$_pagi_i."</a>";
	}
 }

 if ($_pagi_actual < $_pagi_totalPags){
	// Si no estamos en la &#250;ltima p&#225;gina. Ponemos el enlace "Siguiente"
	$_pagi_url = $_pagi_actual + 1; //ser&#225; el n&#250;mero de p&#225;gina al que enlazamos
	$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_siguiente</a>";

	// Si no estamos en la &#250;ltima p&#225;gina. Ponemos el enlace "&#218;ltima"
	$_pagi_url = $_pagi_totalPags; //ser&#225; el n&#250;mero de p&#225;gina al que enlazamos
	$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_ultima</a>";
 }
 $_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);

//------------------------------------------------------------------------


/*
 * Obtenci&#243;n de los registros que se mostrar&#225;n en la p&#225;gina actual.
 *------------------------------------------------------------------------
 */
 // Calculamos desde qu&#233; registro se mostrar&#225; en esta p&#225;gina
 // Recordemos que el conteo empieza desde CERO.
 $_pagi_inicial = ($_pagi_actual-1) * $_pagi_cuantos;
 
 // Consulta SQL. Devuelve $cantidad registros empezando desde $_pagi_inicial
 $_pagi_sqlLim = $_pagi_sql." LIMIT $_pagi_inicial,$_pagi_cuantos";
 $_pagi_result = mysql_query($_pagi_sqlLim);
 // Si ocurri&#243; error y mostrar errores est&#225; activado
 if($_pagi_result == false && $_pagi_mostrar_errores == true){
 	die ("Error en la consulta limitada: $_pagi_sqlLim. Mysql dijo: <b>".mysql_error()."</b>");
 }

//------------------------------------------------------------------------


/*
 * Generaci&#243;n de la informaci&#243;n sobre los registros mostrados.
 *------------------------------------------------------------------------
 */
 // N&#250;mero del primer registro de la p&#225;gina actual
 $_pagi_desde = $_pagi_inicial + 1;
 
 // N&#250;mero del &#250;ltimo registro de la p&#225;gina actual
 $_pagi_hasta = $_pagi_inicial + $_pagi_cuantos;
 if($_pagi_hasta > $_pagi_totalReg){
 	// Si estamos en la &#250;ltima p&#225;gina
	// El ultimo registro de la p&#225;gina actual ser&#225; igual al n&#250;mero de registros.
 	$_pagi_hasta = $_pagi_totalReg;
 }
 
 $_pagi_info = "desde el $_pagi_desde hasta el $_pagi_hasta de un total de $_pagi_totalReg";

?>