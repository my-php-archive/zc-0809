<?php
include("../header.php"); //comment.vote(this, 3779 comid, 3779postid, userid, 1voto, '25'ni idea)
/****************************/
//error_reporting(0);
/*$key = $_SESSION['id'];     */

$comid = $_POST['comid'];
/*$postid = xss(no_i($_POST['postid']));
$userid = xss(no_i($_POST['userid']));
$voto = xss(no_i($_POST['score']));
                                      */
 die('{"status":0,"data":"'.$_POST["comid"].'"}');

?>