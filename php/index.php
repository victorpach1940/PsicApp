<?php
session_start();
//require "conn.php";
$usuario='';
$menu=1;
//Si ya esta instanciada la sesion usuario
if (isset($_SESSION['user'])) {
	//asignar como visitante al usuario
	if(empty($_SESSION['user'])){
		$_SESSION['user']=$usuario='visitante';
    $menu=1;
	}
	//Si la sesion usuario no es un visitantes, es decir, ya tiene una sesion iniciada
	//obtener el id del usuario
	elseif ($_SESSION['user']!='visitante') {
		$usuario=$_SESSION['user'];
    $menu=2;
	}
}
//No esta instanciada la sesion usuario, por lo que se le declara como visitante
else{
	$_SESSION['user']=$usuario='visitante';
  $menu=1;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>PsicApp-Inicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="icon" href="../img/icono_page.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/8a020a1c5f.js" crossorigin="anonymous"></script>
  <style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h1{
    font-size: 70px;
    text-transform: uppercase;
    font-family: 'EB Garamond', sans-serif;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }
  .jumbotron {
    background-color: #f4511e;
    color: #fff;
    padding: 60px 25px;
    font-family: Montserrat, sans-serif;
  }
  #about{
    color: white;
  }
  .container-fluid {
    padding: 0px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #f4511e;
    font-size: 50px;
  }
  .logo {
    color: #f4511e;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 50%;
    height: 50%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
  }
  .carousel-indicators li {
    border-color: #f4511e;
  }
  .carousel-indicators li.active {
    background-color: #f4511e;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #f4511e;
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #f4511e;
    background-color: #fff !important;
    color: #f4511e;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #f4511e !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #f4511e;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: #f4511e;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #f4511e !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    }
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    }
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php if($menu==1){ require "menu_superior.php"; } elseif($menu==2){ require 'menu_superior2.php';} ?>
<!--<div class="jumbotron text-center">
  <h1>PsicApp</h1>
  <p>¡No estas solo!</p>
</div>-->
<!-- Container (About Section) -->
<div id="about" class="container text-center  text-white" style="background:url(http://localhost/PsicApp/img/fondo.jpg) no-repeat center center fixed; display: table; height: 90%; position: relative; width: 100%; background-size: cover; width:100%; height:550px; padding: 60px 25px; ">
  <div class="row-sm-12">

    <h1>PsicApp</h1>
  <p style="font-size: 25px;">¡No estas solo!</p>
  </div>
    <div class="col-md-4" style="padding-top:55px;">
      <div class="card text-center">
        <img class="card-img-top" src="../img/pregunta.png" style="width: 75px; height: 75px;">
        <div class="card-body">
          <h3 class="card-title"><strong>Resuelve dudas</strong></h3>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="../html/adicciones.html" class="btn btn-primary">Ir</a>
        </div>
      </div>
    </div>
    <div class="col-md-4" style="padding-top:55px;">
      <div class="card text-center">
        <img class="card-img-top" src="../img/talk.png" style="width: 75px; height: 75px;">
        <div class="card-body">
          <h3 class="card-title"><strong>Habla con un experto</strong></h3>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Ir</a>
        </div>
      </div>
    </div>
    <div class="col-md-4" style="padding-top:55px;">
      <div class="card text-center">
        <img class="card-img-top" src="../img/hat.png" style="width: 75px; height: 75px;">
        <div class="card-body">
          <h3 class="card-title"><strong>Sesiones privadas</strong></h3>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Ir</a>
        </div>
      </div>
    </div>
</div>


<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>¡Informate!</h2>
  <h4>Categorías</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <!--<span class="glyphicon glyphicon-cannabis logo-small"></span>-->
      <a href="../html/adicciones.html"><i class="fas fa-cannabis" style="font-size: 40px; margin-bottom: 20px; color: #f4511e;"></i>
      <!--<i class="fas fa-check-square"></i>-->
      <h4>Uso de drogas</h4>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="../html/violenciadepareja.html"><i class="fas fa-angry" style="font-size: 40px; margin-bottom: 20px; color: #f4511e;"></i>
      <h4>Violencia de pareja</h4>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="../html/sexualidad.html"><i class="fas fa-kiss-wink-heart" style="font-size: 40px; margin-bottom: 20px; color: #f4511e;"></i>
      <h4>Sexualidad</h4>
      </a>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-6">
      <a href="../html/saludmental.html"><i class="fas fa-medkit" style="font-size: 40px; margin-bottom: 20px; color: #f4511e;"></i>
      <h4>Salud mental</h4>
     </a>
    </div>
    <?php if($menu==1){ ?>
      <div class="col-sm-6">
      <a href="../login/index.php"><i class="fas fa-stethoscope" style="font-size: 40px; margin-bottom: 20px; color: #f4511e;"></i>
      <h4>Tratamientos</h4></a>
      </div>
    <?php } elseif($menu==2){ ?>
      <div class="col-sm-6">
      <a href="../html/cuestionario_adicciones.html"><i class="fas fa-stethoscope" style="font-size: 40px; margin-bottom: 20px; color: #f4511e;"></i>
      <h4>Tratamientos</h4></a>
      </div>
    <?php } ?>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Nosotros</h2><br>
  <h4>PsicApp-Transformasional</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="../img/mision.png" alt="familias" width="100" height="100">
        <p><strong>Misión</strong></p>
        <p>Yes, we built Paris</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="../img/vision.png" alt="New York" width="200" height="200">
        <p><strong>Visión</strong></p>
        <p>We built New York</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="../img/valores.png" alt="San Francisco" width="200" height="200">
        <p><strong>Valores</strong></p>
        <p>Yes, San Fran is ours</p>
      </div>
    </div>
  </div><br>

<!--comentarios de usuarios-->
  <h2>Comentarios de Usuarios</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"Gracias a los psicologos tuvimos una rehabilitación con exito!"<br><span>Familia Torres</span></h4>
      </div>
      <div class="item">
        <h4>"Mi vida cambio con las terapias psicológicas"<br><span>Ana</span></h4>
      </div>
      <div class="item">
        <h4>"Tienen buenas orientaciones para preveciones"<br><span>Javier</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<!-- Container Contacto -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACTANOS</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contactanos las 24 hrs del día.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Puebla, México</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> psicapp@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comentarios" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit" >Enviar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<footer class="container-fluid background-color:gray text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>PsicApp <a href="https://www.PsicApp.com" title="Vitanos">www.PsicApp.com</a></p>
  <p>© Derechos reservados 2019 ITP</p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+52 1 2211116913", // WhatsApp number
            call_to_action: "¡Dudas o aclaraciones!", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
</body>
</html>
