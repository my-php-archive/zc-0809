<?php
include("header.php");
$q = xss(no_i($_GET['q']));
$q2 = xss(no_i($_GET['q2']));
$autor = xss(no_i($_GET['autor']));
$cat = xss(no_i($_GET['cat']));
$titulo	=	$q;
cabecera_buscadorw();
 ?>
<body class="internet">
		<div id="wrapper">
		<div id="header" class="clearfix">
	<div class="taringa-bar clearfix">
		<ul class="floatL">
			<li class="tab-search iconos16 tab-home"><a href="<?=$url?>"><span></span></a></li>
						<li class="tab-search iconos16 tab-web selected"><a href=""><span></span> Web</a></li>

						<li class="tab-search iconos16 tab-posts"><a href="/posts?q=<?=$q?>"><span></span> Posts</a></li>
			<li class="tab-search iconos16 tab-comunidades"><a href="/comunidades?type=temas&q=<?=$q?>"><span></span> Comunidades</a></li>
					</ul>
		<? menubu();?>
				
				
	<div class="search clearfix">

		<div id="logo">
			<a href="/"><?=$comunidad?></a>
		</div>
		<div class="search-box clearfix">
			<form name="buscar">
				<div class="input-left"></div>			
				<input type="text" name="q" value="<?=$q?>" />
				<div class="input-right"></div>
								<div class="btn-search floatL">

					<a href="javascript:$('form[name=buscar]').submit()"></a>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="container clearfix">
		<div id="sidebar">
		<div class="filter-box">
	<h6><a href="#"><span class="iconos16 icon-expand"></span></a> <a href="#">Creado</a></h6>

	<ul>

	</ul>

</div>
	</div>
	<div id="results" class="results">
		<style type="text/css">@import url(http://www.google.com/cse/api/branding.css);</style>
<script type="text/javascript">
	var googleSearchIframeName = "results";
	var googleSearchFormName = "cse-search-box";
	var googleSearchFrameWidth = 794;
	var googleSearchDomain = "www.google.com";
	var googleSearchPath = "/cse";

	var googleSearchCof = "FORID:10";
	var googleSearchCx = "<?=$codigo_google?>";
	var googleSearchIe = "UTF-8";
	var googleSearchQueryString = "<?=$q?>";

	var googleSearchTbs = "";
</script>
<script type="text/javascript" src="<?=$images?>/search/show_afs_search.js"></script>
	</div>
		<div id="avisosVert"></div>
	</div>

<script type="text/javascript">
	var optionst = {
		'query' : "<?=$q?>",
		'container' : 'avisosTop',
		'number' : '3',
		'channel' : '4859299527',
		'colorText' : '#000000',
		'colorTitleLink' : '#0000de',
		'colorDomainLink' : '#228822',
		'colorBackground' : '#FFFFFF',
		'colorBorder': '#FFFFFF',
		'colorText' : '#666666', 
		'linkTarget' : '_blank',
		'hl' : 'es',
		'adsafe' : 'low'
	};
	
	var optionsv = {
		'query' : "<?=$q?>",
		'container' : 'avisosVert',
		'number' : '8',
		'channel' : '2380070868',
		'format' : 'narrow',
		'colorText' : '#000000',
		'colorTitleLink' : '#0000de',
		'colorDomainLink' : '#228822',
		'colorBackground' : '#ffffff',
		'colorBorder': '#ffffff',
		'colorText' : '#666666', 
		'linkTarget' : '_blank',
		'hl' : 'es',
		'adsafe' : 'low'
	};

	var dynamicAd = new google.ads.search.Ad(optionst);
	var dynamicAd = new google.ads.search.Ad(optionsv);

</script>
		</div>
	</body>
</html>