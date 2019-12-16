<?php
/*PRUEBA FORMULARIO ORGANIZADOR PARA CREAR UN ADMINISTRADOR*/ 
	function documento($Documento) {
		echo "1. ";
		$pruebaokey = true;
		if (is_integer($Documento) == false) {
			$pruebaokey = false;
		}
		return $pruebaokey;
	}
	var_dump(documento(100761485));
	echo "<br>";

	function nombre($Nombre) {
		echo "2. ";
		$pruebaokey2 = true;
		if (is_string($Nombre) == false) {
			$pruebaokey2 = false;
		}
		return $pruebaokey2;
	}
	var_dump(Nombre("Angie"));
	echo "<br>";

		function is_valid_email($str) {
		echo "4. ";
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

			function nombrecongreso($nombrecongreso) {
				echo "5. ";
				$prueba5 = true;
				if (is_string($nombrecongreso) == false) {
					$prueba5 = false;
				}
			return $prueba5;
		}
	var_dump(nombrecongreso("Tecnologia"));
	echo "<br>";


	function devolverReferencia($siglas) {
		echo "20. prueba";
		$unaReferencia = true
		    return $unaReferencia;
		    return $devolverReferencia<7;
		}

		$nuevaReferencia =& devolverReferencia();

			
?>