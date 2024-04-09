<?php
include($_SERVER['DOCUMENT_ROOT']."/header.php");
$titulo	=	$descripcion;
cabecera_normal();

$q = xss(no_i($_GET['q']));
$autor = xss(no_i($_GET['autor']));
$cat = xss(no_i($_GET['cat']));
$sort_by = xss(no_i($_GET['sort_by']));

echo'<div id="cuerpocontainer">
<script type="text/javascript">
var buscador = {
	tipo: \'Zincomienzo\',
	buscadorLite: false,
	onsubmit: function(){
		if(this.tipo==\'google\')
			if($(\'select[name="cat"]\').val()==\'-1\')
				$(\'input[name="q"]\').val($(\'input[name="q2"]\').val());
			else
				$(\'input[name="q"]\').val(\'site:Zincomienzo.net/posts/\'+$(\'select[name="cat"]\').val()+\'/ \' + $(\'input[name="q2"]\').val());
	},
	select: function(tipo){
		if(this.tipo==tipo)
			return;

		//Cambio de action form
		$(\'form[name="buscador"]\').attr(\'action\', \'/posts/buscador/\'+tipo+\'/\');

		//Solo hago los cambios visuales si no envia consulta
		if(!this.buscadorLite){
			//Cambio here en <a />
			$(\'a#select_\' + this.tipo).removeClass(\'here\');
			$(\'a#select_\' + tipo).addClass(\'here\');

			//Cambio de logo
			$(\'img#buscador-logo-\'+this.tipo).css(\'display\', \'none\');
			$(\'img#buscador-logo-\'+tipo).css(\'display\', \'inline\');

			//Muestro/oculto el input autor
			if(tipo==\'Zincomienzo\')
				$(\'span#filtro_autor\').show();
			else
				$(\'span#filtro_autor\').hide();
		}

		//Muestro/oculto los input google
		if(tipo==\'google\'){ //Ahora es google
			$(\'input[name="q"]\').attr(\'name\', \'q2\');
			$(\'form[name="buscador"]\').append(\'<input type="hidden" name="q" value="" /><input type="hidden" name="cx" value="partner-pub-5717128494977839:armknb-nql0" /><input type="hidden" name="cof" value="FORID:10" /><input type="hidden" name="ie" value="ISO-8859-1" />\');
		}else if(this.tipo==\'google\'){ //El anterior fue google
			$(\'input[name="q"]\').remove();
			$(\'input[name="cx"]\').remove();
			$(\'input[name="cof"]\').remove();
			$(\'input[name="ie"]\').remove();
			$(\'input[name="q2"]\').attr(\'name\', \'q\');
		}

		this.tipo = tipo;
		//En buscador lite envio consulta
		if(this.buscadorLite){
			this.onsubmit();
			$(\'form[name="buscador"]\').submit();
		}else{
			//Foco en input query
			if(this.tipo==\'google\')
				$(\'input[name="q2"]\').focus();
			else
				$(\'input[name="q"]\').focus();
		}
	}
}
</script>';
if($q==null and $autor==null and $cat==null and $sort_by==null){
	
	$cat = "-1";
	$sort_by = 1;
	
echo'
<div id="buscadorBig">
	<ul class="searchTabs">
		<li class="here"><a href="">Posts</a></li>
		<li><a href="/comunidades/buscador/comunidades/">Comunidades</a></li>
		<li class="clearfix"></li>
	</ul>
	<div class="clearBoth"></div>

	<div class="searchCont">
		<form  style="padding:0;margin:0" name="buscador" method="GET" action="/posts/buscador/tags/" onsubmit="window.buscador.onsubmit();">
			<div class="searchFil">
				<div style="margin-bottom:5px">
					<div class="logoMotorSearch">
						<img id="buscador-logo-google" src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="google-search-engine" style="height: 16px;display:none" />
						<img id="buscador-logo-taringa" src="/images/taringaFFF.gif" alt="taringa-search-engine" style="display:none" />
						<img id="buscador-logo-tags" src="/images/taringaFFF.gif" alt="tags-search-engine" />
					</div>

					<label class="searchWith">
													<a id="select_google" href="javascript:buscador.select(\'google\')">Google</a><span class="sep">|</span>
												<a id="select_taringa" href="javascript:buscador.select(\'Zincomienzo\')">Zincomienzo</a><span class="sep">|</span>
						<a id="select_tags" class="here" href="javascript:buscador.select(\'tags\')">Tags</a>
					</label>
					<div class="clearfix"></div>

				</div>
				<div class="clearfix"></div>
			
				<div class="boxBox">
					<div class="searchEngine">
						<input type="text" name="q" size="25" class="searchBar" value="" />
						<input type="submit" class="mBtn btnOk" value="Buscar" title="Buscar" />
  					<div class="clearfix"></div>
					</div>
					<!-- End Filter -->

					<div class="filterSearch">
					  <strong>Filtrar:</strong>
						<div class="floatL">
							<label>Categor&iacute;a</label>
							<select name="cat" style="width: 200px">
								<option value="-1">Todas</option>
                                    		<option value="animaciones">Animaciones</option>

                                    		<option value="apuntes-y-monografias">Apuntes y Monograf&iacute;as</option>
                                    		<option value="arte">Arte</option>
                                    		<option value="autos-motos">Autos y Motos</option>
                                    		<option value="celulares">Celulares</option>
                                    		<option value="comics">Comics e Historietas</option>
                                    		<option value="deportes">Deportes</option>

                                    		<option value="downloads">Downloads</option>
                                    		<option value="ebooks-tutoriales">E-books y Tutoriales</option>
                                    		<option value="economia-negocios">Econom&iacute;a y Negocios</option>
                                    		<option value="femme">Femme</option>
                                    		<option value="humor">Humor</option>
                                    		<option value="imagenes">Im&aacute;genes</option>

                                    		<option value="info">Info</option>
                                    		<option value="juegos">Juegos</option>
                                    		<option value="links">Links</option>
                                    		<option value="linux">Linux y GNU</option>
                                    		<option value="mac">Mac</option>
                                    		<option value="manga-anime">Manga y Anime</option>

                                    		<option value="mascotas">Mascotas</option>
                                    		<option value="musica">M&uacute;sica</option>
                                    		<option value="noticias">Noticias</option>
                                    		<option value="offtopic">Off-topic</option>
                                    		<option value="patrocinados">Patrocinados</option>
                                    		<option value="recetas-y-cocina">Recetas y Cocina</option>

                                    		<option value="salud-bienestar">Salud y Bienestar</option>
                                    		<option value="solidaridad">Solidaridad</option>
                                    		<option value="Zincomienzo">Zincomienzo</option>
                                    		<option value="turismo">Turismo</option>
                                    		<option value="tv-peliculas-series">TV, Peliculas y series</option>
                                    		<option value="videos">Videos On-line</option>

                  							</select>
							<span id="filtro_autor" style="display:none">
								<label>Usuario</label>
								<input type="text" value="" name="autor" />
							</span>
						</div>
						<div class="clearfix"></div>
					</div>

					<!-- End SearchFill -->
					<div class="clearfix"></div>
					
				</div>
			  <div class="clearfix"></div>
			</div>
			<!-- End SearchFill -->
		</form>
	</div>
</div>';
exit;
pie();
}

	$trozos=explode(" ",$q);
  	$numero=count($trozos); 
	
	$sql = "SELECT id FROM usuarios WHERE nick='$autor' ";
	$rs = mysql_query($sql,$con);
	if (mysql_num_rows($rs)>0){
		$row = mysql_fetch_array($rs);
		$id_usuario = $row['id'];
	}
	else{
		$id_usuario = 0;
	}

	if ($cat>="1" and $cat<="7" and is_numeric($cat)){
		$cadena_categoria = " and categoria='$cat '";
	}
	else{
		$cadena_categoria = " ";
	}

	if ($autor!=""){
		$cadena_usuario = " and id_autor='$id_usuario' ";
	}
	else{
		$cadena_usuario = " ";
	}
	
	switch ($sort_by){
	case 1:
	$sort_by = "fecha desc,";
	break;
	case 2:
	$sort_by = "puntos desc,";
	break;
	case 0:
	$sort_by = "";
	break;
	default:
	$sort_by = "fecha desc,";
	}
	
	if ($numero==1){
		$_pagi_sql = "SELECT id, id_autor, titulo, tags, privado, fecha, puntos, categoria, c.link_categoria, c.nom_categoria
					  FROM posts as p  
					  inner join categorias as c
					  on p.categoria=c.id_categoria
					  WHERE (tags LIKE '%$q%')".$cadena_usuario." and elim='0'".$cadena_categoria."  
					  ORDER BY ".$sort_by." id DESC";
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
		$_pagi_sql="SELECT id, id_autor, titulo, privado, categoria, c.link_categoria
					FROM posts as p  
					inner join categorias as c
					on p.categoria=c.id_categoria 
					WHERE"; 
		for($x=1;$x<=$ncadenas;$x++){ 
	   	//echo $cadena[$x]; 
	   	$_pagi_sql.=" (titulo LIKE '%$cadena[$x]%' OR contenido LIKE '%$cadena[$x]%') AND"; 
		//estos son los campos que yo use, puedes poner los que quieras 
		} 
		$longiconsulta=strlen($_pagi_sql); 
		$_pagi_sql=substr($_pagi_sql,0,($longiconsulta-3));//esto es para quitarle el ultimo OR 
		$_pagi_sql.= $cadena_usuario." and elim='0'".$cadena_categoria." ORDER BY ".$sort_by." id desc";//para que haga la ordenacion 
		$q=substr($q,0,$longi);//para corregir un defecto al finalizar la cadena con $ 
		//echo $buscar; 
		//echo $consulta; 
	}
$_pagi_cuantos = 50;
include("includes/paginator.inc.php");

	echo'
	<div id="buscadorLite">
	<ul class="searchTabs">
		<li class="here"><a href="">Posts</a></li>
		<li><a href="/comunidades/buscador/comunidades/?q='.$q.'">Comunidades</a></li>
		<div class="clearBoth"></div>
	</ul>
	<div class="clearBoth"></div>

	<div class="searchCont">
		<form name="buscador" method="GET" action="/posts/buscador/tags/" onsubmit="window.buscador.onsubmit();">
			<div class="searchFil">
				<div style="margin-bottom:5px">
					<img id="buscador-logo-google" src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="google-search-engine" style="display:none" />
					<img id="buscador-logo-taringa" src="/images/taringaFFF.gif" alt="taringa-search-engine" style="display:none" />
					<img id="buscador-logo-tags" src="/images/taringaFFF.gif" alt="tags-search-engine" />
					<label class="searchWith" style="float: right">

													<a href="javascript:buscador.select(\'google\')">Google</a><span class="sep">|</span>
												<a href="javascript:buscador.select(\'Zincomienzo\')">Zincomienzo</a><span class="sep">|</span>
						<a class="here" href="javascript:buscador.select(\'tags\')">Tags</a>
					</label>
					<div class="clearfix"></div>
				</div>

				<div class="clearBoth"></div>
				<div class="boxBox">
					<div class="searchEngine">
						<input type="text" name="q" size="25" class="searchBar" value="'.$q.'" />
						<input type="submit" class="mBtn btnOk" value="Buscar" title="Buscar" />
					</div><!-- End Filter -->
					<div class="filterSearch">
						<div class="floatL">
							<label>Categoria</label><br />

							<select name="cat" style="width: 150px">
								<option value="-1">Todas</option>
																<option value="animaciones">Animaciones</option>
																<option value="apuntes-y-monografias">Apuntes y Monograf&iacute;as</option>
																<option value="arte">Arte</option>
																<option value="autos-motos">Autos y Motos</option>

																<option value="celulares">Celulares</option>
																<option value="comics">Comics e Historietas</option>
																<option value="deportes">Deportes</option>
																<option value="downloads">Downloads</option>
																<option value="ebooks-tutoriales">E-books y Tutoriales</option>
																<option value="economia-negocios">Econom&iacute;a y Negocios</option>

																<option value="femme">Femme</option>
																<option value="humor">Humor</option>
																<option value="imagenes">Im&aacute;genes</option>
																<option value="info">Info</option>
																<option value="juegos">Juegos</option>
																<option value="links">Links</option>

																<option value="linux">Linux y GNU</option>
																<option value="mac">Mac</option>
																<option value="manga-anime">Manga y Anime</option>
																<option value="mascotas">Mascotas</option>
																<option value="musica">M&uacute;sica</option>
																<option value="noticias">Noticias</option>

																<option value="offtopic">Off-topic</option>
																<option value="patrocinados">Patrocinados</option>
																<option value="recetas-y-cocina">Recetas y Cocina</option>
																<option value="salud-bienestar">Salud y Bienestar</option>
																<option value="solidaridad">Solidaridad</option>
																<option value="Zincomienzo">Zincomienzo</option>

																<option value="turismo">Turismo</option>
																<option value="tv-peliculas-series">TV, Peliculas y series</option>
																<option value="videos">Videos On-line</option>
														</select>
							<span id="filtro_autor" style="display:none">
								<label>Usuario</label>
								<input type="text" value="" name="autor" />

							</span>
						</div>
						<div class="clearfix"></div>
					</div><!-- End SearchFill -->
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>	
			</div><!-- End SearchFill -->
		</form>

	</div>
</div>';
if(mysql_num_rows($_pagi_result)>0){
echo'
<div id="resultados">
<div id="avisosTop"></div>

<div id="showResult">
<table class="linksList">
<thead>
<tr>
<th></th>
<th style="text-align: left;">Mostrando <strong>'.$_pagi_desde.' - '.$_pagi_hasta.'</strong> resultados de <strong>'.$_pagi_totalReg.'</strong></th>
<th><a class="here" href="?q='.$q.'&cat='.$cat.'&sort_by=1">Fecha</a></th>
<th><a href="?q='.$q.'&cat='.$cat.'&sort_by=2">Puntos</a></th>
</tr>
</thead>
<tbody>';
while($row = mysql_fetch_array($_pagi_result))
{
	echo'<tr id="div_'.$row['id'].'">
					<td title="'.$row['nom_categoria'].'"><span class="categoriaPost '.$row['link_categoria'].'"></span></td>
					<td style="text-align: left;">
						<a title="'.$row['titulo'].'" href="/posts/'.$row['link_categoria'].'/'.$row['id'].'/'.corregir($row['titulo']).'.html" class="titlePost">'.$row['titulo'].'</a>

					</td>
					<td title="'.date("d.m.Y", ($row['fecha'])).' a las '.date("H:m", ($row['fecha'])).' hs.">'.hace($row['fecha']).'</td>
					<td><span class="color_green">'.$row['puntos'].'</span></td>
				</tr>';
}
echo'
</tbody>
</table>
</div>

<!-- Paginado -->
<div id="avisosBot"></div>
<div class="paginadorBuscador">
<div class="before floatL">
'.$_pagi_navegacion.'
</div>
<!-- FIN - Paginado -->';
}else{
	echo'<div id="resultados" style="width:100%">
	<div class="emptyData">
		No hay resultados
	</div>';
}
echo'</div>';
pie();
?>