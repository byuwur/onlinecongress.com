<!DOCTYPE html>
<?php
if (isset($_GET['lang'])) {
  if ($_GET['lang'] == 'es' || $_GET['lang'] == 'en') {
    require("./assets/lang/lang_" . $_GET['lang'] . ".php");
    setcookie('lang', $_GET['lang'], time() + 31536000, '/', '', false, false);
    echo "<html lang='" . $_GET['lang'] . "'>";
    $lang = $_GET['lang'];
  } else {
    setcookie('lang', 'es', time() + 31536000, '/', '', false, false);
    echo '<script type="text/javascript"> window.location = window.location.pathname; </script>';
  }
} else if (isset($_COOKIE['lang'])) {
  if ($_COOKIE['lang'] == 'es' || $_COOKIE['lang'] == 'en') {
    require("./assets/lang/lang_" . $_COOKIE['lang'] . ".php");
    echo "<html lang='" . $_COOKIE['lang'] . "'>";
    $lang = $_COOKIE['lang'];
  } else {
    setcookie('lang', 'es', time() + 31536000, '/', '', false, false);
    echo '<script type="text/javascript"> window.location = window.location.pathname; </script>';
  }
} else {
  setcookie('lang', 'es', time() + 31536000, '/', '', false, false);
  echo '<script type="text/javascript"> window.location = window.location.pathname; </script>';
}
?>

<head>
  <meta charset="utf-8">
  <title>Online Congress</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="./assets/img/favicon.png" rel="icon">
  <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="./assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="./assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="./assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="./assets/lib/venobox/venobox.css" rel="stylesheet">
  <link href="./assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="./assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>
  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="#intro" class="scrollto"><img src="./assets/img/logo.png"></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <!--a href="?lang=es" class="a-logo" title="Español" style="margin-left:12px;"><img src="./assets/img/co.png" alt="" /> ESP</a>|<a href="?lang=en" class="a-logo" title="English"><img src="./assets/img/uk.png" alt="" /> ENG</a-->
          <li class="menu-active"><a href="#intro">Inicio</a></li>
          <li><a href="#about">Acerca de</a></li>
          <!-- li><a href="#speakers">Speakers</a></li>
          <li><a href="#hotels">Hotels</a></li>
          <li><a href="#gallery">Gallery</a></li -->
          <li><a href="#services">Servicios </a></li>
          <!--<li><a href="#venue">Congresos</a></li> -->
          <!--li><a href="#schedule">Calendario</a></li-->
          <li><a href="#faq">F.A.Q.</a></li>
          <li><a href="#contact">Contacto</a></li>
         <!--li>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background: none; border: none; margin-top: 5px">
            Ingresar
            </button>
          </li-->
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CONGRESOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p style="text-align: center;">Elija un congreso en el que quiera participar</p>
            <select id='Url' class="form-control" name="Id_Congreso">
            <?php
              include("conexion.php");
                $Congresos=$conex->query("SELECT congreso.Nombre, info_congreso.Subdominio FROM congreso, info_congreso WHERE congreso.Id_Congreso=info_congreso.Id_Congreso");
              while ($RCongresos=mysqli_fetch_assoc($Congresos)) {
                  echo'<option value="'.$RCongresos[Subdominio].'">'.$RCongresos[Nombre].'</option>';
              }
              ?>
                </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Direccion()">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var Url;
  $(document).ready(function(){
    Url=$("#Url").val();
  });

  function Direccion(){
    Url=$("#Url").val();
    top.location.href = Url;
  }
</script>
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">SOFTWARE PARA <span>CONGRESOS Y<br>EVENTOS DE INVESTIGACIÓN</span> VIRTUALES</h1>
      <p class="mb-4 pb-0">¿Necesitas crear un Evento o Congreso Virtual? <br>Online Congress es tu solución.</p>
      <!--a href="https://www.youtube.com/watch?v=vx_fByRp3fA" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a> -->
      <a href="#about" class="about-btn scrollto">¿Empezamos?</a>
    </div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Sobre Nosotros</h2>
            <p>Online Congress surge con el propósito de satisfacer las necesidades existentes en las instituciones educativas para la creación eventos o congresos virtuales. Siendo una plataforma con una interfaz amigable y de fácil uso ofreciéndole a sus usuarios el control total de sus eventos.</p>
          </div>
          <!-- <div class="col-lg-3">
            <h3>¿En qué nos especializamos?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>-->
          <div class="col-lg-6">
            <h2>¿Por qué elegirnos?</2>
              <p>Te ofrecemos una plataforma amigable que te ayudará a gestionar todo lo que conlleva crear un congreso o evento de investigación virtual brindandoles a tus asistentes, ponentes y conferencistas una experiencia agradable para compartir sus concimientos y experiencias. Adicionalmente podrás acceder a nuestra APP que estará completamente personalizada con tu evento, sin mencionar que tendrás acceso a diferentes estadisticas para realizar informes y hacer las respectivas tomas de deciones futuras.
              </p>
          </div>

        </div>


    </section>

    <div class="wrapperMain">
      <section id="services" class="bounce-inInverse">
        <div class="container wow fadeInUp">
          <div class="containerContent row">
            <div class="set_size_section1">
              <div class="section-header col-12">
                <h2>Administra y controla tus eventos</h2>
                <p class="services_p center"> Con Online Congress tendrás acceso a diferentes opciones que te permitiran llevar el control de tu congreso y/o evento virtual</p>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-2 offset-sm-1">
                  <img alt="Personalización" src="assets/img/Personalizar.svg" style="width: 100%" class="img-fluid">
                  <p style="text-align: center;">Personalización</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-lg-2">
                  <img style="width:100%;" alt="Control" src="assets/img/Inscripcion.svg">
                  <p style="text-align: center;">Control de Inscripciones y participación</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-lg-2">
                  <img style="width:100%;" alt="Certificaciones" src="assets/img/Certificado.svg">
                  <p style="text-align: center;">Certificaciones</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-lg-2">
                  <img style="width:100%;" alt="estadisticas" src="assets/img/Estadistica.svg">
                  <p style="text-align: center;">Estadísticas</p>

                </div>
                <div class="col-xs-12 col-sm-2 col-lg-2">
                  <img style="width:100%;" alt="App" src="assets/img/Android.svg">
                  <p style="text-align: center;">App móvil</p>

                </div>


              </div>
            </div>
          </div>
        </div>
      </section>
      </section>
    </div>

    </section>

    <!--
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Event Speakers</h2>
          <p>Here are some of our speakers</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="./assets/img/speakers/1.jpg" alt="Speaker 1" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Brenden Legros</a></h3>
                <p>Quas alias incidunt</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="./assets/img/speakers/2.jpg" alt="Speaker 2" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Hubert Hirthe</a></h3>
                <p>Consequuntur odio aut</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="./assets/img/speakers/3.jpg" alt="Speaker 3" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Cole Emmerich</a></h3>
                <p>Fugiat laborum et</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="./assets/img/speakers/4.jpg" alt="Speaker 4" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Jack Christiansen</a></h3>
                <p>Debitis iure vero</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="./assets/img/speakers/5.jpg" alt="Speaker 5" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Alejandrin Littel</a></h3>
                <p>Qui molestiae natus</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="./assets/img/speakers/6.jpg" alt="Speaker 6" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Willow Trantow</a></h3>
                <p>Non autem dicta</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="hotels" class="section-with-bg wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Hotels</h2>
          <p>Her are some nearby hotels</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="./assets/img/hotels/1.jpg" alt="Hotel 1" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 1</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>0.4 Mile from the Venue</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="./assets/img/hotels/2.jpg" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 2</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-full"></i>
              </div>
              <p>0.5 Mile from the Venue</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="./assets/img/hotels/3.jpg" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 3</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>0.6 Mile from the Venue</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="gallery" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Check our gallery from the recent events</p>
        </div>
      </div>

      <div class="owl-carousel gallery-carousel">
        <a href="./assets/img/gallery/1.jpg" class="venobox" data-gall="gallery-carousel"><img src="./assets/img/gallery/1.jpg" alt=""></a>
        <a href="./assets/img/gallery/2.jpg" class="venobox" data-gall="gallery-carousel"><img src="./assets/img/gallery/2.jpg" alt=""></a>
        <a href="./assets/img/gallery/3.jpg" class="venobox" data-gall="gallery-carousel"><img src="./assets/img/gallery/3.jpg" alt=""></a>
        <a href="./assets/img/gallery/4.jpg" class="venobox" data-gall="gallery-carousel"><img src="./assets/img/gallery/4.jpg" alt=""></a>
        <a href="./assets/img/gallery/5.jpg" class="venobox" data-gall="gallery-carousel"><img src="./assets/img/gallery/5.jpg" alt=""></a>
        <a href="./assets/img/gallery/6.jpg" class="venobox" data-gall="gallery-carousel"><img src="./assets/img/gallery/6.jpg" alt=""></a>
        <a href="./assets/img/gallery/7.jpg" class="venobox" data-gall="gallery-carousel"><img src="./assets/img/gallery/7.jpg" alt=""></a>
        <a href="./assets/img/gallery/8.jpg" class="venobox" data-gall="gallery-carousel"><img src="./assets/img/gallery/8.jpg" alt=""></a>
      </div>
    </section>
    -->

    <!--==========================
      Venue Section
    ============================-->
    <!--  <section id="venue" class="wow fadeInUp">

      <div class="container-fluid">

        <div class="section-header">
          <h2>Event Venue</h2>
          <p>Event venue location info and gallery</p>
        </div>

        <div class="row no-gutters">
          <div class="col-lg-6 venue-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8">
                <h3>Downtown Conference Center, New York</h3>
                <p>Iste nobis eum sapiente sunt enim dolores labore accusantium autem. Cumque beatae ipsam. Est quae sit qui voluptatem corporis velit. Qui maxime accusamus possimus. Consequatur sequi et ea suscipit enim nesciunt quia velit.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid venue-gallery-container">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="./assets/img/venue-gallery/1.jpg" class="venobox" data-gall="venue-gallery">
                <img src="./assets/img/venue-gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="./assets/img/venue-gallery/2.jpg" class="venobox" data-gall="venue-gallery">
                <img src="./assets/img/venue-gallery/2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="./assets/img/venue-gallery/3.jpg" class="venobox" data-gall="venue-gallery">
                <img src="./assets/img/venue-gallery/3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="./assets/img/venue-gallery/4.jpg" class="venobox" data-gall="venue-gallery">
                <img src="./assets/img/venue-gallery/4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="./assets/img/venue-gallery/5.jpg" class="venobox" data-gall="venue-gallery">
                <img src="./assets/img/venue-gallery/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="./assets/img/venue-gallery/6.jpg" class="venobox" data-gall="venue-gallery">
                <img src="./assets/img/venue-gallery/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="./assets/img/venue-gallery/7.jpg" class="venobox" data-gall="venue-gallery">
                <img src="./assets/img/venue-gallery/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="./assets/img/venue-gallery/8.jpg" class="venobox" data-gall="venue-gallery">
                <img src="./assets/img/venue-gallery/8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>
      </div>

    </section>


    <!--==========================
      Schedule Section
    ============================-->
    <!--section id="schedule" class="section-with-bg">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Calendario</h2>
        </div>

        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="#day-1" role="tab" data-toggle="tab">Enero - Marzo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-2" role="tab" data-toggle="tab">Abril - Junio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-3" role="tab" data-toggle="tab">Julio - septiembre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-4" role="tab" data-toggle="tab">Octubre - Diciembre</a>
          </li>
        </ul>
        <h3 class="sub-heading">Nos permitimos presentar los congresos y eventos destacados de las próximas fechas:</h3><br>
        <div class="tab-content row justify-content-center">
          <Schdule Day 1>
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

            <div class="row schedule-item">

              <div class="col-md-10">
                <h4>Registration</h4>
                <p>Fugit voluptas iusto maiores temporibus autem numquam magnam.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Keynote <span>Brenden Legros</span></h4>
                <p>Facere provident incidunt quos voluptas.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/2.jpg" alt="Hubert Hirthe">
                </div>
                <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/3.jpg" alt="Cole Emmerich">
                </div>
                <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/4.jpg" alt="Jack Christiansen">
                </div>
                <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/5.jpg" alt="Alejandrin Littel">
                </div>
                <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/6.jpg" alt="Willow Trantow">
                </div>
                <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
              </div>
            </div>

          </div>
          <End Schdule Day 1>

          <Schdule Day 2>
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Libero corrupti explicabo itaque. <span>Brenden Legros</span></h4>
                <p>Facere provident incidunt quos voluptas.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/2.jpg" alt="Hubert Hirthe">
                </div>
                <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/3.jpg" alt="Cole Emmerich">
                </div>
                <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/4.jpg" alt="Jack Christiansen">
                </div>
                <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/5.jpg" alt="Alejandrin Littel">
                </div>
                <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/6.jpg" alt="Willow Trantow">
                </div>
                <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
              </div>
            </div>

          </div>
          <End Schdule Day 2>

          <Schdule Day 3>
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/2.jpg" alt="Hubert Hirthe">
                </div>
                <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/3.jpg" alt="Cole Emmerich">
                </div>
                <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Libero corrupti explicabo itaque. <span>Brenden Legros</span></h4>
                <p>Facere provident incidunt quos voluptas.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/4.jpg" alt="Jack Christiansen">
                </div>
                <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/5.jpg" alt="Alejandrin Littel">
                </div>
                <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
              </div>
            </div>

            <div class="row schedule-item">

              <div class="col-md-10">
                <div class="speaker">
                  <img src="./assets/img/speakers/6.jpg" alt="Willow Trantow">
                </div>
                <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
              </div>
            </div>

          </div>
          <End Schdule Day 3>

        </div>

      </div>

    </section-->


    <!--==========================
      Sponsors Section
    ============================-->
    <!--section id="supporters" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Nuestros Patrocinadores</h2>
        </div>

        <div class="row no-gutters supporters-wrap clearfix">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="./assets/img/supporters/1.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="./assets/img/supporters/2.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="./assets/img/supporters/3.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="./assets/img/supporters/4.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="./assets/img/supporters/5.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="./assets/img/supporters/6.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="./assets/img/supporters/7.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="./assets/img/supporters/8.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section-->

    <!--==========================
      F.A.Q Section
    ============================-->
    <section id="faq" class="wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>PREGUNTAS FRECUENTES </h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-9">
            <ul id="faq-list">
                <li>
                  <a data-toggle="collapse" href="#faq2" class="collapsed">ONLINE CONGRESS<i class="fa fa-minus-circle"></i></a>
                  <div id="faq2" class="collapse" data-parent="#faq-list">
                    <p>
                      La plataforma web está desarrollada para la realización de eventos o congresos virtuales científicos/investigativos.   Los cuales son desarrollados por Instituciones de Educación Superior (IES) y redes académicas/investigativas.   Permitiendo disponer de la información centralizada en la nube, gracias a la creación de un mundo virtual, si la necesidad de trasladarse por el universo real.<br><br>

                      Cuenta con profesionales expertos en la administración y desarrollo de congresos virtuales y presenciales.<br><br>    

                      •    Al usar la plataforma web ONLINE CONGRESS, las Instituciones de Educación Superior (IES) y redes académicas/investigativas logran bajar los costos que acarrea la organización y acompañamiento de conferencistas,  expositores y visitantes.  Desde su movilidad hasta el hecho de acoplar espacios físicos para las ponencias, talleres, foros y los stands.<br>

                      •    Hacer parte de eventos o congresos científicos/investigativos virtuales,  desde una Tablet, móvil, PC y portátiles. A cualquier hora, en cualquier instante, ONLINE CONGRESS responde ante a los  Dispositivos tecnológicos que se esté usando.<br>

                      •    ONLINE CONGRESS,  Ofrece la accesibilidad de los contenidos presentados en los congresos.  Los participantes a los congresos virtuales podrán tener en sus diferentes dispositivos tecnológicos, toda la información que considere importante.
                    </p>
                  </div>
                </li>
                <li>
                  <a data-toggle="collapse" class="collapsed" href="#faq1">¿POR QUÉ CONGRESOS VIRTUALES?<i class="fa fa-minus-circle"></i></a>
                  <div id="faq1" class="collapse" data-parent="#faq-list">
                    <p>
                      Con la llegada y uso de las Tecnologías de la información y comunicación TIC, se han logrado que se innoven en relaciones: profesionales, académicas, investigativas, laborales, personales, entre otros.  Esto ha llevado a un replanteamiento, de cómo lograr que más profesionales accedan a la  divulgación del nuevo conocimiento y la colaboración entre investigadores.<br><br>

                      En los últimos 10 años los congresos virtuales han venido siendo el presente y el futuro. Pero para ello, se ha comenzado a desarrollar tecnología que permita reunir un gran número de estudios e investigadores, ubicados en cualquier lugar del mundo y participando simultáneamente en conferencias, ponencias, talleres y experiencias académicos en un mundo virtual.<br><br>

                      Con la ayudo de plataformas web diseñadas para congresos virtuales, han permitido mejorar indiscutiblemente la flexibilidad y accesibilidad para docentes que deseen participar en este tipo de actividades formativas e investigativas, los cuales por distancia no lo pueden realizar.<br><br>

                      Igualmente, en los últimos años, su popularidad ha alcanzado aumentar el número de inscripciones no importando la ubicación de los participantes.<br><br>

                      Por todo lo anterior, las TIC y el internet son los aliados para mejorar la participación de los investigadores y la circulación del nuevo conocimiento que se generan dentro de las aulas académicos de las universidades.
                    </p>
                  </div>
                </li>
                <li>
                  <a data-toggle="collapse" href="#faq3" class="collapsed">¿CÓMO FUNCIONA ONLINE CONGRESS?<i class="fa fa-minus-circle"></i></a>
                  <div id="faq3" class="collapse" data-parent="#faq-list">
                    <p>
                      Cualquier Institución de Educación Superior (IES) y red académica/investigativa, que desee desarrollar un congreso o evento virtual pueden hacer uso de la herramienta.  Tanto su App como la plataforma web,  permiten:<br><br>

                      ·         Listado de proyectos y sus ponentes y conferencistas.

                      ·         El Registro de los ponentes, conferencistas y asistentes por web (para los dos primeros es obligatorio la web).

                      ·         La acreditación (certificados) de las participaciones del evento congreso.

                      ·         El módulo de administrador (donde hay una persona de quienes van a hacer uso del congreso). Personalización con la imagen de la empresa.

                      ·         Programa del congreso (Lo deben hacer por día y todos los días) (web o App).

                      ·         Comunicador de antes, durante y después del evento (Envío de mensajes con actualizaciones sobre la app del evento. Envío de avisos para próximas sesiones. Envío de avisos sobre ponentes o nuevos ponentes.)

                      ·         Envío de noticias de última hora, información exclusiva para los usuarios que tengan la App (avisos y cambios repentinos) (por email y mensaje al App, esta debe estar descargada).

                      ·         Información interactiva (Usar una API del wasap entre los organizadores, asistentes, conferencistas y ponentes).

                      ·         Perfila biografías de los conferencistas y ponentes (foto, perfil profesional y universidad donde labora)

                      ·         Estadística en tiempo real: Cuantos asistentes están en línea, ponencia y conferencias con más visitas. Sistema de ranking para ponentes y conferencistas, ponencia o conferencia con mayor participación por comentarios.  Cantidad de personas en línea por país, cual fue el país con mayor participación en cuanto a comentarios.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq4" class="collapsed">¿QUÉ TIPO DE TECNOLOGÍA SE APLICA EN LA PLATAFORMA ONLINE CONGRESS?<i class="fa fa-minus-circle"></i></a>
                  <div id="faq4" class="collapse" data-parent="#faq-list">
                    <p>
                      
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq5" class="collapsed">SI DESEA SABER MÁS SOBRE ONLINE CONGRESS<i class="fa fa-minus-circle"></i></a>
                  <div id="faq5" class="collapse" data-parent="#faq-list">
                    <p>
                     Si desea contactarnos o tienes dudas o quieres que nuestro equipo de trabajo se coloque en contacto con ustedes, ¡escríbenos!
                    </p>
                  </div>
                </li>      
              </ul>
          </div>
        </div>

      </div>

    </section>

    <!--==========================
      Subscribe Section
    ============================-->
    <!--section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Suscríbete</h2>
          <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
        </div>

        <form method="POST" action="#">
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Enter your Email">
            </div>
            <div class="col-auto">
              <button type="submit">Subscribe</button>
            </div>
          </div>
        </form>

      </div>
    </section-->

    <!--==========================
      Buy Ticket Section
    ============================
    <section id="buy-tickets" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>Buy Tickets</h2>
          <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Standard Access</h5>
                <h6 class="card-price text-center">$150</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Pro Access</h5>
                <h6 class="card-price text-center">$250</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="pro-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Pro Tier 
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Premium Access</h5>
                <h6 class="card-price text-center">$350</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Workshop Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="premium-access">Buy Now</button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Modal Order Form 
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Buy Tickets</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="#">
                <div class="form-group">
                  <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <select id="ticket-type" name="ticket-type" class="form-control" >
                    <option value="">-- Select Your Ticket Type --</option>
                    <option value="standard-access">Standard Access</option>
                    <option value="pro-access">Pro Access</option>
                    <option value="premium-access">Premium Access</option>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn">Buy Now</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Contáctenos:</h2>
          <p>Hable con nosotros</p>
        </div>

        <!-- div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Dirección:</h3>
              <address>ITFIP</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Teléfono:</h3>
              <p><a href="tel:+573">+57 (3xx) xxx xxxx</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>E-mail:</h3>
              <p><a href="mailto:">info@example.com</a></p>
            </div>
          </div>

        </div -->

        <div class="form">
          <div id="sendmessage">Su mensaje se ha enviado. Gracias.</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="Nombre" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Ingrese al menos 4 caracteres" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="Email" id="email" placeholder="Correo electrónico" data-rule="email" data-msg="Ingrese un correo electrónico válido" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="Asunto" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Ingrese al menos 8 caracteres en el asunto" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="Mensaje" rows="5" data-rule="required" data-msg="Considere escribirnos algo" placeholder="Mensaje"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><input name="Enviar" type="submit" value="Enviar mensaje" class="btn btn-info"></div>
          </form>
        </div>
      </div>
    </section><!-- #contact -->
  </main>
<?php
if ($_POST['Enviar']) {
  $Nombre=$_POST['Nombre'];
  $Remitente = $_POST['Email'];
  $Asunto = $_POST['Asunto'];
  $Mensaje=$_POST['Mensaje'];
  
  require_once "Mail.php";
  
  $host = "ssl://smtp.gmail.com";
  $port = "465";
  $username = 'soporteonlinecongress@gmail.com';
  $password = 'nmzwbuovrtllxikj';
  
  $subject = "$Asunto - Online Congress";
  $body = "Me llamo $Nombre. Quiero decirles: $Mensaje";
  
  $headers = array ('From' => $username, 'To' => $username, 'Subject' => $subject);
  $smtp = Mail::factory('smtp',
    array ('host' => $host,
      'port' => $port,
      'auth' => true,
      'username' => $username,
      'password' => $password));
  
  $mail = $smtp->send($to, $headers, $body);
  
  if (PEAR::isError($mail)) {
  ?>
    <script type="text/javascript">alert( <?= ($mail->getMessage()); ?> )</script>
  <?php
  } else {
  ?>
    <script type="text/javascript">alert("El mensaje se ha enviado. Responderemos en cuanto podamos.");</script>
  <?php
  }
}
?>
<!-- Modal -->
<div class="modal fade" id="ModalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MESAJE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p style="text-align: center;">El mensaje se ha enviado exitosamente.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Direccion()">Aceptar</button>
      </div>
    </div>
  </div>
</div>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <img src="./assets/img/logo.png" alt="TheEvenet">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Congresos más recientes:</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Institución 1</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Institución 2</a></li>
            </ul>
          </div>

          <!--div class="col-lg-3 col-md-6 footer-links">
            <h4>Contáctenos:</h4>
            <p>
              <strong>Teléfono:</strong> +57 (3xx) xxx xxxx<br>
              <strong>E-mail:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
          </div-->

          <div class="col-lg-4 col-md-6 footer-contact">
            <div class="fb-page" data-href="https://www.facebook.com/onlinecongressweb/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/onlinecongressweb/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/onlinecongressweb/">Onlinecongress</a></blockquote></div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; 2019 <strong><a href="https://mnm.team" target="_blank">MNM</a> - GRIDSOA</strong>. Derechos reservados.
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
        <a href="https://mnm.team/mateus/" target="_blank">Mateus [byUwUr]</a> | <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="./assets/lib/jquery/jquery.min.js"></script>
  <script src="./assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="./assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/lib/easing/easing.min.js"></script>
  <script src="./assets/lib/superfish/hoverIntent.js"></script>
  <script src="./assets/lib/superfish/superfish.min.js"></script>
  <script src="./assets/lib/wow/wow.min.js"></script>
  <script src="./assets/lib/venobox/venobox.min.js"></script>
  <script src="./assets/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="./assets/js/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="./assets/js/main.js"></script>
</body>
</html>