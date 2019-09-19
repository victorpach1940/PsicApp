<?php
 require 'conn.php';

 session_start();

 $idee = '';
 $nam = '';
 $appp = '';
 $apmm = '';
 $tele = '';
 $mai = '';
 $car = '';
 $fun = '';
 $fun1 = '';
 $fun2 = '';
 $fun3 = '';
 $fun4 = '';
 $update = false;
 $i=0;

 if (isset($_POST['save'])){
   $ide = $_POST['ide'];
   $nam = $_POST['nombre'];
   $app = $_POST['app'];
   $apm = $_POST['apm'];
   $tel = $_POST['tel'];
   $mail = $_POST['mail'];
   $car = $_POST['carg'];
   $fun = $_POST['fun'];
   $fun1 = $_POST['fun1'];
   $fun2 = $_POST['fun2'];
   $fun3 = $_POST['fun3'];
   $fun4 = $_POST['fun4'];
   $sql1 = "INSERT INTO LOGIN VALUES ('$ide','$name','$app','$apm','$tel','$mail','$car','$fun', '$fun1', '$fun2', '$fun3', '$fun4');";
   if($conn->query($sql1)===TRUE){
     $_SESSION['message'] = "Participante agregado!";
     $_SESSION['msg_type'] = "success";
   }
   else{
     $_SESSION['message'] = "Error al agregar!";
     $_SESSION['msg_type'] = "danger";
   }

   header("location: participantes.php");
 }
 if (isset($_GET['delete'])){
   $id = $_GET['delete'];
   $conn->query("DELETE FROM LOGIN WHERE user='$id';");
   $_SESSION['message'] = "Borrado exitosamente!";
   $_SESSION['msg_type'] = "success";

   header("location: participantes.php");
 }

 if (isset($_GET['edit'])){
   $id2 = $_GET['edit'];
   $update = true;
   $result = $conn->query("SELECT * FROM LOGIN WHERE user='$id2';");
   if(mysqli_num_rows($result) > 0){
     $row = $result->fetch_array();
     $idee = $row['user'];
     $nam = $row['nombre'];
     $appp = $row['app'];
     $apmm = $row['apm'];
     $tele = $row['tel'];
     $mai = $row['alergias'];
     $car = $row['encronica'];
     $fun = $row['tipsangre'];
     $fun1 = $row['edad'];
     $fun2 = $row['altura'];
     $fun3 = $row['peso'];
     $fun4 = $row['logmedi'];
   }
 }

 if(isset($_POST['update'])){
   $i = $_POST['i'];
   $nom = $_POST['nombre'];
   $apat = $_POST['app'];
   $amat = $_POST['apm'];
   $phone = $_POST['tel'];
   $email = $_POST['mail'];
   $cargo = $_POST['carg'];
   $funcion = $_POST['fun'];
   $funcion1 = $_POST['fun1'];
   $funcion2 = $_POST['fun2'];
   $funcion3 = $_POST['fun3'];
   $funcion4 = $_POST['fun4'];
   $conn->query("UPDATE LOGIN SET nombre='$nom', app='$apat', apm='$amat', tel='$phone', alergias='$email', encronica='$cargo', tipsangre='$funcion', edad='$funcion1', altura='$funcion2', peso='$funcion3', logmedi='$funcion4'  WHERE user='$i';");
   $_SESSION['message'] = "Modificado exitosamente!";
   $_SESSION['msg_type'] = "success";
   header("location: participantes.php");
 }
 ?>
