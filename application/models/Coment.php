<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coment extends CI_Model{

  public function nuevo($coment = null)
  {
    if($coment != null)
    {
      $duenio = $this->session->userdata('id');
      $id_post = $coment['id'];
      $comentario = $coment['contenido'];

      $SQL = "INSERT INTO comentario(id_post,id_user,comentario,fecha) VALUES ('$id_post','$duenio','$comentario',curdate())";

      if($this->db->query($SQL))
      {
        return TRUE;
      }
    }
    return false;
  }

  public function getComentarios($id = null)
  {
    if($id != null)
    {
      $result = $this->db->query("SELECT * FROM comentario WHERE id_post = '" . $id . "'");
      return $result;
    }
  }

  public function borrar($id = null)
  {
    if($id != null){
      $SQL = "DELETE FROM comentario WHERE id_post = '" .$id . "'";

      if($this->db->query($SQL))
      {
        return true;
      }
    }
    return false;
  }

}
