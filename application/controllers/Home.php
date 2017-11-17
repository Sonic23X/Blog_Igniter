<?php

class Home extends CI_Controller
{

  public function Index()
  {
    header("Location: " . base_url('Home/vistas/'));
  }

  public function Vistas ()
  {

    $this->load->model('Usuario');

    if(!$this->session->userdata('login'))
    {
      $data = array('title' => 'PHP ENTERPRISE', 'mensaje' => "¡Bienvenido!", 'img' => 'home-bg.jpg');
    }
    else
    {
      $user = $this->session->userdata('usuario');
      $data = array('title' => 'PHP ENTERPRISE', 'mensaje' => "¡Bienvenido ".$user."!", 'img' => 'home-bg.jpg');
    }
    $this->load->view("temp/head", $data);
    $this->load->view("temp/nav", $data);
    $this->load->view("temp/header", $data);

    $this->load->library('pagination');

    $config['base_url'] = base_url() . 'Home/vistas/';
    $config['total_rows'] = $this->Post->num_post();
    $config['per_page'] = 5;
    $config['uri_segment'] = 3;
    $config['num_links'] = 5;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $this->pagination->initialize($config);

    $result = $this->Post->getPaginacion($config['per_page']);

    $data['consulta'] = $result;
    $data['pagination'] = $this->pagination->create_links();

    $this->load->view("temp/cuerpo", $data);

    $this->load->view("temp/footer");

  }

  public function Iniciar()
  {

    if($this->session->userdata('login'))
    {
      header("Location: ". base_url());
    }

    $data = array('title' => 'PHP ENTERPRISE', 'mensaje' => "", 'img' => 'home-bg.jpg');

    $this->load->view("temp/head", $data);
    $this->load->view("temp/nav", $data);
    $this->load->view("temp/header", $data);
    $this->load->view("user/login_view", $data);
    $this->load->view("temp/footer");
  }

  public function registrar()
  {

    if($this->session->userdata('login'))
    {
      header("Location: ". base_url());
    }

    $data = array('title' => 'PHP ENTERPRISE', 'mensaje' => "¡Registrate para poder compartir tus conocimientos!", 'img' => 'home-bg.jpg');

    $this->load->view("temp/head", $data);
    $this->load->view("temp/nav", $data);
    $this->load->view("temp/header", $data);
    $this->load->view("user/registrar", $data);
    $this->load->view("temp/footer");
  }
}
