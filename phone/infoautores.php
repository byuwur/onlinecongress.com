<?php
include_once 'conectar_bd.php';

$response = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = $conex->query("SELECT NombresA, ApellidosA, PaisA, NivelFormacion FROM autores WHERE IdPonencia='$id' ");
    $i = 0;
    while ($row = mysqli_fetch_object($res)) {
        $response[$i] = $row;
        $idcat = $row->PaisA;
        $sqlarray = mysqli_fetch_array($conex->query("SELECT * FROM paises WHERE id='$idcat' "));
        $nomcat = $sqlarray['name_pais'];
        $response[$i] -> NombrePais = $nomcat;
        $i++;
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../congreso/css/bootstrap.min.css" rel="stylesheet">
    <style>
        iframe {
            margin: 0 auto;
            padding: 0;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: block !important;
            position: absolute !important;
            width: 100vw !important;
            /*height: 56.25vw !important;*/
            /* 100/56.25 = 560/315 = 1.778  background: #000; */
        }
    </style>
    <?php
        for ($i = 0; $i < count($response); $i++) {
            ?>
        <div class="row iframe">
            <div class="col-xs-12">
                <?= $response[$i] -> NombresA . " " . $response[$i] -> ApellidosA; ?>
            </div>
            <div class="col-xs-12" style="color:#777;">
                Nombre del autor
            </div>
            <div class="col-xs-6">
                <?= $response[$i] -> NivelFormacion; ?>
            </div>
            <div class="col-xs-6">
                <?= $response[$i] -> NombrePais; ?>
            </div>
            <div class="col-xs-6" style="color:#777;">
                Nivel académico del autor
            </div>
            <div class="col-xs-6" style="color:#777;">
                País del autor
            </div>
        </div>
        <hr style="border-top: 1px solid #777;">
<?php
    }
    //echo json_encode($response);
    exit;
}
?>