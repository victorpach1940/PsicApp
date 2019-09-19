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
 $update = false;
 $i=0;

 if (isset($_POST['save'])){
   $ide = $_POST['ide'];
   $name = $_POST['nombre'];
   $app = $_POST['app'];
   $tel = $_POST['tel'];
   $car = $_POST['carg'];
   $sql1 = "INSERT INTO MEDICOS VALUES ('$ide','$name','$app','$tel','$car');";
   if($conn->query($sql1)===TRUE){
     $_SESSION['message'] = "Medico agregado!";
     $_SESSION['msg_type'] = "success";
   }
   else{
     $_SESSION['message'] = "Error al agregar!";
     $_SESSION['msg_type'] = "danger";
   }

   header("location: responsables.php");
 }
 if (isset($_GET['delete'])){
   $id = $_GET['delete'];
   $conn->query("DELETE FROM MEDICOS WHERE idemed='$id';");
   $_SESSION['message'] = "Borrado exitosamente!";
   $_SESSION['msg_type'] = "success";

   header("location: responsables.php");
 }

 if (isset($_GET['edit'])){
   $id2 = $_GET['edit'];
   $update = true;
   $result = $conn->query("SELECT * FROM MEDICOS WHERE idemed='$id2';");
   if(mysqli_num_rows($result) > 0){
     $row = $result->fetch_array();
     $idee = $row['idemed'];
     $nam = $row['nommed'];
     $appp = $row['tipmed'];
     $tele = $row['telmed'];
     $car = $row['direc'];
   }
 }

 if(isset($_POST['update'])){
   $i = $_POST['i'];
   $nom = $_POST['nombre'];
   $apat = $_POST['app'];
   $phone = $_POST['tel'];
   $cargo = $_POST['carg'];
   $conn->query("UPDATE MEDICOS SET nommed='$nom',tipmed='$apat', telmed='$phone', direc='$cargo' WHERE idemed='$i';");
   $_SESSION['message'] = "Modificado exitosamente!";
   $_SESSION['msg_type'] = "success";
   header("location: responsables.php");
 }
 ?>
