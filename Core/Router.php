<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class Router
{

    // Attributs

    private $controller;
    private $action;

    // Méthodes

    public function routes()
    {

        $this->controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'HomeController';
        require_once '../Controllers/' . $this->controller . '.php';

        $controller = new $this->controller();
        // var_dump($controller);
        // die;

        $this->action = isset($_GET['action']) ? $_GET['action'] : 'homeAction';
        $controller->{$this->action}();

        // Les accolades correspondent aux deux lignes du dessous
        // $actionMethod = $this->action;
        // $controller->$actionMethod();

        // var_dump($this->action);
        // die;
    }
}
