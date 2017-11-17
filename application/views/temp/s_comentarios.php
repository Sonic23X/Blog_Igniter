
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style = "border-radius: 10px; border-style: solid; border-color: #2a72c7;">
          <?php
            if($this->session->userdata('login'))
            {
              echo form_open('Comentario/nuevo');
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
              <p> Necesitas <a href = "">Iniciar Sesion</a> para poder comentar este post </p>
              <hr>
              <?php
            }
          ?>
          <h1 style = "text-aling: center;">No hay comentarios actualmente </h1>
        </div>
    </div>
</div>
