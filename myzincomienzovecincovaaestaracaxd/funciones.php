<?php
function recortar($string,$max)
{
  if(strlen($string)>$max){return substr($string,0,$max);} else {return $string;}
}
function categoria_id($id)
{
  $sql = mysql_query("SELECT * FROM categorias WHERE id_categoria = {$id}");
  $row = mysql_fetch_assoc($sql);
  return $row['link_categoria'];
}
?>