<?= sources(true); ?>
<header id="headerimg" class="intro-header" style="background-image: url('<?=base_url('recursos/img') . '/' .$img ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-8">
                    <div class="site-heading">
                      <?php
                        $partes = array ('id' => 'changeimg');
                        echo form_open_multipart('Articulo/updateImage', $partes);
                        $partes = array ('style' => 'display: none','value' => $row->id);
                        echo form_input_text('id','', $partes);
                        echo form_input_file('');
                      ?>
                      <input type="submit" class = "form-control btn-default" value="Cambiar">
                      <?php
                        echo form_close();
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

      <div id="richbox">
        <?php
          $partes = $row->contenido;
          generate_rich_box2("Post", $partes);
        ?>
        <button id="btnContinuar" class = "form-control btn-default">Siguiente</button>
      </div>

      <div id ="form" style="display: none">
        <button id="btnEditar" class = "form-control btn-default">Anterior</button>
        <?php
          echo form_open('Articulo/update');
        ?>
        <input type="text" name="id" id="id" class="form-control" value = <?=$row->id?> style="display: none;">
        <br>
        <label style="display: inline-block;">Titulo del Post</label>
        <input type="text" name="post" id="post" class="form-control" value = <?=$row->post?>>
        <br>
        <label style="display: inline-block;">Subtitulo del Post</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control" value = <?=$row->descripcion?>>
        <input type="text" name="contenido" id="contenido" class="form-control" style="display: none;">
        <input type="text" name="framework" id="framework" class="form-control" style="display: none;">
        <br>
        <label>Framework</label>
        <select id ="frame" class = "select form-control" style="width: 200px; display: inline-block;">
          <option id = "default" style="display: none">Selecciona una opcion:</option>
          <option value = "Codeigniter"
          <?php
            if($row->framework == 'Codeigniter')
            {
              ?>
              selected
              <?php
            }
          ?>
          >Codeigniter</option>
          <option value = "Laravel"
          <?php
          if($row->framework == 'Laravel')
          {
            ?>
            selected
            <?php
          }
          ?>
          >Laravel</option>
          <?php
            $usuario = $this->session->userdata('usuario');
            if($usuario == 'admin')
            {
          ?>
          <option value = "Novedades"
          <?php
          if($row->framework == 'Novedades')
          {
            ?>
            selected
            <?php
          }
          ?>
          >Novedades</option>
          <?php
            }
          ?>
        </select>
        <hr>
        <input type="submit" class = "form-control btn-default" value="Actualizar">
        <?php
          echo form_close();
        ?>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
        $('.dropdown-menu input').click(function() {return false;})
            .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () {
        var overlay = $(this), target = $(overlay.data('target'));
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        //$('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
    };
    function showErrorAlert (reason, detail) {
        var msg='';
        if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
        else {
            console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
         '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
    };
    initToolbarBootstrapBindings();
    $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
  });

  $("#btnContinuar").click(function(){
    $("#form").css("display","initial");
    $("#richbox").css("display","none");
    $("#contenido").val($("#editor").cleanHtml(true));
  });

  $("#btnEditar").click(function(){
    $("#form").css("display","none");
    $("#richbox").css("display","initial");
    $("#contenido").val($("#editor").cleanHtml(true));
  });

</script>

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
          $("#headerimg").attr({
            'style': 'background-image: url('+ response +')'
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

    $("#frame").change(function(e){
      $("#framework").val($('#frame option:selected').text());
    });

  });
</script>
