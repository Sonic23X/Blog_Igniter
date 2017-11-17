<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario extends CI_Controller{

  public function nuevo()
  {
    if(!$this->session->userdata('login'))
    {
      header("Location: ". base_url());
    }

    $this->load->model('Coment');

    $data = $this->input->post();
    $year = $data['year'];
    $name = $data['name'];
    $bool = $this->Coment->nuevo($data);

    if($bool)
    {
      header("Location: ".base_url('Articulo/post')."/". $year . "/" . $name);
    }

  }

}
