<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <?php
      echo form_open('Contact/insert');
    ?>
    <select id ="sel" class = "select form-control">
      <option id = "default" style="display: none">Selecciona una opcion:</option>
      <option value = "Reporte de Bug">Reporte de Bug</option>
      <option value = "Opinion Personal">Opinion Personal</option>
      <option value = "Otro">Otro</option>
    </select>
    <hr>
    <?php
      echo form_input_textarea('contenido','Ingresa tu comentario');
      $partes = array ('style' => 'display: none');
      echo form_input_text('seleccionado','',$partes);
    ?>
    <input type="submit" class = "form-control btn-default">
    <?php
      echo form_close();
    ?>
    </div>
  </div>
</div>

<script type = "text/javascript">
    $(document).ready(function(){

      $("#sel").click(function(e){
        $("#default").css("display","none");
        $("#seleccionado").val($('#sel option:selected').text());

      });
    });
</script>
