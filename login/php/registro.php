<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$usuario=$_POST['usuario'];
		$password=sha1($_POST['password']);
		$telefono=$_POST['telefono'];
		$edad=$_POST['edad'];
		$sexo=$_POST['sexo'];

		if(buscaRepetido($usuario,$password,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT into usuarios (nombre,apellidos,usuario,password,telefono,edad,sexo)
				values ('$nombre','$apellidos','$usuario','$password','$telefono','$edad','$sexo')";
			echo $result=mysqli_query($conexion,$sql);
		}


		function buscaRepetido($user,$pass,$conexion){
			$sql="SELECT * from usuarios 
				where usuario='$user' and password='$pass'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}

 ?>