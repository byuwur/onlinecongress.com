<?php 
include("conexion.php");
include('Variables.php');
include("../Idc.php");
include('Head.php');
$sql=$conex->query("SELECT * FROM ponencia, ponente WHERE ponencia.IdPonencia='$IdPonencia' AND ponente.Id_Congreso='$Idc' AND ponencia.IdPonencia=ponente.IdPonencia");
$Resultado=mysqli_fetch_assoc($sql);
echo '
<div class="container">
	<div class="well">
		<h1 style="text-align:center;">INFORMACIÓN DE '; 
			if ($Tipo==1) {
                  echo "CONFERENCIA";
            }else{
                  echo "PONENCIA";
            } 
		echo'
		</h1>
		<hr style="color:#0277bd; background:#0277bd; width:20%;" class="center-block">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h5>Título</h5>
				<p style="color: #818181">'.$Resultado['Titulo'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
			    <h5>Resumen</h5>
				<p style="color: #818181">'.$Resultado['Resumen'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-4">
			    <h5>Idioma</h5>
				<p style="color: #818181">'.$Resultado['Idioma'].'</p>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-8">
			    <h5>Sitio web</h5>
				<p style="color: #818181">'.$Resultado['SitioWeb'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
			    <h5>Institución patrocinadora</h5>
				<p style="color: #818181">'.$Resultado['InstitucionPatrocinadora'].'</p>
			</div>
		</div>
		';
$sql1=$conex->query("SELECT ponente.TipoDocumento,ponente.IdPonente,ponente.Nombres,ponente.Apellidos,ponente.Email,ponente.Telefono,ponente.Institucion,ponente.ResumenPonente,ponente.NivelFormacion,paises.name_pais, provincias.name_pro FROM ponente,paises,provincias WHERE ponente.IdPonencia='$IdPonencia' AND paises.id=ponente.Pais AND provincias.id=ponente.Provincia AND ponente.Tipo='$Tipo' AND ponente.Id_Congreso='$Idc'");
$Resultado1=mysqli_fetch_assoc($sql1);
echo '
		<h3>'; 
			if ($Tipo==1) {
                  echo "Conferencista";
            }else{
                  echo "Ponente";
            } 
		echo'</h3>
		<hr style="color:#0277bd; background:#0277bd; width:30%; margin-left:1px">
		<div class="row">
			<div class="form-group col-xs-12 col-sm-3" style="margin-top: 28px;">
			    <h5>Tipo de documento</h5>
				<p style="color: #818181">'.$Resultado1['TipoDocumento'].'</p>
			 </div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<h5>Número de documento</h5>
				<p style="color: #818181">'.$Resultado1['IdPonente'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<h5>Nombre(s)</h5>
				<p style="color: #818181">'.$Resultado1['Nombres'].'</p>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<h5>Apellido(s)</h5>
				<p style="color: #818181">'.$Resultado1['Apellidos'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<h5>Email</h5>
				<p style="color: #818181">'.$Resultado1['Email'].'</p>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-2">
				<h5>Teléfono</h5>
				<p style="color: #818181">'.$Resultado1['Telefono'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
				<h5>Institución académica donde labora</h5>
				<p style="color: #818181">'.$Resultado1['Institucion'].'</p>
			</div>
		</div>
		<div class="row">
			<div style="margin-top: 0px;" class="form-group col-xs-12">
				<h5>Resumen bibliográfico del ';
				if ($Tipo==1) {
		            	echo "conferencista";
		            }else{
		            	echo "Ponente";
		        } 
				echo'</h5>
				<p style="color: #818181">'.$Resultado1['ResumenPonente'].'</p>
			</div>
		</div>
		<div class="row">
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-3">
				<h5>País</h5>
				<p style="color: #818181">'.$Resultado1['name_pais'].'</p>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-3">
				<h5>Provincia</h5>
				<p style="color: #818181">'.$Resultado1['name_pro'].'</p>
			</div>
			';
				$sqlC=$conex->query("SELECT ciudades.name_ciu FROM ponente, ciudades WHERE ponente.IdPonencia='$IdPonencia' AND ciudades.id=ponente.Ciudad AND Tipo='$Tipo' AND ponente.Id_Congreso='$Idc'");
				$RC=mysqli_fetch_assoc($sqlC);
				if ($RC['name_ciu']!="") {
					echo '<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-3">
						<h5>Ciudad</h5>
						<p style="color: #818181">'.$RC['name_ciu'].'</p>
					</div>';
				}
		echo'
		</div>';
$Autores=array("Primer Autor","Segundo Autor","Tercer Autor");
$Cont=0;
$sql2=$conex->query("SELECT autores.TipoDocumentoA, autores.IdAutor, autores.NombresA, autores.ApellidosA, autores.EmailA, autores.InsPatroA, paises.name_pais, provincias.name_pro FROM autores, paises, provincias WHERE IdPonencia='$IdPonencia' AND paises.id=autores.PaisA AND provincias.id=autores.ProvinciaA AND autores.Id_Congreso='$Idc'");
while ($Resultado2=mysqli_fetch_assoc($sql2)){
	echo '
		<h3>'.$Autores[$Cont].'</h3>
		<hr style="color:#0277bd; background:#0277bd; width:30%; margin-left:1px">
		<div class="row">
			<div class="form-group col-xs-12 col-sm-3" style="margin-top: 28px;">
			    <h5>Tipo de documento</h5>
				<p style="color: #818181">'.$Resultado2['TipoDocumentoA'].'</p>
			 </div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<h5>Número de documento</h5>
				<p style="color: #818181">'.$Resultado2['IdAutor'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<h5>Nombre(s)</h5>
				<p style="color: #818181">'.$Resultado2['NombresA'].'</p>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<h5>Apellido(s)</h5>
				<p style="color: #818181">'.$Resultado2['ApellidosA'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-6">
				<h5>Email</h5>
				<p style="color: #818181">'.$Resultado2['EmailA'].'</p>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-6">
				<h5>Institución académica donde labora</h5l>
				<p style="color: #818181">'.$Resultado2['InsPatroA'].'</p>
			</div>
		</div>
		<div class="row">
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-3">
				<h5>País</h5>
				<p style="color: #818181">'.$Resultado2['name_pais'].'</p>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-3">
				<h5>Provincia</h5>
				<p style="color: #818181">'.$Resultado2['name_pro'].'</p>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-3">
				<h5>Ciudad</h5>
				<p style="color: #818181">';
					$IdA = $Resultado2['IdAutor'];
					$sqlC=$conex->query("SELECT ciudades.name_ciu FROM ponente, ciudades, autores WHERE ponente.IdPonencia='$IdPonencia' AND autores.IdAutor='$IdA' AND ciudades.id=autores.CiudadA AND ponente.Id_Congreso='$Idc'");
				$RC=mysqli_fetch_assoc($sqlC);
				if ($RC['name_ciu']!="") {
					echo '
						<p style="color: #818181">'.$RC['name_ciu'].'</p>';
					}
				echo'</p>
			</div>
		</div>';
		$Cont=$Cont+1;
	}
	echo "
	</div>
</div>";
include('footer.php');?>