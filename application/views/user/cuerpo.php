<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <a href = "<?= base_url()?>Articulo/nuevo" class="form-control btn-default" style="text-align: center; text-decoration: none;">Crear nuevo post</a>
      <hr>
      <div class = "col-lg-12">
        <?php
          if($post->num_rows() == 0)
          {
            ?>
            <h1>No has hecho ningún post</h1>
            <?php
          }
          else
          {
            ?>
            <h1>Tus Post</h1>
            <?php
              $content  = "<div class='table-responsive'>";
              $content .= "<table class='table table-hover table-bordered table-condensed'>";
              $content .=	"<thead>";
              $content .=	"<tr>";
              $content .= "<th style='text-align: center;'>Nombre del Post</th>";
              $content .= "<th style='text-align: center;'></th>";
              $content .= "<th style='text-align: center;'></th>";
              $content .=	"</tr>";
              $content .=	"</thead>";
              $content .=	"<tbody>";
              $id = 0;
              foreach ($post->result_array() as $row)
              {
                $content .= "<tr id ='tr$id'>";
                foreach ($row as $key => $value)
                {
                  if($key == "post")
                  {
                    $date = DateTime::createFromFormat("Y-m-d", $row['fecha']);
                    $year = $date->format("Y");
                    $name = str_replace(" ", "_", $row['post']);
                    $content .= "<td style='text-align: center;'><a href = '". base_url('Articulo/post') ."/$year/$name' style = ' text-decoration: none;'>". $value ."</a></td>";
                    $content .= "<td style='text-align: center;'><a href = '". base_url('Articulo/modificar') ."/$year/$name' class = 'btn btn-primary'>Modificar</a></td>";
                    $content .= "<td style='text-align: center;'><Button name ='$value' id = '$id' class = 'btn btn-danger'>Eliminar</Button></td>";
                  }
                }
                $content .= "</tr>";
                $id++;
              }
              $content .=	"</tbody>";
              $content .=	"</table>";
              $content .= "</div>";
              echo $content;
            ?>
            <?php
          }
        ?>
      </div>
      <hr>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){
    $("button").on("click", function (e){
      var name = $(this).attr('name');
      var id = $(this).attr('id');

      var request;

      if(request)
      {
        request.abort();
      }
      request = $.ajax({
        url: "<?=base_url('Articulo/borrar')?>",
        type: "POST",
        data: "postname=" + name + "&id=" + id
      });

      request.done(function (response, textStatus, jqXHR){
        console.log("Response: " + response);
        $("#tr" + response).html("");
      });

      request.fail(function(jqXHR,textStatus, thrown){
        console.log("Error:" + textStatus);
      });

      request.always(function(){
        console.log("termino");
      });

      e.preventDefault();
    });
  });

</script>
