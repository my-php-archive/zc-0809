<?php
function is_admin($mirango){
$rangos = array(255,100,755,655);
  foreach($rangos as $rank){
    if($rank == $mirango){
	 return 1;
	}
	else{
	 return 0;
	}
  }
}

echo is_admin(255);

?>