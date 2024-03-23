<?php

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

        $fields = json_encode(array(
            'operation' => $postData['operation'],
            'operand1' => $postData['operand1'],
            'operand2' => $postData['operand2']
        ));

        $url = 'http://localhost/strategico.calculator.api/service.php';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpCode === 404) {
            http_response_code(404);
            echo 'Error al realizar la solicitud al API.';
            return;
        }else if($httpCode !== 200){
            http_response_code(400);
            echo json_decode($result);
            return;
        }

        echo json_encode(['result' => $result]);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}
?>