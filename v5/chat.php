<?php
include("header.php");
$titulo	= "Chat!";
cabecera_normal();
$id_user = $_SESSION['id'];

if(empty($id_user)){
fatal_error('Para poder chatear Deves autentificarte.','Ir a la p&aacute;gina principal','location.href=\'/\'','Atenci&oacute;n');}
?>

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->

<style>

.box_title {
background: url(/images/box_title_2.png) repeat-x #E1E1E1;
border: solid 1px #CCCCCC;
text-shadow:0 1px 0 #FFFFFF;
padding-top: 5px;
padding-bottom: 5px;
font-size: 12px;
font-weight: bold;
}

.box_cuerpo{
background: #F9F9F9;
border-bottom: 1px solid #CCCCCC;
border-left: 1px solid #CCCCCC;
border-right: 1px solid #CCCCCC;
font-size: 11px;
}

.box_cuerpo div.filterBy {
  background: #ececec;
}

.avam {margin: 5px;border: 1px solid #cccccc;padding: 1px;height: 48px;width: 48px;}
.avam:hover {border: 1px solid #000;}
.bienvm {background:#FFFFCC; border:1px solid #FFCC33; padding:5px;margin:5px 0 0 0;font-weight: bold; text-align:center;-moz-border-radius: 5px}


</style>


<div class="box_title">
<div class="box_txt destacados">Chat</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">


<object width="925" height="450" id="obj_1297277209828"><param name="movie" value="http://zincomienzo-chat.chatango.com/group"/><param name="wmode" value="transparent"/><param name="AllowScriptAccess" VALUE="always"/><param name="AllowNetworking" VALUE="all"/><param name="AllowFullScreen" VALUE="true"/><param name="flashvars" value="cid=1297277209828&b=60&f=50&l=999999&q=999999&r=100&s=1"/><embed id="emb_1297277209828" src="http://zincomienzo-chat.chatango.com/group" width="925" height="360" wmode="transparent" allowScriptAccess="always" allowNetworking="all" type="application/x-shockwave-flash" allowFullScreen="true" flashvars="cid=1297277209828&b=60&f=50&l=999999&q=999999&r=100&s=1"></embed></object>


</div>

<br class="space" />
<!-- fin cuerpocontainer -->
<?php

pie();
?>
