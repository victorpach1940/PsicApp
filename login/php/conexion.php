

<?php
	function conexion()
	{
		$host="localhost";
		$usu="root";
		$clave="";
		$db="TRANSFORMACIONAL";
		$conexion=mysqli_connect($host,$usu,$clave,$db);
		return $conexion;
	}

 ?>
