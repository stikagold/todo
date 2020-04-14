<?php

namespace App\Lib\Routes;

use App\Core\SlimCore;
use App\Lib\Request\Request;

class Router
{
    protected $_server = [];
    protected $_request = null;
    protected $_routes = [];
    protected $_controller = null;

    protected $_app = null;

    public function __construct(SlimCore $app, string $controller = null)
    {
        $this->_app = $app;
        $this->_server = $_SERVER;
        $this->_request = new Request();
        $this->_routes = include("routes.php");
        $foundController = null;
        if ($controller) {
            $foundController = $controller;
        } elseif (isset($this->_server['PATH_INFO']) && isset($this->_routes[$this->_server['PATH_INFO']])) {
            $foundController = $this->_routes[$this->_server['PATH_INFO']];
        } elseif ($this->_server['REQUEST_URI'] && isset($this->_routes[$this->_server['REQUEST_URI']])) {
            $foundController = $this->_routes[$this->_server['REQUEST_URI']];
        } elseif ($this->_request->isAjax()) {
            $foundController = $this->_routes[$this->_server['REDIRECT_URL']];
        }
        $this->_controller = new $foundController($this->_request, $app);

    }

    public function Controller()
    {
        return $this->_controller;
    }

    public function RequestWay()
    {
        return $this->_request->isAjax();
    }

    public function switchController($controller)
    {
        print_r($controller);
        die;
        $this->_controller = new $controller($this->_request, $this->_app);
    }

}
