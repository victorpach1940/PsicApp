<?php
$total=$_POST['precio'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>¡DONAR!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="shrtcut icon" href="../img/icono_page.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://www.paypal.com/sdk/js?client-id=ARFrn4fmkn_fhYs0QShtsjE7-kNgdMkC-cus4drUYVGG6gTivkYqQV4Do8IyG1bFOOgKVcvTS34IMPR9&currency=MXN"></script>
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
      <h5>Donar</h5>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="apoyanos.php">Regresar</a></li>
      </ul>
    </div>
  </div>
</nav>
  <!-- Primer Container -->
<div class="container-fluid text-center" style="background:url(http://localhost/PsicApp/img/fondo.jpg) no-repeat center center fixed; display: table; height: 90%; position: relative; width: 100%; background-size: cover; width:100%; height:550px; padding: 60px 25px; ">
  <div class="jumbotron text-center" style="color: black;">
    <h1 class="display-4">¡Quiero donar!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de donar la cantidad de:
      <h4><strong>$<?php echo number_format($total,2); ?>MXN</strong></h4>
        <!-- Set up a container element for the button -->
        <div class="col" id="paypal-button-container"></div>
    </p>
    <p>¡Gracias por apoyarnos!</p>
  </div>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
       // Set up the transaction
       return actions.order.create({
         purchase_units: [{
           amount: {
             "currency_code": 'MXN',
             "value": '<?php echo $total; ?>'
           },
           description: "Donacion para el Centro de integracion: $<?php echo number_format($total,2); ?>"
         }]
       });
     },
     onApprove: function(data, actions) {
        // Capture the funds from the transaction
        return actions.order.capture().then(function(details) {
          // Show a success message to your buyer
          console.log(data);
          console.log(details);
          alert('Donación completada por ' + details.payer.name.given_name);
            window.location="opciones.php"
          /* Call your server to save the transaction
            return fetch('/paypal-transaction-complete', {
              method: 'post',
              headers: {
                'content-type': 'application/json'
              },
              body: JSON.stringify({
                orderID: data.orderID
              })
            });*/
        });
      }
  }).render('#paypal-button-container');
</script>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Derechos Reservados PsicApp <br> <a href="">www.PsicApp.com</a></p>
</footer>
</body>
</html>
