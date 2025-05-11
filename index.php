<?php
	
	//Tipo de contenido
	header("Content-Type: application/json");
	
	//Connections requeridas
	require_once "database/bd.php";
	require_once "controllers/mantenimiento_info.php";
	require_once "controllers/categoria_servicio.php";
	require_once "controllers/pregunta_frecuente.php";
	require_once "controllers/info_contacto.php";
	require_once "controllers/historia.php";
	require_once "controllers/equipo.php";

	//Function que dependera de que solicitud..
	$method = $_SERVER["REQUEST_METHOD"];
	
	//extraccion del URL - simplified version
	$url = $_SERVER['REQUEST_URI'];
	$basePath = '/Eval_U2A_szaboTomasverenaGrecia/';
	$url = str_replace($basePath, '', $url);
	$urlParts = explode('/', $url);
	$resource = $urlParts[0];
	
	//utilizar el controllar adecuado segun el URL
	switch ($resource) {
		case "categoria_servicio":
			handleServicioRequests($method);
			break;
		
		case "pregunta_frecuente":
			handlePreguntaRequests($method);
			break;
		
		case "info_contacto":
			handleContactoRequests($method);
			break;
			
		case "mantenimiento_info":
			handleMantenimientoRequests($method);
			break;

		case "historia":
			handleHistoriaRequests($method);
			break;

		case "equipo":
			handleEquipoRequests($method);
			break;
		default:
			http_response_code(405);
			echo json_encode(["Status" => "Error", "Message" => "Metodo no permitido"]);
			break;
	}
	
	//solicitudes
	function handleServicioRequests($method) {
		switch ($method) {
			case "GET":
				getServicios();
				break;
			case "POST":
				addServicios();
				break;
			case "PUT":
				updateServicios();
				break;
			case "PATCH":
				patchServicios();
				break;
			case "DELETE":
				deleteServicios();
				break;
			default:
				http_response_code(405);
				echo json_encode(["Status" => "Error", "Message" => "Metodo no permitido"]);
				break;
		}
	}
	
	function handleMantenimientoRequests($method) {
		switch ($method) {
			case "GET":
				getMantenimientos();
				break;
			case "POST":
				addMantenimientos();
				break;
			case "PUT":
				updateMantenimientos();
				break;
			case "PATCH":
				patchMantenimientos();
				break;
			case "DELETE":
				deleteMantenimientos();
				break;
			default:
				http_response_code(405);
				echo json_encode(["Status" => "Error", "Message" => "Metodo no permitido"]);
				break;
		}
	}
	
	function handlePreguntaRequests($method) {
			switch ($method) {
				case "GET":
					getPreguntas();
					break;
				case "POST":
					addPreguntas();
					break;
				case "PUT":
					updatePreguntas();
					break;
				case "PATCH":
					patchPreguntas();
					break;
				case "DELETE":
					deletePreguntas();
					break;
				default:
					http_response_code(405);
					echo json_encode(["Status" => "Error", "Message" => "Metodo no permitido"]);
					break;
			}
		}
	
	function handleContactoRequests($method) {
			switch ($method) {
				case "GET":
					getInfo();
					break;
				case "POST":
					addInfo();
					break;
				case "PUT":
					updateInfo();
					break;
				case "PATCH":
					patchInfo();
					break;
				case "DELETE":
					deleteInfo();
					break;
				default:
					http_response_code(405);
					echo json_encode(["Status" => "Error", "Message" => "Metodo no permitido"]);
					break;
			}
					}

	function handleHistoriaRequests($method) {
		switch ($method) {
			case "GET":
				getHistoria();
				break;
			case "POST":
				addHistoria();
				break;
			case "PUT":
				updateHistoria();
				break;
			case "PATCH":
				patchHistoria();
				break;
			case "DELETE":
				deleteHistoria();
				break;
			default:
				http_response_code(405);
				echo json_encode(["Status" => "Error", "Message" => "Metodo no permitido"]);
				break;
		}
	}

	function handleEquipoRequests($method) {
		switch ($method) {
			case "GET":
				getEquipo();
				break;
			case "POST":
				addEquipo();
				break;
			case "PUT":
				updateEquipo();
				break;
			case "PATCH":
				patchEquipo();
				break;
			case "DELETE":
				deleteEquipo();
				break;
			default:
				http_response_code(405);
				echo json_encode(["Status" => "Error", "Message" => "Metodo no permitido"]);
				break;	
		}
	}

?>