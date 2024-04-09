<?php
echo'<div class="box_title">
		<div class="box_txt">&Uacute;ltimas respuestas</div>
		<div class="box_rss">
		  <a href="javascript:com.actualizar_respuestas()">

		    <span class="systemicons actualizar"></span>
		  </a>
		</div>
	</div>
	<div class="box_cuerpo" id="ult_resp">
		<ul>';
require_once('../comunidades/ultimas-respuestas.php');
mensajes(true,$co['idco']);
		echo'</ul>
	</div>
	<br class="spacer" />
<style>

.avatarList  {
	margin-bottom: 10px;
}

.avatarList li {
	margin: 2px 1px 2px 2px;
}

.avatarList li img {
	float: left;
	border: 1px solid #CCC;
	padding: 1px;
	background: #FFF;
	width: 16px;
	height: 16px;
	display: block;
}

.avatarList li div.userInfo {
	float: left;
	padding: 4px 0 0 5px;
}

.avatarList li div.userInfo span {
	display: block;
	color: #666
}

</style>

		<div class="box_title">
		<div class="box_txt">&Uacute;ltimos Miembros</div>
		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>

	<div class="box_cuerpo">

		<ul class="avatarList clearbeta">';
foreach($miembros['miembros'] as $usermic2){
			echo'<li>
		<a href="/perfil/'.$usermic2['nick'].'">

			<img src="'.$usermic2['avatar'].'" title="'.$usermic2['nick'].'" onerror="error_avatar(this)" />
		</a>
		<div class=userInfo>
			<a href="/perfil/'.$usermic2['nick'].'">'.$usermic2['nick'].'</a>

		</div>
		<div class="clearBoth"></div></li>';}
		echo'</ul>
		<p class="verMas"><a href="/comunidades/'.$co['shortname'].'/miembros/">Ver m&aacute;s &raquo;</a></p>
		<div class="clearBoth"></div>
	</div>';
?>