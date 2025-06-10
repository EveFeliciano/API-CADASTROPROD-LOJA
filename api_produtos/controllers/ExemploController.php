<?php
    require_once __DIR__ . '/../models/brinquedoModel.php';

    class ExemploController {
        public function index() {
            $produtos = json_decode(file_get_contents(__DIR__ . '/../catalogo_brinquedos.json'), true);

            //TUDO ISSO AINDA É TESTE
            //Tem que mudar toda lógicaa
            $dadosNovoBrinquedo = [
                'id' => 10,
                'nome' => 'Lego Cidade: Estação de Bombeiros',
                'categoria' => 'Construção',
                'preco' => 299.90,
                'promocao' => [
                    'ativo' => false
                ],
                'descricao' => 'Um conjunto detalhado de Lego para construir uma estação de bombeiros completa.',
                'idadeRecomendada' => '6+ anos',
                'marca' => 'Lego',
                'estoque' => 15
            ];

            $meuNovoBrinquedo = new Brinquedo($dadosNovoBrinquedo);

            $lista = [
                "id" => $meuNovoBrinquedo->id,
                "nome" => $meuNovoBrinquedo->nome, 
                "preco" => $meuNovoBrinquedo->preco, 
                "categoria" =>  $meuNovoBrinquedo->categoria,
                "promocao" => $meuNovoBrinquedo->promocao
            ];

            array_push($produtos["brinquedos"], $meuNovoBrinquedo); 

            $final = json_encode($produtos, JSON_UNESCAPED_UNICODE);
            file_put_contents(__DIR__ . '/../catalogo_brinquedos.json', $final);

            echo json_encode($lista, JSON_UNESCAPED_UNICODE);
        }
    }
?>