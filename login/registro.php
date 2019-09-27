<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: #FF812A">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<div class="panel panel-heading">Registro de usuario</div>
				<div class="panel panel-body">
					<form id="frmRegistro">
						
					<input type="text" class="form-control input-sm" id="nombre" name="" placeholder="Nombre">
					<br>
					<input type="text" class="form-control input-sm" id="apellidos" name="" placeholder="Apellidos">
					<br>
					<input type="text" class="form-control input-sm" id="usuario" name="" placeholder="email">		
					<br>
					<input type="text" class="form-control input-sm" id="password" name="" placeholder="password">
					<br>
					<input type="text" class="form-control input-sm" id="telefono" name="" placeholder="telefono">
					<br>
					<input type="text" class="form-control input-sm" id="edad" name="" placeholder="edad">
					<br>
					<input type="text" class="form-control input-sm" id="sexo" name="" placeholder="sexo">
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
			}else if($('#apellidos').val()==""){
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
					"&apellidos=" + $('#apellidos').val() +
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

