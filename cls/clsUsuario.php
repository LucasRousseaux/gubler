<?php

class Usuario {

  const MIN_NUMBER = 1;
	const MIN_USER = 5;
	const MIN_PASS = 8;

  private $nombre;
  private $email;
  private $password;
  private $imagen;
  private $db;

  public function __construct ($db){

    $this->db= $db;

  }

  public function existeUsuario($e) {

  		$sql = "SELECT count(id) FROM usuarios WHERE email = '".$e."'";
  		$result = $this->db->query($sql);
  		return $result->fetchColumn();

  }


  public function registrarUsuario ($arr) {

    $sql = "INSERT INTO usuarios (nombre, email, password, imagen) VALUES ('".$arr['nombre']."','".$arr['email']."','".sha1($arr['password'])."','".$arr['imagen']."')";
		$this->db->query($sql);
		return $this->db->lastInsertId();

  }

  public function lastIdUsuario() {

    $sql= 'Select count(id) from usuarios';
    $result = $this->db->query($sql);
    return $result + 1;


  }



	public function validarEmail($e) {

		if (filter_var($e, FILTER_VALIDATE_EMAIL)) {
			return TRUE;
		}

		return FALSE;

	}

	public function validarPassword($p) {

		if(strlen($p) < $this->MIN_PASS) {
			return false;
		}

		$arr = str_split($p,1);
		$numero = 0;
		for($i=0;$i<count($arr);$i++) {
			if( is_numeric($arr[$i]) ) {
				$numero++;
			}
		}

		if($numero > $this->MIN_NUMBER) {
			return true;
		}

		return false;
	}

	public function validarUsuario($u) {

		if(strlen($u) > $this->MIN_USER) {
			return true;
		}

		return false;
	}


// Geters y Seters


    public function getIdUsuario() {
      return $this->id;

    }


}

/// ComienzaPrueba

const SCHEMA_NAME = 'gubler';

try {

		$dsn = 'mysql:host=localhost;dbname='.SCHEMA_NAME.';charset=utf8mb4;port:3306';
		$db_user = 'root';
		$db_pass = '';

		$db = new PDO($dsn, $db_user, $db_pass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$usuario = new Usuario($db);
    echo "<pre>";
    var_dump($usuario);

    $arrPrueba = [
      'nombre' => 'Lucas',
      'email' => 'lucas@gmail.com',
      'password' => sha1('Lucas123'),
      'imagen' => 'doctor.jpg'
    ];


    if ($usuario->existeUsuario('belen@gmail.com') == 0) {

    			$idusuario = $usuario->registrarUsuario($arrPrueba);

    			echo "<pre>";
    			echo "Registro insertado con id: " . $idusuario;

    		} else {

    			echo "<pre>";
    			echo "ERROR: Email existente ";

      }

  }
  catch(PDOException  $e ){
  		echo "Error: ".$e;
  }

// Fin Prueba


class Perfil extends Usuario {
  private $id_usuario;
  private $sexo;
  private $fecha_de_nacimiento;
  private $numero_de_telefono;
  private $idioma;
  private $lugar_donde_vive;

  public function __construct ($id_usuario,$sexo,$fecha_de_nacimiento,$numero_de_telefono,$idioma,$lugar_donde_vive) {

    $this->id_usuario = parent::getIdUsuario();
    $this->sexo = $sexo;
    $this->fecha_de_nacimiento = $fecha_de_nacimiento;
    $this->numero_de_telefono = $numero_de_telefono;
    $this->idioma = $idioma;
    $this->lugar_donde_vive = $lugar_donde_vive;


  }


}

 ?>
