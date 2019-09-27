<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: #84D2FF">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading">Login PsicApp</div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="img/ico.png" height="200" >
					</div>
					<p></p>
					<label>Correo</label>
					<input type="text" id="usuario" class="form-control input-sm" name="">
					<label>Password</label>
					<input type="password" id="password" class="form-control input-sm" name="">
					<p></p>
					<span class="btn btn-primary" id="entrarSistema">Entrar</span>
					<a href="registro.php" class="btn btn-danger">Registrar</a>
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
								window.location="inicio.php";
							}else{
								alertify.alert("Datos incorrectos, debes registrarte");
							}
						}
					});
		});	
	});
</script>