<?php

abstract class Constante {

  const DATE_FORMAT = 'Y-m-d';
  const SCHEMA_NAME = 'gubler';
  const MIN_NUMBER = 1;
  const MIN_USER = 5;
  const MIN_PASS = 8;


}

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


  public function registrarUsuario ($arr) {

    $this->nombre = $arr['nombre'];
    $this->email = $arr['email'];
    $this->password = $arr['password'];
    $this->imagen = $arr['imagen'];

    $sql = "INSERT INTO usuarios (nombre, email, password, imagen) VALUES ('".$arr['nombre']."','".$arr['email']."','".sha1($arr['password'])."','".$arr['imagen']."')";
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

		if(strlen($p) < Constante::MIN_PASS) {
			return false;
		}

		$arr = str_split($p,1);
		$numero = 0;
		for($i=0;$i<count($arr);$i++) {
			if( is_numeric($arr[$i]) ) {
				$numero++;
			}
		}

		if($numero > Constante::MIN_NUMBER) {
			return true;
		}

		return false;
	}

	public function validarUsuario($u) {

		if(strlen($u) > Constante::MIN_USER) {
			return true;
		}

		return false;
	}

}

/// ComienzaPrueba Creacion Usuario

try {

		$dsn = 'mysql:host=localhost;dbname='.Constante::SCHEMA_NAME.';charset=utf8mb4;port:3306';
		$db_user = 'root';
		$db_pass = '';

		$db = new PDO($dsn, $db_user, $db_pass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$usuario = new Usuario($db);



    $arrPruebaUsuario = [
      'nombre' => 'Lucas',
      'email' => 'lucas@gmail.com',
      'password' => sha1('Lucas123'),
      'imagen' => 'doctor.jpg'
    ];

    $idusuario = $usuario->existeUsuario('belen@gmail.com');


    if (empty ($idusuario)) {

    			$idusuario = $usuario->registrarUsuario($arrPruebaUsuario);

    			echo "<pre>";
    			echo "Registro insertado con id: " . $idusuario;



    		} else {

    			echo "<pre>";
    			echo "ERROR: Email existente con id: ". $idusuario;

      }


      $perfil = new Perfil($db, $idusuario);


      $arrPruebaPerfil = [
        'sexo' => 'M',
        'fecha_de_nacimiento' => '1971-02-12',
        'numero_de_telefono' => '541152996264',
        'lugar_donde_vive'=> 'HSM L213',
        'idioma' => 'Español'
      ];


      if ($perfil->actualizarUsuario($arrPruebaPerfil) == TRUE ){

        echo "<pre>";
        echo "Perfil actualizado con id: " . $idusuario;

      }



  }
  catch(PDOException  $e ){
  		echo "Error: ".$e;
  }

// Fin Prueba


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
