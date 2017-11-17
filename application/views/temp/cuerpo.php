<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <?php foreach ($consulta->result() as $fila )
                {
              ?>
                  <div class="post-preview">
                    <?php
                      $date = DateTime::createFromFormat("Y-m-d", $fila->fecha);
                      $year = $date->format("Y");
                      $name = str_replace(" ", "_", $fila->post);
                    ?>
                      <a href="<?= base_url()?>Articulo/post/<?= $year?>/<?= $name?>">
                          <h2 class="post-title">
                              <?= $fila->post ?>
                          </h2>
                          <h3 class="post-subtitle">
                              <?= $fila->descripcion ?>
                          </h3>
                      </a>
                      <p class="post-meta">Posteado por
                        <?php
                          $id = $fila->id_user;
                          $usuario = $this->Usuario->getUsuarioid($id);
                          $nombre = $usuario->usuario;
                          echo $nombre;
                       ?> en <?= $fila->fecha ?> | <?=$fila->framework?></p>
                  </div>
                  <hr>
              <?php
                }
              ?>

                <?= $pagination?>

            </div>
        </div>
    </div>

    <hr>
