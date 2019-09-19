<?php
$host="localhost";
$user="root";
$clave="";
$db="meditec";

//$host="sql313.elmejorhosting.online";
//$user="lmjr_24233346";
//$clave="lalo789";
//$db="lmjr_24233346_meditec";

$conn=mysqli_connect($host, $user, $clave, $db);

if(!$conn){
	print("Error al conectar");
}
else {
	mysqli_select_db($conn, $db);
}

 ?>
