<?php

  class Login extends CI_Controller
  {

    public function Index()
    {

      $usuario = $this->input->post('user');
      $contraseña = $this->input->post('password');

      $this->load->library('encrypt');
      $this->load->model('Usuario');

      $fila = $this->Usuario->getUsuario($usuario);

      if($fila != NULL)
      {
        $pass = $fila->contrasena;
        $contra = $this->encrypt->decode($pass);
        if($contra == $contraseña)
        {
          $data = array(
            'usuario' => $usuario,
            'id' => $fila->id,
            'login' => true
          );
          $this->session->set_userdata($data);
          header("Location: ".base_url());
        }
        else {
          header("Location: ".base_url('Home/Iniciar'));
        }
      }
      else {
          header("Location: ".base_url('Home/Iniciar'));
      }
    }

    public function logout()
    {
      $this->session->sess_destroy();
      header("Location: ".base_url());
    }

    public function alta()
    {
      $this->load->model('Usuario');
      $this->load->library('encrypt');

      $usuario = $this->input->post('user');
      $password = $this->input->post('pass');
      $rpassword = $this->input->post('rpass');
      $correo = $this->input->post('email');
      $nombre = $this->input->post('user_name');
      $apellido = $this->input->post('user_last');
      $sexo = $this->input->post('genero');
      $ocupacion = $this->input->post('sele_oc');
      $interes = $this->input->post('sele_in');
      $imagen = 'perfil.jpg';

      if($password == $rpassword)
      {
        $data['usuario'] = $usuario;
        $data['correo'] = $correo;
        $data['contrasena'] = $this->encrypt->encode($password);
        $data['nombre'] = $nombre;
        $data['apellidoP'] = $apellido;
        $data['sexo'] = $sexo;
        $data['ocupacion'] = $ocupacion;
        $data['preferencias'] = $interes;
        $data['imagen'] = $imagen;

        $bool = $this->Usuario->insert($data);

        if($bool)
        {
          header("Location: ". base_url());
        } else
        {
          ?>
          <script>
            alert("Intente de nuevo");
          </script>
          <?php
        }
      }else
      {
        ?>
        <script>
          alert("Las contraseñas no son iguales, Intente de nuevo");
        </script>
        <?php
      }
    }
  }

?>
