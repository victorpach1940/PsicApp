<?php
session_start();
require "conn.php";
$ide='';
$sql=''; $retorno=''; $globales=0; $sql1=''; $sql2=''; $r1=''; $r2=''; $mujer=0;
$hombre=0; $edad=0; $sql3=''; $r3=''; $slqinserta=''; $resu='';$sql4=''; $r4=''; $sexo=$_SESSION['genero']; $anios=$_SESSION['edad'];
$sql4="SELECT max(idvis) FROM VISITANTES;"; $r4=mysqli_query($conn,$sql4);
$ide=mysqli_fetch_row($r4); $slqinserta="INSERT INTO VISITANTES VALUES ('','$sexo','$anios','SEXUALIDADQ');"; $resu=mysqli_query($conn,$slqinserta);
$sql="SELECT * FROM VISITANTES WHERE secvis='SEXUALIDADQ';"; $sql1="SELECT * FROM VISITANTES WHERE sexovis='F' AND secvis='SEXUALIDADQ';";
$sql2="SELECT * FROM VISITANTES WHERE sexovis='M' AND secvis='SEXUALIDADQ';"; $sql3="SELECT * FROM VISITANTES WHERE secvis='SEXUALIDADQ' AND edadvis BETWEEN '15' AND '24';";
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
	<title>Cuestionario de sexualidad</title>
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
       <li><a href="cuestionario_sexualidad.php" class="red">Cuestionario Sexualidad</a></li>
       <li><a href="cuestionario_violenciadepareja.php">Cuestionario Violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/php/salir.php">Salir</a></li>
     </ul>
  </div>
</nav>


   <ul class="sidenav" id="mobile-nav">
   	   <li><a href="cuestionario_adicciones.php" >Cuestionario Adicciones</a></li>
       <li><a href="cuestionario_saludmental.php" >Cuestionario Salud mental</a></li>
       <li><a href="cuestionario_sexualidad.php" class="red">Cuestionario Sexualidad</a></li>
       <li><a href="cuestionario_violenciadepareja.php">Cuestionario Violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/php/salir.php">Salir</a></li>
   </ul>


  <section><br><br><br><br><br><br><br><strong><p style="font-size:90px; font-family: 'Courgette', cursive;">¿Sexualidad?</p></strong>
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
    <p align="justify">Por favor conteste las siguientes preguntas de forma honesta y sin ningun tipo de pena, sus respuestas son de uso exclusivo de pre diagnostico</p>
    <form method="POST" align="justify" id="cuestionario3">
    <ol>
			<li>¿Pienso mucho en sexo?</li>
			<textarea name="respuesta1" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Tengo escaso impulso sexual?</li>
			<textarea name="respuesta2" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿He perdido la iniciativa en las relaciones sexuales?</li>
			<textarea name="respuesta3" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Busco excusas para evitar el sexo e incluso lo rechazo?</li>
			<textarea name="respuesta4" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿La frecuencia de mis relaciones sexuales ha disminuido en más de un 50%?</li>
			<textarea name="respuesta5" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Hay una gran diferencia entre mi deseo de frecuencia sexual y el de mi pareja (que es mayor)?</li>
			<textarea name="respuesta6" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Aunque mi pareja se muestre muy cálida y afectiva, me cuesta entrar en situación sexual?</li>
			<textarea name="respuesta7" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Pueden llegar a gustarme las caricias, siempre que tenga la seguridad de que no terminarán en sexo?</li>
			<textarea name="respuesta8" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Me cuesta concentrarme en una relación sexual?</li>
			<textarea name="respuesta9" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Demuestro poca pasión en mis relaciones sexuales, estoy como distante?</li>
			<textarea name="respuesta10" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Siento la relación sexual como mecánica y sin placer?</li>
			<textarea name="respuesta11" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Mis fantasías sexuales casi se han anulado?</li>
			<textarea name="respuesta12" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Mi impulso hacia el sexo es muy inferior al de mi pareja?</li>
			<textarea name="respuesta13" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Vives como una presión las peticiones de sexo por parte de tu pareja</li>
			<textarea name="respuesta14" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Cres que tu relación de pareja se está deteriorando por culpa del sexo?</li>
			<textarea name="respuesta15" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Has fantaseado con tener relaciones con una persona de tu mismo sexo?</li>
			<textarea name="respuesta16" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Padeces dolores o ardor en el área de tus genitales?</li>
			<textarea name="respuesta17" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Usas condón en tus relaciones sexuales?</li>
			<textarea name="respuesta18" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Le as sido infiel a tu pareja?</li>
			<textarea name="respuesta19" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Hace cuanto tiempo fue la ultima vez que tuviste una satisfacción sexual?</li>
			<textarea name="respuesta20" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Sufres de eyaculación precoz?</li>
			<textarea name="respuesta21" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿vives acomplejado por el tamaño de tu pene, o senos en caso de mujer?</li>
			<textarea name="respuesta22" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Padeces de dolores o ardor al orinar?</li>
			<textarea name="respuesta23" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Has pensado en buscar ayuda psicologica o ginecologica para tus inquietudes sexuales o mentales?</li>
			<textarea name="respuesta24" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
			<li>¿Consideras que eres feliz con tu sexualidad?</li>
			<textarea name="respuesta25" rows="10" cols="40" placeholder="Escribe aquí tus respuestas"></textarea>
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
    }
    .box{
      margin-top: 20px;
      height: 1000px;
    }

    nav li a:hover{
      background: red;
    }
</style>
