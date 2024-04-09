<?php
include("header.php");
$titulo	= $descripcion;
cabecera_index();
if(!$key) fatal_error("Para ver los usuarios online debes estar registrado");
$cn='0';
//alimentamos el generador de aleatorios
mt_srand (time());
//generamos un número aleatorio
$foto = $_GET['foto'];
$sexoerrepuntoerre = $_GET['sexo'];
$sexo =  $sexoerrepuntoerre;
$numero_aleatorio = mt_rand(400,500);
if(!$sexo)
{
$q= "SELECT * FROM usuarios WHERE ultimaaccion>unix_timestamp()-2*60 ORDER BY ultimaaccion DESC ";
}
else
{
  $q="SELECT * FROM usuarios WHERE ultimaaccion>unix_timestamp()-2*60";
switch ($sexo)
{
  case "m":
  $q.= " and sexo = 'm' ";
  break;
  case "f":
  $q.= " and sexo = 'f' ";
  break;
  case "a":
  $q= "SELECT * FROM usuarios WHERE ultimaaccion>unix_timestamp()-2*60 ";
  break;
}
$q.="ORDER BY ultimaaccion DESC";
}
$cac = mysql_query($q);
$existe=$db->num_rows($cac);
$existe2=$db->num_rows($cac)*($numero_aleatorio);
echo "
<div id='cuerpocontainer'>
<!-- inicio cuerpocontainer -->";

echo"
<div class='container740 floatL'>



	<div class='box_title'>
		<div class='box_txt usuarios_online'>Usuarios online</div>

		<div class='box_rrs'><div class='box_rss'></div></div>
	</div>
	<div class='box_cuerpo'>
    ";

    echo"
<form action='http://www.zincomienzo.net/usuarios-online/' method='get'>
<table width=\"100%\" border=\"0\">
			<tr>
				<td width=\"11%\" height=\"30\"><strong>Filtrar:</strong></td>
				<td width=\"32%\">Hombres <input type=\"radio\" name=\"sexo\" id=\"sexoM\" value=\"m\" "; if($sexo=="m"){echo' checked';}echo" /> Mujeres <input type=\"radio\" name=\"sexo\" id=\"sexoF\" value=\"f\" "; if($sexo=="f"){echo' checked';}echo"  /> Ambos sexos <input name=\"sexo\" type=\"radio\" id=\"sexoA\" value=\"a\" "; if($sexo=="a"){echo' checked';}echo"   /></td>
				<td width=\"14%\">S&oacute;lo Con Fotos<input type=\"checkbox\" name=\"foto\" id=\"foto\"  /></td>

				<td width=\"19%\"><input type=\"submit\"  class=\"button\" value=\"Filtrar\"  /></td>
			</tr>
		</table>   </form>

	</div>
<br />
<div class='box_title'>
<div class='box_txt usuarios_registrados_online'>Usuarios registrados online: {$existe}</div>
<div class='box_rrs'><div class='box_rss'></div></div>
</div>
<div class='box_cuerpo'>";
  if(!$existe)
    {
      echo'<div class="emptyData">No hay usuarios onlines</div>';
    }

while($r=$db->fetch_array($cac))
{

$cn++;

	echo '<div class="container340 floatL">
			<a href="/perfil/'.$r['nick'].'/">
				<img border="0" src="'.$r['avatar'].'" height="100" align="left" hspace="5" onerror="error_avatar(this)">
     		</a>
			<a href="/perfil/'.$r['nick'].'/"><strong>'.$r['nick'].'</strong></a><br />'.$r['ciudad'].'<br />'.($r['sexo'] == 'f' ? 'Mujer' : 'Hombre').'<br />
			<img src="/images/icon-perfil.png" align="absmiddle" border="0" hspace="3" vspace="2"  /><a href="/perfil/'.$r['nick'].'">Ver Perfil</a><br />';
			if($r['imagenes'] != null){echo'
			<img src="/images/icon-fotos.png" align="absmiddle" border="0" hspace="3" vspace="2" />Con fotos<br />';}
		echo'	<img src="/images/msg.gif" widht="16" height="16" alt="Escribir un mensaje" title="Escribir un mensaje" align="absmiddle" hspace="3" vspace="2"  border="0"> <a href="/mensajes/a/'.$r['nick'].'">Enviar mensaje</a><br />
		</div>';
	
	if($cn % 2 == 0) {
		echo "\n<br clear=\"left\" /><hr /><br clear=\"left\" />\n";
	}
	if($existe==$cn) {
		echo "\n<br clear=\"left\" /><hr /><br clear=\"left\" />\n";		
	}
}

echo "
<center><b> 1 </b></center>
</div>
<br clear='left' />
</div>
<div class='container170 floatR'>
<div class='box_title'>
<div class='box_txt usuarios_online_anunciantes'>Anunciantes</div>
<div class='box_rrs'><div class='box_rss'></div>
</div>
</div>
<div class='box_cuerpo'></div>
</div>
";
pie();
?>