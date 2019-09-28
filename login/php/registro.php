<?php

	require_once "conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$apellidosp=$_POST['apellidosp'];
		$apellidosm=$_POST['apellidosm'];
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];
		$telefono=$_POST['telefono'];
		$edad=$_POST['edad'];
		$sexo=$_POST['sexo'];

		if(buscaRepetido($usuario,$password,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT into PACIENTES
				values ('$usuario','$password','$nombre','$apellidosp', '$apellidosm','$telefono','$edad','$sexo');";
			echo $result=mysqli_query($conexion,$sql);
		}


		function buscaRepetido($user,$pass,$conexion){
			$sql="SELECT * from PACIENTES
				where correo='".$user."' and password='".$pass."';";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}

 ?>
