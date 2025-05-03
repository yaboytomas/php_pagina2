<?php

	// function para el GET
	function getServicios(){
		global $conn;
		
		// query para la db 
		$sql = "SELECT * from categoria_servicio";
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
	function addServicios(){
		global $conn;
		
		//obtener los datos enviados json
		$data = json_decode(file_get_contents("php://input"), true);
		$id = $data['id'] ?? '';
		$nombre = $data['nombre'] ?? '';
		$imagen = $data['imagen'] ?? '';
		$texto = $data['texto'] ?? '';
		$activo = $data['activo'] ?? 0;
		
		//query para la db
		$sql = "INSERT INTO categoria_servicio VALUES ('$id', '$nombre', '$imagen', '$texto', '$activo')"; 
		//codifica a json
		if (mysqli_query($conn, $sql)) {
			echo json_encode(['Status' => 'Success', 'Message' => 'Registro agregado correctamente']);
		} else {
			echo json_encode(['Status' => 'Error', 'Message' => 'Error al agregar el registro']);
		}	
	}
	
	// function para el PUT
	function updateServicios(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		$nombre = $data['nombre'] ?? '';
		$imagen = $data['imagen'] ?? '';
		$texto = $data['texto'] ?? '';
		$activo = $data['activo'] ?? 0;
		//query para la db
		$sql = "UPDATE categoria_servicio SET nombre='$nombre', imagen='$imagen', texto='$texto', activo='$activo' WHERE id=$id";
		//codifica a json
		if (mysqli_query($conn, $sql)) {
			echo json_encode(['Status' => 'Success', 'Message' => 'Registro actualizado correctamente']);
		} else {
			echo json_encode(['Status' => 'Error', 'Message' => 'Error al actualizar el registro']);
		}	
		
	}
	
	// function para el PATCH
	function patchServicios(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		$updates = [];
		if (isset($data['nombre'])) {
			$updates[] = "nombre='" . $data['nombre'] . "'";
		}
		if (isset($data['imagen'])) {
			$updates[] = "imagen='" . $data['imagen'] . "'";
		}
		if (isset($data['texto'])) {
        $updates[] = "texto='" . $data['texto'] . "'";
		}
		if (isset($data['activo'])) {
			$updates[] = "activo=" . $data['activo'];
		}
		if (count($updates) > 0) {
		//query para la db
		$sql = "UPDATE categoria_servicio SET  " . implode(", ", $updates) . " WHERE id=$id";
		//codifica a json
			if (mysqli_query($conn, $sql)) {
				echo json_encode(['Status' => 'Success', 'Message' => 'Registro actualizado correctamente']);
			} else {
				echo json_encode(['Status' => 'Error', 'Message' => 'Error al actualizar el registro']);
			}
		}
	}
	
	// function para el DELETE
	function deleteServicios(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		//query para la db
		$sql = "DELETE FROM categoria_servicio WHERE id=$id";
		//codifica a json
		if (mysqli_query($conn, $sql)) {
				echo json_encode(['Status' => 'Success', 'Message' => 'Registro borrado correctamente']);
			} else {
				echo json_encode(['Status' => 'Error', 'Message' => 'Error al borrar el registro']);
			}
		
	}


?>