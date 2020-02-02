<?php include('Head.php');
include('Nav.php');
include("conexion.php");
include('Idc.php');

$Cate = $_GET['C'];

$Query0=$conex->query("SELECT Categoria FROM categorias WHERE Id='$Cate' AND Id_Congreso='$Idc'");
$Cate0=mysqli_fetch_assoc($Query0);

$Query=$conex->query("SELECT ponente.Tipo,ponencia.Categoria,ponencia.IdPonencia, ponente.Fotografia, ponencia.Titulo, ponencia.Resumen, ponencia.Idioma FROM ponencia, categorias, ponente WHERE ponencia.IdPonencia=ponente.IdPonencia AND ponencia.Categoria='$Cate' AND categorias.Id='$Cate' AND ponencia.Estado=1 AND ponente.Id_Congreso='$Idc' AND categorias.Id_Congreso='$Idc'");
echo '<div class="container" style="margin-top: 150px;">
	<div class="row">';
while ($Cate1=mysqli_fetch_assoc($Query)) {
$Titulo= substr($Cate1['Titulo'], 0, 110);
$CantTitulo=0;
$CantTitulo = strlen($Cate1['Titulo']);
if ($CantTitulo>110) {
	$Puntos="...";
}else{
	$Puntos="";
}
$Resumen= substr($Cate1['Resumen'], 0, 150); 
if ($Cate1['Tipo']==1) {
	$TipoImagen=$Cate1['Fotografia'];
}else{
	$TipoImagen="ImgCategorias/Ponente.svg";
}
echo '
		<div class="col-sm-6">
			<div class="well" style="height:435px; width:540px;">
				<div class="row">
					<div class="col-sm-12">
						<img style="max-height: 152px; min-height: 152px;" src="'.$TipoImagen.'" class="img-responsive animar2 center-block">
					</div>
					<div class="col-sm-12">
						<h4>'.$Titulo.$Puntos.'</h4>
						<h5 style="color: #ff5722">'.$Cate0['Categoria'].'</h5>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<p style="color: #818181; font-size: 16px;">
							'.$Resumen.'...
						</p>
						<p class="text-right">';
							if ($Cate1['Tipo']==1) {
								echo '<a href="InformacionC.php?P='.$Cate1['IdPonencia'].'" class="btn btn-warning" style="">VER DETALLES</a>';
							}else{
								echo '<a href="InformacionP.php?P='.$Cate1['IdPonencia'].'" class="btn btn-warning" style="">VER DETALLES</a>';
							}
						echo '                 			
                		</p>
					</div>
				</div>
			</div>
		</div>';
}
if (mysqli_num_rows($Query)=="") {
	echo '
		<div class="col-sm-6">
			<div class="well">
				<div class="row">
					<div class="col-xs-2 col-sm-4">
						<img src="Img_Web/Iconos/Advertencia.svg" style="width:100%" class="img-responsive center-block">
					</div>
					<div class="col-xs-10 col-sm-8">
						<h3>
							Lo sentimos aún no se ha inscriptos ningún proyecto a esta categoría.
						</h3>
					</div>
				</div>
			</div>
		</div>
	';
}
echo '</div>
</div>';
include('footer.php'); ?>