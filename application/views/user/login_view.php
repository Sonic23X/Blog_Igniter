<link type="text/css" rel="Stylesheet" href="<?= base_url()?>recursos/css/login.css">
<section class="wrapper">
  <form action="<?= base_url()?>Login" method="post" name="Login_Form" class="formulario">
    <h3 class="form-cab" style="aling: center">Iniciar Sesión</h3>
    <hr class="colorgraph"><br>
    <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" required autofocus="">
    <br>
    <input type="password" name="password" id="pass" class="form-control" placeholder="Contraseña" required>
    <input type="submit" name="login" id="login" value="Iniciar sesión" class="btn btn-lg btn-primary btn-block">
    <br>
    <a class="control-form" name="regis" id="regis" href="<?= base_url()?>Home/registrar" style="text-decoration: none">"¿No estas registrado? ¡Registrate!"</a>
    <span id="result"></span>
  </form>
</section>
