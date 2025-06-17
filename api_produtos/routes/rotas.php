
<?php
    require_once __DIR__ . '/../controllers/ExemploController.php';
    require_once __DIR__ . '/../controllers/AnaliseBrinquedoController.php';
    require_once __DIR__ . '/../controllers/CadastroBrinquedoController.php';
    require_once __DIR__ . '/../controllers/ComercioBrinquedosController.php';

    $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    $uri = str_replace($scriptName, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $method = $_SERVER['REQUEST_METHOD'];

    $exemploController = new ExemploController();
    $analiseBrinquedoController = new AnaliseBrinquedoController();
    $cadastroBrinquedoController = new CadastroBrinquedoController();
    $comercioBrinquedoController = new ComercioBrinquedoController();

    switch($method){
        case 'GET':
            if ($uri == '/api'){
                $exemploController->index();
            }
            else if($uri == '/api/brinquedos'){
                $analiseBrinquedoController->GetAllBrinquedos();
            } 
            else{
                http_response_code(404);
                echo json_encode(["erro" => "Rota não encontrada"], JSON_UNESCAPED_UNICODE);
            }
            break;
        case 'POST':
            if($uri == '/api/brinquedobyid'){
                $analiseBrinquedoController->GetBrinquedoByID();
            }
            else if($uri == '/api/cadastrar-brinquedo'){
                $cadastroBrinquedoController->CadastroBrinquedo();
            }
            else if($uri == '/api/inserir-brinquedo'){
                $comercioBrinquedoController->InserirBrinquedo();
            }
            else if($uri == '/api/remover-brinquedo'){
                $comercioBrinquedoController->RemoverBrinquedo();
            }
            else{
                http_response_code(404);
                echo json_encode(["erro" => "Rota não encontrada"], JSON_UNESCAPED_UNICODE);
            }
            break;
        default:
            http_response_code(404);
            echo json_encode(["erro" => "Método não especificado"], JSON_UNESCAPED_UNICODE);
            break;
    }
?>