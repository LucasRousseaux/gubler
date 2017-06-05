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




 ?>
