<?php

class Articulo extends CI_Controller
{

  public function post($year, $name)
  {
    $this->load->model('Usuario');

    $fila = $this->Post->getPostByYearName($year, $name);

    if($fila == null)
    {
      return;
    }

    try
    {
      $imagen = "";
      if($fila->img == '')
      {
        $imagen = 'home-bg.jpg';
      } else
      {
        $imagen = $fila->img;
      }

      $data = array('title' => $fila->post, 'mensaje' => $fila->descripcion, 'img' => $imagen, 'id' => $fila->id);

      $this->load->view("temp/head", $data);
      $this->load->view("temp/nav", $data);
      $this->load->view("temp/header", $data);

      $data = array('contenido' => $fila->contenido);

      $this->load->view("temp/post",$data);

      $this->load->model('Coment');

      $con = $this->Coment->getComentarios($fila->id);
      if ($con != null)
      {
        $data = array('id' => $fila->id, 'consulta' => $con, 'anio' => $year, 'name' => $name);
        $this->load->view("temp/comentarios",$data);
      }
      else
      {
        $this->load->view("temp/s_comentarios");
      }

      $this->load->view("temp/footer");
    } catch (Exception $e) {

    }
  }

  public function nuevo()
  {
    if(!$this->session->userdata('login'))
    {
      header("Location: ". base_url());
    }

    $this->load->helper("richtext");

    $data = array('title' => 'Crear nuevo Post', 'mensaje' => '', 'img' => 'home-bg.jpg');

    $this->load->view("temp/head", $data);
    $this->load->view("temp/nav", $data);
    $this->load->view("temp/header");
    $this->load->helper('bootstrap');
    $this->load->view("post/nuevo");

    $this->load->view("temp/footer");
  }

  public function insert()
  {
    if(!$this->session->userdata('login'))
    {
      header("Location: ". base_url());
    }

    $this->load->model('File');
    $post = $this->input->post();
    $file_name = $this->File->UploadImage('./recursos/img/','No se pudo subir la imagen.');
    $post['file_name'] = $file_name;
    $bool = $this->Post->insert($post);

    if($bool)
    {
      header("Location: ".base_url()."Perfil");
    } else
    {
      header("Location: ".base_url());
    }

  }

  public function modificar($year, $name)
  {
    $this->load->helper("richtext");

    $fila = $this->Post->getPostByYearName($year, $name);

    if($fila == null)
    {
      return;
    }

    try
    {
      $imagen = "";
      if($fila->img == '')
      {
        $imagen = 'home-bg.jpg';
      } else
      {
        $imagen = $fila->img;
      }

      $data = array('title' => $fila->post, 'mensaje' => $fila->descripcion, 'img' => $imagen);

      $this->load->view("temp/head", $data);
      $this->load->view("temp/nav", $data);

      $data['row'] = $fila;

      $this->load->view("post/modificar",$data);

      $this->load->view("temp/footer");
    } catch (Exception $e) {

    }
  }

  public function update()
  {
    $post = $this->input->post();
    $bool = $this->Post->upgrade($post);
    if($bool)
    {
      header("Location: " . base_url('Perfil'));
    } else
    {
      echo "error";
    }
  }

  public function updateImage()
  {
    $this->load->model('File');
    $file_name = $this->File->UploadImage('./recursos/img/','No se pudo subir la imagen.');
    if($file_name == null)
    {
      echo false;
      return;
    }
    $post = $this->input->post();
    $this->db->where('id',$post['id']);
    $data['img'] = $file_name;
    $bool = $this->db->update('post', $data);
    if($bool)
    {
      echo base_url('recursos/img') . '/' . $file_name;
    } else
    {
      echo false;
    }
  }

  public function borrar()
  {
    $this->load->model('Coment');

    $post = $this->input->post();
    $postname = $post['postname'];
    $id = $post['id'];

    $bool2 = $this->Coment->borrar($id);
    $bool = $this->Post->delete($postname);

    if($bool && $bool2)
    {
      echo $id;
    }

  }

}
