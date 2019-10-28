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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Experto</title>
    <link rel="shrtcut icon" href="../img/icono_page.png">
    <!-- Bootstrap y Fonts CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Estilos propios -->
     <style>

      .bg-primary{
        background: rgba(0, 0, 0, 0.2) ! important;
        position: fixed;
       width: 100%;
        transition: all 1s ease;
              padding:12px 20px;

      }
      .bg-inverse{
             background-color: #0B5394 ! important; /*cambia al color que quieras papu*/

      }

    </style>

  </head>
  <body>
    <!-- Aquí va nuestro contenido web -->
    <?php if ($menu==1) { ?>
    <nav id="menu" class="navbar navbar-toggleable-md navbar-inverse bg-primary fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#" ><h4>PsicApp</h4></a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Menú <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active"><a href="adicciones.php" class="nav-link">Adicciones</a></li>
          <li class="nav-item active"><a href="saludmental.php" class="nav-link">Salud mental</a></li>
          <li class="nav-item active"><a href="sexualidad.php" class="nav-link">Sexualidad</a></li>
          <li class="nav-item active"><a href="violenciadepareja.php" class="nav-link">Violencia de pareja</a></li>
          <li class="nav-item active"><a href="index.php" class="nav-link">Inicio</a></li>
   			 <li class="nav-item active"><a href="../login/index.php" class="nav-link">Inicia/Registrate</a></li>
        </ul>

      </div>
    </nav>
<?php }else{ ?>
  <nav id="menu" class="navbar navbar-toggleable-md navbar-inverse bg-primary fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#" ><h4>PsicApp</h4></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="adicciones.php">Adicciones</a></li>
        <li class="nav-item active"><a href="saludmental.php">Salud mental</a></li>
        <li class="nav-item active"><a href="sexualidad.php">Sexualidad</a></li>
        <li class="nav-item active"><a href="violenciadepareja.php">Violencia de pareja</a></li>
        <li class="nav-item active"><a href="index.php">Inicio</a></li>
        <li class="nav-item active"><a href="../login/php/salir.php">Salir</a></li>
      </ul>

    </div>
  </nav>
<?php } ?>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script>
      $(window).scroll(function() {
        if ($("#menu").offset().top > 300) {
            $("#menu").addClass("bg-inverse");
        } else {
            $("#menu").removeClass("bg-inverse");
        }
      });
    </script>
<!--aqui viene lo chido-->

<div class="banner" class="img-fluid" alt="Responsive image">
  <section><br><br><br><br><br><br><br><strong><p style="font-size:70px; font-family: 'Courgette', cursive; color:white; text-align:center;">¿Cuando hablar con un experto?</p></strong>
  </section>
</div>
 <div class="box container white
  ">
  <span class="badge" data-badge-caption="-Visita" style="color:white; background-color:#000000; border-radius:20px;">Visita <?php echo $globales; ?></span>
	<span class="badge" data-badge-caption="-Mujer" style="color:white; background-color:#F08080; border-radius:20px;">Mujer <?php echo $mujer; ?></span>
	<span class="badge" data-badge-caption="-Hombre" style="color:white; background-color:#6495ED; border-radius:20px;">Hombre <?php echo $hombre; ?></span>
	<span class="badge" data-badge-caption="-De 15 a 24" style="color:white; background-color:#008080; border-radius:20px;">De 15 a 24 <?php echo $edad; ?></span>
  <article align="justify">
    <br>
    <h1>¿Psicólogos?</h1>
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
  						    <img class="img-fluid" width="900" src="../img/psicologo.jpg">

  				<b id="2"><h5>¿De que hablo con el psicólogo?</b></h5>
  				<article align="justify">
            Lleva un diario de tu terapia. No hace falta que escribas páginas y páginas, bastará con algunos apuntes que recojan lo más importante que habéis hablado o aquello que más te ha resonado. Algunos pacientes toman notas durante la sesión, para que no se les escape nada.<br>
            Habla abiertamente con tu terapeuta, redirígele hacia los temas que tú quieres tratar. A veces, cuando los psicólogos vemos varios caminos a tomar en la conversación, no acertamos con el que es clave ese día para el paciente. Díselo con confianza y hablad de todo aquello que sientas que no está funcionando entre vosotros.<br>
            A no ser que ese día sientas que necesitas silencio absoluto, ten pensado el tema que quieres tratar en la sesión que vas a tener. No importa si lo que te ronda la cabeza te parece un tema poco importante. Te sorprenderá comprobar hasta dónde se puede llegar tirando de un hilo que al principio parecía insustancial.<br>
            Por último, sobre todo si es la primera vez que estás delante de un profesional contándole tus problemas, es normal que sientas cierta vergüenza, que no tengas claro cómo contárselo o que temas la reacción que vas a escuchar por parte de esa persona. Sin embargo, recuerda que estás delante de alguien que va a acompañarte (no a condenarte), que todo lo que hables va a quedar entre vosotros y que te pase lo que te pase tu historia es importante y tiene un valor. Confía en tu psicólogo y deja que te ayude a dar los siguientes pasos.<br>
          </article>
  				<b id="3"><h5>¿Tratamientos?</b></h5>
  				<article align="justify">
            Un tratamiento psicológico tiene que ver con escuchar con atención lo que el paciente tiene por decir, para poder conocer y observar el mundo interior de la persona que consulta.<br>
            El tratamiento psicológico es aquella intervención que tiene por objetivo mejorar el estado de la persona (para que hacer terapia), teniendo en cuenta sus alteraciones (físicas, psíquicas, conductuales, etc). Por supuesto que se consideran implicados muchos factores causales, como la genetica, cambios en el sistema nervioso, determinadas circunstancias en las relaciones entre personas y las condiciones ambientales. Por esto, no se excluye la combinación de un tratamiento psicológico junto con uno farmacológico.<br>
            El objetivo de un tratamiento psicológico es observar, identificar y modificar los elementos del comportamiento que generan sufrimiento. Por comportamiento se entiende:</br>
            <ol>
              <li>La conducta</li>
              <li>El pensamiento</li>
              <li>Las emociones y estados de animo</li>
            </ol>
            <br>
            Dependiendo de cómo se entienda a la enfermedad y a la salud, los tratamientos son pensados de maneras distintas. Es lo que ocurre, por ejemplo, con el psicoanálisis y la teoría cognitiva. La teoría cognitiva considera que los síntomas son el trastorno mismo y es esto lo que hay que tratar. Sin embargo, desde la antigüedad el síntoma era considerado como una mera señal. De hecho, médicamente, eliminar los síntomas no constituye curar la enfermedad. Psicológicamente tampoco. Un síntoma viene a decirnos algo sobre la posición existencial de la persona ante los grandes temas de la vida: Sexualidad, Muerte, Duelos. El síntoma nos brinda información sobre ello. Y la cura, no pasa por eliminar lo que se TIENE (el síntoma), sino por observar lo que se ES (las identificaciones) que es lo que determina realmente la posicion existencial, el argumento de vida de quien consulta.
          </article>
  				</br>

  		</article>
  				<img class="img-fluid" src="../img/sa3.jpg" width="5000"></br>
    <a href="#top" class="btn btn-primary">Regresar al inicio</a><br>
  <h3 id="9">Preguntas frecuentes</h3>
  <div class="container">
    <div class="div1">
      <b>1. ¿Por qué nos sentimos solos?</b></br>
      Hay que tener en cuenta que el ser humano es un animal social. Estamos programados genéticamente para vivir en comunidad, el apego es una necesidad básica y fundamental en nuestra primera infancia de hecho determina nuestro desarrollo emocional posterior. Sin embargo, vivimos en un mundo individualista, egoísta, competitivo, desconectado emocionalmente de los demás. Esto no ayuda, de hecho cada vez hay más gente que sufre y se sente sola en las grandes ciudades. Podemos vivir en un bloque de edificios de muchos apartamentos y no relacionarnos ni hablar con ningún vecino más allá del "buenos días" de rigor.</br>
  </div>
  <button id="myButton" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement()">¿Sentirse solo?</button>
</div>
<div class="container">
  <div class="div2">
    <b>2. ¿Qué puedo hacer si me siento solo?</b><br>
    1. Aceptar y no intentar negar o distraer ese sentimiento:</br>
    En primer lugar es importante escuchar a tus sentimientos de tristeza y soledad, no intentar "distraerte" con ocio pasivo o gratificaciones compulsivas: como redes sociales, series, compras, comida... cosas que traen satisfacción a muy corto plazo pero no aportan realmente valor a tu vida ni son capaces de llenar ese "vacío".</br>
    2. Analiza la calidad de tus relaciones:
    Puede que no te relaciones con nadie, o que te relaciones con mucha gente pero la calidad de las relaciones que tienes no te satisfaga, incluso se llega ala violencia de pareja <a href="violenciadepareja.html">(Te recomendamos este artículo sobre el tema).</a></li></br>

    Mucha gente por ejemplo no se siente conectada ni comprendida por su pareja, pero aún así, en lugar de trabajar para ver si se puede mejorar la conexión y la comunicación  o tomar la determinación de dejar la relación en la que no son felices, continúan enganchados en relaciones en las que no se sienten bien, e incluso sufren, y lo hacen por "no estar solos", creyendo que será peor estar sin pareja... y de esta manera estan con alguien pero se sienten muy solos y frustrados: ¿paradógico no?.  Recuerda: mejor solo que mal acompañado.</br>
  </div>
  <button id="myButton2" class="btn btn-warning btn-lg btn-block" onclick="ShowHideElement2()">¿Te sientes solo?</button>
</div>
<div class="container">
  <div class="div3">
    <b>3. ¿Qué tenemos que tener en cuenta a la hora de analizar la calidad de nuetras relaciones?</b></br>
    <ul>
      <li>Compartir intereses y aficiones.
    <li>Compartir Valores de Vida.</li>
    <li>Enriquecernos mutuamente.</li>
    <li>Tener una visión similar del mundo (suele estar relacionado con nuestros valores)</li>
    <li>La empatía y buena comunicación con esa persona.</li>
    <li>Un indicador fundamental es cómo me siento con esa persona: ¿me siento "yo mismo"? ¿capaz de hablar de cualquier cosa? ¿respetado y escuchado?</li>
    </ul>
  </div>
  <button id="myButton3" class="btn btn-info btn-lg btn-block" onclick="ShowHideElement3()">¿Calidad de relacion?</button>
</div>
<div class="container">
  <div class="div4">
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
  </div>
  <button id="myButton4" class="btn btn-primary btn-lg btn-block" onclick="ShowHideElement4()">¿Baja autoestima?</button>
</div>
<div class="container">
  <div class="div5">
    <b>5. ¿Qué puedes hacer si te estás autolesionando físicamente?</b></br>
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
  </div>
  <button id="myButton5" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement5()">¿Autolesionado?</button>
</div>
<div class="container">
  <div class="div6">
    <b>6. ¿Es importante el ejercicio para la Salud Mental?</b></br>
     Si, la actividad física nos ayuda a distraernos de los problemas y favorece estados de silencio mental, diversión, alegría o satisfacción. Mejora la conexión con lo inmediato, “el aquí y el ahora”, liberándonos del agobio de los problemas que como sabemos, nunca se acaban. Nos separa de las preocupaciones del día a día, cambiando el foco de nuestra atención y produciendo alivio.</br></br>
  </div>
  <button id="myButton6" class="btn btn-warning btn-lg btn-block" onclick="ShowHideElement6()">¿Ejercicio?</button>
</div>
<div class="container">
  <div class="div7">
    <b>7. ¿Cuáles son los primeros signos de los trastornos mentales?</b></br>
    Los trastornos mentales producen síntomas que son observables para la persona afectada o las personas de su entorno. Entre ellos pueden figurar:
  <ul>
     <li>síntomas físicos (dolores, trastornos del sueño)</li>
     <li>síntomas afectivos (tristeza, miedo, ansiedad)</li>
     <li>síntomas cognitivos (dificultad para pensar con claridad, creencias anormales, alteraciones de la memoria)</li>
     <li>síntomas del comportamiento (conducta agresiva, incapacidad para realizar las tareas corrientes de la vida diaria, abuso de sustancias)</li>
     <li>Alteraciones perceptivas (percepción visual o auditiva de cosas que otras personas no ven u oyen)</li>
  </ul>
  </div>
  <button id="myButton7" class="btn btn-info btn-lg btn-block" onclick="ShowHideElement7()">¿Signos de transtorno?</button>
</div>
<div class="container">
  <div class="div8">
    <b>8. ¿Qué tipos de tratamiento son más comunes para las enfermedades de Salud Mental?</b></br>
     A modo general, los tratamientos disponibles para tratar enfermedades mentales incluyen dos:

 <ul>
     <li>Tratamientos farmacológicos</li>
     Incluyen por ejemplo los antidepresivos, ansiolíticos, hipnóticos, antipsicóticos, estabilizadores del ánimo, estimulantes, etc. Que se indican según la patología o los síntomas que se busquen manejar.
     <li>Tratamientos no farmacológicos </li>
     Incluyen por ejemplo los antidepresivos, ansiolíticos, hipnóticos, antipsicóticos, estabilizadores del ánimo, estimulantes, etc. Que se indican según la patología o los síntomas que se busquen manejar.</li>
 </ul>
  </div>
  <button id="myButton8" class="btn btn-primary btn-lg btn-block" onclick="ShowHideElement8()">¿Tratamiento?</button>
</div>
<div class="container">
  <div class="div9">
    <b>9. ¿De qué manera impacta el género en la Salud Mental?</b></br>
    La mayoría de las enfermedades en salud mental  son más frecuentes en mujeres. Existen diversas hipótesis para explicar este fenómeno: diferencias hormonales, presencia de embarazo, parto y puerperio, diferencias culturales y multiplicidad de roles, que han cambiado de manera precipitada este último siglo.</br></br>
    Actualmente se sabe que todas ellas contribuyen a que las mujeres estén más expuestas a patologías mentales, aunque algunas enfermedades de alta carga genética, como la Esquizofrenia o el Trastorno Bipolar,  no presentan diferencias de prevalencía entre géneros.</br>
  </div>
  <button id="myButton9" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement9()">¿Impacto?</button>
</div><!--
<div class="container">
  <div class="div10">
    <b>10. ¿POR QUÉ DECAE EL VIGOR DE LA ERECCIÓN CON LA EDAD?</b></br>
    Esto se debe a la proliferación de un tejido conjuntivo de consistencia fibrosa, que va reemplazando el tejido esponjoso de los cuerpos del pene.</br>

    Este proceso comienza alrededor de los 30 y 40 años de edad y, a consecuencia de él, se reduce la elasticidad y la dilatabilidad de los cuerpos cavernosos. También las venas y arterias de la zona perineal se ven afectadas y la circulación de la sangre ya no tiene tanto vigor. Esto provoca que el pene no se endurezca con la misma facilidad que en edades más jóvenes, y dado que las venas tampoco se contraen del todo, la erección se pierde antes.</br>

    Al final, incluso, se van perdiendo también las erecciones espontáneas de 'buenos días', una señal inequívoca del envejecimiento sexual del individuo.</br>
  </div>
  <button id="myButton10" class="btn btn-warning btn-lg btn-block" onclick="ShowHideElement10()">¿Vigor y edad?</button>
</div>
<div class="container">
  <div class="div11">
  <b>11. ¿ES PERJUDICIAL LA MASTURBACIÓN?</b></br>
  Para nada: al contrario. Darnos placer a nosotros mismos, no solo es una gran forma de conocernos a nosotros mismos y quitarnos tensiones acumuladas, si no también una buena forma de ayudarnos en nuestras relaciones íntimas con un compañero.</br>

  Esto es porque, cuando nadie nos ve, nos atrevemos a ser nosotros mismos, sin inhibiciones ni vergüenzas. Entonces nos encontramos con lo que nos gusta o nos hace sentir mejor, lo cual, habitualmente, transmitimos a nuestro compañero de sábanas, lo que implica que puede ser un complemento valioso para mejorar nuestras actitudes amatorias.</br>
  </div>
  <button id="myButton11" class="btn btn-info btn-lg btn-block" onclick="ShowHideElement11()">¿Masturbacion perjudicial?</button>
</div>
<div class="container">
  <div class="div12">
  <b>12. ¿POR QUÉ HAY GENTE A LA QUE LE EXCITAN SEXUALMENTE LAS SITUACIONES DE RIESGO?</b></br>
  Hay quienes tienen algo así como una “adicción” a la adrenalina, la cual produce efectos químicos con sensaciones que evocan las del orgasmo. Además, la adrenalina estimula la liberación de dopamina en el sistema nervioso central, una sustancia que provoca sensación de bienestar.</br>

  Parece que los amantes del riesgo podrían llevar versiones de baja actividad del gen DRD4 situado en el cromosoma 11, e implicado en los flujos cerebrales de dopamina, uno de los neurotransmisores que estimulan los circuitos del placer. Eso implica que la dopamina tiene menos efecto, y que el individuo experimenta menos placer del habitual, así que busca situaciones más fuertes para saciarse.</br>
  </div>
  <button id="myButton12" class="btn btn-primary btn-lg btn-block" onclick="ShowHideElement12()">¿Exitacion con riesgos?</button>
</div>-->
  <!--zona de js-->
  <script type="text/javascript">
    $(".div1").hide();
    function ShowHideElement()
    {
      var text ="";

      if ($("#myButton").text() ==="¿Sentirse solo?")
      {
          $(".div1").show();
          text="Ocultar";
      }
      else
      {
        $(".div1").hide();
        text="¿Sentirse solo?";
      }
      $("#myButton").html(text);
    }
  </script><!--segunda pregunta-->
  <script type="text/javascript">
    $(".div2").hide();
    function ShowHideElement2()
    {
      var text ="";

      if ($("#myButton2").text() ==="¿Te sientes solo?")
      {
          $(".div2").show();
          text="Ocultar";
      }
      else
      {
        $(".div2").hide();
        text="¿Te sientes solo?";
      }
      $("#myButton2").html(text);
    }
  </script><!--3 pregunta-->
  <script type="text/javascript">
    $(".div3").hide();
    function ShowHideElement3()
    {
      var text ="";

      if ($("#myButton3").text() ==="¿Calidad de relacion?")
      {
          $(".div3").show();
          text="Ocultar";
      }
      else
      {
        $(".div3").hide();
        text="¿Calidad de relacion?";
      }
      $("#myButton3").html(text);
    }
  </script><!--4 pregunta-->
  <script type="text/javascript">
    $(".div4").hide();
    function ShowHideElement4()
    {
      var text ="";

      if ($("#myButton4").text() ==="¿Baja autoestima?")
      {
          $(".div4").show();
          text="Ocultar";
      }
      else
      {
        $(".div4").hide();
        text="¿Baja autoestima?";
      }
      $("#myButton4").html(text);
    }
  </script><!--5 pregunta-->
  <script type="text/javascript">
    $(".div5").hide();
    function ShowHideElement5()
    {
      var text ="";

      if ($("#myButton5").text() ==="¿Autolesionado?")
      {
          $(".div5").show();
          text="Ocultar";
      }
      else
      {
        $(".div5").hide();
        text="¿Autolesionado?";
      }
      $("#myButton5").html(text);
    }
  </script><!--6 pregunta-->
  <script type="text/javascript">
    $(".div6").hide();
    function ShowHideElement6()
    {
      var text ="";

      if ($("#myButton6").text() ==="¿Ejercicio?")
      {
          $(".div6").show();
          text="Ocultar";
      }
      else
      {
        $(".div6").hide();
        text="¿Ejercicio?";
      }
      $("#myButton6").html(text);
    }
  </script><!--7 pregunta-->
  <script type="text/javascript">
    $(".div7").hide();
    function ShowHideElement7()
    {
      var text ="";

      if ($("#myButton7").text() ==="¿Signos de transtorno?")
      {
          $(".div7").show();
          text="Ocultar";
      }
      else
      {
        $(".div7").hide();
        text="¿Signos de transtorno?";
      }
      $("#myButton7").html(text);
    }
  </script><!--8 pregunta-->
  <script type="text/javascript">
    $(".div8").hide();
    function ShowHideElement8()
    {
      var text ="";

      if ($("#myButton8").text() ==="¿Tratamiento?")
      {
          $(".div8").show();
          text="Ocultar";
      }
      else
      {
        $(".div8").hide();
        text="¿Tratamiento?";
      }
      $("#myButton8").html(text);
    }
  </script><!--9 pregunta-->
  <script type="text/javascript">
    $(".div9").hide();
    function ShowHideElement9()
    {
      var text ="";

      if ($("#myButton9").text() ==="¿Impacto?")
      {
          $(".div9").show();
          text="Ocultar";
      }
      else
      {
        $(".div9").hide();
        text="¿Impacto?";
      }
      $("#myButton9").html(text);
    }
  </script><!--10 pregunta-->
  <script type="text/javascript">
    $(".div10").hide();
    function ShowHideElement10()
    {
      var text ="";

      if ($("#myButton10").text() ==="¿Vigor y edad?")
      {
          $(".div10").show();
          text="Ocultar";
      }
      else
      {
        $(".div10").hide();
        text="¿Vigor y edad?";
      }
      $("#myButton10").html(text);
    }
  </script><!--11 pregunta-->
  <script type="text/javascript">
    $(".div11").hide();
    function ShowHideElement11()
    {
      var text ="";

      if ($("#myButton11").text() ==="¿Masturbacion perjudicial?")
      {
          $(".div11").show();
          text="Ocultar";
      }
      else
      {
        $(".div11").hide();
        text="¿Masturbacion perjudicial?";
      }
      $("#myButton11").html(text);
    }
  </script><!--12 pregunta-->
  <script type="text/javascript">
    $(".div12").hide();
    function ShowHideElement12()
    {
      var text ="";

      if ($("#myButton12").text() ==="¿Exitacion con riesgos?")
      {
          $(".div12").show();
          text="Ocultar";
      }
      else
      {
        $(".div12").hide();
        text="¿Exitacion con riesgos?";
      }
      $("#myButton12").html(text);
    }
  </script>
    <p>
      </br></br></br>
    </p>
  </article>
<footer class="container-fluid bg-4 text-center">
  <p>Derechos Reservados PsicApp <br> <a href="">www.PsicApp.com</a></p>
</footer>
</div>


<style>

  .banner{
        background-image: url("back.jpg");
     background-size: cover;
       height: 800px;
        background-position: center center;
        background-attachment: relative;
        margin: 0 auto;


}

    .box{
      margin-top: 20px;
      height: 100px;

    }


</style>
  </body>
</html>
  </body>
</html>
