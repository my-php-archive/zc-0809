 <?php

 require_once('header.php');

 $pete = $_SESSION['id'];

 $sql = "select * from ips where ip = '190.0.115.16'";
 $eje = mysql_query($sql);
 $rows = mysql_num_rows($eje);
  if($rows<1){

  $putoo = "INSERT INTO ips (id, ip, nick) VALUES (NULL, '190d.0.115.16', 'Timbalentimba')";

mysql_query($putoo);
  }


?>