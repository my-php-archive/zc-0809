<?php
include("header.php");
cabecera_normal();
$sql = "SELECT tags FROM posts LIMIT 20";
$roc = mysql_query($sql) or die(mysql_error());
?>
<div id="cuerpocontainer"> 

<div id="tags-trendsBox">
	<br class="space">
	<div class="box_title">
		<div class="box_txt ultimos_comentarios">Últimos tags relevantes  </div>
	</div>
	<div class="box_cuerpo" style="padding:0">		
		<div id="tagcloud" class="textrank-tags">
		<?php
		  while($row = mysql_fetch_assoc($roc)){
		  $tags = explode(",",$row['tags']);
		 //$tags = array_unique($tags);}
		 foreach($tags as $tag){
		    echo'<span class="tag-size2"> <a rel="tag" href="/tags/'.$tag.'">'.$tag.'</a></span>';
        }		
		 
		?>
		</div>
	</div>
</div>
<div style="clear:both"></div> 
<?
pie();
?>