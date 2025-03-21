<?php 

require_once __DIR__ . '/../service/ApiService.php';
require_once __DIR__ . '/../helpers/ResponseHelper.php';


class FulltrackController {
    private $service;

    public function __construct() 
    {
        $this->service = new FulltrackApi();

    }



    // Retorna todos os rastreadores
    public function getAllTrackers() {
        $data = $this->service->getAllTrackers();
        ResponseHelper::jsonResponse($data);
    }

    // Retorna todos os dados dos Clientes
    public function getAllClients() {
        $data = $this->service->getAllClient();
        ResponseHelper::jsonResponse($data);
    }
}

?>