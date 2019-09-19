<?php
 require 'conn.php';

 session_start();

 $idee = '';
 $nam = '';
 $appp = '';
 $apmm = '';
 $apmm2 = '';
 $tele = '';
 $mai = '';
 $car = '';
 $fun = '';
 $fun2 ='';
 $update = false;
 $i=0;

 if (isset($_POST['save'])){
   $name = $_POST['nombre'];
   $app = $_POST['obv'];
   $apm = $_POST['fec'];
   $apm2 = $_POST['fec2'];
   $tel = $_POST['hrs'];
   $mail = $_POST['iuse'];
   $sql1 = "INSERT INTO HORARIOS VALUES ('','$name','$app','$apm', '$apm2','$tel','$mail');";
   if($conn->query($sql1)===TRUE){
     $_SESSION['message'] = "Horario agregado!";
     $_SESSION['msg_type'] = "success";
   }
   else{
     $_SESSION['message'] = "Error al agregar!";
     $_SESSION['msg_type'] = "danger";
   }

   header("location: actividades.php");
 }
 if (isset($_GET['delete'])){
   $id = $_GET['delete'];
   $conn->query("DELETE FROM HORARIOS WHERE idehor='$id';");
   $_SESSION['message'] = "Horario borrado exitosamente!";
   $_SESSION['msg_type'] = "success";

   header("location: actividades.php");
 }

 if (isset($_GET['edit'])){
   $id2 = $_GET['edit'];
   $update = true;
   $result = $conn->query("SELECT * FROM HORARIOS WHERE idehor='$id2';");
   if(mysqli_num_rows($result) > 0){
     $row = $result->fetch_array();
     $idee = $row['idehor'];
     $nam = $row['horar1'];
     $appp = $row['horar2'];
     $apmm = $row['horar3'];
     $apmm2 = $row['horar4'];
     $tele = $row['hormedi'];
     $mai = $row['horusu'];
   }
 }

 if(isset($_POST['update'])){
   $i = $_POST['i'];
   $nom = $_POST['nombre'];
   $apat = $_POST['obv'];
   $amat = $_POST['fec'];
   $amat2 = $_POST['fec2'];
   $phone = $_POST['hrs'];
   $conn->query("UPDATE HORARIOS SET horar1='$nom', horar2='$apat', horar3='$amat', horar4='$amat2', hormedi='$phone' WHERE idehor='$i';");
   $_SESSION['message'] = "Horario modificado exitosamente!";
   $_SESSION['msg_type'] = "success";
   header("location: actividades.php");
 }
 ?>
