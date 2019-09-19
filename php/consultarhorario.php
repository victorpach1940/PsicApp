<?php
 require 'conn.php';
 session_start();
 $ususer=$_SESSION['usuario'];
 $result9= mysqli_query($conn,"SELECT hormedi, horar1, horar2, horar3, horar4 FROM HORARIOS WHERE horusu='$ususer';");
 $row9 = mysqli_fetch_assoc($result9);

 $h1 = $row9['horar1'];
 $h2 = $row9['horar2'];
 $h3 = $row9['horar3'];
 $h4 = $row9['horar4'];
 $medi = $row9['hormedi'];
?>
