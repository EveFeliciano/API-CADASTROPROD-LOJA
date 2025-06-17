<?php
    class AnaliseBrinquedoController{
        public function GetAllBrinquedos(){
            echo file_get_contents(__DIR__ . '/../catalogo_brinquedos.json');
        }

        public function GetBrinquedoByID(){
            $input = json_decode(file_get_contents("php://input"), true);
            $id = $input['id'] ?? '';

            $produtos = json_decode(file_get_contents(__DIR__ . '/../catalogo_brinquedos.json'), true);
            $encontrou = false;
            for($i = 0; $i < count($produtos["brinquedos"]); $i++){
                if($id == $produtos["brinquedos"][$i]["id"]){
                    $brinquedo = $produtos["brinquedos"][$i];
                    echo json_encode($brinquedo, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    $encontrou = true;
                    break;
                }
            }
            if(!$encontrou){
                http_response_code(400);
                echo json_encode(["erro" => "ID não inserido ou produto não existe."], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
        }
    }
?>