<style type="text/css">

  .etiqueta{
    display: inline-block;
		width: 120px;
		text-align: right;
  }

  input[type="text"]{
    width: 200px;
    display: inline;
  }

  section, aside{
    display: inline-table;
	}

  select{
    display: inline-block;
		width: 200px;
		text-align: right;
  }

  section{
				height: 1em;
				text-align: center;
				width: 55%;
				height: 200px;
	}

  aside{
				padding: .7em;
				border-radius: 10px;
				height: 1em;
				text-align: center;
				width: 40%;
				height: 222px;
				vertical-align: top;
	}

  img{
    width: 250px;
    height: 250px;
  }

</style>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <section>
          <form action="<?=base_url()?>Perfil/Subir" method="post" id="informacion">
            <h1 style="display: inline;">Tu información</h1>
            <br>
            <br>
            <label class="etiqueta">Nombre:</label>
            <input type="text" id="name" name="name" class = "form-control" value="<?=$nombre?>">
            <br>
            <br>
            <label class="etiqueta">Apellidos:</label>
            <input type="text" id="last" name="last" class = "form-control" value="<?=$apellidoP?>">
            <br>
            <br>
            <label class="etiqueta">Sexo:</label>
            <label class="radio-inline">
              <input type="radio" name="genero" id = "genero" value = "Hombre"
              <?php
                if($sexo == 'Hombre')
                {
                  ?>
                  checked
                  <?php
                }
              ?>
              >Hombre
            </label>
            <label class="radio-inline">
              <input type="radio" name="genero" id = "genero" value="Mujer"
              <?php
                if($sexo == 'Mujer')
                {
                  ?>
                  checked
                  <?php
                }
              ?>
              >Mujer
            </label>
            <br>
            <br>
            <label class="etiqueta">Ocupación:</label>
            <select id ="sel_oc" class = "select form-control" style="width: 200px; display: inline-block">
              <option id = "default" style="display: none">Ocupacion:</option>
              <option value = "Estudiante"
              <?php
              if($ocupacion == 'Estudiante')
              {
                ?>
                selected
                <?php
              }
              ?>
              >Estudiante</option>
              <option value = "Desarrollador"
              <?php
              if($ocupacion == 'Desarrollador')
              {
                ?>
                selected
                <?php
              }
              ?>
              >Desarrollador</option>
              <option value = "Arquitecto"
              <?php
              if($ocupacion == 'Arquitecto')
              {
                ?>
                selected
                <?php
              }
              ?>
              >Arquitecto</option>
              <option value = "Diseñador"
              <?php
              if($ocupacion == 'Diseñador')
              {
                ?>
                selected
                <?php
              }
              ?>
              >Diseñador</option>
              <option value = "Otro"
              <?php
              if($ocupacion == 'Otro')
              {
                ?>
                selected
                <?php
              }
              ?>
              >Otro</option>
            </select>
            <input type="text" id="sele_oc" name ="sele_oc" style="Display: none">
            <br>
            <br>
            <label class="etiqueta">Intéres:</label>
            <select id ="sel_in" class = "select form-control" style="width: 200px; display: inline-block">
              <option id = "default" style="display: none">Intéres:</option>
              <option value = "Programación Web"
              <?php
              if($preferencias == 'Programación Web')
              {
                ?>
                selected
                <?php
              }
              ?>
              >Programación Web</option>
              <option value = "Programación Móvil"
              <?php
              if($preferencias == 'Programación Móvil')
              {
                ?>
                selected
                <?php
              }
              ?>
              >Programación Móvil</option>
            </select>
            <input type="text" id="sele_in" name ="sele_in" style="Display: none">
            <br>
            <br>
            <input type="submit" name="register" id="register" class="btn-default form-control" value="Actualizar">
          </form>
        </section>
        <aside>
          <label>Imagen de Perfil</label>
          <img id="imagen" src="<?=base_url('recursos/img'). '/' .$imagen?>">
          <?php
            $partes = array ('id' => 'changeimg');
            echo form_open_multipart('Perfil/Imagen', $partes);
            $partes = array ('style' => 'display: none','value' => $id);
            echo form_input_text('id','', $partes);
            echo form_input_file('');
          ?>
          <input type="submit" class = "form-control btn-default" value="Cambiar">
          <?php
            echo form_close();
          ?>
        </aside>
        <br>
        <br>
        <a href = "<?= base_url()?>Perfil" class="form-control btn-default" style="text-align: center; text-decoration: none;">Atras</a>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    var request;

    $("#changeimg").submit(function(event){

      if(request)
      {
        request.abort();
      }

      var $form = $(this);

      var $inputs = $form.find("input, select, button, textarea");

      var formData = new FormData($(this)[0]);

      var formDataSerialized = $(this).serialize();

      $inputs.prop("disabled", true);

      request = $.ajax({

        cache: false,
        contentType: false,
        processData: false,
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: formData

      });

      request.done(function (response, textStatus, jqXHR){
        console.log(response);
        if(response.indexOf("http") > -1)
        {
          $("#imagen").attr({
            'src': response
          });
        }
        else
        {
          alert("no funciono la carga de imagen, intente de nuevo");
        }
      });

      request.fail(function(jqXHR, textStatus, errorThrown){

      });

      request.always(function(){
        $inputs.prop("disabled", false);
      });

      event.preventDefault();

    });

    $("#sele_in").val($('#sel_in option:selected').text());
    $("#sele_oc").val($('#sel_oc option:selected').text());

    $("#sel_in").change(function(e){
      $("#sele_in").val($('#sel_in option:selected').text());
    });

    $("#sel_oc").change(function(e){
      $("#sele_oc").val($('#sel_oc option:selected').text());
    });

  });
</script>
