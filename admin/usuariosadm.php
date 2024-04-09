<?php
include('../header.php');
$titulo	=	$descripcion;
cabecera_normal();
$id = $_SESSION['id'];
$sql = "SELECT nick, rango FROM usuarios where id='".$id."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$rango = $row['rango'];
if ($rango=="255" or $rango=="655" or $rango=="755")
{
function estado($valor)
{
$valor = str_replace("0", "<span class=\"color_green\">Activo</span>", $valor);
$valor = str_replace("1", "<span class=\"color_red\">Baneado</span>", $valor);
return $valor;
}
echo"

";
include("menu.php");
echo"
<script src=\"/admin/admin.js?5.7\" type=\"text/javascript\"></script>

";
$_pagi_sql = "select * from usuarios $cadena order by id asc ";
$rs = mysql_query($_pagi_sql,$con);

$_pagi_cuantos = 30; 
include("paginator.inc.php");
while($row = mysql_fetch_array($_pagi_result)){


echo"";
}
echo"";
?>

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->




<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a hreff="/juegos/" title="Administradores" style="color:#000">Administradores</a>

	</div>
    <div class="clima-h-data">
		<div>



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
					<img src="<?=$avatar?>" width="16" height="16" />
					<a href="/perfil/<?=$nick?>/"><?=$nick?></a>

					<span><?=$puntos?></span>
				</li>
<?php
}
?>
							
</div></div></div>
		





<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a hreff="/juegos/" title="Moderadores" style="color:#000">Moderadores</a>

	</div>
    <div class="clima-h-data">
		<div>
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

					<span><?=$puntos?></span>
				</li>
<?php
}
?>


</div></div></div>




<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a hreff="/juegos/" title="Gold User" style="color:#000">Gold User</a>

	</div>
    <div class="clima-h-data">
		<div>

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

					<span><?=$puntos?></span>
				</li>
<?php
}
?>
						
</div></div></div>


<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a hreff="/juegos/" title="Silver User" style="color:#000">Silver User</a>

	</div>
    <div class="clima-h-data">
		<div>

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

					<span><?=$puntos?></span>
				</li>
<?php
}
?>

</div></div></div>						

<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a hreff="/juegos/" title="Great User" style="color:#000">Great User</a>

	</div>
    <div class="clima-h-data">
		<div>

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

					<span><?=$puntos?></span>
				</li>
<?php
}
?>


</div></div></div>
	

<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a hreff="/juegos/" title="Full User" style="color:#000">Full User</a>

	</div>
    <div class="clima-h-data">
		<div>
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

					<span><?=$puntos?></span>
				</li>
<?php
}
?>

</div></div></div>

		
<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a hreff="/juegos/" title="New Full User" style="color:#000">New Full User</a>

	</div>
    <div class="clima-h-data">
		<div>
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

					<span><?=$puntos?></span>
				</li>
<?php
}
?>

</div></div></div>
		




<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a hreff="/juegos/" title="Novatos" style="color:#000">Novatos</a>

	</div>
    <div class="clima-h-data">
		<div>
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

					<span><?=$puntos?></span>
				</li>
<?php
}
?>

</div></div></div>
	

<div class="climaHome clearbeta">

	<div class="clima-h-city">
		<a hreff="/juegos/" title="Diseñador" style="color:#000">Diseñador</a>

	</div>
    <div class="clima-h-data">
		<div>
<?php 
$sql = "SELECT id, nick, puntos,avatar ";
$sql.= "FROM usuarios 
WHERE ban = 0 AND rango=10
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

					<span><?=$puntos?></span>
				</li>
<?php
}
?>
	</div></div></div>


</div><div style="clear:both"></div>
<!-- fin cuerpocontainer -->
<?
}
pie();
?>