<?php


namespace App\Core;


use App\Lib\Routes\Router;
use Illuminate\Database\Capsule\Manager as Capsule;

class SlimCore
{
    protected $_env = [];

    protected $router = null;

    public function __construct()
    {
        $this->router = new Router($this);
    }

    public function setEnv(string $name, string $value){
        $this->_env[$name] = $value;
    }

    public function getEnv(string $env){
        return $this->_env[$env];
    }

    public function giveCurrentController(){
        return $this->router->Controller();
    }

    public function buildResponse(){
        $response = $this->router->Controller()->response();
        if($this->router->RequestWay()){
            echo $response;
            die;
        }
        return $response;
    }

    public function passToController($controller){
        $this->router = new Router($this, "App\\Controllers\\".$controller);
    }
}
