<?php
include("../header.php"); //comment.vote(this, 3779 comid, 3779postid, userid, 1voto, '25'ni idea)
/****************************/
//error_reporting(0);
$key = $_SESSION['id'];
/****************************/
$comid = xss(no_i($_POST['comid']));
$postid = xss(no_i($_POST['postid']));
$userid = xss(no_i($_POST['userid']));
$voto = xss(no_i($_POST['score']));
/****************************/
if(!$comid or !$postid or !$userid or !$voto)
{
  die("{'status':0,'data':'Faltan datos'}");
}
/****************************/
$menor = -1;
$mayor = 1;
if($voto > $mayor or $voto < $menor)
{
  die("{'status':0,'data':'Votacion erronea'}");
}
/****************************/
$sql = mysql_query("SELECT * FROM commentscore WHERE votante = '{$key}'");
$cant  = mysql_num_rows($sql);
/****************************/
if($cant)
{
  die("{'status':0,'data':'Tu ya habias votado este comentario'}");
}
/***************************/
if(!$key)
{
  die("{'status':0,'data':'Necesitas estar logueado para realizar esta operacion'}");
}
/***************************/
$sqlc = mysql_query("SELECT * FROM comentarios WHERE id = '{$comid}'");
$sqlcn = mysql_num_rows($sqlc);
/***************************/
if(!$sqlcn)
{
  die("{'status':0,'data':'El comentario es inexistente'}");
}
/***************************/
mysql_query("INSERT INTO commentscore VALUES (NULL,'{$comid}','{$postid}','{$userid}','{$voto}','{$key}')") or die(mysql_error());
?>