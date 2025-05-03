<?php

	// function para el GET
	function getPreguntas(){
		global $conn;
		
		// query para la db 
		$sql = "SELECT * from pregunta_frecuente";
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
	function addPreguntas(){
		global $conn;
		
		//obtener los datos enviados json
		$data = json_decode(file_get_contents("php://input"), true);
		$id = $data['id'] ?? '';
		$pregunta = $data['pregunta'] ?? '';
		$respuesta = $data['respuesta'] ?? '';
		$activo = $data['activo'] ?? 0;
		
		//query para la db
		$sql = "INSERT INTO pregunta_frecuente VALUES ('$id', '$pregunta', '$respuesta', '$activo')"; 
		//codifica a json
		if (mysqli_query($conn, $sql)) {
			echo json_encode(['Status' => 'Success', 'Message' => 'Registro agregado correctamente']);
		} else {
			echo json_encode(['Status' => 'Error', 'Message' => 'Error al agregar el registro']);
		}	
	}
	
	// function para el PUT
	function updatePreguntas(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		$pregunta = $data['pregunta'] ?? '';
		$respuesta = $data['respuesta'] ?? '';
		$activo = $data['activo'] ?? 0;

		//query para la db
		$sql = "UPDATE pregunta_frecuente SET pregunta='$pregunta', respuesta='$respuesta', activo='$activo' WHERE id=$id";
		//codifica a json
		if (mysqli_query($conn, $sql)) {
			echo json_encode(['Status' => 'Success', 'Message' => 'Registro actualizado correctamente']);
		} else {
			echo json_encode(['Status' => 'Error', 'Message' => 'Error al actualizar el registro']);
		}	
		
	}
	
	// function para el PATCH
	function patchPreguntas(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		$updates = [];
		if (isset($data['pregunta'])) {
			$updates[] = "pregunta='" . $data['pregunta'] . "'";
		}
		if (isset($data['respuesta'])) {
			$updates[] = "respuesta='" . $data['respuesta'] . "'";
		}
		if (isset($data['activo'])) {
			$updates[] = "activo=" . $data['activo'];
		}
		if (count($updates) > 0) {
		//query para la db
		$sql = "UPDATE pregunta_frecuente SET  " . implode(", ", $updates) . " WHERE id=$id";
		//codifica a json
			if (mysqli_query($conn, $sql)) {
				echo json_encode(['Status' => 'Success', 'Message' => 'Registro actualizado correctamente']);
			} else {
				echo json_encode(['Status' => 'Error', 'Message' => 'Error al actualizar el registro']);
			}
		}
	}
	
	// function para el DELETE
	function deletePreguntas(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		//query para la db
		$sql = "DELETE FROM pregunta_frecuente WHERE id=$id";
		//codifica a json
		if (mysqli_query($conn, $sql)) {
				echo json_encode(['Status' => 'Success', 'Message' => 'Registro borrado correctamente']);
			} else {
				echo json_encode(['Status' => 'Error', 'Message' => 'Error al borrar el registro']);
			}
		
	}


?>