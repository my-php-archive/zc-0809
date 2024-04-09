<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_buscador();
?>
<body class="home posts">
		<div id="wrapper">
		<div class="taringa-search">
	<div class="taringa-bar">
		<ul class="search-options"  style="height:27px;	margin:0 auto;	padding:0;	width:610px;">
						<li><a href="" onClick="window.search.home_change('internet', this); return false">Web</a></li> 
						<li class="active"><a href="" onClick="window.search.home_change('posts', this); return false">Posts</a></li>

			<li><a href="" onClick="window.search.home_change('comunidades', this); return false">Comunidades</a></li>
						<li id="logo">
			</li>
		</ul>
	
	</div>
	<div class="search clearfix">
		<div class="search-box">
			<form class="clearfix" name="search-box" style="padding:0;margin:0" action="/posts/" method="GET" onSubmit="window.search.onsubmit()">

				<div class="input-left"></div>			
				<input type="text" autocomplete="off" class="sinput" value="" name="q" title="Search" >
				<input type="hidden" name="engine" value="google" />
				<div class="input-right"></div>
				<div class="btn-search floatL">
					<a href="javascript:$('form[name=search-box]').submit()"></a>
				</div>
			</form>
			<div class="filter-adv open">

				<div>
					<div class="filterSearch clearfix" style="display:none">
						<div id="filterPosts">
							<div class="floatL">
								<ul class="clearfix"> 
									<li>
										<label>Categor&iacute;a</label>
										<select class="filterCategoria" onChange="search.q_focus()">

											<option value="-1" selected="selected" autocomplete="off">Todas</option>
<?php
$categorias=mysql_query("SELECT * FROM categorias ORDER BY nom_categoria ASC");
while($cate=mysql_fetch_array($categorias))
{
echo '
<option value="'.$cate['link_categoria'].'">'.$cate['nom_categoria'].'</option>';
}
?></select>

									</li>
									<li>
										<span>
											<label>Autor</label>
											<input type="text" class="filterAutor" value="" onKeyPress="window.search.intro_submit(event)" />
										</span>
									</li>
								</ul>

							</div>
							
							
						</div>
						<div id="filterComunidades" style="display:none">
							<div class="floatL">
								<ul class="clearfix">
									<li>
									<label>Categor&iacute;a</label>
										<select class="filterCategoria" onChange="search.q_focus()">

											<option value="-1">Todas</option>
<?php
$categorias=mysql_query("SELECT * FROM c_categorias ORDER BY nom_categoria ASC");
while($cate=mysql_fetch_array($categorias))
{
echo '
<option value="'.$cate['link_categoria'].'">'.$cate['nom_categoria'].'</option>';
}
?></select>
									</li>
									<li class="whereSearch">
										<label><input type="radio" name="tipo_buscador" value="temas" onClick="search.q_focus()" />Temas</label>
										<label><input type="radio" name="tipo_buscador" value="comunidades" onClick="search.q_focus()" />Comunidades</label>

<label><input type="radio" name="tipo_buscador" value="empleos" onClick="search.q_focus()" />Empleos</label>									</li>

								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<a onClick="window.search.filterSearch_show(); return false" class="search-btn-option">Opciones</a>
				<script type="text/javascript">$('form[name="search-box"] input[name="q"]').focus(); search.home_change_actual = 'posts';</script>

			</div>
			<div class="clearBoth"></div>
		</div>
		
	</div>
	
	<div id="homeEmpleos" style="display:none">
		<strong>Empleos m&aacute;s buscados:</strong>
		<a href="/empleos?q=supervisor">supervisor</a>, <a href="/empleos?q=analista">analista</a>, <a href="/empleos?q=soporte">soporte</a>, <a href="/empleos?q=programadores">programadores</a>, <a href="/empleos?q=desarrollador">desarrollador</a>, <a href="/empleos?q=telecomunicaciones">telecomunicaciones</a>, <a href="/empleos?q=operador">operador</a>, <a href="/empleos?q=helpdesk">helpdesk</a>, <a href="/empleos?q=administrador">administrador</a>, <a href="/empleos?q=ingeniero">ingeniero</a>, <a href="/empleos?q=cajero">cajero</a>	</div>	
		</div>
	</body>
</html>

</html>