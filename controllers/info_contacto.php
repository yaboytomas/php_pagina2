<?php

	// function para el GET
	function getInfo(){
		global $conn;
		
		// query para la db 
		$sql = "SELECT * from info_contacto";
		// guarda la query en
		$result = mysqli_query($conn, $sql);
		// la asociacion 
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			//lo pasa a filas
			$rows[] = $row;
		};
		// codifica a json mostrando..
		echo json_encode(["Status" => "Success", "Data" => $rows]);
	}
	
	// function para el POST
	function addInfo(){
		global $conn;
		
		//obtener los datos enviados json
		$data = json_decode(file_get_contents("php://input"), true);
		$id = $data['id'] ?? '';
		$nombre = $data['nombre'] ?? '';
		$icono = $data['icono'] ?? '';
		$texto = $data['texto'] ?? '';
		$textoAdicional = $data['texto_adicional'] ?? '';
		$activo = $data['activo'] ?? 0;
		
		//query para la db - especificar columnas para evitar errores de conteo
		$sql = "INSERT INTO info_contacto (id, nombre, icono, texto, texto_adicional, activo) 
				VALUES ('$id', '$nombre', '$icono', '$texto', '$textoAdicional', '$activo')"; 
		//codifica a json
		if (mysqli_query($conn, $sql)) {
			echo json_encode(['Status' => 'Success', 'Message' => 'Registro agregado correctamente']);
		} else {
			echo json_encode(['Status' => 'Error', 'Message' => 'Error al agregar el registro']);
		}	
	}
	
	// function para el PUT
	function updateInfo(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		$nombre = $data['nombre'] ?? '';
		$icono = $data['icono'] ?? '';
		$texto = $data['texto'] ?? '';
		$texto_adicional = $data['texto_adicional'] ?? '';
		$activo = $data['activo'] ?? 0;

		//query para la db
		$sql = "UPDATE info_contacto SET nombre = '$nombre', icono = '$icono', texto = '$texto', texto_adicional = '$texto_adicional', activo = '$activo' WHERE id = '$id'";
		//codifica a json
		if (mysqli_query($conn, $sql)) {
			echo json_encode(['Status' => 'Success', 'Message' => 'Registro actualizado correctamente']);
		} else {
			echo json_encode(['Status' => 'Error', 'Message' => 'Error al actualizar el registro']);
		}	
		
	}
	
	// function para el PATCH
	function patchInfo(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		$updates = [];
		if (isset($data['nombre'])) {
			$updates[] = "nombre='" . $data['nombre'] . "'";
		}
		if (isset($data['icono'])) {
			$updates[] = "icono='" . $data['icono'] . "'";
		}
		if (isset($data['texto'])) {
			$updates[] = "texto='" . $data['texto'] . "'";
		}
		if (isset($data['texto_adicional'])) {
			$updates[] = "texto_adicional='" . $data['texto_adicional'] . "'";
		}
		if (isset($data['activo'])) {
			$updates[] = "activo=" . $data['activo'];
		}
		if (count($updates) > 0) {
		//query para la db
		$sql = "UPDATE info_contacto SET  " . implode(", ", $updates) . " WHERE id=$id";
		//codifica a json
			if (mysqli_query($conn, $sql)) {
				echo json_encode(['Status' => 'Success', 'Message' => 'Registro actualizado correctamente']);
			} else {
				echo json_encode(['Status' => 'Error', 'Message' => 'Error al actualizar el registro']);
			}
		}
	}
	
	// function para el DELETE
	function deleteInfo(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		//query para la db
		$sql = "DELETE FROM info_contacto WHERE id=$id";
		//codifica a json
		if (mysqli_query($conn, $sql)) {
				echo json_encode(['Status' => 'Success', 'Message' => 'Registro borrado correctamente']);
			} else {
				echo json_encode(['Status' => 'Error', 'Message' => 'Error al borrar el registro']);
			}
		
	}


?>