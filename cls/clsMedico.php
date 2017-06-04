<?php

namespace Gubler\Med;

class Especialidad {

  private $nombre;
  private $padre;

  public function __construct ($db){

    $this->db= $db;

  }

  public function registrarEspecialidad($nombre,$id_especialidad) {

    $sql = "INSERT INTO especialidades (nombre,id_especialidad) VALUES ('".$nombre."',".$id_especialidad.")";
    echo "<pre>";
    print_r($sql);
		$this->db->query($sql);
    $this->id = $this->db->lastInsertId();

		return $this->id;

  }

  public function setEspecialidad ($nombre) {

    $this->nombre = $nombre;

  }

  public function setPadre (Especialidad $padre) {

    $this->padre = $padre;

  }



}

class Medico {

  private $nombre;
  private $experiencia;
  private $matricula;
  private $titulos;
  private $usuario;


  public function __construct ($db){

    $this->db= $db;

  }

  public function registrarMedico($nombre,$experiencia,$matricula,$titulos,$id_usuario) {

    $sql = "INSERT INTO medicos (nombre,experiencia,matricula,titulos,id_usuario) VALUES ('";
    $sql .= $nombre."','";
    $sql .= $experiencia."','";
    $sql .= $matricula."','";
    $sql .= $titulos."',";
    $sql .= $id_usuario.")";
    echo "<pre>";
    print_r($sql);


		$this->db->query($sql);
    $this->id = $this->db->lastInsertId();
		return $this->id;

  }

  public function setNombre ($nombre) {

    $this->nombre = $nombre;

  }

  public function setExperiencia ($experiencia) {

    $this->experiencia = $experiencia;

  }

  public function setMatricula ($matricula) {

    $this->matricula = $matricula;

  }

  public function setTitulos ($titulos) {

    $this->titulos = $titulos;

  }

  public function setUsuario (Usuario $usuario) {

    $this->usuario = $usuario;

  }

}

class Medico_Especialidad {

  private $medico;
  private $especialidad;

  public function __construct ($db){

    $this->db= $db;

  }

  public function registrarMedicoEspecialidad ($id_medico,$id_especialidad) {

    $sql = "INSERT INTO medico_especialidad (id_medico,id_especialidad) VALUES (".$id_medico.",".$id_especialidad.")";
    echo "<pre>";
    print_r($sql);

    $this->db->query($sql);
    $this->id = $this->db->lastInsertId();
    return $this->id;

  }



  public function setMedicoEspecialidad (Medico $medico, Especialidad $especialidad) {

    $this->medico = $medico;
    $this->especialidad = $especialidad;

  }


}


/// ComienzaPrueba Creacion Medico

const SCHEMA_NAME = 'gubler';



try {

    $dsn = 'mysql:host=localhost;dbname='.SCHEMA_NAME.';charset=utf8mb4;port:3306';
		$db_user = 'root';
		$db_pass = '';
		$db = new \PDO($dsn, $db_user, $db_pass);
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);


    $medico = new Medico($db);

    $arr = [
      'nombre' => 'Tomas V',
      'experiencia' => 'Medico pedriatra',
      'matricula' => '123456',
      'titulos' => 'UBA Pediatra',
      'id_usuario' => 9
    ];

		$id_medico = $medico->registrarMedico($arr['nombre'],$arr['experiencia'],$arr['matricula'],$arr['titulos'],$arr['id_usuario']);

		echo "<pre>";
		echo "Registro insertado con id: " . $id_medico;

    $especialidad = new Especialidad($db);

    $arr = [
      'nombre' => 'Clinico',
      'id_especialidad' => 0
    ];


    $id_especialidad = $especialidad->registrarEspecialidad($arr['nombre'],$arr['id_especialidad']);

    $arr = [
      'nombre' => 'Pediatra',
      'id_especialidad' => $id_especialidad
    ];


    $id_subespecialidad = $especialidad->registrarEspecialidad($arr['nombre'],$id_especialidad);

    echo "<pre>";
    echo "Perfil actualizado con id: " . $id_subespecialidad;


    $medico_especialidad = new Medico_Especialidad($db);

    $arr = [
      'id_medico' => $id_medico,
      'id_especialidad' => $id_especialidad
    ];

    $id = $medico_especialidad->registrarMedicoEspecialidad($arr['id_medico'],$arr['id_especialidad']);

    echo "<pre>";
    echo "Medico con id: ".$id_medico." Especialidad con id: ".$id_especialidad;


  }
  catch(PDOException  $e ){
  		echo "Error: ".$e;
  }

// Fin Prueba


 ?>
