<?php
session_start();
require "conn.php";
$ide='';
$sql=''; $retorno=''; $globales=0; $sql1=''; $sql2=''; $r1=''; $r2=''; $mujer=0;
$hombre=0; $edad=0; $sql3=''; $r3=''; $slqinserta=''; $resu='';$sql4=''; $r4=''; $sexo=$_SESSION['genero']; $anios=$_SESSION['edad'];
$sql4="SELECT max(idvis) FROM VISITANTES;"; $r4=mysqli_query($conn,$sql4);
$ide=mysqli_fetch_row($r4); $slqinserta="INSERT INTO VISITANTES VALUES ('','$sexo','$anios','VIOLENCIA DE PAREJA');"; $resu=mysqli_query($conn,$slqinserta);
$sql="SELECT * FROM VISITANTES WHERE secvis='VIOLENCIA DE PAREJA';"; $sql1="SELECT * FROM VISITANTES WHERE sexovis='F' AND secvis='VIOLENCIA DE PAREJA';";
$sql2="SELECT * FROM VISITANTES WHERE sexovis='M' AND secvis='VIOLENCIA DE PAREJA';"; $sql3="SELECT * FROM VISITANTES WHERE secvis='VIOLENCIA DE PAREJA' AND edadvis BETWEEN '15' AND '24';";
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
    <title>Violencia de pareja</title>
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
        <li class="nav-item active"><a href="cuestionario_violenciadepareja.php">¿Violencia de pareja?</a></li>
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
  <section><br><br><br><br><br><br><br><strong><p style="font-size:70px; font-family: 'Courgette', cursive; color:white; text-align:center;">Violencia de pareja</p></strong>
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
    <h1>Violencia de pareja</h1>

  			<h3>Introducción</h3>
        <p>
          La violencia en una relación de pareja es toda acción u omisión que daña física, emocional y sexualmente, con el fin de dominar y mantener el control sobre otra persona. Para ello, se pueden utilizar distintas estrategias como ataque a la autoestima, insultos, chantajes, manipulación sutil o golpes.

          “En ocasiones un comentario incómodo, un jaloneo o una bofetada podrían parecer parte del juego entre dos personas. El enamoramiento impide percatarse de que uno ejerce violencia sobre el otro. Los novios no deben confundir maltrato y ofensas con amor e interés”. A continuación le proporcionamos los siguientes temas a tratar en este articulo</br>
          <div class="indice">
        <p class="indice-Contenidos">Contenidos</p>
        <ol class="indice-lista">
          <li><a href="#1">La adolescencia, la etapa más vulnerable a esas conductas</a>
            <ul>
            <li><a href="#2">¿Cómo nace la violencia?</a></li>
            <li><a href="#3">Consecuencias</a></li>
            <li><a href="#4">¿Qué hacer?</a></li>
            </ul>


          </li>
          </ul>
          <li><a href="#5">Formas de maltrato</a>
            <ul>
            <li><a href="#6">Maltrato psicológico</a> </li>
            <li><a href="#7">Maltrato emocional</a> </li>
            <li><a href="#8">Maltrato físico</a></li>
            <li><a href="#9">Maltrato económico y patrimonial</a></li>
            <li><a href="#10">Maltrato sexual</a></li>
              </li>
              </ul>
          <li><a href="#11">Factores de riesgo</a>
            <ul>
            <li><a href="#12">Inviduales</a> </li>
            <li><a href="#13">Comunitarios</a> </li>
            <li><a href="#14">Relacionados con el grupo de iguales</a></li>
              </li>
              </ul>
              <li><a href="#15">Prevencion</a>
                <ul>
                  <li><a href="#16">Relación de pareja saludable</a></li>
                  <li><a href="#17">La relación de pareja que recomendamos</a></li>
                </ul>
              </li>
              <li><a href="#18">Preguntas frecuentes</a></li>
              </li>
            </li>
          </li>
        </ol>
      </div>
          <b><h3 id="1">La adolescencia, la etapa más vulnerable a esas conductas</b></h3>
          es una situación que se mantiene en silencio porque la mayoría considera que son normales, pues viven en un entorno violento con padres y hermanos.</br>
          Las conductas violentas en la pareja tienen un ciclo que comprende tensión emocional, agresión sin control y reconciliación. En la primera fase existe tensión frecuente, en la segunda ésta se acumula y crece hasta llegar al insulto, mientras que en la tercera el agresor busca la reconciliación. “Dice arrepentirse, promete que cambiará, llena de obsequios a la pareja e intenta complacerla para ser perdonado o perdonada”.</br>
          Si este ciclo sucede más de una vez en el noviazgo, se está ante un caso de violencia que debe ser detenido y atendido. “Quien es violento no dejará de serlo si no trabaja con su yo, lo primero es percatarse de lo que ocurre y empezar a trabajar de manera retrospectiva”.</br>
                        <img class="img-fluid" src="../img/sex.svg" width="5000" ></br>

          <b><h5 id="2">¿Cómo nace la violencia?</b></h5>
          Los problemas en pareja son universales, pero lo que diferencia es la forma de resolver estos que está relacionada con los recursos y estrategias personales que se usan. Habrá quienes adopten la vía del diálogo y el consenso posibles, otras la indiferencia o pasividad y otras la violencia (que es una falsa salida, una solución fallida) que terminará causando más problemas. La violencia surge por el deseo de control sobre la otra persona.</br>
          <b><h5 id="3">Consecuencias</b></h5>
          Cuando una persona está expuesta a violencia puede sufrir depresión, aislamiento, fracaso escolar, trastornos en la alimentación y en el sueño, adicción, embarazos no deseados, infecciones de transmisión sexual y agresiones físicas que pueden atentar contra la salud física y emocional.</br>
                          <img class="img-fluid" src="../img/vi1.jpg " width="5000"></br>

          <b> <h5 id="4">¿Qué hacer?</b></h5>
          Se debe entender que el problema es estrictamente de la persona violenta, tiene que ver con su historia y no con lo que la víctima haga o deje de hacer algo.

          Muchas de las personas que sufren violencia no ponen un límite a su pareja. “A pesar del malestar en que viven, callan, no denuncian, no hacen nada por pedir ayuda, por romper esa relación y se quedan silenciosamente junto a quien las maltrata” señala Zeballos.

          Recomienda hablar sobre lo que está pasando y buscar solucionar la situación con los familiares o amigos más cercanos y de confianza. En algunos casos, es importante acudir a ayuda profesional, como psicólogos o  centros de denuncia.</br>
          <b><h3 id="5">Formas de maltrato</b></h3>
          Las formas de maltrato se pueden clasificar en cinco categorías; de la más a la menos frecuente son: Psicológica, Emocional, Física, Económica y Sexual.</br>

          <b><h5 id="6">Maltrato psicológico</b></h5>
          Son acciones orientadas a controlar, restringir los movimientos o vigilar a la otra persona; aislarla socialmente; desvalorizarla, denigrarla, humillarla o hacerla sentir mal consigo misma; hacer que otros se pongan en su contra, acusarla falsamente o culparla por circunstancias negativas; obligarla a ir en contra de la ley o de sus creencias morales y/o religiosas; destruir su confianza en sí misma o en la pareja. Las conductas más frecuentes son:
          <ul>
            <li>Decir que eres acreedor(a) de un golpe (aunque no lo lleve a cabo),</li>
            <li>celos excesivos,</li>
            <li>llamar varias veces al día para averiguar que está haciendo el otro,</li>
            <li>controlar su tiempo o sus actividades cotidianas,</li>
            <li>imponer el punto de vista,</li>
            <li>acusar injustamente de ser infiel</li>
            <li> tratar de cambiar el modo de vestir del otro</li>
          </ul>
                                          <img class="img-fluid" src="../img/vi9.jpg" width="2000"></br>

          <b><h5 id="7">Maltrato emocional</b></h5>
          Son actos de naturaleza verbal o no verbal que generan intencionalmente en la víctima ansiedad, temor o miedo, tal como las intimidaciones y las amenazas. Incluye las amenazas o los actos de violencia dirigidos a un familiar o a un conocido de la víctima, a sus bienes o hacia el agresor mismo, realizados con el mismo fin. Las conductas más frecuentes son:</br>

          <ul>
            <li>Llegar borracho(a) a la casa a hacer escándalo,</li>
            <li>maltrato físico, después llorar y alegar que él(ella) es el amor de tu vida y que no habrá dos como él (ella),</li>
            <li>Romper o destruir algún bien personal del otro intencionalmente,</li>
            <li>Amenazar con tener una relación con otra persona</li>
            <li>Amenazar con hacerse daño a sí mismo(a), si el otro no hacía algo que él (ella) dijo.</li>
          </ul>
          <b><h5 id="8">Maltrato físico</b></h5>
          Son actos sobre el cuerpo de la persona, que producen daño o dolor sobre la misma (golpes, jalones, tirones, patadas, cachetadas, mordidas, pellizcos, intento de estrangulamiento, etc.). Las conductas más frecuentes son:
          <ul>
            <li>Apretar fuerte con intención de retener</li>
            <li>Golpear con una parte del cuerpo (con el puño, un pie, etc)</li>
            <li>Exigir tener relaciones sexuales.</li>
            <li>Empujones o pellizcos.</li>
            <li>Incluso matar a la víctima</li>
          </ul>
                                  <img class="img-fluid" src="../img/vi3.jpg " width="5000"></br>

          <b><h5 id="9">Maltrato económico y patrimonial  </b></h5>
          Cuando se fuerza a la otra persona a depender económicamente del agresor, no dejándola trabajar o por otros medios; ejercer control sobre los recursos financieros de la víctima o explotarla económicamente. Las conductas más frecuentes son:
          <ul>
            <li>No permitirle trabajar o estudiar u obligar a abandonar un trabajo o unos estudios que venía realizando.</li>
            <li>Negarle dinero para abastecer la despensa del hogar o medicinas.</li>
            <li>Negar la tarifa alimenticia.</li>
          </ul>
          <b><h5 id="10">Maltrato sexual</b></h5>
          Son actos obligados, no consentidos por la víctima, orientados a satisfacer necesidades o deseos sexuales del o la victimario/a. Las conductas más frecuentes son:
          <ul>
            <li>Forzar a tener relaciones sexuales</li>
            <li>Obligar a tener comportamientos sexuales que no le agradaban o con los que no se sentía a gusto.</li>
          </ul>
                                          <img class="img-fluid" src="../img/vi2.jpg" width="5000"></br>

          <b><h3 id="11"> Factores de riesgo</b></h3>
          Existen una cantidad de factores que tiene correlación estadística con el hecho de ser víctima o perpetrador de violencia, lo cual no significa que sean las causas de la violencia. Estos factores son:
        </br>
        <b><h5 id="12">Inviduales</b></h5>
        Los factores relacionados con el hecho de ser perpetrador de violencia son:

        <ul>
          <li>Haber estado expuesto en la niñez a modelos de agresión inter-parentales.</li>
          <li>Admitir la violencia como método de resolución de conflictos interpersonales.</li>
          <li>Alto nivel de ira.</li>
          <li>Bajo nivel de autoestima</li>
          <li>Actitudes sexistas</li>
        </ul>
        <b><<h5 id="13">Los factores relacionados con la victimización son:</b></h5>
        <ul>
          <li>Consumo de alcohol o drogas.</li>
          <li>Sentimientos de desesperanza o baja autoestima.</li>
          <li>Mantener conductas sexuales de riesgo.</li>
          <li>Embarazo.</li>
          <li>Formas de control del peso no saludables.</li>
        </ul>
                              <img class="img-fluid" src="../img/alc1.png" width="5000" ></br>

          <b><h5 id="14">Comunitarios </b></h5>
          <ul>
            <li>Altas concentraciones de pobreza.</li>
            <li>Bajo nivel de participación comunitaria, de organización social.</li>
            <li>Exposición a la violencia en la comunidad.</li>
          </ul>
        <b><h5 id="15">Relacionados con el grupo de iguales </b></h5>
        <ul>
          <li>Tener amigos que han sufrido violencia en la pareja.</li>
          <li>Tener amigos que utilizan la violencia</li>
        </ul>
        <b><h3 id="16">Prevención</b></h3>
        Todo ello apunta a la necesidad de hacer prevención desde el inicio de la adolescencia temprana (o incluso antes) con el objetivo de educar en la promoción del buen trato y las relaciones saludables de pareja. En esta misión, será importante dotarles de las habilidades socioemocionales necesarias para enfrentar nuevas y complejas situaciones con las que probablemente se van a encontrar.</br>


        Asociado a esto último, será clave trabajar la concienciación y la regulación emocional, fomentar la empatía y el respeto hacia el otro, promover conductas de apoyo hacia sus iguales, y actitudes igualitarias, hacerles reflexionar sobre las consecuencias de ciertos comportamientos y actitudes (offline y online), así como ayudar a canalizar de forma adecuada el enfado, la ira, la tristeza, la euforia y la frustración que experimentarán en esa montaña rusa que es la adolescencia.</br>
        <b><h5>En una relación de pareja saludable:</b></h5>
        <ul>
          <li>Tu pareja respeta tus decisiones aunque no esté de acuerdo.</li>
          <li>Te apoya para que cumplas tus metas y sueños.</li>
          <li>No te obliga a hacer algo que no deseas o que te lastima.</li>
          <li>Comparte y celebra tus triunfos.</li>
          <li>Demuestra sus sentimientos de una manera no violenta.</li>
          <li>Respeta tu privacidad.</li>
        </ul>
                                              <img class="img-fluid" src="../img/vi4.jpg "></br>

        <b><h5 id="17">La relación de pareja que recomendamos se basa en:</b></h5>
        <ol>
          <li>Libertad: Debemos darle a la otra persona la  libertad que queremos para nosotros mismos. Las personas deben ser libres para elegir lo que  quieren en cada momento.</li>
          <li>Respeto mutuo: Para que las relaciones de pareja sean igualitarias y no reproduzcan modelos de sumisión/dominación, debe haber un respeto mutuo.</li>
          <li>Independencia: Debemos entender que no hay por qué hacer todo junto con nuestra pareja. Cada uno somos diferentes, con gustos distintos. Unas veces se comparten actividades, y otras veces se disfrutan con otras personas o en soledad</li>
          <li>Autonomía: Cada parte de la pareja debe tener autonomía para decidir qué quiere, cómo lo quiere y cuándo lo quiere.</li>
          <li>Corresponsabilidad: Repartir el peso de las tareas cotidianas. Si compartes la vivienda con tu pareja, que él sea corresponsable quiere decir que carga con el peso de la casa como tú, que ambas partes asumen el peso del hogar.</li>
          <li>Empatía: La capacidad de ponerse en el lado de la otra persona para entender sus opiniones o acciones. La empatía nos amplía la capacidad de respetar y nos ayuda también, a ampliar horizontes y a entender que todas las personas no somos iguales.</li>
          <li>Igualdad: Basar las relaciones de pareja en igualdad significa que ninguna de las dos partes es más que la otra, que se tienen en cuenta las opiniones y gustos de las dos personas, que se reparten las tareas y obligaciones.</li>
          <li>Equidad: Introduce un principio ético o de justicia en la igualdad. Plantea la igualdad como un tema relacionado con la justicia social.</li>
          <li>Comunicación asertiva: Es una forma de expresión consciente, congruente, clara, directa y equilibrada, cuya finalidad es comunicar nuestras ideas y sentimientos o defender nuestros legítimos derechos sin la intención de herir o perjudicar</li>
        </ol>
                                              <img class="img-fluid" src="../img/vi5.jpg" width="5000"></br>
    <a href="#top" class="btn btn-primary">Regresar al inicio</a><br>
  <h3 id="18">Preguntas frecuentes</h3>
  <div class="container">
    <div class="div1">
      <b>1. ¿Puede un hombre ser víctima de violencia de género?</b></br>
      No, solo lo es la mujer. Así lo establece la ley de Protección Integral contra la Violencia de Género. Hay que diferencia el concepto de violencia de género del de violencia doméstica. Este último abarca la violencia ejercida entre los integrantes del núcleo familiar. Es decir: violencia sobre el cónyuge, descendientes (hijos), ascendientes (padres, abuelos...) o hermanos. O bien sobre los menores que convivan o se hallen bajo la tutela o protección de esa persona.</br>

      Por tanto: un hombre no puede ser víctima de violencia de género, pero sí de violencia doméstica. Otra diferencia clave entre ambos conceptos es que la penalidad es mayor en los casos de violencia de género y tienen Juzgados propios.</br>
  </div>
  <button id="myButton" class="btn btn-success btn-lg btn-block" onclick="ShowHideElement()">¿Hombre una victima?</button>
</div>
<div class="container">
  <div class="div2">
    <b>2. ¿Qué es la orden de protección y cómo se logra?</b></br>
    Se trata de la Orden de protección de las víctimas de violencia tanto de género como doméstica. Es una resolución judicial que proporciona medidas cautelares de protección a la persona que sufre violencia de género. La puede solicitar cualquier persona que sufra violencia de cualquier tipo. Este es el formulario para poder solicitar la protección. Tanto la solicitud como su tramitación es gratuita.</br>
  </div>
  <button id="myButton2" class="btn btn-warning btn-lg btn-block" onclick="ShowHideElement2()">¿Orden de proteccion?</button>
</div>
<div class="container">
  <div class="div3">
    <b>3. ¿Se puede optar a un abogado de oficio?</b></br>
    Sí, cualquier persona que sufra violencia de género puede solicitar un abogado de oficio, independientemente de sus ingresos económicos. Aunque si la sentencia penal resulta absolutoria o de archivo (no se considera "culpable" al agresor), se perderá el derecho al abogado de oficio cuando se superen los límites económicos establecidos por la ley.</br>
    </p>

    <b><h4>¿Tiene más dudas?</b></h4>
         puede solicitar información en el chat en linea de PsicApp, donde uno de nuestros expertos lo atendera.
    <p >
  </p>
  </div>
  <button id="myButton3" class="btn btn-info btn-lg btn-block" onclick="ShowHideElement3()">¿Optar por abogado?</button>
</div>
<!--<div class="container">
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
</div>-->
  <!--zona de js-->
  <script type="text/javascript">
    $(".div1").hide();
    function ShowHideElement()
    {
      var text ="";

      if ($("#myButton").text() ==="¿Hombre una victima?")
      {
          $(".div1").show();
          text="Ocultar";
      }
      else
      {
        $(".div1").hide();
        text="¿Hombre una victima?";
      }
      $("#myButton").html(text);
    }
  </script><!--segunda pregunta-->
  <script type="text/javascript">
    $(".div2").hide();
    function ShowHideElement2()
    {
      var text ="";

      if ($("#myButton2").text() ==="¿Orden de proteccion?")
      {
          $(".div2").show();
          text="Ocultar";
      }
      else
      {
        $(".div2").hide();
        text="¿Orden de proteccion?";
      }
      $("#myButton2").html(text);
    }
  </script><!--3 pregunta-->
  <script type="text/javascript">
    $(".div3").hide();
    function ShowHideElement3()
    {
      var text ="";

      if ($("#myButton3").text() ==="¿Optar por abogado?")
      {
          $(".div3").show();
          text="Ocultar";
      }
      else
      {
        $(".div3").hide();
        text="¿Optar por abogado?";
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
