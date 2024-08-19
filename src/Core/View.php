<?php

namespace core;

class View
{
    public static function render($view, $data = [])
    {
        extract($data);
        $viewFile = __DIR__ . "/../app/view/$view.php";

        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "View $view not found";
        }
    }
}