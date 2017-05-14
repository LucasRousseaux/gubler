<?php

function esUnaImagen($ext) {
	$ext = strtolower($ext);
	if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif') {
		return TRUE;
	}
	return FALSE;
}

function tienePesoValido($size) {

	$pesoMaximo = 9000000;
	// 90 KB

	if ($size > $pesoMaximo) {
		return FALSE;
	}
	return TRUE;
}


function validarUsuario($miUsuario) {
		$errores = [];
		$ext = pathinfo($_FILES['imgPerfil']['name'], PATHINFO_EXTENSION);

		if (trim($miUsuario["nombre"]) == "")
		{
			$errores[] = "Falta el nombre";
		}
		if (trim($miUsuario["pass"]) == "")
		{
			$errores[] = "Falta la pass";
		}
		if (trim($miUsuario["cpass"]) == "")
		{
			$errores[] = "Falta el cpass";
		}
		if ($miUsuario["pass"] != $miUsuario["cpass"])
		{
			$errores[] = "Pass y Cpass son distintas";
		}
		if ($miUsuario["email"] == "")
		{
			$errores[] = "Falta el mail";
		}
		if (!filter_var($miUsuario["email"], FILTER_VALIDATE_EMAIL))
		{
			$errores[] = "El mail tiene forma fea";
		}
		if (existeElMail($miUsuario["email"]))
		{
			$errores[] = "Usuario ya registrado";
		}
		if (empty($_FILES["imgPerfil"])) {
			$errores[] = "Falta cargar una imagen de perfil";
		}
		if (!esUnaImagen($ext)) {
			$errores[] = "El formato de imagen deber ser jpg, png o gif";
		}
		if (!tienePesoValido($_FILES["imgPerfil"]["size"])) {
			$errores[] = "La imagen es muy pesada";
		}
		return $errores;
}

function existeElMail($mail) 	{

		$usuarios = file_get_contents("./json/usuarios.json");
		$usuariosArray = explode(PHP_EOL, $usuarios);
		array_pop($usuariosArray);

		foreach ($usuariosArray as $key => $usuario) {
			$usuarioArray = json_decode($usuario, true);

			if ($mail == $usuarioArray["email"])
			{
				return true;
			}
		}

		return false;
}

function crearUsuario($miUsuario) 	{
		$usuario = [
			"nombre" => $miUsuario["nombre"],
			"email" => $miUsuario["email"],
			"password" => $miUsuario["pass"],
			"imgPerfil" => $_FILES['imgPerfil']['name'],
			"id" => traerNuevoId()
		];
		return $usuario;
}

function guardarUsuario($miUsuario) {

		$usuarioJSON = json_encode($miUsuario);
		file_put_contents("./json/usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
}

function actualizarPerfil($miPerfil,$idUsuario) {

		$perfilesArray = explode(PHP_EOL, file_get_contents("./json/perfiles.json"));
		array_pop($perfilesArray);
		$primeraVez = true;

		foreach ($perfilesArray as $key => $value) {

			$perfilArray = json_decode($value, true);

			if ($idUsuario == $perfilArray["id_usuario"])
			{
				$perfilArray["sexo"] = $miPerfil["sexo"];
				$perfilArray["fecha_de_nacimiento"] = $miPerfil["fecha_de_nacimiento"];
				$perfilArray["numero_de_telefono"] = $miPerfil["numero_de_telefono"];
				$perfilArray["idioma"] = $miPerfil["idioma"];
				$perfilArray["lugar_donde_vive"] = $miPerfil["lugar_donde_vive"];
			}

			$perfilJSON = json_encode($perfilArray);
			if ($primeraVez){
				file_put_contents("./json/perfiles.json", $perfilJSON . PHP_EOL);
			} else {
				file_put_contents("./json/perfiles.json", $perfilJSON . PHP_EOL, FILE_APPEND);
			}

			$primeraVez = false;

		}

}

function agregarPerfil($miPerfil,$idUsuario) 	{

		$perfil = [
			"sexo" => $miPerfil["sexo"],
			"fecha_de_nacimiento" => $miPerfil["fecha_de_nacimiento"],
			"numero_de_telefono" => $miPerfil["numero_de_telefono"],
			"idioma" => $miPerfil["idioma"],
			"lugar_donde_vive" => $miPerfil["lugar_donde_vive"],
			"id_usuario" => $idUsuario
		];

		$perfilJSON = json_encode($perfil);
		file_put_contents("./json/perfiles.json", $perfilJSON . PHP_EOL, FILE_APPEND);

}

function buscarIdUsuario($mail) {

		$usuarios = file_get_contents("./json/usuarios.json");
		$usuariosArray = explode(PHP_EOL, $usuarios);
		array_pop($usuariosArray);

		foreach ($usuariosArray as $key => $usuario) {

			$usuarioArray = json_decode($usuario, true);

			if ($mail == $usuarioArray["email"])
			{
				return $usuarioArray["id"];
			}
		}

		return 0;
}

function buscarPerfil($idUsuario) {

		$perfilesJson = file_get_contents("./json/perfiles.json");
		$perfilesArray = explode(PHP_EOL, $perfilesJson);
		array_pop($perfilesArray);

		foreach ($perfilesArray as $key => $value) {

			$perfil = json_decode($value, true);

			if ($idUsuario == $perfil["id_usuario"])
			{
				return $perfil;
			}
		}

		return [];
}


function leerJson($miJson) {

		$usuarios = file_get_contents($miJson);
		$usuariosArray = explode(PHP_EOL, $usuarios);
		array_pop($usuariosArray);

		foreach ($usuariosArray as $key => $usuario) {
			$usuarioArray = json_decode($usuario, true);

		}

		return $usuariosArray;

}


function traerNuevoId() {

		$usuarios = file_get_contents("./json/usuarios.json");
		$usuariosArray = explode(PHP_EOL, $usuarios);
		array_pop($usuariosArray);

		if (count($usuarios) == 0) {
			return 1;
		}

		$ultimoUsuario = $usuariosArray[count($usuariosArray) - 1];
		$ultimoUsuarioArray = json_decode($ultimoUsuario, true);
		return $ultimoUsuarioArray["id"] + 1;
}

function enviarAFelicidad() {
		header("location:index.php");exit;
	}

function tituloPagina() {
		$estoy = dirname(__FILE__);

		$titulo = "Bienvenido";
		if ($estoy == "ofrece"){
			$titulo = "Ofrece tus servicios";
		}
		if ($estoy == "registro"){
			$titulo = "registrate";
		}
		if ($estoy == "sesion") {
			$titulo = "iniciá sesión";
		}
		if ($estoy == "ayuda"){
			$titulo = "preguntas frecuentes";
		}
		return $titulo;
}


?>
