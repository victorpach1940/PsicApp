<!DOCTYPE html>
<html lang="es">
<head>
  <title>¡APOYANOS!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="shrtcut icon" href="../img/icono_page.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #000000;
  }
  .container-fluid {
    padding: 60px 50px;
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
    color: black;
  }

  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }

  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 {
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 {
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 {
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 {
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }

  </style>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #045FB4">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="apoyanos.php"><img src="../img/apoya.png" style="height:35px;"></a>
      <h5>Apoyanos</h5>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.html">Regresar</a></li>
      </ul>
    </div>
  </div>
</nav>
  <!-- Primer Container -->
  <!-- style="background:url(http://fabian.elmejorhosting.online/PsicApp/img/fondo.jpg   --- usa este para subir al host-->
<div class="container-fluid text-center" style="background:url(../img/background.jpg) no-repeat center center fixed; display: table; height: 90%; position: relative; width: 100%; background-size: cover; width:100%; height:550px; padding: 60px 25px; ">
  <h1 class="margin">¡Gracias por su apoyo!<br> ¿Cómo desea apoyarnos?</h1>
  <img src="../img/store.png" class="img-responsive rounded" style="display:inline" alt="Bird" width="200" height="200"><br>
  <p style="color: black;">Adquiere artículos de nuestra tienda!</p>
  <a href="https://psicapp.webnode.mx/"><button type="button" name="button" class="btn btn-warning">Ir a la tienda</button></a><br><br>
  <img src="../img/donar.png" class="img-responsive rounded" style="display:inline" alt="Bird" width="250" height="250"><br>
  <p > Realiza una donación voluntaria con la cantidad que gustes</p>
  <div class="div1">
    <div class="jumbotron">
      <img src="../img/gracias.gif" class="img-responsive rounded" style="display:inline" width="450" height="300"><br>
      <form class="" action="donar.php" method="post">
        <div class="form-group col-md-12">
          <label for="cantidad" class="display-4" style="color: black;"><br>Ingrese la cantidad a donar</label>
          <hr class="my-4">
          <input type="text" name="precio" class="form-control" placeholder="$0.0" required pattern="[0-9]+">
        </div>
        <button type="submit" name="button" class="btn btn-success">Confirmar</button>
      </form>
    </div>
  </div>
  <button type="button" name="button" class="btn btn-danger" id="myButton" onclick="ShowHideElement()">Quiero donar</button>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Derechos Reservados PsicApp <br> <a href="">www.PsicApp.com</a></p>
</footer>
<!--zona de js-->
<script type="text/javascript">
  $(".div1").hide();
  function ShowHideElement()
  {
    var text ="";

    if ($("#myButton").text() ==="Quiero donar")
    {
        $(".div1").show();
        text="Ocultar";
    }
    else
    {
      $(".div1").hide();
      text="Quiero donar";
    }
    $("#myButton").html(text);
  }
</script>
</body>
</html>
