<?php

  class Perfil extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      if(!$this->session->userdata('login'))
      {
        header("Location: ". base_url());
      }
    }

    public function Index()
    {
      $this->load->model('Usuario');

      $data = array('title' => 'Perfil', 'mensaje' => 'Administra tus post!', 'img' => 'home-bg.jpg');

      $this->load->view("temp/head", $data);
      $this->load->view("temp/nav", $data);
      $this->load->view("temp/header");
      $dueno = $this->session->userdata('usuario');
      if($dueno == 'admin')
      {
        $data['post'] = $this->Post->getPostAdmin();
        $this->load->view("user/admin", $data);
      } else
      {
        $data['post'] = $this->Post->getPost();
        $info = $this->Usuario->getUsuario($dueno);
        $this->load->view("user/datos_usuario",$info);
        $this->load->view("user/cuerpo", $data);
      }
      $this->load->view("temp/footer");
    }

    public function Actualizar()
    {
      $this->load->model('Usuario');

      $data = array('title' => 'Informacion Personal',
       'mensaje' => 'Recuerda que la informacion tiene que ser real', 'img' => 'home-bg.jpg');

      $this->load->view("temp/head", $data);
      $this->load->view("temp/nav", $data);
      $this->load->view("temp/header");
      $dueno = $this->session->userdata('usuario');
      $info = $this->Usuario->getUsuario($dueno);
      $this->load->view("user/actualizar",$info);
      $this->load->view("temp/footer");
    }

    public function Subir()
    {
      $this->load->model('Usuario');
      $dueno = $this->session->userdata('usuario');

      $fila = $this->Usuario->getUsuario($dueno);

      $id = $fila->id;
      $nombre = $this->input->post('name');
      $apellido = $this->input->post('last');
      $sexo = $this->input->post('genero');
      $ocupacion = $this->input->post('sele_oc');
      $interes = $this->input->post('sele_in');

      $data['id'] = $id;
      $data['nombre'] = $nombre;
      $data['apellido'] = $apellido;
      $data['sexo'] = $sexo;
      $data['ocupacion'] = $ocupacion;
      $data['interes'] = $interes;

      $hecho = $this->Usuario->Update($data);

      if($hecho)
      {
        header("Location: ". base_url('Perfil'));
      } else
      {
        ?>
        <script>
          alert("Intente de nuevo");
        </script>
        <?php
      }

    }

    public function Imagen()
    {
      $this->load->model('File');
      $file_name = $this->File->UploadImage('./recursos/img/','No se pudo subir la imagen.');
      if($file_name == null)
      {
        echo false;
        return;
      }
      $user = $this->input->post();
      $this->db->where('id',$user['id']);
      $data['imagen'] = $file_name;
      $bool = $this->db->update('user', $data);
      if($bool)
      {
        echo base_url('recursos/img') . '/' . $file_name;
      } else
      {
        echo false;
      }

    }

  }

?>
