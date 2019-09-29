<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
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
			<div class="panel panel-danger">
				<div class="panel panel-heading">Registro de usuario</div>
				<div class="panel panel-body">
					<form id="frmRegistro">

					<input type="text" class="form-control input-sm" id="nombre" name="" placeholder="Nombre" required="">
					<br>
					<input type="text" class="form-control input-sm" id="apellidosp" name="" placeholder="Apellido paterno" required="">
					<br>
					<input type="text" class="form-control input-sm" id="apellidosm" name="" placeholder="Apellido materno" required="">
					<br>
					<input type="text" class="form-control input-sm" id="usuario" name="" placeholder="email" required="">
					<br>
					<input type="text" class="form-control input-sm" id="password" name="" placeholder="password" required="">
					<br>
					<input type="text" class="form-control input-sm" id="telefono" name="" placeholder="telefono" required="">
					<br>
					<input type="text" class="form-control input-sm" id="edad" name="" placeholder="edad" required="" pattern="[0-9]{2}" maxlength="2" title="Edad desde 10 años">
					<br>
					<input type="text" class="form-control input-sm" id="sexo" name="" placeholder="sexo" required="" pattern="(F|M)" maxlength="1" title="F=femenino, M=masculino" placeholder="F o M">
					<p></p>
					<span class="btn btn-primary" id="registrarNuevo">Registrar</span>
					</form>
					<div style="text-align: right;">
						<a href="index.php" class="btn btn-success">Login</a>
					</div>
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
		$('#registrarNuevo').click(function(){

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar un nombre");
				return false;
			}else if($('#apellidosp').val()==""){
				alertify.alert("Debes agregar los apellidos");
				return false;
			}else if($('#apellidosm').val()==""){
				alertify.alert("Debes agregar los apellidos");
				return false;
			}else if($('#usuario').val()==""){
				alertify.alert("Debes agregar un email");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar un password");
				return false;
			}else if($('#telefono').val()==""){
				alertify.alert("Debes agregar un telefono");
				return false;
			}else if($('#edad').val()==""){
				alertify.alert("Debes agregar la edad");
				return false;
			}else if($('#sexo').val()==""){
				alertify.alert("Debes agregar el sexo");
				return false;
			}




			cadena="nombre=" + $('#nombre').val() +
					"&apellidosp=" + $('#apellidosp').val() +
					"&apellidosm=" + $('#apellidosm').val() +
					"&usuario=" + $('#usuario').val() +
					"&password=" + $('#password').val()+
					"&telefono=" + $('#telefono').val()+
					"&edad=" + $('#edad').val()+
					"&sexo=" + $('#sexo').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){

							if(r==2){
								alertify.alert("¡Este email ya existe, prueba con otro!");
							}
							else if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>
