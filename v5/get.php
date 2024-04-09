<?php
function Quitar($string)
{
  $string = mysql_real_escape_string($string);
  //$string = stripslashes($string);
  return $string;
}

echo Quitar("''''''''''''''''''''''''''''''''");

//echo get_html_translation_table("<script>alert('caca')</script>");
?>