<link type="text/css" rel="Stylesheet" href="<?= base_url()?>recursos/css/login.css">

<section class="wrapper">
  <form action="<?=base_url()?>Login/alta" method="post" name="Login_Form" class="formulario">
      <h3 class="form-cab">Registrarse es totalmente ¡GRATIS!</h3>
      <hr class="colorgraph"><br>
      <h4>Informacion general </h4>
      <br>
      <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico*" required autofocus="">
      <br>
      <input type="text" name="user" id="user" class="form-control" placeholder="Usuario*" required>
      <br>
      <input type="password" name="rpass" id="rpass" class="form-control" placeholder="Confirmar Contraseña*" required>
      <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña*" required>
      <hr></hr>
      <h4>Datos de Usuario</h4>
      <br>
      <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Nombre(s)*" required>
      <br>
      <input type="text" name="user_last" id="user_last" class="form-control" placeholder="Apellidos*" required>
      <br>
      <div style="align: center">
        <label class="radio-inline">
          <input type="radio" name="genero" id = "genero" value = "Hombre">Hombre
        </label>
        <label class="radio-inline">
          <input type="radio" name="genero" id = "genero" value="Mujer">Mujer
        </label>
      </div>
      <br>
      <br>
      <select id ="sel_oc" class = "select form-control">
        <option id = "default" style="display: none">Ocupación</option>
        <option value = "Estudiante">Estudiante</option>
        <option value = "Desarrollador">Desarrollador</option>
        <option value = "Arquitecto">Arquitecto</option>
        <option value = "Diseñador">Diseñador</option>
        <option value = "Otro">Otro</option>
      </select>
      <input type="text" id="sele_oc" name = "sele_oc" style="Display: none">
      <br>
      <select id ="sel_in" class = "select form-control">
        <option id = "default" style="display: none">Intéres:</option>
        <option value = "Programación Web">Programación Web</option>
        <option value = "Programación Móvil">Programación Móvil</option>
      </select>
      <input type="text" id="sele_in" name = "sele_in" style="Display: none">
      <br>
      <input type="submit" name="register" id="register" class="btn btn-primary btn-block" value="Registrame!">
  </form>
</section>

    <script type="text/javascript">
      $(document).ready(function(){

        $("#sel_in").change(function(e){
          $("#sele_in").val($('#sel_in option:selected').text());
        });

        $

        $("#sel_oc").change(function(e){
          $("#sele_oc").val($('#sel_oc option:selected').text());
        });

      });

    </script>
