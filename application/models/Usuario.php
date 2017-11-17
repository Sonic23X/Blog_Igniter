<?php

  class Usuario extends CI_Model
  {

    public function getUsuario($usuario = '')
    {
      $result = $this->db->query("SELECT * FROM user WHERE usuario = '". $usuario."' LIMIT 1");
      if($result->num_rows() > 0)
      {
          return $result->row();
      } else
      {
        return NULL;
      }
    }

    public function getUsuarioid($usuario = '')
    {
      $result = $this->db->query("SELECT usuario FROM user WHERE id = '". $usuario."' LIMIT 1");
      if($result->num_rows() > 0)
      {
          return $result->row();
      } else
      {
        return NULL;
      }
    }

    public function insert($usuario = null)
    {
      if($usuario != null)
      {
        $user = $usuario['usuario'];
        $email = $usuario['correo'];
        $pass = $usuario['contrasena'];
        $nombre = $usuario['nombre'];
        $apellido = $usuario['apellidoP'];
        $sexo = $usuario['sexo'];
        $ocupacion = $usuario['ocupacion'];
        $interes = $usuario['preferencias'];
        $imagen = $usuario['imagen'];

        $SQL = "INSERT INTO user (usuario,correo,contrasena,nombre,apellidoP,sexo,ocupacion,preferencias,imagen)
        VALUES ('$user','$email','$pass','$nombre','$apellido','$sexo','$ocupacion','$interes','$imagen');";

        if($this->db->query($SQL))
        {
          return TRUE;
        }
      }
      return FALSE;
    }

    public function Update($usuario = null)
    {
      if($usuario != null)
      {
        $id = $usuario['id'];
        $nombre = $usuario['nombre'];
        $apellido = $usuario['apellido'];
        $sexo = $usuario['sexo'];
        $ocupacion = $usuario['ocupacion'];
        $interes = $usuario['interes'];

        $SQL = "UPDATE user SET nombre = '$nombre', apellidoP = '$apellido', sexo = '$sexo', ocupacion = '$ocupacion',
                preferencias = '$interes' WHERE id = '$id';";

        if($this->db->query($SQL))
        {
          return TRUE;
        }
      }
      return FALSE;
    }
  }

?>
