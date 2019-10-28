
<!-- $host="sql313.elmejorhosting.online";
		$usu="lmjr_24233346";
		$clave="lalo789";
		$db="lmjr_24233346_TRANSFORMACIONAL";
	-->
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
