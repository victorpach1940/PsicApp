<?php
session_start();
require "conn.php";
$ide='';
$sql=''; $retorno=''; $globales=0; $sql1=''; $sql2=''; $r1=''; $r2=''; $mujer=0;
$hombre=0; $edad=0; $sql3=''; $r3=''; $slqinserta=''; $resu='';$sql4=''; $r4=''; $sexo=$_SESSION['genero']; $anios=$_SESSION['edad'];
$sql4="SELECT max(idvis) FROM VISITANTES;"; $r4=mysqli_query($conn,$sql4);
$ide=mysqli_fetch_row($r4); $slqinserta="INSERT INTO VISITANTES VALUES ('','$sexo','$anios','VIOLENCIA DE PAREJAQ');"; $resu=mysqli_query($conn,$slqinserta);
$sql="SELECT * FROM VISITANTES WHERE secvis='VIOLENCIA DE PAREJAQ';"; $sql1="SELECT * FROM VISITANTES WHERE sexovis='F' AND secvis='VIOLENCIA DE PAREJAQ';";
$sql2="SELECT * FROM VISITANTES WHERE sexovis='M' AND secvis='VIOLENCIA DE PAREJAQ';"; $sql3="SELECT * FROM VISITANTES WHERE secvis='VIOLENCIA DE PAREJAQ' AND edadvis BETWEEN '15' AND '24';";
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
	<title>Cuestionario de Violencia de pareja</title>
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

       <li><a href="cuestionario_adicciones.php" >Cuestionario Adicciones</a></li>
       <li><a href="cuestionario_saludmental.php">Cuestionario Salud mental</a></li>
       <li><a href="cuestionario_sexualidad.php" >Cuestionario Sexualidad</a></li>
       <li><a href="cuestionario_violenciadepareja.php"class="red">Cuestionario Violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/php/salir.php">Salir</a></li>
     </ul>
  </div>
</nav>


   <ul class="sidenav" id="mobile-nav">
   	   <li><a href="cuestionario_adicciones.php" >Cuestionario Adicciones</a></li>
       <li><a href="cuestionario_saludmental.php" >Cuestionario Salud mental</a></li>
       <li><a href="cuestionario_sexualidad.php" >Cuestionario Sexualidad</a></li>
       <li><a href="cuestionario_violenciadepareja.php" class="red">Cuestionario Violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/php/salir.php">Salir</a></li>
   </ul>


  <section><br><br><br><br><br><br><br><strong><p style="font-size:90px; font-family: 'Courgette', cursive;">¿Violencia de pareja?</p></strong>
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
  <article align="justify">
  <h1>Cuestionario de sexualidad</h1>
			<p >
    <p align="justify">Por favor conteste las siguientes preguntas de forma honesta</p>
    <form method="POST" align="justify" id="cuestionario4">
   <ol>
			<li>¿Qué papel tiene una mujer
		en una relación? ¿Y un
		hombre?</li>
		<textarea name="respuesta1" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿En alguna ocasión te humilla o te critica en público o en privado?</li>
		<textarea name="respuesta2" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Alguna vez has sido presionada a mantener relaciones sexuales o las has mantenido por miedo a tu pareja?</li>
		<textarea name="respuesta3" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Alguna vez te ha empujado o pegado?</li>
		<textarea name="respuesta4" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Sientes que intenta alejarte de tu entorno?</li>
		<textarea name="respuesta5" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Le molesta que tengas amigos masculinos o que tengas contacto con familia y amigos?</li>
		<textarea name="respuesta6" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Alguna vez te ha cogido el móvil y mirado tus mensajes sin permiso?</li>
		<textarea name="respuesta7" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Te manda mensajes de forma contínua para saber dónde y con quién estás?</li>
		<textarea name="respuesta8" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Te insulta o te pone motes (apodos, sobrenombres) despectivos?</li>
		<textarea name="respuesta9" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Alguna vez tu pareja te ha amenazado a ti o alguno de tus seres queridos o te ha hecho sentir como si estuvieran en peligro si no hacias o dejabas de hacer algo</li>
		<textarea name="respuesta10" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Te sientes segura en tu casa?</li>
		<textarea name="respuesta11" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Te compara con frecuencia con otras personas y te pone por debajo de ellas?</li>
		<textarea name="respuesta12" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li> ¿Has intentado denunciar o retirado una denuncia a tu pareja en alguna ocasión?</li>
		<textarea name="respuesta13" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Te impide o te intenta convencer para que no trabajes?</li>
		<textarea name="respuesta14" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Decide por ti?</li>
		<textarea name="respuesta15" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li> ¿Alguna vez has tenido que ocultar moretones?</li>
		<textarea name="respuesta16" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li> ¿Alguna vez te ha dicho que no vales nada, que mereces estar muerta o que él es el único que podría quererte y le deberías estar agradecida?</li>
		<textarea name="respuesta17" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>Cuando salís, ¿te obliga a arreglarte o a no hacerlo?</li>
		<textarea name="respuesta18" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Te impide o prohíbe hacer algo que desees?</li>
		<textarea name="respuesta19" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Crees que puedes merecer una bofetada por parte de tu pareja?</li>
		<textarea name="respuesta20" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Qué crees que pasaría con tus hijos si dejaras a tu marido?</li>
		<textarea name="respuesta21" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Alguna vez ha amenazado o pegado a tus hijos para obligarte a hacer algo, o te ha echado la culpa de tener que golpearlos?</li>
		<textarea name="respuesta22" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Crees que los malos tratos solo ocurren en familias desestructuradas?</li>
		<textarea name="respuesta23" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Consideras que la violencia y el maltrato se dan solo cuando hay golpes?</li>
		<textarea name="respuesta24" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		<li>¿Tienes miedo o alguna vez has tenido miedo de él?</li>
		<textarea name="respuesta25" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
		</li>
	</ol>
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
