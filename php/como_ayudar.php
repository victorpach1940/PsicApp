<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../img/icono_page.png">
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
      <button class="navbar-toggler navbar-toggler-right bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#" ><h4 style="color:white">Cómo ayudar a alguien</h4></a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li><a href="#tienda" class="btn btn-primary">¡Apoyanos!</a></li>
        </ul>
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


<div class="banner" class="img-fluid" alt="Responsive image"></div>
 <div class="box container white
  ">
  <article align="justify">

      <form action="">
  <div class="form-group">
    <label for="exampleFormControlSelect1"><h2>Por favor seleccione su edad</h2></label>
    <select class="form-control" id="exampleFormControlSelect1">
     <option>Seleccione su edad</option>
     <option id="menor">Menor de 15 años</option>
     <option id="15">15</option>
     <option id="16">16</option>
     <option id="17">17</option>
     <option id="18">18</option>
     <option id="19">19</option>
     <option id="20">20</option>
     <option id="21">21</option>
     <option id="22">22</option>
     <option id="23">23</option>
     <option id="24">24</option>
     <option id="mayor">Mayor de 24 años</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1"><h2>Seleccione su genero</h2></label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option id="f">Seleccione Genero</option>
     <option id="f">F</option>
     <option id="m">M</option>
</select>
  </form>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
  </br>
    <a href="../html/indexPadres.html"><button type="button" class="btn btn-lg btn-outline-primary">Omitir</button></a>
  </div>
    <div class="col-md-2">
    </br>
    <a href="categoria_ayuda.php"><button type="button" class="btn btn-lg btn-outline-primary">Siguiente</button></a>
</div>
</div>
</div>
</form>


  </article>
</div>



<style>

  .banner{
        background-image: url("back.jpg");
     background-size: cover;
       height: 600px;
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
