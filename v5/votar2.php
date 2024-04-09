<?
include($_SERVER['DOCUMENT_ROOT']."/header.php");
include($_SERVER['DOCUMENT_ROOT'].'/session.php');
$idcoment2 = no_injection($_GET['idcoment']);
$id_user = $_SESSION['id'];
$mal = 1;


$avat	=	mysql_query("SELECT *
				FROM comentarios
				WHERE id_autor  = ".$id_user."
				AND  id = ".$idcoment2."");
	$avat2 = mysql_num_rows($avat) != 0 ? true : false;
	mysql_free_result($avat);



if ($avat2){echo'<div align="center">No puedes votar tus propios comentarios<form>

  <input type="button" value="VOLVER ATRÁS" name="Back2" onclick="history.back()" />
  </div>
 </form>';}else{



$yafuepunteo = mysql_query("SELECT mal FROM prueba WHERE idcoment=".$idcoment2." AND iduser=".$id_user."");
$yafuepunteo2 = mysql_num_rows($yafuepunteo) != 0;
mysql_free_result($yafuepunteo);

if($yafuepunteo2){echo'<div align="center">Ya has votado este comentario<form>

  <input type="button" value="VOLVER ATRÁS" name="Back2" onclick="history.back()" />
  </div>
 </form>';}else{


$sql = "INSERT INTO prueba (idcoment, iduser, mal) ";
$sql.= "VALUES ('$idcoment2', '$id_user', '$mal')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);


echo'El comentario fue votado correctamente pulsa aqui para volver atras';
}}










?>