<?php 
include('Head.php');
include('Nav.php'); 
echo "
  <style type='text/css'>
    hr{
      background: $ResultadoI[Color];
    }
  </style>
";
?>
  <div id="Inicio"></div>
<div class="slider-container" style="overflow: hidden;">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
    <div class="slide slide-0 active">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <p class="slide__text-desc" style="font-size: 22px;">
          <?php echo $ResultadoI['Texto1'];?>
          </p>
           <!--p class="slide__text-desc" style="font-size: 22px;">
          Para el Segundo Congreso Virtual Argentino e Iberoamericano de Tecnología y Educación - COVAITE 2019.  Se tendrá la publicación digital de las memorias del congreso con registro ISBN, con aquellos resúmenes de comunicación aprobados por el comité científico revisor.  Lo anterior con la colaboración de la Editorial de la Universidad Técnica de Machala de Ecuador.</p-->
        </div>
      </div>
    </div>
    <div class="slide slide-1 " style="background-image: url("../Img_Web/Slider/image-1.jpg");">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <!--h3 style="font-size: 40px;" class="slide__text-heading">Educación, tecnología, investigaciones y experiencias.</h3-->
          <p class="slide__text-desc" style="font-size: 22px;">
            <?php echo $ResultadoI['Texto2'];?>
          </p>
        </div>
      </div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h3 class="slide__text-heading">
            <?php echo $ResultadoI['Texto3'];?></h3>
          <!--p class="slide__text-desc" style="font-size: 22px;">Sumate y sé parte de un evento educativo único en Latinoamérica. COVAITE ¡Te espera!.</p-->
        </div>
      </div>
    </div>
    <!--div class="slide slide-3">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Sumate</h2>
          <p class="slide__text-desc" style="font-size: 22px;">Al evento educativo del Año. Si eres docente.<BR>¿Te lo vas a perder?</p>
        </div>
      </div>
    </div-->
  </div>
</div>
<br><br><br>
<!--iframe src="Patrosinadores.php" style="height: 100px;"></iframe-->
<div class="container">
  <div class="row">
    <h2 class="section-heading" style="text-align: center;">PATROCINADORES</h2>
    <hr class="section-heading-spacer center-block" style="width:20%">
    <div class="col-xs-2 col-sm-2">
      <a target="_blank" href="http://www.itfip.edu.co/" class="thumb">
          <img style="height: 110px; width: 120px;" class="center-block img-responsive" src="Img_Web/Patrocinadores/logoitfip.png">
      </a>
    </div>
    <div class="col-xs-3 col-sm-3">
      <a target="_blank" href="https://utn.edu.ar/es/" class="thumb">
        <img class="center-block img-responsive" src="Img_Web/Patrocinadores/UTLR.png">
      </a>
    </div>
    <div class="col-xs-2 col-sm-2">
      <a target="_blank" class="thumb">
        <img style="height: 100px; width: 100px;" class="center-block img-responsive"  src="Img_Web/Patrocinadores/Naucalpan.png">
      </a>
    </div>
    <div class="col-xs-3 col-sm-3">
      <a target="_blank" href="http://www.uncuyo.edu.ar/" class="thumb">
        <img class="center-block img-responsive"  src="Img_Web/Patrocinadores/UNC.png">
      </a>
    </div>
    <div class="col-xs-2 col-sm-2">
      <a target="_blank" href="http://www.weapp.com.co" class="thumb">
        <img class="center-block img-responsive"  src="Img_Web/Patrocinadores/Weapp.png">
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-3 col-sm-3">
      <a target="_blank" href="http://www.sara.com.co/" class="thumb">
        <img class="center-block img-responsive"  src="Img_Web/Patrocinadores/Sara.png">
      </a>
    </div>
    <div class="col-xs-2 col-sm-3">
      <a target="_blank" href="http://sistemas-i-computacion-tic.com/" class="thumb">
        <img class="center-block img-responsive"  src="Img_Web/Patrocinadores/TIC.png">
      </a>
    </div>
    <div class="col-xs-3 col-sm-3">
      <a target="_blank" href="http://sistemas-i-computacion-tic.com/" class="thumb">
        <img class="center-block img-responsive" src="Img_Web/Patrocinadores/gridsoa.png">
      </a>
    </div>
  </div>
</div>
 <div id="services" class="content-section-b">
  <div class="Alto container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-sm-12">
        <hr class="section-heading-spacer" style="width:20%">
        <div class="clearfix"></div>
        <h2 class="section-heading">¿Que significa <?php echo $ResultadoI['Nombre'];?>?</h2>
        <p style="text-align: left; color: #818181; font-size: 24px;"><?php echo $ResultadoI['Que_es'];?></p>
        <h2 class="section-heading">Sobre el Congreso</h2>
        <p style="text-align: left; color: #818181; font-size: 24px;">
          <?php echo $ResultadoI['Sobre_Congreso'];?>
        </p>
        <h2 style="color: #81818" class="section-heading">¿Quienes pueden participar?</h2>
        <p style="color: #818181; text-align:left; font-size: 24px" class="lead"><?php echo $ResultadoI['Quienes'];?></p>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-2 col-sm-offset-6">
      <a target="_blank" <?php echo 'href="'.$ResultadoI[Facebook].'"'; ?>>
      <img src="Img_Web/Faceboock.svg" class="img-responsive center-block">
      </a>
    </div>
    <div class="col-xs-12 col-sm-2">
      <a target="_blank" <?php echo 'href="'.$ResultadoI[Twitter].'"'; ?>>
      <img src="Img_Web/Twitter.svg" class="img-responsive center-block">
      </a>
    </div>
    <div class="col-xs-12 col-sm-2">
      <a target="_blank" <?php echo 'href="'.$ResultadoI[Youtube].'"'; ?>>
      <img src="Img_Web/Youtube.svg" class="img-responsive center-block">
      </a>
    </div>
  </div>
</div>
<br>

<?php 
include("conexion.php");
date_default_timezone_set('America/Bogota');
$Fecha = date("Y-m-d");
$sql=$conex->query("SELECT ponente.Fotografia, ponente.Nombres, ponente.Apellidos, ponente.NivelFormacion, ponente.Email, ponencia.Titulo, ponencia.Resumen, ponencia.Idioma, ponencia.InstitucionPatrocinadora, ponencia.SitioWeb,paises.name_pais FROM ponente, ponencia, paises, programacion WHERE ponencia.IdPonencia=programacion.IdPonencia AND ponente.IdPonencia=programacion.IdPonencia AND programacion.Fecha='$Fecha' AND programacion.Tipo=1 AND ponente.Pais=paises.id AND ponencia.Estado=1 AND ponente.Id_Congreso='$Idc' ");
echo '
  <style type="text/css">
    h4{
      color:#0277bd;
    }
    p{
      font-size: 16px;
    }
  </style>';
if (mysqli_num_rows($sql)>0) {
echo'
<div class="container">
  <div class="row">
    <h1 style="color:#818181;font-size: 64px;text-align: center;">Conferencia del día</h1>
    <div class="col-xs-12 col-sm-12">
      ';
while ($ResultadoC=mysqli_fetch_assoc($sql)) {
  $Nombre=$ResultadoC['Nombres'];
  if ($Nombre!="") {
  echo'
    <div class="row">
      <hr style="width: 10" class="center-block">
      <div class="col-xs-12 col-sm-4">';
        echo "
        <div class='row'>
          <div class='col-xs-12 col-sm-12'>
            <img style='background-size: 295px 356px; width: 295px; height: 356px;' src='".$ResultadoC['Fotografia']."' class='img-responsive'>
          </div>";
        echo '
          <div class="col-xs-12 col-sm-12">
            <h4>Autor</h4>
            <p>'.$ResultadoC['Nombres'].' '.$ResultadoC['Apellidos'].'</p>
          </div>
          <div class="col-xs-12 col-sm-12">
            <h4>Nivel formación</h4>
            <p>'.$ResultadoC['NivelFormacion'].'</p>
          </div>
          <div class="col-xs-12 col-sm-6">
            <h4>Pais</h4>
            <p>'.$ResultadoC['name_pais'].'</p>
          </div>
        </div>
      </div>';

      $Resumen= substr($ResultadoC['Resumen'], 0, 650); 
        echo '
      <div class="col-xs-12 col-sm-8">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <h4>Titulo de la conferencia</h4>
            <p>'.$ResultadoC['Titulo'].'</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <h4>Resumen</h4>
            <p>
            '.$ResultadoC['Resumen'].'
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <h4>Idioma de la ponencia</h4>
            <p>
            '.$ResultadoC['Idioma'].'
            </p>
          </div>
        </div>
        <br>
      </div>
    </div>';
  }
}
}
    echo "
    </div>
  </div>
</div>";
?>
<?php
  date_default_timezone_set('America/Bogota'); 
  include("conexion.php");
$Query2 = $conex->query("SELECT DISTINCT programacion.IdPonencia FROM programacion, ponencia, ponente WHERE programacion.Tipo='0' AND Ponencia.Estado='1' AND programacion.IdPonencia=ponencia.IdPonencia AND ponente.IdPonencia=ponencia.IdPonencia AND ponente.Id_Congreso='$Idc' ORDER BY RAND() LIMIT 4");
if (mysqli_num_rows($Query2)>0) {
      echo '
<div class="container" style="margin-top: 5%"></div>
<div class="parallax-window" data-parallax="scroll" data-image-src="Img_Web/texture-map-A.png">
    <div class="Alto container">
      <div class="container">
        <div class="row">
          <h1 style="color:#fff;font-size: 64px;text-align: center;">Ponencias destacadas</h1>
          <hr style="width: 10%;" class="center-block">
      ';
            while($IdP = mysqli_fetch_assoc($Query2)){
              $IdPonencia = $IdP['IdPonencia'];
            $Query3 = $conex->query("SELECT ponencia.Categoria, ponencia.IdPonencia, ponencia.Titulo, ponente.Nombres, ponente.Apellidos, ponente.Fotografia, paises.name_pais, programacion.Fecha FROM ponencia, paises, ponente, programacion WHERE programacion.IdPonencia='$IdPonencia' AND ponencia.IdPonencia='$IdPonencia' AND ponencia.Estado=1 AND ponente.IdPonencia='$IdPonencia' AND paises.id=ponente.Pais AND ponencia.Tipo=0 AND ponente.Id_Congreso='$Idc'");
              $Resultado = mysqli_fetch_assoc($Query3);
              $Nombre = strstr($Resultado['Nombres'], ' ', true);
              if ($Nombre=="") {
                $Nombre = $Resultado['Nombres'];
              }
              $Apellidos = strstr($Resultado['Apellidos'], ' ', true);
               if ($Apellidos=="") {
                $Apellidos = $Resultado['Apellidos'];
              }
              $Titulo= substr($Resultado['Titulo'], 0, 50); 
              //***************Sacar la fecha*******************
              $A1 = substr($Resultado['Fecha'], 0, 4); 
              $M1 = substr($Resultado['Fecha'], 5, 2); 
              $D1 = substr($Resultado['Fecha'], 8, 2);
              $meses1 = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
              $Fecha1=date($D1)." de ".$meses1[date($M1)-1]. " del ".date($A1);
              echo '
              <div style="margin-top: 1%" class="col-sm-3 animar4">
                <div class="card">
                  <figure class="snip1543" style="cursor:pointer;"><img style="max-height:120px; min-height:120px;" src="http://www.onlinecongress.com.co/ImgCategorias/'.$Resultado['Categoria'].'.png" alt="sample101" />
                    <figcaption>
                      <h3>'.$Nombre.' '.$Apellidos.'</h3>
                      <p>'.$Resultado['name_pais'].'</p>
                    </figcaption>
                  </figure>
                  <div class="card-body">
                    <p class="card-text" style="font-size: 18px;">'.$Titulo.'...</p>
                  </div>
                  <hr style="margin-left:15px;width: 30%;" align="left">
                  <p class="card-text" style="color: #818181;font-size: 15px; font-style: italic; padding-left: 15px;">Fecha: '.$Fecha1.'<br>
                  </p>
                  <p class="text-right">
                    <a href="InformacionP.php?P='.$Resultado['IdPonencia'].'" class="btn btn-warning" style="">VER DETALLES</a>
                  </p>
                </div>
              </div>';
          }
echo '</div>
      </div>
    </div>
</div>';
}
?>
<?php
  date_default_timezone_set('America/Bogota'); 
         
          $Sql1=$conex->query("SELECT DISTINCT ponencia.Estado, programacion.Fecha FROM ponencia,programacion, ponente WHERE programacion.Tipo=0 AND ponencia.Estado=1 AND programacion.IdPonencia=ponencia.IdPonencia AND ponente.IdPonencia=ponencia.IdPonencia AND ponente.Id_Congreso='$Idc' ORDER BY Fecha ASC");
$Vali=mysqli_num_rows($Sql1);
if ($Vali!=0) {       
        echo ' 
<div class="container" style="margin-top:3%; height:500px;" id="Ponencias">
  <h3 style="color:#818181;font-size: 44px;text-align: center;">Todas las ponencias</h3>
          <hr style="width: 10%; color: #0277bd" class="center-block">
  <p style="font-size:18px; text-align:center">La agenda ha sido organizada, si desea saber quienes son los ponentes y autores de las presentaciones, puede dirigirse al menú categorías y seleccionar una de ellas.</p>
  <div class="row well animar2" style="z-index: 1000">
    <div class="col-sm-2" style="border-right: dashed 3px '.$ResultadoI[Color].';">
      <p>';
          while ($RDias=mysqli_fetch_assoc($Sql1)) {
            $F1=$RDias['Fecha'];
            $Prueba1 = $conex->query("SELECT (ELT(WEEKDAY('$F1') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA1 FROM programacion");
            $Prueba11 = mysqli_fetch_assoc($Prueba1);
            echo '<a class="btn btn-raised btn-info btn-ponentes" data-toggle="tab" href="#'.$Prueba11['DIA_SEMANA1'].'" style="width: 100%; color; color:#fff">'.$Prueba11['DIA_SEMANA1'].'
            </a>';
          }
echo '
      </p>
    </div>
    <div class="col-sm-10" style="overflow-x: hidden; overflow-y:auto;">
      <div class="container" style="height: 450px;">';
    $Cont2=0;
    $Sql2=$conex->query("SELECT DISTINCT ponencia.Estado, programacion.Fecha FROM ponencia,programacion,ponente WHERE programacion.Tipo=0 AND ponencia.Estado=1 AND programacion.IdPonencia=ponencia.IdPonencia AND ponente.IdPonencia=ponencia.IdPonencia AND ponente.Id_Congreso='$Idc' ORDER BY Fecha ASC");
    while ($Fechas3=mysqli_fetch_assoc($Sql2)) {
      if ($Cont2==0) {
        $active=" in active";
      }else{
        $active="";
      }
      $F=$Fechas3['Fecha'];

      $Prueba = $conex->query("SELECT (ELT(WEEKDAY('$F') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA FROM programacion");
      $Prueba1 = mysqli_fetch_assoc($Prueba);

      echo'<div style="position: absolute" class="tab-pane fade'.$active.'" id="'.$Prueba1['DIA_SEMANA'].'">';
      $Cont2=$Cont2+1;

         $Sql3=$conex->query("SELECT ponencia.Categoria,ponencia.IdPonencia, ponencia.Titulo, ponencia.Resumen, ponente.Nombres, ponente.Apellidos, ponente.Fotografia, programacion.Fecha FROM programacion, ponencia, ponente WHERE programacion.IdPonencia=ponencia.IdPonencia AND programacion.IdPonencia=ponente.IdPonencia AND ponencia.IdPonencia=ponente.IdPonencia AND programacion.Fecha='$F' AND programacion.Tipo=0 AND ponente.Id_Congreso='$Idc' /*ORDER BY Hora ASC*/");
        while ($ResultadoP=mysqli_fetch_assoc($Sql3)) {
          $FechaHoy=$ResultadoP['Fecha'];
          $Id = "";
          $Id = $ResultadoP['IdPonencia'];
          $A = substr($FechaHoy, 0, 4); 
          $M = substr($FechaHoy, 5, 2); 
          $D = substr($FechaHoy, 8, 2); 

            date_default_timezone_set('America/Bogota'); 

            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $FechaP=date($D)." de ".$meses[date($M)-1]. " del ".date($A);
          echo '
            <div style="position:relative" class="row" name="Repetir">
              <div class="col-xs-12 col-sm-3">
                <div class="Img_Comentario center-block">
                  <img src="http://covaite.com/ImgCategorias/'.$ResultadoP['Categoria'].'.png" class="img-responsive center-block">
                </div>
              </div>
              <div class="col-xs-12 col-sm-9">
                <div class="papers Ubicacion">
                  <h2>'.$ResultadoP['Titulo'].'</h2>
                  <span style="color:#5e5e5e; font-size: 18px; font-style: italic;"><strong>Ponente: </strong>'.$ResultadoP['Nombres'].' '.$ResultadoP['Apellidos'].'</span>
                  <span style="color:'.$ResultadoI[Color].';font-size:14px; float:right; padding-right:15px;">'.$FechaP.' 
                  </span>
                  
                </div>
              </div>
              <hr class="center-block section-heading-spacer" style=" width:70%"">
            </div>
          ';
        }
      echo '</div>';
    }
    echo "</div>
    </div>
  </div>
</div> ";
}
?>
       
<div class="Alto Fondo_Section content-section-b" style="position:relative;">
  <div class="container-fluid" style="margin-top: 160px;">
    <div class="row">
      <h2 class="section-heading" style="text-align:center;">¿Por qué participar en <?php echo $ResultadoI[Nombre]?>?</h2>
      <br>
      <br>
      <div class="animar1 col-sm-6">
        <img style="z-index: 901" class="img-responsive" src="Img_Web/image-5.jpg" alt="">
      </div>
      <div class="col-sm-6" style="z-index: 900">
            <p style="font-size: 18px; text-align: justify;">
              <?php echo $ResultadoI[Por_que]; ?>
                
            </p>
      </div>
    </div>
  </div>
</div>
<!--div class="container" style="margin-top:-100px;">
    <div class="row">
      <div class="col-sm-12">
          <BR>
          <br>
          <h2 style="font-size: 64px;text-align: center;">Comité Organizador
          </h2>
          <BR>
            <br>
          </div>
          <div class="col-sm-4">
            <div class="card" style="width: 100%;">
              <img style="width: 100%; max-height: 360px;" class="card-img-top img-responsive" src="Img_Web/1.jpg" alt="Card image cap">
              <div class="card-body">
                <h3 class="card-title">Ivan Artaza</h3>
                <h5 style="font-style: italic;">La Rioja, Argentina<h5/>
                <p class="card-text">Lic. en Tecnología Educativa</p>
                <a href="#" class="btn btn-warning">Faceboock</a>
                <a href="#" class="btn btn-warning">Linkedin</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card" style="width: 100%;">
              <img style="width: 100%; max-height: 360px;" class="card-img-top img-responsive" src="Img_Web/2.jpg" alt="Card image cap">
              <div class="card-body">
                <h3 class="card-title">Nayibe Soraya Sanchez Leon</h3>
                <h5 style="font-style: italic;">Tolima, Colombia<h5/>
                <p class="card-text">Mag. en Tecnología Educativa</p>
                <a href="#" class="btn btn-warning">Faceboock</a>
                <a href="#" class="btn btn-warning">Linkedin</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card" style="width: 100%;">
              <img style="width: 100%; max-height: 360px;" class="card-img-top img-responsive" src="Img_Web/3.jpg" alt="Card image cap">
              <div class="card-body">
                <h3 class="card-title">Jose Luis Rodriguez</h3>
                <h5 style="font-style: italic;">Tolima, Colombia<h5/>
                <p class="card-text">Ing. Sistemas</p>
                <a href="#" class="btn btn-warning">Faceboock</a>
                <a href="#" class="btn btn-warning">Linkedin</a>
              </div>
            </div>
          </div>
      </div>
    </div>
</div-->
<div class="triangulo-equilatero-bottom-left animar2">
  <div class="row">
      <div class="col-sm-12" style="color: #fff;">
        <h2>¿Te interesa participar como ponente?</h2>
        <p>
          Contactate con nosotros y te damos la oportunidad de participar en este congreso.
        </p>
        <?php echo'<a class="btn btn-outline-warning btn-ponentes" href="Ponente/index.php?T=0" style="width: 80%; color; color:#fff">
        REGISTRO DE PONENTES
        </a>';?> 
      </div>
    </div>
</div>
<div class="parallax-window" data-parallax="scroll" data-image-src="Img_Web/Slider/image-1-P.jpg" style="margin-top:50px; height: 300px; max-height: 300px; min-height: 300px;">
</div>
<?php include('footer.php');?>
<style type="text/css">
  .slide:nth-child(1) .slide__bg {
  left: 0;
  background-image: url(<?php echo '"'.$ResultadoI[Img1].'"';?>);
  
}
.slide:nth-child(2) .slide__bg {
  left: -50%;
  background-image: url(<?php echo '"'.$ResultadoI[Img2].'"';?>);
}
.slide:nth-child(3) .slide__bg {
  left: -100%;
  background-image: url(<?php echo '"'.$ResultadoI[Img3].'"';?>);
}/*
.slide:nth-child(4) .slide__bg {
  left: -150%;
  background-image: url("../Img_Web/Slider/image-4.jpg");
}*/
</style>