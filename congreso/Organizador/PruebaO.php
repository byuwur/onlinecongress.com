<?php
	
	function tipo($TipoDocumento) {
			echo "1. El tipo de documento: ";
			$prueba1 = true;
			if (is_string($TipoDocumento) == false) {
				$prueba1 = false;
			}
			return $prueba1;
		}
		var_dump(tipo("100761485"));
		echo "<br>";


	function documento($Documento) {
			echo "2. Número de documento: ";
			$prueba2 = true;
			if (is_integer($Documento) == false) {
				$prueba2 = false;
			}
			return $prueba2;
		}
		var_dump(documento(100761485));
		echo "<br>";


	function nombre($Nombre) {
			echo "3. Nombre:  ";
			$prueba3 = true;
			if (is_string($Nombre) == false) {
				$prueba3 = false;
			}
			return $prueba3;
		}
		var_dump(Nombre("Angie"));
		echo "<br>";

		function is_valid_email($str) {
			echo "4. Email: ";
			  $prueba4 = (false !== filter_var($str, FILTER_VALIDATE_EMAIL));

			  if ($prueba4)
			  {
			  	
			    list($user, $domain) = explode('@', $str);
			  
			    $prueba4 = checkdnsrr($domain, 'MX');
				}
				return $prueba4;
			}
		var_dump(is_valid_email("angie@gmail.com"));
		echo "<br>";


		function siglas($NombreCongreso) {
			echo "5. Siglas del congreso:  ";
			$prueba5 = true;
			if (is_string($NombreCongreso) == false) {
				$prueba5 = false;
			}
			return $prueba5;
		}
		var_dump(siglas("andavel"));
		echo "<br>";


?>