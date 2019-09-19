<?php
require 'conn.php';

session_start();

if (isset($_GET['edit'])){
  $id2 = $_GET['edit'];
  $result = $conn->query("SELECT * FROM MEDICAMENTOS WHERE idemed='$id2';");
  if(mysqli_num_rows($result) > 0){
    $row = $result->fetch_array();
    $idee = $row['idemed'];
    $inve = $row['invmed'];
    $nuevo = $inve-1;
    $conn->query("UPDATE MEDICAMENTOS SET invmed='$nuevo' WHERE idemed='$idee';");
  }
  header("location: productos.php");
}
 ?>
