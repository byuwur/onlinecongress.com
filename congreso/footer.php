<div class="container-fluid" style="height: 500px; background: #212121;">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h2 style="color: #fff; margin-top: 10%;">Sobre Nosotros</h2>
        <br>
        <p style="color: #dddd; font-size: 18px;"><?php echo $ResultadoI[Nosotros]?></p>
        <p style="color: #dddd; font-size: 18px;">
          Email: <a href="mailto:info@covaite.com" style="color: #818181;"> <?php 
          $SQLA =$conex->query("SELECT administrador.Email FROM administrador, congreso WHERE administrador.Documento=congreso.Id_Administrador AND congreso.Id_Congreso='$Idc'");
          $ResultadoAd=mysqli_fetch_assoc($SQLA);
          echo $ResultadoAd[Email]?></a>
        </p>
        <!--p style="color: #dddd; font-size: 18px;">
          Web: <a href="http://www.covaite.com" style="color: #818181;"> www.covaite.com</a>
        </p-->
        <hr align="left" style="width: 20%; background: #0277bd; border-color:#0277bd">
      </div>
      <div class="col-sm-4">
        <h2 style="color: #fff; margin-top: 10%;">Preguntas Frecuentes</h2>
        <br>
        <p style="color: #dddd; font-size: 16px;">
          <a href="Preguntas.php">¿Cómo evoluciona el congreso virtual?</a><br>
          <a href="Preguntas.php">¿Quién puede participar como ponente?</a><br>
          <a href="Preguntas.php">¿Cuáles son las categorías o temáticas de participación?</a><br>
          <a href="Preguntas.php">¿Dónde me inscribo?</a><br>
          <a href="Preguntas.php">¿Hasta cuándo hay plazo para enviar la ponencia o archivo de exposición?</a><br>
          <a href="Preguntas.php">¿Hay una programación o agenda del congreso?</a><br>
          <a href="Preguntas.php">¿Cuál es el formato de participación?</a><br><br>
          <a href="Preguntas.php">VER TODAS LAS PREGUNTAS FRECUENTES</a>
        </p>
        <hr align="left" style="width: 20%; background: #0277bd; border-color:#0277bd">
      </div>
      <div class="col-xs-12 col-sm-4">
        <h2 style="color: #fff; margin-top: 10%;">Siguenos en Facebook</h2>
            <div style="position: relative; margin-top: 0px; width: 100%; height: 250px;">
              <?php
                echo "<div style='top: 15px;' class='fb-page' data-href='$ResultadoI[Facebook]' data-small-header='false' data-adapt-container-width='true' data-hide-cover='false' data-show-facepile='true'><blockquote cite='$Pagina_F' class='fb-xfbml-parse-ignore'><a href='$ResultadoI[Facebook]'></a></blockquote></div>";
              ?>
            </div>
          </div>
    </div>     
  </div>       
</div>      
<footer style="background-color: #333;">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-5">
              <br>
              <p style="color:#fff; font-size:14px" class="copyright text-muted small">
                <img src="Img_Web/logo2.png" style="background-size:80px 80px;">
                <br>
              </p>
            </div>            
            <div class="col-xs-12 col-sm-2">
              <br>
              <p style="color:#fff; font-size:14px" class="copyright text-muted small">
                <a target="_blanck" href="http://www.itfip.edu.co/">
                  <img style="background-size: 104px 117px; height: 104px; width: 117px;" src="Img_Web/Patrocinadores/logoitfip.png" class="img-responsive center-block">
                </a>
              </p>
            </div>
             <div class="col-xs-12 col-sm-2">
              <br>
              <p style="color:#fff; font-size:14px" class="copyright text-muted small">
                <a target="_blanck" href="">
                  <img style="background-size: 104px 117px; height: 104px; width: 117px;" src="Img_Web/Patrocinadores/Naucalpan.png" class="img-responsive center-block">
                </a>
              </p>
            </div>
            <div class="col-xs-12 col-sm-3">
              <br>
              <p style="color:#fff; font-size:14px" class="copyright text-muted small">
                <a target="_blanck" href="http://weapp.com.co/">
                  <img src="Img_Web/logo2.svg" style="background-size:80px 80px; height:80px; width:80px; ">
                </a>
                <br>
                <span style="font-size:20px" >WeApp</span>
              </p>
            </div>
          </div>
          <br>
          <br>
          <a href="">
            <p style="font-size:15px; color: #818181;text-align: right; position: relative; top: -10px;">Copyright 2019 | Todos los derechos reservados | Covaite | Creado por: <strong><a href="http://www.weapp.com.co/">WeApp</a>/<a href="http://www.itfip.edu.co/">ITFIP</a></strong></p>
          </a>
        </div>
      </footer>
    </body>
<script>
    
    /* Demo purposes only */
$(".hover").mouseleave(
  function() {
    $(this).removeClass("hover");
  }
);
</script>
    <script src="js/jquery.easing.min.js"></script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.9";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <script type="text/javascript">
      function enviarmensaje(){
        var NombreEmpre = $('#empresa').val();
        var Email = $('#email').val();
        var Telefono = $('#telefono').val();
        var Comentario = $('#ayuda').val();
        if ( NombreEmpre != "" && Email != "" && Telefono != "" && Comentario != "") {
          var data = 'NomEmpre=' + NombreEmpre + '&Correo=' + Email + '&Tel=' + Telefono + '&Comen=' + Comentario;
          $(".Loader").fadeIn('fast');
          $(".Loader_C").fadeIn('fast');
          $.ajax({
          url: 'http://weapp.com.co/Email.php',
          type: 'POST',
          data: data,
          dataType: "json",
          beforeSend: function(){
            console.log('enviando datos a la BD.... :)')
            $(".Loader").fadeIn('fast');
            $(".Loader_C").fadeOut('fast');
            $(".Loader_M").fadeIn('fast');
            $('#Titulo_Login').html("Gracias por comunicarte.");
            $('#Contenido_Login').html("Mensaje enviado exitosamente.");

          }
        });
        }
      }
      function Ocultar_M(){
        $('.Loader').fadeOut('fast');
        $('.Loader_C').fadeOut('fast');
        $('.Loader_M').fadeOut('fast');
        $('.form-control').val("");
      }
    </script>

    <script>
      $('.message a').click(function(){
       $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
     });
      $(".menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        $(".Area_Oscura").fadeIn('fast');
      });
      $(".Ocultar_A").click(function(e) {
        $(".Area_Oscura").fadeOut('fast');
      });
      window.page = window.location.hash || "#about";
      $(document).ready(function () {
        if (window.page != "#about") {
          $(".menu").find("li[data-target=" + window.page + "]").trigger("click");
        }
      });
      $(window).on("resize", function () {
        $("html, body").height($(window).height());
        $(".main, .menu").height($(window).height() - $(".header-panel").outerHeight());
        $(".pages").height($(window).height());
      }).trigger("resize");
      $(".menu li").click(function () {
    // Menu
    if (!$(this).data("target")) return;
    if ($(this).is(".active")) return;
    $(".menu li").not($(this)).removeClass("active");
    $(".page").not(page).removeClass("active").hide();
    window.page = $(this).data("target");
    var page = $(window.page);
    window.location.hash = window.page;
    $(this).addClass("active");
    page.show();
    var totop = setInterval(function () {
      $(".pages").animate({scrollTop: 0}, 0);
    }, 1);
    setTimeout(function () {
      page.addClass("active");
      setTimeout(function () {
        clearInterval(totop);
      }, 1000);
    }, 100);
  });
      function cleanSource(html) {
        var lines = html.split(/\n/);
        lines.shift();
        lines.splice(-1, 1);
        var indentSize = lines[0].length - lines[0].trim().length,
        re = new RegExp(" {" + indentSize + "}");
        lines = lines.map(function (line) {
          if (line.match(re)) {
            line = line.substring(indentSize);
          }
          return line;
        });
        lines = lines.join("\n");
        return lines;
      }
      $("#opensource").click(function () {
        $.get(window.location.href, function (data) {
          var html = $(data).find(window.page).html();
          html = cleanSource(html);
          $("#source-modal pre").text(html);
          $("#source-modal").modal();
        });
      });
    </script>
    <!-- Twitter Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Material Design for Bootstrap -->
    <script src="js/material.js"></script>
    <script src="js/ripples.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script>
      $.material.init();
    </script>
    <script type="text/javascript">
      jQuery(function($) { 
        $('.animar1').waypoint(function() {
          $(this).toggleClass( 'bounceIn animated' );
        },
        {
          offset: '70%',
          triggerOnce: true
        });
        $('.animar2').waypoint(function() {
          $(this).toggleClass( 'fadeInLeft animated' );
        },
        {
          offset: '70%',
          triggerOnce: true
        });        
        $('.animar3').waypoint(function() {
          $(this).toggleClass( 'fadeInRight animated' );
        },
        {
          offset: '70%',
          triggerOnce: true
        });      
        $('.animar4').waypoint(function() {
          $(this).toggleClass( 'fadeInUp animated' );
        },
        {
          offset: '70%',
          triggerOnce: true
        });        
      });
    </script>
    <!-- Sliders -->
    <script src="js/jquery.nouislider.min.js"></script>
    <script type="text/javascript">
      (function( $ ) {
    //Function to animate slider captions 
    function doAnimations( elems ) {
    //Cache the animationend event in a variable
    var animEndEv = 'webkitAnimationEnd animationend';
    elems.each(function () {
      var $this = $(this),
      $animationType = $this.data('animation');
      $this.addClass($animationType).one(animEndEv, function () {
        $this.removeClass($animationType);
      });
    });
  } 
  //Variables on page load 
  var $myCarousel = $('#carousel-example-generic'),
  $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
  //Initialize carousel 
  $myCarousel.carousel();
  //Animate captions in first slide on page load 
  doAnimations($firstAnimatingElems);
  //Pause carousel  
  $myCarousel.carousel('pause');
  //Other slides to be animated on carousel slide event 
  $myCarousel.on('slide.bs.carousel', function (e) {
    var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
    doAnimations($animatingElems);
  });  
  $('#carousel-example-generic').carousel({
    interval:3000,
    pause: "false"
  });
})(jQuery); 
</script>
<!-- Dropdown.js -->
<script src="js/jquery.dropdown.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script src="js/owl.carousel.js"></script>
    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>
    <script>
      $("#dropdown-menu select").dropdown();
    </script>
    </html>
<style type="text/css">
  a:hover{
    color: #fff;
  }
</style>