<?php	/***
	* Modificar el código para que las funciones sean métodos de una clase llamada Producto.
	* Usar una función php para llamar al método correspondiente de la clase Producto,
	* dependiendo del método http usado en la solicitud. Ejemplo:
	*
	* Petición | Método a ejecutar
	* -------------------------------------------------------------
	* GET localhost/producto/1 Producto::get(10)
	* POST localhost/producto/ Producto::post({"id":2, "nombre":"laptop", "precio":10000})
	* body:
	* {"id":2,
	* "nombre":"laptop",
	* "precio":10000}
	*
	* PUT localhost/producto/ Producto::post({"id":2, "nombre":"Computadora de escritorio", "precio":15000})
	* body:
	* {"id":2,
	* "nombre":"Computadora de escritorio",
	* "precio":15000}
	*
	* DELETE localhost/producto/2 Producto::delete(2)
	*/
	require "Producto.php";

	if (isset($_GET["PATH_INFO"])) {
		$pathInfo = $_GET["PATH_INFO"];
		$pathParts = explode('/', $pathInfo);
		$method = $_SERVER['REQUEST_METHOD'];
	

		$id = isset($pathParts[1]) ? $pathParts[1] : null;
	

		switch ($method) {
			case 'GET':

				if ($id) {
					Producto::get($id);
				} else {
					echo "ID del producto no especificado en la URL.\n";
				}
				break;
	
			case 'POST':
				$data = json_decode(file_get_contents('php://input'), true);
				if ($data) {
					Producto::post($data);
				} else {
					echo "No se enviaron datos en el cuerpo de la solicitud.\n";
				}
				break;
	
			case 'PUT':
				$data = json_decode(file_get_contents('php://input'), true);
				if ($id && $data) {
					Producto::put($id, $data);
				} else {
					echo "Faltan datos o ID en la solicitud PUT.\n";
				}
				break;
	
			case 'DELETE':
				if ($id) {
					Producto::delete($id);
				} else {
					echo "No se especificó el ID del producto para eliminar.\n";
				}
				break;
	
			default:
				echo "Método HTTP no soportado.\n";
				break;
		}
	
	} else {
		echo "No se encontró PATH_INFO.\n";
		echo "<BR><BR>Para los métodos POST,PUT y DELETE probar desde POSTMAN";
		echo "<br> POST: http://localhost/mvc/productos";
		echo "<br> PUT: http://localhost/mvc/productos/(id)";
		echo "<br> DELETE: http://localhost/mvc/productos/(id)";
	}

?>

