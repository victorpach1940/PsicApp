<?php

	session_start();

	unset($_SESSION['user']);

	header("location:../../php/index.php");

 ?>
