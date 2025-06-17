<?php
    class ComercioBrinquedoController {
        public function InserirBrinquedo() {
            $produtos = json_decode(file_get_contents(__DIR__ . '/../catalogo_brinquedos.json'), true);
            $input = json_decode(file_get_contents("php://input"), true);

            $quantidade = $input["quantidade"];
            $id = $input["id"];

            if (empty($quantidade) || empty($id)) {
                http_response_code(400);
                echo json_encode(["erro" => "Os campos não foram preenchidos corretamente."], JSON_UNESCAPED_UNICODE);
            }

            for($i = 0; $i < count($produtos["brinquedos"]); $i++){
                if($id == $produtos["brinquedos"][$i]["id"]){
                    $produtos["brinquedos"][$i]["estoque"] += $quantidade;
                    break;
                }
            }
            
            $final = json_encode($produtos, JSON_UNESCAPED_UNICODE);
            file_put_contents(__DIR__ . '/../catalogo_brinquedos.json', $final);

            echo json_encode($produtos["brinquedos"][$i], JSON_UNESCAPED_UNICODE);
        }

        public function RemoverBrinquedo() {
            $produtos = json_decode(file_get_contents(__DIR__ . '/../catalogo_brinquedos.json'), true);
            $input = json_decode(file_get_contents("php://input"), true);

            $quantidade = $input["quantidade"];
            $id = $input["id"];

            if (empty($quantidade) || empty($id)) {
                http_response_code(400);
                echo json_encode(["erro" => "Os campos não foram preenchidos corretamente."], JSON_UNESCAPED_UNICODE);
            }

            for($i = 0; $i < count($produtos["brinquedos"]); $i++){
                if($id == $produtos["brinquedos"][$i]["id"]){
                    $produtos["brinquedos"][$i]["estoque"] -= $quantidade;
                    break;
                }
            }

            $final = json_encode($produtos, JSON_UNESCAPED_UNICODE);
            file_put_contents(__DIR__ . '/../catalogo_brinquedos.json', $final);

            echo json_encode($produtos["brinquedos"][$i], JSON_UNESCAPED_UNICODE);
        }
    }
?>