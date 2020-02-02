<?php 
include("conexion.php");

$Id = $_POST['Id'];

$ConsultaG = $conex->query("SELECT * from Ciudades WHERE state_id='$Id'");	
$con=1;
$Ciudad = array();
while($Ciu=mysqli_fetch_array($ConsultaG)){
    $Ciudad[$con] = array('Id_Ciudad' => $Ciu['id'], 'Ciudad' => $Ciu['name_ciu']);
	$con=$con+1;
}
  echo json_encode($Ciudad);
?>