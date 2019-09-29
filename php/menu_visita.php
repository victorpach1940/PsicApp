<style>
.navbar {
  margin-bottom: 0;
  background-color: #f4511e;
  z-index: 9999;
  border: 0;
  font-size: 12px !important;
  line-height: 1.42857143 !important;
  letter-spacing: 4px;
  border-radius: 0;
  font-family: Montserrat, sans-serif;
}
.navbar li a, .navbar .navbar-brand {
  color: #fff !important;
}
.navbar-nav li a:hover, .navbar-nav li.active a, .dropdown-menu a:hover, .dropdown-menu .dropdown-item{
  color: #f4511e !important;
  background-color: #fff !important;
}
.navbar-expand-lg .navbar-toggle {
  border-color: transparent;
  color: #fff !important;
}
</style>
<nav class="navbar navbar-fixed-top navbar-expand-lg">
  <div class="container">
    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="border-color: gray;">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="../img/ico.png" height="35" width="40"></a>
      </div>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categorias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Adicciones</a>
              <a class="dropdown-item" href="#">Salud mental</a>
              <a class="dropdown-item" href="#">Sexualidad</a>
              <a class="dropdown-item" href="#">Violencia de pareja</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sesion privada</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login/index.php">Inicia sesion/Registrarse <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
</nav>
