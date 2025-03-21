<?php
require_once __DIR__ . "/../app/Controllers/FulltrackController.php";

$controller = new FulltrackController();

// Captura a URL e remove o diretório base se necessário
$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace(['/relatorio/api/public', '/relatorio/api'], '', $uri);
$uri = trim(parse_url($uri, PHP_URL_PATH), "/");

// Verifica a rota
if ($uri == "trackers/all" && $_SERVER['REQUEST_METHOD'] == "GET") {
    $controller->getAllTrackers();
}

elseif ($uri == "clients/all" && $_SERVER['REQUEST_METHOD'] == "GET"){
    $controller->getAllClients();
}
else {
    http_response_code(404);
    echo json_encode(["erro" => "Rota não encontrada: " . $uri]);
}
