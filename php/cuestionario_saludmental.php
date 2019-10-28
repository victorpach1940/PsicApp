<?php
session_start();
require "conn.php";
$ide='';
$sql=''; $retorno=''; $globales=0; $sql1=''; $sql2=''; $r1=''; $r2=''; $mujer=0;
$hombre=0; $edad=0; $sql3=''; $r3=''; $slqinserta=''; $resu='';$sql4=''; $r4=''; $sexo=$_SESSION['genero']; $anios=$_SESSION['edad'];
$sql4="SELECT max(idvis) FROM VISITANTES;"; $r4=mysqli_query($conn,$sql4);
$ide=mysqli_fetch_row($r4); $slqinserta="INSERT INTO VISITANTES VALUES ('','$sexo','$anios','SALUD MENTALQ');"; $resu=mysqli_query($conn,$slqinserta);
$sql="SELECT * FROM VISITANTES WHERE secvis='SALUD MENTALQ';"; $sql1="SELECT * FROM VISITANTES WHERE sexovis='F' AND secvis='SALUD MENTALQ';";
$sql2="SELECT * FROM VISITANTES WHERE sexovis='M' AND secvis='SALUD MENTALQ';"; $sql3="SELECT * FROM VISITANTES WHERE secvis='SALUD MENTALQ' AND edadvis BETWEEN '15' AND '24';";
$retorno=mysqli_query($conn,$sql); $r1=mysqli_query($conn,$sql1); $r2=mysqli_query($conn,$sql2); $r3=mysqli_query($conn,$sql3);
$globales=mysqli_num_rows($retorno); $mujer=mysqli_num_rows($r1); $hombre=mysqli_num_rows($r2); $edad=mysqli_num_rows($r3);
$usuario='';
$menu=1;
//Si ya esta instanciada la sesion usuario
if (isset($_SESSION['user'])) {
	//asignar como visitante al usuario
	if(empty($_SESSION['user'])){
		header("location: ../login/index.php");
		//$_SESSION['user']=$usuario='visitante';
    //$menu=1;
	}
	//Si la sesion usuario no es un visitantes, es decir, ya tiene una sesion iniciada
	//obtener el id del usuario
	elseif ($_SESSION['user']!='visitante') {
		$usuario=$_SESSION['user'];
    $menu=2;
	}
}
//No esta instanciada la sesion usuario, por lo que se le manda a registrar su edad y genero
else{
	/*$_SESSION['user']=$usuario='visitante';
  $menu=1;*/
	header("location: ../login/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test de salud mental</title>
</head>
<body>
	<header>

	</header>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/responsive-elements/1.0.2/responsive-elements.min.js" integrity="" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/responsive-nav.js/1.0.39/responsive-nav.min.js" integrity="" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/ResponsiveSlides.js/1.55/responsiveslides.min.js" integrity="" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="shrtcut icon" href="../img/icono_page.png">
<nav>

  <div class="nav-wrapper">
     <a href="#" class="brand-logo">PsicApp</a>

	<a href="#" class="sidenav-trigger" data-target="mobile-nav" >
		<i class="material-icons">menu</i>
	</a>
     <ul class="right hide-on-med-and-down">

       <li><a href="cuestionario_adicciones.php" >Test adicciones</a></li>
       <li><a href="cuestionario_saludmental.php"class="red">Test salud mental</a></li>
       <li><a href="cuestionario_sexualidad.php">Test sexualidad</a></li>
       <li><a href="cuestionario_violenciadepareja.php">Test violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/php/salir.php">Salir</a></li>
     </ul>
  </div>
</nav>


   <ul class="sidenav" id="mobile-nav">
   	   <li><a href="cuestionario_adicciones.php" >Test adicciones</a></li>
       <li><a href="cuestionario_saludmental.php" class="red">Test salud mental</a></li>
       <li><a href="cuestionario_sexualidad.php" >Test sexualidad</a></li>
       <li><a href="cuestionario_violenciadepareja.php">Test violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/php/salir.php">Salir</a></li>
   </ul>


  <section><br><br><br><br><br><br><br><strong><p style="font-size:90px; font-family: 'Courgette', cursive;">Test de seguimiento</p></strong>
  </section>

  <div class="box container white
  ">
	<span class="badge" data-badge-caption="-Visita" style="color:white; background-color:#000000; border-radius:20px;"><?php echo $globales; ?></span>
	<span class="badge" data-badge-caption="-Mujer" style="color:white; background-color:#F08080; border-radius:20px;"><?php echo $mujer; ?></span>
	<span class="badge" data-badge-caption="-Hombre" style="color:white; background-color:#6495ED; border-radius:20px;"><?php echo $hombre; ?></span>
	<span class="badge" data-badge-caption="-De 15 a 24" style="color:white; background-color:#008080; border-radius:20px;"><?php echo $edad; ?></span>
  <script>
  	$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
</script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <article align="justify"></br>
  <h1>Test de salud mental</h1>
			<p >
    <p align="justify">Por favor conteste las siguientes preguntas de forma honesta</p>
    <form method="POST" align="justify" id="cuestionario2">
    


 <table>
      <?php 
      include("conect.php");

      $sql= "SELECT *FROM pregunta WHERE id>10 AND id<=20 ";
      $resultado=mysqli_query($conect,$sql);

      while ($mostrar=mysqli_fetch_array($resultado)) {
?>

        <tr>
          <td><?php echo $mostrar['id'] ?></td>
          <td><?php echo $mostrar['pregunta'] ?></td>
    </tr>
    <?php 
  }
     ?>
  

     <?php 
    $insert="INSERT INTO RESPUESTAS VALUES()"



      ?>
     </table>

<input type="submit" value="Enviar respuestas">
</form>


		</p>
	</div>
		</article>
	</section>
  </div>
</body>
</html>
<!-- script -->


  <script>

     $(document).ready(function(){

          $(window).scroll(function(){

            if($(window).scrollTop()>300){
              $('nav').addClass('red');
            }else{
              $('nav').removeClass('red');
            }

          });

     });

  </script>
  <script>
  		     $(document).ready(function(){
  		     	$('.sidenav').sidenav();
  		     });


  </script>



<!-- style -->
<style>

    nav{
      position: fixed;
      background: rgba(0, 0, 0, 0.2);
      padding:0px 20px;
    }

    section{
      background-image: url(back.jpg);
      background-size: cover;
      width: 100%;
      height: 800px;
			text-align: center;
			color: white;
    }
    .box{
      margin-top: 20px;
      height: 1000px;
    }

    nav li a:hover{
      background: red;
    }
</style>
