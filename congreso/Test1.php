<?php 
	function documento($Documento) {
		echo "1. ";
		$pruebaokey = true;
		if (is_integer($Documento) == false) {
			$pruebaokey = false;
		}
		return $pruebaokey;
	}

	var_dump(documento(100761485));
	function documento($Documento) {
		echo "1. ";
		$pruebaokey = true;
		if (is_integer($Documento) == false) {
			$pruebaokey = false;
		}
		return $pruebaokey;
	}

	var_dump(documento(100761485));

?>

