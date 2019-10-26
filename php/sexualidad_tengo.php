<!DOCTYPE html>
      <html lang="es">
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Bootstrap y Fonts CSS -->
          <link rel="stylesheet" href="../css/bootstrap.min.css">
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
          <nav id="menu" class="navbar navbar-toggleable-md navbar-inverse bg-primary fixed-top">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#" ><h4>La salud sexual</h4></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


            </div>
          </nav>



          <!-- jQuery first, then Tether, then Bootstrap JS. -->
          <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
          <script src="../js/bootstrap.min.js"></script>
          <script src="../js/bootstrap.min.js"></script>
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

        <center>
        <section><br><br><br><br><br><br></br></br></br></br></br><strong><p style="font-size:70px; color:white; font-family: 'Courgette', cursive;">¿Tiene miedo de tener una ETS?</p></strong>
        </section>
      </center>
      </div>



       <div class="box container white
        ">
        <article align="justify">
          <center>
            <p><h1>Por favor responda las siguientes preguntas</h1></p></br>
          <h2 id="preg"></h2>
          <input type="text" onkeyup="this.value = this.value.toLowerCase();" id="dato">
        <button class="btn btn-outline-primary" id="boton">Siguiente Pregunta</button></br>
        <p id="resolucion"></p> </br>

         <div class="constainer-fluid">
              <div class="row">

              <div class="col-md-12">
                <a href="index.php"><button type="button" class="btn btn-lg btn-outline-primary">Menú principal</button></a>

                <a href="sexualidad.php"><button type="button" class="btn btn-lg btn-outline-primary">Sexualidad</button></a>

      </br></br></br></br></br>
        </center>

        <script>


          // Array bidimensional donde se guardarán las preguntas junto a sus respuestas correctas correspondientes...
          var preguntas = [                                     // Pregunta Respuesta
              ['¿Tiene dolor o ardor al orinar?', 'si'],         //  [0][0]   [0][1]
              ['¿Tiene usted un olor inusual en su zona genital?.', 'si'],                              //  [1][0]   [1][1]
              ['¿Padece usted de dolor en la parte baja del abdomen?.', 'si'],                //  [2][0]   [2][1]
              ['¿Está padeciendo fiebre?.', 'si'],                 // ...
              ['¿Ah padecido de sangrado de la boca, la nariz, el ano, pene o vagina, ?', 'si']       // [9][0] y [9][1]
            ],
            pregunta, respuesta,
            formuladas = 0,
            acertadas = 0;
          hazPregunta();
          /*
            Se programa que al pulsarse el botón "Siguiente Pregunta" se compruebe si se ha acertado la pregunta, en cuyo caso, se incrementa en una unidad 'acertadas'.
            También se comprueba si ya se han realizado las 5 preguntas, en cuyo caso, se llama a 'muestraResultado()' que mostrará el resultado del test de adicciones y terminará el programa, de lo contrario, se formula una nueva pregunta.
          */
          document.getElementById('boton').addEventListener('click', function(){
            var entrada = document.getElementById("dato").value;
            if(entrada == respuesta){
              acertadas++;
            }
            if(formuladas < 5){     // Si aun no se han hecho 5 preguntas...
              hazPregunta();      // ... seguir preguntando
            }
            else{           // de lo contrario...
              muestraResultado();   // ... finaliza juego mostrando el resultado
            }
          });
          /*
            Formula una pregunta al usuario...
          */
          function hazPregunta(){
            var e;      // simple variable auxiliar
            // se extrae una pregunta/respuesta al azar del array...
            e = preguntas.splice( numAleat(0, preguntas.length-1), 1 );
            pregunta = e[0][0];     // se guardan la pregunta y la respuesta
            respuesta = e[0][1];
            document.getElementById('preg').innerHTML = pregunta;        // se muestra la pregunta
            document.getElementById('dato').value = '';                  // se borra lo escrito anteriormente por el usuario
            formuladas++;
          }
          // Comprueba el número de preguntas acertadas y muestra mensaje en función de este...
          function muestraResultado(){
                  var resultado;      // para guardar el mensaje con el resultado
            switch(acertadas){
              case 0:
                resultado = 'No hemos detectado ningún problema, puede estar tranquilo :D';
                break;
              case 1:
                resultado = 'Encontramos un indice muy bajo, pero puede que sean solo cambios hormonales, puede estar usted tranquilo n.n';
                break;
              case 2:
                resultado = 'Bajo riesgo, puede que usted necesite hablar con un experto, recomendamos ponerse en contacto con nosotros donde sin pena podra expresarnos sus problemas.';
                break;
              case 3:
                resultado = 'Algo no esta bien, necesita hablar con un experto, si no conoce alguno o tiene pena, recomendamos que se ponga en contacto con nuestros expertos.';
                break;
              case 4:
                resultado = 'Alto indice de riesgo usted podría estar en serios problemas, puede despejar aun mas sus dudas visitanto el tema de sexualidad y comunicandose con uno de nuestros expertos ';
                break;
              case 5:
                resultado = '¡Elevado indice de riesgo, necesita atencion de un ginecólogo, podría estar realmente en problemas de salud sexual, nuestros expertos lo pueden ayudar a como buscar ayuda ';
                break;
            }
                  document.getElementById('resolucion').innerHTML = resultado;
          }
          /*
            Devuelve un número aleatorio entero entre 'min' y 'max' (ambos inclusive)
          */
          function numAleat(min, max){
            return Math.floor( Math.random() * (max - min + 1) ) + min;
          }
        </script>
      </article>

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
© 2019 Instituto Tecnólogico de Puebla, PsicApp.
