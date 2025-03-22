<?php 

require_once __DIR__ . '/../../config/config.php';

class FulltrackApi {
    private $baseUrl = "https://ws.fulltrack2.com/";

    public function getAllTrackers() {
        return $this->request("trackers/all");
    }

    public function getAllClient() {
        return $this->request("clients/all");
    }

    private function request($endpoint) {
        $url = $this->baseUrl . $endpoint;

        $ch = curl_init($url);

        // Configurar cabeçalhos
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "APIKEY: " . APIKEY,
            "SECRETKEY: " . SECRETKEY,
            "Accept: application/json"
        ]);

        // Retorna resposta em vez de imprimir na tela
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Executa requisição
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Se houver erro, retorna o status
        if ($httpCode !== 200) {
            return json_encode(["erro" => "Erro ao conectar com a API externa.", "status" => $httpCode]);
        }

        return json_decode($response, true);
    }
}
?>
