<?php

	// function para el GET
	function getEquipo(){
		global $conn;
		
		// query para la db 
		$sql = "
    		SELECT 
        		h.id AS id, 
        		h.tipo, 
        		CASE 
            		WHEN h.tipo = 'imagen' AND i.imagen IS NOT NULL 
            		THEN i.imagen 
            		ELSE h.texto 
        		END AS texto, 
        		h.activo 
    		FROM equipo h 
    		LEFT JOIN equipo_imagen hi ON h.id = hi.equipo_id 
    		LEFT JOIN imagen i ON hi.imagen_id = i.id 
    		ORDER BY h.id;
		";
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
	function addEquipo(){
		global $conn;
		
		//obtener los datos enviados json
		$data = json_decode(file_get_contents("php://input"), true);

		$id = $data['id'] ?? '';
		$tipo = $data['tipo'] ?? '';
		$texto = $data['texto'] ?? '';
		$activo = $data['activo'] ?? 0;
		
		//query para la db - especificar columnas para evitar errores de conteo
		$sql = "INSERT INTO equipo (id, tipo, texto, activo) 
				VALUES ('$id', '$tipo', '$texto', '$activo')"; 
		//codifica a json
		if (mysqli_query($conn, $sql)) {
			echo json_encode(['Status' => 'Success', 'Message' => 'Registro agregado correctamente']);
		} else {
			echo json_encode(['Status' => 'Error', 'Message' => 'Error al agregar el registro']);
		}	
	}

	// function para el PUT
	function updateEquipo(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		$tipo = $data['tipo'] ?? '';
		$texto = $data['texto'] ?? '';
		$activo = $data['activo'] ?? 0;

		//query para la db
		$sql = "UPDATE equipo SET tipo = '$tipo', texto = '$texto', activo = '$activo' WHERE id = '$id'";
		//codifica a json
		if (mysqli_query($conn, $sql)) {
			echo json_encode(['Status' => 'Success', 'Message' => 'Registro actualizado correctamente']);
		} else {
			echo json_encode(['Status' => 'Error', 'Message' => 'Error al actualizar el registro']);
		}	
	}
	
	// function para el PATCH
	function patchEquipo(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		$updates = [];
		if (isset($data['tipo'])) {
			$updates[] = "tipo='" . $data['tipo'] . "'";
		}
		if (isset($data['texto'])) {
			$updates[] = "texto='" . $data['texto'] . "'";
		}
		if (isset($data['activo'])) {
			$updates[] = "activo=" . $data['activo'];
		}
		if (count($updates) > 0) {
		//query para la db
		$sql = "UPDATE equipo SET  " . implode(", ", $updates) . " WHERE id=$id";
		//codifica a json
			if (mysqli_query($conn, $sql)) {
				echo json_encode(['Status' => 'Success', 'Message' => 'Registro actualizado correctamente']);
			} else {
				echo json_encode(['Status' => 'Error', 'Message' => 'Error al actualizar el registro']);
			}
		}
	}

	// function para el DELETE
	function deleteEquipo(){
		global $conn;
		
		//obtener datos enviados
		$data = json_decode(file_get_contents('php://input'), true);
		$id = $data['id'] ?? '';
		
		//query para la db
		$sql = "DELETE FROM equipo WHERE id = '$id'";
		//codifica a json
		if (mysqli_query($conn, $sql)) {
			echo json_encode(['Status' => 'Success', 'Message' => 'Registro eliminado correctamente']);
		} else {
			echo json_encode(['Status' => 'Error', 'Message' => 'Error al eliminar el registro']);
		}	
	}

?>