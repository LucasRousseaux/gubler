<?php

require "clsMedico.php";

/// ComienzaPrueba Creacion Medico

const SCHEMA_NAME = 'gubler';



try {

    $dsn = 'mysql:host=localhost;dbname='.SCHEMA_NAME.';charset=utf8mb4;port:3306';
		$db_user = 'root';
		$db_pass = '';
		$db = new \PDO($dsn, $db_user, $db_pass);
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);


    $medico = new \Gubler\Med\Medico($db);

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

    $especialidad = new \Gubler\Med\Especialidad($db);

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


    $medico_especialidad = new \Gubler\Med\Medico_Especialidad($db);

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
