<?php
session_start();
require "conn.php";
$ide='';
$sql=''; $retorno=''; $globales=0; $sql1=''; $sql2=''; $r1=''; $r2=''; $mujer=0;
$hombre=0; $edad=0; $sql3=''; $r3=''; $slqinserta=''; $resu='';$sql4=''; $r4=''; $sexo=$_SESSION['genero']; $anios=$_SESSION['edad'];
$sql4="SELECT max(idvis) FROM VISITANTES;"; $r4=mysqli_query($conn,$sql4);
$ide=mysqli_fetch_row($r4); $slqinserta="INSERT INTO VISITANTES VALUES ('','$sexo','$anios','ADICCIONES');"; $resu=mysqli_query($conn,$slqinserta);
$sql="SELECT * FROM VISITANTES WHERE secvis='ADICCIONES';"; $sql1="SELECT * FROM VISITANTES WHERE sexovis='F' AND secvis='ADICCIONES';";
$sql2="SELECT * FROM VISITANTES WHERE sexovis='M' AND secvis='ADICCIONES';"; $sql3="SELECT * FROM VISITANTES WHERE secvis='ADICCIONES' AND edadvis BETWEEN '15' AND '24';";
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
    <title>Adicciones</title>
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
            <a class="nav-link" href="#">Menu <span class="sr-only">(current)</span></a>
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
        <li class="nav-item"><a href="cuestionario_adicciones.php" style="color:white;">¿Eres adicto?</a></li>
        <li class="nav-item"><a href="adicciones.php" class="red">Adicciones</a></li>
        <li class="nav-item"><a href="saludmental.php">Salud mental</a></li>
        <li class="nav-item"><a href="sexualidad.php">Sexualidad</a></li>
        <li class="nav-item"><a href="violenciadepareja.php">Violencia de pareja</a></li>
        <li class="nav-item"><a href="index.php">Inicio</a></li>
        <li class="nav-item"><a href="../login/php/salir.php">Salir</a></li>
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
  <section><br><br><br><br><br><br><br><strong><p style="font-size:70px; font-family: 'Courgette', cursive; color:white;">Adicciones</p></strong>
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
    <h1>Adicciones</h1>
  			<h3>Introducción</h3>

  			<p >
  				El consumo de drogas cambia el funcionamiento del cerebro y provoca conductas fuera de lo normal. En PsicApp nuestros usuarios y pacientes son muy importantes a continuación le proporcionamos el siguiente indice
  						<div class="indice">
  			<p class="indice-Contenidos">Contenidos</p>
  			<ol class="indice-lista">
  				<li><a href="#1">¿Que es una adiccion?</a>
  				<ul>
  					<li><a href="#2">¿Cuál es la diferencia entre adicción física y adicción psicológica?</a> </li>
  					<li><a href="#3">Clasificación de las drogas</a> </li>
  				</li>
  				</ul>
  				<li><a href="#4">Medidas preventivas para las adicciones</a>
  					<ul>
  					<li><a href="#5">Las señales más frecuentes de que los menores pueden estar en contacto con las drogas</a> </li>
  					<li><a href="#6">Recomendaciones contra las Adicciones</a> </li>

  					<li><a href="#7">¿Cómo se fortalece la autoestima de los menores?</a> </li>
  				</li>
  				</ul>
  				<li><a href="#8">Preguntas frecuentes</a></li>
  					</li>
  				</li>
  			</ol>
      </ul>
    </div>
    <h3 id="1">¿Que es una adiccion?</h3>
      Se considera adicción, porque es difícil intentar dejar de consumirlas, ya que provocan alteraciones cerebrales en los mecanismos reguladores de la toma de decisiones y del control inhibitorio y porque el usuario de las mismas dedica gran parte de su tiempo en la búsqueda y consumo de ellas.
      <img class="img-fluid" src="../img/ad1.jpg">
    <h5 id="2">¿Cuál es la diferencia entre adicción física y adicción psicológica?</h5>
    <ul>
      <li>Adicción física, ocurre en los sitios del cerebro donde las neuronas crean la necesidad del consumo compulsivo, debido a que el cuerpo se ha acostumbrado a la droga.</li>
      <li>Adicción psicológica, es la necesidad de consumo de una sustancia, que se manifiesta a nivel de pensamientos o emociones, ante una situación estresante, o algún problema. Por lo tanto no existe dependencia física, debido a que no se desarrollan receptores a nivel neuronal para la acción de la sustancia adictiva.</li>


    </ul>
  <h5 id="3">Clasificación de las drogas</h5>
  <ul>
    <li>Eufóricas</li>
    Opio y sus derivados, así como cocaína
    <li>Fantásticas</li>
    Mezcalina, marihuana y beleño, entre otras
    <li>Embriagantes</li>
    Alcohol, éter, cloroformo y bencina
    <li>Hipnóticas</li>
    Barbitúricos y otros somníferos
    <li>Excitantes</li>
    Cafeína y tabaco, entre otras
    </ul>
    A la lista se suman las “nuevas drogas o drogas de diseño” creadas con fines recreativos, entre las que se encuentran: feniletilaminas, arilhexilaminas, opiáceos, derivados del fentanilo, la meperidina y la metacualona.

  <h3 id="4">Medidas preventivas para las adicciones</h3>
  Las adicciones pueden afectar a hombres y mujeres de cualquier edad, nivel de educación o clase social. Una adicción es cuando la persona siente el deseo incontrolable de recurrir al consumo de determinadas sustancias, por lo general químicas, ya sea de modo continúo o periódico. Es decir, la persona adicta a una sustancia no puede controlar el deseo de utilizarla. La adicción al alcohol y las drogas debe ser vista como un problema que afecta no sólo al que se intoxica con esas sustancias, sino como un conflicto de todo el grupo familiar al que pertenece el adicto.<br /><em>El cariño y la atención hacia los menores juegan un papel muy importante en la prevención de las adicciones. Si los niños y niñas crecen con amor y seguridad, si tienen confianza para comunicarse, si se sienten comprendidos y valorados, pero además en la familia no hay adicciones, será difícil que busquen el camino de las drogas.</em><br />
          <img class="img-fluid" src="../img/ad2.jpg">



    <h5><strong id="5">Las señales más frecuentes de que los menores pueden estar en contacto con las drogas son:</strong></h5>
    <ul>
      <li>Tendencia a la soledad.</li>
      <li>Cambios constantes de conducta.</li>
      <li>Dificultad para asumir responsabilidades.</li>
      <li>Disminución del rendimiento escolar.</li>
      <li>Cambio repentino de amistades.</li>
      <li>Falta de interés en actividades que antes le gustaban.</li>
      <li>Duerme mucho o casi no duerme.</li>
      <li>Siempre necesita dinero o tiene mucho dinero.</li>
      <li>Disminuye su apetito.</li>
      <li>Dice mentiras.</li>
      <li>Hay pequeños hurtos en casa.</li>
    </ul>
            <img class="img-fluid" src="../img/ad3.jpg">

  <h5 id="6">Recomendaciones contra las Adicciones</h5>
    Para prevenir el fenómeno adictivo se recomienda:
    <ol>
      <li>Integrar a la Familia en un ambiente de comunicación, respeto y confianza.</li>
      <li>Establecer lazos de afecto y convivencia positiva con familiares, grupos de amigos,vecinos, maestros etc..</li>
      <li>Reconocer a nuestros hijos los logros, habilidades y capacidades personales.</li>
      <li>Crear el hábito del estudio, lectura y participación en actividades fuera de la escuela.</li>
    </ol>
    <h5><b id="7">Recuerde que la autoestima de los menores se fortalece:</b></h5>
    <ol>
      <li>Demostrando interés por sus gustos.</li>
      <li>Aceptándolos, sin compararlos con nadie.</li>
      <li>Ayudándolos a obtener confianza en sí mismos, autovalorarse y quererse.</li>
      <li>Aprovechando el tiempo libre para la convivencia con ellos.</li>
      <li>Expresándoles cariño y respeto</li>
    </ol>
    <img class="img-fluid" src="../img/ad4.jpg"><br>
    <a href="#top" class="btn btn-primary">Regresar al inicio</a><br>
  <h3 id="8">Preguntas frecuentes</h3>
  <div class="container">
    <div class="div1">
    <b>1. ¿Si una persona pide ayuda por dónde empieza?</b><br>
    El primer paso importante es pedir ayuda. La visita a un médico para una posible referencia al tratamiento es una forma de hacerlo. El médico puede ser llamado con antelación y le puede preguntar si él o ella se siente cómodo(a) al discutir de la prueba de detección y tratamiento del  abuso de drogas. De no ser así, solicítele una referencia con otro médico. Usted también puede contactar a un especialista en drogadicción. Se necesita mucho valor para buscar ayuda por un problema de drogadicción u otra adicción porque se espera un trabajo duro por delante. Sin embargo, el tratamiento puede funcionar, y las personas se recuperan a diario de sus adicciones.<br>
  </div>
  <button id="myButton" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement()">¿Por dónde empieza?</button>
</div>
<div class="container">
  <div class="div2">
    <b>2. ¿Que deberíamos buscar en un centro de tratamiento de adicciones</b><br>
    Los enfoques de tratamiento deben ser diseñados para dirigir cada patrón de abuso de las drogas del paciente y también sus problemas médicos, psiquiátricos y sociales relacionados con la droga. Algunos centros de tratamiento ofrecen programas de tratamiento ambulatorio, lo que permite que usted continúe desempeñando algunas de sus responsabilidades diarias. Sin embargo, algunas personas les van mejor con tratamiento hospitalario (residencial). Un especialista en drogadicción puede asesorar a usted o su ser querido sobre las mejores opciones.</br>
  </div>
  <button id="myButton2" class="btn btn-warning btn-lg btn-block" onclick="ShowHideElement2()">¿Que buscar?</button>
</div>
<div class="container">
  <div class="div3">
    <b>3. ¿Me harán dejar de consumir drogas inmediatamente?</b><br>
    El primer paso en el tratamiento es la desintoxicación, lo que ayuda a la persona a eliminar todas las drogas de su sistema. Esto es importante porque las drogas afectan las capacidades mentales que usted necesita para continuar en tratamiento. Cuando los pacientes suspenden el consumo de drogas, ellos pueden experimentar una variedad de síntomas del síndrome de abstinencia, incluso depresión, ansiedad y otros trastornos del estado de ánimo; inquietud; e insomnio. Los centros de tratamiento tienen mucha experiencia en ayudar a una persona sobrellevar este proceso, y mantenerlo a salvo. Dependiendo de la droga a la que usted esté adicto, también puede haber medicamentos que le harán sentir un poco mejor durante la abstinencia de drogas, lo que hace más fácil de dejar de consumirlas.<br>
  </div>
  <button id="myButton3" class="btn btn-info btn-lg btn-block" onclick="ShowHideElement3()">¿Desintoxicacion inmediata?</button>
</div>
<div class="container">
  <div class="div4">
    <b>4. ¿La drogadicción es tratada por un médico?</b></br>
    Existen diferentes tipos de especialistas en drogadicción involucrados en la atención a las adicciones, incluso médicos, enfermera(o)s, terapeutas y trabajadores sociales, entre otros. En ciertos programas de tratamiento, varios especialistas trabajan en equipo para ayudar a que le recupere de su adicción.</br>
  </div>
  <button id="myButton4" class="btn btn-primary btn-lg btn-block" onclick="ShowHideElement4()">¿Medico?</button>
</div>
<div class="container">
  <div class="div5">
    <b>5. ¿Qué tipo de consejería existe?</b></br>
    El tratamiento conductual, también conocido como “psicoterapia,” ayuda a los pacientes a comprometerse en el proceso de tratamiento, cambiar sus actitudes y comportamientos relacionados al abuso de las drogas, y ampliar las posibilidades de llevar una vida saludable. Estos tratamientos también pueden aumentar la eficacia de los medicamentos y ayudar a las personas a seguir en tratamiento por más tiempo. El tratamiento para el abuso de drogas y drogadicción puede darse usando diferentes enfoques de comportamiento. En PsicApp puede contactar con uno de nuestros expertos sobre los diferentes tipos de terapia y otros tratamientos conductuales.</br>
  </div>
  <button id="myButton5" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement5()">¿Consejeria?</button>
</div>
<div class="container">
  <div class="div6">
    <b>6. ¿Existen medicamentos que pueden ayudar?</b></br>
    Hay medicamentos disponibles para tratar las adicciones al alcohol, la nicotina y los opioides (heroína y analgésicos). Otros medicamentos están disponibles para tratar posibles enfermedades mentales, como la depresión, que pueden estar contribuyendo a la adicción. Además, el medicamento que no es adictivo es prescrito a veces para ayudar con la abstinencia. Cuando el medicamento está disponible, puede ser combinado con la terapia conductual para asegurar el éxito de la mayoría de los pacientes. El proveedor del tratamiento le aconsejará a usted y a su ser querido cuales son los medicamentos apropiados y que están disponibles. Algunos centros de tratamiento siguen la filosofía de que ellos no deberían tratar la drogadicción con otras drogas, pero investigaciones demuestran que los medicamentos pueden ayudar en muchos casos</br>
  </div>
  <button id="myButton6" class="btn btn-warning btn-lg btn-block" onclick="ShowHideElement6()">¿Medicamentos?</button>
</div>
<div class="container">
  <div class="div7">
    <b>7. ¿Qué ocurre cuando una persona ha estado en rehabilitación anteriormente?</b></br>
    Esto significa que la persona ya ha aprendido muchas de las destrezas necesarias para recuperarse de la adicción y debería intentarlo de nuevo. La recaída no debería desanimar a nadie que decida realizar otro intento. Las tasas de recaída por adicción son similares a las tasas por otras enfermedades crónicas que muchas personas padecen, como hipertensión, diabetes y asma. El tratamiento de las enfermedades crónicas implica cambiar los comportamientos profundamente arraigados, y a veces, la recaída viene incluida, pero no significa que el tratamiento fracasó. Un regreso al abuso de las drogas indica que la persona necesita comenzar el tratamiento de nuevo, o modificarlo o que pueda beneficiarse desde una perspectiva diferente.</br>
  </div>
  <button id="myButton7" class="btn btn-info btn-lg btn-block" onclick="ShowHideElement7()">¿Rehabilitacion anterior?</button>
</div>
<div class="container">
  <div class="div8">
    <b>8. ¿Y si una persona está preocupada que otros lo descubran?</b></br>
    Una persona que esté buscando tratamiento para la adicción puede decirle a su patrón o sus amigos que necesita irse por razones médicas. Si usted habla con el médico u otro experto en medicina, las leyes de privacidad les prohíbe divulgar su información médica con cualquier persona fuera del sistema de salud sin su autorización. Además, la mayoría de los médicos especializados en tratamiento para la adicción no pueden compartir su información con nadie, hasta otros médicos, sin
    su permiso por escrito.</br>
  </div>
  <button id="myButton8" class="btn btn-primary btn-lg btn-block" onclick="ShowHideElement8()">¿Descubierto?</button>
</div>
<div class="container">
  <div class="div9">
    <b>9. ¿Qué sucede si una persona consume drogas porque se siente deprimida y detener su consumo empeore las cosas?</b></br>
    Es muy probable que usted necesite buscar tratamiento tanto para la depresión como para la adicción. Esto sucede a menudo. Se le llama “comorbilidad,” o “morbilidad asociada” cuando usted tiene más de un problema de salud a la misma vez. Es importante que discuta todo sus síntomas y comportamientos con su médico. Hay muchas drogas que no son adictivas y que pueden ayudar contra la depresión u otras enfermedades mentales. A veces, los proveedores de cuidado de salud no se comunican entre ellos como deberían, lo que significa que usted puede ser su mejor defensor y asegurar de que todos sus proveedores de asistencia médica sepan los problemas de salud que le preocupa. Las personas que tienen problemas concurrentes deben ser tratadas por todos ellos al mismo tiempo. Nota: si usted se siente tan deprimido que ha considerado hacerse daño, puede visitar el siguiente enlace de ayuda: <a href="saludmental.html" target="_blank">Salud mental</a></li> o bien puede ponerse en contacto con uno de nuestros expertos con ayuda del chat. </br>
  </div>
  <button id="myButton9" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement9()">¿Depresion?</button>
</div>
<div class="container">
  <div class="div10">
    <b>10. ¿Cómo una persona puede hablar con otras con problemas similares?</b></br>
    Los grupos de autoayuda pueden prolongar los efectos de tratamiento profesional. Los grupos de autoayuda más conocidos son aquellos afiliados con Alcohólicos Anónimos (AA), Narcóticos Anónimos (NA) y Cocaína Anónima (CA), todos los cuales son basados en un modelo de 12 pasos. La mayoría de los programas de tratamientos de adicción a las drogas estimulan a los pacientes a que participen en un grupo de autoayuda durante y después de un tratamiento oficial. Estos grupos en particular pueden ser muy útiles durante la recuperación ya que sirven como una constante fuente de apoyo para mantenerse libre de drogas. </br>
  </div>
  <button id="myButton10" class="btn btn-warning btn-lg btn-block" onclick="ShowHideElement10()">¿Hablar?</button>
</div>
<div class="container">
  <div class="div11">
    <b>11. Las personas dicen que no deberíamos consumir drogas y conducir, pero ¿qué pasa si se siente bien mientras conduce?</b></br>
    Lo más responsable que una persona puede hacer es dejar de conducir mientras consume drogas. Esto puede ser un inconveniente para usted, pero podría salvar su vida y la de otros. Ciertas drogas actúan diferente en el cerebro, pero todas perjudican las habilidades necesarias para el funcionamiento seguro del vehículo. Estas incluyen las habilidades motoras, el equilibrio y la coordinación, la percepción, la atención, el tiempo de reacción y el juicio. Pequeñas cantidades de algunas drogas pueden incluso tener efectos que alteren la capacidad de manejar un vehículo. Las drogas también afectan su capacidad de diagnosticar si tiene problemas por lo que no debe confiar en su propio juicio sobre manejar un vehículo hasta que reciba una evaluación y tratamiento</br>
  </div>
  <button id="myButton11" class="btn btn-info btn-lg btn-block" onclick="ShowHideElement11()">¿Se siente bien?</button>
</div>
<div class="container">
  <div class="div12">
    <b>12. ¿Dónde puedo encontrar información sobre drogas específicas?</b></br>
    El NIDA también tiene una página web de fácil lectura con<a href="https://www.drugabuse.gov/es/informacion-sobre-drogas" target="_blank"> información sobre una gran lista de drogas, y las más comunes están disponibles en español.</a></br>
    <b> En caso de tener dudas al respecto o no sabe que hacer si sus hijos o usted ya están ligados a las adicciones, puede solicitar información en el chat en linea de PsicApp, donde uno de nuestros expertos lo atendera.</b>
  </p>
  </div>
  <button id="myButton12" class="btn btn-primary btn-lg btn-block" onclick="ShowHideElement12()">¿Drogas?</button>
</div>
  <!--zona de js-->
  <script type="text/javascript">
    $(".div1").hide();
    function ShowHideElement()
    {
      var text ="";

      if ($("#myButton").text() ==="¿Por dónde empieza?")
      {
          $(".div1").show();
          text="Ocultar";
      }
      else
      {
        $(".div1").hide();
        text="¿Por dónde empieza?";
      }
      $("#myButton").html(text);
    }
  </script><!--segunda pregunta-->
  <script type="text/javascript">
    $(".div2").hide();
    function ShowHideElement2()
    {
      var text ="";

      if ($("#myButton2").text() ==="¿Que buscar?")
      {
          $(".div2").show();
          text="Ocultar";
      }
      else
      {
        $(".div2").hide();
        text="¿Que buscar?";
      }
      $("#myButton2").html(text);
    }
  </script><!--3 pregunta-->
  <script type="text/javascript">
    $(".div3").hide();
    function ShowHideElement3()
    {
      var text ="";

      if ($("#myButton3").text() ==="¿Desintoxicacion inmediata?")
      {
          $(".div3").show();
          text="Ocultar";
      }
      else
      {
        $(".div3").hide();
        text="¿Desintoxicacion inmediata?";
      }
      $("#myButton3").html(text);
    }
  </script><!--4 pregunta-->
  <script type="text/javascript">
    $(".div4").hide();
    function ShowHideElement4()
    {
      var text ="";

      if ($("#myButton4").text() ==="¿Medico?")
      {
          $(".div4").show();
          text="Ocultar";
      }
      else
      {
        $(".div4").hide();
        text="¿Medico?";
      }
      $("#myButton4").html(text);
    }
  </script><!--5 pregunta-->
  <script type="text/javascript">
    $(".div5").hide();
    function ShowHideElement5()
    {
      var text ="";

      if ($("#myButton5").text() ==="¿Consejeria?")
      {
          $(".div5").show();
          text="Ocultar";
      }
      else
      {
        $(".div5").hide();
        text="¿Consejeria?";
      }
      $("#myButton5").html(text);
    }
  </script><!--6 pregunta-->
  <script type="text/javascript">
    $(".div6").hide();
    function ShowHideElement6()
    {
      var text ="";

      if ($("#myButton6").text() ==="¿Medicamentos?")
      {
          $(".div6").show();
          text="Ocultar";
      }
      else
      {
        $(".div6").hide();
        text="¿Medicamentos?";
      }
      $("#myButton6").html(text);
    }
  </script><!--7 pregunta-->
  <script type="text/javascript">
    $(".div7").hide();
    function ShowHideElement7()
    {
      var text ="";

      if ($("#myButton7").text() ==="¿Rehabilitacion anterior?")
      {
          $(".div7").show();
          text="Ocultar";
      }
      else
      {
        $(".div7").hide();
        text="¿Rehabilitacion anterior?";
      }
      $("#myButton7").html(text);
    }
  </script><!--8 pregunta-->
  <script type="text/javascript">
    $(".div8").hide();
    function ShowHideElement8()
    {
      var text ="";

      if ($("#myButton8").text() ==="¿Descubierto?")
      {
          $(".div8").show();
          text="Ocultar";
      }
      else
      {
        $(".div8").hide();
        text="¿Descubierto?";
      }
      $("#myButton8").html(text);
    }
  </script><!--9 pregunta-->
  <script type="text/javascript">
    $(".div9").hide();
    function ShowHideElement9()
    {
      var text ="";

      if ($("#myButton9").text() ==="¿Depresion?")
      {
          $(".div9").show();
          text="Ocultar";
      }
      else
      {
        $(".div9").hide();
        text="¿Depresion?";
      }
      $("#myButton9").html(text);
    }
  </script><!--10 pregunta-->
  <script type="text/javascript">
    $(".div10").hide();
    function ShowHideElement10()
    {
      var text ="";

      if ($("#myButton10").text() ==="¿Hablar?")
      {
          $(".div10").show();
          text="Ocultar";
      }
      else
      {
        $(".div10").hide();
        text="¿Hablar?";
      }
      $("#myButton10").html(text);
    }
  </script><!--11 pregunta-->
  <script type="text/javascript">
    $(".div11").hide();
    function ShowHideElement11()
    {
      var text ="";

      if ($("#myButton11").text() ==="¿Se siente bien?")
      {
          $(".div11").show();
          text="Ocultar";
      }
      else
      {
        $(".div11").hide();
        text="¿Se siente bien?";
      }
      $("#myButton11").html(text);
    }
  </script><!--12 pregunta-->
  <script type="text/javascript">
    $(".div12").hide();
    function ShowHideElement12()
    {
      var text ="";

      if ($("#myButton12").text() ==="¿Drogas?")
      {
          $(".div12").show();
          text="Ocultar";
      }
      else
      {
        $(".div12").hide();
        text="¿Drogas?";
      }
      $("#myButton12").html(text);
    }
  </script>
    <p>
      </br></br></br>
    </p>
  </article>
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
