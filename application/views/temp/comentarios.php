<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style = "border-radius: 10px; border-style: solid; border-color: #2a72c7;">
          <?php
            if($this->session->userdata('login'))
            {
              echo form_open('Comentario/nuevo');
              $partes = array ('style' => 'display: none','value' => $id);
              echo form_input_text('id', '', $partes);
              $partes = array ('style' => 'display: none','value' => $anio);
              echo form_input_text('year', '', $partes);
              $partes = array ('style' => 'display: none','value' => $name);
              echo form_input_text('name', '', $partes);
              $partes = array ('placeholder' => 'Escribe tu comentario');
              echo form_input_textarea('contenido', '', $partes);
              ?>
              <input type="submit" class = "form-control btn-default">
              <br>
              <hr>
              <?php
                echo form_close();
            } else
            {
              ?>
              <p> Necesitas <a href = "<?= base_url('Home/Iniciar')?>" style = "text-decoration: none;">Iniciar Sesión</a> para poder comentar este post </p>
              <hr>
              <?php
            }
          ?>
          <h1 style = "text-aling: center;">Comentarios</h1>
          <hr>
          <?php foreach ($consulta->result() as $dato): ?>
            <div class="post-preview" style = "border-radius: 10px; border-style: solid; border-color: #040404; text-indent: 0.2 cm;">
              <section id = "dueno">
                <p class="post-meta" style="font-style: italic">
                  <?php
                    $id = $dato->id_user;
                    $usuario = $this->Usuario->getUsuarioid($id);
                    $nombre = $usuario->usuario;
                    echo $nombre;
                  ?>:   </p>
                <?= $dato->comentario ?>
              </section>
              <br>
            </div>
            <hr>
          <?php endforeach; ?>
        </div>
    </div>
</div>
