
<?php
    require_once __DIR__ . '/../controllers/ExemploController.php';

    $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    $uri = str_replace($scriptName, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $method = $_SERVER['REQUEST_METHOD'];

    $exemploController = new ExemploController();

    if ($uri == '/api' && $method == 'GET') {
        $exemploController->index();
    }
?>