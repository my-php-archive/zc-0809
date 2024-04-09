<?php
include($_SERVER['DOCUMENT_ROOT']."/header.php");
$titulo	=	$descripcion;
cabecera_normal();

$q = xss(no_i($_GET['q']));
$cat = xss(no_i($_GET['cat']));
$sort_by = xss(no_i($_GET['sort_by']));

echo'<div id="cuerpocontainer">
<div class="comunidades">
<script type="text/javascript">
var buscador = {
	tipo: \'downgrade\', //Google || Taringa!
	tipo2: \'comunidades\', //Comunidades || Temas
	buscadorLite: false,
	onsubmit: function(){

	},

	//Para cambiar motor entre Taringa! y Google
	select: function(tipo){
		if(this.tipo==tipo)
			return;

		//Cambio de action form
		$(\'form[name="buscador"]\').attr(\'action\', \'/comunidades/buscador/\'+tipo+\'/\');

		//Solo hago los cambios visuales si no envia consulta
		if(!this.buscadorLite){
			//Cambio de logo
			$(\'#buscador-logo-\'+this.tipo).css(\'display\', \'none\');
			$(\'#buscador-logo-\'+tipo).css(\'display\', \'inline\');
		}

		this.tipo = tipo;
		//En buscador lite envio consulta
		if(this.buscadorLite){
			this.onsubmit();
			$(\'form[name="buscador"]\').submit();
		}else
			//Foco en input query
			$(\'input[name="q"]\').focus();
	},

	//Para cambiar buscador Comunidades y Temas
	select2: function(tipo2){
		if(this.tipo2==tipo2)
			return;

		//Cambio de action form
		$(\'form[name="buscador"]\').attr(\'action\', \'/comunidades/buscador/\'+tipo2+\'/\');

		this.tipo2 = tipo2;
		//En buscador lite envio consulta
		if(this.buscadorLite){
			this.onsubmit();
			$(\'form[name="buscador"]\').submit();
		}else
			//Foco en input query
			$(\'input[name="q"]\').focus();
	}
}
</script>';
if($q==null and $cat==null and $sort_by==null){
	
	$cat = "-1";
	$sort_by = 1;
	
echo'
<div id="buscadorBig">
	<ul class="searchTabs">
		<li><a href="/posts/buscador/google/">Posts</a></li>
		<li class="here"><a href="">Comunidades</a></li>

	</ul>
	<div class="clearfix"></div>
	<div class="searchCont">
		<div class="searchFil">
			<div style="margin-bottom:5px">
			  <div class="logoMotorSearch">
				  <img class="floatR" id="buscador-logo-taringa" src="'.$images.'/taringaFFF.gif" alt="taringa-search-engine" />
				  <img class="floatR" id="buscador-logo-google" src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="google-search-engine" style="display:none" />
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>

			<div class="boxBox">
				<form style="padding:0;margin:0" name="buscador" method="GET" action="/comunidades/buscador/temas/" onsubmit="window.buscador.onsubmit();">
					<div class="searchEngine">
						<input type="text" name="q" size="25" class="searchBar" value="" />
						<input type="submit" class="mBtn btnOk" value="Buscar" title="Buscar" />

						<div class="clearfix"></div>
					</div>
					<div class="filterSearch">
						<strong>Filtrar:</strong>
						<div class="whereSearch">
							<input type="radio" name="tipo_buscador2" value="comunidades" id="tipo_buscador_comunidades" onclick="window.buscador.select2(\'comunidades\')" /><label for="tipo_buscador_comunidades">Comunidades</label>
							<input type="radio" name="tipo_buscador2" value="temas" id="tipo_buscador_temas" onclick="window.buscador.select2(\'temas\')" checked="checked"/><label for="tipo_buscador_temas">Temas</label>

						</div>
						
						<div class="byCatSearch">
							<label>Categor&iacute;a</label>
							<select name="cat">
								<option value="-1">Todas</option>
		                        <option value="linea">-----</option>';
$categorias=mysql_query("SELECT * FROM c_categorias ORDER BY nom_categoria ASC");
while($cate=mysql_fetch_array($categorias))
{
echo '
<option value="'.$cate['link_categoria'].'">'.$cate['nom_categoria'].'</option>';
}
echo'</select>
						</div>
						<div class="clearfix"></div>

</div>
<div class="clearfix"></div>
</form>
</div></div></div></div></div>';
pie();
exit;
}

	$trozos=explode(" ",$q);
  	$numero=count($trozos); 
	
	if ($cat!="-1"){
		$cadena_categoria = "and link_categoria='$cat'";
	}
	else{
		$cadena_categoria = " ";
	}
	
	switch ($sort_by){
	case "fecha":
	$sort_by = "fechate desc,";
	break;
	case "calificacion":
	$sort_by = "calificacion desc,";
	break;
	case "relevancia":
	$sort_by = "visitaste desc,";
	break;
	default:
	$sort_by = "fechate desc,";
	}
	
	if ($numero==1){
		$_pagi_sql = "SELECT te.*,co.shortname,co.nombre,co.privada,ca.* FROM c_temas as te inner join c_comunidades as co ON co.idco=te.idcomunid	inner join c_categorias as ca ON ca.id_categoria=co.categoria WHERE (titulo LIKE '%$q%' or cuerpo LIKE '%$q%') and elimte='0' ".$cadena_categoria." ORDER BY ".$sort_by." idte DESC ";
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
		$_pagi_sql="SELECT te.*,co.shortname,co.nombre,co.privada,ca.* FROM c_temas as te inner join c_comunidades as co ON co.idco=te.idcomunid	inner join c_categorias as ca ON ca.id_categoria=co.categoria WHERE"; 
		for($x=1;$x<=$ncadenas;$x++){
	   	//echo $cadena[$x]; 
	   	$_pagi_sql.=" (titulo LIKE '%$cadena[$x]%' OR cuerpo LIKE '%$cadena[$x]%') AND"; 
		//estos son los campos que yo use, puedes poner los que quieras 
		} 
		$longiconsulta=strlen($_pagi_sql);
		$_pagi_sql=substr($_pagi_sql,0,($longiconsulta-3));//esto es para quitarle el ultimo OR 
		$_pagi_sql.= $cadena_usuario." and elimte='0'".$cadena_categoria." ORDER BY ".$sort_by." idte desc";//para que haga la ordenacion 
		$q=substr($q,0,$longi);//para corregir un defecto al finalizar la cadena con $ 
		//echo $buscar; 
		//echo $consulta; 
	}
$_pagi_cuantos = 50;
include("../includes/paginator.inc.php");

	echo'
<div id="buscadorLite">
	<ul class="searchTabs">
		<li><a href="/posts/buscador/google/?q='.$q.'&q2='.$q.'&cx=partner-pub-'.$codigo_google.'=FORID%3A10&ie=ISO-8859-1">Posts</a></li>
		<li class="here"><a href="">Comunidades</a></li>

	</ul>
	<div class="clearfix"></div>
	<div class="searchCont">
		<div class="searchFil">
			<div style="margin-bottom:5px">
				<img class="floatR" id="buscador-logo-taringa" src="'.$images.'/taringaFFF.gif" alt="taringa-search-engine" />
				<img class="floatR" id="buscador-logo-google" src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="google-search-engine" style="display:none" />
				<label class="searchWith" style="float: right; display: none">
					<a class="here" href="javascript:buscador.select(\'downgrade\')">Downgrade</a><span class="sep">|</span>

					<a href="javascript:buscador.select(\'google\')">Google</a>
				</label>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<div class="boxBox">
				<form style="margin:0;padding:0;" name="buscador" method="GET" action="/comunidades/buscador/temas/" onsubmit="window.buscador.onsubmit();">
					<div class="searchEngine">

						<input type="text" name="q" size="25" class="searchBar" value="'.$q.'" />
						<input type="submit" class="mBtn btnOk" value="Buscar" title="Buscar" />
						<div class="clearfix"></div>
					</div><!-- End Filter -->
					<div class="filterSearch">
					  <div class="floatL" style="padding-right: 20px; border-right: #CCC solid 1px">
      					<input type="radio" name="tipo_buscador2" value="comunidades" id="tipo_buscador_comunidades" onclick="window.buscador.select2(\'comunidades\')"/><label for="tipo_buscador_comunidades">Comunidades</label><br />
      					<input type="radio" name="tipo_buscador2" value="temas" id="tipo_buscador_temas" onclick="window.buscador.select2(\'temas\')" checked="checked"/><label for="tipo_buscador_temas">Temas</label>

      			</div>
						<div class="floatL" style="padding-left: 20px; border-left: 1px solid #FFF">
							<label>Categoria</label><br />
							<select name="cat" style="width: 200px">
								<option value="-1">Todas</option>
								<option value="linea">-----</option>';
$categorias=mysql_query("SELECT * FROM c_categorias ORDER BY nom_categoria ASC");
while($cate=mysql_fetch_array($categorias))
{
echo '
<option value="'.$cate['link_categoria'].'">'.$cate['nom_categoria'].'</option>';
}
echo'</select>
						</div>
						<div class="clearfix"></div>			
					</div><!-- filter search end s-->

					<div class="clearfix"></div>
				</form>
			</div>
			<div class="clearfix"></div>	
		</div><!-- End SearchFill -->
	</div>
</div>
<div id="resultados" class="resultadosFull">';
if(mysql_num_rows($_pagi_result)>0){
echo'
<div id="showResult" class="floatL">
<table class="linksList">
<thead>
<tr>
<th></th>
<th style="text-align: left;">Mostrando <strong>'.$_pagi_desde.' - '.$_pagi_hasta.'</strong> resultados de <strong>'.$_pagi_totalReg.'</strong></th>
<th><a href="?q='.$q.'&tem=-1&sort_by=fecha">Fecha</a></th>
<th><a href="?q='.$q.'&tem=-1&sort_by=calificacion">Calificaci&oacute;n</a></th>
<th><a class="here" href="?q='.$q.'&tem=-1&sort_by=relevancia">Relevancia</a></th>
</tr>
</thead>
<tbody>';
while($row = mysql_fetch_array($_pagi_result))
{
	echo'<tr><td title="'.$row['nom_categoria'].'"><span class="categoriaCom '.$row['link_categoria'].'"></span></td>
				<td style="text-align: left;">
					<a title="'.$row['titulo'].'" href="/comunidades/'.$row['shortname'].'/'.$row['idte'].'/'.corregir($row['titulo']).'.html" class="titlePost">'.$row['titulo'].'</a><br />

					En <a'.($row['privada']=='2' ? ' class="systemicons cerrada"' : '').' href="/comunidades/'.$row['shortname'].'/">'.$row['nombre'].'</a>
				</td>
				<td title="'.date('d.m.Y',$row['fechate']).' a las '.date('H:m:s',$row['fechate']).' hs.">'.hace($row['fechate']).'</td>
				<td><span class="color_green">'.$row['calificacion'].'</span></td>
				<td>
				  <div class="relevancia" title="88%">
	          <div class="porcentajeRel" style="width:0%">
	          </div>
	        </div>
				</td>
			</tr>';
}
echo'
</tbody>
</table>
</div>
<div class="paginadorBuscador">
<div class="before floatL">
'.$_pagi_navegacion.'
</div>';
}else{
	echo'No hay resultados';
}
echo'</div></div>';
pie();
?>