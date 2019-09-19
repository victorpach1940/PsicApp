<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="icon" href="img/mediapp.png">
  <title>Login</title>
</head>
<body>
  <?php require_once 'php/conn.php'; require_once 'login.php'; SESSION_START();?>
    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php echo $_SESSION['message'];
        unset ($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>
    <?php
    $ide='';
    $name='';

    if(isset($_POST['logearse'])){
    $ide = $_POST['mail'];
    $name = $_POST['pass'];

    $result = $conn->query("SELECT * FROM LOGIN WHERE user='$ide' AND pass='$name';");
    if(mysqli_num_rows($result) > 0){
      $_SESSION['usuario']=$ide;
      header("location: php/index.php");
    }
    else {
      $_SESSION['message'] = "Error al logear!";
      $_SESSION['msg_type'] = "danger";
    }
    }
    ?>
  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="img/mediface.png">
        </div>

        <div class="col-12 form-input">
          <form action="login.php" method="post">
            <div class="form-group">
              <input type="email" name="mail" class="form-control" placeholder="Ingresa Email" value="" required>
            </div>
            <div class="form-group">
              <input type="password" name="pass" class="form-control" placeholder="Ingresa Password" value="" required>
            </div>
            <button type="submit" class="btn btn-success" name="logearse">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer class="page-footer fixed-bottom container-fluid text center" style="width: 100%; background-color: #181A1E; padding: 2% 0% 4% 5%; color: white;">
    <div class="row">
      <div class="col-sm-4">
        <h5>Integrantes</h3><br>
        <h6>Alejandro Perez Fabian</h4>
        <h6>Jorge Mistran Leal</h4>
      </div>
    </div>
  </footer>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
