<?php

class Post extends CI_Model
{

  public function getPost()
  {
    $duenio = $this->session->userdata('id');
    $result = $this->db->query("SELECT * FROM post WHERE id_user = '" . $duenio . "'");
    return $result;
  }

  public function getPostAdmin()
  {
    $result = $this->db->query("SELECT * FROM post");
    return $result;
  }

  public function getPostByName($id = '')
  {
    $result = $this->db->query("SELECT * FROM post WHERE id = '" . $id . "' LIMIT 1");
    return $result->row();
  }

  public function getPostByYearName($year = '',$name = '')
  {
    $result = $this->db->query("SELECT * FROM post WHERE year(fecha) = '$year' AND post LIKE '$name'");
    return $result->row();
  }

  public function insert($post = null)
  {
    $duenio = $this->session->userdata('id');
    if($post != null)
    {
      $nombre = $post['nombre'];
      $descripcion = $post['descripcion'];
      $contenido = $post['contenido'];
      $file_name = $post['file_name'];
      $framework = $post['seleccionado'];

      $SQL = "INSERT INTO post (post,descripcion,contenido,img,fecha,framework,id_user) VALUES ('$nombre','$descripcion','$contenido','$file_name',curdate(),'$framework','$duenio');";

      if($this->db->query($SQL))
      {
        return TRUE;
      }
    }
    return FALSE;
  }

  public function num_post()
  {
      $numero = $this->db->query("SELECT count(*) as numero FROM post")->row()->numero;
      return intval($numero);
  }

  public function getPaginacion($numero_por_pagina)
  {
    return $this->db->get("post",$numero_por_pagina,$this->uri->segment(3));
  }

  public function upgrade($post = null)
  {
    if($post != null)
    {
      $this->db->where('id', $post['id']);
      if($this->db->update('post', $post))
      {
        return true;
      }
    }
    return false;
  }

  public function delete($postname = null)
  {
    if($postname != null)
    {
      $SQL = "DELETE FROM post WHERE post = '$postname'";

      if($this->db->query($SQL))
      {
        return true;
      }
    }
    return false;
  }
}
