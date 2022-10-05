<?php

class Router
{
    function __construct()
    {
        if (isset($_GET['controller'])) {
            $controllerName = $_GET['controller'] . "Controller";
            $controllerPath = CONTROLLERS . $controllerName . ".php";
            $fileExists = file_exists($controllerPath);
            if ($fileExists) {
                require_once $controllerPath;
                $controller = new $controllerName;
            } else {
                $errorMsg = "The page you are trying to access does not exist.";
                require_once VIEWS . "error/error.php";
            }
        } else {
            require_once VIEWS . "main/main.php";
        }
    }
}