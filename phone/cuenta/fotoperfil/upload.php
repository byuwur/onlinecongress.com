<?php
	$id = $_POST['id'];
	$ruta = "user_img/" . $id . ".jpg";
	move_uploaded_file(@$_FILES['file']['tmp_name'], $ruta);
?>