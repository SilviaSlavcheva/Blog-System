
<?php
session_start();

require_once('includes/config.php');
$requestPath = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$controllerName = DEFAULT_CONTROLLER;
if (count($requestPath) >= 2 && $requestPath[1] != '') {
    $controllerName = $requestPath[1]; 
}

$action = DEFAULT_ACTION;
if (count($requestPath) >= 3 && $requestPath[2] != '') {
    $action = $requestPath[2];   
}

$params = array_slice($requestPath, 3);
$controllerClassName = ucfirst((strtolower($controllerName)) . 'Controller');
$controllerFileName = "controllers/" . $controllerClassName . '.php';

if (class_exists($controllerClassName)) {
    $controller = new $controllerClassName($controllerName);
} else {
    die("Cannot find controller '$controllerName' in class '$controllerFileName'");
}

if (method_exists($controller, $action)) {
    call_user_func_array(array($controller, $action), $params);
} else {
die("Cannot find action '$action' on controller '$controllerClassName'");
}


function __autoload($class_name) {
if (file_exists("controllers/$class_name.php")) {
    include "controllers/$class_name.php";
}
if (file_exists("models/$class_name.php")) {
    include "models/$class_name.php";
}
}
?>

