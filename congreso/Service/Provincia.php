<?php 
include("conexion.php");

$Id = $_POST['Id'];

$ConsultaG = $conex->query("SELECT * from Provincias WHERE country_id='$Id'");	
$con=1;
$Provincia = array();
while($Ciu=mysqli_fetch_array($ConsultaG)){
    $Provincia[$con] = array('Id_Provincia' => $Ciu['id'], 'Provincia' => $Ciu['name_pro']);
	$con=$con+1;
}
  echo json_encode($Provincia);
?>