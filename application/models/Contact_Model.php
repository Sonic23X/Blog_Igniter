<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Model extends CI_Model{

  public function insert($comentario = null)
  {
    if($comentario != null)
    {
      if(!$this->session->userdata('login'))
      {
        $duenio = 1;
      }
      else
      {
        $duenio = $this->session->userdata('id');
      }
      $tipo = $comentario['seleccionado'];
      $contenido = $comentario['contenido'];

      $SQL = "INSERT INTO contact (id_user,tipo,contenido) VALUES ('$duenio','$tipo','$contenido');";

      if($this->db->query($SQL))
      {
        return true;
      }
    }
    return false;
  }

}
