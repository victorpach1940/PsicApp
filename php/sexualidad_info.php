<?php
session_start();
require "conn.php";
$ide='';
$sql=''; $retorno=''; $globales=0; $sql1=''; $sql2=''; $r1=''; $r2=''; $mujer=0;
$hombre=0; $edad=0; $sql3=''; $r3=''; $slqinserta=''; $resu='';$sql4=''; $r4=''; $sexo=$_SESSION['genero']; $anios=$_SESSION['edad'];
$sql4="SELECT max(idvis) FROM VISITANTES;"; $r4=mysqli_query($conn,$sql4);
$ide=mysqli_fetch_row($r4); $slqinserta="INSERT INTO VISITANTES VALUES ('','$sexo','$anios','SEXUALIDAD');"; $resu=mysqli_query($conn,$slqinserta);
$sql="SELECT * FROM VISITANTES WHERE secvis='SEXUALIDAD';"; $sql1="SELECT * FROM VISITANTES WHERE sexovis='F' AND secvis='SEXUALIDAD';";
$sql2="SELECT * FROM VISITANTES WHERE sexovis='M' AND secvis='SEXUALIDAD';"; $sql3="SELECT * FROM VISITANTES WHERE secvis='SEXUALIDAD' AND edadvis BETWEEN '15' AND '24';";
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
    <title>Sexualidad</title>
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
        <li class="nav-item active"><a href="cuestionario_sexualidad.php">¿Sexualidad?</a></li>
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
  <section><br><br><br><br><br><br><br><strong><p style="font-size:70px; font-family: 'Courgette', cursive; color:white; text-align:center;">Sexualidad</p></strong>
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
    <h1>Sexualidad</h1>
  			<h3>Introducción</h3>

  			<p>
  			La sexualidad es el conjunto de condiciones que caracterizan el sexo de cada persona o animal. Desde el punto de vista histórico cultural, es el conjunto de fenómenos emocionales, de conducta y de prácticas asociadas a la búsqueda de emoción sexual, que marcan de manera decisiva al ser humano en todas y cada una de las fases determinantes de su desarrollo. A continuación le proporcionamos los siguientes temas a tratar en este articulo</br>
  			<div class="indice">
  			<p class="indice-Contenidos">Contenidos</p>
  			<ol class="indice-lista">
  				<li><a href="#1">¿Qué es la sexualidad en la adolescencia?</a>
  				<ul>
  					<li><a href="#2">Etapas del desarrollo de la sexualidad</a> </li>
  					<li><a href="#3">La importancia de recibir una buena educación sexual</a></li>
  				</li>
  				</ul>
  				<li><a href="#4">La salud sexual es mucho más que no tener enfermedades.</a>
  					<ul>
  					<li><a href="#5">Aprender sobre sexualidad nos puede ayudar a conseguir muchas cosas</a> </li>
  					<li><a href="#6">¿Qué es la orientación sexual?</a> </li>
  					<li><a href="#7">¿Qué es el sexo “seguro”?</a></li>
  					<li><a href="#8">¿Qué diferencias psico-sexuales hay entre chicos y chicas?</a></li>
  					<li><a href="#9">¿Qué es el sexo “responsable”?</a></li>
  						</li>
  						</ul>
  				<li><a href="#10">Enfermedades de transmisión sexual (ETS)</a>
  					<ul>
  					<li><a href="#11">¿Debo preocuparme por las ETS?</a> </li>
  					<li><a href="#12">¿Cómo prevenir las ETS?</a> </li>
  					<li><a href="#13">¿Cómo se contagian las ETS?</a></li>
  					<li><a href="#14">¿Cómo sé si alguien tiene una ETS?</a></li>
  					<li><a href="#15">¿Cuáles son las Enfermedades de Transmisión Sexual más comunes?</a></li>
  					<li><a href="#16">¿Cuál es el mejor método anticonceptivo?</a></li>
  						</li>
  						</ul>
  						<li><a href="#17">Preguntas frecuentes</a>
  						</li>
  						</li>
  					</li>
  				</li>
  			</ol>
  		</div>

  				<h3><b id="1">¿Qué es la sexualidad en la adolescencia?</b></h3>
  				La sexualidad en la adolescencia es aquella en la que el joven se desarrolla física y mentalmente, adquiriendo los caracteres sexuales secundarios (los que no tienen que ver con el órgano reproductor, como la nuez en los hombres o el ensanchamiento de las caderas en las mujeres) y desarrollando el pensamiento maduro; pero también despierta un comportamiento sexual, se transforma en un ser sexual.</br>
  				La sexualidad no sólo tiene que ver con el acto de reproducirse, sino que representa la generación de deseos, sentimientos, fantasías y emociones, es decir, el desarrollo de una identidad sexual, que se puede definir como aquella parte de la identidad del individuo que le permite reconocerse y actuar como un ser sexual.</br>
  				<img class="img-fluid" src="../img/se2.jpg" width="5000"></br>
  				<b id="2"><h5>Etapas del desarrollo de la sexualidad</b></h5>

  				<ul>
  					<li>Adolescencia temprana (11-13 años): Durante esta etapa, que se caracteriza por la velocidad de los cambios físicos en el adolescente, el joven se encuentra aún lejos del deseo sexual adulto, por lo que se presenta como una fase de auto exploración (a menudo a través de la masturbación), debido a los nuevos cambios físicos y psíquicos que experimenta (como la aparición de los primeros impulsos sexuales y de la espermarquia o primera eyaculación), y también de exploración del contacto con el otro sexo.</li>
  					<li>Adolescencia media (14-17 años): El adolescente ya está casi completamente desarrollado, sus órganos sexuales están listos para la reproducción y el deseo sexual se incrementa. En esta fase se desarrolla una sensación de invulnerabilidad y fortaleza que inducen al joven a comportarse de una forma narcisista. Se empieza a buscar el contacto habitual con el otro sexo y pueden llegar las primeras relaciones sexuales. El adolescente no sólo responde a sus impulsos sexuales, sino también a su narcisismo, es decir, pone a prueba la propia capacidad de atraer al otro. También se considera que durante esta etapa se produce el auge de las fantasías románticas.Las relaciones sociales fuera del entorno familiar, especialmente con amigos, empiezan a tener preponderancia, por lo que el adolescente contrapone los valores y la educación sexual recibida de sus padres con la de sus amigos (en muchas ocasiones llenas de mitos derivados de la poca o nula experiencia sexual), lo que puede acarrear riesgos, si a esto se suma que el adolescente aún no ha desarrollado del todo el pensamiento abstracto y en algunas ocasiones le cuesta pensar en las consecuencias de sus actos. Además, al no haber desarrollado por completo el pensamiento adulto, el adolescente utiliza los sentidos para expresar sus emociones</li>
  					<li>Adolescencia tardía (17-21 años): El adolescente se ha desarrollado por completo, física y psíquicamente. La capacidad de pensar en abstracto y de ser consciente de las consecuencias futuras de los actos hace que el joven pueda mantener relaciones sexuales maduras y seguras. El deseo ya no sólo responde a un estímulo o pulsión sexual, sino que el adolescente, ya adulto, comienza a buscar otros valores en sus relaciones sociales, como la confianza o la reciprocidad.</li>
  				</ul>
  				<img class="img-fluid" src="../img/se1.jpg" width="5000"></br>
  				<b id="3"><h5>La importancia de recibir una buena educación sexual</b></h5>
  				La pubertad y el desarrollo sexual son etapas de cambios constantes, donde el deseo y los impulsos sexuales dominan a una parte racional que no está del todo desarrollada. Recibir una buena educación sexual es muy importante, no sólo a corto plazo, es decir, para que el adolescente supere sin riesgos sus etapas de maduración física y psíquica, sino también para establecer el comportamiento sexual que tendrá el joven cuando sea adulto.</br>
  				Durante la adolescencia, el joven está expuesto a riesgos que se deben evitar mediante medidas preventivas:
  				<ul>
  					<li>La sexualidad entra dentro de la intimidad: Las relaciones sexuales pertenecen a la intimidad de las personas, por lo que no es necesario compartir los detalles sobre las mismas, a no ser que se quiera hacer. Los padres y el entorno no deben presionar al adolescente.</li>
  					<li>Desarrollo de habilidades sociales y de autocontrol: Los impulsos sexuales dominan a los racionales durante la adolescencia, sobre todo al comienzo de la fase de adolescencia media, donde el joven ya ha desarrollado por completo sus órganos sexuales pero no el pensamiento adulto. La educación debe proveer al adolescente de conocimientos que le permitan desarrollar conductas y comportamientos sexuales correctos.</li>
  					<li>Informar: Es vital dotar al adolescente de la información necesaria sobre los riesgos que traen las relaciones sexuales sin protección (embarazo precoz, Enfermedades de Transmisión Sexual, etcétera), así como de los beneficios que reporta practicar sexo seguro.</li>
  				</ul>
  				<img class="img-fluid" src="../img/se3.jpg" width="5000"></br>
  				<b id="4"><h3>La salud sexual es mucho más que no tener enfermedades.</b></h3>
  				La salud sexual es sentirse bien como mujer o como hombre, es sentir que las relaciones (afectivas y sexuales) te proporcionan bienestar. Por eso es preciso que cada persona aprenda a conocer sus genitales y su cuerpo, y su manera de sentir, gozar y amar, que aprenda a aceptarse y gustarse lo más posible, y que aprenda a vivir su sexualidad del modo que le resulte más satisfactorio, que le permita ser feliz.</br>
  				<b id="5"><h5>Aprender sobre sexualidad nos puede ayudar a conseguir muchas cosas:</b></h5>
  				<ul>
  					<li>A conocernos mejor, nuestros cuerpos, nuestros deseos…</li>
  					<li>A encontrarnos mejor en las relaciones de pareja.</li>
  					<li>A disfrutar más en las relaciones sexuales.</li>
  					<li>A conocer más sobre reproducción, maternidad, paternidad…</li>
  					<li>A cuidar nuestra salud, evitando riesgos innecesarios.</li>
  					<li>A saber que se puede disfrutar de la sexualidad sin tener pareja y cómo hacerlo.</li>
  					<li>A contribuir mejor a la educación sexual de nuestras hijas y de nuestros hijos.</li>
  				</ul>
  				<b id="6"><h5>¿Qué es la orientación sexual?</b></h5>
  				 define por quién se siente atracción (física, emocional, espiritual y románticamente) y la intensidad de esa atracción. El continuo incluye diversas opciones:
  				<ul>
  					<li>Heterosexual: siente atracción por personas del sexo opuesto.</li>
  					<li>Bisexual: siente atracción hacia mujeres y hombres por igual.</li>
  					<li>Asexual: no siente atracción sexual hacia ningún sexo ni género.</li>
  					<li>Pansexual: siente atracción por las personas, independientemente de su sexo o género.</li>
  					<li>Homosexual: siente atracción por personas del mismo sexo.</li>
  				</ul>
  				Cabe señalar también la diferencia entre comportamiento y la orientación sexual. P.ej. una persona puede ser bisexual pero sólo tener relaciones sexuales con el sexo opuesto debido a convencionalismos sociales. Así, como se ha comentado, las opciones son varias dentro de cada una de las dimensiones comentadas, pero las posibilidades en la sexualidad aún son mayores si combinamos las diferentes dimensiones. Llamamos a esto diversidad sexual. Las opciones son infinitas y esa variabilidad es justamente la que da la riqueza a nuestra especie.</br>
  				<img class="img-fluid" src="../img/se10.jpg" width="5000"></br>
  				 <b id="7"><h5>¿Qué es el sexo “seguro”?</b></h5>
  				 Cuando hay relaciones sexuales es posible un embarazo. Cuando se habla de sexo seguro se refiere a tener relaciones sexuales “protegidas”, es decir, tomar medidas para no quedarse embarazada, o para no contraer una enfermedad que se puede transmitir por vía sexual. Esto se consigue con métodos que impiden un encuentro del espermatozoide con el óvulo (preservativo) o que destrozan un embrión en las primeras horas o días de su vida (píldoras). Estas medidas son poco saludables, no tan seguras como se dice, y además moralmente reprobables por manipular el acto sexual y la fertilidad, y por destruir una vida en sus inicios.</br>
  				<b id="8"><h5>¿Qué diferencias psico-sexuales hay entre chicos y chicas?</b></h5>
  				Casi todos los chicos están convencidos de que las chicas tienen los mismos impulsos sexuales que ellos. Pero eso no es así. El hombre se predispone sexualmente con más facilidad y reacciona más a estímulos visuales. Sus sentimientos en la actividad sexual no le tocan tan a fondo ni dejan tanta huella como en la mujer. La predisposición de las mujeres es más profunda y ellas reaccionan más lentamente a los estímulos sexuales. Hay más implicación psíquica en la vida sexual en la mujer que en el hombre. Por todo ello el conocimiento mutuo, el trato, la fidelidad, la lealtad, la continencia, y la aceptación de los compromisos que conlleva el amor, son parte muy importante para una unión sexual satisfactoria para el hombre y la mujer.</br>
  								<img class="img-fluid" src="../img/sexo.jpg" width="5000"></br>

  				<b id="9"><h5>¿Qué es el sexo “responsable”?</b></h5>
  				Tratar las cuestiones relacionadas con la sexualidad con responsabilidad quiere decir para los matrimonios respetar el acto sexual y la fertilidad sin manipulaciones, y para los jóvenes no casados abstenerse de relaciones sexuales hasta que tengan una relación amorosa estable que les permita fundar una familia y aceptar a los hijos que pueden nacer como consecuencia de estas relaciones. El impulso sexual en el ser humano es dominable; aprender a tener dominio de sí es una preparación estupenda para luego ser fiel en el matrimonio. La continencia sexual no es una represión sino una expectativa alegre, una renuncia temporal y voluntaria que surge de un respeto mutuo y como prueba de amor.</br>
  				<h3 id="10"><b>Enfermedades de transmisión sexual (ETS)</b></h3>
  				Las enfermedades de transmisión sexual son infecciones comunes que se transmiten por contacto sexual. Muchas de estas no son graves y su tratamiento es sencillo. Sin embargo, a veces pueden ser peligrosas. Afortunadamente, es fácil hacerse pruebas para detectarlas. Aquí encontrarás información sobre cómo puedes evitar contagiarte una enfermedad de transmisión sexual o transmitírsela a otras personas. Da el primer paso hacia una vida sexual más segura y sana.</br>
  				<b id="11"><h5>¿Debo preocuparme por las ETS?</b></h5>
  				Seguramente ya has escuchado hablar de infecciones de transmisión sexual como gonorrea, clamidia, herpes, VIH y otras. Las ETS son bastante comunes -muchas personas tendrán una en algún momento de su vida. Las personas jóvenes entre 15 y 24 años tienen una probabilidad mayor de contraer una ETS que cualquier otro grupo. Algunas de las ETS más comunes (como gonorrea y clamidia) pueden ser curadas con antibióticos, y no son peligrosas si se tratan de inmediato. Pero otras pueden causar graves problemas de salud, especialmente sin tratamiento.</br>

  				A pesar de que las ETS son comunes, a veces las personas sienten vergüenza o desconcierto cuando se contagian. Pero las ETS son como cualquier infección que pasa de una persona a otra - es solo que aquí la via de contagio es el sexo-.</br>

  				Si tienes una ETS no significa que seas "sucio" o una mala persona. Sólo eres una de las millones de personas que se han infectado. Como ocurre con otras infecciones, existen antibióticos para mantenerte saludable si te contagias una ETS. También hay maneras de protegerte de las ETS.</br>
  				<b id="12"><h5>¿Cómo prevenir las ETS?</b></h5>
  				La única manera 100% garantizada de evitar una ETS es evitar toda clase de contacto sexual, ya sea sexo vaginal, anal u oral, y contacto genital de piel con piel con otra persona. No hay sexo = no hay ETS. Pero si tienes sexo, practicar sexo seguro reduce las probabilidades de contagio.</br>

  				El sexo seguro significa usar condones, condones femeninos o barreras bucales. Estas barreras detienen los fluidos y algo del roce piel a piel que transmiten las ETS. Puedes usar condones para sexo vaginal, sexo anal o sexo oral en un pene. Puedes utilizar condones femeninos para sexo vaginal y sexo anal. Y puedes usar barreras bucales para sexo oral en la vulva o el ano. Lee más sobre usar condones y barreras bucales.</br>
  				<img class="img-fluid" src="../img/se11.jpg" width="5000"></br>

  				Dos de las mejores maneras de prevenir las ETS son el no tener sexo y usar condones cuando lo tienes. Hay también otros pasos que puedes seguir:</br>
  				<ul>
  					<li>Hazte una prueba de detección de ETS. Si tienes una infección puedes tratarte para mantenerte sano y evitar el contagio de la ETS a otras personas.</li>
  					<li>Habla con tu pareja. Una buena comunicación, especialmente si se trata de sexo seguro, puede ayudar a construir confianza y acercarlos como pareja.</li>
  					<li>Elige actividades menos riesgosas. Hay otras maneras de ser sexual y mantenerse seguro. Algunas de las cosas que puedes practicar sin riesgo de contagio de ETS son: masturbación, frotar en seco (frotar los genitales uno contra el otro, con la ropa puesta), hablar temas sexis, y abrazarse.</li>
  				</ul>
  				<b id="13"><h5>¿Cómo se contagian las ETS?</b></h5>
  				<img class="img-fluid" src="../img/sexualidad.jpg"width="5000"></br>
  				Las ETS se contagian generalmente al tener sexo vaginal, anal u oral sin protección (por ejemplo, sin usar un condón). Pero no siempre es tan simple. Existen muchas ETS y se contagian de maneras diferentes.</br>

  				Algunas infecciones se contagian via fluidos corporales como el semen, fluidos vaginales y la sangre. Otros se contagian cuando la piel de la boca o genitales se frota contra la piel de otra persona.</br>

  				En resumen: cualquier tipo de contacto sexual que involucre fluidos corporales o toque de genitales te pone en riesgo de una ETS. Es por eso que es fundamental el uso de condones u otras barreras (como las barreras bucales) -que ayudan a bloquear la piel y fluidos que contagian las ETS.</br>

  				El sexo vaginal (pene-en-vagina) y el sexo anal (pene-en-ano) conllevan un riesgo especial si no usas condón -al usarlo es mucho más seguro. El sexo oral (boca a vulva, pene o ano) también puede contagiar ciertas ETS (como el herpes o VPH). Usar condones o barreras bucales para el sexo oral puede protegerte a tí y a tu pareja.</br>

  				Algunas ETS (como el VIH) pueden contagiarse al compartir jeringas (para drogas, piercings o tatuajes), o a un bebé en el momento de nacer o al amamantar. Pero no puedes contagiarte una ETS a través de un contacto casual, como abrazarse, tomarse de las manos o del asiento de un baño/sanitario. Solo puedes contagiarte una ETS por contacto directo con semen, fluidos vaginales, sangre o roce de genitales piel con piel.</br>

  				Las ETS no aparecen por arte de magia -solo puedes contagiarte de alguien que ya la tiene. Pero muchas personas que tienen una ETS no lo saben, ya que muchas veces no hay sintomatología. Es por eso que es tan importante el examen de detección de ETS y el uso de condones.</br>
  				<b id="14"><h5>¿Cómo sé si alguien tiene una ETS?</b></h5>
  				La ÚNICA manera de saber con certeza si tú o alguien más tiene una ETS es a través de un examen de detección de ETS. Generalmente, las ETS no muestran síntomas. Asi que solo por observar el pene o vagina de una persona no puede decirte si tiene una ETS o no. Las personas con una ETS se ven y sienten completamente normales -pero igual pueden contagiar a otros.</br>

  				Algunas veces las ETS causan problemas y puedes notarlos. Hazte un examen de detección de ETS si tienes alguno de estos síntomas en tus genitales o cerca de ellos:</br>
  				<ul>
  					<li>dolor</li>
  					<li>hinchazón</li>
  					<li>Protuberancias raras, sarpullidos o lastimaduras</li>
  					<li>Picazón y/o sensación de ardor</li>
  					<li>Dolor o ardor al orinar</li>
  					<li>Dolor o ardor al orinar</li>
  					<li>Una descarga inusual del pene</li>
  					<li>Una descarga de flujo de olor, color o textura diferente a lo habitual</li>
  					<li>Sangrado de tus genitales (que no es tu menstruación)</li>


  				</ul>
  				<b id="15"><h5>¿Cuáles son las Enfermedades de Transmisión Sexual más comunes?</b></h5>
  				<img class="img-fluid" src="../img/se4.jpg" width="5000"></br>
  				<b>VIH</b>

  				Es la más letal de todas las que existen. Este virus destruye la capacidad del cuerpo para defenderse de las infecciones. Se transmite por el contacto con diversos líquidos corporales de personas infectadas, como la sangre, la leche materna, el semen o las secreciones vaginales. Las señales tempranas de la enfemedad incluyen mucha fatiga y fiebre. Si bien no existe cura para el SIDA, hay tratamientos que pueden tenerlo bajo control y hacer más lento su progreso.</br>

  				<b>Clamidia</b></br>

  				Es la enfermedad bacteriológica más común. En la mayoría de los casos no manifiesta síntomas. Puede infectar la células del cuello del útero, la uretra, el recto y, a veces, la garganta y los ojos. En las mujeres, los síntomas son flujo abundante, sangrado anormal entre los períodos menstruales o durante el acto sexual, dolor al tener relaciones o al orinar y en la parte baja del abdomen. En los hombres se manifiesta con un líquido blancuzco que sale de la uretra y dolor al orinar o en los testículos.</br>

  				<b>Herpes genital</b></br>

  				El herpes genital es causado por dos tipos de virus. Estos virus se llaman herpes simple del tipo 1 y herpes simple del tipo 2. Los síntomas pueden aparecer mucho tiempo después de haber sido infectados, pero una vez que nos hemos contagiado, el virus permanece de por vida. El virus produce unas úlceras alrededor de la vagina y en el pene, aunque la mayoría de las personas que tiene herpes no presenta síntomas o si los presenta son muy leves.</br>

  				<b>Gonorrea</b></br>

  				Es una infección bacteriológica que puede infectar la uretra, el cuello del útero, el recto, el ano y la garganta, si se ha practicado sexo oral. El período de incubación, es decir, el tiempo que pasa desde que se entra en contacto con la bacteria hasta la aparición de los síntomas, es de 2-5 días. Los síntomas pueden ser ardor al orinar, líquido blanco o amarillo del pene, flujo vaginal amarillento e irritación o flujo del ano. Una infección de gonorrea durante un embarazo puede causar problemas graves al bebé.</br>

  				<b>Sífilis</b></br>

  				Aunque se cura fácilmente con antibióticos o penicilina, puede causar complicaciones a largo plazo o la muerte, si no se trata de manera adecuada. Normalmente, se desarrolla en varias fases y puede manifestarse comenzando por una llaga indolora y pasando después a un sarpullido o síntomas parecidos a los de la gripe. Se lo puede contagiar la embarazada a su bebé, lo que se conoce como sífilis congénita.</br>

  				<b>Virus del Papiloma Humano (VPH)</b></br>

  				Es la ETS más común tanto en hombres como en mujeres, ya que se calcula que el 90% de las personas con una vida sexual activa entra en contacto con el virus. No todas ellas se infectan: en el 90% de los casos, el sistema inmunológico resuelve la situación. En la mayoría de los casos, el VPH desaparece por sí solo y no causa ningún problema de salud. Pero cuando el VPH no desaparece, puede causar problemas de salud como verrugas genitales (condilomas) o cáncer. Hay vacunas que pueden prevenirlo. Es importante acudir a los controles ginecológicos rutinarios para que la citología detecte si hay alteraciones celulares y se puedan practicar pruebas más específicas. El control ginecológico permite diagnosticar no solo el VPH, sino también, en el peor de los casos, el cáncer de cérvix en estadios tempranos, a tiempo de extirparlo mediante un procedimiento quirúrgico relativamente poco invasivo denominado conización.</br>

  				<b>Tricomoniasis</b></br>

  				En la mayoría de los casos no llega a manifestarse. Sus principales síntomas pueden ser dolor al orinar, flujo con mal olor, picor en la vagina, líquido en la uretra.</br>

  				<b>Hepatitis B</b></br>

  				Es una enfermedad del hígado. Algunas personas pueden combatir la infección y eliminar el virus. En otras, la infección permanece y da lugar a una enfermedad «crónica» o de por vida. Puede causar problemas graves de salud. La mejor forma de prevenir la infección es a través de vacunas.</br>

  				<b>Candidiasis</b></br>

  				Infección causada por hongos. Muchas veces no hay síntomas. El tratamiento es simple y consiste en cremas, óvulos vaginales, pastillas o una combinación de los tres. Si no se trata, generalmente se van solos, pues el cuerpo los combate de manera natural, pero en el hombre pueden provocar inflamaciones de la uretra.</br>
  				<b id="16"><h5>¿Cuál es el mejor método anticonceptivo?</b></h5>
  				La única manera infalible 100% de no quedar embarazada es no tener sexo vaginal (pene-en-vagina) o realizar cualquier actividad sexual donde el esperma entre en contacto con la vulva o en la vagina (esto se llama abstinencia).</br>

  				Pero si vas a tener sexo vaginal, entonces la mejor manera de prevenir un embarazo es usar un método efectivo de anticoncepción (como un DIU o implante) + un condón.</br>
  				<img class="img-fluid" src="../img/se5.jpg" width="5000"></br>

  				Algunos anticonceptivos dan mejor resultados que otros. Los mejores anticonceptivos, los más eficaces para la prevención de un embarazo son los implantes y DIUs - lo más convenientes y más infalibles de usar.</br>

  				Otros métodos, como la pastilla, anillo, parche e inyección son también muy buenos para la prevención de un embarazo si los usas a la perfección. Pero las personas no son perfectas y estos métodos tienen más posibilidades de fallar que los implantes y DIUs.</br>

  				Es realmente importante asegurar el uso correcto de los anticonceptivos. Esto significa que no puedes olvidar tomar la pastilla, cambiar el anillo o darte la inyección a tiempo -o esto te pondrá en riesgo de embarazo. Asi que el mejor método es aquel que siempre uses correctamente. Apúntate en este breve test anticonceptivo para averiguar cuáles son los mejores métodos para tí.</br>

  				Sin importar el método que elijas, puedes elevar tu protección a nivel super poder al usar un anticonceptivo más un condón juntos.</br>
  				<b>Condones + Anticonceptivos= Protección Extra</b></br>
  				Los condones son como el superhéroe de un sexo más seguro: son la única manera de protegerte de un embarazo y de las ETS durante el sexo vaginal.</br>

  				No hay un método anticonceptivo perfecto. Asi que el uso de los condones + otro tipo de anticonceptivo (como el implante, el DIU, o pastilla) te dará una protección extra en caso de alguno de los dos falle. Y los condones reducen drásticamente las posibilidades de contraer toda clase de enfermedades de transmisión sexual, como el VIH, la gonorrea, clamidia y herpes.</br>

  				Otra gran ventaja de los condones es que los puedes conseguir casi en cualquier lado, como autoservicios, tiendas, supermercados y estaciones de servicio. Los condones no cuestan mucho dinero, y a veces pueden ser gratuitos en las clínicas comunitarias, centros de salud escolares o centros de salud.</br>
    <a href="#top" class="btn btn-primary">Regresar al inicio</a><br>
  <h3 id="8">Preguntas frecuentes</h3>
  <div class="container">
    <div class="div1">
      <b>1. ESTAR ENAMORADO, ¿ES BUENO PARA LA SALUD?</b></br>

      Sí. Es un punto en el que coinciden de forma unánime los especialistas: las relaciones de pareja cariñosas y una frecuente actividad sexual favorecen la salud.</br>

      Esto es por varias cuestiones. La primera, nuestras hormonas, ya que en la fase de excitación aumenta la secreción de oxitocina. El efecto causado, en este caso, de forma inconsciente, nos sitúa en el modo de atender las necesidades del otro, además de intervenir en la formación de los sentimientos.</br>

      Además, en la unión de los sexos se elimina estrés y nos invade una buena sensación de plenitud y goce</br>
  </div>
  <button id="myButton" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement()">¿Enamorado?</button>
</div>
<div class="container">
  <div class="div2">
    <b>2. ¿POR QUÉ NOS LATE EL CORAZÓN CON MÁS FUERZA CUANDO ESTAMOS EXCITADOS O ENAMORADOS?</b></br>
    Este mecanismo es muy similar al que sentimos cuando nos invade el miedo: corazón desbocado, rodillas con flojera, sensación de irritabilidad muy característica en la boca de nuestro estómago. Todo esto depende de nuestro sistema nervioso vegetativo, que es el que rige las funciones corporales que no dependen de nuestra voluntad, como es el ritmo y la intensidad del ritmo cardíaco.</br>

    Cuando nuestro cerebro detecta algún tipo de amenaza, o en el caso del amor, la presencia del 'objeto de deseo', se desencadena un conjunto de reacciones encaminadas a poner el uerpo en condiciones de atención y velocidad de reacción máximas. Se envía la alarma al hipotálamo y éste disponde la secreción urgente de hormonas del estrés, sobre todo la adrenalina. Al mismo tiempo, determinados haces nerviosos transmiten al corazón la orden de estar preparado para cualquier eventualidad.</br>
  </div>
  <button id="myButton2" class="btn btn-warning btn-lg btn-block" onclick="ShowHideElement2()">¿Latidos fuertes?</button>
</div>
<div class="container">
  <div class="div3">
    <b>3. ¿PUEDEN LAS MUJERES SER IMPOTENTES?</b></br>
    No. Existe una dificultad similar en las mujeres: la falta de turgencia del clítoris, aunque esto no impide, como en el caso de la disfunción eréctil, la participación pasiva en el coito, pero sí dificulta la obtención del placer sexual.</br>
  </div>
  <button id="myButton3" class="btn btn-info btn-lg btn-block" onclick="ShowHideElement3()">¿Mujeres impotentes?</button>
</div>
<div class="container">
  <div class="div4">
    <b>4. ¿POR QUÉ LOS HOMBRES SE DESPIERTAN CON UNA ERECCIÓN POR LA MAÑANA?</b></br>
    Se atribuye a que la vejiga está llena y ejerce fuerte presión sobre los vasos sanguíneos del bajo vientre, con lo que evitar el retorno de la circulación hacia el corazón. Esta retención de sangre es el que produce la turgencia de los cuerpos cavernosos del pene. El efecto es el mismo causado por la excitación sexual, pero sin deseo en este caso.</br>

    Las ereciones matutinas en el hombre que se cree impotente demuestran que no lo es fisiológicamente, sino en relación con otras circunstacias como puedan ser la timidez o los complejos psicológicos.</br>
  </div>
  <button id="myButton4" class="btn btn-primary btn-lg btn-block" onclick="ShowHideElement4()">¿Ereccion mañanera?</button>
</div>
<div class="container">
  <div class="div5">
    <b>5. ¿POR QUÉ LA ERECCIÓN SE DESVÍA HACIA UN LADO EN ALGUNOS HOMBRES?</b>
    Una cierta incurvación no debe preocupar, siempre y cuando no suponga una dificultad para practicar el coito. Esto es una condición congénita diferente al llamado mal de Peyronie, que puede aparecer en la edad adulta y responde a una formación de tejido cicatricial en uno de los cuerpos cavernosos del pene, en forma de placa dura y no flexible.</br>

    Es por eso que el pene se curva durante la erección, formando en ocasiones ángulos inverosímiles. El remedio es quirúrgico.</br>
  </div>
  <button id="myButton5" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement5()">¿Ereccion desviada?</button>
</div>
<div class="container">
  <div class="div6">
    <b>6. ¿CÓMO SE PRODUCE LA ERECCIÓN DEL PENE CON LA EXCITACIÓN?</b>
    La erección del pene se controla mediante un 'centro de placer' que reside en el cerebro, y a su vez por dos centros nerviosos de la médula espinal.</br>

    Al contemplar una persona que nos gusta y nos atrae sexualmente, provocan la excitación de unos nervios de nuestro sistema vegetativo de los que no tenemos control ya que no dependen de nuestra voluntad y modifican la circulación de la sangre en toda la región pélvica.</br>

    Esto provoca que el volumen de sangre que entra a través de las arterias del pene aumente unas 20 veces su volumen. Esta sangre va a parar a los llamados cuerpos cavernosos, los cuales tienen una estructura esponja que les permite aumentar el volumen. A su vez, también se estrechan las venas por donde normalmente se liberaría el exceso de nivel de sangre. La presión en los cuerpos cavernosos aumenta considerablemente y con ella las dimensiones del pene, así como rigidez y dureza.</br>

    Esto no solo ocurre, como los hombres saben, al excitarse con una mujer que le atrae, sino con la simple visión de imágenes excitantes o su recuerdo en la memoria.</br>
  </div>
  <button id="myButton6" class="btn btn-warning btn-lg btn-block" onclick="ShowHideElement6()">¿Producir la ereccion?</button>
</div>
<div class="container">
  <div class="div7">
    <b>7. ¿EL HOMBRE PUEDE SUPRIMIR LA ERECCIÓN VOLUNTARIAMENTE?</b></br>
    Lo cierto es que no. Añadido a la información que se facilita en la imagen anterior, ha habido un par de estudios en el que voluntarios han intentado inhibir su excitación mientras los investigadores les mostraban imágenes insinuantes: ninguno de ellos lo consiguieron. De ahí que los antiguos dijeran que el pene tiene voluntad propia.</br>
  </div>
  <button id="myButton7" class="btn btn-info btn-lg btn-block" onclick="ShowHideElement7()">¿Suprimir ereccion?</button>
</div>
<div class="container">
  <div class="div8">
    <b>8. ¿QUÉ PASA EN EL CUERPO DE UNA MUJER CUANDO VE UN HOMBRE QUE LE GUSTA?</b></br>
    La secuencia de cambios en su cuerpo es rápida y compleja, ya que participan muchos sistemas del organismo.</br>

    La vista y, en ocasiones el olfato, alertan al cerebro de una mujer de 'sujeto interesante a la vista'. A través del sistema vegetativo, sobre el que no tenemos control, se envía a las glándulas suprarrenales la orden de segregar adrenalina, hormona que acelera el ritmo cardíaco, dilata los bronquios, aumenta la presión arterial y estimula el sistema nervioso central.</br>

    Todo el organismo femenino entra en disposición de máxima actividad. Sube la tensión sanguínea y el ritmo de los latidos del corazón.</br>

    Por su parte, el control central de la actividad hormonal, residente en el hipotálamo, envía un gran número de órdenes a través de neurotransmisores y vías nerviosas que provocan la activación de la secreción de estrógenas. La vagina se humedece y las glándulas sudoríparas funcionan a toda velocidad. Junto con otras glándulas, envían efluvios que envuelven al hombre observado y tratan de atraerlo (cuestión que los especialistas e industriales de la perfumería están tratando de imitar).</br>

    En el cerebro, se frena la producción de seretonina (con efecto sedante) y también de la melatonina (hormona del sueño). Por otro lado, se activa la síntesis de las endorfinas, cuyo efecto euforizante es el responsable de que la mujer lo vea todo de 'color de rosa'. El centro de apetito transmite saciedad aunque la persona lleve sin comer horas.</br>
  </div>
  <button id="myButton8" class="btn btn-primary btn-lg btn-block" onclick="ShowHideElement8()">¿El cuerpo de mujer?</button>
</div>
<div class="container">
  <div class="div9">
    <b>9. ¿CUÁL ES EL TAMAÑO NORMAL DEL PENE?</b></br>
    Una de las grandes preguntas que un hombre parece nunca dejar de hacerse. El científico Alfred Kinsey quiso en su día, a fin de establecer con criterio científico un 'promedio' y descartar las exageraciones habituales. Para ello, tomo las medidas sobre penes erectos, en la cara superior de los mismos y desde la punta hasta la base del pene. Las medidas del diámetro, se tomaron hacia la mitad de la longitud.</br>

    Así, Kinsey estableció que la longitud media estaba en unos 15 centímetros, donde entraba el 24% de los hombres. El pene más pequeño encontrado entre los voluntarios fue de 9,5cm. En cuanto a la categoría 'extra-largo' de más de 23 cm., tan solo un 0,1% se llevaron el título.</br>

    Por lo que se refiere a la circunferencia, se halló un promedio de entre 11,5 y 12,5 cm. El pene más delgado midió 3,8 cm de circunferencia y el más grueso, 17,2 cm.</br>

    Cuando más crece el pene es en la adolescencia del hombre.</br>
  </div>
  <button id="myButton9" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement9()">¿Tamaño normal?</button>
</div>
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
</div>
  <!--zona de js-->
  <script type="text/javascript">
    $(".div1").hide();
    function ShowHideElement()
    {
      var text ="";

      if ($("#myButton").text() ==="¿Enamorado?")
      {
          $(".div1").show();
          text="Ocultar";
      }
      else
      {
        $(".div1").hide();
        text="¿Enamorado?";
      }
      $("#myButton").html(text);
    }
  </script><!--segunda pregunta-->
  <script type="text/javascript">
    $(".div2").hide();
    function ShowHideElement2()
    {
      var text ="";

      if ($("#myButton2").text() ==="¿Latidos fuertes?")
      {
          $(".div2").show();
          text="Ocultar";
      }
      else
      {
        $(".div2").hide();
        text="¿Latidos fuertes?";
      }
      $("#myButton2").html(text);
    }
  </script><!--3 pregunta-->
  <script type="text/javascript">
    $(".div3").hide();
    function ShowHideElement3()
    {
      var text ="";

      if ($("#myButton3").text() ==="¿Mujeres impotentes?")
      {
          $(".div3").show();
          text="Ocultar";
      }
      else
      {
        $(".div3").hide();
        text="¿Mujeres impotentes?";
      }
      $("#myButton3").html(text);
    }
  </script><!--4 pregunta-->
  <script type="text/javascript">
    $(".div4").hide();
    function ShowHideElement4()
    {
      var text ="";

      if ($("#myButton4").text() ==="¿Ereccion mañanera?")
      {
          $(".div4").show();
          text="Ocultar";
      }
      else
      {
        $(".div4").hide();
        text="¿Ereccion mañanera?";
      }
      $("#myButton4").html(text);
    }
  </script><!--5 pregunta-->
  <script type="text/javascript">
    $(".div5").hide();
    function ShowHideElement5()
    {
      var text ="";

      if ($("#myButton5").text() ==="¿Ereccion desviada?")
      {
          $(".div5").show();
          text="Ocultar";
      }
      else
      {
        $(".div5").hide();
        text="¿Ereccion desviada?";
      }
      $("#myButton5").html(text);
    }
  </script><!--6 pregunta-->
  <script type="text/javascript">
    $(".div6").hide();
    function ShowHideElement6()
    {
      var text ="";

      if ($("#myButton6").text() ==="¿Producir la ereccion?")
      {
          $(".div6").show();
          text="Ocultar";
      }
      else
      {
        $(".div6").hide();
        text="¿Producir la ereccion?";
      }
      $("#myButton6").html(text);
    }
  </script><!--7 pregunta-->
  <script type="text/javascript">
    $(".div7").hide();
    function ShowHideElement7()
    {
      var text ="";

      if ($("#myButton7").text() ==="¿Suprimir ereccion?")
      {
          $(".div7").show();
          text="Ocultar";
      }
      else
      {
        $(".div7").hide();
        text="¿Suprimir ereccion?";
      }
      $("#myButton7").html(text);
    }
  </script><!--8 pregunta-->
  <script type="text/javascript">
    $(".div8").hide();
    function ShowHideElement8()
    {
      var text ="";

      if ($("#myButton8").text() ==="¿El cuerpo de mujer?")
      {
          $(".div8").show();
          text="Ocultar";
      }
      else
      {
        $(".div8").hide();
        text="¿El cuerpo de mujer?";
      }
      $("#myButton8").html(text);
    }
  </script><!--9 pregunta-->
  <script type="text/javascript">
    $(".div9").hide();
    function ShowHideElement9()
    {
      var text ="";

      if ($("#myButton9").text() ==="¿Tamaño normal?")
      {
          $(".div9").show();
          text="Ocultar";
      }
      else
      {
        $(".div9").hide();
        text="¿Tamaño normal?";
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
