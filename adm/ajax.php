<?php
	$_pagi_sql = "SELECT * FROM acciones ORDER BY ida DESC";
	$rs = mysql_query($_pagi_sql, $con);
	if (mysql_num_rows($rs)!=0){
?>	


<?php
		$_pagi_cuantos = 100; 
		include("paginator.inc.php"); 
		while($row = mysql_fetch_array($_pagi_result)){
					$ida = $row['ida'];
					$idu = $row['idu'];
					$tipo = $row['tipo'];
					$html = $row['html'];
					$fecha = $row['fecha'];

?>


[{"accionObjeto":"comentario","accionTipo":"votar","ts":"23:06:26","nick":"sebi1201","id":8540683,"accion_name":"Voto un comentario","url":"\/posts\/videos\/9756993\/Hace-casi-20-anos_-Menem-atentaba-contra-Pino-Solanas.html","titulo":"Hace casi 20 a\u00f1os, Menem atentaba contra Pino Solanas"}]

<?=urldecode($html)?>

<?php
		}
echo'';}else{echo'';}
?>