<?php
include 'business/Calculator.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod == 'POST') {    
    try {
        $postData = (array) json_decode(file_get_contents('php://input'), true);
        if ($postData == null) {
            http_response_code(400);
            echo json_encode('Error al obtener los datos del request');
            return;
        }
        $operation = $postData['operation'];
        $operand1 = $postData['operand1'];
        $operand2 = $postData['operand2'];

        $api = new Calculator();
        $result = $api->calculate($operation, $operand1, $operand2);
        echo json_encode($result);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode($e->getMessage());
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}

?>