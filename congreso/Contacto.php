<?php
include('Head.php');
include('Nav.php');
include('Idc.php');
include("conexion.php");?>
<style type="text/css">
	p,ul{
		color: #818181; 
		font-size: 16px;
	}
	ul{
		margin-left:40px;
	}
	button{
		width: 100%;
	}
	h4{
		text-align: left;
		font-weight: bold;
	}
	.btn-link:focus, .btn-link:hover {
      text-decoration: none;
	}
	a{
		color: #818181;
		text-decoration: none;
	}
	a:hover, a:focus {
    text-decoration: none;
    color: #333;
    cursor: pointer;
	}
</style>
<div id="contact" class="container-fluid">
	<img src="Img_Web/soporte.png" class="img-responsive">
</div>
    <div class="content-section" style="background:#f2f2f2;">
      <div class="container">
        <div class="row">
          <div style="top:-50px;" class="well well-lg col-lg-12 col-xs-12">
            <div class="form-group label-floating">
              <label class="control-label" for="focusedInput1">Nombre(s)</label>
              <input class="form-control" id="Nombres" type="text">
            </div>
            <div class="form-group label-floating">
              <label class="control-label" for="focusedInput1">Apellido(s)</label>
              <input class="form-control" id="Apellidos" type="text">
            </div>
            <div class="form-group label-floating">
              <label class="control-label" for="focusedInput1">Email</label>
              <input class="form-control" id="Email" type="Email">
            </div>
            <div class="form-group label-floating">
              <label class="control-label" for="focusedInput1">¿Cómo le podemos ayudar?</label>
              <textarea class="form-control" id="Ayuda"></textarea>
            </div>
            <a onclick="enviarmensaje()" class="btn btn-info btn-raised">Enviar</a>
          </div>
        </div> 
      </div>
    </div>
<?php include('footer.php');?>
<div class="Loader">
    <div class="Loader_C container">
      <div style="position: fixed; top: 45%;">
        <div class="row">
        	<div class="col-xs-12">
        		<img src="Img_Web/Logo.png" class="img-responsive center-block">
        	</div>
        </div>
      </div>
    </div>
    <div class="Loader_M container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
          <div class="well" style="position: relative; margin-top: 35%;">
            <img style="background-size: 90px 90px;height: 90px; width: 90px;" id="Titulo_Login" class="center-block" src="Img_Web/logo.svg">
            <br>
            <p style="text-align: center; color: #333; font-size: 28px;" id="Contenido_Login"></p>
            <br>
            <div class="row">
              <div class="col-sm-4 col-sm-offset-8">
               <input style="height: 50px;" onclick="Ocultar_M()" type="submit" class="btn btn-info btn-raised" value="Aceptar" name="">  
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>          
 </div>
<script type="text/javascript">
  function enviarmensaje(){
    var Nombres = $('#Nombres').val();
    var Apellidos = $('#Apellidos').val();
    var Email= $('#Email').val();
    var Comentario = $('#Ayuda').val();
    if (Nombres != "" && Apellidos != "" && Email != "" && Comentario != "") {
      var data = 'Nombres=' + Nombres + '&Apellidos=' + Apellidos + '&Email=' + Email + '&Comen=' + Comentario;
      $(".Loader").fadeIn('fast');
      $(".Loader_C").fadeIn('fast');
      $.ajax({
        url: 'http://onlinecongress.com.co/Email.php',
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