<?php
namespace Core;

class BaseController {
    //private $proccess;

    protected function view($view, $data = []) {
        extract($data);
        $viewFile = __DIR__ . "/../App/view/" .$view.".php";
        $errorFile = __DIR__ . "/../App/view/error/error.php";
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            require_once $errorFile;
        }
    }
    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}