<?php
session_start();
require "conn.php";
$ide='';
$sql=''; $retorno=''; $globales=0; $sql1=''; $sql2=''; $r1=''; $r2=''; $mujer=0;
$hombre=0; $edad=0; $sql3=''; $r3=''; $slqinserta=''; $resu='';$sql4=''; $r4=''; $sexo=$_SESSION['genero']; $anios=$_SESSION['edad'];
$sql4="SELECT max(idvis) FROM VISITANTES;"; $r4=mysqli_query($conn,$sql4);
$ide=mysqli_fetch_row($r4); $slqinserta="INSERT INTO VISITANTES VALUES ('','$sexo','$anios','EXPERTS');"; $resu=mysqli_query($conn,$slqinserta);
$sql="SELECT * FROM VISITANTES WHERE secvis='EXPERTS';"; $sql1="SELECT * FROM VISITANTES WHERE sexovis='F' AND secvis='EXPERTS';";
$sql2="SELECT * FROM VISITANTES WHERE sexovis='M' AND secvis='EXPERTS';"; $sql3="SELECT * FROM VISITANTES WHERE secvis='EXPERTS' AND edadvis BETWEEN '15' AND '24';";
$retorno=mysqli_query($conn,$sql); $r1=mysqli_query($conn,$sql1); $r2=mysqli_query($conn,$sql2); $r3=mysqli_query($conn,$sql3);
$globales=mysqli_num_rows($retorno); $mujer=mysqli_num_rows($r1); $hombre=mysqli_num_rows($r2); $edad=mysqli_num_rows($r3);
$usuario='';
$menu=1;
//Si ya esta instanciada la sesion usuario
if (isset($_SESSION['user'])) {
	//asignar como visitante al usuario
	if(empty($_SESSION['user'])){
		$_SESSION['user']=$usuario='visitante';
    $menu=1;
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
	header("location: previus.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Salud Mental</title>
	<link rel="shrtcut icon" href="../img/icono_page.png">

</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/responsive-elements/1.0.2/responsive-elements.min.js" integrity="" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/responsive-nav.js/1.0.39/responsive-nav.min.js" integrity="" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/ResponsiveSlides.js/1.55/responsiveslides.min.js" integrity="" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
<?php if ($menu==1) { ?>
<nav>

  <div class="nav-wrapper">
     <a href="#" class="brand-logo">PsicApp</a>

	<a href="#" class="sidenav-trigger" data-target="mobile-nav" >
		<i class="material-icons">menu</i>
	</a>
     <ul class="right hide-on-med-and-down">


       <li><a href="adicciones.php" >Adicciones</a></li>
       <li><a href="saludmental.php" class="red">Salud mental</a></li>
       <li><a href="sexualidad.php">Sexualidad</a></li>
       <li><a href="violenciadepareja.php">Violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/index.php">Inicia sesion/Registrate</a></li>
     </ul>
  </div>
</nav>


   <ul class="sidenav" id="mobile-nav">
   	  <li><a href="adicciones.php" >Adicciones</a></li>
       <li><a href="saludmental.php" class="red">Salud mental</a></li>
       <li><a href="sexualidad.php">Sexualidad</a></li>
       <li><a href="violenciadepareja.php">Violencia de pareja</a></li>
       <li><a href="index.php">Inicio</a></li>
			 <li><a href="../login/index.php">Inicia sesion/Registrate</a></li>
   </ul>
<?php }elseif ($menu==2) { ?>
	<nav>

	  <div class="nav-wrapper">
	     <a href="#" class="brand-logo">PsicApp</a>

		<a href="#" class="sidenav-trigger" data-target="mobile-nav" >
			<i class="material-icons">menu</i>
		</a>
	     <ul class="right hide-on-med-and-down">

	       <li><a href="adicciones.php" >Adicciones</a></li>
	       <li><a href="saludmental.php" class="red">Salud mental</a></li>
	       <li><a href="sexualidad.php">Sexualidad</a></li>
	       <li><a href="violenciadepareja.php">Violencia de pareja</a></li>
	       <li><a href="index.php">Inicio</a></li>
				 <li><a href="../login/php/salir.php">Salir</a></li>
	     </ul>
	  </div>
	</nav>


	   <ul class="sidenav" id="mobile-nav">
	   	  <li><a href="adicciones.php" >Adicciones</a></li>
	       <li><a href="saludmental.php" class="red">Salud mental</a></li>
	       <li><a href="sexualidad.php">Sexualidad</a></li>
	       <li><a href="violenciadepareja.php">Violencia de pareja</a></li>
	       <li><a href="index.php">Inicio</a></li>
				 <li><a href="../login/php/salir.php">Salir</a></li>
	   </ul>
	<?php } ?>

  <section><br><br><br><br><br><br><br><strong><p style="font-size:90px; font-family: 'Courgette', cursive;">¿Cuando hablar con un experto?</p></strong>
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
  <h1>¿Psicologos?</h1>
<h3>Introducción</h3>
			<p>
				Reconocer la vulnerabilidad suele ser la primera dificultad con la que se encuentran aquellas personas que no quieren acudir a un psicólogo.</br>
				El psicólogo no es tu amigo, sin embargo, sí se establece un vínculo personal que es muy especial al resultar tan positivo. Un buen psicólogo se convierte en un punto de inflexión en su vida. Un psicólogo te ayuda a encauzar esa situación pero, ¿Cuándo hablar con un psicólogo? a continuación te lo explicamos.
			<div class="indice">
			<p class="indice-Contenidos">Contenidos</p>
			<ol class="indice-lista">
				<li><a href="#1">¿Cuándo dar el paso de pedir ayuda?</a></li>
				<li><a href="#2">¿De que hablo con el psicologo?</a> </li>
				<li><a href="#3">¿Tratamientos?</a> </li>
				<li><a href="#9">Preguntas frecuentes</a>
						</li>
					</li>
				</li>
			</ol>
			</div>





				<h3><b id="1">¿Cuándo dar el paso de pedir ayuda?</b></h3>
        Cuando los días se tiñen de un color gris permanente. Nadie debe acostumbrarse a la tristeza por pura norma.
        <br>Cuando existe un dolor del alma que pesa hasta el punto de dificultar hábitos tan cotidianos como empezar el día y levantarte de la cama. Cuanto tienes pensamientos muy negativos y emociones muy desagradables que te desestabilizan en cualquier situación.
        <br>Cuando dentro de ti sientes que no te encuentras bien y que tú no puedes hacer frente por ti mismo a ese dolor, entonces, pide ayuda.
						    <img class="responsive-img" width="900" src="../img/psicologo.jpg">

				<b id="2"><h5>¿De que hablo con el psicologo?</b></h5>
				<article align="justify">
          Lleva un diario de tu terapia. No hace falta que escribas páginas y páginas, bastará con algunos apuntes que recojan lo más importante que habéis hablado o aquello que más te ha resonado. Algunos pacientes toman notas durante la sesión, para que no se les escape nada.<br>
          Habla abiertamente con tu terapeuta, redirígele hacia los temas que tú quieres tratar. A veces, cuando los psicólogos vemos varios caminos a tomar en la conversación, no acertamos con el que es clave ese día para el paciente. Díselo con confianza y hablad de todo aquello que sientas que no está funcionando entre vosotros.<br>
          A no ser que ese día sientas que necesitas silencio absoluto, ten pensado el tema que quieres tratar en la sesión que vas a tener. No importa si lo que te ronda la cabeza te parece un tema poco importante. Te sorprenderá comprobar hasta dónde se puede llegar tirando de un hilo que al principio parecía insustancial.<br>
          Por último, sobre todo si es la primera vez que estás delante de un profesional contándole tus problemas, es normal que sientas cierta vergüenza, que no tengas claro cómo contárselo o que temas la reacción que vas a escuchar por parte de esa persona. Sin embargo, recuerda que estás delante de alguien que va a acompañarte (no a condenarte), que todo lo que hables va a quedar entre vosotros y que te pase lo que te pase tu historia es importante y tiene un valor. Confía en tu psicólogo y deja que te ayude a dar los siguientes pasos.<br>
        </article>
				<b id="3"><h5>¿Tratamientos?</b></h5>
				<article align="justify">
          Un tratamiento psicológico tiene que ver con escuchar con atención lo que el paciente tiene por decir, para poder conocer y observar el mundo interior de la persona que consulta.<br>
          El tratamiento psicologico es aquella intervencion que tiene por objetivo mejorar el estado de la persona (para que hacer terapia), teniendo en cuenta sus alteraciones (fisicas, psiquicas, conductuales, etc). Por supuesto que se consideran implicados muchos factores causales, como la genetica, cambios en el sistema nervioso, determinadas circunstancias en las relaciones entre personas y las condiciones ambientales. Por esto, no se excluye la combinacion de un tratamiento psicologico junto con uno farmacologico.<br>
          El objetivo de un tratamiento psicologico es observar, identificar y modificar los elementos del comportamiento que generan sufrimiento. Por comportamiento se entiende:<br>
          <ul>
            <li>La conducta</li>
            <li>El pensamiento</li>
            <li>Las emociones y estados de animo</li>
          </ul>
          <br>
          Dependiendo de cómo se entienda a la enfermedad y a la salud, los tratamientos son pensados de maneras distintas. Es lo que ocurre, por ejemplo, con el psicoanalisis y la teoria cognitiva. La teoria cognitiva considera que los sintomas son el trastorno mismo y es esto lo que hay que tratar. Sin embargo, desde la antigüedad el sintoma era considerado como una mera señal. De hecho, medicamente, eliminar los sintomas no constituye curar la enfermedad. Psicologicamente tampoco. Un sintoma viene a decirnos algo sobre la posicion existencial de la persona ante los grandes temas de la vida: Sexualidad, Muerte, Duelos. El sintoma nos brinda informacion sobre ello. Y la cura, no pasa por eliminar lo que se TIENE (el sintoma), sino por observar lo que se ES (las identificaciones) que es lo que determina realmente la posicion existencial, el argumento de vida de quien consulta.
        </article>
				</br>

		</article>
				<img class="responsive-img" src="../img/sa3.jpg" width="5000"></br>
				<h3 id="9">Preguntas Frecuentes</h3>
				<b>1. ¿Por qué nos sentimos solos?</b></br>
				Hay que tener en cuenta que el ser humano es un animal social. Estamos programados geneticamente para vivir en comunidad, el apego es una necesidad básica y fundamental en nuestra primera infancia de hecho determina nuestro desarrollo emocional posterior. Sin embargo, vivimos en un mundo individualista, egoísta, competitivo, desconectado emocionalmente de los demás. Esto no ayuda, de hecho cada vez hay más gente que sufre y se sente sola en las grandes ciudades. Podemos vivir en un bloque de edificios de muchos apartamentos y no relacionarnos ni hablar con ningún vecino más allá del "buenos días" de rigor.</br>
				<b>2. ¿Qué puedo hacer si me siento solo?</b><br>
				1. Aceptar y no intentar negar o distraer ese sentimiento:</br>
				En primer lugar es importante escuchar a tus sentimientos de tristeza y soledad, no intentar "distraerte" con ocio pasivo o gratificaciones compulsivas: como redes sociales, series, compras, comida... cosas que traen satisfacción a muy corto plazo pero no aportan realmente valor a tu vida ni son capaces de llenar ese "vacío".</br>
				2. Analiza la calidad de tus relaciones:
				Puede que no te relaciones con nadie, o que te relaciones con mucha gente pero la calidad de las relaciones que tienes no te satisfaga, incluso se llega ala violencia de pareja <a href="violenciadepareja.html">(Te recomendamos este artículo sobre el tema).</a></li></br>

				Mucha gente por ejemplo no se siente conectada ni comprendida por su pareja, pero aún así, en lugar de trabajar para ver si se puede mejorar la conexión y la comunicación  o tomar la determinación de dejar la relación en la que no son felices, continúan enganchados en relaciones en las que no se sienten bien, e incluso sufren, y lo hacen por "no estar solos", creyendo que será peor estar sin pareja... y de esta manera estan con alguien pero se sienten muy solos y frustrados: ¿paradógico no?.  Recuerda: mejor solo que mal acompañado.</br>
				<b>3. ¿Qué tenemos que tener en cuenta a la hora de analizar la calidad de nuetras relaciones?</b></br>
				<ul>
					<li>Compartir intereses y aficiones.
				<li>Compartir Valores de Vida.</li>
				<li>Enriquecernos mutuamente.</li>
				<li>Tener una visión similar del mundo (suele estar relacionado con nuestros valores)</li>
				<li>La empatía y buena comunicación con esa persona.</li>
				<li>Un indicador fundamental es cómo me siento con esa persona: ¿me siento "yo mismo"? ¿capaz de hablar de cualquier cosa? ¿respetado y escuchado?</li>
				</ul>
				<b>4. ¿Cómo se si tengo baja autoestima?</b></br>
				<ul>
					<li>Inseguridades que Bloquean</li>
				Las dudas te abruman, te generan ansiedad, los miedos te impiden avanzar y tomar decisiones. Te bloqueas en determinadas situaciones.</br>
					<li>Sentimientos de Inferioridad</li>
				Puede que se den estos sentimientos en un área concreta de tu vida o en varias,  en algunos contextos o con algunas personas, o que incluso sepas que es como consecuencia de algo que te ha pasado...  pero no puedes evitar "sentirte pequeñito".</br>
					<li>Pensamientos Negativos respecto a tí mismo y a los demás. </li>
				Lo ves todo negro, una y otra vez las preocupaciones rondan por tu cabeza. Anticipas siempre todo lo malo que puede llegar a pasar y te montas "películas negativas".</br>
					<li>Autocrítica Destructiva.</li>
				Tu autocrítica en lugar de motivarte y ayudarte a avanzar te machaca, te enfadas contigo mismo y te hablas mal. Esto te agota y te quita energía.
				</ul>
				<b>5. ¿Qué puedes hacer si te estás autolesionando fisicamente?</b></br>
				Existen una serie de técnicas que pueden reducir el riesgo de lesión seria o reducen al mínimo el daño causado por las autolesiones
				<ol>
					<li>Para e intenta descubrir qué tendría que cambiar para no sentir más el deseo de dañarte.</li>
					<li>Cuenta hacia atrás empezando desde el diez.</li>
					<li>Busca cinco cosas, una para cada sentido, a tu alrededor, para dirigir tu atención hacia ellas y hacia el presente.</li>
					<li>Respire lentamente. Inhala profundamente por la nariz y exhala el aire por la boca.</li>
				</ol>
				Si todavía sientes necesidad de dañarte, intenta lo siguiente:
				<ol>
					<li>Píntate una línea usando témpera y tus propios dedos en vez de cortarte.</li>
					<li>Utiliza un saco como los de boxeo para golpear.</li>
					<li>Haz flexiones rápidas, salta a la comba o cualquier otro tipo de ejercicio físico intenso.</li>
					<li>Grita (aunque sea un grito silencioso).</li>
					<li>Frótate con hielo en la zona donde sientes deseo de lesionarte.</li>
					<li>Abre cualquier libro al azar y empieza a leer en voz alta (o ten preparado un libro concreto para estos casos, o un poema o algo que hayas escrito especialmente para leer en estos momentos). Si profesas alguna religión puedes recitar una oración.</li>
					<li>Empuja con fuerza la pared, como si quisieras desplazarla o echarla abajo (pero sin golpearte, sólo empuja). O bien tira de un objeto muy pesado, tratando de arrastrarlo.</li>
				</ol>
					Después, puedes utilizar otras estrategias:
				<ul>
						<li>Busca ayuda de un psicólogo. El daño a uno mismo es casi siempre un síntoma de otro problema o problemas subyacentes y puede ser necesario tratarlos todos con ayuda profesional, en PsicApp puedes ponerte en contacto con uno de nuestros expertos.</li>
						<li>Analiza con detalle qué es lo que te lleva a sentirte así (qué pensamientos, situaciones o emociones concretas; qué sucedió justo antes de desear dañarte). Puedes llevar un diario o registro donde anotes todo esto.</li>
						<li>Lleva un diario donde anotes todos tus pensamientos,emociones y sucesos del día. Céntrate más en los aspectos positivos de tu vida y escribe los negativos desde una perspectiva de búsqueda de soluciones y preguntándote si te puede aportar algo bueno a larga, cómo puedes utilizar el suceso para crecer, etc.</li>
				</ul></br>
 					<b>6. ¿Es importante el ejercicio para la Salud Mental?</b></br>
 					 Si, la actividad física nos ayuda a distraernos de los problemas y favorece estados de silencio mental, diversión, alegría o satisfacción. Mejora la conexión con lo inmediato, “el aquí y el ahora”, liberándonos del agobio de los problemas que como sabemos, nunca se acaban. Nos separa de las preocupaciones del día a día, cambiando el foco de nuestra atención y produciendo alivio.</br></br>
 					 <b>7. ¿Cuáles son los primeros signos de los trastornos mentales?</b></br>
 					 Los trastornos mentales producen síntomas que son observables para la persona afectada o las personas de su entorno. Entre ellos pueden figurar:
 				 <ul>
 					 	<li>síntomas físicos (dolores, trastornos del sueño)</li>
 					 	<li>síntomas afectivos (tristeza, miedo, ansiedad)</li>
 					 	<li>síntomas cognitivos (dificultad para pensar con claridad, creencias anormales, alteraciones de la memoria)</li>
 					 	<li>síntomas del comportamiento (conducta agresiva, incapacidad para realizar las tareas corrientes de la vida diaria, abuso de sustancias)</li>
 					 	<li>Alteraciones perceptivas (percepción visual o auditiva de cosas que otras personas no ven u oyen)</li>
 				 </ul>
 					 <b>8. ¿Qué tipos de tratamiento son más comunes para las enfermedades de Salud Mental?</b></br>
						A modo general, los tratamientos disponibles para tratar enfermedades mentales incluyen dos:

				<ul>
						<li>Tratamientos farmacológicos</li>
						Incluyen por ejemplo los antidepresivos, ansiolíticos, hipnóticos, antipsicóticos, estabilizadores del ánimo, estimulantes, etc. Que se indican según la patología o los síntomas que se busquen manejar.
						<li>Tratamientos no farmacológicos </li>
						Incluyen por ejemplo los antidepresivos, ansiolíticos, hipnóticos, antipsicóticos, estabilizadores del ánimo, estimulantes, etc. Que se indican según la patología o los síntomas que se busquen manejar.</li>
				</ul>
					<b>9. ¿De qué manera impacta el género en la Salud Mental?</b></br>
					La mayoría de las enfermedades en salud mental  son más frecuentes en mujeres. Existen diversas hipótesis para explicar este fenómeno: diferencias hormonales, presencia de embarazo, parto y puerperio, diferencias culturales y multiplicidad de roles, que han cambiado de manera precipitada este último siglo.</br></br>
					Actualmente se sabe que todas ellas contribuyen a que las mujeres estén más expuestas a patologías mentales, aunque algunas enfermedades de alta carga genética, como la Esquizofrenia o el Trastorno Bipolar,  no presentan diferencias de prevalencia entre géneros.</br>
					<b>10. ¿Pueden los problemas diarios producir enfermedades mentales?</b></br></li></ul>
					Todos tenemos problemas, algunas personas más graves que otras. En general, los trastornos se generan por la forma en que la persona lidia con un problema determinado, en tanto hay personalidades más vulnerables frente a estos estresores externos que podrían desarrollar alguna alteración que requiera de terapia e incluso manejo de algunos síntomas

					<h4><b>¿Aun tiene más dudas?</b></h4>
					 puede solicitar información adicional en el chat en linea de PsicApp, donde uno de nuestros expertos lo atendera.

	</div>
		</article>
	</section>
  </div>
	<!-- WhatsHelp.io widget -->
	<script type="text/javascript">
	    (function () {
	        var options = {
	            whatsapp: "+52 1 2211116913", // WhatsApp number
	            call_to_action: "¡Dudas o aclaraciones!", // Call to action
	            position: "right", // Position may be 'right' or 'left'
	        };
	        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
	        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
	        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
	        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
	    })();
	</script>
	<!-- /WhatsHelp.io widget -->
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
