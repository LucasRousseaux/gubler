<?php

namespace Gubler;


abstract class Constante {

  const SQL_ACCESS = 1;
  const SCHEMA_NAME = 'gubler';
  const DATE_FORMAT = 'Y-m-d';
  const MIN_NUMBER = 1;
  const MIN_USER = 5;
  const MIN_PASS = 8;


}

namespace Gubler\Usr;


class Usuario {

  private $nombre;
  private $email;
  private $password;
  private $imagen;
  protected $id;
  private $db;

  public function __construct ($db){

    $this->db= $db;

  }

  public function existeUsuario($e) {

  		$sql = "SELECT id FROM usuarios WHERE email = '".$e."'";
  		$result = $this->db->query($sql);
      $this->id = $result->fetchColumn();
      return $this->id;

  }

  public function logeo($arr){

    $sql = "SELECT nombre, email FROM usuarios WHERE email = '".$arr['email']."'and password = '".sha1($arr['password'])."'";
    $result = $this->db->query($sql);
    $usuario = $result->fetch(\PDO::FETCH_ASSOC);


    if(!empty($usuario)) {

      return $usuario;

    }

    return false;


  }

  public function registrarUsuario ($arr) {

    $this->nombre = $arr['nombre'];
    $this->email = $arr['email'];
    $this->password = $arr['password'];
    $this->imagen = $arr['imagen'];

    $sql = "INSERT INTO usuarios (nombre, email, password, imagen) VALUES ('".$arr['nombre']."','".$arr['email']."','".$arr['password']."','".$arr['imagen']."')";
		$this->db->query($sql);
    $this->id = $this->db->lastInsertId();

		return $this->id;

  }

	public function validarEmail($e) {

		if (filter_var($e, FILTER_VALIDATE_EMAIL)) {
			return TRUE;
		}

		return FALSE;

	}

	public function validarPassword($p) {

		if(strlen($p) < \Gubler\Constante::MIN_PASS) {
			return false;
		}

		$arr = str_split($p,1);
		$numero = 0;
		for($i=0;$i<count($arr);$i++) {
			if( is_numeric($arr[$i]) ) {
				$numero++;
			}
		}

		if($numero > \Gubler\Constante::MIN_NUMBER) {
			return true;
		}

		return false;
	}

	public function validarUsuario($u) {

		if(strlen($u) > \Gubler\Constante::MIN_USER) {
			return true;
		}

		return false;
	}

  public function getNombre() {

    return $this->nombre;

  }

  public function getEmail() {

    return $this->email;

  }

}


class Perfil extends Usuario {

  private $sexo;
  private $fecha_de_nacimiento;
  private $numero_de_telefono;
  private $idioma;
  private $lugar_donde_vive;

  public function  __construct($db,$id) {

    $this->db = $db;
    $this->id = $id;

  }


  public function actualizarUsuario($arr) {

		$sql =  "UPDATE usuarios SET ";
    $sql .= " sexo =  '".$arr['sexo']."',";
    $sql .= " fecha_de_nacimiento = '".$arr['fecha_de_nacimiento']."',";
    $sql .= " numero_de_telefono =  '".$arr['numero_de_telefono']."',";
    $sql .= " lugar_donde_vive =  '".$arr['lugar_donde_vive']."',";
    $sql .= " idioma =  '".$arr['idioma']."'";
    $sql .= " WHERE id = ".$this->id;

    $result = $this->db->query($sql);
		return $result;


	}


}



 ?>
