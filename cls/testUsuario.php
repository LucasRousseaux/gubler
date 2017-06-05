<?php

require "clsUsuario.php";

/// ComienzaPrueba Creacion Usuario

try {

		$dsn = 'mysql:host=localhost;dbname='.\Gubler\Constante::SCHEMA_NAME.';charset=utf8mb4;port:3306';
		$db_user = 'root';
		$db_pass = '';

		$db = new \PDO($dsn, $db_user, $db_pass);
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$usuario = new \Gubler\Usr\Usuario($db);



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


      $perfil = new \Gubler\Usr\Perfil($db, $idusuario);


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


 ?>
