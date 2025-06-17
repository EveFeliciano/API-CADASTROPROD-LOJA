<?php
    class DeleteBrinquedoController {
        public function DeletarBrinquedo() {
            $produtos = json_decode(file_get_contents(__DIR__ . '/../catalogo_brinquedos.json'), true);
            $input = json_decode(file_get_contents("php://input"), true);

            $id = $input["id"];

            if (empty($id)) {
                http_response_code(400);
                echo json_encode(["erro" => "O campo não foi preenchido corretamente."], JSON_UNESCAPED_UNICODE);
            }

            for($i = 0; $i < count($produtos["brinquedos"]); $i++){
                if($id == $produtos["brinquedos"][$i]["id"]){
                    array_splice($produtos["brinquedos"], $i, 1);
                    break;
                }
            }

            $final = json_encode($produtos, JSON_UNESCAPED_UNICODE);
            file_put_contents(__DIR__ . '/../catalogo_brinquedos.json', $final);

            echo json_encode(["mensagem" => "Brinquedo deletado com sucesso"], JSON_UNESCAPED_UNICODE);
        }
    }
?>