<?php
include("header.php");


$key = $_SESSION['id'];
if($key==null){
fatal_error('Para editar tu avatar debes autentificarte');
}

$sqlavatar=mysql_query("SELECT avatar FROM usuarios where id='$key'");
$avatar=mysql_fetch_array($sqlavatar);
mysql_free_result($sqlavatar);
$url = $avatar['avatar'];

echo'<script>
function load_new_avatar()
{
	var f=document.forms.per;

	if(f.avatar.value.substring(0, 7)!=\'http://\')
	{
		f.avatar.focus();
		alert(\'La direccion debe comenzar con http://\');
		return;
	}

	window.newAvatar = new Image();
	window.newAvatar.src = f.avatar.value;
	newAvatar.loadBeginTime = (new Date()).getTime();
	newAvatar.onerror = show_error;
	newAvatar.onload = show_new_avatar;
	avatar_check_timeout();
}

function avatar_check_timeout()
{
	if(((new Date()).getTime()-newAvatar.loadBeginTime)>15)
	{
		alert(\'Avatar no recomendable. Razon: Muy lento\');
		document.forms.per.avatar.focus();
	}
}

function show_error()
{
	alert(\'Hubo un error al leer la imagen. Por favor, verifica que la direccion sea correcta.\');
	document.forms.per.avatar.focus();
}

function show_new_avatar()
{
	document.getElementById(\'miAvatar\').src = newAvatar.src;
}
</script>

	

<form name="per" method="post" onsubmit="return load_new_avatar();" action="/miavatar_cambiar.php">



<input class="browse" size="15" type="text" maxlength="255" id="file-avatar" name="avatar" value="'.$url.'" /><br /><button type="submit" class=\"avatar-next local\">Subir</button>
				


					
</form>
		';

?>