<?php
session_start();
require "conn.php";
$ide='';
$sql=''; $retorno=''; $globales=0; $sql1=''; $sql2=''; $r1=''; $r2=''; $mujer=0;
$hombre=0; $edad=0; $sql3=''; $r3=''; $slqinserta=''; $resu='';$sql4=''; $r4=''; $sexo=$_SESSION['genero']; $anios=$_SESSION['edad'];
$sql4="SELECT max(idvis) FROM VISITANTES;"; $r4=mysqli_query($conn,$sql4);
$ide=mysqli_fetch_row($r4); $slqinserta="INSERT INTO VISITANTES VALUES ('','$sexo','$anios','ADICCIONESQ');"; $resu=mysqli_query($conn,$slqinserta);
$sql="SELECT * FROM VISITANTES WHERE secvis='ADICCIONESQ';"; $sql1="SELECT * FROM VISITANTES WHERE sexovis='F' AND secvis='ADICCIONESQ';";
$sql2="SELECT * FROM VISITANTES WHERE sexovis='M' AND secvis='ADICCIONESQ';"; $sql3="SELECT * FROM VISITANTES WHERE secvis='ADICCIONESQ' AND edadvis BETWEEN '15' AND '24';";
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
	<title>Cuestionario de adicciones</title>
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

       <li><a href="cuestionario_adicciones.php" class="red">Cuestionario Adicciones</a></li>
       <li><a href="cuestionario_saludmental.php">Cuestionario Salud mental</a></li>
       <li><a href="cuestionario_sexualidad.php">Cuestionario Sexualidad</a></li>
       <li><a href="cuestionario_violenciadepareja.php">Cuestionario Violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/php/salir.php">Salir</a></li>
     </ul>
  </div>
</nav>


   <ul class="sidenav" id="mobile-nav">
   	   <li><a href="cuestionario_adicciones.php" class="red">Cuestionario Adicciones</a></li>
       <li><a href="cuestionario_saludmental.php">Cuestionario Salud mental</a></li>
       <li><a href="cuestionario_sexualidad.php" >Cuestionario Sexualidad</a></li>
       <li><a href="cuestionario_violenciadepareja.php">Cuestionario Violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/php/salir.php">Salir</a></li>
   </ul>


   <center>
  <section><br><br><br><br><br><br></br><strong><p style="font-size:90px; color:#0B5394; font-family: 'Courgette', cursive;">¿Tienes alguna adicción? </p></strong>
  </section>
</center>
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
  <h1>Cuestionario de adicciones</h1>
			<p >
    <p align="justify">Por favor conteste las siguientes preguntas de forma honesta</p>
    <form method="POST" align="justify" id="cuestionario1">
    <ol>
      <li>¿Con qué frecuencia consume alguna bebida alcohólica?</li>
      <textarea name="respuesta1" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Cuántas consumiciones de bebidas alcohólicas suele realizar en un día de consumo normal? </li>
      <textarea name="respuesta2" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Con qué frecuencia toma 6 o más bebidas alcohólicas en una sola ocasión de
      consumo?</li>
      <textarea name="respuesta3" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Con qué frecuencia en el curso del último año ha sido incapaz de parar de
      beber una vez había empezado? </li>
      <textarea name="respuesta4" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Con qué frecuencia en el curso del último año ha necesitado beber en ayunas
      para recuperarse después de haber bebido mucho el día anterior? </li>
      <textarea name="respuesta5" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Con qué frecuencia en el curso del último año ha tenido remordimientos o sentimientos de culpa después de haber bebido? </li>
      <textarea name="respuesta6" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Con qué frecuencia en el curso del último año no ha podido recordar lo que
      sucedió la noche anterior porque había estado bebiendo? </li>
      <textarea name="respuesta7" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Usted o alguna otra persona han resultado heridos porque usted había bebido? </li>
      <textarea name="respuesta8" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Algún familiar, amigo, médico o profesional sanitario han mostrado preocupación
      por su consumo de bebidas alcohólicas o le han indicado que deje de beber?
      </li>
      <textarea name="respuesta9" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Has tenido dificultades porque consumes drogas o bebidas alcohólicas en la escuela?</li>
      <textarea name="respuesta10" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Se aburren tus amigos en las fiestas donde no sirven bebidas alcohólicas?</li>
      <textarea name="respuesta11" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Discuten demasiado tus padres o tutores? </li>
      <textarea name="respuesta12" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Amenazas a otros con hacerles daño?</li>
      <textarea name="respuesta13" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Te has hecho daño o le has hecho daño a otra persona accidentalmente, estando
      bajo los efectos del alcohol o drogas?</li>
      <textarea name="respuesta14" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Sueles perderte actividades o acontecimientos porque has gastado demasiado dinero
      en drogas o bebidas alcohólicas?
      </li>
      <textarea name="respuesta15" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Sueles consumir drogas?</li>
      <textarea name="respuesta16" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Tus amigos llevan drogas a las fiestas? </li>
      <textarea name="respuesta17" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Con que frecuencia consumes drogas</li>
      <textarea name="respuesta18" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Has comenzado a consumir mayores cantidades de drogas o alcohol para obtener el
      efecto que deseas?</li>
      <textarea name="respuesta19" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿A veces te vas de las fiestas porque en ellas no hay bebidas alcohólicas o drogas?</li>
      <textarea name="respuesta20" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Tienes dificultades para dormir?</li>
      <textarea name="respuesta21" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Has golpeado incluso herir gravemente a alguien con tal de obtener tu dosis de drogas o bebidas alhoolicas? </li>
      <textarea name="respuesta22" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Tienes amigos que han golpeado o amenazado a alguien sin razón?</li>
      <textarea name="respuesta23" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Has robado para obtener el consumo de tus bebidas alcoholicas o drogas??</li>
      <textarea name="respuesta24" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>
      <li>¿Tienes amigos que han robado? </li>
      <textarea name="respuesta25" rows="10" cols="65" placeholder="Escribe aquí tus respuestas"></textarea>

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
