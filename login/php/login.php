<?php


	session_start();
	require_once "conexion.php";

	$conn=conexion();
	mysqli_select_db($conn,'TRANSFORMACIONAL');
		$usuario=$_POST['usuario'];
		$pass=$_POST['password'];

		$sql="SELECT * from PACIENTES where correo='".$usuario."' and password='".$pass."';";
		$result=mysqli_query($conn,$sql);
		$rows=mysqli_num_rows($result);
		$fetch=mysqli_fetch_assoc($result);
		if($rows > 0){
			$_SESSION['user']=$usuario;
			$_SESSION['edad']=$fetch['edad'];
			$_SESSION['genero']=$fetch['sexo'];
			echo 1;
		}else{
			echo 0;
		}
 ?>
