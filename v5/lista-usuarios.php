<?php
include('header.php');
$titulo	=	$descripcion;
cabecera_normal();
$id = $_SESSION['id'];
$id_user = $_SESSION['id'];

if(empty($id_user)){
fatal_error('Para ver la secci&oacute;n de Lista De Usuarios Debes autentificarse.','Ir a la p&aacute;gina principal','location.href=\'/\'','Atenci&oacute;n');}
$sql = "SELECT nick, rango FROM usuarios where id='".$id."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

function estado($valor)
{
$valor = str_replace("0", "<span class=\"color_green\">Activo</span>", $valor);
$valor = str_replace("1", "<span class=\"color_red\">Baneado</span>", $valor);
return $valor;
}
echo"

";

echo"
<script src=\"/admin/admin.js?5.7\" type=\"text/javascript\"></script>

";
$_pagi_sql = "select * from usuarios $cadena order by id asc ";
$rs = mysql_query($_pagi_sql,$con);

{


echo"";
}
echo"";
?>




<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->



<div class="box_title">
<div class="box_txt destacados">Desarrolladores</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">




<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=255
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 

<li class="categoriaUsuario clearfix">
					
					

						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>
							
</div>
		
<br>




<div class="box_title">
<div class="box_txt destacados">Due&ntilde;os</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">




<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=755
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 

<li class="categoriaUsuario clearfix">
					
					

						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>
							
</div>
		
<br>


<div class="box_title">
<div class="box_txt destacados">Supervisores</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">




<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=655
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 

<li class="categoriaUsuario clearfix">
					
					

						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>
							
</div>
		
<br>















<div class="box_title">
<div class="box_txt destacados">Moderadores</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">
<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=100
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>

</div>
		
<br>


<div class="box_title">
<div class="box_txt destacados">Gold User</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">

<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=16
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>
						
</div>
		
<br>


<div class="box_title">
<div class="box_txt destacados">Silver User</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">

<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=15
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>

</div>
		
<br>						

<div class="box_title">
<div class="box_txt destacados">Great User</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">

<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=14
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>


</div>
		
<br>
	

<div class="box_title">
<div class="box_txt destacados">Full User</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">

<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=13
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>

</div>
		
<br>

		
<div class="box_title">
<div class="box_txt destacados">New Full User</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">
<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=12
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>

</div>
		
<br>
		




<div class="box_title">
<div class="box_txt destacados">Novatos</div>
<div class="box_rss"></div>
</div>

<div class="box_cuerpo">
<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=11
ORDER BY puntos DESC";
				$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
{
$id = $row['id'];
$nick	=	$row['nick'];
$avatar	=	$row['avatar'];
$puntos = $row['puntos'];
$cant = strlen($titu);
if($cant > 41)
{
$titulo2=substr(stripslashes($titulop), 0, 38);
$tit=1;
}
else
{
$titulo2=$titulop;
$tit=0;
}
?>
						 <li class="categoriaUsuario clearfix">
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					
				</li>
<?php
}
?>

</div>
		
<br>
	



<div style="clear:both"></div>
<!-- fin cuerpocontainer -->
<?

pie();
?>