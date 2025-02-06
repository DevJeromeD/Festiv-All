<?php

abstract class Controller
{
    public function render($view, $data = [])
    {
        extract($data);
        // var_dump($data);
        // die;
        require_once '../views/header.php';
        require_once '../views/' . $view . '.php';
        require_once '../views/footer.php';
    }
}
