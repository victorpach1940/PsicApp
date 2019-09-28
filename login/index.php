<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/icono_page.png">
	<?php require_once "scripts.php"; ?>
</head>
<body style="background: url(http://localhost/PsicApp/img/background.jpg)center center fixed;">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading">Login PsicApp</div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="../img/login.png" height="200" >
					</div>
					<p></p>
					<label>Correo</label>
					<input type="text" id="usuario" class="form-control input-sm" name="">
					<label>Password</label>
					<input type="password" id="password" class="form-control input-sm" name="">
					<p></p>
					<span class="btn btn-primary" id="entrarSistema">Entrar</span>
					<a href="registro.php" class="btn btn-success">Registrar</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Debes agregar un email");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar una contraseña");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() +
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){
							if(r==1){
								window.location="../php/index.php";
							}else{
								alertify.alert("Datos incorrectos, debes registrarte");
							}
						}
					});
		});
	});
</script>
