<?php

if (isset($_POST["id"])) {
	if (!empty($_POST["id"])) {
		$id = trim($_POST["id"]);
		$id = strip_tags($id);
		$id = htmlspecialchars($id);
	}
	?>
	<link rel="stylesheet" type="text/css" href="dropzone.css">
	<script src="jquery.min.js"></script>
	<script src="dropzone.js"></script>
	<div class="container">
		<p style="color:#f44">*La imagen debe tener un peso máximo de 5 megabytes.</p>
		<div class="row">
			<form action="upload.php" method="POST" class="dropzone" id="myDropzone">
				<input type="hidden" name="id" value="<?= $id ?>">
			</form>
		</div>
		<p style="color:#000">La imagen se cargará automáticamente cuando la seleccione.</p>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			Dropzone.options.myDropzone = {
				maxFileSize: 5,
				acceptedFiles: "image/jpeg",
				init: function init() {
					this.on("error", function() {
						alert("Error al cargar el arhivo");
					});
				}
			}
		});
	</script>
<?php
}
?>