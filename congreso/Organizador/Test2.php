<?php
function is_valid_email($str) {
  $result = (false !== filter_var($str, FILTER_VALIDATE_EMAIL));

  if ($result)
  {
  	
    list($user, $domain) = explode('@', $str);
  
    $result = checkdnsrr($domain, 'MX');
	}
	return $result;
}
	var_dump(is_valid_email("angie@gmail.com"));
	echo "<br>";
?>
function siglas($NombreCongreso) {
			echo "5. Siglas del congreso:  ";
			$prueba5 = true;
			if (is_string($Nombre) == false) {
				$prueba5 = false;
			}
			return $prueba5;
		}
		var_dump(Nombre("Angie"));
		echo "<br>";