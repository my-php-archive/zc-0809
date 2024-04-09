<?php
include("../header.php"); //comment.vote(this, 3779 comid, 3779postid, userid, 1voto, '25'ni idea)
/**************  {"status":0,"data":"'.$_POST["id"].'"}  **************/
//error_reporting(0);
$key = $_SESSION['id'];     

$comid = xss(no_i($_POST['id']));
$postid = xss(no_i($_POST['postid']));
$userid = xss(no_i($_POST['userid']));
$voto = xss(no_i($_POST['score']));
                                      /******/
	$posi = 1;
	$nega = -1;
	
 
 if(!is_numeric($voto)) die('{"status":0,"data":"El voto debe ser de valor numerico."}');
 if(!$key)  die('{"status":0,"data":"Debes iniciar session para votar este comentarios."}');
 /**********/
 $post = mysql_query("SELECT * FROM posts WHERE id = '$postid'");
 if(empty(mysql_num_rows($post)))  die('{"status":0,"data":"El post fue eliminado o no existe."}');
 /**********/
 $comentario = mysql_query("SELECT * FROM comentarios WHERE id = '$comid'");
 if(!mysql_num_rows($comentario)) die('{"status":0,"data":"El comentario fue eliminado o no existe."}');
 if($posi > 1 or $nega > -1) die('{"status":0,"data":"Que paso tacataca, si antes votabas de a 1."}');
 /*********/
 # Nos aseguramos de que no haya votado varias veces
 $votado = mysql_query("SELECT * FROM coomment_votes WHERE id_comment = '$comid' AND id_votador = '$key'");
 if(mysql_num_rows($votado)) die('{"status":0,"data":"Ya habias votado este comentario."}');
 /*********/
 # Vamos a hacer los inserts
 #
 # Nos aseguramos de que no haya una columna con votos.
 #
 #
 //
 // 
 $editar = mysql_query("SELECT * FROM Comment_vote WHERE id_comentario = '$comid'");
 //
 if(mysql_num_rows($editar))
   {
 switch ($voto){
  case $nega:
  mysql_query("INSERT INTO Comment_vote (id_comentario,post_id,nega,posi) VALUES ('{$comid}','{$postid}','{$nega}',NULL)");
  break;
  default;
  case $posi:
  mysql_query("INSERT INTO Comment_vote (id_comentario,post_id,nega,posi) VALUES ('{$comid}','{$postid}',NULL,'{$posi}')");
  break;
  mysql_query("INSERT INTO comment_votes (id_comment,id_votador) VALUES ('{$comid}','{$key}')");
 }
   }
   else
 {
   switch ($voto){
  case $nega:
  mysql_query("UPDATE Comment_vote SET nega = nega-1 WHERE id_comentario = '$comid'");
  break;
  default;
  case $posi:
  mysql_query("UPDATE Comment_vote SET nega = posi+1 WHERE id_comentario = '$comid'");
  break;
  mysql_query("INSERT INTO comment_votes (id_comment,id_votador) VALUES ('{$comid}','{$key}')");
 }  
?>