<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

  public function Index()
  {
    $data = array('title' => 'Tu opinión nos interesa!', 'mensaje' => "Rellena el siguiente formulario por favor", 'img' => 'cloud.png');

    $this->load->view("temp/head", $data);
    $this->load->view("temp/nav", $data);
    $this->load->view("temp/header", $data);
    $this->load->view("temp/contact", $data);
    $this->load->view("temp/footer");
  }

  public function insert()
  {
    $this->load->model('Contact_Model');
    $com = $this->input->post();
    $bool = $this->Contact_Model->insert($com);

    if($bool)
    {
      header("Location: ".base_url());
    }

  }

}

?>
