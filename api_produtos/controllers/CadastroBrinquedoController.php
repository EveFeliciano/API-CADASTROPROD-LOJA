<?php
    class CadastroBrinquedoController {
        public function CadastroBrinquedo() {
            $produtos = json_decode(file_get_contents(__DIR__ . '/../catalogo_brinquedos.json'), true);
            $input = json_decode(file_get_contents("php://input"), true);

            $nome = $input["nome"];
            $categoria = $input['categoria'];
            $preco = $input["preco"];
            $promocao = $input["promocao"];
            $descricao = $input["descricao"];
            $idade = $input["idadeRecomendada"];
            $marca = $input["marca"];
            $estoque = $input["estoque"];

            $podeInserir = true;

            if (empty($nome)) {
                http_response_code(400);
                echo json_encode(["erro" => "O nome do produto é obrigatório."], JSON_UNESCAPED_UNICODE);
                $podeInserir = false;
            }
            if (!is_numeric($preco) || $preco <= 0) {
                http_response_code(400);
                echo json_encode(["erro" => "O preço do produto precisa ser positiva."], JSON_UNESCAPED_UNICODE);
                $podeInserir = false;
            }
            if (empty($categoria)) {
                http_response_code(400);
                echo json_encode(["erro" => "A categoria do produto é obrigatório."], JSON_UNESCAPED_UNICODE);
                $podeInserir = false;
            }

            $id = 0;
            for($i = 0; $i < count($produtos["brinquedos"]); $i++){
                if($id <= $produtos["brinquedos"][$i]["id"]){
                    $id = $produtos["brinquedos"][$i]["id"] + 1;
                }
            }

            
            for($j = 0; $j <  count($produtos["brinquedos"]); $j++){
                if($nome == $produtos["brinquedos"][$j]["nome"] || $id == $produtos["brinquedos"][$j]["id"]){
                    http_response_code(400);
                    echo json_encode(["erro" => "O nome e o id do produto não podem se repetir."], JSON_UNESCAPED_UNICODE);
                    $podeInserir = false;
                    break;
                }
            }
            

            $lista = [
                "id" => $id,
                "nome" => $nome, 
                "categoria" =>  $categoria,
                "preco" => $preco, 
                "promocao" => $promocao,
                "descricao" => $descricao,
                "idade" => $idade,
                "marca" => $marca,
                "estoque" => $estoque
            ];
            
            if($podeInserir){
                array_push($produtos["brinquedos"], $lista); 

                $final = json_encode($produtos, JSON_UNESCAPED_UNICODE);
                file_put_contents(__DIR__ . '/../catalogo_brinquedos.json', $final);

                echo json_encode($lista, JSON_UNESCAPED_UNICODE);
            }
            
        }
    }
?>